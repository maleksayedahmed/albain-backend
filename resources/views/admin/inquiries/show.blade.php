@extends('layouts.admin')

@section('title', 'تفاصيل الاستفسار')
@section('page-title', 'تفاصيل الاستفسار')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $inquiry->name }}</h3>
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <a href="{{ route('admin.inquiries.edit', $inquiry) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            تعديل
                        </a>
                        <a href="{{ route('admin.inquiries.index') }}"
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
                <div class="mb-4">
                    <strong>الاسم:</strong> {{ $inquiry->name }}
                </div>
                <div class="mb-4">
                    <strong>رقم الجوال:</strong> {{ $inquiry->phone }}
                </div>
                <div class="mb-4">
                    <strong>البريد الإلكتروني:</strong> {{ $inquiry->email }}
                </div>
                <div class="mb-4">
                    <strong>الموضوع:</strong> {{ $inquiry->subject }}
                </div>
                <div class="mb-4">
                    <strong>الرسالة:</strong> {{ $inquiry->message }}
                </div>
                <div class="mb-4">
                    <strong>تاريخ الإنشاء:</strong> {{ $inquiry->created_at->format('Y-m-d H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection 