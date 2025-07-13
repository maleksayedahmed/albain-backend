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
        $partners = Partner::latest()->paginate(20);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->validated());
        if ($request->hasFile('image')) {
            $partner->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.partners.index')->with('success', __('Partner created successfully.'));
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $partner->update($request->validated());
        if ($request->hasFile('image')) {
            $partner->clearMediaCollection('image');
            $partner->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.partners.index')->with('success', __('Partner updated successfully.'));
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', __('Partner deleted successfully.'));
    }
} 