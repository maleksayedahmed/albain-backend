@extends('layouts.admin')

@section('title', 'إضافة استفسار جديد')
@section('page-title', 'إضافة استفسار جديد')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">إضافة استفسار جديد</h3>
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

            <form method="POST" action="{{ route('admin.inquiries.store') }}" class="p-6">
                @csrf
                @include('admin.inquiries._form', ['inquiry' => null])
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection 