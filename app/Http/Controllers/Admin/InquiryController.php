<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!can('عرض استفسار')) abort(403);
        $statuses = [
            'new' => 'جديد',
            'in_progress' => 'قيد المعالجة',
            'resolved' => 'تم الحل',
            'closed' => 'مغلق',
        ];
        $query = Inquiry::query();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $inquiries = $query->latest()->paginate(10);
        return view('admin.inquiries.index', compact('inquiries', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!can('إضافة استفسار')) abort(403);
        $statuses = [
            'new' => 'جديد',
            'in_progress' => 'قيد المعالجة',
            'resolved' => 'تم الحل',
            'closed' => 'مغلق',
        ];
        return view('admin.inquiries.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!can('إضافة استفسار')) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|in:new,in_progress,resolved,closed',
        ]);

        Inquiry::create($request->only(['name', 'phone', 'email', 'subject', 'message', 'status']));

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'تم إنشاء الاستفسار بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        if (!can('عرض استفسار')) abort(403);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        if (!can('تعديل استفسار')) abort(403);
        $statuses = [
            'new' => 'جديد',
            'in_progress' => 'قيد المعالجة',
            'resolved' => 'تم الحل',
            'closed' => 'مغلق',
        ];
        return view('admin.inquiries.edit', compact('inquiry', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        if (!can('تعديل استفسار')) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|in:new,in_progress,resolved,closed',
        ]);

        $inquiry->update($request->only(['name', 'phone', 'email', 'subject', 'message', 'status']));

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'تم تحديث الاستفسار بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        if (!can('حذف استفسار')) abort(403);
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')
            ->with('success', 'تم حذف الاستفسار بنجاح');
    }
} 