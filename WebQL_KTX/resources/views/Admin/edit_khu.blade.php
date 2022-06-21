@extends('admin_layout')
@section('content')

  <section class="panel">
            <header class="panel-heading">
                Chỉnh sửa khu KTX
            </header>
            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
            <div class="panel-body">
            @foreach($all_khu as $key => $cate)
                <form role="form"  action="{{URL::to('/save-edit-khuktx')}}" method="post"  class="form-horizontal bucket-form">
                                    {{ csrf_field() }}
                                    <input name="idkhuu" value="{{$cate->id_khu}}"  type="hidden" class="form-control">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên Khu</label>
                        <div class="col-sm-6">
                            <input name="namekhu" value="{{$cate->tenkhu}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-6">
                            <input name="daichikhu" value="{{$cate->diachi}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mô tả</label>
                        <div class="col-sm-6">
                            <input name="motakhu" value="{{$cate->mota}}" type="text" class="form-control round-input">
                        </div>
                    </div>
                    <button type="submit" name="add_khu" class="btn btn-info">Chỉnh sửa</button>
                </form>
                @endforeach 
            </div>
        </section>   
@endsection