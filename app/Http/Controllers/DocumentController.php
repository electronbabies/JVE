<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Request;
use Storage;

class DocumentController extends AdminController
{
    public function index()
	{
		if(!$this->objLoggedInUser->HasPermission('View/Documents'))
			abort('404');
		$tDocuments = \App\Document::all();
		View::share('tDocuments', $tDocuments);
		return view('admin.documents.index');
	}

	/**
	 * Ajax delete
	 * @param $id
	 */
	public function delete($id)
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Documents'))
			abort('404');

		if (\App\Document::destroy($id)) {
			exit('success');
		}
		exit('error');
	}

	public function edit($DocumentID)
	{
		if (!$this->objLoggedInUser->HasPermission('View/Documents') && !$this->objLoggedInUser->HasPermission('Edit/Documents'))
			abort('404');

		$objDocument = $DocumentID == 'new' ? new \App\Document : \App\Document::find($DocumentID);
		View::share('objDocument', $objDocument);
		return view('admin.documents.edit');
	}

	public function store()
	{
		if (!$this->objLoggedInUser->HasPermission('Edit/Documents'))
			abort('404');

		$File = Request::file('Image');

		$objDocument = Request::get('DocumentID') ? \App\Document::findOrFail(Request::get('DocumentID')) : new \App\Document;

		if (!Storage::exists("Documents")) {
			Storage::makeDirectory("Documents");
		}

		if ($File) {
			$FileExtension = $File->getClientOriginalExtension();
			$FilePath = 'Documents/' . uniqid() . ".{$FileExtension}";

			$tPaths = explode('/', $FilePath);
			$Filename = array_pop($tPaths);
			$FileDir = implode('/', $tPaths);

			if (Storage::put($FilePath, file_get_contents($File))) {
				if ($objDocument->filename) {
					// Remove old file
					Storage::delete('Documents/' . $objDocument->filename);
				}
				$objDocument->filename = $Filename;
			}
		}

		$objDocument->department = Request::get('Department');
		$objDocument->user_id = $this->objLoggedInUser->id;
		$objDocument->title = Request::get('Title');
		$objDocument->save();

		$Path = Request::get('Submit') == 'Save' ? '' : "/edit/{$objDocument->id}";
		return redirect("/admin/documents{$Path}")->with('FormResponse', ['ResponseType' => static::MESSAGE_SUCCESS, 'Content' => 'Document saved successfully']);
	}

	public function document_view($id)
	{
		$objDocument = \App\Document::findOrFail($id);
		$Filename = $objDocument->filename;

		if (!$this->objLoggedInUser->HasPermission("View/Documents") || !$Filename)
			abort('404');

		$tmp = explode(".", $Filename);
		switch ($tmp[count($tmp) - 1]) {
			case "pdf":
				$ctype = "application/pdf";
				break;
			case "exe":
				$ctype = "application/octet-stream";
				break;
			case "zip":
				$ctype = "application/zip";
				break;
			case "docx":
			case "doc":
				$ctype = "application/msword";
				break;
			case "csv":
			case "xls":
			case "xlsx":
				$ctype = "application/vnd.ms-excel";
				break;
			case "ppt":
				$ctype = "application/vnd.ms-powerpoint";
				break;
			case "gif":
				$ctype = "image/gif";
				break;
			case "png":
				$ctype = "image/png";
				break;
			case "jpeg":
			case "jpg":
				$ctype = "image/jpg";
				break;
			case "tif":
			case "tiff":
				$ctype = "image/tiff";
				break;
			case "psd":
				$ctype = "image/psd";
				break;
			case "bmp":
				$ctype = "image/bmp";
				break;
			case "ico":
				$ctype = "image/vnd.microsoft.icon";
				break;
			default:
				$ctype = "application/force-download";
		}

		header("Content-type: {$ctype}");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='{$Filename}'");

		echo Storage::get("Documents/{$Filename}");
	}
}
