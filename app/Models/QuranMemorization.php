<?php

namespace App\Models;

use App\Traits\HasTeacherAsReporter;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranMemorization extends Model
{
    use HasFactory, HasUuid, HasTeacherAsReporter;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
