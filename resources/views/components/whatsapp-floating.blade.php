<!-- Floating WhatsApp Button -->
<!-- Floating Contact Buttons -->
<div class="fixed bottom-24 left-6 z-40">
    <!-- Main Toggle Button -->
    <button id="contact-toggle" 
        class="w-16 h-16 rounded-full bg-[#2AA25A] flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300">
        <img src="{{ asset('assets/images/whatsapp-call-icon.svg') }}" alt="Contact" class="h-9 w-9">
    </button>
    
    <!-- Floating Options (Hidden by default) -->
    <div id="contact-options" class="absolute bottom-20 left-0 space-y-3 opacity-0 invisible transform translate-y-4 transition-all duration-300">
        <!-- WhatsApp Button -->
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companyInformation->whatsapp) }}" target="_blank" rel="noopener"
            class="flex items-center justify-center w-14 h-14 rounded-full bg-[#2AA25A] shadow-lg transform hover:scale-110 transition-transform duration-300">
            <img src="{{ asset('assets/images/whatsapp-call-icon.svg') }}" alt="WhatsApp" class="h-8 w-8">
        </a>
        
        <!-- Phone Call Button -->
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $companyInformation->phone) }}"
            class="flex items-center justify-center w-14 h-14 rounded-full bg-[#306A8E] shadow-lg transform hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('contact-toggle');
    const contactOptions = document.getElementById('contact-options');
    let isOpen = false;

    toggleButton.addEventListener('click', function() {
        if (isOpen) {
            // Close
            contactOptions.classList.add('opacity-0', 'invisible', 'translate-y-4');
            contactOptions.classList.remove('opacity-100', 'visible', 'translate-y-0');
            toggleButton.style.transform = 'rotate(0deg)';
        } else {
            // Open
            contactOptions.classList.remove('opacity-0', 'invisible', 'translate-y-4');
            contactOptions.classList.add('opacity-100', 'visible', 'translate-y-0');
            toggleButton.style.transform = 'rotate(45deg)';
        }
        isOpen = !isOpen;
    });

    // Close when clicking outside
    document.addEventListener('click', function(event) {
        if (!toggleButton.contains(event.target) && !contactOptions.contains(event.target)) {
            if (isOpen) {
                contactOptions.classList.add('opacity-0', 'invisible', 'translate-y-4');
                contactOptions.classList.remove('opacity-100', 'visible', 'translate-y-0');
                toggleButton.style.transform = 'rotate(0deg)';
                isOpen = false;
            }
        }
    });
});
</script>
