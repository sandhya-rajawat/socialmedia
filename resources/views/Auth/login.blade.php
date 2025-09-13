@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<div class="row ht-100v flex-row-reverse no-gutters">
    <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div class="signup-form">
            <div class="auth-logo text-center mb-5">
                <div class="row">
                    <div class="col-md-2">
                        <img src="assets/images/logo.png" class="logo-img " style="width: 85px; height: 85px;" alt="Logo">
                    </div>
                    <div class="col-md-10">
                        <p>LinkUp</p>
                        <span>Design System</span>
                    </div>
                </div>
            </div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <a href="forgot-password.html">Forgot password?</a>
                    </div>
                    <div class="col-md-6">
                        <label class="custom-control material-checkbox">
                            <input type="checkbox" class="material-control-input">
                            <span class="material-control-indicator"></span>
                            <span class="material-control-description">Remember Me</span>
                        </label>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary sign-up">Sign In</button>
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <p class="text-muted">Start using your fingerprint</p>
                        <a href="#" class="btn btn-outline-primary btn-sm sign-up" data-toggle="modal" data-target="#fingerprintModal">Use Fingerprint</a>
                    </div>
                    <div class="col-md-12 text-center mt-5">

                        <span class="go-login">Not yet a member? <a href="{{route('register')}}">Sign Up</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6 auth-bg-image d-flex justify-content-center align-items-center">
        <div class="auth-left-content mt-5 mb-5 text-center">
            <div class="weather-small text-white">
                <p class="current-weather"><i class='bx bx-sun'></i> <span>14&deg;</span></p>
                <p class="weather-city">Gyumri</p>
            </div>
            <div class="text-white mt-5 mb-5">
                <h2 class="create-account mb-3">Welcome Back</h2>
                <p>Thank you for joining. Updates and new features are released daily.</p>
            </div>
            <div class="auth-quick-links">
                <a href="#" class="btn btn-outline-primary">Purchase template</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade fingerprint-modal" id="fingerprintModal" tabindex="-1" role="dialog" aria-labelledby="fingerprintModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="text-muted display-5">Place your Finger on the Device Now</h3>
                <img src="assets/images/icons/auth-fingerprint.png" alt="Fingerprint">
            </div>
        </div>
    </div>
</div>

@endsection('content')