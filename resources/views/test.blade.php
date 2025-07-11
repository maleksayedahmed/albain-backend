<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albain</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="assets/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/intl-tel-input/build/css/intlTelInput.css">
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
    </style>
</head>

<body class="bg-white">

    <!-- HEADER SECTION -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3 flex-row-reverse">



                <!-- Left side elements -->
                <div class="hidden md:flex items-center gap-x-4 flex-row-reverse">
                    <a href="#"
                        class="flex bg-gradient-to-r from-[#306A8E] to-[#0E1E28] text-white px-5 py-2.5 rounded-lg items-center gap-x-2 whitespace-nowrap hover:shadow-lg transition-all duration-300">
                        <img src="assets/images/whatsapp-icon.svg" alt="WhatsApp" class="h-6 w-6">
                        <span>تواصل معنا الآن</span>
                    </a>
                    <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2 ">
                        <input type="text" placeholder="عن ماذا تبحث"
                            class="bg-transparent focus:outline-none text-right w-48 pr-2">
                        <img src="assets/images/search-icon.svg" alt="Search" class="h-5 w-5">
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
                        <a href="#" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">من نحن</a>
                        <a href="#" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">منتجاتنا</a>
                        <a href="#"
                            class="text-blue-700 font-bold relative pb-2 after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]">الرئيسية</a>
                    </nav>
                    <div class="flex-shrink-0">
                        <a href="#">
                            <img src="assets/images/logo.svg" alt="Albain Logo" class="h-16">
                        </a>
                    </div>
                </div>

                <!-- Mobile: Logo and Menu Button -->
                <div class="md:hidden flex justify-between w-full items-center">
                    <button id="menu-open-btn" class="text-gray-800 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                    <div class="flex-shrink-0">
                        <a href="#">
                            <img src="assets/images/logo.svg" alt="Albain Logo" class="h-16">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- MOBILE MENU (SLIDE-IN) & OVERLAY -->
    <div id="menu-overlay" class="hidden fixed inset-0 bg-black bg-opacity-60 z-50"></div>
    <div id="mobile-menu"
        class="fixed top-0 -right-full md:hidden h-full w-4/5 max-w-sm bg-white shadow-xl z-50 p-6 transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center mb-8">
            <a href="#">
                <img src="assets/images/logo.svg" alt="Albain Logo" class="h-14">
            </a>
            <button id="menu-close-btn" class="text-gray-600 hover:text-gray-900">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="mb-6">
            <div class="flex items-center bg-gray-100 rounded-lg px-4 py-2">
                <input type="text" placeholder="عن ماذا تبحث"
                    class="bg-transparent focus:outline-none text-right w-full">
                <img src="assets/images/search-icon.svg" alt="Search" class="h-5 w-5">
            </div>
        </div>
        <nav class="flex flex-col gap-y-4 text-lg">
            <a href="#" class="text-blue-600 font-bold w-full py-2">الرئيسية</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium w-full py-2">منتجاتنا</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium w-full py-2">من نحن</a>
        </nav>
        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="#"
                class="bg-gradient-to-r from-blue-800 to-blue-900 text-white px-6 py-3 rounded-lg flex items-center justify-center gap-x-2 w-full">
                <span>تواصل معنا الآن</span>
                <img src="assets/images/whatsapp-icon.svg" alt="WhatsApp" class="h-6 w-6">
            </a>
        </div>
    </div>
    <!-- HEADER SECTION END -->

    <main>
        <!-- HERO SLIDER SECTION -->
        <section class="py-8">
            <div class="container mx-auto px-4 relative">
                <div id="hero-slider" class="relative rounded-[2rem] overflow-hidden group">



                    <!-- Slides Container -->
                    <div id="slide-container" class="flex transition-transform duration-700 ease-in-out">
                        <!-- Slide 1 -->
                        <div class="hero-slide w-full flex-shrink-0 h-[600px] bg-cover bg-center relative"
                            style="background-image: url('assets/images/hero-background.png');">
                            <div
                                class="absolute inset-0 bg-gradient-to-l from-transparent via-[#2a4e62]/50 to-[#2a4e62]/80">
                            </div>
                            <div
                                class="relative z-10 h-full flex flex-col justify-center items-end text-center p-8 md:p-16">
                                <div class="max-w-2xl">
                                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-white">كل ما تحتاجه من
                                        التوريدات نوفره لك بجودة عالية وسرعة تسليم.</h1>
                                    <p class="mt-4 text-lg text-gray-200">أدوات مكتبية • مستلزمات طبية • معدات كهربائية
                                        • منتجات نظافة • وأكثر!</p>
                                    <div class="mt-10">
                                        <a href="#"
                                            class="inline-flex items-center gap-x-3 bg-white/90 hover:bg-white text-[#2a4e62] font-bold rounded-full py-3 pr-6 pl-2 transition-all duration-300 shadow-lg">
                                            <span>تواصل معنا الآن</span>
                                            <span class="bg-[#2a4e62] rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <!-- Flipped arrow -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="hero-slide w-full flex-shrink-0 h-[600px] bg-cover bg-center relative"
                            style="background-image: url('assets/images/hero-background.png');">
                            <div
                                class="absolute inset-0 bg-gradient-to-l from-transparent via-[#2a4e62]/50 to-[#2a4e62]/80">
                            </div>
                            <div
                                class="relative z-10 h-full flex flex-col justify-center items-end text-center p-8 md:p-16">
                                <div class="max-w-2xl">
                                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-white">حلول متكاملة
                                        لمشاريع البناء والتشييد.</h1>
                                    <p class="mt-4 text-lg text-gray-200">من الأساسات إلى التشطيبات، نوفر مواد بناء
                                        موثوقة تلبي كافة المعايير.</p>
                                    <div class="mt-10">
                                        <a href="#"
                                            class="inline-flex items-center gap-x-3 bg-white/90 hover:bg-white text-[#2a4e62] font-bold rounded-full py-3 pr-6 pl-2 transition-all duration-300 shadow-lg">
                                            <span>تواصل معنا الآن</span>
                                            <span class="bg-[#2a4e62] rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <!-- Flipped arrow -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="hero-slide w-full flex-shrink-0 h-[600px] bg-cover bg-center relative"
                            style="background-image: url('assets/images/hero-background.png');">
                            <div
                                class="absolute inset-0 bg-gradient-to-l from-transparent via-[#2a4e62]/50 to-[#2a4e62]/80">
                            </div>
                            <div
                                class="relative z-10 h-full flex flex-col justify-center items-end text-center p-8 md:p-16">
                                <div class="max-w-2xl">
                                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-white">مستلزمات طبية
                                        بمعايير عالمية.</h1>
                                    <p class="mt-4 text-lg text-gray-200">تجهيزات عيادات ومستشفيات بأعلى جودة لضمان
                                        سلامة المرضى والكادر الطبي.</p>
                                    <div class="mt-10">
                                        <a href="#"
                                            class="inline-flex items-center gap-x-3 bg-white/90 hover:bg-white text-[#2a4e62] font-bold rounded-full py-3 pr-6 pl-2 transition-all duration-300 shadow-lg">
                                            <span>تواصل معنا الآن</span>
                                            <span class="bg-[#2a4e62] rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <!-- Flipped arrow -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="hero-slide w-full flex-shrink-0 h-[600px] bg-cover bg-center relative"
                            style="background-image: url('assets/images/hero-background.png');">
                            <div
                                class="absolute inset-0 bg-gradient-to-l from-transparent via-[#2a4e62]/50 to-[#2a4e62]/80">
                            </div>
                            <div
                                class="relative z-10 h-full flex flex-col justify-center items-end text-center p-8 md:p-16 ">
                                <div class="max-w-2xl">
                                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-white">أدوات مكتبية
                                        تُلهم الإنتاجية والإبداع.</h1>
                                    <p class="mt-4 text-lg text-gray-200">كل ما تحتاجه بيئة عملك من قرطاسية وأجهزة
                                        لتنظيم مهامك اليومية.</p>
                                    <div class="mt-10">
                                        <a href="#"
                                            class="inline-flex items-center gap-x-3 bg-white/90 hover:bg-white text-[#2a4e62] font-bold rounded-full py-3 pr-6 pl-2 transition-all duration-300 shadow-lg">
                                            <span>تواصل معنا الآن</span>
                                            <span class="bg-[#2a4e62] rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <!-- Flipped arrow -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <!-- Shared Elements over all slides -->
                    <div class="absolute inset-0 pointer-events-none">
                        <!-- Content that is shared and doesn't change with slide -->
                        <div class="relative z-10 h-full flex flex-col justify-end items-end text-right p-8 md:p-16">
                            <div class="max-w-2xl w-full pointer-events-auto">
                                <!-- <div class="mt-10">
                                    <a href="#" class="inline-flex items-center gap-x-3 bg-white/90 hover:bg-white text-[#2a4e62] font-bold rounded-full py-3 pr-6 pl-2 transition-all duration-300 shadow-lg">
                                        <span>تواصل معنا الآن</span>
                                        <span class="bg-[#2a4e62] rounded-full p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </span>
                                    </a>
                                </div> -->
                                <!-- Pagination Dots Container -->
                                <div id="pagination-dots" class="mt-12 flex items-center justify-end gap-x-3"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button id="prev-btn"
                        class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-12 h-12 flex items-center justify-center z-20 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <button id="next-btn"
                        class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white rounded-full w-12 h-12 flex items-center justify-center z-20 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>


                </div>
                <!-- absolute top-5 right-5 z-30 w-16 h-16 rounded-full border border-white/20 flex items-center
                justify-center -->
                <div
                    class="absolute -top-8 right-16 z-30 w-18 h-18 bg-white   rounded-full p-2 flex items-center justify-center">
                    <div
                        class="w-16 h-16  bg-black rounded-full border-2 border-black flex items-center justify-center">
                        <div class="w-full h-full rounded-full  flex items-center justify-center">
                            <a href="#" class="w-12 h-12 bg-blue-900 rounded-full    flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- Floating WhatsApp Button -->
        <a href="#"
            class="fixed bottom-6 left-6 z-40 w-16 h-16 rounded-full bg-[#2AA25A] flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
            <img src="assets/images/whatsapp-call-icon.svg" alt="WhatsApp" class="h-9 w-9">
        </a>

        <section class="py-20 ">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center mb-12">
                    <h2 class="text-4xl font-bold">منتجاتنا</h2>
                    <a href="#" class="border border-[#306A8E] text-[#1E2A38] px-6 py-2 rounded-lg flex items-center">
                        <span>عـرض الـكل</span>
                        <img src="assets/images/arrow-right-icon.svg" class="h-4 w-4 mr-2" alt="">
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product Cards -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="assets/images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                            alt="Product 1">
                        <div class="p-6 text-right">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets/images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي
                                عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
                            <div class="mt-6 text-left">
                                <a href="#"
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="assets/images/product-2.png" class="w-full h-72 object-cover  rounded-2xl"
                            alt="Product 2">
                        <div class="p-6 text-right">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-2xl font-bold text-[#1E2A38]">خشب نمساوي</h3>
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        5000
                                        <img src="assets/images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي
                                عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
                            <div class="mt-6 text-left">
                                <a href="#"
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="assets/images/product-3.png" class="w-full h-72 object-cover  rounded-2xl"
                            alt="Product 3">
                        <div class="p-6 text-right">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-2xl font-bold text-[#1E2A38]">الخشب الرقائقي العادي</h3>
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        2000
                                        <img src="assets/images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي
                                عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
                            <div class="mt-6 text-left">
                                <a href="#"
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="assets/images/product-4.png" class="w-full h-72 object-cover  rounded-2xl"
                            alt="Product 4">
                        <div class="p-6 text-right">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-2xl font-bold text-[#1E2A38]">إم أند إرم وود</h3>
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        4000
                                        <img src="assets/images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي
                                عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
                            <div class="mt-6 text-left">
                                <a href="#"
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="assets/images/product-5.png" class="w-full h-72 object-cover  rounded-2xl"
                            alt="Product 5">
                        <div class="p-6 text-right">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-2xl font-bold text-[#1E2A38]">خشب بلايوود مدهون صيني</h3>
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        8000
                                        <img src="assets/images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي
                                عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
                            <div class="mt-6 text-left">
                                <a href="#"
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="assets/images/product-6.png" class="w-full h-72 object-cover  rounded-2xl"
                            alt="Product 6">
                        <div class="p-6 text-right">
                            <div class="flex items-center justify-between mb-5">
                                <h3 class="text-2xl font-bold text-[#1E2A38]">قفازات الأمان</h3>
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        200
                                        <img src="assets/images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي
                                عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
                            <div class="mt-6 text-left">
                                <a href="#"
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <!-- CLIENTS SECTION -->
        <section class="py-20 w-full">
            <div class="w-full px-0">
                <div class="text-center mb-12 flex align-items-center justify-center">
                    <h2 class="text-4xl font-bold">عملاؤنا
                        <div class="w-9 h-1 bg-[#306A8E] rounded-full mt-4"></div>

                    </h2>
                </div>

                <!-- The container that hides the overflowing content -->
                <div class="relative overflow-hidden w-full"
                    style="background-image: url('assets/images/clients-background.svg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

                    <!-- The flex container that will be animated by the 'animate-marquee' class -->
                    <div class="flex py-12"
                        style="direction: ltr; animation: marquee 15s linear infinite; gap: 0; white-space: nowrap;">

                        <!-- Group 1: The original set of logos -->
                        <div class="marquee-group"
                            style="display: flex; gap: 0; flex-shrink: 0; align-items: center; min-width: 100%;">
                            <img src="assets/images/saudi-sports-ministry-logo.png" class="h-20 mx-4"
                                alt="Ministry of Sports">
                            <img src="assets/images/sdaia-logo.png" class="h-20 mx-4" alt="SDAIA">
                            <img src="assets/images/alrajhi-bank-logo.png" class="h-20 mx-4" alt="Al Rajhi Bank">
                            <img src="assets/images/saudi-energy-ministry-logo.png" class="h-20 mx-4"
                                alt="Ministry of Energy">
                            <img src="assets/images/monshaat-logo.png" class="h-20 mx-4" alt="Monshaat">
                            <img src="assets/images/saudi-media-ministry-logo.png" class="h-20 mx-4"
                                alt="Ministry of Media">
                            <img src="assets/images/dga-logo.png" class="h-20 mx-4" alt="DGA">
                            <img src="assets/images/etimad-logo.png" class="h-20 mx-4" alt="Etimad">
                            <img src="assets/images/gaomr-logo.png" class="h-20 mx-4" alt="GAOMR">
                            <img src="assets/images/gov-sa-logo.png" class="h-20 mx-4" alt="GOV.SA">
                            <img src="assets/images/sabq-logo.png" class="h-20 mx-4" alt="Sabq">
                            <img src="assets/images/thiqah-logo.png" class="h-20 mx-4" alt="Thiqah">
                            <img src="assets/images/moe-logo.png" class="h-20 mx-4" alt="MOE">
                        </div>

                        <!-- Group 2: The duplicated set of logos, crucial for the seamless effect -->
                        <div class="marquee-group" aria-hidden="true"
                            style="display: flex; gap: 0; flex-shrink: 0; align-items: center; min-width: 100%;">
                            <img src="assets/images/saudi-sports-ministry-logo.png" class="h-20 mx-4"
                                alt="Ministry of Sports">
                            <img src="assets/images/sdaia-logo.png" class="h-20 mx-4" alt="SDAIA">
                            <img src="assets/images/alrajhi-bank-logo.png" class="h-20 mx-4" alt="Al Rajhi Bank">
                            <img src="assets/images/saudi-energy-ministry-logo.png" class="h-20 mx-4"
                                alt="Ministry of Energy">
                            <img src="assets/images/monshaat-logo.png" class="h-20 mx-4" alt="Monshaat">
                            <img src="assets/images/saudi-media-ministry-logo.png" class="h-20 mx-4"
                                alt="Ministry of Media">
                            <img src="assets/images/dga-logo.png" class="h-20 mx-4" alt="DGA">
                            <img src="assets/images/etimad-logo.png" class="h-20 mx-4" alt="Etimad">
                            <img src="assets/images/gaomr-logo.png" class="h-20 mx-4" alt="GAOMR">
                            <img src="assets/images/gov-sa-logo.png" class="h-20 mx-4" alt="GOV.SA">
                            <img src="assets/images/sabq-logo.png" class="h-20 mx-4" alt="Sabq">
                            <img src="assets/images/thiqah-logo.png" class="h-20 mx-4" alt="Thiqah">
                            <img src="assets/images/moe-logo.png" class="h-20 mx-4" alt="MOE">
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- WHO WE ARE SECTION -->
        <section id="about-us" class="py-20" style="background-color: #184761;">
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left Column: Text Content -->
                    <div class="text-white text-right">
                        <h2 class="text-5xl font-bold">من نحن؟</h2>
                        <div class="w-24 h-1 bg-white/50 mt-4 mb-10"></div>

                        <img src="assets/images/logo-tp.png" alt="Albain Logo" class="h-16 mb-6"
                            style="filter: brightness(0) invert(1);">

                        <p class="text-lg leading-loose text-gray-200 mb-8">
                            نحن شركة متخصصة في توريد مواد البناء عالية الجودة، ونقدم حلولًا متكاملة لتلبية احتياجات
                            المشاريع الإنشائية بمختلف أحجامها، من المشاريع السكنية الصغيرة إلى المشاريع التجارية
                            والصناعية الكبرى.
                        </p>

                        <ul class="space-y-5">
                            <li class="flex items-center justify-end gap-2 flex-row-reverse">
                                <span class="text-gray-200">الاستشارات الفنية: لمساعدة عملائنا في اختيار المواد الأنسب
                                    لمتطلبات مشاريعهم.</span>
                                <div class="flex-shrink-0 mr-4 h-6 w-6 rounded-full  flex items-center justify-center">

                                    <img src="assets/images/star-icon.svg" class="h-6 w-6 text-white"
                                        alt="Technical Support Icon">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg> -->
                                </div>
                            </li>
                            <li class="flex items-center justify-end gap-2 flex-row-reverse">
                                <span class="text-gray-200">التوريد الفعّال: لضمان تسليم المواد في الوقت المحدد وفي
                                    الموقع المطلوب.</span>
                                <div class="flex-shrink-0 mr-4 h-6 w-6 rounded-full flex items-center justify-center">
                                    <img src="assets/images/star-icon.svg" class="h-6 w-6 text-white"
                                        alt="Technical Support Icon">

                                </div>
                            </li>
                            <li class="flex items-center justify-end gap-2 flex-row-reverse">
                                <span class="text-gray-200">أسعار تنافسية: لتحقيق أفضل قيمة وجودة مقابل السعر.</span>
                                <div class="flex-shrink-0 mr-4 h-6 w-6 rounded-full flex items-center justify-center">
                                    <img src="assets/images/star-icon.svg" class="h-6 w-6 text-white"
                                        alt="Technical Support Icon">

                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Right Column: Staggered Feature Cards -->
                    <div class="grid grid-cols-2 gap-8">
                        <!-- Inner Column 1 -->
                        <div class="space-y-8">
                            <div class="p-8 rounded-2xl text-center" style=" border: 1px solid #456c80;">
                                <div
                                    class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-6 bg-white">
                                    <img src="assets/images/building-materials-icon.svg" class="h-10 w-10"
                                        alt="Building Materials Icon">
                                </div>
                                <h3 class="font-bold text-xl text-white mb-3">مواد بناء موثوقة</h3>
                                <p class="text-gray-300 leading-relaxed">منتجاتنا معتمدة وذات جودة عالية تلبي متطلبات
                                    المشاريع الإنشائية باحترافية.</p>
                            </div>
                            <div class="p-8 rounded-2xl text-center" style=" border: 1px solid #456c80;">
                                <div class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-6"
                                    style="background-color: #4f77a2;">
                                    <img src="assets/images/truck-icon.svg" class="h-10 w-10" alt="Truck Icon"
                                        style="filter: brightness(0) invert(1);">
                                </div>
                                <h3 class="font-bold text-xl text-white mb-3">التوريد الفعال</h3>
                                <p class="text-gray-300 leading-relaxed">نوصّل طلباتك بسرعة وبدقة، مع نظام متابعة يضمن
                                    وصول المواد في الوقت المحدد.</p>
                            </div>


                        </div>
                        <!-- Inner Column 2 (Staggered) -->
                        <div class="space-y-8 mt-16">

                            <div class="p-8 rounded-2xl text-center" style="border: 1px solid #456c80;">
                                <div class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-6"
                                    style="background-color: #d4a03c;">
                                    <img src="assets/images/technical-support-icon.svg" class="h-10 w-10"
                                        alt="Technical Support Icon" style="filter: brightness(0) invert(1);">
                                </div>
                                <h3 class="font-bold text-xl text-white mb-3">الاستشارات الفنية</h3>
                                <p class="text-gray-300 leading-relaxed">فريق متخصص يساعدك في اختيار المواد المناسبة
                                    ويوجهك لحلول أفضل تناسب مشروعك.</p>
                            </div>
                            <div class="p-8 rounded-2xl text-center" style=" border: 1px solid #456c80;">
                                <div class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-6"
                                    style="background-color: #6ca571;">
                                    <img src="assets/images/money-bag-icon.svg" class="h-10 w-10" alt="Money Bag Icon"
                                        style="filter: brightness(0) invert(1);">
                                </div>
                                <h3 class="font-bold text-xl text-white mb-3">أسعار تنافسية</h3>
                                <p class="text-gray-300 leading-relaxed">نوفر لك أفضل العروض والأسعار في السوق بدون
                                    التأثير على جودة المواد أو الخدمة.</p>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- CONTACT FORM SECTION -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <!-- Section Title -->
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-[#121212]">ابدأ رحلتك الشرائية الذكية مع الباين للتوريدات!</h2>
                    <p class="text-[#121212] mt-4 max-w-6xl mx-auto leading-8">
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
                                        <img src="assets/images/call-icon.svg" class="h-[23px] w-[23px]"
                                            alt="Phone Icon" style="filter: brightness(0) invert(1);">
                                    </div>
                                    <div class="flex flex-col items-start flex-1">
                                        <p class="font-light text-[15px] text-[#F1F2F2] mb-1">رقم الجوال</p>
                                        <div class="flex items-center gap-2">
                                            <a href="tel:+966550335535"
                                                class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2">
                                                <img src="assets/images/copy-icon.svg" class="h-[19px] w-[19px]"
                                                    alt="Copy">
                                                +966 55 033 5535
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-start gap-3">
                                    <div class="p-[2px]">
                                        <img src="assets/images/mail-icon.svg" class="h-[23px] w-[23px]"
                                            alt="Email Icon" style="filter: brightness(0) invert(1);">
                                    </div>
                                    <div class="flex flex-col items-start flex-1">
                                        <p class="font-light text-[15px] text-[#F1F2F2] mb-1">البريد الالكتروني</p>
                                        <div class="flex items-center gap-2">
                                            <a href="mailto:Info@albainco.com"
                                                class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2">
                                                <img src="assets/images/copy-icon.svg" class="h-[19px] w-[19px]"
                                                    alt="Copy">
                                                Info@albainco.com
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="flex items-start gap-3">
                                    <div class="p-[2px]">
                                        <img src="assets/images/location-icon.svg" class="h-[23px] w-[23px]"
                                            alt="Location Icon" style="filter: brightness(0) invert(1);">
                                    </div>
                                    <div class="flex flex-col items-start flex-1">
                                        <p class="font-light text-[15px] text-[#F1F2F2] mb-1">الموقع</p>
                                        <div class="flex items-center gap-2">
                                            <a href="#"
                                                class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2 leading-relaxed">
                                                <img src="assets/images/link-icon.svg" class="h-[19px] w-[19px]"
                                                    alt="Link">
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
                                        <img src="assets/images/twitter-icon.svg" class="h-[23px] w-[23px]"
                                            alt="Twitter" style="filter: brightness(0) invert(1);">
                                    </a>
                                    <a href="#" class="text-[#F1F2F2] hover:text-white transition-colors">
                                        <img src="assets/images/linkedin-icon.svg" class="h-[23px] w-[23px]"
                                            alt="LinkedIn" style="filter: brightness(0) invert(1);">
                                    </a>
                                    <a href="#" class="text-[#F1F2F2] hover:text-white transition-colors">
                                        <img src="assets/images/instagram-icon.svg" class="h-[23px] w-[23px]"
                                            alt="Instagram" style="filter: brightness(0) invert(1);">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Section (Left side in RTL) -->
                    <div class="w-full lg:w-9/12 bg-[#F8F8F8] rounded-[23px] p-14">
                        <form class="space-y-8">
                            <!-- First Row: Name and Phone -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label for="name"
                                        class="block text-[#1A1A1A] text-[16px] font-medium text-right">الاسم</label>
                                    <input type="text" id="name" placeholder="ادخل الاسم"
                                        class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                                </div>
                                <div class="space-y-3">
                                    <label for="phone"
                                        class="block text-[#1A1A1A] text-[16px] font-medium text-right">رقم
                                        الجوال</label>
                                    <input type="tel" id="phone" placeholder="ادخل رقم الجوال"
                                        class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                                </div>
                            </div>

                            <!-- Second Row: Email and Subject -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label for="email"
                                        class="block text-[#1A1A1A] text-[16px] font-medium text-right">البريد
                                        الالكتروني</label>
                                    <input type="email" id="email" placeholder="ادخل البريد الالكتروني"
                                        class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                                </div>
                                <div class="space-y-3">
                                    <label for="subject"
                                        class="block text-[#1A1A1A] text-[16px] font-medium text-right">الموضوع</label>
                                    <input type="text" id="subject" placeholder="ادخل الموضوع"
                                        class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right shadow-sm">
                                </div>
                            </div>

                            <!-- Message Field -->
                            <div class="space-y-3">
                                <label for="message"
                                    class="block text-[#1A1A1A] text-[16px] font-medium text-right">الرسالة</label>
                                <textarea id="message" placeholder="ادخل الرسالة" rows="5"
                                    class="block w-full bg-white border-0 rounded-[12px] py-4 px-4 text-[#1A1A1A] text-[15px] leading-tight focus:outline-none focus:ring-2 focus:ring-[#306A8E] text-right resize-none shadow-sm"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-center pt-4">
                                <button type="submit"
                                    class="bg-[#306A8E] text-white text-[18px] font-medium rounded-[12px] px-16 py-4 flex items-center gap-3 hover:bg-[#2a5f7a] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    ارسال
                                    <img src="public/images/send-icon.svg" alt="Send" class="w-5 h-5">
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <footer class="bg-[#F9F9F9] py-10">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Main Footer Content -->
            <div class="container mx-auto px-4 max-w-7xl">
                <!-- Main Footer Content -->
                <div class="flex flex-wrap flex-row-reverse lg:flex-nowrap justify-between items-start mb-8 items-center">
    
                    <!-- Left Section: Social Media -->
                    <div class="w-full lg:w-auto mb-8 lg:mb-0 text-center lg:text-right flex flex-col items-center ">
                        <p class="text-[#1E2A38] text-xl font-normal mb-4" style="font-family: 'Co Headline';">تتابعنا علي
                        </p>
                        <div class="flex justify-center lg:justify-start gap-3.5 flex-row-reverse" >
                            <a href="#" class="block">
                                <img src="assets/images/snapchat-logo.png" class="h-[38px] w-[38px] rounded-md"
                                    alt="Snapchat">
                            </a>
                            <a href="#" class="block">
                                <img src="assets/images/tiktok-logo.png" class="h-[38px] w-[38px] rounded-md"
                                    alt="TikTok">
                            </a>
                            <a href="#" class="block">
                                <img src="assets/images/youtube-logo.svg"
                                    class="h-[38px] w-[38px] rounded-md bg-[#FFEC06] p-1" alt="YouTube">
                            </a>
                            <a href="#" class="block">
                                <img src="assets/images/instagram-logo.svg"
                                    class="h-[38px] w-[38px] rounded-md bg-gradient-to-br from-[#FFDD55] via-[#FF543E] to-[#C837AB] p-1"
                                    alt="Instagram">
                            </a>
                        </div>
                    </div>
    
                    <!-- Center Section: Quick Links -->
                    <div class="w-full lg:w-auto mb-8 lg:mb-0 text-center ">
                        <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-20 ">
    
    
                            <a href="#" class="text-[#394149] text-lg font-normal hover:text-[#306A8E] transition-colors"
                                style="font-family: 'MadaniArabic-Regular';">تواصل معنا</a>
                                <a href="#" class="text-[#394149] text-lg font-normal hover:text-[#306A8E] transition-colors"
                                    style="font-family: 'MadaniArabic-Regular';">خصوصية الاستخدام</a>
                            <a href="#" class="text-[#394149] text-lg font-normal hover:text-[#306A8E] transition-colors"
                                style="font-family: 'MadaniArabic-Regular';">الشروط والأحكام</a>
                        </div>
                    </div>
    
                    <!-- Right Section: Logo -->
                    <div class="w-full lg:w-auto text-center lg:text-left">
                        <img src="assets/images/logo.svg" class="h-[86px] mx-auto lg:mx-0" alt="Albain Logo">
                    </div>
                </div>
    
                
            </div>

            <!-- Copyright -->
            <div class="text-center pt-4">
                <p class="text-[#394149] text-sm font-medium opacity-64" style="font-family: 'Inter';">Copyright @2025 .
                    All rights are reserved</p>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script src="node_modules/intl-tel-input/build/js/intlTelInput.min.js"></script>
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
                    dot.classList.add('w-3', 'h-3', 'rounded-full', 'border', 'border-white/50', 'transition-all', 'duration-300');
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
        document.addEventListener('DOMContentLoaded', function () {
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
                    customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
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
                    form.addEventListener('submit', function (e) {
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
</body>

</html>