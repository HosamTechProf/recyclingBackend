<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'type', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
