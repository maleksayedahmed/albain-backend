@extends('layouts.admin')

@section('title', 'تفاصيل الدور')
@section('page-title', 'تفاصيل الدور')

@section('content')
    <div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $role->name }}</h3>
                    <a href="{{ route('admin.roles.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        العودة للقائمة
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <div>
                        <h4 class="text-md font-semibold text-gray-900 mb-2">معلومات الدور</h4>
                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-500">اسم الدور:</span>
                            <span class="text-sm text-gray-900">{{ $role->name }}</span>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-md font-semibold text-gray-900 mb-2">الصلاحيات</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($role->permissions as $permission)
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $permission->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-4 space-x-reverse pt-6 border-t border-gray-200 mt-8">
                    <a href="{{ route('admin.roles.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        العودة للقائمة
                    </a>
                    <a href="{{ route('admin.roles.edit', $role) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        تعديل الدور
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 