<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }
      
      th, td {
        text-align: left;
        padding: 16px;
      }
      
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      </style>
  </head>
  <body>
      <table>
          <tr>
              <td> 
                  <table>
                      <tr>
                  <h4>
                   <img src="images/front-end/logo.png"> 
                  </h4>
                </table>
              </td>
          </tr>
      </table>
      <br><br>
              <!-- Table row -->
               <div class="container-fluid">
              <div class="row">
                <div class="col-12 table-responsive">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Sales Report : {{$startDate}} to {{$endDate}}</h3>
                        </div>
                        <div class="card-body">
                          {{-- <div class="chart">
                            <div id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                          </div> --}}
            
                          <table id="example1">
                            <thead>
                            <tr>
                              <th>Order ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Amount</th>
                              <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['orders'] as $order)
                            <tr>
                             
                              <td>{{$order->order_id}}</a></td>
                              <td>{{$order->username}}</td>
                              <td>{{$order->useremail}}</td>
                              <td>  {{$order->order_amount}}</td>
                              <td> <span class="badge badge-info right">{{$order->order_status}}</span> </td>
                            </tr>
                           @endforeach
                            </tbody>
                          </table>
                          {{-- table --}}
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
                 <!--/.col--> 
              </div>
              <!-- /.row -->
            </div>
            
  </body>
</html>