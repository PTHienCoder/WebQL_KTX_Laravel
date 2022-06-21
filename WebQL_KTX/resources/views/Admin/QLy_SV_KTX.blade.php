@extends('admin_layout')
@section('content')

	
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
   Danh sách Sinh viên nội trú trong KTX
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      <form action="{{URL::to('/print-fill-tongssv')}}" method="post" >
                {{ csrf_field() }}         
          <input type="submit" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Xuất PDF.">
         </form>              
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
						<thead>
							<tr>
								<th  class="table-plus datatable-nosort">STT</th>
								<th>Tên</th>
								<th>Số Phòng</th>
                                <th>Số giường</th>
								<th>Mã Sinh viên</th>
								<th>Số điện thoai</th>
								<th>Giới tính</th>
								<th>Email</th>
							
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;	
				      	?>
						@foreach($all_phong as $key => $cate)
								<?php
									$i++;	
								?>
							<tr>		
								<th scope="row">{{$i}}</th>
								<td>{{$cate->name}}</td>
								<td>{{$cate->sophong}}</td>
                                <td>{{$cate->sogiuong}}</td>
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
							    <td>{{$cate->email}}</td>	
					
								
						    	 </tr>
				
							@endforeach 
						</tbody>
					</table>
					{{ $all_phong->links() }}

				</div>
		
			
			</div>
			
		</div>










        
     
 @endsection