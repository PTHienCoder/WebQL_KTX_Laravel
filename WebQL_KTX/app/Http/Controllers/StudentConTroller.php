<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\LoginUser;
use App\PhieuDangky;
use App\sogiuong;
use App\HocKi;

use Illuminate\Support\Arr;
use DB;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class StudentConTroller extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id_user');
        if($admin_id){
            return Redirect::to('/DB-sinhvien');
        }else{
            return Redirect::to('/LoginStudent')->send();
        }
    }
    public function index($idusser){
        $this->AuthLogin();
        $details = DB::table('tbl_student')
        ->where('mauser',$idusser)->get();

       //// loại 1,0,5 tb dang phong cho tất cả
       //// loai 2 tb admin danh cho tất cả
       //// loai 3 tb, qly khu tbao cho sinh vien
       //// loai 4 tb, qly sv tbao cho qly khu
       
       foreach($details as $key => $care){                  
        $iduss = $care->id;
       }
        $all_no = DB::table('tbl_notification')
        ->where('type',"1")
        ->orwhere('type',"2")
        ->orwhere('type',"0")
         ->orwhere('type',"5")
        ->orderBy('id_no', 'DESC')
        ->paginate(5);

        $all_n2 = DB::table('tbl_notification')
        ->where('type',"3")
        ->where('id_ngNhan',$iduss)
        ->orderBy('id_no', 'DESC')
        ->paginate(3);


    	return view('Student.dashboard')
      ->with('all_no',$all_no)
      ->with('all_no2',$all_n2)
      ->with('details',$details);
    }
    ///////
    
    public function DanhSanh_Qly_KTX(){
        $this->AuthLogin();
        $details = DB::table('tbl_banquanly')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_banquanly.idkhu')->get();
    	return view('Student.DanhSachCBQL')->with('details',$details);
    }

    ///// phong ơ hien tai 
    public function phonghientai($idusser){
        $this->AuthLogin();
        $phonghtai = PhieuDangky::where('idstudent',$idusser)->whereNotIn('trangthai',["da-tra-phong"])->get();
        if($phonghtai){
            Session::put('message',null);
            Session::put('message2',null);

                $all_phong = PhieuDangky::where('trangthai',"new")
                ->where('tbl_phieudangky.idstudent',"0")
                ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
                ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
                ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
                ->get();
        
                $all_phong2 = PhieuDangky::where('trangthai',"new")
                ->where('tbl_phieudangky.idstudent',"0")
                ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
                ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
                ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
                ->get();
          

            $phong_count = $phonghtai->count();
            if($phong_count>0){
                foreach($phonghtai as $key => $care){                  
                   $trangthai = $care->trangthai;
                }
                    $all_phong = PhieuDangky::where('trangthai',"successful")
                    ->where('tbl_phieudangky.idstudent',$care->idstudent)
                    ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
                    ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
                    ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
                    ->get();

                    $all_phong2 = PhieuDangky::where('trangthai',"successful")
                    ->where('tbl_phieudangky.idphong',$care->idphong)
                    ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
                    ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
                    ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
                    ->get();

                  if($trangthai =="new"){
                    Session::put('message','Hồ sơ của bạn vẫn đang chờ quản lý phê duyệt');
                    return view('Student.PhongHienTai')  
                    ->with('allphong', $all_phong)
                    ->with('allphong2', $all_phong2);

                  }else if($trangthai =="loading"){
                    // $kkkk = $care->time_loading;
                    $dt2 = Carbon::create($care->time_loading);
                   
                    Session::put('message','Hồ sơ của bạn đang đợi bạn xác nhận trực tiếp tại phòng quản lý ');
                    Session::put('message2','Sau 3 ngày kể từ ngày '. $dt2->toDateString() .'.<br> mà bạn không xác nhận tại phòng quản lý hồ sơ của bạn sẽ bị hủy bỏ');
                    return view('Student.PhongHienTai')  
                  ->with('allphong', $all_phong)
                  ->with('allphong2', $all_phong2);
                   
                  }else if($trangthai =="new-giahan"){
            
                    Session::put('message','Hồ sơ của bạn vẫn đang chờ quản lý phê duyệt gia hạn');
                  return view('Student.PhongHienTai')  
                  ->with('allphong', $all_phong)
                  ->with('allphong2', $all_phong2);
                   
                  }
                  else if($trangthai =="loading-chuyenphong"){
            
                    $kkkk = $care->time_loading;
                    Session::put('message','Hồ sơ của bạn vẫn đang chờ quản lý xác nhận chuyển phòng');
                    Session::put('message2',null);
                  return view('Student.PhongHienTai')  
                  ->with('allphong', $all_phong)
                  ->with('allphong2', $all_phong2);
                   
                  }
                  
                  else if($trangthai=="loading-traphong"){
            
                    $kkkk = $care->time_loading;
                    Session::put('message','Bạn hãy xuống phòng quản lý để xác nhận trả phòng và nhận lại tiền thuế chấp tài sản');
                    Session::put('message2',null);
                  return view('Student.PhongHienTai')  
                  ->with('allphong', $all_phong)
                  ->with('allphong2', $all_phong2);
                  }
                  else if($trangthai=="da-tra-phong"){
            
                    $kkkk = $care->time_loading;
                    Session::put('message','Bạn đã trả phòng');
                    Session::put('message2',null);
                  return view('Student.PhongHienTai')  
                  ->with('allphong', $all_phong)
                  ->with('allphong2', $all_phong2);
                  }
                    else if($trangthai =="successful"){
                    Session::put('message',null);
                    Session::put('message2',null);
                 

                     return view('Student.PhongHienTai')
                     ->with('allphong', $all_phong)
                     ->with('allphong2', $all_phong2);
                   
                  }
                  else{
                    Session::put('message',"Lỗi trạng thái");
                    Session::put('message2',null);
                 

                     return view('Student.PhongHienTai')
                     ->with('allphong', $all_phong)
                     ->with('allphong2', $all_phong2);
                   
                  }

          } else{
            Session::put('message',"Bạn vẫn chưa đăng ký phòng ở.");
            Session::put('message2',null);
         

             return view('Student.PhongHienTai')
             ->with('allphong', $all_phong)
             ->with('allphong2', $all_phong2);
           
          }
        }else{
                Session::put('message','Bạn vẫn chưa đăng ký phòng ở');
                return view('Student.PhongHienTai')
                ->with('allphong', $all_phong)
                ->with('allphong2', $all_phong2);
        }
        
   
}
 

