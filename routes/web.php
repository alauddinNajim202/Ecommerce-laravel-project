<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ClientController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('Home');
});


// client controller
Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/single-product/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/checkout', 'Checkout')->name('checkout');
    Route::get('/new-release', 'NewRelease')->name('newrelease');


});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    Route::controller(ClientController::class)->group(function () {

        Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/add-to-cart/', 'AddToCart')->name('addtocart');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-order', 'pendingOrder')->name('pendingorder');
        Route::get('/user-profile/history', 'History')->name('history');
        Route::get('/new-release', 'NewRelease')->name('newrelease');
        Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
        Route::get('/customer-service', 'CustomerService')->name('customerservice');
        Route::get('/remove-cart-item/{id}', 'removeCartItem')->name('removeItem');
        Route::get('/shipping-address', 'ShippingAdress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'AddShippingAdress')->name('addshippingaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');


    });








    // for dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
    });



    // for category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'AllCategory')->name('admin.allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('admin.addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('admin.storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('admin.editcategory');
        Route::get('/admin/update-category', 'UpdateCategory')->name('admin.updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('admin.deletecategory');



    });

     // for sub category
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-sub-category', 'AllSubCategory')->name('admin.allsubcategory');
        Route::get('/admin/add-sub-category', 'AddSubCategory')->name('admin.addsubcategory');
        Route::post('/admin/store-sub-category', 'StoreSubcategory')->name('admin.storesubcategory');
        Route::get('/admin/edit-sub-category/{id}', 'EditSubcategory')->name('admin.editsubcategory');
        Route::post('/admin/update-sub-category', 'UpdateSubcategory')->name('admin.updatesubcategory');
        Route::get('/admin/delete-sub-category/{id}', 'DeleteSubcategory')->name('admin.deletesubcategory');

    });

     // for product
    Route::controller(ProductController::class)->group(function () {

        Route::get('/admin/all-product', 'AllProduct')->name('admin.allproduct');
        Route::get('/admin/add-product', 'AddProduct')->name('admin.addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('admin.storeproduct');
        Route::get('/admin/new-product-image/{id}', 'NewProductImg')->name('admin.imageproduct');
        Route::post('/admin/update-product-image', 'UpdateProductImg')->name('admin.updateproductimage');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('admin.editproduct');
        Route::post('/admin/update-product/', 'UpdateProduct')->name('admin.updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('admin.deleteproduct');



    });

    // for order
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/order-pending', 'index')->name('admin.orderpending');

    });







require __DIR__.'/auth.php';
