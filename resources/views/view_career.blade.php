@extends('app')
@section('extra_header')
<style type="text/css">
	article.listing {
		position: relative;
		margin: 80px auto;

		padding: 40px 0;
		width: 90%;
		padding-left: 40px;
		background: #fff;
	}

	@media (min-width: 767px) {
		article.listing::before,
		article.listing::after {
			content: "";
			width: 100%;
			height: 100%;
			position: absolute;
			left: -2px;
			top: -5px;
			z-index: -1;
			-moz-transform: rotate(-1.5deg);
			-webkit-transform: rotate(-1.5deg);
			transform: rotate(-1.5deg);
		}

		article.listing::after {
			left: 0;
			-moz-transform: rotate(-1deg);
			-webkit-transform: rotate(-1deg);
			transform: rotate(-1deg);
		}

		article.listing,
		article.listing::before,
		article.listing::after {
			background: #fff;
			-moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
			-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
			box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
		}
	}
</style>
@stop
@section('content')
	<section class="career-single wrap career-single-bg">
		<div class="container wrap-xl" style="padding-top: 250px;">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="text-center mg-sm">{{ $objCareer->title }}</h2>
							{{-- <h3 class="text-center mg-lg"><span></span></h3> --}}
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<section class="values careers bg-cement-texture bg-repeat" style="background-image: url('/img/cement-texture.gif') !important;">
		<div class="container wrap-md">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1" style="border-radius: 4px; background-image: url('/img/sandpaper.png'); background-repeat: repeat; color: black">
					<article style="z-index: 10; font-size: 12px;" class="listing">
						<div class="row">
							<div class="col-xs-4 col-md-3">
								<b>Post Date</b>
							</div>
							<div class="col-xs-7 col-md-8">
								<b>{{ $objCareer->created_at->format('m/d/Y') }}</b>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-md-3">
								<b>Title</b>
							</div>
							<div class="col-xs-7 col-md-8">
								<b>{{ $objCareer->title }}</b>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-md-3">
								<b>Location</b>
							</div>
							<div class="col-xs-7 col-md-8">
								<b>{{ $objCareer->city }}, {{ $objCareer->state }}</b>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-3" >
								<b>Description</b>
							</div>
							<div class="col-xs-11 col-md-8">
								{!! str_replace("\r\n","<br />",$objCareer->description) !!}
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-xs-12 col-md-3">
								<b>Requirements</b>
							</div>
							<div class="col-xs-11 col-md-8">
								{!! str_replace("\r\n","<br />", $objCareer->requirements) !!}
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-xs-11">
							<i> We are an Equal Opportunity Employer.</i>
								<div class="row">
									<div class="col-lg-6 col-lg-offset-3 form-group">
										<i style='font-size: 12px;'>Upload Your Resume!</i><i style="font-size: 8px"></i>
										<form action="/forms/store" method="post" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="Id" value="{{$objCareer->id}}">
											<input type="hidden" name="Position" value="{{$objCareer->title}}">
											<input type="hidden" name="City" value="{{$objCareer->city}}">
											<input type="hidden" name="State" value="{{$objCareer->state}}">
											<input type="hidden" name="RequestType" value="Resume">
											<input type="file" name='Resume'>
											<button class="btn btn-default" type="submit"
													tabindex="9">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
		<section>

	@include('sections.locations')
@stop
