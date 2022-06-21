<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Login;
use Carbon\Carbon;
use App\Thongke;
use DB;
use PDF;
use App\HocKi;
use App\PhieuDangky;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Admincontroller extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
    	return view('admin_login');
    }

    public function print_fill(Request $request){
    	$pdf = \App::make('dompdf.wrapper');
        if($request->date_1_in == "1nam"){
            $pdf->loadHTML($this->print_order_convert_1nam());
        }else{
            $pdf->loadHTML($this->print_order_convert($request->date_1_in, $request->date_2_in));
        }
        
		return $pdf->stream();
    }
    public function print_order_convert_1nam(){

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
        <h4>Danh sách sinh viên đăng ký từ ngày trong 1 năm qua</h4>

		<table class="table-styling">
		<thead>
		<tr>
		<th>Tên SV</th>
		<th>Mã SV</th>
		<th>Phòng</th>
		<th>Tầng</th>
		<th>Loại Phòng</th>
		<th>Lệ Phí</th>
		</tr>
		</thead>
		<tbody>';
        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $all_fill = Thongke::whereBetween('time',[$oneyears,$now])
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_thongke.idphog')
        ->join('tbl_phieudangky','tbl_phieudangky.id_phieu','=','tbl_thongke.idphiu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_thongke.id_sv')
        ->get();
		foreach($all_fill as $key => $cate){		
            if($cate->loaiphong == "0"){
                $gt = "Thường"; 
            }else{
                $gt = "VIP";
            }
			$output.='		
			<tr>
			<td>'.$cate->name.'</td>
			<td>'.$cate->masv.'</td>
			<td>'.$cate->sophong.'</td>
			<td>'.$cate->tang.'</td>
             <td>'.$gt.'</td>
			<td>'.$cate->giaphong.'</td>

			</tr>';
		}



		$output.='				
		</tbody>
		</table>';

		


		return $output;

	}
 
    public function print_order_convert($date_1_in,$date_2_in){

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
        <h4>Danh sách sinh viên đăng ký từ ngày '.$date_1_in.' đến ngày '.$date_2_in.' </h4>

		<table class="table-styling">
		<thead>
		<tr>
		<th>Tên SV</th>
		<th>Mã SV</th>
		<th>Phòng</th>
		<th>Tầng</th>
		<th>Loại Phòng</th>
		<th>Lệ Phí</th>
		</tr>
		</thead>
		<tbody>';
      
        $all_fill = Thongke::whereBetween('time',[$date_1_in,$date_2_in])
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_thongke.idphog')
        ->join('tbl_phieudangky','tbl_phieudangky.id_phieu','=','tbl_thongke.idphiu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_thongke.id_sv')
        ->get();
		foreach($all_fill as $key => $cate){		
            if($cate->loaiphong == "0"){
                $gt = "Thường"; 
            }else{
                $gt = "VIP";
            }
			$output.='		
			<tr>
			<td>'.$cate->name.'</td>
			<td>'.$cate->masv.'</td>
			<td>'.$cate->sophong.'</td>
			<td>'.$cate->tang.'</td>
             <td>'.$gt.'</td>
			<td>'.$cate->giaphong.'</td>

			</tr>';
		}



		$output.='				
		</tbody>
		</table>';

		


		return $output;

	}
 
    public function loc_fill_date(Request $request){
        $idql = Session::get('admin_id');
        $avtive = DB::table('tb_active_admin')->select('trangthai')->where('avtive',"DKY_PHONG")->get();
        $phonghtai = DB::table('tbl_notification')
        ->where('id_ngTB',$idql)
        ->where('type',"1")
        ->where('trangthai',"new")->get();
        $phong_count = $phonghtai->count();
        if($phonghtai){
               if($phong_count>0){
                Session::put('messagetb',null);
                Session::put('lochocki',"true");
                        $avtive = DB::table('tb_active_admin')->select('trangthai')->where('avtive',"DKY_PHONG")->get();
                      
                        $dill_hocs = HocKi::where('id_hocki',$request->namhoc)->get();

                        $all_hcki = HocKi::get();
                        $all_fill = Thongke::whereBetween('time',[$request->date1,$request->date2])->get();
                        $all_fill_nam =Thongke::whereBetween('time',[$request->date1,$request->date2])->where('gioitinh',"0")->get();
                        $all_fill_nu = Thongke::whereBetween('time',[$request->date1,$request->date2])->where('gioitinh',"1")->get();

                        $all_fill_tphong = DB::table('tbl_phong')->get();
                        $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();
                      //  ->where('tbl_phieudangky.idkhu',$idkhu)
                      

                      

                          
                            return view('Admin.dashboard')
                            ->with('all_hcki', $all_hcki)
                            ->with('dill_hocs', $dill_hocs)
                            ->with('all_fill_tphong', $all_fill_tphong)
                            ->with('all_fill_ptrong', $all_fill_ptrong)
                            ->with('all_fill', $all_fill)
                            ->with('all_fill_nam', $all_fill_nam)
                            ->with('all_fill_nu', $all_fill_nu)
                            ->with('avtive', $avtive)
                            ->with('thongtintb', $phonghtai);
               

               }else{
                Session::put('lochocki',"true");
                Session::put('messagetb','Hệ thống đăng ký phòng ở nội trú đã kết thúc');

                $dill_hocs = HocKi::where('id_hocki',$request->namhoc)->get();
                foreach($dill_hocs as $key => $care){                  
                    $datstar = $care->date_start;
                     $datend = $care->date_end;
                   }
                $all_hcki = HocKi::get();
                $all_fill = Thongke::whereBetween('time',[$request->date1,$request->date2])->get();
                $all_fill_nam =Thongke::whereBetween('time',[$request->date1,$request->date2])->where('gioitinh',"0")->get();
                $all_fill_nu = Thongke::whereBetween('time',[$request->date1,$request->date2])->where('gioitinh',"1")->get();


                $all_fill_tphong = DB::table('tbl_phong')->get();
                $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();
              //  ->where('tbl_phieudangky.idkhu',$idkhu)          
                    return view('Admin.dashboard')
                    ->with('all_hcki', $all_hcki)
                    ->with('dill_hocs', $dill_hocs)
                    ->with('all_fill_tphong', $all_fill_tphong)
                    ->with('all_fill_ptrong', $all_fill_ptrong)
                    ->with('all_fill', $all_fill)
                    ->with('all_fill_nam', $all_fill_nam)
                    ->with('all_fill_nu', $all_fill_nu);
               }
        }
        Session::put('lochocki',"true");
        Session::put('messagetb','Hệ thống đăng ký phòng ở nội trú đã kết thúc');   

        $dill_hocs = HocKi::where('id_hocki',$request->namhoc)->get();   
        foreach($dill_hocs as $key => $care){                  
            $datstar = $care->date_start;
             $datend = $care->date_end;
           }
        $all_hcki = HocKi::get();
        $all_fill = Thongke::whereBetween('time',[$request->date1,$request->date2])->get();
        $all_fill_nam =Thongke::whereBetween('time',[$request->date1,$request->date2])->where('gioitinh',"0")->get();
        $all_fill_nu = Thongke::whereBetween('time',[$request->date1,$request->date2])->where('gioitinh',"1")->get();


        $all_fill_tphong = DB::table('tbl_phong')->get();
        $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();    
            return view('Admin.dashboard')
            ->with('all_hcki', $all_hcki)
            ->with('dill_hocs', $dill_hocs)
            ->with('all_fill_tphong', $all_fill_tphong)
            ->with('all_fill_ptrong', $all_fill_ptrong)
            ->with('all_fill', $all_fill)
            ->with('all_fill_nam', $all_fill_nam)
            ->with('all_fill_nu', $all_fill_nu);




    }
    public function loc_fill_namhoc(Request $request){

        
        $idql = Session::get('admin_id');
        $avtive = DB::table('tb_active_admin')->select('trangthai')->where('avtive',"DKY_PHONG")->get();
        $phonghtai = DB::table('tbl_notification')
        ->where('id_ngTB',$idql)
        ->where('type',"1")
        ->where('trangthai',"new")->get();
        $phong_count = $phonghtai->count();
        if($phonghtai){
               if($phong_count>0){
                Session::put('messagetb',null);
                Session::put('lochocki',"true");
                        $avtive = DB::table('tb_active_admin')->select('trangthai')->where('avtive',"DKY_PHONG")->get();
                      
                        $dill_hocs = HocKi::where('id_hocki',$request->namhoc)->get();
                        foreach($dill_hocs as $key => $care){                  
                            $datstar = $care->date_start;
                             $datend = $care->date_end;
                           }
                        $all_hcki = HocKi::get();
                        $all_fill = Thongke::whereBetween('time',[$datstar,$datend])->get();
                        $all_fill_nam =Thongke::whereBetween('time',[$datstar,$datend])->where('gioitinh',"0")->get();
                        $all_fill_nu = Thongke::whereBetween('time',[$datstar,$datend])->where('gioitinh',"1")->get();

                        $all_fill_tphong = DB::table('tbl_phong')->get();
                        $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();
                      //  ->where('tbl_phieudangky.idkhu',$idkhu)
                      

                      

                          
                            return view('Admin.dashboard')
                            ->with('all_hcki', $all_hcki)
                            ->with('dill_hocs', $dill_hocs)
                            ->with('all_fill_tphong', $all_fill_tphong)
                            ->with('all_fill_ptrong', $all_fill_ptrong)
                            ->with('all_fill', $all_fill)
                            ->with('all_fill_nam', $all_fill_nam)
                            ->with('all_fill_nu', $all_fill_nu)
                            ->with('avtive', $avtive)
                            ->with('thongtintb', $phonghtai);
               

               }else{
                Session::put('lochocki',"true");
                Session::put('messagetb','Hệ thống đăng ký phòng ở nội trú đã kết thúc');

                $dill_hocs = HocKi::where('id_hocki',$request->namhoc)->get();
                foreach($dill_hocs as $key => $care){                  
                    $datstar = $care->date_start;
                     $datend = $care->date_end;
                   }
                $all_hcki = HocKi::get();
                $all_fill = Thongke::whereBetween('time',[$datstar,$datend])->get();
                $all_fill_nam =Thongke::whereBetween('time',[$datstar,$datend])->where('gioitinh',"0")->get();
                $all_fill_nu = Thongke::whereBetween('time',[$datstar,$datend])->where('gioitinh',"1")->get();


                $all_fill_tphong = DB::table('tbl_phong')->get();
                $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();
              //  ->where('tbl_phieudangky.idkhu',$idkhu)          
                    return view('Admin.dashboard')
                    ->with('all_hcki', $all_hcki)
                    ->with('dill_hocs', $dill_hocs)
                    ->with('all_fill_tphong', $all_fill_tphong)
                    ->with('all_fill_ptrong', $all_fill_ptrong)
                    ->with('all_fill', $all_fill)
                    ->with('all_fill_nam', $all_fill_nam)
                    ->with('all_fill_nu', $all_fill_nu);
               }
        }
        Session::put('lochocki',"true");
        Session::put('messagetb','Hệ thống đăng ký phòng ở nội trú đã kết thúc');   

        $dill_hocs = HocKi::where('id_hocki',$request->namhoc)->get();   
        foreach($dill_hocs as $key => $care){                  
            $datstar = $care->date_start;
             $datend = $care->date_end;
           }
        $all_hcki = HocKi::get();
        $all_fill = Thongke::whereBetween('time',[$datstar,$datend])->get();
        $all_fill_nam =Thongke::whereBetween('time',[$datstar,$datend])->where('gioitinh',"0")->get();
        $all_fill_nu = Thongke::whereBetween('time',[$datstar,$datend])->where('gioitinh',"1")->get();


        $all_fill_tphong = DB::table('tbl_phong')->get();
        $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();    
            return view('Admin.dashboard')
            ->with('all_hcki', $all_hcki)
            ->with('dill_hocs', $dill_hocs)
            ->with('all_fill_tphong', $all_fill_tphong)
            ->with('all_fill_ptrong', $all_fill_ptrong)
            ->with('all_fill', $all_fill)
            ->with('all_fill_nam', $all_fill_nam)
            ->with('all_fill_nu', $all_fill_nu);




    }
    public function show_dashboard(){
        $this->AuthLogin();
        $idql = Session::get('admin_id');
        $avtive = DB::table('tb_active_admin')->select('trangthai')->where('avtive',"DKY_PHONG")->get();
        $phonghtai = DB::table('tbl_notification')
        ->where('id_ngTB',$idql)
        ->where('type',"1")
        ->where('trangthai',"new")->get();
        $phong_count = $phonghtai->count();
        if($phonghtai){
               if($phong_count>0){
                Session::put('messagetb',null);
                Session::put('lochocki',"locnawm");
                        $avtive = DB::table('tb_active_admin')->select('trangthai')->where('avtive',"DKY_PHONG")->get();
                      
                        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
                        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                    
                        $all_hcki = HocKi::get();
                        $all_fill = Thongke::whereBetween('time',[$oneyears,$now])->get();
                        $all_fill_nam =Thongke::whereBetween('time',[$oneyears,$now])->where('gioitinh',"0")->get();
                        $all_fill_nu = Thongke::whereBetween('time',[$oneyears,$now])->where('gioitinh',"1")->get();

                        $all_fill_tphong = DB::table('tbl_phong')->get();
                        $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();
                      //  ->where('tbl_phieudangky.idkhu',$idkhu)
                      

                      

                          
                            return view('Admin.dashboard')
                            ->with('all_hcki', $all_hcki)
                            ->with('all_fill_tphong', $all_fill_tphong)
                            ->with('all_fill_ptrong', $all_fill_ptrong)
                            ->with('all_fill', $all_fill)
                            ->with('all_fill_nam', $all_fill_nam)
                            ->with('all_fill_nu', $all_fill_nu)
                            ->with('avtive', $avtive)
                            ->with('thongtintb', $phonghtai);
               

               }else{
                Session::put('lochocki',"locnawm");
                Session::put('messagetb','Hệ thống đăng ký phòng ở nội trú đã kết thúc');
                $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            
                $all_hcki = HocKi::get();
                $all_fill = Thongke::whereBetween('time',[$oneyears,$now])->get();
                $all_fill_nam =Thongke::whereBetween('time',[$oneyears,$now])->where('gioitinh',"0")->get();
                $all_fill_nu = Thongke::whereBetween('time',[$oneyears,$now])->where('gioitinh',"1")->get();

                $all_fill_tphong = DB::table('tbl_phong')->get();
                $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();
              //  ->where('tbl_phieudangky.idkhu',$idkhu)          
                    return view('Admin.dashboard')
                    ->with('all_hcki', $all_hcki)
                    ->with('all_fill_tphong', $all_fill_tphong)
                    ->with('all_fill_ptrong', $all_fill_ptrong)
                    ->with('all_fill', $all_fill)
                    ->with('all_fill_nam', $all_fill_nam)
                    ->with('all_fill_nu', $all_fill_nu);
               }
        }
        Session::put('lochocki',"locnawm");
        Session::put('messagetb','Hệ thống đăng ký phòng ở nội trú đã kết thúc');      
                $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            
                $all_hcki = HocKi::get();
                $all_fill = Thongke::whereBetween('time',[$oneyears,$now])->get();
                $all_fill_nam =Thongke::whereBetween('time',[$oneyears,$now])->where('gioitinh',"0")->get();
                $all_fill_nu = Thongke::whereBetween('time',[$oneyears,$now])->where('gioitinh',"1")->get();

        $all_fill_tphong = DB::table('tbl_phong')->get();
        $all_fill_ptrong= DB::table('tbl_phong',"0")->where('svcur',"0")->get();    
            return view('Admin.dashboard')
            ->with('all_fill_tphong', $all_fill_tphong)
            ->with('all_fill_ptrong', $all_fill_ptrong)
            ->with('all_fill', $all_fill)
            ->with('all_fill_nam', $all_fill_nam)
            ->with('all_fill_nu', $all_fill_nu);

    	
    }


    public function ket_thuc_dky($idno){
        $this->AuthLogin();
    	$data = array();
    	$data['trangthai'] = "false";
    	DB::table('tb_active_admin')->where('avtive',"DKY_PHONG")->update($data);

        $data1['trangthai'] = "old";
    	DB::table('tbl_notification')->where('id_no', $idno)->update($data1);

        $data2['trangthai'] = "old";
    	DB::table('tbl_hocki')->where('trangthai', "new")->update($data2);
    	return Redirect::to('/dashboard');
    }
    public function bat_dau_dky(){
        $this->AuthLogin();

    	$data = array();
    	$data['trangthai'] = "true";
        DB::table('tb_active_admin')->where('avtive',"DKY_PHONG")->update($data);
        
    	return Redirect::to('/dashboard');
    }

