@extends('layouts.admin')
@section('title', 'Orders')
@section('page-style-files')
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
              <div class="chart">
                <div id="piechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  

@endsection

@section('javascripts-new')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
         google.charts.load('current', {packages: ['corechart', 'bar']});
         google.charts.setOnLoadCallback(drawChart);

         function drawChart() {
          var countCOD = {!! json_encode($countCOD, JSON_HEX_TAG) !!};
          var countONLINE = {!! json_encode($countONLINE, JSON_HEX_TAG) !!};
          console.log(countONLINE);
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Count'],
          ['COD',     countCOD],
          ['ONLINE',      countONLINE]
        ]);
  
        var options = {
          title: 'Order Payment Type',
          is3D: true,
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

</script>
@endsection