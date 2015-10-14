@extends('app')

@section('content')
	<div class="wrap tc-white bg-repeat d-wrap" id="wrap-22">
		<div class="container wrap-lg">
			<div class="row">
				<div class="col-sm-12">
					<h6 class="text-center tc-white-2 mg-md">
						<span class="fa fa-image"></span>
					</h6>

					<h2 class=" text-center tc-white mg-sm">
						{{ $objImage->title }}
					</h2>

					<!-- Begin known brand form -->
					<div class="row">
						<img class='center-block' src="/img/gallery_images/{{ $objImage->image_filename }}">
					</div>


					<div class="divider-h">
						<span class="divider"></span>
					</div>


					<h3 class="orange text-center mg-lg tc-saffron">
						<span>{!! $objImage->entry !!}</span>
					</h3>

				</div>
			</div>
		</div>
	</div>
	@include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop
