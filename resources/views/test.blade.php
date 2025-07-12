<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albain</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="assets//styles.css" rel="stylesheet">
    <link href="./src/styles.css" rel="stylesheet">
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

<body>
    <!-- HEADER SECTION -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3 flex-row-reverse">



                <!-- Left side elements -->
                <div class="hidden md:flex items-center gap-x-4 flex-row-reverse">
                    <a href="#"
                        class="flex bg-gradient-to-r from-[#306A8E] to-[#0E1E28] text-white px-5 py-2.5 rounded-lg items-center gap-x-2 whitespace-nowrap hover:shadow-lg transition-all duration-300">
                        <img src="assets//images/whatsapp-icon.svg" alt="WhatsApp" class="h-6 w-6">
                        <span>تواصل معنا الآن</span>
                    </a>
                    <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2 ">
                        <input type="text" placeholder="عن ماذا تبحث"
                            class="bg-transparent focus:outline-none text-right w-48 pr-2">
                        <img src="assets//images/search-icon.svg" alt="Search" class="h-5 w-5">
                    </div>
                </div>

                <!-- <div class="flex items-center   bg-gray-100 rounded-lg  py-2 ">
                    <input type="text" placeholder="عن ماذا تبحث"
                        class="bg-transparent focus:outline-none text-right w-48 pr-2">
                    <img src="assets//images/search-icon.svg" alt="Search" class="h-5 w-5">
                </div> -->

                <!-- Right side elements -->
                <div class="flex items-center gap-x-12 flex-row-reverse">
                    <nav class="hidden md:flex items-center gap-x-8 flex-row-reverse">
                        <a href="#" class="text-gray-800 hover:text-[#096B90] font-medium transition-colors">من
                            نحن</a>
                        <a href="#"
                            class="text-[#306A8E] font-bold relative pb-2 after:content-[''] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]">منتجاتنا</a>
                        <a href="../index.html"
                            class="text-gray-800 hover:text-[#096B90] font-medium transition-colors">الرئيسية</a>
                    </nav>
                    <div class="flex-shrink-0">
                        <a href="#">
                            <img src="assets//images/logo.svg" alt="Albain Logo" class="h-16">
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
                            <img src="assets//images/logo.svg" alt="Albain Logo" class="h-16">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section class="container mx-auto px-4 py-8 md:py-16">
        <div class="flex flex-col lg:flex-row-reverse gap-8 lg:gap-12">
            <div class="flex flex-row lg:flex-col gap-2 md:gap-4 mb-4 lg:mb-0 justify-center lg:justify-start">
                <button type="button" class="focus:outline-none"
                    onclick="openGalleryModal('assets//images/product-1.png')">
                    <img src="assets//images/product-1.png"
                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-lg border border-gray-200"
                        alt="صورة مصغرة" />
                </button>
                <button type="button" class="focus:outline-none"
                    onclick="openGalleryModal('assets//images/product-1.png')">
                    <img src="assets//images/product-1.png"
                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-lg border border-gray-200"
                        alt="صورة مصغرة" />
                </button>
                <button type="button" class="focus:outline-none"
                    onclick="openGalleryModal('assets//images/product-2.png')">
                    <img src="assets//images/product-2.png"
                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-lg border border-gray-200"
                        alt="صورة مصغرة" />
                </button>
                <button type="button" class="focus:outline-none"
                    onclick="openGalleryModal('assets//images/product-1.png')">
                    <img src="assets//images/product-1.png"
                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-lg border border-gray-200"
                        alt="صورة مصغرة" />
                </button>
            </div>

            <div class="flex-1 mb-6 lg:mb-0">
                <img src="assets//images/product-1.png" class="w-full rounded-2xl shadow-md max-h-80 object-cover"
                    alt="صورة المنتج الرئيسية" />
            </div>

            <div class="flex-1 text-right">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-[#1E2A38] mb-4">خشب روسي طبيعي – درجة أولى
                </h1>
                <p class="text-gray-700 leading-relaxed mb-6 text-sm md:text-base">
                    خشب MDF (Medium Density Fiberboard) هو لوح خشبي صناعي عالي الكثافة مصنوع من ألياف الخشب المضغوطة مع
                    الراتنجات الحرارية. يتميز بسطح ناعم ومتجانس، مما يجعله مثالياً لأعمال النجارة، الأثاث، الديكورات
                    الداخلية، والتشطيبات.
                </p>

                <div class="flex items-center justify-between mb-5">
                    <div
                        class="flex items-baseline gap-x-2 text-lg md:text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                        <span class="font-bold flex items-center gap-x-1">
                            3000
                            <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                class="h-5 w-5 md:h-6 md:w-6 inline-block" />
                            /
                        </span>
                        <span class="text-xs md:text-base font-medium text-gray-700"> للطن</span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-3 md:gap-4 mb-8 md:mb-10">
                    <a href="#"
                        class="flex items-center justify-center gap-2 bg-[#25D366] text-white px-4 md:px-6 py-2 md:py-3 rounded-lg text-base md:text-lg font-medium hover:bg-[#1daa53] transition-colors">
                        <img src="assets//images/whatsapp-call-icon.svg" class="w-5 h-5 md:w-6 md:h-6"
                            alt="واتساب" />
                        تواصل للطلب
                    </a>
                    <a href="#"
                        class="group flex items-center justify-center gap-2 border border-[#0C6D94] text-[#0C6D94] px-4 md:px-6 py-2 md:py-3 rounded-lg text-base md:text-lg font-medium hover:bg-[#306A8E] hover:text-white transition-all duration-300">
                        <img src="assets//images/calling.svg" class="w-4 h-4 md:w-5 md:h-5 block group-hover:hidden"
                            alt="اتصال">
                        <img src="assets//images/calling_white.svg"
                            class="w-4 h-4 md:w-5 md:h-5 hidden group-hover:block" alt="اتصال عند التحويم">
                        اتصال هاتفي
                    </a>
                </div>

                <div class="border-t pt-6">
                    <h2 class="text-lg md:text-xl font-bold text-[#1E2A38] mb-4">وصف المنتج</h2>
                    <ul class="text-gray-700 space-y-2 list-disc pr-5 text-sm md:text-base">
                        <li>سمـاكات متوفرة: 6 مم – 25 مم</li>
                        <li>أبعاد الألواح: 122 × 244 سم</li>
                        <li>قابل للدهان والتغليف بسهولة</li>
                        <li>يمكن قطعه وتشكيله حسب الطلب</li>
                        <li>مقاوم للتقـوّس والتشققات</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 md:py-20">
        <div class="container mx-auto px-2 md:px-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 md:mb-12 gap-4 md:gap-0">
                <h2 class="text-2xl md:text-4xl font-bold text-right">منتجاتنا</h2>
                <a href="products.html"
                    class="border border-[#306A8E] text-[#1E2A38] px-4 md:px-6 py-2 rounded-lg flex items-center text-sm md:text-base">
                    <span>عـرض الـكل</span>
                    <img src="assets//images/arrow-right-icon.svg" class="h-4 w-4 mr-2" alt="">
                </a>
            </div>
            <div
                class="flex flex-row gap-4 md:gap-6 overflow-x-auto pb-4 md:grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 md:overflow-visible">
                <div
                    class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                    <img src="assets//images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                        alt="Product 1">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي عالي
                            الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
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
                <div
                    class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                    <img src="assets//images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                        alt="Product 1">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي عالي
                            الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
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
                <div
                    class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                    <img src="assets//images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                        alt="Product 1">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي عالي
                            الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
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
                <div
                    class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                    <img src="assets//images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                        alt="Product 1">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي عالي
                            الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
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
                <div
                    class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                    <img src="assets//images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                        alt="Product 1">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي عالي
                            الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
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
                <div
                    class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                    <img src="assets//images/product-1.png" class="w-full h-72 object-cover rounded-2xl"
                        alt="Product 1">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div
                                    class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        3000
                                        <img src="assets//images/suadi-symbol.svg" alt="رمز الريال السعودي"
                                            class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">حديد الجزيرة</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">خشب روسي طبيعي عالي
                            الكثافة مصنوع من ألياف الخشب المضغوطة مع راتنجات حرارية.</p>
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




    <footer class="bg-[#F9F9F9] py-8 md:py-10">
        <div class="container mx-auto px-4 max-w-7xl">
            <div
                class="flex flex-col lg:flex-row-reverse flex-wrap lg:flex-nowrap justify-between items-center mb-8 gap-8 lg:gap-0">
                <!-- Left Section: Social Media -->
                <div class="w-full lg:w-auto mb-4 lg:mb-0 text-center lg:text-right flex flex-col items-center ">
                    <p class="text-[#1E2A38] text-lg md:text-xl font-normal mb-4" style="font-family: 'Co Headline';">
                        تتابعنا علي</p>
                    <div class="flex justify-center lg:justify-start gap-2 md:gap-3.5 flex-row-reverse">
                        <a href="#" class="block">
                            <img src="assets//images/snapchat-logo.png"
                                class="h-8 w-8 md:h-[38px] md:w-[38px] rounded-md" alt="Snapchat">
                        </a>
                        <a href="#" class="block">
                            <img src="assets//images/tiktok-logo.png"
                                class="h-8 w-8 md:h-[38px] md:w-[38px] rounded-md" alt="TikTok">
                        </a>
                        <a href="#" class="block">
                            <img src="assets//images/youtube-logo.svg"
                                class="h-8 w-8 md:h-[38px] md:w-[38px] rounded-md bg-[#FFEC06] p-1" alt="YouTube">
                        </a>
                        <a href="#" class="block">
                            <img src="assets//images/instagram-logo.svg"
                                class="h-8 w-8 md:h-[38px] md:w-[38px] rounded-md bg-gradient-to-br from-[#FFDD55] via-[#FF543E] to-[#C837AB] p-1"
                                alt="Instagram">
                        </a>
                    </div>
                </div>
                <!-- Center Section: Quick Links -->
                <div class="w-full lg:w-auto mb-4 lg:mb-0 text-center ">
                    <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-6 lg:gap-20 ">
                        <a href="#"
                            class="text-[#394149] text-base md:text-lg font-normal hover:text-[#306A8E] transition-colors"
                            style="font-family: 'MadaniArabic-Regular';">تواصل معنا</a>
                        <a href="#"
                            class="text-[#394149] text-base md:text-lg font-normal hover:text-[#306A8E] transition-colors"
                            style="font-family: 'MadaniArabic-Regular';">خصوصية الاستخدام</a>
                        <a href="#"
                            class="text-[#394149] text-base md:text-lg font-normal hover:text-[#306A8E] transition-colors"
                            style="font-family: 'MadaniArabic-Regular';">الشروط والأحكام</a>
                    </div>
                </div>
                <!-- Right Section: Logo -->
                <div class="w-full lg:w-auto text-center lg:text-left">
                    <img src="assets//images/logo.svg" class="h-16 md:h-[86px] mx-auto lg:mx-0" alt="Albain Logo">
                </div>
            </div>
            <div class="text-center pt-4">
                <p class="text-[#394149] text-xs md:text-sm font-medium opacity-64" style="font-family: 'Inter';">
                    Copyright @2025 . All rights are reserved</p>
            </div>
        </div>
    </footer>

    <!-- Gallery Modal -->
    <div id="gallery-modal"
        class="fixed inset-0 z-[1000] flex items-center justify-center bg-black bg-opacity-70 hidden">
        <div class="relative max-w-full max-h-full flex items-center justify-center">
            <button onclick="closeGalleryModal()"
                class="absolute top-2 left-2 md:top-4 md:left-4 bg-white bg-opacity-80 rounded-full p-1 md:p-2 shadow focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="gallery-modal-img" src="" alt="صورة مكبرة"
                class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg border-4 border-white" />
        </div>
    </div>

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

        // GALLERY MODAL LOGIC
        function openGalleryModal(imgSrc) {
            var modal = document.getElementById('gallery-modal');
            var modalImg = document.getElementById('gallery-modal-img');
            modalImg.src = imgSrc;
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeGalleryModal() {
            var modal = document.getElementById('gallery-modal');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        // Close modal when clicking outside the image
        document.getElementById('gallery-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeGalleryModal();
            }
        });
    </script>
</body>

</html>
