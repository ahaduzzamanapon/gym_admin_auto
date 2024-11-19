<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="HR Sheba is a comprehensive platform offering human resources solutions for businesses of all sizes. From recruitment and employee management to payroll processing and performance evaluation, we provide the tools and expertise to streamline your HR processes and optimize your workforce's potential.">
    <meta name="author" content="mysoftheaven">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- @vite('resources/css/app.css') --}}

    {{-- tailwind cdn link --}}
    <script src="{{ asset('frontend/assets/js/3.4.js') }}"></script>

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/icon/logo.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/font-family/Roboto-Regular.ttf') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontSize: {
                        '10': '0.625em',
                        '12': '0.75em',
                        '13': '0.8125em',
                        '14': '0.875em',
                        '15': '0.9375em',
                        '16': '1em',
                        '18': '1.125em',
                        '20': '1.25em',
                        '22': '1.375em',
                        '24': '1.5em',
                        '26': '1.625em',
                        '28': '1.75em',
                        '30': '1.875em',
                        '32': '2em',
                        '36': '2.25em',
                        '40': '2.5em',
                        '48': '3em',
                    },
                    colors: {
                        cayan: '#006BA3',
                        primary: '#12633D',
                        secondary: '#69AB1D',
                        lightyellow: '#F6C515', // Removed the semicolon
                        orange: '#F94910',
                        lightblue: '#00A6B0',
                        pink: '#FF002E',
                        lightgray: '#5A1313',
                        green4: '#F2FAF4',
                        deepgreen: '#368C72',
                        green5: '#1E433D',
                        magenta: '#8600B5',
                    },
                    fontFamily: {
                        roboto: ['Roboto', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                },
            }
        }
    </script>


    {{-- tailwind cdn script --}}
    <script src="{{ asset('frontend/assets/js/tailwind.config.js') }}"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XGBCYCRLL9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XGBCYCRLL9');
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            'event': 'Pageview',
            'pagePath': '{{ url()->current() }}',
            'pageTitle': '{{ request()->route()->getName() }}',
            'visitorType': 'customer',
            'location_id': "{{ request()->ip() }}"
        });

        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KKQMH8LS');
    </script>

    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKQMH8LS" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>


</head>

<body class=" 2xl:container mx-auto">

    @include('frontend.header.header')


    @yield('content')

    <div class='scrolltop'>
        <div class='scroll icon'><i class="fa fa-rocket" aria-hidden="true"></i></div>
    </div>
    @include('frontend.footer.footer')

    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/fontIcon.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/toastr.min.js') }}"></script>
    @yield('scripts')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success("{{ Session::get('message') }}");
        </script>

        <!-- Google tag (gtag.js) -->
    @endif

    <script>
        AOS.init();
    </script>
    {!! Toastr::message() !!}

</body>

</html>
