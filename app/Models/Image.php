<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model {

    use HasFactory;

    protected $fillable = [
        'path',
        'name',
        'imageable_id',
        'imageable_type',
        'image_type_id',
    ];

    // Define the inverse polymorphic relationship
    public function imageable() {
        return $this->morphTo();
    }

    public function imageType(): BelongsTo {
        return $this->belongsTo(ImageType::class);
    }

}
