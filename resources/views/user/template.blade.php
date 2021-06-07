<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User | Sports</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="sports/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="sports/css/animate.css">
    
    <link rel="stylesheet" href="sports/css/owl.carousel.min.css">
    <link rel="stylesheet" href="sports/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="sports/css/magnific-popup.css">

    <link rel="stylesheet" href="sports/css/aos.css">

    <link rel="stylesheet" href="sports/css/ionicons.min.css">

    <link rel="stylesheet" href="sports/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="sports/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="sports/css/flaticon.css">
    <link rel="stylesheet" href="sports/css/icomoon.css">
    <link rel="stylesheet" href="sports/css/style.css">
    <link href="{{ asset("/assets/front/css/owl.carousel.css")}}" rel="stylesheet">
    <link href="{{ asset("/assets/front/css/owl.theme.css")}}" rel="stylesheet">

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Sports</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/homeuser" class="nav-link">Home</a></li>
          <li class="dropdown nav-item cta">
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i> {{ Auth::user()->fullname }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="{{ route('user.edit_pass') }}">Update Password</a></li>
              <li><a class="dropdown-item" href="{{ route('front.logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    <section class="ftco-section ftco-degree-bg">
    @show
    @yield('content')
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Sports</h2>
                <p>Aplikasi web yang menyediakan layanan pemesanan semua sarana olahraga kesehatan.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Information</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">Artikel & Tips</a></li>
                  <li><a href="#" class="py-2 d-block">Daftarkan Mitra Anda</a></li>
                  <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Customer Support</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQ</a></li>
                  <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                  <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                  <li><a href="#" class="py-2 d-block">How it works</a></li>
                  <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Have a Questions?</h2>
                  <div class="block-23 mb-3">
                    <ul>
                      <li><span class="icon icon-map-marker"></span><span class="text">Politeknik Negeri Indramayu</span></li>
                      <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62...</span></a></li>
                      <li><a href="#"><span class="icon icon-envelope"></span><span class="text">polindra.ac.id</span></a></li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
  
              <p>
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Kelompok 7 | This web is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank">Politeknik Negeri Indramayu</a></p>
            </div>
          </div>
        </div>
      </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="sports/js/jquery.min.js"></script>
  <script src="sports/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="sports/js/popper.min.js"></script>
  <script src="sports/js/bootstrap.min.js"></script>
  <script src="sports/js/jquery.easing.1.3.js"></script>
  <script src="sports/js/jquery.waypoints.min.js"></script>
  <script src="sports/js/jquery.stellar.min.js"></script>
  <script src="sports/js/owl.carousel.min.js"></script>
  <script src="sports/js/jquery.magnific-popup.min.js"></script>
  <script src="sports/js/aos.js"></script>
  <script src="sports/js/jquery.animateNumber.min.js"></script>
  <script src="sports/js/bootstrap-datepicker.js"></script>
  <script src="sports/js/jquery.timepicker.min.js"></script>
  <script src="sports/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="sports/js/google-map.js"></script>
  <script src="sports/js/main.js"></script>
  <script src="{{ asset("/assets/front/js/jquery.cookie.js") }}"></script>
    <script src="{{ asset("/assets/front/js/waypoints.min.js") }}"></script>
    <script src="{{ asset("/assets/front/js/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("/assets/front/js/jquery.parallax-1.1.3.js") }}"></script>
    <script src="{{ asset("/assets/front/js/front.js") }}"></script>
    
  </body>
</html>