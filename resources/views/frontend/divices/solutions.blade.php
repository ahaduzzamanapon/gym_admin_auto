@extends('layouts.app_frontend')
@section('title')
    Gym Master | Devices
@endsection

@section('content')
    <div class="w-full lg:flex items-center px-4 lg:px-28 py-9 relative">
        <div class="w-full text-center">
            <h1 class="text-28 lg:text-40 text-center font-bold my-2 font-poppins text-black lg:leading-[40px]">Build Your Gym Management Software</h1>
            <h1 class="text-15 lg:text-22 text-center font-medium my-2 font-poppins text-black ">No large investment. Only month wise subscription</h1>
        </div>
    </div>
    <div class="w-full flex flex-wrap px-4 lg:px-28 my-5 lg:my-10">
        <div class="w-[32%] my-3 mx-1">
            <div class="w-full flex justify-center my-2">
                <img src="{{ asset('frontend/assets/images/Group 1000003300.png') }}" class="w-[200px]" alt="">
            </div>
            <div class="w-full my-4 text-center">
                <p class=" text-cayan text-16 lg:text-20 font-poppins font-bold leading-5">System Setting</p>
            </div>
            <div class="w-full flex justify-center my-3">
                <div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Company Profile Setting
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">WebSite Settings</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Tax List</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Units List</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center my-2">
                <a href="{{ url('/contact_us') }}"
                    class="bg-cayan text-white text-18 px-6 py-2 font-semibold rounded-full  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-13">Contact
                    Us</a>
            </div>
        </div>
        <div class="w-[32%] my-3 mx-1">
            <div class="w-full flex justify-center my-2">
                <img src="{{ asset('frontend/assets/images/Group 1000003299.png') }}" class="w-[200px]" alt="">
            </div>
            <div class="w-full my-4 text-center">
                <p class=" text-cayan text-16 lg:text-20 font-poppins font-bold leading-5">Suppliers Management</p>
            </div>
            <div class="w-full flex justify-center my-3">
                <div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">New Supplier</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Suppliers List</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Import Suppliers</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Brands List</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center my-2">
                <a href="{{ url('/contact_us') }}"
                    class="bg-cayan text-white text-18 px-6 py-2 font-semibold rounded-full  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-13">Contact
                    Us</a>
            </div>
        </div>
        <div class="w-[32%] my-3 mx-1">
            <div class="w-full flex justify-center my-2">
                <img src="{{ asset('frontend/assets/images/Group 1000003301.png') }}" class="w-[200px]" alt="">
            </div>
            <div class="w-full my-4 text-center">
                <p class=" text-cayan text-16 lg:text-20 font-poppins font-bold leading-5">Store/Inventory Management</p>
            </div>
            <div class="w-full flex justify-center my-3">
                <div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Company Profile Setting
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">WebSite Settings</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Tax List</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Units List</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center my-2">
                <a href="{{ url('/contact_us') }}"
                    class="bg-cayan text-white text-18 px-6 py-2 font-semibold rounded-full  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-13">Contact
                    Us</a>
            </div>
        </div>
        <div class="w-[32%] my-3 mx-1">
            <div class="w-full flex justify-center my-2">
                <img src="{{ asset('frontend/assets/images/Group 1000003293.png') }}" class="w-[200px]" alt="">
            </div>
            <div class="w-full my-4 text-center">
                <p class=" text-cayan text-16 lg:text-20 font-poppins font-bold leading-5">Expense Management</p>
            </div>
            <div class="w-full flex justify-center my-3">
                <div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Company Profile Setting
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">WebSite Settings</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Tax List</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Units List</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center my-2">
                <a href="{{ url('/contact_us') }}"
                    class="bg-cayan text-white text-18 px-6 py-2 font-semibold rounded-full  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-13">Contact
                    Us</a>
            </div>
        </div>
        <div class="w-[32%] my-3 mx-1">
            <div class="w-full flex justify-center my-2">
                <img src="{{ asset('frontend/assets/images/Group 1000003302.png') }}" class="w-[200px]" alt="">
            </div>
            <div class="w-full my-4 text-center">
                <p class=" text-cayan text-16 lg:text-20 font-poppins font-bold leading-5">Report Management</p>
            </div>
            <div class="w-full flex justify-center my-3">
                <div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Company Profile Setting
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">WebSite Settings</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Tax List</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Add/Edit Units List</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center my-2">
                <a href="{{ url('/contact_us') }}"
                    class="bg-cayan text-white text-18 px-6 py-2 font-semibold rounded-full  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-13">Contact
                    Us</a>
            </div>
        </div>
        <div class="w-[32%] my-3 mx-1">
            <div class="w-full flex justify-center my-2">
                <img src="{{ asset('frontend/assets/images/Group 1000003303.png') }}" class="w-[200px]" alt="">
            </div>
            <div class="w-full my-4 text-center">
                <p class=" text-cayan text-16 lg:text-20 font-poppins font-bold leading-5">Sales Management</p>
            </div>
            <div class="w-full flex justify-center my-3">
                <div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">POS (create new
                            invoice)</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Create New Sales</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">View Sales List</p>
                    </div>
                    <div class="flex items-center space-x-3 my-2">
                        <img src="{{ asset('frontend/assets/images/FaRegHandPointRight.svg') }}" alt="">
                        <p class="text-15 lg:text-16 font-poppins font-normal leading-5 text-black">Sales Returns List</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center my-2">
                <a href="{{ url('/contact_us') }}"
                    class="bg-cayan text-white text-18 px-6 py-2 font-semibold rounded-full  hover:bg-[#41b5f3] duration-300 ease-in-out hover:text-13">Contact
                    Us</a>
            </div>
        </div>
    </div>

    <div class=" px-4 lg:px-0 lg:ps-20 lg:py-16 xl:py-10 lg:flex items-center  gap-8">
        <div class="w-full lg:w-[60%] relative">
            <div>
                <h1 class="text-28 lg:text-40  font-poppins font-bold ">Manage Your Gym Institution with <span class="text-cayan">Gym Master</span> Comprehensive Online Management</h1>
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
                    <a href='' target="_blank"
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
            <img src="{{ asset('frontend/assets/images/smart_education.png') }}" alt="">
        </div>
    </div>
@endsection
