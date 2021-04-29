@extends('admin.template')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="row">
                @if(count($errors) > 0)
                  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                @endif
                  <form action="/sarana-store" method="post" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                        <label class="control-label" for="id_sports">Kategori Olahraga</label>
                        <select class="form-control" name="id_sports" required>
                          <option disabled="" selected="">Select</option>
                            @foreach ($sports as $s)
                            <option value="{{$s->id_sports}}">
                              {{$s->name_sports}}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="file">Upload Gambar</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                  <div class="form-group">
                    <label class="control-label">Deskripsi <span class="required">*</span>
                    </label>
                    <div class="input-group mb-3">
                      <textarea name="description" class="form-control" rows="3" placeholder="Deskripsikan Tentang Sarana nya" required></textarea>
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
                                <div class="input-group-addon">Rp  </div>
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
                  
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Submit</button>
                    <a type="button" class="btn btn-warning" href="{{ URL::previous() }}"><i class="fa fa-times-circle"></i> Cancel</a>
                  
                </div>
              </form>
              <style type="text/css">
                select.monthselect, select.yearselect{
                  color: #000;  
                }
              </style>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
@endsection

@section('javascript')
<!-- Parsley -->
<script src="{{ asset("/assets/backend/vendors/parsleyjs/dist/parsley.min.js")}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset("/assets/backend/vendors/moment/moment.min.js")}}"></script>
<script src="{{ asset("/assets/backend/vendors/datepicker/daterangepicker.js")}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#formcategory').parsley();
  });
</script>
@endsection