/////  login admin
    public function dashboard(Request $request){
         $data = $request->all();
    
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
            }
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect::to('/admin');
        }
       

    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
     }

     /////////////////qly sinh vien
     public function qly_sinhvien_admin(){
        $this->AuthLogin();
        $all_phong = PhieuDangky::where('trangthai',"successful")
        ->orwhere('trangthai',"loading-chuyenphong")
        ->join('tbl_phong','tbl_phong.id_phong','=','tbl_phieudangky.idphong')
        ->join('tbl_khuktx','tbl_khuktx.id_khu','=','tbl_phieudangky.idkhu')
        ->join('tbl_student','tbl_student.mauser','=','tbl_phieudangky.idstudent')
        ->paginate(10);

        return view('Admin.QLy_SV_KTX')
        ->with('all_phong', $all_phong);

   }

     

     //////them hoc ki mơi
     public function add_hockimoi(){
        $this->AuthLogin();

        return view('Admin.Add_NewHocKi');

   }
   
   public function save_hockimoi(Request $request){
    $this->AuthLogin();
    $macnbo = substr(md5(microtime()),rand(0,26),5);
  
    $mytime = Carbon::now('Asia/Ho_Chi_Minh');

    $data2 = $request->all();
    $data2 = array();
    $data2['yeard'] =$request->namhoc;
    $data2['hocki'] = $request->hocki;
    $data2['date_start'] = $request->date1;
    $data2['date_end'] = $request->date2;
    $data2['trangthai'] = "new";
    DB::table('tbl_hocki')->insert($data2);  

    $data = $request->all();
    $idql = Session::get('admin_id');
    $data = array();
    $data['id_ngTB'] = $idql;
    $data['id_ngNhan'] = "";
    $data['id_khu_TV'] = " ";
    $data['title'] = "Thông báo về lịch đăng ký nội trú KTX";
    $data['mota'] = "Hệ thống đăng ký phòng sẽ bắt đầu vào ngày ".$request->date3." và kết thúc vào ngày ".$request->date4;
    $data['time'] = $mytime;
    $data['type'] = "1";
    $data['dateStart'] = $request->date3;
    $data['dateEnd'] = $request->date4;
    $data['trangthai'] = "new";
    $data['image'] = "";

    DB::table('tbl_notification')->insert($data);  
    Session::put('message','Thêm học kì mới thành công');
    return Redirect::to('/add-hocki-moi');
}

   


