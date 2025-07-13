<!-- Bottom Navigation Bar for Mobile (Figma style) -->
<nav class="fixed bottom-4 left-1/2 transform -translate-x-1/2 z-50 bg-white rounded-[33px] shadow-lg border border-gray-200 md:hidden flex justify-between items-center px-6 py-2"
    style="width: 90%; max-width: 370px; height: 77px;">
    <!-- About/Who We Are -->
    <a href="{{ route('web.who_us') }}"
        class="flex flex-col items-center flex-1 py-2 font-normal {{ request()->routeIs('web.who_us') ? 'bg-[#306A8E] text-white rounded-[14px]' : 'text-[#0C0C0C]' }}"
        style="font-family: 'MadaniArabic-Regular', sans-serif;">
        <img src="{{ asset('assets/images/who-us-icon.svg') }}" alt="About"
            class="h-7 w-7 mb-1 {{ request()->routeIs('web.who_us') ? 'filter invert brightness-0' : '' }}">
        <span class="{{ request()->routeIs('web.who_us') ? 'text-sm' : 'text-xs' }}">من نحن</span>
    </a>
    <!-- Home (center, now matching siblings) -->
    <a href="{{ route('web.home') }}"
        class="flex flex-col items-center flex-1 py-2 font-bold {{ request()->routeIs('web.home') ? 'bg-[#306A8E] text-white rounded-[14px]' : 'text-[#0C0C0C]' }}"
        style="font-family: 'MadaniArabic-Medium', sans-serif;">
        <img src="{{ asset('assets/images/home-2-icon.svg') }}" alt="Home"
            class="h-7 w-7 mb-1 {{ request()->routeIs('web.home') ? 'filter invert brightness-0' : 'filter invert-0' }}">
        <span class="{{ request()->routeIs('web.home') ? 'text-sm' : 'text-xs' }}">الرئيسية</span>
    </a>
    <!-- Products -->
    <a href="{{ route('web.products') }}"
        class="flex flex-col items-center flex-1 py-2 font-normal {{ request()->routeIs('web.products') ? 'bg-[#306A8E] text-white rounded-[14px]' : 'text-[#0C0C0C]' }}"
        style="font-family: 'MadaniArabic-Regular', sans-serif;">
        <img src="{{ asset('assets/images/products-2-icon.svg') }}" alt="Products"
            class="h-7 w-7 mb-1 {{ request()->routeIs('web.products') ? 'filter invert brightness-0' : '' }}">
        <span class="{{ request()->routeIs('web.products') ? 'text-sm' : 'text-xs' }}">منتجاتنا</span>
    </a>
</nav>
<!-- End Figma-style Mobile Navbar -->
