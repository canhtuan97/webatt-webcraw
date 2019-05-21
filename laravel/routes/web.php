<?php

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


// Route::get('/', 'Show@showTrangChu')->name('/');
Auth::routes();
Route::get('/', 'show@showTrangChu')->name('/');

//Hiển thị min-max điện thoại
Route::get('min.max', 'Show@minMax')->name('min.max');


Route::get('timkiem', 'Show@timkiemPost')->name('timkiem');




Route::get('max', 'Show@max')->name('max');
Route::get('max.ipad', 'Show@maxIpad')->name('max.ipad');


Route::get('min', 'Show@min')->name('min');
Route::get('min.ipad', 'Show@minIpad')->name('min.ipad');

