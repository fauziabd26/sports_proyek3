@extends('user.template')

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
                            <h1>Layanan Berkualitas</h1>
                            <ul class="list-style-none">
                                <li>Mudah Digunakan</li>
                                <li>Nyaman dan Enjoy!</li>
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
                                <li>Anda bisa booking Tempat Olahraga</li>
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
                            <h1>Sports</h1>
                            <p>kepuasan Anda adalah kebanggan kami
                            
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
                <h2>Tempat Olahraga Kami</h2>
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
                                <img src="{{ asset('images/mitra/') }}/{{ $pitch->image }}" alt="" class="img-responsive">
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
@endsection

@section('javascript')
    <!-- owl carousel -->
    <script src="{{ asset("/assets/front/js/owl.carousel.min.js") }}"></script>
@endsection