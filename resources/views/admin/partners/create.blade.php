@extends('layouts.admin')

@section('title', __('إضافة شريك جديد'))
@section('page-title', __('إضافة شريك جديد'))

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">{{ __('إضافة شريك جديد') }}</h3>
                    <a href="{{ route('admin.partners.index') }}"
                        class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        {{ __('العودة للقائمة') }}
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.partners.store') }}" class="p-6" enctype="multipart/form-data">
                @csrf
                @include('admin.partners._form', ['partner' => null])
                <div class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-6">
                    <a href="{{ route('admin.partners.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        {{ __('إلغاء') }}
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        {{ __('حفظ الشريك') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
