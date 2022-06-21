@extends('admin_layout')
@section('content')


  <section class="panel">
            <header class="panel-heading">
                Tạo học kì mới
            </header>
            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
            <div class="panel-body">
                    <form action="{{URL::to('/save-hockimoi')}}" method="post" class="form-horizontal bucket-form" method="get">
                    {{ csrf_field() }}
                    
                       <div class="form-group">
                            <label  class="col-sm-3 control-label">Năm Học:</label>
                            <div class="col-sm-6">
                                <input required name="namhoc" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                         <label class="col-sm-3 control-label" for="exampleInputPassword1">Hoc Kì: </label>
                         <div class="col-sm-6">
                              <select name="hocki" name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Học kì I </option>
                                            <option value="1">Học Kì II</option>
                                            <option value="3">Kỳ hè</option>
                               </select>
                          
                        </div>
                        </div>
 
                  
                        <div class="form-group">
                        <label  class="col-sm-3 control-label">Ngày bắt đầu </label>
                        <div class="col-sm-6">
                            <input required  onchange="getObject(this);"  name="date1" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Ngày kết thúc</label>
                        <div class="col-sm-6">
                            <input required name="date2" id="date2" type="date" class="form-control">
                        </div>
                    </div>
                     
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">Ngày bắt đầu Đăng ký</label>
                            <div class="col-sm-6">
                                <input required onchange="getObject2(this);"  name="date3" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">Ngày kết thúc đăng ký</label>
                            <div class="col-sm-6">
                                <input required  name="date4"  id="date4" type="date" class="form-control">
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


        <script>

            function getObject(object)
            {
                document.getElementById("date2").setAttribute("min", object.value);
            console.log(object.value); // result 2019-01-03
            }

            function getObject2(object)
            {
                document.getElementById("date4").setAttribute("min", object.value);
            console.log(object.value); // result 2019-01-03
            }


      </script>
@endsection