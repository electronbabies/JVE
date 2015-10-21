@extends('admin-app')
@section('content')
	<form action="/admin/invoices/update" method="post">
		<input type="hidden" name="InvoiceID" value="{{ $objInvoice->id }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Invoice #{{ $objInvoice->id }}
				</h1>
				<ol class="breadcrumb">
					<li>
						{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
						<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
					</li>
					<li class="">
						<i class="fa {{ Config::get('constants.ICON_CLIENTS') }}"></i> <a href="/admin/clients">Users</a>
					</li>
					<li class="">
						<i class="fa {{ Config::get('constants.ICON_SINGLE_CLIENT') }}"></i> <a href="/admin/users/edit/{{ $objInvoice->user_id }}">{{ $objInvoice->User->name }}</a>
					</li>
					<li class="active">
						<i class="fa {{ Config::get('constants.ICON_INVOICE') }}"></i> Invoice #{{ $objInvoice->id }}
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
								<th>Title</th>
								<th>Type</th>
								<th>Status</th>
								<th>Created At</th>
								<th>Modified At</th>
								<th>Delete</th>
							</tr>
							</thead>
							<tbody>
							@forelse ($tInvoiceItems as $objItem)
								<tr>
									<td>{{ $objItem->title }}</td>
									<td>{{ $objItem->type }}</td>
									<td>{{ $objItem->status }}</td>
									<td>{{ $objItem->created_at->format('m/d/Y h:i:s A') }}</td>
									<td>{{ $objItem->updated_at->format('m/d/Y h:i:s A') }}</td>
									<td><button class="btn btn-danger" style="width: 100%;" name="DeleteItem" ItemID="{{ $objItem->id }}">Delete</button>
								</tr>
							@empty
								<tr>
									<td colspan="8" class='text-center'>
										No invoice items.  <i style="color:red">Report to administrator!</i>
									</td>
								</tr>
							@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="form-group">
						<label>Comments</label>
						<textarea class="form-control" rows=3>{{ $objInvoice->comments }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-2 col-lg-offset-5">
					<div class="form-group">
						<button type="submit" class="btn btn-default">Update Invoice</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		$('button[name=EditInvoice').click(function () {
			window.location = "/admin/invoices/edit/" + $(this).attr('InvoiceID');
		});
	</script>
@stop