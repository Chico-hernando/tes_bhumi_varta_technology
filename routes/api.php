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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'User\UserController@loginUser');
Route::get('users','User\UserController@getUser');
Route::post('users','User\UserController@createUser');
Route::put('users/{id}','User\UserController@updateUser');
Route::delete('users/{id}','User\UserController@deleteUser');

Route::get('catalog','Catalog\CatalogController@getCatalog');
Route::post('catalog','Catalog\CatalogController@createCatalog');
Route::put('catalog/{id}','Catalog\CatalogController@updateCatalog');
Route::delete('catalog/{id}','Catalog\CatalogController@deleteCatalog');
