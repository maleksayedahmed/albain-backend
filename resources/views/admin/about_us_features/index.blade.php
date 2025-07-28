@extends('layouts.admin')

@section('title', 'خصائص من نحن')
@section('page-title', 'خصائص من نحن')

@section('content')
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">قائمة خصائص من نحن</h3>
                @if (can('إضافة ميزة من نحن'))
                    <a href="{{ route('admin.about-us-features.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        إضافة خاصية جديدة
                    </a>
                @endif
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الأيقونة
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">العنوان
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الوصف
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($features as $feature)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center"
                                    style="background-color: {{ $feature->bg_color }};">
                                    <img src="{{ $feature->getFirstMediaUrl('icon') ?: asset('assets/images/products-2-icon.svg') }}"
                                        alt="icon" class="w-8 h-8">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{ $feature->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $feature->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2 space-x-reverse">
                                    @if (can('تعديل ميزة من نحن'))
                                        <a href="{{ route('admin.about-us-features.edit', $feature) }}"
                                            class="text-indigo-600 hover:text-indigo-900 p-1 rounded" title="تعديل">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if (can('حذف ميزة من نحن'))
                                        <form method="POST"
                                            action="{{ route('admin.about-us-features.destroy', $feature) }}"
                                            class="inline-block"
                                            onsubmit="return confirm('هل أنت متأكد من حذف هذه الميزة؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded"
                                                title="حذف">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                            fill="none" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h8M12 8v8" />
                                    </svg>
                                    <p class="text-gray-500 text-lg mb-4">لا توجد خصائص حتى الآن</p>
                                    @if (can('إضافة ميزة من نحن'))
                                        <a href="{{ route('admin.about-us-features.create') }}"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            إضافة خاصية جديدة
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
