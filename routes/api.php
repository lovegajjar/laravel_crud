<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users.index');
Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('users.create');
Route::post('/users/store', 'App\Http\Controllers\UserController@store')->name('users.store');
Route::get('/users/show/{id}', 'App\Http\Controllers\UserController@show')->name('users.show');
Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('users.edit');
Route::put('/users/update/{id}', 'App\Http\Controllers\UserController@update')->name('users.update');
Route::delete('/users/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');
Route::get('/cities', 'App\Http\Controllers\UserController@getCity')->name('users.getCity');
