<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentBill extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    /**
     * Belongs to student
     * 
     * @return Belongsto
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
