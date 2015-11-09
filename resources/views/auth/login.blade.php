{{-- @extends('app') --}}

{{-- @section('content') --}}



<div class="container wrap-md">
        <div class="row voffset">
          <div class="col-sm-12">
            <h2 class=" text-center tc-white mg-sm"> Login </h2>
          </div>
        </div>
        <div class="row">
          <div class="text-center col-md-4 col-md-offset-4">
            <div class="row voffset-md">

							<div class="panel panel-default">
								<div class="panel-heading"><img alt="logo" src="/img/logo-color2.png" class=""></div>
								<div class="panel-body">
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

									<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
										{!! csrf_field() !!}

										<div class="form-group" style="padding-top: 10px">
											<div class="col-md-12">
												<input type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required>
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-12">
												<input type="password" class="form-control" placeholder="Password" name="password" required>
											</div>
										</div>

										<div class="form-group" style="float:left">
											<div class="col-md-12" style="float:left">
												<div class="checkbox checkbox-info checkbox-circle">
													<input type="checkbox" name="remember">
													<label style="color: #333333">
														Remember Me
													</label>
												</div>
											</div>
										</div>
										<div class="form-group" style="text-align: left">
											<div class="col-md-12">
												<button type="submit" class="btn btn-primary">Login</button>

												<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
											</div>
										</div>
									</form>
								</div>
							</div>


          </div>
        </div>
      </div>
<style>
.fullstyle, header, nav#nav { display: none !important;  }
</style>
{{-- @endsection --}}
