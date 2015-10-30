@extends('admin-app')
@section('content')
	<form action="/admin/invoices/store" method="post">
		<input type="hidden" name="InvoiceID" value="{{ $objInvoice->id }}">
		<input type="hidden" name="ReturnTo" value="{{ $ReturnTo }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Order #{{ $objInvoice->id }}
				</h1>
				<ol class="breadcrumb">
					<li>
						{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
						<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
					</li>
					<li class="">
						<i class="fa {{ Config::get('constants.ICON_USERS') }}"></i> <a href="/admin/clients">Users</a>
					</li>
					<li class="">
						<i class="fa {{ Config::get('constants.ICON_SINGLE_USER') }}"></i> <a href="/admin/users/edit/{{ $objInvoice->user_id }}">{{ $objInvoice->User->name }}</a>
					</li>
					<li class="active">
						<i class="fa {{ Config::get('constants.ICON_INVOICE') }}"></i> Order #{{ $objInvoice->id }}
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-10 col-lg-offset-1" style="padding-left: 0px;">
					<div class="col-lg-4">
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type='text' name='InvoiceFirstName' value="{{ $objInvoice->first_name }}">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type='text' name='InvoiceLastName' value="{{ $objInvoice->last_name }}">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Type</label>
							<input class="form-control" type='text' name='InvoiceType' value="{{ $objInvoice->type }}">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type='text' name='InvoiceEmail' value="{{ $objInvoice->email }}">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" type='text' name='InvoicePhone' value="{{ $objInvoice->phone }}">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Company</label>
							<input class="form-control" type='text' name='InvoiceCompany' value="{{ $objInvoice->company_name }}">
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped" id="ItemTable">
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
								<tr name='ItemRow' ItemID="{{ $objItem->id }}">
									<td><input type="text" class="form-control" name="InvoiceItem[{{ $objItem->id }}][Title]" value="{{ $objItem->title }}"></td>
									<td>
										<input type="text" class="form-control" name="InvoiceItem[{{ $objItem->id }}][Type]" value="{{ $objItem->type }}"></td>
									<td>{{ $objItem->status }}</td>
									<td>{{ $objItem->created_at->format('m/d/Y h:i:s A') }}</td>
									<td>{{ $objItem->updated_at->format('m/d/Y h:i:s A') }}</td>
									<td><button type='button' class="btn btn-danger" name="DeleteItem" style="width: 100%;">Delete</button>
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
				<div class="col-lg-3 col-lg-offset-5">
					<div class="form-group">
						<button type="button" id="AddItem" class="btn btn-default">Add Order Item</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="form-group">
						<label>Comments</label>
						<textarea class="form-control" name="Comments" rows=3>{{ $objInvoice->comments }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-5 col-lg-offset-1">
					<div class="form-group">
						<label>Assign To</label>
						<select name="AssignTo" class="form-control">
							<option value="0"></option>
						@foreach($tNonClientUsers as $objUser)
							<?php
								$Selected = $objUser->id == ($objInvoice->AssignedUser && $objInvoice->AssignedUser->id) ? 'selected' : ''; ?>
							<option value="{{ $objUser->id }}" {{ $Selected }}>{{ $objUser->name }}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="form-group">
						<label>Change Status</label>
						<select name="Status" class="form-control">
							@foreach(\App\Invoice::$tStatuses as $Status)
								<?php $Selected = $objInvoice->status == $Status ? 'selected' : ''; ?>
								<option value="{{ $Status }}" {{ $Selected }}>{{ $Status }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-2 col-lg-offset-5">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update Order</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		$(document).on('click', 'button[name=DeleteItem]', function () {
			if (confirm('Are you sure you want to delete this order item?')) {
				var ItemElem = $(this).parents('tr[name=ItemRow]');
				var ItemID = ItemElem.attr('ItemID');

				if(ItemID == 'new') {
					ItemElem.remove();
				} else {
					$.ajax({
						url: '/admin/invoices/delete_item/' + ItemID,

					}).done(function (data) {
						if (data == 'success') {
							ItemElem.remove();
						} else {
							alert('Error deleting item.  Contact network administrator');
						}
					});
				}
			}
		});
		var NewItemCount = 0;
		$('#AddItem').click(function () {
			$('#ItemTable tr:last').after('\
				<tr name="ItemRow" ItemID="new">\
					<td><input type="text" class="form-control" name="InvoiceItem[new][' + NewItemCount + '][Title]"></td>\
					<td><input type="text" class="form-control" name="InvoiceItem[new][' + NewItemCount + '][Type]"></td>\
					<td>Pending Save</td>\
					<td>N/A</td>\
					<td>N/A</td>\
					<td><button type="button" class="btn btn-danger" name="DeleteItem" style="width: 100%;">Delete</button></td>\
				</tr>\
			');
			NewItemCount++;
		});

	</script>
@stop