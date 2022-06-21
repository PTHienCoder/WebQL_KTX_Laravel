@extends('Student_layout')
@section('content2')

  <?php
      $message = Session::get('message_dky');
     if($message){   
	   ?>
      <div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
                                          
					
					<div class="col-md-12">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
						   
                                <span class="text-alert">{{$message}}</span>
												
						</h4>
				</div>
			</div>
		
		</div>

		<?php     
	
          }else{ 
		?>

		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			
			<div class="card-box mb-30">

				
					<div class="pd-20">
						<h4 class="text-blue h4">Danh sách phòng dành cho 
						
						<?php
									$name = $gioitinh;
									if($name == "0"){
										echo "nam";
										
									}else{
										echo "nữ";
									}
						?>
				 	
					</h4>
					<form action="{{URL::to('/loc-danh-sach-phong')}}" method="post" class="form-horizontal bucket-form" method="get">
                      {{ csrf_field() }}
					<div class= "row">

					<div class="col-md-3">
					 <label class="col-sm-4 col-form-label">Khu:</label>
				             <select name="khu" class="form-control input-sm m-bot15"> 
								 <option selected  value="all">All</option>                                       
                                         @foreach($all_khu as $key => $cate)
                                          
										  <option value="{{$cate->id_khu}}">{{$cate->tenkhu}}</option>
									     @endforeach           
                               </select>
				  	</div>
					<div class="col-md-3">
					 <label class="col-sm-4 col-form-label">Tầng:</label>
					            <select name="tang" class="form-control input-sm m-bot15">
									        <option selected value="all">All</option>
                                            <option value="1">tầng 1</option>
                                            <option value="2">tầng 2</option>
                                            <option value="3">tầng 3</option>
                                            <option value="4">tầng 4</option>
                                            <option value="5">tầng 5</option>         
                               </select>
				  	</div>
				
					<div class="col-md-3">
					<label class="col-sm-12 col-form-label">Loại phòng:</label>
					<select name="loai" class="form-control input-sm m-bot15">
					               	 <option selected value="all">All</option>        
					                        <option value="0">Thường</option>
                                            <option value="1">VIP</option>
                                                  
                               </select>
				  	</div>
					 <div class="col-md-3">
					 <label class="col-sm-12 col-form-label">...</label>
					 <Button type = "submit" class="btn btn-outline-primary">Lọc</Button> 
					  </div>
					
						
					
				  	</div>
					  </form>
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
								<th  class="datatable-nosort">Đăng ký</th>
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
										<a href=""	class="badge btn-outline-danger">Đã đầy</a> 
									
										
										<?php
									}else if($name1 >= $name2){
										?>
										<a href="{{URL::to('/dky-phong-chitiet/'.$cate->id_phong)}}"
										class="badge badge-primary">Đăng ký</a> </div>
										
									<?php
										}
									?>
								</td>
							 </tr>
							
							@endforeach 
							</tbody>
					</table>
		
					</div>
				</div>
		
			
			</div>
			
		</div>

		<?php  
		}						
     ?>
@endsection