<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
    // Index
    public function index () {
        $students = Student::all();
        
        return view('pages.manager.index', compact('students'));
    }

    // Edit
    public function edit ($id) {
        $student = Student::findOrFail($id);
        
        return view('pages.manager.edit', compact('student'));
    }

    // Save
    public function save ($id) {
        // DO-NOT-TOUCH: Info
        $validate_info = request()->validate([
            'info_name_last' => 'required',
            'info_name_first' => 'required',
            'info_name_middle' => 'required',
            'info_lrn' => 'required',
            'info_sex' => 'required',
            'info_birthdate' => 'required',
        ]);

        Student::where('id', $id)->update([
            'info_name_last' => $validate_info['info_name_last'],
            'info_name_first' => $validate_info['info_name_first'],
            'info_name_middle' => $validate_info['info_name_middle'],
            'info_lrn' => $validate_info['info_lrn'],
            'info_sex' => $validate_info['info_sex'],
            'info_birthdate' => $validate_info['info_birthdate'],
        ]);
        
        // DO-NOT-TOUCH: Enrollment
        $validate_enrolment = request()->validate([
            'enrollment_elementary_boolean' => 'nullable',
            'enrollment_elementary_average' => 'nullable',
            'enrollment_elementary_citation' => 'nullable',
            'enrollment_elementary_name' => 'nullable',
            'enrollment_elementary_id' => 'nullable',
            'enrollment_elementary_address' => 'nullable',
    
            'enrollment_other_pept_boolean' => 'nullable',
            'enrollment_other_pept_rating' => 'nullable',
            'enrollment_other_alsae_boolean' => 'nullable',
            'enrollment_other_alsae_rating' => 'nullable',
            'enrollment_other_specify_boolean' => 'nullable',
            'enrollment_other_specify_label' => 'nullable',
            'enrollment_other_date' => 'nullable',
            'enrollment_other_location' => 'nullable',
        ]);

        Student::where('id', $id)->update([
            'enrollment_elementary_boolean' => isset($validate_enrolment['enrollment_elementary_boolean']) ? 1 : 0,
            'enrollment_elementary_average' => $validate_enrolment['enrollment_elementary_average'],
            'enrollment_elementary_citation' => $validate_enrolment['enrollment_elementary_citation'],
            'enrollment_elementary_name' => $validate_enrolment['enrollment_elementary_name'],
            'enrollment_elementary_id' => $validate_enrolment['enrollment_elementary_id'],
            'enrollment_elementary_address' => $validate_enrolment['enrollment_elementary_address'],

            'enrollment_other_pept_boolean' => isset($validate_enrolment['enrollment_other_pept_boolean']) ? 1 : 0,
            'enrollment_other_pept_rating' => $validate_enrolment['enrollment_other_pept_rating'],
            'enrollment_other_alsae_boolean' => isset($validate_enrolment['enrollment_other_alsae_boolean']) ? 1 : 0,
            'enrollment_other_alsae_rating' => $validate_enrolment['enrollment_other_alsae_rating'],
            'enrollment_other_specify_boolean' => isset($validate_enrolment['enrollment_other_specify_boolean']) ? 1 : 0,
            'enrollment_other_specify_label' => $validate_enrolment['enrollment_other_specify_label'],
            'enrollment_other_date' => $validate_enrolment['enrollment_other_date'],
            'enrollment_other_location' => $validate_enrolment['enrollment_other_location'],
        ]);
        
        // DO-NOT-TOUCH: Record
        $validate_record = request()->validate([
            'record_g7_school_name' => 'nullable',
            'record_g7_school_id' => 'nullable',
            'record_g7_school_district' => 'nullable',
            'record_g7_school_division' => 'nullable',
            'record_g7_school_region' => 'nullable',
            'record_g7_school_grade' => 'nullable',
            'record_g7_school_section' => 'nullable',
            'record_g7_school_year' => 'nullable',
            'record_g7_school_teacher' => 'nullable',
            'record_g7_remedial_date_start' => 'nullable',
            'record_g7_remedial_date_end' => 'nullable',

            'record_g8_school_name' => 'nullable',
            'record_g8_school_id' => 'nullable',
            'record_g8_school_district' => 'nullable',
            'record_g8_school_division' => 'nullable',
            'record_g8_school_region' => 'nullable',
            'record_g8_school_grade' => 'nullable',
            'record_g8_school_section' => 'nullable',
            'record_g8_school_year' => 'nullable',
            'record_g8_school_teacher' => 'nullable',
            'record_g8_remedial_date_start' => 'nullable',
            'record_g8_remedial_date_end' => 'nullable',

            'record_g9_school_name' => 'nullable',
            'record_g9_school_id' => 'nullable',
            'record_g9_school_district' => 'nullable',
            'record_g9_school_division' => 'nullable',
            'record_g9_school_region' => 'nullable',
            'record_g9_school_grade' => 'nullable',
            'record_g9_school_section' => 'nullable',
            'record_g9_school_year' => 'nullable',
            'record_g9_school_teacher' => 'nullable',
            'record_g9_remedial_date_start' => 'nullable',
            'record_g9_remedial_date_end' => 'nullable',
            
            'record_g10_school_name' => 'nullable',
            'record_g10_school_id' => 'nullable',
            'record_g10_school_district' => 'nullable',
            'record_g10_school_division' => 'nullable',
            'record_g10_school_region' => 'nullable',
            'record_g10_school_grade' => 'nullable',
            'record_g10_school_section' => 'nullable',
            'record_g10_school_year' => 'nullable',
            'record_g10_school_teacher' => 'nullable',
            'record_g10_remedial_date_start' => 'nullable',
            'record_g10_remedial_date_end' => 'nullable',
        ]);

        Student::where('id', $id)->update([
            'record_g7_school_name' => $validate_record['record_g7_school_name'],
            'record_g7_school_id' => $validate_record['record_g7_school_id'],
            'record_g7_school_district' => $validate_record['record_g7_school_district'],
            'record_g7_school_division' => $validate_record['record_g7_school_division'],
            'record_g7_school_region' => $validate_record['record_g7_school_region'],
            'record_g7_school_grade' => $validate_record['record_g7_school_grade'],
            'record_g7_school_section' => $validate_record['record_g7_school_section'],
            'record_g7_school_year' => $validate_record['record_g7_school_year'],
            'record_g7_school_teacher' => $validate_record['record_g7_school_teacher'],
            'record_g7_remedial_date_start' => $validate_record['record_g7_remedial_date_start'],
            'record_g7_remedial_date_end' => $validate_record['record_g7_remedial_date_end'],

            'record_g8_school_name' => $validate_record['record_g8_school_name'],
            'record_g8_school_id' => $validate_record['record_g8_school_id'],
            'record_g8_school_district' => $validate_record['record_g8_school_district'],
            'record_g8_school_division' => $validate_record['record_g8_school_division'],
            'record_g8_school_region' => $validate_record['record_g8_school_region'],
            'record_g8_school_grade' => $validate_record['record_g8_school_grade'],
            'record_g8_school_section' => $validate_record['record_g8_school_section'],
            'record_g8_school_year' => $validate_record['record_g8_school_year'],
            'record_g8_school_teacher' => $validate_record['record_g8_school_teacher'],
            'record_g8_remedial_date_start' => $validate_record['record_g8_remedial_date_start'],
            'record_g8_remedial_date_end' => $validate_record['record_g8_remedial_date_end'],

            'record_g9_school_name' => $validate_record['record_g9_school_name'],
            'record_g9_school_id' => $validate_record['record_g9_school_id'],
            'record_g9_school_district' => $validate_record['record_g9_school_district'],
            'record_g9_school_division' => $validate_record['record_g9_school_division'],
            'record_g9_school_region' => $validate_record['record_g9_school_region'],
            'record_g9_school_grade' => $validate_record['record_g9_school_grade'],
            'record_g9_school_section' => $validate_record['record_g9_school_section'],
            'record_g9_school_year' => $validate_record['record_g9_school_year'],
            'record_g9_school_teacher' => $validate_record['record_g9_school_teacher'],
            'record_g9_remedial_date_start' => $validate_record['record_g9_remedial_date_start'],
            'record_g9_remedial_date_end' => $validate_record['record_g9_remedial_date_end'],

            'record_g10_school_name' => $validate_record['record_g10_school_name'],
            'record_g10_school_id' => $validate_record['record_g10_school_id'],
            'record_g10_school_district' => $validate_record['record_g10_school_district'],
            'record_g10_school_division' => $validate_record['record_g10_school_division'],
            'record_g10_school_region' => $validate_record['record_g10_school_region'],
            'record_g10_school_grade' => $validate_record['record_g10_school_grade'],
            'record_g10_school_section' => $validate_record['record_g10_school_section'],
            'record_g10_school_year' => $validate_record['record_g10_school_year'],
            'record_g10_school_teacher' => $validate_record['record_g10_school_teacher'],
            'record_g10_remedial_date_start' => $validate_record['record_g10_remedial_date_start'],
            'record_g10_remedial_date_end' => $validate_record['record_g10_remedial_date_end'],
        ]);

        // DO-NOT-TOUCH: Report
        $validate_report = request()->validate([
            'report_g7_age' => 'nullable',

            'report_g8_age' => 'nullable',
            
            'report_g9_age' => 'nullable',

            'report_g10_age' => 'nullable',
        ]);

        Student::where('id', $id)->update([
            'report_g7_age' => $validate_report['report_g7_age'],

            'report_g8_age' => $validate_report['report_g8_age'],

            'report_g9_age' => $validate_report['report_g9_age'],

            'report_g10_age' => $validate_report['report_g10_age'],
        ]);




        $validatedFields = request()->validate([

            // Report

            // Subject -> filipino
            'subject_g7_fil_qr1' => 'nullable',
            'subject_g7_fil_qr2' => 'nullable',
            'subject_g7_fil_qr3' => 'nullable',
            'subject_g7_fil_qr4' => 'nullable',
            'subject_g7_fil_rem' => 'nullable',

            'subject_g8_fil_qr1' => 'nullable',
            'subject_g8_fil_qr2' => 'nullable',
            'subject_g8_fil_qr3' => 'nullable',
            'subject_g8_fil_qr4' => 'nullable',
            'subject_g8_fil_rem' => 'nullable',

            'subject_g9_fil_qr1' => 'nullable',
            'subject_g9_fil_qr2' => 'nullable',
            'subject_g9_fil_qr3' => 'nullable',
            'subject_g9_fil_qr4' => 'nullable',
            'subject_g9_fil_rem' => 'nullable',

            'subject_g10_fil_qr1' => 'nullable',
            'subject_g10_fil_qr2' => 'nullable',
            'subject_g10_fil_qr3' => 'nullable',
            'subject_g10_fil_qr4' => 'nullable',
            'subject_g10_fil_rem' => 'nullable',

            // Subject -> english
            'subject_g7_eng_qr1' => 'nullable',
            'subject_g7_eng_qr2' => 'nullable',
            'subject_g7_eng_qr3' => 'nullable',
            'subject_g7_eng_qr4' => 'nullable',
            'subject_g7_eng_rem' => 'nullable',

            'subject_g8_eng_qr1' => 'nullable',
            'subject_g8_eng_qr2' => 'nullable',
            'subject_g8_eng_qr3' => 'nullable',
            'subject_g8_eng_qr4' => 'nullable',
            'subject_g8_eng_rem' => 'nullable',

            'subject_g9_eng_qr1' => 'nullable',
            'subject_g9_eng_qr2' => 'nullable',
            'subject_g9_eng_qr3' => 'nullable',
            'subject_g9_eng_qr4' => 'nullable',
            'subject_g9_eng_rem' => 'nullable',

            'subject_g10_eng_qr1' => 'nullable',
            'subject_g10_eng_qr2' => 'nullable',
            'subject_g10_eng_qr3' => 'nullable',
            'subject_g10_eng_qr4' => 'nullable',
            'subject_g10_eng_rem' => 'nullable',

            // Subject -> mathematics
            'subject_g7_mat_qr1' => 'nullable',
            'subject_g7_mat_qr2' => 'nullable',
            'subject_g7_mat_qr3' => 'nullable',
            'subject_g7_mat_qr4' => 'nullable',
            'subject_g7_mat_rem' => 'nullable',
    
            'subject_g8_mat_qr1' => 'nullable',
            'subject_g8_mat_qr2' => 'nullable',
            'subject_g8_mat_qr3' => 'nullable',
            'subject_g8_mat_qr4' => 'nullable',
            'subject_g8_mat_rem' => 'nullable',
            
            'subject_g9_mat_qr1' => 'nullable',
            'subject_g9_mat_qr2' => 'nullable',
            'subject_g9_mat_qr3' => 'nullable',
            'subject_g9_mat_qr4' => 'nullable',
            'subject_g9_mat_rem' => 'nullable',
    
            'subject_g10_mat_qr1' => 'nullable',
            'subject_g10_mat_qr2' => 'nullable',
            'subject_g10_mat_qr3' => 'nullable',
            'subject_g10_mat_qr4' => 'nullable',
            'subject_g10_mat_rem' => 'nullable',

            // Subject -> science
            'subject_g7_sci_qr1' => 'nullable',
            'subject_g7_sci_qr2' => 'nullable',
            'subject_g7_sci_qr3' => 'nullable',
            'subject_g7_sci_qr4' => 'nullable',
            'subject_g7_sci_rem' => 'nullable',

            'subject_g8_sci_qr1' => 'nullable',
            'subject_g8_sci_qr2' => 'nullable',
            'subject_g8_sci_qr3' => 'nullable',
            'subject_g8_sci_qr4' => 'nullable',
            'subject_g8_sci_rem' => 'nullable',

            'subject_g9_sci_qr1' => 'nullable',
            'subject_g9_sci_qr2' => 'nullable',
            'subject_g9_sci_qr3' => 'nullable',
            'subject_g9_sci_qr4' => 'nullable',
            'subject_g9_sci_rem' => 'nullable',

            'subject_g10_sci_qr1' => 'nullable',
            'subject_g10_sci_qr2' => 'nullable',
            'subject_g10_sci_qr3' => 'nullable',
            'subject_g10_sci_qr4' => 'nullable',
            'subject_g10_sci_rem' => 'nullable',

            // Subject -> araling panlipunan (ap)
            'subject_g7_ap_qr1' => 'nullable',
            'subject_g7_ap_qr2' => 'nullable',
            'subject_g7_ap_qr3' => 'nullable',
            'subject_g7_ap_qr4' => 'nullable',
            'subject_g7_ap_rem' => 'nullable',

            'subject_g8_ap_qr1' => 'nullable',
            'subject_g8_ap_qr2' => 'nullable',
            'subject_g8_ap_qr3' => 'nullable',
            'subject_g8_ap_qr4' => 'nullable',
            'subject_g8_ap_rem' => 'nullable',

            'subject_g9_ap_qr1' => 'nullable',
            'subject_g9_ap_qr2' => 'nullable',
            'subject_g9_ap_qr3' => 'nullable',
            'subject_g9_ap_qr4' => 'nullable',
            'subject_g9_ap_rem' => 'nullable',

            'subject_g10_ap_qr1' => 'nullable',
            'subject_g10_ap_qr2' => 'nullable',
            'subject_g10_ap_qr3' => 'nullable',
            'subject_g10_ap_qr4' => 'nullable',
            'subject_g10_ap_rem' => 'nullable',

            // Subject -> edukasyon sa pagpapakatao (ep)
            'subject_g7_ep_qr1' => 'nullable',
            'subject_g7_ep_qr2' => 'nullable',
            'subject_g7_ep_qr3' => 'nullable',
            'subject_g7_ep_qr4' => 'nullable',
            'subject_g7_ep_rem' => 'nullable',

            'subject_g8_ep_qr1' => 'nullable',
            'subject_g8_ep_qr2' => 'nullable',
            'subject_g8_ep_qr3' => 'nullable',
            'subject_g8_ep_qr4' => 'nullable',
            'subject_g8_ep_rem' => 'nullable',

            'subject_g9_ep_qr1' => 'nullable',
            'subject_g9_ep_qr2' => 'nullable',
            'subject_g9_ep_qr3' => 'nullable',
            'subject_g9_ep_qr4' => 'nullable',
            'subject_g9_ep_rem' => 'nullable',

            'subject_g10_ep_qr1' => 'nullable',
            'subject_g10_ep_qr2' => 'nullable',
            'subject_g10_ep_qr3' => 'nullable',
            'subject_g10_ep_qr4' => 'nullable',
            'subject_g10_ep_rem' => 'nullable',

            // Subject -> technology and livelihood education (tle)
            'subject_g7_tle_qr1' => 'nullable',
            'subject_g7_tle_qr2' => 'nullable',
            'subject_g7_tle_qr3' => 'nullable',
            'subject_g7_tle_qr4' => 'nullable',
            'subject_g7_tle_rem' => 'nullable',

            'subject_g8_tle_qr1' => 'nullable',
            'subject_g8_tle_qr2' => 'nullable',
            'subject_g8_tle_qr3' => 'nullable',
            'subject_g8_tle_qr4' => 'nullable',
            'subject_g8_tle_rem' => 'nullable',

            'subject_g9_tle_qr1' => 'nullable',
            'subject_g9_tle_qr2' => 'nullable',
            'subject_g9_tle_qr3' => 'nullable',
            'subject_g9_tle_qr4' => 'nullable',
            'subject_g9_tle_rem' => 'nullable',

            'subject_g10_tle_qr1' => 'nullable',
            'subject_g10_tle_qr2' => 'nullable',
            'subject_g10_tle_qr3' => 'nullable',
            'subject_g10_tle_qr4' => 'nullable',
            'subject_g10_tle_rem' => 'nullable',

            // Subject -> music
            'subject_g7_mus_qr1' => 'nullable',
            'subject_g7_mus_qr2' => 'nullable',
            'subject_g7_mus_qr3' => 'nullable',
            'subject_g7_mus_qr4' => 'nullable',
            'subject_g7_mus_rem' => 'nullable',

            'subject_g8_mus_qr1' => 'nullable',
            'subject_g8_mus_qr2' => 'nullable',
            'subject_g8_mus_qr3' => 'nullable',
            'subject_g8_mus_qr4' => 'nullable',
            'subject_g8_mus_rem' => 'nullable',

            'subject_g9_mus_qr1' => 'nullable',
            'subject_g9_mus_qr2' => 'nullable',
            'subject_g9_mus_qr3' => 'nullable',
            'subject_g9_mus_qr4' => 'nullable',
            'subject_g9_mus_rem' => 'nullable',

            'subject_g10_mus_qr1' => 'nullable',
            'subject_g10_mus_qr2' => 'nullable',
            'subject_g10_mus_qr3' => 'nullable',
            'subject_g10_mus_qr4' => 'nullable',
            'subject_g10_mus_rem' => 'nullable',

            // Subject -> arts
            'subject_g7_art_qr1' => 'nullable',
            'subject_g7_art_qr2' => 'nullable',
            'subject_g7_art_qr3' => 'nullable',
            'subject_g7_art_qr4' => 'nullable',
            'subject_g7_art_rem' => 'nullable',

            'subject_g8_art_qr1' => 'nullable',
            'subject_g8_art_qr2' => 'nullable',
            'subject_g8_art_qr3' => 'nullable',
            'subject_g8_art_qr4' => 'nullable',
            'subject_g8_art_rem' => 'nullable',

            'subject_g9_art_qr1' => 'nullable',
            'subject_g9_art_qr2' => 'nullable',
            'subject_g9_art_qr3' => 'nullable',
            'subject_g9_art_qr4' => 'nullable',
            'subject_g9_art_rem' => 'nullable',

            'subject_g10_art_qr1' => 'nullable',
            'subject_g10_art_qr2' => 'nullable',
            'subject_g10_art_qr3' => 'nullable',
            'subject_g10_art_qr4' => 'nullable',
            'subject_g10_art_rem' => 'nullable',

            // Subject -> physical education
            'subject_g7_pe_qr1' => 'nullable',
            'subject_g7_pe_qr2' => 'nullable',
            'subject_g7_pe_qr3' => 'nullable',
            'subject_g7_pe_qr4' => 'nullable',
            'subject_g7_pe_rem' => 'nullable',

            'subject_g8_pe_qr1' => 'nullable',
            'subject_g8_pe_qr2' => 'nullable',
            'subject_g8_pe_qr3' => 'nullable',
            'subject_g8_pe_qr4' => 'nullable',
            'subject_g8_pe_rem' => 'nullable',

            'subject_g9_pe_qr1' => 'nullable',
            'subject_g9_pe_qr2' => 'nullable',
            'subject_g9_pe_qr3' => 'nullable',
            'subject_g9_pe_qr4' => 'nullable',
            'subject_g9_pe_rem' => 'nullable',

            'subject_g10_pe_qr1' => 'nullable',
            'subject_g10_pe_qr2' => 'nullable',
            'subject_g10_pe_qr3' => 'nullable',
            'subject_g10_pe_qr4' => 'nullable',
            'subject_g10_pe_rem' => 'nullable',

            // Subject -> health
            'subject_g7_hp_qr1' => 'nullable',
            'subject_g7_hp_qr2' => 'nullable',
            'subject_g7_hp_qr3' => 'nullable',
            'subject_g7_hp_qr4' => 'nullable',
            'subject_g7_hp_rem' => 'nullable',

            'subject_g8_hp_qr1' => 'nullable',
            'subject_g8_hp_qr2' => 'nullable',
            'subject_g8_hp_qr3' => 'nullable',
            'subject_g8_hp_qr4' => 'nullable',
            'subject_g8_hp_rem' => 'nullable',

            'subject_g9_hp_qr1' => 'nullable',
            'subject_g9_hp_qr2' => 'nullable',
            'subject_g9_hp_qr3' => 'nullable',
            'subject_g9_hp_qr4' => 'nullable',
            'subject_g9_hp_rem' => 'nullable',

            'subject_g10_hp_qr1' => 'nullable',
            'subject_g10_hp_qr2' => 'nullable',
            'subject_g10_hp_qr3' => 'nullable',
            'subject_g10_hp_qr4' => 'nullable',
            'subject_g10_hp_rem' => 'nullable',

            // Attendance -> present
            'attendance_g7_p_jan' => 'nullable',
            'attendance_g7_p_feb' => 'nullable',
            'attendance_g7_p_mar' => 'nullable',
            'attendance_g7_p_apr' => 'nullable',
            'attendance_g7_p_may' => 'nullable',
            'attendance_g7_p_jun' => 'nullable',
            'attendance_g7_p_jul' => 'nullable',
            'attendance_g7_p_aug' => 'nullable',
            'attendance_g7_p_sep' => 'nullable',
            'attendance_g7_p_oct' => 'nullable',
            'attendance_g7_p_nov' => 'nullable',
            'attendance_g7_p_dec' => 'nullable',

            'attendance_g8_p_jan' => 'nullable',
            'attendance_g8_p_feb' => 'nullable',
            'attendance_g8_p_mar' => 'nullable',
            'attendance_g8_p_apr' => 'nullable',
            'attendance_g8_p_may' => 'nullable',
            'attendance_g8_p_jun' => 'nullable',
            'attendance_g8_p_jul' => 'nullable',
            'attendance_g8_p_aug' => 'nullable',
            'attendance_g8_p_sep' => 'nullable',
            'attendance_g8_p_oct' => 'nullable',
            'attendance_g8_p_nov' => 'nullable',
            'attendance_g8_p_dec' => 'nullable',

            'attendance_g9_p_jan' => 'nullable',
            'attendance_g9_p_feb' => 'nullable',
            'attendance_g9_p_mar' => 'nullable',
            'attendance_g9_p_apr' => 'nullable',
            'attendance_g9_p_may' => 'nullable',
            'attendance_g9_p_jun' => 'nullable',
            'attendance_g9_p_jul' => 'nullable',
            'attendance_g9_p_aug' => 'nullable',
            'attendance_g9_p_sep' => 'nullable',
            'attendance_g9_p_oct' => 'nullable',
            'attendance_g9_p_nov' => 'nullable',
            'attendance_g9_p_dec' => 'nullable',

            'attendance_g10_p_jan' => 'nullable',
            'attendance_g10_p_feb' => 'nullable',
            'attendance_g10_p_mar' => 'nullable',
            'attendance_g10_p_apr' => 'nullable',
            'attendance_g10_p_may' => 'nullable',
            'attendance_g10_p_jun' => 'nullable',
            'attendance_g10_p_jul' => 'nullable',
            'attendance_g10_p_aug' => 'nullable',
            'attendance_g10_p_sep' => 'nullable',
            'attendance_g10_p_oct' => 'nullable',
            'attendance_g10_p_nov' => 'nullable',
            'attendance_g10_p_dec' => 'nullable',

            // Attendance -> absent
            'attendance_g7_a_jan' => 'nullable',
            'attendance_g7_a_feb' => 'nullable',
            'attendance_g7_a_mar' => 'nullable',
            'attendance_g7_a_apr' => 'nullable',
            'attendance_g7_a_may' => 'nullable',
            'attendance_g7_a_jun' => 'nullable',
            'attendance_g7_a_jul' => 'nullable',
            'attendance_g7_a_aug' => 'nullable',
            'attendance_g7_a_sep' => 'nullable',
            'attendance_g7_a_oct' => 'nullable',
            'attendance_g7_a_nov' => 'nullable',
            'attendance_g7_a_dec' => 'nullable',

            'attendance_g8_a_jan' => 'nullable',
            'attendance_g8_a_feb' => 'nullable',
            'attendance_g8_a_mar' => 'nullable',
            'attendance_g8_a_apr' => 'nullable',
            'attendance_g8_a_may' => 'nullable',
            'attendance_g8_a_jun' => 'nullable',
            'attendance_g8_a_jul' => 'nullable',
            'attendance_g8_a_aug' => 'nullable',
            'attendance_g8_a_sep' => 'nullable',
            'attendance_g8_a_oct' => 'nullable',
            'attendance_g8_a_nov' => 'nullable',
            'attendance_g8_a_dec' => 'nullable',

            'attendance_g9_a_jan' => 'nullable',
            'attendance_g9_a_feb' => 'nullable',
            'attendance_g9_a_mar' => 'nullable',
            'attendance_g9_a_apr' => 'nullable',
            'attendance_g9_a_may' => 'nullable',
            'attendance_g9_a_jun' => 'nullable',
            'attendance_g9_a_jul' => 'nullable',
            'attendance_g9_a_aug' => 'nullable',
            'attendance_g9_a_sep' => 'nullable',
            'attendance_g9_a_oct' => 'nullable',
            'attendance_g9_a_nov' => 'nullable',
            'attendance_g9_a_dec' => 'nullable',

            'attendance_g10_a_jan' => 'nullable',
            'attendance_g10_a_feb' => 'nullable',
            'attendance_g10_a_mar' => 'nullable',
            'attendance_g10_a_apr' => 'nullable',
            'attendance_g10_a_may' => 'nullable',
            'attendance_g10_a_jun' => 'nullable',
            'attendance_g10_a_jul' => 'nullable',
            'attendance_g10_a_aug' => 'nullable',
            'attendance_g10_a_sep' => 'nullable',
            'attendance_g10_a_oct' => 'nullable',
            'attendance_g10_a_nov' => 'nullable',
            'attendance_g10_a_dec' => 'nullable',

            // Values -> maka - diyos
            'values_g7_md_s1_qr1' => 'nullable',
            'values_g7_md_s1_qr2' => 'nullable',
            'values_g7_md_s1_qr3' => 'nullable',
            'values_g7_md_s1_qr4' => 'nullable',
            'values_g7_md_s2_qr1' => 'nullable',
            'values_g7_md_s2_qr2' => 'nullable',
            'values_g7_md_s2_qr3' => 'nullable',
            'values_g7_md_s2_qr4' => 'nullable',

            'values_g8_md_s1_qr1' => 'nullable',
            'values_g8_md_s1_qr2' => 'nullable',
            'values_g8_md_s1_qr3' => 'nullable',
            'values_g8_md_s1_qr4' => 'nullable',
            'values_g8_md_s2_qr1' => 'nullable',
            'values_g8_md_s2_qr2' => 'nullable',
            'values_g8_md_s2_qr3' => 'nullable',
            'values_g8_md_s2_qr4' => 'nullable',

            'values_g9_md_s1_qr1' => 'nullable',
            'values_g9_md_s1_qr2' => 'nullable',
            'values_g9_md_s1_qr3' => 'nullable',
            'values_g9_md_s1_qr4' => 'nullable',
            'values_g9_md_s2_qr1' => 'nullable',
            'values_g9_md_s2_qr2' => 'nullable',
            'values_g9_md_s2_qr3' => 'nullable',
            'values_g9_md_s2_qr4' => 'nullable',

            'values_g10_md_s1_qr1' => 'nullable',
            'values_g10_md_s1_qr2' => 'nullable',
            'values_g10_md_s1_qr3' => 'nullable',
            'values_g10_md_s1_qr4' => 'nullable',
            'values_g10_md_s2_qr1' => 'nullable',
            'values_g10_md_s2_qr2' => 'nullable',
            'values_g10_md_s2_qr3' => 'nullable',
            'values_g10_md_s2_qr4' => 'nullable',

            // Values -> maka - tao
            'values_g7_mt_s1_qr1' => 'nullable',
            'values_g7_mt_s1_qr2' => 'nullable',
            'values_g7_mt_s1_qr3' => 'nullable',
            'values_g7_mt_s1_qr4' => 'nullable',
            'values_g7_mt_s2_qr1' => 'nullable',
            'values_g7_mt_s2_qr2' => 'nullable',
            'values_g7_mt_s2_qr3' => 'nullable',
            'values_g7_mt_s2_qr4' => 'nullable',

            'values_g8_mt_s1_qr1' => 'nullable',
            'values_g8_mt_s1_qr2' => 'nullable',
            'values_g8_mt_s1_qr3' => 'nullable',
            'values_g8_mt_s1_qr4' => 'nullable',
            'values_g8_mt_s2_qr1' => 'nullable',
            'values_g8_mt_s2_qr2' => 'nullable',
            'values_g8_mt_s2_qr3' => 'nullable',
            'values_g8_mt_s2_qr4' => 'nullable',

            'values_g9_mt_s1_qr1' => 'nullable',
            'values_g9_mt_s1_qr2' => 'nullable',
            'values_g9_mt_s1_qr3' => 'nullable',
            'values_g9_mt_s1_qr4' => 'nullable',
            'values_g9_mt_s2_qr1' => 'nullable',
            'values_g9_mt_s2_qr2' => 'nullable',
            'values_g9_mt_s2_qr3' => 'nullable',
            'values_g9_mt_s2_qr4' => 'nullable',

            'values_g10_mt_s1_qr1' => 'nullable',
            'values_g10_mt_s1_qr2' => 'nullable',
            'values_g10_mt_s1_qr3' => 'nullable',
            'values_g10_mt_s1_qr4' => 'nullable',
            'values_g10_mt_s2_qr1' => 'nullable',
            'values_g10_mt_s2_qr2' => 'nullable',
            'values_g10_mt_s2_qr3' => 'nullable',
            'values_g10_mt_s2_qr4' => 'nullable',

            // Values -> maka - kalikasan
            'values_g7_mk_qr1' => 'nullable',
            'values_g7_mk_qr2' => 'nullable',
            'values_g7_mk_qr3' => 'nullable',
            'values_g7_mk_qr4' => 'nullable',

            'values_g8_mk_qr1' => 'nullable',
            'values_g8_mk_qr2' => 'nullable',
            'values_g8_mk_qr3' => 'nullable',
            'values_g8_mk_qr4' => 'nullable',

            'values_g9_mk_qr1' => 'nullable',
            'values_g9_mk_qr2' => 'nullable',
            'values_g9_mk_qr3' => 'nullable',
            'values_g9_mk_qr4' => 'nullable',

            'values_g10_mk_qr1' => 'nullable',
            'values_g10_mk_qr2' => 'nullable',
            'values_g10_mk_qr3' => 'nullable',
            'values_g10_mk_qr4' => 'nullable',

            // Values -> maka - bansa
            'values_g7_mb_s1_qr1' => 'nullable',
            'values_g7_mb_s1_qr2' => 'nullable',
            'values_g7_mb_s1_qr3' => 'nullable',
            'values_g7_mb_s1_qr4' => 'nullable',
            'values_g7_mb_s2_qr1' => 'nullable',
            'values_g7_mb_s2_qr2' => 'nullable',
            'values_g7_mb_s2_qr3' => 'nullable',
            'values_g7_mb_s2_qr4' => 'nullable',

            'values_g8_mb_s1_qr1' => 'nullable',
            'values_g8_mb_s1_qr2' => 'nullable',
            'values_g8_mb_s1_qr3' => 'nullable',
            'values_g8_mb_s1_qr4' => 'nullable',
            'values_g8_mb_s2_qr1' => 'nullable',
            'values_g8_mb_s2_qr2' => 'nullable',
            'values_g8_mb_s2_qr3' => 'nullable',
            'values_g8_mb_s2_qr4' => 'nullable',

            'values_g9_mb_s1_qr1' => 'nullable',
            'values_g9_mb_s1_qr2' => 'nullable',
            'values_g9_mb_s1_qr3' => 'nullable',
            'values_g9_mb_s1_qr4' => 'nullable',
            'values_g9_mb_s2_qr1' => 'nullable',
            'values_g9_mb_s2_qr2' => 'nullable',
            'values_g9_mb_s2_qr3' => 'nullable',
            'values_g9_mb_s2_qr4' => 'nullable',

            'values_g10_mb_s1_qr1' => 'nullable',
            'values_g10_mb_s1_qr2' => 'nullable',
            'values_g10_mb_s1_qr3' => 'nullable',
            'values_g10_mb_s1_qr4' => 'nullable',
            'values_g10_mb_s2_qr1' => 'nullable',
            'values_g10_mb_s2_qr2' => 'nullable',
            'values_g10_mb_s2_qr3' => 'nullable',
            'values_g10_mb_s2_qr4' => 'nullable',
        

        ]);
            // Update
        Student::where('id', $id)->update([
            // Subject -> filipino
            'subject_g7_fil_qr1' => $validatedFields['subject_g7_fil_qr1'],
            'subject_g7_fil_qr2' => $validatedFields['subject_g7_fil_qr2'],
            'subject_g7_fil_qr3' => $validatedFields['subject_g7_fil_qr3'],
            'subject_g7_fil_qr4' => $validatedFields['subject_g7_fil_qr4'],
            'subject_g7_fil_rem' => $validatedFields['subject_g7_fil_rem'],

            'subject_g8_fil_qr1' => $validatedFields['subject_g8_fil_qr1'],
            'subject_g8_fil_qr2' => $validatedFields['subject_g8_fil_qr2'],
            'subject_g8_fil_qr3' => $validatedFields['subject_g8_fil_qr3'],
            'subject_g8_fil_qr4' => $validatedFields['subject_g8_fil_qr4'],
            'subject_g8_fil_rem' => $validatedFields['subject_g8_fil_rem'],

            'subject_g9_fil_qr1' => $validatedFields['subject_g9_fil_qr1'],
            'subject_g9_fil_qr2' => $validatedFields['subject_g9_fil_qr2'],
            'subject_g9_fil_qr3' => $validatedFields['subject_g9_fil_qr3'],
            'subject_g9_fil_qr4' => $validatedFields['subject_g9_fil_qr4'],
            'subject_g9_fil_rem' => $validatedFields['subject_g9_fil_rem'],

            'subject_g10_fil_qr1' => $validatedFields['subject_g10_fil_qr1'],
            'subject_g10_fil_qr2' => $validatedFields['subject_g10_fil_qr2'],
            'subject_g10_fil_qr3' => $validatedFields['subject_g10_fil_qr3'],
            'subject_g10_fil_qr4' => $validatedFields['subject_g10_fil_qr4'],
            'subject_g10_fil_rem' => $validatedFields['subject_g10_fil_rem'],

            // Subject -> english
            'subject_g7_eng_qr1' => $validatedFields['subject_g7_eng_qr1'],
            'subject_g7_eng_qr2' => $validatedFields['subject_g7_eng_qr2'],
            'subject_g7_eng_qr3' => $validatedFields['subject_g7_eng_qr3'],
            'subject_g7_eng_qr4' => $validatedFields['subject_g7_eng_qr4'],
            'subject_g7_eng_rem' => $validatedFields['subject_g7_eng_rem'],

            'subject_g8_eng_qr1' => $validatedFields['subject_g8_eng_qr1'],
            'subject_g8_eng_qr2' => $validatedFields['subject_g8_eng_qr2'],
            'subject_g8_eng_qr3' => $validatedFields['subject_g8_eng_qr3'],
            'subject_g8_eng_qr4' => $validatedFields['subject_g8_eng_qr4'],
            'subject_g8_eng_rem' => $validatedFields['subject_g8_eng_rem'],

            'subject_g9_eng_qr1' => $validatedFields['subject_g9_eng_qr1'],
            'subject_g9_eng_qr2' => $validatedFields['subject_g9_eng_qr2'],
            'subject_g9_eng_qr3' => $validatedFields['subject_g9_eng_qr3'],
            'subject_g9_eng_qr4' => $validatedFields['subject_g9_eng_qr4'],
            'subject_g9_eng_rem' => $validatedFields['subject_g9_eng_rem'],

            'subject_g10_eng_qr1' => $validatedFields['subject_g10_eng_qr1'],
            'subject_g10_eng_qr2' => $validatedFields['subject_g10_eng_qr2'],
            'subject_g10_eng_qr3' => $validatedFields['subject_g10_eng_qr3'],
            'subject_g10_eng_qr4' => $validatedFields['subject_g10_eng_qr4'],
            'subject_g10_eng_rem' => $validatedFields['subject_g10_eng_rem'],
            
            // Subject -> mathematics
            'subject_g7_mat_qr1' => $validatedFields['subject_g7_mat_qr1'],
            'subject_g7_mat_qr2' => $validatedFields['subject_g7_mat_qr2'],
            'subject_g7_mat_qr3' => $validatedFields['subject_g7_mat_qr3'],
            'subject_g7_mat_qr4' => $validatedFields['subject_g7_mat_qr4'],
            'subject_g7_mat_rem' => $validatedFields['subject_g7_mat_rem'],
    
            'subject_g8_mat_qr1' => $validatedFields['subject_g8_mat_qr1'],
            'subject_g8_mat_qr2' => $validatedFields['subject_g8_mat_qr2'],
            'subject_g8_mat_qr3' => $validatedFields['subject_g8_mat_qr3'],
            'subject_g8_mat_qr4' => $validatedFields['subject_g8_mat_qr4'],
            'subject_g8_mat_rem' => $validatedFields['subject_g8_mat_rem'],
            
            'subject_g9_mat_qr1' => $validatedFields['subject_g9_mat_qr1'],
            'subject_g9_mat_qr2' => $validatedFields['subject_g9_mat_qr2'],
            'subject_g9_mat_qr3' => $validatedFields['subject_g9_mat_qr3'],
            'subject_g9_mat_qr4' => $validatedFields['subject_g9_mat_qr4'],
            'subject_g9_mat_rem' => $validatedFields['subject_g9_mat_rem'],
    
            'subject_g10_mat_qr1' => $validatedFields['subject_g10_mat_qr1'],
            'subject_g10_mat_qr2' => $validatedFields['subject_g10_mat_qr2'],
            'subject_g10_mat_qr3' => $validatedFields['subject_g10_mat_qr3'],
            'subject_g10_mat_qr4' => $validatedFields['subject_g10_mat_qr4'],
            'subject_g10_mat_rem' => $validatedFields['subject_g10_mat_rem'],
            
            // Subject -> science
            'subject_g7_sci_qr1' => $validatedFields['subject_g7_sci_qr1'],
            'subject_g7_sci_qr2' => $validatedFields['subject_g7_sci_qr2'],
            'subject_g7_sci_qr3' => $validatedFields['subject_g7_sci_qr3'],
            'subject_g7_sci_qr4' => $validatedFields['subject_g7_sci_qr4'],
            'subject_g7_sci_rem' => $validatedFields['subject_g7_sci_rem'],
    
            'subject_g8_sci_qr1' => $validatedFields['subject_g8_sci_qr1'],
            'subject_g8_sci_qr2' => $validatedFields['subject_g8_sci_qr2'],
            'subject_g8_sci_qr3' => $validatedFields['subject_g8_sci_qr3'],
            'subject_g8_sci_qr4' => $validatedFields['subject_g8_sci_qr4'],
            'subject_g8_sci_rem' => $validatedFields['subject_g8_sci_rem'],
    
            'subject_g9_sci_qr1' => $validatedFields['subject_g9_sci_qr1'],
            'subject_g9_sci_qr2' => $validatedFields['subject_g9_sci_qr2'],
            'subject_g9_sci_qr3' => $validatedFields['subject_g9_sci_qr3'],
            'subject_g9_sci_qr4' => $validatedFields['subject_g9_sci_qr4'],
            'subject_g9_sci_rem' => $validatedFields['subject_g9_sci_rem'],
    
            'subject_g10_sci_qr1' => $validatedFields['subject_g10_sci_qr1'],
            'subject_g10_sci_qr2' => $validatedFields['subject_g10_sci_qr2'],
            'subject_g10_sci_qr3' => $validatedFields['subject_g10_sci_qr3'],
            'subject_g10_sci_qr4' => $validatedFields['subject_g10_sci_qr4'],
            'subject_g10_sci_rem' => $validatedFields['subject_g10_sci_rem'],

            // Subject -> araling panlipunan (ap)
            'subject_g7_ap_qr1' => $validatedFields['subject_g7_ap_qr1'],
            'subject_g7_ap_qr2' => $validatedFields['subject_g7_ap_qr2'],
            'subject_g7_ap_qr3' => $validatedFields['subject_g7_ap_qr3'],
            'subject_g7_ap_qr4' => $validatedFields['subject_g7_ap_qr4'],
            'subject_g7_ap_rem' => $validatedFields['subject_g7_ap_rem'],

            'subject_g8_ap_qr1' => $validatedFields['subject_g8_ap_qr1'],
            'subject_g8_ap_qr2' => $validatedFields['subject_g8_ap_qr2'],
            'subject_g8_ap_qr3' => $validatedFields['subject_g8_ap_qr3'],
            'subject_g8_ap_qr4' => $validatedFields['subject_g8_ap_qr4'],
            'subject_g8_ap_rem' => $validatedFields['subject_g8_ap_rem'],

            'subject_g9_ap_qr1' => $validatedFields['subject_g9_ap_qr1'],
            'subject_g9_ap_qr2' => $validatedFields['subject_g9_ap_qr2'],
            'subject_g9_ap_qr3' => $validatedFields['subject_g9_ap_qr3'],
            'subject_g9_ap_qr4' => $validatedFields['subject_g9_ap_qr4'],
            'subject_g9_ap_rem' => $validatedFields['subject_g9_ap_rem'],

            'subject_g10_ap_qr1' => $validatedFields['subject_g10_ap_qr1'],
            'subject_g10_ap_qr2' => $validatedFields['subject_g10_ap_qr2'],
            'subject_g10_ap_qr3' => $validatedFields['subject_g10_ap_qr3'],
            'subject_g10_ap_qr4' => $validatedFields['subject_g10_ap_qr4'],
            'subject_g10_ap_rem' => $validatedFields['subject_g10_ap_rem'],

            // Subject -> edukasyon sa pagpapakatao (ep)
            'subject_g7_ep_qr1' => $validatedFields['subject_g7_ep_qr1'],
            'subject_g7_ep_qr2' => $validatedFields['subject_g7_ep_qr2'],
            'subject_g7_ep_qr3' => $validatedFields['subject_g7_ep_qr3'],
            'subject_g7_ep_qr4' => $validatedFields['subject_g7_ep_qr4'],
            'subject_g7_ep_rem' => $validatedFields['subject_g7_ep_rem'],

            'subject_g8_ep_qr1' => $validatedFields['subject_g8_ep_qr1'],
            'subject_g8_ep_qr2' => $validatedFields['subject_g8_ep_qr2'],
            'subject_g8_ep_qr3' => $validatedFields['subject_g8_ep_qr3'],
            'subject_g8_ep_qr4' => $validatedFields['subject_g8_ep_qr4'],
            'subject_g8_ep_rem' => $validatedFields['subject_g8_ep_rem'],

            'subject_g9_ep_qr1' => $validatedFields['subject_g9_ep_qr1'],
            'subject_g9_ep_qr2' => $validatedFields['subject_g9_ep_qr2'],
            'subject_g9_ep_qr3' => $validatedFields['subject_g9_ep_qr3'],
            'subject_g9_ep_qr4' => $validatedFields['subject_g9_ep_qr4'],
            'subject_g9_ep_rem' => $validatedFields['subject_g9_ep_rem'],

            'subject_g10_ep_qr1' => $validatedFields['subject_g10_ep_qr1'],
            'subject_g10_ep_qr2' => $validatedFields['subject_g10_ep_qr2'],
            'subject_g10_ep_qr3' => $validatedFields['subject_g10_ep_qr3'],
            'subject_g10_ep_qr4' => $validatedFields['subject_g10_ep_qr4'],
            'subject_g10_ep_rem' => $validatedFields['subject_g10_ep_rem'],
            
            // Subject -> technology and livelihood education (tle)
            'subject_g7_tle_qr1' => $validatedFields['subject_g7_tle_qr1'],
            'subject_g7_tle_qr2' => $validatedFields['subject_g7_tle_qr2'],
            'subject_g7_tle_qr3' => $validatedFields['subject_g7_tle_qr3'],
            'subject_g7_tle_qr4' => $validatedFields['subject_g7_tle_qr4'],
            'subject_g7_tle_rem' => $validatedFields['subject_g7_tle_rem'],
            
            'subject_g8_tle_qr1' => $validatedFields['subject_g8_tle_qr1'],
            'subject_g8_tle_qr2' => $validatedFields['subject_g8_tle_qr2'],
            'subject_g8_tle_qr3' => $validatedFields['subject_g8_tle_qr3'],
            'subject_g8_tle_qr4' => $validatedFields['subject_g8_tle_qr4'],
            'subject_g8_tle_rem' => $validatedFields['subject_g8_tle_rem'],

            'subject_g9_tle_qr1' => $validatedFields['subject_g9_tle_qr1'],
            'subject_g9_tle_qr2' => $validatedFields['subject_g9_tle_qr2'],
            'subject_g9_tle_qr3' => $validatedFields['subject_g9_tle_qr3'],
            'subject_g9_tle_qr4' => $validatedFields['subject_g9_tle_qr4'],
            'subject_g9_tle_rem' => $validatedFields['subject_g9_tle_rem'],

            'subject_g10_tle_qr1' => $validatedFields['subject_g10_tle_qr1'],
            'subject_g10_tle_qr2' => $validatedFields['subject_g10_tle_qr2'],
            'subject_g10_tle_qr3' => $validatedFields['subject_g10_tle_qr3'],
            'subject_g10_tle_qr4' => $validatedFields['subject_g10_tle_qr4'],
            'subject_g10_tle_rem' => $validatedFields['subject_g10_tle_rem'],
        
            // Subject -> music
            'subject_g7_mus_qr1' => $validatedFields['subject_g7_mus_qr1'],
            'subject_g7_mus_qr2' => $validatedFields['subject_g7_mus_qr2'],
            'subject_g7_mus_qr3' => $validatedFields['subject_g7_mus_qr3'],
            'subject_g7_mus_qr4' => $validatedFields['subject_g7_mus_qr4'],
            'subject_g7_mus_rem' => $validatedFields['subject_g7_mus_rem'],
    
            'subject_g8_mus_qr1' => $validatedFields['subject_g8_mus_qr1'],
            'subject_g8_mus_qr2' => $validatedFields['subject_g8_mus_qr2'],
            'subject_g8_mus_qr3' => $validatedFields['subject_g8_mus_qr3'],
            'subject_g8_mus_qr4' => $validatedFields['subject_g8_mus_qr4'],
            'subject_g8_mus_rem' => $validatedFields['subject_g8_mus_rem'],
            
            'subject_g9_mus_qr1' => $validatedFields['subject_g9_mus_qr1'],
            'subject_g9_mus_qr2' => $validatedFields['subject_g9_mus_qr2'],
            'subject_g9_mus_qr3' => $validatedFields['subject_g9_mus_qr3'],
            'subject_g9_mus_qr4' => $validatedFields['subject_g9_mus_qr4'],
            'subject_g9_mus_rem' => $validatedFields['subject_g9_mus_rem'],
    
            'subject_g10_mus_qr1' => $validatedFields['subject_g10_mus_qr1'],
            'subject_g10_mus_qr2' => $validatedFields['subject_g10_mus_qr2'],
            'subject_g10_mus_qr3' => $validatedFields['subject_g10_mus_qr3'],
            'subject_g10_mus_qr4' => $validatedFields['subject_g10_mus_qr4'],
            'subject_g10_mus_rem' => $validatedFields['subject_g10_mus_rem'],
            
            // Subject -> arts
            'subject_g7_art_qr1' => $validatedFields['subject_g7_art_qr1'],
            'subject_g7_art_qr2' => $validatedFields['subject_g7_art_qr2'],
            'subject_g7_art_qr3' => $validatedFields['subject_g7_art_qr3'],
            'subject_g7_art_qr4' => $validatedFields['subject_g7_art_qr4'],
            'subject_g7_art_rem' => $validatedFields['subject_g7_art_rem'],
    
            'subject_g8_art_qr1' => $validatedFields['subject_g8_art_qr1'],
            'subject_g8_art_qr2' => $validatedFields['subject_g8_art_qr2'],
            'subject_g8_art_qr3' => $validatedFields['subject_g8_art_qr3'],
            'subject_g8_art_qr4' => $validatedFields['subject_g8_art_qr4'],
            'subject_g8_art_rem' => $validatedFields['subject_g8_art_rem'],
    
            'subject_g9_art_qr1' => $validatedFields['subject_g9_art_qr1'],
            'subject_g9_art_qr2' => $validatedFields['subject_g9_art_qr2'],
            'subject_g9_art_qr3' => $validatedFields['subject_g9_art_qr3'],
            'subject_g9_art_qr4' => $validatedFields['subject_g9_art_qr4'],
            'subject_g9_art_rem' => $validatedFields['subject_g9_art_rem'],
    
            'subject_g10_art_qr1' => $validatedFields['subject_g10_art_qr1'],
            'subject_g10_art_qr2' => $validatedFields['subject_g10_art_qr2'],
            'subject_g10_art_qr3' => $validatedFields['subject_g10_art_qr3'],
            'subject_g10_art_qr4' => $validatedFields['subject_g10_art_qr4'],
            'subject_g10_art_rem' => $validatedFields['subject_g10_art_rem'],

            // Subject -> physical education
            'subject_g7_pe_qr1' => $validatedFields['subject_g7_pe_qr1'],
            'subject_g7_pe_qr2' => $validatedFields['subject_g7_pe_qr2'],
            'subject_g7_pe_qr3' => $validatedFields['subject_g7_pe_qr3'],
            'subject_g7_pe_qr4' => $validatedFields['subject_g7_pe_qr4'],
            'subject_g7_pe_rem' => $validatedFields['subject_g7_pe_rem'],

            'subject_g8_pe_qr1' => $validatedFields['subject_g8_pe_qr1'],
            'subject_g8_pe_qr2' => $validatedFields['subject_g8_pe_qr2'],
            'subject_g8_pe_qr3' => $validatedFields['subject_g8_pe_qr3'],
            'subject_g8_pe_qr4' => $validatedFields['subject_g8_pe_qr4'],
            'subject_g8_pe_rem' => $validatedFields['subject_g8_pe_rem'],

            'subject_g9_pe_qr1' => $validatedFields['subject_g9_pe_qr1'],
            'subject_g9_pe_qr2' => $validatedFields['subject_g9_pe_qr2'],
            'subject_g9_pe_qr3' => $validatedFields['subject_g9_pe_qr3'],
            'subject_g9_pe_qr4' => $validatedFields['subject_g9_pe_qr4'],
            'subject_g9_pe_rem' => $validatedFields['subject_g9_pe_rem'],

            'subject_g10_pe_qr1' => $validatedFields['subject_g10_pe_qr1'],
            'subject_g10_pe_qr2' => $validatedFields['subject_g10_pe_qr2'],
            'subject_g10_pe_qr3' => $validatedFields['subject_g10_pe_qr3'],
            'subject_g10_pe_qr4' => $validatedFields['subject_g10_pe_qr4'],
            'subject_g10_pe_rem' => $validatedFields['subject_g10_pe_rem'],

            // Subject -> health
            'subject_g7_hp_qr1' => $validatedFields['subject_g7_hp_qr1'],
            'subject_g7_hp_qr2' => $validatedFields['subject_g7_hp_qr2'],
            'subject_g7_hp_qr3' => $validatedFields['subject_g7_hp_qr3'],
            'subject_g7_hp_qr4' => $validatedFields['subject_g7_hp_qr4'],
            'subject_g7_hp_rem' => $validatedFields['subject_g7_hp_rem'],

            'subject_g8_hp_qr1' => $validatedFields['subject_g8_hp_qr1'],
            'subject_g8_hp_qr2' => $validatedFields['subject_g8_hp_qr2'],
            'subject_g8_hp_qr3' => $validatedFields['subject_g8_hp_qr3'],
            'subject_g8_hp_qr4' => $validatedFields['subject_g8_hp_qr4'],
            'subject_g8_hp_rem' => $validatedFields['subject_g8_hp_rem'],

            'subject_g9_hp_qr1' => $validatedFields['subject_g9_hp_qr1'],
            'subject_g9_hp_qr2' => $validatedFields['subject_g9_hp_qr2'],
            'subject_g9_hp_qr3' => $validatedFields['subject_g9_hp_qr3'],
            'subject_g9_hp_qr4' => $validatedFields['subject_g9_hp_qr4'],
            'subject_g9_hp_rem' => $validatedFields['subject_g9_hp_rem'],

            'subject_g10_hp_qr1' => $validatedFields['subject_g10_hp_qr1'],
            'subject_g10_hp_qr2' => $validatedFields['subject_g10_hp_qr2'],
            'subject_g10_hp_qr3' => $validatedFields['subject_g10_hp_qr3'],
            'subject_g10_hp_qr4' => $validatedFields['subject_g10_hp_qr4'],
            'subject_g10_hp_rem' => $validatedFields['subject_g10_hp_rem'],

            // Attendance -> present
            'attendance_g7_p_jan' => $validatedFields['attendance_g7_p_jan'],
            'attendance_g7_p_feb' => $validatedFields['attendance_g7_p_feb'],
            'attendance_g7_p_mar' => $validatedFields['attendance_g7_p_mar'],
            'attendance_g7_p_apr' => $validatedFields['attendance_g7_p_apr'],
            'attendance_g7_p_may' => $validatedFields['attendance_g7_p_may'],
            'attendance_g7_p_jun' => $validatedFields['attendance_g7_p_jun'],
            'attendance_g7_p_jul' => $validatedFields['attendance_g7_p_jul'],
            'attendance_g7_p_aug' => $validatedFields['attendance_g7_p_aug'],
            'attendance_g7_p_sep' => $validatedFields['attendance_g7_p_sep'],
            'attendance_g7_p_oct' => $validatedFields['attendance_g7_p_oct'],
            'attendance_g7_p_nov' => $validatedFields['attendance_g7_p_nov'],
            'attendance_g7_p_dec' => $validatedFields['attendance_g7_p_dec'],

            'attendance_g8_p_jan' => $validatedFields['attendance_g8_p_jan'],
            'attendance_g8_p_feb' => $validatedFields['attendance_g8_p_feb'],
            'attendance_g8_p_mar' => $validatedFields['attendance_g8_p_mar'],
            'attendance_g8_p_apr' => $validatedFields['attendance_g8_p_apr'],
            'attendance_g8_p_may' => $validatedFields['attendance_g8_p_may'],
            'attendance_g8_p_jun' => $validatedFields['attendance_g8_p_jun'],
            'attendance_g8_p_jul' => $validatedFields['attendance_g8_p_jul'],
            'attendance_g8_p_aug' => $validatedFields['attendance_g8_p_aug'],
            'attendance_g8_p_sep' => $validatedFields['attendance_g8_p_sep'],
            'attendance_g8_p_oct' => $validatedFields['attendance_g8_p_oct'],
            'attendance_g8_p_nov' => $validatedFields['attendance_g8_p_nov'],
            'attendance_g8_p_dec' => $validatedFields['attendance_g8_p_dec'],
        
            'attendance_g9_p_jan' => $validatedFields['attendance_g9_p_jan'],
            'attendance_g9_p_feb' => $validatedFields['attendance_g9_p_feb'],
            'attendance_g9_p_mar' => $validatedFields['attendance_g9_p_mar'],
            'attendance_g9_p_apr' => $validatedFields['attendance_g9_p_apr'],
            'attendance_g9_p_may' => $validatedFields['attendance_g9_p_may'],
            'attendance_g9_p_jun' => $validatedFields['attendance_g9_p_jun'],
            'attendance_g9_p_jul' => $validatedFields['attendance_g9_p_jul'],
            'attendance_g9_p_aug' => $validatedFields['attendance_g9_p_aug'],
            'attendance_g9_p_sep' => $validatedFields['attendance_g9_p_sep'],
            'attendance_g9_p_oct' => $validatedFields['attendance_g9_p_oct'],
            'attendance_g9_p_nov' => $validatedFields['attendance_g9_p_nov'],
            'attendance_g9_p_dec' => $validatedFields['attendance_g9_p_dec'],
        
            'attendance_g10_p_jan' => $validatedFields['attendance_g10_p_jan'],
            'attendance_g10_p_feb' => $validatedFields['attendance_g10_p_feb'],
            'attendance_g10_p_mar' => $validatedFields['attendance_g10_p_mar'],
            'attendance_g10_p_apr' => $validatedFields['attendance_g10_p_apr'],
            'attendance_g10_p_may' => $validatedFields['attendance_g10_p_may'],
            'attendance_g10_p_jun' => $validatedFields['attendance_g10_p_jun'],
            'attendance_g10_p_jul' => $validatedFields['attendance_g10_p_jul'],
            'attendance_g10_p_aug' => $validatedFields['attendance_g10_p_aug'],
            'attendance_g10_p_sep' => $validatedFields['attendance_g10_p_sep'],
            'attendance_g10_p_oct' => $validatedFields['attendance_g10_p_oct'],
            'attendance_g10_p_nov' => $validatedFields['attendance_g10_p_nov'],
            'attendance_g10_p_dec' => $validatedFields['attendance_g10_p_dec'],

            // Attendance -> absent
            'attendance_g7_a_jan' => $validatedFields['attendance_g7_a_jan'],
            'attendance_g7_a_feb' => $validatedFields['attendance_g7_a_feb'],
            'attendance_g7_a_mar' => $validatedFields['attendance_g7_a_mar'],
            'attendance_g7_a_apr' => $validatedFields['attendance_g7_a_apr'],
            'attendance_g7_a_may' => $validatedFields['attendance_g7_a_may'],
            'attendance_g7_a_jun' => $validatedFields['attendance_g7_a_jun'],
            'attendance_g7_a_jul' => $validatedFields['attendance_g7_a_jul'],
            'attendance_g7_a_aug' => $validatedFields['attendance_g7_a_aug'],
            'attendance_g7_a_sep' => $validatedFields['attendance_g7_a_sep'],
            'attendance_g7_a_oct' => $validatedFields['attendance_g7_a_oct'],
            'attendance_g7_a_nov' => $validatedFields['attendance_g7_a_nov'],
            'attendance_g7_a_dec' => $validatedFields['attendance_g7_a_dec'],

            'attendance_g8_a_jan' => $validatedFields['attendance_g8_a_jan'],
            'attendance_g8_a_feb' => $validatedFields['attendance_g8_a_feb'],
            'attendance_g8_a_mar' => $validatedFields['attendance_g8_a_mar'],
            'attendance_g8_a_apr' => $validatedFields['attendance_g8_a_apr'],
            'attendance_g8_a_may' => $validatedFields['attendance_g8_a_may'],
            'attendance_g8_a_jun' => $validatedFields['attendance_g8_a_jun'],
            'attendance_g8_a_jul' => $validatedFields['attendance_g8_a_jul'],
            'attendance_g8_a_aug' => $validatedFields['attendance_g8_a_aug'],
            'attendance_g8_a_sep' => $validatedFields['attendance_g8_a_sep'],
            'attendance_g8_a_oct' => $validatedFields['attendance_g8_a_oct'],
            'attendance_g8_a_nov' => $validatedFields['attendance_g8_a_nov'],
            'attendance_g8_a_dec' => $validatedFields['attendance_g8_a_dec'],
        
            'attendance_g9_a_jan' => $validatedFields['attendance_g9_a_jan'],
            'attendance_g9_a_feb' => $validatedFields['attendance_g9_a_feb'],
            'attendance_g9_a_mar' => $validatedFields['attendance_g9_a_mar'],
            'attendance_g9_a_apr' => $validatedFields['attendance_g9_a_apr'],
            'attendance_g9_a_may' => $validatedFields['attendance_g9_a_may'],
            'attendance_g9_a_jun' => $validatedFields['attendance_g9_a_jun'],
            'attendance_g9_a_jul' => $validatedFields['attendance_g9_a_jul'],
            'attendance_g9_a_aug' => $validatedFields['attendance_g9_a_aug'],
            'attendance_g9_a_sep' => $validatedFields['attendance_g9_a_sep'],
            'attendance_g9_a_oct' => $validatedFields['attendance_g9_a_oct'],
            'attendance_g9_a_nov' => $validatedFields['attendance_g9_a_nov'],
            'attendance_g9_a_dec' => $validatedFields['attendance_g9_a_dec'],
        
            'attendance_g10_a_jan' => $validatedFields['attendance_g10_a_jan'],
            'attendance_g10_a_feb' => $validatedFields['attendance_g10_a_feb'],
            'attendance_g10_a_mar' => $validatedFields['attendance_g10_a_mar'],
            'attendance_g10_a_apr' => $validatedFields['attendance_g10_a_apr'],
            'attendance_g10_a_may' => $validatedFields['attendance_g10_a_may'],
            'attendance_g10_a_jun' => $validatedFields['attendance_g10_a_jun'],
            'attendance_g10_a_jul' => $validatedFields['attendance_g10_a_jul'],
            'attendance_g10_a_aug' => $validatedFields['attendance_g10_a_aug'],
            'attendance_g10_a_sep' => $validatedFields['attendance_g10_a_sep'],
            'attendance_g10_a_oct' => $validatedFields['attendance_g10_a_oct'],
            'attendance_g10_a_nov' => $validatedFields['attendance_g10_a_nov'],
            'attendance_g10_a_dec' => $validatedFields['attendance_g10_a_dec'],
            
            // Values -> maka - diyos
            'values_g7_md_s1_qr1' => $validatedFields['values_g7_md_s1_qr1'],
            'values_g7_md_s1_qr2' => $validatedFields['values_g7_md_s1_qr2'],
            'values_g7_md_s1_qr3' => $validatedFields['values_g7_md_s1_qr3'],
            'values_g7_md_s1_qr4' => $validatedFields['values_g7_md_s1_qr4'],
            'values_g7_md_s2_qr1' => $validatedFields['values_g7_md_s2_qr1'],
            'values_g7_md_s2_qr2' => $validatedFields['values_g7_md_s2_qr2'],
            'values_g7_md_s2_qr3' => $validatedFields['values_g7_md_s2_qr3'],
            'values_g7_md_s2_qr4' => $validatedFields['values_g7_md_s2_qr4'],

            'values_g8_md_s1_qr1' => $validatedFields['values_g8_md_s1_qr1'],
            'values_g8_md_s1_qr2' => $validatedFields['values_g8_md_s1_qr2'],
            'values_g8_md_s1_qr3' => $validatedFields['values_g8_md_s1_qr3'],
            'values_g8_md_s1_qr4' => $validatedFields['values_g8_md_s1_qr4'],
            'values_g8_md_s2_qr1' => $validatedFields['values_g8_md_s2_qr1'],
            'values_g8_md_s2_qr2' => $validatedFields['values_g8_md_s2_qr2'],
            'values_g8_md_s2_qr3' => $validatedFields['values_g8_md_s2_qr3'],
            'values_g8_md_s2_qr4' => $validatedFields['values_g8_md_s2_qr4'],

            'values_g9_md_s1_qr1' => $validatedFields['values_g9_md_s1_qr1'],
            'values_g9_md_s1_qr2' => $validatedFields['values_g9_md_s1_qr2'],
            'values_g9_md_s1_qr3' => $validatedFields['values_g9_md_s1_qr3'],
            'values_g9_md_s1_qr4' => $validatedFields['values_g9_md_s1_qr4'],
            'values_g9_md_s2_qr1' => $validatedFields['values_g9_md_s2_qr1'],
            'values_g9_md_s2_qr2' => $validatedFields['values_g9_md_s2_qr2'],
            'values_g9_md_s2_qr3' => $validatedFields['values_g9_md_s2_qr3'],
            'values_g9_md_s2_qr4' => $validatedFields['values_g9_md_s2_qr4'],

            'values_g10_md_s1_qr1' => $validatedFields['values_g10_md_s1_qr1'],
            'values_g10_md_s1_qr2' => $validatedFields['values_g10_md_s1_qr2'],
            'values_g10_md_s1_qr3' => $validatedFields['values_g10_md_s1_qr3'],
            'values_g10_md_s1_qr4' => $validatedFields['values_g10_md_s1_qr4'],
            'values_g10_md_s2_qr1' => $validatedFields['values_g10_md_s2_qr1'],
            'values_g10_md_s2_qr2' => $validatedFields['values_g10_md_s2_qr2'],
            'values_g10_md_s2_qr3' => $validatedFields['values_g10_md_s2_qr3'],
            'values_g10_md_s2_qr4' => $validatedFields['values_g10_md_s2_qr4'],

            // Values -> maka - tao
            'values_g7_mt_s1_qr1' => $validatedFields['values_g7_mt_s1_qr1'],
            'values_g7_mt_s1_qr2' => $validatedFields['values_g7_mt_s1_qr2'],
            'values_g7_mt_s1_qr3' => $validatedFields['values_g7_mt_s1_qr3'],
            'values_g7_mt_s1_qr4' => $validatedFields['values_g7_mt_s1_qr4'],
            'values_g7_mt_s2_qr1' => $validatedFields['values_g7_mt_s2_qr1'],
            'values_g7_mt_s2_qr2' => $validatedFields['values_g7_mt_s2_qr2'],
            'values_g7_mt_s2_qr3' => $validatedFields['values_g7_mt_s2_qr3'],
            'values_g7_mt_s2_qr4' => $validatedFields['values_g7_mt_s2_qr4'],

            'values_g8_mt_s1_qr1' => $validatedFields['values_g8_mt_s1_qr1'],
            'values_g8_mt_s1_qr2' => $validatedFields['values_g8_mt_s1_qr2'],
            'values_g8_mt_s1_qr3' => $validatedFields['values_g8_mt_s1_qr3'],
            'values_g8_mt_s1_qr4' => $validatedFields['values_g8_mt_s1_qr4'],
            'values_g8_mt_s2_qr1' => $validatedFields['values_g8_mt_s2_qr1'],
            'values_g8_mt_s2_qr2' => $validatedFields['values_g8_mt_s2_qr2'],
            'values_g8_mt_s2_qr3' => $validatedFields['values_g8_mt_s2_qr3'],
            'values_g8_mt_s2_qr4' => $validatedFields['values_g8_mt_s2_qr4'],

            'values_g9_mt_s1_qr1' => $validatedFields['values_g9_mt_s1_qr1'],
            'values_g9_mt_s1_qr2' => $validatedFields['values_g9_mt_s1_qr2'],
            'values_g9_mt_s1_qr3' => $validatedFields['values_g9_mt_s1_qr3'],
            'values_g9_mt_s1_qr4' => $validatedFields['values_g9_mt_s1_qr4'],
            'values_g9_mt_s2_qr1' => $validatedFields['values_g9_mt_s2_qr1'],
            'values_g9_mt_s2_qr2' => $validatedFields['values_g9_mt_s2_qr2'],
            'values_g9_mt_s2_qr3' => $validatedFields['values_g9_mt_s2_qr3'],
            'values_g9_mt_s2_qr4' => $validatedFields['values_g9_mt_s2_qr4'],

            'values_g10_mt_s1_qr1' => $validatedFields['values_g10_mt_s1_qr1'],
            'values_g10_mt_s1_qr2' => $validatedFields['values_g10_mt_s1_qr2'],
            'values_g10_mt_s1_qr3' => $validatedFields['values_g10_mt_s1_qr3'],
            'values_g10_mt_s1_qr4' => $validatedFields['values_g10_mt_s1_qr4'],
            'values_g10_mt_s2_qr1' => $validatedFields['values_g10_mt_s2_qr1'],
            'values_g10_mt_s2_qr2' => $validatedFields['values_g10_mt_s2_qr2'],
            'values_g10_mt_s2_qr3' => $validatedFields['values_g10_mt_s2_qr3'],
            'values_g10_mt_s2_qr4' => $validatedFields['values_g10_mt_s2_qr4'],

            // Values -> maka - kalikasan
            'values_g7_mk_qr1' => $validatedFields['values_g7_mk_qr1'],
            'values_g7_mk_qr2' => $validatedFields['values_g7_mk_qr2'],
            'values_g7_mk_qr3' => $validatedFields['values_g7_mk_qr3'],
            'values_g7_mk_qr4' => $validatedFields['values_g7_mk_qr4'],

            'values_g8_mk_qr1' => $validatedFields['values_g8_mk_qr1'],
            'values_g8_mk_qr2' => $validatedFields['values_g8_mk_qr2'],
            'values_g8_mk_qr3' => $validatedFields['values_g8_mk_qr3'],
            'values_g8_mk_qr4' => $validatedFields['values_g8_mk_qr4'],

            'values_g9_mk_qr1' => $validatedFields['values_g9_mk_qr1'],
            'values_g9_mk_qr2' => $validatedFields['values_g9_mk_qr2'],
            'values_g9_mk_qr3' => $validatedFields['values_g9_mk_qr3'],
            'values_g9_mk_qr4' => $validatedFields['values_g9_mk_qr4'],

            'values_g10_mk_qr1' => $validatedFields['values_g10_mk_qr1'],
            'values_g10_mk_qr2' => $validatedFields['values_g10_mk_qr2'],
            'values_g10_mk_qr3' => $validatedFields['values_g10_mk_qr3'],
            'values_g10_mk_qr4' => $validatedFields['values_g10_mk_qr4'],

            // Values -> maka - bansa
            'values_g7_mb_s1_qr1' => $validatedFields['values_g7_mb_s1_qr1'],
            'values_g7_mb_s1_qr2' => $validatedFields['values_g7_mb_s1_qr2'],
            'values_g7_mb_s1_qr3' => $validatedFields['values_g7_mb_s1_qr3'],
            'values_g7_mb_s1_qr4' => $validatedFields['values_g7_mb_s1_qr4'],
            'values_g7_mb_s2_qr1' => $validatedFields['values_g7_mb_s2_qr1'],
            'values_g7_mb_s2_qr2' => $validatedFields['values_g7_mb_s2_qr2'],
            'values_g7_mb_s2_qr3' => $validatedFields['values_g7_mb_s2_qr3'],
            'values_g7_mb_s2_qr4' => $validatedFields['values_g7_mb_s2_qr4'],

            'values_g8_mb_s1_qr1' => $validatedFields['values_g8_mb_s1_qr1'],
            'values_g8_mb_s1_qr2' => $validatedFields['values_g8_mb_s1_qr2'],
            'values_g8_mb_s1_qr3' => $validatedFields['values_g8_mb_s1_qr3'],
            'values_g8_mb_s1_qr4' => $validatedFields['values_g8_mb_s1_qr4'],
            'values_g8_mb_s2_qr1' => $validatedFields['values_g8_mb_s2_qr1'],
            'values_g8_mb_s2_qr2' => $validatedFields['values_g8_mb_s2_qr2'],
            'values_g8_mb_s2_qr3' => $validatedFields['values_g8_mb_s2_qr3'],
            'values_g8_mb_s2_qr4' => $validatedFields['values_g8_mb_s2_qr4'],

            'values_g9_mb_s1_qr1' => $validatedFields['values_g9_mb_s1_qr1'],
            'values_g9_mb_s1_qr2' => $validatedFields['values_g9_mb_s1_qr2'],
            'values_g9_mb_s1_qr3' => $validatedFields['values_g9_mb_s1_qr3'],
            'values_g9_mb_s1_qr4' => $validatedFields['values_g9_mb_s1_qr4'],
            'values_g9_mb_s2_qr1' => $validatedFields['values_g9_mb_s2_qr1'],
            'values_g9_mb_s2_qr2' => $validatedFields['values_g9_mb_s2_qr2'],
            'values_g9_mb_s2_qr3' => $validatedFields['values_g9_mb_s2_qr3'],
            'values_g9_mb_s2_qr4' => $validatedFields['values_g9_mb_s2_qr4'],

            'values_g10_mb_s1_qr1' => $validatedFields['values_g10_mb_s1_qr1'],
            'values_g10_mb_s1_qr2' => $validatedFields['values_g10_mb_s1_qr2'],
            'values_g10_mb_s1_qr3' => $validatedFields['values_g10_mb_s1_qr3'],
            'values_g10_mb_s1_qr4' => $validatedFields['values_g10_mb_s1_qr4'],
            'values_g10_mb_s2_qr1' => $validatedFields['values_g10_mb_s2_qr1'],
            'values_g10_mb_s2_qr2' => $validatedFields['values_g10_mb_s2_qr2'],
            'values_g10_mb_s2_qr3' => $validatedFields['values_g10_mb_s2_qr3'],
            'values_g10_mb_s2_qr4' => $validatedFields['values_g10_mb_s2_qr4'],
        ]);

        // Redirect
        return redirect()->to('/manager/edit/'.$id);
    }
}