<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'tel', 'email', 'address', 'total_sales', 'tax_total', 'shipping_total', 'net_total', 'payment_type', 'created_at', 'paid_at', 'completed_at', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'order_coupon');
    }

    public function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }

    public function shippings()
    {
        return $this->hasMany(OrderShipping::class);
    }
}
