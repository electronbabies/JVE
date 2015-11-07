@extends('admin.admin-app')

@section('content')
	<?php
		$ReadOnly = !$objLoggedInUser->HasPermission("Edit/Gallery") ? 'readonly' : '';
		$Disabled = !$objLoggedInUser->HasPermission("Edit/Gallery") ? 'disabled' : '';
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" id="ImageTitleHeader">
				@if ($objImage->title)
					{{ $objImage->title }}
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
					<i class="fa {{ Config::get('constants.ICON_GALLERY') }}"></i><a href="/admin/gallery"> Gallery</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_EDIT') }}"></i> Edit Image
				</li>
			</ol>
		</div>
	</div>
	<form action="/admin/gallery/store" method="post" enctype="multipart/form-data">
		<input type="hidden" value="{{ $objImage->id }}" name="PostID">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 form-group">
				 <label>Title</label>
				 <input class="form-control" id='Title' name='title' value="{{ $objImage->title }}" {{ $ReadOnly }}>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 form-group">
				<label>Description</label>
				<textarea class="form-control" name='entry' rows=5 {{ $ReadOnly }}>{{ $objImage->entry }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-lg-offset-2 form-group">
				<label>Mast Height</label>
				<input class="form-control" id='Title' name='mast_height' value="{{ $objImage->mast_height }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-2 form-group">
				<label>Make</label>
				<input class="form-control" name='make' value="{{ $objImage->make }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-2 form-group">
				<label>Model</label>
				<input class="form-control" name='model' value="{{ $objImage->model }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-2 form-group">
				<label>Serial</label>
				<input class="form-control" name='serial' value="{{ $objImage->serial }}" {{ $ReadOnly }}>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-lg-offset-2 form-group">
				<label>Warranty</label>
				<input class="form-control" name='warranty' value="{{ $objImage->warranty }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-2 form-group">
				<label>Price</label>
				<input class="form-control" name='price' value="{{ $objImage->price }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-2 form-group">
				<label>Hours</label>
				<input class="form-control" name='hours' value="{{ $objImage->hours }}" {{ $ReadOnly }}>
			</div>
			<div class="col-lg-2 form-group">
				<label>Year</label>
				<input class="form-control" name='year' value="{{ $objImage->year }}" {{ $ReadOnly }}>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-2  form-group">
				<label>Image</label><br />
				@if ($objImage->image_filename)
					<a href="/img/gallery_images/{{ $objImage->image_filename }}" target="_blank"><img src="/img/gallery_images/{{ $objImage->image_filename }}" class="gallery_image img-responsive"></a><br/>
				@else
					<i>No image uploaded</i>
				@endif
			</div>
			<div class="row">
				<div class="col-lg-6 form-group">
					<div class="checkbox checkbox-success checkbox-circle" style="padding-top: 20px;">
						<?php $Checked = $objImage->sold ? 'checked' : ''; ?>
						<input type="checkbox" class="checkbox" name="sold" {{ $Checked }} {{ $Disabled }}>
						<label style="padding-left: 5px; font-weight: bold;">Sold</label>
					</div>
				</div>
				@if($objLoggedInUser->HasPermission("Edit/Gallery"))
				<div class="col-lg-6 form-group">
					<i style='font-size: 12px;'>Upload New File </i><i style="font-size: 8px">(Old image will be
						replaced)</i>
					<input type="file" name='Image'>
				</div>
				@endif
			</div>
		</div>
		@if($objLoggedInUser->HasPermission("Edit/Gallery"))
		<div class="row">
			<div class="col-lg-5 col-lg-offset-5 form-group">
				<div class="col-lg-2 form-group">
					<button type="submit" class="btn btn-lg btn-primary center-block" name='submit' value='Apply'>Apply</button>
				</div>
				<div class="col-lg-2 form-group">
					<button type="submit" class="btn btn-lg btn-primary center-block" name='submit' value='Save'>Save</button>
				</div>
			</div>

		</div>
		@endif
	</form>

	<script type="text/javascript">
		$('#Title').on('input', function () {
			$("#ImageTitleHeader").html(this.value);
		});
	</script>
@stop