<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <table>
          <tr>
              <td> 
                  <table>
                      <tr>
                <!--<div class="col-12">-->
                  <h4>
                   <img src="images/front-end/logo.png"> 
                    {{-- <small class="float-right">Date: 2/10/2014</small> --}}
                  </h4>
                <!--</div>-->
                <!-- /.col -->
                </table>
              </td>
          </tr>
          <tr>
              <td>
                  <table>
                  <tr>
                     <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong> Francis Alukkas.</strong><br>
                     
                     Kerala<br>
                    Phone: (804) 123-5432<br>
                    Email: francisalukkas@gmail.com
                  </address>
                </div> 
                  </tr>
                 </table>
              </td>
              <td>
                 <table>
                     
                  <tr>
                     <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$data['orders']->name}}</strong><br>
                    {{$data['orders']->address}}<br>
                 
                    Phone:   {{$data['orders']->mobile}}<br>
                    Email:   {{$data['orders']->email}}
                  </address>
                </div> 
                  </tr>
                 </table> 
              </td>
          </tr>
          <tr>
              <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{$data['orders']->id}}</b><br>
                  <br>
                  <b>Order ID:</b> {{$data['orders']->order_id}}<br>
                  <b>Order Date</b> {{\Carbon::parse($data['orders']->created_at)->format('M d Y')}}<br>                
                </div>
          </tr>
      </table>
      <br><br>
              <!-- Table row -->
               <div class="container-fluid">
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Product</th>
                      <th>QTY</th>
                      <th>Price</th>
               
                    </tr>
                    </thead>
                    <tbody>
                        @php $a=1; @endphp
                        @foreach($data['products'] as $item)
                    <tr>
                      <td>{{ $a }}</td>
                      <td>{{ $item->product_name }}</td>
                      <td>{{ $item->quantity}}</td>
                      <td>{{ $item->product_price}}</td>
                    </tr>
                    @php
                        $a++;
                    @endphp
                        @endforeach
                    </tbody>
                  </table>
                </div>
                 <!--/.col--> 
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Method: <span class="badge badge-info right">{{$data['orders']->payment_method}}</span> </p>
                  <p class="lead">Payment Status: <span class="badge badge-warning right">{{$data['orders']->payment_status}}</span></p>
                  <p class="lead">Order Status: <span class="badge badge-success right">{{$data['orders']->order_status}} </span></p>
                </div>
                <!-- /.col -->
                <div class="col-6">
              

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ $data['orders']->order_amount }}</td>
                      </tr>
                
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
  </body>
</html>