<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAds extends Model
{
    protected $fillable = [
        'name', 'price', 'desc', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'seller_refs');
    }

}
