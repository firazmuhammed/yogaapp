


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
           
              
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
           
              <div class="card-body">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
               
                    <th>Name</th>
                    <th>Qty</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                   
                  @foreach ($order as $orders )
                      
         
                  <tr>
                    <td>{{  $orders ->product_name }}</td>
                    <td>{{  $orders ->qty}}</td>
                   
                 
                   
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

