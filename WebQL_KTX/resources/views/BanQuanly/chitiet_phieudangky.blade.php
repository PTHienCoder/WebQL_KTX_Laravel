@extends('BanQly_Layout')
@section('content')

   
   <div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
			
				
			  	@foreach($allphong as $key => $cate)	
				  <div class="row align-items-center">			
					<div class="col-md-6">


						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Thông tin người đăng ký <div class="weight-600 font-30 text-blue">Tên: {{$cate->name}}</div>
						</h4>
						<p class="font-18 max-width-600">Email: {{$cate->email}}</p>
						<p class="font-18 max-width-600">SĐT: {{$cate->phone}}</p>
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
						<p class="font-18 max-width-600">Quê quán: {{$cate->quequan}}</p>
						<p class="font-18 max-width-600">Ngày sinh: {{$cate->ngaysinh}}</p>


						</div>

						<div class="col-md-6">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
							Thông tin Phòng đăng ký <div class="weight-600 font-30 text-blue">
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
					</div>
				   <form action="{{URL::to('/pheduyet-online')}}" method="post">
                          {{ csrf_field() }}
					<input name="idsv" value="{{$cate->id}}" type="hidden" class="form-control">
					<input name="idkhu" value="{{$cate->id_khu}}" type="hidden" class="form-control">
				    <input name="idphong" value="{{$cate->id_phong}}" type="hidden" class="form-control">
					<input name="songhientai" value="{{$cate->svcur}}" type="hidden" class="form-control">
					<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
				   <button type="submit" value="" class="btn btn-primary">Xác nhận Online</a>
					</form>
					
				@endforeach 
				
			</div>
		
		</div>

  @endsection