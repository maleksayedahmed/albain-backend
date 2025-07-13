<div class="space-y-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
        <input type="text" name="title" id="title" value="{{ old('title', $feature->title ?? '') }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
            placeholder="أدخل العنوان" required>
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
        <textarea name="description" id="description" rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
            placeholder="أدخل الوصف" required>{{ old('description', $feature->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="bg_color" class="block text-sm font-medium text-gray-700 mb-2">لون خلفية الأيقونة</label>
        <input type="color" name="bg_color" id="bg_color" value="{{ old('bg_color', $feature->bg_color ?? '#ffffff') }}"
            class="w-16 h-10 p-0 border-0 focus:ring-2 focus:ring-blue-500 focus:border-transparent rounded-lg align-middle">
        @if(isset($feature) && $feature->bg_color)
            <span class="ml-2 align-middle">{{ $feature->bg_color }}</span>
        @endif
        @error('bg_color')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">الأيقونة</label>
        <input type="file" name="icon" id="icon"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('icon') border-red-500 @enderror">
        @if(isset($feature) && $feature->getFirstMediaUrl('icon'))
            <div class="mt-2">
                <img src="{{ $feature->getFirstMediaUrl('icon') }}" alt="icon" class="w-16 h-16 rounded border"
                    style="background: {{ $feature->bg_color ?? '#fff' }};">
            </div>
        @endif
        @error('icon')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div> 