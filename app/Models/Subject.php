<?php

namespace App\Models;

use App\Traits\HasBoardingSchool;
use App\Traits\HasFilteredBoardingSchool;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory, HasUuid, HasBoardingSchool, HasFilteredBoardingSchool;

    protected $guarded = [];

    /**
     * Has many subject goals
     * 
     * @return HasMany
     */
    public function subjectGoals(): HasMany
    {
        return $this->hasMany(SubjectGoal::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
