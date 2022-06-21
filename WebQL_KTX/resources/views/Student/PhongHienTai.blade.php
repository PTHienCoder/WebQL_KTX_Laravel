<?php use Carbon\Carbon; ?>
@extends('Student_layout')
@section('content2')

        <div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
                                          
					
					<div class="col-md-12">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
						   <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
						
                            ?>
						</h4>
						<h5 class="font-20 weight-500 mb-10 text-capitalize">
						   <?php
                        
							$message2 = Session::get('message2');
                            if($message2){
                                echo '<span class="text-alert">'.$message2.'</span>';
                                Session::put('message',null);
                            }
                            ?>
						</h5>


			    	@foreach($allphong as $key => $cate)
					<div class="col-md-12">
					<div class=" row">
						<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
					     <div class="weight-600 font-30 text-blue">Số Phòng: {{$cate->sophong}}</div>
						</h4>
						<p class="font-18 max-width-600">Tên khu: {{$cate->tenkhu}}</p>
						<p class="font-18 max-width-600">Thời gian đăng ký: {{$cate->ngaydky}}</p>
						<p class="font-18 max-width-600">Thời gian kết thúc hợp đồng: {{$cate->ngayketthuc}}</p>
						<p class="font-18 max-width-600">Giới tính: 
						<?php
							$name = $cate->gioitinh;
							if($name == "0"){
								echo "Nam";
								
							}else{
								echo "Nữ";
							}
				      	?>	
						</p>
						<p class="font-18 max-width-600">Trường: {{$cate->truong}}</p>
						<p class="font-18 max-width-600">Lớp: {{$cate->class}}</p>
						<p class="font-18 max-width-600">Mã sinh viên: {{$cate->masv}}</p>
						<p class="font-18 max-width-600">Chuyên ngành: {{$cate->chuyennganh}}</p>
						</div>
						<div class="col-md-4 pd-20 card-box mb-30">
						<p class="font-18 max-width-600">Số người hiện tại: {{$cate->svcur}}</p>
						<p class="font-18 max-width-600">Số người tối da: {{$cate->svmax}}</p>	
						<p>Khu: {{$cate->tenkhu}}</p>
						 <p>Tầng: {{$cate->tang}} </p>
                         <p>Loại Phòng: 
						 <?php
							$name = $cate->loaiphong;
							if($name == "0"){
								echo "Thường";
								
							}else{
								echo "VIP";
							}
				      	?> </p>
						 <p>Số giường: {{$cate->sogiuong}} </p>
						 </div>
						 </div>
						<div class="row">

						<div class="col-md-4">
						<form action="{{URL::to('/sv-dky-chuyenphong')}}" method="post" class="tab-wizard wizard-circle wizard">		
                         {{ csrf_field() }}
						 <input name="idphong" value="{{$cate->id_phong}}" type="hidden" class="form-control">
						<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
                        <input name="magiotinh" value="{{$cate->gioitinh}}" type="hidden" class="form-control">
						 <button 
                             type="submit" class="btn btn-primary">Đăng ký chuyển</button>
						 </form>	
						</div>

						<div class="col-md-4">
						<button type="button" data-toggle="modal" 
									data-target="#success-modal"
								   class="btn btn-primary">Đăng ký trả phòng</button>
						
						</div>





				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
							<div class="modal-body text-center font-18">
								<!-- <h3 class="mb-20"></h3>
								<div class="mb-30 text-center"><img src="{{asset('public/backend/vendors/images/success.png')}}"></div> -->
								 Bạn có chắc chắn muốn trả phòng hay không ?.
							</div>
							<div class="modal-footer justify-content-center">
							<form action="{{URL::to('/sv-dky-traphong')}}" method="post" class="tab-wizard wizard-circle wizard">		
                                {{ csrf_field() }}
                        
					        	 <input name="idkhu" value="{{$cate->idkhu}}" type="hidden" class="form-control">
								<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
								<input name="magiotinh" value="{{$cate->gioitinh}}" type="hidden" class="form-control">
								<button 
									type="submit" class="btn btn-primary">Xác nhận</button>
						   </form>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->







					
						<div class="col-md-4">

						<?php
						 	$now = Carbon::now('Asia/Ho_Chi_Minh');	
							 $name = $cate->ngayketthuc;
							   if($name >= $now){
								?>	
													   
							   <?php
							   }else{
								 ?>
						        <a href="{{URL::to('/Gia-Hop-Dong-SV/'.$cate->id_phieu)}}"
						          class="btn btn-primary btn-sm ">Đăng ký gia hạn</a>	
								
								 <?php
								 }
								 ?>	 
					
						</div>

						

				   </div>

				@endforeach 
				
				</div>
			</div>
		
		</div>
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách thành viên trong phòng</h4>
						</div>
						<!-- <div class="pull-right">
							<a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div> -->
					</div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Họ và tên SV</th>
								<th scope="col">Quê quán</th>
								<th scope="col">Khóa</th>
								<th scope="col">Chuyên ngành</th>
								<th scope="col">SĐT</th>
								<th scope="col">Mã SV</th>						
								<th scope="col">Trường</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;	
				      	?>
						@foreach($allphong2 as $key => $cate)
								<?php
									$i++;	
								?>
							<tr>		
								<th scope="row">{{$i}}</th>
								<th>{{$cate->name}}</th>
								<td>{{$cate->quequan}}</td>
								<td>{{$cate->khoahoc}}</td>
								<td>{{$cate->chuyennganh}}</td>							
							
								<td>{{$cate->phone}}</td>							
								<td>{{$cate->masv}}</td>
								<td>{{$cate->truong}}</td>
								
							 </tr>
							
						@endforeach 
					</table>
		

				</div>
		

				
			
			</div>
			
		</div>

@endsection