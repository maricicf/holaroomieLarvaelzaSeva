<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model {

    use HasFactory;

    protected $fillable = [
        'number',
        'street',
        'door',
        'floor',
        'zip_code',
        
    ];

    public function property(): BelongsTo {
        return $this->belongsTo(Property::class);
    }

}
