<?php use Carbon\Carbon; ?>
@extends('BanQly_Layout')
@section('content')
	
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Blog</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">
										Thông tin cán bộ quản lý
										
									
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
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
														<p>Email: {{$cate->email}}</p>
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
														   <p>Mã cán bộ: {{$cate->macbo}}</p>
														   <p>Khu quản lý: {{$cate->tenkhu}}</p>
								   
													
													
													
															<div class="pt-10">
																<a href="{{URL::to('/update-profile-canbo/'.$cate->id)}}" class="btn btn-outline-primary">Cập nhật thông tin</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach 
										</li>
									
									</ul>
								</div>
								<div class="row">
								<div class="col-md-12 col-sm-12">
									
									<div class="card-box mb-30">
										<h5 class="pd-20 h5 mb-0">Thông báo </h5>
										<div class="latest-post">
										<ul>
										@foreach($all_no as $key => $cate)
											<li>
												<h4><a href="#">{{$cate->title}}</a></h4>
												<p>{!!$cate->mota!!}</p>

												<span><?php
													Carbon::setLocale('vi');
													$dt2 = Carbon::create($cate->time);								 
													$now = Carbon::now('Asia/Ho_Chi_Minh');						
													echo $dt2->diffForHumans($now);		
													?>
													</span>
												
											</li>
										@endforeach 
										</ul>

										{{ $all_no->links() }}
										</div>
									</div>
								
								</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
							
								<div class="card-box mb-30">
									<h5 class="pd-20 h5 mb-0">Thông báo của khu</h5>
									<div class="latest-post">
									<ul>
											@foreach($all_no2 as $key => $cate2)
											<li>
												<h4><a href="#">{{$cate2->title}}</a></h4>
												<p>{!!$cate2->mota!!}</p>
												<span><?php
													Carbon::setLocale('vi');
													$dt2 = Carbon::create($cate2->time);								 
													$now = Carbon::now();						
													echo $dt2->diffForHumans($now);		
													?></span>
											  </li>
										     @endforeach 
										</ul>

										{{ $all_no2->links() }}
										
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
  @endsection