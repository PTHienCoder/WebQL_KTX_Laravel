@extends('admin_layout')
@section('content')

  <section class="panel">
            <header class="panel-heading">
            Chỉnh Sửa Phòng KTX
            </header>
            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
            <div class="panel-body">
            @foreach($all_phong as $key => $cate)
                <form action="{{URL::to('/save-edit-phongktx')}}" method="post" class="form-horizontal bucket-form" method="get">
                {{ csrf_field() }}
                
                <input name="idphog" value="{{$cate->id_phong}}"  type="hidden" class="form-control">
                   <div class="form-group">
                        <label class="col-sm-3 control-label">Tên Phòng</label>
                        <div class="col-sm-6">
                            <input name="tenphong" value="{{$cate->sophong}}"  type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giá Phòng / 1 học kỳ</label>
                        <div class="col-sm-6">
                            <input name="giaphong" value="{{$cate->giaphong}}" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Khu</label>
                         <div class="col-sm-6">
                              <select name="khu" name="brand_product_status" class="form-control input-sm m-bot15">
            
                                         @foreach($all_khu as $key => $cate1)
                                            @if($cate1->id_khu==$cate->idkhu)
                                             <option selected value="{{$cate1->id_khu}}">{{$cate1->tenkhu}}</option>
                                          
                                             @else
                                             <option value="{{$cate1->id_khu}}">{{$cate1->tenkhu}}</option>
                                             @endif
                                   
                                            
                                        @endforeach   
                               </select>
                        </div>
                        </div>

                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Tầng</label>
                         <div class="col-sm-6">
                              <select name="tang" class="form-control input-sm m-bot15">
                                            <option value="1">tầng 1</option>
                                            <option value="2">tầng 2</option>
                                            <option value="3">tầng 3</option>
                                            <option value="4">tầng 4</option>
                                            <option value="5">tầng 5</option>         
                               </select>
                        </div>
                        </div>
                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Loại Phòng</label>
                         <div class="col-sm-6">
                              <select name=" loaiphong" class="form-control input-sm m-bot15">
                                            <option value="0">Thường</option>
                                            <option value="1">VIP</option>
                                                   
                               </select>
                        </div>
                        </div>
                       
    
                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Số lượng người ở tối đa</label>
                         <div class="col-sm-6">
                              <select name="maxpeople" name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="8"> 8</option>
                                            <option value="6"> 6</option>
                                            <option value="4"> 4</option>
                                            <option value="2"> 2</option>        
                               </select>
                        </div>
                        </div>
                     
                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Giới tính</label>
                         <div class="col-sm-6">
                              <select name="gioitinh" name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                               </select>
                               <input name="trangthai" type="hidden" value="new" class="form-control">
                               <input name="minpeople" type="hidden" class="form-control">
                        </div>
                        </div>
                    <button type="submit" name="add_khu" class="btn btn-info">Chỉnh sửa</button>
                </form>
                @endforeach
            </div>
        </section>   
@endsection