<?php

namespace App\Http\Controllers;
use App\LoginUser;
use Illuminate\Http\Request;
use Session;
use App\Login;
use DB;
use Carbon\Carbon;
use App\PhieuDangky;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class QuanLyCanBoConTroller extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('id_ql');
        if($admin_id){
            return Redirect::to('dashboard-CBQL');
        }else{
            return Redirect::to('LoginBanQly')->send();
        }
    }
    public function index($mauser){
        $this->AuthLogin();
        $details = DB::table('tbl_banquanly')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_banquanly.idkhu')
        ->where('macbo',$mauser)->get();
       //// loại 1,0,5 tb dang phong cho tất cả
       //// loai 2 tb admin danh cho tất cả
       //// loai 3 tb, qly khu tbao cho sinh vien
       //// loai 4 tb, Sv tbao cho qly khu

        $all_no = DB::table('tbl_notification')
        ->where('type',"1")
        ->orwhere('type',"2")
         ->orwhere('type',"0")
         ->orwhere('type',"5")
        ->orderBy('id_no', 'DESC')
        ->paginate(5);
        $idkhu = Session::get('idkhu');

        $all_n2 = DB::table('tbl_notification')
        ->where('type',"4")
        ->where('id_khu_TV',$idkhu)
        ->orderBy('id_no', 'DESC')
        ->paginate(3);

    	return view('BanQuanly.dashboard')
        ->with('all_no',$all_no)
        ->with('all_no2',$all_n2)
        ->with('details',$details);
    }
    public function qly_phong($idkhu){
        $this->AuthLogin();
        $all_phong = DB::table('tbl_phong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
        ->where('idkhu',$idkhu)->get();
        // $manager_product  = view('Student.DanhSachPhong')->with('allphong',$all_phong);
    	// return view('Student_layout')>with('Student.DanhSachPhong',$manager_product);
        return view('BanQuanly.QuanlyPhong')->with('allphong', $all_phong);
    }
    public function show_danhsachphong($idkhu){
        $this->AuthLogin();
        $all_phong = PhieuDangky::where('trangthai',"new")
         ->where('tbl_phieudangky.idkhu',$idkhu)
         ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
         ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
         ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
         ->paginate(10);
         

         $all_phong2 = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('trangthai',"loading")
        ->where('tbl_phieudangky.idkhu',$idkhu)->paginate(10);
        
        return view('BanQuanly.KiemDuyet')->with('allphong2', $all_phong2)->with('allphong', $all_phong);
    }

    public function Chi_Tiet_Qly_Phong($id){
        $this->AuthLogin();
        $all_phong2 = PhieuDangky::whereNotIn('trangthai',["da-tra-phong","new","loading"])
        ->where('tbl_phieudangky.idphong',$id)
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->get();

        $all_phong4 = PhieuDangky::where('trangthai',"da-tra-phong")
        ->where('tbl_phieudangky.idphong',$id)
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->get();

         return view('BanQuanly.chitiet_QlyPhong')
         ->with('allphong4', $all_phong4)
         ->with('allphong2', $all_phong2);
    }

    

    public function chitietphieudangky($id){
        $this->AuthLogin();
        $all_phong = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('id_phieu',$id)->get();
        return view('BanQuanly.chitiet_phieudangky')
        ->with('allphong', $all_phong);
    }


////////////////// gia han phong

    public function Danh_sach_HoSo_GiaHan($idkhu){
        $this->AuthLogin();
        $all_phong = PhieuDangky::where('trangthai',"new-giahan")
         ->where('tbl_phieudangky.idkhu',$idkhu)
         ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
         ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
         ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
         ->paginate(10);


         $all_phong2 = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('trangthai',"loading-giahan")
        ->where('tbl_phieudangky.idkhu',$idkhu)->paginate(10);
        
        return view('BanQuanly.kiemduyet_giahan')->with('allphong2', $all_phong2)->with('allphong', $all_phong);
    }
    public function chitiet_phieu_giahan($id){
        $this->AuthLogin();
        $all_phong = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('id_phieu',$id)->get();
        return view('BanQuanly.Chitiet_giahanPhong')
        ->with('allphong', $all_phong);
    }
    
    public function pheduyet_GiaHan_online(Request $request){
        $this->AuthLogin();

        $data = $request->all();
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "loading";
        $data['time_loading'] = $mytime;
    	DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->update($data);


        $idst = Session::get('idkhu');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = $request->idsv;
        $data2['id_khu_TV'] = "";
        $data2['title'] = "TB Xin Gia hạn hợp đồng";
        $data2['mota'] = "Đơn đăng ký gia hạn phòng của bạn đã được phê duyệt";
      	$data2['time'] = $mytime;
        $data2['type'] = "3";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);


        return Redirect::to('/DanhSanhPhong-sinhvien-Dangky/'.$request->idkhu);
    }

    public function pheduyet_offline_Giahan(Request $request){
        $this->AuthLogin();

        $data = $request->all();
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "successful";
        $data['time_loading'] = $mytime;
    	DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->update($data);


        return Redirect::to('/DanhSanhPhong-sinhvien-Dangky/'.$request->idkhu);
    }
    ////////////////// gia chuyen phong

    public function Danh_SV_ChuyenPhong($idkhu){
        $this->AuthLogin();
        $all_phong = PhieuDangky::where('trangthai',"loading-chuyenphong")
         ->where('tbl_phieudangky.idkhu',$idkhu)
         ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
         ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
         ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
         ->orderBy('id_phieu', 'DESC')
         ->paginate(10);

         $all_phong2 = DB::table('tbl_notification')
         ->join('tbl_phong','tbl_phong.id_phong','=','tbl_notification.idphong')
         ->join('tbl_student','tbl_student.id','=','tbl_notification.id_ngNhan')
         ->where('noptra',"tra")
         ->orwhere('noptra',"nop")
       
         ->paginate(10);
        
        return view('BanQuanly.Kiemduyet_chuyenphong')
         ->with('allphong2', $all_phong2)
        ->with('allphong', $all_phong);
    }


    public function chitiet_phieudangky_chuyenphong($idphieu){
        $this->AuthLogin();

        $all_phong = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('id_phieu',$idphieu)->get();

        foreach($all_phong as $key => $care){
            $idphog = $care->idchuyen_phong;
        }
        $all_phong2 = DB::table('tbl_phong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
        ->where('id_phong',$idphog)->get();
        


        return view('BanQuanly.Chitiet__chuyenPhong')
        ->with('allphong2', $all_phong2)
        ->with('allphong', $all_phong);
    }
    
    public function pheduyet_chuyenphong(Request $request){
        $this->AuthLogin();

        $data = $request->all();
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "successful";
        $data['idphong'] = $request->idphong_new;
    	DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->update($data);


        $data2 = $request->all();
        $data2 = array();
        $data2['svcur'] = $request->svcur_new + 1;
    	DB::table('tbl_phong')->where('id_phong', $request->idphong_new)->update($data2);


        $data3 = $request->all();
        $data3 = array();
        $data3['svcur'] = $request->svcur_old - 1;
    	DB::table('tbl_phong')->where('id_phong', $request->idphong_old)->update($data3);
        $idkhu = Session::get('idkhu');

      if($request->gia_old == $request->gia_new){
        $idst = Session::get('idkhu');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = $request->idsv;
        $data2['id_khu_TV'] = "";
        $data2['title'] = "TB Xin chuyển phòng";
        $data2['mota'] = "Yêu cầu chuyển phòng của bạn vừa được phê duyệt";
      	$data2['time'] = $mytime;
        $data2['price'] = "";
        $data2['type'] = "3";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);
      }else if($request->gia_old > $request->gia_new){
        $tooooo = $request->gia_old - $request->gia_new;
        $idst = Session::get('idkhu');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = $request->idsv;
        $data2['id_khu_TV'] = "";
        $data2['title'] = "TB Xin chuyển phòng";
        $data2['mota'] = "Yêu cầu chuyển phòng của bạn vừa được phê duyệt,
         Vui lòng xuống phòng quản lý nhận lại lệ phí là";
      	$data2['time'] = $mytime;
        $data2['price'] = $tooooo;
        $data2['noptra'] = "tra";
        $data2['type'] = "3";
        $data2['idphong'] = $request->idphong_new;
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);
      }
      else if($request->gia_old < $request->gia_new){
        $tooooo = $request->gia_new - $request->gia_old;
        $idst = Session::get('idkhu');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = $request->idsv;
        $data2['id_khu_TV'] = "";
        $data2['title'] = "TB Xin chuyển phòng";
        $data2['mota'] = "Yêu cầu chuyển phòng của bạn vừa được phê duyệt,
        Vui lòng xuống phòng quản lý nộp thêm lệ phí là";
      	$data2['time'] = $mytime;
        $data2['price'] = $tooooo;
        $data2['noptra'] = "nop";
        $data2['idphong'] = $request->idphong_new;
        $data2['type'] = "3";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);
      }

        

        return Redirect::to('/Danh-SV-ChuyenPhong/'.$idkhu);
    }

    
    public function xacnhan_oplephi_chuyenphong($idno){
        $this->AuthLogin();


    	$data = array();
        $data['noptra'] = "da-nop";
    	DB::table('tbl_notification')->where('id_no', $idno)->update($data);
        $idkhu = Session::get('idkhu');
        return Redirect::to('/Danh-SV-ChuyenPhong/'.$idkhu);
    }
    public function tuchoi_chuyenphong($idphieu){
        $this->AuthLogin();

        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "successful";
    	DB::table('tbl_phieudangky')->where('id_phieu', $idphieu)->update($data);

        $idkhu = Session::get('idkhu');
         $idphieu_dtaa = DB::table('tbl_phieudangky')->where('id_phieu', $idphieu)->get();

         foreach($idphieu_dtaa as $key => $care){
            $mastu = $care->idstudent;
        }
            $idstudentsss = DB::table('tbl_student')->where('mauser', $mastu)->get();
            foreach($idstudentsss as $key => $care){
                $mastu222 = $care->id;
            }
     
        $idst = Session::get('idkhu');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = $mastu222;
        $data2['id_khu_TV'] = "";
        $data2['title'] = "TB Xin chuyển phòng";
        $data2['mota'] = "Yêu cầu chuyển phòng của bạn đã bị từ chối";
        $data2['type'] = "3";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);

        return Redirect::to('/DanhSanhPhong-sinhvien-Dangky/'.$idkhu);
    }

    /////// trả phong
    
    public function Danh_SV_TraPhong($idkhu){
        $this->AuthLogin();
        $all_phong = PhieuDangky::where('trangthai',"loading-traphong")
         ->where('tbl_phieudangky.idkhu',$idkhu)
         ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
         ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
         ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
         ->orderBy('id_phieu', 'DESC')
         ->paginate(10);

         $all_phong2 = PhieuDangky::where('trangthai',"da-tra-phong")
         ->where('tbl_phieudangky.idkhu',$idkhu)
         ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
         ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
         ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
         ->orderBy('id_phieu', 'DESC')
         ->paginate(10);
        
        return view('BanQuanly.Kiemduyet_traphong')
        ->with('allphong2', $all_phong2)
        ->with('allphong', $all_phong);
    }
    public function xacnhan_phieudangky_traphong(Request $request){
        $this->AuthLogin();
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "da-tra-phong";

        PhieuDangky::where('id_phieu', $request->idphieu)->update($data);

        

        $data3 = $request->all();
        $data3 = array();
        $data3['svcur'] = $request->svcur - 1;
    	DB::table('tbl_phong')->where('id_phong', $request->idphong)->update($data3);
    

        $idkhu = Session::get('idkhu');
        return Redirect::to('/Danh-SV-TraPhong/'.$idkhu);
    }
  


