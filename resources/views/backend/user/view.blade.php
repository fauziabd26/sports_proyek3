@extends('backend.template')

@section('css')
    <!-- Datatables -->
    <link href="{{ asset("/assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/assets/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">
@endsection

@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>{{ $title }} <small>{{ $title_desc }}</small></h3>
    </div>
  </div>

  
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
            <a class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Tambah User</a>
            <table id="table-user" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Tipe User</th>
                  <th class="text-center">Status</th>
                  <th style="width:150px;">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('route' => array('user.store'), 'method' => 'post', 'id' => 'formuser', 'class' => 'form-horizontal form-label-left', 'autocomplete' => 'false')) }}
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Tipe User</label>
              <div class="">
                <div id="role" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="role" value="calonadmin"> Calon Admin
                  </label>
                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="role" value="admin" required="">Admin
                  </label>
                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="role" value="member"> Penyewa
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name">Nama Lengkap <span class="required">*</span>
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" name="fullname" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Username <span class="required">*</span></label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input class="form-control" type="text" name="username" placeholder="Min. 4 characters" data-parsley-minlength="4" data-parsley-trigger="keyup" required>
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Email <span class="required">*</span></label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input class="form-control" type="email" name="email" placeholder="ex: example@admin.com" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">No. Telepon
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input name="phone" class="form-control" placeholder="ex: 08564632xxx" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Status
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div id="status" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="isactive" value="1" required> Aktif
                  </label>
                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="isactive" value="0"> Non Aktif
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Password
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input id="password" name="password" class="form-control" placeholder="min 6 characters" required="required" type="password" minlength="6">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">Konfirmasi Password
              </label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input name="confirmpassword" class="date-picker form-control" placeholder="min 6 characters" required="required" type="password" data-parsley-equalto="#password">
              </div>
            </div>
          
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
              <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close </button>
            </div>
          </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
<!-- End Modal - Tambah -->
@endsection

@section('javascript')
<!-- Datatables -->
    <script src="{{ asset("/assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/jszip/dist/jszip.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/pdfmake/build/pdfmake.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/pdfmake/build/vfs_fonts.js") }}"></script>
    <script type="text/javascript">
        $('#table-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("user.datatable") }}',
            columns: [
                {data: 'fullname', name: 'fullname'},
                {data: 'username', name: 'username', className: 'text-center'},
                {data: 'email', name: 'email', className: 'text-center'},
                {data: 'role', name: 'role', className: 'text-center'},
                {data: 'isactive', name: 'iasctive', className: 'text-center'},
                {data: 'id', name: 'action', orderable: false, searchable: false, className: 'text-center'}
            ]
        });
    </script>
@endsection