<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotspot extends Model {

    use HasFactory;

    public function properties(): BelongsToMany {
        return $this->BelongsToMany(Property::class, 'property_hotspot');
    }

}
