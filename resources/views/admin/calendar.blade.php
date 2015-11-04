@extends('admin.admin-app')

@section('extra_header')
	{{-- <link rel="stylesheet" href="/css/bootstrap-responsive.css">--}}
	<link rel="stylesheet" href="/css/calendar.css">
@stop

@section('content')
	<div class="row">
		<div class="col-lg-12">
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
	</div>

	<div class="row">
		<div class="col-lg-12 col-lg-offset-5">
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