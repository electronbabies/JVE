<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Forkift Rental">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

		{!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/main.css') !!}
		{!! Html::style('css/site.css') !!}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/ionicons.min.css') !!}
    {!! Html::style('css/et-line.min.css') !!}
  	{!! Html::style('css/awesome-bootstrap-checkbox.css') !!}

	  {!! Html::script('js/jquery-2.1.0.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
		{!! Html::script('js/custom.js') !!}

	<!-- <script type="text/javascript"> function googleTranslateElementInit() { new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); } </script> -->
	<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
    @yield('extra_header')
    <title>J.V. Equipment</title>
</head>
<body>
    <div class="page-container">
        @include('sections.header')
        @yield('content')
		@include('sections.locations')
		@include('sections.footer')

	</div>
</body>
</html>
