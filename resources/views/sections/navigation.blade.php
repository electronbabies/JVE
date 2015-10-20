<div class="wrap bg-b-edge d-wrap b-divider" id="nav-wrap">
    <div class="container">
        <nav class="navbar row">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><div id="LogoImg"></div></a>
                <button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-1">
                <ul class="site-navigation nav navbar-nav">
                    <li>
                        <a href="/" class="ltc-white">Home</a>
                    </li>
                    <li>
                        <a href="/service" class="ltc-white">Service</a>
                    </li>
                    <li>
                        <a href="/parts" class="ltc-white">Parts</a>
                    </li>
                    <li>
                        <a href="/sales" class="ltc-white">Sales</a>
                    </li>
                    <li>
                        <a href="/rentals" class="ltc-white">Rentals</a>
                    </li>
                    <li>
                        <a href="/gallery" class="ltc-white">Gallery</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle ltc-white" data-toggle="dropdown"><i
                                class="fa fa-envelope"></i>&nbsp;&nbsp;{{ $objUser->name }}<b
                                class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown" style="top: 120%;">
                            <li class="dropdown">
                                <ul style="list-style: none; padding-left: 20px;">
                                    @if($objUser->email == 'guest@jvequipment.com')

                                    <a href="/auth/register">
                                        <li>
                                            <i class="fa fa-fw fa-user"></i> Create Account
                                        </li>
                                    </a>
                                    <a href="/auth/login">
                                        <li>
                                            <i class="fa fa-fw fa-laptop"></i> Log In
                                        </li>
                                    </a>
                                    @endif
                                    <a href="/forms/service">
                                        <li>
                                            <i class="fa fa-fw fa-envelope"></i> Contact Us
                                        </li>
                                    </a>
                                    @if($objUser->email != 'guest@jvequipment.com')
                                    <li class="divider"></li>
                                    <a href="/auth/logout">
                                        <li>
                                            <i class="fa fa-fw fa-power-off"></i> Log Out
                                        </li>
                                    </a>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>