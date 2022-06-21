@extends('BanQly_Layout')
@section('content')

<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách thành viên trong phòng hiện tại</h4>
						</div>
						<div class="pull-right">
						@foreach($allphong2 as $key => $cate)
						<a href="{{URL::to('/inbaocao-sv-trongphong/'.$cate->idphong)}}" class="btn btn-primary btn-sm " >Xuất PDF</a>
							@endforeach 
							
						</div>
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


		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách sinh viên đã từng trong phòng</h4>
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
								<th scope="col">Số giường</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;	
				      	?>
						@foreach($allphong4 as $key => $cate)
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
								<td>{{$cate->sogiuong}}</td>
								
							 </tr>
							
							@endforeach 
					</table>
		

				</div>
		

				
			
			</div>
			
		</div>

  @endsection