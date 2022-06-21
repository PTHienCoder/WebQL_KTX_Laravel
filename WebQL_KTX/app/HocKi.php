<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKi extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'id_hocki','yeard','hocki','date_start','date_end','trangthai'
    ];
    protected $primaryKey = 'id_hocki';
 	protected $table = 'tbl_hocki';
 	
 	
}
