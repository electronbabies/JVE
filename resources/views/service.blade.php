@extends('app')
@section('content')
<div class="wrap  bg-banner-holder-1 d-wrap" id="wrap-10">
	<div class="container wrap-xl">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<h6 class="text-center tc-dodger-blue mg-md">
						</h6>
						<h2 class=" text-center mg-sm tc-white">
							Service Department
						</h2>
						<h3 class="orange text-center mg-lg tc-saffron">
							<span>We provide award winning service.</span>
						</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wrap tc-white  bg-cement-texture d-wrap bg-repeat" id="team-section">
	<div class="container wrap-lg">
		<div class="row">
			<div class="col-sm-12">
				<div class="row voffset">
					<div class="col-sm-12">
						<h6 class="text-center tc-dodger-blue mg-clear">
							<span class="fa fa-plug icon icon-book icon-gears icon-magnifying-glass icon-552 icon-1951 icon-md animated fadeInDown animDelay02"></span>
						</h6>
						<h2 class=" text-center mg-sm tc-white">
							We provide award winning service.
						</h2>
						<h3 class="orange text-center mg-lg tc-saffron">
							<span>J.V. Equipment has been in business since 1976. Our service department offers some of these benefits.</span>
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
				<p class="text-center">
					<span>At J.V. Equipment, Inc. we understand that your business is built upon the ability to keep products moving. With over 38 years of forklift sales and service experience we are the premiere forklift dealership in South Texas. We are ready to help meet your critical forklift needs. With J.V. Equipment you get an award winning company that is ready to go above and beyond to help your business succeed. We want you to know that your success is our success.</span>
				</p>
			</div>
		</div>
		<div class="row voffset">
			<div class="col-sm-6">
				<div class="col-sm-9">
					<h3 class="orange text-right mg-md">
						<span>Award Winning Service Team</span>
					</h3>
					<p class="text-right">
						A little feature description could go here.
					</p>
				</div>
				<div class="col-sm-3">
					<div class="text-center">
						<span class="fa fa-heart icon-round icon-md"></span>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-3">
					<div class="text-center">
						<span class="fa fa-rocket icon-round icon-md"></span>
					</div>
				</div>
				<div class="col-sm-9">
					<h3 class="orange mg-md">
						<span>Factory Trained and Certified Technicians</span>
					</h3>
					<p>
						A little feature description could go here.
					</p>
				</div>
			</div>
		</div>
		<div class="row voffset">
			<div class="col-sm-6">
				<div class="col-sm-9">
					<h3 class="orange text-right mg-md">
						<span>Rapid Response Time</span>
					</h3>
					<p class="text-right">
						A little feature description could go here.
					</p>
				</div>
				<div class="col-sm-3">
					<div class="text-center">
						<span class="fa fa-heart icon-round icon-md"></span>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-3">
					<div class="text-center">
						<span class="fa fa-rocket icon-round icon-md"></span>
					</div>
				</div>
				<div class="col-sm-9">
					<h3 class="orange mg-md">
						<span>Focus On Quality Control</span>
					</h3>
					<p>
						A little feature description could go here.
					</p>
				</div>
			</div>
		</div>
		<div class="row voffset">
			<div class="col-sm-6">
				<div class="col-sm-9">
					<h3 class="orange text-right mg-md">
						<span>Concern For Optimum Efficiency and Safety</span>
					</h3>
					<p class="text-right">
						A little feature description could go here.
					</p>
				</div>
				<div class="col-sm-3">
					<div class="text-center">
						<span class="fa fa-heart icon-round icon-md"></span>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-3">
					<div class="text-center">
						<span class="fa fa-rocket icon-round icon-md"></span>
					</div>
				</div>
				<div class="col-sm-9">
					<h3 class="orange mg-md">
						<span>Dedicated Staff</span>
					</h3>
					<p>
						A little feature description could go here.
					</p>
				</div>
			</div>
		</div>
		@include('sections.gallery')
		<div class="row voffset-lg">
			<div class="col-sm-12">
				<h6 class="text-center tc-white-2 mg-md">
					<span class="fa fa-bicycle icon icon-book icon-gears icon-magnifying-glass icon-md"></span>
				</h6>
				<h2 class=" text-center tc-white mg-sm">
					Get a Quote Today
				</h2>
				<h3 class="orange text-center mg-lg tc-saffron">
					<span>What kind of quote would you like today?</span>
				</h3>
				<div class="text-center">
					<a href="/forms/service" class="btn btn-sq btn-d btn-xl">Click Here to Get Started</a>
				</div>
			</div>
		</div>
	</div>
</div>
@include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop