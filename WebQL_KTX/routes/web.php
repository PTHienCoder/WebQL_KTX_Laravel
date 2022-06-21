<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
///////// Website///////////
Route::get('/', function () {
    return view('Pages.Home');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/Login', function () {
    return view('Login');
});
Route::get('/LoginStudent', function () {
    return view('LoginStudent');
});
Route::get('/LoginBanQly', function () {
    return view('LoginBanQuanLy');
});
Route::get('/Register-Student', function () {
    return view('RegisterStudent');
});
Route::get('/Xem-Phong','WebSite_Controller@Xem_Phong');

Route::get('aboutme',function(){
    return view('Pages.aboutme');
});
Route::get('contact',function(){
    return view('Pages.contact');
});

Route::post('/resgister','WebSite_Controller@register');

///// Cán bộ quản lý//////////////
Route::post('/login-CBQL','QuanLyCanBoConTroller@dashboard');
Route::get('/dashboard-CBQL/{mauser}','QuanLyCanBoConTroller@index');

Route::get('/QLy-Phong/{idkhu}','QuanLyCanBoConTroller@qly_phong');

Route::get('/DanhSanhPhong-sinhvien-Dangky/{idkhu}','QuanLyCanBoConTroller@show_danhsachphong');
Route::get('/chitiet-phieudangky/{id}','QuanLyCanBoConTroller@chitietphieudangky');

Route::get('/Chi-tiet-Qly-phong/{id}','QuanLyCanBoConTroller@Chi_Tiet_Qly_Phong');

Route::post('/pheduyet-online','QuanLyCanBoConTroller@pheduyet_online');
Route::post('/pheduyet-offline','QuanLyCanBoConTroller@pheduyet_offline');

Route::get('/Danh-HoSo-GiaHan/{idkhu}','QuanLyCanBoConTroller@Danh_sach_HoSo_GiaHan');
Route::post('/pheduyet-offline-giahan','QuanLyCanBoConTroller@pheduyet_offline_Giahan');
Route::post('/pheduyet-giahan-online','QuanLyCanBoConTroller@pheduyet_GiaHan_online');


Route::post('/huy-hopdong','QuanLyCanBoConTroller@Huy_Hoso');

Route::get('/Danh-SV-ChuyenPhong/{idkhu}','QuanLyCanBoConTroller@Danh_SV_ChuyenPhong');
Route::get('/Danh-SV-TraPhong/{idkhu}','QuanLyCanBoConTroller@Danh_SV_TraPhong');
Route::post('/xacnhan-phieudangky-traphong','QuanLyCanBoConTroller@xacnhan_phieudangky_traphong');

Route::get('/xac-nhan-nop-le-phi-chuyenphong/{idno}','QuanLyCanBoConTroller@xacnhan_oplephi_chuyenphong');


Route::get('/chitiet-phieu-giahan/{id}','QuanLyCanBoConTroller@chitiet_phieu_giahan');
Route::get('/chitiet-phieudangky-chuyenphong/{idphieu}','QuanLyCanBoConTroller@chitiet_phieudangky_chuyenphong');

Route::post('/pheduyet-chuyenphong','QuanLyCanBoConTroller@pheduyet_chuyenphong');
Route::get('/tuchoi-chuyenphong/{idphieu}','QuanLyCanBoConTroller@tuchoi_chuyenphong');


Route::get('/update-profile-canbo/{idcanbo}','QuanLyCanBoConTroller@update_profile_canbo');
Route::post('/save-update-canboktx','QuanLyCanBoConTroller@save_update_canboktx');


Route::get('/QLy-SV/{idkhu}','QuanLyCanBoConTroller@QLy_SV');
Route::get('/chi-tiet-sinh-vien/{id_phieu}','QuanLyCanBoConTroller@chi_tiet_sinh_vien');

Route::get('/logout-CBQL','QuanLyCanBoConTroller@logout');


Route::get('/inbaocao-sv-trongphong/{idphong}','QuanLyCanBoConTroller@inbaocao_sv_trongphong');


