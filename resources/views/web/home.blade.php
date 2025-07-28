@extends('layouts.web')

@section('title', 'Albain')

@section('head')
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
@endsection

@section('content')
    <!-- HERO SLIDER SECTION -->
    <section class="py-8">
        <div class="container mx-auto px-4 relative">
            <div id="hero-slider" class="relative rounded-[2rem] overflow-hidden group">
                <!-- Slides Container -->
                <div id="slide-container" class="flex transition-transform duration-700 ease-in-out">
                    @foreach ($sliders as $slider)
                        <div class="hero-slide w-full flex-shrink-0 h-[600px] bg-cover bg-center relative"
                            style="background-image: url('{{ $slider->getFirstMediaUrl('image') ?: asset('assets/images/sl1.jpg') }}');">
                            <div class="absolute inset-0 bg-gradient-to-l from-transparent via-[#2a4e62]/50 to-[#2a4e62]/80">
                            </div>
                            <div class="relative z-10 h-full flex flex-col justify-center items-end text-center p-8 md:p-16">
                                <div class="max-w-2xl">
                                    <h1 class="text-4xl md:text-5xl font-bold leading-tight text-white">{{ $slider->title }}
                                    </h1>
                                    <p class="mt-4 text-lg text-gray-200">{{ $slider->description }}</p>
                                    <div class="mt-10">
                                        <a href="#contact"
                                            class="inline-flex items-center gap-x-3 bg-white/90 hover:bg-white text-[#2a4e62] font-bold rounded-full py-3 pr-6 pl-2 transition-all duration-300 shadow-lg">
                                            <span>اطلب الآن</span>
                                            <span class="bg-[#2a4e62] rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Shared Elements over all slides -->
                <div class="absolute inset-0 pointer-events-none">
                    <div class="relative z-10 h-full flex flex-col justify-end items-end text-right p-8 md:p-16">
                        <div class="max-w-2xl w-full pointer-events-auto">
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
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companyInformation->whatsapp) }}" target="_blank" rel="noopener"
        class="fixed bottom-24 left-6 z-40 w-16 h-16 rounded-full bg-[#2AA25A] flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
        <img src="{{ asset('assets/images/whatsapp-call-icon.svg') }}" alt="WhatsApp" class="h-9 w-9">
    </a>

    <section class="py-20 ">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-4xl font-bold">منتجاتنا</h2>
                <a href="{{ route('web.products') }}"
                    class="border border-[#306A8E] text-[#1E2A38] px-6 py-2 rounded-lg flex items-center">
                    <span>عـرض الـكل</span>
                    <img src="{{ asset('assets/images/arrow-right-icon.svg') }}" class="h-4 w-4 mr-2" alt="">
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Cards -->
                @foreach ($products as $product)
                    <a href="{{ route('web.product.details', $product->id) }}"
                        class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                        @php
                            $image =
                                $product->getFirstMediaUrl('thumbnail') ?:
                                $product->getFirstMediaUrl('gallery') ?:
                                asset('assets/images/product-2.png');
                        @endphp
                        <img src="{{ $image }}"
                            class="w-full h-30 object-contain object-center rounded-2xl flex-shrink-0"
                            alt="{{ $product->name }}">
                        <div class="p-6 text-right flex flex-col flex-grow">
                            <div class="mb-5">
                                @if ($product->price > 0)
                                    <div class="flex justify-end mb-3">
                                        <div
                                            class="flex items-baseline gap-x-2 text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                                            <span class="font-bold text-xl flex items-center gap-x-1">
                                                {{ $product->price }}
                                                <img src="{{ asset('assets/images/suadi-symbol.svg') }}"
                                                    alt="رمز الريال السعودي" class="h-6 w-6 inline-block" />
                                                /
                                            </span>
                                            <span class="text-base font-medium text-gray-700"> {{ $product->unit }}
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="h-12 mb-3"></div>
                                @endif
                                <h3 class="text-2xl font-bold text-[#1E2A38] group-hover:text-[#306A8E] transition-colors">
                                    {{ $product->name }}</h3>
                            </div>
                            <p class="text-gray-600 text-base leading-relaxed flex-grow">
                                {{ $product->description }}</p>
                            <div class="mt-6 text-left flex-shrink-0">
                                <div
                                    class="inline-flex items-center justify-center bg-[#306A8E] text-white px-8 py-3 rounded-2xl text-lg font-semibold gap-x-4 group-hover:bg-[#214861] transition-colors">
                                    <span>عـرض التفاصــيل</span>
                                    <span class="inline-flex items-center justify-center rounded-full bg-white"
                                        style="width: 32px; height: 32px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="#306A8E" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
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
                style="background-image: url('{{ asset('assets/images/clients-background.svg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

                <!-- The flex container that will be animated by the 'animate-marquee' class -->
                <div class="flex py-12"
                    style="direction: ltr; animation: marquee 15s linear infinite; gap: 0; white-space: nowrap;">

                    <!-- Group 1: Dynamic partners -->
                    <div class="marquee-group"
                        style="display: flex; gap: 0; flex-shrink: 0; align-items: center; min-width: 100%;">
                        @foreach ($partners as $partner)
                            <img src="{{ $partner->getFirstMediaUrl('image') ?: asset('assets/images/products-2-icon.svg') }}"
                                class="h-20 mx-4" alt="{{ $partner->name }}">
                        @endforeach
                    </div>

                    <!-- Group 2: Duplicate for seamless effect -->
                    <div class="marquee-group" aria-hidden="true"
                        style="display: flex; gap: 0; flex-shrink: 0; align-items: center; min-width: 100%;">
                        @foreach ($partners as $partner)
                            <img src="{{ $partner->getFirstMediaUrl('image') ?: asset('assets/images/products-2-icon.svg') }}"
                                class="h-20 mx-4" alt="{{ $partner->name }}">
                        @endforeach
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
                @php
                    $aboutUsContent = \App\Models\AboutUsContent::first();
                    $listItems =
                        $aboutUsContent && $aboutUsContent->list_items
                            ? json_decode($aboutUsContent->list_items, true)
                            : [];
                @endphp
                <div class="text-white text-right">
                    <h2 class="text-5xl font-bold">{{ $aboutUsContent->section_title ?? '' }}</h2>
                    <div class="w-24 h-1 bg-white/50 mt-4 mb-10"></div>

                    <img src="{{ asset('assets/images/logo-tp.png') }}" alt="Albain Logo" class="h-16 mb-6"
                        style="filter: brightness(0) invert(1);">

                    <p class="text-lg leading-loose text-gray-200 mb-8">
                        {{ $aboutUsContent->paragraph_1 ?? '' }}
                    </p>

                    <ul class="space-y-5">
                        @foreach ($listItems as $item)
                            <li class="flex items-center justify-end gap-2 flex-row-reverse">
                                <span class="text-gray-200">{{ $item }}</span>
                                <div class="flex-shrink-0 mr-4 h-6 w-6 rounded-full  flex items-center justify-center">
                                    <img src="{{ asset('assets/images/star-icon.svg') }}" class="h-6 w-6 text-white"
                                        alt="Technical Support Icon">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Right Column: Staggered Feature Cards -->
                <div class="grid grid-cols-2 gap-8">
                    @foreach ($aboutUsFeatures as $feature)
                        <div class="p-8 rounded-2xl text-center"
                            style="border: 1px solid #456c80; {{ $loop->index % 2 == 1 ? 'margin-top: 64px;' : '' }}">
                            <div class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-6"
                                style="background-color: {{ $feature->bg_color ?: '#CCCCCC' }};">
                                <img src="{{ $feature->getFirstMediaUrl('icon') ?: asset('assets/images/products-2-icon.svg') }}"
                                    class="h-10 w-10" alt="{{ $feature->title }}">
                            </div>
                            <h3 class="font-bold text-xl text-white mb-3">{{ $feature->title }}</h3>
                            <p class="text-gray-300 leading-relaxed">{{ $feature->description }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT FORM SECTION -->
    <section id="contact" class="py-20">
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
                                    <img src="{{ asset('assets/images/call-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="Phone Icon" style="filter: brightness(0) invert(1);">
                                </div>
                                <div class="flex flex-col items-start flex-1">
                                    <p class="font-light text-[15px] text-[#F1F2F2] mb-1">رقم الجوال</p>
                                    <div class="flex items-center gap-2">
                                        <a href="tel:{{ $companyInformation->phone }}"
                                            class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2">
                                            <img src="{{ asset('assets/images/copy-icon.svg') }}"
                                                class="h-[19px] w-[19px]" alt="Copy">
                                            {{ $companyInformation->phone }}
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
                                        <a href="mailto:{{ $companyInformation->email }}"
                                            class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2">
                                            <img src="{{ asset('assets/images/copy-icon.svg') }}"
                                                class="h-[19px] w-[19px]" alt="Copy">
                                            {{ $companyInformation->email }}
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
                                        <a href="#" id="show-map-popup"
                                            data-map-url="{{ $companyInformation->map_url ?? 'https://www.google.com/maps?q=24.819742,46.773478&hl=ar&z=15&output=embed' }}"
                                            class="text-[#ffffff] font-semibold text-[15px] flex items-center gap-2 leading-relaxed">
                                            <img src="{{ asset('assets/images/link-icon.svg') }}"
                                                class="h-[19px] w-[19px]" alt="Link">
                                            {{ $companyInformation->address }}
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
                                <a href="{{ $companyInformation->twitter }}"
                                    class="text-[#F1F2F2] hover:text-white transition-colors">
                                    <img src="{{ asset('assets/images/twitter-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="Twitter" style="filter: brightness(0) invert(1);">
                                </a>
                                <a href="{{ $companyInformation->linkedin }}"
                                    class="text-[#F1F2F2] hover:text-white transition-colors">
                                    <img src="{{ asset('assets/images/linkedin-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="LinkedIn" style="filter: brightness(0) invert(1);">
                                </a>
                                <a href="{{ $companyInformation->instagram }}"
                                    class="text-[#F1F2F2] hover:text-white transition-colors">
                                    <img src="{{ asset('assets/images/instagram-icon.svg') }}" class="h-[23px] w-[23px]"
                                        alt="Instagram" style="filter: brightness(0) invert(1);">
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
                                <label for="phone" class="block text-[#1A1A1A] text-[16px] font-medium text-right">رقم
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
                                <input type="email" id="email" name="email" placeholder="ادخل البريد الالكتروني"
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
                                <img src="{{ asset('assets/images/send-icon.svg') }}" alt="Send" class="w-5 h-5">
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('node_modules/intl-tel-input/build/js/intlTelInput.min.js') }}"></script>
    <script>
        // Slider, phone input, and search scripts from original file
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
                    utilsScript: "{{ asset('node_modules/intl-tel-input/build/js/utils.js') }}",
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
@endpush
