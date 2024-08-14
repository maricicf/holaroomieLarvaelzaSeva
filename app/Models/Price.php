<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model {

    use HasFactory;

    protected $fillable = [
        'price',
        'property_id',
        'price_category_id',
    ];

    public function property() {
        return $this->belongsTo(Property::class);
    }

    public function category() {
        return $this->belongsTo(PriceCategory::class, 'price_category_id');
    }

}