///// ////sinh viên///////////////
Route::post('/login-sinhvien','StudentConTroller@dashboard');
Route::get('/DB-sinhvien/{idusser}','StudentConTroller@index');
Route::get('/DanhSanhPhong-sinhvien/{gt}','StudentConTroller@show_danhsachphong');
Route::get('/phonghientai/{idusser}','StudentConTroller@phonghientai');



Route::get('/Gia-Hop-Dong-SV/{id_phieu}','StudentConTroller@Gia_Han_HD_SV');


Route::get('/dky-phong-chitiet/{idphong}','StudentConTroller@dky_phong_chitiet');
Route::post('/DkyPhong-sinhvien','StudentConTroller@dangky_phong');
Route::post('/Save-GiaHan-HD','StudentConTroller@Save_GiaHan_HD');

Route::post('/sv-dky-chuyenphong','StudentConTroller@dky_chuyenphong');
Route::post('/chitiet-chuyenphong-sv','StudentConTroller@chitiet_chuyenphong_sv');
Route::post('/gui-dky-chuyenphong','StudentConTroller@gui_dky_chuyenphong');
Route::post('/sv-dky-traphong','StudentConTroller@Dky_traphong');


Route::get('/DanhSanh-Qly-KTX','StudentConTroller@DanhSanh_Qly_KTX');


Route::get('/update-profile-student/{student}','StudentConTroller@update_profile_student');
Route::post('/save-update-student','StudentConTroller@save_update_student');

Route::post('/loc-danh-sach-phong','StudentConTroller@loc_danh_sach_phong');


Route::get('/logout-sinhvien','StudentConTroller@logout');


/////////Admin///////////////
Route::get('/Admin', function () {
    return view('Admin.dashboard');
});



Route::get('/admin','Admincontroller@index');
Route::get('/dashboard','Admincontroller@show_dashboard');
Route::get('/logout','Admincontroller@logout');
Route::post('/admin-dashboard','Admincontroller@dashboard');

Route::get('/qly-sinhvien-admin','Admincontroller@qly_sinhvien_admin');
//canbo ktx
Route::get('/add-canboktx','Admincontroller@add_canboktx');
Route::get('/all-canbo','Admincontroller@all_canbo');
Route::get('/delete-canbo/{id}','Admincontroller@delete_canbo');
//khu ktx
Route::get('/add-khuktx','Admincontroller@add_khuktx');
Route::get('/all-khu','Admincontroller@all_khu');
Route::get('/edit-khu/{id_khu}','Admincontroller@edit_khu');
Route::get('/delete-khu/{id_khu}','Admincontroller@delete_khu');
//phong ktx
Route::get('/add-phongktx','Admincontroller@add_phongktx');
Route::get('/all-phong','Admincontroller@all_phong');
Route::get('/edit-phong/{id_phong}','Admincontroller@edit_phong');
Route::get('/delete-phong/{id_phong}','Admincontroller@delete_phong');

Route::post('/save-canboktx','Admincontroller@save_canboktx');
Route::post('/save-khuktx','Admincontroller@save_khuktx');
Route::post('/save-phongktx','Admincontroller@save_phongktx');
Route::post('/save-edit-phongktx','Admincontroller@save_edit_phongktx');
Route::post('/save-edit-khuktx','Admincontroller@save_edit_khuktx');

Route::get('/add-thong-bao','Admincontroller@add_thong_bao');
Route::post('/save-thongbao','Admincontroller@save_thongbao');

Route::get('/ket-thuc-dky/{idno}','Admincontroller@ket_thuc_dky');
Route::get('/bat-dau-dky','Admincontroller@bat_dau_dky');

//// hoc ki

Route::get('/add-hocki-moi','Admincontroller@add_hockimoi');
Route::post('/save-hockimoi','Admincontroller@save_hockimoi');


Route::post('/loc-fill-namhoc','Admincontroller@loc_fill_namhoc');
Route::post('/loc-fill-date','Admincontroller@loc_fill_date');

/// inbaocaos
Route::post('/print-fill','Admincontroller@print_fill');

Route::post('/print-fill-tongssv','Admincontroller@print_fill_tongssv');
