<section class="blog" id="blog">
  <div class="container">
    {{-- <div class="row"> --}}
      <div class="col-sm-12 wrap-md">
        <h2 class="text-center mg-sm">News &amp; Latest Information </h2>
        <h3 class="text-center mg-lg "><span style="">Company and Industry News</span> </h3>
      </div>
    {{-- </div> --}}

    <div class="container">


      @forelse($tBlogPosts as $objPost)
        <div class="media">
          <span class="media-object" style="background: url(img/blog_images/{{ $objPost->image_filename }}); background-position: center center; width: 320px; height: 200px; display: inline-block"></span>
          <div class="media-body">
            <h5 class="media-heading">{!! $objPost->title !!} </h5>
            <p>{!! $objPost->entry !!}</p>
          </div>
        </div>
        <span style="width: 100%; display: block; clear: both"></span>
        @empty @endforelse

      </div>
    </div>
</section>
