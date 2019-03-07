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

Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('/about', 'Frontend\AboutController@index')->name('about');

Route::get('/products', 'Frontend\ProductController@index')->name('products');

Route::get('/store', 'Frontend\StoreController@index')->name('store');

Route::get('/admin/login', function (){
    return view('backend.login');
});

Route::get('/admin/register', function (){
    return view('backend.register');
});

Route::post('/admin/login', 'Auth\LoginController@authenticate')->name('login');
Route::post('/admin/register', 'Auth\RegisterController@register')->name('register');

Route::post('/admin/ckeditorFileUpload', 'Controller@uploadImageContent')->name('uploadImageContent');



Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function() {
 
    // 登出
    Route::get('logout', 'Auth\LoginController@customlogout')->name('logout');
 
    // Website的更新
    Route::get('/', 'Backend\WebsiteController@edit')->name('website.edit');
    Route::post('/', 'Backend\WebsiteController@update')->name('website.update');
 
    // Home的更新
    Route::get('home', 'Backend\HomeController@edit')->name('home.edit');
    Route::post('home', 'Backend\HomeController@update')->name('home.update');
 
    /*// About的增刪改查還有index頁面
    Route::resource('about', 'Backend\AboutController');*/
    //Route::resource('about', 'Backend\AboutController');
    Route::resource('about', 'Backend\AboutController');


    Route::resource('news', 'Backend\NewsController');

    Route::resource('member', 'Backend\MemberController');
    Route::get('member/{id}/chgPass', 'Backend\MemberController@chgPass')->name('member.chgPass');
    Route::post('member/chgPassSave', 'Backend\MemberController@chgPassSave')->name('member.chgPassSave');

    Route::resource('category', 'Backend\CategoryController');

    
   
 
    // Product的增刪改查還有index頁面
    Route::resource('product', 'Backend\ProductController', ['except'=> ['show']]);
 
    // Store的更新
    Route::get('store', 'Backend\StoreController@edit')->name('store.edit');
    Route::post('store', 'Backend\StoreController@update')->name('store.update');

    

});


