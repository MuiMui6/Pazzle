<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peas extends Model
{
    //
    protected $table = 'peases';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
