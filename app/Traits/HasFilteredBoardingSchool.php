<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait HasFilteredBoardingSchool
{
    public function newQuery()
    {
        return parent::newQuery()
            ->when(
                Auth::user()?->boarding_school_id,
                fn ($query) => $query->where('boarding_school_id', Auth::user()->boarding_school_id)
            );
    }
}
