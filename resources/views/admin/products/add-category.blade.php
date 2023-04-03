


@extends('layouts.admin')
@section('title', 'Add Category')
@section('page-style-files')
@livewireStyles


@stop
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
           
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    @endif
    <section class="content" >
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Add Product</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" x-show="open">
              <form method="post" action="{{url('dashboard/add-category')}}" enctype='multipart/form-data' >
                @csrf
              <div class="row">
                
                <div class="col-md-12" >
                  
                  <div class="form-group">
                 
          
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-6">
              
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required class="form-control">
                   
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="file" name="image" required class="form-control">
                  </div>
                
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
            

            

            
             
            
              
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Save</button>
              
            </div>
            </form>
            </div>
            <!-- /.card-body -->
   
          </div>
          <!-- /.card -->
  
          
           
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
  $(document).ready(function(){
    $("#attributes-section").hide();
  });
  $(document).ready(function (e) {
 
   
 $('#image').change(function(){
          
  let reader = new FileReader();

  reader.onload = (e) => { 

    $('#preview-image-before-upload').attr('src', e.target.result); 
  }

  reader.readAsDataURL(this.files[0]); 
 
 });
 
});
  </script>

  

<script>
    $( "#type" ).change(function() {
     if(this.value=="diamond")
     {
      $("#attributes-section").show();
     }
    });
</script> 

  @stop
<!-- jQuery -->


@section('javascripts-new')
<script>
  @if (session('success'))
  toastr.success("{{ session('success') }}")
  @endif
  </script>
  

@livewireScripts
@endsection





