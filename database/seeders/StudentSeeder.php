<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
    public function run () : void {
        // 3
        Student::create([
            'li_name_last' => 'Flynn',
            'li_name_first' => 'Phineas',
            'li_name_middle' => 'F',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Fletcher',
            'li_name_first' => 'Ferb',
            'li_name_middle' => 'F',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Flynn',
            'li_name_first' => 'Candace',
            'li_name_middle' => 'F',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
        // 2
        Student::create([
            'li_name_last' => 'Diaz',
            'li_name_first' => 'Marco',
            'li_name_middle' => 'D',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Banana',
            'li_name_first' => 'Janna',
            'li_name_middle' => 'B',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
        // 2
        Student::create([
            'li_name_last' => 'Pines',
            'li_name_first' => 'Dipper',
            'li_name_middle' => 'P',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Pines',
            'li_name_first' => 'Mabel',
            'li_name_middle' => 'P',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
        // 2
        Student::create([
            'li_name_last' => 'Jay',
            'li_name_first' => 'Mordecai',
            'li_name_middle' => 'J',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Raccoon',
            'li_name_first' => 'Rigby',
            'li_name_middle' => 'R',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        // 7
        Student::create([
            'li_name_last' => 'Olsen',
            'li_name_first' => 'Tulip',
            'li_name_middle' => 'O',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Hughes',
            'li_name_first' => 'Amelia',
            'li_name_middle' => 'H',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Cosay',
            'li_name_first' => 'Jesie',
            'li_name_middle' => 'C',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Monroe',
            'li_name_first' => 'Grace',
            'li_name_middle' => 'M',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Laurent',
            'li_name_first' => 'Simon',
            'li_name_middle' => 'L',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Akagi',
            'li_name_first' => 'Ryan',
            'li_name_middle' => 'A',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Park',
            'li_name_first' => 'Min-Gi',
            'li_name_middle' => 'P',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        // 3
        Student::create([
            'li_name_last' => 'Watterson',
            'li_name_first' => 'Gumball',
            'li_name_middle' => 'W',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Watterson',
            'li_name_first' => 'Darwin',
            'li_name_middle' => 'W',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',
        ]);
        Student::create([
            'li_name_last' => 'Watterson',
            'li_name_first' => 'Anais',
            'li_name_middle' => 'W',
            'li_sex' => 'Female',
            'li_birthdate' => '2008-11-11',
        ]);
    }
}
