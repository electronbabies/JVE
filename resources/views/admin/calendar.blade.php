@extends('admin.admin-app')

@section('extra_header')
	{{-- <link rel="stylesheet" href="/css/bootstrap-responsive.css">--}}
	<link rel="stylesheet" href="/css/calendar.css">

	<style type="text/css">
		.full-circle {
			background-color: #c06;
			height: 15px;
			-moz-border-radius: 75px;
			-webkit-border-radius: 75px;
			width: 15px;
			margin-top: 2px;
		}
		.holiday {
			background-color: #800080 !important;
		}

		.new-client {
			background-color: #1e90ff !important;
		}

		.pending-vacation {
			background-color: #e3bc08 !important;
		}

		.approved-vacation {
			background-color: #006400 !important;
		}


	</style>
@stop

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h1 class="page-header">
				Calendar
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_CALENDAR') }}"></i> Calendar
				</li>
			</ol>
		</div>
	</div>
	{{--<div class="row">
		<div class="col-lg-12 col-lg-offset-5">
			<div class="pull-center form-inline" style="padding-left:21px;">
				<div class="row">
					<div class="btn-group" style="padding-bottom:10px;">
						<button class="btn btn-warning" data-calendar-view="year">Year</button>
						<button class="btn btn-warning active" data-calendar-view="month">Month</button>
						<button class="btn btn-warning" data-calendar-view="week">Week</button>
						<button class="btn btn-warning" data-calendar-view="day">Day</button>
					</div>
				</div>
				<div class="row">
					<div class="btn-group" style="padding-left:10px;">
						<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
						<button class="btn" data-calendar-nav="today">Today</button>
						<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
					</div>
				</div>
			</div>
		</div>
	</div>--}}
	<div class="row">
		<div class="page-header">
		{{-- Date goes in H3 tag --}}
		<h3 class='text-center' style='font-size: 38px; font-weight: bold;'></h3>
	</div>


	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div id="calendar"></div>
		</div>
		<div class="col-lg-2">
			<h2>Key:</h2>
			<div class="row">
				<div class="col-lg-2">
					<p class="full-circle holiday"></p>
				</div>
				<div class="col-lg-9">
					Holiday
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<p class="full-circle new-client"></p>
				</div>
				<div class="col-lg-9">
					New Client
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<p class="full-circle pending-vacation"></p>
				</div>
				<div class="col-lg-9">
					Pending Vacation
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<p class="full-circle approved-vacation"></p>
				</div>
				<div class="col-lg-9">
					Approved Vacation
				</div>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-7 col-xs-offset-3 col-sm-offset-5">
			<div class="pull-center form-inline" style="padding-left:21px;">
				<div class="row">
					<div class="btn-group" style="padding-left:10px; padding-bottom:10px; padding-top:20px;">
						<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
						<button class="btn" data-calendar-nav="today">Today</button>
						<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
					</div>
				</div>
				<div class="row">
					<div class="btn-group" style="">
						<button class="btn btn-warning" data-calendar-view="year">Year</button>
						<button class="btn btn-warning active" data-calendar-view="month">Month</button>
						<button class="btn btn-warning" data-calendar-view="week">Week</button>
						<button class="btn btn-warning" data-calendar-view="day">Day</button>
					</div>
				</div>


			</div>
		</div>
	</div>

	<script type="text/javascript" src="/js/underscore/underscore-min.js"></script>
	<script type="text/javascript" src="/js/calendar/calendar.js"></script>
	<script type="text/javascript" src="/js/calendar/app.js"></script>

</div>
@stop