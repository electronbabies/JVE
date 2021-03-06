@extends('app')

@section('content')
<section class="parts-quote wrap parts-quote-bg" style="background-color: #00AFF0;">
  <div class="container wrap-xl parts-header-div" style="padding: 150px;padding-bottom: 0px;">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12 text-center" style="margin-top: 35px;">
            <h2 class="text-center mg-sm" style="color: white;">Parts Quote</h2>
            <h3 class="text-center mg-lg"> <span style="color: white;">Contact us today about your parts quote</span> </h3>  </div>
        </div>
      </div>
    </div>
  </div>
</section>


	<div class="wrap bg-repeat " style="background-color: #00AFF0; color:white;">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="container wrap-md">
			<div class="row">
				<div class="col-sm-12">
					<form action="/forms/store" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="RequestType" value="Parts">

						<div class="row">
							<div class="col-sm-12">
								<div class="row voffset-sm">
										<div class="center">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>
															First Name
														</label>
														<input class="form-control" tabindex="1" name="FirstName" value="{{ $objUser->first_name }}" required/>
													</div>
													<div class="form-group">
														<label>
															Company Name
														</label>
														<input class="form-control" tabindex="3" name="CompanyName" value="{{ $objUser->company_name}}"/>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>
															Last Name
														</label>
														<input class="form-control" tabindex="2" name="LastName" value="{{ $objUser->last_name }}" required/>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>
																	Make
																</label>
																<input class="form-control" tabindex="4" name="Make"/>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>
																	Model
																</label>
																<input class="form-control" tabindex="5" name="Model"/>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>
																	Phone Number
																</label>
																<input class="form-control" tabindex="6" name="PhoneNumber" value="{{ $objUser->phone }}" required/>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>
																	Email Address
																</label>
																<input class="form-control" tabindex="7" name="EmailAddress" value="{{ $objUser->email }}" required/>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>
															Serial Number
														</label>
														<input class="form-control" tabindex="8" name="SerialNumber"/>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>
													Part(s) Needed:  (Please include serial numbers)
												</label>
												<textarea class="form-control" rows="4" cols="50" tabindex="9"
														  name="Comments"></textarea>
											</div>
											<button class="wrap-button btn btn-d btn-lg btn-block form-button" type="submit"
													tabindex="9">
												Submit
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						</div>
				</div>
			</div>
		</div>

	@include('sections.locations')

@stop
