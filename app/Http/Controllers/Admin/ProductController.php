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
        if (!can('عرض منتج')) abort(403);
        $products = Product::with('specifications')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!can('إضافة منتج')) abort(403);
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!can('إضافة منتج')) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

        // Handle thumbnail
        if ($request->hasFile('thumbnail')) {
            $product->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail');
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $images = $request->file('gallery_images');
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection('gallery');
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
        if (!can('عرض منتج')) abort(403);
        $product->load('specifications');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (!can('تعديل منتج')) abort(403);
        $product->load('specifications');
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!can('تعديل منتج')) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_gallery_images' => 'nullable|array',
            'delete_gallery_images.*' => 'integer|exists:media,id',
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

        // Handle thumbnail
        if ($request->hasFile('thumbnail')) {
            $product->clearMediaCollection('thumbnail');
            $product->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail');
        }

        // Handle gallery images deletion
        if ($request->has('delete_gallery_images')) {
            foreach ($request->delete_gallery_images as $mediaId) {
                $media = $product->getMedia('gallery')->find($mediaId);
                if ($media) {
                    $media->delete();
                }
            }
        }

        // Handle new gallery images
        if ($request->hasFile('gallery_images')) {
            $images = $request->file('gallery_images');
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection('gallery');
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
        if (!can('حذف منتج')) abort(403);
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'تم حذف المنتج بنجاح');
    }
}
