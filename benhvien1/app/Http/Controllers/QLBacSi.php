<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLBacSi extends Controller
{
     public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function add_bacsi(){
        $this->Authlogin();
        $ds_khoa=DB::table('khoa')->orderby('MaKhoa','desc')->get();
        $ds_phong=DB::table('phong')->orderby('MaPhong','desc')->get();

    	return view('admin.add_bacsi')->with('ds_khoa',$ds_khoa)->with('ds_phong',$ds_phong);
    }
       public function layout_theobacsi(){
        $khoa = DB::table('khoa')->get();

        return view('admin.timbacsi')->with('khoa',$khoa);
    }
     public function ds_bacsi($Makhoa){
        $this->Authlogin();
    	// $ds_bacsi = DB::table('bacsi')
     //    ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')
     //    ->join('phong','phong.MaPhong','=','bacsi.MaPhong')->orderby('bacsi.MaBS','desc')->get();
     //    $manager_dsbacsi = view('admin.ds_bacsi')->with('ds_bacsi',$ds_bacsi);
        $khoa= DB::table('khoa')->where('Makhoa',$Makhoa)->get();
        foreach($khoa as $key)
        Session::put('khoa',$key->TenKhoa);
        
        $dsbacsi = DB::table('bacsi')->Join('khoa','bacsi.MaKhoa','=','khoa.MaKhoa')->where('bacsi.MaKhoa',$Makhoa)->get();
       

        return view('admin.ds_bacsi')->with('ds_bacsi',$dsbacsi);
        // return view('/admin_layout')->with('admin.ds_bacsi',$manager_dsbacsi);
    }

    public function save_bacsi(Request $request){
        $this->Authlogin();
    	$data = array();
    	$data['TenBS']=$request -> TenBS;
    	$data['GioiTinh']=$request -> GioiTinh;
    	$data['DiaChi']=$request -> DiaChi;
    	$data['DienThoai']=$request -> DienThoai;
    	$data['HocVi']=$request -> HocVi;
    	$data['MaKhoa']=$request -> Khoa;
    	$data['MaPhong']=$request -> Phong;
        $data['TrangThaiBS']=$request -> TrangThaiBS;
    	// echo'<pre>';
    	// print_r($data);
    	// echo'</pre>';
    	DB::table('bacsi')->insert($data);
    	Session::put('message',"Thêm Thành Công!!!");
    	return Redirect::to('/add-bacsi');
    }
     //Suabacsi
    public function edit_bacsi($Ma_bacsi ){
        $this->Authlogin();
        $ds_khoa=DB::table('khoa')->orderby('MaKhoa','desc')->get();
        $ds_phong=DB::table('phong')->orderby('MaPhong','desc')->get();

        $edit_bacsi = DB::table('bacsi')->where('MaBS',$Ma_bacsi)->get();

        $manager_dsbacsi = view('admin.edit_bacsi')->with('edit_bacsi',$edit_bacsi)->with('ds_khoa',$ds_khoa)->with('ds_phong',$ds_phong);

        return view('/admin_layout')->with('admin.edit_bacsi',$manager_dsbacsi);
    }
    public function update_bacsi(Request $request,$Ma_bacsi ){
        $this->Authlogin();
        $data = array();
        $data['TenBS']=$request -> TenBS;
        $data['GioiTinh']=$request -> GioiTinh;
        $data['DiaChi']=$request -> DiaChi;
        $data['DienThoai']=$request -> DienThoai;
        $data['HocVi']=$request -> HocVi;
        $data['MaKhoa']=$request -> Khoa;
        $data['MaPhong']=$request -> Phong;

        DB::table('bacsi')->where('MaBS',$Ma_bacsi)->update($data);
        Session::put('message',"Sửa Thành Công!!!");
        return Redirect::to('/ds-bacsi');
    }
    public function unactive_bacsi($Ma_bacsi){
        DB::table('bacsi')->where('MaBS',$Ma_bacsi)->update(['TrangThaiBS'=>1]);
        Session::put('message',"Kích Hoạt Bác Sĩ Thành Công!!!");
        return Redirect::to('/ds-bacsi/{MaKhoa}');

    }
     public function active_bacsi($Ma_bacsi){
         DB::table('bacsi')->where('MaBS',$Ma_bacsi)->update(['TrangThaiBS'=>0]);
        Session::put('message',"Bác Sĩ Tạm Nghỉ !!!");
        return Redirect::to('/ds-bacsi/{MaKhoa}');
    }
}
