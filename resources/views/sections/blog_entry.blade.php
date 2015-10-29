<div class="wrap {{ $BGColor or Config::get('constants.COLOR_DARK_BLUE') }} d-wrap">
    <!-- Title -->
    <div class="container wrap-md transparent rounded-corners">
<?php $Count = 0; ?>

@forelse($tBlogPosts as $objPost)
    <?php
        // So annoying that laravel doesn't have an iteration count!
        $Count++;
        if($Count % 2 == 1)
            echo '<div class="row blog">';
    ?>
        <div class="col-sm-3">
            <img src="img/blog_images/{{ $objPost->image_filename }}" class="blog_image img-rounded center-block" style="padding-left: {{ $objPost->x_offset }}px; padding-top: {{ $objPost->y_offset }}px;" />
        </div>
        <div class="col-sm-3">
            <h5 class="text-center">
                {!! $objPost->title !!}
            </h5>
            <p class="text-justify">
                {!! $objPost->entry !!}
            </p>
        </div>

    <?php
        if ($Count % 2 == 0 || $Count == count($tBlogPosts))
            echo '</div>';

        if ($Count % 2 == 0 && ($Count) != count($tBlogPosts))
            echo '
                <div class="divider-h">
                    <span class="divider"></span>
                </div>
            ';
    ?>
@empty
{{-- Nothing atm --}}
@endforelse

    </div>
</div>
