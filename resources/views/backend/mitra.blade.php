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
                        </div>
                        @if(count($mitra))
                            
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th class="text-center">Nama Mitra</th>
                                            <th class="text-center">Fasilitas</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Kota</th>
                                            <th class="text-center">Nomor Telephone</th>
                                            <th class="text-center">Foto Mitra</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($mitra as $m)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $m->nama_mitra }}</td>
                                                <td>{{ $m->deskripsi }}</td>
                                                <td>{{ $m->alamat }}</td>
                                                <td>{{ $m->kota }}</td>
                                                <td>{{ $m->phone }}</td>
                                                <td><img src="{{ asset('images/mitra/') }}/{{ $m->foto_mitra }}" style="width: 100px;" href="{{ asset('images/mitra/') }}/{{ $m->foto_mitra }}" ></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $m->id_mitra }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                
                            </div>
                        @else
                        <br><br>
                        <div class="data-tools">
                            <a class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i>  Tambah Mitra
                            </a>
                            <h4>Note : Mitra Hanya bisa daftar sekali saja</h4>
                            
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
            <form action="/mitra-admin/store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" id="id_user" placeholder="Nama Pemilik" value="{{auth()->user()->id}}" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_mitra" class="form-control" id="nama_mitra" placeholder="Nama Mitra" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripikan Fasilitas</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsikan Fasilitas" required> </textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" rows="3" required> </textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="kota" class="form-control" id="kota" placeholder="Kota" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Nomor Telephone" required>
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


@foreach ($mitra as $m)
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-{{ $m->id_mitra }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Mitra Sports</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mitra.update',$m->id_mitra) }}"  method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="nama_mitra">Nama Mitra</label>
                    <input type="text" name="nama_mitra" class="form-control" id="nama_mitra" value="{{ $m->nama_mitra }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="deskripsi">Deskripsikan Fasilitas</label>
                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ $m->deskripsi }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $m->alamat }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="kota">Kota</label>
                    <input type="text" name="kota" class="form-control" id="kota" value="{{ $m->kota }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="phone">Nomor Telephone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $m->phone }}" required>
                </div>
                <div class="row form-group">
                    <label  class="control-label" for="text">Foto Kategori Olahraga Lama</label>
                    <div class="col-sm-8">
                        <img src="{{ asset('images/mitra') }}/{{$m->foto_mitra }}" style="width: 100px;">
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
