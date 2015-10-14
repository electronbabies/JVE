<!doctype html>
<html>
<?php
    include_once(__DIR__.'/../inc.global_header.php');
    $tBrands = array(
        'Crown',
        'UniCarriers',
        'Landoll',
        'Bolzoni',
        'Cascade',
        'PowerBoss'
    );

    $tElectricModels = array(
        'Electric Model 1',
        'Electric Model 2',
        'Electric Model 3',
        'Etc...',
    );

    $tCombustionModels = array(
        'Combustion Model 1',
        'Combustion Model 2',
        'Combustion Model 3',
        'Etc...',
    );

?>
<body>
<!-- Main container -->
<div class="page-container">
	<?php include_once(__DIR__.'/../sections/header.php'); ?>
<!-- wrap-22 -->
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

				<div class="row">
					<div class="col-sm-12">
						<div class="row voffset-sm">
                            <div class="center">
							<div class="col-sm-2"></div>
							<div class="col-sm-2 col-md-offset-3">
								<div class="form-group text-center">
									<label>Know the brand?</label>
									<select class="form-control" id="KnowBrandSelect">
                                        <option disabled selected></option>
										<option>Yes</option>
										<option>No</option>
									</select>
								</div>
							</div>
                                </div>
						</div>
					</div>
				</div>
				<!-- Begin unknown brand form -->
				<div class="row" id="UnknownBrandForm">
					<div class="col-sm-12">
						<div class="row voffset-sm">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<form id="form-2">
									<div class="row">
										<div class="col-sm-12"></div>
									</div>
								</form>
								<form id="form-2563">
									<div class="center">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														First Name
													</label>
													<input id="name2-2563" class="form-control" tabindex="1" />
												</div>
												<div class="form-group">
													<label>
														Company Name
													</label>
													<input id="name2-2563" class="form-control" tabindex="3" />
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Last Name
													</label>
													<input id="name2-2563" class="form-control" tabindex="2" />
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Phone Number
															</label>
															<input id="name2-2563" class="form-control" tabindex="4"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Email Address
															</label>
															<input id="name2-2563" class="form-control" tabindex="5"/>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>
												Comments
											</label>
											<textarea id="message2-2563" class="form-control" rows="4" cols="50" tabindex="7"></textarea>
										</div>
										<button class="wrap-button btn btn-d btn-lg btn-block" type="submit" tabindex="8">
											Submit
										</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End unknown brand form -->
				<!-- Begin known brand form -->
				<div class="row" id="KnownBrandForm">
					<div class="col-sm-12">
						<div class="row voffset-sm">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<form id="form-2">
									<div class="row">
										<div class="col-sm-12"></div>
									</div>
								</form>
								<form id="form-2563">
									<div class="center">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														First Name
													</label>
													<input id="name2-2563" class="form-control" tabindex="1" />
												</div>
												<div class="form-group">
													<label>
														Company Name
													</label>
													<input id="name2-2563" class="form-control" tabindex="3" />
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>
														Last Name
													</label>
													<input id="name2-2563" class="form-control" tabindex="2" />
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Phone Number
															</label>
															<input id="name2-2563" class="form-control" tabindex="4"/>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>
																Email Address
															</label>
															<input id="name2-2563" class="form-control" tabindex="5"/>
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
                                                   <select id="Brand" class="form-control" tabindex="6">
                                                   <?php
                                                       foreach($tBrands as $Brand) {
                                                           echo "<option>{$Brand}</option>";
                                                       }
                                                   ?>
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
                                                   <select id="Engine" class="form-control" tabindex="6">
                                                       <option selected disabled></option>
                                                       <option>Internal Combustion</option>
                                                       <option>Electric</option>
                                                   </select>
                                               </div>
                                           </div>
                                        </div>
                                        <div class="row">
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <label>
                                                       Model
                                                   </label>
                                                   <select id="ElectricSelect" class="form-control" tabindex="7">
                                                   <?php
                                                       foreach($tElectricModels as $Model) {
                                                           echo "<option>{$Model}</option>";
                                                       }
                                                   ?>
                                                   </select>
                                                   <select id="CombustionSelect" class="form-control" tabindex="7">

                                                      <?php
                                                          foreach($tCombustionModels as $Model) {
                                                              echo "<option>{$Model}</option>";
                                                          }
                                                      ?>
                                                    </select>
                                               </div>
                                           </div>
                                       </div>

										<button class="wrap-button btn btn-d btn-lg btn-block" type="submit" tabindex="8">
											Submit
										</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End known brand form -->
			</div>
		</div>
		<div class="divider-h">
			<span class="divider"></span>
		</div>
	</div>

</div>

	<?php include_once(__DIR__.'/../sections/footer.php'); ?>

<!-- ScrollToTop Button -->
<a class="wrap-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->

</div>
<!-- Main container END -->

<script type="text/javascript">
    $("#KnowBrandSelect").change(function() {
        if(this.value == 'No') {
            $('#UnknownBrandForm').show();
            $('#KnownBrandForm').hide();
        } else if(this.value == 'Yes') {
            $('#UnknownBrandForm').hide();
            $('#KnownBrandForm').show();
        }
    });

    $('#Engine').change(function() {
        if(this.value == 'Electric') {
            $('#CombustionSelect').hide();
            $('#ElectricSelect').show();
        } else if(this.value == 'Internal Combustion') {
            $('#CombustionSelect').show();
            $('#ElectricSelect').hide();

        }
    })

</script>
</body>

<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>
