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

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});


Route::get('/admin/dashboard', 'AdminController@showDashboard');

Route::get('/admin/product', 'ProductController@showProducts');
Route::get('/admin/product/page/{page}', 'ProductController@showProducts');
Route::get('/admin/product/add', 'ProductController@addProduct');
Route::post('/admin/product/add', 'ProductController@addProduct');
Route::get('/admin/product/edit/{id}', 'ProductController@editProduct');
Route::post('/admin/product/edit/{id}', 'ProductController@editProduct');
Route::post('/admin/product/delete', 'ProductController@deleteProducts');

Route::get('/admin/product/edit/{id}/subproduct', 'SubProductController@showSubProducts');

Route::get('/admin/user', 'UserController@showUsers');
Route::get('/admin/user/edit/{id}', 'UserController@editUser');
Route::post('/admin/user/edit/{id}', 'UserController@editUser');

Route::get('/admin/post', 'PostController@showPost');
Route::get('/admin/post/edit/{id}', 'PostController@editPost');
Route::post('/admin/post/edit/{id}', 'PostController@editPost');

Route::get('/admin/photo', 'PhotoController@showPhotos');
Route::get('/admin/photo-choose', 'PhotoController@showPhotosToChoose');
Route::get('/admin/photo/page/{page}', 'PhotoController@showPhotos');
Route::get('/admin/photo/add', 'PhotoController@addPhoto');
Route::post('/admin/photo/add', 'PhotoController@addPhoto');


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


Route::get('/store/chatbot', 'StoreController@index');

Route::post('/store/product-filter', 'ProductController@getProductFilter');

