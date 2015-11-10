@extends('admin.admin-app')
@section('content')
	<?php
	$ReadOnly = !$objLoggedInUser->HasPermission("Edit/Documents") ? 'readonly' : '';
	$Disabled = !$objLoggedInUser->HasPermission("Edit/Documents") ? 'disabled' : '';
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" id="BlogTitleHeader">
				@if($objDocument->id)
					{{ $objDocument->title }}
				@else
					New Document
				@endif
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="">
					<i class="fa {{ Config::get('constants.ICON_DOCUMENTS') }}"></i><a href="/admin/documents"> Documents</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_EDIT') }}"></i> @if($objDocument->id) Edit @else New @endif Document
				</li>
			</ol>
		</div>
	</div>
	<form action="/admin/documents/store" method="post" enctype="multipart/form-data">
		<input type="hidden" value="{{ $objDocument->id }}" name="DocumentID">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Title</label>
				<input class="form-control" id='Title' name='Title' value="{{ $objDocument->title }}" {{ $ReadOnly }}>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Department</label>
				<select class="form-control" name="Department" {{ $Disabled }}>
					@foreach(\App\Invoice::$tTypes as $Department)
						<?php $Selected = $Department == $objDocument->department ? 'selected' : ''; ?>
						<option value="{{ $Department }}" {{ $Selected }}>{{ $Department }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Document</label><br/>
				@if ($objDocument->filename)
					<a href="/admin/documents/view/{{ $objDocument->filename }}">Download</a>
					<br/>
				@else
					<i>No document uploaded</i>
				@endif
			</div>
		</div>
		@if($objLoggedInUser->HasPermission("Edit/Documents"))
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 form-group">
					<i style='font-size: 12px;'>Upload New File </i><i style="font-size: 8px">(Old document will be
						replaced)</i>
					<input type="file" name='Image'>
				</div>
			</div>
		@endif
		@if($objLoggedInUser->HasPermission("Edit/Documents"))
			<div class="row">
				<div class="col-lg-12 voffset-md">
					<div class="col-lg-12 col-sm-6 col-sm-offset-3 form-group">
						<div class="col-lg-3 col-xs-6">
							<button type="submit" name='Submit' value='Apply' class="btn btn-lg btn-primary center-block">
								Apply
							</button>
						</div>
						<div class="col-lg-2 col-xs-6">
							<button type="submit" name='Submit' value='Save' class="btn btn-lg btn-primary center-block">
								Save
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	@endif
@stop