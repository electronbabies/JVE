@extends('admin.admin-app')
@section('extra_header')
	<script language="javascript" type="text/javascript">
		$(document).ready(function () {
			if ($('#VacationTable tr').length > 2)
				setFilterGrid("VacationTable");
		});
	</script>
@stop
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				@if($objLoggedInUser->IsAdmin()) All @else Your @endif Vacations
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_VACATION') }}"></i> Vacations
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-lg-offset-5 col-sm-offset-5 col-xs-offset-2">
			<a href="/admin/vacations/edit/new">
				<button type="button" class="btn btn-lg btn-default" name="NewPost">Make A Vacation Request</button>
			</a><br/><br/>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
			<label></label>
				<table id="VacationTable" class="table table-bordered table-hover table-striped" @if(count($tVacationRequests)) data-toggle="table" @endif >
					<thead>
						<tr>
							<th data-sortable="true">Users</th>
							<th data-sortable="true">From</th>
							<th data-sortable="true">To</th>
							<th>Comments</th>
							<th data-sortable="true">Status</th>
							<th data-sortable="true">Approved By</th>
							<th data-sortable="true">Vacation Length</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($tVacationRequests as $objRequest)
						<tr>
							<td><a sort="{{ $objRequest->User->name }}" href='/admin/vacations/edit/{{ $objRequest->id }}'>{{ $objRequest->User->name }}</a><objectrow href='/admin/vacations/edit/{{ $objRequest->id }}' /></td>
							<td><a sort="{{ $objRequest->from->format('Y/m/d H:i:s') }}" href='/admin/vacations/edit/{{ $objRequest->id }}'>{{ $objRequest->from->format('m/d/Y h:i:s A') }}</a></td>
							<td><a sort="{{ $objRequest->to->format('Y/m/d H:i:s') }}" href='/admin/vacations/edit/{{ $objRequest->id }}'>{{ $objRequest->to->format('m/d/Y h:i:s A') }}</a></td>

							<td><textarea class="form-control" readonly>{{ $objRequest->comments }}</textarea></td>
							<td>{{ $objRequest->status }}</td>
							<td>{{ $objRequest->UserApproved['name'] }}</td>
							<td>{{ str_replace('after', '', $objRequest->to->diffForHumans($objRequest->from)) }}
						</tr>
					@empty
						<tr>
							<td colspan="99" class='text-center'>
								No vacations
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop