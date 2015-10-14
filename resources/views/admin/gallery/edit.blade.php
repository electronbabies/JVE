@extends('admin-app')

@section('content')
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
			<div class="col-lg-6 col-lg-offset-3 form-group">
				 <label>Title</label>
				 <input class="form-control" id='Title' name='title' value="{{ $objImage->title }}">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Body</label>
				<textarea class="form-control" name='entry' rows=20>{{ $objImage->entry }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Image</label><br />
				@if ($objImage->image_filename)
					<a href="/img/gallery_images/{{ $objImage->image_filename }}" target="_blank"><img src="/img/gallery_images/{{ $objImage->image_filename }}" class="gallery_image"></a><br/>
				@else
					<i>No image uploaded</i>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<i style='font-size: 12px;'>Upload New File </i><i style="font-size: 8px">(Old image will be replaced)</i>
				<input type="file" name='Image'>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<button type="submit" class="btn btn-lg btn-primary center-block">Save Image</button>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		$('#Title').on('input', function () {
			$("#ImageTitleHeader").html(this.value);
		});
	</script>
@stop