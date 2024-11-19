@extends('layouts.app_frontend')
@section('title')
    Gym Master | Privacy Policy
@endsection

@section('content')
    <div class="px-4 lg:px-20 mt-7 lg:mt-14 relative">
        <div class="w-[90%] lg:w-[80%] mx-auto">
            <h1 class="text-[#01669B] text-22 lg:text-28 xl:text-32 font-poppins font-[700] leading-7 text-center">Privacy
                Policy for Gym Master</h1>
            <p class="font-poppins text-14 lg:text-16 leading-7 mt-8">At Gym Master, we are dedicated to upholding the
                highest standards of data protection and ensuring the privacy of our clients. This privacy policy elucidates
                how we collect, utilize, disclose, retain, and safeguard your information. Please review this policy
                meticulously to comprehend how we safeguard your data</p>
            <div>

                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">1. Information Collection</h1>
                <p class="font-poppins text-14 lg:text-16 leading-7 mt-8">
                    We collect information when you provide it to us through forms or interactions on our website. This may
                    include:
                    - Personal details such as name, email address, phone number, and mailing address when submitting
                    requests.
                    - Technical information like device location, IP address, browsing history, and other relevant data
                    necessary for optimal service provision

                </p>

                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">2. Utilization of Information</h1>
                <p class="font-poppins text-14 lg:text-16 leading-7 mt-6">We employ the collected information for various
                    purposes, including but not limited to</p>

                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">3. Operating and maintaining our
                    website effectively</h1>
                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">4. Enhancing user experience through
                    personalization and website improvements.</h1>
                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">5. Analyzing user behavior to
                    understand and improve website functionality.
                </h1>
                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">6. Developing innovative products,
                    services, and features.</h1>
                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">7. Communication with users for
                    customer service, updates, and marketing initiatives.
                </h1>
                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">8. Sending relevant emails and
                    notifications.

                </h1>
                <h1 class="font-poppins text-20 text-black leading-7 mt-8 font-[500]">9. Detecting and preventing fraudulent
                    activities.

                </h1>
                <p class="font-poppins text-14 lg:text-16 leading-7 mt-6">Your privacy and data security are of utmost
                    importance to us at Gym Master. Should you have any queries or require further clarification regarding our
                    privacy practices, please do not hesitate to reach out to us using the provided contact information.</p>

            </div>
        </div>
        <img class="absolute w-[53px] h-[70px]  lg:h-[170px] lg:w-[120px]  -top-[7%] left-[0%] -z-10"
            src="{{ asset('frontend/assets/images/dote9.png') }}" alt="">
    </div>
@endsection
