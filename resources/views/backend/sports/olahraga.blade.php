@extends('backend.template')
@section('css')
    <!-- Datatables -->
    <link href="{{ asset("/assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/assets/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">
@endsection

@section('content')
<!-- page content -->
<div class="content-wrapper">
    <div class="clearfix"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="/olahraga"><h2>Kategori Olahraga</h2></a></h3>
                        </div>
                        <br>
                        <div class="card-body">
                        @if ($message = Session::get('alert-success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="data-tools">
                            <a class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i>  Tambah Kategori
                            </a>
                        </div>
                        @if(count($sports))
                            
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th class="text-center">Kategori Olahraga</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($sports as $s)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $s->name_sports }}</td>
                                                <td><img src="{{ asset('images/olahraga/') }}/{{ $s->image_sports }}" style="width: 100px;" href="{{ asset('images/olahraga/') }}/{{ $s->image_sports }}" ></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $s->id_sports }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="olahraga-destroy{{$s->id_sports}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                            <div class="alert alert-primary">
                                <i class="fa fa-exclamation-triangle"></i> Data Kategori Olahraga Belum tersedia
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
            <form action="/admin-sports/store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="name_sports">Kategori Olahraga</label>
                        <input type="text" name="name_sports" class="form-control" id="name_sports" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="file">Upload Gambar</label>
                        <input type="file" name="file" class="form-control" required>
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

@foreach ($sports as $s)
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-{{ $s->id_sports }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Kategori Olahraga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.sports.update',$s->id_sports) }}"  method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="name_sports">Kategori Olahraga</label>
                    <input type="text" name="name_sports" class="form-control" id="name_sports" value="{{ $s->name_sports }}">
                </div>
                <div class="row form-group">
                    <label  class="control-label" for="text">Foto Kategori Olahraga Lama</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('images/olahraga') }}/{{$s->image_sports }}" style="width: 100px;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="image">Upload Gambar Kategori Olahraga Baru </label>
                    <input type="file" name="image" class="form-control">
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
