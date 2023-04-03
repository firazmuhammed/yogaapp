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
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('dashboard/orders')}}">Orders</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="callout callout-info">
              <img style="width: 10%" src="{{ url('images/admin/logo.png') }}">
              <h5 class="order-field" >Christmas Order 2022</h5>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                   
                    {{-- <small class="float-right">Date: 2/10/2014</small> --}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 Customer :
                  <address>
                   <p class="customer-name">{{$orders->name}}</p> <br>
                    {{$orders->street}}<br>
                    {{$orders->suburb}}<br>
                    {{$orders->state}}<br>
                    {{$orders->pincode}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
               
                  <address>
                  
                  </address>
                </div>
                <!-- /.col -->
              
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{$orders->id}}</b><br>
                  <br>
                  <b>Order ID:</b> {{$orders->order_id}}<br>
                  <b>Payment Method</b> {{ $orders->payment_method }}<br>	
                  <b>Order Date</b> {{\Carbon::parse($orders->created_at)->format('M d Y')}}<br>
               
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
             
                  <div class="col-md-4">
                    <h5>Pick up Date : {{\Carbon::parse($orders->delivery_date)->format('M d Y')}}</h5>
                  </div>
                  <div class="col-md-4">
                    <h5>Time Slot : {{$orders->time_slot}}</h5>
                  </div>
                  <div class="col-md-4">
                   
                  </div>
               
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
               
                    </tr>
                    </thead>
                    <tbody>
                      @php $a=1; @endphp
                     @foreach( $data['products'] as $data)
                    <tr>
                      <td>{{ $a }}</td>
                      <td>{{ $data->product_name }}</td>
                      <td>{{ $data->qty}}</td>
                      <td>{{ $data->price}}</td>
                    
                  
                    </tr>
                    @php $a++;@endphp
                   @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Method: <span class="badge badge-info right"></span>   {{ $orders->payment_method }}</p>
                  <p class="lead">Remaining amount: <span class="badge badge-info right"></span>   {{ $orders->advance}}</p>
                
                </div>
                <!-- /.col -->
                <div class="col-6">
              

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$orders->order_amount}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Grand Total:</th>
                        <td>{{$orders->order_amount}}</td>
                      </tr>
                
                    </table>
                  </div>
                  
                </div>

               
                <!-- /.col -->
              </div>
              <!-- /.row -->
      
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!--<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
                
                  <!--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">-->
                      
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  


@endsection