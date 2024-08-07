<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Specification extends Model
{
    use HasFactory;

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(SpecificationCategory::class);
    }
}
