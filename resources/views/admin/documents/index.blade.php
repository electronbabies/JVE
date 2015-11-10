@extends('admin.admin-app')
@section('extra_header')
	<script language="javascript" type="text/javascript">
		$(document).ready(function () {
			if($('#DocumentTable tr').length > 2)
				setFilterGrid("DocumentTable");
		});
	</script>
@stop
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Documents
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_DOCUMENTS') }}"></i> Documents
				</li>
			</ol>
		</div>
	</div>
	@if($objLoggedInUser->HasPermission('Edit/Documents'))
	<div class="row">
		<div class="col-xs-3 col-lg-offset-5 col-xs-offset-3 col-sm-offset-4">
			<a href="/admin/documents/edit/new">
				<button type="button" class="btn btn-lg btn-default" name="NewPost">New Document</button>
			</a><br/><br/>
		</div>
	</div>
	@endif
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
			<label></label>
				<table id="DocumentTable" class="table table-bordered table-hover table-striped" @if(count($tDocuments)) data-toggle="table" @endif >
					<thead>
						<tr>
							<th data-sortable="true">Title</th>
							<th data-sortable="true">Department</th>
							<th data-sortable="true">Added By</th>
							@if($objLoggedInUser->HasPermission('View/Documents'))
								<th>Download</th>
							@endif
							@if($objLoggedInUser->HasPermission('Edit/Documents'))
								<th data-sortable="true">Delete</th>
							@endif
						</tr>
					</thead>
					<tbody>
					@forelse ($tDocuments as $objDocument)
						<tr>
							<td>{{ $objDocument->title }}<objectrow href='/admin/documents/edit/{{ $objDocument->id }}' /></td>
							<td>{{ $objDocument->department }}</td>
							<td>{{ $objDocument->User->name }}</td>
							@if($objLoggedInUser->HasPermission('View/Documents'))
							<td><a href="/admin/documents/document_view/{{ $objDocument->id }}">Download</a>
							@endif
							@if($objLoggedInUser->HasPermission('Edit/Documents'))
								<td><button type="button" class="btn btn-danger" name="Delete" DocumentID="{{ $objDocument->id }}">Delete</button></td>
							@endif
						</tr>
					@empty
						<tr>
							<td colspan="99" class='text-center'>
								No documents
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('button[name=Delete]').click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				if (confirm('Are you sure you want to delete this document?')) {
					var DocumentElem = $(this).parents('tr');
					var DocumentID = $(this).attr('DocumentID');

					$.ajax({
						url: '/admin/documents/delete/' + DocumentID,

					}).done(function (data) {
						if (data == 'success') {
							DocumentElem.remove();
						} else {
							alert('Error deleting document.  Contact network administrator');
						}
					});
				}
			});
		});
	</script>
@stop