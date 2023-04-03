@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard </li>
          </ol>
        </div><!-- /.col --> --}}
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('dashboard/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- /.col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>Total Bulk Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0 KG</h3>

                <p>Quantity</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('dashboard/order-quantity-bulk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- /.col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>

                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="ion ion ion-pie-graph"></i>
              </div>
              <a href="{{url('dashboard/products')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- /.col -->

     

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
<!--          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>
            </div>
             /.info-box-content 
          </div>-->
          <!-- /.info-box -->
<!--          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="far fa-heart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>
            </div>
             /.info-box-content 
          </div>-->
          <!-- /.info-box -->
<!--          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>
            </div>
             /.info-box-content 
          </div>-->
          <!-- /.info-box -->
<!--          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="far fa-comment"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>
            </div>
             /.info-box-content 
          </div>-->
          <!-- /.info-box -->

<!--          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Browser Usage</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
             /.card-header 
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                   ./chart-responsive 
                </div>
                 /.col 
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="far fa-circle text-danger"></i> Chrome</li>
                    <li><i class="far fa-circle text-success"></i> IE</li>
                    <li><i class="far fa-circle text-warning"></i> FireFox</li>
                    <li><i class="far fa-circle text-info"></i> Safari</li>
                    <li><i class="far fa-circle text-primary"></i> Opera</li>
                    <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                  </ul>
                </div>
                 /.col 
              </div>
               /.row 
            </div>
             /.card-body 
            <div class="card-footer bg-white p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    United States of America
                    <span class="float-right text-danger">
                      <i class="fas fa-arrow-down text-sm"></i>
                      12%</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    India
                    <span class="float-right text-success">
                      <i class="fas fa-arrow-up text-sm"></i> 4%
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    China
                    <span class="float-right text-warning">
                      <i class="fas fa-arrow-left text-sm"></i> 0%
                    </span>
                  </a>
                </li>
              </ul>
            </div>
             /.footer 
          </div>-->
          <!-- /.card -->

         
          <!-- /.card -->
        </div>
        <!-- /.col -->

       
  

      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  @endsection
  @section('javascripts-new')

  @endsection

  @section('javascripts')
  <script src="admin-lte/dist/js/demo.js"></script>
  <script src="admin-lte/dist/js/pages/dashboard3.js"></script>
@endsection