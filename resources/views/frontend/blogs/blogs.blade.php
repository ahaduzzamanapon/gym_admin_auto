@extends('layouts.app_frontend')
@section('title')
    Gym Master | Blogs
@endsection

@section('content')
    <div class="w-full px-4 lg:px-28 py-9">
        <div class="my-3">
            <h1 class="text-18 lg:text-28 font-bold my-2 font-poppins text-black">Recent blog posts</h1>
        </div>
        <div class="w-full lg:flex">
            <div class="lg:w-[49%] lg:mx-3 ">
                <div class="w-full my-5">
                    <img src="{{ asset('frontend/assets/images/blogs/blog_head.png') }}" alt="">
                </div>
                <div class="w-full my-2">
                    <p class="text-14 font-poppins text-cayan font-semibold"> 1 November 2024</p>
                    <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20 text-black">Adaptive Learning
                        Platforms</h1>
                    <p class="text-14 text-gray-500 my-2">
                        comprehensive software solution designed to streamline the administrative, academic, and
                        communication processes in educational institutions. It provides tools and platforms to manage
                        various aspects of an educational institution, including student information, faculty management,
                        course administration, admissions, finance, and communication between students, teachers, and
                        parents. This type of software is essential for ensuring efficiency, accuracy, and accessibility in
                        managing school, college, or university operations.
                    </p>
                </div>
            </div>
            <div class="lg:w-[49%] lg:mx-3">
                <div class="w-full my-5">
                    <div class="lg:flex card-side">
                        <div class="lg:w-[65%]">
                            <img src="{{ asset('frontend/assets/images/blogs/blog_side_1.png') }}"
                                alt="Movie" />
                        </div>
                        <div class="lg:ml-5 lg:w-[30%]">
                            <p class="text-14 font-poppins text-cayan font-semibold mb-2"> 1 November 2024</p>
                            <h2 class="card-title text-black text-16 font-bold my-2">Student Enrollment & Admissions</h2>
                            <p class="text-14 text-gray-500 my-2">
                                Provides real-time updates of student performance, progress reports, and attendance to teachers and parents
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full my-5">
                    <div class="lg:flex card-side">
                        <div class=" lg:w-[65%]">
                            <img src="{{ asset('frontend/assets/images/blogs/blog_side_2.png') }}"
                                alt="Movie" />
                        </div>
                        <div class="lg:ml-5 lg:w-[30%]">
                            <p class="text-14 font-poppins text-cayan font-semibold mb-2"> 1 November 2024</p>
                            <h2 class="card-title text-black text-16 font-bold my-2">Automated Attendance Tracking  </h2>
                            <p class="text-14 text-gray-500 my-2">
                                Enables teachers to record and monitor student attendance through the system. Students can also self-check-in via digital devices.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-4 lg:px-28 py-9 relative">
        <div class="my-3">
            <h1 class="text-18 lg:text-28 font-bold my-2 font-poppins text-black">All blog posts</h1>
        </div>
        <div class="my-5">
            <div class="w-full flex flex-wrap justify-center">
                <div class="lg:w-[28%] xl:w-[31%] m-3 bg-white w-full shadow-xl rounded-lg">
                    <div class="flex flex-col">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/blogs/blog.png') }}" alt="Shoes" />
                        </figure>
                        <div class="p-5 card-body">
                            <h2 class="card-title text-cayan text-14"> 1 November 2024</h2>
                            <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20"> Utilities management
                            </h1>
                            <p class="text-14 text-gray-500 my-2">Utilities are supportive tools within a software system
                                that improve user ,communication, and personalization. They provide essential</p>
                            <div class="card-actions justify-start">
                                <button class="px-4 py-1 rounded-lg bg-cayan text-white font-poppins text-13">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[28%] xl:w-[31%] m-3 bg-white w-full shadow-xl rounded-lg">
                    <div class="flex flex-col">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/blogs/blog-1.png') }}" alt="Shoes" />
                        </figure>
                        <div class="p-5 card-body">
                            <h2 class="card-title text-cayan text-14"> 1 November 2024</h2>
                            <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20"> Smart Educare System
                                settings</h1>
                            <p class="text-14 text-gray-500 my-2">
                                Settings refer to configuration options that allow users to customize and manage system
                                functionalities, preferences, and features
                            </p>
                            <div class="card-actions justify-start">
                                <button class="px-4 py-1 rounded-lg bg-cayan text-white font-poppins text-13">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[28%] xl:w-[31%] m-3 bg-white w-full shadow-xl rounded-lg">
                    <div class="flex flex-col">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/blogs/blog-2.png') }}" alt="Shoes" />
                        </figure>
                        <div class="p-5 card-body">
                            <h2 class="card-title text-cayan text-14"> 1 November 2024</h2>
                            <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20"> What is Accounts
                                Management?</h1>
                            <p class="text-14 text-gray-500 my-2">Accounts refer to the component within the software that
                                manages financial records and transactions. It encompasses</p>
                            <div class="card-actions justify-start">
                                <button class="px-4 py-1 rounded-lg bg-cayan text-white font-poppins text-13">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[28%] xl:w-[31%] m-3 bg-white w-full shadow-xl rounded-lg">
                    <div class="flex flex-col">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/blogs/blog.png') }}" alt="Shoes" />
                        </figure>
                        <div class="p-5 card-body">
                            <h2 class="card-title text-cayan text-14"> 1 November 2024</h2>
                            <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20"> Utilities management
                            </h1>
                            <p class="text-14 text-gray-500 my-2">Utilities are supportive tools within a software system
                                that improve user ,communication, and personalization. They provide essential</p>
                            <div class="card-actions justify-start">
                                <button class="px-4 py-1 rounded-lg bg-cayan text-white font-poppins text-13">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[28%] xl:w-[31%] m-3 bg-white w-full shadow-xl rounded-lg">
                    <div class="flex flex-col">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/blogs/blog-1.png') }}" alt="Shoes" />
                        </figure>
                        <div class="p-5 card-body">
                            <h2 class="card-title text-cayan text-14"> 1 November 2024</h2>
                            <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20"> Smart Educare System
                                settings</h1>
                            <p class="text-14 text-gray-500 my-2">
                                Settings refer to configuration options that allow users to customize and manage system
                                functionalities, preferences, and features
                            </p>
                            <div class="card-actions justify-start">
                                <button class="px-4 py-1 rounded-lg bg-cayan text-white font-poppins text-13">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[28%] xl:w-[31%] m-3 bg-white w-full shadow-xl rounded-lg">
                    <div class="flex flex-col">
                        <figure>
                            <img src="{{ asset('frontend/assets/images/blogs/blog-2.png') }}" alt="Shoes" />
                        </figure>
                        <div class="p-5 card-body">
                            <h2 class="card-title text-cayan text-14"> 1 November 2024</h2>
                            <h1 class=" my-2 font-poppins font-bold text-block text-16 lg:text-20"> What is Accounts
                                Management?</h1>
                            <p class="text-14 text-gray-500 my-2">Accounts refer to the component within the software that
                                manages financial records and transactions. It encompasses</p>
                            <div class="card-actions justify-start">
                                <button class="px-4 py-1 rounded-lg bg-cayan text-white font-poppins text-13">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
