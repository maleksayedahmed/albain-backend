@extends('layouts.admin')

@section('title', 'تفاصيل المنتج')
@section('page-title', 'تفاصيل المنتج')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <a href="{{ route('admin.products.edit', $product) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            تعديل
                        </a>
                        <a href="{{ route('admin.products.index') }}"
                            class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            العودة للقائمة
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Product Image -->
                    <div class="space-y-4">
                        @if ($product->getFirstMediaUrl('thumbnail'))
                            <img src="{{ $product->getFirstMediaUrl('thumbnail') }}" alt="{{ $product->name }}"
                                class="w-full h-96 object-cover rounded-lg shadow-sm">
                        @else
                            <div class="w-full h-96 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="mt-4">
                            <h4 class="text-md font-semibold text-gray-900 mb-2">معرض الصور</h4>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                @foreach ($product->getMedia('gallery') as $media)
                                    <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}"
                                        class="w-full h-24 object-cover rounded-lg">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Product Information -->
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">معلومات المنتج</h4>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">اسم المنتج:</span>
                                    <span class="text-sm text-gray-900">{{ $product->name }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">السعر:</span>
                                    <span
                                        class="text-sm font-semibold text-green-600">{{ number_format($product->price, 2) }}
                                        ريال</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">تاريخ الإنشاء:</span>
                                    <span
                                        class="text-sm text-gray-900">{{ $product->created_at->format('Y-m-d H:i') }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">آخر تحديث:</span>
                                    <span
                                        class="text-sm text-gray-900">{{ $product->updated_at->format('Y-m-d H:i') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">الوصف</h4>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Specifications -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-semibold text-gray-900">المواصفات</h4>
                    </div>

                    @if ($product->specifications->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($product->specifications as $spec)
                                <div
                                    class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-sm transition-shadow">
                                    <div class="font-medium text-gray-900">{{ $spec->specification_key }}</div>
                                    <div class="text-sm text-gray-600">{{ $spec->specification_value }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <p class="text-gray-500 text-lg mb-4">لا توجد مواصفات لهذا المنتج</p>
                        </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-8">
                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline-block"
                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟ سيتم حذف جميع المواصفات المرتبطة به أيضاً.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            حذف المنتج
                        </button>
                    </form>
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        تعديل المنتج
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
