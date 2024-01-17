<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        // [01 - ALL] Info
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('info_name_last', 50);
            $table->string('info_name_first', 50);
            $table->string('info_name_suffix', 50)->nullable();
            $table->string('info_name_middle', 50);
            $table->string('info_lrn', 50)->unique();
            $table->string('info_sex', 50);
            $table->date('info_birthdate');
        });

        // [02 - SF9] Report
        Schema::table('students', function (Blueprint $table) {
            $table->string('report_g7_age', 50)->nullable();
            $table->string('report_g7_section', 50)->nullable();
            $table->string('report_g7_year', 50)->nullable();
            $table->string('report_g7_principal', 50)->nullable();
            $table->string('report_g7_adviser', 50)->nullable();
            $table->string('report_g7_transfer_input_1', 50)->nullable();
            $table->string('report_g7_transfer_input_2', 50)->nullable();
            $table->string('report_g7_transfer_input_3', 50)->nullable();
            $table->date('report_g7_transfer_input_date')->nullable();

            $table->string('report_g8_age', 50)->nullable();
            $table->string('report_g8_section', 50)->nullable();
            $table->string('report_g8_year', 50)->nullable();
            $table->string('report_g8_principal', 50)->nullable();
            $table->string('report_g8_adviser', 50)->nullable();
            $table->string('report_g8_transfer_input_1', 50)->nullable();
            $table->string('report_g8_transfer_input_2', 50)->nullable();
            $table->string('report_g8_transfer_input_3', 50)->nullable();
            $table->date('report_g8_transfer_input_date')->nullable();

            $table->string('report_g9_age', 50)->nullable();
            $table->string('report_g9_section', 50)->nullable();
            $table->string('report_g9_year', 50)->nullable();
            $table->string('report_g9_principal', 50)->nullable();
            $table->string('report_g9_adviser', 50)->nullable();
            $table->string('report_g9_transfer_input_1', 50)->nullable();
            $table->string('report_g9_transfer_input_2', 50)->nullable();
            $table->string('report_g9_transfer_input_3', 50)->nullable();
            $table->date('report_g9_transfer_input_date')->nullable();

            $table->string('report_g10_age', 50)->nullable();
            $table->string('report_g10_section', 50)->nullable();
            $table->string('report_g10_year', 50)->nullable();
            $table->string('report_g10_principal', 50)->nullable();
            $table->string('report_g10_adviser', 50)->nullable();
            $table->string('report_g10_transfer_input_1', 50)->nullable();
            $table->string('report_g10_transfer_input_2', 50)->nullable();
            $table->string('report_g10_transfer_input_3', 50)->nullable();
            $table->date('report_g10_transfer_input_date')->nullable();
        });  

        // [03 - SF9] Attendance -> present
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('attendance_g7_p_jan')->nullable();
            $table->tinyInteger('attendance_g7_p_feb')->nullable();
            $table->tinyInteger('attendance_g7_p_mar')->nullable();
            $table->tinyInteger('attendance_g7_p_apr')->nullable();
            $table->tinyInteger('attendance_g7_p_may')->nullable();
            $table->tinyInteger('attendance_g7_p_jun')->nullable();
            $table->tinyInteger('attendance_g7_p_jul')->nullable();
            $table->tinyInteger('attendance_g7_p_aug')->nullable();
            $table->tinyInteger('attendance_g7_p_sep')->nullable();
            $table->tinyInteger('attendance_g7_p_oct')->nullable();
            $table->tinyInteger('attendance_g7_p_nov')->nullable();
            $table->tinyInteger('attendance_g7_p_dec')->nullable();
            
            $table->tinyInteger('attendance_g8_p_jan')->nullable();
            $table->tinyInteger('attendance_g8_p_feb')->nullable();
            $table->tinyInteger('attendance_g8_p_mar')->nullable();
            $table->tinyInteger('attendance_g8_p_apr')->nullable();
            $table->tinyInteger('attendance_g8_p_may')->nullable();
            $table->tinyInteger('attendance_g8_p_jun')->nullable();
            $table->tinyInteger('attendance_g8_p_jul')->nullable();
            $table->tinyInteger('attendance_g8_p_aug')->nullable();
            $table->tinyInteger('attendance_g8_p_sep')->nullable();
            $table->tinyInteger('attendance_g8_p_oct')->nullable();
            $table->tinyInteger('attendance_g8_p_nov')->nullable();
            $table->tinyInteger('attendance_g8_p_dec')->nullable();
            
            $table->tinyInteger('attendance_g9_p_jan')->nullable();
            $table->tinyInteger('attendance_g9_p_feb')->nullable();
            $table->tinyInteger('attendance_g9_p_mar')->nullable();
            $table->tinyInteger('attendance_g9_p_apr')->nullable();
            $table->tinyInteger('attendance_g9_p_may')->nullable();
            $table->tinyInteger('attendance_g9_p_jun')->nullable();
            $table->tinyInteger('attendance_g9_p_jul')->nullable();
            $table->tinyInteger('attendance_g9_p_aug')->nullable();
            $table->tinyInteger('attendance_g9_p_sep')->nullable();
            $table->tinyInteger('attendance_g9_p_oct')->nullable();
            $table->tinyInteger('attendance_g9_p_nov')->nullable();
            $table->tinyInteger('attendance_g9_p_dec')->nullable();
            
            $table->tinyInteger('attendance_g10_p_jan')->nullable();
            $table->tinyInteger('attendance_g10_p_feb')->nullable();
            $table->tinyInteger('attendance_g10_p_mar')->nullable();
            $table->tinyInteger('attendance_g10_p_apr')->nullable();
            $table->tinyInteger('attendance_g10_p_may')->nullable();
            $table->tinyInteger('attendance_g10_p_jun')->nullable();
            $table->tinyInteger('attendance_g10_p_jul')->nullable();
            $table->tinyInteger('attendance_g10_p_aug')->nullable();
            $table->tinyInteger('attendance_g10_p_sep')->nullable();
            $table->tinyInteger('attendance_g10_p_oct')->nullable();
            $table->tinyInteger('attendance_g10_p_nov')->nullable();
            $table->tinyInteger('attendance_g10_p_dec')->nullable();
        });

        // [04 - SF9] Attendance -> absent
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('attendance_g7_a_jan')->nullable();
            $table->tinyInteger('attendance_g7_a_feb')->nullable();
            $table->tinyInteger('attendance_g7_a_mar')->nullable();
            $table->tinyInteger('attendance_g7_a_apr')->nullable();
            $table->tinyInteger('attendance_g7_a_may')->nullable();
            $table->tinyInteger('attendance_g7_a_jun')->nullable();
            $table->tinyInteger('attendance_g7_a_jul')->nullable();
            $table->tinyInteger('attendance_g7_a_aug')->nullable();
            $table->tinyInteger('attendance_g7_a_sep')->nullable();
            $table->tinyInteger('attendance_g7_a_oct')->nullable();
            $table->tinyInteger('attendance_g7_a_nov')->nullable();
            $table->tinyInteger('attendance_g7_a_dec')->nullable();
            
            $table->tinyInteger('attendance_g8_a_jan')->nullable();
            $table->tinyInteger('attendance_g8_a_feb')->nullable();
            $table->tinyInteger('attendance_g8_a_mar')->nullable();
            $table->tinyInteger('attendance_g8_a_apr')->nullable();
            $table->tinyInteger('attendance_g8_a_may')->nullable();
            $table->tinyInteger('attendance_g8_a_jun')->nullable();
            $table->tinyInteger('attendance_g8_a_jul')->nullable();
            $table->tinyInteger('attendance_g8_a_aug')->nullable();
            $table->tinyInteger('attendance_g8_a_sep')->nullable();
            $table->tinyInteger('attendance_g8_a_oct')->nullable();
            $table->tinyInteger('attendance_g8_a_nov')->nullable();
            $table->tinyInteger('attendance_g8_a_dec')->nullable();
            
            $table->tinyInteger('attendance_g9_a_jan')->nullable();
            $table->tinyInteger('attendance_g9_a_feb')->nullable();
            $table->tinyInteger('attendance_g9_a_mar')->nullable();
            $table->tinyInteger('attendance_g9_a_apr')->nullable();
            $table->tinyInteger('attendance_g9_a_may')->nullable();
            $table->tinyInteger('attendance_g9_a_jun')->nullable();
            $table->tinyInteger('attendance_g9_a_jul')->nullable();
            $table->tinyInteger('attendance_g9_a_aug')->nullable();
            $table->tinyInteger('attendance_g9_a_sep')->nullable();
            $table->tinyInteger('attendance_g9_a_oct')->nullable();
            $table->tinyInteger('attendance_g9_a_nov')->nullable();
            $table->tinyInteger('attendance_g9_a_dec')->nullable();
            
            $table->tinyInteger('attendance_g10_a_jan')->nullable();
            $table->tinyInteger('attendance_g10_a_feb')->nullable();
            $table->tinyInteger('attendance_g10_a_mar')->nullable();
            $table->tinyInteger('attendance_g10_a_apr')->nullable();
            $table->tinyInteger('attendance_g10_a_may')->nullable();
            $table->tinyInteger('attendance_g10_a_jun')->nullable();
            $table->tinyInteger('attendance_g10_a_jul')->nullable();
            $table->tinyInteger('attendance_g10_a_aug')->nullable();
            $table->tinyInteger('attendance_g10_a_sep')->nullable();
            $table->tinyInteger('attendance_g10_a_oct')->nullable();
            $table->tinyInteger('attendance_g10_a_nov')->nullable();
            $table->tinyInteger('attendance_g10_a_dec')->nullable();
        });

        // [05 - SF9] Values -> maka - diyos
        Schema::table('students', function (Blueprint $table) {
            $table->string('values_g7_md_s1_qr1', 2)->nullable();
            $table->string('values_g7_md_s1_qr2', 2)->nullable();
            $table->string('values_g7_md_s1_qr3', 2)->nullable();
            $table->string('values_g7_md_s1_qr4', 2)->nullable();
            $table->string('values_g7_md_s2_qr1', 2)->nullable();
            $table->string('values_g7_md_s2_qr2', 2)->nullable();
            $table->string('values_g7_md_s2_qr3', 2)->nullable();
            $table->string('values_g7_md_s2_qr4', 2)->nullable();

            $table->string('values_g8_md_s1_qr1', 2)->nullable();
            $table->string('values_g8_md_s1_qr2', 2)->nullable();
            $table->string('values_g8_md_s1_qr3', 2)->nullable();
            $table->string('values_g8_md_s1_qr4', 2)->nullable();
            $table->string('values_g8_md_s2_qr1', 2)->nullable();
            $table->string('values_g8_md_s2_qr2', 2)->nullable();
            $table->string('values_g8_md_s2_qr3', 2)->nullable();
            $table->string('values_g8_md_s2_qr4', 2)->nullable();

            $table->string('values_g9_md_s1_qr1', 2)->nullable();
            $table->string('values_g9_md_s1_qr2', 2)->nullable();
            $table->string('values_g9_md_s1_qr3', 2)->nullable();
            $table->string('values_g9_md_s1_qr4', 2)->nullable();
            $table->string('values_g9_md_s2_qr1', 2)->nullable();
            $table->string('values_g9_md_s2_qr2', 2)->nullable();
            $table->string('values_g9_md_s2_qr3', 2)->nullable();
            $table->string('values_g9_md_s2_qr4', 2)->nullable();

            $table->string('values_g10_md_s1_qr1', 2)->nullable();
            $table->string('values_g10_md_s1_qr2', 2)->nullable();
            $table->string('values_g10_md_s1_qr3', 2)->nullable();
            $table->string('values_g10_md_s1_qr4', 2)->nullable();
            $table->string('values_g10_md_s2_qr1', 2)->nullable();
            $table->string('values_g10_md_s2_qr2', 2)->nullable();
            $table->string('values_g10_md_s2_qr3', 2)->nullable();
            $table->string('values_g10_md_s2_qr4', 2)->nullable();
        });

        // [06 - SF9] Values -> maka - tao
        Schema::table('students', function (Blueprint $table) {
            $table->string('values_g7_mt_s1_qr1', 2)->nullable();
            $table->string('values_g7_mt_s1_qr2', 2)->nullable();
            $table->string('values_g7_mt_s1_qr3', 2)->nullable();
            $table->string('values_g7_mt_s1_qr4', 2)->nullable();
            $table->string('values_g7_mt_s2_qr1', 2)->nullable();
            $table->string('values_g7_mt_s2_qr2', 2)->nullable();
            $table->string('values_g7_mt_s2_qr3', 2)->nullable();
            $table->string('values_g7_mt_s2_qr4', 2)->nullable();

            $table->string('values_g8_mt_s1_qr1', 2)->nullable();
            $table->string('values_g8_mt_s1_qr2', 2)->nullable();
            $table->string('values_g8_mt_s1_qr3', 2)->nullable();
            $table->string('values_g8_mt_s1_qr4', 2)->nullable();
            $table->string('values_g8_mt_s2_qr1', 2)->nullable();
            $table->string('values_g8_mt_s2_qr2', 2)->nullable();
            $table->string('values_g8_mt_s2_qr3', 2)->nullable();
            $table->string('values_g8_mt_s2_qr4', 2)->nullable();

            $table->string('values_g9_mt_s1_qr1', 2)->nullable();
            $table->string('values_g9_mt_s1_qr2', 2)->nullable();
            $table->string('values_g9_mt_s1_qr3', 2)->nullable();
            $table->string('values_g9_mt_s1_qr4', 2)->nullable();
            $table->string('values_g9_mt_s2_qr1', 2)->nullable();
            $table->string('values_g9_mt_s2_qr2', 2)->nullable();
            $table->string('values_g9_mt_s2_qr3', 2)->nullable();
            $table->string('values_g9_mt_s2_qr4', 2)->nullable();

            $table->string('values_g10_mt_s1_qr1', 2)->nullable();
            $table->string('values_g10_mt_s1_qr2', 2)->nullable();
            $table->string('values_g10_mt_s1_qr3', 2)->nullable();
            $table->string('values_g10_mt_s1_qr4', 2)->nullable();
            $table->string('values_g10_mt_s2_qr1', 2)->nullable();
            $table->string('values_g10_mt_s2_qr2', 2)->nullable();
            $table->string('values_g10_mt_s2_qr3', 2)->nullable();
            $table->string('values_g10_mt_s2_qr4', 2)->nullable();
        });

        // [07 - SF9] Values -> maka - kalikasan
        Schema::table('students', function (Blueprint $table) {
            $table->string('values_g7_mk_qr1', 2)->nullable();
            $table->string('values_g7_mk_qr2', 2)->nullable();
            $table->string('values_g7_mk_qr3', 2)->nullable();
            $table->string('values_g7_mk_qr4', 2)->nullable();

            $table->string('values_g8_mk_qr1', 2)->nullable();
            $table->string('values_g8_mk_qr2', 2)->nullable();
            $table->string('values_g8_mk_qr3', 2)->nullable();
            $table->string('values_g8_mk_qr4', 2)->nullable();

            $table->string('values_g9_mk_qr1', 2)->nullable();
            $table->string('values_g9_mk_qr2', 2)->nullable();
            $table->string('values_g9_mk_qr3', 2)->nullable();
            $table->string('values_g9_mk_qr4', 2)->nullable();

            $table->string('values_g10_mk_qr1', 2)->nullable();
            $table->string('values_g10_mk_qr2', 2)->nullable();
            $table->string('values_g10_mk_qr3', 2)->nullable();
            $table->string('values_g10_mk_qr4', 2)->nullable();
        });

        // [08 - SF9] Values -> maka - bansa
        Schema::table('students', function (Blueprint $table) {
            $table->string('values_g7_mb_s1_qr1', 2)->nullable();
            $table->string('values_g7_mb_s1_qr2', 2)->nullable();
            $table->string('values_g7_mb_s1_qr3', 2)->nullable();
            $table->string('values_g7_mb_s1_qr4', 2)->nullable();
            $table->string('values_g7_mb_s2_qr1', 2)->nullable();
            $table->string('values_g7_mb_s2_qr2', 2)->nullable();
            $table->string('values_g7_mb_s2_qr3', 2)->nullable();
            $table->string('values_g7_mb_s2_qr4', 2)->nullable();

            $table->string('values_g8_mb_s1_qr1', 2)->nullable();
            $table->string('values_g8_mb_s1_qr2', 2)->nullable();
            $table->string('values_g8_mb_s1_qr3', 2)->nullable();
            $table->string('values_g8_mb_s1_qr4', 2)->nullable();
            $table->string('values_g8_mb_s2_qr1', 2)->nullable();
            $table->string('values_g8_mb_s2_qr2', 2)->nullable();
            $table->string('values_g8_mb_s2_qr3', 2)->nullable();
            $table->string('values_g8_mb_s2_qr4', 2)->nullable();

            $table->string('values_g9_mb_s1_qr1', 2)->nullable();
            $table->string('values_g9_mb_s1_qr2', 2)->nullable();
            $table->string('values_g9_mb_s1_qr3', 2)->nullable();
            $table->string('values_g9_mb_s1_qr4', 2)->nullable();
            $table->string('values_g9_mb_s2_qr1', 2)->nullable();
            $table->string('values_g9_mb_s2_qr2', 2)->nullable();
            $table->string('values_g9_mb_s2_qr3', 2)->nullable();
            $table->string('values_g9_mb_s2_qr4', 2)->nullable();

            $table->string('values_g10_mb_s1_qr1', 2)->nullable();
            $table->string('values_g10_mb_s1_qr2', 2)->nullable();
            $table->string('values_g10_mb_s1_qr3', 2)->nullable();
            $table->string('values_g10_mb_s1_qr4', 2)->nullable();
            $table->string('values_g10_mb_s2_qr1', 2)->nullable();
            $table->string('values_g10_mb_s2_qr2', 2)->nullable();
            $table->string('values_g10_mb_s2_qr3', 2)->nullable();
            $table->string('values_g10_mb_s2_qr4', 2)->nullable();
        });

        // [09 - SF10] Enrollment
        Schema::table('students', function (Blueprint $table) {
            $table->boolean('enrollment_elementary_boolean')->default(0);
            $table->string('enrollment_elementary_average', 50)->nullable();
            $table->string('enrollment_elementary_citation', 50)->nullable();
            $table->string('enrollment_elementary_name', 50)->nullable();
            $table->string('enrollment_elementary_id', 50)->nullable();
            $table->string('enrollment_elementary_address', 50)->nullable();

            $table->boolean('enrollment_other_pept_boolean')->default(0);
            $table->string('enrollment_other_pept_rating', 50)->nullable();
            $table->boolean('enrollment_other_alsae_boolean')->default(0);
            $table->string('enrollment_other_alsae_rating', 50)->nullable();
            $table->boolean('enrollment_other_specify_boolean')->default(0);
            $table->string('enrollment_other_specify_rating', 50)->nullable();
            $table->date('enrollment_other_date')->nullable();
            $table->string('enrollment_other_location', 50)->nullable();
        });

        // [10 - SF10] Record
        Schema::table('students', function (Blueprint $table) {
            $table->string('record_g7_school_name', 50)->nullable();
            $table->string('record_g7_school_id', 50)->nullable();
            $table->string('record_g7_school_district', 50)->nullable();
            $table->string('record_g7_school_division', 50)->nullable();
            $table->string('record_g7_school_region', 50)->nullable();
            $table->string('record_g7_school_grade', 50)->nullable();
            $table->string('record_g7_school_section', 50)->nullable();
            $table->string('record_g7_school_year', 50)->nullable();
            $table->string('record_g7_school_teacher', 50)->nullable();
            $table->date('record_g7_remedial_date_start')->nullable();
            $table->date('record_g7_remedial_date_end')->nullable();

            $table->string('record_g8_school_name', 50)->nullable();
            $table->string('record_g8_school_id', 50)->nullable();
            $table->string('record_g8_school_district', 50)->nullable();
            $table->string('record_g8_school_division', 50)->nullable();
            $table->string('record_g8_school_region', 50)->nullable();
            $table->string('record_g8_school_grade', 50)->nullable();
            $table->string('record_g8_school_section', 50)->nullable();
            $table->string('record_g8_school_year', 50)->nullable();
            $table->string('record_g8_school_teacher', 50)->nullable();
            $table->date('record_g8_remedial_date_start')->nullable();
            $table->date('record_g8_remedial_date_end')->nullable();

            $table->string('record_g9_school_name', 50)->nullable();
            $table->string('record_g9_school_id', 50)->nullable();
            $table->string('record_g9_school_district', 50)->nullable();
            $table->string('record_g9_school_division', 50)->nullable();
            $table->string('record_g9_school_region', 50)->nullable();
            $table->string('record_g9_school_grade', 50)->nullable();
            $table->string('record_g9_school_section', 50)->nullable();
            $table->string('record_g9_school_year', 50)->nullable();
            $table->string('record_g9_school_teacher', 50)->nullable();
            $table->date('record_g9_remedial_date_start')->nullable();
            $table->date('record_g9_remedial_date_end')->nullable();

            $table->string('record_g10_school_name', 50)->nullable();
            $table->string('record_g10_school_id', 50)->nullable();
            $table->string('record_g10_school_district', 50)->nullable();
            $table->string('record_g10_school_division', 50)->nullable();
            $table->string('record_g10_school_region', 50)->nullable();
            $table->string('record_g10_school_grade', 50)->nullable();
            $table->string('record_g10_school_section', 50)->nullable();
            $table->string('record_g10_school_year', 50)->nullable();
            $table->string('record_g10_school_teacher', 50)->nullable();
            $table->date('record_g10_remedial_date_start')->nullable();
            $table->date('record_g10_remedial_date_end')->nullable();
        });

        // [11 - ALL] Subject -> filipino
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_fil_qr1')->nullable();
            $table->tinyInteger('subject_g7_fil_qr2')->nullable();
            $table->tinyInteger('subject_g7_fil_qr3')->nullable();
            $table->tinyInteger('subject_g7_fil_qr4')->nullable();
            $table->tinyInteger('subject_g7_fil_rem')->nullable();

            $table->tinyInteger('subject_g8_fil_qr1')->nullable();
            $table->tinyInteger('subject_g8_fil_qr2')->nullable();
            $table->tinyInteger('subject_g8_fil_qr3')->nullable();
            $table->tinyInteger('subject_g8_fil_qr4')->nullable();
            $table->tinyInteger('subject_g8_fil_rem')->nullable();

            $table->tinyInteger('subject_g9_fil_qr1')->nullable();
            $table->tinyInteger('subject_g9_fil_qr2')->nullable();
            $table->tinyInteger('subject_g9_fil_qr3')->nullable();
            $table->tinyInteger('subject_g9_fil_qr4')->nullable();
            $table->tinyInteger('subject_g9_fil_rem')->nullable();

            $table->tinyInteger('subject_g10_fil_qr1')->nullable();
            $table->tinyInteger('subject_g10_fil_qr2')->nullable();
            $table->tinyInteger('subject_g10_fil_qr3')->nullable();
            $table->tinyInteger('subject_g10_fil_qr4')->nullable();
            $table->tinyInteger('subject_g10_fil_rem')->nullable();
        });

        // [12 - ALL] Subject -> english
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_eng_qr1')->nullable();
            $table->tinyInteger('subject_g7_eng_qr2')->nullable();
            $table->tinyInteger('subject_g7_eng_qr3')->nullable();
            $table->tinyInteger('subject_g7_eng_qr4')->nullable();
            $table->tinyInteger('subject_g7_eng_rem')->nullable();

            $table->tinyInteger('subject_g8_eng_qr1')->nullable();
            $table->tinyInteger('subject_g8_eng_qr2')->nullable();
            $table->tinyInteger('subject_g8_eng_qr3')->nullable();
            $table->tinyInteger('subject_g8_eng_qr4')->nullable();
            $table->tinyInteger('subject_g8_eng_rem')->nullable();

            $table->tinyInteger('subject_g9_eng_qr1')->nullable();
            $table->tinyInteger('subject_g9_eng_qr2')->nullable();
            $table->tinyInteger('subject_g9_eng_qr3')->nullable();
            $table->tinyInteger('subject_g9_eng_qr4')->nullable();
            $table->tinyInteger('subject_g9_eng_rem')->nullable();

            $table->tinyInteger('subject_g10_eng_qr1')->nullable();
            $table->tinyInteger('subject_g10_eng_qr2')->nullable();
            $table->tinyInteger('subject_g10_eng_qr3')->nullable();
            $table->tinyInteger('subject_g10_eng_qr4')->nullable();
            $table->tinyInteger('subject_g10_eng_rem')->nullable();
        });

        // [13 - ALL] Subject -> mathematics
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_mat_qr1')->nullable();
            $table->tinyInteger('subject_g7_mat_qr2')->nullable();
            $table->tinyInteger('subject_g7_mat_qr3')->nullable();
            $table->tinyInteger('subject_g7_mat_qr4')->nullable();
            $table->tinyInteger('subject_g7_mat_rem')->nullable();

            $table->tinyInteger('subject_g8_mat_qr1')->nullable();
            $table->tinyInteger('subject_g8_mat_qr2')->nullable();
            $table->tinyInteger('subject_g8_mat_qr3')->nullable();
            $table->tinyInteger('subject_g8_mat_qr4')->nullable();
            $table->tinyInteger('subject_g8_mat_rem')->nullable();

            $table->tinyInteger('subject_g9_mat_qr1')->nullable();
            $table->tinyInteger('subject_g9_mat_qr2')->nullable();
            $table->tinyInteger('subject_g9_mat_qr3')->nullable();
            $table->tinyInteger('subject_g9_mat_qr4')->nullable();
            $table->tinyInteger('subject_g9_mat_rem')->nullable();

            $table->tinyInteger('subject_g10_mat_qr1')->nullable();
            $table->tinyInteger('subject_g10_mat_qr2')->nullable();
            $table->tinyInteger('subject_g10_mat_qr3')->nullable();
            $table->tinyInteger('subject_g10_mat_qr4')->nullable();
            $table->tinyInteger('subject_g10_mat_rem')->nullable();
        });

        // [14 - ALL] Subject -> science
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_sci_qr1')->nullable();
            $table->tinyInteger('subject_g7_sci_qr2')->nullable();
            $table->tinyInteger('subject_g7_sci_qr3')->nullable();
            $table->tinyInteger('subject_g7_sci_qr4')->nullable();
            $table->tinyInteger('subject_g7_sci_rem')->nullable();

            $table->tinyInteger('subject_g8_sci_qr1')->nullable();
            $table->tinyInteger('subject_g8_sci_qr2')->nullable();
            $table->tinyInteger('subject_g8_sci_qr3')->nullable();
            $table->tinyInteger('subject_g8_sci_qr4')->nullable();
            $table->tinyInteger('subject_g8_sci_rem')->nullable();
            
            $table->tinyInteger('subject_g9_sci_qr1')->nullable();
            $table->tinyInteger('subject_g9_sci_qr2')->nullable();
            $table->tinyInteger('subject_g9_sci_qr3')->nullable();
            $table->tinyInteger('subject_g9_sci_qr4')->nullable();
            $table->tinyInteger('subject_g9_sci_rem')->nullable();
            
            $table->tinyInteger('subject_g10_sci_qr1')->nullable();
            $table->tinyInteger('subject_g10_sci_qr2')->nullable();
            $table->tinyInteger('subject_g10_sci_qr3')->nullable();
            $table->tinyInteger('subject_g10_sci_qr4')->nullable();
            $table->tinyInteger('subject_g10_sci_rem')->nullable();
        });

        // [15 - ALL] Subject -> araling panlipunan (ap)
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_ap_qr1')->nullable();
            $table->tinyInteger('subject_g7_ap_qr2')->nullable();
            $table->tinyInteger('subject_g7_ap_qr3')->nullable();
            $table->tinyInteger('subject_g7_ap_qr4')->nullable();
            $table->tinyInteger('subject_g7_ap_rem')->nullable();
            
            $table->tinyInteger('subject_g8_ap_qr1')->nullable();
            $table->tinyInteger('subject_g8_ap_qr2')->nullable();
            $table->tinyInteger('subject_g8_ap_qr3')->nullable();
            $table->tinyInteger('subject_g8_ap_qr4')->nullable();
            $table->tinyInteger('subject_g8_ap_rem')->nullable();
            
            $table->tinyInteger('subject_g9_ap_qr1')->nullable();
            $table->tinyInteger('subject_g9_ap_qr2')->nullable();
            $table->tinyInteger('subject_g9_ap_qr3')->nullable();
            $table->tinyInteger('subject_g9_ap_qr4')->nullable();
            $table->tinyInteger('subject_g9_ap_rem')->nullable();
            
            $table->tinyInteger('subject_g10_ap_qr1')->nullable();
            $table->tinyInteger('subject_g10_ap_qr2')->nullable();
            $table->tinyInteger('subject_g10_ap_qr3')->nullable();
            $table->tinyInteger('subject_g10_ap_qr4')->nullable();
            $table->tinyInteger('subject_g10_ap_rem')->nullable();
        });

        // [16 - ALL] Subject -> edukasyon sa pagpapakatao (ep)
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_ep_qr1')->nullable();
            $table->tinyInteger('subject_g7_ep_qr2')->nullable();
            $table->tinyInteger('subject_g7_ep_qr3')->nullable();
            $table->tinyInteger('subject_g7_ep_qr4')->nullable();
            $table->tinyInteger('subject_g7_ep_rem')->nullable();

            $table->tinyInteger('subject_g8_ep_qr1')->nullable();
            $table->tinyInteger('subject_g8_ep_qr2')->nullable();
            $table->tinyInteger('subject_g8_ep_qr3')->nullable();
            $table->tinyInteger('subject_g8_ep_qr4')->nullable();
            $table->tinyInteger('subject_g8_ep_rem')->nullable();

            $table->tinyInteger('subject_g9_ep_qr1')->nullable();
            $table->tinyInteger('subject_g9_ep_qr2')->nullable();
            $table->tinyInteger('subject_g9_ep_qr3')->nullable();
            $table->tinyInteger('subject_g9_ep_qr4')->nullable();
            $table->tinyInteger('subject_g9_ep_rem')->nullable();

            $table->tinyInteger('subject_g10_ep_qr1')->nullable();
            $table->tinyInteger('subject_g10_ep_qr2')->nullable();
            $table->tinyInteger('subject_g10_ep_qr3')->nullable();
            $table->tinyInteger('subject_g10_ep_qr4')->nullable();
            $table->tinyInteger('subject_g10_ep_rem')->nullable();
        });

        // [17 - ALL] Subject -> technology and livelihood education (tle)
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_tle_qr1')->nullable();
            $table->tinyInteger('subject_g7_tle_qr2')->nullable();
            $table->tinyInteger('subject_g7_tle_qr3')->nullable();
            $table->tinyInteger('subject_g7_tle_qr4')->nullable();
            $table->tinyInteger('subject_g7_tle_rem')->nullable();

            $table->tinyInteger('subject_g8_tle_qr1')->nullable();
            $table->tinyInteger('subject_g8_tle_qr2')->nullable();
            $table->tinyInteger('subject_g8_tle_qr3')->nullable();
            $table->tinyInteger('subject_g8_tle_qr4')->nullable();
            $table->tinyInteger('subject_g8_tle_rem')->nullable();

            $table->tinyInteger('subject_g9_tle_qr1')->nullable();
            $table->tinyInteger('subject_g9_tle_qr2')->nullable();
            $table->tinyInteger('subject_g9_tle_qr3')->nullable();
            $table->tinyInteger('subject_g9_tle_qr4')->nullable();
            $table->tinyInteger('subject_g9_tle_rem')->nullable();

            $table->tinyInteger('subject_g10_tle_qr1')->nullable();
            $table->tinyInteger('subject_g10_tle_qr2')->nullable();
            $table->tinyInteger('subject_g10_tle_qr3')->nullable();
            $table->tinyInteger('subject_g10_tle_qr4')->nullable();
            $table->tinyInteger('subject_g10_tle_rem')->nullable();
        });

        // [18 - ALL] Subject -> music
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_mus_qr1')->nullable();
            $table->tinyInteger('subject_g7_mus_qr2')->nullable();
            $table->tinyInteger('subject_g7_mus_qr3')->nullable();
            $table->tinyInteger('subject_g7_mus_qr4')->nullable();
            $table->tinyInteger('subject_g7_mus_rem')->nullable();

            $table->tinyInteger('subject_g8_mus_qr1')->nullable();
            $table->tinyInteger('subject_g8_mus_qr2')->nullable();
            $table->tinyInteger('subject_g8_mus_qr3')->nullable();
            $table->tinyInteger('subject_g8_mus_qr4')->nullable();
            $table->tinyInteger('subject_g8_mus_rem')->nullable();

            $table->tinyInteger('subject_g9_mus_qr1')->nullable();
            $table->tinyInteger('subject_g9_mus_qr2')->nullable();
            $table->tinyInteger('subject_g9_mus_qr3')->nullable();
            $table->tinyInteger('subject_g9_mus_qr4')->nullable();
            $table->tinyInteger('subject_g9_mus_rem')->nullable();

            $table->tinyInteger('subject_g10_mus_qr1')->nullable();
            $table->tinyInteger('subject_g10_mus_qr2')->nullable();
            $table->tinyInteger('subject_g10_mus_qr3')->nullable();
            $table->tinyInteger('subject_g10_mus_qr4')->nullable();
            $table->tinyInteger('subject_g10_mus_rem')->nullable();
        });

        // [19 - ALL] Subject -> arts
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_art_qr1')->nullable();
            $table->tinyInteger('subject_g7_art_qr2')->nullable();
            $table->tinyInteger('subject_g7_art_qr3')->nullable();
            $table->tinyInteger('subject_g7_art_qr4')->nullable();
            $table->tinyInteger('subject_g7_art_rem')->nullable();

            $table->tinyInteger('subject_g8_art_qr1')->nullable();
            $table->tinyInteger('subject_g8_art_qr2')->nullable();
            $table->tinyInteger('subject_g8_art_qr3')->nullable();
            $table->tinyInteger('subject_g8_art_qr4')->nullable();
            $table->tinyInteger('subject_g8_art_rem')->nullable();

            $table->tinyInteger('subject_g9_art_qr1')->nullable();
            $table->tinyInteger('subject_g9_art_qr2')->nullable();
            $table->tinyInteger('subject_g9_art_qr3')->nullable();
            $table->tinyInteger('subject_g9_art_qr4')->nullable();
            $table->tinyInteger('subject_g9_art_rem')->nullable();

            $table->tinyInteger('subject_g10_art_qr1')->nullable();
            $table->tinyInteger('subject_g10_art_qr2')->nullable();
            $table->tinyInteger('subject_g10_art_qr3')->nullable();
            $table->tinyInteger('subject_g10_art_qr4')->nullable();
            $table->tinyInteger('subject_g10_art_rem')->nullable();
        });

        // [20 - ALL] Subject -> physical education
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_pe_qr1')->nullable();
            $table->tinyInteger('subject_g7_pe_qr2')->nullable();
            $table->tinyInteger('subject_g7_pe_qr3')->nullable();
            $table->tinyInteger('subject_g7_pe_qr4')->nullable();
            $table->tinyInteger('subject_g7_pe_rem')->nullable();

            $table->tinyInteger('subject_g8_pe_qr1')->nullable();
            $table->tinyInteger('subject_g8_pe_qr2')->nullable();
            $table->tinyInteger('subject_g8_pe_qr3')->nullable();
            $table->tinyInteger('subject_g8_pe_qr4')->nullable();
            $table->tinyInteger('subject_g8_pe_rem')->nullable();

            $table->tinyInteger('subject_g9_pe_qr1')->nullable();
            $table->tinyInteger('subject_g9_pe_qr2')->nullable();
            $table->tinyInteger('subject_g9_pe_qr3')->nullable();
            $table->tinyInteger('subject_g9_pe_qr4')->nullable();
            $table->tinyInteger('subject_g9_pe_rem')->nullable();

            $table->tinyInteger('subject_g10_pe_qr1')->nullable();
            $table->tinyInteger('subject_g10_pe_qr2')->nullable();
            $table->tinyInteger('subject_g10_pe_qr3')->nullable();
            $table->tinyInteger('subject_g10_pe_qr4')->nullable();
            $table->tinyInteger('subject_g10_pe_rem')->nullable();
        });

        // [21 - ALL] Subject -> health
        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('subject_g7_hp_qr1')->nullable();
            $table->tinyInteger('subject_g7_hp_qr2')->nullable();
            $table->tinyInteger('subject_g7_hp_qr3')->nullable();
            $table->tinyInteger('subject_g7_hp_qr4')->nullable();
            $table->tinyInteger('subject_g7_hp_rem')->nullable();

            $table->tinyInteger('subject_g8_hp_qr1')->nullable();
            $table->tinyInteger('subject_g8_hp_qr2')->nullable();
            $table->tinyInteger('subject_g8_hp_qr3')->nullable();
            $table->tinyInteger('subject_g8_hp_qr4')->nullable();
            $table->tinyInteger('subject_g8_hp_rem')->nullable();

            $table->tinyInteger('subject_g9_hp_qr1')->nullable();
            $table->tinyInteger('subject_g9_hp_qr2')->nullable();
            $table->tinyInteger('subject_g9_hp_qr3')->nullable();
            $table->tinyInteger('subject_g9_hp_qr4')->nullable();
            $table->tinyInteger('subject_g9_hp_rem')->nullable();

            $table->tinyInteger('subject_g10_hp_qr1')->nullable();
            $table->tinyInteger('subject_g10_hp_qr2')->nullable();
            $table->tinyInteger('subject_g10_hp_qr3')->nullable();
            $table->tinyInteger('subject_g10_hp_qr4')->nullable();
            $table->tinyInteger('subject_g10_hp_rem')->nullable();
        });

        // NOTE: Place special subjects here
    }
    
    public function down () : void {
        Schema::dropIfExists('students');
    }
};