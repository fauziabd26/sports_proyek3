@extends('superadmin.template')
@section('content')
<!-- page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="/fasilitas"><h2>Data User</h2></a></h3>
                        </div>
                        <br>

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
                                            <th>No</th>
                                            <th>Kategori Olahraga</th>
                                            <th>Deskripsi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach($fasilitas as $f)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</td>
                                                <td>{{ $f->name_olahraga }}</td>
                                                <td>{{ $f->fasilitas }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $f->id_fasilitas }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="fasilitas-destroy{{$f->id_fasilitas}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/fasilitas/store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="id_olahraga">Kategori Olahraga</label>
                        <select class="control-label" type="text" name="id_olahraga" style="width: 100%">
                          <option disabled="" selected="">Select</option>
                          @foreach ($olahraga as $f)
                            <option value="{{$f->id_olahraga}}">
                              {{$f->name_olahraga}}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label class="control-label" for="fasilitas">Deskripsi</label>
                        <textarea name="fasilitas" class="form-control" id="fasilitas" rows="3" required></textarea>
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

@foreach ($fasilitas as $f)
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-{{ $f->id_fasilitas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Sarana</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('fasilitas.update',$f->id_fasilitas) }}"  method="POST">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="kategori">Kategori Olahraga</label>
                    <select class="control-label" name="id_olahraga" id="id_olahraga" style="width: 100%">
                        @foreach ($olahraga as $o)
                        <option value="{{ $o->id_olahraga }}">
                        {{$o->name_olahraga}}
                          </option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="fasilitas">Deskripsi</label>
                    <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="{{ $f->fasilitas }}">
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
@stop
