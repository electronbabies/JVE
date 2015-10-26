@extends('admin-app')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Orders
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
								<td>
									<button name='EditInvoice' class='btn btn-default center-block' style='width:100%'
											InvoiceID="{{ $objInvoice->id }}">Edit
									</button>
								</td>
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
									This user has no invoices.
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
		$('button[name=EditInvoice').click(function () {
			window.location = "/admin/invoices/edit/" + $(this).attr('InvoiceID');
		});
	</script>
@stop