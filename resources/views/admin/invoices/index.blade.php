@extends('admin.admin-app')
@section('extra_header')
	<script language="javascript" type="text/javascript">
		$(document).ready(function() {
			if ($('#InvoiceTable tr').length > 2)
				setFilterGrid("InvoiceTable");
		});
	</script>
@stop
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				@if($Status == \App\Invoice::TYPE_CONTACT)
					Contact Us Requests
				@else
					{{ $Status }} Orders
				@endif
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
					<table id="InvoiceTable" class="table table-bordered table-hover table-striped" @if(count($tInvoices)) data-toggle="table" @endif>
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
							<th data-sortable="true">Reviewed By</th>
							<th data-sortable="true">Assigned To</th>
						</tr>
						</thead>
						<tbody>
						@forelse ($tInvoices as $objInvoice)
							<tr>
								<td href='/admin/invoices/edit/{{ $objInvoice->id }}'>{{ $objInvoice->type }}<objectrow href='/admin/invoices/edit/{{ $objInvoice->id }}' /></td>
								<td>{{ $objInvoice->first_name }} {{ $objInvoice->last_name }}</td>
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