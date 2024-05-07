<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Blog() {
        return $this->belongsTo(blogPost::class, "id_post", "id");
    }

    public function  User() {
        return $this->belongsTo(User::class, "id_user", "id");

    }
}
