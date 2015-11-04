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
</style>

<script type="text/javascript">
	$(document).on('click', 'a.controls', function () {
		//this is where we add our logic
		var index = $(this).attr('href');
		var src = $('ul.row li:nth-child(' + index + ') img').attr('src');
		$('.modal-body img').attr('src', src);

		var newPrevIndex = parseInt(index) - 1;
		var newNextIndex = parseInt(newPrevIndex) + 2;

		if ($(this).hasClass('previous')) {
			$(this).attr('href', newPrevIndex);
			$('a.next').attr('href', newNextIndex);
		} else {
			$(this).attr('href', newNextIndex);
			$('a.previous').attr('href', newPrevIndex);
		}

		var total = $('ul.row li').length + 1;
		//hide next button
		if (total === newNextIndex) {
			$('a.next').hide();
		} else {
			$('a.next').show()
		}
		//hide previous button
		if (newPrevIndex === 0) {
			$('a.previous').hide();
		} else {
			$('a.previous').show()
		}

		return false;
	});

	$(document).ready(function () {
		$('li img').on('click', function () {
			var src = $(this).attr('src');
			var img = '<img src="' + src + '" class="img-responsive center-block"/>';

			//Start of new code
			var index = $(this).parent('li').index();
			var html = '';
			html += img;
			html += '<div style="height:25px;clear:both;display:block;">';
			html += '<a class="controls next" href="' + (index + 2) + '">next &raquo;</a>';
			html += '<a class="controls previous" href="' + (index) + '">&laquo; prev</a>';
			html += '</div>';
			//End of new code

			$('#Popup').modal();
			$('#Popup').on('shown.bs.modal', function () {
				$('#Popup .modal-body').html(html);
			});
			$('#Popup').on('hidden.bs.modal', function () {
				$('#Popup .modal-body').html('');
			});

			$('#Popup').on('shown.bs.modal', function () {
				$('#myModal .modal-body').html(html);
				//this will hide or show the right links:
				$('a.controls').trigger('click');
			})
		});
	})
</script>
@stop
@section('content')
    <div class="wrap bg-banner-holder-2 d-wrap">
        <div class="container wrap-xl">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-center tc-dodger-blue mg-md">
                            </h6>

                            <h2 class=" text-center mg-sm tc-white">
                                In Stock
                            </h2>

                            <h3 class="orange text-center mg-lg tc-saffron">
                                <span>Special deals on in stock equipment!</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="wrap tc-white bg-cement-texture d-wrap bg-repeat" id="team-section">
		<div class="container wrap-lg">
			<ul class="row">
			@foreach($tGalleryImages as $objImage)
					<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img class="img-thumbnail" src="/img/gallery_images/{{ $objImage->image_filename }}"/></li>

			@endforeach
			</ul>
		</div>
	</div>

	<div class="modal fade" id="Popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>

@stop
