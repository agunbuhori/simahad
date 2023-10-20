<?php

namespace App\Models;

use App\Traits\HasBoardingSchool;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassRoom extends Model
{
    use HasFactory, HasUuid, HasBoardingSchool;

    protected $guarded = [];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function getConcatAttribute(): string
    {
        return $this->level . ' ' . $this->name;
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
