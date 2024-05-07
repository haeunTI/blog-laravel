<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(TipeBlog::class,'blog_cat_id', 'id');
    }

    public function writer() {
        return $this->belongsTo(User::class,'id_user', 'id');
    }
}
