<?php use Carbon\Carbon; ?>
@extends('admin_layout')
@section('content')
      <div class="row">
      <div class="col-md-2">
      <form action="{{URL::to('/loc-fill-namhoc')}}" method="post" class="form-horizontal bucket-form">
                {{ csrf_field() }}
			     	<p>
					Đợt năm học: 
					<select name="namhoc" class="dashboard-filter form-control" >
						<option value="all" >--chọn--</option>
                        @foreach($all_hcki as $key => $cate)            
                         <option value="{{$cate->id_hocki}}">{{$cate->yeard}} / 
                         <?php
									$name = $cate->hocki;
									if($name == "0"){
										echo "HK I";
										
									}else if($name == "1"){
                                        echo "HK II";
                                    }else{
                                        echo "Kỳ hè";
                                    }
								?> </option>
                         @endforeach 
					</select>
				   </p>

 
			</div>
            <div class="col-md-1">
            <p>...</p>
            <input type="submit" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Chọn">
            </form>
			</div>
            <?php 
                     $message = Session::get('lochocki');
                     if($message == "true" ){  
                      //  Session::put('lochocki',null);
               
             ?>
   <form action="{{URL::to('/loc-fill-date')}}" method="post" class="form-horizontal bucket-form" >
                {{ csrf_field() }}
            @foreach($dill_hocs as $key => $cate)            
             <div class="col-md-3">
				<p>Năm học: {{$cate->yeard}} </p>
                <p>Start:{{$cate->date_start}} / End: {{$cate->date_end}}  </p>
              
			</div>     
         
                <input type="hidden" name="namhoc"value="{{$cate->id_hocki}}" class="form-control">
            <div class="col-md-2">
				<p>Từ ngày:</p>
                <input required onchange="getObject(this);"  type="date" name="date1" min="{{$cate->date_start}}" id="datepicker" class="form-control">
			</div>

 
			<div class="col-md-2">
				<p>Đến ngày: </p>
                <input required type="date" onchange="getObjectyyy(this);" name="date2" id="date2" max="{{$cate->date_end}}" id="datepicker2" class="form-control">
			</div>

           

            @endforeach 

            <div class="col-md-2">
            <p>...</p>
            <input type="submit" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
			
			</div>
            </form>
              <?php 
              }
               
             ?>

   </div>
	<!-- //market-->
    <div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Tổng</h4>
                     <?php 
                       $i = 0;	
                       foreach($all_fill as $key => $cate){
                        $i++;
                       }
               
                        ?>
					<h3>{{$i}}</h3>
					<p>Tổng Sinh Viên Đăng ký</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>SV Nam</h4>
                    <?php 
                       $i = 0;	
                       foreach($all_fill_nam as $key => $cate){
                        $i++;
                       }
               
                        ?>
						<h3>{{$i}}</h3>
						<p>Tổng Sinh Viên Nam Đăng ký</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users"></i>
					</div>
					<div class="col-md-8 market-update-left">
                    <h4>SV Nữ</h4>
                    <?php 
                       $i = 0;	
                       foreach($all_fill_nu as $key => $cate){
                        $i++;
                       }
               
                        ?>
						<h3>{{$i}}</h3>
						<p>Tổng Sinh Viên Nữ Đăng ký</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-3 market-update-right">
					<!-- //	<i class="fa fa-shopping-cart" aria-hidden="true"></i> -->
					</div>
					<div class="col-md-8 market-update-left">

                  
                    <h4>Phòng trống</h4>
                    <?php 
                       $i = 0;	
                       foreach($all_fill_tphong as $key => $cate){
                        $i++;
                       }
                       $trong=0;
                       foreach($all_fill_ptrong as $key => $cate){
                        $trong++;
                       }
               
                        ?>
						<h3>{{$trong}} / {{$i}}</h3>
						<p>Phòng Còn trống</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
        <?php 
               $message = Session::get('lochocki');
               if($message == "true" ){  
                Session::put('lochocki',null);
               
             ?>
        <div class="row"> 
        <div class="col-md-10"> </div>
        <div class="col-md-2"> 
        <form action="{{URL::to('/print-fill')}}" method="post" >
                {{ csrf_field() }}
                @foreach($dill_hocs as $key => $cate)            
        
          <input type="hidden" name="date_1_in" id="ttt" value="{{$cate->date_start}}">
          <input type="hidden" name="date_2_in" id="yyy"  value="{{$cate->date_end}}">

                @endforeach 
          <input type="submit" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Xuất PDF">
         </form>

        </div>
        </div>
        <?php 
             }else if($message == "locnawm" ){

        ?>
 <div class="row"> 
        <div class="col-md-10"> </div>
        <div class="col-md-2"> 
        <form action="{{URL::to('/print-fill')}}" method="post" >
                {{ csrf_field() }}
                         
        
          <input type="hidden" name="date_1_in" id="ttt" value="1nam">

          <input type="submit" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Xuất PDF.">
         </form>

        </div>
        </div>
        <?php 
             }

        ?>
		<!-- //market-->
