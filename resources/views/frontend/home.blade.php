@extends('frontend.template')

@section('css')
@endsection

@section('content')
<section>
    <!-- *** HOMEPAGE CAROUSEL ***
_________________________________________________________ -->

    <div class="home-carousel">

        <div class="dark-mask"></div>

        <div class="container">
            <div class="homepage owl-carousel">
                <div class="item">
                    <div class="row">
                        <div class="col-sm-7">
                            <img class="img-responsive" src="{{ asset("/assets/front/img/template-easy-code.png") }}" alt="">
                        </div>
                        <div class="col-sm-5">
                            <h1>Lapangan Berkualitas</h1>
                            <ul class="list-style-none">
                                <li>Rumput sintetis</li>
                                <li>Nyaman untuk bermain</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-5 right">
                            <h1>Booking Mudah</h1>
                            <ul class="list-style-none">
                                <li>Kapan pun dan Dimana pun</li>
                                <li>Anda bisa booking lapangan</li>
                            </ul>
                        </div>
                        <div class="col-sm-7">
                            <img class="img-responsive" src="{{ asset("/assets/front/img/template-easy-customize.png") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-5 right">
                            <p>
                                <imgsrc="{{ asset("/assets/front/img/logo.png") }}" alt="">
                            </p>
                            <h1>Alena Futsal</h1>
                            <p>kepuasan adalah kebanggan kami
                                <br />www.alenafutsal.com</p>
                        </div>
                        <div class="col-sm-7">
                            <img class="img-responsive" src="{{ asset("/assets/front/img/template-homepage.png")}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.project owl-slider -->
        </div>
    </div>

    <!-- *** HOMEPAGE CAROUSEL END *** -->
</section>

<section class="bar background-white no-mb">
    <div class="container">

        <div class="col-md-12">
            <div class="heading text-center">
                <h2>Lapangan Kami</h2>
            </div>

            <!--<p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                mi vitae est. Mauris placerat eleifend leo. <span class="accent">Check our blog!</span>
            </p>-->

            <!-- *** BLOG HOMEPAGE ***
_________________________________________________________ -->

            <div class="row">
                @foreach($pitches as $pitch)
                <div class="col-md-3 col-sm-6">
                    <div class="box-image-text blog">
                        <div class="top">
                            <div class="image">
                                <img src="{{ asset("/assets/front/img/portfolio-1.jpg")}}" alt="" class="img-responsive">
                            </div>
                        </div>
                        <div class="content">
                            <h4><a href="blog-post.html">{{ $pitch->name }}</a></h4>
                            <h4>Rp {{ number_format(floatval($pitch->price), 2) }}/jam</h4>
                            <p class="read-more"><a href="{{ route('front.detail',$pitch->id) }}" class="btn btn-template-main">Lihat Jadwal</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.box-image-text -->

                </div>
                @endforeach

            </div>
            <!-- /.row -->

            <!-- *** BLOG HOMEPAGE END *** -->

        </div>

    </div>
    <!-- /.container -->
</section>
<!-- /.bar -->

<section class="bar background-gray no-mb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="owl-carousel customers">
                    <li class="item">
                        <img src="{{ asset("/assets/front/img/1.JPG")}}" alt="" class="img-responsive">
                    </li>
                    <li class="item">
                        <img src="{{ asset("/assets/front/img/2.JPG")}}" alt="" class="img-responsive">
                    </li>
                    <li class="item">
                        <img src="{{ asset("/assets/front/img/3.JPG")}}" alt="" class="img-responsive">
                    </li>
                    <li class="item">
                        <img src="{{ asset("/assets/front/img/4.JPG")}}" alt="" class="img-responsive">
                    </li>
                    <li class="item">
                        <img src="{{ asset("/assets/front/img/5.JPG")}}" alt="" class="img-responsive">
                    </li>
                    <li class="item">
                        <img src="{{ asset("/assets/front/img/6.JPG")}}" alt="" class="img-responsive">
                    </li>
                </ul>
                <!-- /.owl-carousel -->
            </div>

        </div>
    </div>
</section>
@endsection

@section('javascript')
    <!-- owl carousel -->
    <script src="{{ asset("/assets/front/js/owl.carousel.min.js") }}"></script>
@endsection