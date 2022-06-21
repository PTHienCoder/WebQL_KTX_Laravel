@extends('Student_layout')
@section('content2')
                       <?php
                        $message = Session::get('hockimoi');
                        if($message){
                            Session::put('hockimoi',null);
                          ?>



                    <div>
                        <div class="pd-ltr-20 xs-pd-20-10">
                            <div class="min-height-200px">
                                <div class="page-header">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="title">
                                                <h4>{{$message}}</h4>
                                            </div>
                                        
                                        </div>
                                
                                    </div>
                                </div>
                                </div>
                                
                        </div>
                        </div>
                       
                       <?php     
                        }else if($message == null) {
                        ?>
                      
               
<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Thông tin đăng ký hợp đồng</h4>

                            @foreach($hocki as $key => $cate)
                           
                                         
                             @endforeach	
                        </div>
                      
                    </div>
            
                </div>
            </div>
            <form action="{{URL::to('/DkyPhong-sinhvien')}}" method="post" class="tab-wizard wizard-circle wizard">		
                      {{ csrf_field() }}
            <div class="pd-20 card-box mb-30">
                <div class="wizard-content">	
                        <h5>Thông tin bổ sung cho hợp đồng</h5>
                        <br>

                        @foreach($hocki as $key => $cate)
                          <p>Năm hoc: {{$cate->yeard}} </p>
                         <p>Học kì: 
                            
                        
                         <?php
									$name = $cate->hocki;
									if($name == "0"){
										echo "Học kì I";
										
									}else if($name == "1"){
										echo "Học kì II";
									}else{
                                        echo "Kỳ hè";
                                    }
								?></p>        
                         <p>ngày bắt đầu: {{$cate->date_start}} </p>
                         <p>Ngày kết thúc: {{$cate->date_end}} </p> 
                         <input value = "{{$cate->id_hocki}}" required name="idnamhc" type="hidden" class="form-control">   
                         <input value = "{{$cate->date_start}}" required name="ngaydky" type="hidden" class="form-control">
                         <input value = "{{$cate->date_end}}" required name="ngayketthuc" type="hidden" class="form-control">  
                        @endforeach	
                        <section>
                         
  
                       
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Chọn số giường mà bạn mong muốn:</label>
                                        <select name="sogiong" class="custom-select form-control">
                                            
                                            @foreach($allphong2 as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->sogiuong}}</option>
                                         
                                        @endforeach				
                                        </select>
                                    </div>
                                </div>
                              
                            </div>
                        </section>
                        <!-- Step 2 -->
                       
                        <button type="button" data-toggle="modal" 
                                data-target="#success-modal"
                             class="btn btn-primary">Đăng ký</button>
                </div>
            </div>


                <!-- success Popup html Start -->
                        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center font-18">
                            <h3 class="mb-20">Đăng ký thành công!</h3>
                            <div class="mb-30 text-center"><img src="{{asset('public/backend/vendors/images/success.png')}}"></div>
                             Hồ sơ của bạn đã gửi đến ban quản lý ký túc xá
                        </div>
                        <div class="modal-footer justify-content-center">
                        @foreach($allphong as $key => $cate)
                                                   <?php
													$id = Session::get('mauser');
													?>
                        <input name="idphong" value="{{$cate->id_phong}}" type="hidden" class="form-control">
						<input name="idkhu" value="{{$cate->idkhu}}" type="hidden" class="form-control">
                        <input name="iduser" value="{{$id}}" type="hidden" class="form-control">
                        <input name="magiotinh" value="{{$cate->gioitinh}}" type="hidden" class="form-control">		
                        <button 
                             type="submit" class="btn btn-primary">Xác nhận</button>
                       @endforeach       
                        </div>
                    </div>
                </div>
            </div>
            <!-- success Popup html End -->

            </form>


        </div>
        
    </div>
</div>
<?php  
   }
 ?>
@endsection