///////////////////phe duyet online - offine
    public function pheduyet_online(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "loading";
        $data['time_loading'] = $mytime;
    	DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->update($data);

        $idst = Session::get('idkhu');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = $request->idsv;
        $data2['id_khu_TV'] = "";
        $data2['title'] = "TB hợp đồng đăng ký nội trú mới";
        $data2['mota'] = "Đơn đăng ký phòng của bạn đã được phê duyệt";
      	$data2['time'] = $mytime;
        $data2['type'] = "3";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);

        return Redirect::to('/DanhSanhPhong-sinhvien-Dangky/'.$request->idkhu);
    }
    public function Huy_Hoso(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    	DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->delete();


        return Redirect::to('/DanhSanhPhong-sinhvien-Dangky/'.$request->idkhu);
    }
    public function pheduyet_offline(Request $request){
        $this->AuthLogin();

        $data = $request->all();
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
    	$data = array();
        $data['trangthai'] = "successful";
        $data['time_loading'] = $mytime;
    	DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->update($data);
        $kaka = DB::table('tbl_phieudangky')->where('id_phieu', $request->idphieu)->get();
        foreach($kaka as $key => $care){
           
            $id_sv = $care->idstudent;
            $id_Gt = $care->idgioitinh;
            $iPhog   = $care->idphong;
            $iphieu = $care->id_phieu;
            $mytime = Carbon::now('Asia/Ho_Chi_Minh');

            $data2 = array();
            $data2['id_sv'] = $id_sv;
            $data2['gioitinh'] = $id_Gt;
            $data2['idphog'] =  $iPhog;
            $data2['idphiu'] =  $iphieu;
            $data2['time'] = $mytime->toDateString();
            DB::table('tbl_thongke')->insert($data2);
        
        }

        $data2 = $request->all();
        $data2 = array();
        $data2['svcur'] = $request->songhientai + 1;
    	DB::table('tbl_phong')->where('id_phong', $request->idphong)->update($data2);

        return Redirect::to('/DanhSanhPhong-sinhvien-Dangky/'.$request->idkhu);
    }


    public function inserTHongke($id_sv, $id_Gt, $iPhog, $iphieu){
        $this->AuthLogin();
        
      
      
       
    }
    

    ///////update profile
    public function update_profile_canbo($idcanbo){
        
        $all_phong2 = DB::table('tbl_banquanly')
        ->join('tbl_user','tbl_user.mauser','=','tbl_banquanly.macbo')
        ->where('tbl_banquanly.id', $idcanbo)->get();
        $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
       return view('BanQuanly.update_profile')
       ->with('allphong2', $all_phong2)
       ->with('all_khu', $all_khu);
      

   }
   
   public function save_update_canboktx(Request $request){
    $this->AuthLogin();
    $idql = Session::get('maql');

    $data2 = $request->all();
    $data2 = array();
    $data2['user_name'] = $request->email;
    $data2['pass'] = $request->pass;
    $data2['gioitinh'] =  $request->gioitinh;
    $data2['idkhu'] =  $request->khu;
    DB::table('tbl_user')->where('mauser',$idql)->update($data2);

    $data = $request->all();

    $data = array();
    $data['name'] = $request->ten;
    $data['email'] = $request->email;
    $data['phone'] = $request->phone;
    $data['gioitinh'] = $request->gioitinh;
    $data['quequan'] = $request->diachi;
    $data['ngaysinh'] = $request->ngaysinh;
    $data['idkhu'] = $request->khu;


     $data['image'] = $request->image;
    $get_image = $request->file('image');
  
    if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/upload',$new_image);
        $data['image'] = $new_image;
        $idql = Session::get('maql');
        DB::table('tbl_banquanly')->where('macbo',$idql)->update($data);
        Session::put('message','Thêm cán bộ thành công');
        return Redirect::to('/dashboard-CBQL/'.$idql);
        
    }else if($get_image == null){
     $data['image'] = $request->image2;
    DB::table('tbl_banquanly')->where('macbo',$idql)->update($data);  
    Session::put('message','Thêm cán bộ thành công');
    return Redirect::to('/dashboard-CBQL/'.$idql);
    }
   
}





    ///////Qly _ Sinh viên
    public function QLy_SV($idkhu){
        
        $all_phong2 = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('tbl_phieudangky.idkhu', $idkhu)
        ->whereNotIn('tbl_phieudangky.trangthai',["da-tra-phong","new","loading"])
        ->get();
       return view('BanQuanly.QuanLy_SV')
       ->with('allphong', $all_phong2);
      

   }
   
      public function chi_tiet_sinh_vien($id_phieu){
        $all_phong2 = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('tbl_phieudangky.id_phieu', $id_phieu)->get();
       return view('BanQuanly.chitietsinhvien')
       ->with('details', $all_phong2);
      
   }
   
   
    public function dashboard(Request $request){
        $data = $request->all();
       $admin_email = $data['name'];
       $admin_password = $data['pass'];
       $login = LoginUser::where('user_name',$admin_email)
       ->where('auth',"1")
       ->where('pass',$admin_password)->first();
       if($login){
           $login_count = $login->count();
           if($login_count>0){
               Session::put('name_ql',$login->user_name);
               Session::put('id_ql',$login->id);
               Session::put('gioitinh_ql',$login->gioitinh);
               Session::put('maql',$login->mauser);
               Session::put('idkhu',$login->idkhu);
               return Redirect::to('/dashboard-CBQL/'.$login->mauser);
           }
       }else{
               Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
               return Redirect::to('/LoginBanQly');
       }
      

   }
   public function logout(){
       $this->AuthLogin();
       Session::put('name_ql',null);
       Session::put('id_ql',null);
       Session::put('gioitinh_ql',null);
       Session::put('maql',null);
       Session::put('idkhu',null);
       return Redirect::to('/LoginBanQly');
   }





   public function inbaocao_sv_trongphong($idphong){
    $pdf = \App::make('dompdf.wrapper');
  
        $pdf->loadHTML($this->print_order_convert_tongsc($idphong));   
    return $pdf->stream();
   }
