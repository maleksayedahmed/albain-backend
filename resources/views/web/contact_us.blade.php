<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albain</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('src/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('node_modules/intl-tel-input/build/css/intlTelInput.css') }}">
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-marquee {
            animation: marquee 40s linear infinite;
        }

        .marquee-group {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-around;
            min-width: 100%;
        }

        .albain-search-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            left: auto;
            z-index: 50;
            min-width: 100%;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body>
    <!-- HEADER SECTION -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3 flex-row-reverse">



                <!-- Left side elements -->
                <div class="hidden md:flex items-center gap-x-4 flex-row-reverse">
                    <a href="{{ route('web.contact_us') }}"
                        class="flex bg-gradient-to-r from-[#306A8E] to-[#0E1E28] text-white px-5 py-2.5 rounded-lg items-center gap-x-2 whitespace-nowrap hover:shadow-lg transition-all duration-300">
                        <img src="{{ asset('assets/images/whatsapp-icon.svg') }}" alt="WhatsApp" class="h-6 w-6">
                        <span>تواصل معنا الآن</span>
                    </a>
                    <div class="relative">
                        <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2 ">
                            <input type="text" placeholder="عن ماذا تبحث"
                                class="bg-transparent focus:outline-none text-right w-48 pr-2">
                            <img src="{{ asset('assets/images/search-icon.svg') }}" alt="Search" class="h-5 w-5">
                        </div>
                    </div>
                </div>

                <!-- <div class="flex items-center   bg-gray-100 rounded-lg  py-2 ">
                    <input type="text" placeholder="عن ماذا تبحث"
                        class="bg-transparent focus:outline-none text-right w-48 pr-2">
                    <img src="assets/images/search-icon.svg" alt="Search" class="h-5 w-5">
                </div> -->

                <!-- Right side elements -->
                <div class="flex items-center gap-x-12 flex-row-reverse">
                    <nav class="hidden md:flex items-center gap-x-8 flex-row-reverse">
                        <a href="{{ route('web.who_us') }}"
                            class="{{ request()->routeIs('web.who_us') ? 'text-blue-700 font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]' : 'text-gray-800 hover:text-[#096B90] font-medium transition-colors' }}">من
                            نحن</a>
                        <a href="{{ route('web.products') }}"
                            class="{{ request()->routeIs('web.products') ? 'text-blue-700 font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]' : 'text-[#306A8E] font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6] hover:text-[#096B90] font-medium transition-colors' }}">منتجاتنا</a>
                        <a href="{{ route('web.home') }}"
                            class="{{ request()->routeIs('web.home') ? 'text-blue-700 font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]' : 'text-gray-800 hover:text-[#096B90] font-medium transition-colors' }}">الرئيسية</a>
                    </nav>
                    <div class="flex-shrink-0">
                        <a href="#">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="Albain Logo" class="h-16">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>



    <!-- CONTACT FORM SECTION -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#121212]">
                    ابدأ رحلتك الشرائية الذكية مع
                    <span class="text-[#306A8E]">الباين للتوريدات!</span>
                </h2>

                <p class="text-[#121212] mt-4 max-w-2xl mx-auto leading-8">
                    في عالم تتسارع فيه احتياجات المشاريع والأعمال، توفر لك الباين كل ما تحتاجه من مواد ومعدات موثوقة
                    بجودة عالية وسرعة في التوريد. حلول ذكية، أسعار منافسة، وخدمة توريد تُواكب طموحك.
                </p>

            </div>

            <!-- Main Contact Card -->
            <div class="flex flex-wrap lg:flex-nowrap gap-6 max-w-7xl mx-auto">

                <!-- Contact Info Section (Right side in RTL) -->
                <div class="w-full lg:w-3/12 bg-[#1E2A38] text-white rounded-[15px] p-9 flex flex-col">
                    <div class="flex-1">
                        <h3 class="text-[17px] font-medium mb-12 text-right text-[#F1F2F2]">معلومات التواصل</h3>

                        <div class="space-y-12">
                            <!-- Phone -->
                            <div class="flex items-start gap-3">
                                <div class="p-[2px]">
                                    <img src="{{ asset('assets/images/call-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="Phone Icon" style="filter: brightness(0) invert(1);">
                                </div>
                                <div class="flex flex-col items-start flex-1">
                                    <p class="font-light text-[15px] text-[#F1F2F2] mb-1">رقم الجوال</p>
                                    <div class="flex items-center gap-2">
                                        <a href="tel:+966550335535"
                                            class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2">
                                            <img src="{{ asset('assets/images/copy-icon.svg') }}"
                                                class="h-[19px] w-[19px]" alt="Copy">
                                            +966 55 033 5535
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start gap-3">
                                <div class="p-[2px]">
                                    <img src="{{ asset('assets/images/mail-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="Email Icon" style="filter: brightness(0) invert(1);">
                                </div>
                                <div class="flex flex-col items-start flex-1">
                                    <p class="font-light text-[15px] text-[#F1F2F2] mb-1">البريد الالكتروني</p>
                                    <div class="flex items-center gap-2">
                                        <a href="mailto:Info@albainco.com"
                                            class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2">
                                            <img src="{{ asset('assets/images/copy-icon.svg') }}"
                                                class="h-[19px] w-[19px]" alt="Copy">
                                            Info@albainco.com
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="flex items-start gap-3">
                                <div class="p-[2px]">
                                    <img src="{{ asset('assets/images/location-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="Location Icon" style="filter: brightness(0) invert(1);">
                                </div>
                                <div class="flex flex-col items-start flex-1">
                                    <p class="font-light text-[15px] text-[#F1F2F2] mb-1">الموقع</p>
                                    <div class="flex items-center gap-2">
                                        <a href="#"
                                            class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2 leading-relaxed">
                                            <img src="{{ asset('assets/images/link-icon.svg') }}"
                                                class="h-[19px] w-[19px]" alt="Link">
                                            الرياض،<br>قرطبة، طريق الثمامة
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-12 pt-8 border-t border-gray-600">
                        <div class="flex flex-col items-start gap-4">
                            <h4 class="font-medium text-[17px] text-[#F1F2F2]">تابعنا على</h4>
                            <div class="flex flex-row-reverse gap-2">
                                <a href="#" class="text-[#F1F2F2] hover:text-white transition-colors">
                                    <img src="{{ asset('assets/images/twitter-icon.svg') }}"
                                        class="h-[23px] w-[23px]" alt="Twitter"
                                        style="filter: brightness(0) invert(1);">
                                </a>
                                <a href="#" class="text-[#F1F2F2] hover:text-white transition-colors">
                                    <img src="{{ asset('assets/images/linkedin-icon.svg') }}"
                                        class="h-[23px] w-[23px]" alt="LinkedIn"
                                        style="filter: brightness(0) invert(1);">
                                </a>
                                <a href="#" class="text-[#F1F2F2] hover:text-white transition-colors">
                                    <img src="{{ asset('assets/images/instagram-icon.svg') }}"
                                        class="h-[23px] w-[23px]" alt="Instagram"
                                        style="filter: brightness(0) invert(1);">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section (Left side in RTL) -->
                <div class="w-full lg:w-9/12 bg-[#F8F8F8] rounded-[23px] p-14">
                    <form class="space-y-8" method="POST" action="{{ route('web.inquiry.store') }}">
                        @csrf
                        <!-- First Row: Name and Phone -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label for="name"
                                    class="block text-[#1A1A1A] text-[16px] font-medium text-right">الاسم</label>
                                <input type="text" id="name" name="name" placeholder="ادخل الاسم"
                                    class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                            </div>
                            <div class="space-y-3">
                                <label for="phone"
                                    class="block text-[#1A1A1A] text-[16px] font-medium text-right">رقم
                                    الجوال</label>
                                <input type="tel" id="phone" name="phone" placeholder="ادخل رقم الجوال"
                                    class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                            </div>
                        </div>

                        <!-- Second Row: Email and Subject -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label for="email"
                                    class="block text-[#1A1A1A] text-[16px] font-medium text-right">البريد
                                    الالكتروني</label>
                                <input type="email" id="email" name="email"
                                    placeholder="ادخل البريد الالكتروني"
                                    class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                            </div>
                            <div class="space-y-3">
                                <label for="subject"
                                    class="block text-[#1A1A1A] text-[16px] font-medium text-right">الموضوع</label>
                                <input type="text" id="subject" name="subject" placeholder="ادخل الموضوع"
                                    class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div class="space-y-3">
                            <label for="message"
                                class="block text-[#1A1A1A] text-[16px] font-medium text-right">الرسالة</label>
                            <textarea id="message" name="message" placeholder="ادخل الرسالة" rows="5"
                                class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right resize-none shadow-sm"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center pt-4">
                            <button type="submit"
                                class="bg-[#306A8E] text-white text-[18px] font-medium rounded-[12px] px-16 py-4 flex items-center gap-3 hover:bg-[#2a5f7a] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                ارسال
                                <img src="{{ asset('assets/images/send-icon.svg') }}" alt="Send"
                                    class="w-5 h-5">
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- MAP SECTION -->
    <section class="flex justify-center items-center py-8 pb-16 bg-white w-full">
        <div class="w-full max-w-7xl rounded-[23px] overflow-hidden   bg-white">
            <div class="w-full h-[220px] md:h-[280px]">
                <iframe src="https://www.google.com/maps?q=24.819742,46.773478&hl=ar&z=15&output=embed" width="100%"
                    height="100%" style="border:0; min-height:220px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <footer class="bg-[#F9F9F9] py-10">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Main Footer Content -->
            <div class="container mx-auto px-4 max-w-7xl">
                <!-- Main Footer Content -->
                <div
                    class="flex flex-wrap flex-row-reverse lg:flex-nowrap justify-between items-start mb-8 items-center">

                    <!-- Left Section: Social Media -->
                    <div class="w-full lg:w-auto mb-8 lg:mb-0 text-center lg:text-right flex flex-col items-center ">
                        <p class="text-[#1E2A38] text-xl font-normal mb-4" style="font-family: 'Co Headline';">تتابعنا
                            علي
                        </p>
                        <div class="flex justify-center lg:justify-start gap-3.5 flex-row-reverse">
                            <a href="#" class="block">
                                <img src="{{ asset('assets/images/snapchat-logo.png') }}"
                                    class="h-[38px] w-[38px] rounded-md" alt="Snapchat">
                            </a>
                            <a href="#" class="block">
                                <img src="{{ asset('assets/images/tiktok-logo.png') }}"
                                    class="h-[38px] w-[38px] rounded-md" alt="TikTok">
                            </a>
                            <a href="#" class="block">
                                <img src="{{ asset('assets/images/youtube-logo.svg') }}"
                                    class="h-[38px] w-[38px] rounded-md bg-[#FFEC06] p-1" alt="YouTube">
                            </a>
                            <a href="#" class="block">
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
                        <img src="{{ asset('assets/images/logo.svg') }}" class="h-[86px] mx-auto lg:mx-0"
                            alt="Albain Logo">
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

    <!-- Bottom Navigation Bar for Mobile (Figma style) -->
    <nav class="fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50 bg-white rounded-[33px] shadow-lg border border-gray-200 md:hidden flex justify-between items-center px-6 py-2"
        style="width: 90%; max-width: 370px; height: 77px;">
        <!-- About/Who We Are -->
        <a href="{{ route('web.who_us') }}"
            class="flex flex-col items-center flex-1 py-2 text-[#0C0C0C] font-normal {{ request()->routeIs('web.who_us') ? 'bg-[#306A8E] text-white rounded-[14px]' : '' }}"
            style="font-family: 'MadaniArabic-Regular', sans-serif;">
            <img src="{{ asset('assets/images/who-us-icon.svg') }}" alt="About" class="h-7 w-7 mb-1">
            <span class="text-xs">من نحن</span>
        </a>
        <!-- Home (center, highlighted) -->
        <div class="flex-1 flex justify-center">
            <a href="{{ route('web.home') }}"
                class="flex flex-col items-center justify-center {{ request()->routeIs('web.home') ? 'bg-[#306A8E] text-white rounded-[14px]' : 'bg-white text-[#306A8E]' }} px-6 py-2 shadow font-bold"
                style="font-family: 'MadaniArabic-Medium', sans-serif;">
                <img src="{{ asset('assets/images/home-2-icon.svg') }}" alt="Home" class="h-7 w-7 mb-1">
                <span class="text-xs">الرئيسية</span>
            </a>
        </div>
        <!-- Products -->
        <a href="{{ route('web.products') }}"
            class="flex flex-col items-center flex-1 py-2 text-[#0C0C0C] font-normal {{ request()->routeIs('web.products') ? 'bg-[#306A8E] text-white rounded-[14px]' : '' }}"
            style="font-family: 'MadaniArabic-Regular', sans-serif;">
            <img src="{{ asset('assets/images/products-2-icon.svg') }}" alt="Products" class="h-7 w-7 mb-1">
            <span class="text-xs">منتجاتنا</span>
        </a>
    </nav>
    <!-- End Figma-style Mobile Navbar -->

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/966550335535" target="_blank" rel="noopener"
        class="fixed bottom-24 left-6 z-40 w-16 h-16 rounded-full bg-[#2AA25A] flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
        <img src="{{ asset('assets/images/whatsapp-call-icon.svg') }}" alt="WhatsApp" class="h-9 w-9">
    </a>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('node_modules/intl-tel-input/build/js/intlTelInput.min.js') }}"></script>
    <script>
        // Mobile Menu
        const openBtn = document.getElementById('menu-open-btn');
        const closeBtn = document.getElementById('menu-close-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOverlay = document.getElementById('menu-overlay');

        function openMenu() {
            mobileMenu.classList.remove('-right-full');
            mobileMenu.classList.add('right-0');
            menuOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeMenu() {
            mobileMenu.classList.remove('right-0');
            mobileMenu.classList.add('-right-full');
            menuOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        openBtn.addEventListener('click', openMenu);
        closeBtn.addEventListener('click', closeMenu);
        menuOverlay.addEventListener('click', closeMenu);

        // Hero Slider
        document.addEventListener('DOMContentLoaded', () => {
            const slidesContainer = document.getElementById('slide-container');
            const slides = document.querySelectorAll('.hero-slide');
            const nextBtn = document.getElementById('next-btn');
            const prevBtn = document.getElementById('prev-btn');
            const paginationDotsContainer = document.getElementById('pagination-dots');

            let currentIndex = 0;
            let autoplayInterval;

            if (slides.length > 0) {
                // Create pagination dots
                slides.forEach((_, index) => {
                    const dot = document.createElement('button');
                    dot.classList.add('w-3', 'h-3', 'rounded-full', 'border', 'border-white/50',
                        'transition-all', 'duration-300');
                    if (index === 0) {
                        dot.classList.add('bg-white', 'w-6', 'h-2.5');
                        dot.classList.remove('w-3', 'h-3');
                    }
                    dot.addEventListener('click', () => {
                        goToSlide(index);
                        resetAutoplay();
                    });
                    paginationDotsContainer.appendChild(dot);
                });

                const dots = paginationDotsContainer.querySelectorAll('button');

                function updateDots(index) {
                    dots.forEach((dot, dotIndex) => {
                        dot.classList.remove('bg-white', 'w-6', 'h-2.5');
                        dot.classList.add('w-3', 'h-3');
                        if (dotIndex === index) {
                            dot.classList.add('bg-white', 'w-6', 'h-2.5');
                            dot.classList.remove('w-3', 'h-3');
                        }
                    });
                }

                function goToSlide(index) {
                    slidesContainer.style.transform = `translateX(${index * 100}%)`; // Positive for RTL
                    currentIndex = index;
                    updateDots(index);
                }

                function nextSlide() {
                    const newIndex = (currentIndex + 1) % slides.length;
                    goToSlide(newIndex);
                }

                function prevSlide() {
                    const newIndex = (currentIndex - 1 + slides.length) % slides.length;
                    goToSlide(newIndex);
                }

                function startAutoplay() {
                    autoplayInterval = setInterval(nextSlide, 5000);
                }

                function resetAutoplay() {
                    clearInterval(autoplayInterval);
                    startAutoplay();
                }

                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetAutoplay();
                });

                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetAutoplay();
                });

                startAutoplay();
            }
        });

        // International Phone Input
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.querySelector("#phone");

            if (phoneInput) {
                const iti = window.intlTelInput(phoneInput, {
                    initialCountry: "sa", // Default to Saudi Arabia
                    preferredCountries: ["sa", "ae", "kw", "qa", "bh", "om"], // Gulf countries
                    separateDialCode: false,
                    formatOnDisplay: true,
                    nationalMode: true,
                    autoPlaceholder: "aggressive",
                    placeholderNumberType: "MOBILE",
                    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                        return "ادخل رقم الجوال";
                    },
                    utilsScript: "node_modules/intl-tel-input/build/js/utils.js",
                    // Style the dropdown to match RTL design
                    dropdownContainer: document.body
                });

                // Add custom styling for RTL support
                const dropdown = phoneInput.parentNode.querySelector('.iti__country-list');
                if (dropdown) {
                    dropdown.style.direction = 'rtl';
                    dropdown.style.textAlign = 'right';
                }

                // Form validation on submit
                const form = phoneInput.closest('form');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        // Validate phone number
                        if (iti.isValidNumber()) {
                            // Get the full international number
                            const fullNumber = iti.getNumber();
                            console.log("Valid phone number:", fullNumber);

                            // Here you can add your form submission logic
                            alert("تم إرسال النموذج بنجاح!");
                        } else {
                            alert("يرجى إدخال رقم هاتف صحيح");
                            phoneInput.focus();
                        }
                    });
                }

                // Add custom CSS to override default styles for RTL
                const style = document.createElement('style');
                style.textContent = `
                    .iti {
                        width: 100% !important;
                        direction: ltr;
                    }
                    .iti__selected-flag {
                        padding: 0 0 0 8px;
                    }
                    .iti__country-list {
                        direction: rtl;
                        text-align: right;
                    }
                    .iti__country-name {
                        margin-right: 6px;
                        margin-left: 0;
                    }
                    .iti__dial-code {
                        direction: ltr;
                    }
                    .iti__flag-container {
                        right: auto;
                        left: 8px;
                    }
                    #phone {
                        padding-left: 45px !important;
                        padding-right: 12px !important;
                        direction: ltr;
                        text-align: left;
                    }
                `;
                document.head.appendChild(style);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Product search in header
            const headerSearchInput = document.querySelector('input[placeholder="عن ماذا تبحث"]');
            if (!headerSearchInput) return;
            let dropdown;
            let debounceTimeout;
            let lastQuery = '';

            function closeDropdown() {
                if (dropdown) {
                    dropdown.remove();
                    dropdown = null;
                }
            }

            function renderDropdown(products) {
                closeDropdown();
                if (!products.length) return;
                dropdown = document.createElement('div');
                dropdown.className =
                    'albain-search-dropdown bg-white border border-gray-200 rounded-lg shadow-lg text-right';
                dropdown.style.maxHeight = '350px';
                dropdown.style.overflowY = 'auto';
                dropdown.innerHTML = products.map(product => `
                <a href="/product/${product.id}" class="block px-4 py-3 hover:bg-gray-100 flex items-center gap-3">
                    <img src="${product.get_first_media_url || '/assets/images/products-2-icon.svg'}" class="w-12 h-12 object-cover rounded-md border" alt="${product.name}">
                    <div class="flex-1">
                        <div class="font-bold text-[#1E2A38]">${product.name}</div>
                        <div class="text-sm text-gray-600 mt-1">${product.price} ريال</div>
                    </div>
                </a>
            `).join('');
                headerSearchInput.parentNode.appendChild(dropdown);
            }

            function fetchProducts(query) {
                fetch(`/products/ajax-search?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        renderDropdown(data.products.map(p => ({
                            ...p,
                            get_first_media_url: p.get_first_media_url ||
                                '/assets/images/products-2-icon.svg'
                        })));
                    })
                    .catch(() => {
                        closeDropdown();
                    });
            }

            headerSearchInput.addEventListener('input', function(e) {
                const query = e.target.value.trim();
                if (query === lastQuery) return;
                lastQuery = query;
                clearTimeout(debounceTimeout);
                if (query.length === 0) {
                    closeDropdown();
                    return;
                }
                debounceTimeout = setTimeout(() => {
                    fetchProducts(query);
                }, 350);
            });
            document.addEventListener('click', function(e) {
                if (dropdown && !headerSearchInput.contains(e.target) && !dropdown.contains(e.target)) {
                    closeDropdown();
                }
            });
        });
    </script>
</body>

</html>
