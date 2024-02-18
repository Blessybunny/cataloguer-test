<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'DB_ROLE_id',
        'DB_GRADE_id',
        'DB_SECTION_id',

        'email',
        'password',

        'name_last',
        'name_first',
    ];
}