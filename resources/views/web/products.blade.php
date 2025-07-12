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
                        <img src="assets//images/whatsapp-icon.svg" alt="WhatsApp" class="h-6 w-6">
                           <span> اتصل بنا </span>
                    </a>
                    <div class="relative">
                        <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2 ">
                            <input type="text" placeholder="عن ماذا تبحث"
                                class="bg-transparent focus:outline-none text-right w-48 pr-2">
                            <img src="assets//images/search-icon.svg" alt="Search" class="h-5 w-5">
                        </div>
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
                            <img src="assets//images/logo.svg" alt="Albain Logo" class="h-16">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section class="py-20 ">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-4xl font-bold">منتجاتنا</h2>
            </div>
            <div class="mb-8 flex justify-end">
                <input id="product-search-input" type="text" placeholder="ابحث عن منتج..."
                    class="w-full md:w-1/3 bg-white border border-gray-300 rounded-lg py-3 px-4 text-right focus:outline-none focus:ring-2 focus:ring-[#306A8E] shadow-sm" />
            </div>
            <div id="product-search-loading" class="text-center text-lg text-gray-500 py-8 hidden">جاري البحث...</div>
            <div id="product-search-no-results" class="text-center text-lg text-gray-500 py-8 hidden">لا توجد منتجات
                مطابقة.</div>
            <div id="product-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                        <img src="{{ $product->getFirstMediaUrl('gallery') ?: asset('assets/images/products-2-icon.svg') }}"
                            class="w-full h-72 object-cover rounded-2xl" alt="{{ $product->name }}">
                        <div class="p-6 text-right">
                            <div class="mb-5">
                                <div class="flex justify-end mb-3">
                                    <div
                                        class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                        <span class="font-bold text-xl flex items-center gap-x-1">
                                            {{ $product->price }}
                                            <img src="{{ asset('assets/images/suadi-symbol.svg') }}"
                                                alt="رمز الريال السعودي" class="h-6 w-6 inline-block" />
                                            /
                                        </span>
                                        <span class="text-base font-medium text-gray-700"> للطن</span>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold text-[#1E2A38]">{{ $product->name }}</h3>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">
                                {{ $product->description }}</p>
                            <div class="mt-6 text-left">
                                <a href="{{ route('web.product.details', $product->id) }}"
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
                @endforeach
            </div>
        </div>
    </section>

    <div class="flex items-center justify-center gap-4 mt-12 mb-20">
        <button class="w-14 h-14 rounded-full bg-[#0C6D94] text-white text-lg text-lg font-semibold">1</button>
        <button class="w-14 h-14 rounded-full bg-gray-100 text-gray-400 text-lg font-semibold">2</button>
        <button class="w-14 h-14 rounded-full bg-gray-100 text-gray-400 text-lg font-semibold">3</button>
        <button class="w-14 h-14 rounded-full bg-gray-100 text-gray-400 text-lg font-semibold">4</button>
        <button class="w-14 h-14 rounded-full bg-gray-100 text-gray-400 font-semibold">5</button>
        <button class="w-14 h-14 rounded-full bg-gray-100 text-gray-400 text-lg font-semibold">التالي</button>
    </div>


    <footer class="bg-[#F9F9F9] py-10">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Main Footer Content -->
            <div class="container mx-auto px-4 max-w-7xl">
                <!-- Main Footer Content -->
                <div
                    class="flex flex-wrap flex-row-reverse lg:flex-nowrap justify-between items-start mb-8 items-center">

                    <!-- Left Section: Social Media -->
                    <div class="w-full lg:w-auto mb-8 lg:mb-0 text-center lg:text-right flex flex-col items-center ">
                        <p class="text-[#1E2A38] text-xl font-normal mb-4" style="font-family: 'Co Headline';">تابعنا على
                        </p>
                        <div class="flex justify-center lg:justify-start gap-3.5 flex-row-reverse">
                            <a href="#" class="block">
                                <img src="assets//images/snapchat-logo.png" class="h-[38px] w-[38px] rounded-md"
                                    alt="Snapchat">
                            </a>
                            <a href="#" class="block">
                                <img src="assets//images/tiktok-logo.png" class="h-[38px] w-[38px] rounded-md"
                                    alt="TikTok">
                            </a>
                            <a href="#" class="block">
                                <img src="assets//images/youtube-logo.svg"
                                    class="h-[38px] w-[38px] rounded-md bg-[#FFEC06] p-1" alt="YouTube">
                            </a>
                            <a href="#" class="block">
                                <img src="assets//images/instagram-logo.svg"
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
                        <img src="assets//images/logo.svg" class="h-[86px] mx-auto lg:mx-0" alt="Albain Logo">
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('product-search-input');
            const productList = document.getElementById('product-list');
            const loading = document.getElementById('product-search-loading');
            const noResults = document.getElementById('product-search-no-results');
            let lastQuery = '';
            let debounceTimeout;

            function renderProducts(products) {
                if (!products.length) {
                    productList.innerHTML = '';
                    noResults.classList.remove('hidden');
                    return;
                }
                noResults.classList.add('hidden');
                productList.innerHTML = products.map(product => `
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
                    <img src="${product.get_first_media_url || '/assets/images/products-2-icon.svg'}" class="w-full h-72 object-cover rounded-2xl" alt="${product.name}">
                    <div class="p-6 text-right">
                        <div class="mb-5">
                            <div class="flex justify-end mb-3">
                                <div class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                    <span class="font-bold text-xl flex items-center gap-x-1">
                                        ${product.price}
                                        <img src="/assets/images/suadi-symbol.svg" alt="رمز الريال السعودي" class="h-6 w-6 inline-block" />
                                        /
                                    </span>
                                    <span class="text-base font-medium text-gray-700"> للطن</span>
                                </div>
                            </div>
                            <h3 class="text-2xl font-bold text-[#1E2A38]">${product.name}</h3>
                        </div>
                        <p class="text-gray-600 text-base leading-relaxed h-24 overflow-hidden">${product.description || ''}</p>
                        <div class="mt-6 text-left">
                            <a href="/product/${product.id}" class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 hover:bg-[#214861] transition-colors">
                                <span>عـرض التفاصــيل</span>
                                <span class="inline-flex items-center justify-center rounded-full bg-white" style="width: 32px; height: 32px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            `).join('');
            }

            function fetchProducts(query) {
                loading.classList.remove('hidden');
                noResults.classList.add('hidden');
                fetch(`/products/ajax-search?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        loading.classList.add('hidden');
                        renderProducts(data.products.map(p => ({
                            ...p,
                            get_first_media_url: p.get_first_media_url ||
                                '/assets/images/products-2-icon.svg'
                        })));
                    })
                    .catch(() => {
                        loading.classList.add('hidden');
                        productList.innerHTML = '';
                        noResults.classList.remove('hidden');
                    });
            }

            searchInput.addEventListener('input', function(e) {
                const query = e.target.value.trim();
                if (query === lastQuery) return;
                lastQuery = query;
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(() => {
                    if (query.length === 0) {
                        // Optionally reload original products or keep empty
                        productList.innerHTML = '';
                        noResults.classList.add('hidden');
                        loading.classList.add('hidden');
                        return;
                    }
                    fetchProducts(query);
                }, 400);
            });
        });
    </script>
</body>

</html>
