<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $fillable = [
        'info_name_last',
        'info_name_first',
        'info_name_suffix',
        'info_name_middle',
        'info_lrn',
        'info_sex',
        'info_birthdate',

        'DB_YEAR_ID_g7',
        'DB_YEAR_ID_g8',
        'DB_YEAR_ID_g9',
        'DB_YEAR_ID_g10',
    ];
}