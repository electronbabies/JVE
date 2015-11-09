@extends('app') @section('content')
<section class="{{ $PageTitleSlug }} wrap {{ $PageTitleSlug }}-bg">
  <div class="container wrap-xl" style="padding-top: 250px">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="text-center mg-sm">{{ $headline }}</h2>
            <h3 class="text-center mg-lg"> <span>{{ $subhead }}</span> </h3>
						{{-- <a href="/forms/{{ $PageTitleSlug }}" class="hallow text-center btn btn-primary sectionButton">Get a {{ $PageTitle }} Quote</a>  --}}
					</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="values {{ $PageTitleSlug }} bg-cement-texture d-wrap bg-repeat">
  <div class="container wrap-md">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">{{ $PageText }} <br /><br />
          <a href="/forms/{{ $PageTitleSlug }}" style="font-weight: bold; color: #333" class="text-center btn btn-primary sectionButton">Get a {{ $PageTitleSlug }} quote today!</a>   </p>
      </div>
    </div>
  </div>
</section>

{{-- @include('sections.quote') --}}
{{-- @include('sections.locations') --}}


@stop
