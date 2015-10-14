@extends('app')
@section('content')
<div class="wrap bg-banner-holder-3 d-wrap" id="wrap-16">
	<div class="container wrap-xl">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<h6 class="text-center tc-dodger-blue mg-md">
						</h6>
						<h2 class=" text-center mg-sm tc-white">
							Sales Department
						</h2>
						<h3 class="orange text-center mg-lg tc-saffron">
							<span>Serving You Since 1976.</span>
						</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrap tc-white  bg-cement-texture d-wrap bg-repeat" id="wrap-17">
	<div class="container wrap-lg">
		<div class="row">
			<div class="col-sm-12">
				<div class="row voffset">
					<div class="col-sm-12">
						<h6 class="text-center tc-dodger-blue mg-clear">
							<span class="fa fa-tasks icon icon-book icon-gears icon-magnifying-glass icon-552 icon-1951 icon-md animated fadeInDown animDelay02"></span>
						</h6>
						<h2 class=" text-center mg-sm tc-white">
							We provide parts for all makes and models of forklift as well as OEM for Nissan, Crown and more...
						</h2>
						<h3 class="orange text-center mg-lg tc-saffron">
							<span>Here are just a few of the benefits in depending on us for all your parts needs.</span>
						</h3>
						<div class="divider-h">
							<span class="divider"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row voffset">
			<div class="col-sm-12">
				<p class="text-center mg-lg">
					<strong>We are authorized dealers of Nissan Forklift, Crown, Landoll, Bendi, Drexel, Genie, MEC, Nilfisk-Advance, Heli, Manitou.</strong><br />If you are looking for used or new heavy loading equipment we have what you need. Our company has been in business since 1976 and we understand what it takes to leverage costs in a market that is constantly expanding. One thing you will discover with J.V. Equipment is that we provide customized solutions to meet the intense demands of the logistics / material handling industry.
				</p>
				<h2 class=" text-center tc-white mg-sm">
					Get a Sales Quote Today
				</h2>
				<h3 class="orange text-center mg-lg tc-saffron">
					<span>Click below to get started right now!</span>
				</h3>
				<div class="text-center">
					<a href="/forms/sales" class="btn btn-sq btn-d btn-xl">Click Here to Get Started</a>
				</div>
			</div>
		</div>
		@include('sections.gallery')
	</div>
</div>
@include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop