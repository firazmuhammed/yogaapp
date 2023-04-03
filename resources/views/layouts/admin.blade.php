<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Yoga- @yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin-lte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('admin-lte/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{url('css/admin.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  @yield('page-style-files')
  <!-- Theme style -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('dashboard')}}" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
    
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
      <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Yoga</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{url('dashboard/users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Orders 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
             
             
              <li class="nav-item">
                <a href="{{url('/dashboard/orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xmas order</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{url('/dashboard/bulk-orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bulk Order</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{url('/dashboard/home-delivery-orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Delivery Order</p>
                </a>
              </li>
             
            </ul>
          </li>

       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Catalog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
             
             
              <li class="nav-item">
                <a href="{{url('/dashboard/products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dashboard/bulk-product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bulk Products</p>
                </a>
              </li>
             
            </ul>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
              Home Delivery
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
             
             
              <li class="nav-item">
                <a href="{{url('/dashboard/category')}}" class="nav-link">
                  <i class="nav-icon fas fa-shopping-bag"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dashboard/home-deleiver-products')}}" class="nav-link">
                  <i class="nav-icon far fas fa-suitcase-rolling""></i>
                  <p>Products</p>
                </a>
              </li>
             
            </ul>
          </li>
           --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
             Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
              
             
              <li class="nav-item">
                <a href="{{url('/dashboard/view-postcodes')}}" class="nav-link">
                  <i class="nav-icon far fas fa-mail-bulk"></i>
                  <p>PostalCode</p>
                </a>
              </li>
           
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
              Notification
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
              
             
              <li class="nav-item">
                <a href="{{url('/dashboard/create-custome-mail')}}" class="nav-link">
                  <i class="nav-icon far fas fa-mail-bulk"></i>
                  <p>Mail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/dashboard/create-push-notification')}}" class="nav-link">
                  <i class="nav-icon far fas fa-mobile-alt"></i>
                  <p>Push</p>
                </a>
              </li>
             
            </ul>
          </li>

         
       
     
        
          <li class="nav-item">
         
            
              <p>
                <form method="post" action="{{route('logout')}}">
                  @csrf
                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                this.closest('form').submit();">Log Out</a>
                </form>
              </p>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Admin
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="#">Yoga</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<script src="{{url('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/moment/moment.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('admin-lte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin-lte/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('admin-lte/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{url('admin-lte/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{url('admin-lte/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{url('admin-lte/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('js/sweetalert.min.js')}}" ></script>
<script src="{{url('admin-lte/plugins/toastr/toastr.min.js')}}"></script>
<!-- PAGE SCRIPTS -->

<script src="{{url('admin-lte/dist/js/demo.js')}}"></script>
<script src="{{url('admin-lte/dist/js/pages/dashboard3.js')}}"></script>

@yield('javascripts-new')
@yield('page-js-script')

</body>
</html>
