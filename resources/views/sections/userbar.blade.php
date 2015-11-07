<section class="userBar">
<div class="container relative-nav-container">
  <ul>
    @if($objUser->IsGuestAccount())
    <li>
      <a href="/auth/register"> <i class="fa fa-fw fa-user"></i> Create Account</a>
    </li>
    {{--
    <a href="/auth/login">
      <li> <i class="fa fa-fw fa-laptop"></i> Log In </li>
    </a> --}} @endif @if($objUser->HasPermissions('Admin Panel'))
    <li>
      <a href="/admin"> <i class="fa fa-fw {{ Config::get('constants.ICON_DASHBOARD') }}"></i> Admin Panel </a>
    </li>
    @endif {{--
    <a href="/forms/service">
      <li> <i class="fa fa-fw fa-envelope"></i> Contact Us </li>
    </a>
    @if(!$objUser->IsGuestAccount())
    <li class="divider"></li>
    <a href="/auth/logout">
      <li> <i class="fa fa-fw fa-power-off"></i> Log Out </li>
    </a>
    @endif --}}
  </ul>
  </li>
  <li>
    <div id="google_translate_element" style="width: 150px;"></div>
  </li></div>
</section>
