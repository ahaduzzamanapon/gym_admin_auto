@extends('layouts.app_frontend')

@section('title')
Gym Master | Blog Details
@endsection

@section('content')

<div class="px-4 lg:px-20 mt-8 relative">
    <div class="flex items-center  pb-8  ">
            <img class="w-full lg:h-[550px]" src="{{ asset('blogimages/' . $blog->image) }}"  alt="{{ $blog->image }}">
    </div>
    <div>
        <span class="font-poppins text-14 leading-4">{{ formatDateTime($blog->created_at, 'M-d-Y') }}</span>
        <h1 class="text-26 lg:text-32 font-poppins font-[700] leading-9 py-5">
            {{ $blog->title }}
        </h1>

        <p class="text-14 lg:text-18 font-poppins leading-6">
            {!! $blog->description !!}
        </p>
    </div>
    <img class="absolute w-[53px] h-[70px] lg:w-[170px] lg:h-[200px] xl:w-[200px] xl:h-[260px] top-[0%] left-[0%] -z-10" src="{{ asset('frontend/assets/images/dote9.png') }}" alt="">
</div>

<section class="px-4 lg:px-20 py-9">

    <h1 class="text-28 text-center lg:text-start lg:text-36 font-poppins font-[600]">Related Post</h1>

    <div class="flex items-center flex-wrap gap-5 md:gap-8 lg:gap-10 xl:gap-14 mt-9">

        @forelse ($blog_random as $item)

        @php
            $dateTime = $item->created_at;

        @endphp
        <div class="w-full md:w-[46%] lg:w-[29%] xl:w-[30%] md:min-h-[410px] lg:min-h-[400px] xl:min-h-[480px] border border-[#2094FF] flex flex-col justify-between pb-4 px-[1px] ] rounded-[28px] relative overflow-hidden"  data-aos="fade-up"
        data-aos-anchor-placement="top-bottom" >
          <div>
              <img class="w-full h-[250px]" src="{{ asset('blogimages/' . $item->image) }}" alt="{{ $item->image }}">

          <h1 class="font-poppins lg:text-18 xl:text-22 font-[600] leading-[28px] px-3 py-3">
            {{ strlen($item->title) > 100 ? substr($item->title, 0, 120) . '...' : $item->title }}
            
          </div>

          <div class="flex items-center justify-between px-4 py-3">
              <a href="{{ route('blog_details',$item->title_slug) }}" class="font-poppins lg:text-[11px] xl:text-12 leading-3 text-cayan cursor-pointer">Read more</a>

              <span class="font-poppins lg:text-[11px] xl:text-12 leading-3">{{ formatDateTime($dateTime, 'M-d-Y') }}</span>
          </div>
      
              <svg class="w-[38px] h-[32px] absolute -right-[1%] -bottom-[1.5%]" viewBox="0 0 37 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g filter="url(#filter0_d_667_1017)">
                  <path d="M19.3056 11.52L33 0C33 13.2548 22.2548 24 9 24H4L19.3056 11.52Z" fill="#2094FF"/>
                  </g>
                  <defs>
                  <filter id="filter0_d_667_1017" x="0" y="0" width="37" height="32" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                  <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                  <feOffset dy="4"/>
                  <feGaussianBlur stdDeviation="2"/>
                  <feComposite in2="hardAlpha" operator="out"/>
                  <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                  <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_667_1017"/>
                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_667_1017" result="shape"/>
                  </filter>
                  </defs>
                  </svg>
                  
         
      </div>
        @empty
            <p>No data available here</p>
        @endforelse
        
       
        
    </div>
    <div class="mt-8">
        <nav class="flex justify-end" aria-label="Pagination">
            {{-- <h1>pagination</h1> --}}
            @if (count($blog_random) >= 6)
            {!!  $blog_random->links('vendor.pagination.tailwind') !!}
            @endif
           
        </nav>
    </div>
</section>

<section class="mt-12 pb-7">
    <div>
        <div class="w-[90%] lg:w-[60%] mx-auto" style="box-shadow: 0 1px 10px rgb(0 0 0 / 0.2);">
            <div class="w-full px-4 pt-5 pb-7 lg:px-20 lg:pt-14 lg:pb-20 z-20">
                <h1 class="text-26 lg:text-36 xl:text-40 font-poppins leading-[40px] lg:leading-[48px] text-center text-cayan">something to say?</h1>
                
    
            <form action="{{ route('contact.sent') }}" method="POST">
                @csrf
                <div class="w-[100%] mt-3 lg:mt-5">
                    <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Full Name</label>
                    <input type="text" name="name" class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded" placeholder="Enter your full name**">
                    @error('name')
                    <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                @enderror
                </div>
                <div class="w-[100%] mt-3 lg:mt-5">
                    <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Email Address</label>
                    <input type="email" name="email" class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded" placeholder="Enter your email address**">
                    @error('email')
                    <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                @enderror
                </div>
                <div class="w-[100%] mt-3 lg:mt-5">
                    <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Phone Number</label>
                    <input type="text" name="phone" class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded" placeholder="Enter your phone number**">
                    @error('phone')
                        <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-[100%] mt-3 lg:mt-5">
                    <label for="" class="font-poppins text-16 lg:text-22  font-[500] leading-[50px]">Message</label>
                    <textarea class="w-full text-black font-poppins border border-black shadow-sm py-1 lg:py-2 xl:py-3 px-4 focus:outline-none rounded" name="message" id=""  rows="7" placeholder="Enter your message**......."></textarea>
                    @error('message')
                    <div class="text-12 lg:text-15 font-poppins text-red-500 font-[600] mt-2">{{ $message }}</div>
                @enderror
                </div>
                
    
               <div class="flex items-center justify-start mt-3 lg:mt-5">
                <button type="submit" class="bg-[#1873FD] px-4 py-2 rounded text-white font-poppins text-16">Post</button>
               </div>
            </form>
    
            </div>
        </div>
    </div>
</section>




@endsection