<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('role');

Route::get('/create-user','UserController@create')->name('user.create');

Route::post('/store-user','UserController@store')->name('user.store');

Route::get('/admin',function(){
    return view('admin');
});
Route::get('/clerk',function(){
    return view('clerk');
});
Route::get('/inventory-manager',function(){
    return view('inventory-manager');
});
Route::get('/order-manager',function(){
    return view('order-manager');
});
Route::get('/customer',function(){
    return view('customer');
});