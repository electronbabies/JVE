@extends('app')
@section('extra_header')
	<style>
		.fullstyle, header, nav#nav {
			display: none !important;
		}

		label {
			color: #333 !important;
		}

		body {
			background-color: #21385e;
		}

	</style>
@stop


@section('content')
<div class="container wrap-xs">
        <div class="row voffset">
          <div class="col-xs-12">
            <h2 class=" text-center tc-white mg-sm" style="color: white;"> Reset Password </h2>
          </div>

		<div class="col-xs-6 col-xs-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading"><img alt="logo" src="/img/logo-color2.png" class="center-block"></div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						{!! csrf_field() !!}

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-xs-8">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Send Password Reset Link
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection