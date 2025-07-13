@extends('layouts.admin')

@section('title', __('معلومات الشركة'))
@section('page-title', __('معلومات الشركة'))

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 flex flex-col md:flex-row" x-data="{ tab: 'basic' }">
            <div
                class="md:w-1/4 border-b md:border-b-0 md:border-r border-gray-200 bg-gray-50 p-0 md:p-6 flex flex-row md:flex-col">
                <nav class="flex md:flex-col w-full" aria-label="Tabs">
                    <button type="button" @click="tab = 'basic'"
                        :class="tab === 'basic' ? 'bg-blue-100 text-blue-700' : 'text-gray-700'" data-tab="basic"
                        class="w-full px-4 py-3 text-right rounded-none md:rounded-r-lg font-medium focus:outline-none transition">{{ __('المعلومات الأساسية') }}</button>
                    <button type="button" @click="tab = 'contact'"
                        :class="tab === 'contact' ? 'bg-blue-100 text-blue-700' : 'text-gray-700'" data-tab="contact"
                        class="w-full px-4 py-3 text-right rounded-none md:rounded-r-lg font-medium focus:outline-none transition">{{ __('معلومات التواصل') }}</button>
                    <button type="button" @click="tab = 'social'"
                        :class="tab === 'social' ? 'bg-blue-100 text-blue-700' : 'text-gray-700'" data-tab="social"
                        class="w-full px-4 py-3 text-right rounded-none md:rounded-r-lg font-medium focus:outline-none transition">{{ __('روابط التواصل الاجتماعي') }}</button>
                </nav>
            </div>
            <form method="POST" action="{{ route('admin.company_information.update') }}" class="flex-1 p-6"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full">
                    <div x-show="tab === 'basic'">
                        <div class="space-y-6">
                            <div>
                                <label for="logo"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('شعار الشركة') }}</label>
                                @if ($company->getFirstMediaUrl('logo'))
                                    <img src="{{ $company->getFirstMediaUrl('logo') }}" alt="Logo" class="h-20 mb-2">
                                @endif
                                <input type="file" name="logo" id="logo" accept="image/*"
                                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('logo') border-red-500 @enderror">
                                @error('logo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('اسم الشركة') }}</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $company->title) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل اسم الشركة') }}">
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('وصف الشركة') }}</label>
                                <textarea name="description" id="description" rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل وصف الشركة') }}">{{ old('description', $company->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div>
                                <label for="address"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('العنوان') }}</label>
                                <textarea name="address" id="address" rows="2"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل العنوان') }}">{{ old('address', $company->address) }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div x-show="tab === 'contact'">
                        <div class="space-y-6">
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رقم الجوال') }}</label>
                                <input type="text" name="phone" id="phone"
                                    value="{{ old('phone', $company->phone) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رقم الجوال') }}">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="whatsapp"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رقم الواتساب') }}</label>
                                <input type="text" name="whatsapp" id="whatsapp"
                                    value="{{ old('whatsapp', $company->whatsapp) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('whatsapp') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رقم الواتساب') }}">
                                @error('whatsapp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('البريد الإلكتروني') }}</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $company->email) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل البريد الإلكتروني') }}">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="map_url"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رابط الخريطة (Google Maps Embed URL)') }}</label>
                                <input type="text" name="map_url" id="map_url"
                                    value="{{ old('map_url', $company->map_url) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('map_url') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رابط الخريطة (Google Maps Embed URL)') }}">
                                <small class="text-gray-500">
                                    <strong>خطوات الحصول على رابط الخريطة:</strong><br>
                                    1. افتح <a href="https://maps.google.com" target="_blank"
                                        class="text-blue-600 underline">Google Maps</a>.<br>
                                    2. ابحث عن موقع الشركة.<br>
                                    3. اضغط على زر <b>مشاركة</b> ثم اختر <b>تضمين خريطة</b>.<br>
                                    4. انسخ الرابط من خاصية <b>src</b> في كود الـ &lt;iframe&gt; (يبدأ بـ
                                    <code>https://www.google.com/maps/embed?pb=...</code>).<br>
                                    5. الصق الرابط هنا (لا تقم بلصق كود الـ &lt;iframe&gt; بالكامل).<br>
                                    <span class="text-red-500">ملاحظة: يجب أن يكون الرابط يبدأ بـ
                                        <code>https://www.google.com/maps/embed?</code></span>
                                </small>
                                @error('map_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div x-show="tab === 'social'">
                        <div class="space-y-6">
                            <div>
                                <label for="twitter"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رابط تويتر') }}</label>
                                <input type="text" name="twitter" id="twitter"
                                    value="{{ old('twitter', $company->twitter) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('twitter') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رابط تويتر') }}">
                                @error('twitter')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="linkedin"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رابط لينكدإن') }}</label>
                                <input type="text" name="linkedin" id="linkedin"
                                    value="{{ old('linkedin', $company->linkedin) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('linkedin') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رابط لينكدإن') }}">
                                @error('linkedin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="instagram"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رابط انستجرام') }}</label>
                                <input type="text" name="instagram" id="instagram"
                                    value="{{ old('instagram', $company->instagram) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('instagram') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رابط انستجرام') }}">
                                @error('instagram')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="facebook"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رابط فيسبوك') }}</label>
                                <input type="text" name="facebook" id="facebook"
                                    value="{{ old('facebook', $company->facebook) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('facebook') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رابط فيسبوك') }}">
                                @error('facebook')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="snapchat"
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ __('رابط سناب شات') }}</label>
                                <input type="text" name="snapchat" id="snapchat"
                                    value="{{ old('snapchat', $company->snapchat) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('snapchat') border-red-500 @enderror"
                                    placeholder="{{ __('أدخل رابط سناب شات') }}">
                                @error('snapchat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-6">
                        <a href="{{ url()->previous() }}"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            {{ __('إلغاء') }}
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            {{ __('تحديث') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
