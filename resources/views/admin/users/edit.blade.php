@extends('admin.admin-app')
@section('extra_header')
	<script language="javascript" type="text/javascript">
		$(document).ready(function () {
			if ($('#OrdersTable tr').length > 2)
				setFilterGrid("OrdersTable");
		});
	</script>
@stop

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
		<input type="hidden" value="{{ $ReturnTo }}" name="ReturnTo">
		<?php $ReadOnly = !$objLoggedInUser->HasPermission("Edit/{$objUser->role}") ? 'readonly' : ''; ?>

		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 text-center">
				<h1> User Information</h1>

				<div class="col-lg-3 form-group">
					<label>Name</label>
					<input class="form-control" id='Name' name='Name' value="{{ $objUser->name }}" {{ $ReadOnly }}>
				</div>
				<div class="col-lg-3 form-group">
					<label>Email</label>
					<input class="form-control" name='Email' value="{{ $objUser->email }}" {{ $ReadOnly }}>
				</div>
				<div class="col-lg-3 form-group">
					<label>Company</label>
					<input class="form-control" id='Name' name='CompanyName' value="{{ $objUser->company_name }}" {{ $ReadOnly }}>
				</div>
				<div class="col-lg-3 form-group">
					<label>Phone</label>
					<input class="form-control" name='Phone' value="{{ $objUser->phone }}" {{ $ReadOnly }}>
				</div>
				<div class="col-lg-3 form-group">
					<label>Account #</label>
					<input class="form-control" name='AccountNumber' value="{{ $objUser->account_number }}" {{ $ReadOnly }}>
				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-lg-12">
				<hr/>
				<h1 class="text-center">Permissions</h1>

				<div class="col-xs-12 col-lg-10 col-lg-offset-1 form-group">
					<label>Role</label>
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
				<div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-lg-10 col-lg-offset-1">
					<?php $Count = 0; ?>
					@foreach(\App\User::$tUserPermissions as $Group => $tPermissionGroup)
						<?php $Count++; ?>
						@if($Count % 3 == 1)
							<div class="row">
								@endif
								<div class="col-lg-4">
									<div class="checkbox checkbox-success checkbox-circle" {{--style="border: 1px #ddd solid; border-radius: 4px;"--}}>
										<h3>{{ $Group }}</h3>
										@foreach($tPermissionGroup as $DBValue => $TextToDisplay)
											<?php
											$Checked = $objUser->HasPermission($DBValue) ? 'checked' : '';
											$ReadOnly = !$objLoggedInUser->HasPermission("Edit/{$objUser->role}") ? 'readonly disabled' : '';
											?>
											<input type="checkbox" class="checkbox" name="Permissions[{{ $DBValue }}]" {{ $Checked }} {{ $ReadOnly }}>
											<label>{{ $TextToDisplay }}</label><br/>
										@endforeach
										@if($Count % 3 == 0)
									</div>
									@endif
								</div>
							</div>
							@endforeach
				</div>
			</div>
		</div>
		@if($objLoggedInUser->HasPermission("Edit/{$objUser->role}"))
			<div class="row">
				<div class="col-xs-12 col-lg-12 voffset-md">
					<div class="col-lg-12 col-xs-8 col-xs-offset-2 form-group">
						<div class="col-lg-3 col-xs-1">
							<button type="submit" name='Submit' value='Apply' class="btn btn-lg btn-primary center-block">
								Apply
							</button>
						</div>
						<div class="col-lg-2 col-xs-1 col-xs-offset-5 col-lg-offset-2">
							<button type="submit" name='Submit' value='Save' class="btn btn-lg btn-primary center-block">
								Save
							</button>
						</div>
					</div>
				</div>
			</div>
		@endif
	</form>
	@if($objLoggedInUser->HasPermission('View/Orders'))
		<div class="row">
			<div class="col-lg-12 text-center">
				<hr/>
				<h1>Orders</h1>

				<div class="col-lg-10 col-lg-offset-1">
					<div class="table-responsive">
						<table id="OrdersTable" class="table table-bordered table-hover table-striped" data-toggle="table">
							<thead>
							<tr>
								<th data-sortable="true">Type</th>
								<th data-sortable="true">Name</th>
								<th data-sortable="true">Email Address</th>
								<th data-sortable="true">Phone Number</th>
								<th data-sortable="true">Company</th>
								<th data-sortable="true">Status</th>
								<th data-sortable="true">Created At</th>
								<th data-sortable="true">Last Modified</th>
							</tr>
							</thead>
							<tbody>
							@forelse ($tInvoices as $objInvoice)
								<tr>
									<td>{{ $objInvoice->type }}
										@if($objLoggedInUser->HasPermission("Edit/{$objInvoice->type}"))
										<objectrow href='/admin/invoices/edit/{{ $objInvoice->id }}' />
										@endif
									</td>
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
									<td colspan="99" class='text-center'>
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
	@endif
@stop