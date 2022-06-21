<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongke extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'id','id_sv', 'gioitinh','idphong','id_phieu','time'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_thongke';
 	
 	
}
