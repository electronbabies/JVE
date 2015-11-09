@extends('admin.admin-app')
@section('extra_header')
	<script language="javascript" type="text/javascript">
		$(document).ready(function () {
			if ($('#HolidayTable tr').length > 2)
				setFilterGrid("HolidayTable");
		});
	</script>
@stop
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Company Holidays
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_HOLIDAYS') }}"></i> Holidays
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-lg-offset-5 col-sm-offset-5 col-xs-offset-2">
			<a href="/admin/vacations/holidays/edit/new">
				<button type="button" class="btn btn-lg btn-default" style='width:300px;' name="NewPost">Add Holiday</button>
			</a><br/><br/>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
			<label></label>
				<table id="HolidayTable" class="table table-bordered table-hover table-striped" @if(count($tHolidays)) data-toggle="table" @endif >
					<thead>
						<tr>
							<th data-sortable="true">Added By</th>
							<th data-sortable="true">From</th>
							<th data-sortable="true">To</th>
							<th>Comments</th>
							<th data-sortable="true">Holiday Length</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($tHolidays as $objRequest)
						<tr>
							<td><a sort="{{ $objRequest->User->name }}" href='/admin/vacations/holidays/edit/{{ $objRequest->id }}'>{{ $objRequest->User->name }}</a><objectrow href='/admin/vacations/holidays/edit/{{ $objRequest->id }}'></td>
							<td><a sort="{{ $objRequest->from->format('Y/m/d H:i:s') }}" href='/admin/vacations/holidays/edit/{{ $objRequest->id }}'>{{ $objRequest->from->format('m/d/Y h:i:s A') }}</a></td>
							<td><a sort="{{ $objRequest->to->format('Y/m/d H:i:s') }}" href='/admin/vacations/holidays/edit/{{ $objRequest->id }}'>{{ $objRequest->to->format('m/d/Y h:i:s A') }}</a></td>

							<td><textarea class="form-control" readonly>{{ $objRequest->comments }}</textarea></td>
							<td>{{ str_replace('after', '', $objRequest->to->diffForHumans($objRequest->from)) }}
							<td>
								<button type="button" class="btn btn-sm btn-danger center-block" name="Delete" HolidayID="{{ $objRequest->id }}">Delete</button>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="99" class='text-center'>
								No holidays
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		$(document).ready(function() {
			$('button[name=Delete]').click(function () {
				if (confirm('Are you sure you want to delete this holiday?')) {
					var HolidayElem = $(this).parents('tr');
					var HolidayID = $(this).attr('HolidayID');

					$.ajax({
						url: '/admin/vacations/holidays/delete/' + HolidayID,

					}).done(function (data) {
						if (data == 'success') {
							HolidayElem.remove();
						} else {
							alert('Error deleting holiday.  Contact network administrator');
						}
					});
				}
			});
		});



	</script>
@stop