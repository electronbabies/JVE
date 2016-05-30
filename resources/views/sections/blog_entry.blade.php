@section('extra_header')
<style>
	@foreach($tBlogPosts as $objPost)
		@if($objPost->css)
	    	{{ $objPost->css }}
	    @endif
	@endforeach
</style>
@stop
<section class="blog" id="blog">
  <div class="container">
    {{-- <div class="row"> --}}
      <div class="col-sm-12" style="margin-top: 20px;">
        <h2 class="text-center mg-sm" style="margin-bottom: 20px;">News &amp; Latest Information </h2>
        <!-- <h3 class="text-center mg-lg" style="margin-bottom: 20px; margin-top: 15px;"><span style=""><div class="btn-group btn-block header-img" style="width: 200px;"><a style="padding: 10px; color: white" href="/forms/service" class="a-btn ">View Latest News</a></div></span> </h3> -->
        
      </div>
    {{-- </div> --}}

    <div class="container">

      <!--
        <div class="media">
        	<div class="row voffset">
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
					<img id="Image{{ $objPost->id}}" alt="{{ $objPost->title }}" class='img-thumbnail' style="display:block; width:100%;" src='img/blog_images/{{ $objPost->image_filename }}' />
					{{--<div class="media-object" style="background: url('img/blog_images/{{ $objPost->image_filename }}'); background-position: center; width: 320px; height: 200px; border-radius: 8px;"></div>--}}
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8 voffset-md">
					<h3 class="media-heading text-center">{!! $objPost->title !!} </h3>
					<hr>
					<p style="font-size:16px;" class="text-justify media-entry">{!! $objPost->entry !!}</p>
				</div>
			</div>
		</div>
		<span style="width: 100%; display: block; clear: both"></span>
		-->
		<?php
			$ColumnSize = 4;
			/*if(count($tBlogPosts) % 3 == 0)
				$ColumnSize = 4;
			if (count($tBlogPosts) % 4 == 0)
				$ColumnSize = 3;*/

			// ^^ Deal w/ that once colors / layout are nice
			$NonFirstRowOffset = 'col-lg-offset-1 col-md-offset-1 col-sm-offset-1';
			$NonFirstRowOffset = '';
			$Count = 0;
		?>
		<div class="media">
			<div class="row voffset">
				@foreach($tBlogPosts as $objPost)
				<div class="col-xs-12 col-sm-{{ $ColumnSize }} col-md-{{ $ColumnSize }} col-lg-{{ $ColumnSize }}">
					<div class="blogentrycontainer">
						<div class="blogimagesection">
							<img id="Image{{ $objPost->id}}" alt="{{ $objPost->title }}" class='img-thumbnail' style="display:block; width:100%;" src='img/blog_images/{{ $objPost->image_filename }}'/>
							{{--<div class="media-object" style="background: url('img/blog_images/{{ $objPost->image_filename }}'); background-position: center; width: 320px; height: 200px; border-radius: 8px;"></div>--}}
							<h4 class="media-heading text-center" style="margin-top: 10px;">{!! $objPost->title !!} </h4>
						</div>
						<hr style="margin-top: 20px; margin-bottom: 20px;">
						<p style="margin: 0 0 0 0; font-size:16px; line-height: 150%;" class="text-justify media-entry">{!! substr($objPost->entry, 0, 200) !!}...</p>
					</div>
				</div>
				<?php $Count++; ?>
				@endforeach
			</div>
		</div>
		<span style="width: 100%; display: block; clear: both"></span>

      </div>
    </div>
</section>
