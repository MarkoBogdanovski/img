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

Route::get('/', 'ImageController@index');
Route::post('/', 'ImageController@store');
Route::get('/download/{image}', 'ImageController@download');

Route::get('/home', function () {
    return view('welcome');
});
