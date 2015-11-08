<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>J.V. Equipment Admin Panel</title>

	{!! Html::style('/css/awesome-bootstrap-checkbox.css') !!}
	{!! Html::script('/js/jquery-2.1.0.min.js') !!}
	{!! Html::script('/js/bootstrap.js') !!}

	{!! Html::style('/css/bootstrap-datetimepicker.css') !!}
	{!! Html::script('/js/moment.js') !!}
	{!! Html::script('/js/bootstrap-datetimepicker.js') !!}

	{{--{!! Html::script('js/jquery.tablesorter.min.js') !!}--}}

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.js"></script>

	<!-- Latest compiled and minified Locales -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/locale/bootstrap-table-zh-CN.min.js"></script>

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

	<script type="text/javascript">
		$(document).ready(function () { /* Hide broken titles */
			$("img").error(function () {
				$(this).attr('src', '/img/image-not-found.gif');
			});
		});
	</script>

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
			{{--<li class="dropdown">
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
			--}}

			@if($objLoggedInUser->HasPermission('View/Orders'))
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa {{ Config::get('constants.ICON_INVOICE') }} "></i> Orders <b class="caret"></b></a>
				<ul class="dropdown-menu alert-dropdown">
					{{--<li>
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
					</li>--}}
					@if($objLoggedInUser->HasPermission('View/Orders'))
					<li>
						<a href="/admin/invoices/New">{{ $NewOrderCount }} <span class="label label-success pull-right">New</span></a>
					</li>
					<li>
						<a href="/admin/invoices/Assigned">{{ $AssignedOrderCount }} <span class="label label-primary pull-right">Assigned</span></a>
					</li>
					<li>
						<a href="/admin/invoices/Finalized">{{ $FinalizedOrderCount }} <span class="label label-danger pull-right">Finalized</span></a>
					</li>
					<li>
						<a href="/admin/invoices">{{ $TotalOrderCount }}<span class="label label-warning pull-right">Total</span></a>
					</li>
					@endif
				</ul>
			</li>
			@endif
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $objLoggedInUser->name  }} <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href="/admin/users/edit/{{ $objLoggedInUser->id }}"><i class="fa fa-fw fa-user"></i> Profile</a>
					</li>
					{{--<li>
						<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
					</li>--}}
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
				@if($objLoggedInUser->HasPermission('View/Users'))
				<li
					@if ($ActiveClass == 'Users')
						class="active"
					@endif
				>
					<a href="/admin/users"><i class="fa fa-fw {{ Config::get('constants.ICON_USERS') }}"></i> Users</a>
				</li>
				@endif
				@if($objLoggedInUser->HasPermission('View/Orders'))
				<li
					@if ($ActiveClass == 'Invoices')
						class="active"
					@endif
					>
					<a href="/admin/invoices"><i class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i> Orders</a>
				</li>
				@endif
				{{--
				@if($objLoggedInUser->HasPermission('View/AssignedOrders'))
					<li
						@if ($ActiveClass == 'Assigned Orders')
						class="active"
						@endif
						>
						<a href="/admin/invoices/Assigned"><i class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i>
							Assigned Orders</a>
					</li>
				@endif
				@if($objLoggedInUser->HasPermission('View/FinalizedOrders'))
					<li
						@if ($ActiveClass == 'Finalized Orders')
						class="active"
						@endif
						>
						<a href="/admin/invoices/Finalized"><i class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i> Finalized Orders</a>
					</li>
				@endif
				--}}
				@if($objLoggedInUser->HasPermission('View/Blog'))
				<li
					@if ($ActiveClass == 'Blog')
						class="active"
					@endif
				>
					<a href="/admin/blog"><i class="fa fa-fw {{ Config::get('constants.ICON_BLOG') }}"></i> Blog</a>
				</li>
				@endif
				@if($objLoggedInUser->HasPermission('View/Gallery'))
				<li
					@if ($ActiveClass == 'Gallery')
					class="active"
					@endif
					>
					<a href="/admin/gallery"><i class="fa fa-fw {{ Config::get('constants.ICON_GALLERY') }}"></i> Gallery</a>
				</li>
				@endif

				<li
					@if ($ActiveClass == 'Vacations')
					class="active"
					@endif
					>
					<a href="/admin/vacations"><i
							class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i>
						Vacation Request</a>
				</li>

				@if ($objLoggedInUser->IsAdmin())
				<li
					@if ($ActiveClass == 'Holidays')
					class="active"
					@endif
					>
					<a href="/admin/vacations/holidays"><i
							class="fa fa-fw {{ Config::get('constants.ICON_HOLIDAYS') }}"></i>
						Holidays</a>
				</li>
				@endif
				<li
					@if ($ActiveClass == 'Calendar')
					class="active"
					@endif
					>
					<a href="/admin/calendar"><i class="fa fa-fw {{ Config::get('constants.ICON_CALENDAR') }}"></i>
						Calendar</a>
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
			@if($FormResponse)
				<?php
					switch($FormResponse['ResponseType']) {
						case \App\Http\Controllers\AdminController::MESSAGE_ERROR :
							$AlertClass = 'alert-danger';
							$Pretext = "Error!";
							break;
						case \App\Http\Controllers\AdminController::MESSAGE_INFO :
							$AlertClass = 'alert-info';
							$Pretext = "Note!";
							break;
						case \App\Http\Controllers\AdminController::MESSAGE_SUCCESS :
							$AlertClass = 'alert-success';
							$Pretext = "Success!";
							break;
						case \App\Http\Controllers\AdminController::MESSAGE_WARNING :
							$AlertClass = 'alert-warning';
							$Pretext = "Warning!";
							break;
						default:
							$AlertClass = 'alert-info';
					}
				?>
				<div class="row">
					<div class="col-lg-12 alert {{ $AlertClass }} text-center">
						<h3><b>{{ $Pretext }}</b> {!! $FormResponse['Content'] !!}</h3>
					</div>
				</div>
			@endif
			@yield('content')
			</div>
		</div>
	</div>
</body>
</html>