@extends('Student_layout')
@section('content2')


		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Danh sách phòng bạn muốn chuyển dành cho 
						
						<?php
									$name = $gioitinh;
									if($name == "0"){
										echo "nam";
										
									}else{
										echo "nữ";
									}
						?>
				 	
					</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort" >STT</th>
								<th>Số Phòng</th>
								<th>Tầng</th>
								<th>Loại Phòng</th>
								<th>Số người tối đa</th>
								<th>Số người hiện tại</th>						
								<th >Khu</th>
								<th>Giá / Học kỳ</th>
								<th>Đăng ký</th>
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
								<th class="table-plus">{{$i}}</th>
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
							
								<td>{{$cate->tenkhu}}</td>
								<td>{{$cate->giaphong}}VND</td>
					
								<td>	
								 
									 <?php
										$name1 = $cate->svmax;
										$name2 = $cate->svcur;
										if($name1 == $name2){
										?>
										<a	class="badge btn-outline-danger">Đã đầy</a> 
									
										
										<?php
								    	}else if($name1 >= $name2){
										?>
                                       <form action="{{URL::to('/chitiet-chuyenphong-sv')}}" method="post" class="tab-wizard wizard-circle wizard">		
                                             {{ csrf_field() }}
											 
											<input name="idphong" value="{{$cate->id_phong}}" type="hidden" class="form-control">
											<input name="idphieu" value="{{$id_phieu}}" type="hidden" class="form-control">
											<button 
                                                    type="submit" class="badge btn-primary">ĐK Chuyển</button>
                                             
                                              
										</form> 
                                        
									<?php
										}
									?>
								</td>
							 </tr>
                          </tbody>
                               
                                    
                                 
							@endforeach 
                         
					</table>
	
					</div>
				</div>
		
			
			</div>
			
		</div>


@endsection