@extends('app')

@section('extra_header')
<style type="text/css">
  ul {
    padding: 0 0 0 0;
    margin: 0 0 0 0;
  }

  ul li {
    list-style: none;
  }

  ul li img {
    cursor: pointer;
  }

  .controls {
    width: 50px;
    display: block;
    font-size: 18px;
    padding-top: 8px;
    font-weight: bold;
  }

  .next {
    float: right;
    text-align: right;
  }

  .overlaypic {
	  position: relative;
	  top: 0px;
	  width: 320px;
	  height: 240px;
	  opacity: 0.75;
		background-image: url('/img/sold.png');
		background-repeat: no-repeat;
  }

  .image_stat {
	margin-top: 0px !important;
	margin-bottom: 0px !important;
  }
</style>
{{--http://i.istockimg.com/file_thumbview_approve/57837952/6/stock-illustration-57837952-red-vector-grunge-stamp-sold.jpg--}}

<script type="text/javascript">
	$(document).ready(function () {

		loadGallery(true, 'a.thumbnail');

		//This function disables buttons when needed
		function disableButtons(counter_max, counter_current) {
			$('#show-previous-image, #show-next-image').show();
			if (counter_max == counter_current) {
				$('#show-next-image').hide();
			} else if (counter_current == 1) {
				$('#show-previous-image').hide();
			}
		}

		/**
		 *
		 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
		 * @param setClickAttr  Sets the attribute for the click handler.
		 */

		function loadGallery(setIDs, setClickAttr) {
			var current_image,
				selector,
				counter = 0;

			/*$('#show-next-image, #show-previous-image').click(function () {
				if ($(this).attr('id') == 'show-previous-image') {
					current_image--;
				} else {
					current_image++;
				}

				selector = $('[data-image-id="' + current_image + '"]');
				updateGallery(selector);
			});*/

			function updateGallery(selector) {
				var $sel = selector;
				current_image = $sel.data('image-id');
				//$('#image-gallery-caption').text($sel.data('caption'));
				//$('#image-gallery-title').text($sel.data('title'));
				$('#image-gallery-image').attr('src', $sel.data('image'));
				disableButtons(counter, $sel.data('image-id'));
			}

			if (setIDs == true) {
				$('[data-image-id]').each(function () {
					counter++;
					$(this).attr('data-image-id', counter);
				});
			}
			$(setClickAttr).on('click', function () {
				updateGallery($(this));
			});
		}
	});
</script>
@stop


@section('content')
	<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-image: url('/img/sandpaper.png'); border-radius: 8px;">
				<div class="modal-header" style="border-bottom: 0px; min-height: 0px; padding: 0px;">
					{{--<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">x</span><span class="sr-only">Close</span></button>--}}
					<h3 class="modal-title text-center" style="color:white;"id="image-gallery-title"></h3>
				</div>
				<div class="modal-body">
					<img id="image-gallery-image" class="img-responsive" src="" style="border-radius: 8px;">
				</div>
				{{-- <div class="modal-footer" style="border-top: 0px;">

					<div class="col-md-2">
						<button type="button" style="" class="btn btn-primary" id="show-previous-image">Prev</button>
					</div>

					<div class="col-md-8 text-justify" id="image-gallery-caption">
					</div>

					<div class="col-md-2">
						<button type="button" id="show-next-image" style="" class="btn btn-primary">Next</button>
					</div>
				</div> --}}
			</div>
		</div>
	</div>

<section class="{{ $PageTitleSlug }} wrap {{ $PageTitleSlug }}-bg">
  <div class="container wrap-xl" style="padding-top: 250px">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="text-center mg-sm">{{ $PageTitle }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="wrap tc-white bg-cement-texture d-wrap bg-repeat" id="team-section">
  <div class="container wrap-lg">
  <?php $Count = 0; ?>

    @foreach($tGalleryImages as $objImage)
    <?php
    	$Count++;
    	if($Count % 2 == 1)
    		echo '<ul class="row">';
	?>
      <li class="col-xs-12 col-sm-6 image_stat">
        <div class="productbox" >
        <div class="">
			<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{ $objImage->title }}" data-caption="" data-image="/img/gallery_images/{{ $objImage->image_filename}}" data-target="#image-gallery">
			<div class="center-block" style="background-image: url('/img/gallery_images/{{ $objImage->image_filename }}'); width:320px; height: 240px; background-size: 100%; background-repeat: no-repeat;">
				@if($objImage->sold && $objImage->IsFieldSet(\App\GalleryImage::FIELD_SOLD))
					<div class="overlaypic"></div>
				@endif
			</div>
			</a>
		</div>
		<span style="padding: 10px; display: block">

          <div class="producttitle text-center">{{ $objImage->title }}</div>
          <div class="row">
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_MAST_HEIGHT))
				<div class="text-left col-xs-6 image_stat">
					<span style="color: #333;">Mast Height: <span style="color: #b5b5b5">{{ $objImage->mast_height }}</span></span>
				</div>
        	@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_SERIAL))
				<div class="text-left col-xs-6 image_stat">
					<span style="color: #333;">Serial: <span style="color: #b5b5b5">{{ $objImage->serial }}</span></span>
				</div>
			@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_MAKE))
				<div class="text-left col-xs-6 image_stat">
					<span style="color: #333;">Make: <span style="color: #b5b5b5">{{ $objImage->make }}</span></span>
				</div>
			@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_MODEL))
				<div class="text-left col-xs-6 image_stat">
					<span style="color: #333;">Model: <span style="color: #b5b5b5">{{ $objImage->model }}</span></span>
				</div>
			@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_YEAR))
				<div class="text-left col-xs-6 image_stat">
				  <span style="color: #333;">Year: <span style="color: #b5b5b5">{{ $objImage->year }}</span></span>
				</div>
			@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_HOURS))
				<div class="text-left col-xs-6 image_stat">
				  <span style="color: #333;">Hours: <span style="color: #b5b5b5">{{ $objImage->hours }}</span></span>
				</div>
			@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_WARRANTY))
				<div class="text-left col-xs-6 image_stat">
					<span style="color: #333;">Warranty: <span style="color: #b5b5b5">{{ $objImage->warranty }}</span></span>
				</div>
			@endif
			@if($objImage->IsFieldSet(\App\GalleryImage::FIELD_PRICE))
				<div class="text-left col-xs-6 image_stat">
					<span style="color: #333;">Price: <span style="color: red">{{ $objImage->price }}</span></span>
				</div>
			@endif
          </div>
</span>
        </div>
      </li>
		<?php
			if($Count % 2 == 0)
			echo '</ul>';
		?>
      @endforeach
  </div>
</div>
<div class="modal fade" id="Popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> </div>
    </div>
  </div>
</div>
@stop
