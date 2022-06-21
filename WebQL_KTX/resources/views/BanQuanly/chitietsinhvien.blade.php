@extends('BanQly_Layout')
@section('content')
	
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
						
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
					
									<li class="breadcrumb-item active" aria-current="page">Thông tin sinh viên</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-7 col-sm-12">
								<div class="blog-list">
									<ul>
										<li>

										@foreach($details as $key => $cate)
		  
											<div class="row no-gutters">

												<div class="col-lg-4 col-md-12 col-sm-12">
													<div class="blog-img">
													
													<img src="{{asset('/public/upload/'.$cate->image)}}" alt="" class="bg_img">
													</div>
												</div>
												<div class="col-lg-8 col-md-12 col-sm-12">
													<div class="blog-caption">
														<h4>
															<a>Tên: {{$cate->name}}</a></h4>
														<div class="blog-by">
														   <p >Email: {{$cate->email}}</p>
														   <p>SĐT: {{$cate->phone}}</p>
														   
														   <p>Quê quán: {{$cate->quequan}}</p>
														   <p>Ngày sinh: {{$cate->ngaysinh}} / 
														   Giới tính: 
														   <?php
															   $name = $cate->gioitinh;
															   if($name == "0"){
																   echo "Nam";
																   
															   }else{
																   echo "Nữ";
															   }
															 ?>	
														   </p>
													
														   <p>Lớp: {{$cate->class}} / Mã Sinh Viên: {{$cate->masv}}</p>
														   <p>Khóa: {{$cate->khoahoc}}</p>
														   <p>Trường: {{$cate->truong}}</p>
														   <p>Chuyên ngành: {{$cate->chuyennganh}}</p>
													
													
													
														   <div class="pt-10">
																<a href="{{URL::to('/QLy-SV/'.$cate->idkhu)}}" class="btn btn-outline-primary">Trở về</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach 
										</li>
									
									</ul>
								</div>
							
							</div>
                            <div class="col-md-5 col-sm-12">
								<div class="blog-list">
									<ul>
										<li>

										@foreach($details as $key => $cate)
		  
											<div class="row no-gutters">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="blog-caption">
														<h4>
															<a>Phòng: {{$cate->sophong}}</a></h4>
														<div class="blog-by">
														   <p >Ngày Đăng ký: {{$cate->ngaydky}}</p>
														   <p>Ngày kết thúc HĐ: {{$cate->ngayketthuc}}</p>
														   
														   <p>Khu: {{$cate->tenkhu}}</p>
                                                            <p>Tầng: {{$cate->tang}} </p>
                                                            <p>Loại Phòng:  <?php
																$name = $cate->loaiphong;
																if($name == "0"){
																	echo "Thường";
																	
																}else{
																	echo "VIP";
																}
															?> </p>
                                                            <p>Số giường: {{$cate->sogiuong}} </p>
                                                           <p>số người hiện tại: {{$cate->svcur}}</p>
						                                    <p>số người tối da: {{$cate->svmax}}</p>	
													
													
													
														   
														</div>
													</div>
												</div>
											</div>
											@endforeach 
										</li>
									
									</ul>
								</div>
							
							</div>
							
						</div>
					</div>
				</div>
			</div>
		
		</div>
  @endsection