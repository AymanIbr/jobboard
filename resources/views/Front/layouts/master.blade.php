
<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; @yield('PageName')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">

    <link rel="stylesheet" href="{{ asset('Front/css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/css/quill.snow.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('Front/css/style.css') }}">
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


@include('Front.layouts.nav')

    <!-- HOME -->
 @yield('contentSite')

    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Resources</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"><small>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>. Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
          </div>
        </div>
      </div>
    </footer>

  </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('Front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Front/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('Front/js/stickyfill.min.js') }}"></script>
    <script src="{{ asset('Front/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('Front/js/jquery.easing.1.3.js') }}"></script>

    <script src="{{ asset('Front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('Front/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('Front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Front/js/quill.min.js') }}"></script>


    <script src="{{ asset('Front/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('Front/js/custom.js') }}"></script>


  </body>
</html>
