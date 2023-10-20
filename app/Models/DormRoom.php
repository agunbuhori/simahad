<?php

namespace App\Models;

use App\Traits\HasBoardingSchool;
use App\Traits\HasFilteredBoardingSchool;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DormRoom extends Model
{
    use HasFactory, HasUuid, HasBoardingSchool, HasFilteredBoardingSchool;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
