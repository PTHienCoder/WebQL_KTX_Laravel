@extends('Website_Layout')
@section('Website_content')
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->

	<link rel="stylesheet" type="text/css" href="{{asset('./public/backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('./public/backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('./public/backend/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">

	

    <section class="mb-5 bg-light py-5">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-between align-items-lg-center">
					<!-- basic table  Start -->
					<div class="pd-20 card-box">
					<div class="clearfix ">
						<div class="pull-left">
							<h4 class="text-blue h4">Danh sách phòng trong KTX </h4>
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
					
							
						    	 </tr>
				
							@endforeach 
						</tbody>
					</table>
			

				</div>
                </div>
                </div>
		
                </section>			
	





























        	<!-- js -->
	<script src="{{asset('./public/backend/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('./public/backend/vendors/scripts/dashboard.js')}}"></script> 

		
		<!-- js -->
	<script src="{{asset('./public/backend/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('./public/backend/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('./public/backend/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('./public/backend/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{asset('./public/backend/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('./public/backend/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
	<!-- Datatable Setting js -->
	<script src="{{asset('./public/backend/vendors/scripts/datatable-setting.js')}}"></script>
@endsection