@section('extra_header')
<style>
	@foreach($tBlogPosts as $objPost)
		@if($objPost->css)
	    	#Image{{$objPost->id}} {
	    		{{ $objPost->css }}
	    	}
	    @endif
	@endforeach
</style>
@stop
<section class="blog" id="blog">
  <div class="container">
    {{-- <div class="row"> --}}
      <div class="col-sm-12 wrap-md">
        <h2 class="text-center mg-sm">News &amp; Latest Information </h2>
        <h3 class="text-center mg-lg "><span style="">Company and Industry News</span> </h3>
      </div>
    {{-- </div> --}}

    <div class="container">
      @foreach($tBlogPosts as $objPost)
        <div class="media">
        	<div class="row voffset">
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
					<img id="Image{{ $objPost->id}}" alt="{{ $objPost->title }}" class='img-thumbnail' style="display:block; width:100%;" src='img/blog_images/{{ $objPost->image_filename }}' />
					{{--<div class="media-object" style="background: url('img/blog_images/{{ $objPost->image_filename }}'); background-position: center; width: 320px; height: 200px; border-radius: 8px;"></div>--}}
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8 voffset-md">
					<h3 class="media-heading text-center">{!! $objPost->title !!} </h3>
					<hr>
					<p style="font-size:16px;" class="text-justify">{!! $objPost->entry !!}</p>
				</div>
			</div>
		</div>
		<span style="width: 100%; display: block; clear: both"></span>
        @endforeach
      </div>
    </div>
</section>
