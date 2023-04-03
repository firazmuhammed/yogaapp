@extends('layouts.admin')
@section('title', 'Orders')
@section('page-style-files')
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
 <!-- Select2 -->
<link rel="stylesheet" href="{{url('admin-lte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@stop
@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- BAR CHART -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sales Report</h3>
            </div>
            <div class="card-body">
              {!! Form::open(array('url' =>'dashboard/sales-report', 'method'=>'get', 'class' => 'form-horizontal form-validate')) !!}
              <div class="form-group">
                <label>Categories</label>
                <select class="select2 " style="width: 100%;" name="category" > 
                    
                    <option value="all"  @if($category =='all') selected @endif>All Categories</option>  
                    @foreach($allCategories as $allCategory)                                          
                    <option value="{{$allCategory->id}}" @if($category == $allCategory->id) selected @endif>{{$allCategory->name}}</option> 
                    @endforeach
                </select>
             </div>
             <!-- /.form group -->
             <div class="form-group">
              <label>Products {{$product}}</label>
              <select class="select2" style="width: 100%;" name="product" > 
                  
                  <option value="all" @if($product =='all') selected @endif>All Products</option>  
                  @foreach($allProducts as $allProduct)                                          
                  <option value="{{$allProduct->id}}" @if($product == $allProduct->id) selected @endif>{{$allProduct->product_name}}</option> 
                  @endforeach
              </select>
           </div>
           <!-- /.form group -->
              <div class="form-group">
                <label>Date range:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control float-right" value ="{{ $startDate}} - {{ $endDate }}" id="reservation" name ="reservation">
                </div>
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <button type="submit" id="viewReport" class="btn btn-info ">View Report</button>
              </div>
              <!-- /.form group -->
              {!! Form::close() !!}
              <div class="chart">
                <div id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
              </div>

              <table id="example1" class="table table-bordered table-striped mt-5">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Name</th>
                  <td>Email</td>
                  {{-- <th>Delivery Address</th> --}}
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['orders'] as $order)
                <tr>
                 
                  <td><a href="{{ url('dashboard/view-invoice').'/'.$order->id }}" option_id="">{{$order->order_id}}</a></td>
                  <td>{{$order->username}}</td>
                  <td>{{$order->useremail}}</td>
                  {{-- <td>
                    {{print_r($order->getAddress())}}
                  </td> --}}
                  <td>  {{$order->order_amount}}</td>
                  <td> <span class="badge badge-info right">{{$order->order_status}}</span> </td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" style="text-align:right">Total:</th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
              {{-- table --}}
              {{-- {{ $data['orders']->links('vendor.pagination.bootstrap-4') }} --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="{{url('/dashboard/sales-report/pdf'.'/'.$category.'/'.$product.'/'.$startDate.'/'.$endDate)}}" target="_blank" class="btn btn-info btn-sm float-left uppercase"><i class="fas fa-download"></i> Download PDF</a>
              <a href="{{url('/dashboard/sales-report/csv'.'/'.$category.'/'.$product.'/'.$startDate.'/'.$endDate)}}" target="_blank" class="btn btn-info btn-sm uppercase"><i class="fas fa-download"></i> Download CSV</a>
              <a href="{{url('/dashboard/sales-report/xls'.'/'.$category.'/'.$product.'/'.$startDate.'/'.$endDate)}}" target="_blank" class="btn btn-info btn-sm float-right uppercase"><i class="fas fa-download"></i> Download XLS</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  

@endsection

@section('javascripts-new')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/pdfmake/vfs_fonts.js')}}"></script>


<script type="text/javascript">
  var firstDate;
  var secondDate;
  $(function () {

    //Date range picker
    //$('#reservation').daterangepicker()

    var start = moment().subtract(6, 'months');
    var end = moment();

    function cb(start, end) {
        $('#reservation span').html(start.format('DD/MM/YYYY') + '-' + end.format('DD/MM/YYYY'));
        firstDate = start;
        secondDate = end;
    }

    $('#reservation').daterangepicker({
        startDate: start,
        endDate: end,
        minDate: "01/01/2015",
        maxDate: end,
        showDropdowns : true, 
        locale: {
        format: "DD/MM/YYYY",}

    }, cb);

    cb(start, end);

  });


</script>
<!-- Select2 -->
<script type="text/javascript"  src="{{url('admin-lte/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('.select2').select2()
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example1').DataTable( {
      "bFilter" : false,               
      "bLengthChange": false,
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
              Math.round(total) );
            //+pageTotal +' ( '+ total +' total)'
        }
    } );
} );
</script>


<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
      var orders = {!! json_encode($orders, JSON_HEX_TAG) !!};

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Month');
      data.addColumn('number', 'Sales');

      data.addRows([
        @php
            foreach($orders as $key => $value) {
                echo "['".$value['month']."', ".$value['total']."],";
            }
        @endphp
      ]);

      var options = {
        title: 'Sales Report',
        hAxis: {
          title: 'Months',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        bar: {groupWidth: "20%"},
        vAxis: {
          title: 'Sales Amount',
          //gridlines: { count: 1},
          //ticks: [0,20000,40000,60000,80000,100000, 120000,140000, 160000,180000, 200000]
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('barChart'));

      chart.draw(data, options);
    }

  // google.charts.load('current', {packages: ['corechart', 'bar']});
  // google.charts.setOnLoadCallback(drawTitleSubtitle);

  // function drawTitleSubtitle() {
  //     var orders = {!! json_encode($orders, JSON_HEX_TAG) !!};
  //     console.log(orders);
     
  //   var data = google.visualization.arrayToDataTable([
  //     ['Months', 'Sales'],
  //     @php
  //           foreach($orders as $key => $value) {
  //               echo "['".$value['month']."', ".$value['total']."],";
  //           }
  //     @endphp
  //   ]);

  //   var materialOptions = {
  //     chart: {
  //       title: 'Sales Report',
  //     },
  //     hAxis: {
  //       title: 'Total Population',
  //       minValue: 0,
  //     },
  //     vAxis: {
  //       title: 'City'
  //     },
  //     axes: {
  //           y: {
  //             0: { side: 'left', label: 'Amount'} // Top x-axis.
  //           }
  //         },
  //     bars: 'vertical'
  //   };
  //   var materialChart = new google.charts.Bar(document.getElementById('barChart'));
  //   materialChart.draw(data, materialOptions);
  // }
</script>

@endsection