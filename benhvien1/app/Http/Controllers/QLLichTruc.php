<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLLichTruc extends Controller
{
     public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function add_LTruc(){
  		$this->Authlogin();
        $ds_bacsi=DB::table('bacsi')->orderby('MaBS','desc')->get();
    	return view('admin.add_LTruc')->with('ds_bacsi',$ds_bacsi);
    }
    public function save_LTruc(Request $request){
        $this->Authlogin();
    	$data = array();
    	$data['MaLT']=$request -> MaLT;
    	$data['Buoi']=$request -> Buoi;
    	$data['NgayTruc']=$request -> NgayTruc;
        $data['MaBS']=$request -> MaBS;
    	// echo'<pre>';
    	// print_r($data);
    	// echo'</pre>';
    	DB::table('lichtruc')->insert($data);
    	Session::put('message',"Thêm Lịch Trực Thành Công!!!");
    	return Redirect::to('/add-LTruc');
    }
    public function ds_LTruc(){
        $this->Authlogin();
    	$ds_LTruc = DB::table('lichtruc')
        ->join('bacsi','bacsi.MaBS','=','lichtruc.MaBS')->orderby('lichtruc.MaLT','desc')->get();
        $manager_dsLTruc = view('admin.ds_LTruc')->with('ds_LTruc',$ds_LTruc);
        return view('/admin_layout')->with('admin.ds_LTruc',$manager_dsLTruc);
    }

    public function edit_LTruc($Ma_LTruc){
        $this->Authlogin();
        $ds_bacsi=DB::table('bacsi')->orderby('MaBS','desc')->get();
        $edit_LTruc = DB::table('lichtruc')->where('MaLT',$Ma_LTruc)->get();

        $manager_dsLTruc = view('admin.edit_LTruc')->with('edit_LTruc',$edit_LTruc)->with('ds_bacsi',$ds_bacsi);

        return view('/admin_layout')->with('admin.edit_LTruc',$manager_dsLTruc);
    }
    public function update_LTruc(Request $request,$Ma_LTruc ){
        $this->Authlogin();
        $data = array();
    	$data['Buoi']=$request -> Buoi;
    	$data['NgayTruc']=$request -> NgayTruc;
        $data['MaBS']=$request -> MaBS;

        DB::table('lichtruc')->where('MaLT',$Ma_LTruc)->update($data);
        Session::put('message',"Sửa Thành Công!!!");
        return Redirect::to('/ds-LTruc');
    }
    public function delete_LTruc($Ma_LTruc){
        $this->Authlogin();
        DB::table('lichtruc')->where('MaLT',$Ma_LTruc)->delete();
        Session::put('message',"Xóa Thành Công!!!");
        return Redirect::to('/ds-LTruc');
    }
}
