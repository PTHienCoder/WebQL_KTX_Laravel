@extends('admin_layout')
@section('content')

  <section class="panel">
            <header class="panel-heading">
                Tạo thông báo mới
            </header>
            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
            <div class="panel-body">
                <form action="{{URL::to('/save-thongbao')}}" method="post" class="form-horizontal bucket-form" method="get">
                {{ csrf_field() }}
                
                   <div class="form-group">
                        <label  class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-6">
                            <input required name="title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mô tả</label>
                        <div class="col-sm-6">
                        <textarea required style="resize: none" rows="8" class="form-control" name="mota" id="ckeditor" ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-3 control-label" for="exampleInputPassword1">Loại thông báo</label>
                         <div class="col-sm-6">
                              <select name="loaitb" name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">TB thường ngày</option>
                                            <option value="5">TB Khẩn</option>
                               </select>
                          
                        </div>
                        </div>
                     
                      <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Khu(Nếu là thông báo đến khu)</label>
                         <div class="col-sm-6">
                              <select name="khu" name="brand_product_status" class="form-control input-sm m-bot15">
                                       <option value="all">TB chung</option>
                                         @foreach($all_khu as $key => $cate)
                                        
                                            <option value="{{$cate->id_khu}}">{{$cate->tenkhu}}</option>
                                        @endforeach   
                               </select>
                        </div>
                        </div>
                        <div class="form-group">
                         <label  class="col-sm-3 control-label" for="exampleInputPassword1">Hình ảnh minh họa ( nếu cần )</label>
                         <div class="col-sm-6">
                         <input  name="image" type="file" class="form-control-file form-control height-auto">
                        </div>

                        </div>
                       
                        <div class="form-group">
                        <label  class="col-sm-3 control-label" for="exampleInputPassword1"></label>
                         <div class="col-sm-6">
                         <button type="submit" name="add_khu" class="btn btn-info">Khởi tạo</button>
                        </div>
                        </div>
    
                     
                     

                   
                </form>
            </div>
        </section>   
@endsection