///// chuyen phong
    public function dky_chuyenphong(Request $request){
        $this->AuthLogin();
        $gt = Session::get('gioitinh_user');
        $all_phong = DB::table('tbl_phong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
         ->where('gioitinh',$request->magiotinh)
         ->whereNotIn('id_phong',[$request->idphong])
         ->get();
   
         return view('Student.DanhSach_PhongChuyen')
         ->with('id_phieu', $request->idphieu)
         ->with('gioitinh', $request->magiotinh)
         ->with('allphong', $all_phong);
    }

    public function chitiet_chuyenphong_sv(Request $request){
        $this->AuthLogin();

        $all_phong = DB::table('tbl_phieudangky')
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->where('id_phieu', $request->idphieu)->get();

     
        $all_phong2 = DB::table('tbl_phong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
        ->where('id_phong',$request->idphong)->get();

        return view('Student.Chitietchuyenphong')
        ->with('id_phieu', $request->idphieu)
        ->with('allphong2', $all_phong2)
        ->with('allphong', $all_phong);

    }

    public function gui_dky_chuyenphong(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['idchuyen_phong'] = $request->idphong_new;
    	  $data['Lydo'] = $request->lydo;
        
        $data['trangthai'] = "loading-chuyenphong";
      	PhieuDangky::where('id_phieu',$request->idphieu)->update($data);

        $idstudent = Session::get('mauser');


     
        $idst = Session::get('id_user');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = "";
        $data2['id_khu_TV'] = $request->idkhu;
        $data2['title'] = "TB Xin chuyển phòng";
        $data2['mota'] = "khu của bạn vừa có 1 yêu cầu chuyển phòng mới";
      	$data2['time'] = $mytime;
        $data2['type'] = "4";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);


    	return Redirect::to('/phonghientai/'.$idstudent);
    }

    ////// tra phong

    public function Dky_traphong(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['trangthai'] = "loading-traphong";
      	PhieuDangky::where('id_phieu',$request->idphieu)->update($data);

        $idstudent = Session::get('mauser');


        $idst = Session::get('id_user');
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data2 = array();
      	$data2['id_ngTB'] = $idst;
        $data2['id_ngNhan'] = "";
        $data2['id_khu_TV'] = $request->idkhu;
        $data2['title'] = "TB trả phòng";
        $data2['mota'] = "khu của bạn vừa có 1 yêu cầu trả phòng ";
      	$data2['time'] = $mytime;
        $data2['type'] = "4";
        $data2['trangthai'] = "new";
        DB::table('tbl_notification')->insert($data2);
        
    	return Redirect::to('/phonghientai/'.$idstudent);
    }

   //// gia han phong

    public function Gia_Han_HD_SV($id_phieu){
        $this->AuthLogin();
        $phonghtai = HocKi::where('trangthai',"new")->get();
        $phong_count = $phonghtai->count();
          if($phonghtai){
                 if($phong_count>0){
                  Session::put('hockimoi',null);

                  $hocki = HocKi::where('trangthai',"new")->get();
                  $all_phong = PhieuDangky::where('id_phieu',$id_phieu)->get();

               
                  return view('Student.Giahan_Phong')
                   ->with('hocki', $hocki)
                   ->with('allphong', $all_phong); 



                 }
                 Session::put('hockimoi',"Chưa có lịch đăng ký cho năm học mới");  
                 return view('Student.Giahan_Phong');

          }

          Session::put('hockimoi',"Chưa có lịch đăng ký cho năm học mới");  
          return view('Student.Giahan_Phong');
    
    }
    public function Save_GiaHan_HD(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    
    	$data = array();

 
       $data['ngaydky'] = $request->ngaydky;
    	$data['ngayketthuc'] = $request->ngayketthuc;
      $data['idnamhoc'] = $request->idnamhc;
        $data['trangthai'] = "new-giahan";
    	PhieuDangky::where('id_phieu',$request->idhopdong)->update($data);


      $idst = Session::get('id_user');
      $mytime = Carbon::now('Asia/Ho_Chi_Minh');
      $data2 = array();
      $data2['id_ngTB'] = $idst;
      $data2['id_ngNhan'] = "";
      $data2['id_khu_TV'] = $request->idkhu;
      $data2['title'] = "TB gia hạn phòng";
      $data2['mota'] = "Khu của bạn vừa có 1 yêu cầu gia hạn mới";
      $data2['time'] = $mytime;
      $data2['type'] = "4";
      $data2['trangthai'] = "new";
      DB::table('tbl_notification')->insert($data2);
        
    	return Redirect::to('/phonghientai/'.$request->mauser);
    }
  
       ///////// dangky phong ơ

    public function show_danhsachphong($gt){
        $this->AuthLogin();
    
        $avtive = DB::table('tb_active_admin')->where('avtive',"DKY_PHONG")->get();
        foreach($avtive as $key => $care){
            $active_ad = $care->trangthai;
        }
           if($active_ad == "true"){
            $idusser = Session::get('mauser');
            $phonghtai = PhieuDangky::where('idstudent',$idusser)->whereNotIn('trangthai',["da-tra-phong"])->get();
            $phong_count = $phonghtai->count();
              if($phonghtai){
                     if($phong_count>0){
                     
                         Session::put('message_dky','Bạn Đã đăng ký phòng rồi');
                          return view('Student.DanhSachPhong');

                        }else{

                        Session::put('message_dky',null);
                        $all_phong = DB::table('tbl_phong')
                        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                         ->where('gioitinh',$gt)->get();
                         $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                         return view('Student.DanhSachPhong')
                         ->with('all_khu', $all_khu)
                         ->with('gioitinh', $gt)
                         ->with('allphong', $all_phong);
                    }
                }else{

                    Session::put('message_dky',null);
                    $all_phong = DB::table('tbl_phong')
                    ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                     ->where('gioitinh',$gt)->get();
                     $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                     return view('Student.DanhSachPhong')
                     ->with('all_khu', $all_khu)
                     ->with('gioitinh', $gt)
                     ->with('allphong', $all_phong);
                }
         
           }else if($active_ad == "false"){
             
            Session::put('message_dky','Rất tiếc, Thời hạn đăng ký nội trú đã kết thúc. Vui lòng đợi lịch đăng ký của học kì mới');
            return view('Student.DanhSachPhong');

           }
    }    




       ///////update profile
       public function update_profile_student($student){
        
        $all_phong2 = DB::table('tbl_student')
        ->join('tbl_user','tbl_user.mauser','=','tbl_student.mauser')
        ->where('tbl_student.id', $student)->get();

        return view('Student.update_profile')
        ->with('allphong2', $all_phong2);
      

      }
   
   public function save_update_student(Request $request){
    $this->AuthLogin();
    $idql = Session::get('mauser');

    $data2 = $request->all();
    $data2 = array();
    $data2['user_name'] = $request->email;
    $data2['pass'] = $request->pass;
    $data2['gioitinh'] = $request->gioitinh;


    DB::table('tbl_user')->where('mauser',$idql)->update($data2);

    $data = $request->all();

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



     $data['image'] = $request->image;
    $get_image = $request->file('image');
  
    if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/upload',$new_image);
        $data['image'] = $new_image;
        $idql = Session::get('mauser');
        DB::table('tbl_student')->where('mauser',$idql)->update($data);
        Session::put('message','Thêm cán bộ thành công');
        return Redirect::to('/DB-sinhvien/'.$idql);
        
    }else if($get_image == null){
     $data['image'] = $request->image2;
    DB::table('tbl_student')->where('mauser',$idql)->update($data);  
    Session::put('message','Thêm cán bộ thành công');
    return Redirect::to('/DB-sinhvien/'.$idql);
    }
   
}

 
    public function dky_phong_chitiet($idphong){
        $this->AuthLogin();
        $phonghtai = HocKi::where('trangthai',"new")->get();
        $phong_count = $phonghtai->count();
          if($phonghtai){
                 if($phong_count>0){
                  Session::put('hockimoi',null);

                  $hocki = HocKi::where('trangthai',"new")->get();
                  $all_phong = DB::table('tbl_phong')
                  ->where('id_phong',$idphong)->get();
                  $phonghtai = PhieuDangky::where('idphong',$idphong)->whereNotIn('trangthai',["da-tra-phong"])->get();
         
        
                  $sogiuonggg = sogiuong::whereNotIn('sogiuong', PhieuDangky::select('sogiuong')
                  ->where('idphong',$idphong)->whereNotIn('trangthai',["da-tra-phong"])
                  ->get()->toArray())->get();
                    return view('Student.dagkyPhongChitiet')
                   ->with('hocki', $hocki)
                   ->with('allphong2', $sogiuonggg)
                   ->with('allphong', $all_phong); 



                 }
                 Session::put('hockimoi',"Chưa có lịch đăng ký cho năm học mới");  
                 return view('Student.dagkyPhongChitiet');

          }

          Session::put('hockimoi',"Chưa có lịch đăng ký cho năm học mới");  
           return view('Student.dagkyPhongChitiet');
     
    }
    public function dangky_phong(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    
    	$data = array();
     	$data['idphong'] = $request->idphong;
        $data['idkhu'] = $request->idkhu;
     	$data['idstudent'] = $request->iduser;

        $data['sogiuong'] = $request->sogiong;
        $data['ngaydky'] = $request->ngaydky;
    	$data['ngayketthuc'] = $request->ngayketthuc;
      $data['idnamhoc'] = $request->idnamhc;
      $idGT = Session::get('gioitinh_user');
      $data['idgioitinh'] =  $idGT;
      $data['ngaydky'] = $request->ngaydky; $data['trangthai'] = "new";
    	DB::table('tbl_phieudangky')->insert($data);
      

      $idst = Session::get('id_user');
      $mytime = Carbon::now('Asia/Ho_Chi_Minh');
      $data2 = array();
      $data2['id_ngTB'] = $idst;
      $data2['id_ngNhan'] = "";
      $data2['id_khu_TV'] = $request->idkhu;
      $data2['title'] = "TB đăng ký";
      $data2['mota'] = "khu của bạn vừa có 1 yêu cầu đăng ký phòng mới";
      $data2['time'] = $mytime;
      $data2['type'] = "4";
      $data2['trangthai'] = "new";
      DB::table('tbl_notification')->insert($data2);
    	// Session::put('message','Thêm phòng thành công');
    	return Redirect::to('/DanhSanhPhong-sinhvien/'.$request->magiotinh);
    }
  
    public function dashboard(Request $request){
         $data = $request->all();
        $admin_email = $data['name'];
        $admin_password = $data['pass'];
        $login = LoginUser::where('user_name',$admin_email)
        ->where('auth',"2")
        ->where('pass',$admin_password)->first();

             
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('user_name',$login->user_name);
                Session::put('id_user',$login->id);
                Session::put('gioitinh_user',$login->gioitinh);
                Session::put('mauser',$login->mauser);

                // $magt= LoginUser::select('gioitinh')->where('id',$login->id)->get();
                return Redirect::to('/DB-sinhvien/'.$login->mauser);
            }
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect::to('/LoginStudent');
        }
       

    }
    public function logout(){
        $this->AuthLogin();
        Session::put('user_name',null);
        Session::put('id_user',null);
        Session::put('gioitinh_user',null);
        Session::put('mauser',null);
        return Redirect::to('/LoginStudent');
    }
 
   ///////update profile
   public function loc_danh_sach_phong(Request $request){     
    $khu = $request->khu; 
    $tang = $request->tang;
    $loai = $request->loai;
                    Session::put('message_dky',null);
                    $gt = Session::get('gioitinh_user');
                  
                    if($khu == "all" && $loai != "all" && $tang != "all"){
                      $gt = Session::get('gioitinh_user');
                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('loaiphong',$request->loai)
                      ->where('tang',$request->tang)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);
                    }else if($tang == "all" && $khu != "all" && $loai != "all"){
                      $gt = Session::get('gioitinh_user');
                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('idkhu',$request->khu)
                      ->where('loaiphong',$request->loai)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);
                    }else if($loai == "all" && $tang != "all" && $khu != "all"){
                      $gt = Session::get('gioitinh_user');
                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('idkhu',$request->khu)
                      ->where('tang',$request->tang)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);
                    }else if($khu == "all" && $tang == "all" && $loai != "all"){
                      $gt = Session::get('gioitinh_user');
                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('loaiphong',$request->loai)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);

                    }else if($khu== "all" && $loai == "all" && $tang != "all"){
                      $gt = Session::get('gioitinh_user');
                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('tang',$request->tang)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);

                    }else if($loai == "all" && $tang == "all" && $khu != "all"){
                      $gt = Session::get('gioitinh_user');

                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('idkhu',$request->khu)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);

                    } else if($loai != "all" && $tang != "all" && $khu != "all"){
                      $gt = Session::get('gioitinh_user');

                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)
                      ->where('loaiphong',$request->loai)
                      ->where('tang',$request->tang)
                      ->where('idkhu',$request->khu)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);

                    }else if($loai == "all" && $tang == "all" && $khu == "all"){
                     
                      $gt = Session::get('gioitinh_user');
                      $all_phong = DB::table('tbl_phong')
                      ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phong.idkhu')
                      ->where('gioitinh',$gt)->get();
                      $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
                      return view('Student.DanhSachPhong')
                      ->with('all_khu', $all_khu)
                      ->with('gioitinh', $gt)
                      ->with('allphong', $all_phong);
                    }
          

         


}

 
}
