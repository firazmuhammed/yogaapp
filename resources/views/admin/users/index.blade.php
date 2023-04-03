


@extends('layouts.admin')
@section('title', 'Users')
@section('page-style-files')
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
              <div class="card-header ">
                  <div class="head-section">
                <h3 class="card-title">Users</h3>
                <!--<a class="btn btn-success" data-toggle="modal"  data-target="#modal-add">+</a>-->
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Street</th>
                    <th>Suburb</th>
                    <th>Pincode</th>
                    <th>State</th>
                    <th>Pick up location</th>
                    <th>privillage card no</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                @php 
                    $a=1;
                @endphp    
                @foreach($users as $user)    
                  <tr>
                    <td>{{$a}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->street}}</td>
                    <td>{{$user->suburb}}</td>
                    <td>{{$user->pincode}}</td>
                    <td>{{$user->state}}</td>
                    <td>{{$user->pick_up_location}}</td>
                    <td>{{$user->privillage_card_no}}</td>
                 
                   
                  </tr>
                  @php $a++; @endphp  
                @endforeach
                
               
                  </tbody>
                
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
  
  <!-- /.modal -->
<!-- ./wrapper -->

  <!-- /.modal -->
@endsection
@section('page-js-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
   
      });
      
    });
  </script>
  <script>
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
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/pdfmake/vfs_fonts.js')}}"></script>

@endsection

