<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>{{ $SiteProfile->title?? 'home' }}</title>
    <!--

TemplateMo 548 Training Studio

https://templatemo.com/tm-548-training-studio

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">

</head>
<style>
    .contact-form input {
        color: #7a7a7a;
        font-size: 13px;
        border: 1px solid #ddd;
        background-color: #fff;
        width: 100%;
        height: 40px;
        outline: none;
        line-height: 40px;
        padding: 0px 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin-bottom: 1px;
    }
    .contact-form textarea{
        color: #7a7a7a;
        font-size: 13px;
        border: 1px solid #ddd;
        background-color: #fff;
        width: 100%;
        height: 150px;
        max-height: 200px;
        outline: none;
        line-height: 40px;
        padding: 0px 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin-bottom: 1px;
    }
    .feature-item {
    display: flex;
    margin-bottom: 60px;
}
</style>

<body>

    {{-- <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** --> --}}


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        @php
                            $logo_array = explode(' ', $SiteProfile->logo_name);
                        @endphp
                        <a href="/" class="logo">
                            @foreach ($logo_array as $key => $value)
                                @if ($key != count($logo_array) - 1)
                                    {{ $value }}
                                @else
                                    <em>{{ $value }}</em>
                                @endif
                            @endforeach
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section linkkss"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section linkkss"><a href="#features">About</a></li>
                            <li class="scroll-to-section linkkss"><a href="#packages_section">Packages</a></li>
                            <li class="scroll-to-section linkkss"><a href="#contact-us">Contact</a></li>
                            @if (isset($scrollToBottom))
                                :
                                @dd($scrollToBottom)
                                <script>
                                    window.scrollTo(0, document.body.scrollHeight);
                                </script>
                            @endif
                            <li class="main-button"><a href="{{ route('login') }}">Sign in</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        @if ($SiteProfile->banner_status == 'video')
            :
            <video autoplay muted loop id="bg-video">
                <source src="{{ asset('storage/' . $SiteProfile->banner_video) }}" type="video/mp4" />
            </video>
        @else
            <img id="bg-video" src="{{ asset('storage/' . $SiteProfile->banner_image) }}" alt="gym video">
        @endif

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>{{ $SiteProfile->small_banner_text }}</h6>
                <h2>
                    @php
                        $logo_array = explode(' ', $SiteProfile->big_banner_text);
                    @endphp

                    @foreach ($logo_array as $key => $value)
                        @if ($key != count($logo_array) - 1)
                            {{ $value }}
                        @else
                            <em>{{ $value }}</em>
                        @endif
                    @endforeach
                </h2>
                <div class="main-button scroll-to-section">
                    <a href="{{ route('register') }}">Become a member</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>About <em>Us</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>@php
                            echo $AboutUs->Text;
                        @endphp</p>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>Basic Fitness</h4>
                                <p>Improve your overall health and well-being with our structured basic fitness routine, designed to fit any lifestyle.</p>
                                
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>New Gym Training</h4>
                                <p>This program is designed for those who want to try something new and different. It is a combination of basic exercises and weightlifting, which will help you to build strength and muscle mass.</p>
                                
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="third gym training">
                            </div>
                            <div class="right-content">
                                <h4>Basic Muscle Course</h4>
                                <p>This program is designed for those who want to gain muscle mass and improve their overall physical fitness. It is a combination of exercises that target different muscle groups and it is a great way to build strength and improve muscle tone. </p>
                                
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>Advanced Muscle Course</h4>
                                <p>This program is designed for those who want to gain more muscle mass and improve their overall physical fitness. It is a combination of exercises that target different muscle groups and it is a great way to build strength and improve muscle tone.</p>
                                
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>Yoga Training</h4>
                                <p>This program is designed for those who want to improve their flexibility, balance and overall physical fitness. It is a combination of exercises that target different muscle groups and it is a great way to improve your overall physical fitness.</p>
                                
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="gym training">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Course</h4>
                                <p>This program is designed for those who want to gain muscle mass and improve their overall physical fitness. It is a combination of exercises that target different muscle groups and it is a great way to build strength and improve muscle tone.</p>
                                
                            </div>
                        </li>
                    </ul>
                </div> --}}
                @foreach ($SiteFeature as $feature)
                    <div class="col-lg-6">
                        <ul class="features-items">
                            <li class="feature-item">
                                <div class="left-icon">
                                    <img src="{{ asset('storage/' . $feature->image) }}" alt="First One" style="height: 100px;width: 100px;">
                                </div>
                                <div class="right-content">
                                    <h4>{{ $feature->title }}</h4>
                                    <p>{{ $feature->description }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- 
    <section class="section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Classes <em>Schedule</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filters">
                        <ul class="schedule-filter">
                            <li class="active" data-tsfilter="monday">Monday</li>
                            <li data-tsfilter="tuesday">Tuesday</li>
                            <li data-tsfilter="wednesday">Wednesday</li>
                            <li data-tsfilter="thursday">Thursday</li>
                            <li data-tsfilter="friday">Friday</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="day-time">Fitness Class</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                    <td>William G. Stewart</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Muscle Training</td>
                                    <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                    <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Paul D. Newman</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Body Building</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                    <td>Boyd C. Harris</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Yoga Training Class</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                    <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Hector T. Daigle</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Advanced Training</td>
                                    <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                    <td>Bret D. Bowers</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- ***** Testimonials Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading" style="margin-top: 9px;margin-bottom: 23px;border-bottom: 2px solid #00bc65;">
                        <h2>Expert <em>Trainers</em></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($SiteTrainer as $trainer)
                    <div class="col-lg-4">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <img src="{{ asset('storage/' . $trainer->image) }}"
                                    alt="{{ $trainer->trainer_name }}">
                            </div>
                            <div class="down-content">
                                <span>{{ $trainer->trainer_type }}</span>
                                <h4>{{ $trainer->trainer_name }}</h4>
                                <p>{{ $trainer->description }}</p>
                                <ul class="social-icons">
                                    <li><a href="{{ $trainer->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $trainer->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $trainer->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section mt-5 packages_section" id="trainers" >
        <div class="container" id="packages_section">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading" style="margin-top: 9px;margin-bottom: 23px;border-bottom: 2px solid #00bc65;">
                        <h2>All  <em>Packages</em></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                $packages=\App\Models\Package::where('pack_status',1)->get();
                @endphp
                {{-- @dd($packages) --}}
                {{-- id" => 1
        "pack_name" => "3 month"
        "branch_id" => 2
        "pack_admission_fee" => 600
        "pack_duration" => "3 month"
        "pack_status" => 1
        "created_at" => "2024-11-18 05:41:04"
        "updated_at" => "2024-12-10 06:09:31" --}}
                @foreach ($packages as $package)
                    <div class="col-lg-4">
                        <div class="trainer-item" style="height: fit-content!important;">
                            <div class="image-thumb">
                                <br>
                                <img src="{{ asset('storage/packeg.jpg') }}"
                                    alt="{{ $package->pack_name }}">
                            </div>
                            <div class="down-content">
                                <h4 class="m-0 mt-2">{{ $package->pack_name }}</h4>
                                <p class="m-0">Duration : {{ $package->pack_duration }}</p>
                                <p class="m-0">Package Fee :{{ $package->pack_admission_fee }}</p>
                                <a class="btn" style="background: #00bc65; color: #fff" href="{{route('login')}}">Purchase</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->

    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map" style="padding: 18px;">
                        <iframe
                            src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        @include('flash::message')

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <form id="contact" action="{{ route('contactMassages.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <div class="form-group">
                                            <input name="name" type="text" id="name"
                                                placeholder="Your Name*" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger"
                                                    style="font-size: 12px;">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                    </fieldset>

                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <div class="form-group">
                                            <input name="email" type="email" id="email"
                                                pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required>
                                            @if ($errors->has('email'))
                                                <span class="text-danger"
                                                    style="font-size: 12px;">{{ $errors->first('email') }}</span>
                                            @endif

                                        </div>

                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <div class="form-group">
                                            <input name="subject" type="text" id="subject"
                                                placeholder="Subject" required>
                                        </div>

                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <fieldset>
                                        <div class="form-group">
                                            <input name="phone" type="text" id="phone" placeholder="Phone" required>
                                            @if ($errors->has('phone'))
                                                <span class="text-danger"
                                                    style="font-size: 12px;">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <div class="form-group">
                                            <textarea name="message" cols="7" rows="6" id="message" placeholder="Message" required></textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-danger"
                                                    style="font-size: 12px;">{{ $errors->first('message') }}</span>
                                            @endif

                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button   type="submit" id="form-submit" class="main-button">Send
                                            Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="display: flex;justify-content: space-between;">
                    <p>
                        {{ $SiteProfile->fotter_text }}
                    </p>
                    <p>
                        Developed by <a href="https://mysoftheaven.com/">Mysoftheaven (BD) Ltd</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    {{-- <script>
        const redirectToSection = (sectionId,e) => {
            console.log({sectionId});
            
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: "smooth" });
            }
        }
        
    </script> --}}
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
        $('.linkkss').on('click', function (e) {
            
            $('.menu-trigger').addClass('active');
        })
    </script>

</body>

</html>
