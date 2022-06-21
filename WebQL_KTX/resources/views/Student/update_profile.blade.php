@extends('Student_layout')
@section('content2')



	<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Cập nhật thông tin cá nhân</h4>
							</div>
							<?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" sty>'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
						</div>
				
					</div>
				</div>
				<form action="{{URL::to('/save-update-student')}}" method="post" enctype="multipart/form-data" class="tab-wizard wizard-circle wizard">		
                          {{ csrf_field() }}
              @foreach($allphong2 as $key => $cate)
				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">	
							<h5>Thông tin cơ bản</h5>
							<section>
								<div class="row">									
									<div class="col-md-6">
										<div class="form-group">
										    <label class="col-sm-4 col-form-label">User name*</label>
												<input required value="{{$cate->user_name}}"  name="email" type="email" class="form-control">
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
										<label class="col-sm-4 col-form-label">Password*</label>				
												<input required name="pass" value="{{$cate->pass}}" type="password" class="form-control">
										</div>
									</div>
							
								</div>
								
								<div class="row">									
									<div class="col-md-6">
										<div class="form-group">
											<label >Họ và tên:</label>
											<input required value="{{$cate->name}}" name="hovaten" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >CMND/CCCD :</label>
											<input required value="{{$cate->cmnd}}" name="cmnd" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Địa chỉ thường trú :</label>
											<input required value="{{$cate->quequan}}" name="diachi" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Số điện thoại :</label>
											<input required value="{{$cate->phone}}" name="phone" type="number" class="form-control">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email :</label>
											<input required value="{{$cate->email}}" name="diachi" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Ngày sinh :</label>
											<input required value="{{$cate->ngaysinh}}" name="ngaysinh" type="text" class="form-control date-picker" placeholder="Select Date">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Giới Tính:</label>
											<select name="gioitinh" class="custom-select form-control">
                                                    @if($cate->gioitinh=="0")
                                                    <option selected value="0">Nam </option>
                                                    <option value="1">Nữ</option>  
                                                    @else
                                                    <option value="0">Nam </option>
                                                     <option selected value="1">Nữ</option>  
                                                    @endif 	
                                             </select>
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
											<input required value="{{$cate->nghenghiep}}" name="nghenghiep" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Trường ĐH/CĐ (Nếu là SV):</label>
											<input required value="{{$cate->truong}}" name="truong" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Mã SV (Nếu là SV)</label>
											<input required value="{{$cate->masv}}" name="masv" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Lớp (Nếu là SV)</label>
											<input required value="{{$cate->class}}" name="lop" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Khóa (Nếu là SV)</label>
											<input required value="{{$cate->khoahoc}}" name="khoa" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Chuyên ngành (Nếu là SV)</label>
											<input required value="{{$cate->chuyennganh}}" name="chuyennganh" type="text" class="form-control">
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
									<input name="image" type="file" class="form-control-file form-control height-auto">
								    <input name="image2" value="{{$cate->image}}"  type="hidden" class="form-control round-input">
                                    <img src="{{asset('/public/upload/'.$cate->image)}}"  width="150" alt="" >
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
                @endforeach 
				<!-- success Popup html End -->
				</form>

			
			</div>
			
		</div>

        @endsection