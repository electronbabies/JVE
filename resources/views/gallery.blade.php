@extends('app')

@section('content')
    <div class="wrap bg-banner-holder-4 d-wrap">
        <div class="container wrap-lg">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-center tc-dodger-blue mg-md">
                            </h6>

                            <h2 class=" text-center mg-sm tc-white">
                                Our Warehouse
                            </h2>

                            <h3 class="orange text-center mg-lg tc-saffron">
                                <span>Sub text here?</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap tc-white bg-cement-texture d-wrap bg-repeat" id="team-section">
        <div class="container wrap-lg">
        <?php $Count = 0; ?>
        @foreach($tGalleryImages as $objImage)
            <?php $Count++;
                if($Count % 6 == 1)
                    echo '<div class="row">';
            ?>
                <div class="col-lg-2" style="height: 200px;">
                    <a href="/gallery/view/{{ $objImage->id }}" target="_blank"><img class="img-thumbnail" src="/img/gallery_images/{{ $objImage->image_filename }}" style="max-height: 90%;"></a>
                </div>
            <?php
                if($Count % 6 == 0 || count($tGalleryImages) == $Count)
                    echo '</div>';
            ?>
        @endforeach
        </div>
    </div>
    @include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop
