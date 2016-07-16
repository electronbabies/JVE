@extends('app')
@section('extra_header')
	<style type="text/css">
		.FormHeader {
			background-color: rgba(50,50,50,.4);
			height: 100px;
			padding-top: 13px;
			border-radius: 8px;
			padding-left: 25px;
			margin-top: 40px;
			margin-bottom: 40px;
		}
		.FormHeader label h2 {
			color: white;
		}
		.SubHeader {
			margin-top: -20px;
		}

		.divider-row {
			border-bottom: 1px solid rgb(175,175,175);
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.radio-label {
			margin-top: 25px;
		}

		input[type=radio] {
			border: 0px;
			width: 20px;
		}

		.mid-label {
			margin-top: 45px;
		}
		.mid-answer {
			margin-top: 15px;
		}

	</style>
@stop
@section('content')
<section class="parts-quote wrap parts-quote-bg" style="background-color: #00AFF0;">
	<div class="container wrap-xl parts-header-div" style="padding: 150px;padding-bottom: 0px;">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12 text-center" style="margin-top: 35px;">
						<h2 class="text-center mg-sm" style="color: white;">Employment Application</h2>
					</div>
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
				<div class="col-lg-12">
					<form action="/forms/submitapplication" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row">
							<div class="col-lg-12">
								<div class="row voffset-sm">
										<div class="center">
											<div class="row">
												<div class="col-sm-offset-1 col-sm-10 col-lg-offset-0 col-lg-12 FormHeader">
													<label><h2 >Application Information</h2></label>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-5">
													<div class="form-group">
														<label>
															Last Name
														</label>
														<input class="form-control" tabindex="1" name="LastName" value="{{ $objUser->last_name }}" required />
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-5">
													<div class="form-group">
														<label>
															First Name
														</label>
														<input class="form-control" tabindex="3" name="FirstName" value="{{ $objUser->first_name }}" required />
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															M.I.
														</label>
														<input class="form-control" tabindex="3" name="MiddleInitial" value="{{ $objUser->middle_initial }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-8">
													<div class="form-group">
														<label>
															Street Address
														</label>
														<input class="form-control" tabindex="3" name="StreetAddress" value="{{ $objUser->street_address }}" required />
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Apartment / Unit #
														</label>
														<input class="form-control" tabindex="3" name="Apartment" value="{{ $objUser->apartment }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															City
														</label>
														<input class="form-control" tabindex="3" name="City" value="{{ $objUser->city }}" required />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															State
														</label>
														<input class="form-control" tabindex="3" name="State" value="{{ $objUser->state }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Zip
														</label>
														<input class="form-control" tabindex="3" name="Zip" value="{{ $objUser->zip }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Phone
														</label>
														<input class="form-control" tabindex="3" name="Phone" value="{{ $objUser->phone }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Email Address
														</label>
														<input class="form-control" tabindex="3" name="EmailAddress" value="{{ $objUser->email }}" required />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Date Available
														</label>
														<input class="form-control" tabindex="3" name="DateAvailable" value="{{ $objUser->date_available }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															TXDL #
														</label>
														<input class="form-control" tabindex="3" name="TXDL" value="{{ $objUser->txdl }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Desired Salary
														</label>
														<input class="form-control" tabindex="3" name="DesiredSalary" value="{{ $objUser->desired_salary }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<div class="form-group">
														<label>
															Position Applied For
														</label>
														<input class="form-control" tabindex="3" name="PositionAppliedFor" value="{{ $objUser->position_applied_for }}" required  />
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<label class="radio-label">Are you a citizen of the United States?</label>
												</div>
												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="Citizen" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="Citizen" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<label class="radio-label">If no, are you authorized to work in the U.S.?</label>
												</div>

												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="NonCitizenAuthorized" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="NonCitizenAuthorized" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<label class="radio-label">Have you ever worked for this company?</label>
												</div>

												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="WorkedCompany" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="WorkedCompany" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															If so, when?
														</label>
														<input class="form-control" tabindex="3" name="WhenWorkedCompany" value="{{ $objUser->when_worked_company }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<label class="radio-label">Have you ever been convicted of a felony?</label>
												</div>

												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="Felony" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1">
														<label><input class="form-control" type="radio" tabindex="3" name="Felony" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															If yes, explain
														</label>
														<input class="form-control" tabindex="3" name="FelonyReason" value="{{ $objUser->felony_reason }}"/>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-offset-1 col-sm-10 col-lg-offset-0 col-lg-12 FormHeader">
													<label><h2 >Education</h2></label>
												</div>

												<!-- Highschool Questionaire -->
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															High School
														</label>
														<input class="form-control" tabindex="3" name="HighSchool" value="{{ $objUser->highschool }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Address
														</label>
														<input class="form-control" tabindex="3" name="HighschoolAddress" value="{{ $objUser->highschool_address }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															From
														</label>
														<input class="form-control" tabindex="3"  name="HighschoolFrom" value="{{ $objUser->highschool_from }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															To
														</label>
														<input class="form-control" tabindex="3"  name="HighschoolTo" value="{{ $objUser->highschool_to }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label class="radio-label mid-label">Did you graduate?</label>
													</div>
												</div>

												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1 mid-answer">
														<label><input class="form-control" type="radio" tabindex="3" name="HighschoolGraduate" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1 mid-answer">
														<label><input class="form-control" type="radio" tabindex="3" name="HighschoolGraduate" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Degree
														</label>
														<input class="form-control" tabindex="3" name="HighSchoolDegree" value="{{ $objUser->college_degree }}"/>
													</div>
												</div>
												<!-- End Highschool Questionaire -->
												<div class="col-xs-12 divider-row"></div>
												<!-- College Questionaire -->
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															College
														</label>
														<input class="form-control" tabindex="3" name="College" value="{{ $objUser->college_school }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Address
														</label>
														<input class="form-control" tabindex="3" name="CollegeAddress" value="{{ $objUser->college_address }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															From
														</label>
														<input class="form-control"  tabindex="3" name="CollegeFrom" value="{{ $objUser->college_from }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															To
														</label>
														<input class="form-control"  tabindex="3" name="CollegeTo" value="{{ $objUser->college_to }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label class="radio-label mid-label">Did you graduate?</label>
													</div>
												</div>

												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1 mid-answer">
														<label><input class="form-control" type="radio" tabindex="3" name="CollegeGraduate" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1 mid-answer">
														<label><input class="form-control" type="radio" tabindex="3" name="CollegeGraduate" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Degree
														</label>
														<input class="form-control" tabindex="3" name="CollegeDegree" value="{{ $objUser->college_degree }}"/>
													</div>
												</div>
												<!-- End College Questionaire -->
												<div class="col-xs-12 divider-row"></div>
												<!-- Other Questionaire -->
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Other
														</label>
														<input class="form-control" tabindex="3" name="Other" value="{{ $objUser->other }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Address
														</label>
														<input class="form-control" tabindex="3" name="OtherAddress" value="{{ $objUser->other_address }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															From
														</label>
														<input class="form-control"  tabindex="3" name="OtherFrom" value="{{ $objUser->other_from }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															To
														</label>
														<input class="form-control"  tabindex="3" name="OtherTo" value="{{ $objUser->other_to }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label class="radio-label mid-label">Did you graduate?</label>
													</div>
												</div>

												<div class="form-group">
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1 mid-answer">
														<label><input class="form-control" type="radio" tabindex="3" name="OtherGraduate" value="Yes"/>Yes</label>
													</div>
													<div class="col-xs-6 col-sm-offset-1 col-sm-4 col-lg-offset-0 col-lg-1 mid-answer">
														<label><input class="form-control" type="radio" tabindex="3" name="OtherGraduate" value="No"/>No</label>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Degree
														</label>
														<input class="form-control" tabindex="3" name="OtherDegree" value="{{ $objUser->other_degree }}"/>
													</div>
												</div>
												<!-- End Other Questionaire -->
											</div>
											<div class="row">
												<div class="col-sm-offset-1 col-sm-10 col-lg-offset-0 col-lg-12 FormHeader">
													<label><h2 >References</h2></label>
												</div>
												<div class="col-sm-offset-1 col-sm-10 col-lg-12 SubHeader">
													<label><i>Please list three professional references.</i></label>
												</div>

											<!-- Reference #1 -->
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Full name
														</label>
														<input class="form-control" tabindex="3" name="Reference1FullName" value="{{ $objUser->reference1_full_name }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Relationship
														</label>
														<input class="form-control" tabindex="3" name="Reference1Relationship" value="{{ $objUser->reference1_relationship }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Company
														</label>
														<input class="form-control" tabindex="3" name="Reference1Company" value="{{ $objUser->reference1_company }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Phone
														</label>
														<input class="form-control" tabindex="3" name="Reference1Phone" value="{{ $objUser->reference1_phone }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input class="form-control" tabindex="3" name="Reference1Address" value="{{ $objUser->reference1_address }}"/>
													</div>
												</div>
											<!-- End Reference #1 -->
												<div class="col-xs-12 divider-row"></div>
											<!-- Reference #2 -->
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Full name
														</label>
														<input class="form-control" tabindex="3" name="Reference2FullName" value="{{ $objUser->reference2_full_name }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Relationship
														</label>
														<input class="form-control" tabindex="3" name="Reference2Relationship" value="{{ $objUser->reference2_relationship }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Company
														</label>
														<input class="form-control" tabindex="3" name="Reference2Company" value="{{ $objUser->reference2_company }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Phone
														</label>
														<input class="form-control" tabindex="3" name="Reference2Phone" value="{{ $objUser->reference2_phone }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input class="form-control" tabindex="3" name="Reference2Address" value="{{ $objUser->reference2_address }}"/>
													</div>
												</div>
											<!-- End Reference #2 -->
												<div class="col-xs-12 divider-row"></div>
											<!-- Reference #3 -->
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Full name
														</label>
														<input class="form-control" tabindex="3" name="Reference3FullName" value="{{ $objUser->reference3_full_name }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Relationship
														</label>
														<input class="form-control" tabindex="3" name="Reference3Relationship" value="{{ $objUser->reference3_relationship }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Company
														</label>
														<input class="form-control" tabindex="3" name="Reference3Company" value="{{ $objUser->reference3_company }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-6">
													<div class="form-group">
														<label>
															Phone
														</label>
														<input class="form-control" tabindex="3" name="Reference3Phone" value="{{ $objUser->reference3_phone }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<div class="form-group">
														<label>Address</label>
														<input class="form-control" tabindex="3" name="Reference3Address" value="{{ $objUser->reference3_address }}"/>
													</div>
												</div>
											<!-- End Reference #3 -->
											</div>

											<div class="row">
												<div class="col-sm-offset-1 col-sm-10 col-lg-offset-0 col-lg-12 FormHeader">
													<label><h2 >Military Service</h2></label>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-8">
													<div class="form-group">
														<label>
															Branch
														</label>
														<input class="form-control" tabindex="3" name="MilitaryBranch" value="{{ $objUser->military_branch }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															From
														</label>
														<input class="form-control"  tabindex="3"  name="MilitaryFrom" value="{{ $objUser->military_from }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-2">
													<div class="form-group">
														<label>
															To
														</label>
														<input class="form-control" tabindex="3" name="MilitaryTo"   value="{{ $objUser->military_to }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-8">
													<div class="form-group">
														<label>
															Rank at Discharge
														</label>
														<input class="form-control" tabindex="3" name="MilitaryRankDischarge" value="{{ $objUser->military_rank_discharge }}"/>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-4">
													<div class="form-group">
														<label>
															Type of Discharge
														</label>
														<input class="form-control" tabindex="3" name="MilitaryTypeDischarge" value="{{ $objUser->military_type_discharge }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<div class="form-group">
														<label>
															If other than honorable, explain
														</label>
														<input class="form-control" tabindex="3" name="MilitaryNonHonorable" value="{{ $objUser->military_non_honorable }}"/>
													</div>
												</div>

												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<div class="col-lg-12">
														<label class="text-justify"><i>By clicking submit, you certify that your answers are true and complete to the best of your knowledge.  If this application leads to employment, you understand that false or misleading information in my application or interview may result in your release.</i></label>
													</div>
												</div>
												<div class="col-xs-offset-1 col-xs-10 col-lg-offset-0 col-lg-12">
													<button class="wrap-button btn btn-d btn-lg btn-block form-button" type="submit"
															tabindex="9">
														Submit
													</button>
												</div>
											</div>
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
