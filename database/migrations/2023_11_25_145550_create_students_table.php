<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        // All: Info
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('info_name_last', 50);
            $table->string('info_name_first', 50);
            $table->string('info_name_suffix', 50)->nullable();
            $table->string('info_name_middle', 50);
            $table->string('info_lrn', 50)->unique();
            $table->string('info_sex', 50);
            $table->string('info_birthdate', 50);
        });

        // SF10: Enrollment
        Schema::table('students', function (Blueprint $table) {
            $table->boolean('sf10_enrollment_elementary_boolean')->default(0);
            $table->string('sf10_enrollment_elementary_average', 50)->nullable();
            $table->string('sf10_enrollment_elementary_citation', 50)->nullable();
            $table->string('sf10_enrollment_elementary_name', 50)->nullable();
            $table->string('sf10_enrollment_elementary_id', 50)->nullable();
            $table->string('sf10_enrollment_elementary_address', 50)->nullable();

            $table->boolean('sf10_enrollment_other_pept_boolean')->default(0);
            $table->string('sf10_enrollment_other_pept_rating', 50)->nullable();
            $table->boolean('sf10_enrollment_other_alsae_boolean')->default(0);
            $table->string('sf10_enrollment_other_alsae_rating', 50)->nullable();
            $table->boolean('sf10_enrollment_other_specify_boolean')->default(0);
            $table->string('sf10_enrollment_other_specify_rating', 50)->nullable();
            $table->string('sf10_enrollment_other_date', 50)->nullable();
            $table->string('sf10_enrollment_other_location', 50)->nullable();
        });

        // Various
        Schema::table('students', function (Blueprint $table) {
            // Grade range
            $grade_min = 7;
            $grade_max = 10;

            // SF9: Report (Acad)
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->integer('DB_SECTION_id_g'.$i)->nullable(); // Used to reference a section

                $table->string('PRESERVE_DB_SECTION_name_g'.$i, 50)->nullable();

                $table->string('PRESERVE_DB_USER_name_last_g'.$i, 50)->nullable();

                $table->string('PRESERVE_DB_USER_name_first_g'.$i, 50)->nullable();

                $table->integer('DB_YEAR_id_g'.$i)->nullable(); // Used to reference a year
            }

            // SF9: Report (Form)
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->string('sf9_g'.$i.'_report_age', 50)->nullable();
                $table->string('sf9_g'.$i.'_report_transfer_input_1', 50)->nullable();
                $table->string('sf9_g'.$i.'_report_transfer_input_2', 50)->nullable();
                $table->string('sf9_g'.$i.'_report_transfer_input_3', 50)->nullable();
                $table->string('sf9_g'.$i.'_report_transfer_input_date', 50)->nullable();
            }

            // SF9: Attendance -> present
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_attendance_jan_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_feb_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_mar_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_apr_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_may_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_jun_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_jul_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_aug_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_sep_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_oct_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_nov_p')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_dec_p')->nullable();
            }

            // SF9: Attendance -> absent
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_attendance_jan_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_feb_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_mar_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_apr_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_may_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_jun_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_jul_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_aug_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_sep_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_oct_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_nov_a')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_attendance_dec_a')->nullable();
            }

            // SF9: Values -> maka - diyos
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->string('sf9_g'.$i.'_values_qr1_md_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_md_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_md_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_md_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr1_md_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_md_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_md_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_md_s2', 2)->nullable();
            }

            // SF9: Values -> maka - tao
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->string('sf9_g'.$i.'_values_qr1_mt_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_mt_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_mt_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_mt_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr1_mt_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_mt_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_mt_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_mt_s2', 2)->nullable();
            }

            // SF9: Values -> maka - kalikasan
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->string('sf9_g'.$i.'_values_qr1_mk', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_mk', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_mk', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_mk', 2)->nullable();
            }

            // SF9: Values -> maka - bansa
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->string('sf9_g'.$i.'_values_qr1_mb_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_mb_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_mb_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_mb_s1', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr1_mb_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr2_mb_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr3_mb_s2', 2)->nullable();
                $table->string('sf9_g'.$i.'_values_qr4_mb_s2', 2)->nullable();
            }

            // SF10: Scholastic record
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->string('sf10_g'.$i.'_record_school_name', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_id', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_district', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_division', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_region', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_grade', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_section', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_year', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_school_teacher', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_remedial_date_start', 50)->nullable();
                $table->string('sf10_g'.$i.'_record_remedial_date_end', 50)->nullable();
            }

            // All: Subject -> filipino
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_fil')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_fil')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_fil')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_fil')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_fil')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_fil')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_fil')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_fil')->nullable();
            }

            // All: Subject -> english
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_eng')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_eng')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_eng')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_eng')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_eng')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_eng')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_eng')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_eng')->nullable();
            }

            // All: Subject -> mathematics
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_mat')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_mat')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_mat')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_mat')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_mat')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_mat')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_mat')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_mat')->nullable();
            }

            // All: Subject -> science
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_sci')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_sci')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_sci')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_sci')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_sci')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_sci')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_sci')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_sci')->nullable();
            }

            // All: Subject -> araling panlipunan (ap)
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_ap')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_ap')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_ap')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_ap')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_ap')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_ap')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_ap')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_ap')->nullable();
            }

            // All: Subject -> edukasyon sa pagpapakatao (ep)
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_ep')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_ep')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_ep')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_ep')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_ep')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_ep')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_ep')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_ep')->nullable();
            }

            // All: Subject -> technology and livelihood education (tle)
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_tle')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_tle')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_tle')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_tle')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_tle')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_tle')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_tle')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_tle')->nullable();
            }

            // All: Subject -> music
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_mus')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_mus')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_mus')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_mus')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_mus')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_mus')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_mus')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_mus')->nullable();
            }

            // All: Subject -> arts
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_art')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_art')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_art')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_art')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_art')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_art')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_art')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_art')->nullable();
            }

            // All: Subject -> physical education
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_pe')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_pe')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_pe')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_pe')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_pe')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_pe')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_pe')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_pe')->nullable();
            }

            // All: Subject -> health
            for ($i = $grade_min; $i <= $grade_max; $i++) {
                $table->tinyInteger('sf9_g'.$i.'_subject_qr1_hp')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr2_hp')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr3_hp')->nullable();
                $table->tinyInteger('sf9_g'.$i.'_subject_qr4_hp')->nullable();

                $table->tinyInteger('sf10_g'.$i.'_subject_qr1_hp')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr2_hp')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr3_hp')->nullable();
                $table->tinyInteger('sf10_g'.$i.'_subject_qr4_hp')->nullable();
            }

            // NOTE: Place special subject here
        });
    }
    public function down () : void { Schema::dropIfExists('students'); }
};