@extends('app')

@section('content')
asdf
<div class="wrap {{ $BGColor or Config::get('constants.COLOR_DARK_BLUE') }} d-wrap">
	<div class="container wrap-md">
		<div class="row">
			<div class="col-sm-12">
				<h6 class="text-center tc-white-2 mg-md">
					{{-- <span class="fa fa-fax icon icon-book icon-gears icon-magnifying-glass icon-md"></span>--}}
				</h6>

				<h2 class=" text-center mg-sm">
					Location &amp; Contact Information
				</h2>

				<h3 class="orange text-center mg-lg tc-saffron">
					<span>Serving the US and Mexico</span>
				</h3>
			</div>
		</div>
		<div class="row voffset">
			<div class="col-sm-3">
				<img src="/img/edinburg.jpg" class="img-circle center-block mg-md" width="100px" height="100px"/>
				<h4 class="text-center mg-sm tc-saffron fancy-font">
					<strong>Edinburg, Texas</strong>
				</h4>

				<p class="text-center fancy-font">
					<strong>TEL: 956-383-0777<br/>FAX: 956-383-0862</strong>
					<span class="small-font"><br/>2421 S. Expressway 281, Edinburg, Texas 78542</span><br/>
				</p>
			</div>
			<div class="col-sm-3">
				<img src="/img/mexico.jpg" class="img-circle center-block mg-md" width="100px" height="100px"/>
				<h4 class="text-center mg-sm tc-saffron fancy-font">
					<strong>Reynosa Tamps, Mexico</strong>
				</h4>

				<p class="text-center fancy-font">
					<strong>TEL: 899-9268539<br/>FAX: 899-9266083</strong>

                <span class="small-font"><br/>Carretera A Matamoros KM 98.5 #212
                Col. El Bienstar, Reynosa, Tamp., Mex</span><br/>
				</p>
			</div>
			<div class="col-sm-3">
				<img src="/img/laredo.png" class="img-circle center-block mg-md" width="100px" height="100px"/>
				<h4 class="text-center mg-sm tc-saffron fancy-font">
					<strong>Laredo, Texas</strong>
				</h4>

				<p class="text-center fancy-font">
					<strong>TEL: 956-727-8861<br/>FAX: 956-753-3541</strong>
					<span class="small-font"><br/>302 West Saunders, Laredo, TX 78041</span><br/>
				</p>
			</div>
			<div class="col-sm-3">
				<img src="/img/green.jpg" class="img-circle center-block mg-md" width="100px" height="100px"/>
				<h4 class="text-center mg-sm tc-saffron fancy-font">
					<strong>We Stay Green</strong>
				</h4>

				<p class="text-center fancy-font">
					J. V. Equipment takes pride in taking responsibility to help aid our environment.
				</p>
			</div>
		</div>
	</div>
</div>

<div class="wrap tc-white bg-repeat d-wrap" id="wrap-22">
		<div class="container wrap-lg">
			<div class="row">
				<div class="col-sm-12">
					<h6 class="text-center tc-white-2 mg-md">
						<span class="fa {{ Config::get('constants.ICON_GALLERY') }}"></span>
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
@stop
