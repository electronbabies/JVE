<?php
    require_once(__DIR__.'/../inc.global.php');
    global $g_Background;
    $Background = $g_Background ?: COLOR_DARK_BLUE;
?>
<div class="wrap <?=$Background; ?> d-wrap">
    <div class="container wrap-lg">
        <div class="row">
            <div class="col-sm-12">
                <h6 class="text-center tc-white-2 mg-md">
                    <span class="fa fa-bicycle icon icon-book icon-gears icon-magnifying-glass icon-md"></span>
                </h6>
                <h2 class=" text-center mg-sm">
                    Get a Quote Today
                </h2>
                <h3 class="orange text-center mg-lg tc-saffron">
                    <span style="color: #FF9100">What kind of quote would you like today?</span>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row voffset-sm">
                    <div class="col-sm-12">
                        <div class="panel bgc-isabelline">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="text-center">
                                                                    <span class="et-icon-gears icon-caution icon-lg "></span>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a href="/forms/service.php" class="a-btn">Get Started Now!</a>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a href="/forms/service.php" class="btn btn-sq btn-d btn-glossy">Request Service Quote</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <span class="et-icon-tools-2 icon-lg "></span>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="/forms/parts.php" class="a-btn">Get Started Now!</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="/forms/parts.php" class="btn btn-sq btn-d btn-glossy">Request Parts Quote</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <span class="et-icon-key icon-wallet icon-lg "></span>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="/forms/sales.php" class="a-btn">Get Started Now!</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="/forms/sales.php" class="btn btn-sq btn-glossy btn-d">Request Sales Quote</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="text-center">
                                                                    <span class="et-icon-global icon-speedometer icon-lg "></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="/forms/rental.php" class="a-btn">Get Started Now!</a>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="/forms/rental.php" class="btn btn-sq btn-d btn-glossy">Request Rental Quote</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>