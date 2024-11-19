@extends('layouts.app_frontend')
@section('title')
    Gym Master | Demu Request
@endsection

@section('content')
    @if (session('data'))
        @php
            $formData = session('data');
            $name = htmlspecialchars($formData['name']);
            $email = htmlspecialchars($formData['email']);
            $phone = htmlspecialchars($formData['phone']);
            $office_address = htmlspecialchars($formData['office_address'] ?? 'unknown');
            $product = htmlspecialchars($formData['product'] ?? 'unknown');
            $services = htmlspecialchars($formData['services'] ?? 'unknown');
            $details = htmlspecialchars($formData['details'] ?? 'unknown');
            $date_time = htmlspecialchars($formData['date_time'] ?? 'unknown');
        @endphp

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                dataLayer.push({
                    'event': 'Lead',
                    'pagePath': '{{ request()->url() }}',
                    'pageTitle': 'Demo request',
                    'visitorType': '{{ Auth::check() ? 'registered' : 'customer' }}',
                    'location_id': '{{ request()->ip() }}',
                    'leadType': 'Request Quotation',
                    'leadValue': 'high',
                    'leadSource': '{{ request()->headers->get('referer', 'direct') }}',

                    // Form Data
                    'name': '{{ $name }}',
                    'email': '{{ $email }}',
                    'phone': '{{ $phone }}',
                    'office_address': '{{ $office_address }}',
                    'product': '{{ $product }}',
                    'services': '{{ $services }}',
                    'details': '{{ $details }}',
                    'date_time': '{{ $date_time }}',

                    // Hashed Data
                    'hash_name': '{{ hash('sha256', $name) }}',
                    'hash_email': '{{ hash('sha256', $email) }}',
                    'hash_phone': '{{ hash('sha256', $phone) }}',
                    'hash_office_address': '{{ hash('sha256', $office_address) }}',
                    'hash_product': '{{ hash('sha256', $product) }}',
                    'hash_services': '{{ hash('sha256', $services) }}',
                    'hash_details': '{{ hash('sha256', $details) }}',
                    'hash_date_time': '{{ hash('sha256', $date_time) }}',

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
                    'event': 'Demo Request',
                    'pagePath': '{{ request()->url() }}',
                    'pageTitle': 'demo request',
                    'visitorType': '{{ Auth::check() ? 'registered' : 'customer' }}',
                    'location_id': '{{ request()->ip() }}'
                });
            });
        </script>
    @endif

    <div class="px-4 lg:px-14 mt-10">
        <div class="w-full lg:flex gap-4">
            <div class="w-full  lg:w-[50%] px-0 lg:px-4">
                <h1 class="text-36 lg:text-40  font-poppins font-bold leading-[62px]  mb-3 text-center">Gym Master Software
                </h1>
                <p class="text-16 lg:text-20 font-poppins leading-[28px] text-center lg:text-left"> Gym Master is
                    specifically designed to help gym owners and managers save time, improve member engagement, and
                    streamline their business operations.</p>

                <div>
                    <img src="{{ asset('frontend/assets/images/demu_request.png') }}" alt="demu request image">
                </div>
            </div>
            <div class="w-full lg:w-[50%] bg-[#FFFFFF] px-3 lg:px-7 pt-7 pb-20">

                <form action="{{ route('demu_request.sent') }}" method="POST">
                    @csrf
                    <div class="w-full inline-block lg:flex items-center gap-4">
                        <div class="w-full lg:w-[50%]">
                            <div class="w-full">
                                <input type="text"
                                    class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                    placeholder="Name**" name="name">

                            </div>
                            @error('name')
                                <div
                                    class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2 inline-block lg:hidden">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full lg:w-[50%] mt-5 lg:mt-0">
                            <div class="w-full">
                                <input type="email"
                                    class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                    placeholder="Email**" name="email">

                            </div>
                            @error('email')
                                <div
                                    class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2 inline-block lg:hidden">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full hidden lg:flex items-center gap-4 ">
                        <div class="w-full lg:w-[50%]">

                            @error('name')
                                <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full lg:w-[50%] mt-5 lg:mt-0">

                            @error('email')
                                <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="w-[100%] mt-5">
                        <div class="w-full">
                            <input type="text"
                                class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                placeholder="Phone**" name="phone">

                        </div>
                        @error('phone')
                            <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full inline-block lg:flex items-center gap-4 mt-5">
                        <div class="w-full lg:w-[50%]">
                            <div class="w-full">
                                <input type="text"
                                    class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                    placeholder="Company Name**" name="company_name">

                            </div>
                            @error('company_name')
                                <div
                                    class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2 inline-block lg:hidden">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full lg:w-[50%] mt-5 lg:mt-0">
                            <div class="w-full">
                                <input type="text"
                                    class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                    placeholder="Company Size**" name="company_size">

                            </div>
                            @error('company_size')
                                <div
                                    class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2 inline-block lg:hidden">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full hidden lg:flex items-center gap-4">
                        <div class="w-full lg:w-[50%]">

                            @error('company_name')
                                <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full lg:w-[50%] mt-5 lg:mt-0">

                            @error('company_size')
                                <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="w-full inline-block lg:flex items-center gap-4 mt-5">
                        <div class="w-full lg:w-[50%]">
                            <input type="text"
                                class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                placeholder="Module" name="module">
                        </div>
                        <div class="w-full lg:w-[50%] mt-5 lg:mt-0">
                            <input type="text"
                                class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                                placeholder="Region" name="region">
                        </div>
                    </div>
                    <div class="w-[100%] mt-5">
                        <select name="service" id="services" onchange="handleChange(this)"
                            class="w-full text-[#BABABA] font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                            id="">
                            <option value="">Select Services**</option>
                            <option value="0">RMS HRM</option>
                            <option value="1">Corporate HRM</option>
                        </select>

                    </div> --}}
                    @error('service')
                        <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                    @enderror
                    <div class="w-[100%] mt-5">
                        <textarea
                            class="w-full text-black font-poppins border border-[#DCE1E9] py-1 lg:py-2 xl:py-4 px-4 focus:outline-none rounded"
                            id="" rows="7" placeholder="Message**" name="message"></textarea>

                    </div>
                    @error('message')
                        <div class="text-12 lg:text-13 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                    @enderror
                    <div class="flex items-start  mt-3">
                        <input type="checkbox" id="termCheck"
                            class="w-[25px] h-[25px] shadow-lg  text-black font-poppins border border-[#DCE1E9]   focus:outline-none rounded me-3">

                        <p class="text-black text-14 lg:text-16 font-poppins leading-5">I have read, understood, and agree to Gym Master Privacy Statement, including Cookie Use.</p>
                    </div>

                    <div class="flex items-center justify-center mt-5">
                        <button disabled type="submit" id="submitDemu"
                            class="bg-gray-400 px-4 py-2 rounded text-white font-poppins text-13 lg:text-16 w-[100%]">Request
                            for Demo</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        // Selecting the checkbox and the button
        const termCheck = document.getElementById('termCheck');
        const submitDemu = document.getElementById('submitDemu');

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
