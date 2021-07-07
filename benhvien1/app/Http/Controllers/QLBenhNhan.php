<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLBenhNhan extends Controller
{
    public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function ds_BenhNhan(){
        $this->Authlogin();
    	$ds_BenhNhan = DB::table('benhnhan')->get();
     	$manager_dsbenhnhan = view('admin.ds_BenhNhan')->with('ds_BenhNhan',$ds_BenhNhan);
    	return view('/admin_layout')->with('admin.ds_BenhNhan',$manager_dsbenhnhan);
    }
     public function chitietbn($Ma_benhnhan){
        $chitietbenhnhan = DB::table('benhnhan')->where('MaBN',$Ma_benhnhan)->
        orderby('benhnhan.MaBN','desc')->get();
        $manager_ctbenhnhan = view('admin.chitietbenhnhan')->with('chitietbenhnhan',$chitietbenhnhan);

        return view('/admin_layout')->with('admin.chitietbenhnhan',$manager_ctbenhnhan);
    }
}
