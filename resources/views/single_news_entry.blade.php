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
	h1, h2, h3, h4 {
		color: #999;
	}

	em {
		display: inline-block;
		color: #ccc;
		margin-right: 10px;
	}
	.blog-entry{
		background-color: #fff;
		border: 1px solid #999;
		padding-top: 10px;
		padding-bottom: 10px;
		line-height: 1.1;
	}
	.blog-entry img{
		border: none;
		padding: 0;
		margin-bottom: 10px;
	}
	.blog-entry hr{
		margin: 10px;
	}
	.blog-entry .title{
		font-size: 28px;
		color: #999;
	}
	.blog-entry .btn{
		margin: 15px 25% 0;
		width: 100px;
	}
</style>
@stop
@section('content')


<section class="wrap blog blog-entry">
	<div class="container wrap-xl" style="margin-top: 60px;">
		<img class="center-block img-thumbnail" style="margin-top: 70px;" src='/img/blog_images/{{ $objPost->image_filename }}' />
		<div class="title text-center"><em>{{ date('d M', strtotime($objPost->updated_at)) }}</em>{!! $objPost->title !!}</div>
		<hr />
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 text-justify" style="margin-top: 30px;">
						{!! $objPost->entry !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop

