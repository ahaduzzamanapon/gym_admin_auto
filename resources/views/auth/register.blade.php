<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>@php
        $setting = DB::table('sitesettings')->first();
    @endphp
        {{ !empty($setting) ? $setting->name : 'Gym Master' }} -
        {{ !empty($setting) ? $setting->slogan : 'Gym Master' }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <!--page level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <!--end of page level css-->
</head>
<style>
    #sign-up .card-align {
        position: absolute;
        top: 57%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 0 35px 0 rgba(154, 161, 171, 0.15);
        margin: auto;
    }

    body {
        background: url("{{Storage::url('login_background.png')}}") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<body id="sign-up" class="login_backimg">
    <div class="container mt-3rem">
        <div class="card ">
            <div class="row ">
                <div class="col-lg-8 col-12 card-align bg-white">
                    <div class="row">
                        <div class="col-12  signup-form">
                            <div class="card-header border-bottom-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center">
                                            <span>
                                                {{ !empty($setting) ? $setting->name : 'Gym Master' }} -
                                                {{ !empty($setting) ? $setting->slogan : 'Gym Master' }}</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-12 signup-header-text">
                                        <span class="active fs-18">SIGN UP </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ url('register') }}" id="authentication" method="post"
                                            class="sign_validator">
                                            @csrf
                                            <div class="row">
                                                {{-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Name') }}</label>
                                                        <input type="text"
                                                            class="form-control  form-control-lg  @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="Name"
                                                            value="{{ old('name') }}" required autocomplete="name"
                                                            autofocus />
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div> --}}
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Name') }}</label>
                                                        <input type="text"
                                                            class="form-control  form-control-lg  @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="Name"
                                                            value="{{ old('name') }}" maxlength="50" autocomplete="name"
                                                            autofocus />
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                                        <input 
                                                            type="email"
                                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                            id="email"
                                                            name="email"
                                                            placeholder="E-mail"
                                                            value="{{ old('email') }}"
                                                        />
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert" id="email-error">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label for="father_name"> {{ __('Father Name') }}</label>
                                                        <input type="text"
                                                            class="form-control  form-control-lg @error('father_name') is-invalid @enderror"
                                                            id="father_name" name="father_name"
                                                            placeholder="father name" value="{{ old('father_name') }}"
                                                             />
                                                        @error('father_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_name"> {{ __('Mother Name') }}</label>
                                                        <input type="text"
                                                            class="form-control  form-control-lg @error('mother_name') is-invalid @enderror"
                                                            id="mother_name" name="mother_name"
                                                            placeholder="mother name" value="{{ old('mother_name') }}"
                                                             />
                                                        @error('mother_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="gender">{{ __('Gender') }}</label>
                                                        <div class="d-flex gap-3">
                                                            <!-- Male -->
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input @error('gender') is-invalid @enderror"
                                                                    id="gender_male" name="gender" value="male"
                                                                    {{ old('gender') == 'male' ? 'checked' : '' }}
                                                                    required />
                                                                <label class="form-check-label" for="gender_male">
                                                                    {{ __('Male') }}
                                                                </label>
                                                            </div>

                                                            <!-- Female -->
                                                            <div class="form-check" style="margin-left: 12px;">
                                                                <input type="radio"
                                                                    class="form-check-input @error('gender') is-invalid @enderror"
                                                                    id="gender_female" name="gender" value="female"
                                                                    {{ old('gender') == 'female' ? 'checked' : '' }}
                                                                    required />
                                                                <label class="form-check-label" for="gender_female">
                                                                    {{ __('Female') }}
                                                                </label>
                                                            </div>

                                                            <!-- Other -->
                                                            <div class="form-check" style="margin-left: 12px;">
                                                                <input type="radio"
                                                                    class="form-check-input @error('gender') is-invalid @enderror"
                                                                    id="gender_other" name="gender" value="other"
                                                                    {{ old('gender') == 'other' ? 'checked' : '' }}
                                                                    required />
                                                                <label class="form-check-label" for="gender_other">
                                                                    {{ __('Other') }}
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <!-- Validation Error -->
                                                        @error('gender')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group" style="display: relative;">
                                                        <label for="password">{{ __('Password') }}</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                            id="password" name="password" placeholder="Password"
                                                             />

                                                        <svg id="hideEye" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor"
                                                            style="width: 20px; height: 20px; cursor: pointer; display: block; position: absolute; top: 60%; right: 26px; transform: translateY(-50%);">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                        </svg>

                                                        <svg id="showEye"
                                                            style="width: 20px; height: 20px; cursor: pointer; display: block; position: absolute; top: 60%; right: 26px; transform: translateY(-50%); display: none;"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
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
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group" style="display: relative;">
                                                        <label
                                                            for="confirm-password">{{ __('Confirm Password') }}</label>
                                                        <input type="password" class="form-control form-control-lg"
                                                            id="confirm-password" name="password_confirmation"
                                                            placeholder="Confirm Password" required>

                                                        <svg 
                                                            id="hideEyeConfirm" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor"
                                                            style="width: 20px; height: 20px; cursor: pointer; display: block; position: absolute; top: 60%; right: 26px; transform: translateY(-50%);">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                        </svg>

                                                        <svg 
                                                            id="showEyeConfirm"
                                                            style="width: 20px; height: 20px; cursor: pointer; display: block; position: absolute; top: 60%; right: 26px; transform: translateY(-50%); display: none;"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Sign Up"
                                                    class="btn btn-primary btn-block" />
                                            </div>

                                        </form>
                                        <div>Already registered? <a href="{{ route('login') }}"><strong>Sign
                                                    in</strong></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            function handleTooglePassword(clickedField, showField, typeField) {
                const clickElement = document.getElementById(clickedField);
                const showIcon = document.getElementById(showField);
                const fieldTypeId = document.getElementById(typeField);
                if (fieldTypeId.getAttribute('type') === 'password') {
                    clickElement.style.display = 'block';
                    showIcon.style.display = 'none';
                } else {
                    clickElement.style.display = 'none';
                    showIcon.style.display = 'block';
                }

                clickElement.addEventListener('click', function() {

                    if (fieldTypeId.getAttribute('type') === 'password') {
                        console.log("password");

                        fieldTypeId.setAttribute('type', 'text');
                        clickElement.style.display = 'none';
                        showIcon.style.display = 'block';
                    } else {
                        console.log("text");

                        fieldTypeId.setAttribute('type', 'password');
                        clickElement.style.display = 'none';
                        showIcon.style.display = 'block';
                    }
                });
            }
        })
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hideEye = document.getElementById('hideEye');
            const showEye = document.getElementById('showEye');
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hideEye = document.getElementById('hideEyeConfirm');
            const showEye = document.getElementById('showEyeConfirm');
            const password = document.getElementById('confirm-password');
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

    <script>
        document.getElementById('email').addEventListener('input', function () {
            const errorElement = document.getElementById('email-error');
            const emailField = this;
    
            // Hide the error message on input
            if (errorElement) {
                errorElement.style.display = 'none';
            }
    
            // Remove invalid class on valid input
            if (emailField.classList.contains('is-invalid')) {
                emailField.classList.remove('is-invalid');
            }
        });
    </script>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/pages/register.js') }}"></script>

</body>

</html>
