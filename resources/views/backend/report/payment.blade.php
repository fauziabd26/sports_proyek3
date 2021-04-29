@extends('backend.template')

@section('css')
    <!-- Datatables -->
    <link href="{{ asset("/assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/assets/backend/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/backend/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css") }}" rel="stylesheet">
@endsection

@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>{{ $title }} <small>{{ $title_desc }}</small></h3>
    </div>
  </div>

  
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
            <div class="well well-sm">
              <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <label>Tanggal Mulai</label>
                  <div class="input-group date date-input">
                    <input type="text" class="form-control" id="date_start" value="{{ "01-".date("m-Y") }}"/>
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <label>Tanggal Akhir</label>
                  <div class="input-group date date-input">
                    <input type="text" class="form-control" id="date_finish" value="{{ date("t")."-".date("m-Y") }}"/>
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <table id="table-user" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">No. Transaksi</th>
                  <th class="text-center">Type</th>
                  <th class="text-center">Pembayar/Pemilik Rekening</th>
                  <th class="text-center">Nominal</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr class="success">
                  <th colspan="4" style="font-size: 16px;">Akumulasi Pembayaran</th>
                  <th class="text-right"></th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<!-- Datatables -->
    <script src="{{ asset("/assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/jszip/dist/jszip.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/pdfmake/build/pdfmake.min.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/pdfmake/build/vfs_fonts.js") }}"></script>
    <script src="{{ asset("/assets/backend/vendors/moment/moment.min.js")}}"></script>
    <script src="{{ asset("/assets/backend/vendors/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") }}"></script>
    <script type="text/javascript">
        $('.date-input').datetimepicker({ format : 'DD-MM-YYYY' });
        var oTable = $('#table-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("report.payment.datatable") }}',
                data: function (d) {
                    d.date_start = $('#date_start').val();
                    d.date_finish = $('#date_finish').val();
                }
            },
            columns: [
                {data: 'date', name: 'date', className: 'text-center'},
                {data: 'notrans', name: 'notrans', className: 'text-center'},
                {data: 'type', name: 'type', className: 'text-center'},
                {data: 'account_name', name: 'account_name', className: ''},
                {data: 'amount', name: 'amount', className: 'text-right'}
            ],
            footerCallback: function ( row, data, start, end, display ) {
                var api = this.api(), data;
                var intVal = function ( i ) {
                    console.log(i);
                    var rex = /(<([^>]+)>)/ig;
                    return typeof i === 'string' ?
                        i.replace(/(<([^>]+)>)/ig, '').replace('Rp ','').replace(',','') *1 :
                        typeof i === 'number' ?
                            i : 0;
                };
                total_payment = api
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                    }, 0 );
     
                // Update footer
                $(api.column( 4 ).footer() ).html('<b style="font-size:16px;">Rp '+ String(total_payment).replace(/(.)(?=(\d{3})+$)/g,'$1,')+'</b>');
            }
        });
        $('.date-input').on('dp.change', function(){
            oTable.draw();
        });
    </script>
@endsection