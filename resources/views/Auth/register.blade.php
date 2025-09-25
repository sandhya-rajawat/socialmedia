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
            <form action="{{route('register')}}" method="post" class="pt-5">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="day" class="form-control">
                                <option value="">- Select Day -</option>
                                @for($d = 1; $d <= 31; $d++)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <select name="month" class="form-control">
                                <option value="">- Select Month -</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="year" class="form-control">
                                <option value="">- Select Year -</option>
                                @for($y = 1900; $y <= date('Y'); $y++)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="agree-privacy">By clicking the Sign Up button below you agreed to our privacy policy and terms of use of our website.</p>
                    </div>
                    <div class="col-md-6">

                        <span class="go-login">Already a member? <a href="{{route('login')}}">Sign In</a></span>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary sign-up">Sign Up</button>
                        </div>
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
                <h2 class="create-account mb-3">Create Account</h2>
                <p>Enter your personal details and start journey with us.</p>
            </div>
            <div class="auth-quick-links">
                <a href="#" class="btn btn-outline-primary">Purchase template</a>
            </div>
        </div>
    </div>
</div>




@endsection('content')