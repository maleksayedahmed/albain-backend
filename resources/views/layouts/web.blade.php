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


    </main>

    @include('components.mobile-navbar')
    @include('components.whatsapp-floating')
    <x-web-footer />
    @stack('scripts')

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
