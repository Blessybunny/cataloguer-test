<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run () : void {
        self::student_1();
    }

    public function student_1 () : void {
        // DO-NOT-TOUCH: Info 1.0
        Student::create([
            'info_name_last' => 'Flynn',
            'info_name_first' => 'Phineas',
            'info_name_middle' => 'Middle',
            'info_lrn' => '01-0001-001',
            'info_sex' => 'Male',
            'info_birthdate' => '2007-09-17',
        ]);

        // DO-NOT-TOUCH: Info 2.0
        Student::where('id', 1)->update([
            'report_g7_age' => 13,
        ]);

        // DO-NOT-TOUCH: Record
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

        // DO-NOT-TOUCH: Subject -> filipino
        Student::where('id', 1)->update([
            'subject_g7_fil_qr1' => 80,
            'subject_g7_fil_qr2' => 85,
            'subject_g7_fil_qr3' => 90,
            'subject_g7_fil_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> english
        Student::where('id', 1)->update([
            'subject_g7_eng_qr1' => 80,
            'subject_g7_eng_qr2' => 85,
            'subject_g7_eng_qr3' => 90,
            'subject_g7_eng_qr4' => 100,
        ]);
        
        // DO-NOT-TOUCH: Subject -> mathematics
        Student::where('id', 1)->update([
            'subject_g7_mat_qr1' => 80,
            'subject_g7_mat_qr2' => 85,
            'subject_g7_mat_qr3' => 90,
            'subject_g7_mat_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> science
        Student::where('id', 1)->update([
            'subject_g7_sci_qr1' => 80,
            'subject_g7_sci_qr2' => 85,
            'subject_g7_sci_qr3' => 90,
            'subject_g7_sci_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> araling panlipunan (ap)
        Student::where('id', 1)->update([
            'subject_g7_ap_qr1' => 80,
            'subject_g7_ap_qr2' => 85,
            'subject_g7_ap_qr3' => 90,
            'subject_g7_ap_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> edukasyon sa pagpapakatao (ep)
        Student::where('id', 1)->update([
            'subject_g7_ep_qr1' => 80,
            'subject_g7_ep_qr2' => 85,
            'subject_g7_ep_qr3' => 90,
            'subject_g7_ep_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> technology and livelihood education (tle)
        Student::where('id', 1)->update([
            'subject_g7_tle_qr1' => 80,
            'subject_g7_tle_qr2' => 85,
            'subject_g7_tle_qr3' => 90,
            'subject_g7_tle_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> music
        Student::where('id', 1)->update([
            'subject_g7_mus_qr1' => 80,
            'subject_g7_mus_qr2' => 85,
            'subject_g7_mus_qr3' => 90,
            'subject_g7_mus_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> arts
        Student::where('id', 1)->update([
            'subject_g7_art_qr1' => 80,
            'subject_g7_art_qr2' => 85,
            'subject_g7_art_qr3' => 90,
            'subject_g7_art_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> physical education
        Student::where('id', 1)->update([
            'subject_g7_pe_qr1' => 80,
            'subject_g7_pe_qr2' => 85,
            'subject_g7_pe_qr3' => 90,
            'subject_g7_pe_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Subject -> health
        Student::where('id', 1)->update([
            'subject_g7_hp_qr1' => 80,
            'subject_g7_hp_qr2' => 85,
            'subject_g7_hp_qr3' => 90,
            'subject_g7_hp_qr4' => 100,
        ]);

        // DO-NOT-TOUCH: Attendance -> present
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

        // DO-NOT-TOUCH: Attendance -> absent
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












        
        // Values -> maka - diyos
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

        // Values -> maka - tao
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

        // Values -> maka - kalikasan
        Student::where('id', 1)->update([
            'values_g7_mk_qr1' => 'AO',
            'values_g7_mk_qr2' => 'AO',
            'values_g7_mk_qr3' => 'AO',
            'values_g7_mk_qr4' => 'AO',
        ]);
        
        // Values -> maka - bansa
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
    }
}