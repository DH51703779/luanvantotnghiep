<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Symfony\Component\VarDumper\Cloner\Data;

class benhnhanController extends Controller
{
    
public function diendangky(Request $re){
    $id = Session::get('id-user');
    $BN= DB::table('benhnhan')->where('TenBN',$re->ten)->where('DienThoai',$re->sdt)->count();
    if($BN>0){
        DB::table('benhnhan')->where('TenBN',$re->ten)->where('DienThoai',$re->sdt)->delete();
    }
    $data['TenBN']= $re->ten;
    $data['gioitinh']=$re->gioitinh;
    $data['Ngaysinh']=$re->ngaysinh;
    $phuong = $re->phuong;
    $quan = $re->quan;
    $tp = ",TP.Hồ Chí Minh";
    $data['DiaChi']=$re->sonha." ". $re->duong." ,".$phuong.", ". $quan.$tp;
    $data['DienThoai']=$re->sdt;
    $data['CMND']=$re->cmnd;
    $data['Tiensubenh']=$re->tiensubenh;
    $data['MaTK']=$id;
    $get_image = $re->file('hinh');
      
    if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $re->ten.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/uploads/benhan',$new_image);
        $data['hinh'] = $new_image;
        DB::table('benhnhan')->insert($data);
       
    }
    $data['hinh'] = '';
    DB::table('benhnhan')->insert($data);

    $BN= DB::table('benhnhan')->where('TenBN',$re->ten)->where('DienThoai',$re->sdt)->get();
    foreach($BN as $key)
    Session::put('MaBN',$key->MaBN);
    $MaLT =Session::get('MaLT');
    $result = DB::table('bacsi')->Join('lichtruc', 'bacsi.MaBS', '=', 'lichtruc.MaBS')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
        ->where('lichtruc.MaLT', $MaLT)->get();
   
        
        Session::put('MaL',$MaLT);
    return view('thanhtoan')->with('result',$result)->with('BN',$BN);
    
}
public function trangcanhan(){
    $id = Session::get('id-user');
    $count = DB::table('lichkham')
    ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
    ->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
    ->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
    ->join('khoa','khoa.Makhoa','=','bacsi.Makhoa')
    ->where('benhnhan.MaTK', $id)->orderBy('NgayTruc', 'desc')->count();
    $sotrang=  $count/4;
    $sotran = ceil($sotrang);

    $lich = DB::table('lichkham')
    ->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
    ->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
    ->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
    ->join('khoa','khoa.Makhoa','=','bacsi.Makhoa')
    ->where('benhnhan.MaTK', $id)->orderBy('NgayTruc', 'desc')->paginate($sotran);
    

    $taikhoan = DB::table('taikhoan')->where('MaTK',$id)->get();
    $benhnhan = DB::table('benhnhan')->where('MaTK',$id)->get();
    
    return view('benhnhan.trangcanhan')->with('lichkham',$lich)->with('taikhoan',$taikhoan)->with('benhnhan',$benhnhan);
}
public function thanhcong($key){
    $id = Session::get('id-user');
    $MaBN =Session::get('MaBN');
    $MaLt =Session::get('MaL');
    $data['MaBN']=$MaBN;
    $count= DB::table('lichkham')->where('MaLT',$MaLt)->count();
    $data['STT']= $count+1;
    $data['MaLT']=$MaLt;
    $data['Tinhtrang']=$key;
    $result = DB::table('bacsi')->Join('lichtruc', 'bacsi.MaBS', '=', 'lichtruc.MaBS')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
        ->where('lichtruc.MaLT', $MaLt)->get();
    foreach($result as $key )
    $data['TongTien']= $key->gia;
    $data['MaBS']=$key->MaBS;
    DB::table('lichkham')->insert($data);
    return redirect('/trangcanhan');
    
}


   

}
