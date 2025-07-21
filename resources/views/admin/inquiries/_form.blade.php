<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('الاسم') }}</label>
        <input type="text" name="name" id="name" value="{{ old('name', optional($inquiry)->name) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
            placeholder="{{ __('أدخل الاسم') }}">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('رقم الجوال') }}</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', optional($inquiry)->phone) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror"
            placeholder="{{ __('أدخل رقم الجوال') }}">
        @error('phone')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('البريد الإلكتروني') }}</label>
        <input type="email" name="email" id="email" value="{{ old('email', optional($inquiry)->email) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
            placeholder="{{ __('أدخل البريد الإلكتروني') }}">
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">{{ __('الموضوع') }}</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject', optional($inquiry)->subject) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('subject') border-red-500 @enderror"
            placeholder="{{ __('أدخل الموضوع') }}">
        @error('subject')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('الرسالة') }}</label>
        <textarea name="message" id="message" rows="4"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('message') border-red-500 @enderror"
            placeholder="{{ __('أدخل الرسالة') }}">{{ old('message', optional($inquiry)->message) }}</textarea>
        @error('message')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">{{ __('الحالة') }}</label>
        <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
            @foreach($statuses as $key => $label)
                <option value="{{ $key }}" {{ old('status', optional($inquiry)->status ?? 'new') == $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
