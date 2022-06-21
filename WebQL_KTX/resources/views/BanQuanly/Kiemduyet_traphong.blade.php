@extends('BanQly_Layout')
@section('content')
   
       <div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách hồ sơ đăng ký trả phòng chờ phê duyệt </h4>
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
								<th scope="col">Phòng</th>
								<th scope="col">Tầng</th>
								<th scope="col">Loại phòng</th>
								<th scope="col">SĐT</th>
								<th scope="col">Giới tính</th>
							
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;	
				      	?>
						@foreach($allphong as $key => $cate)
								<?php
									$i++;	
								?>
							<tr>		
								<th scope="row">{{$i}}</th>
								<td>{{$cate->name}}</td>
								<td>{{$cate->sophong}}</td>
								<td>{{$cate->tang}}</td>							
								<td>	<?php
									$name = $cate->loaiphong;
									if($name == "0"){
										echo "Thường";
										
									}else{
										echo "VIP";
									}
								?></td>
								<td>{{$cate->phone}}</td>							
								<td>	
									<?php
									$name = $cate->gioitinh;
									if($name == "0"){
										echo "Nam";
										
									}else{
										echo "Nữ";
									}
								?></td>
						
								<td>

								
								<form action="{{URL::to('/xacnhan-phieudangky-traphong')}}" method="post" class="tab-wizard wizard-circle wizard">		
                                 {{ csrf_field() }}
						
								<input name="svcur" value="{{$cate->svcur}}" type="hidden" class="form-control">
								<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
								<input name="idphong" value="{{$cate->idphong}}" type="hidden" class="form-control">
								<button 
									type="submit" class="btn btn-primary">Xác nhận</button>
								</form>
							</td>
							 </tr>
							
							@endforeach 
					</table>
					{{ $allphong->links() }}

				</div>
		

				
			
			</div>
			
		</div>


		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách lịch sử hồ sơ trả phòng  </h4>
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
								<th scope="col">Phòng</th>
								<th scope="col">Tầng</th>
								<th scope="col">Loại phòng</th>
								<th scope="col">SĐT</th>
								<th scope="col">Giới tính</th>
											
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
								<td>{{$cate->name}}</td>
								<td>{{$cate->sophong}}</td>
								<td>{{$cate->tang}}</td>							
								<td>	<?php
									$name = $cate->loaiphong;
									if($name == "0"){
										echo "Thường";
										
									}else{
										echo "VIP";
									}
								?></td>
								<td>{{$cate->phone}}</td>							
								<td>	
									<?php
									$name = $cate->gioitinh;
									if($name == "0"){
										echo "Nam";
										
									}else{
										echo "Nữ";
									}
								?></td>
						
								
							 </tr>
							
							@endforeach 
					</table>
					{{ $allphong->links() }}

				</div>
		

				
			
			</div>
			
		</div>

	

  @endsection