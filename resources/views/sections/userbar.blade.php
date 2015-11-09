<section class="userBar scroll">
  <div class="container relative-nav-container">
    @if($objUser->IsGuestAccount())
    <span class="account-status">
      <a href="/auth/register"> <i class="fa fa-fw fa-user"></i> Create Account</a>
      <a href="/auth/login"> <i class="fa fa-fw fa-laptop"></i> Log In </a>
  </span> @endif @if($objUser->HasPermissions('Admin Panel'))
    <span class="admin-panel">
        <a href="/admin"> <i class="fa fa-fw"></i> Admin Panel </a>
  </span> @endif @if(!$objUser->IsGuestAccount())
    <span class="account-status">
        <a href="/auth/logout"> <i class="fa fa-fw fa-power-off"></i> Log Out </a>
  </span> @endif
    <span class="language-status">
  </div>
</section>
