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
Route::get('/', 'ProductController@index')->middleware('auth');
Route::get('/add-product', 'ProductController@create');
Route::post('/add-product', 'ProductController@store')->name('product.store');
Route::get('/edit-product/{id}', 'ProductController@edit');
Route::put('/edit-product/{id}', 'ProductController@update');
Route::get('/delete-product/{id}', 'ProductController@delete');
Route::get('/search', 'ProductController@search');

Route::get('/category', 'CategoryController@index');
Route::get('/add-category', 'CategoryController@create');
Route::post('/add-category', 'CategoryController@store')->name('category.store');
Route::get('/edit-category/{id}', 'CategoryController@edit');
Route::put('/edit-category/{id}', 'CategoryController@update');
Route::get('/delete-category/{id}', 'CategoryController@delete');
Route::get('/search', 'CategoryController@search');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
