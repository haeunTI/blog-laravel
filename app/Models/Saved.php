<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function property() {
        return $this->belongsTo(Item::class, 'id_item', 'id');
    }
}
