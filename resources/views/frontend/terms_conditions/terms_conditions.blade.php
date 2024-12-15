@extends('layouts.app_frontend')
@section('title')
    Gym Master | Terms and Conditions
@endsection

@section('content')
    <div class="px-4 lg:px-20 mt-7 lg:mt-14 relative">
        <div class="w-[90%] lg:w-[80%] mx-auto">
            <h1 class="text-[#01669B] text-22 lg:text-28 xl:text-32 font-poppins font-[700] leading-7 text-center">Terms and
                Conditions</h1>
            <p class="font-poppins text-15 lg:text-18 leading-7 mt-8">Welcome to Gym Master! These terms and conditions
                outline the rules and regulations for using our gym management software.
                <br>
                By accessing this system, we assume you accept these terms and conditions in full. Do not continue to use
                Gym Master if you do not agree to all the terms and conditions stated on this page.
            </p>
            <div>

                <h1 class="font-poppins text-20 lg:text-24 text-[#01669B] leading-7 mt-8 font-[500]">1. License to Use</h1>
                <div class="ms-6">
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        1.1 By accessing this system, we assume you accept these terms and conditions in full. Do not
                        continue to use Gym Master if you do not agree to all the terms and conditions stated on this page.
                    </p>
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        1.2 You must not use Gym Master in any way that causes, or may cause, damage to the system or
                        impairment of the availability or accessibility of the system, or in any way that is unlawful,
                        illegal, fraudulent, or harmful.
                    </p>
                </div>

                <h1 class="font-poppins text-20 lg:text-24 text-[#01669B] leading-7 mt-8 font-[500]">2. User Accounts</h1>
                <div class="ms-6">
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">2.1 To access certain features of Gym Master,
                        you may be required to register for an account. By registering, you agree to provide accurate and
                        up-to-date information.</p>
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">2.2 You are solely responsible for maintaining
                        the confidentiality of your account credentials and for all activities that occur under your
                        account.</p>
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">2.3 Gym Master reserves the right to suspend
                        or terminate your account at any time without prior notice if we suspect any violation of these
                        terms and conditions or unauthorized use of the system.</p>
                </div>

                <h1 class="font-poppins text-20 lg:text-24 text-[#01669B] leading-7 mt-8 font-[500]">
                    3. Data Security
                </h1>
                <div class="ms-6">
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        3.1 Gym Master prioritizes data security and
                        employs industry-standard measures to protect your data. However, we cannot guarantee the security
                        of your data during transmission to or from the system. By using the system, you acknowledge that
                        any transmission of data is at your own risk.</p>
                </div>


                <h1 class="font-poppins text-20 lg:text-24 text-[#01669B] leading-7 mt-8 font-[500]">
                    4. Intellectual Property</h1>
                <div class="ms-6">
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        4.1 All intellectual property rights in Gym Master and its content, including but not limited to
                        text, graphics, logos, images, and software, are owned by or licensed to Gym Master.</p>
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        4.2 You may not reproduce, modify, distribute, display, or create derivative works of any part of
                        Gym Master without our prior written consent.
                    </p>
                </div>
                <h1 class="font-poppins text-20 lg:text-24 text-[#01669B] leading-7 mt-8 font-[500]">
                    5. Limitation of Liability
                </h1>
                <div class="ms-6">
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        5.1 Gym Master shall not be liable for any direct, indirect, incidental, special, or consequential
                        damages arising out of or in any way connected with the use of Gym Master.
                    </p>
                </div>
                <h1 class="font-poppins text-20 lg:text-24 text-[#01669B] leading-7 mt-8 font-[500]">
                    6. Changes to Terms and Conditions
                </h1>
                <div class="ms-6">
                    <p class="font-poppins text-15 lg:text-18 leading-7 mt-2">
                        6.1 Gym Master reserves the right to revise these terms and conditions at any time without prior
                        notice. By continuing to use Gym Master after any revisions, you agree to be bound by the updated
                        terms and conditions.
                    </p>
                </div>


            </div>
        </div>
        <img class="absolute w-[53px] h-[70px]  lg:h-[170px] lg:w-[120px]  -top-[7%] left-[0%] -z-10"
            src="{{ asset('frontend/assets/images/dote9.png') }}" alt="">
    </div>
@endsection
