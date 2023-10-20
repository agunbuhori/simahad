<?php

namespace App\Models;

use App\Traits\HasAddress;
use App\Traits\HasBoardingSchool;
use App\Traits\HasFilteredBoardingSchool;
use App\Traits\HasGender;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory, HasUuid, HasAddress, HasBoardingSchool, HasFilteredBoardingSchool;

    protected $guarded = [];

    /**
     * Belongs to User
     * 
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
