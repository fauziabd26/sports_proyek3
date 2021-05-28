@extends('backend.template')

@section('css')
    <!-- Datatables -->
    <link href="{{ asset("/assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/assets/backend/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">
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
            <a class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Tambah Lapangan</a>
            <table id="table-user" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Nama Lapangan</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Dibuat Oleh</th>
                  <th class="text-center">Tgl Buat</th>
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Kategori Olahraga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('route' => array('pitch.store'), 'method' => 'post', 'id' => 'formcategory', 'class' => 'form-horizontal form-label-left', 'autocomplete' => 'false')) }}
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name">Nama Lapangan <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" name="name" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Deskripsi
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jam Awal
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="date" name="description" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jam Akhir
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="date" name="description" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Harga
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="input-group">
                        <div class="input-group-addon">Rp</div>
                        <input type="number" name="price[]" min="0" class="form-control" value="0" required/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status*</label>
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
                    <table class="table table-stripped">
                      <thead>
                        <tr>
                          <th class="text-center">Jam</th>
                          <th class="text-center">Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for($i = 0; $i < 24; $i++)
                          <tr>
                            <td class="text-center">@if($i<10)0{{ $i }}@else{{ $i }}@endif:00</td>
                            <td>
                              <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="number" name="price[]" min="0" class="form-control" value="0" required/>
                              </div>
                            </td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Submit</button>
                    <a type="button" class="btn btn-warning" href="{{ URL::previous() }}"><i class="fa fa-times-circle"></i> Cancel</a>
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
            ajax: '{{ route("pitch.datatable") }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'isactive', name: 'pitch.isactive', className: 'text-center'},
                {data: 'username', name: 'username', className: 'text-center'},
                {data: 'created_at', name: 'pitch.created_at', className: 'text-center'},
                {data: 'id', name: 'action', orderable: false, searchable: false, className: 'text-center'}
            ]
        });
    </script>
@endsection