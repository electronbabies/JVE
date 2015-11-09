<footer class="fullstyle">

  <section class="contacts">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <article class="contacts-block bottom-border">
            <h5 class="white">Quick Links</h5>
            <ul>
              <li> <a href="/service">Service</a> </li>
              <li> <a href="/parts">Parts</a> </li>
              <li> <a href="/sales">Sales</a> </li>
              <li> <a href="/rentals">Rentals</a> </li>
              <li> <a href="/forms/contact">Contact</a> </li>
            </ul>
          </article>
        </div>
        <!-- Start News -->
        <div class="col-md-3">
          <article class="contacts-block bottom-border">
            <h5 class="white">Legal</h5> {{--
            <ul>
              @forelse($tBlogPosts as $objPost)
              <li> <a href="#"> {!! $objPost->title !!} </a> @empty @endforelse
            </ul> --}}
            <ul>
              <li> <a href="/privacy"> Privacy Policy </a>
              </li>
              {{--<li> <a href="#"> Terms &amp; Conditions </a>
              </li>
              <li> <a href="#"> Careers </a>
              </li>--}}
            </ul>
          </article>
        </div>
        <div class="col-md-3">
          <article class="contacts-block bottom-border">
            <h5 class="white">Locations</h5> {{--
            <ul>
              @forelse($tBlogPosts as $objPost)
              <li> <a href="#"> {!! $objPost->title !!} </a> @empty @endforelse
            </ul> --}}
            <ul>
              <li> <a href="#"> Laredo </a>
              </li>
              <li> <a href="#"> Edinburg </a>
              </li>
              <li> <a href="#"> Brownsville </a>
              </li>
              <li> <a href="#"> Reynosa </a>
              </li>
            </ul>
          </article>
        </div>
        <!-- Start Accounts -->
        <div class="col-md-3">
          <article class="contacts-block bottom-border">
            <h5 class="white">Accounts Information</h5>
            <ul>
              @if($objUser->IsGuestAccount())
              <li> <a href="/auth/login">Log In </a> </li>
              <li> <a href="/auth/register">Create Account</a> </li>
              @endif

              @if($objUser->HasPermissions('Admin Panel'))
              <a href="/admin">Admin Panel </a>
              @endif

              @if(!$objUser->IsGuestAccount())
              <li><a href="/auth/logout">Log Out </a></li>
              @endif
              <li><a href="/auth/logout">Website Translation</a> <div id="google_translate_element" style="color:black; !important"></div> </li>
            </ul>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <p>J.V. Equipment, Inc. © 2015 – Trademarks and brands are the property of their respective owners</p>
        </div>
        <div class="col-md-4">
          <ul class="copyright-links list-inline">
            <li><a href="https://www.facebook.com/JV-Equipment-Inc-100276043359234/" target="_blank"><i class="fa fa-facebook fa-lg"></i></a> </li>
            <li><a href="https://twitter.com/jvequipment" target="_blank"><i class="fa fa-twitter fa-lg"></i></a> </li>
            <li><a href="https://www.youtube.com/user/jvequipment" target="_blank"><i class="fa fa-youtube-play fa-lg"></i></a> </li>
            {{--
            <li><a href="#fakelink"><i class="fa fa-google-plus fa-lg"></i></a> </li>
            <li><a href="#fakelink"><i class="fa fa-instagram fa-lg"></i></a> </li>--}}
          </ul>
        </div>
      </div>
    </div>
  </section>
</footer>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en'
    }, 'google_translate_element');
  }
</script>

<style>
	div#google_translate_element select {
		color: black !important;
	}
</style>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​