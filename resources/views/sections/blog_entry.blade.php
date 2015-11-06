<section class="blog" id="blog">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
                  <h6 class="text-center white mg-md">
                      <span style="color: #ffffff; padding-top: 50px" class="fa fa-newspaper-o icon icon-book icon-gears icon-magnifying-glass icon-md"></span>
                  </h6>
                  <h2 class="text-center mg-sm">
                      News &amp; Latest Information
                  </h2>
                  <h3 class="text-center mg-lg ">
                      <span style="color: #FF9100">Stay up to date with  JVEquipment?</span>
                  </h3>
              </div>
    </div>

    <div class="container">
    <div class="row">

      @forelse($tBlogPosts as $objPost)
      <div class="col-md-4 wow fadeInUp" data-wow-duration="2s"> <!-- Loop -->
        <div class="post">
          <div class="post-heading"> <a class="post-image" href="#"> <img src="img/blog_images/{{ $objPost->image_filename }}" alt="post" width="360" height="230"> </a> </div>
          <div class="post-body">
            <h5> {!! $objPost->title !!} </h5>
            <p> {!! $objPost->entry !!} </p>
          </div>
        </div>
      </div>
      @empty
      @endforelse

    </div>
  </div>
</div>
</section>
