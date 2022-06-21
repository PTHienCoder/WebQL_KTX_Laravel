  @extends('admin_layout')
@section('content')

  <section class="panel">
            <header class="panel-heading">
               Thêm Cán bộ quản lý ký túc xá
            </header>
              <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" sty>'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
            <div class="panel-body">
            <form action="{{URL::to('/save-canboktx')}}" method="post" enctype="multipart/form-data" class="form-horizontal bucket-form">
                  {{ csrf_field() }}
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Email Đăng nhập</label>
                        <div class="col-sm-6">
                            <input required name="email" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input required name="pass" type="text" class="form-control">
                            <span class="help-block">
                                Mật khẩu để đăng nhập vào hệ thống quản lý.
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Hình ảnh cán bộ</label>
                        <div class="col-sm-6">
                            <input required name="image" type="file" class="form-control round-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Họ và Tên</label>
                        <div class="col-sm-6">
                            <input required name="ten" type="text" class="form-control round-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Số điện thoại</label>
                        <div class="col-sm-6">
                            <input required name="phone" class="form-control" id="focusedInput" type="number" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-6">
                            <input required name="ngaysinh" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ thường trú</label>
                        <div class="col-sm-6">
                            <input required name="diachi" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Giới tinh</label>
                         <div class="col-sm-6">
                              <select name="gioitinh" name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Nam </option>
                                  <option value="1">Nữ</option>           
                               </select>
                        </div>
                        </div>
                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Phân khu Quản lý KTX</label>
                         <div class="col-sm-6">
                              <select name="khu" class="form-control input-sm m-bot15">
                                        @foreach($all_khu as $key => $cate)
                                            <option value="{{$cate->id_khu}}">{{$cate->tenkhu}}</option>
                                        @endforeach          
                               </select>
                        </div>
                           
                        </div>
                        <button type="submit" name="add_khu" class="btn btn-info">Thêm cán bộ quản lý Ký túc xá</button>
                </form>
            </div>
        </section>
      
@endsection