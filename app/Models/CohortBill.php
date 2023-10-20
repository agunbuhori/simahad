<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CohortBill extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

    public function student_bills()
    {
        return $this->hasMany(StudentBill::class);
    }
}
