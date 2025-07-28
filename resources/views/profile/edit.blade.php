@extends('layouts.admin')

@section('title', 'الملف الشخصي')
@section('page-title', 'الملف الشخصي')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Profile Information Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">معلومات الملف الشخصي</h3>
                <p class="mt-1 text-sm text-gray-600">قم بتحديث معلومات حسابك وعنوان البريد الإلكتروني.</p>
            </div>
            <div class="p-6">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">تحديث كلمة المرور</h3>
                <p class="mt-1 text-sm text-gray-600">تأكد من استخدام كلمة مرور طويلة وعشوائية للحفاظ على أمان حسابك.</p>
            </div>
            <div class="p-6">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete Account Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">حذف الحساب</h3>
                <p class="mt-1 text-sm text-gray-600">بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائياً.</p>
            </div>
            <div class="p-6">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
