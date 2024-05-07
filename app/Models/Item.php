<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type() {
        return $this->belongsTo(Property::class, "id_property_type", "id");
    }

    public function agent() {
        return $this->belongsTo(User::class, "id_agent", "id");
    }

    public function amenity() {
        return $this->belongsTo(Amenities::class, "id_amenity", "id");
    }
}
