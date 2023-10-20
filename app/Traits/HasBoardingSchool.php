<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait HasBoardingSchool
{
    /**
     * Boot the UUID trait for the model.
     */
    protected static function bootHasBoardingSchool()
    {
        static::creating(function ($model) {
            if (Auth::check() && Auth::user()->boarding_school_id) {
                $model->boarding_school_id = Auth::user()->boarding_school_id;
            }
        });
    }
}
