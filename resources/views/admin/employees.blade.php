@extends('admin-app')
@section('content')
	<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Employees
		</h1>
		<ol class="breadcrumb">
			<li>
				{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
				<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
			</li>
			<li class="active">
				<i class="fa {{ Config::get('constants.ICON_EMPLOYEES') }}"></i> Employees
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
						<th>Upcoming Vacation Requests</th>
						<th>Revenue</th>
					</tr>
					</thead>
					<tbody>
					@forelse ($tEmployees as $objEmployee)
						<tr>
							<td><a href='/admin/edit/user/{{ $objEmployee->id }}'>{{ $objEmployee->name }}</a></td>
							<td><a href="mailto:{{ $objEmployee->email }}">{{ $objEmployee->email }}</a></td>
							<td>{{-- Need vacation request count --}}</td>
							<td>$321.33</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class='text-center'>
								No employees in system.
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