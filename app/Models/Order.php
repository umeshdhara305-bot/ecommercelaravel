<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'shipping_address',
        'phone',
        'notes',
    ];

    // Order belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One Order has many Order Items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}