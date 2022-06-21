<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Login with student </title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/backend/vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/backend/vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend/vendors/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/backend/vendors/styles/style.css')}}">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">

	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{asset('public/backend/vendors/images/login-page-img.png')}}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Đăng nhập vào hệ thống</h2>
							<?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" sty>'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
						</div>
					<form action="{{URL::to('/login-sinhvien')}}" method="post">

							{{ csrf_field() }}		
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
								
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="{{asset('public/backend/vendors/images/person.svg')}}" class="svg" alt=""></div>
										<span>Tôi là</span>
										Sinh viên 
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input name="name" type="text" class="form-control form-control-lg" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input name="pass" type="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										
									
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										
										<!-- <a  class="btn btn-primary btn-lg btn-block" type="submit">Sign In</a> -->
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="{{URL::to('/Register-Student')}}">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('public/backend/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('public/backend/vendors/scripts/layout-settings.js')}}"></script>
</body>
</html>