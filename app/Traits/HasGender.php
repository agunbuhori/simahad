<?php

namespace App\Traits;

use App\Models\Region;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasGender
{
    /**
     * Belongs to address
     * 
     * return BelongsTo
     */
    public function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 'M' ? "Ikhwan" : "Akhwat"
        );
    }
}
