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

	.blog-image {
		height: 300px;
	}

	.blogentrycontainer a:link {
		color: blue;
	}
	.blogentrycontainer a:visited {
		color: purple;
	}
	.blogentrycontainer a:active {
		color: red;
	}
</style>
@stop
@section('content')


<section class="wrap blog" style="padding-top: 100px;">
	<div class="container wrap-xl" style="margin-top: 60px;">
		<h1 class="text-center">JVEquipment News</h1>
		<hr />
		<?php $Count = 0; ?>
		@foreach($tAllPosts as $objPost)
			<?php $Count++; ?>
			<div class="row">
				<div class="col-xs-12">
					<h2 class="text-center">{!! $objPost->title !!}</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3">
					<img class="center-block img-thumbnail blog-image" src='/img/blog_images/{{ $objPost->image_filename }}' />
				</div>
				<div class="col-xs-9">
					<div class="row">
						<div class="col-sm-12 text-justify blogentrycontainer" style="">
							{!! substr($objPost->entry, 0, 1000) !!}
							<?php
								if(strlen($objPost->entry) > 1000)
									echo "... <a href='/news_entry/view/{$objPost->id}'>Click here to read more</a>";
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3 text-center" >
					<em style="font-size: 12px;">Created: {{ date('m/d/Y', strtotime($objPost->created_at)) }}</em><br />


					<?php if($objPost->created_at != $objPost->updated_at) { ?>
						<em style="font-size: 12px;">Updated: {{ date('m/d/Y', strtotime($objPost->updated_at)) }}</em>
					<?php } ?>
				</div>
			</div>

			<?php if($Count < count($tAllPosts)) echo "<hr />"; ?>
		@endforeach
	</div>
</section>

@stop

