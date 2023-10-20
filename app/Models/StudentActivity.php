<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentActivity extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    protected $casts = [
        'documentation' => 'json'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
