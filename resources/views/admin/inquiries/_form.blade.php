<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">الاسم</label>
        <input type="text" name="name" id="name" value="{{ old('name', optional($inquiry)->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('name')
            <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">رقم الجوال</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', optional($inquiry)->phone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('phone')
            <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
        <input type="email" name="email" id="email" value="{{ old('email', optional($inquiry)->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('email')
            <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">الموضوع</label>
        <input type="text" name="subject" id="subject" value="{{ old('subject', optional($inquiry)->subject) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('subject')
            <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">الرسالة</label>
        <textarea name="message" id="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('message', optional($inquiry)->message) }}</textarea>
        @error('message')
            <span class="text-red-600 text-xs">{{ $message }}</span>
        @enderror
    </div>
</div> 