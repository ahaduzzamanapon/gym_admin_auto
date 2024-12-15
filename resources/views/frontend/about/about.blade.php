@extends('layouts.app_frontend')
@section('title')
    Gym Master | About Us
@endsection

@section('content')
    <div class="px-4 lg:px-20 mt-8 relative">
        <div class="w-full inline-block lg:flex items-center justify-between">
            <div class="w-full lg:w-[50%] xl:w-[45%] ps-5 lg:ps-10 ">
                <h1 class="text-[#01669B] text-22 lg:text-28 xl:text-32 font-poppins font-[700] leading-7 text-center">Who We
                    Are</h1>

                <p class="mt-3 lg:mt-6 xl:mt-9 font-poppins text-15 lg:text-18 xl:text-20 leading-5 lg:leading-7">
                    Gym Master is a comprehensive fitness management software designed by Mysoftheaven (BD) Ltd. to
                    streamline and optimize the management of gyms, fitness centers, and wellness studios. Managing
                    memberships, schedules, trainers, payments, and facilities manually can be tedious and time-consuming.
                    Gym Master consolidates these functions into one powerful platform, taking the hassle out of gym
                    management and allowing businesses to focus on delivering exceptional fitness experiences.

                </p>
            </div>
            <div class="w-full lg:w-[50%]">
                <img src="{{ asset('frontend/assets/images/about_us.png') }}" alt="about_us image">
            </div>
        </div>
        <img class="absolute w-[53px] h-[70px]  lg:h-[170px] lg:w-[120px]  -top-[7%] left-[0%] -z-10"
            src="{{ asset('frontend/assets/images/dote9.png') }}" alt="dote icon image">
    </div>

    <div class="px-4 py-5 lg:px-28">
        <div class="inline-block lg:flex items-center justify-between px-4 lg:px-10 py-4"
            style="box-shadow: 0 1px 10px rgb(0 0 0 / 0.2);">
            <div class="w-full lg:w-[50%]  py-3 px-2 lg:px-4">
                <h1 class="text-[#01669B] text-30 ms-5 font-poppins font-[500]">Mission</h1>
                <p class="font-poppins text-18 ps-2 mt-2 border-l-4 border-[#01669B]">
                    Gym Master is committed to transforming fitness management by providing seamless, user-friendly
                    solutions for gym owners and staff. Its mission is to simplify operational workflows, centralize member
                    and financial data, ensure transparency in services, support strategic growth with analytics, empower
                    clients through self-service tools, integrate with third-party systems, and enhance overall member
                    satisfaction. By achieving these goals, Gym Master contributes to the success of fitness businesses and
                    the wellness of their clients.
                </p>
            </div>

            <div class="w-full lg:w-[50%]  py-3 px-2 lg:px-4">
                <h1 class="text-[#01669B] text-30 ms-5 font-poppins font-[500]">Vision</h1>
                <p class="font-poppins text-18 ps-2 mt-2 border-l-4 border-[#01669B]">
                    "To be the leading provider of innovative and holistic fitness management solutions, empowering gyms and
                    fitness centers to unlock their full potential. We envision a future where Gym Master is synonymous with
                    excellence, delivering unmatched services that enable fitness businesses to thrive in a competitive
                    industry. Through our unwavering commitment to innovation, integrity, and customer satisfaction, we
                    aspire to set new benchmarks in fitness management technology."
                </p>
            </div>




        </div>
    </div>

    {{-- <div class="py-5 px-4 lg:px-20">
    <h1 class="text-[#01669B] text-22 lg:text-28 xl:text-32 font-poppins font-[700] leading-7 text-center pb-4">Our Team</h1>
    <div id="ourTeam" class="swiper mySwiper !mt-5 !pb-10 !px-5">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="relative">
                    <img class="-z-0 h-[260px] w-full"  src="{{ asset('frontend/assets/images/team/1.png') }}" alt="">
                    <div class="bg-[#01669B] py-2 !z-30 absolute bottom-[0%] w-full">
                        <h1 class="text-white text-18 font-poppins font-[500] leading-5 text-center">Prashoman Chakrabarti</h1>
                        <p class="text-white font-poppins text-12 leading-4 text-center mt-1">Software Engineer</p>
                    </div>
                </div>
                
              </div>
              <div class="swiper-slide">
                <div class="relative">
                    <img class="-z-0 h-[260px] w-full"  src="{{ asset('frontend/assets/images/team/2.png') }}" alt="">
                    <div class="bg-[#01669B] py-2 !z-30 absolute bottom-[0%] w-full">
                        <h1 class="text-white text-18 font-poppins font-[500] leading-5 text-center">Imdadul Haque</h1>
                        <p class="text-white font-poppins text-12 leading-4 text-center mt-1">Team Lead</p>
                    </div>
                </div>
                
              </div>
              <div class="swiper-slide">
                <div class="relative">
                    <img class="-z-0 h-[260px] w-full"  src="{{ asset('frontend/assets/images/team/3.png') }}" alt="">
                    <div class="bg-[#01669B] py-2 !z-30 absolute bottom-[0%] w-full">
                        <h1 class="text-white text-18 font-poppins font-[500] leading-5 text-center"> Prachi</h1>
                        <p class="text-white font-poppins text-12 leading-4 text-center mt-1">Technical Team</p>
                    </div>
                </div>
                
              </div>
              <div class="swiper-slide">
                <div class="relative">
                    <img class="-z-0 h-[260px] w-full"  src="{{ asset('frontend/assets/images/team/4.png') }}" alt="">
                    <div class="bg-[#01669B] py-2 !z-30 absolute bottom-[0%] w-full">
                        <h1 class="text-white text-18 font-poppins font-[500] leading-5 text-center">Abdullah</h1>
                        <p class="text-white font-poppins text-12 leading-4 text-center mt-1">Software Engineer</p>
                    </div>
                </div>
                
              </div>
              <div class="swiper-slide">
                <div class="relative">
                    <img class="-z-0 h-[260px] w-full"  src="{{ asset('frontend/assets/images/team/3.png') }}" alt="">
                    <div class="bg-[#01669B] py-2 !z-30 absolute bottom-[0%] w-full">
                        <h1 class="text-white text-18 font-poppins font-[500] leading-5 text-center"> Prachi</h1>
                        <p class="text-white font-poppins text-12 leading-4 text-center mt-1">Technical Team</p>
                    </div>
                </div>
                
              </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
    </div>
</div> --}}

    <div class="px-4 py-5 lg:px-28">
        <div style="box-shadow: 0 1px 10px rgb(0 0 0 / 0.2);"
            class=" py-8 lg:py-8 w-full h-full lg:flex items-center justify-between px-4  lg:px-9">
            <h1 class="text-[#01669B] font-poppins text-22 lg:text-28 xl:text-36 font-[600] pb-4">Looking for more
                information?</h1>
            <a href="{{ route('contact') }}"
                class="bg-cayan text-white text-20 px-3 py-2 rounded font-poppins font-[500] hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-16">Contact
                us</a>
        </div>
    </div>
@endsection
