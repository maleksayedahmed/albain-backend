<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\CompanyInformationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController as WebProductController;
use App\Http\Controllers\Web\InquiryController as WebInquiryController;

Route::get('/', [WebProductController::class, 'home'])->name('web.home');

Route::get('/test', [WebProductController::class, 'home'])->name('web.test');

// Add products listing route if missing
Route::get('/products', [\App\Http\Controllers\Web\ProductController::class, 'index'])->name('web.products');

Route::get('/products/ajax-search', [\App\Http\Controllers\Web\ProductController::class, 'ajaxSearch'])->name('web.products.ajax_search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('inquiries', InquiryController::class);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class);
    Route::resource('about-us-features', \App\Http\Controllers\Admin\AboutUsFeatureController::class);
    Route::get('company-information/edit', [CompanyInformationController::class, 'edit'])->name('company_information.edit');
    Route::put('company-information/update', [CompanyInformationController::class, 'update'])->name('company_information.update');
    Route::get('about-us-content/edit', [\App\Http\Controllers\Admin\AboutUsContentController::class, 'edit'])->name('about_us_content.edit');
    Route::put('about-us-content/update', [\App\Http\Controllers\Admin\AboutUsContentController::class, 'update'])->name('about_us_content.update');
});

Route::get('/product/{id}', [WebProductController::class, 'show'])->name('web.product.details');

Route::post('/inquiry', [WebInquiryController::class, 'store'])->name('web.inquiry.store');

Route::get('/who-us', [WebProductController::class, 'whoUs'])->name('web.who_us');

Route::get('/contact-us', function() {
    return view('web.contact_us');
})->name('web.contact_us');

require __DIR__.'/auth.php';
