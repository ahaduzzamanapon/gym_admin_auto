<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>
        @php
            if (!Auth::check()) {
                // dd("Please login first");
                // redirect(route('welcome'));
            }
            $setting = DB::table('sitesettings')->first();
        @endphp
        @section('title')| {{ !empty($setting) ? $setting->name : 'Gym Master' }} -
        {{ !empty($setting) ? $setting->slogan : 'Gym Master' }} @show
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">


    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/iconmind.css') }}">

    <!-- global css -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    {{-- //<script src="https://cdn.tailwindcss.com"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <style>
        #demo {
            position: relative;

            overflow: auto;
        }
    </style>
    <style>
        .dataTables_wrapper {
            overflow-x: scroll;
        }
    </style>
    <!-- end of global css -->

    <!-- vendors  css -->
    @yield('header_styles')
</head>

<body>
    <!-- header logo: style can be found in header-->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light navbar-static-top" role="navigation">
            <a href="javascript:void(0)" class="ml-100 toggle-right d-xl-none d-lg-block">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="{{ asset('img/images/toggle.png') }}" alt="logo" />
            </a>
            <!-- Header Navbar: style can be found in header-->
            <!-- Sidebar toggle button-->
            <!-- Sidebar toggle button-->
            <h3 style="display: flex;width: -webkit-fill-available;place-content: center;font-size: x-large;">
                {{ !empty($setting) ? $setting->name : 'Gym Master' }} -
                {{ !empty($setting) ? $setting->slogan : 'Gym Master' }} </h3>

            <div class="navbar-right ml-auto">
                <ul class="navbar-nav nav">
                    <li class="dropdown notifications-menu nav-item dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle nav-link dropdown-toggle"
                            data-toggle="dropdown" id="navbarDropdown">
                            <i class="im im-icon-Boy fs-16"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-notifications table-striped" aria-labelledby="navbarDropdown">
                            <li class="dropdown-footer">
                                <a href="{{ route('members.index') }}" class="dropdown-item">
                                    Profile
                                </a>
                            </li>

                            <li class="dropdown-footer">

                                @if (!empty(Auth::user()) && Auth::user()->member_id != null)
                                    <a class="dropdown-item"
                                        href="{{ route('members.details', ['id' => Auth::user()->member_id]) }}">
                                        Profile
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper">

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-aside" style="min-height: 100vh;height: 100vh;">
            <!-- sidebar: style can be found in sidebar-->
            <section class="sidebar metismenu sidebar-res">
                @include('layouts/leftmenu')
                <!-- menu -->
            </section>
            <!-- /.sidebar -->
        </aside>



        <!--            right side bar ----------->
        <aside class="right-aside">
            @yield('content')
        </aside>
    </div>
    <!-- ./wrapper -->
    <!-- Footer end -->
    <!-- SCRIPTS -->
    <!-- global js -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    @php
        $member = DB::table('members')->find(Auth::user()->member_id);
        if ($member && $member->term_con !== 'yes') {
            echo "<script>
                Swal.fire({
                    text: 'Please update your profile and accept terms and conditions',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'Go to Profile',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '".route('members.admission_form')."';
                    }
                });
            </script>";
        }
    @endphp



    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <!-- end of page level js -->
    <!-- Start of vendor js -->
    @yield('footer_scripts')

    <script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-53569782-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-53569782-1');
    </script>

    <script>
        function alert(v) {
            Swal.fire({
                text: v,
            });
        }

     


        // function confirm(v) {

        //     let isConfirm = false;
        //     Swal.fire({
        //         title: v,
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             isConfirm = true;
        //         }
        //     }).then(() => {
        //         if (!isConfirm) {
        //             event.preventDefault();
        //         }
        //     });
        // }
    </script>
    <script>
        document.body.style.zoom = "90%";
    </script>

    {{-- <script>
    $(document).ready(function() {
        // get all input type date
        $('input[type="date"]').each(function() {
            $(this).attr('type', 'text');
            $(this).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    });
</script> --}}


</body>

</html>
