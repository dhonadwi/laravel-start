<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicationp. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/user/setting', 'UserController@setting')->name('user-setting');
    Route::put('/user/setting', 'UserController@update')->name('user-update');
    Route::put('/user/setting/pass', 'UserController@update_pass')->name('user-update-pass');

    // Route::get('/history', 'HistoryController@index')->name('history');

    
    // Route::get('/person/{id}', 'UserController@history')->name('person-history');
    // Route::get('/person/transaction/{id}', 'TransactionController@create')->name('person-transaction');
    // Route::post('/person/transaction', 'TransactionController@store')->name('person-transaction-store');

    // Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    // // Route::post('/repay', 'CheckoutController@repay')->name('repay');
});

Route::middleware(['auth','admin'])
->prefix('admin')->group(function () {
    //ga dipake
    // Route::get('/', 'DashboardController@index')->name('dashboard');
    // Route::get('/person/{id}', 'UserController@history')->name('person-history');
    // Route::get('/person/transaction/{id}', 'TransactionController@create')->name('person-transaction');
    // Route::post('/person/transaction', 'TransactionController@store')->name('person-transaction-store');
    
    Route::get('/person', 'UserController@show')->name('person');
    Route::get('/person-add', 'UserController@create')->name('person-add');
    Route::post('/person', 'UserController@store')->name('person-store');
    // Route::get('/cluster', 'ClusterController@index')->name('cluster');
    // Route::get('/cluster-add', 'ClusterController@create')->name('cluster-add');
    // Route::post('/cluster','ClusterController@store')->name('cluster-store');
    
    
    
    // Route::get('/expense', 'ExpenseController@create')->name('transaction-expense');
    // Route::post('/expense', 'ExpenseController@store')->name('transaction-expense-store');
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/create', 'UserController@create')->name('user-create');
    Route::post('/user/create', 'UserController@store')->name('user-store');
    
    // Route::put('/history','HistoryController@update')->name('update-status');
    
});


Auth::routes(['verify' => true]);

// Route::get('midtrans/finish','MidtransController@finishRedirect');
// Route::get('midtrans/unfinish','MidtransController@finishRedirect');
// Route::get('midtrans/error','MidtransController@finishRedirect');

// Route::post('/midtrans/callback', 'CheckoutController@callback')->name('midtrans-callback');