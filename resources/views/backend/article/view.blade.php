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
                            <h3 class="card-title"><a href="/olahraga"><h2>Data Artikel</h2></a></h3>
                        </div>
                        <br>

                        <div class="data-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                <i class="fa fa-plus"></i>  Tambah Artikel
                            </button>
                        </div>
                        @if(count($data))
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Dibuat Tanggal</th>
                                            <th style="width:150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($data as $d)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $d->title }}</td>
                                                <td>{{ $d->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="olahraga-destroy" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
