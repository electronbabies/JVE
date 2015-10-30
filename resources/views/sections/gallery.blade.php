@section('extra_header')
	{!! Html::script('js/jssor/jssor.slider.mini.js') !!}
	<script>
		jQuery(document).ready(function ($) {
			var jssor_1_options = {
				$AutoPlay: false,
				$FillMode: 1,
				$DragOrientation: 3,
				$AutoPlaySteps: 4,
				$SlideDuration: 160,
				$SlideWidth: 280,
				$SlideSpacing: 30,
				$Cols: 5,
				$ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$,
					$Steps: 4
				},
				$BulletNavigatorOptions: {
					$Class: $JssorBulletNavigator$,
					$SpacingX: 1,
					$SpacingY: 1
				}
			};

			var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

			//responsive code begin
			//you can remove responsive code if you don't want the slider scales while window resizes
			/*function ScaleSlider() {
				var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
				if (refSize) {
					refSize = Math.min(refSize, 1000);
					jssor_1_slider.$ScaleWidth(refSize);
				}
				else {
					window.setTimeout(ScaleSlider, 30);
				}
			}

			ScaleSlider();
			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);*/
			//responsive code end
		});
	</script>

	<style type="text/css">

		/* jssor slider bullet navigator skin 03 css */
		/*
		.jssorb03 div           (normal)
		.jssorb03 div:hover     (normal mouseover)
		.jssorb03 .av           (active)
		.jssorb03 .av:hover     (active mouseover)
		.jssorb03 .dn           (mousedown)
		*/
		.jssorb03 {
			position: absolute;
		}

		.jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
			position: absolute;
			/* size of bullet elment */
			width: 21px;
			height: 21px;
			text-align: center;
			line-height: 21px;
			color: white;
			font-size: 12px;
			background: url('img/b03.png') no-repeat;
			overflow: hidden;
			cursor: pointer;
		}

		.jssorb03 div {
			background-position: -5px -4px;
		}

		.jssorb03 div:hover, .jssorb03 .av:hover {
			background-position: -35px -4px;
		}

		.jssorb03 .av {
			background-position: -65px -4px;
		}

		.jssorb03 .dn, .jssorb03 .dn:hover {
			background-position: -95px -4px;
		}

		/* jssor slider arrow navigator skin 03 css */
		/*
		.jssora03l                  (normal)
		.jssora03r                  (normal)
		.jssora03l:hover            (normal mouseover)
		.jssora03r:hover            (normal mouseover)
		.jssora03l.jssora03ldn      (mousedown)
		.jssora03r.jssora03rdn      (mousedown)
		*/
		.jssora03l, .jssora03r {
			display: block;
			position: absolute;
			/* size of arrow element */
			width: 55px;
			height: 55px;
			cursor: pointer;
			background: url('img/a03.png') no-repeat;
			overflow: hidden;
		}

		.jssora03l {
			background-position: -3px -33px;
		}

		.jssora03r {
			background-position: -63px -33px;
		}

		.jssora03l:hover {
			background-position: -123px -33px;
		}

		.jssora03r:hover {
			background-position: -183px -33px;
		}

		.jssora03l.jssora03ldn {
			background-position: -243px -33px;
		}

		.jssora03r.jssora03rdn {
			background-position: -303px -33px;
		}

		.slide-image {
			width: 280px;
			height: 100%;
		}

	</style>
@stop
<div class="wrap {{ $BGColor or Config::get('constants.COLOR_DARK_BLUE') }} d-wrap">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Check out our equipment for sale!</h3>
		</div>
	</div>
	<div class="voffset row">
		<div class="col-lg-12">
			<div id="jssor_1" style="position:relative; height: 350px; width:1200px;" class="center-block">
				<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
					<div
						style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
					<div
						style="position:absolute;display:block;background:url('/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				</div>
				<div data-u="slides"
					 style="cursor: default; position: relative; top: 0px; left: 0px; width: 1200px; height: 250px; overflow: hidden;">

				<?php
					$Count = 0;
					$ImagesPerSlide = 1;
				?>
				@foreach($tGalleryImages as $objImage)
					<?php
						$Count++;


							echo '<div class="" style="display:none;">' ."\n";

					?>

							<a href="/gallery/view/{{ $objImage->id }}"><img data-u="image" src="/img/gallery_images/{{ $objImage->image_filename }}" class="slide-image"></a>

					<?php


							echo '</div>' . "\n";
					?>

				@endforeach
				</div>
				<div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
					<!-- bullet navigator item prototype -->
					<div data-u="prototype" style="width:21px;height:21px;">
						<div data-u="numbertemplate"></div>
					</div>
				</div>
				<!-- Arrow Navigator -->
				<span data-u="arrowleft" class="jssora03l" style="top:123px;left:-110px;width:55px;height:55px;"
					  data-autocenter="2"></span>
				<span data-u="arrowright" class="jssora03r" style="top:123px;right:-110px;width:55px;height:55px;"
					  data-autocenter="2"></span>
				<a href="http://www.jssor.com" style="display:none">Jssor Slider</a>
			</div>
		</div>
	</div>
</div>