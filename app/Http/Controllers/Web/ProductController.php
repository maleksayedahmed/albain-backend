<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\AboutUsFeature;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(6)->get();
        $sliders = Slider::latest()->get();
        $partners = Partner::latest()->get();
        $aboutUsFeatures = AboutUsFeature::all();
        $companyInformation = \App\Models\CompanyInformation::first();
        return view('web.home', compact('products', 'sliders', 'partners', 'aboutUsFeatures', 'companyInformation'));
    }

    public function show($id)
    {
        $product = \App\Models\Product::with('specifications')->findOrFail($id);
        $gallery = $product->getMedia('gallery');
        $otherProducts = \App\Models\Product::where('id', '!=', $id)->latest()->take(4)->get();
        return view('web.product_details', compact('product', 'gallery', 'otherProducts'));
    }

    public function products()
    {
        $products = Product::latest()->get();
        return view('web.products', compact('products'));
    }

    public function index()
    {
        $products = Product::all();
        return view('web.products', compact('products'));
    }

    public function ajaxSearch(Request $request)
    {
        $query = $request->input('q');
        $products = Product::query()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%");
            })
            ->limit(20)
            ->get();
        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'get_first_media_url' => $product->getFirstMediaUrl('gallery') ?: asset('assets/images/products-2-icon.svg'),
            ];
        });
        return response()->json([
            'products' => $products
        ]);
    }

    public function whoUs()
    {
        $aboutUsFeatures = AboutUsFeature::all();
        $companyInformation = \App\Models\CompanyInformation::first();
        return view('web.who_us', compact('aboutUsFeatures', 'companyInformation'));
    }
} 