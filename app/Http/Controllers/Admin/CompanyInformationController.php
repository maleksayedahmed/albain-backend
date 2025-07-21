<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInformation;
use Illuminate\Http\Request;

class CompanyInformationController extends Controller
{
    /**
     * Show the form for editing the company information.
     */
    public function edit()
    {
        if (!can('تعديل معلومات الشركة')) abort(403);
        $company = CompanyInformation::first();
        if (!$company) {
            $company = CompanyInformation::create([
                'title' => '',
                'description' => '',
                'phone' => '',
                'email' => '',
                'address' => '',
            ]);
        }
        return view('admin.company_information.edit', compact('company'));
    }

    /**
     * Update the company information in storage.
     */
    public function update(Request $request)
    {
        if (!can('تعديل معلومات الشركة')) abort(403);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'required|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'snapchat' => 'nullable|string|max:255',
            'map_url' => 'nullable|url|starts_with:https://www.google.com/maps/embed?',
        ]);

        $company = CompanyInformation::first();
        $company->update($request->only(['title', 'description', 'phone', 'whatsapp', 'email', 'address', 'twitter', 'linkedin', 'instagram', 'facebook', 'snapchat', 'map_url']));
        if ($request->hasFile('logo')) {
            $company->clearMediaCollection('logo');
            $company->addMedia($request->file('logo'))->toMediaCollection('logo');
        }

        return redirect()->route('admin.company_information.edit')
            ->with('success', 'تم تحديث معلومات الشركة بنجاح');
    }
} 