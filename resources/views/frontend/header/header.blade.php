<div class="w-full h-auto bg-cayan flex items-center justify-between px-2 lg:px-14 py-[8px]">

    <div class="lg:flex items-center justify-between lg:justify-normal gap-3">
        <div class="flex items-center text-white gap-2">
        
            <img class="w-[9px] h-[9px] lg:w-[13px] lg:h-[13px] xl:w-[15px] xl:h-[15px]" src="{{ asset('frontend/assets/images/phone_icon.png') }}" alt="phone icon">
            <p class="text-10 lg:text-13 xl:text-14 font-poppins leading-4 font-[500]">
                +88 02 41001094,  01958633205
            </p>
        
        </div>
        <div class="flex items-center text-white gap-2">
        
            <img class="w-[9px] h-[6px] lg:w-[13px] lg:h-[10px] xl:w-[15px] xl:h-[12px]" src="{{ asset('frontend/assets/images/gamil_icon.png') }}" alt="gmail icon">
            <p class="text-10 lg:text-13 xl:text-14 font-poppins leading-4 font-[500]">
                info@mysoftheaven.com
            </p>
        
        </div>


    </div>
    <div class="flex items-center justify-center lg:justify-normal gap-4">
        <a href="{{ facebook_link() }}" target="_blank">

            <img class="w-[10px] h-[10px] lg:w-[16px] lg:h-[16px] xl:w-[18px] xl:h-[18px]" src="{{ asset('frontend/assets/images/facebook.png') }}" alt="facebook icon">
        </a>
        <a href="{{ twitter_Link() }}" target="_blank">

            <img class="w-[10px] h-[10px] lg:w-[16px] lg:h-[16px] xl:w-[18px] xl:h-[18px]" src="{{ asset('frontend/assets/images/twitter.png') }}" alt="twitter icon">
        </a>
        <a href="{{ telegram_Link() }}" target="_blank">

            <img class="w-[10px] h-[10px] lg:w-[16px] lg:h-[16px] xl:w-[18px] xl:h-[18px]" src="{{ asset('frontend/assets/images/telegram.png') }}" alt="telegram icon">
        </a>
        <a href="{{ whatsapp_Link() }}" target="_blank">

            <img class="w-[10px] h-[10px] lg:w-[16px] lg:h-[16px] xl:w-[18px] xl:h-[18px]" src="{{ asset('frontend/assets/images/whatsapp.png') }}" alt="whatsapp icon">
        </a>
        <a href="{{ youtube_Link() }}" target="_blank">

            <img class="w-[10px] h-[10px] lg:w-[16px] lg:h-[16px] xl:w-[18px] xl:h-[18px]" src="{{ asset('frontend/assets/images/youtube.png') }}" alt="youtube icon">
        </a>
    </div>

    

