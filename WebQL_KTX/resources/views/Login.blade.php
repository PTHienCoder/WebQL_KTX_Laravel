<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>


  <link rel="stylesheet" href="{{asset('/public/loginpage.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body class="">
<div class="limiter" id="login">
        <div class="container-login100" style="background-image:url(https://image.freepik.com/free-photo/happy-woman-doing-online-shopping-home_329181-4301.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="login_topimg">
                        </div>
                        <div class="wrap-login100">
                            <form class="login100-form validate-form"> <span class="login100-form-title "> Login </span> <span class="login100-form-subtitle m-b-16"> to your account </span>
                                 
                                 <div class="container-login100-form-btn p-t-25"style ="margin-bottom: 24px;"> 
                               
                                  <a href="{{URL::to('/LoginBanQly')}}" class="login100-form-btn">Ban quản lý</a> </div>
                            
                                 <div class="container-login100-form-btn p-t-25" style ="margin-bottom: 32px; ">

                                  <a href="{{URL::to('/LoginStudent')}}" style="background-color: black;" class="login100-form-btn">Sinh viên </a> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
