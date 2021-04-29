@extends('admin.template')
@section('content')
<!-- page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="/sarana-admin"><h2>Data Sarana</h2></a></h3>
                        </div>
                        <br>
                        @if(count($pitch))
                            <div class="card-body">
                                @if(session()->has('response_status'))
                                    <div class="alert @if(session('response_status') == '1') alert-success @else alert-danger @endif alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        {{ session('response_message') }}
                                    </div>
                                @endif
                                <a class="btn btn-primary" style="margin-bottom: 10px;" href="{{ route('sarana.create') }}"><i class="fa fa-plus-circle"></i> Tambah Sarana</a>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                            <tr>
                                              <th scope="col">No</th>
                                              <th class="text-center">Kategori Olahraga</th>
                                              <th class="text-center">Foto</th>
                                              <th class="text-center">Deskripsi</th>
                                              <th style="width:150px;">Action</th>
                                            </tr>
                                          </thead>
                                          <?php $no = 1;?>
                                    @foreach($pitch as $p)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $p->name_sports }}</td>
                                                <td>{{ $p->description }}</td>
                                                <td><img src="{{ asset('images/sarana/') }}/{{ $p->image }}" style="width: 100px;" href="{{ asset('images/sarana/') }}/{{ $p->image }}" ></td>
                                                <td>
                                                    
                                                    <a class="btn btn-warning btn-xs" href="/sarana-edit-{id => $p->id}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a href="sarana-delete-{{$p->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>

                                    @endforeach
                                        </table>
                                        
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @else
                        <br><br>
                            <div class="alert alert-primary">
                                <i class="fa fa-exclamation-triangle"></i> Data Belum tersedia
                            </div>
                        @endif
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /--Content Header (Page header) -->
@stop

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