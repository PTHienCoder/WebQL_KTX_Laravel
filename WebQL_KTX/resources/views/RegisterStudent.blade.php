<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Đăng ký ở nội trú</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/src/plugins/jquery-steps/jquery.steps.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">

<div>
	
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Các bước đăng ký ở nội trú</h4>
							</div>
							<?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" style="color: red">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
						</div>
				
					</div>
				</div>
				<form action="{{URL::to('/resgister')}}"  method="post" enctype="multipart/form-data" class="tab-wizard wizard-circle wizard">		
                          {{ csrf_field() }}
				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">	
							<h5>Thông tin cơ bản</h5>
							<section>
								<div class="row">									
									<div class="col-md-6">
										<div class="form-group">
										    <label class="col-sm-4 col-form-label">Email Address*</label>
												<input required name="email" type="email" class="form-control">
										</div>
									</div>
							
								</div>
								<div class="row">									
									<div class="col-md-6">
										<div class="form-group">
										<label class="col-sm-4 col-form-label">Password*</label>				
												<input required name="pass" type="password" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
											<label class="col-sm-4 col-form-label">Confirm Password*</label>
												<input required type="password" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">									
									<div class="col-md-6">
										<div class="form-group">
											<label >Họ và tên:</label>
											<input required name="hovaten" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >CMND/CCCD :</label>
											<input required name="cmnd" type="number" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Địa chỉ thường trú :</label>
											<input required name="diachi" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Số điện thoại :</label>
											<input required name="phone" type="number" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Giới Tính:</label>
											<select name="gioitinh" class="custom-select form-control">
												<option value="0">Nam</option>
												<option value="1">Nữ</option>		
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Ngày sinh :</label>
											<input required name="ngaysinh" type="text" class="form-control date-picker" placeholder="Select Date">
										</div>
									</div>
								</div>
							</section>
							<!-- Step 2 -->
							<h5>thông tin khác</h5>
							<section>
						
								<div class="row">									
									<div class="col-md-6">
										<div class="form-group">
											<label >Nghề nghiệp:</label>
											<input required name="nghenghiep" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Trường ĐH/CĐ (Nếu là SV):</label>
											<input required name="truong" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Mã SV (Nếu là SV)</label>
											<input required name="masv" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Lớp (Nếu là SV)</label>
											<input required name="lop" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Khóa (Nếu là SV)</label>
											<input required name="khoa" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Chuyên ngành (Nếu là SV)</label>
											<input required name="chuyennganh" type="text" class="form-control">
										</div>
									</div>
								</div>
							
							</section>
							<!-- Step 3 -->
							<h5>Thông tin bổ sung</h5>
							<section>
								<div class="row">
								<div class="col-md-12">
								<div class="form-group">
									<label>Nộp lên hình ảnh chân dung của bạn</label>
									<input required name="image" type="file" class="form-control-file form-control height-auto">
								     </div>
									</div>
								</div>
							</section>
							<button type="button" data-toggle="modal" 
									data-target="#success-modal"
								   class="btn btn-primary">Xác nhận</button>
						
					</div>
				</div>

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Đăng ký thành công!</h3>
								<div class="mb-30 text-center"><img src="{{asset('public/backend/vendors/images/success.png')}}"></div>
								 Hồ sơ của bạn đã gửi đến ban quản lý ký túc xá, hãy đăng nhập để đăng ký chọn phòng.
							</div>
							<div class="modal-footer justify-content-center">
							<button type="submit" class="btn btn-primary">Oke</a>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->
				</form>

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Đăng ký thành công!</h3>
								<div class="mb-30 text-center"><img src="{{asset('public/backend/vendors/images/success.png')}}"></div>
								 Hồ sơ của bạn đã gửi đến ban quản lý ký túc xá, hãy đăng nhập để đăng ký chọn phòng.
							</div>
							<div class="modal-footer justify-content-center">
							<button type="submit" class="btn btn-primary">Oke</a>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->
			</div>
			
		</div>
	</div>
	<script src="{{asset('public/backend/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('public/backend/src/plugins/jquery-steps/jquery.steps.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/steps-setting.js')}}"></script>
</body>

</html>