<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data1 extends Model
{
    //

    protected $fillable = [
        'name',
        'country',
        'district',
        'address',
        'image'

    ];
}
