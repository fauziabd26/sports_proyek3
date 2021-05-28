@extends('frontend.template')

@section('css')
@endsection

@section('content')
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Register Member</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li>Register</li>
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
                            <h2 class="text-uppercase">Akun baru</h2>

                            <p class="lead">Belum terdaftar sebagai member?</p>
                            <p>Dengan mendaftar sebagai member, anda akan mendapatkan banyak keuntungan ketika melakukan booking lapangan futsal </p>

                            <hr>

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
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
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