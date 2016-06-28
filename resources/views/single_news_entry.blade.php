@extends('app')
@section('extra_header')
<style>
	hr {
		opacity: .1;
	}
	h1 p span {
		font-size: 50px !important;
	}
	h1 {

		margin-bottom: 60px;
	}

</style>
@stop
@section('content')


<section class="wrap blog" style="padding-top: 100px;">
	<div class="container wrap-xl" style="margin-top: 60px;">
		<h1 class="text-center">{!! $objPost->title !!}</h1>
		<hr />
		<img class="center-block img-thumbnail" style="margin-top: 70px;" src='/img/blog_images/{{ $objPost->image_filename }}' />
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 text-justify" style="margin-top: 70px;">
						{!! $objPost->entry !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop

