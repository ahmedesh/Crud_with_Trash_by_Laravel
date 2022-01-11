<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];  // soft deleted

    protected $fillable = [   //
        'name','price', 'detail',
    ];

}
