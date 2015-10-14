<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Forkift Rental">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet'  type='text/css'>
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/site.css') !!}
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/ionicons.min.css') !!}
    {!! Html::style('css/et-line.min.css') !!}
    {!! Html::script('js/jquery-2.1.0.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    {!! Html::script('js/jssor.js') !!}
    {!! Html::script('js/jssor.slider.js') !!}
    @yield('extra_header')
    <script>

    jQuery(document).ready(function ($) {
        var options = {
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            }
        };
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);
    });
    </script>

    <title>J.V. Equipment</title>
</head>
<body>
    <div class="page-container">
        @include('sections.navigation')
        @yield('content')
    </div>
</body>
</html>