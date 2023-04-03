


@extends('layouts.admin')
@section('title', 'Orders')
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
            <h1>Mail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Mail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
     
            
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <form method="post" action="{{ url('dashboard/send-custom-mail') }}">
                    @csrf
                <div class="card-header">
                  <h3 class="card-title">Compose New Mail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  {{-- <div class="form-group">
                    <input class="form-control" placeholder="To:">
                  </div> --}}
                  <div class="form-group">
                    <input class="form-control" name="subject" placeholder="Subject:">
                  </div>
                  <div class="form-group">
                      <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                 
                      </textarea>
                  </div>
              
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">
                 
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                  </div>
                  <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                </div>
                <!-- /.card-footer -->
            </form>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

@endsection
@section('page-js-script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  @stop
<!-- jQuery -->


@section('javascripts-new')
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/pdfmake/vfs_fonts.js')}}"></script>

@endsection

