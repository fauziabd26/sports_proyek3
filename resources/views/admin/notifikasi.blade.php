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
                                <h3 class="card-title"><a href="/notifikasi"><h2>Data Notif</h2></a></h3>
                            </div>
                        <br>
                        <div class="card-body">
                        <div class="data-tools">
                            <a class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i>  Tambah Notifikasi
                            </a>
                        </div>
                        @if(count($notifikasi))
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th class="text-center">Notif</th>
                                            <th class="text-center">Nama User</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($notifikasi as $n)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $n->notif }}</td>
                                                <td class="text-center"></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit-{{ $n->id }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="/notifikasi-destroy{{$n->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        @else
                        <br><br>

                        @endif
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /--Content Header (Page header) -->

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Notifikasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/notifikasi/store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Notif</label>
                        <textarea type="text" name="notif" class="form-control" id="notif" placeholder="Notif" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal - Tambah -->

@foreach ($notifikasi as $n)
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Notif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('notifikasi.update',$n->id) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label" for="notif">Notifikasi</label>
                    <input type="text" name="notif" class="form-control" id="notif" value="{{ $n->notif }}">
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal - EDIT -->
@endforeach

@endsection
@section('js')
<script>
  function previewFile(input){
      var file = $("input[type=file]").get(0).files[0];
      if(file)
      {
          var reader = new FileReader();
          reader.onload = function(){
              $("#previewImg").attr("src",reader.result);
          }
          reader.readAsDataURL(file);
      }
  }
</script>
@endsection
