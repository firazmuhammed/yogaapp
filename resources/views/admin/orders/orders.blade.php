


@extends('layouts.admin')
@section('title', 'Orders')
@section('page-style-files')
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="print p-5">
              <button class="btn btn-primary " id="btnSelectedRows">
                Click here to print invoice
                   </button>
             </div>
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
           
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <label>Date Filter</label>
                   <select id="dropdown1" class="form-control">
                     <option value="" >All</option>
                     <option value="Dec 23 2022">Dec 23 2022</option>
                     <option value="Dec 24 2022">Dec 24 2022</option>
                   </select>
                  </div>
                   <div class="col-md-2">
                    <label>Time Filter</label>
                   <select id="dropdown2" class="form-control">
                     <option value="" >All</option>
                     <option value="6 am to 7 am">6 am to 7 am</option>
                     <option value="7 am to 8 am">7 am to 8 am</option>
                     <option value="8 am to 9 am">8 am to 9 am</option>
                     <option value="9 am to 10 am">9 am to 10 am</option>
                     <option value="10 am to 11 am">10 am to 11 am</option>
                     <option value="11 am to 12 pm">11 am to 12 am</option>
                     <option value="12 pm to 1 pm">12 pm to 1 pm</option>
                     <option value="1 pm to 2 pm">1 pm to 2 pm</option>
                     <option value="2 pm to 3 pm">2 pm to 3 pm</option>
                     <option value="3 pm to 4 pm">3 pm to 4 pm</option>
                   </select>
                  </div> 
                 
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>PickUp Date</th>
                    <th>Time Slot</th>
                    <th>Order Type</th>
              
                    <th>Amount</th>
                    <th>Plan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   
                    @foreach($data['orders'] as $order)
                  <tr>
                    <td></td>
                    <td>{{$order->order_id}}</td>
                    <td>
                      {{$order->name}}
                    </td>
                
                    <td>{{\Carbon::parse($order->delivery_date)->format('M d Y')}}</td>
                    <td>  {{$order->time_slot}}</td>
                    <td> @if($order->order_type=="Home Delivery") Home Delivery @else Pickup @endif</td>
                    <td>  {{$order->order_amount}}</td>
                    <td>{{ $order->plan_name }}</td>
                 
                    <td>
                      
                      <a href="{{ url('dashboard/view-invoice').'/'.$order->id }}" option_id="" class="badge bg-green"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     
                   
                    </td>
                  </tr>
                 @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  </tfoot> --}}
                </table>
                {{ $data['orders']->links('vendor.pagination.bootstrap-4') }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- /.control-sidebar -->
 <form id="print" method="POST" action="{{ url('dashboard/print') }}">
  @csrf
   <input type="text"  name="ids[]" id="ids">
 </form>
<!-- ./wrapper -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {{ Form::open(array('url' => 'dashboard/update-tracking-status')) }}
      <div class="modal-header">
        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="id" id="order_id">
      <div class="modal-body">
         <select name="status" id="track-status" class="form-control">
         
         </select>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      {{ Form::close() }}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-tracker">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {{ Form::open(array('url' => 'dashboard/update-delivery-details')) }}
      <div class="modal-header">
        <h4 class="modal-title">Delivery details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Delivery Partner</label>
          <input type="text" class="form-control" id="partner" name="delivery_partner" placeholder="Delivery Partner">
          <small id="emailHelp" class="form-text text-muted">Example :Delhivery</small>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" id="order_id_">
          <label for="exampleInputEmail1">Tracking Id</label>
          <input type="text" class="form-control" id="trackingid" name="tracking_id" placeholder="Traacking id">
          <small id="emailHelp" class="form-text text-muted">Example :78xucbb12</small>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Tracking Details</label>
          <textarea class="form-control" name="details" id="details" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      {{ Form::close() }}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('page-js-script')
<script>
    $(function () {
      table =$("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "pageLength": 40,
        columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
    }],
        select: {
            style: 'multi'
        }
   
      });
      $('#btnSelectedRows').on('click', function() {
  var tblData = table.rows('.selected').data();
  var tmpData;
  var myarray = [];
  var _token = $('meta[name="csrf-token"]').attr('content');
  $.each(tblData, function(i, val) {
    tmpData = tblData[i][1];
    myarray.push(tmpData);
  }); 
  $("#ids").val(myarray);
  $("#print").submit();
});
$('#dropdown1').on('change', function() {
  table.columns(3).search(this.value).draw();

});
$('#dropdown2').on('change', function() {
  table.columns(4).search(this.value).draw();

});
    
      
    });   
  
 
      @if (session('success'))
    toastr.success("{{ session('success') }}")
    @endif
  </script>
  @stop
<!-- jQuery -->


@section('javascripts-new')

<script src="{{url('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>


@endsection

