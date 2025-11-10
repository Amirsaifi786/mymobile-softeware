<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Homes\HomesController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Cms\CmsController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Sitesetting\SiteSettingController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\ProductType\ProductTypeController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Stock\StockController;
use App\Http\Controllers\Admin\Party\PartyController;



Route::middleware('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // Route::post('/logout', 'logout')->name('logout');
        
        Route::get('/profile',  'profile')->name('profile');
        Route::post('/profile/update',  'updateprofile')->name('updateprofile');
        Route::get('/user', 'user')->name('user');
        Route::post('user/get-user', 'getUsers')->name('user.get_user');
    });
    // password reset routes
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/store', 'store')->name('product.store');
        Route::get('product/edit/{id}', 'edit')->name('product.edit');
        Route::post('product/update', 'update')->name('product.update');
        Route::post('product/update-status/{id}',  'updateStatus')->name('product.updateStatus');
        Route::get('product/get-subcategories', 'getSubcategories')->name('getSubcategories');
        Route::delete('/product/{id}', 'destroy')->name('products.destroy');
        // Route::get('product/bulkproduct', 'bulkproduct')->name('product.bulkproduct');
        // Route::post('/products/bulk-upload', 'bulkUpload')->name('product.bulkUpload');
        Route::post('product/get-product', 'getProductAjax')->name('product.get_product');
    });

    Route::controller(StockController::class)->group(function () {
        Route::get('/stock', 'index')->name('stock');
        Route::get('stock/create', 'create')->name('stock.create');
        Route::post('stock/store', 'store')->name('stock.store');
        Route::get('stock/edit/{id}', 'edit')->name('stock.edit');
        Route::post('stock/update', 'update')->name('stock.update');

        Route::post('stock/update-status/{id}',  'updateStatus')->name('stock.updateStatus');
        Route::get('stock/get-subcategories', 'getSubcategories')->name('getSubcategories');
        Route::post('stock/get-stock', 'getStockAjax')->name('stock.get_stock');
        Route::get('/stock/search-products',  'searchProducts')->name('stock.search.products');
    });

    // ProductType routes
    Route::controller(ProductTypeController::class)->group(function () {

        Route::get('/product-type', 'index')->name('producttype');
        Route::get('product-type/create', 'create')->name('producttype.create');
        Route::post('product-type/store', 'store')->name('producttype.store');
        Route::get('product-type/edit/{id}', 'edit')->name('producttype.edit');
        Route::post('product-type/update', 'update')->name('producttype.update');
        Route::delete('product-type/{id}', 'destroy')->name('producttype.destroy');
        Route::post('/product-type/get-producttype', 'getProducttypeAjax')->name('producttype.get_producttype');
        Route::post('product-type/update-status/{id}',  'updateStatus')->name('producttype.updateStatus');
    });
    Route::controller(BrandController::class)->group(function () {

        Route::get('/brand', 'index')->name('brand');
        Route::get('brand/create', 'create')->name('brand.create');
        Route::post('brand/store', 'store')->name('brand.store');
        Route::get('brand/edit/{id}', 'edit')->name('brand.edit');
        Route::post('brand/update', 'update')->name('brand.update');
        Route::delete('brand/{id}', 'destroy')->name('brand.destroy');
        Route::post('/brands/get-brand', 'getBrandAjax')->name('brands.get_brand');
        Route::post('brand/update-status/{id}',  'updateStatus')->name('brand.updateStatus');
    });

    Route::controller(CategoryController::class)->group(function () {
        // category routes
        Route::get('/category', 'index')->name('category');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/store', 'store')->name('category.store');
        Route::get('category/edit/{id}', 'edit')->name('category.edit');
        Route::post('category/update', 'update')->name('category.update');
        Route::delete('category/{id}', 'destroy')->name('category.destroy');
        Route::post('/categories/get-category', 'getCategoriesAjax')->name('categories.get_category');
        Route::post('category/update-status/{id}',  'updateStatus')->name('category.updateStatus');
    });
    // subcategory routes
    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/subcategory', 'subcatindex')->name('subcategory');
        Route::get('subcategory/create', 'subcatcreate')->name('subcategory.create');
        Route::post('subcategory/store', 'subcatstore')->name('subcategory.store');
        Route::get('subcategory/edit/{id}', 'subcatedit')->name('subcategory.edit');
        Route::post('subcategory/update', 'subcatupdate')->name('subcategory.update');
        Route::delete('subcategory/{id}', 'subcatdestroy')->name('subcategory.destroy');
        Route::post('/subcategories/get-subcategory', 'getSubcategoriesAjax')->name('subcategories.get_subcategory');
        Route::post('subcategory/update-status/{id}',  'updateStatus')->name('subcategory.updateStatus');
    });
    Route::get('party/create', [PartyController::class,'create'])->name('party.create');
    //   Route::controller(SubCategoryController::class)->group(function () {

    //     Route::get('/subcategory', 'subcatindex')->name('subcategory');
    //     Route::post('subcategory/store', 'subcatstore')->name('subcategory.store');
    //     Route::get('subcategory/edit/{id}', 'subcatedit')->name('subcategory.edit');
    //     Route::post('subcategory/update', 'subcatupdate')->name('subcategory.update');
    //     Route::delete('subcategory/{id}', 'subcatdestroy')->name('subcategory.destroy');
    //     Route::post('/subcategories/get-subcategory', 'getSubcategoriesAjax')->name('subcategories.get_subcategory');
    //     Route::post('subcategory/update-status/{id}',  'updateStatus')->name('subcategory.updateStatus');
    // });


    Route::controller(SettingController::class)->group(function () {
        Route::get('socials/', 'index')->name('social');
        Route::post('/socials/store', 'store')->name('social.store');
    });
    Route::controller(SiteSettingController::class)->group(function () {
        Route::get('sitesetting/create', 'create')->name('sitesetting.create');
        Route::post('sitesetting/store', 'store')->name('sitesetting.store');
    });

    Route::controller(HomesController::class)->group(function () {
        Route::get('/',  'index')->name('dashbard');
        // Route::post('stock/stock-get', 'StockgetAjax')->name('stockget');

    });
    // Route::controller(TestimonialController::class)->group(function () {
    //     Route::get('/testimonial', 'index')->name('testimonial');
    //     Route::get('testimonial/create', 'create')->name('testimonial.create');
    //     Route::post('testimonial/store', 'store')->name('testimonial.store');
    //     Route::get('testimonial/edit/{id}', 'edit')->name('testimonial.edit');
    //     Route::post('testimonial/update', 'update')->name('testimonial.update');
    //     Route::delete('/testimonial/{id}', 'destroy')->name('testimonial.destroy');
    // });
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('blog');
        Route::get('blog/create', 'create')->name('blog.create');
        Route::post('blog/store', 'store')->name('blog.store');
        Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
        Route::post('blog/update', 'update')->name('blog.update');
        Route::delete('/blog/{id}', 'destroy')->name('blog.destroy');
        Route::post('/blog/get-blog', 'getblogAjax')->name('blog.get_blog');
        Route::post('blog/update-status/{id}',  'updateStatus')->name('blog.updateStatus');
    });
    Route::controller(CmsController::class)->group(function () {
        Route::get('/cms', 'index')->name('cms');
        Route::get('cms/create', 'create')->name('cms.create');
        Route::post('cms/store', 'store')->name('cms.store');
        Route::get('cms/edit/{id}', 'edit')->name('cms.edit');
        Route::post('cms/update', 'update')->name('cms.update');
        Route::delete('cms/{id}', 'destroy')->name('cms.destroy');
        Route::post('/cms/get-cms', 'getcmsAjax')->name('cms.get_cms');
        Route::post('cms/update-status/{id}',  'updateStatus')->name('cms.updateStatus');
    });
});

Route::post('/logout', function (Request $request) {
    
    Auth::logout();$request->session()->invalidate(); $request->session()->regenerateToken(); return response()->json(['message' => 'Logged out successfully']);


})->name('logout');

// Login and Register Route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register',  'register');
});
