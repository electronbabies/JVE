@extends('admin-app')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Users
		</h1>
		<ol class="breadcrumb">
			<li>
				{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
				<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
			</li>
			<li class="active">
				<i class="fa {{ Config::get('constants.ICON_USERS') }}"></i> Users
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Invoices</th>
						<th>Revenue</th>
					</tr>
					</thead>
					<tbody>
					@forelse ($tUsers as $objUser)
						<tr>
							<td><a href='/admin/users/edit/{{ $objUser->id }}'>{{ $objUser->name }}</a></td>
							<td><a href="mailto:{{ $objUser->email }}">{{ $objUser->email }}</a></td>
							<td>{{ $objUser->role }}
							<td>{{ count($objUser->Invoices) }}</td>
							<td>$321.33</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class='text-center'>
								No users in system.
							</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop