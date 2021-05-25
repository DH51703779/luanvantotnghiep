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
    return view('home');
});


// home 
Route::get('/datlich', 'homecontroller@layout');
Route::get('/theobacsi', 'homecontroller@layout_theobacsi');
Route::get('/dsbacsi/{MaKhoa}', 'homecontroller@dsbacsi');
Route::post('/search', 'homecontroller@search');
Route::get('/theongay', 'homecontroller@layout_theongay');

//bacsi



//benhnhan



