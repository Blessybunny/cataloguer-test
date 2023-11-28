<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run () : void {
        // Phineas And Ferb
        Student::create([
            // ALL -> Learner's information
            'li_name_last' => 'Flynn',
            'li_name_first' => 'Phineas',
            'li_name_middle' => 'F',
            'li_sex' => 'Male',
            'li_birthdate' => '2008-11-11',

            // ALL -> Scholastic record -> general
            // ALL -> Scholastic record -> subject -> filipino
            'ALL_g7_subject_fil_qr1' => 80,
            'ALL_g7_subject_fil_qr2' => 85,
            'ALL_g7_subject_fil_qr3' => 90,
            'ALL_g7_subject_fil_qr4' => 100,

            // ALL -> Scholastic record -> subject -> english
            'ALL_g7_subject_eng_qr1' => 80,
            'ALL_g7_subject_eng_qr2' => 85,
            'ALL_g7_subject_eng_qr3' => 90,
            'ALL_g7_subject_eng_qr4' => 100,

            // ALL -> Scholastic record -> subject -> mathematics
            'ALL_g7_subject_mat_qr1' => 80,
            'ALL_g7_subject_mat_qr2' => 85,
            'ALL_g7_subject_mat_qr3' => 90,
            'ALL_g7_subject_mat_qr4' => 100,

            // ALL -> Scholastic record -> subject -> science
            'ALL_g7_subject_sci_qr1' => 80,
            'ALL_g7_subject_sci_qr2' => 85,
            'ALL_g7_subject_sci_qr3' => 90,
            'ALL_g7_subject_sci_qr4' => 100,

            // ALL -> Scholastic record -> subject -> araling panlipunan (ap)
            'ALL_g7_subject_ap_qr1' => 80,
            'ALL_g7_subject_ap_qr2' => 85,
            'ALL_g7_subject_ap_qr3' => 90,
            'ALL_g7_subject_ap_qr4' => 100,

            // ALL -> Scholastic record -> subject -> edukasyon sa pagpapakatao (ep)
            'ALL_g7_subject_ep_qr1' => 80,
            'ALL_g7_subject_ep_qr2' => 85,
            'ALL_g7_subject_ep_qr3' => 90,
            'ALL_g7_subject_ep_qr4' => 100,

            // ALL -> Scholastic record -> subject -> technology and livelihood education (tle)
            'ALL_g7_subject_tle_qr1' => 80,
            'ALL_g7_subject_tle_qr2' => 85,
            'ALL_g7_subject_tle_qr3' => 90,
            'ALL_g7_subject_tle_qr4' => 100,

            // ALL -> Scholastic record -> subject -> music
            'ALL_g7_subject_mus_qr1' => 80,
            'ALL_g7_subject_mus_qr2' => 85,
            'ALL_g7_subject_mus_qr3' => 90,
            'ALL_g7_subject_mus_qr4' => 100,

            // ALL -> Scholastic record -> subject -> arts
            'ALL_g7_subject_art_qr1' => 80,
            'ALL_g7_subject_art_qr2' => 85,
            'ALL_g7_subject_art_qr3' => 90,
            'ALL_g7_subject_art_qr4' => 100,

            // ALL -> Scholastic record -> subject -> physical education
            'ALL_g7_subject_pe_qr1' => 80,
            'ALL_g7_subject_pe_qr2' => 85,
            'ALL_g7_subject_pe_qr3' => 90,
            'ALL_g7_subject_pe_qr4' => 100,

            // ALL -> Scholastic record -> subject -> health
            'ALL_g7_subject_hp_qr1' => 80,
            'ALL_g7_subject_hp_qr2' => 85,
            'ALL_g7_subject_hp_qr3' => 90,
            'ALL_g7_subject_hp_qr4' => 100,

            // SF9 -> attendance -> days present
            'SF9_g7_attendance_p_jan' => 10,
            'SF9_g7_attendance_p_feb' => 10,
            'SF9_g7_attendance_p_mar' => 10,
            'SF9_g7_attendance_p_apr' => 10,
            'SF9_g7_attendance_p_may' => 10,
            'SF9_g7_attendance_p_jun' => 10,
            'SF9_g7_attendance_p_jul' => 10,
            'SF9_g7_attendance_p_aug' => 10,
            'SF9_g7_attendance_p_sep' => 10,
            'SF9_g7_attendance_p_oct' => 10,
            'SF9_g7_attendance_p_nov' => 10,
            'SF9_g7_attendance_p_dec' => 10,

            // SF9 -> attendance -> days absent
            'SF9_g7_attendance_a_jan' => 2,
            'SF9_g7_attendance_a_feb' => 2,
            'SF9_g7_attendance_a_mar' => 2,
            'SF9_g7_attendance_a_apr' => 2,
            'SF9_g7_attendance_a_may' => 2,
            'SF9_g7_attendance_a_jun' => 2,
            'SF9_g7_attendance_a_jul' => 2,
            'SF9_g7_attendance_a_aug' => 2,
            'SF9_g7_attendance_a_sep' => 2,
            'SF9_g7_attendance_a_oct' => 2,
            'SF9_g7_attendance_a_nov' => 2,
            'SF9_g7_attendance_a_dec' => 2,

            // SF9 -> observed values -> maka - diyos
            'SF9_g7_values_md_r1_qr1' => 'AO',
            'SF9_g7_values_md_r1_qr2' => 'AO',
            'SF9_g7_values_md_r1_qr3' => 'AO',
            'SF9_g7_values_md_r1_qr4' => 'AO',
            'SF9_g7_values_md_r2_qr1' => 'AO',
            'SF9_g7_values_md_r2_qr2' => 'AO',
            'SF9_g7_values_md_r2_qr3' => 'AO',
            'SF9_g7_values_md_r2_qr4' => 'AO',

            // SF9 -> observed values -> maka - tao
            'SF9_g7_values_mt_r1_qr1' => 'AO',
            'SF9_g7_values_mt_r1_qr2' => 'AO',
            'SF9_g7_values_mt_r1_qr3' => 'AO',
            'SF9_g7_values_mt_r1_qr4' => 'AO',
            'SF9_g7_values_mt_r2_qr1' => 'AO',
            'SF9_g7_values_mt_r2_qr2' => 'AO',
            'SF9_g7_values_mt_r2_qr3' => 'AO',
            'SF9_g7_values_mt_r2_qr4' => 'AO',

            // SF9 -> observed values -> maka - kalikasan
            'SF9_g7_values_mk_qr1' => 'AO',
            'SF9_g7_values_mk_qr2' => 'AO',
            'SF9_g7_values_mk_qr3' => 'AO',
            'SF9_g7_values_mk_qr4' => 'AO',

            // SF9 -> observed values -> maka - bansa
            'SF9_g7_values_mb_r1_qr1' => 'AO',
            'SF9_g7_values_mb_r1_qr2' => 'AO',
            'SF9_g7_values_mb_r1_qr3' => 'AO',
            'SF9_g7_values_mb_r1_qr4' => 'AO',
            'SF9_g7_values_mb_r2_qr1' => 'AO',
            'SF9_g7_values_mb_r2_qr2' => 'AO',
            'SF9_g7_values_mb_r2_qr3' => 'AO',
            'SF9_g7_values_mb_r2_qr4' => 'AO',
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

        // Star Vs. The Forces Of Evil
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

        // Gravity Falls
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

        // Regular Show
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

        // Infinity Train
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

        // The Amazing World Of Gumball
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