/////////////////// them cán bộ khu phong
    public function add_canboktx(){
        $this->AuthLogin();

        $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
    
        return view('Admin.add_canbo')->with('all_khu', $all_khu);

   }

   public function add_khuktx(){
    $this->AuthLogin();
    return view('Admin.add_khuKTX');

}
    public function add_phongktx(){
        $this->AuthLogin();
        $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
    
        return view('Admin.add_PhongKTX')->with('all_khu', $all_khu);
    }


    public function edit_phong($id_phong){
        $this->AuthLogin();
        $all_phong = DB::table('tbl_phong')->where('id_phong', $id_phong)->get();
        $all_khu = DB::table('tbl_khuktx')->get();
        return view('Admin.edit_phong')
        ->with('all_khu', $all_khu)
        ->with('all_phong', $all_phong);
    }
    public function edit_khu($id_khu){
        $this->AuthLogin();
        $all_khu = DB::table('tbl_khuktx')->where('id_khu', $id_khu)->get();
        return view('Admin.edit_khu')->with('all_khu', $all_khu);
    }


    /////////// thong bao
    public function add_thong_bao(){
        $this->AuthLogin();
        $all_khu = DB::table('tbl_khuktx')->orderBy('id_khu','ASC')->get();
    
        return view('Admin.Add_notification')->with('all_khu', $all_khu);
    }
    
    public function save_thongbao(Request $request){
        $this->AuthLogin();
        $macnbo = substr(md5(microtime()),rand(0,26),5);
      
        $mytime = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        
         $idql = Session::get('admin_id');
    	$data = array();
    	$data['id_ngTB'] = $idql;
        $data['id_ngNhan'] = "";

        if($request->khu == "all"){
            $data['id_khu_TV'] = " ";
        }else if($request->khu != "all"){
            $data['id_khu_TV'] = $request->khu;
        }
    

        $data['title'] = $request->title;
        $data['mota'] = $request->mota;
    	$data['time'] = $mytime;
        $data['type'] = $request->loaitb;
        $data['trangthai'] = "new";
        $data['image'] = $request->image;
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $data['image'] = $new_image;
            DB::table('tbl_notification')->insert($data);
            Session::put('message','Thêm thông báo thành công');
            return Redirect::to('/add-thong-bao');
        }
        $data['image'] = '';
    	DB::table('tbl_notification')->insert($data);  
        Session::put('message','Thêm thông báo thành công');
    	return Redirect::to('/add-thong-bao');
    }
   

    //////// save cán bộ khu Phòng
    public function save_canboktx(Request $request){
        $this->AuthLogin();
        $macnbo = substr(md5(microtime()),rand(0,26),5);
        $data2 = $request->all();
        $data2 = array();
        $data2['user_name'] = $request->email;
    	$data2['pass'] = $request->pass;
        $data2['gioitinh'] =  $request->gioitinh;
        $data2['mauser'] =  $macnbo;
        $data2['idkhu'] =  $request->khu;
        $data2['auth'] = "1";
    	DB::table('tbl_user')->insert($data2);

        $data = $request->all();
   
    	$data = array();
    	$data['name'] = $request->ten;
        $data['email'] = $request->email;
    	$data['phone'] = $request->phone;
        $data['gioitinh'] = $request->gioitinh;
        $data['quequan'] = $request->diachi;
    	$data['ngaysinh'] = $request->ngaysinh;
        $data['macbo'] = $macnbo;
        $data['idkhu'] = $request->khu;

    
        $data['image'] = $request->image;
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $data['image'] = $new_image;
            DB::table('tbl_banquanly')->insert($data);
            Session::put('message','Thêm cán bộ thành công');
            return Redirect::to('/add-canboktx');
        }
        $data['image'] = '';
    	DB::table('tbl_banquanly')->insert($data);  
        Session::put('message','Thêm cán bộ thành công');
    	return Redirect::to('/add-canboktx');
    }
 
    public function save_khuktx(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    
    	$data = array();
    	$data['tenkhu'] = $request->namekhu;
        $data['diachi'] = $request->daichikhu;
    	$data['mota'] = $request->motakhu;

    	DB::table('tbl_khuktx')->insert($data);
        
    	Session::put('message','Thêm khu thành công');
    	return Redirect::to('/add-khuktx');
    }
      public function save_edit_khuktx(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    
    	$data = array();
    	$data['tenkhu'] = $request->namekhu;
        $data['diachi'] = $request->daichikhu;
    	$data['mota'] = $request->motakhu;

    	DB::table('tbl_khuktx')->where('id_khu',$request->idkhuu)->update($data);
        
    	Session::put('message','Cập nhật khu thành công');
    	return Redirect::to('/all-khu');
    }
 
 
    public function save_phongktx(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    
    	$data = array();
    	$data['sophong'] = $request->tenphong;
        $data['idkhu'] = $request->khu;
    	$data['svcur'] = "0";
        $data['svmax'] = $request->maxpeople;
        $data['giaphong'] = $request->giaphong;
        $data['gioitinh'] = $request->gioitinh;
    	$data['tang'] = $request->tang;
        $data['loaiphong'] = $request->loaiphong;
        	
        $data['tinhtrang'] = "new";
    	DB::table('tbl_phong')->insert($data);
        
    	Session::put('message','Thêm phòng thành công');
    	return Redirect::to('/add-phongktx');
    }

    public function save_edit_phongktx(Request $request){
        $this->AuthLogin();
        $data = $request->all();
    
    	$data = array();
    	$data['sophong'] = $request->tenphong;
        $data['idkhu'] = $request->khu;
        $data['svmax'] = $request->maxpeople;
        $data['giaphong'] = $request->giaphong;
        $data['gioitinh'] = $request->gioitinh;
    	$data['tang'] = $request->tang;
        $data['loaiphong'] = $request->loaiphong;
        	
        $data['tinhtrang'] = "new";
    	DB::table('tbl_phong')->where('id_phong',$request->idphog)->update($data);
        
    	Session::put('message','Cập nhật phòng thành công');
    	return Redirect::to('/all-phong');
    }



