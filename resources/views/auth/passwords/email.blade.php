<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <!-- Page level CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <!-- End of page level CSS -->
</head>

<body id="sign-up" class="login_backimg">
    <div class="container mt-3rem">
        <div class="card">
            <div class="row">
                <div class="col-lg-6 col-12 card-align bg-white">
                    <div class="row">
                        <div class="col-12 signup-form">
                            <div class="card-header border-bottom-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center">
                                            <span>
                                                @php
                                                    $setting = DB::table('sitesettings')->first();
                                                @endphp
                                                {{ !empty($setting) ? $setting->name : 'Gym Master' }} - 
                                                {{ !empty($setting) ? $setting->slogan : 'Your Fitness Partner' }}
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-12 signup-header-text">
                                        <span class="active fs-18">Forgot Password</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('password.email') }}" method="post" id="forgot-password-form" class="sign_validator">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email"> {{ __('E-Mail Address') }}</label>
                                                <input type="email"
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required />
                                                    <span class="text-danger">Note: Please enter a valid email address</span>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" value="Send Reset Link" class="btn btn-primary btn-block" />
                                            </div>
                                        </form>
                                        <div>
                                            <a href="{{ route('login') }}" class="text-decoration-none text-muted">
                                                Back to Login
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
    <!-- Page level JS -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
</body>

</html>
