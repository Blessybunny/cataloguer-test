<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model {
    use HasFactory;

    protected $fillable = [
        'DB_USER_id',

        'PRESERVE_DB_USER_name_last',
        'PRESERVE_DB_USER_name_first',

        'year',
        'full',

        'attendance_jan_t',
        'attendance_feb_t',
        'attendance_mar_t',
        'attendance_apr_t',
        'attendance_may_t',
        'attendance_jun_t',
        'attendance_jul_t',
        'attendance_aug_t',
        'attendance_sep_t',
        'attendance_oct_t',
        'attendance_nov_t',
        'attendance_dec_t',
    ];
}
