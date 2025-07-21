<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\Admin\SliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        if (!can('عرض سلايدر')) abort(403);
        $sliders = Slider::latest()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        if (!can('إضافة سلايدر')) abort(403);
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        if (!can('إضافة سلايدر')) abort(403);
        $slider = Slider::create($request->only(['title', 'description']));
        if ($request->hasFile('image')) {
            $slider->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.sliders.index')->with('success', __('Slider created successfully.'));
    }

    public function edit(Slider $slider)
    {
        if (!can('تعديل سلايدر')) abort(403);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        if (!can('تعديل سلايدر')) abort(403);
        $slider->update($request->only(['title', 'description']));
        if ($request->hasFile('image')) {
            $slider->clearMediaCollection('image');
            $slider->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.sliders.index')->with('success', __('Slider updated successfully.'));
    }

    public function destroy(Slider $slider)
    {
        if (!can('حذف سلايدر')) abort(403);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', __('Slider deleted successfully.'));
    }
} 