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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('/customer')->group(function()
{
    Route::get('/', 'App\Http\Controllers\CustomerController@showLogin')->name('customer.showLogin');
    Route::get('/register', 'App\Http\Controllers\CustomerController@showRegister')->name('customer.showRegister');
    Route::post('/store', 'App\Http\Controllers\CustomerController@register')->name('customer.register');
    Route::post('/login', 'App\Http\Controllers\CustomerController@login')->name('customer.login');
    Route::get('/logout', 'App\Http\Controllers\CustomerController@logout')->name('customer.logout');
    Route::get('/{drive}/login-oauth', 'App\Http\Controllers\CustomerController@loginOauth')->name('customer.loginoauth');
    Route::get('/{drive}/callback', 'App\Http\Controllers\CustomerController@callback')->name('customer.callback');
Route::get('/list', 'App\Http\Controllers\CustomerController@index')->name('customer.index');
});
Route::prefix('/ogani')->group(function()
    {
        Route::get('/', 'App\Http\Controllers\OganiController@index')->name('ogani.index');
        Route::get('/shop-grid', 'App\Http\Controllers\OganiController@shopGrid')->name('ogani.shop-grid');
        Route::get('/blog', 'App\Http\Controllers\OganiController@blog')->name('ogani.blog');
        Route::get('/contact', 'App\Http\Controllers\OganiController@contact')->name('ogani.contact');
        Route::get('/search', 'App\Http\Controllers\OganiController@search')->name('ogani.search');
    });
Route::prefix('/dashboard')->group(function()
{
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.index');
});
Route::prefix('/category')->group(function()
{
    Route::get('/', 'App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('/add', 'App\Http\Controllers\CategoryController@create')->name('category.add');
    Route::post('/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::post('/{id}/update', 'App\Http\Controllers\CategoryController@update')->name('category.update');
    Route::get('/{id}/delete', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');
    Route::get('/{id}/show', 'App\Http\Controllers\CategoryController@show')->name('category.show');
});
Route::prefix('/food')->group(function()
{
    Route::get('/', 'App\Http\Controllers\FoodController@index')->name('food.index');
    Route::get('/add', 'App\Http\Controllers\FoodController@create')->name('food.add');
    Route::post('/store', 'App\Http\Controllers\FoodController@store')->name('food.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\FoodController@edit')->name('food.edit');
    Route::post('/{id}/update', 'App\Http\Controllers\FoodController@update')->name('food.update');
    Route::get('/{id}/delete', 'App\Http\Controllers\FoodController@destroy')->name('food.delete');
});
Route::prefix('/checkout')->group(function()
{
    Route::get('/list', 'App\Http\Controllers\CartController@list')->name('cart.list')->middleware('auth');
    Route::get('/{id}/add', 'App\Http\Controllers\CartController@addToCart')->name('cart.add-to-cart')->middleware('auth');
    Route::get('/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');
});

Route::prefix('/order')->group(function()
{
    Route::get('/', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::post('/store', 'App\Http\Controllers\OrderController@store')->name('order.store');
    Route::post('/{id}/update-pending', 'App\Http\Controllers\OrderController@updatePending')->name('order.updatePending');
    Route::post('/{id}/update-success', 'App\Http\Controllers\OrderController@updateSuccess')->name('order.updateSuccess');
    Route::post('/{id}/update-fail', 'App\Http\Controllers\OrderController@updateFail')->name('order.updateFail');
});