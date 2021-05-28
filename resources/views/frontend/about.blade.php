@extends('frontend.template')

@section('css')
@endsection

@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Tentang Kami</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li>Tentang</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">

        <section>
            <div class="row">
                <div class="col-md-12">

                    <div class="heading">
                        <h2>Tentang @if(count($name) > 0) {{ $name->value }} @endif</h2>
                    </div>

                    @if(count($page_about) > 0) {!! $page_about->value !!} @endif

                </div>
            </div>
        </section>

    </div>
    <!-- /#contact.container -->

</div>
<!-- /#content -->
@endsection

@section('javascript')
@endsection
        