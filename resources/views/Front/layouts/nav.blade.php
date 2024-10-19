    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="{{ route('indexPage') }}">JobBoard</a></div>

                @auth
                    <nav class="mx-auto site-navigation">
                        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                            <li><a href="{{ route('indexPage') }}"
                                    class="nav-link {{ request()->routeIs('indexPage') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('aboutPage') }}"
                                    class="nav-link {{ request()->routeIs('aboutPage') ? 'active' : '' }}">About</a></li>

                            {{-- <li><a href="{{ route('profilePage') }}"
                                    class="nav-link {{ request()->routeIs('profilePage') ? 'active' : '' }}">Profile</a>
                            </li> --}}

                            <li><a href="{{ route('contactPage') }}"
                                    class="nav-link {{ request()->routeIs('contactPage') ? 'active' : '' }}">Contact</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('web')->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('applications') }}">Applications</a>
                                    <a class="dropdown-item" href="{{ route('saved.jobs') }}">Saved jobs</a>
                                    <a class="dropdown-item" href="{{ route('edit.details') }}">update Details</a>
                                    <a class="dropdown-item" href="{{ route('edit.cv') }}">update CV</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                        <span class="mr-2 icon-lock_outline"></span>Sign Out
                                    </a>
                                </div>
                            </li>
                            <form action="{{ route('logout') }}" method="POST" id="logout" style="display: none">
                                @csrf
                            </form>

                            {{-- <li class="d-lg-none"><a href="{{ route('postJobPage') }}"><span class="mr-2">+</span> Post a
                                    Job</a></li>

                            <li class="d-lg-none"><a href="{{ route('login') }}">Log In</a></li> --}}
                        </ul>
                    </nav>
                @endauth

                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <div class="ml-auto">
                        {{-- @auth('web') --}}
                        @auth
                            <a href="{{ route('postJobPage') }}"
                                class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                                    class="mr-2 icon-add"></span>Post a Job</a>

                        @else
                        @if (!request()->routeIs('login'))
                        <a href="{{ route('login') }}"
                           class="btn btn-primary border-width-2 d-none d-lg-inline-block">
                           <span class="mr-2 icon-lock_outline"></span>Log In
                        </a>
                    @endif

                    @if (!request()->routeIs('register'))
                        <a href="{{ route('register') }}"
                           class="btn btn-primary border-width-2 d-none d-lg-inline-block">
                           <span class="mr-2 icon-lock_outline"></span>Register
                        </a>
                    @endif
                        @endauth

                    </div>
                    <a href="#"
                        class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                            class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>

            </div>
        </div>
    </header>
