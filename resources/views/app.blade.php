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
	{!! Html::style('css/awesome-bootstrap-checkbox.css') !!}
    {!! Html::script('js/jquery-2.1.0.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    @yield('extra_header')
    <title>J.V. Equipment</title>
</head>
<body>
    <div class="page-container">
        @include('sections.navigation')
        @yield('content')
    </div>
</body>
</html>