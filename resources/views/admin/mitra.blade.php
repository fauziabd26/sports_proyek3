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
                                <h3 class="card-title"><a href="/mitra-admin"><h2>Data Mitra</h2></a></h3>
                            </div>
                        <br>
                        <div class="card-body">
                        @if(count($mitra))
                            
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th class="text-center">Nama Mitra</th>
                                            <th class="text-center">Fasilitas</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Kota</th>
                                            <th class="text-center">Bank</th>
                                            <th class="text-center">Nama Rekening</th>
                                            <th class="text-center">Nomor Rekening</th>
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
                                                <td>{{ $m->fasilitas }}</td>
                                                <td>{{ $m->alamat }}</td>
                                                <td>{{ $m->kota }}</td>
                                                <td>{{ $m->bank }}</td>
                                                <td>{{ $m->namarek }}</td>
                                                <td>{{ $m->norek }}</td>
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
                        <input type="text" name="nama_mitra" class="form-control" id="nama_mitra" placeholder="Nama Mitra" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fasilitas</label>
                        <textarea name="fasilitas" class="form-control" id="fasilitas" placeholder="Fasilitas" required> </textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" rows="3" required> </textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="kota" class="form-control" id="kota" placeholder="Kota" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="namarek" class="form-control" id="namarek" placeholder="Nama Rekening" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="norek" class="form-control" id="norek" placeholder="Nomor Rekening" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="bank" class="form-control" id="bank" placeholder="Bank" required="">
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
                @csrf
                <div class="form-group">
                    <label class="control-label" for="nama_mitra">Nama Mitra</label>
                    <input type="text" name="nama_mitra" class="form-control" id="nama_mitra" value="{{ $m->nama_mitra }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="fasilitas">Fasilitas</label>
                    <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="{{ $m->fasilitas }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $m->alamat }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="kota">Kota</label>
                    <input type="text" name="kota" class="form-control" id="kota" value="{{ $m->kota }}" disabled="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="bank">Bank</label>
                    <input type="text" name="bank" class="form-control" id="bank" value="{{ $m->bank }}" disabled="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="namarek">Nama Rekening</label>
                    <input type="text" name="namarek" class="form-control" id="namarek" value="{{ $m->namarek }}" disabled="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="norek">Nomor Rekening</label>
                    <input type="text" name="norek" class="form-control" id="norek" value="{{ $m->norek }}" disabled="">
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
