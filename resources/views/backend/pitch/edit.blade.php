@extends('backend.template')

@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          @foreach ($pitches as $p)
          <div class="row">
            <form action="/adminpage/pitch/{$p->id}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name" disabled>Nama Pemilik
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" name="" class="form-control" id="user_id" value="{{auth()->user()->fullname}}" disabled>
                </div>
              </div>  
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name">Nama Sarana <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" name="name" class="form-control" value="{{ $p->name }}" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <label class="control-label col-md-3 col-sm-2 col-xs-15">Kategori</label>
                  <div class="col-md-9 col-sm-8 col-xs-12">
                    <select name="id_sports" id="sports" class="form-control">
                      <option disabled="" selected="" value="">Pilih Kategori</option>
                      @foreach($pitches as $p)
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
                  <textarea name="description" class="form-control" rows="3">{{ $p->description }}</textarea>
                </div>
              </div>
              <div class="row form-group">
                <label  class="control-label" for="text">Foto Kategori Olahraga Lama</label>
                <div class="col-sm-8">
                  <img src="{{ asset('images/sarana') }}/{{$p->image }}" style="width: 100px;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Status*</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div id="status" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default @if($p->isactive == '1') active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="isactive" value="1" @if($p->isactive == 1) checked @endif required> Aktif
                    </label>
                    <label class="btn btn-default @if($p->isactive == '0') active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="isactive" value="0" @if($p->isactive == 0) checked @endif> Non Aktif
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
                    @foreach($arrprice as $price)
                      <tr>
                        <td class="text-center">@if($p->time_number < 10)0{{ $price->time_number }}@else{{ $i }}@endif:00</td>
                        <td>
                          <div class="input-group">
                            <div class="input-group-addon">Rp</div>
                            <input type="number" name="price[]" min="0" class="form-control" value="{{ floatval($price->price) }}" required/>
                          </div>
                        </td>
                      </tr>
                    @endforeach
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
            </form>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
    select.monthselect, select.yearselect{
      color: #000;  
    }
  </style>
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
    $('#formuser').parsley();
      $('#birthdate').daterangepicker({
        locale: {
          format: 'YYYY-DD-MM'
        },
        showDropdowns: true,
        singleDatePicker: true,
        calender_style: "picker_1"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
  });
</script>
@endsection