<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id', 'code', 'discount_type', 'discount_value'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_coupon');
    }

}
