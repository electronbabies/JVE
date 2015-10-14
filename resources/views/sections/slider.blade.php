<div class="wrap {{ $BGColor or Config::get('constants.COLOR_DARK_BLUE') }} d-wrap">
    <div class="container wrap-lg">
        <div class="row">
            <!-- Jssor Slider Begin -->
            <!-- To move inline styles to css file/block, please specify a class name for each element. -->

            <div id="slider1_container" style="margin-left: auto; margin-right: auto; position: relative; top: 0px; left: 0px; width: 960px;
        height: 445px;">

                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                    </div>
                    <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
                    </div>
                </div>

                <!-- Slides Container -->
                <div u="slides" style="	cursor: move; position: absolute; left: 0px; top: 0px; width: 960px; height: 445px;
            overflow: hidden;">
                    <div><img u="image" src="../img/slider/crown2.jpg"/></div>
                    <div><img u="image" src="../img/slider/crown.jpg"/></div>
                    <div><img u="image" src="../img/slider/03.jpg"/></div>
                    <div><img u="image" src="../img/slider/04.jpg"/></div>
                    <div><img u="image" src="../img/slider/05.jpg"/></div>
                    <div><img u="image" src="../img/slider/06.jpg"/></div>
                    <div><img u="image" src="../img/slider/07.jpg"/></div>
                    <div><img u="image" src="../img/slider/08.jpg"/></div>
                </div>


                <!--#region Bullet Navigator Skin Begin -->
                <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
                <style>
                    .jssorb03 div

                    (
                    normal

                    )
                    .jssorb03 div:hover     (normal mouseover)
                    .jssorb03 .av

                    (
                    active

                    )
                    .jssorb03 .av:hover     (active mouseover)
                    .jssorb03 .dn

                    (
                    mousedown

                    )

                    .jssorb03 {
                        position: absolute;
                    }

                    .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
                        position: absolute;
                    / / size of bullet element width : 21 px;
                        height: 21px;
                        text-align: center;
                        line-height: 21px;
                        color: white;
                        font-size: 12px;
                        background: url(../img/b03.png) no-repeat;
                        overflow: hidden;
                        cursor: pointer;
                    }

                    .jssorb03 div {
                        background-position: -5px -4px;
                    }

                    .jssorb03 div:hover, .jssorb03 .av:hover {
                        background-position: -35px -4px;
                    }

                    .jssorb03 .av {
                        background-position: -65px -4px;
                    }

                    .jssorb03 .dn, .jssorb03 .dn:hover {
                        background-position: -95px -4px;
                    }
                </style>
                <!-- bullet navigator container -->
                <div u="navigator" class="jssorb03" style="bottom: 16px; right: 6px;">
                    <!-- bullet navigator item prototype -->
                    <div u="prototype">
                        <div u="numbertemplate"></div>
                    </div>
                </div>
                <!--#endregion Bullet Navigator Skin End -->
                <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
            </div>

        </div>
        <!-- Jssor Slider End -->
    </div>
</div>
</div>