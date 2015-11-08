@extends('admin.admin-app')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				{{ $Status }} Orders
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_INVOICE') }}"></i> <a href="/admin/users">Orders</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped" @if(count($tInvoices)) data-toggle="table" @endif>
						<thead>
						<tr>
							@if($objLoggedInUser->HasPermission('Edit/Orders'))<th>Edit</th>@endif
							<th data-sortable="true">Type</th>
							<th data-sortable="true">Name</th>
							<th data-sortable="true">Email Address</th>
							<th data-sortable="true">Phone Number</th>
							<th data-sortable="true">Company</th>
							<th data-sortable="true">Status</th>
							<th data-sortable="true">Created At</th>
							<th data-sortable="true">Last Modified</th>
							<th data-sortable="true">Reviewed By</th>
							<th data-sortable="true">Assigned To</th>
						</tr>
						</thead>
						<tbody>
						@forelse ($tInvoices as $objInvoice)
							<tr>
								@if($objLoggedInUser->HasPermission("Edit/{$objInvoice->type}"))
									<td><a href='/admin/invoices/edit/{{ $objInvoice->id }}'><button name='EditInvoice' class='btn btn-default center-block' style='width:100%' InvoiceID="{{ $objInvoice->id }}">Edit</button></a></td>
								@else
									<td></td>
								@endif
								<td>{{ $objInvoice->type }}</td>
								<td>{{--<a href='/admin/invoices/edit/{{ $objInvoice->id }}'>--}}{{ $objInvoice->first_name }} {{ $objInvoice->last_name }}</td>
								<td><a href="mailto:{{ $objInvoice->email }}">{{ $objInvoice->email }}</a></td>
								<td>{{ $objInvoice->phone }}</td>
								<td>{{ $objInvoice->company_name }}</td>
								<td>{{ $objInvoice->status }}</td>
								<td>{{ $objInvoice->created_at->format('m/d/Y h:i:s A') }}</td>
								<td>{{ $objInvoice->updated_at->format('m/d/Y h:i:s A') }}</td>
								<td>@if($objInvoice->ReviewedUser)<a href="/admin/users/edit/{{ $objInvoice->ReviewedUser->id}}">{{ $objInvoice->ReviewedUser->name }}</a>@endif</td>
								<td>@if($objInvoice->AssignedUser)<a href="/admin/users/edit/{{ $objInvoice->AssignedUser->id}}">{{ $objInvoice->AssignedUser->name }}</a>@endif</td>
							</tr>
						@empty
							<tr>
								<td colspan="99" class='text-center'>
									No {{ $Status }} Orders.
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