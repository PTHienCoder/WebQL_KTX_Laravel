<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'id','name', 'email','ngaysinh','gioitinh','cmnd', 'masv','khoahoc','quequan','phone','image','nghenghiep','truong','chuyennganh','mauser'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_student';
 	
 	
}
