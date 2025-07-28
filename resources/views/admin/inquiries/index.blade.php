@extends('layouts.admin')

@section('title', __('الاستفسارات'))
@section('page-title', __('الاستفسارات'))

@section('content')
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">{{ __('قائمة الاستفسارات') }}</h3>
                @if (can('إضافة استفسار'))
                    <a href="{{ route('admin.inquiries.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        {{ __('إضافة استفسار جديد') }}
                    </a>
                @endif
            </div>
        </div>
        <div class="overflow-x-auto">
            <form method="GET" class="mb-4 flex items-center gap-2">
                <label for="status" class="text-sm font-medium">الحالة:</label>
                <select name="status" id="status" onchange="this.form.submit()" class="border rounded px-2 py-1">
                    <option value="">الكل</option>
                    @foreach ($statuses as $key => $label)
                        <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                            {{ $label }}</option>
                    @endforeach
                </select>
            </form>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('الاسم') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('رقم الجوال والبريد الإلكتروني') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('الموضوع') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('الحالة') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('تاريخ الإنشاء') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('الإجراءات') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($inquiries as $inquiry)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">
                                    <div class="text-gray-900">{{ $inquiry->phone }}</div>
                                    <div class="text-gray-500">{{ $inquiry->email }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->subject }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $badgeColors = [
                                        'new' => 'bg-blue-100 text-blue-800',
                                        'in_progress' => 'bg-yellow-100 text-yellow-800',
                                        'resolved' => 'bg-green-100 text-green-800',
                                        'closed' => 'bg-gray-200 text-gray-800',
                                    ];
                                    $color = $badgeColors[$inquiry->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">
                                    {{ $statuses[$inquiry->status] ?? $inquiry->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2 space-x-reverse">
                                    @if (can('عرض استفسار'))
                                        <a href="{{ route('admin.inquiries.show', $inquiry) }}"
                                            class="text-indigo-600 hover:text-indigo-900 p-1 rounded"
                                            title="{{ __('عرض') }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if (can('تعديل استفسار'))
                                        <a href="{{ route('admin.inquiries.edit', $inquiry) }}"
                                            class="text-indigo-600 hover:text-indigo-900 p-1 rounded"
                                            title="{{ __('تعديل') }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if (can('حذف استفسار'))
                                        <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('{{ __('هل أنت متأكد من حذف هذا الاستفسار؟') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded"
                                                title="{{ __('حذف') }}">
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
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <p class="text-gray-500 text-lg mb-4">{{ __('لا يوجد استفسارات حتى الآن') }}</p>
                                    @if (can('إضافة استفسار'))
                                        <a href="{{ route('admin.inquiries.create') }}"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                            {{ __('إضافة استفسار جديد') }}
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($inquiries->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $inquiries->links() }}
            </div>
        @endif
    </div>
@endsection
