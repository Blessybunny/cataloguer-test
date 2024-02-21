<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Year;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run () : void {
        self::grade();
        self::role();
        self::section();
        self::user();
        self::year();
        self::student_1();
    }

    // GRADE: All
    public function grade () : void {
        Grade::create(['grade' => '7',]);
        Grade::create(['grade' => '8',]);
        Grade::create(['grade' => '9',]);
        Grade::create(['grade' => '10',]);
    }

    // ROLE: All
    public function role () : void {
        Role::create(['role' => 'Principal',]);
        Role::create(['role' => 'Administrator',]);
        Role::create(['role' => 'Grade Level Coordinator',]);
        Role::create(['role' => 'Adviser',]);
        Role::create(['role' => 'Teacher',]);
    }

    // SECTION: All
    public function section () : void {
        Section::create(['DB_GRADE_id' => '1', 'section' => '7-A',]);
        Section::create(['DB_GRADE_id' => '1', 'section' => '7-B',]);
        Section::create(['DB_GRADE_id' => '1', 'section' => '7-C',]);
        Section::create(['DB_GRADE_id' => '1', 'section' => '7-D',]);
        Section::create(['DB_GRADE_id' => '1', 'section' => '7-E',]);
        Section::create(['DB_GRADE_id' => '1', 'section' => '7-F',]);
        Section::create(['DB_GRADE_id' => '1', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '1', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '1', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '1', 'section' => null,]);

        Section::create(['DB_GRADE_id' => '2', 'section' => '8-A',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-B',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-C',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-D',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-E',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-F',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-G',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => '8-H',]);
        Section::create(['DB_GRADE_id' => '2', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '2', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '2', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '2', 'section' => null,]);

        Section::create(['DB_GRADE_id' => '3', 'section' => '9-A',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-B',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-C',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-D',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-E',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-F',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-G',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => '9-H',]);
        Section::create(['DB_GRADE_id' => '3', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '3', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '3', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '3', 'section' => null,]);

        Section::create(['DB_GRADE_id' => '4', 'section' => '10-A',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-B',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-C',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-D',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-E',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-F',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-G',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => '10-H',]);
        Section::create(['DB_GRADE_id' => '4', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '4', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '4', 'section' => null,]);
        Section::create(['DB_GRADE_id' => '4', 'section' => null,]);
    }

    // USER: Principal, Adviser
    public function user () : void {
        User::create([
            'DB_ROLE_id' => 1,

            'email' => '0123456789',
            'password' => bcrypt('password'),
            'name_last' => 'Lorem',
            'name_first' => 'Ipsum Dolor',
        ]);
        User::create([
            'DB_ROLE_id' => 4,

            'email' => '0223456789',
            'password' => bcrypt('password'),
            'name_last' => 'Consectetur',
            'name_first' => 'Adipiscing Elit',
        ]);
    }

    // YEAR: 2020-2024
    public function year () : void {
        Year::create([
            'DB_USER_id' => 1,

            'year' => 2024,
            'full' => '2024-2025',

            'attendance_jan_t' => 20,
            'attendance_feb_t' => 20,
            'attendance_mar_t' => 20,
            'attendance_apr_t' => 20,
            'attendance_may_t' => 20,
            'attendance_jun_t' => 20,
            'attendance_jul_t' => 20,
            'attendance_aug_t' => 20,
            'attendance_sep_t' => 20,
            'attendance_oct_t' => 20,
            'attendance_nov_t' => 20,
            'attendance_dec_t' => 20,
        ]);
        Year::create([
            'PRESERVE_DB_USER_name_last' => 'Tano',
            'PRESERVE_DB_USER_name_first' => 'Ahsoka',

            'year' => 2023,
            'full' => '2023-2024',

            'attendance_jan_t' => 20,
            'attendance_feb_t' => 20,
            'attendance_mar_t' => 20,
            'attendance_apr_t' => 20,
            'attendance_may_t' => 20,
            'attendance_jun_t' => 20,
            'attendance_jul_t' => 20,
            'attendance_aug_t' => 20,
            'attendance_sep_t' => 20,
            'attendance_oct_t' => 20,
            'attendance_nov_t' => 20,
            'attendance_dec_t' => 20,
        ]);
        Year::create([
            'year' => 2022,
            'full' => '2022-2023',

            'attendance_jan_t' => 20,
            'attendance_feb_t' => 20,
            'attendance_mar_t' => 20,
            'attendance_apr_t' => 20,
            'attendance_may_t' => 20,
            'attendance_jun_t' => 20,
            'attendance_jul_t' => 20,
            'attendance_aug_t' => 20,
            'attendance_sep_t' => 20,
            'attendance_oct_t' => 20,
            'attendance_nov_t' => 20,
            'attendance_dec_t' => 20,
        ]);
    }

    // STUDENT: Phineas Flynn
    public function student_1 () : void {
        Student::create([
            // All: Info
            'info_name_last' => 'Flynn',
            'info_name_first' => 'Phineas',
            'info_name_middle' => 'Middle',
            'info_lrn' => '01-0001-001',
            'info_sex' => 'Male',
            'info_birthdate' => '2007/09/17',

            // SF9: Report
            'DB_SECTION_id_g7' => 1,
            'DB_YEAR_id_g7' => 1,

            // SF9: Attendance -> present
            'sf9_g7_attendance_jan_p' => 10,
            'sf9_g7_attendance_feb_p' => 10,
            'sf9_g7_attendance_mar_p' => 10,
            'sf9_g7_attendance_apr_p' => 10,
            'sf9_g7_attendance_may_p' => 10,
            'sf9_g7_attendance_jun_p' => 10,
            'sf9_g7_attendance_jul_p' => 10,
            'sf9_g7_attendance_aug_p' => 10,
            'sf9_g7_attendance_sep_p' => 10,
            'sf9_g7_attendance_oct_p' => 10,
            'sf9_g7_attendance_nov_p' => 10,
            'sf9_g7_attendance_dec_p' => 10,

            // SF9: Attendance -> absent
            'sf9_g7_attendance_jan_a' => 2,
            'sf9_g7_attendance_feb_a' => 2,
            'sf9_g7_attendance_mar_a' => 2,
            'sf9_g7_attendance_apr_a' => 2,
            'sf9_g7_attendance_may_a' => 2,
            'sf9_g7_attendance_jun_a' => 2,
            'sf9_g7_attendance_jul_a' => 2,
            'sf9_g7_attendance_aug_a' => 2,
            'sf9_g7_attendance_sep_a' => 2,
            'sf9_g7_attendance_oct_a' => 2,
            'sf9_g7_attendance_nov_a' => 2,
            'sf9_g7_attendance_dec_a' => 2,

            // SF9: Values -> maka - diyos
            'sf9_g7_values_qr1_md_s1' => 'AO',
            'sf9_g7_values_qr2_md_s1' => 'AO',
            'sf9_g7_values_qr3_md_s1' => 'AO',
            'sf9_g7_values_qr4_md_s1' => 'AO',
            'sf9_g7_values_qr1_md_s2' => 'AO',
            'sf9_g7_values_qr2_md_s2' => 'AO',
            'sf9_g7_values_qr3_md_s2' => 'AO',
            'sf9_g7_values_qr4_md_s2' => 'AO',

            // SF9: Values -> maka - tao
            'sf9_g7_values_qr1_mt_s1' => 'AO',
            'sf9_g7_values_qr2_mt_s1' => 'AO',
            'sf9_g7_values_qr3_mt_s1' => 'AO',
            'sf9_g7_values_qr4_mt_s1' => 'AO',
            'sf9_g7_values_qr1_mt_s2' => 'AO',
            'sf9_g7_values_qr2_mt_s2' => 'AO',
            'sf9_g7_values_qr3_mt_s2' => 'AO',
            'sf9_g7_values_qr4_mt_s2' => 'AO',

            // SF9: Values -> maka - kalikasan
            'sf9_g7_values_qr1_mk' => 'AO',
            'sf9_g7_values_qr2_mk' => 'AO',
            'sf9_g7_values_qr3_mk' => 'AO',
            'sf9_g7_values_qr4_mk' => 'AO',

            // SF9: Values -> maka - bansa
            'sf9_g7_values_qr1_mb_s1' => 'AO',
            'sf9_g7_values_qr2_mb_s1' => 'AO',
            'sf9_g7_values_qr3_mb_s1' => 'AO',
            'sf9_g7_values_qr4_mb_s1' => 'AO',
            'sf9_g7_values_qr1_mb_s2' => 'AO',
            'sf9_g7_values_qr2_mb_s2' => 'AO',
            'sf9_g7_values_qr3_mb_s2' => 'AO',
            'sf9_g7_values_qr4_mb_s2' => 'AO',

            // SF10: Enrollment

            // SF10: Scholastic record
            'sf10_g7_record_school_name' => 'Tri-state High School',
            'sf10_g7_record_school_id' => '01-0001-001',
            'sf10_g7_record_school_district' => 'Summer Street',
            'sf10_g7_record_school_division' => 'Tri-state Area',
            'sf10_g7_record_school_region' => 'Danville',
            'sf10_g7_record_school_grade' => '7',
            'sf10_g7_record_school_section' => 'Polymer',
            'sf10_g7_record_school_year' => '2007-2008',
            'sf10_g7_record_school_teacher' => 'Heinz Doofenshmirtz',

            // All: Subject -> filipino
            'sf9_g7_subject_qr1_fil' => 80,
            'sf9_g7_subject_qr2_fil' => 85,
            'sf9_g7_subject_qr3_fil' => 90,
            'sf9_g7_subject_qr4_fil' => 100,

            'sf10_g7_subject_qr1_fil' => 80,
            'sf10_g7_subject_qr2_fil' => 85,
            'sf10_g7_subject_qr3_fil' => 90,
            'sf10_g7_subject_qr4_fil' => 100,

            // All: Subject -> english
            'sf9_g7_subject_qr1_eng' => 80,
            'sf9_g7_subject_qr2_eng' => 85,
            'sf9_g7_subject_qr3_eng' => 90,
            'sf9_g7_subject_qr4_eng' => 100,

            'sf10_g7_subject_qr1_eng' => 80,
            'sf10_g7_subject_qr2_eng' => 85,
            'sf10_g7_subject_qr3_eng' => 90,
            'sf10_g7_subject_qr4_eng' => 100,

            // All: Subject -> mathematics
            'sf9_g7_subject_qr1_mat' => 80,
            'sf9_g7_subject_qr2_mat' => 85,
            'sf9_g7_subject_qr3_mat' => 90,
            'sf9_g7_subject_qr4_mat' => 100,

            'sf10_g7_subject_qr1_mat' => 80,
            'sf10_g7_subject_qr2_mat' => 85,
            'sf10_g7_subject_qr3_mat' => 90,
            'sf10_g7_subject_qr4_mat' => 100,

            // All: Subject -> science
            'sf9_g7_subject_qr1_sci' => 80,
            'sf9_g7_subject_qr2_sci' => 85,
            'sf9_g7_subject_qr3_sci' => 90,
            'sf9_g7_subject_qr4_sci' => 100,

            'sf10_g7_subject_qr1_sci' => 80,
            'sf10_g7_subject_qr2_sci' => 85,
            'sf10_g7_subject_qr3_sci' => 90,
            'sf10_g7_subject_qr4_sci' => 100,

            // All: Subject -> araling panlipunan (ap)
            'sf9_g7_subject_qr1_ap' => 80,
            'sf9_g7_subject_qr2_ap' => 85,
            'sf9_g7_subject_qr3_ap' => 90,
            'sf9_g7_subject_qr4_ap' => 100,

            'sf10_g7_subject_qr1_ap' => 80,
            'sf10_g7_subject_qr2_ap' => 85,
            'sf10_g7_subject_qr3_ap' => 90,
            'sf10_g7_subject_qr4_ap' => 100,

            // All: Subject -> edukasyon sa pagpapakatao (ep)
            'sf9_g7_subject_qr1_ep' => 80,
            'sf9_g7_subject_qr2_ep' => 85,
            'sf9_g7_subject_qr3_ep' => 90,
            'sf9_g7_subject_qr4_ep' => 100,

            'sf10_g7_subject_qr1_ep' => 80,
            'sf10_g7_subject_qr2_ep' => 85,
            'sf10_g7_subject_qr3_ep' => 90,
            'sf10_g7_subject_qr4_ep' => 100,

            // All: Subject -> technology and livelihood education (tle)
            'sf9_g7_subject_qr1_tle' => 80,
            'sf9_g7_subject_qr2_tle' => 85,
            'sf9_g7_subject_qr3_tle' => 90,
            'sf9_g7_subject_qr4_tle' => 100,

            'sf10_g7_subject_qr1_tle' => 80,
            'sf10_g7_subject_qr2_tle' => 85,
            'sf10_g7_subject_qr3_tle' => 90,
            'sf10_g7_subject_qr4_tle' => 100,

            // All: Subject -> music
            'sf9_g7_subject_qr1_mus' => 80,
            'sf9_g7_subject_qr2_mus' => 85,
            'sf9_g7_subject_qr3_mus' => 90,
            'sf9_g7_subject_qr4_mus' => 100,

            'sf10_g7_subject_qr1_mus' => 80,
            'sf10_g7_subject_qr2_mus' => 85,
            'sf10_g7_subject_qr3_mus' => 90,
            'sf10_g7_subject_qr4_mus' => 100,

            // All: Subject -> arts
            'sf9_g7_subject_qr1_art' => 80,
            'sf9_g7_subject_qr2_art' => 85,
            'sf9_g7_subject_qr3_art' => 90,
            'sf9_g7_subject_qr4_art' => 100,

            'sf10_g7_subject_qr1_art' => 80,
            'sf10_g7_subject_qr2_art' => 85,
            'sf10_g7_subject_qr3_art' => 90,
            'sf10_g7_subject_qr4_art' => 100,

            // All: Subject -> physical education
            'sf9_g7_subject_qr1_pe' => 80,
            'sf9_g7_subject_qr2_pe' => 85,
            'sf9_g7_subject_qr3_pe' => 90,
            'sf9_g7_subject_qr4_pe' => 100,
            
            'sf10_g7_subject_qr1_pe' => 80,
            'sf10_g7_subject_qr2_pe' => 85,
            'sf10_g7_subject_qr3_pe' => 90,
            'sf10_g7_subject_qr4_pe' => 100,

            // All: Subject -> health
            'sf9_g7_subject_qr1_hp' => 80,
            'sf9_g7_subject_qr2_hp' => 85,
            'sf9_g7_subject_qr3_hp' => 90,
            'sf9_g7_subject_qr4_hp' => 100,

            'sf10_g7_subject_qr1_hp' => 80,
            'sf10_g7_subject_qr2_hp' => 85,
            'sf10_g7_subject_qr3_hp' => 90,
            'sf10_g7_subject_qr4_hp' => 100,
        ]);
    }
}