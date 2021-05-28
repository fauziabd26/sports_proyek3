@extends('backend.template')

@section('content')
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @if(session()->has('response_status'))
                        <div class="alert @if(session('response_status') == '1') alert-success @else alert-danger @endif alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            {{ session('response_message') }}
                        </div>
                        @endif
                        <!-- page content -->
                        <div class="right_col" role="main">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Dashboard</h3>
                                </div>
                            </div>
                            <!-- top tiles -->
                            <div class="row" style="display: inline-block;" >
                                <div class="tile_count">
                                    <div class="col-md-2 col-sm-4  tile_stats_count">
                                        <span class="count_top"><i class="fa fa-user"></i> User</span>
                                        <div class="count">{{$user}}</div>
                                        <span class="count_bottom"><i class="green"></i> Orang</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection