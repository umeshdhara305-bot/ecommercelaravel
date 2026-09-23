<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'price',
        'quantity',
        'subtotal',
    ];

    // Order Item belongs to one Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Order Item belongs to one Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}