@extends('BanQly_Layout')
@section('content')

<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
               Cập nhật thông tin
         </div>
              <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" sty>'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
          <div class="pd-20 card-box mb-30">
					<div class="wizard-content">
            <form action="{{URL::to('/save-update-canboktx')}}" method="post" enctype="multipart/form-data" class="form-horizontal bucket-form">
                  {{ csrf_field() }}
                  @foreach($allphong2 as $key => $cate)
                  <div class="row">
                   <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Email Đăng nhập</label>
                        <div class="col-sm-12">
                            <input required name="email"value="{{$cate->user_name}}" type="text" class="form-control">
                        </div>
                     </div>
                      <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Password</label>
                        <div class="col-sm-12">
                            <input required name="pass" value="{{$cate->pass}}" type="text" class="form-control">
                            <span class="help-block">
                                Mật khẩu để đăng nhập vào hệ thống quản lý.
                            </span>
                        </div>
                    </div>

                  </div>


                     <div class="row">

                     <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Hình ảnh cán bộ</label>
                        <div class="col-sm-12">
                            <input name="image" value="{{$cate->image}}"  type="file" class="form-control round-input">
                            <input name="image2" value="{{$cate->image}}"  type="hidden" class="form-control round-input">
                            <img src="{{asset('/public/upload/'.$cate->image)}}"  width="150" alt="" >
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Họ và Tên</label>
                        <div class="col-sm-12">
                            <input required name="ten" value="{{$cate->name}}" type="text" class="form-control round-input">
                        </div>
                    </div>

                  
                  </div>
                  <div class="row">

 
                  <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Số điện thoại</label>
                        <div class="col-sm-12">
                            <input required name="phone" value="{{$cate->phone}}" class="form-control" id="focusedInput" type="number" >
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Ngày sinh</label>
                        <div class="col-sm-12">
                            <input required name="ngaysinh" value="{{$cate->ngaysinh}}" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                  
                  </div>
                  <div class="row">

                  <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Địa chỉ thường trú</label>
                        <div class="col-sm-12">
                            <input required name="diachi" value="{{$cate->quequan}}" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                        <div class="form-group col-sm-6">
                         <label  class="col-sm-12 control-label" for="exampleInputPassword1">Giới tinh</label>
                         <div class="col-sm-12">
                              <select name="gioitinh" name="brand_product_status" class="form-control input-sm m-bot15">                                 
                                           @if($cate->gioitinh=="0")
                                           <option selected value="0">Nam </option>
                                           <option value="1">Nữ</option>  
                                            @else
                                            <option value="0">Nam </option>
                                           <option selected value="1">Nữ</option>  
                                            @endif       
                               </select>
                        </div>
                        </div>
                  
                  </div>
                   <div class="row">

                  <div class="form-group col-sm-6">
                        <label class="col-sm-12 control-label">Địa chỉ thường trú</label>
                        <div class="col-sm-12">
                            <input required name="diachi" value="{{$cate->quequan}}" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    @endforeach    
                        <div class="form-group col-sm-6">
                         <label  class="col-sm-12 control-label" for="exampleInputPassword1">Phân khu Quản lý KTX</label>
                         <div class="col-sm-12">
                              <select name="khu" class="form-control input-sm m-bot15">
                                        @foreach($all_khu as $key => $cater)
                                        @if($cate->idkhu==$cater->id_khu)
                                           <option selected value="{{$cater->id_khu}}">{{$cater->tenkhu}}</option>
                                            @else
                                            <option value="{{$cater->id_khu}}">{{$cater->tenkhu}}</option>
                                            @endif
                                           
                                        @endforeach          
                               </select>
                        </div>
                           
                        </div>

                  
                  </div>

                      
                      
                        <button type="submit" name="add_khu" class="btn btn-info">Cập nhật</button>
                </form>
            </div>
            </div>
      </div>
  </div>
@endsection