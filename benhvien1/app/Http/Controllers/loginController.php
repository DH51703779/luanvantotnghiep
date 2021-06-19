<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Symfony\Component\VarDumper\Cloner\Data;

class loginController extends Controller
{
    public function dangnhap(Request $re){
        Session::put('thongbaodangky',"");
        Session::put('thongbaodangky1',"");
        Session::put('thongbaodangnhap',"");
        $phone = $re->phone;
        $pass = $re->pass;

        $result = DB::table('taikhoan')->where('Sodienthoai',$phone)->where('MatKhau',$pass)->first();
        if($result){

            Session::put('id-user',$result->MaTK); 
            Session::put('sodienthoai',$result->Sodienthoai);
            Session::put('ten',$result->Ten);
            return view('home'); 
        }else{
            Session::put('thongbaodangnhap',"Số điện thoại hoặc mật khẩu không đúng !");
            return view('benhnhan.dangnhap'); 
        }

    }
  
    public function dangky(Request $re){
        Session::put('thongbaodangky',"");
        Session::put('thongbaodangky1',"");
        $phone = $re->phone;
        $ten = $re->ten;
        $pass1 = $re->pass1;
        $pass2 = $re->pass2;
        $cout = DB::table('taikhoan')->where('Sodienthoai',$phone)->count();
        if($cout>0)
        {
            Session::put('thongbaodangky',"Số điện thoại đã tồn tại !");   
            return view('benhnhan.dangnhap');
        }else{
        if($pass1 == $pass2){
            $data['Ten'] = $ten;
            $data['Sodienthoai']=$phone;
            $data['MatKhau']=$pass1;
            $data['VaiTro']="0";  
            DB::table('taikhoan')->insert($data);
            Session::put('thongbaodangky1',"Đăng Ký Thành Công");
            return view('benhnhan.dangnhap');
            
        }else{
            Session::put('thongbaodangky',"Mật khẩu chưa khớp  !");
          return view('benhnhan.dangnhap');
        }
    }
}
        public function dangxuat(){
            Session::put('id-user',""); 
            Session::put('sodienthoai',"");
            Session::put('ten',"");
            return view('home'); 
        }



   

}
