<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BacsiController extends Controller
{
    public function Authlogin(){
        $matk=Session::get('matk-bacsi');
            if($matk){
              return  Redirect::to('/trangbacsi');
            }else{
              return  Redirect::to('/bacsi')->send();
            }
    }
    public function index(){
        $matk=Session::get('matk-bacsi');
        if($matk){
            return  Redirect::to('/trangbacsi');
        }else{
    	return view('admin_login');
        }
    }
    public function bacsi_layout(){
        $this->Authlogin();
        $matk=Session::get('matk-bacsi');
        $bacsi = DB::table('taikhoan')
        ->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')
        ->join('khoa','bacsi.MaKhoa','=','khoa.MaKhoa')
        ->where('MaTK',$matk)->get();
       
    	return view('bacsi.giaodien')->with('bacsi',$bacsi);
    }

    // lịch trực 

    public function lichtruc(){
        $this->Authlogin();
        $MaBS = Session::get('MaBS');
        $lichtruc = DB::table('lichtruc')->where('MaBS',$MaBS)->get();
        $count = DB::table('lichtruc')->where('MaBS',$MaBS)->count();
        return view('bacsi.lichtruc-bacsi')->with('lichtruc',$lichtruc)->with('count',$count);
       
    }
    public function lichtruc_chitiet($NgayTruc){
        $MaBS=Session::get('MaBS');
        $lichtruc = DB::table('lichtruc')->Join('bacsi', 'lichtruc.MaBS', '=', 'bacsi.MaBS')
        ->where('NgayTruc',$NgayTruc)->where('lichtruc.MaBS',$MaBS)->get();
        foreach($lichtruc as $l){
            $LK = $l->MaLT;
            $data["MaLT"]=$LK;
            $data["Buoi"]=$l->Buoi;
            $data["NgayTruc"]=$l->NgayTruc;
            $data["MaBS"]=$l->MaBS;
            $data["MaPhong"]=$l->MaPhong;
            $Count = DB::table('lichkham')->where('MaLT',$LK)->count();
            $data["count"]=$Count;
            
           $a[]=$data;
            $hihi = json_encode($a,true);
        } 
        echo $hihi;


    }

    // lịch hẹn 
    public function lichhen($MaLT){
        $this->Authlogin();
        $ds = DB::table('lichkham')
        ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
        ->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
        ->where('lichtruc.MaLT', $MaLT)->get();
        return View('bacsi.lich-hen')->with('danhsach',$ds);

    }
    public function chitietbenhnhan($MaLK){
        $this->Authlogin();
        $BN = DB::table('lichkham')
        ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')->where('lichkham.MaLK', $MaLK)->get();
        return view('bacsi.chitietbenhnhan')->with('benhnhan',$BN);
    }
    public function capnhat(Request $re){
        $this->Authlogin();
        $data['Trangthai'] = $re->submit;
        $MaLT = $re->MaLT;
        DB::table('lichkham')->where('MaLK',$re->MaLK)->update($data);
        return  Redirect::to('/bac-si/lich-hen/'.$MaLT);
    }


    public function danhsachbenhnhan(){
        $this->Authlogin();
        $MaBS=Session::get('MaBS'); 
        $a = "2";
        $BN = DB::table('lichkham')
        ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')->where('lichkham.Trangthai',$a)->where('lichkham.MaBS',$MaBS)->get();
        return view('bacsi.lichkham_hoanthanh')->with('danhsach',$BN) ;
    }
    public function danhsachbn(){
        $this->Authlogin();
        $MaBS=Session::get('MaBS'); 
        $a = "1";
        $BN = DB::table('lichkham')
        ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')->where('lichkham.Trangthai',$a)->where('lichkham.MaBS',$MaBS)->get();
        return view('bacsi.lichkham_vang')->with('danhsach',$BN) ;
    }
    public function logout(){
        $this->Authlogin();
        Session::put('ten-bacsi',null);
        Session::put('matk-bacsi',null);
        return Redirect::to('/bacsi');
    }
    public function capnhattt(Request $re){
        $data['DienThoai']=$re->dienthoai;
        $data['DiaChi'] = $re->diachi;
        $Ma = Session::get('MaBS');
        DB::table('bacsi')->where('MaBS',$Ma)->update($data);
        return  Redirect::to('/trangbacsi');
    }
    public function capnhattk(Request $re){
        $data['MatKhau'] = $re->matkhau;
        $matk=Session::get('matk-bacsi');
        DB::table('taikhoan')->where('MaTK',$matk)->update($data);
        return  Redirect::to('/trangbacsi');
    }
}