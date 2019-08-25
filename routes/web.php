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

Route::get('/', [
	'uses' => 'NewShopController@index',
	'as' => '/'
]);

Route::get('category/product/{id}', [
	'uses' => 'NewShopController@categoryProduct',
	'as' => 'category-product'
]);

Route::get('product/details/{id}/{name}', [
	'uses' => 'NewShopController@productDetails',
	'as' => 'product-details'
]);

Route::post('add/cart', [
	'uses' => 'cartController@addToCart',
	'as' => 'add-to-cart'
]);

Route::post('update/cart', [
	'uses' => 'cartController@updateCart',
	'as' => 'update-cart'
]);


Route::get('delete/cart/{id}', [
	'uses' => 'cartController@deleteCart',
	'as' => 'delete-cart-item'
]);


Route::get('show/cart', [
	'uses' => 'cartController@showCart',
	'as' => 'show-cart'
]);

//checkOut

Route::get('checkout', [
	'uses' => 'checkoutController@index',
	'as' => 'checkout'
]);

Route::post('checkout/customer/registration', [
	'uses' => 'checkoutController@customerSignUp',
	'as' => 'customer-sign-up'
]);

Route::post('checkout/customer/login', [
	'uses' => 'checkoutController@customerLogin',
	'as' => 'customer-login'
]);

Route::post('checkout/customer/logout', [
	'uses' => 'checkoutController@customerLogout',
	'as' => 'customer-logout'
]);

Route::get('new/customer/login', [
	'uses' => 'checkoutController@newCustomerLogin',
	'as' => 'new-customer-login'
]);

Route::get('checkout/shipping', [
	'uses' => 'checkoutController@checkoutShipping',
	'as' => 'checkout/shipping'
]);

Route::post('shipping/save', [
	'uses' => 'checkoutController@saveShipping',
	'as' => 'new-shipping'
]);

Route::get('checkout/payment', [
	'uses' => 'checkoutController@paymentForm',
	'as' => 'checkout-payment'
]);

Route::post('confirm/order', [
	'uses' => 'checkoutController@confirmOrder',
	'as' => 'new-order'
]);

Route::get('complete/order', [
	'uses' => 'checkoutController@completeOrder',
	'as' => 'complete-order'
]);

Route::get('mail/us', [
	'uses' => 'NewShopController@mailUs',
	'as' => 'mail-us'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//category admin

Route::get('category/add', [
	'uses' => 'categoryController@index',
	'as' => 'category-add'
]);

Route::post('category/save', [
	'uses' => 'categoryController@saveCategory',
	'as' => 'new-category'
]);

Route::get('category/manage', [
	'uses' => 'categoryController@manageCategory',
	'as' => 'category-manage'
]);


Route::get('unpublished/category/{id}', [
	'uses' => 'categoryController@unpublishedCategory',
	'as' => 'unpublished-category'
]);

Route::get('published/category/{id}', [
	'uses' => 'categoryController@publishedCategory',
	'as' => 'published-category'
]);

Route::get('edit/category/{id}', [
	'uses' => 'categoryController@editCategory',
	'as' => 'edit-category'
]);

Route::post('update/category', [
	'uses' => 'categoryController@updateCategory',
	'as' => 'update-category'
]);

Route::get('delete/category/{id}', [
	'uses' => 'categoryController@deleteCategory',
	'as' => 'delete-category'
]);

//Brand Info

Route::get('brand/add', [
	'uses' => 'brandController@addBrand',
	'as' => 'brand-add'
]);

Route::post('brand/save', [
	'uses' => 'brandController@saveBrand',
	'as' => 'new-brand'
]);

Route::get('brand/manage', [
	'uses' => 'brandController@manageBrand',
	'as' => 'brand-manage'
]);

Route::get('unpublished/brand/{id}', [
	'uses' => 'brandController@unpublishedBrand',
	'as' => 'unpublished-brand'
]);

Route::get('published/brand/{id}', [
	'uses' => 'brandController@publishedBrand',
	'as' => 'published-brand'
]);

Route::get('edit/brand/{id}', [
	'uses' => 'brandController@editBrand',
	'as' => 'edit-brand'
]);

Route::post('update/brand', [
	'uses' => 'brandController@updateBrand',
	'as' => 'update-brand'
]);

Route::get('delete/brand/{id}', [
	'uses' => 'brandController@deleteBrand',
	'as' => 'delete-brand'
]);

//product 

Route::get('product/add', [
	'uses' => 'productController@addProduct',
	'as' => 'product-add'
]);

Route::post('product/save', [
	'uses' => 'productController@saveProduct',
	'as' => 'new-product'
]);

Route::get('product/manage', [
	'uses' => 'productController@manageProduct',
	'as' => 'product-manage'
]);

Route::get('edit/product/{id}', [
	'uses' => 'productController@editProduct',
	'as' => 'edit-product'
]);

Route::post('update/product', [
	'uses' => 'productController@updateProduct',
	'as' => 'update-product'
]);

//order info admin

Route::group(['middleware'=>'Bitm'], function (){

Route::get('manage/order', [
	'uses' => 'orderController@manageOrder',
	'as' => 'manage-order'
]);

Route::get('view/order/detail/{id}', [
	'uses' => 'orderController@viewOrderDetail',
	'as' => 'view-order-detail'
]);

Route::get('invoice/order/{id}', [
	'uses' => 'orderController@orderInvoice',
	'as' => 'invoice-order'
]);

Route::get('download/order/{id}', [
	'uses' => 'orderController@orderDownload',
	'as' => 'download-order'
]);

Route::get('edit/order/{id}', [
	'uses' => 'orderController@editOrder',
	'as' => 'edit-order'
]);

Route::get('delete/order/{id}', [
	'uses' => 'orderController@deleteOrder',
	'as' => 'delete-order'
]);



});



