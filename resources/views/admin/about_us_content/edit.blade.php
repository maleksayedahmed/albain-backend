@extends('layouts.admin')

@section('title', 'تعديل قسم من نحن')
@section('page-title', 'تعديل قسم من نحن')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">تعديل قسم من نحن</h3>
                    <a href="{{ route('admin.about_us_content.edit') }}"
                        class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        العودة للقائمة
                    </a>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.about_us_content.update') }}" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">العنوان الرئيسي</label>
                        <input type="text" name="section_title" value="{{ old('section_title', $about->section_title) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('section_title') border-red-500 @enderror"
                            required>
                        @error('section_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الفقرة الأولى</label>
                        <textarea name="paragraph_1" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('paragraph_1') border-red-500 @enderror"
                            required>{{ old('paragraph_1', $about->paragraph_1) }}</textarea>
                        @error('paragraph_1')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الفقرة الثانية</label>
                        <textarea name="paragraph_2" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('paragraph_2') border-red-500 @enderror">{{ old('paragraph_2', $about->paragraph_2) }}</textarea>
                        @error('paragraph_2')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الفقرة الثالثة</label>
                        <textarea name="paragraph_3" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('paragraph_3') border-red-500 @enderror">{{ old('paragraph_3', $about->paragraph_3) }}</textarea>
                        @error('paragraph_3')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    @php
                        $listItemsOld = old('list_items');
                        if (is_array($listItemsOld)) {
                            $listItemsValue = implode("\n", $listItemsOld);
                        } elseif (is_string($listItemsOld)) {
                            $listItemsValue = $listItemsOld;
                        } else {
                            $listItemsValue = is_array(json_decode($about->list_items, true))
                                ? implode("\n", json_decode($about->list_items, true))
                                : '';
                        }
                    @endphp
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">عناصر القائمة (كل عنصر في سطر
                            منفصل)</label>
                        <textarea name="list_items" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('list_items') border-red-500 @enderror">{{ $listItemsValue }}</textarea>
                        <small class="text-gray-500">اكتب كل عنصر في سطر منفصل.</small>
                        @error('list_items')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-6">
                    <a href="{{ route('admin.about_us_content.edit') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        إلغاء
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
