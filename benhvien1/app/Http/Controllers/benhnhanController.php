<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Symfony\Component\VarDumper\Cloner\Data;
session_start();
class benhnhanController extends Controller
{
    public function Alogin(){
        $matk=Session::get('id-user');
            if($matk){
              return  Redirect::to('/');
            }else{
              return  Redirect::to('/dangnhap')->send();
            }
    }

    public function diendangky(Request $re)
    {   $this->Alogin();
        $id = Session::get('id-user');
        $MaLT = Session::get('MaLT');
        Session::put('MaL', $MaLT);
        $result = DB::table('bacsi')->Join('lichtruc', 'bacsi.MaBS', '=', 'lichtruc.MaBS')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
            ->where('lichtruc.MaLT', $MaLT)->get();


        $BN = DB::table('benhnhan')->where('TenBN', $re->ten)->where('DienThoai', $re->sdt)->where('MaTK', $id)->count();

        $data['TenBN'] = $re->ten;
        $data['gioitinh'] = $re->gioitinh;
        $data['Ngaysinh'] = $re->ngaysinh;
       
        $data['DienThoai'] = $re->sdt;
        $data['CMND'] = $re->cmnd;
        $data['Tiensubenh'] = $re->tiensubenh;
        $data['MaTK'] = $id;
        $get_image = $re->file('hinh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $re->ten . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/benhan', $new_image);
            $data['hinh'] = $new_image;
            if ($re->MaBN) {
                $data['DiaChi']=$re->diachi;
                DB::table('benhnhan')->where('MaBN', $re->MaBN)->update($data);
               
            } else {
                $phuong = $re->phuong;
                $quan = $re->quan;
                $tp = ",TP.Hồ Chí Minh";
                $data['DiaChi'] = $re->sonha . " " . $re->duong . " ," . $phuong . ", " . $quan . $tp;
                DB::table('benhnhan')->insert($data);
            }
            $BN = DB::table('benhnhan')->where('MaBN', $re->MaBN)->get();
            foreach ($BN as $key)
                Session::put('MaBN', $key->MaBN);

            return view('thanhtoan')->with('result', $result)->with('BN', $BN);
        }else{
        if ($re->MaBN != null) {
            $data['DiaChi']=$re->diachi;
            DB::table('benhnhan')->where('MaBN', $re->MaBN)->update($data);
        } else {
            $phuong = $re->phuong;
            $quan = $re->quan;
            $tp = ",TP.Hồ Chí Minh";
            $data['DiaChi'] = $re->sonha . " " . $re->duong . " ," . $phuong . ", " . $quan . $tp;
            $data['hinh'] = '';
            DB::table('benhnhan')->insert($data);
         
        }
    }
        $BN = DB::table('benhnhan')->where('TenBN', $re->ten)->where('DienThoai', $re->sdt)->orWhere('MaBN',$re->MaBN)->get();
        foreach ($BN as $key)
            Session::put('MaBN', $key->MaBN);

        return view('thanhtoan')->with('result', $result)->with('BN', $BN);
    }
    public function trangcanhan()
    {
        $this->Alogin();

        $id = Session::get('id-user');
        if($id){

        $taikhoan = DB::table('taikhoan')->where('MaTK', $id)->get();
        $benhnhan = DB::table('benhnhan')->where('MaTK', $id)->get();

        return view('benhnhan.trangcanhan')->with('taikhoan', $taikhoan)->with('benhnhan', $benhnhan);
        }
        else{
            return redirect('/dangnhap');
        }
    }
    public function lichkham()
    {$this->Alogin();
        $id = Session::get('id-user');
        $count = DB::table('lichkham')
            ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
            ->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
            ->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
            ->join('khoa', 'khoa.Makhoa', '=', 'bacsi.Makhoa')
            ->where('benhnhan.MaTK', $id)->orderBy('NgayTruc', 'desc')->count();
        $sotrang =  $count / 4;
        $sotran = ceil($sotrang);
        $int = (int)$count;
        if ($int > 4) {
            $lich = DB::table('lichkham')
                ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
                ->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
                ->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
                ->join('khoa', 'khoa.Makhoa', '=', 'bacsi.Makhoa')
                ->where('benhnhan.MaTK', $id)->orderBy('NgayTruc', 'desc')->paginate(4);
        } else {
            $lich = DB::table('lichkham')
                ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
                ->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
                ->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
                ->join('khoa', 'khoa.Makhoa', '=', 'bacsi.Makhoa')
                ->where('benhnhan.MaTK', $id)->orderBy('NgayTruc', 'desc')->get();
        }

        $taikhoan = DB::table('taikhoan')->where('MaTK', $id)->get();
        return view('benhnhan.danhsachlichkham')->with('lichkham', $lich)->with('taikhoan', $taikhoan)->with('int', $int);
    }

    public function thanhcong($key)
    {
        $id = Session::get('id-user');
        $MaBN = Session::get('MaBN');
        $MaLt = Session::get('MaL');
        $data['MaBN'] = $MaBN;
        $count = DB::table('lichkham')->where('MaLT', $MaLt)->count();
        $data['STT'] = $count + 1;
        $data['MaLT'] = $MaLt;
        $data['Thanhtoan'] = $key;
        $data['Trangthai'] = 0;
        $result = DB::table('bacsi')->Join('lichtruc', 'bacsi.MaBS', '=', 'lichtruc.MaBS')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
            ->where('lichtruc.MaLT', $MaLt)->get();
        foreach ($result as $key)
            $data['TongTien'] = $key->gia;
        $data['MaBS'] = $key->MaBS;

        DB::table('lichkham')->insert($data);
        return redirect('/trang-ca-nhan/lich-kham/');
    }
    public function chitietbenhnhan($MaBN)
    {   
        $BN = DB::table('benhnhan')->where('MaBN', $MaBN)->get();
        echo $BN;
    }

    public function capnhat(Request $re)
    {

        $data['TenBN'] = $re->ten;
        $data['gioitinh'] = $re->gioitinh;
        $data['Ngaysinh'] = $re->ngaysinh;
        $data['Diachi'] = $re->diachi;
        $data['DienThoai'] = $re->sdt;
        $data['CMND'] = $re->cmnd;
        $data['Tiensubenh'] = $re->tiensubenh;
        $get_image = $re->file('hinh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $re->ten . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/benhan', $new_image);
            $data['hinh'] = $new_image;
            DB::table('benhnhan')->where('MaBN', $re->MaBN)->update($data);
        }

        DB::table('benhnhan')->where('MaBN', $re->MaBN)->update($data);
        return redirect('/trangcanhan');
    }
}
