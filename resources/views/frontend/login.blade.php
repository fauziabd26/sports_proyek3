@extends('frontend.template')

@section('css')
@endsection

@section('content')
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Login Member</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li>Login</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Login</h2>

                            <p class="lead">Sudah terdaftar sebagai member?</p>
                            <p class="text-muted">Silahkan login halaman member terlebih dahulu untuk bisa melakukan proses booking</p>

                            <hr>

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
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection

@section('javascript')
@endsection