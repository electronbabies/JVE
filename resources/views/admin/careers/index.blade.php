@extends('admin.admin-app')
@section('extra_header')
	<script language="javascript" type="text/javascript">
		$(document).ready(function () {
			if ($('#CareersTable tr').length > 2)
				setFilterGrid("CareersTable");
		});
	</script>
@stop

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Careers
		</h1>
		<ol class="breadcrumb">
			<li>
				{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
				<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
			</li>
			<li class="active">
				<i class="fa {{ Config::get('constants.ICON_CAREERS') }}"></i> Careers
			</li>
		</ol>
	</div>
</div>
@if($objLoggedInUser->HasPermission("Edit/Careers"))
	<div class="row">
		<div class="col-xs-2 col-lg-offset-5 col-sm-offset-5 col-xs-offset-2">
			<a href="/admin/careers/edit/new">
				<button type="button" class="btn btn-lg btn-default" style='width:200px' ; name="NewCareer">New Career</button>
			</a><br/><br/>
		</div>
	</div>
@endif
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="table-responsive">
				<table id="CareersTable" class="table table-bordered table-hover table-striped" @if(count($tCareers)) data-toggle="table" @endif>
					<thead>
					<tr>
						<th data-sortable="true">Title</th>
						<th data-sortable="true">Location</th>
						<th data-sortable="true">Date Posted</th>
						<th>Delete</th>
					</tr>
					</thead>
					<tbody>
					@forelse ($tCareers as $objCareer)
						<tr>
							<td><a sort="{{ $objCareer->title }}" href='/admin/careers/edit/{{ $objCareer->id }}'>{{ $objCareer->title }}</a><objectrow href='/admin/careers/edit/{{ $objCareer->id }}' /></td>
							<td>{{ $objCareer->city }}, {{ $objCareer->state }}</td>
							<td>{{ $objCareer->created_at->format('m/d/Y') }}
							<td><button type="button" class="btn btn-danger" name="Delete" ID='{{ $objCareer->id }}'>Delete</button></td>
						</tr>
					@empty
						<tr>
							<td colspan="99" class='text-center'>
								No careers available.
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('button[name=Delete]').click(function (e) {
			e.preventDefault();
			e.stopPropagation();
			if (confirm('Are you sure you want to delete this career?')) {
				var Elem = $(this).parents('tr');
				var ID = $(this).attr('ID');

				$.ajax({
					url: '/admin/careers/delete/' + ID,

				}).done(function (data) {
					if (data == 'success') {
						DocumentElem.remove();
					} else {
						alert('Error deleting career.  Contact network administrator');
					}
				});
			}
		});
	});
</script>
@stop