<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'code', 'status', 'shipper', 'tel'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
