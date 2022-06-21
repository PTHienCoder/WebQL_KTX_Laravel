<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDangky extends Model
{
    public $timestamps = false;
    protected $fillable = [
          '	id_phieu','idphong', 'idstudent','idkhu','sogiuong','ngaydky', 'ngayketthuc','idnamhoc','trangthai','time_loading','idchuyen_phong','Lydo'
    ];
    protected $primaryKey = 'id_phieu';
 	protected $table = 'tbl_phieudangky';
 	
 	
}
