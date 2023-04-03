@extends('layouts.admin')
@section('title', 'Orders')
@section('page-style-files')
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop
@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('dashboard/users')}}">Users</a></li>
              <li class="breadcrumb-item active">{{ $user->name}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
  
              <!-- Profile -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
  
                  <h3 class="profile-username text-center">{{ $user->name}}</h3>
  
                  <p class="text-muted text-center">{{ $user->email}}</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Phone</b> <a class="float-right">{{ $user->mobile}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Role</b> <a class="float-right">{{ $user->role}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Date of Birth</b> <a class="float-right">{{ $user->date_of_birth}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Anniversary Date</b> <a class="float-right">{{ $user->anniversay_date}}</a>
                      </li>
                  </ul>
  
                  {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                  <a href="{{url('dashboard/user-status-toggle/'.$user->id)}}" option_id="{{$user->id}}" class="btn @if($user->isactive == 1) btn-danger @elseif($user->isactive == 0) btn-success @endif ban">@if($user->isactive == 1) Deactivate @elseif($user->isactive == 0) Activate @endif</a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- Address start -->
    <!-- Row inside a column -->
    <div class="row">       
         @php 
           $a=1;
         @endphp        
         @foreach($userAddresses as $userAddress)
            <div class="col-md-4">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-map-marker-alt mr-1"></i>Address {{ $a}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <p class="text-muted">Name : {{ $userAddress->full_name}}</p>
                  <p class="text-muted">Email : {{ $userAddress->email}}</p>
                  <p class="text-muted">Mobile : {{ $userAddress->mobile}}</p>
                  <p class="text-muted">Address : {{ $userAddress->address}}</p>
                  <p class="text-muted">Pincode : {{ $userAddress->pincode}}</p>
                  <p class="text-muted">Town : {{ $userAddress->town}}</p>
                  <p class="text-muted">District : {{ $userAddress->district_name}}</p>
                  <p class="text-muted">State : {{ $userAddress->state_name}}</p>
                  <p class="text-muted">Landmark : {{ $userAddress->landmark}}</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card stop -->
            </div>
         @php $a++; @endphp     
         @endforeach
                 </div>
                 <!-- Row inside a column -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  

@endsection