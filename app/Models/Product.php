<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'brand_id',
        'price',
        'image',
        'description',
        'status',
        'featured',
        'recommended',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}