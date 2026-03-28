<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'message', 'user_id', 'blog_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    
}
