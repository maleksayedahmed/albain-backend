<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('اسم الشريك') }}</label>
        <input type="text" name="name" id="name" value="{{ old('name', optional($partner)->name) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
            placeholder="{{ __('أدخل اسم الشريك') }}">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">{{ __('صورة الشريك') }}</label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                        <span>{{ __('رفع صورة') }}</span>
                        <input id="image" name="image" type="file" class="sr-only" accept="image/*" onchange="previewPartnerImage(event)">
                    </label>
                    <p class="pr-1">{{ __('أو اسحب وأفلت') }}</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF حتى 2MB.</p>
            </div>
        </div>
        @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
        <!-- Image Preview -->
        <div id="partnerImagePreview" class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4 hidden"></div>
        @if(isset($partner) && $partner && $partner->getFirstMediaUrl('image'))
            <div class="mt-2">
                <img src="{{ $partner->getFirstMediaUrl('image') }}" alt="{{ $partner->name }}" class="h-24 rounded-lg object-cover">
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function previewPartnerImage(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('partnerImagePreview');
        previewContainer.innerHTML = '';
        if (files.length > 0) {
            previewContainer.classList.remove('hidden');
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-32 object-cover rounded-lg';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        } else {
            previewContainer.classList.add('hidden');
        }
    }
</script>
@endpush 