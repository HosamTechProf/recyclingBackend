<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function consumerAds()
    {
        return $this->hasMany(ConsumerAds::class);
    }

    public function sellerAds()
    {
        return $this->hasMany(SellerAds::class);
    }

    public function consumerAdsRef()
    {
        return $this->belongsToMany(ConsumerAds::class, 'consumer_refs',  'seller_id', 'ad_id')->withPivot('user_id');
    }

    public function sellerAdsRef()
    {
        return $this->belongsToMany(SellerAds::class, 'seller_refs',  'seller_id', 'ad_id')->withPivot('user_id');
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

}
