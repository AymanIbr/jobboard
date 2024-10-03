    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="site-logo col-6"><a href="{{ route('indexPage') }}">JobBoard</a></div>

            <nav class="mx-auto site-navigation">
              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                <li><a href="{{ route('indexPage') }}" class="nav-link {{request()->routeIs('indexPage') ? "active" : ""}}">Home</a></li>
                <li><a href="{{ route('aboutPage') }}" class="nav-link {{request()->routeIs('aboutPage') ? "active" : ""}}" >About</a></li>

                <li><a href="{{ route('profilePage') }}" class="nav-link {{request()->routeIs('profilePage') ? "active" : ""}}">Profile</a></li>

                <li><a href="{{ route('contactPage') }}" class="nav-link {{request()->routeIs('contactPage') ? "active" : ""}}">Contact</a></li>
                <li class="d-lg-none"><a href="{{ route('postJobPage') }}"><span class="mr-2">+</span> Post a Job</a></li>
                <li class="d-lg-none"><a href="{{ route('loginPage') }}">Log In</a></li>
              </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
              <div class="ml-auto">
                <a href="{{ route('postJobPage') }}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
                <a href="{{ route('registerPage') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>
                <a href="{{ route('loginPage') }}" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
              </div>
              <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

          </div>
        </div>
      </header>
