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
                            <h3 class="card-title"><a href="/artikel-category"><h2>Kategori Artikel</h2></a></h3>
                        </div>
                        <br>
                        <div class="data-tools">
                            <a class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i>  Tambah Kategori
                            </a>
                        </div>
                        @if(count($category))
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th>Kategori Artikel</th>
                                            <th>Deskripsi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($category as $a)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $a->name }}</td>
                                                <td>{{ $a->description }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $a->id }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <a href="artikel_category-destroy-{{$a->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
                                <i class="fa fa-exclamation-triangle"></i> Data Kategori Artikel Belum tersedia
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
            <form action="/artikel_category-store"  method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="name">Kategori Artikel</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Deskripsi</label>
                        <textarea type="text" name="description" class="form-control" id="description" required></textarea>
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

@foreach ($category as $a)
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Kategori Artikel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('article_category.update',$a->id) }}"  method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="form-group">
                    <label class="control-label" for="name">Kategori Artikel</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $a->name }}">
                </div>
                <div class="row form-group">
                    <label  class="control-label" for="description">Deskripsi</label>
                    <textarea type="text" name="description" class="form-control" id="description" value="{{ $a->description }}"></textarea>
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
