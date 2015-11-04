@extends('admin.admin-app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" id="BlogTitleHeader">
				@if ($objPost->title)
					{{ $objPost->title }}
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
					<i class="fa {{ Config::get('constants.ICON_BLOG') }}"></i><a href="/admin/blog"> Blog</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_EDIT') }}"></i> Edit Blog Post
				</li>
			</ol>
		</div>
	</div>
	<form action="/admin/blog/store" method="post" enctype="multipart/form-data">
		<input type="hidden" value="{{ $objPost->id }}" name="PostID">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				 <label>Title</label>
				 <input class="form-control" id='Title' name='title' value="{{ $objPost->title }}">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Body</label>
				<textarea class="form-control" name='entry' rows=20>{{ $objPost->entry }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Image</label><br />
				@if ($objPost->image_filename)
					<a href="/img/blog_images/{{ $objPost->image_filename }}" target="_blank"><img src="/img/blog_images/{{ $objPost->image_filename }}" class="blog_image"></a><br/>
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
				<label>Image Offset</label><br/>
				<div style="float:left; padding-top: 6px; padding-right: 5px; padding-bottom: 15px;" >X </div> <input class="form-control" id='x_offset' name='x_offset' value="{{ $objPost->x_offset }}" style="width: 50px;" maxlength=3 placeholder="  0">
				<div class="clearfix"></div>
				<div style="float:left; padding-top: 6px; padding-right: 5px;">Y</div> <input class="form-control" id='y_offset' name='y_offset' value="{{ $objPost->y_offset }}" style="width: 50px" maxlength=3 placeholder="  0">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<button type="submit" class="btn btn-lg btn-primary center-block">Save Post</button>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		$('#Title').on('input', function () {
			$("#BlogTitleHeader").html(this.value);
		});
	</script>
@stop