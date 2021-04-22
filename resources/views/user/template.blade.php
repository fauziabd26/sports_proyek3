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
          <a class="navbar-brand" href="/">Sports</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="#home" class="nav-link" title="home">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#olahraga" title="olahraga">Olahraga</a></li>
              <li class="nav-item"><a class="nav-link" href="#sarana" title="sarana">Sarana</a></li>
              <li class="nav-item"><a class="nav-link" href="#artikel" title="artikel">Artikel & Tips</a></li>
              <li class="nav-item"><a class="nav-link" href="#contact" title="contact">Contact</a></li>
              <li class="nav-item cta"><a href="/login" class="nav-link"><span>Login</span></a></li>
              <li class="nav-item cta"><a href="/register" class="nav-link"><span>register</span></a></li>
            </ul>
          </div>
        </div>

      </nav>
        <!-- END nav -->
        <section id="home" class="ftco-section services-section bg-light">
    <div class="hero-wrap js-fullheight" style="background-image: url('sports/images/bg.jpeg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '50%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Yuk <br></strong> Olahraga</h1>
          </div>
        </div>
      </div>
    </div>

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

    <section id="olahraga"class="ftco-section ftco-destination">
        <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Olahraga</span>
                    <h2 class="mb-4"><strong>Jenis</strong> Olahraga</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="destination-slider owl-carousel ftco-animate">
                        @foreach($olahraga as $o)
                        <div class="item">
                            <div class="destination">
                                <img width="200px" src="{{ asset('images') }}/{{$o->image }}" class="fa-image" width="100px" href="URL::to('/')}}/file/{{$o->file}}">
                                <div class="text p-3">
                                    <h3><a href="#">{{ $o->name_olahraga }}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sarana"class="bg-light ftco-section ftco-destination">
        <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Olahraga</span>
                    <h2 class="mb-4"><strong>Sarana</strong> Olahraga</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-12 d-flex ftco-animate">
                    <div class="destination-slider owl-carousel ftco-animate">
                        @foreach($fasilitas as $f)
                        <div class="item">
                            <div class="destination blog-entry align-self-stretch">
                                <img width="200px" src="{{ url('images/fasilitas/'.$f->image) }}" class="block-20" width="100px" href="URL::to('/')}}/file/{{$o->file}}">
                                <div class="text p-2 d-block">
                                    <h3 class="card-text"><strong>Nama Sarana : </strong>{{ $f->name }}<br><strong>Fasilitas : </strong>{{ $f->fasilitas }}<br><strong>Alamat : </strong>{{ $f->alamat }} <br> <strong>Kota : </strong>{{ $f->kota }}</h3>
                                </div>
                                <div class="card-footer">
                                    <a href="/pemesanan" class="btn btn-primary" class="fa fa-shopping-cart">Pesan Sekarang</a>
                                  </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="artikel" class="ftco-section">
        <div class="container">
          <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
              <span class="subheading">Recent Blog</span>
              <h2><strong>Tips</strong> &amp; Articles</h2>
            </div>
          </div>
          <div class="row d-flex">
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('sports/images/image_1.jpg');">
                </a>
                <div class="text p-4 d-block">
                    <span class="tag">Tips, Travel</span>
                  <h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines</a></h3>
                  <div class="meta mb-3">
                    <div><a href="#">August 12, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('sports/images/image_2.jpg');">
                </a>
                <div class="text p-4">
                    <span class="tag">Culture</span>
                  <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta mb-3">
                    <div><a href="#">August 12, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('sports/images/image_3.jpg');">
                </a>
                <div class="text p-4">
                    <span class="tag">Tips, Travel</span>
                  <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta mb-3">
                    <div><a href="#">August 12, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('sports/images/image_4.jpg');">
                </a>
                <div class="text p-4">
                    <span class="tag">Tips, Travel</span>
                  <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta mb-3">
                    <div><a href="#">August 12, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="ftco-section contact-section ftco-degree-bg bg-light">
        <div class="container">
          <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
              <h2 class="h4">Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
              <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
            <div class="col-md-3">
              <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
            <div class="col-md-3">
              <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
            </div>
            <div class="col-md-3">
              <p><span>Website</span> <a href="#">yoursite.com</a></p>
            </div>
          </div>
          <div class="row block-9">
            <div class="col-md-6 pr-md-5">
              <form action="#">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                </div>
              </form>

            </div>

            <div class="col-md-6" id="map"></div>
          </div>
        </div>
      </section>

      <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
          <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <h2>Daftarkan Mitra anda</h2>
                <p>Daftarkan mitra anda ke website kami, agar dapat untung dengan mudah.</p>
                <div class="row d-flex justify-content-center mt-5">
                  <div class="col-md-8">
                    <a href="/hotel" type="submit" class="btn btn-primary">Daftar mitra</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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

  </body>
</html>
