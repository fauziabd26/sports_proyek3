@extends('calonadmin.template')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mitra</th>
                    <th>Nama Pemilik</th>
                    <th>Fasilitas</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Foto</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                @foreach($mitra as $m)
                    <tr>
                        <th scope="row">{{ $no++ }}</td>
                        <td>{{ $m->nama_mitra }}</td>
                        <td>{{ $m->nama_admin }}</td>
                        <td>{{ $m->fasilitas }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->kota }}</td>
                        <td>{{ $m->Foto }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $m->id_mitra }}">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <a href="fasilitas-destroy{{$f->id_mitra}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    <!-- Main content -->
    <section class="content">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
              <h4 class="card-header">Daftar Mitra</h4>
              <div class="card-body">
                <p class="card-text">Daftrakan mitra anda sekarang juga. <br><br><br><br><br></p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-daftar" >Daftar Mitra</a>
              </div>
            </div>
          </div>
        <div class="row">
                <section class="col-lg-7 connectedSortable">
                </section>
            </div>
        </div>
    </section>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="modal-daftar" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Daftar Mitra</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/mitra/store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    @foreach($admin as $m)
                    <div class="form-group">
                        <label class="control-label" for="nama_admin">Nama Admin</label>
                        <input type="text" name="nama_admin" class="form-control" value="{{ $m->id_admin }}" disabled>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label class="control-label" for="nama_mitra">Nama Mitra</label>
                        <input type="text" name="nama_mitra" class="form-control" id="nama_mitra" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fasilitas">Fasilitas</label>
                        <textarea name="fasilitas" class="form-control" id="fasilitas" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kota">Kota</label>
                        <input type="text" name="kota" class="form-control" id="kota" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="foto_mitra">Upload Gambar Mitra</label>
                        <input type="file" name="foto_mitra" class="form-control" required>
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
<!-- End Modal - Daftar -->
@stop
