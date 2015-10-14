@extends('app')

@section('extra_header')
	{!! Html::style('css/ForkliftBuilder.css') !!}
@stop

@section('content')
<form action="/forms/store" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="RequestType" value="Sales">
	<div class="wrap tc-white bg-repeat d-wrap" id="wrap-22">
		<div class="container wrap-lg">
			<div class="row">
				<div class="col-sm-12">
					<h6 class="text-center tc-white-2 mg-md">
						<span class="fa fa-plug icon icon-book icon-gears icon-magnifying-glass icon-md"></span>
					</h6>

					<h2 class=" text-center tc-white mg-sm">
						Contact Us
					</h2>

					<h3 class="orange text-center mg-lg tc-saffron">
						<span>Sales Department</span>
					</h3>

					<div class="divider-h">
						<span class="divider"></span>
					</div>

					<!-- Begin known brand form -->
					<div class="row">
						<div class="col-sm-12">
							<div class="row voffset-sm">
								<div class="col-sm-2"></div>
								<div class="col-sm-8">
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
													<input name="FirstName" class="form-control" tabindex="1"/>
												</div>
												<div class="form-group">
													<label>
														Company Name
													</label>
													<input name="CompanyName" class="form-control" tabindex="3"/>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Last Name
													</label>
													<input name="LastName" class="form-control" tabindex="2"/>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Phone Number
															</label>
															<input name="PhoneNumber" class="form-control"
																   tabindex="4"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Email Address
															</label>
															<input name="EmailAddress" class="form-control"
																   tabindex="5"/>
														</div>
													</div>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Brand
													</label>
													<select id="Brand" name="Brand" class="form-control" tabindex="6">
														<?php
														foreach ($tBrands as $Brand) {
															echo "<option>{$Brand}</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Tires
													</label>
													<select id="Tires" name="Tires" class="form-control" tabindex="7">
														<option selected disabled></option>
														@foreach ($tTires as $Tire => $CSSClass)
															<option
																FBCSS="{{ $CSSClass }}">{{ $Tire }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Engine
													</label>
													<select id="Engine" name="Engine" class="form-control" tabindex="8">
														<option selected disabled></option>
														@foreach ($tEngine as $Engine => $CSSClass)
															<option FBCSS="{{ $CSSClass }}">{{ $Engine }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Capacity
													</label>
													<select id="Capacity" name="Capacity" class="form-control" tabindex="9">
														<option selected disabled></option>
														@foreach ($tCapacity as $Capacity => $CSSClass)
															<option
																FBCSS="{{ $CSSClass }}">{{ $Capacity }}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Attachment
													</label>
													<select id="Attachment" name="Attachment" class="form-control" tabindex="10">
														<option selected disabled></option>
														@foreach ($tAttachment as $Attachment => $CSSClass)
															<option
																FBCSS="{{ $CSSClass }}">{{ $Attachment }}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Operating Hours
													</label>
													<select id="OperatingHours" name="OperatingHours" class="form-control" tabindex="11">
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
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Accessories
													</label>
													<br />
														@foreach ($tAccessories as $Accessory => $CSSClass)
															<input type="checkbox" name="Accessories[]" FBCSS="{{ $CSSClass }}" value="{{ $Accessory }}" TabIndex="12">{{ $Accessory }}<br />
														@endforeach
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>
												Comments
											</label>
											<textarea name="Comments" class="form-control" rows="4" cols="50"
													  tabindex="13"></textarea>
										</div>
										<button class="wrap-button btn btn-d btn-lg btn-block" type="submit"
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
			<div id="ForkliftBuilder">
				<div class='ForkliftPart ForkliftSilhouette'></div>
			</div>

			<div class="divider-h">
				<span class="divider"></span>
			</div>
		</div>
	</div>
</form>
		<!-- ScrollToTop Button -->
	<a class="wrap-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span
			class="fa fa-chevron-up"></span></a>
	<!-- ScrollToTop Button END-->

	</div>
	<!-- Main container END -->

	<script type="text/javascript">
		function GetOrCreateDiv(id) {
			var $e = $("#"+id);
			if(!$e.length)
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
		$('#Tires').change(SelectHandler);
		$('#Engine').change(SelectHandler);
		$('#Capacity').change(SelectHandler);
		$('#Attachment').change(SelectHandler);
		$('#OperatingHours').change(SelectHandler);
	</script>
	@include('sections.footer', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )
@stop
