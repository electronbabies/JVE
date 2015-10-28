@extends('admin-app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Gallery Posts
		</h1>
		<ol class="breadcrumb">
			<li>
				{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
				<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
			</li>
			<li class="active">
				<i class="fa {{ Config::get('constants.ICON_GALLERY') }}"></i> Gallery
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-lg-offset-5">
		<a href="/admin/gallery/edit/new"><button type="button" class="btn btn-lg btn-default" style='width:200px'; name="NewPost">New Image</button></a><br /><br/>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Gallery Images</h3>
			</div>
			<div class="panel-body">
				<?php $Count = 0; ?>
				@foreach($tGalleryImages as $objImage)
					<?php $Count++;
						if($Count % 6 == 1)
							echo '<div class="row">';
					?>
						<div class="col-lg-2" name="GalleryImage" ImageID="{{ $objImage->id }}" style="padding-bottom: 20px;">
							<a href="/admin/gallery/edit/{{ $objImage->id }}">
								<div style="border: 1px solid #ddd; border-radius: 4px; height: 200px;">
									<img src="/img/gallery_images/{{ $objImage->image_filename }}" class="gallery_image img-thumbnail" style="max-height:100%; border: none;">
									<br />
								</div>
							</a>
							<div style='width: 100%'>
								<button type="button" class="btn btn-xs btn-danger" name="DeleteGallery" style="display:block; margin-top: 10px; margin-left: auto; margin-right: auto;">Delete</button>
							</div>
						</div>
					<?php
						if($Count % 6 == 0 || count($tGalleryImages) == $Count)
							echo '</div>';
					?>
				@endforeach
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('button[name=DeleteGallery]').click(function() {
		if(confirm('Are you sure you want to delete this image?')) {
			var ImageElem = $(this).parents('div[name=GalleryImage]');
			var ImageID = ImageElem.attr('ImageID');

			$.ajax({
				url: '/admin/gallery/delete/' + ImageID,

			}).done(function(data) {
				if(data == 'success') {
					ImageElem.remove();
				} else {
					alert('Error deleting image.  Contact network administrator');
				}
			});
		}
	});
</script>
@stop