@extends('Student_layout')
@section('content2')
@foreach($allphong as $key => $cate)
<form action="{{URL::to('/gui-dky-chuyenphong')}}" method="post">
             {{ csrf_field() }}

			 <input name="idkhu" value="{{$cate->idkhu}}" type="hidden" class="form-control">
             <div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				
		    
                            <div class="row">									
									<div class="col-md-12">
										<div class="form-group">
										    <label class="col-sm-4 col-form-label">Lý do chuyển phòng*</label>
												<input required name="lydo" type="text"placeholder ="Lý do bạn muốn chuyển phòng là gì ?" class="form-control">
										</div>
									</div>
							
								</div>


				<div class="row align-items-center">	
			
				<div class="col-md-4 align-items-center">
				</div>
				<div class="col-md-4 align-items-center">
                <input name="idphieu" value="{{$id_phieu}}" type="hidden" class="form-control">
				<button type="submit" value="" class="btn btn-primary">Xác nhận</a>
				</div>
				<div class="col-md-4 align-items-center">				
			
				</div>
				</div>

			</div>
		
		</div>

             <div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				  <div class="row align-items-center">	

				  
						
             
				  

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
								echo "Thường";
								
							}else{
								echo "VIP";
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

						<div class="col-md-6">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
							Thông tin Phòng Phòng mới <div class="weight-600 font-30 text-blue">
                                Phong: {{$cate2->sophong}}</div>
						</h4>
						<p class="font-18 max-width-600">Tầng: {{$cate2->tang}}</p>
						<p class="font-18 max-width-600">Giá: {{$cate2->giaphong}}</p>
						<p class="font-18 max-width-600">Loại Phòng: 
						<?php
							$name = $cate->loaiphong;
							if($name == "0"){
								echo "Thường";
								
							}else{
								echo "VIP";
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
	
   
 

</form> 


@endsection