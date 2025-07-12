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
        $sliders = Slider::latest()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        $slider = Slider::create($request->only(['title', 'description']));
        if ($request->hasFile('image')) {
            $slider->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.sliders.index')->with('success', __('Slider created successfully.'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $slider->update($request->only(['title', 'description']));
        if ($request->hasFile('image')) {
            $slider->clearMediaCollection('image');
            $slider->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect()->route('admin.sliders.index')->with('success', __('Slider updated successfully.'));
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', __('Slider deleted successfully.'));
    }
} 