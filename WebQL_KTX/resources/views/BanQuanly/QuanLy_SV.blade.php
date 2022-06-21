@extends('BanQly_Layout')
@section('content')

   
<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Danh sách sinh viên nội trú trong ký túc xá
						
				
					</h4>
					</div>
					<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th  class="table-plus datatable-nosort">STT</th>
								<th>Tên</th>
								<th>Số Phòng</th>
								<th>Mã Sinh viên</th>
								<th>Số điện thoai</th>
								<th>Giới tính</th>
								<th>Trạng thái</th>
								<th></th>
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
								<td>{{$cate->masv}}</td>
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
							    <td>{{$cate->trangthai}}</td>	
					
								<td><a href="{{URL::to('/chi-tiet-sinh-vien/'.$cate->id_phieu)}}"
									 class="badge badge-primary">Chi tiêt</a></div></td>
						    	 </tr>
				
							@endforeach 
						</tbody>
					</table>
					</div>

				</div>
		
			
			</div>
			
		</div>
  @endsection