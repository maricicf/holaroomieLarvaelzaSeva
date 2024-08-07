<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;


    public function areas() : HasMany
    {
        return $this->hasMany(Area::class);
    }

    public function properties() : HasMany
    {
        return $this->hasMany(Property::class);
    }
}
