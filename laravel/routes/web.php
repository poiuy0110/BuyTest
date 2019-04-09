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

/* News About show  */
Route::get('/index/newsShow/{id}', 'Frontend\IndexController@newsShow')->name('frontend.newsShow');
Route::get('/index/aboutShow', 'Frontend\IndexController@aboutShow')->name('frontend.aboutShow');
Route::get('/index/serviceShow', 'Frontend\IndexController@serviceShow')->name('frontend.serviceShow');
Route::get('/index/privateShow', 'Frontend\IndexController@privateShow')->name('frontend.privateShow');
Route::get('/index/qaShow', 'Frontend\IndexController@qaShow')->name('frontend.qaShow');
Route::get('/index/returnShow', 'Frontend\IndexController@returnShow')->name('frontend.returnShow');
/* News About show  */


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
Route::get('/member/memberEmailConfirm/{url_token}', 'Frontend\MemberController@memberEmailConfirm')->name('member.memberEmailConfirm');
Route::get('member/resendConfirmEmail', 'Frontend\MemberController@resendConfirmEmail')->name('member.resendConfirmEmail');
Route::post('member/confirmEmailResend', 'Frontend\MemberController@confirmEmailResend')->name('member.confirmEmailResend');
Route::get('/member/memberChgPassConfirm/{url_token}', 'Frontend\MemberController@memberChgPassConfirm')->name('member.memberChgPassConfirm');
Route::get('/member/forgetPassShow/{id}', 'Frontend\MemberController@forgetPassShow')->name('member.forgetPassShow');
Route::post('/member/chgForgotPass', 'Frontend\MemberController@chgForgotPass')->name('member.chgForgotPass');
Route::get('/member/sendConfirmEmail', 'Frontend\MemberController@sendConfirmEmail')->name('member.sendConfirmEmail');



/*        Member              */





/*    Product     */
Route::get('/product/prodLists/{cat_id}/{store_id?}', 'Frontend\ProductController@prodLists')->name('product.prodLists');
Route::get('/product/prodShow/{id}', 'Frontend\ProductController@prodShow')->name('product.prodShow');
Route::post('/product/addToBasket', 'Frontend\ProductController@addToBasket')->name('product.addToBasket');
Route::get('/product/chkBasketQty/{id}/{qty}', 'Frontend\ProductController@chkBasketQty')->name('product.chkBasketQty');
/*    Product    */

/*    Basket    */
Route::get('/product/basketShow', 'Frontend\ProductController@basketShow')->name('product.basketShow');
Route::get('/product/deleteBasket/{id}', 'Frontend\ProductController@deleteBasket')->name('product.deleteBasket');
Route::post('/product/checkout', 'Frontend\ProductController@checkout')->name('product.checkout');
/*    Basket    */

/*    Orders    */
Route::get('/orders/show/{id}', 'Frontend\OrdersController@show')->name('orders.show');
/*    Orders    */























/*      Backend          */


/*   login admin      */
Route::get('/admin/login', function (){return view('backend.login');});
Route::post('/admin/login', 'Auth\LoginController@authenticate')->name('login');
/*   login admin      */



Route::post('/admin/ckeditorFileUpload', 'Controller@uploadImageContent');
Route::get('/admin/getProdComplete', 'Backend\AutoCompleteController@getProdComplete');



Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function() {
 
    // 登出
    Route::get('/', 'Backend\MemberController@index')->name('index');
 
    Route::get('logout', 'Auth\LoginController@customlogout')->name('logout');
 
    
    /* About US   */

    Route::resource('about', 'Backend\AboutController');
    Route::resource('news', 'Backend\NewsController');

     /* About US   */

     /* Member   */

    Route::resource('member', 'Backend\MemberController');
    Route::get('member/{id}/chgPass', 'Backend\MemberController@chgPass')->name('member.chgPass');
    Route::post('member/chgPassSave', 'Backend\MemberController@chgPassSave')->name('member.chgPassSave');

    /* Member   */

    /* Prod Category   */
    Route::resource('category', 'Backend\CategoryController');
    /* Prod Category   */


    /* Orders   */
    Route::resource('orders', 'Backend\OrdersController')->except(['show']);
    Route::get('orders/itemCreate/{odr_id}', 'Backend\OrdersController@itemCreate')->name('orders.itemCreate');
    Route::get('orders/show/{id}', 'Backend\OrdersController@show')->name('orders.show');
    Route::get('orders/printListPDF', 'Backend\OrdersController@printListPDF')->name('orders.printListPDF');
    Route::get('orders/exportListCSV', 'Backend\OrdersController@exportListCSV')->name('orders.exportListCSV');
    Route::post('orders/itemStore', 'Backend\OrdersController@itemStore')->name('orders.itemStore');
    Route::post('orders/itemUpdate', 'Backend\OrdersController@itemUpdate')->name('orders.itemUpdate');
    /* Orders   */
    
    
  
    /* Product   */
    Route::resource('product', 'Backend\ProductController')->except(['show']);
    Route::get('product/show/{id}', 'Backend\ProductController@show')->name('product.show');
    Route::get('product/getPrice', 'Backend\ProductController@getPrice');
    /* Product   */
    
    /* Store   */
    Route::resource('store', 'Backend\StoreController');
    /* Store   */

    /* IndexSlide   */
    Route::resource('indexslide', 'Backend\IndexSlideController');
    /* IndexSlide   */

    /* Params   */
    Route::resource('params', 'Backend\ParamsController');
     /* Params   */

     /* User   */
    Route::resource('user', 'Backend\UserController');
    Route::get('user/chgpass/{id}', 'Backend\UserController@chgPass')->name("user.chgPass");
    Route::post('user/chgPassSave', 'Backend\UserController@chgPassSave')->name("user.chgPassSave");
    /* User   */


     /* Product   */
    Route::resource('product', 'Backend\ProductController')->except(['getPrice','show']);
    Route::get('product/show/{id}', 'Backend\ProductController@show')->name('product.show');
    Route::get('product/getPrice', 'Backend\ProductController@getPrice');
    /* Product   */

    

});


/*      Backend          */


