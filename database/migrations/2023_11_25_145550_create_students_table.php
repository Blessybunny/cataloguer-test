<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        // 01 | ALL -> learner's information
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('li_learner_reference_number', 100)->unique();
            $table->string('li_name_last', 50);
            $table->string('li_name_first', 50);
            $table->string('li_name_middle', 10);
            $table->string('li_sex', 10);
            $table->smallInteger('li_birthdate_year');
            $table->tinyInteger('li_birthdate_month');
            $table->tinyInteger('li_birthdate_day');
        });

        // 02 | ALL -> scholastic record -> general
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('SF9_g7_age')->nullable();
            $table->tinyInteger('ALL_g7_school_grade')->nullable();
            $table->string('ALL_g7_school_name', 100)->nullable();
            $table->string('ALL_g7_school_id')->nullable();
            $table->string('ALL_g7_school_section', 100)->nullable();
            $table->string('ALL_g7_school_year', 100)->nullable();
            $table->string('ALL_g7_school_district', 100)->nullable();
            $table->string('ALL_g7_school_division', 100)->nullable();
            $table->string('ALL_g7_school_region', 100)->nullable();
            $table->string('ALL_g7_school_teacher', 100)->nullable();

            $table->tinyInteger('SF9_g8_age')->nullable();
            $table->tinyInteger('ALL_g8_school_grade')->nullable();
            $table->string('ALL_g8_school_name', 100)->nullable();
            $table->string('ALL_g8_school_id', 100)->nullable();
            $table->string('ALL_g8_school_section', 100)->nullable();
            $table->string('ALL_g8_school_year', 100)->nullable();
            $table->string('ALL_g8_school_district', 100)->nullable();
            $table->string('ALL_g8_school_division', 100)->nullable();
            $table->string('ALL_g8_school_region', 100)->nullable();
            $table->string('ALL_g8_school_teacher', 100)->nullable();

            $table->tinyInteger('SF9_g9_age')->nullable();
            $table->tinyInteger('ALL_g9_school_grade')->nullable();
            $table->string('ALL_g9_school_name', 100)->nullable();
            $table->string('ALL_g9_school_id', 100)->nullable();
            $table->string('ALL_g9_school_section', 100)->nullable();
            $table->string('ALL_g9_school_year', 100)->nullable();
            $table->string('ALL_g9_school_district', 100)->nullable();
            $table->string('ALL_g9_school_division', 100)->nullable();
            $table->string('ALL_g9_school_region', 100)->nullable();
            $table->string('ALL_g9_school_teacher', 100)->nullable();
            
            $table->tinyInteger('SF9_g10_age')->nullable();
            $table->tinyInteger('ALL_g10_school_grade')->nullable();
            $table->string('ALL_g10_school_name', 100)->nullable();
            $table->string('ALL_g10_school_id', 100)->nullable();
            $table->string('ALL_g10_school_section', 100)->nullable();
            $table->string('ALL_g10_school_year', 100)->nullable();
            $table->string('ALL_g10_school_district', 100)->nullable();
            $table->string('ALL_g10_school_division', 100)->nullable();
            $table->string('ALL_g10_school_region', 100)->nullable();
            $table->string('ALL_g10_school_teacher', 100)->nullable();
        });

        // COMPLETE: 03 | ALL -> scholastic record -> subject -> filipino
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_fil_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_fil_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_fil_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_fil_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_fil_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_fil_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_fil_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_fil_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_fil_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_fil_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_fil_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_fil_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_fil_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_fil_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_fil_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_fil_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_fil_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_fil_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_fil_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_fil_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_fil_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_fil_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_fil_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_fil_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_fil_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_fil_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_fil_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_fil_rem_rf')->nullable();
        });

        // COMPLETE: 04 | ALL -> scholastic record -> subject -> english
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_eng_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_eng_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_eng_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_eng_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_eng_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_eng_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_eng_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_eng_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_eng_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_eng_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_eng_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_eng_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_eng_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_eng_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_eng_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_eng_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_eng_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_eng_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_eng_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_eng_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_eng_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_eng_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_eng_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_eng_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_eng_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_eng_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_eng_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_eng_rem_rf')->nullable();
        });

        // COMPLETE: 05 | ALL -> scholastic record -> subject -> mathematics
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_mat_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_mat_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_mat_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_mat_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_mat_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_mat_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_mat_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_mat_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_mat_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_mat_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_mat_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_mat_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_mat_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_mat_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_mat_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_mat_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_mat_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_mat_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_mat_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_mat_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_mat_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_mat_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_mat_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_mat_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_mat_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_mat_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_mat_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_mat_rem_rf')->nullable();
        });

        // COMPLETE: 06 | ALL -> scholastic record -> subject -> science
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_sci_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_sci_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_sci_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_sci_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_sci_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_sci_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_sci_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_sci_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_sci_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_sci_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_sci_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_sci_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_sci_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_sci_rem_rf')->nullable();
            
            $table->tinyInteger('ALL_g9_subject_sci_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_sci_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_sci_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_sci_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_sci_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_sci_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_sci_rem_rf')->nullable();
            
            $table->tinyInteger('ALL_g10_subject_sci_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_sci_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_sci_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_sci_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_sci_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_sci_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_sci_rem_rf')->nullable();
        });

        // COMPLETE: 07 | ALL -> scholastic record -> subject -> araling panlipunan (ap)
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_ap_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_ap_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_ap_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_ap_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_ap_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_ap_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_ap_rem_rf')->nullable();
            
            $table->tinyInteger('ALL_g8_subject_ap_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_ap_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_ap_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_ap_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_ap_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_ap_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_ap_rem_rf')->nullable();
            
            $table->tinyInteger('ALL_g9_subject_ap_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_ap_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_ap_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_ap_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_ap_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_ap_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_ap_rem_rf')->nullable();
            
            $table->tinyInteger('ALL_g10_subject_ap_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_ap_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_ap_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_ap_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_ap_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_ap_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_ap_rem_rf')->nullable();
        });

        // COMPLETE: 08 | ALL -> scholastic record -> subject -> edukasyon sa pagpapakatao (ep)
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_ep_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_ep_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_ep_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_ep_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_ep_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_ep_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_ep_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_ep_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_ep_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_ep_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_ep_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_ep_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_ep_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_ep_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_ep_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_ep_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_ep_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_ep_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_ep_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_ep_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_ep_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_ep_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_ep_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_ep_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_ep_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_ep_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_ep_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_ep_rem_rf')->nullable();
        });

        // COMPLETE: 09 | ALL -> scholastic record -> subject -> technology and livelihood education (tle)
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_tle_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_tle_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_tle_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_tle_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_tle_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_tle_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_tle_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_tle_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_tle_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_tle_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_tle_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_tle_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_tle_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_tle_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_tle_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_tle_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_tle_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_tle_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_tle_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_tle_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_tle_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_tle_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_tle_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_tle_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_tle_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_tle_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_tle_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_tle_rem_rf')->nullable();
        });

        // COMPLETE: 10 | ALL -> scholastic record -> subject -> music
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_mus_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_mus_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_mus_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_mus_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_mus_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_mus_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_mus_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_mus_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_mus_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_mus_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_mus_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_mus_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_mus_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_mus_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_mus_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_mus_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_mus_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_mus_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_mus_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_mus_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_mus_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_mus_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_mus_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_mus_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_mus_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_mus_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_mus_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_mus_rem_rf')->nullable();
        });

        // COMPLETE: 11 | ALL -> scholastic record -> subject -> arts
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_art_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_art_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_art_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_art_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_art_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_art_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_art_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_art_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_art_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_art_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_art_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_art_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_art_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_art_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_art_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_art_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_art_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_art_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_art_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_art_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_art_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_art_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_art_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_art_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_art_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_art_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_art_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_art_rem_rf')->nullable();
        });

        // COMPLETE: 12 | ALL -> scholastic record -> subject -> physical education
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_pe_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_pe_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_pe_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_pe_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_pe_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_pe_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_pe_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_pe_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_pe_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_pe_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_pe_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_pe_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_pe_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_pe_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_pe_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_pe_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_pe_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_pe_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_pe_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_pe_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_pe_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_pe_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_pe_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_pe_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_pe_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_pe_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_pe_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_pe_rem_rf')->nullable();
        });

        // COMPLETE: 13 | ALL -> scholastic record -> subject -> health
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('ALL_g7_subject_hp_qr1')->nullable();
            $table->tinyInteger('ALL_g7_subject_hp_qr2')->nullable();
            $table->tinyInteger('ALL_g7_subject_hp_qr3')->nullable();
            $table->tinyInteger('ALL_g7_subject_hp_qr4')->nullable();
            $table->tinyInteger('ALL_g7_subject_hp_rem_fr')->nullable();
            $table->tinyInteger('ALL_g7_subject_hp_rem_cm')->nullable();
            $table->tinyInteger('ALL_g7_subject_hp_rem_rf')->nullable();

            $table->tinyInteger('ALL_g8_subject_hp_qr1')->nullable();
            $table->tinyInteger('ALL_g8_subject_hp_qr2')->nullable();
            $table->tinyInteger('ALL_g8_subject_hp_qr3')->nullable();
            $table->tinyInteger('ALL_g8_subject_hp_qr4')->nullable();
            $table->tinyInteger('ALL_g8_subject_hp_rem_fr')->nullable();
            $table->tinyInteger('ALL_g8_subject_hp_rem_cm')->nullable();
            $table->tinyInteger('ALL_g8_subject_hp_rem_rf')->nullable();

            $table->tinyInteger('ALL_g9_subject_hp_qr1')->nullable();
            $table->tinyInteger('ALL_g9_subject_hp_qr2')->nullable();
            $table->tinyInteger('ALL_g9_subject_hp_qr3')->nullable();
            $table->tinyInteger('ALL_g9_subject_hp_qr4')->nullable();
            $table->tinyInteger('ALL_g9_subject_hp_rem_fr')->nullable();
            $table->tinyInteger('ALL_g9_subject_hp_rem_cm')->nullable();
            $table->tinyInteger('ALL_g9_subject_hp_rem_rf')->nullable();

            $table->tinyInteger('ALL_g10_subject_hp_qr1')->nullable();
            $table->tinyInteger('ALL_g10_subject_hp_qr2')->nullable();
            $table->tinyInteger('ALL_g10_subject_hp_qr3')->nullable();
            $table->tinyInteger('ALL_g10_subject_hp_qr4')->nullable();
            $table->tinyInteger('ALL_g10_subject_hp_rem_fr')->nullable();
            $table->tinyInteger('ALL_g10_subject_hp_rem_cm')->nullable();
            $table->tinyInteger('ALL_g10_subject_hp_rem_rf')->nullable();
        });

        // COMPLETE: 14 | SF9 -> attendance -> days present
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('SF9_g7_attendance_p_jan')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_feb')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_mar')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_apr')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_may')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_jun')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_jul')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_aug')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_sep')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_oct')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_nov')->nullable();
            $table->tinyInteger('SF9_g7_attendance_p_dec')->nullable();
            
            $table->tinyInteger('SF9_g8_attendance_p_jan')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_feb')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_mar')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_apr')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_may')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_jun')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_jul')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_aug')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_sep')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_oct')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_nov')->nullable();
            $table->tinyInteger('SF9_g8_attendance_p_dec')->nullable();
            
            $table->tinyInteger('SF9_g9_attendance_p_jan')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_feb')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_mar')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_apr')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_may')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_jun')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_jul')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_aug')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_sep')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_oct')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_nov')->nullable();
            $table->tinyInteger('SF9_g9_attendance_p_dec')->nullable();
            
            $table->tinyInteger('SF9_g10_attendance_p_jan')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_feb')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_mar')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_apr')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_may')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_jun')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_jul')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_aug')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_sep')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_oct')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_nov')->nullable();
            $table->tinyInteger('SF9_g10_attendance_p_dec')->nullable();
        });

        // COMPLETE: 15 | SF9 -> attendance -> days absent
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('SF9_g7_attendance_a_jan')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_feb')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_mar')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_apr')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_may')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_jun')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_jul')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_aug')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_sep')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_oct')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_nov')->nullable();
            $table->tinyInteger('SF9_g7_attendance_a_dec')->nullable();
            
            $table->tinyInteger('SF9_g8_attendance_a_jan')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_feb')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_mar')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_apr')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_may')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_jun')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_jul')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_aug')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_sep')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_oct')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_nov')->nullable();
            $table->tinyInteger('SF9_g8_attendance_a_dec')->nullable();
            
            $table->tinyInteger('SF9_g9_attendance_a_jan')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_feb')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_mar')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_apr')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_may')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_jun')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_jul')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_aug')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_sep')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_oct')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_nov')->nullable();
            $table->tinyInteger('SF9_g9_attendance_a_dec')->nullable();
            
            $table->tinyInteger('SF9_g10_attendance_a_jan')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_feb')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_mar')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_apr')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_may')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_jun')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_jul')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_aug')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_sep')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_oct')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_nov')->nullable();
            $table->tinyInteger('SF9_g10_attendance_a_dec')->nullable();
        });

        // COMPLETE: 16 | SF9 -> observed values -> maka - diyos
        Schema::table('students', function (Blueprint $table) {
            $table->string('SF9_g7_values_md_s1_qr1', 2)->nullable();
            $table->string('SF9_g7_values_md_s1_qr2', 2)->nullable();
            $table->string('SF9_g7_values_md_s1_qr3', 2)->nullable();
            $table->string('SF9_g7_values_md_s1_qr4', 2)->nullable();
            $table->string('SF9_g7_values_md_s2_qr1', 2)->nullable();
            $table->string('SF9_g7_values_md_s2_qr2', 2)->nullable();
            $table->string('SF9_g7_values_md_s2_qr3', 2)->nullable();
            $table->string('SF9_g7_values_md_s2_qr4', 2)->nullable();

            $table->string('SF9_g8_values_md_s1_qr1', 2)->nullable();
            $table->string('SF9_g8_values_md_s1_qr2', 2)->nullable();
            $table->string('SF9_g8_values_md_s1_qr3', 2)->nullable();
            $table->string('SF9_g8_values_md_s1_qr4', 2)->nullable();
            $table->string('SF9_g8_values_md_s2_qr1', 2)->nullable();
            $table->string('SF9_g8_values_md_s2_qr2', 2)->nullable();
            $table->string('SF9_g8_values_md_s2_qr3', 2)->nullable();
            $table->string('SF9_g8_values_md_s2_qr4', 2)->nullable();

            $table->string('SF9_g9_values_md_s1_qr1', 2)->nullable();
            $table->string('SF9_g9_values_md_s1_qr2', 2)->nullable();
            $table->string('SF9_g9_values_md_s1_qr3', 2)->nullable();
            $table->string('SF9_g9_values_md_s1_qr4', 2)->nullable();
            $table->string('SF9_g9_values_md_s2_qr1', 2)->nullable();
            $table->string('SF9_g9_values_md_s2_qr2', 2)->nullable();
            $table->string('SF9_g9_values_md_s2_qr3', 2)->nullable();
            $table->string('SF9_g9_values_md_s2_qr4', 2)->nullable();

            $table->string('SF9_g10_values_md_s1_qr1', 2)->nullable();
            $table->string('SF9_g10_values_md_s1_qr2', 2)->nullable();
            $table->string('SF9_g10_values_md_s1_qr3', 2)->nullable();
            $table->string('SF9_g10_values_md_s1_qr4', 2)->nullable();
            $table->string('SF9_g10_values_md_s2_qr1', 2)->nullable();
            $table->string('SF9_g10_values_md_s2_qr2', 2)->nullable();
            $table->string('SF9_g10_values_md_s2_qr3', 2)->nullable();
            $table->string('SF9_g10_values_md_s2_qr4', 2)->nullable();
        });

        // COMPLETE: 17 | SF9 -> observed values -> maka - tao
        Schema::table('students', function (Blueprint $table) {
            $table->string('SF9_g7_values_mt_s1_qr1', 2)->nullable();
            $table->string('SF9_g7_values_mt_s1_qr2', 2)->nullable();
            $table->string('SF9_g7_values_mt_s1_qr3', 2)->nullable();
            $table->string('SF9_g7_values_mt_s1_qr4', 2)->nullable();
            $table->string('SF9_g7_values_mt_s2_qr1', 2)->nullable();
            $table->string('SF9_g7_values_mt_s2_qr2', 2)->nullable();
            $table->string('SF9_g7_values_mt_s2_qr3', 2)->nullable();
            $table->string('SF9_g7_values_mt_s2_qr4', 2)->nullable();

            $table->string('SF9_g8_values_mt_s1_qr1', 2)->nullable();
            $table->string('SF9_g8_values_mt_s1_qr2', 2)->nullable();
            $table->string('SF9_g8_values_mt_s1_qr3', 2)->nullable();
            $table->string('SF9_g8_values_mt_s1_qr4', 2)->nullable();
            $table->string('SF9_g8_values_mt_s2_qr1', 2)->nullable();
            $table->string('SF9_g8_values_mt_s2_qr2', 2)->nullable();
            $table->string('SF9_g8_values_mt_s2_qr3', 2)->nullable();
            $table->string('SF9_g8_values_mt_s2_qr4', 2)->nullable();

            $table->string('SF9_g9_values_mt_s1_qr1', 2)->nullable();
            $table->string('SF9_g9_values_mt_s1_qr2', 2)->nullable();
            $table->string('SF9_g9_values_mt_s1_qr3', 2)->nullable();
            $table->string('SF9_g9_values_mt_s1_qr4', 2)->nullable();
            $table->string('SF9_g9_values_mt_s2_qr1', 2)->nullable();
            $table->string('SF9_g9_values_mt_s2_qr2', 2)->nullable();
            $table->string('SF9_g9_values_mt_s2_qr3', 2)->nullable();
            $table->string('SF9_g9_values_mt_s2_qr4', 2)->nullable();

            $table->string('SF9_g10_values_mt_s1_qr1', 2)->nullable();
            $table->string('SF9_g10_values_mt_s1_qr2', 2)->nullable();
            $table->string('SF9_g10_values_mt_s1_qr3', 2)->nullable();
            $table->string('SF9_g10_values_mt_s1_qr4', 2)->nullable();
            $table->string('SF9_g10_values_mt_s2_qr1', 2)->nullable();
            $table->string('SF9_g10_values_mt_s2_qr2', 2)->nullable();
            $table->string('SF9_g10_values_mt_s2_qr3', 2)->nullable();
            $table->string('SF9_g10_values_mt_s2_qr4', 2)->nullable();
        });

        // COMPLETE: 18 | SF9 -> observed values -> maka - kalikasan
        Schema::table('students', function (Blueprint $table) {
            $table->string('SF9_g7_values_mk_qr1', 2)->nullable();
            $table->string('SF9_g7_values_mk_qr2', 2)->nullable();
            $table->string('SF9_g7_values_mk_qr3', 2)->nullable();
            $table->string('SF9_g7_values_mk_qr4', 2)->nullable();

            $table->string('SF9_g8_values_mk_qr1', 2)->nullable();
            $table->string('SF9_g8_values_mk_qr2', 2)->nullable();
            $table->string('SF9_g8_values_mk_qr3', 2)->nullable();
            $table->string('SF9_g8_values_mk_qr4', 2)->nullable();

            $table->string('SF9_g9_values_mk_qr1', 2)->nullable();
            $table->string('SF9_g9_values_mk_qr2', 2)->nullable();
            $table->string('SF9_g9_values_mk_qr3', 2)->nullable();
            $table->string('SF9_g9_values_mk_qr4', 2)->nullable();

            $table->string('SF9_g10_values_mk_qr1', 2)->nullable();
            $table->string('SF9_g10_values_mk_qr2', 2)->nullable();
            $table->string('SF9_g10_values_mk_qr3', 2)->nullable();
            $table->string('SF9_g10_values_mk_qr4', 2)->nullable();
        });

        // COMPLETE: 19 | SF9 -> observed values -> maka - bansa
        Schema::table('students', function (Blueprint $table) {
            $table->string('SF9_g7_values_mb_s1_qr1', 2)->nullable();
            $table->string('SF9_g7_values_mb_s1_qr2', 2)->nullable();
            $table->string('SF9_g7_values_mb_s1_qr3', 2)->nullable();
            $table->string('SF9_g7_values_mb_s1_qr4', 2)->nullable();
            $table->string('SF9_g7_values_mb_s2_qr1', 2)->nullable();
            $table->string('SF9_g7_values_mb_s2_qr2', 2)->nullable();
            $table->string('SF9_g7_values_mb_s2_qr3', 2)->nullable();
            $table->string('SF9_g7_values_mb_s2_qr4', 2)->nullable();

            $table->string('SF9_g8_values_mb_s1_qr1', 2)->nullable();
            $table->string('SF9_g8_values_mb_s1_qr2', 2)->nullable();
            $table->string('SF9_g8_values_mb_s1_qr3', 2)->nullable();
            $table->string('SF9_g8_values_mb_s1_qr4', 2)->nullable();
            $table->string('SF9_g8_values_mb_s2_qr1', 2)->nullable();
            $table->string('SF9_g8_values_mb_s2_qr2', 2)->nullable();
            $table->string('SF9_g8_values_mb_s2_qr3', 2)->nullable();
            $table->string('SF9_g8_values_mb_s2_qr4', 2)->nullable();

            $table->string('SF9_g9_values_mb_s1_qr1', 2)->nullable();
            $table->string('SF9_g9_values_mb_s1_qr2', 2)->nullable();
            $table->string('SF9_g9_values_mb_s1_qr3', 2)->nullable();
            $table->string('SF9_g9_values_mb_s1_qr4', 2)->nullable();
            $table->string('SF9_g9_values_mb_s2_qr1', 2)->nullable();
            $table->string('SF9_g9_values_mb_s2_qr2', 2)->nullable();
            $table->string('SF9_g9_values_mb_s2_qr3', 2)->nullable();
            $table->string('SF9_g9_values_mb_s2_qr4', 2)->nullable();

            $table->string('SF9_g10_values_mb_s1_qr1', 2)->nullable();
            $table->string('SF9_g10_values_mb_s1_qr2', 2)->nullable();
            $table->string('SF9_g10_values_mb_s1_qr3', 2)->nullable();
            $table->string('SF9_g10_values_mb_s1_qr4', 2)->nullable();
            $table->string('SF9_g10_values_mb_s2_qr1', 2)->nullable();
            $table->string('SF9_g10_values_mb_s2_qr2', 2)->nullable();
            $table->string('SF9_g10_values_mb_s2_qr3', 2)->nullable();
            $table->string('SF9_g10_values_mb_s2_qr4', 2)->nullable();
        });
    }
    
    public function down () : void {
        Schema::dropIfExists('students');
    }
};
