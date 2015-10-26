@extends('app')

@section('content')

<div class="wrap tc-white bg-repeat d-wrap">
	<div class="container wrap-md">
		<div class="row">
			<div class="col-sm-12">
				<h6 class="text-center tc-white-2 mg-md">
					<span class="fa fa-plug icon icon-book icon-gears icon-magnifying-glass icon-md"></span>
				</h6>
				<h2 class=" text-center tc-white mg-sm">
					Contact Us
				</h2>
				<h3 class="orange text-center mg-lg tc-saffron">
					<span>Service Department</span>
				</h3>
				<div class="divider-h">
					<span class="divider"></span>
				</div>
				<form action="/forms/store" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="RequestType" value="Service">
					<div class="row">
						<div class="col-sm-12">
							<div class="row voffset-sm">
								<div class="col-sm-2"></div>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-12">
										</div>
									</div>
									<div class="center">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														First Name
													</label>
													<input class="form-control" tabindex="1" name="FirstName" value="{{ $objUser->first_name }}" />
												</div>
												<div class="form-group">
													<label>
														Company Name
													</label>
													<input class="form-control" tabindex="3" name="CompanyName" value="{{ $objUser->company_name }}" />
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Last Name
													</label>
													<input class="form-control" tabindex="2" name="LastName" value="{{ $objUser->last_name }}" />
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Make
															</label>
															<input class="form-control" tabindex="4" name="Make" />
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Model
															</label>
															<input class="form-control" tabindex="5" name="Model" />
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Phone Number
													</label>
													<input class="form-control" tabindex="6" name="PhoneNumber" value="{{ $objUser->phone }}"/>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Email Address
													</label>
													<input class="form-control" tabindex="7" name="EmailAddress" value="{{ $objUser->email }}"/>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>
												Service Request
											</label>
											<textarea class="form-control" rows="4" cols="50" tabindex="8" name="Comments"></textarea>
										</div>
										<button class="wrap-button btn btn-d btn-lg btn-block" type="submit" tabindex="9">
											Submit
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="divider-h">
			<span class="divider"></span>
		</div>
	</div>
</div>

@include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )

@stop