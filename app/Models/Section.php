<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model {
    use HasFactory;

    protected $fillable = [
        'DB_GRADE_id',
        'DB_USER_id',

        'section',
    ];
}