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
                            <h3 class="card-title"><a href="/olahraga"><h2>Sarana Olahraga</h2></a></h3>
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
                                <i class="fa fa-plus"></i>  Tambah Sarana
                            </a>
                        </div>
                        @if(count($pitch))
                                <table id="table-user" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th class="text-center">Kategori Olahraga</th>
                                            <th class="text-center">Nama Sarana</th>
                                            <th class="text-center">Nama Pemilik</th>
                                            <th class="text-center">Fasilitas</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;?>
                                    @foreach($pitch as $p)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $p->name_sports }}</td>
                                                <td class="text-center">{{ $p->name }}</td>
                                                <td class="text-center">{{ $p->fullname }}</td>
                                                <td class="text-center">{{ $p->description }}</td>
                                                <td class="text-center"><img src="{{ asset('images/sarana/') }}/{{ $p->image }}" style="width: 100px;" href="{{ asset('images/mitra/') }}/{{ $p->image }}" ></td>
                                                <td class="text-center">
                                                    <a href="/adminpage/pitch/{$p->id}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    {{ Form::open(array('route' => array('pitch.destroy', 'id' => $p->id), 'method' => 'delete', 'style' => 'display:inline;')) }}
                                                    <button type="submit" onclick="confirm(\'Apakah anda ingin menghapus data ini?\')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Hapus</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        @else
                        <br><br>
                        <h2>Silahkan Daftarkan Sarana Anda</h2>
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Sarana</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('route' => array('pitch.admin.store'), 'method' => 'post', 'id' => 'formcategory', 'class' => 'form-horizontal form-label-left', 'enctype' => 'multipart/form-data', 'autocomplete' => 'false')) }}
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name" disabled>Nama Pemilik
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" name="" class="form-control" id="user_id" value="{{auth()->user()->fullname}}" disabled>
                </div>
            </div>
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name">Nama Lapangan <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" name="name" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label col-md-3 col-sm-2 col-xs-15">Kategori</label>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                        <select name="id_sports" id="sports" class="form-control">
                            <option disabled="" selected="" value="">Pilih Kategori</option>
                            @foreach($pitch as $p)
                            <option value="{{$p->id_sports}}">{{$p->name_sports}}</option>
                            @endforeach
                        </select>
                        </div>                     
                    </div>
                </div>
                    <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Deskripsi
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Masukkan Foto Sarana
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="file" name="file" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status*</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <div id="status" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="isactive" value="1" required> Aktif
                        </label>
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="isactive" value="0"> Non Aktif
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <table class="table table-stripped">
                      <thead>
                        <tr>
                          <th class="text-center">Jam</th>
                          <th class="text-center">Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for($i = 0; $i < 24; $i++)
                          <tr>
                            <td class="text-center">@if($i<10)0{{ $i }}@else{{ $i }}@endif:00</td>
                            <td>
                              <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="number" name="price[]" min="0" class="form-control" value="0" required/>
                              </div>
                            </td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Submit</button>
                    <a type="button" class="btn btn-warning" href="{{ URL::previous() }}"><i class="fa fa-times-circle"></i> Cancel</a>
                  </div>
                </div>
              {{ Form::close() }}
              <style type="text/css">
                select.monthselect, select.yearselect{
                  color: #000;  
                }
              </style>
        </div>
    </div>
</div>
<!-- End Modal - Tambah -->
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
