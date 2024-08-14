<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specification extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'specification_category_id',
    ];

    public function properties(): BelongsToMany {
        return $this->belongsToMany(Property::class, 'property_specification');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(SpecificationCategory::class,
            'specification_category_id');
    }

}
