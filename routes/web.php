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

Route::get('category', 'ApiController@getAllCategories');
Route::get('category/{cat_id}', 'ApiController@getCategory');
Route::post('category', 'ApiController@createCategory');
Route::delete('category/{cat_id}', 'ApiController@deleteCategory');
