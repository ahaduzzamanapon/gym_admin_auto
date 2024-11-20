<footer class="ps-4 pe-4 lg:ps-12 lg:pe-8 py-5 mt-6" style="background-image: url({{ asset('frontend/assets/images/footer.jpg') }});
background-repeat: no-repeat; width:100%; background-position: center; background-size:cover;">
    <div class="inline-block lg:flex gap-8 justify-between">
        <div class="w-full lg:w-[30%] xl:w-[25%] text-center lg:text-start">
            <div class="w-full flex items-center justify-center lg:justify-start">
                <a href="{{ url('/') }}">
                    <img class="w-[80px] h-[27px] lg:w-[150px] lg:h-[80px]" src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
                </a>
                
            </div>
            <div class="ps-1">
                <p class="text-12 lg:text-14 xl:text-16 font-poppins leading-[20px] my-1 lg:my-3">Gym Master Management System</p>
                <p class="text-10 lg:text-13 xl:text-15 font-poppins leading-[15px] lg:leading-[19px]">gym master stands as the foremost provider of gym master software solutions in Bangladesh, delivering unparalleled excellence in gym master software and solutions tailored to meet the diverse needs of businesses, regardless of their size.</p>

                <div class="flex items-center justify-center lg:justify-start gap-6 lg:gap-3 mt-3">
                    <a href="{{whatsapp_Link() }}" target="_blank">
                        <svg class="lg:w-[16px] lg:h-[16px] xl:w-[18px] xl:h-[18px]" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.516 3.41367C13.043 1.93711 11.0813 1.125 8.99648 1.125C4.69336 1.125 1.1918 4.62656 1.1918 8.92969C1.1918 10.3043 1.55039 11.6473 2.23242 12.832L1.125 16.875L5.26289 15.7887C6.40195 16.4109 7.68516 16.7379 8.99297 16.7379H8.99648C13.2961 16.7379 16.875 13.2363 16.875 8.9332C16.875 6.84844 15.9891 4.89023 14.516 3.41367ZM8.99648 15.423C7.8293 15.423 6.68672 15.1102 5.6918 14.5195L5.45625 14.3789L3.00234 15.0223L3.65625 12.6281L3.50156 12.382C2.85117 11.3484 2.51016 10.1566 2.51016 8.92969C2.51016 5.3543 5.42109 2.44336 9 2.44336C10.7332 2.44336 12.3609 3.11836 13.5844 4.34531C14.8078 5.57227 15.5602 7.2 15.5566 8.9332C15.5566 12.5121 12.5719 15.423 8.99648 15.423ZM12.5543 10.5645C12.3609 10.466 11.4012 9.99492 11.2219 9.93164C11.0426 9.86484 10.9125 9.8332 10.7824 10.0301C10.6523 10.227 10.2797 10.6629 10.1637 10.7965C10.0512 10.9266 9.93516 10.9441 9.7418 10.8457C8.5957 10.2727 7.84336 9.82266 7.0875 8.52539C6.88711 8.18086 7.28789 8.20547 7.66055 7.46016C7.72383 7.33008 7.69219 7.21758 7.64297 7.11914C7.59375 7.0207 7.20352 6.06094 7.0418 5.6707C6.88359 5.29102 6.72188 5.34375 6.60234 5.33672C6.48984 5.32969 6.35977 5.32969 6.22969 5.32969C6.09961 5.32969 5.88867 5.37891 5.70937 5.57227C5.53008 5.76914 5.02734 6.24023 5.02734 7.2C5.02734 8.15977 5.72695 9.08789 5.82188 9.21797C5.92031 9.34805 7.19648 11.3168 9.15469 12.1641C10.3922 12.6984 10.8773 12.7441 11.4961 12.6527C11.8723 12.5965 12.6492 12.1816 12.8109 11.7246C12.9727 11.2676 12.9727 10.8773 12.9234 10.7965C12.8777 10.7086 12.7477 10.6594 12.5543 10.5645Z" fill="#36be4f"/>
                        </svg>

                    </a>
                            
                    
                    <a href="{{ youtube_Link() }}" target="_blank">
                        <svg class="w-[18px] h-[18px]" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.1766 4.87759C16.9803 4.13853 16.402 3.55647 15.6677 3.35894C14.3368 3 8.9999 3 8.9999 3C8.9999 3 3.66302 3 2.33205 3.35894C1.59777 3.5565 1.01946 4.13853 0.823178 4.87759C0.466553 6.21719 0.466553 9.01213 0.466553 9.01213C0.466553 9.01213 0.466553 11.8071 0.823178 13.1467C1.01946 13.8857 1.59777 14.4435 2.33205 14.6411C3.66302 15 8.9999 15 8.9999 15C8.9999 15 14.3368 15 15.6677 14.6411C16.402 14.4435 16.9803 13.8857 17.1766 13.1467C17.5332 11.8071 17.5332 9.01213 17.5332 9.01213C17.5332 9.01213 17.5332 6.21719 17.1766 4.87759ZM7.25443 11.5497V6.47453L11.715 9.01219L7.25443 11.5497Z" fill="#36be4f"/>
                        </svg>

                    </a>
                    
                            
                  
                    <a href="{{ telegram_Link() }}" target="_blank">
                        <svg class="w-[18px] h-[18px]" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.28125C4.18359 0.28125 0.28125 4.18359 0.28125 9C0.28125 13.8164 4.18359 17.7188 9 17.7188C13.8164 17.7188 17.7188 13.8164 17.7188 9C17.7188 4.18359 13.8164 0.28125 9 0.28125ZM13.282 6.2543L11.8512 12.9973C11.7457 13.4754 11.4609 13.5914 11.0637 13.3664L8.88398 11.7598L7.83281 12.7723C7.7168 12.8883 7.61836 12.9867 7.39336 12.9867L7.54805 10.7684L11.5875 7.11914C11.7633 6.96445 11.5488 6.87656 11.3168 7.03125L6.32461 10.1742L4.17305 9.50273C3.70547 9.35508 3.69492 9.03516 4.27148 8.81016L12.6773 5.56875C13.0676 5.42812 13.4086 5.66367 13.282 6.2543Z" fill="#36be4f"/>
                        </svg>

                    </a>

                   
                            
                    
                    <a href="{{ facebook_Link() }}" target="_blank">
                        <svg class="w-[18px] h-[18px]" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 9.02256C18 4.04211 13.968 0 9 0C4.032 0 0 4.04211 0 9.02256C0 13.3895 3.096 17.0256 7.2 17.8647V11.7293H5.4V9.02256H7.2V6.76692C7.2 5.02556 8.613 3.60902 10.35 3.60902H12.6V6.31579H10.8C10.305 6.31579 9.9 6.7218 9.9 7.21804V9.02256H12.6V11.7293H9.9V18C14.445 17.5489 18 13.7053 18 9.02256Z" fill="#36be4f"/>
                        </svg>

                    </a>
                    
                            
                    <a href="{{ twitter_Link() }}" target="_blank">
                        <svg class="w-[18px] h-[15px]" viewBox="0 0 155 154" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M131.2 153.61H23.89C11.18 153.61 0.869995 143.3 0.869995 130.59V23.28C0.869995 10.57 11.18 0.26001 23.89 0.26001H131.2C143.91 0.26001 154.22 10.57 154.22 23.28V130.6C154.22 143.31 143.91 153.61 131.2 153.61Z" fill="#36be4f"/>
                            <path d="M103.25 117.96H112.6L52.27 35.37H42.24L103.25 117.96ZM109.17 25.46H126.04L89.19 69.07L132.54 128.41H98.6L72.01 92.42L41.59 128.41H24.71L64.13 81.76L22.54 25.46H57.35L81.38 58.36L109.17 25.46Z" fill="white"/>
                        </svg>
                    </a>

                    
                            
                    
                </div>
            </div>
        </div>
       
            <div class="w-full lg:w-[32%] lg:flex   justify-center  gap-36 lg:gap-8 mt-5 lg:mt-0">
                {{-- <div class="w-full lg:w-[50%] xl:w-[53%]">
                    <h1 class="text-20 leading-[26px] font-poppins font-bold text-cayan mb-3 text-center lg:text-left">Features</h1>
                    <ul class="lg:space-y-1 flex lg:inline-block flex-wrap justify-center lg:justify-start items-center gap-4">
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Time and Attendance</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Employee Management</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Task Management</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Shift Management</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Payroll </a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Tracking</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Security</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins">Digital Notice Board</a>
                        </li>
                    </ul>
                </div> --}}
                <div class="w-full lg:w-[47%]">
                    <h1 class="text-20 leading-[26px] font-poppins font-bold text-cayan mb-3 text-center lg:text-left">Explore</h1>
                    <ul class="lg:space-y-1 flex lg:inline-block flex-wrap justify-center lg:justify-start items-center gap-4">
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins hover:text-blue-700 hover:underline duration-150 ease-in-out">Gym Care</a>
                        </li>
                        <li>
                            <a href="" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins hover:text-blue-700 hover:underline duration-150 ease-in-out">Corporate </a>
                        </li>
                        <li>
                            <a href="{{ url('/blogs') }}" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins hover:text-blue-700 hover:underline duration-150 ease-in-out">Blog</a>
                        </li>
                        <li>
                            <a href="{{ url('/privacy') }}" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins hover:text-blue-700 hover:underline duration-150 ease-in-out">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ url('/terms_conditions') }}" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins hover:text-blue-700 hover:underline duration-150 ease-in-out">Terms & Conditions </a>
                        </li>
                        <li>
                            <a href="{{ url('/about_us') }}" class="cursor-pointer text-12 lg:text-14 xl:text-16 font-poppins hover:text-blue-700 hover:underline duration-150 ease-in-out">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        
        <div class="w-full lg:w-[39%] xl:w-[42%] mt-5 lg:mt-0">
            <div class="space-y-3">
                <h1 class="text-20 leading-[26px] font-poppins font-bold text-cayan text-center lg:text-start">Contact Us</h1>
                <div class="flex  gap-3">
                    <span class="mt-1">
                        <svg class="w-[14px] h-[17px]" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6005 11.5921L10.538 10.0921C10.4072 10.0284 10.2618 10.015 10.1237 10.0538C9.98562 10.0927 9.86233 10.1818 9.77238 10.3077L8.41613 12.2015C6.28763 11.0545 4.57467 9.09687 3.57109 6.66429L5.22813 5.11429C5.33851 5.01169 5.41663 4.87078 5.45068 4.7129C5.48472 4.55501 5.47283 4.38875 5.4168 4.23929L4.1043 0.739287C4.0428 0.578165 3.93405 0.446614 3.79678 0.367318C3.65951 0.288022 3.50233 0.265951 3.35234 0.304912L0.508594 1.05491C0.363992 1.09307 0.234977 1.18612 0.142607 1.31888C0.0502374 1.45163 -3.33104e-05 1.61624 1.65599e-08 1.78585C1.65599e-08 9.80147 5.68477 16.2858 12.6875 16.2858C12.836 16.286 12.9801 16.2285 13.0963 16.123C13.2125 16.0174 13.2939 15.8699 13.3273 15.7046L13.9836 12.4546C14.0175 12.2824 13.9977 12.102 13.9278 11.9446C13.8579 11.7872 13.7422 11.6625 13.6005 11.5921Z" fill="#36be4f"/>
                        </svg>
                            
                    </span>
                    <p class="font-poppins text-12 lg:text-14 xl:text-16 leading-[18px]">+88 01918776608, +88 01958633202 (Sale), 
                        +88 01958633200 (Support)</p>
                </div>
               <div class="flex items-center gap-3 lg:gap-6">
                <div class="flex items-center gap-3 ">
                    <span >
                        <svg class="w-[17px] h-[20px]" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.17285 4.97095V14.4655L5.32671 9.71822L1.17285 4.97095Z" fill="#36be4f"/>
                            <path d="M1.99805 4.01978L7.25691 10.0299C7.92108 10.789 9.07943 10.789 9.7436 10.0299L15.0025 4.01978H1.99805Z" fill="#36be4f"/>
                            <path d="M10.5723 10.9771C10.0195 11.6095 9.28323 11.9585 8.50006 11.9585C7.71688 11.9585 6.98061 11.6095 6.42781 10.9771L6.15523 10.6655L2.00488 15.4088H14.9952L10.8449 10.6655L10.5723 10.9771Z" fill="#36be4f"/>
                            <path d="M11.6737 9.71822L15.8276 14.4655V4.97095L11.6737 9.71822Z" fill="#36be4f"/>
                            </svg>
                            
                            
                    </span>
                    <p class="font-poppins text-12 lg:text-14 xl:text-16 leading-[18px]">info@mysoftheaven.com</p>
                </div>
                <div class="flex items-center gap-3 ">
                    <span >
                        <svg class="w-[16px] h-[16px]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7656 5C10.3125 2.20937 9.24375 0.25 8 0.25C6.75625 0.25 5.6875 2.20937 5.23438 5H10.7656ZM5 8C5 8.69375 5.0375 9.35938 5.10313 10H10.8938C10.9594 9.35938 10.9969 8.69375 10.9969 8C10.9969 7.30625 10.9594 6.64062 10.8938 6H5.10313C5.0375 6.64062 5 7.30625 5 8ZM15.1469 5C14.2531 2.87812 12.4438 1.2375 10.2094 0.575C10.9719 1.63125 11.4969 3.22187 11.7719 5H15.1469ZM5.7875 0.575C3.55625 1.2375 1.74375 2.87812 0.853125 5H4.22813C4.5 3.22187 5.025 1.63125 5.7875 0.575ZM15.4812 6H11.8969C11.9625 6.65625 12 7.32812 12 8C12 8.67188 11.9625 9.34375 11.8969 10H15.4781C15.65 9.35938 15.7469 8.69375 15.7469 8C15.7469 7.30625 15.65 6.64062 15.4812 6ZM4 8C4 7.32812 4.0375 6.65625 4.10313 6H0.51875C0.35 6.64062 0.25 7.30625 0.25 8C0.25 8.69375 0.35 9.35938 0.51875 10H4.1C4.0375 9.34375 4 8.67188 4 8ZM5.23438 11C5.6875 13.7906 6.75625 15.75 8 15.75C9.24375 15.75 10.3125 13.7906 10.7656 11H5.23438ZM10.2125 15.425C12.4437 14.7625 14.2562 13.1219 15.15 11H11.775C11.5 12.7781 10.975 14.3688 10.2125 15.425ZM0.853125 11C1.74688 13.1219 3.55625 14.7625 5.79063 15.425C5.02813 14.3688 4.50313 12.7781 4.22813 11H0.853125Z" fill="#36be4f"/>
                        </svg>
                            
                            
                            
                    </span>
                    <a href="https://mysoftheaven.com/" target="_blank" class="font-poppins text-12 lg:text-14 xl:text-16 leading-[18px] cursor-pointer">mysoftheaven.com</a>
                </div>
               </div>
                <div class="flex  gap-3 ">
                    <span class="mt-1">
                        <svg class="w-[14px] h-[17px]" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0183 0.681489L0.777098 6.67836C-0.519844 7.37805 -0.0875301 9.5768 1.29593 9.5768H6.05192V15.074C6.05192 16.6731 7.95421 17.1731 8.55956 15.6737L13.7479 2.68055C14.1802 1.48086 13.056 0.181489 12.0183 0.681489Z" fill="#36be4f"/>
                        </svg> 
                    </span>
                    <p class="font-poppins text-12 lg:text-14 xl:text-16 leading-[18px]">Head Office: Shapla House 363/H/2, North Pirerbag, Raisa &
                        Shikdhar Tower, Level-5, 3/8, Kamal Soroni Rd, Dhaka-1216.</p>
                </div>
                <p class="font-poppins text-12 lg:text-14 xl:text-16 leading-[18px] ps-6">Corporate Office: 8813 NW 23 Street. Miami, FL 33172, USA.</p>
                <div class="flex items-center ps-6 gap-2">
                    <a href="https://mysoftheaven.com/" target="_blank">
                        <img class="w-[154px] h-[43px]" src="{{ asset('frontend/assets/images/mysoft.png') }}" alt="">
                    </a>
                    <a href="https://basis.org.bd/" target="_blank">
                        <img class="w-[134px] h-[30px]" src="{{ asset('frontend/assets/images/basis.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <span>
        <hr class="mt-3 ms-4  border-[#C5C5C5]">
    </span>
    <div class="flex items-center justify-center gap-2 py-4">
        <span>
            <svg class="w-[16px] h-[16px]" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0.25C3.71978 0.25 0.25 3.71978 0.25 8C0.25 12.2802 3.71978 15.75 8 15.75C12.2802 15.75 15.75 12.2802 15.75 8C15.75 3.71978 12.2802 0.25 8 0.25ZM8 14.25C4.54588 14.25 1.75 11.4547 1.75 8C1.75 4.54591 4.54534 1.75 8 1.75C11.4541 1.75 14.25 4.54534 14.25 8C14.25 11.4541 11.4547 14.25 8 14.25ZM11.3547 11.0918C11.0543 11.3953 9.93191 12.3854 8.10269 12.3854C5.52675 12.3854 3.71256 10.4658 3.71256 7.96141C3.71256 5.48791 5.59616 3.60512 8.08012 3.60512C9.81547 3.60512 10.8532 4.437 11.1299 4.69197C11.1949 4.75177 11.2367 4.83266 11.2478 4.92031C11.2588 5.00795 11.2385 5.09669 11.1904 5.17078L10.6231 6.04931C10.503 6.23525 10.2491 6.27687 10.0762 6.14059C9.80762 5.92884 9.08203 5.43628 8.14784 5.43628C6.63837 5.43628 5.71297 6.54034 5.71297 7.93884C5.71297 9.2385 6.55322 10.5542 8.15913 10.5542C9.17966 10.5542 9.93547 9.95925 10.2131 9.70344C10.3777 9.55166 10.6379 9.57722 10.7699 9.75775L11.3907 10.6068C11.4436 10.6786 11.4691 10.767 11.4625 10.8559C11.4559 10.9449 11.4177 11.0285 11.3547 11.0918Z" fill="#1F1F1F"/>
            </svg>
        </span>
        <p class="font-poppins text-10 lg:text-12 xl:text-14 leading-4">gym master <?php echo date("Y"); ?>
            • All rights reserved.</p>
    </div>
  </footer>