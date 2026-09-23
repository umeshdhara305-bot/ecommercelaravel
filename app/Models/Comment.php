<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'website',
        'message',
        'approved',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}