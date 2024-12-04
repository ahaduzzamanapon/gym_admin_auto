@extends('layouts.app_frontend')

@section('title')
    Gym Master | Home
@endsection

<style>
    .flip-card {
        background-color: transparent;
        width: 100%;
        min-height: 200px;
        max-width: 300px;
        perspective: 1000px;
        font-family: sans-serif;
        margin: 10px;
    }

    .title {
        font-size: 1.5em;
        font-weight: 900;
        text-align: center;
        margin: 0;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 1rem;
    }

    .flip-card-front {
        background: white;
        color: black;
    }

    .flip-card-back {
        background: #284D78;
        color: white;
        transform: rotateY(180deg);
    }
</style>

@section('content')
    <div class="bg-[#EDF6FF] py-8 lg:py-0 lg:mb-8 h-auto bg-cover bg-left lg:bg-center" style="background-image: url('{{ url('frontend/assets/images/gym_background.png') }}');">

        <div class="w-full h-auto px-4  lg:px-14 lg:py-8">
            <div class="w-full h-auto lg:flex items-center justify-between">
                <div class="w-full lg:w-[60%] h-auto">
                    <h1
                        class="text-30 xl:text-[36px]  font-bold font-poppins text-[#1F1F1F]">
                        Simplify Your Gym Management with <span class="text-cayan">Gym Master Software</span>
                    </h1>

                    <p
                        class="text-12 lg:text-16 xl:text-20 font-poppins text-[#1F1F1F] leading-4 lg:leading-[26px] mt-2 lg:mt-4">
                        GymMaster is a gym management software designed to streamline various aspects of running a fitness facility, such as gyms, health clubs, and studios. It offers tools to handle membership management, scheduling, billing, and communication, helping gym owners and managers 
                    </p>
                    <div class="flex items-center gap-4 mt-2 lg:mt-5">
                        <a href="{{ route('demu_request') }}"
                            class="bg-cayan rounded-[24px] px-3 py-1 text-white flex items-center gap-2  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-15">
                            <span class="font-poppins text-13 lg:text-18  font-bold px-3 py-1">Get Started</span>
                            <img class="w-[10px] h-[10px] lg:w-[14px] lg:h-[14px] xl:w-[16px] xl:h-[16px]"
                                src="{{ asset('frontend/assets/images/arrow.png') }}" alt="Hrsheba logo">
                        </a>

                    </div>
                    <div class="mt-5 flex items-center justify-between lg:justify-normal  lg:gap-20">
                        <div class="border-r border-dashed border-[#006FD6] pr-5">
                            <h1 class="font-poppins text-26 lg:text-36 xl:text-40 text-cayan font-bold counter_value">
                                {{ $years_of_exprience }}+</h1>
                            <p class="text-cayan text-13 lg:text-16  xl:text-20 font-bold leading-7">
                                Gym
                            </p>
                        </div>
                        <div class="border-r border-dashed border-[#006FD6] pr-5">
                            <h1 class="font-poppins text-28 lg:text-36 xl:text-40 text-cayan font-bold counter_value">
                                {{ $total_clients }}+</h1>
                            <p class="text-cayan text-13 lg:text-16  xl:text-20 font-bold leading-7">Members </p>
                        </div>
                        <div class="border-r border-dashed border-[#006FD6] pr-5">
                            <h1 class="font-poppins text-28 lg:text-36 xl:text-40 text-cayan font-bold counter_value">
                                {{ $rmg_sector }}+</h1>
                            <p class="text-cayan text-13 lg:text-16  xl:text-20 font-bold leading-7">Divisions In Bd</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" h-auto lg:flex items-center lg:mx-10 p-5 xl:p-14">
        <div class="w-full lg:w-[61%] xl:w-[65%]  p-5">
            <div class="">
                <h1 class="font-bold text-28 lg:text-[30px] xl:text-40  leading-8 lg:leading-[52px]  text-[#1F1F1F]"> <span
                        class="text-cayan">Gym Management </span> that helps your Gym succeed</h1>
                <p class="text-13 lg:text-20 lg:leading-5 xl:leading-[32px] pt-5 text-[#1F1F1F]">Manage your gym schedule more easily than ever before with a single  calendar view to manage all event types like classes, personal training  and more.</p>
                <div class="flex flex-wrap items-center justify-between mt-5 gap-2 lg:gap-0">
                    <div class="bg-cayan py-4 px-5 w-[47%] lg:w-[23%]  h-[100px] lg:h-[110px] xl:h-[100px] text-center rounded-sm shadow-sm"
                        data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <span class="flex items-center justify-center">
                            <svg class="w-[32px] h-[32px]" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 4H29L30 5V25L29 26H3L2 25V5L3 4ZM4 6V24H28V6H4ZM8 10H24V12H8V10ZM20 14H8V16H20V14ZM8 18H16V20H8V18Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <h3 class="text-white font-poppins text-10 lg:text-12 xl:text-14 leading-4 font-bold mt-3">
                            Trusted
                            By
                            100+ Companies
                        </h3>
                    </div>
                    <div class="bg-cayan py-4 px-5 w-[47%] lg:w-[23%] h-[100px] lg:h-[110px] xl:h-[100px] text-center rounded-sm shadow-sm"
                        data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <span class="flex items-center justify-center">
                            <svg class="w-[24px] h-[24px]" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 9.74999C21.8283 9.74999 22.5 9.07827 22.5 8.24999V6.74999C22.5 5.92171 21.8283 5.24999 21 5.24999H19.8806L22.312 2.11827C22.5637 1.78921 22.5014 1.31859 22.1728 1.06687L20.9817 0.154679C20.6527 -0.0975083 20.182 -0.0346958 19.9298 0.293898L16.0823 5.24999H3C2.17172 5.24999 1.5 5.92171 1.5 6.74999V8.24999C1.5 9.07827 2.17172 9.74999 3 9.74999H12.5887L9.09516 14.25H3C2.17172 14.25 1.5 14.9217 1.5 15.75V17.25C1.5 18.0783 2.17172 18.75 3 18.75H5.60109L3.16969 21.8817C2.91797 22.2103 2.98031 22.6809 3.30891 22.9331L4.5 23.8453C4.82906 24.0975 5.29969 24.0347 5.55141 23.7061L9.39937 18.75H21C21.8283 18.75 22.5 18.0783 22.5 17.25V15.75C22.5 14.9217 21.8283 14.25 21 14.25H12.893L16.3866 9.74999H21Z"
                                    fill="white" />
                            </svg>

                        </span>
                        <h3 class="text-white font-poppins text-10 lg:text-12 xl:text-14 leading-4 font-bold mt-4">
                            No Large

                            Investment
                        </h3>
                    </div>

                    <div class="bg-cayan py-4 px-5 w-[47%] lg:w-[23%] h-[100px] lg:h-[110px] xl:h-[100px] text-center rounded-sm shadow-sm"
                        data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <span class="flex items-center justify-center">
                            <svg class="w-[24px] h-[20px]" viewBox="0 0 24 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.8938 12.1988C22.9913 11.67 22.9913 11.13 22.8938 10.6013L23.8612 10.0425C23.9738 9.97876 24.0225 9.84751 23.985 9.72376C23.7337 8.91376 23.3025 8.17876 22.74 7.57126C22.6538 7.47751 22.515 7.45501 22.4025 7.51876L21.435 8.07751C21.0263 7.72876 20.5575 7.45876 20.0513 7.27876V6.16126C20.0513 6.03376 19.9613 5.92126 19.8375 5.89501C19.0013 5.70751 18.15 5.71501 17.355 5.89501C17.2313 5.92126 17.1413 6.03376 17.1413 6.16126V7.27876C16.635 7.45876 16.1663 7.72876 15.7575 8.07751L14.79 7.51876C14.6813 7.45501 14.5388 7.47751 14.4525 7.57126C13.89 8.17876 13.4588 8.91376 13.2075 9.72376C13.17 9.84751 13.2225 9.97876 13.3313 10.0425L14.2987 10.6013C14.2013 11.13 14.2013 11.67 14.2987 12.1988L13.3313 12.7575C13.2188 12.8213 13.17 12.9525 13.2075 13.0763C13.4588 13.8863 13.89 14.6175 14.4525 15.2288C14.5388 15.3225 14.6775 15.345 14.79 15.2813L15.7575 14.7225C16.1663 15.0713 16.635 15.3413 17.1413 15.5213V16.6388C17.1413 16.7663 17.2313 16.8788 17.355 16.905C18.1912 17.0925 19.0425 17.085 19.8375 16.905C19.9613 16.8788 20.0513 16.7663 20.0513 16.6388V15.5213C20.5575 15.3413 21.0263 15.0713 21.435 14.7225L22.4025 15.2813C22.5113 15.345 22.6538 15.3225 22.74 15.2288C23.3025 14.6213 23.7337 13.8863 23.985 13.0763C24.0225 12.9525 23.97 12.8213 23.8612 12.7575L22.8938 12.1988ZM18.6 13.2188C17.595 13.2188 16.7812 12.4013 16.7812 11.4C16.7812 10.3988 17.5988 9.58126 18.6 9.58126C19.6013 9.58126 20.4188 10.3988 20.4188 11.4C20.4188 12.4013 19.605 13.2188 18.6 13.2188ZM3.6 7.80001C4.92375 7.80001 6 6.72376 6 5.40001C6 4.07626 4.92375 3.00001 3.6 3.00001C2.27625 3.00001 1.2 4.07626 1.2 5.40001C1.2 6.72376 2.27625 7.80001 3.6 7.80001ZM12 9.00001C12.0713 9.00001 12.1388 8.98126 12.21 8.97751C12.5213 8.16376 12.9788 7.39876 13.5712 6.75751C13.8488 6.45751 14.2425 6.28501 14.655 6.28501C14.9137 6.28501 15.1688 6.35251 15.39 6.48376L15.6862 6.65626C15.7163 6.63751 15.7463 6.62251 15.7763 6.60376C16.0388 6.05626 16.1963 5.44876 16.1963 4.80376C16.1963 2.48251 14.3175 0.60376 11.9963 0.60376C9.675 0.60376 7.8 2.47876 7.8 4.80001C7.8 7.12126 9.67875 9.00001 12 9.00001ZM15.945 16.2938C15.8588 16.2488 15.7725 16.1963 15.69 16.1475C15.3825 16.3275 15.1163 16.515 14.6588 16.515C14.25 16.515 13.8563 16.3425 13.575 16.0425C12.8888 15.3 12.3638 14.3963 12.0675 13.4325C11.6663 12.1388 13.0013 11.5688 13.035 11.5463C13.0313 11.4488 13.0313 11.3513 13.035 11.2538L12.7388 11.0813C12.5963 10.9988 12.4763 10.8938 12.3713 10.7775C12.2475 10.785 12.1275 10.8 12.0038 10.8C11.0813 10.8 10.2188 10.575 9.435 10.2H9.12375C6.735 10.2 4.8 12.135 4.8 14.52V15.6C4.8 16.5938 5.60625 17.4 6.6 17.4H16.1775C16.0387 17.175 15.945 16.92 15.945 16.6388V16.2938ZM6.49125 9.69751C6.05625 9.26626 5.46 9.00001 4.8 9.00001H2.4C1.07625 9.00001 0 10.0763 0 11.4V12.6C0 13.2638 0.53625 13.8 1.2 13.8H3.67125C3.9075 12.0225 4.98 10.5263 6.49125 9.69751Z"
                                    fill="white" />
                            </svg>


                        </span>
                        <h3 class="text-white font-poppins text-10 lg:text-12 xl:text-14 leading-4 font-bold mt-6">
                            Month wise
                            Subscription
                        </h3>
                    </div>

                    <div class="bg-cayan py-4 px-5 w-[47%] lg:w-[23%] h-[100px] lg:h-[110px] xl:h-[100px] text-center rounded-sm shadow-sm"
                        data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <span class="flex items-center justify-center">
                            <svg class="h-[24px] w-[24px]" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.8 4.79999H1.2C0.537375 4.79999 0 5.33736 0 5.99999V18C0 18.6626 0.537375 19.2 1.2 19.2H22.8C23.4626 19.2 24 18.6626 24 18V5.99999C24 5.33736 23.4626 4.79999 22.8 4.79999ZM1.8 17.4V15C3.12563 15 4.2 16.0744 4.2 17.4H1.8ZM1.8 8.99999V6.59999H4.2C4.2 7.92561 3.12563 8.99999 1.8 8.99999ZM12 15.6C10.3429 15.6 9 13.9879 9 12C9 10.0117 10.3433 8.39999 12 8.39999C13.6568 8.39999 15 10.0117 15 12C15 13.9886 13.6564 15.6 12 15.6ZM22.2 17.4H19.8C19.8 16.0744 20.8744 15 22.2 15V17.4ZM22.2 8.99999C20.8744 8.99999 19.8 7.92561 19.8 6.59999H22.2V8.99999Z"
                                    fill="white" />
                            </svg>



                        </span>
                        <h3 class="text-white font-poppins text-10 lg:text-12 xl:text-14 leading-4 font-bold mt-4">
                            Installment wise
                            Payment
                        </h3>
                    </div>

                </div>
            </div>
        </div>

        <div class=" w-full lg:w-[39%] xl:w-[35%] p-5">
            <img class="w-full"
                src="{{ asset('frontend/assets/images/side_imge.png') }}" alt="">
        </div>
    </div>

    <div class=" lg:flex  items-center gap-5 px-4 lg:mx-10 lg:px-10 py-4">
        <div class="w-full lg:w-[50%] p-5">
            <img src="{{ asset('frontend/assets/images/seba.png') }}" class="lg:w-[80%]" alt="Sheba img">
        </div>
        <div class="w-full lg:w-[50%] px-3">
            <h1 class="font-poppins text-24 lg:text-28 xl:text-36  font-bold text-cayan">Why Gym Master Software?</h1>
            <div class="mt-6">
                <p class="font-poppins text-16 xl:text-20 font-normal leading-6 text-justify">Gym Master software can provide significant advantages for gym owners, managers, and staff due to its tailored features and user-friendly approach.GymMaster allows easy tracking of memberships, renewals, attendance, and member activity. This helps gyms maintain strong, organized member records and provide better service..</p>
            </div>
        </div>
    </div>

    <div class="w-full px-4 lg:px-10  py-4 ">
        <div class="w-full my-3 text-center">
            <h1 class="font-poppins text-28 lg:text-[30px] xl:text-40  leading-[62px] font-bold text-black"><span class="text-cayan">Gym Master</span>   Software Features</h1>
        </div>
        @if ($features->count() == 3)
            <div class="w-full flex flex-wrap justify-center">
                @forelse ($features as $feature)
                    <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                        <div class="flex items-center gap-5">
                            <div><img src="{{ asset($feature->image) }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                            <div>
                                <h2 class="font-poppins text-16 xl:text-18 font-semibold">{{ $feature->title }}</h2>
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        @else
            <div class="w-full flex flex-wrap justify-center">
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/info.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Employee Information
                                Management System</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-[#F3F6E6] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/receipt.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Pricing, Package and
                                Coupon Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/report.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Workout Tracking and
                                Fitness Plans</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/immigration.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Daily Attendance & health
                                update Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/dashboard.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Member Profile & 
                                Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-[#F3F6E6] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/g3385.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Membership Payment
                                Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-[#F3F6E6] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/financial-statement.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Income & Expense 
                                Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/inventory.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Inventory 
                                Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-[#F3F6E6] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/teamwork.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Staff Role and 
                                Permission Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/g3726.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Report Management</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-[#F3F6E6] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/smartphone.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">SMS gateway with SMS</h2>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-[31%] pl-5 py-5 m-2  bg-gradient-to-l from-[#D1EEEF] via-blue-50 to-[#D1EEEF] shadow-lg">
                    <div class="flex items-center gap-5">
                        <div><img src="{{ asset('frontend/assets/images/Gym-feature/Group.png') }}" class="w-32 lg:w-12 xl:w-28" alt="Sheba img"></div>
                        <div>
                            <h2 class="font-poppins text-16 xl:text-18 font-semibold">Support / Contact 
                                Management</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <div class=" w-full px-4 lg:px-14  my-10 py-8 bg-[#D3E4F48C]">
        <h1 class= "text-24 lg:text-30 xl:text-40  font-poppins font-bold xl:leading-[62px] text-center mb-3">45K+ Gym use our product.
        </h1>
        <div id="trustedSwiper" class="swiper mySwiper !mt-5 !pb-10 !h-[180px]">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/1.jpg') }}" alt="trusted image one">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/2.jpg') }}" alt="trusted image two">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/3.jpg') }}" alt="trusted image three">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/4.jpg') }}" alt="trusted image four">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/5.jpg') }}" alt="trusted image five">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/6.jpg') }}" alt="trusted image six">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/7.jpg') }}" alt="trusted image seaven">
                </div>
                <div class="swiper-slide">
                    <img class="w-[70%] lg:!w-[60%] lg:!h-[98px] xl:!h-[112px]"
                        src="{{ asset('frontend/assets/images/trusted_slider/8.jpg') }}" alt="trusted image eight">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="w-full px-4 lg:px-14  my-10 py-8 bg-white">
        <div>
            <h1 class="font-poppins text-30 xl:text-40 font-bold  text-center">
                Available For All Users
            </h1>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('frontend/assets/images/available_for_all.png') }}" class="lg:w-[70%]" alt="">
        </div>
    </div>

    <div
        class="w-full  lg:flex  items-center gap-7 px-4 lg:px-14  py-4  bg-gradient-to-l from-[#F2FCFE] via-blue-50 to-[#F8F4FE] ">
        <div class="w-full lg:w-[50%] p-5">
            <div class="my-2">
                <h1 class="font-poppins text-22 lg:text-32  leading-[36px] font-bold">Benefits of GYM MASTER</h1>
            </div>
            <img src="{{ asset('frontend/assets/images/Benefits_of_gym.png') }}" alt="Sheba img">
        </div>
        <div class="w-full lg:w-[50%] px-3 lg:px-0">
            <div class="lg:flex my-2 w-full">
                <div
                    class="bg-white lg:w-[50%] lg:rounded-tr-[60px] p-5 mx-3 drop-shadow-md my-2 flex items-center space-x-5 ">
                    <img src="{{ asset('frontend/assets/images/g1170.svg') }}" class="w-10 xl:w-16" alt="">
                    <p class="text-15 lg:text-13 xl:text-16 font-poppins font-bold text-cayan">User-Friendly 
                        Interface</p>
                </div>
                <div
                    class="bg-white lg:w-[50%] lg:rounded-tl-[60px] p-5 mx-3 drop-shadow-md my-2 flex items-center space-x-5 ">
                    <img src="{{ asset('frontend/assets/images/cafe 1.svg') }}" class="w-10 xl:w-16" alt="">
                    <p class="text-15 lg:text-13 xl:text-16 font-poppins font-bold text-cayan">Automated Reminders</p>
                </div>
            </div>
            <div class="lg:flex my-2 w-full">
                <div
                    class="bg-white lg:w-[50%] lg:rounded-bl-[60px] p-5 mx-3 drop-shadow-md my-2 flex items-center space-x-5 ">
                    <img src="{{ asset('frontend/assets/images/boutique 1.svg') }}" class="w-10 xl:w-16" alt="">
                    <p class="text-15 lg:text-13 xl:text-16 font-poppins font-bold text-cayan">Smart Dashboard</p>
                </div>
                <div
                    class="bg-white lg:w-[50%] lg:rounded-br-[60px] p-5 mx-3 drop-shadow-md my-2 flex items-center space-x-5 ">
                    <img src="{{ asset('frontend/assets/images/service-center 1.svg') }}" class="w-10 xl:w-16" alt="">
                    <p class="text-15 lg:text-13 xl:text-16 font-poppins font-bold text-cayan">Easy Shift 
                        Management</p>
                </div>
            </div>
            <div class="lg:flex my-2 w-full">
                <div
                    class="bg-white lg:w-[50%] lg:rounded-tr-[60px] p-5 mx-3 drop-shadow-md my-2 flex items-center space-x-5 ">
                    <img src="{{ asset('frontend/assets/images/resort 1.svg') }}" class="w-10 xl:w-16" alt="">
                    <p class="text-15 lg:text-13 xl:text-16 font-poppins font-bold text-cayan">Detailed 
                        Reporting</p>
                </div>
                <div
                    class="bg-white lg:w-[50%] lg:rounded-tl-[60px] p-5 mx-3 drop-shadow-md my-2 flex items-center space-x-5 ">
                    <img src="{{ asset('frontend/assets/images/marketplace 2.svg') }}" class="w-10 xl:w-16" alt="">
                    <p class="text-15 lg:text-13 xl:text-16 font-poppins font-bold text-cayan">Online Payment</p>
                </div>
            </div>
        </div>
    </div>

    

    <div class="xl:container lg:mx-10 xl:mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 px-4 lg:px-0">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <span class="flex items-center justify-center">
                        <svg class="w-[30px] h-[70px] lg:w-[56px] lg:h-[56px] xl:w-[64px] xl:h-[64px]" viewBox="0 0 64 64"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M61.05 43.7299C61.31 42.3199 61.31 40.8799 61.05 39.4699L63.63 37.9799C63.93 37.8099 64.06 37.4599 63.96 37.1299C63.29 34.9699 62.14 33.0099 60.64 31.3899C60.41 31.1399 60.04 31.0799 59.74 31.2499L57.16 32.7399C56.07 31.8099 54.82 31.0899 53.47 30.6099V27.6299C53.47 27.2899 53.23 26.9899 52.9 26.9199C50.67 26.4199 48.4 26.4399 46.28 26.9199C45.95 26.9899 45.71 27.2899 45.71 27.6299V30.6099C44.36 31.0899 43.11 31.8099 42.02 32.7399L39.44 31.2499C39.15 31.0799 38.77 31.1399 38.54 31.3899C37.04 33.0099 35.89 34.9699 35.22 37.1299C35.12 37.4599 35.26 37.8099 35.55 37.9799L38.13 39.4699C37.87 40.8799 37.87 42.3199 38.13 43.7299L35.55 45.2199C35.25 45.3899 35.12 45.7399 35.22 46.0699C35.89 48.2299 37.04 50.1799 38.54 51.8099C38.77 52.0599 39.14 52.1199 39.44 51.9499L42.02 50.4599C43.11 51.3899 44.36 52.1099 45.71 52.5899V55.5699C45.71 55.9099 45.95 56.2099 46.28 56.2799C48.51 56.7799 50.78 56.7599 52.9 56.2799C53.23 56.2099 53.47 55.9099 53.47 55.5699V52.5899C54.82 52.1099 56.07 51.3899 57.16 50.4599L59.74 51.9499C60.03 52.1199 60.41 52.0599 60.64 51.8099C62.14 50.1899 63.29 48.2299 63.96 46.0699C64.06 45.7399 63.92 45.3899 63.63 45.2199L61.05 43.7299ZM49.6 46.4499C46.92 46.4499 44.75 44.2699 44.75 41.5999C44.75 38.9299 46.93 36.7499 49.6 36.7499C52.27 36.7499 54.45 38.9299 54.45 41.5999C54.45 44.2699 52.28 46.4499 49.6 46.4499ZM22.4 31.9999C29.47 31.9999 35.2 26.2699 35.2 19.1999C35.2 12.1299 29.47 6.3999 22.4 6.3999C15.33 6.3999 9.6 12.1299 9.6 19.1999C9.6 26.2699 15.33 31.9999 22.4 31.9999ZM42.52 54.6499C42.29 54.5299 42.06 54.3899 41.84 54.2599L41.05 54.7199C40.45 55.0599 39.77 55.2499 39.09 55.2499C38 55.2499 36.95 54.7899 36.2 53.9899C34.37 52.0099 32.97 49.5999 32.18 47.0299C31.63 45.2599 32.37 43.3899 33.97 42.4599L34.76 41.9999C34.75 41.7399 34.75 41.4799 34.76 41.2199L33.97 40.7599C32.37 39.8399 31.63 37.9599 32.18 36.1899C32.27 35.8999 32.4 35.6099 32.5 35.3199C32.12 35.2899 31.75 35.1999 31.36 35.1999H29.69C27.47 36.2199 25 36.7999 22.4 36.7999C19.8 36.7999 17.34 36.2199 15.11 35.1999H13.44C6.02 35.1999 0 41.2199 0 48.6399V52.7999C0 55.4499 2.15 57.5999 4.8 57.5999H40C41.01 57.5999 41.95 57.2799 42.72 56.7499C42.6 56.3699 42.52 55.9799 42.52 55.5699V54.6499Z"
                                fill="#2CC9EC" />
                        </svg>

                    </span>
                    <p>Full Gym Support</p>
                </div>
                <div class="flip-card-back">
                    <span class="flex items-center justify-center">
                        <svg style="filter: invert(100) brightness(16);"
                            class="w-[30px] h-[70px] lg:w-[56px] lg:h-[56px] xl:w-[64px] xl:h-[64px]" viewBox="0 0 64 64"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M61.05 43.7299C61.31 42.3199 61.31 40.8799 61.05 39.4699L63.63 37.9799C63.93 37.8099 64.06 37.4599 63.96 37.1299C63.29 34.9699 62.14 33.0099 60.64 31.3899C60.41 31.1399 60.04 31.0799 59.74 31.2499L57.16 32.7399C56.07 31.8099 54.82 31.0899 53.47 30.6099V27.6299C53.47 27.2899 53.23 26.9899 52.9 26.9199C50.67 26.4199 48.4 26.4399 46.28 26.9199C45.95 26.9899 45.71 27.2899 45.71 27.6299V30.6099C44.36 31.0899 43.11 31.8099 42.02 32.7399L39.44 31.2499C39.15 31.0799 38.77 31.1399 38.54 31.3899C37.04 33.0099 35.89 34.9699 35.22 37.1299C35.12 37.4599 35.26 37.8099 35.55 37.9799L38.13 39.4699C37.87 40.8799 37.87 42.3199 38.13 43.7299L35.55 45.2199C35.25 45.3899 35.12 45.7399 35.22 46.0699C35.89 48.2299 37.04 50.1799 38.54 51.8099C38.77 52.0599 39.14 52.1199 39.44 51.9499L42.02 50.4599C43.11 51.3899 44.36 52.1099 45.71 52.5899V55.5699C45.71 55.9099 45.95 56.2099 46.28 56.2799C48.51 56.7799 50.78 56.7599 52.9 56.2799C53.23 56.2099 53.47 55.9099 53.47 55.5699V52.5899C54.82 52.1099 56.07 51.3899 57.16 50.4599L59.74 51.9499C60.03 52.1199 60.41 52.0599 60.64 51.8099C62.14 50.1899 63.29 48.2299 63.96 46.0699C64.06 45.7399 63.92 45.3899 63.63 45.2199L61.05 43.7299ZM49.6 46.4499C46.92 46.4499 44.75 44.2699 44.75 41.5999C44.75 38.9299 46.93 36.7499 49.6 36.7499C52.27 36.7499 54.45 38.9299 54.45 41.5999C54.45 44.2699 52.28 46.4499 49.6 46.4499ZM22.4 31.9999C29.47 31.9999 35.2 26.2699 35.2 19.1999C35.2 12.1299 29.47 6.3999 22.4 6.3999C15.33 6.3999 9.6 12.1299 9.6 19.1999C9.6 26.2699 15.33 31.9999 22.4 31.9999ZM42.52 54.6499C42.29 54.5299 42.06 54.3899 41.84 54.2599L41.05 54.7199C40.45 55.0599 39.77 55.2499 39.09 55.2499C38 55.2499 36.95 54.7899 36.2 53.9899C34.37 52.0099 32.97 49.5999 32.18 47.0299C31.63 45.2599 32.37 43.3899 33.97 42.4599L34.76 41.9999C34.75 41.7399 34.75 41.4799 34.76 41.2199L33.97 40.7599C32.37 39.8399 31.63 37.9599 32.18 36.1899C32.27 35.8999 32.4 35.6099 32.5 35.3199C32.12 35.2899 31.75 35.1999 31.36 35.1999H29.69C27.47 36.2199 25 36.7999 22.4 36.7999C19.8 36.7999 17.34 36.2199 15.11 35.1999H13.44C6.02 35.1999 0 41.2199 0 48.6399V52.7999C0 55.4499 2.15 57.5999 4.8 57.5999H40C41.01 57.5999 41.95 57.2799 42.72 56.7499C42.6 56.3699 42.52 55.9799 42.52 55.5699V54.6499Z"
                                fill="#2CC9EC" />
                        </svg>

                    </span>
                    <p>Full Education Support</p>
                </div>
            </div>
        </div>


        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <span class="flex items-center justify-center">
                        <svg class="w-[30px] h-[70px] lg:w-[56px] lg:h-[56px] xl:w-[64px] xl:h-[64px]" viewBox="0 0 64 64"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M44.7333 12.8L54.7556 22.8222C55.1778 23.2444 55.1778 23.9333 54.7556 24.3555L30.4889 48.6222L20.1778 49.7667C18.8 49.9222 17.6333 48.7555 17.7889 47.3778L18.9333 37.0667L43.2 12.8C43.6222 12.3778 44.3111 12.3778 44.7333 12.8ZM62.7333 10.2555L57.3111 4.83332C55.6222 3.14443 52.8778 3.14443 51.1778 4.83332L47.2444 8.76665C46.8222 9.18887 46.8222 9.87776 47.2444 10.3L57.2667 20.3222C57.6889 20.7444 58.3778 20.7444 58.8 20.3222L62.7333 16.3889C64.4222 14.6889 64.4222 11.9444 62.7333 10.2555ZM42.6667 42.0222V53.3333H7.11111V17.7778H32.6444C33 17.7778 33.3333 17.6333 33.5889 17.3889L38.0333 12.9444C38.8778 12.1 38.2778 10.6667 37.0889 10.6667H5.33333C2.38889 10.6667 0 13.0555 0 16V55.1111C0 58.0555 2.38889 60.4444 5.33333 60.4444H44.4444C47.3889 60.4444 49.7778 58.0555 49.7778 55.1111V37.5778C49.7778 36.3889 48.3444 35.8 47.5 36.6333L43.0556 41.0778C42.8111 41.3333 42.6667 41.6667 42.6667 42.0222Z"
                                fill="#1A9CB9" />
                        </svg>
                    </span>
                    <p>Easy to use</p>
                </div>
                <div class="flip-card-back">
                    <span class="flex items-center justify-center">
                        <svg style="filter: invert(100) brightness(16);"
                            class="w-[30px] h-[70px] lg:w-[56px] lg:h-[56px] xl:w-[64px] xl:h-[64px]" viewBox="0 0 64 64"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M44.7333 12.8L54.7556 22.8222C55.1778 23.2444 55.1778 23.9333 54.7556 24.3555L30.4889 48.6222L20.1778 49.7667C18.8 49.9222 17.6333 48.7555 17.7889 47.3778L18.9333 37.0667L43.2 12.8C43.6222 12.3778 44.3111 12.3778 44.7333 12.8ZM62.7333 10.2555L57.3111 4.83332C55.6222 3.14443 52.8778 3.14443 51.1778 4.83332L47.2444 8.76665C46.8222 9.18887 46.8222 9.87776 47.2444 10.3L57.2667 20.3222C57.6889 20.7444 58.3778 20.7444 58.8 20.3222L62.7333 16.3889C64.4222 14.6889 64.4222 11.9444 62.7333 10.2555ZM42.6667 42.0222V53.3333H7.11111V17.7778H32.6444C33 17.7778 33.3333 17.6333 33.5889 17.3889L38.0333 12.9444C38.8778 12.1 38.2778 10.6667 37.0889 10.6667H5.33333C2.38889 10.6667 0 13.0555 0 16V55.1111C0 58.0555 2.38889 60.4444 5.33333 60.4444H44.4444C47.3889 60.4444 49.7778 58.0555 49.7778 55.1111V37.5778C49.7778 36.3889 48.3444 35.8 47.5 36.6333L43.0556 41.0778C42.8111 41.3333 42.6667 41.6667 42.6667 42.0222Z"
                                fill="#1A9CB9" />
                        </svg>
                    </span>
                    <p>Easy to use</p>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <span class="flex items-center justify-center">
                        <svg class="w-[30px] h-[30px] lg:w-[56px] lg:h-[56px] xl:w-[64px] xl:h-[64px]" viewBox="0 0 64 64"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 28H3C1.34312 28 0 29.3431 0 31V61C0 62.6569 1.34312 64 3 64H13C14.6569 64 16 62.6569 16 61V31C16 29.3431 14.6569 28 13 28ZM8 59C6.34312 59 5 57.6569 5 56C5 54.3431 6.34312 53 8 53C9.65687 53 11 54.3431 11 56C11 57.6569 9.65687 59 8 59ZM48 10.1815C48 15.4835 44.7537 18.4575 43.8404 22H56.5558C60.7304 22 63.9804 25.4683 63.9999 29.2623C64.0104 31.5045 63.0566 33.9184 61.57 35.4119L61.5563 35.4256C62.7858 38.3428 62.5859 42.4302 60.3927 45.3592C61.4779 48.5961 60.3841 52.5723 58.345 54.7039C58.8823 56.9036 58.6255 58.7757 57.5765 60.2829C55.0252 63.9484 48.702 64 43.3549 64L42.9992 63.9999C36.9634 63.9977 32.0235 61.8001 28.0543 60.0342C26.0596 59.1469 23.4516 58.0484 21.4729 58.012C20.6554 57.997 20 57.3299 20 56.5122V29.791C20 29.391 20.1602 29.0071 20.4447 28.7259C25.3965 23.8329 27.5257 18.6525 31.5844 14.587C33.4349 12.733 34.1079 9.9325 34.7585 7.22425C35.3144 4.91162 36.4771 0 39 0C42 0 48 1 48 10.1815Z"
                                fill="#2576C1" />
                        </svg>
                    </span>
                    <p>Best Software Support</p>
                </div>
                <div class="flip-card-back">
                    <span class="flex items-center justify-center">
                        <svg style="filter: invert(100) brightness(16);"
                            class="w-[30px] h-[30px] lg:w-[56px] lg:h-[56px] xl:w-[64px] xl:h-[64px]" viewBox="0 0 64 64"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 28H3C1.34312 28 0 29.3431 0 31V61C0 62.6569 1.34312 64 3 64H13C14.6569 64 16 62.6569 16 61V31C16 29.3431 14.6569 28 13 28ZM8 59C6.34312 59 5 57.6569 5 56C5 54.3431 6.34312 53 8 53C9.65687 53 11 54.3431 11 56C11 57.6569 9.65687 59 8 59ZM48 10.1815C48 15.4835 44.7537 18.4575 43.8404 22H56.5558C60.7304 22 63.9804 25.4683 63.9999 29.2623C64.0104 31.5045 63.0566 33.9184 61.57 35.4119L61.5563 35.4256C62.7858 38.3428 62.5859 42.4302 60.3927 45.3592C61.4779 48.5961 60.3841 52.5723 58.345 54.7039C58.8823 56.9036 58.6255 58.7757 57.5765 60.2829C55.0252 63.9484 48.702 64 43.3549 64L42.9992 63.9999C36.9634 63.9977 32.0235 61.8001 28.0543 60.0342C26.0596 59.1469 23.4516 58.0484 21.4729 58.012C20.6554 57.997 20 57.3299 20 56.5122V29.791C20 29.391 20.1602 29.0071 20.4447 28.7259C25.3965 23.8329 27.5257 18.6525 31.5844 14.587C33.4349 12.733 34.1079 9.9325 34.7585 7.22425C35.3144 4.91162 36.4771 0 39 0C42 0 48 1 48 10.1815Z"
                                fill="#2576C1" />
                        </svg>
                    </span>
                    <p>Best Software Support</p>
                </div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <span class="flex items-center justify-center">

                        <svg class="w-[30px] h-[25px] lg:w-[56px] lg:h-[45px] xl:w-[64px] xl:h-[50px]" viewBox="0 0 64 50"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M60.2467 0.11663C54.1578 0.462185 42.0556 1.71996 34.5844 6.2933C34.0689 6.60885 33.7767 7.16996 33.7767 7.75663V48.1866C33.7767 49.47 35.18 50.2811 36.3633 49.6855C44.05 45.8166 55.1667 44.7611 60.6633 44.4722C62.54 44.3733 63.9989 42.8689 63.9989 41.0655V3.52774C64 1.55996 62.2933 0.00107417 60.2467 0.11663ZM29.4144 6.2933C21.9444 1.71996 9.84222 0.463296 3.75333 0.11663C1.70667 0.00107417 0 1.55996 0 3.52774V41.0666C0 42.8711 1.45889 44.3755 3.33556 44.4733C8.83444 44.7622 19.9567 45.8189 27.6433 49.69C28.8233 50.2844 30.2222 49.4744 30.2222 48.1944V7.73663C30.2222 7.14885 29.9311 6.60996 29.4144 6.2933Z"
                                fill="#284D78" />
                        </svg>

                    </span>
                    <p>Free Training Session</p>
                </div>
                <div class="flip-card-back">
                    <span class="flex items-center justify-center">

                        <svg style="filter: invert(100) brightness(2);"
                            class="w-[30px] h-[25px] lg:w-[56px] lg:h-[45px] xl:w-[64px] xl:h-[50px]" viewBox="0 0 64 50"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M60.2467 0.11663C54.1578 0.462185 42.0556 1.71996 34.5844 6.2933C34.0689 6.60885 33.7767 7.16996 33.7767 7.75663V48.1866C33.7767 49.47 35.18 50.2811 36.3633 49.6855C44.05 45.8166 55.1667 44.7611 60.6633 44.4722C62.54 44.3733 63.9989 42.8689 63.9989 41.0655V3.52774C64 1.55996 62.2933 0.00107417 60.2467 0.11663ZM29.4144 6.2933C21.9444 1.71996 9.84222 0.463296 3.75333 0.11663C1.70667 0.00107417 0 1.55996 0 3.52774V41.0666C0 42.8711 1.45889 44.3755 3.33556 44.4733C8.83444 44.7622 19.9567 45.8189 27.6433 49.69C28.8233 50.2844 30.2222 49.4744 30.2222 48.1944V7.73663C30.2222 7.14885 29.9311 6.60996 29.4144 6.2933Z"
                                fill="#284D78" />
                        </svg>

                    </span>
                    <p>Free Training Session</p>
                </div>
            </div>
        </div>
    </div>


    <div class=" px-4 lg:px-0 lg:ps-20 lg:py-16 xl:py-10 lg:flex items-center gap-8 my-5">
        <div class="w-full lg:w-[60%] relative">
            <div>
                <h1 class="text-26 lg:text-30 xl:text-48  font-poppins font-bold leading-8 lg:leading-[48px] xl:leading-[62px]">
                    Transform your Gym Management Software</h1>
                <div class="my-3">
                    <p class="text-black font-medium">
                        Gym Master is a gym management software solution designed to help gym owners, fitness centers, health clubs, and studios efficiently manage their day-to-day operations. <br><br>
                        –  Manages member records, memberships, and renewals, making it easy to track member status and engagement. <br><br>
                        – Integrates with payment gateways for secure online payments and automated billing, reducing manual processing and minimizing missed payments.
                    
                    </p>
                </div>
                <div class="flex items-center gap-4 mt-6">
                    <a href="{{ route('demu_request') }}"
                        class="bg-cayan rounded-[24px] px-3 py-1 text-white flex items-center gap-2 cursor-pointer  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-15">
                        <span class="font-poppins text-12 lg:text-18  font-bold">Get Free Demo</span>
                        <span>
                            <svg class="w-[16px] h-[10px] lg:w-[20px] lg:h-[14px] xl:w-[24px] xl:h-[18px]"
                                viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 6.35869C24 7.46611 23.032 8.41303 21.9 8.41303H17.2195C17.9854 9.21216 18.0795 10.7458 16.9242 11.7385C17.594 12.8086 17.0249 14.2237 16.1531 14.6595C16.5738 16.963 15.1244 18 12.75 18C12.6213 18 12.1277 17.9905 12 17.9909C9.09511 17.9987 8.39559 16.5347 6.20011 16.1948C5.65294 16.1101 5.25 15.6375 5.25 15.0837V7.04348L5.25009 7.04344C5.25061 6.18253 5.7473 5.36114 6.58434 4.9882C7.93837 4.37911 11.0568 2.68955 11.625 1.36369C11.9905 0.510844 12.6274 0.000375196 13.5 1.96183e-07C15.1042 -0.000656054 16.2071 1.64522 15.5681 3.13631C15.4001 3.52814 15.1785 3.91772 14.9047 4.30434H21.9C22.9992 4.30434 24 5.2673 24 6.35869ZM4.5 6.375V15.375C4.5 15.9963 3.99633 16.5 3.375 16.5H1.125C0.503672 16.5 0 15.9963 0 15.375V6.375C0 5.75367 0.503672 5.25 1.125 5.25H3.375C3.99633 5.25 4.5 5.75367 4.5 6.375ZM3.1875 14.25C3.1875 13.7322 2.76778 13.3125 2.25 13.3125C1.73222 13.3125 1.3125 13.7322 1.3125 14.25C1.3125 14.7678 1.73222 15.1875 2.25 15.1875C2.76778 15.1875 3.1875 14.7678 3.1875 14.25Z"
                                    fill="white" />
                            </svg>

                        </span>
                    </a>
                    <a href='{{ asset('uploads/hr_pdf/' . $hr_pdf) }}' target="_blank"
                        class="border border-cayan rounded-[24px] px-3 py-1 flex items-center gap-2 cursor-pointer   duration-300 ease-in-out hover:text-15 ">
                        <span class="font-poppins  text-12 lg:text-18 font-bold text-cayan">Download PDF</span>
                        <span>
                            <svg class="lg:w-[12px] lg:h-[13px]  xl:w-[16px] xl:h-[17px]" viewBox="0 0 16 17"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.75 0.5H9.25C9.66562 0.5 10 0.834375 10 1.25V6.5H12.7406C13.2969 6.5 13.575 7.17188 13.1812 7.56563L8.42813 12.3219C8.19375 12.5562 7.80937 12.5562 7.575 12.3219L2.81562 7.56563C2.42188 7.17188 2.7 6.5 3.25625 6.5H6V1.25C6 0.834375 6.33437 0.5 6.75 0.5ZM16 12.25V15.75C16 16.1656 15.6656 16.5 15.25 16.5H0.75C0.334375 16.5 0 16.1656 0 15.75V12.25C0 11.8344 0.334375 11.5 0.75 11.5H5.33437L6.86562 13.0312C7.49375 13.6594 8.50625 13.6594 9.13437 13.0312L10.6656 11.5H15.25C15.6656 11.5 16 11.8344 16 12.25ZM12.125 15C12.125 14.6562 11.8438 14.375 11.5 14.375C11.1562 14.375 10.875 14.6562 10.875 15C10.875 15.3438 11.1562 15.625 11.5 15.625C11.8438 15.625 12.125 15.3438 12.125 15ZM14.125 15C14.125 14.6562 13.8438 14.375 13.5 14.375C13.1562 14.375 12.875 14.6562 12.875 15C12.875 15.3438 13.1562 15.625 13.5 15.625C13.8438 15.625 14.125 15.3438 14.125 15Z"
                                    fill="#006BA3" />
                            </svg>

                        </span>
                    </a>
                </div>
            </div>
            <img class="hidden lg:inline-block w-[30px] h-[30px] absolute left-[0%] bottom-[0%]"
                src="{{ asset('frontend/assets/images/dote6.png') }}" alt="dote one">
        </div>
        <div class="w-full lg:w-[40%] relative lg:pe-20  mt-5 lg:mt-0">
            <iframe class="w-full h-[250px]" src="https://www.youtube.com/embed/X3a0IFr5Erw?si=G4HeBFGd4j71NSYN"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
@endsection
