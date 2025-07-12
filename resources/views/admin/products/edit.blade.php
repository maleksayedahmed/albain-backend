@extends('layouts.admin')

@section('title', 'تعديل المنتج')
@section('page-title', 'تعديل المنتج')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">تعديل المنتج: {{ $product->name }}</h3>
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

            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
                class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Product Information -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">اسم المنتج</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                placeholder="أدخل اسم المنتج">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">السعر (ريال)</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                                step="0.01" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price') border-red-500 @enderror"
                                placeholder="0.00">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                            <textarea id="description" name="description" rows="6"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                placeholder="أدخل وصف المنتج">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الحالية (الغلاف)</label>
                            @if($product->getFirstMediaUrl('thumbnail'))
                                <img src="{{ $product->getFirstMediaUrl('thumbnail') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-2">
                            @else
                                <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center mb-2">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                            @endif
                            <label class="block text-sm font-medium text-gray-700 mb-2 mt-4">معرض الصور الحالي</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-4">
                                @foreach($product->getMedia('gallery') as $media)
                                    <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" class="w-full h-24 object-cover rounded-lg">
                                @endforeach
                            </div>
                            <label for="images" class="block text-sm font-medium text-gray-700 mb-2">تغيير الصور (الصورة الأولى ستكون الغلاف)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>رفع صور</span>
                                            <input id="images" name="images[]" type="file" class="sr-only" accept="image/*" multiple onchange="previewImages(event)">
                                        </label>
                                        <p class="pr-1">أو اسحب وأفلت</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF حتى 2MB لكل صورة. يمكنك رفع أكثر من صورة.</p>
                                </div>
                            </div>
                            @error('images')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('images.*')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4 hidden"></div>
                        </div>
                    </div>
                </div>

                <!-- Product Specifications -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">المواصفات</h4>
                    <div id="specifications-list">
                        @foreach($product->specifications as $spec)
                        <div class="flex items-center gap-2 mb-2">
                            <input type="text" name="specifications[key][]" value="{{ $spec->specification_key }}" class="w-1/3 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="اسم المواصفة">
                            <input type="text" name="specifications[value][]" value="{{ $spec->specification_value }}" class="w-2/3 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="قيمة المواصفة">
                            <button type="button" class="remove-spec bg-red-500 text-white rounded px-2 py-1 text-xs">حذف</button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-specification" class="mt-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">إضافة مواصفة</button>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-6">
                    <a href="{{ route('admin.products.index') }}"
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

    @push('scripts')
        <script>
            function previewImages(event) {
                const files = event.target.files;
                const previewContainer = document.getElementById('imagePreview');
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
            // Dynamic specifications
            document.getElementById('add-specification').addEventListener('click', function() {
                const list = document.getElementById('specifications-list');
                const div = document.createElement('div');
                div.className = 'flex items-center gap-2 mb-2';
                div.innerHTML = `<input type="text" name="specifications[key][]" class="w-1/3 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="اسم المواصفة">
                <input type="text" name="specifications[value][]" class="w-2/3 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="قيمة المواصفة">
                <button type="button" class="remove-spec bg-red-500 text-white rounded px-2 py-1 text-xs">حذف</button>`;
                list.appendChild(div);
            });
            document.getElementById('specifications-list').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-spec')) {
                    e.target.parentElement.remove();
                }
            });
        </script>
    @endpush
@endsection
