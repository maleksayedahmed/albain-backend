<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsFeature;
use App\Http\Requests\Admin\AboutUsFeatureRequest;
use Illuminate\Http\Request;

class AboutUsFeatureController extends Controller
{
    public function index()
    {
        $features = AboutUsFeature::latest()->get();
        return view('admin.about_us_features.index', compact('features'));
    }

    public function create()
    {
        $feature = new AboutUsFeature();
        return view('admin.about_us_features.create', compact('feature'));
    }

    public function store(AboutUsFeatureRequest $request)
    {
        $feature = AboutUsFeature::create($request->only(['title', 'description' , 'bg_color']));
        if ($request->hasFile('icon')) {
            $feature->addMedia($request->file('icon'))->toMediaCollection('icon');
        }
        return redirect()->route('admin.about-us-features.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(AboutUsFeature $about_us_feature)
    {
        $feature = $about_us_feature;
        return view('admin.about_us_features.edit', compact('feature'));
    }

    public function update(AboutUsFeatureRequest $request, AboutUsFeature $about_us_feature)
    {
        $about_us_feature->update($request->only(['title', 'description' , 'bg_color']));
        if ($request->hasFile('icon')) {
            $about_us_feature->clearMediaCollection('icon');
            $about_us_feature->addMedia($request->file('icon'))->toMediaCollection('icon');
        }
        return redirect()->route('admin.about-us-features.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(AboutUsFeature $about_us_feature)
    {
        $about_us_feature->delete();
        return redirect()->route('admin.about-us-features.index')->with('success', 'تم الحذف بنجاح');
    }
}