</div>
<div class="bg-color-scroll navbar w-full h-auto px-4 lg:px-14 py-3 flex items-center justify-between bg-white">
    <div>
        <a href="{{ url('/welcome') }}"><img class="w-14"  src="{{ asset('frontend/assets/images/logo.png') }}" alt="HRsheba logo"></a>
    </div>
    <div class="hidden lg:flex items-center gap-10">
        <ul class="flex items-center gap-8">
            <li>
                <a href="{{ url('/welcome') }}" class="text-cayan lg:text-16 font-bold font-poppins  leading-[19px]  hover:text-[#41b5f3] duration-300 ease-in-out hover:text-14 {{ Request::is('/') ? '!text-[#41b5f3] !font-[600]' : '' }}">Home</a>
            </li>
            <li>
                <a onclick="redirectFeatures()" href="#feature-content" class="text-cayan lg:text-16 font-bold font-poppins  leading-[19px] cursor-pointer  hover:text-[#41b5f3] duration-300 ease-in-out hover:text-14 {{ Request::is('#hrShebaFeatures') ? '!text-[#41b5f3] !font-[600]' : '' }}">Features</a>
            </li>
            {{-- <li>
                <a href="{{ url('/pricing') }}" class="text-cayan lg:text-16 font-bold font-poppins  leading-[19px]  hover:text-[#41b5f3] duration-300 ease-in-out hover:text-14 {{ Request::is('pricing') ? '!text-[#41b5f3] !font-[600]' : '' }}">Pricing</a>
            </li> --}}
            <li>
                <a href="{{ url('/solutions') }}" class="text-cayan lg:text-16 font-bold font-poppins  leading-[19px]  hover:text-[#41b5f3] duration-300 ease-in-out hover:text-14 {{ Request::is('devices') ? '!text-[#41b5f3] !font-[600]' : '' }}">Packages</a>
            </li>
            <li>
                <a href="{{ url('/blogs') }}" class="text-cayan lg:text-16 font-bold font-poppins  leading-[19px] hover:text-[#41b5f3] duration-300 ease-in-out hover:text-14 {{ Request::is('blogs') ? '!text-[#41b5f3] !font-[600]' : '' }}">Blog</a>
            </li>
                {{-- <li>
                    <a href="{{ url('/contact_us') }}" class="text-cayan lg:text-16 font-bold font-poppins leading-[19px]  hover:text-[#41b5f3] duration-300 ease-in-out hover:text-14 {{ Request::is('contact_us') ? '!text-[#41b5f3] !font-[600]' : '' }}">Contact Us</a>
                </li> --}}
        </ul>
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="bg-cayan rounded-[24px] px-3 lg:py-1  text-white flex items-center gap-2 hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-15">
                <span class="font-poppins lg:text-16 xl:text-18 font-[500]">Login</span>
                {{-- <img class="lg:w-[14px] lg:h-[14px] xl:w-[16px] xl:h-[16px]" src="{{ asset('frontend/assets/images/arrow.png') }}" alt="arrow icon"> --}}
            </a>
            <a href="{{ route('register') }}" class="bg-cayan rounded-[24px] px-3 lg:py-1  text-white flex items-center gap-2 hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-15">
                <span class="font-poppins lg:text-16 xl:text-18 font-[500]">Register</span>
                <img class="lg:w-[14px] lg:h-[14px] xl:w-[16px] xl:h-[16px]" src="{{ asset('frontend/assets/images/arrow.png') }}" alt="arrow icon">
            </a>
        </div>
    </div>
    <div onclick="openDrawer()" class="block lg:hidden">
        <i class="fa fa-solid fa-bars-staggered" style="color: #006BA3"></i>
    </div>

    
        <div id="hideShowHeader" class="hidden flex-col items-center shadow-xl fixed w-[70%] top-[11%] right-[0%] gap-10 bg-white py-5 z-[999]" data-aos="zoom-in-left">
            <span onclick="openDrawer()" class="absolute top-[0%] left-[2%]"><i  class="fa fa-light fa-xmark"></i></span>
            <ul class="flex flex-col items-center gap-4">
                <li>
                    <a href="{{ url('/') }}" class="text-cayan text-12 font-bold font-poppins  leading-[19px]">Home</a>
                </li>
                <li>
                    <a onclick="redirectFeatures()" href="#feature-content" class="text-cayan text-12 font-bold font-poppins  leading-[19px] cursor-pointer">Features</a>
                </li>
                {{-- <li>
                    <a href="{{ url('/pricing') }}" class="text-cayan text-12 font-bold font-poppins  leading-[19px]">Pricing</a>
                </li> --}}
                <li>
                    <a href="{{ url('/solutions') }}" class="text-cayan text-12 font-bold font-poppins  leading-[19px]">Solutions</a>
                </li>
                <li>
                    <a href="{{ url('/blogs') }}" class="text-cayan text-12 font-bold font-poppins  leading-[19px]">Blog</a>
                </li>
                <li>
                    <a href="{{ url('/contact_us') }}" class="text-cayan text-12 font-bold font-poppins leading-[19px]">Contact Us</a>
                </li>
            </ul>
            <div class="flex items-center justify-center mt-4">
                <a href="{{ route('login') }}" class="bg-cayan rounded-[24px] px-3 py-1   text-white flex items-center gap-2">
                    <span class="font-poppins text-12 font-[500]">Login</span>
                    <img class="w-[12px] h-[12px]" src="{{ asset('frontend/assets/images/arrow.png') }}" alt="arrow icon">
                </a>
                <a href="{{ route('register') }}" class="bg-cayan rounded-[24px] px-3 py-1   text-white flex items-center gap-2">
                    <span class="font-poppins text-12 font-[500]">Register</span>
                    <img class="w-[12px] h-[12px]" src="{{ asset('frontend/assets/images/arrow.png') }}" alt="arrow icon">
                </a>
            </div>
        </div>
   
</div>