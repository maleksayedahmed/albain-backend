<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
            <input type="text" name="title" id="title" value="{{ old('title', $slider?->title) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                   placeholder="أدخل عنوان السلايدر" required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
            <textarea name="description" id="description" rows="6"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                      placeholder="أدخل وصف السلايدر" required>{{ old('description', $slider?->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="space-y-6">
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">صورة السلايدر</label>
            <input type="file" name="image" id="image"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
            @if(isset($slider) && $slider->getFirstMediaUrl('image'))
                <img src="{{ $slider->getFirstMediaUrl('image') }}" alt="" class="w-full h-32 object-cover rounded-lg mt-2">
            @endif
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div> 