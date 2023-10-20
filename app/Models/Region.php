<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $primaryKey = 'code';

    public function getTitleAttribute()
    {
        return $this->code . ' - ' . $this->name;
    }

    public function getFullNameAttribute()
    {
    }
}
