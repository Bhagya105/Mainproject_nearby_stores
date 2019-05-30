<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//index page
Route::get('/','IndexController@index');
// Route::get('/', function () {
//     return view('template.index');
// });
Route::get('/about', function () {
    return view('template.about');
});
Route::get('/signup', function () {
    return view('template.register');
});

Route::get('/signin', function () {
    return view('template.login');
});
Route::get('/adminhome', function () {
    return view('Admin.adminhome');
});
// Route::get('/product', function () {
//     return view('template.product');
// });
Route::get('/contact', function () {
    return view('template.contact');
});
Route::get('/profile', function () {
    return view('users.account');
});

Route::get('/dashboard', function () {
    return view('Admin.adminhome');
});
Route::get('/products', function () {
    return view('users.product');
});


//user profile
Route::any('account','UsersController@account');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
//user Logout
Route::any('/user-logout','UsersController@logout');
//Search products
Route::any('/search-products','ProductsController@searchProducts');
//checkout
Route::any('/checkout','ProductsController@checkout');
//order review page
Route::any('/order-review','ProductsController@orderReview');
//Place order
Route::any('/place-order','ProductsController@placeOrder');
//thanks page
Route::any('/thanks','ProductsController@thanks');
//thanks page
Route::any('/paypal','ProductsController@paypal');
//paypal thanks page
Route::any('/paypal/thanks','ProductsController@thanksPaypal');
//paypal cancel page
Route::any('/paypal/cancel','ProductsController@cancelPaypal');
//Users order page
Route::any('/orders','ProductsController@userOrders');
//User Orderes Products page
Route::get('/orders/{id}','productsController@userOrderDetails');
//Category Listing page
Route::any('/products/{name}','ProductsController@products');

//product listing page
Route::get('/product/{id}','ProductsController@product');

//Get product attribute page
Route::any('/get-product-price','ProductsController@getProductPrice');

//cart page
Route::match(['get','post'],'/cart','ProductsController@cart');

//add to cart route
Route::match(['get','post'],'/add-cart','ProductsController@addtocart');
//delete product from cart page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');
//update product quantity in cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

//Admin Orders Routes
Route::get('/Admin/view-orders','ProductsController@viewOrders');
//Admin Order Details
Route::any('/Admin/view-order/{id}','ProductsController@viewOrderDetails');
//Order Invoice
Route::any('/Admin/view-order-invoice/{id}','ProductsController@viewOrderInvoice');
//Update order Status
Route::any('/Admin/update-order-status','ProductsController@updateOrderStatus');



//Brand route
Route::any('/Admin/add-brand','BrandController@addBrand');
Route::any('/Admin/view-brand','BrandController@viewBrand');

//categories routes(admin)
Route::any('/Admin/add-categories','CategoryController@addCategory');
Route::any('/Admin/edit-category/{id}','CategoryController@editCategory');
Route::any('/Admin/view-categories','CategoryController@viewCategories');

//Coupon Routes
Route::any('/Admin/add-coupon','CouponsController@addCoupon');
Route::any('/Admin/view-coupons','CouponsController@viewCoupons');

//Apply coupon
Route::any('/cart/apply-coupon','ProductsController@applyCoupon');

//products
Route::any('/Admin/add-product','ProductsController@addProduct');
Route::any('/Admin/edit-product/{id}','ProductsController@editProduct');
Route::any('/Admin/view-product','ProductsController@viewProduct');
Route::any('/Admin/delete-product/{id}','ProductsController@deleteProduct');
Route::any('/Admin/delete-product-image/{id}','ProductsController@deleteProductImage');
Route::any('/Admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

//product attribute 
Route::any('/Admin/add_attributes/{id}','ProductsController@addAttributes');
Route::any('/Admin/edit_attributes/{id}','ProductsController@editAttributes');
Route::any('/Admin/add_images/{id}','ProductsController@addImages');
Route::any('/Admin/delete-attribute/{id}','ProductsController@deleteAttribute');


