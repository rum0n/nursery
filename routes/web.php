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

Route::get('/check', function () {
    return view('test_view');
});

//Auth::routes();

Route::get('/', 'FrontController@index')->name('home');
Route::get('tree/view/{id}', 'FrontController@view_tree')->name('single_tree');

Route::get('search/tree', 'FrontController@search_tree')->name('search_tree');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes(['verify' => true]);



/*
|=====================================================
|               Admin Routes
|=====================================================
*/

Route::group(['as' => 'admin.','prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['auth','admin']],function(){

    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/tree/status/{id}', 'AdminController@status')->name('status');
    Route::post('/tree/delete/{id}', 'AdminController@delete_tree')->name('delete_tree');

    Route::resource('category', 'CategoryController');

    Route::resource('order', 'orderController');



});

/*
|-----------------------------------------------------
|               Admin Routes ends
|-----------------------------------------------------
*/


/*
|=====================================================
|               Owner Routes
|=====================================================
*/

Route::group(['as' => 'owner.','prefix' => 'owner', 'namespace' => 'Nursery','middleware' => ['auth','owner','verified']],function(){

    Route::get('/dashboard', 'OwnerController@index')->name('dashboard');

    Route::resource('tree', 'TreeController');

    Route::resource('order', 'OrderController');

});

/*
|-----------------------------------------------------
|               Owner Routes ends
|-----------------------------------------------------
*/

/*
|-----------------------------------------------------
|               User Routes
|-----------------------------------------------------
*/


Route::group(['as' => 'user.','prefix' => 'user', 'namespace' => 'User','middleware' => ['auth','user','verified']],function(){


    Route::get('/dashboard', 'UserController@index')->name('dashboard');

    Route::get('/order/{id}', 'UserController@order')->name('order');
    Route::post('/delete/order/{id}', 'UserController@delete')->name('delete');


});


/*
|-----------------------------------------------------
|               User Routes ends
|-----------------------------------------------------
*/




Route::group(['middleware' => ['auth','user','verified']],function(){

    // SSLCOMMERZ Start
    Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
    Route::get('/buy/tree/{id}', 'SslCommerzPaymentController@exampleHostedCheckout')->name('pay');
    Route::get('/pending/order/paynow/{id}', 'SslCommerzPaymentController@payNow')->name('pay_now');

    Route::post('/pay/bill/{id}', 'SslCommerzPaymentController@index')->name('bill_pay');
    Route::post('/pay/pending/bill/{id}', 'SslCommerzPaymentController@pay_pending_bill')->name('pay_pending_bill');
    Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

    Route::post('/success', 'SslCommerzPaymentController@success');
    Route::post('/fail', 'SslCommerzPaymentController@fail');
    Route::post('/cancel', 'SslCommerzPaymentController@cancel');

    Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

});


