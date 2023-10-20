<?php

namespace App\Models;

use App\Traits\HasBoardingSchool;
use App\Traits\HasFilteredBoardingSchool;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cohort extends Model
{
    use HasFactory, HasUuid, HasBoardingSchool, HasFilteredBoardingSchool;

    protected $guarded = [];

    /**
     * Has many students
     * 
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
