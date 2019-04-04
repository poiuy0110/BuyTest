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

Route::get('/', 'Frontend\IndexController@index')->name('index');
Route::get('/index', 'Frontend\IndexController@index');


/*        Member Login              */
Route::get('/member/login', 'Frontend\MemberController@login')->name('member.login');
Route::post('/member/loginConfirm', 'Frontend\MemberController@loginConfirm')->name('member.loginConfirm');
/*        Member Login              */


/*        Member Loout              */
Route::get('/logout', 'Frontend\MemberController@logout')->name('frontend.logout');
/*        Member Loout              */


/*        Member Register              */
Route::get('/register', 'Frontend\MemberController@register')->name('frontend.register');
Route::post('registerSave', 'Frontend\MemberController@registerSave')->name('frontend.registerSave');
/*        Member Register              */

/*        Member ForgetPass              */
Route::get('/forgetPass', 'Frontend\MemberController@forgetPass')->name('frontend.forgetPass');
Route::post('/sendForgetPass', 'Frontend\MemberController@sendForgetPass')->name('frontend.sendForgetPass');
/*        Member ForgetPass              */

/*        Member              */
Route::get('/member/show', 'Frontend\MemberController@show')->name('member.memberShow');
Route::get('/member/orderShow', 'Frontend\MemberController@orderShow')->name('member.orderShow');
Route::get('/member/memberEdit', 'Frontend\MemberController@memberEdit')->name('member.memberEdit');
Route::post('/member/memberSave', 'Frontend\MemberController@memberSave')->name('member.memberSave');
Route::get('/member/memberChgPass', 'Frontend\MemberController@memberChgPass')->name('member.memberChgPass');
Route::post('/member/memberChgPassSave', 'Frontend\MemberController@memberChgPassSave')->name('member.memberChgPassSave');

/*        Member              */





/*    Product     */
Route::get('/product/prodLists/{cat_id}/{store_id?}', 'Frontend\ProductController@prodLists')->name('product.prodLists');
Route::get('/product/prodShow/{id}', 'Frontend\ProductController@prodShow')->name('product.prodShow');
Route::post('/product/addToBasket', 'Frontend\ProductController@addToBasket')->name('product.addToBasket');
/*    Product    */

/*    Basket    */
Route::get('/product/basketShow', 'Frontend\ProductController@basketShow')->name('product.basketShow');
Route::get('/product/deleteBasket/{id}', 'Frontend\ProductController@deleteBasket')->name('product.deleteBasket');
Route::post('/product/checkout', 'Frontend\ProductController@checkout')->name('product.checkout');
/*    Basket    */

/*    Orders    */
Route::get('/orders/show/{id}', 'Frontend\OrdersController@show')->name('orders.show');


/*    Orders    */




Route::get('/member/sendConfirmEmail', 'Frontend\MemberController@sendConfirmEmail')->name('member.sendConfirmEmail');


Route::get('/about', 'Frontend\AboutController@index')->name('about');

Route::get('/products', 'Frontend\ProductController@index')->name('products');

Route::get('/store', 'Frontend\StoreController@index')->name('store');


















/*      Backend          */

/*Route::get('/admin/register', function (){
    return view('backend.register');
});*/

/*   login admin      */
Route::get('/admin/login', function (){return view('backend.login');});
Route::post('/admin/login', 'Auth\LoginController@authenticate')->name('login');
/*   login admin      */


//Route::post('/admin/register', 'Auth\RegisterController@register')->name('register');

Route::post('/admin/ckeditorFileUpload', 'Controller@uploadImageContent');
Route::get('/admin/getProdComplete', 'Backend\AutoCompleteController@getProdComplete');



Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function() {
 
    // 登出
    Route::get('/', 'Backend\MemberController@index')->name('index');
 
    Route::get('logout', 'Auth\LoginController@customlogout')->name('logout');
 
 
    /*// About的增刪改查還有index頁面
    Route::resource('about', 'Backend\AboutController');*/
    //Route::resource('about', 'Backend\AboutController');
    Route::resource('about', 'Backend\AboutController');


    Route::resource('news', 'Backend\NewsController');

    Route::resource('member', 'Backend\MemberController');
    Route::get('member/{id}/chgPass', 'Backend\MemberController@chgPass')->name('member.chgPass');
    Route::post('member/chgPassSave', 'Backend\MemberController@chgPassSave')->name('member.chgPassSave');

    Route::resource('category', 'Backend\CategoryController');

    Route::resource('orders', 'Backend\OrdersController')->except(['show']);

    Route::get('orders/itemCreate/{odr_id}', 'Backend\OrdersController@itemCreate')->name('orders.itemCreate');
    Route::get('orders/show/{id}', 'Backend\OrdersController@show')->name('orders.show');
    Route::post('orders/itemStore', 'Backend\OrdersController@itemStore')->name('orders.itemStore');
    Route::post('orders/itemUpdate', 'Backend\OrdersController@itemUpdate')->name('orders.itemUpdate');
 
    // Product的增刪改查還有index頁面
    Route::resource('product', 'Backend\ProductController')->except(['getPrice','show']);
    Route::get('product/show/{id}', 'Backend\ProductController@show')->name('product.show');
    Route::get('product/getPrice', 'Backend\ProductController@getPrice');
 
    Route::resource('store', 'Backend\StoreController');

    Route::resource('indexslide', 'Backend\IndexSlideController');

    Route::resource('params', 'Backend\ParamsController');

    

});


/*      Backend          */


