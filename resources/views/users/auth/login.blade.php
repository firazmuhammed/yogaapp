@extends('layouts.users')
@section('page-style-files')
@section('title', 'Login')
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
                            <a href="#" class="active-btn">Login</a>
                        </li>
                        <li>
                            <a href="{{url('register')}}">Register</a>
                        </li>
                    </ul>
                    <div class="form-block">
                        <div class="title-with-content">
                            <h2>Login</h2>
                            <p>Login to access your account and enjoy shoppings!</p>
                        </div>
                        <form>
                            <label for="form_name">Email</label>
                            <input type="text" id="form_name" name="form_name" autocomplete="false">
                            <label for="form_password">password</label>
                            <input type="password" id="form_password" name="form_password" autocomplete="false">
                            <label class="forgot-psd">Forgot Password?</label>
                            <button class="form-btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('javascripts-new')
@include('layouts.user-scripts')

@endsection