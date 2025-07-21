<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Http\Requests\Admin\PartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        if (!can('عرض شريك')) abort(403);
        $partners = Partner::latest()->paginate(20);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        if (!can('إضافة شريك')) abort(403);
        return view('admin.partners.create');
    }

    public function store(PartnerRequest $request)
    {
        if (!can('إضافة شريك')) abort(403);
        $partner = Partner::create($request->validated());
        if ($request->hasFile('image')) {
            $partner->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.partners.index')->with('success', __('Partner created successfully.'));
    }

    public function edit(Partner $partner)
    {
        if (!can('تعديل شريك')) abort(403);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        if (!can('تعديل شريك')) abort(403);
        $partner->update($request->validated());
        if ($request->hasFile('image')) {
            $partner->clearMediaCollection('image');
            $partner->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.partners.index')->with('success', __('Partner updated successfully.'));
    }

    public function destroy(Partner $partner)
    {
        if (!can('حذف شريك')) abort(403);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', __('Partner deleted successfully.'));
    }
} 