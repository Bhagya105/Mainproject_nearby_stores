<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userreg extends Model
{
    protected $table='tbl_reg';
    protected $fillable=['id','name'];
}
