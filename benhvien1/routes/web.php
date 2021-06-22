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
Route::get('/dienthongtin/lay-benh-nhan/{MaBN}','benhnhancontroller@chitietbenhnhan');
//benhnhan
Route::get('/thanhcong/{key}','benhnhanController@thanhcong');
Route::get('/trangcanhan','benhnhanController@trangcanhan');
Route::get('/trangcanhan/chi-tiet-benh-nhan/{MaBN}','benhnhanController@chitietbenhnhan');
Route::post('/trang-ca-nhan/cap-nhat','benhnhanController@capnhat');
Route::get('/trang-ca-nhan/lich-kham/','benhnhanController@lichkham');
//test 
Route :: get('/test','homecontroller@test');

//bacsi
Route::get('/bacsi', 'BacsiController@index');
Route::get('/trangbacsi', 'BacsiController@bacsi_layout');
Route::get('/logout-bacsi', 'BacsiController@logout');
Route::post('/admin-dashboard','BacsiController@dashboard');

// bacsi
Route::get('bac-si/lich-truc', 'BacsiController@lichtruc');
Route::get('/bac-si/lich-truc/{NgayTruc}', 'BacsiController@lichtruc_chitiet');
Route::get('/bac-si/lich-hen/{MaLT}', 'BacsiController@lichhen');
Route::get('/bac-si/chi-tiet-benh-nhan/{MaLK}', 'BacsiController@chitietbenhnhan');
Route::post('/bac-si/capnhat/', 'BacsiController@capnhat');
Route::get('/bac-si/danh-sach-benh-nhan', 'BacsiController@danhsachbenhnhan');
Route::get('/bac-si/danh-sach-bn', 'BacsiController@danhsachbn');









//backend admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@admin_layout');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');


//QLbacsi
Route::get('/add-bacsi', 'QLBacSi@add_bacsi');
Route::get('/theobacsi', 'QLBacSi@layout_theobacsi');
Route::get('/ds-bacsi/{MaKhoa}', 'QLBacSi@ds_bacsi');

Route::get('/unactive-bacsi/{Ma_bacsi}', 'QLBacSi@unactive_bacsi');
Route::get('/active-bacsi/{Ma_bacsi}', 'QLBacSi@active_bacsi');

Route::post('/save-bacsi', 'QLBacSi@save_bacsi');
//Xoabacsi
Route::get('/delete-bacsi/{Ma_bacsi}', 'QLBacSi@delete_bacsi');
//Suabacsi
Route::get('/edit-bacsi/{Ma_bacsi}', 'QLBacSi@edit_bacsi');
Route::post('/update-bacsi/{Ma_bacsi}', 'QLBacSi@update_bacsi');


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

