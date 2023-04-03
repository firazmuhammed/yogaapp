


@extends('layouts.admin')
@section('title', 'Plans')
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
            <h1>Plans
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Plans</li>
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
                <h3 class="card-title">Plans List</h3>
              
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                 
                   
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $a=1;
                    @endphp
                  @foreach($plans as $plan)
                  <tr>
                    <td>{{ $a }}</td>
                    <td>
                  {{ $plan->plan_name }}
                    </td>
                   
                   
                  </tr>
                  @php
                    $a++;
                  @endphp
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
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        {{ Form::open(array('url' => 'dashboard/add-store','id' => 'addShop')) }}
        <div class="modal-header">
          <h4 class="modal-title">New Shop</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Location</label>
                 <input type="text" name="location" class="form-control">
            </div>
            <div class="form-group">
                <label>Lat</label>
                 <input type="text" name="latitude" class="form-control">
            </div>
            <div class="form-group">
                <label>Long</label>
                 <input type="text" name="longitude" class="form-control">
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
        {{ Form::open(array('url' => 'dashboard/update-store','id' => 'editShop')) }}
        <div class="modal-header">
          <h4 class="modal-title">Edit Shop</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Location</label>
                 <input type="text" name="location" id="location" class="form-control" value="">
                 <input type="hidden" id="store_id" name="store_id" value="">
            </div>
            <div class="form-group">
                <label>Lat</label>
                 <input type="text" name="latitude" id="lat" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Long</label>
                 <input type="text" name="longitude" id="long" class="form-control" value="">
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

         $.validator.addMethod('latCoord', function(value, element) {
                 console.log(this.optional(element))
                 return this.optional(element) ||
                 value.length >= 4 && /^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
                 }, 'Your Latitude format has error.');

        $.validator.addMethod('longCoord', function(value, element) {
                 console.log(this.optional(element))
                 return this.optional(element) ||
                 value.length >= 4 && /^(?=.)-?((0?[8-9][0-9])|180|([0-1]?[0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
                 }, 'Your Longitude format has error.');

        $.validator.addMethod("alpha", function(value, element) {
                 return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
                }, 'Please Enter a valid location.');


         $("#addShop").validate({
               rules: {
                latitude: {
                    required: true,
                    latCoord: true,
                 },
               longitude: {
                   required: true,
                   longCoord: true,
                 },
                 location: {
                    required: true,
                    alpha :true
                 },
               },
                messages: { },
                // onkeyup: function( element, event ) {
                //   $(element).valid();
                // }
         });

         $("#editShop").validate({
               rules: {
                latitude: {
                    required: true,
                    latCoord: true,
                 },
               longitude: {
                   required: true,
                   longCoord: true,
                 },
                 location: {
                    required: true,
                    alpha :true
                 },
               },
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
              var location = $(this).data('location');
              var lat = $(this).data('lat');
              var long = $(this).data('long');
              
              $('#store_id').val(id);
              $('#location').val(location);
              $('#lat').val(lat);
              $('#long').val(long);
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

