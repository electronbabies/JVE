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
				<i class="fa {{ Config::get('constants.ICON_CLIENTS') }}"></i> Users
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-6 col-lg-offset-3">
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
					@forelse ($tClients as $objClient)
						<tr>
							<td><a href='/admin/users/edit/{{ $objClient->id }}'>{{ $objClient->name }}</a></td>
							<td><a href="mailto:{{ $objClient->email }}">{{ $objClient->email }}</a></td>
							<td>{{ $objClient->role }}
							<td>{{ count($objClient->Invoices) }}</td>
							<td>$321.33</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class='text-center'>
								No clients in system.
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