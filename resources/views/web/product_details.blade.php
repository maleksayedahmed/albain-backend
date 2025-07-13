@extends('layouts.web')

@section('title', 'تفاصيل المنتج - Albain')

@section('head')
    @parent
    {{-- Add any page-specific styles here if needed --}}
@endsection

@section('content')
    {{-- All original page content goes here, unchanged --}}
    @php
        /* Start of original content */
    @endphp
    <section class="container mx-auto px-4 py-8 md:py-16">
        <div class="flex flex-col lg:flex-row-reverse gap-8 lg:gap-12">
            <div class="flex flex-row lg:flex-col gap-2 md:gap-4 mb-4 lg:mb-0 justify-center lg:justify-start">
                @foreach ($gallery as $media)
                    <button type="button" class="focus:outline-none" onclick="openGalleryModal('{{ $media->getUrl() }}')">
                        <img src="{{ $media->getUrl() }}"
                            class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-lg border border-gray-200"
                            alt="صورة مصغرة" />
                    </button>
                @endforeach
            </div>

            <div class="flex-1 mb-6 lg:mb-0">
                <img src="{{ $gallery->count() ? $gallery->first()->getUrl() : asset('assets/images/product-2.png') }}"
                    class="w-full h-30 object-contain  object-center rounded-2xl" alt="صورة المنتج الرئيسية" />
            </div>

            <div class="flex-1 text-right">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-[#1E2A38] mb-4">{{ $product->name }}
                </h1>
                <p class="text-gray-700 leading-relaxed mb-6 text-sm md:text-base">
                    {{ $product->description }}
                </p>

                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-baseline gap-x-2 text-lg md:text-xl font-bold bg-gray-100 rounded-2xl px-3 py-2">
                        <span class="font-bold flex items-center gap-x-1">
                            {{ $product->price }}
                            <img src="{{ asset('assets/images/suadi-symbol.svg') }}" alt="رمز الريال السعودي"
                                class="h-5 w-5 md:h-6 md:w-6 inline-block" />
                            /
                        </span>
                        <span class="text-xs md:text-base font-medium text-gray-700"> {{ $product->unit }}</span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-3 md:gap-4 mb-8 md:mb-10">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companyInformation->whatsapp) }}"
                        class="flex items-center justify-center gap-2 bg-[#25D366] text-white px-4 md:px-6 py-2 md:py-3 rounded-lg text-base md:text-lg font-medium hover:bg-[#1daa53] transition-colors">
                        <img src="{{ asset('assets/images/whatsapp-call-icon.svg') }}" class="w-5 h-5 md:w-6 md:h-6"
                            alt="واتساب" />
                        تواصل للطلب
                    </a>
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $companyInformation->phone) }}"
                        class="group flex items-center justify-center gap-2 border border-[#0C6D94] text-[#0C6D94] px-4 md:px-6 py-2 md:py-3 rounded-lg text-base md:text-lg font-medium hover:bg-[#306A8E] hover:text-white transition-all duration-300">
                        <img src="{{ asset('assets/images/calling.svg') }}"
                            class="w-4 h-4 md:w-5 md:h-5 block group-hover:hidden" alt="اتصال">
                        <img src="{{ asset('assets/images/calling_white.svg') }}"
                            class="w-4 h-4 md:w-5 md:h-5 hidden group-hover:block" alt="اتصال عند التحويم">
                        اتصال هاتفي
                    </a>
                </div>

                <div class="border-t pt-6">
                    <h2 class="text-lg md:text-xl font-bold text-[#1E2A38] mb-4">وصف المنتج</h2>
                    @if ($product->specifications->count() > 0)
                        <ul class="text-gray-700 space-y-2 list-disc pr-5 text-sm md:text-base">
                            @foreach ($product->specifications as $spec)
                                <li><span class="font-semibold">{{ $spec->specification_key }}:</span>
                                    {{ $spec->specification_value }}</li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-gray-500 text-base py-4">لا توجد مواصفات لهذا المنتج</div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 md:py-20">
        <div class="container mx-auto px-2 md:px-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 md:mb-12 gap-4 md:gap-0">
                <h2 class="text-2xl md:text-4xl font-bold text-right">منتجاتنا</h2>
                <a href="{{ route('web.products') }}"
                    class="border border-[#306A8E] text-[#1E2A38] px-4 md:px-6 py-2 rounded-lg flex items-center text-sm md:text-base">
                    <span>عـرض الـكل</span>
                    <img src="{{ asset('assets/images/arrow-right-icon.svg') }}" class="h-4 w-4 mr-2" alt="">
                </a>
            </div>
            <div
                class="flex gap-4 md:gap-6 overflow-x-auto pb-4 md:grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 md:overflow-visible">
                @foreach ($otherProducts as $product)
                    <div
                        class="flex-none w-64 md:w-auto bg-white rounded-2xl shadow-lg overflow-hidden group min-w-[16rem] md:min-w-0">
                        <img src="{{ $product->getFirstMediaUrl('gallery') ?: asset('assets/images/product-2.png') }}"
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
                                        <span class="text-base font-medium text-gray-700"> {{ $product->unit }}
                                        </span>
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
    @php
        /* End of original content */
    @endphp
@endsection

@push('scripts')
    {{-- All original scripts from the bottom of the file go here --}}
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
@endpush
