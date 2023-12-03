<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run () : void {
        self::student_1();
    }

    public function student_1 () : void {
        // 01 | ALL -> learner's information
        Student::create([
            'li_learner_reference_number' => '01-0001-001',
            'li_name_last' => 'Flynn',
            'li_name_first' => 'Phineas',
            'li_name_middle' => 'F',
            'li_sex' => 'Male',
            'li_birthdate_year' => '2007',
            'li_birthdate_month' => '9',
            'li_birthdate_day' => '17',
        ]);

        // 02 | ALL -> scholastic record -> general
        Student::where('id', 1)->update([
            'SF9_g7_age' => 13,
            'ALL_g7_school_grade' => '7',
            'ALL_g7_school_name' => 'Irisan National High School',
            'ALL_g7_school_id' => '01-0001-001',
            'ALL_g7_school_section' => 'Tri-state Braniac',
            'ALL_g7_school_year' => '2007-2008',
            'ALL_g7_school_district' => 'Summer Street',
            'ALL_g7_school_division' => 'Tri-state Area',
            'ALL_g7_school_region' => 'Danville',
            'ALL_g7_school_teacher' => 'Heinz Doofenshmirtz',
        ]);

        // COMPLETE: 03 | ALL -> scholastic record -> subject -> filipino
        Student::where('id', 1)->update([
            'ALL_g7_subject_fil_qr1' => 80,
            'ALL_g7_subject_fil_qr2' => 85,
            'ALL_g7_subject_fil_qr3' => 90,
            'ALL_g7_subject_fil_qr4' => 100,
        ]);

        // COMPLETE: 04 | ALL -> scholastic record -> subject -> english
        Student::where('id', 1)->update([
            'ALL_g7_subject_eng_qr1' => 80,
            'ALL_g7_subject_eng_qr2' => 85,
            'ALL_g7_subject_eng_qr3' => 90,
            'ALL_g7_subject_eng_qr4' => 100,
        ]);

        // COMPLETE: 05 | ALL -> scholastic record -> subject -> mathematics
        Student::where('id', 1)->update([
            'ALL_g7_subject_mat_qr1' => 80,
            'ALL_g7_subject_mat_qr2' => 85,
            'ALL_g7_subject_mat_qr3' => 90,
            'ALL_g7_subject_mat_qr4' => 100,
        ]);

        // COMPLETE: 06 | ALL -> scholastic record -> subject -> science
        Student::where('id', 1)->update([
            'ALL_g7_subject_sci_qr1' => 80,
            'ALL_g7_subject_sci_qr2' => 85,
            'ALL_g7_subject_sci_qr3' => 90,
            'ALL_g7_subject_sci_qr4' => 100,
        ]);

        // COMPLETE: 07 | ALL -> scholastic record -> subject -> araling panlipunan (ap)
        Student::where('id', 1)->update([
            'ALL_g7_subject_ap_qr1' => 80,
            'ALL_g7_subject_ap_qr2' => 85,
            'ALL_g7_subject_ap_qr3' => 90,
            'ALL_g7_subject_ap_qr4' => 100,
        ]);

        // COMPLETE: 08 | ALL -> scholastic record -> subject -> edukasyon sa pagpapakatao (ep)
        Student::where('id', 1)->update([
            'ALL_g7_subject_ep_qr1' => 80,
            'ALL_g7_subject_ep_qr2' => 85,
            'ALL_g7_subject_ep_qr3' => 90,
            'ALL_g7_subject_ep_qr4' => 100,
        ]);

        // COMPLETE: 09 | ALL -> scholastic record -> subject -> technology and livelihood education (tle)
        Student::where('id', 1)->update([
            'ALL_g7_subject_tle_qr1' => 80,
            'ALL_g7_subject_tle_qr2' => 85,
            'ALL_g7_subject_tle_qr3' => 90,
            'ALL_g7_subject_tle_qr4' => 100,
        ]);

        // COMPLETE: 10 | ALL -> scholastic record -> subject -> music
        Student::where('id', 1)->update([
            'ALL_g7_subject_mus_qr1' => 80,
            'ALL_g7_subject_mus_qr2' => 85,
            'ALL_g7_subject_mus_qr3' => 90,
            'ALL_g7_subject_mus_qr4' => 100,
        ]);

        // COMPLETE: 11 | ALL -> scholastic record -> subject -> arts
        Student::where('id', 1)->update([
            'ALL_g7_subject_art_qr1' => 80,
            'ALL_g7_subject_art_qr2' => 85,
            'ALL_g7_subject_art_qr3' => 90,
            'ALL_g7_subject_art_qr4' => 100,
        ]);

        // COMPLETE: 12 | ALL -> scholastic record -> subject -> physical education
        Student::where('id', 1)->update([
            'ALL_g7_subject_pe_qr1' => 80,
            'ALL_g7_subject_pe_qr2' => 85,
            'ALL_g7_subject_pe_qr3' => 90,
            'ALL_g7_subject_pe_qr4' => 100,
        ]);

        // COMPLETE: 13 | ALL -> scholastic record -> subject -> health
        Student::where('id', 1)->update([
            'ALL_g7_subject_hp_qr1' => 80,
            'ALL_g7_subject_hp_qr2' => 85,
            'ALL_g7_subject_hp_qr3' => 90,
            'ALL_g7_subject_hp_qr4' => 100,
        ]);

        // COMPLETE: 14 | SF9 -> attendance -> days present
        Student::where('id', 1)->update([
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
        ]);

        // COMPLETE: 15 | SF9 -> attendance -> days absent
        Student::where('id', 1)->update([
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
        ]);

        // COMPLETE: 16 | SF9 -> observed values -> maka - diyos
        Student::where('id', 1)->update([
            'SF9_g7_values_md_s1_qr1' => 'AO',
            'SF9_g7_values_md_s1_qr2' => 'AO',
            'SF9_g7_values_md_s1_qr3' => 'AO',
            'SF9_g7_values_md_s1_qr4' => 'AO',
            'SF9_g7_values_md_s2_qr1' => 'AO',
            'SF9_g7_values_md_s2_qr2' => 'AO',
            'SF9_g7_values_md_s2_qr3' => 'AO',
            'SF9_g7_values_md_s2_qr4' => 'AO',
        ]);

        // COMPLETE: 17 | SF9 -> observed values -> maka - tao
        Student::where('id', 1)->update([
            'SF9_g7_values_mt_s1_qr1' => 'AO',
            'SF9_g7_values_mt_s1_qr2' => 'AO',
            'SF9_g7_values_mt_s1_qr3' => 'AO',
            'SF9_g7_values_mt_s1_qr4' => 'AO',
            'SF9_g7_values_mt_s2_qr1' => 'AO',
            'SF9_g7_values_mt_s2_qr2' => 'AO',
            'SF9_g7_values_mt_s2_qr3' => 'AO',
            'SF9_g7_values_mt_s2_qr4' => 'AO',
        ]);

        // COMPLETE: 18 | SF9 -> observed values -> maka - kalikasan
        Student::where('id', 1)->update([
            'SF9_g7_values_mk_qr1' => 'AO',
            'SF9_g7_values_mk_qr2' => 'AO',
            'SF9_g7_values_mk_qr3' => 'AO',
            'SF9_g7_values_mk_qr4' => 'AO',
        ]);
        
        // COMPLETE: 19 | SF9 -> observed values -> maka - bansa
        Student::where('id', 1)->update([
            'SF9_g7_values_mb_s1_qr1' => 'AO',
            'SF9_g7_values_mb_s1_qr2' => 'AO',
            'SF9_g7_values_mb_s1_qr3' => 'AO',
            'SF9_g7_values_mb_s1_qr4' => 'AO',
            'SF9_g7_values_mb_s2_qr1' => 'AO',
            'SF9_g7_values_mb_s2_qr2' => 'AO',
            'SF9_g7_values_mb_s2_qr3' => 'AO',
            'SF9_g7_values_mb_s2_qr4' => 'AO',
        ]);
    }
}
