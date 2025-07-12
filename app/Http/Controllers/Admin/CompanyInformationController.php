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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
        ]);

        $company = CompanyInformation::first();
        $company->update($request->only(['title', 'description', 'phone', 'email', 'address']));

        return redirect()->route('admin.company_information.edit')
            ->with('success', 'تم تحديث معلومات الشركة بنجاح');
    }
} 