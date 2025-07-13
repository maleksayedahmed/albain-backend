    
    
    <footer class="bg-[#F9F9F9] py-10">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Main Footer Content -->
            <div class="container mx-auto px-4 max-w-7xl">
                <!-- Main Footer Content -->
                <div
                    class="flex flex-wrap flex-row-reverse lg:flex-nowrap justify-between items-start mb-8 items-center">

                    <!-- Left Section: Social Media -->
                    <div class="w-full lg:w-auto mb-8 lg:mb-0 text-center lg:text-right flex flex-col items-center ">
                        <p class="text-[#1E2A38] text-xl font-normal mb-4" style="font-family: 'Co Headline';">تابعنا
                            على
                        </p>
                        <div class="flex justify-center lg:justify-start gap-3.5 flex-row-reverse">
                            <a href="{{ $companyInformation->snapchat }}" class="block">
                                <img src="{{ asset('assets/images/youtube-logo.svg') }}"
                                    class="h-[38px] w-[38px] rounded-md" alt="Snapchat">
                            </a>
                            <a href="{{ $companyInformation->facebook }}" class="block">
                                <img src="{{ asset('assets/images/snapchat-logo.png') }}"
                                    class="h-[38px] w-[38px] rounded-md" alt="Facebook">
                            </a>
                            <a href="{{ $companyInformation->twitter }}" class="block">
                                <img src="{{ asset('assets/images/tiktok-logo.png') }}"
                                    class="h-[38px] w-[38px] rounded-md" alt="X (Twitter)">
                            </a>
                            <a href="{{ $companyInformation->instagram }}" class="block">
                                <img src="{{ asset('assets/images/instagram-logo.svg') }}"
                                    class="h-[38px] w-[38px] rounded-md bg-gradient-to-br from-[#FFDD55] via-[#FF543E] to-[#C837AB] p-1"
                                    alt="Instagram">
                            </a>
                        </div>
                    </div>

                    <!-- Center Section: Quick Links -->
                    <div class="w-full lg:w-auto mb-8 lg:mb-0 text-center ">
                        <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-20 ">


                            <a href="{{ route('web.contact_us') }}"
                                class="text-[#394149] text-lg font-normal hover:text-[#306A8E] transition-colors"
                                style="font-family: 'MadaniArabic-Regular';">تواصل معنا</a>
                            <a href="#"
                                class="text-[#394149] text-lg font-normal hover:text-[#306A8E] transition-colors"
                                style="font-family: 'MadaniArabic-Regular';">خصوصية الاستخدام</a>
                            <a href="#"
                                class="text-[#394149] text-lg font-normal hover:text-[#306A8E] transition-colors"
                                style="font-family: 'MadaniArabic-Regular';">الشروط والأحكام</a>
                        </div>
                    </div>

                    <!-- Right Section: Logo -->
                    <div class="w-full lg:w-auto text-center lg:text-left">
                        <img src="{{ $companyInformation->getFirstMediaUrl('logo') ?: asset('assets/images/logo.svg') }}"
                            class="h-[86px] mx-auto lg:mx-0" alt="Albain Logo">
                    </div>
                </div>


            </div>

            <!-- Copyright -->
            <div class="text-center pt-4">
                <p class="text-[#394149] text-sm font-medium opacity-64" style="font-family: 'Inter';">Copyright @2025
                    .
                    All rights are reserved</p>
            </div>
        </div>
    </footer>
