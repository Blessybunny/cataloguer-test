<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run () : void {
        self::user_1();
        self::student_1();
    }

    // STUDENT: Phineas Flynn
    public function student_1 () : void {
        // [01 - ALL] Info
        Student::create([
            'info_name_last' => 'Flynn',
            'info_name_first' => 'Phineas',
            'info_name_middle' => 'Middle',
            'info_lrn' => '01-0001-001',
            'info_sex' => 'Male',
            'info_birthdate' => '2007-09-17',
        ]);

        // [02 - SF9] Report
        Student::where('id', 1)->update([
            'report_g7_age' => 13,
        ]);

        // [03 - SF9] Attendance -> present
        Student::where('id', 1)->update([
            'attendance_g7_p_jan' => 10,
            'attendance_g7_p_feb' => 10,
            'attendance_g7_p_mar' => 10,
            'attendance_g7_p_apr' => 10,
            'attendance_g7_p_may' => 10,
            'attendance_g7_p_jun' => 10,
            'attendance_g7_p_jul' => 10,
            'attendance_g7_p_aug' => 10,
            'attendance_g7_p_sep' => 10,
            'attendance_g7_p_oct' => 10,
            'attendance_g7_p_nov' => 10,
            'attendance_g7_p_dec' => 10,
        ]);

        // [04 - SF9] Attendance -> absent
        Student::where('id', 1)->update([
            'attendance_g7_a_jan' => 2,
            'attendance_g7_a_feb' => 2,
            'attendance_g7_a_mar' => 2,
            'attendance_g7_a_apr' => 2,
            'attendance_g7_a_may' => 2,
            'attendance_g7_a_jun' => 2,
            'attendance_g7_a_jul' => 2,
            'attendance_g7_a_aug' => 2,
            'attendance_g7_a_sep' => 2,
            'attendance_g7_a_oct' => 2,
            'attendance_g7_a_nov' => 2,
            'attendance_g7_a_dec' => 2,
        ]);

        // [05 - SF9] Values -> maka - diyos
        Student::where('id', 1)->update([
            'values_g7_md_s1_qr1' => 'AO',
            'values_g7_md_s1_qr2' => 'AO',
            'values_g7_md_s1_qr3' => 'AO',
            'values_g7_md_s1_qr4' => 'AO',
            'values_g7_md_s2_qr1' => 'AO',
            'values_g7_md_s2_qr2' => 'AO',
            'values_g7_md_s2_qr3' => 'AO',
            'values_g7_md_s2_qr4' => 'AO',
        ]);

        // [06 - SF9] Values -> maka - tao
        Student::where('id', 1)->update([
            'values_g7_mt_s1_qr1' => 'AO',
            'values_g7_mt_s1_qr2' => 'AO',
            'values_g7_mt_s1_qr3' => 'AO',
            'values_g7_mt_s1_qr4' => 'AO',
            'values_g7_mt_s2_qr1' => 'AO',
            'values_g7_mt_s2_qr2' => 'AO',
            'values_g7_mt_s2_qr3' => 'AO',
            'values_g7_mt_s2_qr4' => 'AO',
        ]);

        // [07 - SF9] Values -> maka - kalikasan
        Student::where('id', 1)->update([
            'values_g7_mk_qr1' => 'AO',
            'values_g7_mk_qr2' => 'AO',
            'values_g7_mk_qr3' => 'AO',
            'values_g7_mk_qr4' => 'AO',
        ]);
        
        // [08 - SF9] Values -> maka - bansa
        Student::where('id', 1)->update([
            'values_g7_mb_s1_qr1' => 'AO',
            'values_g7_mb_s1_qr2' => 'AO',
            'values_g7_mb_s1_qr3' => 'AO',
            'values_g7_mb_s1_qr4' => 'AO',
            'values_g7_mb_s2_qr1' => 'AO',
            'values_g7_mb_s2_qr2' => 'AO',
            'values_g7_mb_s2_qr3' => 'AO',
            'values_g7_mb_s2_qr4' => 'AO',
        ]);

        // [09 - SF10] Enrollment

        // [10 - SF10] Record
        Student::where('id', 1)->update([
            'record_g7_school_grade' => '7',
            'record_g7_school_name' => 'Tri-state High School',
            'record_g7_school_id' => '01-0001-001',
            'record_g7_school_section' => 'Polymer',
            'record_g7_school_year' => '2007-2008',
            'record_g7_school_district' => 'Summer Street',
            'record_g7_school_division' => 'Tri-state Area',
            'record_g7_school_region' => 'Danville',
            'record_g7_school_teacher' => 'Heinz Doofenshmirtz',
        ]);

        // [11 - ALL] Subject -> filipino
        Student::where('id', 1)->update([
            'subject_g7_fil_qr1' => 80,
            'subject_g7_fil_qr2' => 85,
            'subject_g7_fil_qr3' => 90,
            'subject_g7_fil_qr4' => 100,
        ]);

        // [12 - ALL] Subject -> english
        Student::where('id', 1)->update([
            'subject_g7_eng_qr1' => 80,
            'subject_g7_eng_qr2' => 85,
            'subject_g7_eng_qr3' => 90,
            'subject_g7_eng_qr4' => 100,
        ]);
        
        // [13 - ALL] Subject -> mathematics
        Student::where('id', 1)->update([
            'subject_g7_mat_qr1' => 80,
            'subject_g7_mat_qr2' => 85,
            'subject_g7_mat_qr3' => 90,
            'subject_g7_mat_qr4' => 100,
        ]);

        // [14 - ALL] Subject -> science
        Student::where('id', 1)->update([
            'subject_g7_sci_qr1' => 80,
            'subject_g7_sci_qr2' => 85,
            'subject_g7_sci_qr3' => 90,
            'subject_g7_sci_qr4' => 100,
        ]);

        // [15 - ALL] Subject -> araling panlipunan (ap)
        Student::where('id', 1)->update([
            'subject_g7_ap_qr1' => 80,
            'subject_g7_ap_qr2' => 85,
            'subject_g7_ap_qr3' => 90,
            'subject_g7_ap_qr4' => 100,
        ]);

        // [16 - ALL] Subject -> edukasyon sa pagpapakatao (ep)
        Student::where('id', 1)->update([
            'subject_g7_ep_qr1' => 80,
            'subject_g7_ep_qr2' => 85,
            'subject_g7_ep_qr3' => 90,
            'subject_g7_ep_qr4' => 100,
        ]);

        // [17 - ALL] SSubject -> technology and livelihood education (tle)
        Student::where('id', 1)->update([
            'subject_g7_tle_qr1' => 80,
            'subject_g7_tle_qr2' => 85,
            'subject_g7_tle_qr3' => 90,
            'subject_g7_tle_qr4' => 100,
        ]);

        // [18 - ALL] Subject -> music
        Student::where('id', 1)->update([
            'subject_g7_mus_qr1' => 80,
            'subject_g7_mus_qr2' => 85,
            'subject_g7_mus_qr3' => 90,
            'subject_g7_mus_qr4' => 100,
        ]);

        // [19 - ALL] Subject -> arts
        Student::where('id', 1)->update([
            'subject_g7_art_qr1' => 80,
            'subject_g7_art_qr2' => 85,
            'subject_g7_art_qr3' => 90,
            'subject_g7_art_qr4' => 100,
        ]);

        // [20 - ALL] Subject -> physical education
        Student::where('id', 1)->update([
            'subject_g7_pe_qr1' => 80,
            'subject_g7_pe_qr2' => 85,
            'subject_g7_pe_qr3' => 90,
            'subject_g7_pe_qr4' => 100,
        ]);

        // [21 - ALL] Subject -> health
        Student::where('id', 1)->update([
            'subject_g7_hp_qr1' => 80,
            'subject_g7_hp_qr2' => 85,
            'subject_g7_hp_qr3' => 90,
            'subject_g7_hp_qr4' => 100,
        ]);
    }

    // USER: Heinz Doofenshmirtz
    public function user_1 () : void {
        User::create([
            'info_deped_id' => '0123456789',
            'info_password' => bcrypt('password'),
            'info_role' => 'Registrar',
            'info_name_last' => 'Doofenshmirtz',
            'info_name_first' => 'Heinz',
            'info_name_middle' => 'Doof',
            'info_sex' => 'Male',
            'info_birthdate' => '1960-09-17',
        ]);
    }
}