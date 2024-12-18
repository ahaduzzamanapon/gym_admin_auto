<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Gym Master Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <!--page level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <!--end of page level css-->
</head>

<body id="sign-up" class="login_backimg">
    <style>
        body {
            background: url("{{Storage::url('login_background.png')}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <div class="container mt-3rem">
        <div class="card ">
            <div class="row ">
                <div class="col-lg-4 col-12 card-align bg-white">
                    <div class="row">
                        <div class="col-12  signup-form">
                            <div class="card-header border-bottom-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center">
                                            <span>
                                                @php
                                                    $setting = DB::table('sitesettings')->first();
                                                @endphp
                                                {{ !empty($setting) ? $setting->name : 'Gym Master' }} -
                                                {{ !empty($setting) ? $setting->slogan : 'Gym Master' }}
                                            </span>
                                            
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-12 signup-header-text">
                                        <span class="active fs-18">SIGN IN</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('login') }}" id="authentication" method="post"
                                            class="sign_validator">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email"> {{ __('E-Mail Address') }}</label>
                                                <input type="email"
                                                    class="form-control  form-control-lg @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="E-mail"
                                                    value="{{ old('email') }}" required />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group" style="display: relative;">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input type="password"
                                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Password" required />

                                                <svg id="hideEyelogin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 20px; height: 20px; cursor: pointer; display: block; position: absolute; top: 56%; right: 26px; transform: translateY(-50%);">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                </svg>

                                                <svg id="showEyelogin"
                                                    style="width: 20px; height: 20px; cursor: pointer; display: block; position: absolute; top: 49%; right: 26px; transform: translateY(-50%); display: none;"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <input type="hidden" class="custom-control-input" name="remember"
                                                        id="remember" checked hide>

                                           


                                            <div class="form-group">
                                                <input type="submit" value="{{ __('Sign In') }}"
                                                    class="btn btn-primary btn-block" />
                                            </div>

                                        </form>
                                        <div>New Member?
                                            <a href="{{ route('register') }}">
                                                <strong>Sign Up</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hideEye = document.getElementById('hideEyelogin');
            const showEye = document.getElementById('showEyelogin');
            const password = document.getElementById('password');
            hideEye.addEventListener('click', function() {
                console.log('Hide Eye Clicked');
                password.setAttribute('type', 'text');
                hideEye.style.display = 'none';
                showEye.style.display = 'block';
            });
            showEye.addEventListener('click', function() {
                console.log('Show Eye Clicked');
                password.setAttribute('type', 'password');
                showEye.style.display = 'none';
                hideEye.style.display = 'block';
            });
        });
    </script>
    <!-- begining of page level js -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    {{-- <script type="text/javascript" src="{{ asset('vendors/jquery.backstretch/js/jquery.backstretch.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/pages/register.js') }}"></script>

</body>

</html>
