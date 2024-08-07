<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Property extends Model
{
    use HasFactory;

    // Define the polymorphic relationship
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function area() : BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function apartment() : BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function rooms() : HasMany{
        return $this->hasMany(Property::class);
    }

    public function hotspots() : HasMany
    {
        return $this->hasMany(Hotspot::class);
    }

    public function specifications() : HasMany
    {
        return $this->hasMany(Specification::class);
    }

    public function reservations() : HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function prices() : HasMany
    {
        return $this->hasMany(Price::class);
    }
}
