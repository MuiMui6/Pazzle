<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemComment extends Model
{
    //
    protected $table = 'item_comments';

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
