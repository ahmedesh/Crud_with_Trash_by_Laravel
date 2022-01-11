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

//Route::get('/', function () {
//
//});

Route::resource('/', 'ProductController');

// resource شامله كل ال indexs اللي هما show, index , create , edit , update , delete بدل م اعمل لكل واحده مسار لوحدها
Route::resource('products', 'ProductController');
Route::get('products/soft/delete/{id}' , 'ProductController@softDelete')->name('soft.delete');
Route::get('product/trash' , 'ProductController@trashedProducts')->name('product.trash');
Route::get('product/back/from/trash/{id}' , 'ProductController@backFromSoftDelete')->name('product.back.from.trash');
Route::get('product/delete/from/database/{id}' , 'ProductController@deleteForEver')->name('product.delete.from.database');
