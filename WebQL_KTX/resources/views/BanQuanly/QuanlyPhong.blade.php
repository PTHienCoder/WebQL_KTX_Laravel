@extends('BanQly_Layout')
@section('content')

   
<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
					<!-- basic table  Start -->
					<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách phòng trong khu KTX </h4>
						</div>
				
					</div>
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Số Phòng</th>
								<th scope="col">Tầng</th>
								<th scope="col">Loại Phòng</th>
								<th scope="col">Số người tối đa</th>
								<th scope="col">Số người hiện tại</th>
								<th scope="col">Giới tính</th>
								<th scope="col">Khu</th>
								<th scope="col">Giá / Học kỳ</th>
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
								<td>{{$cate->svmax}}</td>
								<td>{{$cate->svcur}}</td>								
								<td>	
									<?php
									$name = $cate->gioitinh;
									if($name == "0"){
										echo "Nam";
										
									}else{
										echo "Nữ";
									}
								?></td>
								<td>{{$cate->tenkhu}}</td>
								<td>{{$cate->giaphong}}VND</td>
					
								<td><a href="{{URL::to('/Chi-tiet-Qly-phong/'.$cate->id_phong)}}"
									 class="badge badge-primary">Chi tiêt</a></div></td>
						    	 </tr>
				
							@endforeach 
						</tbody>
					</table>


				</div>
		
			
			</div>
			
		</div>
  @endsection