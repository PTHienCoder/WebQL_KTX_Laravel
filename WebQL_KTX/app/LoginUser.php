<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginUser extends Model
{
    public $timestamps = false;
    protected $fillable = [
          '	id',  'user_name', 'pass','auth','mauser'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_user';
 	
 	
}
