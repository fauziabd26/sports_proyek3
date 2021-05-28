<header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-7">
                            

                            <div class="login">
                                @if(!Auth::check() or Auth::user()->role != 'member')
                                <a href="{{ route('front.login') }}"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Login</span></a>
                                <a href="{{ route('front.register') }}"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Daftar</span></a>
                                @endif
                                @if(Auth::check() and Auth::user()->role == 'member')
                                <a href="{{ route('front.order') }}"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">{{ Auth::user()->username }}</span></a>
                                <a href="{{ route('front.logout') }}"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Logout</span></a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                    
                                  <h1> ALENA FUTSAL</h1>
                              
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="{{ route('front.home') }}">Home</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('front.about') }}">Tentang Kami</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('front.news') }}">Berita</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('front.contact') }}">Kontak</a>
                                </li>
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>