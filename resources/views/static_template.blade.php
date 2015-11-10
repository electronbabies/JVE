@extends('app') @section('content')
<section class="{{ $PageTitleSlug }} wrap {{ $PageTitleSlug }}-bg">
  <div class="container wrap-xl" style="padding-top: 250px">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="text-center mg-sm">{{ $headline }}</h2>
            <h3 class="text-center mg-lg"> <span>{{ $subhead }}</span> </h3> <a href="/forms/{{ $PageTitleSlug }}" class="hallow text-center btn btn-primary sectionButton">Get a {{ $PageTitle }} Quote</a> </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="values {{ $PageTitleSlug }} bg-cement-texture d-wrap bg-repeat">
  <div class="container wrap-md">
    <h3 class="text-center"><span style="font-size: 70%">Our {{ $PageTitle }} department offers some of these benefits.</span>

</h3> {{-- row start --}}
    <div class="row offset text-center wrap-md">
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-diamond fa-4x"></i>
        <h2 class="val">{{ $val1 }}</h2>
        <p class="valsub">{{ $valSub1 }}</p>
      </div>
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-database fa-4x"></i>
        <h2 class="val">{{ $val2 }}</h2>
        <p class="valsub">{{ $valSub2 }}</p>
      </div>
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-exchange fa-4x"></i>
        <h2 class="val">{{ $val3 }}</h2>
        <p class="valsub">{{ $valSub3 }}</p>
      </div>
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-cubes fa-4x"></i>
        <h2 class="val">{{ $val4 }}</h2>
        <p class="valsub">{{ $valSub4 }}</p>
      </div>
		</div> {{-- row start --}}
		<div class="row offset text-center wrap-md" style="padding-top: 20px; padding-bottom: 10px">
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-barcode fa-4x"></i>
        <h2 class="val">{{ $val5 }}</h2>
        <p class="valsub">{{ $valSub5 }}</p>
      </div>

      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-certificate fa-4x"></i>
        <h2 class="val">{{ $val6 }}</h2>
        <p class="valsub">{{ $valSub6 }}</p>
      </div>
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-compass fa-4x"></i>
        <h2 class="val">{{ $val7 }}</h2>
        <p class="valsub">{{ $valSub7 }}</p>
      </div>
      <div class="col-xs-12 col-sm-3"> <i style="color: #7faaed;" class="fa fa-calculator fa-4x"></i>
        <h2 class="val">{{ $val8 }}</h2>
        <p class="valsub">{{ $valSub8 }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p class="text-justify">{{ $PageText }} <br /><br /></p>
        <p class="text-center">
        	<a href="/forms/{{ $PageTitleSlug }}" style="font-weight: bold; color: #333" class="text-center btn btn-primary sectionButton">Get a {{ $PageTitleSlug }} quote!</a>
        </p>

      </div>
    </div>
  </div>
</section>

@include('sections.locations')


@stop
