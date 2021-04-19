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
                            <h3 class="card-title"><a href="/fasilitas"><h2>Data Sarana</h2></a></h3>
                        </div>
                        <br>
                        @if(count($errors) > 0)
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      {{ $error }} <br/>
                    @endforeach
                  </div>
                @endif
                        <div class="data-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                <i class="fa fa-plus"></i>  Tambah Data Sarana
                            </button>
                        </div>
                        @if(count($fasilitas))
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>

                                            <th>Nama Sarana</th>
                                            <th>Fasilitas</th>
                                            <th>Kategori Olahraga</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Gambar</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($fasilitas as $f)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $f->name }}</td>
                                                <td>{{ $f->fasilitas }}</td>
                                                <td>{{ $f->kategori }}</td>
                                                <td>{{ $f->alamat }}</td>
                                                <td>{{ $f->kota }}</td>
                                                <td><img src="{{URL::to('/')}}/file/{{$f->file}}" class="fa-image" width="100px" href="URL::to('/')}}/file/{{$f->file}}"></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $f->id }}">
                                                        <i class="fa fa-edit"></i>Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>

                                    @endforeach
                                </table>
                            </div>
                        @else
                        <br><br>
                            <div class="alert alert-primary">
                                <i class="fa fa-exclamation-triangle"></i> Data Fasilitas Sarana Belum tersedia
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Sarana</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/fasilitas/store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    @include('admin.form')
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

@foreach ($fasilitas as $f)
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Sarana</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('fasilitas.update',$f->id) }}"  method="POST">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="name">Nama Sarana</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $f->name }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="{{ $f->fasilitas }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="kategori">Kategori Olahraga</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" value="{{ $f->kategori }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $f->alamat }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="kota">Kota</label>
                    <input type="text" name="kota" class="form-control" id="kota" value="{{ $f->kota }}">
                </div>
                <div class="form-group">
                    <lable class="control-label" for="file">Gambar Fasilitas</lable>
                    <input type="file" name="file" class="form-control" id="file" value="{{ $f->file }}">
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
@foreach ($fasilitas as $f)
<!-- Modal Delete -->
<div class="modal modal-danger fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('fasilitas.delete',$f->id) }}"  method="POST">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h4 class="text-center">Apakah anda yakin menghapus? :</h4></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- End Modal - Tambah -->
@endsection
@section('js')
<script>
  $(document).ready(function () {
    // Select2 Single  with Placeholder
    $('#id').select2({
      placeholder: "Pilih Desa",
      allowClear: true,

    });

    $('#puskesmas').select2({
      placeholder: "Pilih Puskesmas",
      allowClear: true,

    });

  });
</script>
@endsection
