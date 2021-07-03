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


//backend admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@admin_layout');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');


//QLbacsi
Route::get('/add-bacsi', 'QLBacSi@add_bacsi');
Route::get('/ds-bacsi', 'QLBacSi@ds_bacsi');

Route::get('/unactive-bacsi/{Ma_bacsi}', 'QLBacSi@unactive_bacsi');
Route::get('/active-bacsi/{Ma_bacsi}', 'QLBacSi@active_bacsi');

Route::post('/save-bacsi', 'QLBacSi@save_bacsi');
//Xoabacsi
Route::get('/delete-bacsi/{Ma_bacsi}', 'QLBacSi@delete_bacsi');
//Suabacsi
Route::get('/edit-bacsi/{Ma_bacsi}', 'QLBacSi@edit_bacsi');
Route::post('/update-bacsi/{Ma_bacsi}', 'QLBacSi@update_bacsi');
//chitietbacsi
Route::get('/chitietbacsi/{Ma_bacsi}', 'QLBacSi@chitietbs');

//QLKhoa
Route::get('/add-Khoa', 'QLKhoa@add_Khoa');
Route::get('/ds-Khoa', 'QLKhoa@ds_Khoa');
Route::post('/save-Khoa', 'QLKhoa@save_Khoa');

Route::get('/unactive-khoa/{Ma_Khoa}', 'QLKhoa@unactive_khoa');
Route::get('/active-khoa/{Ma_Khoa}', 'QLKhoa@active_khoa');

//XoaKhoa
// Route::get('/delete-Khoa/{Ma_Khoa}', 'QLKhoa@delete_Khoa');
//SuaKhoa
Route::get('/edit-Khoa/{Ma_Khoa}', 'QLKhoa@edit_Khoa');
Route::post('/update-Khoa/{Ma_Khoa}', 'QLKhoa@update_Khoa');


//QLBenhNhan
Route::get('/ds-BenhNhan', 'QLBenhNhan@ds_BenhNhan');
Route::get('/chitietbenhnhan/{Ma_benhnhan}', 'QLBenhNhan@chitietbn');
//QLPhong
Route::get('/add-Phong', 'QLPhong@add_Phong');
Route::post('/save-Phong', 'QLPhong@save_Phong');
Route::get('/ds-Phong', 'QLPhong@ds_Phong');

Route::get('/unactive-Phong/{Ma_Phong}', 'QLPhong@unactive_Phong');
Route::get('/active-Phong/{Ma_Phong}', 'QLPhong@active_Phong');

Route::get('/edit-Phong/{Ma_Phong}', 'QLPhong@edit_Phong');
Route::post('/update-Phong/{Ma_Phong}', 'QLPhong@update_Phong');


//QLLichTruc
Route::get('/add-LTruc', 'QLLichTruc@add_LTruc');
Route::post('/save-LTruc', 'QLLichTruc@save_LTruc');
Route::get('/ds-LTruc', 'QLLichTruc@ds_LTruc');

Route::get('/edit-LTruc/{Ma_LTruc}', 'QLLichTruc@edit_LTruc');
Route::post('/update-LTruc/{Ma_LTruc}', 'QLLichTruc@update_LTruc');
Route::get('/delete-LTruc/{Ma_LTruc}', 'QLLichTruc@delete_LTruc');


//lịch khám
Route::get('/ds-LKham', 'QLLichTruc@ds_Lkham');
Route::get('/chitietlichkham/{Ma_LKham}', 'QLLichTruc@chitietLK');


//tài khoản
Route::get('/ds-TaiKhoan', 'QLLichTruc@ds_TaiKhoan');
Route::get('/edit-TaiKhoan/{Ma_TaiKhoan}', 'QLLichTruc@edit_TaiKhoan');
Route::post('/update-TaiKhoan/{Ma_TaiKhoan}', 'QLLichTruc@update_TaiKhoan');
Route::get('/delete-TaiKhoan/{Ma_TaiKhoan}', 'QLLichTruc@delete_TaiKhoan');

Route::get('/add-TaiKhoan', 'QLLichTruc@add_TaiKhoan');
Route::post('/save-TaiKhoan', 'QLLichTruc@save_TaiKhoan');

