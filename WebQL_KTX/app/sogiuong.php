<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sogiuong extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'id','sogiuong','type'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_sogiuong';
 	
 	
}
