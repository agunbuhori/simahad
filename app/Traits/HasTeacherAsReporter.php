<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait HasTeacherAsReporter
{
    protected static function bootHasTeacherAsReporter()
    {
        static::creating(function ($model) {
            if (Auth::user()->teacher) {
                $model->teacher_id = Auth::user()->teacher->id;
            }
        });
    }
}
