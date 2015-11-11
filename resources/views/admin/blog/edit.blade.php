@extends('admin.admin-app')
@section('extra_header')
	<!-- Codemirror -->
	<link href="/css/codemirror.css" rel="stylesheet">
	<script src="/js/codemirror.js"></script>
	<script src="/js/codemirror/mode/css/css.js"></script>
	<script>
	$( document ).ready(function() {
		var editor = CodeMirror.fromTextArea(document.getElementById('css_textarea'), {
			lineNumbers: true
		});
	});
	</script>
	<script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
@stop
@section('content')
	<?php
		$ReadOnly = !$objLoggedInUser->HasPermission("Edit/Blog") ? 'readonly' : '';
		$Disabled = !$objLoggedInUser->HasPermission("Edit/Blog") ? 'disabled' : '';
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" id="BlogTitleHeader">
				@if ($objPost->title)
					{{ strip_tags($objPost->title) }}
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
				 <textarea id="Title" class="form-control" name='title' rows=20 {{ $ReadOnly }}>{{ $objPost->title }}</textarea>
				<script>
					CKEDITOR.replace('Title');
				</script>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>Body</label>
				<textarea id="Body" class="form-control" name='entry' rows=20 {{ $ReadOnly }}>{{ $objPost->entry }}</textarea>
				<script>
					CKEDITOR.replace('Body');
				</script>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<label>CSS</label>
				<textarea class="form-control" id="css_textarea"  name='css' rows=20 {{ $ReadOnly }}>{{ $objPost->css }}</textarea>
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
		@if($objLoggedInUser->HasPermission("Edit/Blog"))
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<i style='font-size: 12px;'>Upload New File </i><i style="font-size: 8px">(Old image will be replaced)</i>
				<input type="file" name='Image'>
			</div>
		</div>
		@endif
		@if($objLoggedInUser->HasPermission("Edit/Blog"))
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
@stop