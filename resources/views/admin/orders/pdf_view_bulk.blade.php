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
            <button class=" btn btn-primary btnprn" onclick="window.print();" >print</button>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
     
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="callout">
                <img style="width: 10%" src="{{ url('images/admin/logo.png') }}">
                <h5 class="order-field" >TAX INVOICE</h5>
              </div>
     
            <!-- Main content -->
            @foreach($array as $da)
         
            <div class="invoice p-3 mb-3 myinvoice">
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
              @php
              $orders= \App\Models\BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile','users.street','users.suburb','users.pincode')
->join('users','users.id','=','bulk_orders.user_id')
->where('order_id', $da)
->first();
           @endphp
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
                  <p>
                    <b>Aptus Seafoods Pty Ltd</b> <br>
                     322-326 Coventry St<br>
                     South Melbourne, VIC 3205,<br>
                     ABN – 48054013562
                   </p>
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
                  <h5>Pick up</h5>
                  </div>
                  <div class="col-md-4">
                    <h5>Pick up Date : {{\Carbon::parse($orders->delivery_date)->format('M d Y')}}</h5>
                  </div>
                  <div class="col-md-4">
                    <h5> Address:   {{ $orders->address }}</h5>
                  </div>
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>GST</th>
                        <th>Amount</th>
                 
                      </tr>
                    </thead>
                    <tbody>
                      @php $a=1;
                      $data['products'] =\App\Models\BulkOrderDetails::where('bulk_orders.order_id',$da)
                 ->join('bulk_orders','bulk_orders.id','=','bulk_order_details.order_id')
           
                          ->get();
                       @endphp
                     @foreach( $data['products'] as $data)
                     <tr>
                      <td>{{ $a }}</td>
                      <td>{{ $data->product_name }}</td>
                      <td>{{ $data->quantity}}</td>
                      <td>${{ $data->price }}</td>
                      <td>GST Free</td>
                      <td>${{ $data->quantity*$data->price }}</td>
                    
                  
                    </tr>
                    @php $a++;@endphp
                   @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
            
              <div class="row">
                <!-- accepted payments column -->
              
                <div class="col-6">
                  @if($orders->payment_method=="Stripe")
                  <p class="lead">Payment Method: <span class="badge badge-info right"></span>
                   {{ $orders->payment_method }}
                 </p>
                 <p class="lead">Remaining amount: <span class="badge badge-info right"></span>   {{$orders->advance}}</p>
                 @else
                 <p>The Payment Due date is 7 days from date of Invoice.</p>
                 @endif
                 
                </div>
           
                <!-- /.col -->
                <div class="col-6">
              

                    <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Sub Total AUD:</th>
                            <td>{{$orders->order_amount}}</td>
                          </tr>
                         
                    
                        </table>
                      </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
           
              <!-- this row will not appear when printing -->
              <div class="row">
                <div class="col-12">
                  @if($orders->payment_method=="Pay Later")
                  
                    <b>Remittance Advice</b><br>
                     EFT PAYMENTS<br>
                     Account Name: Aptus Seafoods<br>
                     BSB: 063 118<br>
                     Account Number: 10012511<br>
                     Quote Invoice Number as reference
                  </p>
                  @endif
                  <!--<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
                <p style="color: red">No claims will be recognized 24 Hours after receipt of goods.<br>
                  Please note: This invoice is issued in accordance with the terms and conditions of credit contained
                within our credit application
                </p>
                  <!--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">-->
                      
                </div>
              </div>
             
            </div>
     
            @endforeach
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   
@endsection