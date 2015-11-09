@extends('app') @section('content')
<section class="home-header">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 data-wow-duration="0.2s" data-wow-delay="1s" class="wow fadeInUp">Welcome to <strong style="text-transform: uppercase; letter-spacing: 1px; font-size: 200%;">JVEquipment</strong></h2>
        <p class="large wow fadeInUp" data-wow-delay="1.2s" data-wow-duration="0.4s">The Dealership Without Borders</p>
        <div class="row wow fadeInUp" data-wow-delay="1.4s" data-wow-duration="0.6s">
          <div class="col-md-6"> <a class="btn btn-primary">Get a Quote</a> <a class="btn btn-primary">View Our Inventory</a> </div>
        </div>
      </div>
      <div class="col-md-6" style="float: right; margin: 0px !important; padding: 0px !important">
        <div style="background-image: url(img/lift.png); width: 100%; height: 408px; visibility: visible; max-width: 432px; margin: 0px !important; background-position: right top !important; float: right !important;" data-wow-duration="0.5s" data-wow-delay="0.4s"
        class="wow fadeInUp"></div>
      </div>
    </div>
  </div>
</section>
@include('sections.blog_entry', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@include('sections.quote')
@include('sections.locations')
{{-- @include('sections.footer') --}}
@stop
