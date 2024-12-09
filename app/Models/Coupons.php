<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_user');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'coupon_company');
    }
}
