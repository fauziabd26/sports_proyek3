<header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">    
                        <div class="top_nav">
                            <div class="nav_menu">
                                <nav class="" role="navigation">
                                    <ul class="nav navbar-nav navbar-right">
                                        <a href="{{ route('front.order') }}"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">{{ Auth::user()->username }}</span></a>
                                        <a href="{{ route('front.logout') }}"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Logout</span></a>
                                    </ul>
                                </nav>
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

                    
                                  <h1> Sports</h1>
                              
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
                                    <a href="{{ route('front.user.home') }}">Home</a>
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

            
        <!-- jQuery -->
        <script src="{{ asset("/assets/backend/vendors/jquery/dist/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("/assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("/assets/backend/build/js/custom.min.js") }}"></script>
        <script src="{{ asset("/assets/backend/build/js/routes.js") }}"></script>
        @yield('javascript')
        </header>