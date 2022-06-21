@extends('admin_layout')
@section('content')

  <section class="panel">
            <header class="panel-heading">
                Thêm Khu KTX
            </header>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
            <div class="panel-body">
                <form role="form"  action="{{URL::to('/save-khuktx')}}" method="post"  class="form-horizontal bucket-form">
                                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên Khu</label>
                        <div class="col-sm-6">
                            <input required name="namekhu" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input required name="daichikhu" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mô tả</label>
                        <div class="col-sm-6">
                            <input  name="motakhu" type="text" class="form-control round-input">
                        </div>
                    </div>
                    <button type="submit" name="add_khu" class="btn btn-info">Thêm Khu Ký túc xá</button>
                </form>
            </div>
        </section>   
@endsection