public function print_order_convert_tongsc($idphong){
   
    $all_fill2 = DB::table('tbl_phong')
    ->where('id_phong',$idphong)
    ->first();

  

    $output = '';

    $output.='				
    <style>
    body{
        font-family: DejaVu Sans;
    }
    table, th, td{
        border-top:1px solid #ccc;
        border-bottom:1px solid #ccc;
    }
    table{
        border-collapse:collapse;
        width:100%;
    }
    th, td{
        text-align:left;
        padding:10px;
    }
    </style>
    <h4>Danh sách tất cả sinh viên nội trong phòng '.$all_fill2->sophong.' </h4>

    <table class="table-styling">
    <thead>
    <tr>
    <th>Tên</th>
    <th>Số Phòng</th>
    <th>Số giường</th>
    <th>Mã Sinh viên</th>
    <th>Số điện thoai</th>
    <th>Giới tính</th>
    <th>Email</th>
    </tr>
    </thead>
    <tbody>';

    $all_fill = PhieuDangky::where('trangthai',"successful")
    ->orwhere('trangthai',"loading-chuyenphong")
    ->where('idphong',$idphong)
    ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
    ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
    ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
    ->get();
  
    foreach($all_fill as $key => $cate){		
        $name = $cate->gioitinh;
        if($name == "0"){
            $gt = "Nam";
            
        }else{
            $gt = "Nữ";
        }
        $output.='		
        <tr>
        <td>'.$cate->name.'</td>
        <td>'.$cate->sophong.'</td>
        <td>'.$cate->sogiuong.'</td>
        <td>'.$cate->masv.'</td>
        <td>'.$cate->phone.'</td>
        <td>'.$gt.'</td>
        <td>'.$cate->email.'</td>


        </tr>';
    }



    $output.='				
    </tbody>
    </table>';

    


    return $output;

}

}
