<?php use Carbon\Carbon; ?>
@extends('BanQly_Layout')
@section('content')
   
       <div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách hồ sơ đăng ký gian hạn nội trú chờ phê duyệt online</h4>
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
								<a href="{{URL::to('/chitiet-phieu-giahan/'.$cate->id_phieu)}}" class="btn btn-primary">Chi tiết</a>
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
							<h4 class="text-blue h4">Danh sách hồ sơ đăng ký gia hạn nội trú chờ phê duyệt tại phòng quản lý</h4>
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
								<th scope="col">thời gian xác nhận online</th>
								<th scope="col">Loại phòng</th>
								<th scope="col">SĐT</th>
								<th scope="col">Giới tính</th>
								<th scope="col">Lệ phí</th>
							
								<th scope="col"></th>
								<th scope="col"></th>
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
								<td><?php
								Carbon::setLocale('vi');
								 $dt2 = Carbon::create($cate->time_loading);								 
								 $now = Carbon::now('Asia/Ho_Chi_Minh');						
								echo $dt2->diffForHumans($now);		
								?></td>								
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
									$name = $cate->price;
									if($name == "0"){
										echo "Nam";
										
									}else{
										echo "Nữ";
									}
								?></td>
						       <td>{{$cate->giaphong}}</td>	
								<td>

								<form action="{{URL::to('/pheduyet-offline-giahan')}}" method="post">
                               {{ csrf_field() }}
								<input name="idkhu" value="{{$cate->id_khu}}" type="hidden" class="form-control">
								<input name="idphong" value="{{$cate->id_phong}}" type="hidden" class="form-control">
								<input name="songhientai" value="{{$cate->svcur}}" type="hidden" class="form-control">
								<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
						      	<button type="submit" value="" class="btn btn-primary">Hoàn thành</a>
								</form>	
		

								</td>
								<td>
								<form action="{{URL::to('/huy-hopdong')}}" method="post">
                                   {{ csrf_field() }}
								<input name="idkhu" value="{{$cate->id_khu}}" type="hidden" class="form-control">
								<input name="idphong" value="{{$cate->id_phong}}" type="hidden" class="form-control">
								<input name="songhientai" value="{{$cate->svcur}}" type="hidden" class="form-control">
								<input name="idphieu" value="{{$cate->id_phieu}}" type="hidden" class="form-control">
						      	<button type="submit" value="" class="btn btn-outline-danger">Hủy</a>
								</form>		
								</td>
							 </tr>
							
							@endforeach 
					</table>
					{{ $allphong->links() }}

				</div>
		

				
			
			</div>
			
		</div>


  @endsection