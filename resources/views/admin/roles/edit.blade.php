@extends('layouts.admin')

@section('title', 'تعديل الدور')
@section('page-title', 'تعديل الدور')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">تعديل الدور: {{ $role->name }}</h3>
                    <a href="{{ route('admin.roles.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        العودة للقائمة
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">اسم الدور</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                placeholder="أدخل اسم الدور" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-6 lg:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">الصلاحيات</label>
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        النموذج</th>
                                    <th
                                        class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        إضافة</th>
                                    <th
                                        class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        عرض</th>
                                    <th
                                        class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        تعديل</th>
                                    <th
                                        class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $models = [
                                        'منتج',
                                        'تصنيف',
                                        'استفسار',
                                        'معلومات الشركة',
                                        'محتوى من نحن',
                                        'ميزة من نحن',
                                        'شريك',
                                        'سلايدر',
                                        'تواصل',
                                        'مواصفة المنتج',
                                        'مستخدم',
                                    ];
                                    $actions = ['إضافة', 'عرض', 'تعديل', 'حذف'];
                                @endphp
                                @foreach ($models as $model)
                                    <tr>
                                        <td class="font-bold px-4 py-2">{{ $model }}</td>
                                        @foreach ($actions as $action)
                                            <td class="px-4 py-2 text-center">
                                                <input type="checkbox" name="permissions[]"
                                                    value="{{ $action . ' ' . $model }}"
                                                    {{ in_array($action . ' ' . $model, $role->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-6">
                    <a href="{{ route('admin.roles.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        إلغاء
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
