@extends('admin.admin-app')

@section('content')
	<?php
		$ReadOnly = !$objLoggedInUser->HasPermission("Edit/Careers") ? 'readonly' : '';
		$Disabled = !$objLoggedInUser->HasPermission("Edit/Careers") ? 'disabled' : '';
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" id="TitleHeader">
				@if ($objCareer->title)
					{{ $objCareer->title }}
				@else
					Untitled
				@endif
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_CAREERS') }}"></i><a href="/admin/careers"> Careers</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_EDIT') }}"></i> Edit Career
				</li>
			</ol>
		</div>
	</div>
	<form action="/admin/careers/store" method="post" enctype="multipart/form-data">
		<input type="hidden" value="{{ $objCareer->id }}" name="CareerID">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				 <label>Title</label>
				 <input class="form-control" id='Title' name='title' value="{{ $objCareer->title }}" {{ $ReadOnly }}>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-lg-offset-3 form-group">
				<label>City</label>
				<input class="form-control" id='Title' name='city' value="{{ $objCareer->city }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-3 form-group">
				<label>State</label>
				<input class="form-control" id='Title' name='state' value="{{ $objCareer->state }}" {{ $ReadOnly }}>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Description</label>
				<textarea class="form-control" name='description' rows=20 {{ $ReadOnly }}>{{ $objCareer->description }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Requirements</label>
				<textarea class="form-control" name='requirements' rows=20 {{ $ReadOnly }}>{{ $objCareer->requirements }}</textarea>
			</div>
		</div>

		@if($objLoggedInUser->HasPermission("Edit/Careers"))
		<div class="row">
			<div class="col-lg-12 voffset-md">
				<div class="col-lg-12 col-sm-6 col-sm-offset-3 form-group">
					<div class="col-lg-3 col-xs-6">
						<button type="submit" name='Submit' value='Apply' class="btn btn-lg btn-primary center-block">
							Apply
						</button>
					</div>
					<div class="col-lg-2 col-xs-6">
						<button type="submit" name='Submit' value='Save' class="btn btn-lg btn-primary center-block">
							Save
						</button>
					</div>
				</div>
			</div>
		</div>
		@endif
	</form>

	<script type="text/javascript">
		$('#Title').on('input', function () {
			$("#TitleHeader").html(this.value);
		});
	</script>

@stop