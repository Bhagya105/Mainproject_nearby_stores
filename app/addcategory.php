<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addcategory extends Model
{
    protected $table="tbl_addcategory";
    protected $fillable=[
        'category_id','category_name','category_des','status',
    ];
}