/////////////  all cán bộ khu phòng
      public function all_canbo(){
        $this->AuthLogin();
        $all_canbo = DB::table('tbl_banquanly')->get();
        return view('Admin.all_canbo')->with('all_canbo', $all_canbo);
       }
        public function delete_canbo($id){
            $this->AuthLogin();
            DB::table('tbl_banquanly')->where('id',$id)->delete();
            Session::put('message','Xóa thành công');
            return Redirect::to('all-canbo');
        }
  
        public function all_khu(){
            $this->AuthLogin();
            $all_khu = DB::table('tbl_khuktx')->get();
            return view('Admin.all_khu')->with('all_khu', $all_khu);
        }
        public function all_phong(){
            $this->AuthLogin();
            $all_phong = DB::table('tbl_phong')->get();
            return view('Admin.all_phong')->with('all_phong', $all_phong);
           }
         public function delete_phong($id_phong){
                $this->AuthLogin();
                DB::table('tbl_phong')->where('id_phong',$id_phong)->delete();
                Session::put('message','Xóa thành công');
                return Redirect::to('all-phong');
            }
        public function delete_khu($id_khu){
            $this->AuthLogin();
            DB::table('tbl_khuktx')->where('id_khu',$id_khu)->delete();
            Session::put('message','Xóa thành công');
            return Redirect::to('all-khu');
        }


        
        public function print_fill_tongssv(Request $request){
            $pdf = \App::make('dompdf.wrapper');
          
                $pdf->loadHTML($this->print_order_convert_tongsc());   
            return $pdf->stream();
        }
        public function print_order_convert_tongsc(){
    
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
            <h4>Danh sách tất cả sinh viên nội trú tronh ký túc xá</h4>
    
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
