<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function index(){

    	return view('admin_login');
    }
    public function admin_layout(){
        $this->Authlogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$Ten = $request->Ten;
    	$MatKhau = $request->MatKhau;
    	$result = DB::table('taikhoan')->where('ten',$Ten)->where('MatKhau',$MatKhau)->where('vaitro',1)->first();

    	if($result){
            Session::put('ten',$result->Ten);
            Session::put('matk',$result->MaTK);
            return Redirect::to('/dashboard');
        }else{
             Session::put('message',"Mật Khẩu Hoặc Tài Khoản Không Đúng!!");
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->Authlogin();
        Session::put('ten',null);
        Session::put('matk',null);
        return Redirect::to('/admin');
    }
}
