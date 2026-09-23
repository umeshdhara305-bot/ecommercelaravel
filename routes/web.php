
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CommentController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/comments', [CommentController::class, 'index'])
        ->name('comments.index');

    Route::post('/comments/{id}/approve', [CommentController::class, 'approve'])
        ->name('comments.approve');

    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');

});
/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])
    ->name('index');


/*
|--------------------------------------------------------------------------
| SHOP / PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/shop', [FrontendController::class, 'shop'])
    ->name('shop');


/*
|--------------------------------------------------------------------------
| PRODUCT DETAILS
|--------------------------------------------------------------------------
*/

Route::get('/product-details/{id}', [FrontendController::class, 'productDetails'])
    ->name('product.details');


/*
|--------------------------------------------------------------------------
| CATEGORY PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/category/{id}', [FrontendController::class, 'categoryProducts'])
    ->name('category.products');


/*
|--------------------------------------------------------------------------
| BRAND PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/brand/{id}', [FrontendController::class, 'brandProducts'])
    ->name('brand.products');


/*
|--------------------------------------------------------------------------
| PRODUCT SEARCH
|--------------------------------------------------------------------------
*/

Route::get('/product-search', [FrontendController::class, 'search'])
    ->name('product.search');


/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/

Route::get('/blog', [FrontendController::class, 'blogs'])
    ->name('blogs');

Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])

    ->name('blog.detail');
    Route::post('/blog/{blog_id}/comment', [FrontendController::class, 'submitComment'])
    ->name('blog.comment');


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/contact', [FrontendController::class, 'contact'])
    ->name('contact');

Route::post('/contact-submit', [ContactController::class, 'store'])
    ->name('contact.submit');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::get('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::get('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');


/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
|
| We keep CheckoutController for displaying checkout page.
|
*/

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->middleware('auth')
    ->name('checkout.index');


/*
|--------------------------------------------------------------------------
| ORDERS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/place-order', [OrderController::class, 'placeOrder'])
        ->name('order.place');

    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('orders.index');

    Route::get('/my-orders/{id}', [OrderController::class, 'showMyOrder'])
        ->name('orders.show');
        Route::get('/thank-you/{id}', [OrderController::class, 'thankYou'])
    ->name('order.thankyou');

});


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminController::class, 'index'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login.submit');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN CATEGORY
|--------------------------------------------------------------------------
*/

Route::get('/admin/category', [CategoryController::class, 'index'])
    ->name('category.view');

Route::get('/admin/category/create', [CategoryController::class, 'create'])
    ->name('category.create');

Route::post('/category/store', [CategoryController::class, 'store'])
    ->name('category.store');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])
    ->name('category.edit');

Route::post('/category/update/{id}', [CategoryController::class, 'update'])
    ->name('category.update');

Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])
    ->name('category.delete');


/*
|--------------------------------------------------------------------------
| ADMIN BRAND
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/brand', [BrandController::class, 'index'])
        ->name('brand.index');

    Route::get('/brand/create', [BrandController::class, 'create'])
        ->name('brand.create');

    Route::post('/brand/store', [BrandController::class, 'store'])
        ->name('brand.store');

    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])
        ->name('brand.edit');

    Route::post('/brand/update/{id}', [BrandController::class, 'update'])
        ->name('brand.update');

    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])
        ->name('brand.delete');

});


/*
|--------------------------------------------------------------------------
| ADMIN PRODUCTS
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/product', [ProductController::class, 'index'])
        ->name('product.index');

    Route::get('/product/create', [ProductController::class, 'create'])
        ->name('product.create');

    Route::post('/product/store', [ProductController::class, 'store'])
        ->name('product.store');

    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])
        ->name('product.edit');

    Route::post('/product/update/{id}', [ProductController::class, 'update'])
        ->name('product.update');

    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])
        ->name('product.delete');

});


/*
|--------------------------------------------------------------------------
| ADMIN SETTINGS
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings.index');

    Route::post('/settings/update', [SettingController::class, 'update'])
        ->name('settings.update');

});


/*
|--------------------------------------------------------------------------
| ADMIN CUSTOMERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/customers', [CustomerController::class, 'index'])
    ->name('admin.customers.index');


/*
|--------------------------------------------------------------------------
| ADMIN CONTACT MESSAGES
|--------------------------------------------------------------------------
*/

Route::get('/admin/contacts', [AdminContactController::class, 'index'])
    ->name('admin.contacts');

Route::delete('/admin/contacts/{id}', [AdminContactController::class, 'destroy'])
    ->name('admin.contacts.delete');


/*
|--------------------------------------------------------------------------
| ADMIN BLOG
|--------------------------------------------------------------------------
*/

Route::get('/admin/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/admin/blog/create', [BlogController::class, 'create'])
    ->name('blog.create');

Route::post('/admin/blog/store', [BlogController::class, 'store'])
    ->name('blog.store');

Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])
    ->name('blog.edit');

Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])
    ->name('blog.update');

Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete'])
    ->name('blog.delete');


/*
|--------------------------------------------------------------------------
| ADMIN ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/orders', [AdminOrderController::class, 'index'])
    ->name('admin.orders.index');

Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])
    ->name('admin.orders.show');

Route::put('/admin/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])
    ->name('admin.orders.updateStatus');

Route::put('/admin/orders/{id}/payment-status', [AdminOrderController::class, 'updatePaymentStatus'])
    ->name('admin.orders.updatePaymentStatus');


/*
|--------------------------------------------------------------------------
| TEST ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return view('frontend.test');
});