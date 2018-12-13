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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');

Route::get('/file', 'FileController@getData');

Route::get('/user', function () {
    return redirect('/user/login');     
});
Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@login');
Route::get('/user/logout', 'UserController@logout');
Route::get('/user/signup', 'UserController@signUp');
Route::post('/user/signup', 'UserController@signUp');
Route::get('/user/update', 'UserController@updateInfo');


Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});


Route::get('/admin/dashboard', 'AdminController@showDashboard');

Route::get('/admin/category', 'CategoryController@showCategories');
Route::get('/admin/category/page/{page}', 'CategoryController@showCategories');
Route::get('/admin/category/add', 'CategoryController@addCategory');
Route::post('/admin/category/add', 'CategoryController@addCategory');
Route::get('/admin/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/admin/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/admin/category/delete', 'CategoryController@deleteCategories');

Route::get('/admin/product', 'ProductController@showProducts');
Route::get('/admin/product/page/{page}', 'ProductController@showProducts');
Route::get('/admin/product/add', 'ProductController@addProduct');
Route::post('/admin/product/add', 'ProductController@addProduct');
Route::get('/admin/product/edit/{id}', 'ProductController@editProduct');
Route::post('/admin/product/edit/{id}', 'ProductController@editProduct');
Route::post('/admin/product/delete', 'ProductController@deleteProducts');

Route::get('/admin/product/edit/{id}/subproduct', 'SubProductController@showSubProducts');
Route::get('/admin/product/edit/{id}/subproduct/add', 'SubProductController@addSubProduct');
Route::post('/admin/product/edit/{id}/subproduct/add', 'SubProductController@addSubProduct');
Route::get('/admin/subproduct/edit/{id}', 'SubProductController@editSubProduct');
Route::post('/admin/subproduct/edit/{id}', 'SubProductController@editSubProduct');

Route::get('/admin/user', 'UserController@showUsers');
Route::get('/admin/user/edit/{id}', 'UserController@editUser');
Route::post('/admin/user/edit/{id}', 'UserController@editUser');
Route::post('/admin/user/delete', 'UserController@deleteUsers');

Route::get('/admin/post', 'PostController@showPost');
Route::get('/admin/post/edit/{id}', 'PostController@editPost');
Route::post('/admin/post/edit/{id}', 'PostController@editPost');

Route::get('/admin/photo', 'PhotoController@showPhotos');
Route::get('/admin/photo-choose', 'PhotoController@showPhotosToChoose');
Route::get('/admin/photo/page/{page}', 'PhotoController@showPhotos');
Route::get('/admin/photo/add', 'PhotoController@addPhoto');
Route::post('/admin/photo/add', 'PhotoController@addPhoto');

Route::get('/admin/order', 'OrderController@showOrders');
Route::get('/admin/order/edit/{id}', 'OrderController@viewOrderDetail');

Route::get('/admin/banner', 'BannerController@showBanners');
Route::get('/admin/banner/add', 'BannerController@addBanner');
Route::post('/admin/banner/add', 'BannerController@addBanner');
Route::get('/admin/banner/edit/{id}', 'BannerController@editBanner');
Route::post('/admin/banner/edit/{id}', 'BannerController@editBanner');
Route::post('/admin/banner/delete', 'BannerController@deleteBanners');


Route::get('/store', 'StoreController@showHomePage');
Route::get('/store/product/{id}', 'ProductController@showProductDetail');

Route::post('/store/get-sub-product/', 'SubProductController@getSubProduct');

Route::post('/store/search', 'ProductController@search');

Route::get('/store/compare-list', 'StoreController@showCompareProducts');
Route::post('/store/add-compare', 'StoreController@addCompareProduct');
Route::post('/store/delete-compare', 'StoreController@deleteCompareProduct');

Route::post('/store/user', 'UserController@showUser');
Route::post('/store/cart', 'StoreController@showCart');
Route::post('/store/cart/delete', 'StoreController@deleteCart');
Route::post('/store/cart/add', 'StoreController@addCart');

Route::get('/store/purchase', 'PaymentController@purchase');
Route::post('/store/purchase', 'PaymentController@purchase');


Route::get('/store/chatbot', 'StoreController@index');

Route::post('/store/product-filter', 'ProductController@getProductFilter');
