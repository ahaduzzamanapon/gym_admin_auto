@extends('layouts.app_frontend')
@section('title')
 Gym Master | Not Access
@endsection

@section('content')
<div class="px-4 lg:px-20 mt-8 relative">
    <div class="w-full inline-block lg:flex items-center justify-between">
        <div class="w-full lg:w-[50%] xl:w-[45%] ps-5 lg:ps-10 ">
            <h1 class="text-[#01669B] font-poppins text-22 lg:text-28 xl:text-36 font-[600] pb-4">You are not authorized to access this page</h1>
            <p class="text-[#707070] font-poppins text-14 lg:text-16 leading-6">You are not authorized to access this page. Please contact your system administrator for more information.</p>
        </div>
        <div class="w-full lg:w-[50%] xl:w-[45%] lg:pl-10">
            <img class="w-full" src="{{ asset('frontend/assets/images/not-access.jpg') }}" alt="not access image">
        </div>
    </div>
</div>

@endsection