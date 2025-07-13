<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('specifications')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
        ]);

        // Save specifications
        if ($request->has('specifications.key')) {
            $keys = $request->input('specifications.key');
            $values = $request->input('specifications.value');
            foreach ($keys as $i => $key) {
                if ($key && isset($values[$i]) && $values[$i]) {
                    $product->specifications()->create([
                        'specification_key' => $key,
                        'specification_value' => $values[$i],
                    ]);
                }
            }
        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            // Add all images to gallery
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection('gallery');
            }
            // Get first media from gallery and copy to thumbnail
            $firstMedia = $product->getFirstMedia('gallery');
            if ($firstMedia) {
                $firstMedia->copy($product, 'thumbnail');
            }
        }
        return redirect()->route('admin.products.index')
            ->with('success', 'تم إنشاء المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('specifications');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load('specifications');
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
        ]);

        // Update specifications
        $product->specifications()->delete();
        if ($request->has('specifications.key')) {
            $keys = $request->input('specifications.key');
            $values = $request->input('specifications.value');
            foreach ($keys as $i => $key) {
                if ($key && isset($values[$i]) && $values[$i]) {
                    $product->specifications()->create([
                        'specification_key' => $key,
                        'specification_value' => $values[$i],
                    ]);
                }
            }
        }

        if ($request->hasFile('images')) {
            // Remove old images
            $product->clearMediaCollection('thumbnail');
            $product->clearMediaCollection('gallery');
            $images = $request->file('images');
            // Add all images to gallery
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection('gallery');
            }
            // Get first media from gallery and copy to thumbnail
            $firstMedia = $product->getFirstMedia('gallery');
            if ($firstMedia) {
                $firstMedia->copy($product, 'thumbnail');
            }
        }
        return redirect()->route('admin.products.index')
            ->with('success', 'تم تحديث المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'تم حذف المنتج بنجاح');
    }
}
