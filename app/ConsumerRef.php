<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumerRef extends Model
{
    protected $fillable = [
        'user_id', 'ad_id', 'type'
    ];
}
