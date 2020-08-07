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
Route::delete('/{uuid}', 'ImageController@destroy');
Route::post('/zipfiles', 'ImageController@zipFiles');
Route::get('/download/{dir}/{image}', 'ImageController@download');
Route::get('/downloadZip/{file}', 'ImageController@downloadZip');

Route::get('/help', function () {
    return phpinfo();
});
