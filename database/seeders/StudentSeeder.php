<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
    public function run () : void {
        Student::create([
            'name_last' => 'Flynn',
            'name_first' => 'Phineas',
            'name_middle' => 'F',
        ]);
        Student::create([
            'name_last' => 'Fletcher',
            'name_first' => 'Ferb',
            'name_middle' => 'F',
        ]);
    }
}
