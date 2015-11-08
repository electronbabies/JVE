<header>
  @include('sections.userbar')
  <nav role="navigation" class="navbar navbar-default navbar-fixed-top navmobile" id="nav">
    <div class="container relative-nav-container">
      <a data-target="#navbar-collapse" data-toggle="collapse" class="toggle-button visible-xs-block"> <i class="fa fa-navicon"></i> </a>
      <a href="/" class="nav-logo scroll"> <img alt="logo" src="/img/logo-color.png" class="logo hidden-xs"> <img alt="logo" src="/img/logo-white.png" class="logoColor hidden-xs"> <img alt="logo" src="/img/logo-mobile.png" class="visible-xs-block"> </a>
      <div id="navbar-collapse" class="navbar-collapse collapse floated">
        <ul class="nav navbar-nav navbar-with-inside clearfix navbar-right with-border">
          <li> <a href="/">Home</a> </li>
          <li> <a href="/service">Service</a> </li>
          <li> <a href="/parts">Parts</a> </li>
          <li> <a href="/sales">Sales</a> </li>
          <li> <a href="/rentals">Rentals</a> </li>
          <li> <a href="/gallery">Gallery</a> </li>
          <li> <a href="/forms/contact">Contact Us</a> </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
