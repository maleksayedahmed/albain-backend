@extends('layouts.web')

@section('title', 'منتجاتنا - Albain')

@section('head')
    @parent
    {{-- Add any page-specific styles here if needed --}}
@endsection

@section('content')
    {{-- All original page content goes here, unchanged --}}
    @php
        /* Start of original content */
    @endphp
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






    
    <!-- JAVASCRIPT -->
    <script src="node_modules/intl-tel-input/build/js/intlTelInput.min.js"></script>
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
    @php
        /* End of original content */
    @endphp
@endsection

@push('scripts')
    {{-- All original scripts from the bottom of the file go here --}}
@endpush
