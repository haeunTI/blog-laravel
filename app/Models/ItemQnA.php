<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemQnA extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user() {
        return  $this->belongsTo(User::class, "id_user", "id");
    }

    public function agent() {
        return  $this->belongsTo(User::class, "id_agent", "id");
    }

    public function item() {
        return  $this->belongsTo(Item::class, "id_item", "id");
    }
}
