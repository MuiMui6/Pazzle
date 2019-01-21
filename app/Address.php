<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'addresses';

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
