@include('partials.headerdashboardoperator')

@extends('layouts.operator')

@section('content')
    <div class="rows">
        <div class="column">
            <a href="/" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/home-network.svg">
                </div>
                <p>Halaman Profil</p>
            </a>
        </div>
        <div class="column">
            <a href="/daftarpenyewa" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/schedule-check.svg">
                </div>
                <p>Daftar Penyewa</p>
            </a>
        </div>
        <div class="column">
            <a href="/adminpage/booking" class="card credentialing">
                <div class="overlay"></div>
                <div class="circle">
                    <img src="img/schedule-add.svg">
                </div>
                <p>Tambah Sewa</p>
            </a>
        </div>
    </div>
@endsection
