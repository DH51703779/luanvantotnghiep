<?php

use App\Http\Controllers\homecontroller;
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
//login
Route::get('/dangnhap','homecontroller@dangnhap');
route::post('/login','loginController@dangnhap');
route::post('/dangky','loginController@dangky');
route::get('/test/{key}','loginController@kiemtra');
route::get('/dangxuat','loginController@dangxuat');

// home 
Route::get('/datlich', 'homecontroller@layout');

Route::get('/dsbacsi/{MaKhoa}', 'homecontroller@dsbacsi');
Route::get('/dskhoa/{key}', 'homecontroller@dskhoa');

Route::post('/timkiem', 'homecontroller@timkiem');
Route::get('/lichkham/{id}','homecontroller@lichkham' );
Route::get('/dienthongtin/{MaLT}','homecontroller@diendangky');
Route::get('dienthongtin/quan/{Maquan}','homecontroller@quan');
Route::get('/theongay','homecontroller@homnay');
Route::get('/ngaytruc/{ngay}','homecontroller@ngaytruc');

Route::post('/dienthongtin','benhnhanController@diendangky');// Điền thông tin bệnh nhân
//bacsi



//benhnhan
Route::get('/thanhcong/{key}','benhnhanController@thanhcong');
Route::get('/trangcanhan','benhnhanController@trangcanhan');

//test 
Route :: get('/test','homecontroller@test');

