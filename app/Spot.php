<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    //
    protected $table = 'spots';

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
