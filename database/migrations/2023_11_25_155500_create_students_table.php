<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('students', function (Blueprint $table) {
            // ALL -> Learner's information
            $table->id(); // warning: LRN is impossibly long for an integer
            $table->string('li_name_last', 100);
            $table->string('li_name_first', 100);
            $table->string('li_name_middle', 100);
            $table->string('li_sex', 100);
            $table->date('li_birthdate'); // format: yy-mm-dd

            // ALL -> Scholastic record -> general
            $table->string('ALL_g7_school_name', 100)->nullable();
            $table->string('ALL_g7_school_id', 100)->nullable();
            $table->string('ALL_g7_school_grade', 100)->nullable();
            $table->string('ALL_g7_school_section', 100)->nullable();
            $table->string('ALL_g7_school_year', 100)->nullable();
            $table->string('ALL_g7_school_district', 100)->nullable();
            $table->string('ALL_g7_school_division', 100)->nullable();
            $table->string('ALL_g7_school_region', 100)->nullable();
            $table->string('ALL_g7_school_teacher', 100)->nullable();
                // Place two remedial date formats here

            $table->string('ALL_g8_school_name', 100)->nullable();
            $table->string('ALL_g8_school_id', 100)->nullable();
            $table->string('ALL_g8_school_grade', 100)->nullable();
            $table->string('ALL_g8_school_section', 100)->nullable();
            $table->string('ALL_g8_school_year', 100)->nullable();
            $table->string('ALL_g8_school_district', 100)->nullable();
            $table->string('ALL_g8_school_division', 100)->nullable();
            $table->string('ALL_g8_school_region', 100)->nullable();
            $table->string('ALL_g8_school_teacher', 100)->nullable();
                // Place two remedial date formats here

            $table->string('ALL_g9_school_name', 100)->nullable();
            $table->string('ALL_g9_school_id', 100)->nullable();
            $table->string('ALL_g9_school_grade', 100)->nullable();
            $table->string('ALL_g9_school_section', 100)->nullable();
            $table->string('ALL_g9_school_year', 100)->nullable();
            $table->string('ALL_g9_school_district', 100)->nullable();
            $table->string('ALL_g9_school_division', 100)->nullable();
            $table->string('ALL_g9_school_region', 100)->nullable();
            $table->string('ALL_g9_school_teacher', 100)->nullable();
                // Place two remedial date formats here
            
            $table->string('ALL_g10_school_name', 100)->nullable();
            $table->string('ALL_g10_school_id', 100)->nullable();
            $table->string('ALL_g10_school_grade', 100)->nullable();
            $table->string('ALL_g10_school_section', 100)->nullable();
            $table->string('ALL_g10_school_year', 100)->nullable();
            $table->string('ALL_g10_school_district', 100)->nullable();
            $table->string('ALL_g10_school_division', 100)->nullable();
            $table->string('ALL_g10_school_region', 100)->nullable();
            $table->string('ALL_g10_school_teacher', 100)->nullable();
                // Place two remedial date formats here

            // ALL -> Scholastic record -> subject -> filipino
            $table->integer('ALL_g7_subject_fil_qr1')->nullable();
            $table->integer('ALL_g7_subject_fil_qr2')->nullable();
            $table->integer('ALL_g7_subject_fil_qr3')->nullable();
            $table->integer('ALL_g7_subject_fil_qr4')->nullable();
            $table->integer('ALL_g7_subject_fil_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_fil_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_fil_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_fil_qr1')->nullable();
            $table->integer('ALL_g8_subject_fil_qr2')->nullable();
            $table->integer('ALL_g8_subject_fil_qr3')->nullable();
            $table->integer('ALL_g8_subject_fil_qr4')->nullable();
            $table->integer('ALL_g8_subject_fil_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_fil_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_fil_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_fil_qr1')->nullable();
            $table->integer('ALL_g9_subject_fil_qr2')->nullable();
            $table->integer('ALL_g9_subject_fil_qr3')->nullable();
            $table->integer('ALL_g9_subject_fil_qr4')->nullable();
            $table->integer('ALL_g9_subject_fil_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_fil_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_fil_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_fil_qr1')->nullable();
            $table->integer('ALL_g10_subject_fil_qr2')->nullable();
            $table->integer('ALL_g10_subject_fil_qr3')->nullable();
            $table->integer('ALL_g10_subject_fil_qr4')->nullable();
            $table->integer('ALL_g10_subject_fil_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_fil_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_fil_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> english
            $table->integer('ALL_g7_subject_eng_qr1')->nullable();
            $table->integer('ALL_g7_subject_eng_qr2')->nullable();
            $table->integer('ALL_g7_subject_eng_qr3')->nullable();
            $table->integer('ALL_g7_subject_eng_qr4')->nullable();
            $table->integer('ALL_g7_subject_eng_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_eng_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_eng_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_eng_qr1')->nullable();
            $table->integer('ALL_g8_subject_eng_qr2')->nullable();
            $table->integer('ALL_g8_subject_eng_qr3')->nullable();
            $table->integer('ALL_g8_subject_eng_qr4')->nullable();
            $table->integer('ALL_g8_subject_eng_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_eng_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_eng_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_eng_qr1')->nullable();
            $table->integer('ALL_g9_subject_eng_qr2')->nullable();
            $table->integer('ALL_g9_subject_eng_qr3')->nullable();
            $table->integer('ALL_g9_subject_eng_qr4')->nullable();
            $table->integer('ALL_g9_subject_eng_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_eng_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_eng_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_eng_qr1')->nullable();
            $table->integer('ALL_g10_subject_eng_qr2')->nullable();
            $table->integer('ALL_g10_subject_eng_qr3')->nullable();
            $table->integer('ALL_g10_subject_eng_qr4')->nullable();
            $table->integer('ALL_g10_subject_eng_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_eng_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_eng_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> mathematics
            $table->integer('ALL_g7_subject_mat_qr1')->nullable();
            $table->integer('ALL_g7_subject_mat_qr2')->nullable();
            $table->integer('ALL_g7_subject_mat_qr3')->nullable();
            $table->integer('ALL_g7_subject_mat_qr4')->nullable();
            $table->integer('ALL_g7_subject_mat_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_mat_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_mat_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_mat_qr1')->nullable();
            $table->integer('ALL_g8_subject_mat_qr2')->nullable();
            $table->integer('ALL_g8_subject_mat_qr3')->nullable();
            $table->integer('ALL_g8_subject_mat_qr4')->nullable();
            $table->integer('ALL_g8_subject_mat_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_mat_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_mat_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_mat_qr1')->nullable();
            $table->integer('ALL_g9_subject_mat_qr2')->nullable();
            $table->integer('ALL_g9_subject_mat_qr3')->nullable();
            $table->integer('ALL_g9_subject_mat_qr4')->nullable();
            $table->integer('ALL_g9_subject_mat_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_mat_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_mat_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_mat_qr1')->nullable();
            $table->integer('ALL_g10_subject_mat_qr2')->nullable();
            $table->integer('ALL_g10_subject_mat_qr3')->nullable();
            $table->integer('ALL_g10_subject_mat_qr4')->nullable();
            $table->integer('ALL_g10_subject_mat_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_mat_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_mat_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> science
            $table->integer('ALL_g7_subject_sci_qr1')->nullable();
            $table->integer('ALL_g7_subject_sci_qr2')->nullable();
            $table->integer('ALL_g7_subject_sci_qr3')->nullable();
            $table->integer('ALL_g7_subject_sci_qr4')->nullable();
            $table->integer('ALL_g7_subject_sci_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_sci_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_sci_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_sci_qr1')->nullable();
            $table->integer('ALL_g8_subject_sci_qr2')->nullable();
            $table->integer('ALL_g8_subject_sci_qr3')->nullable();
            $table->integer('ALL_g8_subject_sci_qr4')->nullable();
            $table->integer('ALL_g8_subject_sci_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_sci_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_sci_rem_rf')->nullable();
            
            $table->integer('ALL_g9_subject_sci_qr1')->nullable();
            $table->integer('ALL_g9_subject_sci_qr2')->nullable();
            $table->integer('ALL_g9_subject_sci_qr3')->nullable();
            $table->integer('ALL_g9_subject_sci_qr4')->nullable();
            $table->integer('ALL_g9_subject_sci_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_sci_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_sci_rem_rf')->nullable();
            
            $table->integer('ALL_g10_subject_sci_qr1')->nullable();
            $table->integer('ALL_g10_subject_sci_qr2')->nullable();
            $table->integer('ALL_g10_subject_sci_qr3')->nullable();
            $table->integer('ALL_g10_subject_sci_qr4')->nullable();
            $table->integer('ALL_g10_subject_sci_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_sci_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_sci_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> araling panlipunan (ap)
            $table->integer('ALL_g7_subject_ap_qr1')->nullable();
            $table->integer('ALL_g7_subject_ap_qr2')->nullable();
            $table->integer('ALL_g7_subject_ap_qr3')->nullable();
            $table->integer('ALL_g7_subject_ap_qr4')->nullable();
            $table->integer('ALL_g7_subject_ap_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_ap_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_ap_rem_rf')->nullable();
            
            $table->integer('ALL_g8_subject_ap_qr1')->nullable();
            $table->integer('ALL_g8_subject_ap_qr2')->nullable();
            $table->integer('ALL_g8_subject_ap_qr3')->nullable();
            $table->integer('ALL_g8_subject_ap_qr4')->nullable();
            $table->integer('ALL_g8_subject_ap_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_ap_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_ap_rem_rf')->nullable();
            
            $table->integer('ALL_g9_subject_ap_qr1')->nullable();
            $table->integer('ALL_g9_subject_ap_qr2')->nullable();
            $table->integer('ALL_g9_subject_ap_qr3')->nullable();
            $table->integer('ALL_g9_subject_ap_qr4')->nullable();
            $table->integer('ALL_g9_subject_ap_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_ap_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_ap_rem_rf')->nullable();
            
            $table->integer('ALL_g10_subject_ap_qr1')->nullable();
            $table->integer('ALL_g10_subject_ap_qr2')->nullable();
            $table->integer('ALL_g10_subject_ap_qr3')->nullable();
            $table->integer('ALL_g10_subject_ap_qr4')->nullable();
            $table->integer('ALL_g10_subject_ap_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_ap_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_ap_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> edukasyon pagpapakatao (ep)
            $table->integer('ALL_g7_subject_ep_qr1')->nullable();
            $table->integer('ALL_g7_subject_ep_qr2')->nullable();
            $table->integer('ALL_g7_subject_ep_qr3')->nullable();
            $table->integer('ALL_g7_subject_ep_qr4')->nullable();
            $table->integer('ALL_g7_subject_ep_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_ep_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_ep_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_ep_qr1')->nullable();
            $table->integer('ALL_g8_subject_ep_qr2')->nullable();
            $table->integer('ALL_g8_subject_ep_qr3')->nullable();
            $table->integer('ALL_g8_subject_ep_qr4')->nullable();
            $table->integer('ALL_g8_subject_ep_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_ep_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_ep_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_ep_qr1')->nullable();
            $table->integer('ALL_g9_subject_ep_qr2')->nullable();
            $table->integer('ALL_g9_subject_ep_qr3')->nullable();
            $table->integer('ALL_g9_subject_ep_qr4')->nullable();
            $table->integer('ALL_g9_subject_ep_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_ep_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_ep_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_ep_qr1')->nullable();
            $table->integer('ALL_g10_subject_ep_qr2')->nullable();
            $table->integer('ALL_g10_subject_ep_qr3')->nullable();
            $table->integer('ALL_g10_subject_ep_qr4')->nullable();
            $table->integer('ALL_g10_subject_ep_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_ep_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_ep_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> technology and livelihood education (tle)
            $table->integer('ALL_g7_subject_tle_qr1')->nullable();
            $table->integer('ALL_g7_subject_tle_qr2')->nullable();
            $table->integer('ALL_g7_subject_tle_qr3')->nullable();
            $table->integer('ALL_g7_subject_tle_qr4')->nullable();
            $table->integer('ALL_g7_subject_tle_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_tle_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_tle_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_tle_qr1')->nullable();
            $table->integer('ALL_g8_subject_tle_qr2')->nullable();
            $table->integer('ALL_g8_subject_tle_qr3')->nullable();
            $table->integer('ALL_g8_subject_tle_qr4')->nullable();
            $table->integer('ALL_g8_subject_tle_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_tle_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_tle_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_tle_qr1')->nullable();
            $table->integer('ALL_g9_subject_tle_qr2')->nullable();
            $table->integer('ALL_g9_subject_tle_qr3')->nullable();
            $table->integer('ALL_g9_subject_tle_qr4')->nullable();
            $table->integer('ALL_g9_subject_tle_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_tle_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_tle_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_tle_qr1')->nullable();
            $table->integer('ALL_g10_subject_tle_qr2')->nullable();
            $table->integer('ALL_g10_subject_tle_qr3')->nullable();
            $table->integer('ALL_g10_subject_tle_qr4')->nullable();
            $table->integer('ALL_g10_subject_tle_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_tle_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_tle_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> music
            $table->integer('ALL_g7_subject_mus_qr1')->nullable();
            $table->integer('ALL_g7_subject_mus_qr2')->nullable();
            $table->integer('ALL_g7_subject_mus_qr3')->nullable();
            $table->integer('ALL_g7_subject_mus_qr4')->nullable();
            $table->integer('ALL_g7_subject_mus_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_mus_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_mus_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_mus_qr1')->nullable();
            $table->integer('ALL_g8_subject_mus_qr2')->nullable();
            $table->integer('ALL_g8_subject_mus_qr3')->nullable();
            $table->integer('ALL_g8_subject_mus_qr4')->nullable();
            $table->integer('ALL_g8_subject_mus_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_mus_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_mus_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_mus_qr1')->nullable();
            $table->integer('ALL_g9_subject_mus_qr2')->nullable();
            $table->integer('ALL_g9_subject_mus_qr3')->nullable();
            $table->integer('ALL_g9_subject_mus_qr4')->nullable();
            $table->integer('ALL_g9_subject_mus_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_mus_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_mus_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_mus_qr1')->nullable();
            $table->integer('ALL_g10_subject_mus_qr2')->nullable();
            $table->integer('ALL_g10_subject_mus_qr3')->nullable();
            $table->integer('ALL_g10_subject_mus_qr4')->nullable();
            $table->integer('ALL_g10_subject_mus_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_mus_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_mus_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> arts
            $table->integer('ALL_g7_subject_art_qr1')->nullable();
            $table->integer('ALL_g7_subject_art_qr2')->nullable();
            $table->integer('ALL_g7_subject_art_qr3')->nullable();
            $table->integer('ALL_g7_subject_art_qr4')->nullable();
            $table->integer('ALL_g7_subject_art_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_art_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_art_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_art_qr1')->nullable();
            $table->integer('ALL_g8_subject_art_qr2')->nullable();
            $table->integer('ALL_g8_subject_art_qr3')->nullable();
            $table->integer('ALL_g8_subject_art_qr4')->nullable();
            $table->integer('ALL_g8_subject_art_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_art_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_art_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_art_qr1')->nullable();
            $table->integer('ALL_g9_subject_art_qr2')->nullable();
            $table->integer('ALL_g9_subject_art_qr3')->nullable();
            $table->integer('ALL_g9_subject_art_qr4')->nullable();
            $table->integer('ALL_g9_subject_art_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_art_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_art_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_art_qr1')->nullable();
            $table->integer('ALL_g10_subject_art_qr2')->nullable();
            $table->integer('ALL_g10_subject_art_qr3')->nullable();
            $table->integer('ALL_g10_subject_art_qr4')->nullable();
            $table->integer('ALL_g10_subject_art_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_art_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_art_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> physical education
            $table->integer('ALL_g7_subject_pe_qr1')->nullable();
            $table->integer('ALL_g7_subject_pe_qr2')->nullable();
            $table->integer('ALL_g7_subject_pe_qr3')->nullable();
            $table->integer('ALL_g7_subject_pe_qr4')->nullable();
            $table->integer('ALL_g7_subject_pe_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_pe_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_pe_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_pe_qr1')->nullable();
            $table->integer('ALL_g8_subject_pe_qr2')->nullable();
            $table->integer('ALL_g8_subject_pe_qr3')->nullable();
            $table->integer('ALL_g8_subject_pe_qr4')->nullable();
            $table->integer('ALL_g8_subject_pe_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_pe_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_pe_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_pe_qr1')->nullable();
            $table->integer('ALL_g9_subject_pe_qr2')->nullable();
            $table->integer('ALL_g9_subject_pe_qr3')->nullable();
            $table->integer('ALL_g9_subject_pe_qr4')->nullable();
            $table->integer('ALL_g9_subject_pe_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_pe_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_pe_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_pe_qr1')->nullable();
            $table->integer('ALL_g10_subject_pe_qr2')->nullable();
            $table->integer('ALL_g10_subject_pe_qr3')->nullable();
            $table->integer('ALL_g10_subject_pe_qr4')->nullable();
            $table->integer('ALL_g10_subject_pe_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_pe_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_pe_rem_rf')->nullable();

            // ALL -> Scholastic record -> subject -> health
            $table->integer('ALL_g7_subject_hp_qr1')->nullable();
            $table->integer('ALL_g7_subject_hp_qr2')->nullable();
            $table->integer('ALL_g7_subject_hp_qr3')->nullable();
            $table->integer('ALL_g7_subject_hp_qr4')->nullable();
            $table->integer('ALL_g7_subject_hp_rem_fr')->nullable();
            $table->integer('ALL_g7_subject_hp_rem_cm')->nullable();
            $table->integer('ALL_g7_subject_hp_rem_rf')->nullable();

            $table->integer('ALL_g8_subject_hp_qr1')->nullable();
            $table->integer('ALL_g8_subject_hp_qr2')->nullable();
            $table->integer('ALL_g8_subject_hp_qr3')->nullable();
            $table->integer('ALL_g8_subject_hp_qr4')->nullable();
            $table->integer('ALL_g8_subject_hp_rem_fr')->nullable();
            $table->integer('ALL_g8_subject_hp_rem_cm')->nullable();
            $table->integer('ALL_g8_subject_hp_rem_rf')->nullable();

            $table->integer('ALL_g9_subject_hp_qr1')->nullable();
            $table->integer('ALL_g9_subject_hp_qr2')->nullable();
            $table->integer('ALL_g9_subject_hp_qr3')->nullable();
            $table->integer('ALL_g9_subject_hp_qr4')->nullable();
            $table->integer('ALL_g9_subject_hp_rem_fr')->nullable();
            $table->integer('ALL_g9_subject_hp_rem_cm')->nullable();
            $table->integer('ALL_g9_subject_hp_rem_rf')->nullable();

            $table->integer('ALL_g10_subject_hp_qr1')->nullable();
            $table->integer('ALL_g10_subject_hp_qr2')->nullable();
            $table->integer('ALL_g10_subject_hp_qr3')->nullable();
            $table->integer('ALL_g10_subject_hp_qr4')->nullable();
            $table->integer('ALL_g10_subject_hp_rem_fr')->nullable();
            $table->integer('ALL_g10_subject_hp_rem_cm')->nullable();
            $table->integer('ALL_g10_subject_hp_rem_rf')->nullable();

            // SF9 -> attendance -> days present
            $table->integer('SF9_g7_attendance_p_jan')->nullable();
            $table->integer('SF9_g7_attendance_p_feb')->nullable();
            $table->integer('SF9_g7_attendance_p_mar')->nullable();
            $table->integer('SF9_g7_attendance_p_apr')->nullable();
            $table->integer('SF9_g7_attendance_p_may')->nullable();
            $table->integer('SF9_g7_attendance_p_jun')->nullable();
            $table->integer('SF9_g7_attendance_p_jul')->nullable();
            $table->integer('SF9_g7_attendance_p_aug')->nullable();
            $table->integer('SF9_g7_attendance_p_sep')->nullable();
            $table->integer('SF9_g7_attendance_p_oct')->nullable();
            $table->integer('SF9_g7_attendance_p_nov')->nullable();
            $table->integer('SF9_g7_attendance_p_dec')->nullable();
            
            $table->integer('SF9_g8_attendance_p_jan')->nullable();
            $table->integer('SF9_g8_attendance_p_feb')->nullable();
            $table->integer('SF9_g8_attendance_p_mar')->nullable();
            $table->integer('SF9_g8_attendance_p_apr')->nullable();
            $table->integer('SF9_g8_attendance_p_may')->nullable();
            $table->integer('SF9_g8_attendance_p_jun')->nullable();
            $table->integer('SF9_g8_attendance_p_jul')->nullable();
            $table->integer('SF9_g8_attendance_p_aug')->nullable();
            $table->integer('SF9_g8_attendance_p_sep')->nullable();
            $table->integer('SF9_g8_attendance_p_oct')->nullable();
            $table->integer('SF9_g8_attendance_p_nov')->nullable();
            $table->integer('SF9_g8_attendance_p_dec')->nullable();
            
            $table->integer('SF9_g9_attendance_p_jan')->nullable();
            $table->integer('SF9_g9_attendance_p_feb')->nullable();
            $table->integer('SF9_g9_attendance_p_mar')->nullable();
            $table->integer('SF9_g9_attendance_p_apr')->nullable();
            $table->integer('SF9_g9_attendance_p_may')->nullable();
            $table->integer('SF9_g9_attendance_p_jun')->nullable();
            $table->integer('SF9_g9_attendance_p_jul')->nullable();
            $table->integer('SF9_g9_attendance_p_aug')->nullable();
            $table->integer('SF9_g9_attendance_p_sep')->nullable();
            $table->integer('SF9_g9_attendance_p_oct')->nullable();
            $table->integer('SF9_g9_attendance_p_nov')->nullable();
            $table->integer('SF9_g9_attendance_p_dec')->nullable();
            
            $table->integer('SF9_g10_attendance_p_jan')->nullable();
            $table->integer('SF9_g10_attendance_p_feb')->nullable();
            $table->integer('SF9_g10_attendance_p_mar')->nullable();
            $table->integer('SF9_g10_attendance_p_apr')->nullable();
            $table->integer('SF9_g10_attendance_p_may')->nullable();
            $table->integer('SF9_g10_attendance_p_jun')->nullable();
            $table->integer('SF9_g10_attendance_p_jul')->nullable();
            $table->integer('SF9_g10_attendance_p_aug')->nullable();
            $table->integer('SF9_g10_attendance_p_sep')->nullable();
            $table->integer('SF9_g10_attendance_p_oct')->nullable();
            $table->integer('SF9_g10_attendance_p_nov')->nullable();
            $table->integer('SF9_g10_attendance_p_dec')->nullable();

            // SF9 -> attendance -> days absent
            $table->integer('SF9_g7_attendance_a_jan')->nullable();
            $table->integer('SF9_g7_attendance_a_feb')->nullable();
            $table->integer('SF9_g7_attendance_a_mar')->nullable();
            $table->integer('SF9_g7_attendance_a_apr')->nullable();
            $table->integer('SF9_g7_attendance_a_may')->nullable();
            $table->integer('SF9_g7_attendance_a_jun')->nullable();
            $table->integer('SF9_g7_attendance_a_jul')->nullable();
            $table->integer('SF9_g7_attendance_a_aug')->nullable();
            $table->integer('SF9_g7_attendance_a_sep')->nullable();
            $table->integer('SF9_g7_attendance_a_oct')->nullable();
            $table->integer('SF9_g7_attendance_a_nov')->nullable();
            $table->integer('SF9_g7_attendance_a_dec')->nullable();
            
            $table->integer('SF9_g8_attendance_a_jan')->nullable();
            $table->integer('SF9_g8_attendance_a_feb')->nullable();
            $table->integer('SF9_g8_attendance_a_mar')->nullable();
            $table->integer('SF9_g8_attendance_a_apr')->nullable();
            $table->integer('SF9_g8_attendance_a_may')->nullable();
            $table->integer('SF9_g8_attendance_a_jun')->nullable();
            $table->integer('SF9_g8_attendance_a_jul')->nullable();
            $table->integer('SF9_g8_attendance_a_aug')->nullable();
            $table->integer('SF9_g8_attendance_a_sep')->nullable();
            $table->integer('SF9_g8_attendance_a_oct')->nullable();
            $table->integer('SF9_g8_attendance_a_nov')->nullable();
            $table->integer('SF9_g8_attendance_a_dec')->nullable();
            
            $table->integer('SF9_g9_attendance_a_jan')->nullable();
            $table->integer('SF9_g9_attendance_a_feb')->nullable();
            $table->integer('SF9_g9_attendance_a_mar')->nullable();
            $table->integer('SF9_g9_attendance_a_apr')->nullable();
            $table->integer('SF9_g9_attendance_a_may')->nullable();
            $table->integer('SF9_g9_attendance_a_jun')->nullable();
            $table->integer('SF9_g9_attendance_a_jul')->nullable();
            $table->integer('SF9_g9_attendance_a_aug')->nullable();
            $table->integer('SF9_g9_attendance_a_sep')->nullable();
            $table->integer('SF9_g9_attendance_a_oct')->nullable();
            $table->integer('SF9_g9_attendance_a_nov')->nullable();
            $table->integer('SF9_g9_attendance_a_dec')->nullable();
            
            $table->integer('SF9_g10_attendance_a_jan')->nullable();
            $table->integer('SF9_g10_attendance_a_feb')->nullable();
            $table->integer('SF9_g10_attendance_a_mar')->nullable();
            $table->integer('SF9_g10_attendance_a_apr')->nullable();
            $table->integer('SF9_g10_attendance_a_may')->nullable();
            $table->integer('SF9_g10_attendance_a_jun')->nullable();
            $table->integer('SF9_g10_attendance_a_jul')->nullable();
            $table->integer('SF9_g10_attendance_a_aug')->nullable();
            $table->integer('SF9_g10_attendance_a_sep')->nullable();
            $table->integer('SF9_g10_attendance_a_oct')->nullable();
            $table->integer('SF9_g10_attendance_a_nov')->nullable();
            $table->integer('SF9_g10_attendance_a_dec')->nullable();

            // SF9 -> observed values -> maka-diyos
            $table->string('SF9_g7_values_md_r1_qr1', 5)->nullable();
            $table->string('SF9_g7_values_md_r1_qr2', 5)->nullable();
            $table->string('SF9_g7_values_md_r1_qr3', 5)->nullable();
            $table->string('SF9_g7_values_md_r1_qr4', 5)->nullable();
            $table->string('SF9_g7_values_md_r2_qr1', 5)->nullable();
            $table->string('SF9_g7_values_md_r2_qr2', 5)->nullable();
            $table->string('SF9_g7_values_md_r2_qr3', 5)->nullable();
            $table->string('SF9_g7_values_md_r2_qr4', 5)->nullable();

            $table->string('SF9_g8_values_md_r1_qr1', 5)->nullable();
            $table->string('SF9_g8_values_md_r1_qr2', 5)->nullable();
            $table->string('SF9_g8_values_md_r1_qr3', 5)->nullable();
            $table->string('SF9_g8_values_md_r1_qr4', 5)->nullable();
            $table->string('SF9_g8_values_md_r2_qr1', 5)->nullable();
            $table->string('SF9_g8_values_md_r2_qr2', 5)->nullable();
            $table->string('SF9_g8_values_md_r2_qr3', 5)->nullable();
            $table->string('SF9_g8_values_md_r2_qr4', 5)->nullable();

            $table->string('SF9_g9_values_md_r1_qr1', 5)->nullable();
            $table->string('SF9_g9_values_md_r1_qr2', 5)->nullable();
            $table->string('SF9_g9_values_md_r1_qr3', 5)->nullable();
            $table->string('SF9_g9_values_md_r1_qr4', 5)->nullable();
            $table->string('SF9_g9_values_md_r2_qr1', 5)->nullable();
            $table->string('SF9_g9_values_md_r2_qr2', 5)->nullable();
            $table->string('SF9_g9_values_md_r2_qr3', 5)->nullable();
            $table->string('SF9_g9_values_md_r2_qr4', 5)->nullable();

            $table->string('SF9_g10_values_md_r1_qr1', 5)->nullable();
            $table->string('SF9_g10_values_md_r1_qr2', 5)->nullable();
            $table->string('SF9_g10_values_md_r1_qr3', 5)->nullable();
            $table->string('SF9_g10_values_md_r1_qr4', 5)->nullable();
            $table->string('SF9_g10_values_md_r2_qr1', 5)->nullable();
            $table->string('SF9_g10_values_md_r2_qr2', 5)->nullable();
            $table->string('SF9_g10_values_md_r2_qr3', 5)->nullable();
            $table->string('SF9_g10_values_md_r2_qr4', 5)->nullable();

            // SF9 -> observed values -> maka-tao
            $table->string('SF9_g7_values_mt_r1_qr1', 5)->nullable();
            $table->string('SF9_g7_values_mt_r1_qr2', 5)->nullable();
            $table->string('SF9_g7_values_mt_r1_qr3', 5)->nullable();
            $table->string('SF9_g7_values_mt_r1_qr4', 5)->nullable();
            $table->string('SF9_g7_values_mt_r2_qr1', 5)->nullable();
            $table->string('SF9_g7_values_mt_r2_qr2', 5)->nullable();
            $table->string('SF9_g7_values_mt_r2_qr3', 5)->nullable();
            $table->string('SF9_g7_values_mt_r2_qr4', 5)->nullable();

            $table->string('SF9_g8_values_mt_r1_qr1', 5)->nullable();
            $table->string('SF9_g8_values_mt_r1_qr2', 5)->nullable();
            $table->string('SF9_g8_values_mt_r1_qr3', 5)->nullable();
            $table->string('SF9_g8_values_mt_r1_qr4', 5)->nullable();
            $table->string('SF9_g8_values_mt_r2_qr1', 5)->nullable();
            $table->string('SF9_g8_values_mt_r2_qr2', 5)->nullable();
            $table->string('SF9_g8_values_mt_r2_qr3', 5)->nullable();
            $table->string('SF9_g8_values_mt_r2_qr4', 5)->nullable();

            $table->string('SF9_g9_values_mt_r1_qr1', 5)->nullable();
            $table->string('SF9_g9_values_mt_r1_qr2', 5)->nullable();
            $table->string('SF9_g9_values_mt_r1_qr3', 5)->nullable();
            $table->string('SF9_g9_values_mt_r1_qr4', 5)->nullable();
            $table->string('SF9_g9_values_mt_r2_qr1', 5)->nullable();
            $table->string('SF9_g9_values_mt_r2_qr2', 5)->nullable();
            $table->string('SF9_g9_values_mt_r2_qr3', 5)->nullable();
            $table->string('SF9_g9_values_mt_r2_qr4', 5)->nullable();

            $table->string('SF9_g10_values_mt_r1_qr1', 5)->nullable();
            $table->string('SF9_g10_values_mt_r1_qr2', 5)->nullable();
            $table->string('SF9_g10_values_mt_r1_qr3', 5)->nullable();
            $table->string('SF9_g10_values_mt_r1_qr4', 5)->nullable();
            $table->string('SF9_g10_values_mt_r2_qr1', 5)->nullable();
            $table->string('SF9_g10_values_mt_r2_qr2', 5)->nullable();
            $table->string('SF9_g10_values_mt_r2_qr3', 5)->nullable();
            $table->string('SF9_g10_values_mt_r2_qr4', 5)->nullable();

            // SF9 -> observed values -> maka-kalikasan
            $table->string('SF9_g7_values_mk_qr1', 5)->nullable();
            $table->string('SF9_g7_values_mk_qr2', 5)->nullable();
            $table->string('SF9_g7_values_mk_qr3', 5)->nullable();
            $table->string('SF9_g7_values_mk_qr4', 5)->nullable();

            $table->string('SF9_g8_values_mk_qr1', 5)->nullable();
            $table->string('SF9_g8_values_mk_qr2', 5)->nullable();
            $table->string('SF9_g8_values_mk_qr3', 5)->nullable();
            $table->string('SF9_g8_values_mk_qr4', 5)->nullable();

            $table->string('SF9_g9_values_mk_qr1', 5)->nullable();
            $table->string('SF9_g9_values_mk_qr2', 5)->nullable();
            $table->string('SF9_g9_values_mk_qr3', 5)->nullable();
            $table->string('SF9_g9_values_mk_qr4', 5)->nullable();

            $table->string('SF9_g10_values_mk_qr1', 5)->nullable();
            $table->string('SF9_g10_values_mk_qr2', 5)->nullable();
            $table->string('SF9_g10_values_mk_qr3', 5)->nullable();
            $table->string('SF9_g10_values_mk_qr4', 5)->nullable();

            // SF9 -> observed values -> maka-bansa
            $table->string('SF9_g7_values_mb_r1_qr1', 5)->nullable();
            $table->string('SF9_g7_values_mb_r1_qr2', 5)->nullable();
            $table->string('SF9_g7_values_mb_r1_qr3', 5)->nullable();
            $table->string('SF9_g7_values_mb_r1_qr4', 5)->nullable();
            $table->string('SF9_g7_values_mb_r2_qr1', 5)->nullable();
            $table->string('SF9_g7_values_mb_r2_qr2', 5)->nullable();
            $table->string('SF9_g7_values_mb_r2_qr3', 5)->nullable();
            $table->string('SF9_g7_values_mb_r2_qr4', 5)->nullable();

            $table->string('SF9_g8_values_mb_r1_qr1', 5)->nullable();
            $table->string('SF9_g8_values_mb_r1_qr2', 5)->nullable();
            $table->string('SF9_g8_values_mb_r1_qr3', 5)->nullable();
            $table->string('SF9_g8_values_mb_r1_qr4', 5)->nullable();
            $table->string('SF9_g8_values_mb_r2_qr1', 5)->nullable();
            $table->string('SF9_g8_values_mb_r2_qr2', 5)->nullable();
            $table->string('SF9_g8_values_mb_r2_qr3', 5)->nullable();
            $table->string('SF9_g8_values_mb_r2_qr4', 5)->nullable();

            $table->string('SF9_g9_values_mb_r1_qr1', 5)->nullable();
            $table->string('SF9_g9_values_mb_r1_qr2', 5)->nullable();
            $table->string('SF9_g9_values_mb_r1_qr3', 5)->nullable();
            $table->string('SF9_g9_values_mb_r1_qr4', 5)->nullable();
            $table->string('SF9_g9_values_mb_r2_qr1', 5)->nullable();
            $table->string('SF9_g9_values_mb_r2_qr2', 5)->nullable();
            $table->string('SF9_g9_values_mb_r2_qr3', 5)->nullable();
            $table->string('SF9_g9_values_mb_r2_qr4', 5)->nullable();

            $table->string('SF9_g10_values_mb_r1_qr1', 5)->nullable();
            $table->string('SF9_g10_values_mb_r1_qr2', 5)->nullable();
            $table->string('SF9_g10_values_mb_r1_qr3', 5)->nullable();
            $table->string('SF9_g10_values_mb_r1_qr4', 5)->nullable();
            $table->string('SF9_g10_values_mb_r2_qr1', 5)->nullable();
            $table->string('SF9_g10_values_mb_r2_qr2', 5)->nullable();
            $table->string('SF9_g10_values_mb_r2_qr3', 5)->nullable();
            $table->string('SF9_g10_values_mb_r2_qr4', 5)->nullable();
        });
    }
    public function down () : void {
        Schema::dropIfExists('test');
    }
};
