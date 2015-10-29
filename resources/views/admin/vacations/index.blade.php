@extends('admin-app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Your Vacations
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
		<div class="col-lg-12 col-lg-offset-5">
			<a href="/admin/vacations/edit/new">
				<button type="button" class="btn btn-lg btn-default" style='width:300px' ; name="NewPost">Make A Vacation Request</button>
			</a><br/><br/>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
			<label></label>
				<table class="table table-bordered table-hover table-striped" @if(count($tVacationRequests)) data-toggle="table" @endif >
					<thead>
						<tr>
							<th data-sortable="true">Users</th>
							<th data-sortable="true">From</th>
							<th data-sortable="true">To</th>
							<th>Comments</th>
							<th data-sortable="true">Status</th>
							<th data-sortable="true">Vacation Length</th>
						</tr>
					</thead>
					<tbody>
					@forelse ($tVacationRequests as $objRequest)
						<tr>
							<td><a href='/admin/vacations/edit/{{ $objRequest->id }}'>{{ $objRequest->User->name }}</a></td>
							<td><a href='/admin/vacations/edit/{{ $objRequest->id }}'>{{ $objRequest->from->format('Y/m/d H:i:s') }}</a></td>
							<td><a href='/admin/vacations/edit/{{ $objRequest->id }}'>{{ $objRequest->to->format('Y/m/d H:i:s') }}</a></td>

							<td><textarea class="form-control" readonly>{{ $objRequest->comments }}</textarea></td>
							<td>{{ $objRequest->status }}</td>
							<td>{{ str_replace('after', '', $objRequest->to->diffForHumans($objRequest->from)) }}
						</tr>
					@empty
						<tr>
							<td colspan="6" class='text-center'>
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