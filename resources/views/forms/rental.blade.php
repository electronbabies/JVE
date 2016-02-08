@extends('app')

@section('extra_header')
	{!! Html::style('css/ForkliftBuilder.css') !!}
@stop
@section('content')

	<section class="parts-quote wrap parts-quote-bg" style="background-color: #00AFF0;">
		<div class="container wrap-xl" style="padding: 150px;padding-bottom: 0px;">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-12 text-center" style="margin-top: 35px;">
							<h2 class="text-center mg-sm" style="color: white;">Rental Quote</h2>

							<h3 class="text-center mg-lg"><span style="color: white;">Contact us today about your rental quote</span>
							</h3></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="wrap bg-repeat" style="background-color: #00AFF0; color:white;">
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
				{{-- <div id="ForkliftBuilder">
					<div class='ForkliftPart ForkliftSilhouette'></div>
				</div> --}}
				<div class="row">
					<div class="col-sm-12">
						<form action="/forms/store" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="RequestType" value="Rental">
							<!-- Begin known brand form -->
							<div class="row">
								<div class="col-sm-12">
									<div class="row voffset-sm">
										<div class="col-sm-2"></div>
										<div>
											<div class="row">
												<div class="col-sm-12"></div>
											</div>
											<div class="center">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																First Name
															</label>
															<input name="FirstName" class="form-control" tabindex="1" value="{{ $objUser->first_name }}" required/>
														</div>
														<div class="form-group">
															<label>
																Company Name
															</label>
															<input name="CompanyName" class="form-control" tabindex="3" value="{{ $objUser->company_name }}"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Last Name
															</label>
															<input name="LastName" class="form-control" tabindex="2" value="{{ $objUser->last_name }}" required/>
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label>
																		Phone Number
																	</label>
																	<input name="PhoneNumber" class="form-control" value="{{ $objUser->phone }}" tabindex="4" required/>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label>
																		Email Address
																	</label>
																	<input name="EmailAddress" class="form-control" value="{{ $objUser->email }}" tabindex="5" required/>
																</div>
															</div>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Environment
															</label>
															<select id="Environment" name="Environment" class="form-control" tabindex="7" required>
																<option selected disabled></option>
																@foreach ($tEnvironment as $Environment => $CSSClass)
																	<option
																		FBCSS="{{ $CSSClass }}">{{ $Environment }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Motive Power
															</label>
															<select id="Engine" name="MotivePower" class="form-control" tabindex="8" required>
																<option selected disabled></option>
																@foreach ($tMotivePower as $Engine => $CSSClass)
																	<option FBCSS="{{ $CSSClass }}">{{ $Engine }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Capacity
															</label>
															<select id="Capacity" name="Capacity" class="form-control" tabindex="9" required>
																<option selected disabled></option>
																@foreach ($tCapacity as $Capacity => $CSSClass)
																	<option
																		FBCSS="{{ $CSSClass }}">{{ $Capacity }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Attachment
															</label>
															<select id="Attachment" name="Attachment" class="form-control" tabindex="10" required>
																<option selected disabled></option>
																@foreach ($tAttachment as $Attachment => $CSSClass)
																	<option
																		FBCSS="{{ $CSSClass }}">{{ $Attachment }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Operating Hours
															</label>
															<select id="OperatingHours" name="OperatingHours" class="form-control" tabindex="11" required>
																<option selected disabled></option>
																@foreach ($tOperatingHours as $OperatingHours => $CSSClass)
																	<option
																		FBCSS="{{ $CSSClass }}">{{ $OperatingHours }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 text-center">
														<div class="form-group" style="padding-left: 50px;">
															<label>
																Accessories <i style="font-size: 12px;">(Some
																	accessories are required)</i>
															</label>
															<br/>

															<div class="text-left checkbox checkbox-info checkbox-circle checkbox-success">
																<?php $Count = 0; ?>
																@foreach ($tAccessories as $Accessory => $CSSClass)
																	<?php
																	$Count++;
																	$IsDisabled = in_array($Accessory, $tMandatoryItems) ? 'disabled checked' : '';
																	$Divisions = 3;
																	if ($Count % (count($tAccessories) / $Divisions) == 1) {
																		echo "<div class='col-sm-" . (int)(12 / $Divisions) . "'>";
																	}
																	?>
																	<div>
																		<input type="checkbox" name="Accessories[]" FBCSS="{{ $CSSClass }}" value="{{ $Accessory }}" TabIndex="12" {{ $IsDisabled }}>
																		<label>
																			{{ $Accessory }}
																		</label>
																	</div>

																	<?php
																	if ($Count % (count($tAccessories) / $Divisions) == 0) {
																		echo "</div>";
																	}
																	?>
																	@if($IsDisabled)
																		<input type="hidden" name="Accessories[]" FBCSS="{{ $CSSClass }}" value="{{ $Accessory }}">
																	@endif
																@endforeach
															</div>
														</div>
													</div>
												</div>
												<br/>

												<div class="form-group">
													<label>
														Comments
													</label>
											<textarea name="Comments" class="form-control" rows="4" cols="50"
													  tabindex="13"></textarea>
												</div>
												<button class="wrap-button btn btn-d btn-lg btn-block form-button" type="submit"
														tabindex="14">
													Submit
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End known brand form -->
					</div>
				</div>
			</div>
		</div>

		</form>
	</section>
	<!-- Main container END -->

	<script type="text/javascript">
		// Accessory chooser
		$('#Engine').change(function () {
			if (this.value == 'Electric') {
				$('input[fbcss=LPTank]').parent('div').hide();
				$('input[fbcss=LPTank]').prop('disabled', true);
				$('input[fbcss=OpportunityCharger]').parent('div').show();
				$('input[fbcss=OpportunityCharger]').prop('disabled', false);
			} else {
				$('input[fbcss=LPTank]').parent('div').show();
				$('input[fbcss=LPTank]').prop('disabled', false);
				$('input[fbcss=OpportunityCharger]').parent('div').hide();
				$('input[fbcss=OpportunityCharger]').prop('disabled', true);
			}
		});

		// Forklift builder
		function GetOrCreateDiv(id) {
			var $e = $("#" + id);
			if (!$e.length)
				$e = $('<div id="' + id + '" class="ForkliftPart"></div>').appendTo('#ForkliftBuilder');

			return $e;
		}

		function SelectHandler() {
			var SelectedCSS = $(this).find('option:selected').attr('FBCSS');

			$(this).find('option').each(function () {
				if (this.value && SelectedCSS) {
					var e = GetOrCreateDiv($(this).attr('FBCSS'));
					if ($(this).attr('FBCSS') == SelectedCSS)
						$(e).show();
					else
						$(e).hide();
				}
			});
		}

		$('#Brand').change(SelectHandler);
		$('#Environment').change(SelectHandler);
		$('#Engine').change(SelectHandler);
		$('#Capacity').change(SelectHandler);
		$('#Attachment').change(SelectHandler);
		$('#OperatingHours').change(SelectHandler);
	</script>
	@include('sections.locations', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop
