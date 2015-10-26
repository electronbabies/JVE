<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>J.V. Equipment Admin Panel</title>

	{!! Html::style('css/awesome-bootstrap-checkbox.css') !!}
	{!! Html::script('js/jquery-2.1.0.min.js') !!}
	{!! Html::script('js/bootstrap.js') !!}

	{!! Html::style('css/bootstrap-datetimepicker.css') !!}
	{!! Html::script('js/moment.js') !!}
	{!! Html::script('js/bootstrap-datetimepicker.js') !!}

	<!-- Morris Charts JavaScript -->
	{{-- !!}{!! Html::script('js/plugins/morris/raphael.min.js') !!}
	{!! Html::script('js/plugins/morris/morris.min.js') !!}
	{!! Html::script('js/plugins/morris/morris-data.js') !!} --}}

	<!-- Bootstrap Core CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="/css/sb-admin.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	{{-- Any specific header information on a dashboard page not needed globally --}}
	@yield('extra_header')

</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/admin">J.V. Dashboard</a>
		</div>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b
						class="caret"></b></a>
				<ul class="dropdown-menu message-dropdown">
					<li class="message-preview">
						<a href="#">
							<div class="media">
										<span class="pull-left">
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>

								<div class="media-body">
									<h5 class="media-heading"><strong>{{ $objLoggedInUser->name }} }}</strong>
									</h5>

									<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>

									<p>Lorem ipsum dolor sit amet, consectetur...</p>
								</div>
							</div>
						</a>
					</li>
					<li class="message-preview">
						<a href="#">
							<div class="media">
										<span class="pull-left">
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>

								<div class="media-body">
									<h5 class="media-heading"><strong>{{ $objLoggedInUser->name }}</strong>
									</h5>

									<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>

									<p>Lorem ipsum dolor sit amet, consectetur...</p>
								</div>
							</div>
						</a>
					</li>
					<li class="message-preview">
						<a href="#">
							<div class="media">
										<span class="pull-left">
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>

								<div class="media-body">
									<h5 class="media-heading"><strong>{{ $objLoggedInUser->name }}</strong>
									</h5>

									<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>

									<p>Lorem ipsum dolor sit amet, consectetur...</p>
								</div>
							</div>
						</a>
					</li>
					<li class="message-footer">
						<a href="#">Read All New Messages</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
				<ul class="dropdown-menu alert-dropdown">
					<li>
						<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">View All</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $objLoggedInUser->name  }} <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="/auth/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav">
				<li
					@if ($ActiveClass == 'Dashboard')
						class="active"
					@endif
				>
					<a href="/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
				</li>
				<li
					@if ($ActiveClass == 'Users')
						class="active"
					@endif
				>
					<a href="/admin/users"><i class="fa fa-fw {{ Config::get('constants.ICON_USERS') }}"></i> Users</a>
				</li>
				<li
					@if ($ActiveClass == 'Invoices')
						class="active"
					@endif
					>
					<a href="/admin/invoices"><i class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i> Orders</a>

				</li>
				<li
					@if ($ActiveClass == 'Calendar')
						class="active"
					@endif
				>
					<a href="/admin/calendar"><i class="fa fa-fw {{ Config::get('constants.ICON_CALENDAR') }}"></i> Calendar</a>
				</li>
				<li
					@if ($ActiveClass == 'Blog')
						class="active"
					@endif
				>
					<a href="/admin/blog"><i class="fa fa-fw {{ Config::get('constants.ICON_BLOG') }}"></i> Blog</a>
				</li>
				<li
					@if ($ActiveClass == 'Gallery')
					class="active"
					@endif
					>
					<a href="/admin/gallery"><i class="fa fa-fw {{ Config::get('constants.ICON_GALLERY') }}"></i> Gallery</a>
				</li>
				<li
					@if ($ActiveClass == 'Vacations')
					class="active"
					@endif
					>
					<a href="/admin/vacations"><i
							class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i>
						Vacation Request</a>
				</li>
				<li>
					<a href="/"><i class="fa fa-fw {{ Config::get('constants.ICON_WEBSITE') }}"></i> Public Site</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</nav>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
			@yield('content')
			</div>
		</div>
	</div>
</body>
</html>