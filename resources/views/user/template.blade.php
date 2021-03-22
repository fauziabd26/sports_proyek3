<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('tittle')</title>
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
              <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="hotel.html" class="nav-link">Olahraga</a></li>
              <li class="nav-item"><a href="blog.html" class="nav-link">Artikel & Tips</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
              <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Login</span></a></li>
              <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>register</span></a></li>
            </ul>
          </div>
        </div>
      </nav>
        <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('sports/images/bg.jpeg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Yuk <br></strong> Olahraga</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Temukan tempat olahraga yang ingin kamu booking</p>
            <div class="block-17 my-4">
              <form action="" method="post" class="d-block d-flex">
                <div class="fields d-block d-flex">
                  <div class="textfield-search one-third">
                  	<input type="text" class="form-control" placeholder="Ex: Sepak Bola, Badminton, Gym">
                  </div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control" placeholder="Keyword search">
                      <option value="">Lokasi</option>
                      <option value="">Bekasi</option>
                      <option value="">Kuningan</option>
                      <option value="">Cirebon</option>
                      <option value="">Indramayu</option>
                    </select>
                  </div>
                </div>
                <input type="submit" class="search-submit btn btn-primary" value="Search">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section services-section bg-light">
        <div class="container">
          <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block text-center">
                <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
                <div class="media-body p-2 mt-2">
                  <h3 class="heading mb-3">Jaminan Harga Terbaik</h3>
                  <p>Mendapatkan harga yang paling baik dan murah.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block text-center">
                <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
                <div class="media-body p-2 mt-2">
                  <h3 class="heading mb-3">Senang Olahraga</h3>
                  <p>Membuat anda senang berolahraga, dikarenakan mudah dan cepat booking tempat.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block text-center">
                <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
                <div class="media-body p-2 mt-2">
                  <h3 class="heading mb-3">Dukungan Dedikasi Kami</h3>
                  <p>Kami ingin membantu anda untuk memesan tempat olahraga dengan mudah dan cepat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    

    @show
    @yield('content')

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

  </body>
</html>
