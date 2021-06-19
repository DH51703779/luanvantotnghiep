<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
class homecontroller extends Controller
{
    public function layout(){
        return view('datlich');
    }
    public function layout_theobacsi(){
        $khoa = DB::table('khoa')->get();

        return view('benhnhan.timbacsi')->with('khoa',$khoa);
    }
    public function dsbacsi($Makhoa)
    {
        $khoa= DB::table('khoa')->where('Makhoa',$Makhoa)->get();
        foreach($khoa as $key)
        Session::put('khoa',$key->TenKhoa);
        
        $dsbacsi = DB::table('bacsi')->Join('khoa','bacsi.MaKhoa','=','khoa.MaKhoa')->where('bacsi.MaKhoa',$Makhoa)->get();
       

        return view('benhnhan.dsbacsi')->with('dsbacsi',$dsbacsi);
    }
    public function layout_theongay(){
        return view('lich');
    }
    // public function search(Request $re){
    //     if()
    // }
}
