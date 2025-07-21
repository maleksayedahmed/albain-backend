@extends('layouts.web')

@section('title', 'اتصل بنا - Albain')

@section('head')
    @parent
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
                                            <img src="{{ asset('assets/images/copy-icon.svg') }}" class="h-[19px] w-[19px]"
                                                alt="Copy">
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
                                            <img src="{{ asset('assets/images/copy-icon.svg') }}" class="h-[19px] w-[19px]"
                                                alt="Copy">
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
                                            <img src="{{ asset('assets/images/link-icon.svg') }}" class="h-[19px] w-[19px]"
                                                alt="Link">
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

    <!-- MAP SECTION -->
    <section class="flex justify-center items-center py-8 pb-16 bg-white w-full">
        <div class="w-full max-w-7xl rounded-[23px] overflow-hidden   bg-white">
            <div class="w-full h-[220px] md:h-[280px]">
                @php
                    $mapUrl = $companyInformation->map_url ?? null;
                @endphp
                @if ($mapUrl)
                    <iframe src="{{ $mapUrl }}" width="100%" height="100%" style="border:0; min-height:220px;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @else
                    <iframe src="https://www.google.com/maps?q=24.819742,46.773478&hl=ar&z=15&output=embed" width="100%"
                        height="100%" style="border:0; min-height:220px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif
            </div>
        </div>
    </section>
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

@endsection



@push('scripts')
    <script src="{{ asset('node_modules/intl-tel-input/build/js/intlTelInput.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="{{ route('web.inquiry.store') }}"]');
            const phoneInput = document.querySelector("#phone");
            let iti = null;
            if (phoneInput) {
                iti = window.intlTelInput(phoneInput, {
                    initialCountry: "sa",
                    preferredCountries: ["sa", "ae", "kw", "qa", "bh", "om"],
                    separateDialCode: false,
                    formatOnDisplay: true,
                    nationalMode: true,
                    autoPlaceholder: "aggressive",
                    placeholderNumberType: "MOBILE",
                    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                        return "ادخل رقم الجوال";
                    },
                    utilsScript: "node_modules/intl-tel-input/build/js/utils.js",
                    dropdownContainer: document.body
                });
                // Add custom styling for RTL support
                const dropdown = phoneInput.parentNode.querySelector('.iti__country-list');
                if (dropdown) {
                    dropdown.style.direction = 'rtl';
                    dropdown.style.textAlign = 'right';
                }
            }
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Validate phone number if intl-tel-input is used
                    if (iti && !iti.isValidNumber()) {
                        alert("يرجى إدخال رقم هاتف صحيح");
                        phoneInput.focus();
                        return;
                    }
                    const formData = new FormData(form);
                    if (iti) {
                        formData.set('phone', iti.getNumber());
                    }
                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove any existing popup
                                const oldPopup = document.getElementById('flash-popup');
                                if (oldPopup) oldPopup.remove();
                                // Create the popup
                                const popup = document.createElement('div');
                                popup.id = 'flash-popup';
                                popup.className =
                                    'fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40';
                                popup.innerHTML = `<div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-xs w-full">
                                <div class="text-2xl mb-4 text-[#306A8E]">شكرا لك</div>
                                <div class="text-[#1A1A1A] mb-6">${data.success}</div>
                                <button onclick=\"document.getElementById('flash-popup').remove();\" class=\"bg-[#306A8E] text-white px-6 py-2 rounded-lg hover:bg-[#2a5f7a] transition\">إغلاق</button>
                            </div>`;
                                document.body.appendChild(popup);
                                setTimeout(function() {
                                    if (popup) popup.remove();
                                }, 5000);
                                form.reset();
                                if (iti) iti.setNumber('');
                            } else if (data.errors) {
                                // Show validation errors (optional: display nicely)
                                alert(Object.values(data.errors).join('\n'));
                            }
                        })
                        .catch(() => {
                            alert('حدث خطأ أثناء الإرسال، يرجى المحاولة لاحقاً');
                        });
                });
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
@endpush
