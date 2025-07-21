<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Albain')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('node_modules/intl-tel-input/build/css/intlTelInput.css') }}">
    @stack('styles')
    @yield('head')
</head>

<body class="bg-white">
    <x-web-header />
    <main>
        @yield('content')

        @if (session('success'))
            <div id="flash-popup" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
                <div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-xs w-full">
                    <div class="text-2xl mb-4 text-[#306A8E]">شكرا لك</div>
                    <div class="text-[#1A1A1A] mb-6">{!! session('success') !!}</div>
                    <button onclick="document.getElementById('flash-popup').remove();"
                        class="bg-[#306A8E] text-white px-6 py-2 rounded-lg hover:bg-[#2a5f7a] transition">إغلاق</button>
                </div>
            </div>
            <script>
                setTimeout(function() {
                    var popup = document.getElementById('flash-popup');
                    if (popup) popup.remove();
                }, 5000);
            </script>
        @endif

        <!-- Map Popup Modal -->
        <div id="map-popup" class="fixed inset-0 z-50 bg-black bg-opacity-40 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-0 max-w-2xl w-full relative">
                <button id="close-map-popup"
                    class="absolute top-2 left-2 text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
                <iframe id="map-popup-iframe" src="" width="600" height="400"
                    style="border:0; min-height:300px; width:100%; border-radius: 0 0 0.5rem 0.5rem;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </main>

    @include('components.mobile-navbar')
    @include('components.whatsapp-floating')
    <x-web-footer />
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form[action="{{ route('web.inquiry.store') }}"]').forEach(function(form) {

                // Prevent double binding
                if (form.dataset.ajaxified) return;
                form.dataset.ajaxified = 'true';

                let iti = null;
                const phoneInput = form.querySelector('#phone');

                if (window.intlTelInput && phoneInput) {
                    iti = window.intlTelInput(phoneInput, {
                        initialCountry: "sa",
                        preferredCountries: ["sa", "ae", "kw", "qa", "bh", "om"],
                        separateDialCode: false,
                        formatOnDisplay: true,
                        nationalMode: true,
                        autoPlaceholder: "aggressive",
                        placeholderNumberType: "MOBILE",
                        customPlaceholder: function(selectedCountryPlaceholder,
                            selectedCountryData) {
                            return "ادخل رقم الجوال";
                        },
                        utilsScript: "node_modules/intl-tel-input/build/js/utils.js",
                        dropdownContainer: document.body
                    });

                    const dropdown = phoneInput.parentNode.querySelector('.iti__country-list');
                    if (dropdown) {
                        dropdown.style.direction = 'rtl';
                        dropdown.style.textAlign = 'right';
                    }
                }

                // Form submit handler
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

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
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove old popup
                                const oldPopup = document.getElementById('flash-popup');
                                if (oldPopup) oldPopup.remove();

                                // Create new popup
                                const popup = document.createElement('div');
                                popup.id = 'flash-popup';
                                popup.className =
                                    'fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40';
                                popup.innerHTML = `
                                <div class="bg-white rounded-lg shadow-lg p-8 text-center max-w-xs w-full">
                                    <div class="text-2xl mb-4 text-[#306A8E]">شكرا لك</div>
                                    <div class="text-[#1A1A1A] mb-6">${data.success}</div>
                                    <button type="button" class="flash-popup-close bg-[#306A8E] text-white px-6 py-2 rounded-lg hover:bg-[#2a5f7a] transition">إغلاق</button>
                                </div>
                            `;
                                document.body.appendChild(popup);

                                // Close popup on button click
                                popup.querySelector('.flash-popup-close').addEventListener(
                                    'click',
                                    function() {
                                        popup.remove();
                                    });

                                // Optional: clear form
                                form.reset();
                            } else if (data.errors) {
                                alert("حدث خطأ أثناء الإرسال، يرجى التحقق من البيانات.");
                            }
                        })
                        .catch(error => {
                            console.error("AJAX error:", error);
                            alert("فشل في إرسال البيانات. حاول مرة أخرى.");
                        });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var showMapBtn = document.getElementById('show-map-popup');
            var mapPopup = document.getElementById('map-popup');
            var closeMapBtn = document.getElementById('close-map-popup');
            var mapIframe = document.getElementById('map-popup-iframe');

            if (showMapBtn && mapPopup && closeMapBtn && mapIframe) {
                showMapBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var mapUrl = showMapBtn.getAttribute('data-map-url');
                    mapIframe.src = mapUrl;
                    mapPopup.classList.remove('hidden');
                });

                closeMapBtn.addEventListener('click', function() {
                    mapPopup.classList.add('hidden');
                    mapIframe.src = '';
                });

                // Optional: close popup when clicking outside the modal
                mapPopup.addEventListener('click', function(e) {
                    if (e.target === mapPopup) {
                        mapPopup.classList.add('hidden');
                        mapIframe.src = '';
                    }
                });
            }
        });
    </script>
