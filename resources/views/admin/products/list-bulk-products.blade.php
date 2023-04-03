


@extends('layouts.admin')
@section('title', 'Products')
@section('page-style-files')
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bulk Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Bulk Products</li>
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
                <h3 class="card-title">Bulk Products</h3>
                <a class="btn btn-success" href="{{url('dashboard/add-bulk-product')}}">+</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                 
                    <th>Name</th>
             
                    <th>Unit Price</th>
                    <th>Availabe Quantity</th>
                    <th>Unit</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @php  $resultsProduct = $results['products'];
                    $a =1;
                    @endphp
                    @foreach ($resultsProduct as  $key=>$product)
                  <tr>
                    <td>{{$a}}</td>
                   
                    <td>
                       {{$product->product_name}}
                    </td>
                  
                    <td>
                      {{$product->unit_price}}
                    </td>
                    <td>
                      {{$product->available_quantity}}
                     </td>
                     <td>
                      {{$product->unit}}
                     </td>
                     <td>
                 
                     @if ($product->status==1)    
                      <small class="right badge badge-success">Active</small>
                       @else
                       <small class="right badge badge-danger">Inactive</small>
                       @endif
                 
                     </td>
                    <td>
                       <a class="badge bg-primary" href="{{url('dashboard/edit-bulk-product').'/'.$product->id}}">Edit </a> 
                      
                        <a class="badge bg-red"  href="{{url('dashboard/delete-bulk-product').'/'.$product->id}}" id="deleteProductId" products_id="695">Delete</a>
              
                    </td>
                   
                  </tr>
                  @php
                  $a++;
                  @endphp
                  @endforeach
                 
               
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Option</th>
                    <th>Value</th>
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

<!-- ./wrapper -->

@endsection
@section('page-js-script')
<script>
  @if (session('success'))
  toastr.success("{{ session('success') }}")
  @endif
  </script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "bInfo": true,
      "responsive": true, "lengthChange": false, "autoWidth": false,
 
    });
    
  });
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

