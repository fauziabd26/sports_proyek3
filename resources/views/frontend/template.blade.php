<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sports</title>
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
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  
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
              <li class="nav-item"><a class="nav-link" href="#news" title="artikel">Sarana</a></li>
              <li class="nav-item cta"><a href="/login" class="nav-link" data-toggle="modal" data-target="#modal-login"><span>Login</span></a></li>
              <li class="nav-item cta"><a href="/register" class="nav-link" data-toggle="modal" data-target="#modal-register"><span>register</span></a></li>
            
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
                        @foreach($sports as $o)
                        <div class="item">
                            <div class="destination">
                                <img width="200px" src="{{ asset('images/olahraga/') }}/{{$o->image_sports }}" class="fa-image" width="100px" href="URL::to('/')}}/file/{{$o->file}}">
                                <div class="text p-3">
                                    <h3><a href="#">{{ $o->name_sports }}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news"class="ftco-section ftco-destination">
      <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <span class="subheading">Recent Blog</span>
            <h2><strong>Tips</strong> &amp; Articles</h2>
          </div>
        </div>
        <div class="row d-flex">
          @foreach($articles as $article)
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <div class="text p-4 d-block">
              	
                <span class="tag">{{ $article->title }}</span>
                <h3 class="heading mt-3"><a href="#">{!! $article->content !!}</a></h3>
                <div class="meta mb-3">
                  <div><p class="date-comments">
                    <a href="#"><i class="fa fa-calendar-o"></i> {{ date("d F Y",strtotime($article->created_at)) }}</a>
                </p></div>
                  <div><p class="author-category">By <a href="#">{{ $article->fullname }}</a> in <a href="#">{{ $article->name }}</a>
                  </p></br></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{ $articles->links() }}
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
                        @foreach($pitch as $f)
                        <div class="item">
                            <div class="destination blog-entry align-self-stretch">
                                <img src="{{ url('images/sarana/'.$f->image) }}" class="block-20" width="100px">
                                <div class="text p-2 d-block">
                                    <h3 class="card-text"><strong>Olahraga : </strong>{{ $f->name_sports }}<br><strong>Deskripsi : </strong>{{ $f->description }}<br></h3>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('front.detail',$f->id) }}" class="btn btn-primary" class="fa fa-shopping-cart">Pesan Sekarang</a>
                                  </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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
                    <a href="/hotel" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-registeradmin">Daftar mitra</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- Modal Register -->
    <div class="modal fade" id="modal-register" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Register</b> | SPORTS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>      
                <div class="modal-body">
                    <p class="login-box-msg">Register a new membership</p>
                    {{ Form::open(array('route' => array('front.register_post'), 'method' => 'post', 'id' => 'formuser', 'class' => '', 'autocomplete' => 'false')) }}
                    <div class="form-group">
                        <label for="name-login">Nama Lengkap</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name-login">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email-login">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password-login">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password-login">Konfirmasi Password</label>
                        <input type="password" name="conpassword" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                      <label for="phone">No. Telepon</label>
                      <input type="number" name="phone" class="form-control" required>
                  </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                    </div>
                {{ Form::close() }}
                  </div>
                </div>
            </div>
        </div>
      <!-- End Modal - Register -->

      <!-- Modal Login -->
      <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Sports</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    {{ Form::open(array('route' => array('front.login_post'), 'method' => 'post', 'id' => 'formuser', 'class' => '', 'autocomplete' => 'false')) }}
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                                </div>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>
    <!-- End Modal - Login -->
    <!-- Modal Admin -->
    <div class="modal fade" id="modal-registeradmin" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Register Mitra</b> | SPORTS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>      
                <div class="modal-body">
                    <p class="login-box-msg">Register a new Mitra</p>
                    {{ Form::open(array('route' => array('admin.store'), 'method' => 'post', 'id' => 'formuser', 'class' => '', 'autocomplete' => 'false')) }}
                    <div class="form-group">
                        <label for="name-login">Nama Lengkap</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name-login">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email-login">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password-login">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password-login">Konfirmasi Password</label>
                        <input type="password" name="conpassword" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="phone">No. Telepon</label>
                      <input type="number" name="phone" class="form-control" required>
                  </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                    </div>
                {{ Form::close() }}
                  </div>
                </div>
            </div>
        </div>
      <!-- End Modal - Register Admin -->

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
  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
  </body>
</html>
