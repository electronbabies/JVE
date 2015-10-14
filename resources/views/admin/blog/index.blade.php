@extends('admin-app')

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
<div class="row">
	<div class="col-lg-12 col-lg-offset-5">
		<a href="/admin/blog/edit/new"><button type="button" class="btn btn-lg btn-default" style='width:200px'; name="NewPost">New Post</button></a><br /><br/>
	</div>
</div>
@foreach($tBlogPosts as $objPost)
<div class="row" name="BlogPost" BlogID="{{ $objPost->id }}">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{!! $objPost->title !!}</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-3">
						<img src="/img/blog_images/{{ $objPost->image_filename }}" class="blog_image">
					</div>
					<div class="col-lg-6">
						{!! $objPost->entry !!}
					</div>
					<div class="col-lg-2 col-lg-offset-1 pull-right">
						<div class="pull-right">
							<a href="/admin/blog/edit/{{ $objPost->id }}"><button type="button" class="btn btn-sm btn-default" name="EditBlog">Edit</button></a>
							<button type="button" class="btn btn-sm btn-default" name="DeleteBlog">Delete</button>
						</div>
					</div>
				</div>
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
				url: '/admin/blog/delete/' + BlogID,

			}).done(function(data) {
				if(data == 'success') {
					BlogElem.remove();
				} else {
					alert('Error deleting blog entry.  Contact network administrator');
				}
			});
		}
	});

</script>
@stop