<div class="card-box pd-20 height-100-p mb-30">
              <?php 
                $message = Session::get('messagetb');
                if($message != null ){  
              ?>
               <div class="row align-items-center">	

                    <div class="col-md-1">
                                    
                    </div>
                    <div class="col-md-11">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            {{$message}}
                        </h4>                             
                    </p>
  
                    </div>
                 </div>

              <?php 
                }else{
                    foreach($avtive as $key => $cate){
                        $avtive2 = $cate->trangthai;
                    }
                    if($avtive2 == "true"){
                        ?>
                               @foreach($thongtintb as $key => $cate)
                                        <div class="row align-items-center">	

                                                <div class="col-md-1">
                                                                
                                                </div>
                                                <div class="col-md-11">                                     
                                                    <br>
                                                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                                        Hệ thống đăng ký sẽ kết thúc vào: {{$cate->dateEnd}}
                                                    </h4>
                                                    <br>
                                                    <p class="font-18 max-width-600">Thời gian còn lại: 
                                                         <?php
                                                            Carbon::setLocale('vi');
                                                            $dt2 = Carbon::create($cate->dateEnd);								 
                                                            $now = Carbon::now('Asia/Ho_Chi_Minh');						
                                                            echo $dt2->diffForHumans($now);		
                                                            ?>
                                                    </p>
                                                   
                                                    <br>
                                                    <p class="font-18 max-width-600">


                                                    <a href="{{URL::to('/ket-thuc-dky/'.$cate->id_no)}}"  class="btn btn-info">Kết thúc</a>  
                                                  
                                                    
                                                    

                                                </p>


                                                </div>
                                                </div>
                                        @endforeach 
                        <?php      
                    }else{  
                    ?>
                                @foreach($thongtintb as $key => $cate)
                                <div class="row align-items-center">	

                                        <div class="col-md-1">
                                                        
                                        </div>
                                        <div class="col-md-11">
                                            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                                Hệ thống đăng ký phòng ở nội trú sẽ được bắt đầu vào: {{$cate->dateStart}}
                                            </h4>
                                            <br>
                                        
                                            <br>
                                            <p class="font-18 max-width-600">Thời gian còn lại: 

                                            <?php
                                                Carbon::setLocale('vi');
                                                $dt2 = Carbon::create($cate->dateStart);								 
                                                $now = Carbon::now('Asia/Ho_Chi_Minh');						
                                                echo $dt2->diffForHumans($now);		
                                                ?>
                                            </p>
                                            <br>
                                            <p class="font-18 max-width-600">



                                            <a href="{{URL::to('/bat-dau-dky')}}"  class="btn btn-info">Bắt đầu mở</a>  
                                            
                                            

                                        </p>


                                        </div>
                                        </div>
                                @endforeach 
              <?php 
                }
              }
              ?>

				
 </div>


 <script>

function getObject(object)
{
    document.getElementById("date2").setAttribute("min", object.value);
    document.getElementById("ttt").value = object.value;
console.log(object.value); // result 2019-01-03
}


function getObjectyyy(object)
{
    document.getElementById("yyy").value = object.value ;

}



</script>
@endsection