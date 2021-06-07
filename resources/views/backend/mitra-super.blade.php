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
                            <h3 class="card-title"><a href="/mitra-super"><h2>Kelola Mitra</h2></a></h3>
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
                        @if(count($mitra))

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th class="text-center">Nama Mitra</th>
                                            <th class="text-center">Nama Pemilik</th>
                                            <th class="text-center">Fasilitas</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Kota</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($mitra as $m)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $m->nama_mitra }}</td>
                                                <td>{{ $m->fullname }}</td>
                                                <td>{{ $m->deskripsi }}</td>
                                                <td>{{ $m->alamat }}</td>
                                                <td>{{ $m->kota }}</td>
                                                <td>{{ $m->phone }}</td>
                                                <td><img src="{{ asset('images/mitra/') }}/{{ $m->foto_mitra }}" style="width: 100px;" href="{{ asset('images/mitra/') }}/{{ $m->foto_mitra }}" ></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $m->id_mitra }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="mitra-hapus{{$m->id_mitra}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                        <i class="fa fa-trash"></i> Delete
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
                <form action="{{ route('mitra-super.update',$m->id_mitra) }}"  method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="nama_mitra">Nama Mitra</label>
                    <input type="text" name="nama_mitra" class="form-control" id="nama_mitra" value="{{ $m->nama_mitra }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="deskripsi">Deskripsi Fasilitas</label>
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
                    <label class="control-label">Nomor Telephone</label>
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
