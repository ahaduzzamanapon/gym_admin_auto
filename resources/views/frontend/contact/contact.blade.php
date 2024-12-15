@extends('layouts.app_frontend')

@section('title')
    Gym Master | Contact Us
@endsection

@section('content')
    @if (session('data'))
        @php
            $formData = session('data');
            $name = htmlspecialchars($formData['name']);
            $email = htmlspecialchars($formData['email']);
            $phone = htmlspecialchars($formData['phone']);
            $message = htmlspecialchars($formData['message']);

        @endphp

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                dataLayer.push({
                    'event': 'Lead',
                    'pagePath': '{{ request()->url() }}',
                    'pageTitle': 'contact us',
                    'visitorType': '{{ Auth::check() ? 'registered' : 'customer' }}',
                    'location_id': '{{ request()->ip() }}',
                    'leadType': 'contact us',
                    'leadValue': 'high',
                    'leadSource': '{{ request()->headers->get('referer', 'direct') }}',

                    // Form Data
                    'name': '{{ $name }}',
                    'email': '{{ $email }}',
                    'phone': '{{ $phone }}',
                    'message': '{{ $message }}',


                    // Hashed Data
                    'hash_name': '{{ hash('sha256', $name) }}',
                    'hash_email': '{{ hash('sha256', $email) }}',
                    'hash_phone': '{{ hash('sha256', $phone) }}',
                    'hash_message': '{{ hash('sha256', $message) }}',


                    // Tracking IDs
                    'gclid': '{{ request()->input('gclid', 'N/A') }}',
                    'fbclid': '{{ request()->input('fbclid', 'N/A') }}',
                    'timeOnPage': 120,
                    'landing_page': '{{ request()->url() }}',
                    'traffic_source': '{{ request()->headers->get('referer', 'direct') }}',
                    'utm_source': '{{ request()->input('utm_source', 'organic') }}',
                    'utm_medium': '{{ request()->input('utm_medium', 'N/A') }}',
                    'utm_campaign': '{{ request()->input('utm_campaign', 'N/A') }}',
                    'utm_content': '{{ request()->input('utm_content', 'N/A') }}',
                    'utm_term': '{{ request()->input('utm_term', 'N/A') }}'
                });
            });
        </script>
    @else
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                dataLayer.push({
                    'event': 'Contact Us',
                    'pagePath': '{{ request()->url() }}',
                    'pageTitle': 'contact us',
                    'visitorType': '{{ Auth::check() ? 'registered' : 'customer' }}',
                    'location_id': '{{ request()->ip() }}'
                });
            });
        </script>
    @endif

    <div class="px-4 lg:px-28  mt-10 pb-7 overflow-hidden">
        <div class="my-4">
            <h1 class="text-28 lg:text-40 text-center font-bold my-2 font-poppins text-black lg:leading-[40px]">Build Your Gym Management  Software</h1>
        </div>
        <div class="bg-white shadow-md my-4 w-full flex flex-col-reverse lg:flex-row items-center gap-4 relative">

            <div class="w-full lg:w-[50%]  px-4 lg:px-7 pt-14 pb-20 z-20">
                <h1
                    class="text-32 lg:text-36 xl:text-40 font-poppins leading-[40px] lg:leading-[48px] text-center text-cayan">
                    Get in Touch</h1>
                <p class="text-16 lg:text-20 font-poppins leading-5 text-center py-4">We are here for you! How can we help?
                </p>



                <form action="{{ route('contact.sent') }}" method="POST">
                    @csrf

                    <div class="w-[100%] mt-3">
                        <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Full
                            Name</label>
                        <input type="text" name="name"
                            class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded"
                            placeholder="Enter your full name**">
                        @error('name')
                            <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[100%] mt-3">
                        <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Email
                            Address</label>
                        <input type="text" name="email"
                            class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded"
                            placeholder="Enter your email address**">
                        @error('email')
                            <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[100%] mt-3">
                        <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Phone
                            Number</label>
                        <input type="text" name="phone"
                            class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded"
                            placeholder="Enter your phone number**">
                        @error('phone')
                            <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[100%] mt-3">
                        <label for=""
                            class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Message</label>
                        <textarea
                            class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded"
                            name="message" id="" rows="7" placeholder="Enter your message**......."></textarea>
                        @error('message')
                            <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex items-start lg:items-center mt-3">
                        <input type="checkbox"
                            class="w-[25px] h-[25px] shadow-sm  text-black font-poppins border border-black   focus:outline-none rounded me-3"
                            name="tramps" id="contactTermCheck">

                        <p class="text-black text-16 font-poppins leading-5">Keep me up to date with news and offers from
                            time to time by email</p>
                    </div>

                    <div class="flex items-center justify-center mt-3">
                        <button id="submitContact" disabled
                            class="bg-gray-400 px-4 py-1 lg:py-2 rounded-3xl text-white font-poppins text-16">Send
                            Message</button>
                    </div>
                </form>

            </div>
            <div class="w-full lg:w-[50%] lg:absolute lg:right-0 lg:top-8">
                <div class="my-3 flex justify-center">
                    <img src="{{ asset('frontend/assets/images/contact/contact us.png') }}" class="lg:w-[70%]" alt="">
                </div>
                <div class="my-3 flex justify-center">
                    <div class="w-[75%]">
                        <div class="flex items-center gap-4 my-2">
                            <img src="{{ asset('frontend/assets/images/contact/location.png') }}" class="w-[30px] h-[30px]" alt="">
                            <p class="font-poppins text-16 font-medium">Raisa & ShikderTower, Level-5 3/8, North Pirerbag,60 Fit Road, Dhaka-12016.</p>
                        </div>
                        <div class="flex items-center gap-4 my-2">
                            <img src="{{ asset('frontend/assets/images/contact/phone.png') }}" class="w-[30px] h-[30px]" alt="">
                            <p class="font-poppins text-16 font-medium">019776602-09</p>
                        </div>
                        <div class="flex items-center gap-4 my-2">
                            <img src="{{ asset('frontend/assets/images/contact/gmail.png') }}" class="w-[30px] h-[30px]" alt="">
                            <p class="font-poppins text-16 font-medium">info@mysoftheaven.com, <br> mysoftheaven@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="my-5 flex justify-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2426.336208683804!2d90.36359414116663!3d23.792240383620758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a103ea6a8d%3A0x679516e132e65f7a!2sMysoft%20Heaven%20(BD)%20Ltd.!5e1!3m2!1sen!2sbd!4v1729750550770!5m2!1sen!2sbd" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Selecting the checkbox and the button
        const termCheck = document.getElementById('contactTermCheck');
        const submitDemu = document.getElementById('submitContact');

        // Adding an event listener to the checkbox
        termCheck.addEventListener('change', function() {
            console.log("asi : ", this.checked);
            // If the checkbox is checked, enable the button
            if (this.checked) {
                submitDemu.removeAttribute('disabled');
                submitDemu.classList.remove('bg-gray-400');
                submitDemu.classList.add('bg-[#1873FD]');
            } else {
                // If the checkbox is not checked, disable the button
                submitDemu.setAttribute('disabled', 'disabled');
                submitDemu.classList.remove('bg-[#1873FD]');
                submitDemu.classList.add('bg-gray-400');

            }
        });
    </script>
@endsection
