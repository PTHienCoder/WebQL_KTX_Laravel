<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Login;
use DB;
use App\Student;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class WebSite_Controller extends Controller
{

    public function Xem_Phong(){
        $all_phong = DB::table('tbl_phong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
        ->get();
        // $manager_product  = view('Student.DanhSachPhong')->with('allphong',$all_phong);
    	// return view('Student_layout')>with('Student.DanhSachPhong',$manager_product);
        return view('Pages.xemphong')->with('allphong', $all_phong);

    } 

    public function register(Request $request){


        $phonghtai = DB::table('tbl_student')
        ->orwhere('email', $request->email)
        ->orwhere('masv', $request->masv)
        ->orwhere('phone', $request->phone)
        ->orwhere('cmnd', $request->cmnd)
        ->get();
        $phong_count = $phonghtai->count();
        if($phonghtai){
               if($phong_count>0){



                Session::put('message','Thông tin Email, Phone, CMND/CCCD hoặc mã sinh viên của bạn đã tồn tại');
                return Redirect::to('/Register-Student');



                }
               $data = $request->all();
        
               $mauser = substr(md5(microtime()),rand(0,26),5);
       
               $data2 = array();
               $data2['user_name'] = $request->email;
               $data2['pass'] = $request->pass;
               $data2['mauser'] = $mauser;
               $data2['gioitinh'] =  $request->gioitinh;
               $data2['auth'] = "2";
               DB::table('tbl_user')->insert($data2);
             
               $data = array();
               $data['name'] = $request->hovaten;
               $data['email'] = $request->email;
               $data['ngaysinh'] = $request->ngaysinh;
               $data['gioitinh'] = $request->gioitinh;
               $data['class'] = $request->lop;
               $data['cmnd'] = $request->cmnd;
               $data['masv'] = $request->masv;
               $data['khoahoc'] = $request->khoa;
               $data['quequan'] = $request->diachi;
               $data['phone'] = $request->phone;
               $data['nghenghiep'] = $request->nghenghiep;
               $data['truong'] = $request->truong;
               $data['chuyennganh'] = $request->chuyennganh;
               $data['mauser'] = $mauser;
       
               $data['image'] = $request->image;
               $get_image = $request->file('image');
             
               if($get_image){
                   $get_name_image = $get_image->getClientOriginalName();
                   $name_image = current(explode('.',$get_name_image));
                   $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                   $get_image->move('public/upload',$new_image);
                   $data['image'] = $new_image;
                   DB::table('tbl_student')->insert($data);
                   Session::put('message','Đăng ký thành công');
                   return Redirect::to('/LoginStudent');
               }
               $data['image'] = '';
               DB::table('tbl_student')->insert($data);  
               Session::put('message','Đăng ký thành công');
               return Redirect::to('/LoginStudent');
        }
    
        $data = $request->all();
        
        $mauser = substr(md5(microtime()),rand(0,26),5);

        $data2 = array();
        $data2['user_name'] = $request->email;
    	$data2['pass'] = $request->pass;
        $data2['mauser'] = $mauser;
        $data2['gioitinh'] =  $request->gioitinh;
        $data2['auth'] = "2";
    	DB::table('tbl_user')->insert($data2);
      
    	$data = array();
    	$data['name'] = $request->hovaten;
        $data['email'] = $request->email;
    	$data['ngaysinh'] = $request->ngaysinh;
        $data['gioitinh'] = $request->gioitinh;
        $data['class'] = $request->lop;
        $data['cmnd'] = $request->cmnd;
    	$data['masv'] = $request->masv;
        $data['khoahoc'] = $request->khoa;
        $data['quequan'] = $request->diachi;
        $data['phone'] = $request->phone;
    	$data['nghenghiep'] = $request->nghenghiep;
        $data['truong'] = $request->truong;
        $data['chuyennganh'] = $request->chuyennganh;
        $data['mauser'] = $mauser;

        $data['image'] = $request->image;
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $data['image'] = $new_image;
            DB::table('tbl_student')->insert($data);
            Session::put('message','Đăng ký thành công');
            return Redirect::to('/LoginStudent');
        }
        $data['image'] = '';
    	DB::table('tbl_student')->insert($data);  
    	Session::put('message','Đăng ký thành công');
    	return Redirect::to('/LoginStudent');
    }


 
}
