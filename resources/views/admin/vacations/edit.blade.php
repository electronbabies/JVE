@extends('admin-app')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" id="BlogTitleHeader">
				Vacation Request
			</h1>
			<ol class="breadcrumb">
				<li>
					{{-- TODO:  Create functionality for breadcrumbs or manually keep writing them? --}}
					<i class="fa {{ Config::get('constants.ICON_DASHBOARD') }}"></i> <a href="/admin">Dashboard</a>
				</li>
				<li class="">
					<i class="fa {{ Config::get('constants.ICON_VACATION') }}"></i><a href="/admin/vacations"> Vacations</a>
				</li>
				<li class="active">
					<i class="fa {{ Config::get('constants.ICON_EDIT') }}"></i> New Vacation Request
				</li>
			</ol>
		</div>
	</div>
	<form action="/admin/vacations/store" method="post" enctype="multipart/form-data">
		<input type="hidden" value="{{ $objRequest->id }}" name="VacationID">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4 col-lg-offset-1">
				<label>From</label>
				<div class="input-group date" id="DateTimePickerFrom">
					<input class="form-control" name='From'>
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4 col-lg-offset-1">
				<label>To</label>
					<div class="input-group date" id="DateTimePickerTo">
						<input class="form-control" type="text" name='To'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
                    	</span>
					</div>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="form-group">
						<label>Comments</label>
						<textarea class="form-control" rows=3 name="Comments">{{ $objRequest->comments }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 form-group">
				<button type="submit" class="btn btn-lg btn-primary center-block">Save Vacation Request</button>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		$(function () {
			$('#DateTimePickerFrom').datetimepicker({
				defaultDate: "{{ $objRequest->from->format('m/d/Y') }}",
			});
		});
		$(function () {
			$('#DateTimePickerTo').datetimepicker({
				defaultDate: "{{ $objRequest->to->format('m/d/Y') }}",
			});
		});
	</script>
@stop