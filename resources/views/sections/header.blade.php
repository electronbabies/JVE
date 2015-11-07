@include('sections.userbar')

<header>
  <nav role="navigation" class="navbar navbar-default navbar-fixed-top navmobile" id="nav">
    <div class="container relative-nav-container">
      <a data-target="#navbar-collapse" data-toggle="collapse" class="toggle-button visible-xs-block"> <i class="fa fa-navicon"></i> </a>
      <a href="/" class="nav-logo scroll"> <img alt="logo" src="img/logo-color.png" class="logo hidden-xs"> <img alt="logo" src="img/logo-white.png" class="logoColor hidden-xs"> <img alt="logo" src="img/logo-mobile.png" class="visible-xs-block"> </a>
      <div id="navbar-collapse" class="navbar-collapse collapse floated">
        <ul class="nav navbar-nav navbar-with-inside clearfix navbar-right with-border">
          <li> <a href="/">Home</a> </li>
          <li> <a href="/service">Service</a> </li>
          <li> <a href="/parts">Parts</a> </li>
          <li> <a href="/sales">Sales</a> </li>
          <li> <a href="/rentals">Rentals</a> </li>
          <li> <a href="/gallery">Gallery</a> </li>
          {{--
          <li>
            <a href="#" class="dropdown-toggle ltc-white" data-toggle="dropdown"><i class="fa fa-envelope"></i>&nbsp;&nbsp;{{ $objUser->name }}<b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown" style="top: 120%;">
              <li class="dropdown">
                <ul style="list-style: none; padding-left: 20px;">
                  @if($objUser->IsGuestAccount())
                  <a href="/auth/register">
                    <li> <i class="fa fa-fw fa-user"></i> Create Account </li>
                  </a>
                  <a href="/auth/login">
                    <li> <i class="fa fa-fw fa-laptop"></i> Log In </li>
                  </a>
                  @endif @if($objUser->HasPermissions('Admin Panel'))
                  <a href="/admin">
                    <li> <i class="fa fa-fw {{ Config::get('constants.ICON_DASHBOARD') }}"></i> Admin Panel </li>
                  </a>
                  @endif
                  <a href="/forms/service">
                    <li> <i class="fa fa-fw fa-envelope"></i> Contact Us </li>
                  </a>
                  @if(!$objUser->IsGuestAccount())
                  <li class="divider"></li>
                  <a href="/auth/logout">
                    <li> <i class="fa fa-fw fa-power-off"></i> Log Out </li>
                  </a>
                  @endif
                </ul>
              </li>
            </ul>
          </li> --}} {{--
          <li>
            <div id="google_translate_element" style="width: 150px;"></div>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
</header>
