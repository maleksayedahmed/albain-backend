@extends('layouts.admin')

@section('title', 'الاستفسارات')
@section('page-title', 'الاستفسارات')

@section('content')
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">قائمة الاستفسارات</h3>
                <a href="{{ route('admin.inquiries.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    إضافة استفسار جديد
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الاسم</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">رقم الجوال</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">البريد الإلكتروني</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الموضوع</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الرسالة</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تاريخ الإنشاء</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($inquiries as $inquiry)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->subject }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($inquiry->message, 30) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2 space-x-reverse">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs">عرض</a>
                                <a href="{{ route('admin.inquiries.edit', $inquiry) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">تعديل</a>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الاستفسار؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $inquiries->links() }}
        </div>
    </div>
@endsection 