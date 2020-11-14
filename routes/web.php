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
Route::get('/items', 'ItemsController@index')->name('items.index');
Route::post('/items', 'ItemsController@store')->middleware('auth');
Route::get('/items/dress', 'ItemsController@show_all_dresses')->name('items.dress');
Route::get('/items/footwear', 'ItemsController@show_all_footwear')->name('items.footwear');
Route::get('/items/bag', 'ItemsController@show_all_bags')->name('items.bag');
Route::get('/items/edit/{id}', 'ItemsController@edit')->name('items.update')->middleware('auth');
Route::post('/items/edit/{id}', 'ItemsController@update')->name('items.update')->middleware('auth');
Route::get('/items/addPhoto/{id}', 'PhotosController@create')->name('items.addPhoto')->middleware('auth');
Route::post('/items/addPhoto/{id}', 'PhotosController@store')->name('items.addPhoto')->middleware('auth');
Route::get('/items/create', 'ItemsController@create')->name('items.create')->middleware('auth');
Route::get('/items/{id}', 'ItemsController@show')->name('items.show');
Route::delete('/items/{id}', 'ItemsController@destroy')->name('items.delete')->middleware('auth');
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout')


Auth::routes(['register'=> false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
