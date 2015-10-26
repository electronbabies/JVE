@extends('admin-app')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				{{ $objUser->name }}
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_USERS') }}"></i> <a href="/admin/users">Users</a>
				</li>
				<li class="">
					<i class="fa {{ Config::get('constants.ICON_SINGLE_USER') }}"></i> {{ $objUser->name }}
				</li>
			</ol>
		</div>
	</div>
	<form action="/admin/users/store" method="post" enctype="multipart/form-data">
		<input type="hidden" value="{{ $objUser->id }}" name="UserID">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<?php $ReadOnly = $objUser->IsGuestAccount() ? 'readonly disabled' : ''; ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8 col-lg-offset-1">
					<div class="col-lg-4 form-group">
						<label>Name</label>
						<input class="form-control" id='Name' name='Name' value="{{ $objUser->name }}" {{ $ReadOnly }}>
					</div>
					<div class="col-lg-4 form-group">
						<label>Email</label>
						<input class="form-control"  name='Email' value="{{ $objUser->email }}" {{ $ReadOnly }}>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8 col-lg-offset-1">
					<div class="col-lg-4 form-group">
						<label>Company</label>
						<input class="form-control" id='Name' name='CompanyName' value="{{ $objUser->company_name }}" {{ $ReadOnly }}>
					</div>
					<div class="col-lg-4 form-group">
						<label>Type</label>
						<select class="form-control" name="Role" {{ $ReadOnly }}>
							@foreach (\App\User::$tRoles as $Role)
								<?php $Selected = $Role == $objUser->role ? 'selected' : '' ?>
								<option value="{{ $Role }}" {{ $Selected }}>{{ $Role }}</option>
							@endforeach
							@if ($objUser->IsGuestAccount())
									<option value="Guest" selected>Guest</option>
							@endif
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8 col-lg-offset-1">
					<div class="col-lg-4 form-group">
						<label>Phone</label>
						<input class="form-control" name='Phone' value="{{ $objUser->phone }}" {{ $ReadOnly }}>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">

					<div class="col-lg-4 col-lg-offset-4 form-group">
						<button type="submit" class="btn btn-lg btn-primary center-block">Update User</button>
					</div>

			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						<tr>
							<th>Edit</th>
							<th>Type</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Phone Number</th>
							<th>Company</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Last Modified</th>
						</tr>
						</thead>
						<tbody>
						@forelse ($tInvoices as $objInvoice)
							<tr>
								<td><button name='EditInvoice' class='btn btn-default center-block' style='width:100%' InvoiceID="{{ $objInvoice->id }}">Edit</button></td>
								<td>{{ $objInvoice->type }}</td>
								<td>{{--<a href='/admin/invoices/edit/{{ $objInvoice->id }}'>--}}{{ $objInvoice->first_name }} {{ $objInvoice->last_name }}</td>
								<td><a href="mailto:{{ $objInvoice->email }}">{{ $objInvoice->email }}</a></td>
								<td>{{ $objInvoice->phone }}</td>
								<td>{{ $objInvoice->company_name }}</td>
								<td>{{ $objInvoice->status }}</td>
								<td>{{ $objInvoice->created_at->format('m/d/Y h:i:s A') }}</td>
								<td>{{ $objInvoice->updated_at->format('m/d/Y h:i:s A') }}</td>
							</tr>
						@empty
							<tr>
								<td colspan="9" class='text-center'>
									This user has no orders.
								</td>
							</tr>
						@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('button[name=EditInvoice').click(function() {
			window.location = "/admin/invoices/edit/" + $(this).attr('InvoiceID');
		});
	</script>
@stop