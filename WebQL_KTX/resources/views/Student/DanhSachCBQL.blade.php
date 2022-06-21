@extends('Student_layout')
@section('content2')


		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Danh sách các cán bộ quản lý ký túc xá.
						
				 	
					</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort" >STT</th>
								<th>Họ và tên</th>
								<th>Email</th>
								<th>SĐT</th>
                                <th>Giới tính</th>		
                                <th>Quê quán</th>
                                <th>Ngày sinh</th>
								<th>QLy Khu</th>						
							</tr>
						</thead>
						<tbody>
                       
							<?php
								$i = 0;	
							?>
                             
						@foreach($details as $key => $cate)                                        
							<?php
									$i++;	
								?>
							<tr>		
								<th class="table-plus">{{$i}}</th>
								<td>{{$cate->name}}</td>
								<td>{{$cate->email}}</td>
								<td>{{$cate->phone}}</td>
								<td>
                                    <?php
                                     $name = $cate->gioitinh;
                                     if($name == "0"){
                                         echo "Nam";
                                         
                                     }else{
                                         echo "Nữ";
                                     }
                                    ?>
                                </td>								
							
								<td>{{$cate->quequan}}</td>
								<td>{{$cate->ngaysinh}}</td>
                                <td>{{$cate->tenkhu}}</td>
							
							 </tr>
                          </tbody>
                               
                                    
                                 
							@endforeach 
                         
					</table>
		
					</div>
				</div>
		
			
			</div>
			
		</div>


@endsection