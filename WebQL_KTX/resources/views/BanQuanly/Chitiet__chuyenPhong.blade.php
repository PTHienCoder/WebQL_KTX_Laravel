@extends('BanQly_Layout')
@section('content')


      <div class="pd-ltr-20">

	  
    <form action="{{URL::to('/pheduyet-chuyenphong')}}" method="post">
                  {{ csrf_field() }}

			<div class="card-box pd-20 height-100-p mb-30">
				  <div class="row align-items-center">	

				
						
                  @foreach($allphong as $key => $cate)
				  
				  <input name="idphong_old" value="{{$cate->id_phong}}" type="hidden" class="form-control">
				  <input name="svcur_old" value="{{$cate->svcur}}" type="hidden" class="form-control">
				  <input name="gia_old" value="{{$cate->giaphong}}" type="hidden" class="form-control">
				  <input name="id_phieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">

					<div class="col-md-6">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Thông tin Phòng cũ <div class="weight-600 font-30 text-blue">
                            Phong: {{$cate->sophong}}</div>
						</h4>
						
						<p class="font-18 max-width-600">Tầng: {{$cate->tang}}</p>
						<p class="font-18 max-width-600">Giá: {{$cate->giaphong}}</p>
						<p class="font-18 max-width-600">Loại Phòng: 
						<?php
							$name = $cate->loaiphong;
							if($name == "0"){
								echo "Nam";
								
							}else{
								echo "Nữ";
							}
				      	?>	
						</p>
						<p class="font-18 max-width-600">Tên khu: {{$cate->tenkhu}}</p>
						<p class="font-18 max-width-600">số người hiện tại: {{$cate->svcur}}</p>
						<p class="font-18 max-width-600">số người tối da: {{$cate->svmax}}</p>		
						</div>
                        @endforeach 

                        @foreach($allphong2 as $key => $cate2)

						<input name="idphong_new" value="{{$cate2->id_phong}}" type="hidden" class="form-control">
				        <input name="svcur_new" value="{{$cate2->svcur}}" type="hidden" class="form-control">
						<input name="gia_new" value="{{$cate2->giaphong}}" type="hidden" class="form-control">
						<div class="col-md-6">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
							Thông tin Phòng Phòng mới <div class="weight-600 font-30 text-blue">
                                Phong: {{$cate2->sophong}}</div>
						</h4>
						<p class="font-18 max-width-600">Tầng: {{$cate2->tang}}</p>
						<p class="font-18 max-width-600">Giá: {{$cate2->giaphong}}</p>
						<p class="font-18 max-width-600">Loại Phòng: 
						<?php
							$name = $cate2->loaiphong;
							if($name == "0"){
								echo "Thường ";
								
							}else{
								echo "Vip";
							}
				      	?>	
						</p>
						<p class="font-18 max-width-600">Tên khu: {{$cate2->tenkhu}}</p>
						<p class="font-18 max-width-600">số người hiện tại: {{$cate2->svcur}}</p>
						<p class="font-18 max-width-600">số người tối da: {{$cate2->svmax}}</p>				
						</div>
                        @endforeach 
					</div>

          								
			</div>
		
		</div>
	
   
   <div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				
		    	@foreach($allphong as $key => $cate)	
				<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
				<input name="idsv" value="{{$cate->id}}" type="hidden" class="form-control">
                  <div class="row align-items-center">			
					<div class="col-md-6">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Thông tin người đăng ký <div class="weight-600 font-30 text-blue">Tên: {{$cate->name}}</div>
						</h4>
						<p>Email: {{$cate->email}}</p>
						<p >SĐT: {{$cate->phone}}</p>
						<p>Giới tính: 
						<?php
							$name = $cate->gioitinh;
							if($name == "0"){
								echo "Thường ";
								
							}else{
								echo "Vip";
							}
				      	?>	
						</p>
						<p>Quê quán: {{$cate->quequan}}</p>
						<p>Ngày sinh: {{$cate->ngaysinh}}</p>


						</div>

						<div class="col-md-6">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Lý do chuyển Phòng:
							<div class="weight-600 font-30 text-blue"></div>
						</h4>
						<p>{{$cate->Lydo}}</p>
						</div>

						
					</div>
                    @endforeach 



				<div class="row align-items-center">	
			
				<div class="col-md-2 align-items-center">
				</div>
				<div class="col-md-4 align-items-center">
				<button type="submit" value="" class="btn btn-primary">Chập nhận</a>
				</div>
			
			
				
			
				<div class="col-md-4 align-items-center">				
				<a href="{{URL::to('/tuchoi-chuyenphong/'.$cate->id_phieu)}}" type="submit" value="" class="btn btn-primary">Từ chối</a>
				</div>
		


				</div>

			</div>
			</form> 

					  
		
		</div>
	
			
  @endsection