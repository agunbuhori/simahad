<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public function class_room(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function dorm_room(): BelongsTo
    {
        return $this->belongsTo(DormRoom::class);
    }

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function student_activities(): HasMany
    {
        return $this->hasMany(StudentActivity::class);
    }

    public function quran_memorizations(): HasMany
    {
        return $this->hasMany(QuranMemorization::class);
    }


    public function getGenderCategoryAttribute()
    {
        return $this->gender === 'M' ? 'Ikhwan' : 'Akhwat';
    }
}
