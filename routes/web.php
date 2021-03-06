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
    return redirect('/store');
});

Auth::routes();

Route::get('/test', 'TestController@index');

Route::get('/home', function () {
    return redirect('/store');     
});
Route::get('/logout', 'UserController@logout');
Route::get('/user/update', 'UserController@updateUserInfo');
Route::post('/user/update', 'UserController@updateUserInfo');


Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::middleware(['checkAdmin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@showDashboard');

    Route::get('/admin/category', 'CategoryController@showCategories');
    Route::get('/admin/category/page/{page}', 'CategoryController@showCategories');
    Route::get('/admin/category/add', 'CategoryController@addCategory');
    Route::post('/admin/category/add', 'CategoryController@addCategory');
    Route::get('/admin/category/edit/{id}', 'CategoryController@updateCategory');
    Route::post('/admin/category/edit/{id}', 'CategoryController@updateCategory');
    Route::post('/admin/category/delete', 'CategoryController@deleteCategories');

    Route::get('/admin/product', 'ProductController@showProducts');
    Route::get('/admin/product/page/{page}', 'ProductController@showProducts');
    Route::get('/admin/product/add', 'ProductController@addProduct');
    Route::post('/admin/product/add', 'ProductController@addProduct');
    Route::get('/admin/product/edit/{id}', 'ProductController@updateProduct');
    Route::post('/admin/product/edit/{id}', 'ProductController@updateProduct');
    Route::post('/admin/product/delete', 'ProductController@deleteProducts');
    Route::get('/admin/product/delete', 'ProductController@deleteProducts');


    Route::get('/admin/product/edit/{id}/subproduct', 'SubProductController@showSubProducts');
    Route::get('/admin/product/edit/{id}/subproduct/add', 'SubProductController@addSubProduct');
    Route::post('/admin/product/edit/{id}/subproduct/add', 'SubProductController@addSubProduct');
    Route::get('/admin/subproduct/edit/{id}', 'SubProductController@updateSubProduct');
    Route::post('/admin/subproduct/edit/{id}', 'SubProductController@updateSubProduct');

    Route::get('/admin/user', 'UserController@showUsers');
    Route::get('/admin/user/page/{page}', 'UserController@showUsers');
    Route::get('/admin/user/edit/{id}', 'UserController@updateUser');
    Route::post('/admin/user/edit/{id}', 'UserController@updateUser');
    Route::post('/admin/user/delete', 'UserController@deleteUsers');

    Route::get('/admin/post', 'PostController@showPost');
    Route::get('/admin/post/edit/{id}', 'PostController@updatePost');
    Route::post('/admin/post/edit/{id}', 'PostController@updatePost');

    Route::get('/admin/photo', 'PhotoController@showPhotos');
    Route::get('/admin/photo-choose', 'PhotoController@showPhotosToChoose');
    Route::get('/admin/photo/page/{page}', 'PhotoController@showPhotos');
    Route::get('/admin/photo/add', 'PhotoController@addPhoto');
    Route::post('/admin/photo/add', 'PhotoController@addPhoto');

    Route::get('/admin/order', 'OrderController@showOrders');
    Route::get('/admin/order/page/{page}', 'OrderController@showOrders');
    Route::get('/admin/order/edit/{id}', 'OrderController@updateOrderDetail');
    Route::post('/admin/order/edit/{id}', 'OrderController@updaterderDetail');

    Route::get('/admin/banner', 'BannerController@showBanners');
    Route::get('/admin/banner/page/{page}', 'BannerController@showBanners');
    Route::get('/admin/banner/add', 'BannerController@addBanner');
    Route::post('/admin/banner/add', 'BannerController@addBanner');
    Route::get('/admin/banner/edit/{id}', 'BannerController@updateBanner');
    Route::post('/admin/banner/edit/{id}', 'BannerController@updateBanner');
    Route::post('/admin/banner/delete', 'BannerController@deleteBanners');

});

Route::get('/store', 'StoreController@showHomePage');
Route::get('/store/product/{id}', 'ProductController@showProductDetail');

Route::post('/store/get-sub-product/', 'SubProductController@getSubProduct');

Route::post('/store/search', 'ProductController@search');

Route::get('/store/compare-list', 'StoreController@showCompareProducts');
Route::post('/store/add-compare', 'StoreController@addCompareProduct');
Route::post('/store/delete-compare', 'StoreController@deleteCompareProduct');
Route::get('/store/compare-page', 'StoreController@showCompareProductsTable');

Route::post('/store/user', 'UserController@showUser');
Route::post('/store/cart', 'StoreController@showCart');
Route::post('/store/cart/delete', 'StoreController@deleteCart');
Route::post('/store/cart/add', 'StoreController@addCart');

Route::get('/store/purchase', 'PaymentController@purchase');
Route::post('/store/purchase', 'PaymentController@purchase');

Route::get('/store/order', 'OrderController@showOrdersByUser');
Route::get('/store/order/{id}', 'OrderController@viewOrderDetail');

Route::post('/store/product-filter', 'ProductController@getProductFilter');
