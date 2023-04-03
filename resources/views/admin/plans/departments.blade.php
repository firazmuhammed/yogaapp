


@extends('layouts.admin')
@section('title', 'Shops')
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
            <h1>Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Departments</li>
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
                <h3 class="card-title">Departments List</h3>
                <a class="btn btn-success" data-toggle="modal"  data-target="#modal-add">+</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @php 
                    $a=1;
                     @endphp
                      @foreach ($department as $department)
                  <tr>
                    <td>{{$a}}</td>
                    <td>{{$department->department_name}}
                    </td>
                    <td>
                      @if($department->status==1)
                    Active
                     @else
                    Deactive
                    @endif
                    </td>
                    <td>
                        <span class="del delete" data-route="{{url('dashboard/delete-department/'.$department->id)}}">
                        <a  class="badge bg-red"><i class="fa fa-trash " aria-hidden="true"></i></a>
                        </span>
                        <a href="" class="badge bg-blue edit" data-toggle="modal" data-id="{{$department->id}}" data-name="{{$department->department_name}}" data-status="{{$department->status}}" data-target="#modal-lg"><i class="fas fa-edit" aria-hidden="true"></i></a>
                    </td>
                   
                  </tr>
               @php 
                    $a++;
                     @endphp
               @endforeach
               
                  </tbody>
<!--                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Option</th>
                    <th>Value</th>
                    <th>Action</th>
                   
                  </tr>
                  </tfoot>-->
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
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        {{ Form::open(array('url' => 'dashboard/add-department','id' => 'addDepartment')) }}
        <div class="modal-header">
          <h4 class="modal-title">Add Departments</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Department Name</label>
                 <input type="text" name="name" class="form-control">
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
<!-- ./wrapper -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        {{ Form::open(array('url' => 'dashboard/update-department','id' => 'editDepartment')) }}
        <div class="modal-header">
          <h4 class="modal-title">Edit Department</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Department Name</label>
                 <input type="text" name="name" id="dep_name" class="form-control">
                 <input type="hidden" name="dep_id" id="dep_id" class="form-control">
            </div>
            <div class="form-group">
                <label>Status</label>
                 <select class="form-control select2" name="status" id="dep_status" style="width: 100%;">
                      <option value="0">Deactive</option>
                      <option value="1">Active</option>
                    
                    </select>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{url('admin-lte/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{url('admin-lte/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
         jQuery.validator.setDefaults({});

        $.validator.addMethod("alpha", function(value, element) {
                 return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
                }, 'Please Enter a valid location.');


         $("#addDepartment").validate({
               rules: {
                name: {
                    required: true,
                    alpha :true
                 },
               },
                messages: { },
                onkeyup: function( element, event ) {
                  $(element).valid();
                }
         });

         $("#editDepartment").validate({
               rules: {
                name: {
                    required: true,
                    alpha :true
                 },
               },
                messages: { },
                onkeyup: function( element, event ) {
                  $(element).valid();
                }
         });


  });
  </script>
  
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
  <script type="text/javascript">
      $(function(){
          $('.edit').click(function(){
              var id = $(this).data('id');
              var name = $(this).data('name');
              var status = $(this).data('status');
              
              
              $('#dep_id').val(id);
              $('#dep_name').val(name);
              $('#dep_status').val(status);
              
              $('#modal-lg').model('show');
          })
      })

</script>
<script type="text/javascript">

  $('.delete').on('click', function () {
      var location = $(this).data('route');
      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.value) {
              window.location.href = location;
          }
      })
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

