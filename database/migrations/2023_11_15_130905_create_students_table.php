<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('students', function (Blueprint $table) {

            // Todo: Create report card attendance numbers
            // possible a new table with corresponding school years to make a global access for no. of days










            // Learner's information
            $table->id(); // warning: LRN is impossibly long for an integer
            $table->string('li_name_last', 255);
            $table->string('li_name_first', 255);
            $table->string('li_name_middle', 255);
            $table->string('li_sex', 255);
            $table->date('li_birthdate'); // format: yy-mm-dd

            // Scholastic record -> general
            $table->string('sr_g7_school_name', 255)->nullable();
            $table->string('sr_g7_school_id', 255)->nullable();
            $table->string('sr_g7_school_grade', 255)->nullable();
            $table->string('sr_g7_school_section', 255)->nullable();
            $table->string('sr_g7_school_year', 255)->nullable();
            $table->string('sr_g7_school_district', 255)->nullable();
            $table->string('sr_g7_school_division', 255)->nullable();
            $table->string('sr_g7_school_region', 255)->nullable();
            $table->string('sr_g7_school_teacher', 255)->nullable();

            $table->string('sr_g8_school_name', 255)->nullable();
            $table->string('sr_g8_school_id', 255)->nullable();
            $table->string('sr_g8_school_grade', 255)->nullable();
            $table->string('sr_g8_school_section', 255)->nullable();
            $table->string('sr_g8_school_year', 255)->nullable();
            $table->string('sr_g8_school_district', 255)->nullable();
            $table->string('sr_g8_school_division', 255)->nullable();
            $table->string('sr_g8_school_region', 255)->nullable();
            $table->string('sr_g8_school_teacher', 255)->nullable();

            $table->string('sr_g9_school_name', 255)->nullable();
            $table->string('sr_g9_school_id', 255)->nullable();
            $table->string('sr_g9_school_grade', 255)->nullable();
            $table->string('sr_g9_school_section', 255)->nullable();
            $table->string('sr_g9_school_year', 255)->nullable();
            $table->string('sr_g9_school_district', 255)->nullable();
            $table->string('sr_g9_school_division', 255)->nullable();
            $table->string('sr_g9_school_region', 255)->nullable();
            $table->string('sr_g9_school_teacher', 255)->nullable();
            
            $table->string('sr_g10_school_name', 255)->nullable();
            $table->string('sr_g10_school_id', 255)->nullable();
            $table->string('sr_g10_school_grade', 255)->nullable();
            $table->string('sr_g10_school_section', 255)->nullable();
            $table->string('sr_g10_school_year', 255)->nullable();
            $table->string('sr_g10_school_district', 255)->nullable();
            $table->string('sr_g10_school_division', 255)->nullable();
            $table->string('sr_g10_school_region', 255)->nullable();
            $table->string('sr_g10_school_teacher', 255)->nullable();

            // Scholastic record -> subject -> filipino
            $table->integer('sr_g7_subject_fil_qr1')->nullable();
            $table->integer('sr_g7_subject_fil_qr2')->nullable();
            $table->integer('sr_g7_subject_fil_qr3')->nullable();
            $table->integer('sr_g7_subject_fil_qr4')->nullable();
            $table->integer('sr_g7_subject_fil_rem_fr')->nullable();
            $table->integer('sr_g7_subject_fil_rem_cm')->nullable();
            $table->integer('sr_g7_subject_fil_rem_rf')->nullable();

            $table->integer('sr_g8_subject_fil_qr1')->nullable();
            $table->integer('sr_g8_subject_fil_qr2')->nullable();
            $table->integer('sr_g8_subject_fil_qr3')->nullable();
            $table->integer('sr_g8_subject_fil_qr4')->nullable();
            $table->integer('sr_g8_subject_fil_rem_fr')->nullable();
            $table->integer('sr_g8_subject_fil_rem_cm')->nullable();
            $table->integer('sr_g8_subject_fil_rem_rf')->nullable();

            $table->integer('sr_g9_subject_fil_qr1')->nullable();
            $table->integer('sr_g9_subject_fil_qr2')->nullable();
            $table->integer('sr_g9_subject_fil_qr3')->nullable();
            $table->integer('sr_g9_subject_fil_qr4')->nullable();
            $table->integer('sr_g9_subject_fil_rem_fr')->nullable();
            $table->integer('sr_g9_subject_fil_rem_cm')->nullable();
            $table->integer('sr_g9_subject_fil_rem_rf')->nullable();

            $table->integer('sr_g10_subject_fil_qr1')->nullable();
            $table->integer('sr_g10_subject_fil_qr2')->nullable();
            $table->integer('sr_g10_subject_fil_qr3')->nullable();
            $table->integer('sr_g10_subject_fil_qr4')->nullable();
            $table->integer('sr_g10_subject_fil_rem_fr')->nullable();
            $table->integer('sr_g10_subject_fil_rem_cm')->nullable();
            $table->integer('sr_g10_subject_fil_rem_rf')->nullable();

            // Scholastic record -> subject -> english
            $table->integer('sr_g7_subject_eng_qr1')->nullable();
            $table->integer('sr_g7_subject_eng_qr2')->nullable();
            $table->integer('sr_g7_subject_eng_qr3')->nullable();
            $table->integer('sr_g7_subject_eng_qr4')->nullable();
            $table->integer('sr_g7_subject_eng_rem_fr')->nullable();
            $table->integer('sr_g7_subject_eng_rem_cm')->nullable();
            $table->integer('sr_g7_subject_eng_rem_rf')->nullable();

            $table->integer('sr_g8_subject_eng_qr1')->nullable();
            $table->integer('sr_g8_subject_eng_qr2')->nullable();
            $table->integer('sr_g8_subject_eng_qr3')->nullable();
            $table->integer('sr_g8_subject_eng_qr4')->nullable();
            $table->integer('sr_g8_subject_eng_rem_fr')->nullable();
            $table->integer('sr_g8_subject_eng_rem_cm')->nullable();
            $table->integer('sr_g8_subject_eng_rem_rf')->nullable();

            $table->integer('sr_g9_subject_eng_qr1')->nullable();
            $table->integer('sr_g9_subject_eng_qr2')->nullable();
            $table->integer('sr_g9_subject_eng_qr3')->nullable();
            $table->integer('sr_g9_subject_eng_qr4')->nullable();
            $table->integer('sr_g9_subject_eng_rem_fr')->nullable();
            $table->integer('sr_g9_subject_eng_rem_cm')->nullable();
            $table->integer('sr_g9_subject_eng_rem_rf')->nullable();

            $table->integer('sr_g10_subject_eng_qr1')->nullable();
            $table->integer('sr_g10_subject_eng_qr2')->nullable();
            $table->integer('sr_g10_subject_eng_qr3')->nullable();
            $table->integer('sr_g10_subject_eng_qr4')->nullable();
            $table->integer('sr_g10_subject_eng_rem_fr')->nullable();
            $table->integer('sr_g10_subject_eng_rem_cm')->nullable();
            $table->integer('sr_g10_subject_eng_rem_rf')->nullable();

            // Scholastic record -> subject -> mathematics
            $table->integer('sr_g7_subject_mat_qr1')->nullable();
            $table->integer('sr_g7_subject_mat_qr2')->nullable();
            $table->integer('sr_g7_subject_mat_qr3')->nullable();
            $table->integer('sr_g7_subject_mat_qr4')->nullable();
            $table->integer('sr_g7_subject_mat_rem_fr')->nullable();
            $table->integer('sr_g7_subject_mat_rem_cm')->nullable();
            $table->integer('sr_g7_subject_mat_rem_rf')->nullable();

            $table->integer('sr_g8_subject_mat_qr1')->nullable();
            $table->integer('sr_g8_subject_mat_qr2')->nullable();
            $table->integer('sr_g8_subject_mat_qr3')->nullable();
            $table->integer('sr_g8_subject_mat_qr4')->nullable();
            $table->integer('sr_g8_subject_mat_rem_fr')->nullable();
            $table->integer('sr_g8_subject_mat_rem_cm')->nullable();
            $table->integer('sr_g8_subject_mat_rem_rf')->nullable();

            $table->integer('sr_g9_subject_mat_qr1')->nullable();
            $table->integer('sr_g9_subject_mat_qr2')->nullable();
            $table->integer('sr_g9_subject_mat_qr3')->nullable();
            $table->integer('sr_g9_subject_mat_qr4')->nullable();
            $table->integer('sr_g9_subject_mat_rem_fr')->nullable();
            $table->integer('sr_g9_subject_mat_rem_cm')->nullable();
            $table->integer('sr_g9_subject_mat_rem_rf')->nullable();

            $table->integer('sr_g10_subject_mat_qr1')->nullable();
            $table->integer('sr_g10_subject_mat_qr2')->nullable();
            $table->integer('sr_g10_subject_mat_qr3')->nullable();
            $table->integer('sr_g10_subject_mat_qr4')->nullable();
            $table->integer('sr_g10_subject_mat_rem_fr')->nullable();
            $table->integer('sr_g10_subject_mat_rem_cm')->nullable();
            $table->integer('sr_g10_subject_mat_rem_rf')->nullable();

            // Scholastic record -> subject -> science
            $table->integer('sr_g7_subject_sci_qr1')->nullable();
            $table->integer('sr_g7_subject_sci_qr2')->nullable();
            $table->integer('sr_g7_subject_sci_qr3')->nullable();
            $table->integer('sr_g7_subject_sci_qr4')->nullable();
            $table->integer('sr_g7_subject_sci_rem_fr')->nullable();
            $table->integer('sr_g7_subject_sci_rem_cm')->nullable();
            $table->integer('sr_g7_subject_sci_rem_rf')->nullable();

            $table->integer('sr_g8_subject_sci_qr1')->nullable();
            $table->integer('sr_g8_subject_sci_qr2')->nullable();
            $table->integer('sr_g8_subject_sci_qr3')->nullable();
            $table->integer('sr_g8_subject_sci_qr4')->nullable();
            $table->integer('sr_g8_subject_sci_rem_fr')->nullable();
            $table->integer('sr_g8_subject_sci_rem_cm')->nullable();
            $table->integer('sr_g8_subject_sci_rem_rf')->nullable();
            
            $table->integer('sr_g9_subject_sci_qr1')->nullable();
            $table->integer('sr_g9_subject_sci_qr2')->nullable();
            $table->integer('sr_g9_subject_sci_qr3')->nullable();
            $table->integer('sr_g9_subject_sci_qr4')->nullable();
            $table->integer('sr_g9_subject_sci_rem_fr')->nullable();
            $table->integer('sr_g9_subject_sci_rem_cm')->nullable();
            $table->integer('sr_g9_subject_sci_rem_rf')->nullable();
            
            $table->integer('sr_g10_subject_sci_qr1')->nullable();
            $table->integer('sr_g10_subject_sci_qr2')->nullable();
            $table->integer('sr_g10_subject_sci_qr3')->nullable();
            $table->integer('sr_g10_subject_sci_qr4')->nullable();
            $table->integer('sr_g10_subject_sci_rem_fr')->nullable();
            $table->integer('sr_g10_subject_sci_rem_cm')->nullable();
            $table->integer('sr_g10_subject_sci_rem_rf')->nullable();

            // Scholastic record -> subject -> araling panlipunan (ap)
            $table->integer('sr_g7_subject_ap_qr1')->nullable();
            $table->integer('sr_g7_subject_ap_qr2')->nullable();
            $table->integer('sr_g7_subject_ap_qr3')->nullable();
            $table->integer('sr_g7_subject_ap_qr4')->nullable();
            $table->integer('sr_g7_subject_ap_rem_fr')->nullable();
            $table->integer('sr_g7_subject_ap_rem_cm')->nullable();
            $table->integer('sr_g7_subject_ap_rem_rf')->nullable();
            
            $table->integer('sr_g8_subject_ap_qr1')->nullable();
            $table->integer('sr_g8_subject_ap_qr2')->nullable();
            $table->integer('sr_g8_subject_ap_qr3')->nullable();
            $table->integer('sr_g8_subject_ap_qr4')->nullable();
            $table->integer('sr_g8_subject_ap_rem_fr')->nullable();
            $table->integer('sr_g8_subject_ap_rem_cm')->nullable();
            $table->integer('sr_g8_subject_ap_rem_rf')->nullable();
            
            $table->integer('sr_g9_subject_ap_qr1')->nullable();
            $table->integer('sr_g9_subject_ap_qr2')->nullable();
            $table->integer('sr_g9_subject_ap_qr3')->nullable();
            $table->integer('sr_g9_subject_ap_qr4')->nullable();
            $table->integer('sr_g9_subject_ap_rem_fr')->nullable();
            $table->integer('sr_g9_subject_ap_rem_cm')->nullable();
            $table->integer('sr_g9_subject_ap_rem_rf')->nullable();
            
            $table->integer('sr_g10_subject_ap_qr1')->nullable();
            $table->integer('sr_g10_subject_ap_qr2')->nullable();
            $table->integer('sr_g10_subject_ap_qr3')->nullable();
            $table->integer('sr_g10_subject_ap_qr4')->nullable();
            $table->integer('sr_g10_subject_ap_rem_fr')->nullable();
            $table->integer('sr_g10_subject_ap_rem_cm')->nullable();
            $table->integer('sr_g10_subject_ap_rem_rf')->nullable();

            // Scholastic record -> subject -> edukasyon pagpapakatao (ep)
            $table->integer('sr_g7_subject_ep_qr1')->nullable();
            $table->integer('sr_g7_subject_ep_qr2')->nullable();
            $table->integer('sr_g7_subject_ep_qr3')->nullable();
            $table->integer('sr_g7_subject_ep_qr4')->nullable();
            $table->integer('sr_g7_subject_ep_rem_fr')->nullable();
            $table->integer('sr_g7_subject_ep_rem_cm')->nullable();
            $table->integer('sr_g7_subject_ep_rem_rf')->nullable();

            $table->integer('sr_g8_subject_ep_qr1')->nullable();
            $table->integer('sr_g8_subject_ep_qr2')->nullable();
            $table->integer('sr_g8_subject_ep_qr3')->nullable();
            $table->integer('sr_g8_subject_ep_qr4')->nullable();
            $table->integer('sr_g8_subject_ep_rem_fr')->nullable();
            $table->integer('sr_g8_subject_ep_rem_cm')->nullable();
            $table->integer('sr_g8_subject_ep_rem_rf')->nullable();

            $table->integer('sr_g9_subject_ep_qr1')->nullable();
            $table->integer('sr_g9_subject_ep_qr2')->nullable();
            $table->integer('sr_g9_subject_ep_qr3')->nullable();
            $table->integer('sr_g9_subject_ep_qr4')->nullable();
            $table->integer('sr_g9_subject_ep_rem_fr')->nullable();
            $table->integer('sr_g9_subject_ep_rem_cm')->nullable();
            $table->integer('sr_g9_subject_ep_rem_rf')->nullable();

            $table->integer('sr_g10_subject_ep_qr1')->nullable();
            $table->integer('sr_g10_subject_ep_qr2')->nullable();
            $table->integer('sr_g10_subject_ep_qr3')->nullable();
            $table->integer('sr_g10_subject_ep_qr4')->nullable();
            $table->integer('sr_g10_subject_ep_rem_fr')->nullable();
            $table->integer('sr_g10_subject_ep_rem_cm')->nullable();
            $table->integer('sr_g10_subject_ep_rem_rf')->nullable();

            // Scholastic record -> subject -> technology and livelihood education (tle)
            $table->integer('sr_g7_subject_tle_qr1')->nullable();
            $table->integer('sr_g7_subject_tle_qr2')->nullable();
            $table->integer('sr_g7_subject_tle_qr3')->nullable();
            $table->integer('sr_g7_subject_tle_qr4')->nullable();
            $table->integer('sr_g7_subject_tle_rem_fr')->nullable();
            $table->integer('sr_g7_subject_tle_rem_cm')->nullable();
            $table->integer('sr_g7_subject_tle_rem_rf')->nullable();

            $table->integer('sr_g8_subject_tle_qr1')->nullable();
            $table->integer('sr_g8_subject_tle_qr2')->nullable();
            $table->integer('sr_g8_subject_tle_qr3')->nullable();
            $table->integer('sr_g8_subject_tle_qr4')->nullable();
            $table->integer('sr_g8_subject_tle_rem_fr')->nullable();
            $table->integer('sr_g8_subject_tle_rem_cm')->nullable();
            $table->integer('sr_g8_subject_tle_rem_rf')->nullable();

            $table->integer('sr_g9_subject_tle_qr1')->nullable();
            $table->integer('sr_g9_subject_tle_qr2')->nullable();
            $table->integer('sr_g9_subject_tle_qr3')->nullable();
            $table->integer('sr_g9_subject_tle_qr4')->nullable();
            $table->integer('sr_g9_subject_tle_rem_fr')->nullable();
            $table->integer('sr_g9_subject_tle_rem_cm')->nullable();
            $table->integer('sr_g9_subject_tle_rem_rf')->nullable();

            $table->integer('sr_g10_subject_tle_qr1')->nullable();
            $table->integer('sr_g10_subject_tle_qr2')->nullable();
            $table->integer('sr_g10_subject_tle_qr3')->nullable();
            $table->integer('sr_g10_subject_tle_qr4')->nullable();
            $table->integer('sr_g10_subject_tle_rem_fr')->nullable();
            $table->integer('sr_g10_subject_tle_rem_cm')->nullable();
            $table->integer('sr_g10_subject_tle_rem_rf')->nullable();

            // Scholastic record -> subject -> music
            $table->integer('sr_g7_subject_mus_qr1')->nullable();
            $table->integer('sr_g7_subject_mus_qr2')->nullable();
            $table->integer('sr_g7_subject_mus_qr3')->nullable();
            $table->integer('sr_g7_subject_mus_qr4')->nullable();
            $table->integer('sr_g7_subject_mus_rem_fr')->nullable();
            $table->integer('sr_g7_subject_mus_rem_cm')->nullable();
            $table->integer('sr_g7_subject_mus_rem_rf')->nullable();

            $table->integer('sr_g8_subject_mus_qr1')->nullable();
            $table->integer('sr_g8_subject_mus_qr2')->nullable();
            $table->integer('sr_g8_subject_mus_qr3')->nullable();
            $table->integer('sr_g8_subject_mus_qr4')->nullable();
            $table->integer('sr_g8_subject_mus_rem_fr')->nullable();
            $table->integer('sr_g8_subject_mus_rem_cm')->nullable();
            $table->integer('sr_g8_subject_mus_rem_rf')->nullable();

            $table->integer('sr_g9_subject_mus_qr1')->nullable();
            $table->integer('sr_g9_subject_mus_qr2')->nullable();
            $table->integer('sr_g9_subject_mus_qr3')->nullable();
            $table->integer('sr_g9_subject_mus_qr4')->nullable();
            $table->integer('sr_g9_subject_mus_rem_fr')->nullable();
            $table->integer('sr_g9_subject_mus_rem_cm')->nullable();
            $table->integer('sr_g9_subject_mus_rem_rf')->nullable();

            $table->integer('sr_g10_subject_mus_qr1')->nullable();
            $table->integer('sr_g10_subject_mus_qr2')->nullable();
            $table->integer('sr_g10_subject_mus_qr3')->nullable();
            $table->integer('sr_g10_subject_mus_qr4')->nullable();
            $table->integer('sr_g10_subject_mus_rem_fr')->nullable();
            $table->integer('sr_g10_subject_mus_rem_cm')->nullable();
            $table->integer('sr_g10_subject_mus_rem_rf')->nullable();

            // Scholastic record -> subject -> arts
            $table->integer('sr_g7_subject_art_qr1')->nullable();
            $table->integer('sr_g7_subject_art_qr2')->nullable();
            $table->integer('sr_g7_subject_art_qr3')->nullable();
            $table->integer('sr_g7_subject_art_qr4')->nullable();
            $table->integer('sr_g7_subject_art_rem_fr')->nullable();
            $table->integer('sr_g7_subject_art_rem_cm')->nullable();
            $table->integer('sr_g7_subject_art_rem_rf')->nullable();

            $table->integer('sr_g8_subject_art_qr1')->nullable();
            $table->integer('sr_g8_subject_art_qr2')->nullable();
            $table->integer('sr_g8_subject_art_qr3')->nullable();
            $table->integer('sr_g8_subject_art_qr4')->nullable();
            $table->integer('sr_g8_subject_art_rem_fr')->nullable();
            $table->integer('sr_g8_subject_art_rem_cm')->nullable();
            $table->integer('sr_g8_subject_art_rem_rf')->nullable();

            $table->integer('sr_g9_subject_art_qr1')->nullable();
            $table->integer('sr_g9_subject_art_qr2')->nullable();
            $table->integer('sr_g9_subject_art_qr3')->nullable();
            $table->integer('sr_g9_subject_art_qr4')->nullable();
            $table->integer('sr_g9_subject_art_rem_fr')->nullable();
            $table->integer('sr_g9_subject_art_rem_cm')->nullable();
            $table->integer('sr_g9_subject_art_rem_rf')->nullable();

            $table->integer('sr_g10_subject_art_qr1')->nullable();
            $table->integer('sr_g10_subject_art_qr2')->nullable();
            $table->integer('sr_g10_subject_art_qr3')->nullable();
            $table->integer('sr_g10_subject_art_qr4')->nullable();
            $table->integer('sr_g10_subject_art_rem_fr')->nullable();
            $table->integer('sr_g10_subject_art_rem_cm')->nullable();
            $table->integer('sr_g10_subject_art_rem_rf')->nullable();

            // Scholastic record -> subject -> physical education
            $table->integer('sr_g7_subject_pe_qr1')->nullable();
            $table->integer('sr_g7_subject_pe_qr2')->nullable();
            $table->integer('sr_g7_subject_pe_qr3')->nullable();
            $table->integer('sr_g7_subject_pe_qr4')->nullable();
            $table->integer('sr_g7_subject_pe_rem_fr')->nullable();
            $table->integer('sr_g7_subject_pe_rem_cm')->nullable();
            $table->integer('sr_g7_subject_pe_rem_rf')->nullable();

            $table->integer('sr_g8_subject_pe_qr1')->nullable();
            $table->integer('sr_g8_subject_pe_qr2')->nullable();
            $table->integer('sr_g8_subject_pe_qr3')->nullable();
            $table->integer('sr_g8_subject_pe_qr4')->nullable();
            $table->integer('sr_g8_subject_pe_rem_fr')->nullable();
            $table->integer('sr_g8_subject_pe_rem_cm')->nullable();
            $table->integer('sr_g8_subject_pe_rem_rf')->nullable();

            $table->integer('sr_g9_subject_pe_qr1')->nullable();
            $table->integer('sr_g9_subject_pe_qr2')->nullable();
            $table->integer('sr_g9_subject_pe_qr3')->nullable();
            $table->integer('sr_g9_subject_pe_qr4')->nullable();
            $table->integer('sr_g9_subject_pe_rem_fr')->nullable();
            $table->integer('sr_g9_subject_pe_rem_cm')->nullable();
            $table->integer('sr_g9_subject_pe_rem_rf')->nullable();

            $table->integer('sr_g10_subject_pe_qr1')->nullable();
            $table->integer('sr_g10_subject_pe_qr2')->nullable();
            $table->integer('sr_g10_subject_pe_qr3')->nullable();
            $table->integer('sr_g10_subject_pe_qr4')->nullable();
            $table->integer('sr_g10_subject_pe_rem_fr')->nullable();
            $table->integer('sr_g10_subject_pe_rem_cm')->nullable();
            $table->integer('sr_g10_subject_pe_rem_rf')->nullable();

            // Scholastic record -> subject -> health
            $table->integer('sr_g7_subject_hp_qr1')->nullable();
            $table->integer('sr_g7_subject_hp_qr2')->nullable();
            $table->integer('sr_g7_subject_hp_qr3')->nullable();
            $table->integer('sr_g7_subject_hp_qr4')->nullable();
            $table->integer('sr_g7_subject_hp_rem_fr')->nullable();
            $table->integer('sr_g7_subject_hp_rem_cm')->nullable();
            $table->integer('sr_g7_subject_hp_rem_rf')->nullable();


            $table->integer('sr_g8_subject_hp_qr1')->nullable();
            $table->integer('sr_g8_subject_hp_qr2')->nullable();
            $table->integer('sr_g8_subject_hp_qr3')->nullable();
            $table->integer('sr_g8_subject_hp_qr4')->nullable();
            $table->integer('sr_g8_subject_hp_rem_fr')->nullable();
            $table->integer('sr_g8_subject_hp_rem_cm')->nullable();
            $table->integer('sr_g8_subject_hp_rem_rf')->nullable();

            $table->integer('sr_g9_subject_hp_qr1')->nullable();
            $table->integer('sr_g9_subject_hp_qr2')->nullable();
            $table->integer('sr_g9_subject_hp_qr3')->nullable();
            $table->integer('sr_g9_subject_hp_qr4')->nullable();
            $table->integer('sr_g9_subject_hp_rem_fr')->nullable();
            $table->integer('sr_g9_subject_hp_rem_cm')->nullable();
            $table->integer('sr_g9_subject_hp_rem_rf')->nullable();

            $table->integer('sr_g10_subject_hp_qr1')->nullable();
            $table->integer('sr_g10_subject_hp_qr2')->nullable();
            $table->integer('sr_g10_subject_hp_qr3')->nullable();
            $table->integer('sr_g10_subject_hp_qr4')->nullable();
            $table->integer('sr_g10_subject_hp_rem_fr')->nullable();
            $table->integer('sr_g10_subject_hp_rem_cm')->nullable();
            $table->integer('sr_g10_subject_hp_rem_rf')->nullable();

            // Grade card -> observed values
            $table->string('gc_g7_values_md_qr1', 255)->nullable();
            $table->string('gc_g7_values_md_qr2', 255)->nullable();
            $table->string('gc_g7_values_md_qr3', 255)->nullable();
            $table->string('gc_g7_values_md_qr4', 255)->nullable();

            $table->string('gc_g8_values_md_qr1', 255)->nullable();
            $table->string('gc_g8_values_md_qr2', 255)->nullable();
            $table->string('gc_g8_values_md_qr3', 255)->nullable();
            $table->string('gc_g8_values_md_qr4', 255)->nullable();

            $table->string('gc_g9_values_md_qr1', 255)->nullable();
            $table->string('gc_g9_values_md_qr2', 255)->nullable();
            $table->string('gc_g9_values_md_qr3', 255)->nullable();
            $table->string('gc_g9_values_md_qr4', 255)->nullable();

            $table->string('gc_g10_values_md_qr1', 255)->nullable();
            $table->string('gc_g10_values_md_qr2', 255)->nullable();
            $table->string('gc_g10_values_md_qr3', 255)->nullable();
            $table->string('gc_g10_values_md_qr4', 255)->nullable();
        });
    }
    public function down() : void {
        Schema::dropIfExists('students');
    }
};
