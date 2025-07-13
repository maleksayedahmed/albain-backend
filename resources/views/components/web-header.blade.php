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
                    <div class="flex items-center bg-gray-100 rounded-lg px-3 py-2 ">
                        <input type="text" placeholder="عن ماذا تبحث"
                            class="bg-transparent focus:outline-none text-right w-48 pr-2">
                        <img src="{{ asset('assets/images/search-icon.svg') }}" alt="Search" class="h-5 w-5">
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
