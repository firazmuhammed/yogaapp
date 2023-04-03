@extends('layouts.users')
@section('page-style-files')
@section('title', 'Register')
@include('layouts.user-styles')
@stop
@section('content')
<section class="login-with-register">
    <div class="fa-container">
        <div class="content-block">
           
            <div class="left-block">
                <img src="images/front-end/login.png" alt="">
            </div>
            <div class="right-block">
                <div class="right-block-content">
                    <ul>
                        <li>
                            <a href="{{url('logins')}}">Login</a>
                        </li>
                        <li>
                            <a href="#" class="active-btn">Register</a>
                        </li>
                    </ul>
                    <div class="form-block">
                        <x-guest-layout>
                        <div class="title-with-content">
                            <h2>Login</h2>
                            <p>Login to access your account and enjoy shopping!</p>
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <label for="form_name">Name</label>
                            <input type="text" id="form_name" name="name" :value="old('name')"  autofocus>
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" autocomplete="false">
                            <label for="form_password">password</label>
                            <input type="form_password" id="form_password"   name="password" autocomplete="false">
                            <label for="reenter_password">Renter password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="false">
                            <!-- <label class="forgot-psd">Forgot Password?</label> -->
                            <button type="submit" class="form-btn">Register</button>
                        </form>
                    </div>
                </x-guest-layout>
                </div>
            </div>
      
        </div>
    </div>
</section>

@endsection
@section('javascripts-new')
@include('layouts.user-scripts')

@endsection