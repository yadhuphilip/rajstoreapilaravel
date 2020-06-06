<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', 'ApiController@getAllCategories');
Route::get('category/{cat_id}', 'ApiController@getCategory');
Route::post('category', 'ApiController@createCategory');
Route::delete('category/{cat_id}', 'ApiController@deleteCategory');

//product
Route::get('product', 'ApiController@getAllProducts');
Route::get('product/{p_id}', 'ApiController@getProduct');
Route::post('product', 'ApiController@createProduct');
Route::delete('product/{p_id}', 'ApiController@deleteProduct');
