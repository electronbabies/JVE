@extends('admin.admin-app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Blog Posts
		</h1>
		<ol class="breadcrumb">
			<li>
				{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
				<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
			</li>
			<li class="active">
				<i class="fa {{ Config::get('constants.ICON_BLOG') }}"></i> Blog
			</li>
		</ol>
	</div>
</div>
@if($objLoggedInUser->HasPermission("Edit/Blog"))
<div class="row">
	<div class="col-lg-12 col-lg-offset-5">
		<a href="/admin/blog/edit/new"><button type="button" class="btn btn-lg btn-default" style='width:200px'; name="NewPost">New Post</button></a><br /><br/>
	</div>
</div>
@endif
@foreach($tBlogPosts as $objPost)
<div class="row" name="BlogPost" BlogID="{{ $objPost->id }}">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{!! $objPost->title !!}</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-3" style="border: 1px solid #ddd; border-radius: 4px;">
						<img src="/img/blog_images/{{ $objPost->image_filename }}" class="blog_image center-block" style="padding-top: 10px; padding-bottom: 10px;">
					</div>
					<div class="col-xs-6" style="padding-left: 30px; max-height: 400px; overflow: hidden;">
						{!! $objPost->entry !!}
					</div>
					@if($objLoggedInUser->HasPermission("Edit/Blog"))
					<div class="col-xs-2 col-xs-offset-1">
						<div class="pull-right">
							<a href="/admin/blog/edit/{{ $objPost->id }}"><button type="button" class="btn btn-sm btn-default" name="EditBlog">Edit</button></a>
							<button type="button" class="btn btn-sm btn-default" name="DeleteBlog">Delete</button>
						</div>
					</div>
					@endif
				</div>
				@if($objLoggedInUser->HasPermission("Edit/Blog"))
				<hr>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-3 form-group">
							<div class="col-xs-6 col-lg-4">
								<label class="control-label" style="font-weight: bold; padding-top: 5px;">Order</label>
							</div>
							<div class="col-xs-6 col-lg-8">
								<input type="text" class="form-control" name="FrontPageOrder" value="{{ $objPost->order_by }}" style="width: 42px;">
							</div>
						</div>

						<div class="checkbox checkbox-success checkbox-circle pull-right">
							<?php $Checked = $objPost->display_on_front_page ? 'checked' : ''; ?>
							<input type="checkbox" class="checkbox" {{ $Checked }} name="FrontPageCheck" onclick="return false;">
							<label style="padding-left: 5px; font-weight: bold;">Front page</label>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endforeach

<script type="text/javascript">
	$('button[name=DeleteBlog]').click(function() {
		if(confirm('Are you sure you want to delete this blog entry?')) {
			var BlogElem = $(this).parents('div[name=BlogPost]');
			var BlogID = BlogElem.attr('BlogID');

			$.ajax({
				url: '/admin/blog/delete/' + BlogID
			}).done(function(data) {
				if(data == 'success') {
					BlogElem.remove();
				} else {
					alert('Error deleting blog entry.  Contact network administrator');
				}
			});
		}
	});

	$('input[name=FrontPageOrder]').blur(function () {
		var TextField = $(this);
		var BlogElem = TextField.parents('div[name=BlogPost]');
		var BlogID = BlogElem.attr('BlogID');
		var ParentDiv = TextField.parents('div .form-group');

		if(TextField.val()) {
			$.ajax({
				url: '/admin/blog/front_page_order/' + BlogID + '/order_by/' + TextField.val()
			}).done(function (data) {
				if (data == 'success') {
					ParentDiv.addClass('has-success');
					ParentDiv.removeClass('has-error');
				} else {
					ParentDiv.addClass('has-error');
					ParentDiv.removeClass('has-success');
				}
			});
		}
	});

	$('input[name=FrontPageCheck]').click(function() {
		var CheckBox = $(this);
		var BlogElem = CheckBox.parents('div[name=BlogPost]');
		var BlogID = BlogElem.attr('BlogID');

		$.ajax({
			url: '/admin/blog/front_page_check/' + BlogID
		}).done(function(data) {
			if(data == 'success') {
				// Check / uncheck box
				CheckBox.prop('checked', !CheckBox.is(':checked'));
			} else {
				alert('Error displaying on front page.  Contact network administrator');
			}
		});
	});
</script>
@stop