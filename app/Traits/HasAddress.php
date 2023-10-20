<?php

namespace App\Traits;

use App\Models\Region;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAddress
{
    /**
     * Belongs to address
     * 
     * return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'code');
    }
}
