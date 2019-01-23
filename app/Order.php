<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    protected $dates = [
        'paydate',
        'shipdate',
        'created_at',
        'updated_at'
    ];

}
