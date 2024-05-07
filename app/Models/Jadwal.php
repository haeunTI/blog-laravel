<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User() {
        return $this->belongsTo(User::class,"id_user", "id");
    }

    public function Item() {
        return $this->belongsTo(Item::class,"id_property", "id");
    }

    public function Agent() {
        return $this->belongsTo(User::class,"id_agent", "id");
    }
}
