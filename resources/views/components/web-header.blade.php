<header class="bg-white sticky top-0 z-50 border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3 flex-row-reverse">
            <!-- Left side elements -->
            <div class="hidden md:flex items-center gap-x-4 flex-row-reverse">
                <a href="{{ route('web.contact_us') }}"
                    class="flex bg-gradient-to-r from-[#306A8E] to-[#0E1E28] text-white px-5 py-2.5 rounded-lg items-center gap-x-2 whitespace-nowrap hover:shadow-lg transition-all duration-300">
                    <img src="{{ asset('assets/images/whatsapp-icon.svg') }}" alt="WhatsApp" class="h-6 w-6">
                    <span>اتصل بنا</span>
                </a>
                <div class="relative">
                    <form action="{{ route('web.products') }}" method="get"
                        class="flex items-center bg-gray-100 rounded-lg px-3 py-2 ">
                        <input type="text" name="q" id="ajax-search-input" placeholder="عن ماذا تبحث"
                            class="bg-transparent focus:outline-none text-right w-48 pr-2" value="{{ request('q') }}"
                            autocomplete="off">
                        <button type="submit" style="background: none; border: none; padding: 0; margin: 0;">
                            <img src="{{ asset('assets/images/search-icon.svg') }}" alt="Search" class="h-5 w-5">
                        </button>
                    </form>
                    <!-- AJAX search results dropdown -->
                    <div id="ajax-search-results"
                        class="absolute right-0 mt-2 w-full bg-white border border-gray-200 rounded-lg shadow-lg z-50 hidden max-h-72 overflow-y-auto text-right">
                    </div>
                </div>
            </div>
            <!-- Right side elements -->
            <div class="flex items-center gap-x-12 flex-row-reverse">
                <nav class="hidden md:flex items-center gap-x-8 flex-row-reverse">
                    <a href="{{ route('web.who_us') }}"
                        class="{{ request()->routeIs('web.who_us') ? 'text-blue-700 font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]' : 'text-gray-800 hover:text-blue-600 font-medium transition-colors' }}">من
                        نحن</a>
                    <a href="{{ route('web.products') }}"
                        class="{{ request()->routeIs('web.products') ? 'text-blue-700 font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]' : 'text-gray-800 hover:text-blue-600 font-medium transition-colors' }}">منتجاتنا</a>
                    <a href="{{ route('web.home') }}"
                        class="{{ request()->routeIs('web.home') ? 'text-blue-700 font-bold relative pb-2 after:content-[\'\'] after:absolute after:bottom-0 after:right-0 after:w-1/2 after:h-0.5 after:bg-gradient-to-r after:from-[#29698C] after:to-[#4AA0B6]' : 'text-gray-800 hover:text-blue-600 font-medium transition-colors' }}">الرئيسية</a>
                </nav>
                <div class="flex-shrink-0">
                    <a href="#">
                        <img src="{{ $companyInformation->getFirstMediaUrl('logo') ?: asset('assets/images/logo.svg') }}"
                            alt="Albain Logo" class="h-16">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('ajax-search-input');
        const resultsBox = document.getElementById('ajax-search-results');
        let debounceTimeout = null;

        if (searchInput && resultsBox) {
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                clearTimeout(debounceTimeout);
                if (query.length < 2) {
                    resultsBox.innerHTML = '';
                    resultsBox.classList.add('hidden');
                    return;
                }
                debounceTimeout = setTimeout(function() {
                    fetch(
                            `{{ route('web.products.ajax_search') }}?q=${encodeURIComponent(query)}`
                            )
                        .then(response => response.json())
                        .then(data => {
                            if (Array.isArray(data.products) && data.products.length > 0) {
                                resultsBox.innerHTML = data.products.map(item =>
                                    `<a href="/product/${item.id}" class="block px-4 py-3 hover:bg-gray-100 border-b last:border-b-0 border-gray-100 flex items-center gap-3 text-right">
                                        <img src="${item.get_first_media_url}" alt="${item.name}" class="w-12 h-12 object-contain rounded shadow-sm border">
                                        <div class="flex-1">
                                            <div class="font-bold text-base text-gray-900">${item.name}</div>
                                            <div class="text-[#888] text-sm mt-1">${item.price} ريال</div>
                                        </div>
                                    </a>`
                                ).join('');
                                resultsBox.classList.remove('hidden');
                            } else {
                                resultsBox.innerHTML =
                                    '<div class="px-4 py-2 text-gray-500">لا توجد نتائج</div>';
                                resultsBox.classList.remove('hidden');
                            }
                        })
                        .catch(() => {
                            resultsBox.innerHTML =
                                '<div class="px-4 py-2 text-red-500">حدث خطأ في البحث</div>';
                            resultsBox.classList.remove('hidden');
                        });
                }, 300);
            });
            // Hide results when clicking outside
            document.addEventListener('click', function(e) {
                if (!resultsBox.contains(e.target) && e.target !== searchInput) {
                    resultsBox.classList.add('hidden');
                }
            });
        }
    });
</script>
