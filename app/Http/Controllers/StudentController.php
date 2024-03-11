<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Request;

// Do-not-touch
// Whitespace-checked
// Restriction-checked

class StudentController extends Controller {
    // RESTRICTION
    public function restrict ($auth) {
        if (
            $auth != null &&
            $auth->is_principal ||
            $auth->is_administrator ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher
        ) {
            return false;
        }
        else {
            return true;
        }
    }

    // REDIRECT
    public function redirect () { return redirect()->to('/students'); }

    // INDEX
    public function index () {
        // Restrict
        $auth = (new Controller)->auth();

        if (self::restrict($auth)) {
            return (new Controller)->home();
        }

        // Proceed
        $terms = Request::get('terms');
        $search = explode(' ', $terms);
        $students = Student::query();

        foreach ($search as $term) {
            $students->where(function ($q) use ($term) {
                $q->where('info_name_last', 'like', '%'.$term.'%')
                ->orWhere('info_name_first', 'like', '%'.$term.'%')
                ->orWhere('info_name_suffix', 'like', '%'.$term.'%')
                ->orWhere('info_name_middle', 'like', '%'.$term.'%')
                ->orWhere('info_lrn', 'like', '%'.$term.'%');
            });
        }

        $students = self::func_format_students($students);

        return view('pages.students.index')
            ->with('auth', $auth)
            ->with('terms', $terms)
            ->with('students', $students);
    }

    // CREATE
    public function create_1 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.students.create')
            ->with('auth', $auth);
    }
    public function create_2 () {
        // Restrict
        $auth = (new Controller)->auth();

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validate = request()->validate([
            'info_name_last' => 'required',
            'info_name_first' => 'required',
            'info_name_suffix' => 'nullable',
            'info_name_middle' => 'required',
            'info_lrn' => 'required|unique:students,info_lrn',
            'info_sex' => 'required',
            'info_birthdate' => 'required',
        ]);

        Student::create([
            'info_name_last' => $validate['info_name_last'],
            'info_name_first' => $validate['info_name_first'],
            'info_name_middle' => $validate['info_name_middle'],
            'info_name_suffix' => $validate['info_name_suffix'],
            'info_lrn' => $validate['info_lrn'],
            'info_sex' => $validate['info_sex'],
            'info_birthdate' => $validate['info_birthdate'],
        ]);

        return self::redirect();
    }

    // VIEW
    public function view ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $student == null
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        $student = self::func_format_student($student);

        $student->ST_locker = true;

        return view('pages.students.view')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('student', $student);
    }

    // EDIT (Info)
    public function edit_info_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.students.edit-info')
            ->with('auth', $auth)
            ->with('student', $student);
    }
    public function edit_info_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validate = request()->validate([
            'info_name_last' => 'required',
            'info_name_first' => 'required',
            'info_name_suffix' => 'nullable',
            'info_name_middle' => 'required',
            'info_lrn' => 'required|unique:students,info_lrn,'.$id,
            'info_sex' => 'required',
            'info_birthdate' => 'required',
        ]);

        $student->update([
            'info_name_last' => $validate['info_name_last'],
            'info_name_first' => $validate['info_name_first'],
            'info_name_suffix' => $validate['info_name_suffix'],
            'info_name_middle' => $validate['info_name_middle'],
            'info_lrn' => $validate['info_lrn'],
            'info_sex' => $validate['info_sex'],
            'info_birthdate' => $validate['info_birthdate'],
        ]);

        $student->touch();

        return redirect()->to('/students/edit/info/'.$id);
    }

    // EDIT (Area)
    public function edit_area_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();
        $sections = Section::whereNotNull('section')->get();
        $years = Year::orderBy('year', 'DESC')->get();

        foreach ($sections as $section) {
            $user = User::find($section->DB_USER_id);

            if ($user != null) {
                $section->user = '| '.$user->name_last.', '.$user->name_first;
            }
        }

        return view('pages.students.edit-area')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('sections', $sections)
            ->with('student', $student)
            ->with('years', $years);
    }
    public function edit_area_2 ($id) {
        /// Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        foreach ($grades as $grade) {
            $validate = request()->validate([
                'DB_SECTION_id_g'.$grade->grade => 'nullable',

                'LG_SECTION_name_g'.$grade->grade => 'nullable',

                'LG_USER_name_last_g'.$grade->grade => 'nullable',
                'LG_USER_name_first_g'.$grade->grade => 'nullable',

                'DB_YEAR_id_g'.$grade->grade => 'nullable',
            ]);

            $student->update([
                'DB_SECTION_id_g'.$grade->grade => $validate['DB_SECTION_id_g'.$grade->grade],

                'LG_SECTION_name_g'.$grade->grade => $validate['DB_SECTION_id_g'.$grade->grade] == null ? $validate['LG_SECTION_name_g'.$grade->grade] : null,

                'DB_YEAR_id_g'.$grade->grade => $validate['DB_YEAR_id_g'.$grade->grade],
            ]);

            $section = Section::find($student->{'DB_SECTION_id_g'.$grade->grade});
            $user = null;

            if ($section != null) {
                $user = User::find($section->DB_USER_id);
            }

            $student->update([
                'LG_USER_name_last_g'.$grade->grade => $user == null ? $validate['LG_USER_name_last_g'.$grade->grade] : null,
                'LG_USER_name_first_g'.$grade->grade => $user == null ? $validate['LG_USER_name_first_g'.$grade->grade] : null,
            ]);

            $student->touch();
        }

        return redirect()->to('/students/edit/area/'.$id);
    }

    // EDIT (Form)
    public function edit_form_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        $student = self::func_format_student($student);

        return view('pages.students.edit-form')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('student', $student);
    }
    public function edit_form_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        // SF10: Enrollment
        $validate_sf10_enrollment = request()->validate([
            'sf10_enrollment_elementary_boolean' => 'nullable',
            'sf10_enrollment_elementary_average' => 'nullable',
            'sf10_enrollment_elementary_citation' => 'nullable',
            'sf10_enrollment_elementary_name' => 'nullable',
            'sf10_enrollment_elementary_id' => 'nullable',
            'sf10_enrollment_elementary_address' => 'nullable',

            'sf10_enrollment_other_pept_boolean' => 'nullable',
            'sf10_enrollment_other_pept_rating' => 'nullable',
            'sf10_enrollment_other_alsae_boolean' => 'nullable',
            'sf10_enrollment_other_alsae_rating' => 'nullable',
            'sf10_enrollment_other_specify_boolean' => 'nullable',
            'sf10_enrollment_other_specify_rating' => 'nullable',
            'sf10_enrollment_other_date' => 'nullable',
            'sf10_enrollment_other_location' => 'nullable',
        ]);

        $student->update([
            'sf10_enrollment_elementary_boolean' => isset($validate_sf10_enrollment['sf10_enrollment_elementary_boolean']) ? 1 : 0,
            'sf10_enrollment_elementary_average' => $validate_sf10_enrollment['sf10_enrollment_elementary_average'],
            'sf10_enrollment_elementary_citation' => $validate_sf10_enrollment['sf10_enrollment_elementary_citation'],
            'sf10_enrollment_elementary_name' => $validate_sf10_enrollment['sf10_enrollment_elementary_name'],
            'sf10_enrollment_elementary_id' => $validate_sf10_enrollment['sf10_enrollment_elementary_id'],
            'sf10_enrollment_elementary_address' => $validate_sf10_enrollment['sf10_enrollment_elementary_address'],

            'sf10_enrollment_other_pept_boolean' => isset($validate_sf10_enrollment['sf10_enrollment_other_pept_boolean']) ? 1 : 0,
            'sf10_enrollment_other_pept_rating' => $validate_sf10_enrollment['sf10_enrollment_other_pept_rating'],
            'sf10_enrollment_other_alsae_boolean' => isset($validate_sf10_enrollment['sf10_enrollment_other_alsae_boolean']) ? 1 : 0,
            'sf10_enrollment_other_alsae_rating' => $validate_sf10_enrollment['sf10_enrollment_other_alsae_rating'],
            'sf10_enrollment_other_specify_boolean' => isset($validate_sf10_enrollment['sf10_enrollment_other_specify_boolean']) ? 1 : 0,
            'sf10_enrollment_other_specify_rating' => $validate_sf10_enrollment['sf10_enrollment_other_specify_rating'],
            'sf10_enrollment_other_date' => $validate_sf10_enrollment['sf10_enrollment_other_date'],
            'sf10_enrollment_other_location' => $validate_sf10_enrollment['sf10_enrollment_other_location'],
        ]);

        // SF10: Certification
        $validate_sf10_certification = request()->validate([
            'sf10_certification_back_grade' => 'nullable',
            'sf10_certification_back_school_name' => 'nullable',
            'sf10_certification_back_school_id' => 'nullable',
            'sf10_certification_back_school_year' => 'nullable',
            'sf10_certification_back_date' => 'nullable',
            'sf10_certification_back_principal' => 'nullable',

            'sf10_certification_front_grade' => 'nullable',
            'sf10_certification_front_school_name' => 'nullable',
            'sf10_certification_front_school_id' => 'nullable',
            'sf10_certification_front_school_year' => 'nullable',
            'sf10_certification_front_date' => 'nullable',
            'sf10_certification_front_principal' => 'nullable',
        ]);

        $student->update([
            'sf10_certification_back_grade' => $validate_sf10_certification['sf10_certification_back_grade'],
            'sf10_certification_back_school_name' => $validate_sf10_certification['sf10_certification_back_school_name'],
            'sf10_certification_back_school_id' => $validate_sf10_certification['sf10_certification_back_school_id'],
            'sf10_certification_back_school_year' => $validate_sf10_certification['sf10_certification_back_school_year'],
            'sf10_certification_back_date' => $validate_sf10_certification['sf10_certification_back_date'],
            'sf10_certification_back_principal' => $validate_sf10_certification['sf10_certification_back_principal'],

            'sf10_certification_front_grade' => $validate_sf10_certification['sf10_certification_front_grade'],
            'sf10_certification_front_school_name' => $validate_sf10_certification['sf10_certification_front_school_name'],
            'sf10_certification_front_school_id' => $validate_sf10_certification['sf10_certification_front_school_id'],
            'sf10_certification_front_school_year' => $validate_sf10_certification['sf10_certification_front_school_year'],
            'sf10_certification_front_date' => $validate_sf10_certification['sf10_certification_front_date'],
            'sf10_certification_front_principal' => $validate_sf10_certification['sf10_certification_front_principal'],
        ]);

        // Various
        foreach ($grades as $grade) {
            // SF9: Report
            $validate_sf9_report = request()->validate([
                'sf9_g'.$grade->grade.'_report_age' => 'nullable',  
                'sf9_g'.$grade->grade.'_report_transfer_input_1' => 'nullable', 
                'sf9_g'.$grade->grade.'_report_transfer_input_2' => 'nullable', 
                'sf9_g'.$grade->grade.'_report_transfer_input_3' => 'nullable', 
                'sf9_g'.$grade->grade.'_report_transfer_input_date' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_report_age' => $validate_sf9_report['sf9_g'.$grade->grade.'_report_age'],
                'sf9_g'.$grade->grade.'_report_transfer_input_1' => $validate_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_1'],
                'sf9_g'.$grade->grade.'_report_transfer_input_2' => $validate_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_2'],
                'sf9_g'.$grade->grade.'_report_transfer_input_3' => $validate_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_3'],
                'sf9_g'.$grade->grade.'_report_transfer_input_date' => $validate_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_date'],
            ]);

            // SF9: Attendance -> present
            $validate_sf9_attendance_p = request()->validate([
                'sf9_g'.$grade->grade.'_attendance_jan_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_feb_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_mar_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_apr_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_may_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_jun_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_jul_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_aug_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_sep_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_oct_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_nov_p' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_dec_p' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_attendance_jan_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_jan_p'],
                'sf9_g'.$grade->grade.'_attendance_feb_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_feb_p'],
                'sf9_g'.$grade->grade.'_attendance_mar_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_mar_p'],
                'sf9_g'.$grade->grade.'_attendance_apr_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_apr_p'],
                'sf9_g'.$grade->grade.'_attendance_may_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_may_p'],
                'sf9_g'.$grade->grade.'_attendance_jun_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_jun_p'],
                'sf9_g'.$grade->grade.'_attendance_jul_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_jul_p'],
                'sf9_g'.$grade->grade.'_attendance_aug_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_aug_p'],
                'sf9_g'.$grade->grade.'_attendance_sep_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_sep_p'],
                'sf9_g'.$grade->grade.'_attendance_oct_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_oct_p'],
                'sf9_g'.$grade->grade.'_attendance_nov_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_nov_p'],
                'sf9_g'.$grade->grade.'_attendance_dec_p' => $validate_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_dec_p'],
            ]);

            // SF9: Attendance -> absent
            $validate_sf9_attendance_a = request()->validate([
                'sf9_g'.$grade->grade.'_attendance_jan_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_feb_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_mar_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_apr_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_may_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_jun_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_jul_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_aug_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_sep_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_oct_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_nov_a' => 'nullable',
                'sf9_g'.$grade->grade.'_attendance_dec_a' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_attendance_jan_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_jan_a'],
                'sf9_g'.$grade->grade.'_attendance_feb_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_feb_a'],
                'sf9_g'.$grade->grade.'_attendance_mar_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_mar_a'],
                'sf9_g'.$grade->grade.'_attendance_apr_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_apr_a'],
                'sf9_g'.$grade->grade.'_attendance_may_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_may_a'],
                'sf9_g'.$grade->grade.'_attendance_jun_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_jun_a'],
                'sf9_g'.$grade->grade.'_attendance_jul_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_jul_a'],
                'sf9_g'.$grade->grade.'_attendance_aug_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_aug_a'],
                'sf9_g'.$grade->grade.'_attendance_sep_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_sep_a'],
                'sf9_g'.$grade->grade.'_attendance_oct_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_oct_a'],
                'sf9_g'.$grade->grade.'_attendance_nov_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_nov_a'],
                'sf9_g'.$grade->grade.'_attendance_dec_a' => $validate_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_dec_a'],
            ]);

            // SF9: Values -> maka - diyos
            $validate_sf9_values_md = request()->validate([
                'sf9_g'.$grade->grade.'_values_qr1_md_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_md_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_md_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_md_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr1_md_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_md_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_md_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_md_s2' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_values_qr1_md_s1' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr1_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr2_md_s1' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr2_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr3_md_s1' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr3_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr4_md_s1' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr4_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr1_md_s2' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr1_md_s2'],
                'sf9_g'.$grade->grade.'_values_qr2_md_s2' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr2_md_s2'],
                'sf9_g'.$grade->grade.'_values_qr3_md_s2' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr3_md_s2'],
                'sf9_g'.$grade->grade.'_values_qr4_md_s2' => $validate_sf9_values_md['sf9_g'.$grade->grade.'_values_qr4_md_s2'],
            ]);

            // SF9: Values -> maka - tao
            $validate_sf9_values_mt = request()->validate([
                'sf9_g'.$grade->grade.'_values_qr1_mt_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_mt_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_mt_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_mt_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr1_mt_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_mt_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_mt_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_mt_s2' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_values_qr1_mt_s1' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr1_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr2_mt_s1' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr2_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr3_mt_s1' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr3_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr4_mt_s1' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr4_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr1_mt_s2' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr1_mt_s2'],
                'sf9_g'.$grade->grade.'_values_qr2_mt_s2' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr2_mt_s2'],
                'sf9_g'.$grade->grade.'_values_qr3_mt_s2' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr3_mt_s2'],
                'sf9_g'.$grade->grade.'_values_qr4_mt_s2' => $validate_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr4_mt_s2'],
            ]);

            // SF9: Values -> maka - kalikasan
            $validate_sf9_values_mk = request()->validate([
                'sf9_g'.$grade->grade.'_values_qr1_mk' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_mk' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_mk' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_mk' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_values_qr1_mk' => $validate_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr1_mk'],
                'sf9_g'.$grade->grade.'_values_qr2_mk' => $validate_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr2_mk'],
                'sf9_g'.$grade->grade.'_values_qr3_mk' => $validate_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr3_mk'],
                'sf9_g'.$grade->grade.'_values_qr4_mk' => $validate_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr4_mk'],
            ]);

            // SF9: Values -> maka - bansa
            $validate_sf9_values_mb = request()->validate([
                'sf9_g'.$grade->grade.'_values_qr1_mb_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_mb_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_mb_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_mb_s1' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr1_mb_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_mb_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_mb_s2' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_mb_s2' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_values_qr1_mb_s1' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr1_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr2_mb_s1' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr2_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr3_mb_s1' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr3_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr4_mb_s1' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr4_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr1_mb_s2' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr1_mb_s2'],
                'sf9_g'.$grade->grade.'_values_qr2_mb_s2' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr2_mb_s2'],
                'sf9_g'.$grade->grade.'_values_qr3_mb_s2' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr3_mb_s2'],
                'sf9_g'.$grade->grade.'_values_qr4_mb_s2' => $validate_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr4_mb_s2'],
            ]);

            // SF10: Scholastic record
            $validate_sf10_record = request()->validate([
                'sf10_g'.$grade->grade.'_record_school_name' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_id' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_district' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_division' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_region' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_grade' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_section' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_year' => 'nullable',
                'sf10_g'.$grade->grade.'_record_school_teacher' => 'nullable',
                'sf10_g'.$grade->grade.'_record_remedial_date_start' => 'nullable',
                'sf10_g'.$grade->grade.'_record_remedial_date_end' => 'nullable',
            ]);

            $student->update([
                'sf10_g'.$grade->grade.'_record_school_name' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_name'],
                'sf10_g'.$grade->grade.'_record_school_id' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_id'],
                'sf10_g'.$grade->grade.'_record_school_district' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_district'],
                'sf10_g'.$grade->grade.'_record_school_division' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_division'],
                'sf10_g'.$grade->grade.'_record_school_region' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_region'],
                'sf10_g'.$grade->grade.'_record_school_grade' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_grade'],
                'sf10_g'.$grade->grade.'_record_school_section' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_section'],
                'sf10_g'.$grade->grade.'_record_school_year' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_year'],
                'sf10_g'.$grade->grade.'_record_school_teacher' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_school_teacher'],
                'sf10_g'.$grade->grade.'_record_remedial_date_start' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_remedial_date_start'],
                'sf10_g'.$grade->grade.'_record_remedial_date_end' => $validate_sf10_record['sf10_g'.$grade->grade.'_record_remedial_date_end'],
            ]);

            // All: Subject -> filipino
            $validate_all_subject_fil = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_fil' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_fil' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_fil' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_fil' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_fil' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_fil' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_fil' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_fil' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_fil' => $validate_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr1_fil'],
                'sf9_g'.$grade->grade.'_subject_qr2_fil' => $validate_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr2_fil'],
                'sf9_g'.$grade->grade.'_subject_qr3_fil' => $validate_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr3_fil'],
                'sf9_g'.$grade->grade.'_subject_qr4_fil' => $validate_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr4_fil'],

                'sf10_g'.$grade->grade.'_subject_qr1_fil' => $validate_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr1_fil'],
                'sf10_g'.$grade->grade.'_subject_qr2_fil' => $validate_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr2_fil'],
                'sf10_g'.$grade->grade.'_subject_qr3_fil' => $validate_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr3_fil'],
                'sf10_g'.$grade->grade.'_subject_qr4_fil' => $validate_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr4_fil'],
            ]);

            // All: Subject -> english
            $validate_all_subject_eng = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_eng' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_eng' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_eng' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_eng' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_eng' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_eng' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_eng' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_eng' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_eng' => $validate_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr1_eng'],
                'sf9_g'.$grade->grade.'_subject_qr2_eng' => $validate_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr2_eng'],
                'sf9_g'.$grade->grade.'_subject_qr3_eng' => $validate_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr3_eng'],
                'sf9_g'.$grade->grade.'_subject_qr4_eng' => $validate_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr4_eng'],

                'sf10_g'.$grade->grade.'_subject_qr1_eng' => $validate_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr1_eng'],
                'sf10_g'.$grade->grade.'_subject_qr2_eng' => $validate_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr2_eng'],
                'sf10_g'.$grade->grade.'_subject_qr3_eng' => $validate_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr3_eng'],
                'sf10_g'.$grade->grade.'_subject_qr4_eng' => $validate_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr4_eng'],
            ]);

            // All: Subject -> mathematics
            $validate_all_subject_mat = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_mat' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_mat' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_mat' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_mat' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_mat' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_mat' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_mat' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_mat' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_mat' => $validate_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr1_mat'],
                'sf9_g'.$grade->grade.'_subject_qr2_mat' => $validate_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr2_mat'],
                'sf9_g'.$grade->grade.'_subject_qr3_mat' => $validate_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr3_mat'],
                'sf9_g'.$grade->grade.'_subject_qr4_mat' => $validate_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr4_mat'],

                'sf10_g'.$grade->grade.'_subject_qr1_mat' => $validate_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr1_mat'],
                'sf10_g'.$grade->grade.'_subject_qr2_mat' => $validate_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr2_mat'],
                'sf10_g'.$grade->grade.'_subject_qr3_mat' => $validate_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr3_mat'],
                'sf10_g'.$grade->grade.'_subject_qr4_mat' => $validate_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr4_mat'],
            ]);

            // All: Subject -> science
            $validate_all_subject_sci = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_sci' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_sci' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_sci' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_sci' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_sci' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_sci' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_sci' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_sci' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_sci' => $validate_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr1_sci'],
                'sf9_g'.$grade->grade.'_subject_qr2_sci' => $validate_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr2_sci'],
                'sf9_g'.$grade->grade.'_subject_qr3_sci' => $validate_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr3_sci'],
                'sf9_g'.$grade->grade.'_subject_qr4_sci' => $validate_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr4_sci'],

                'sf10_g'.$grade->grade.'_subject_qr1_sci' => $validate_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr1_sci'],
                'sf10_g'.$grade->grade.'_subject_qr2_sci' => $validate_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr2_sci'],
                'sf10_g'.$grade->grade.'_subject_qr3_sci' => $validate_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr3_sci'],
                'sf10_g'.$grade->grade.'_subject_qr4_sci' => $validate_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr4_sci'],
            ]);

            // All: Subject -> araling panlipunan (ap)
            $validate_all_subject_ap = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_ap' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_ap' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_ap' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_ap' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_ap' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_ap' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_ap' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_ap' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_ap' => $validate_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr1_ap'],
                'sf9_g'.$grade->grade.'_subject_qr2_ap' => $validate_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr2_ap'],
                'sf9_g'.$grade->grade.'_subject_qr3_ap' => $validate_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr3_ap'],
                'sf9_g'.$grade->grade.'_subject_qr4_ap' => $validate_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr4_ap'],

                'sf10_g'.$grade->grade.'_subject_qr1_ap' => $validate_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr1_ap'],
                'sf10_g'.$grade->grade.'_subject_qr2_ap' => $validate_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr2_ap'],
                'sf10_g'.$grade->grade.'_subject_qr3_ap' => $validate_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr3_ap'],
                'sf10_g'.$grade->grade.'_subject_qr4_ap' => $validate_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr4_ap'],
            ]);

            // All: Subject -> edukasyon sa pagpapakatao (ep)
            $validate_all_subject_ep = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_ep' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_ep' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_ep' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_ep' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_ep' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_ep' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_ep' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_ep' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_ep' => $validate_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr1_ep'],
                'sf9_g'.$grade->grade.'_subject_qr2_ep' => $validate_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr2_ep'],
                'sf9_g'.$grade->grade.'_subject_qr3_ep' => $validate_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr3_ep'],
                'sf9_g'.$grade->grade.'_subject_qr4_ep' => $validate_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr4_ep'],

                'sf10_g'.$grade->grade.'_subject_qr1_ep' => $validate_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr1_ep'],
                'sf10_g'.$grade->grade.'_subject_qr2_ep' => $validate_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr2_ep'],
                'sf10_g'.$grade->grade.'_subject_qr3_ep' => $validate_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr3_ep'],
                'sf10_g'.$grade->grade.'_subject_qr4_ep' => $validate_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr4_ep'],
            ]);

            // All: Subject -> technology and livelihood education (tle)
            $validate_all_subject_tle = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_tle' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_tle' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_tle' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_tle' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_tle' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_tle' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_tle' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_tle' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_tle' => $validate_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr1_tle'],
                'sf9_g'.$grade->grade.'_subject_qr2_tle' => $validate_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr2_tle'],
                'sf9_g'.$grade->grade.'_subject_qr3_tle' => $validate_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr3_tle'],
                'sf9_g'.$grade->grade.'_subject_qr4_tle' => $validate_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr4_tle'],

                'sf10_g'.$grade->grade.'_subject_qr1_tle' => $validate_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr1_tle'],
                'sf10_g'.$grade->grade.'_subject_qr2_tle' => $validate_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr2_tle'],
                'sf10_g'.$grade->grade.'_subject_qr3_tle' => $validate_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr3_tle'],
                'sf10_g'.$grade->grade.'_subject_qr4_tle' => $validate_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr4_tle'],
            ]);

            // All: Subject -> music
            $validate_all_subject_mus = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_mus' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_mus' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_mus' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_mus' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_mus' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_mus' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_mus' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_mus' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_mus' => $validate_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr1_mus'],
                'sf9_g'.$grade->grade.'_subject_qr2_mus' => $validate_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr2_mus'],
                'sf9_g'.$grade->grade.'_subject_qr3_mus' => $validate_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr3_mus'],
                'sf9_g'.$grade->grade.'_subject_qr4_mus' => $validate_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr4_mus'],

                'sf10_g'.$grade->grade.'_subject_qr1_mus' => $validate_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr1_mus'],
                'sf10_g'.$grade->grade.'_subject_qr2_mus' => $validate_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr2_mus'],
                'sf10_g'.$grade->grade.'_subject_qr3_mus' => $validate_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr3_mus'],
                'sf10_g'.$grade->grade.'_subject_qr4_mus' => $validate_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr4_mus'],
            ]);

            // All: Subject -> arts
            $validate_all_subject_art = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_art' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_art' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_art' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_art' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_art' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_art' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_art' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_art' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_art' => $validate_all_subject_art['sf9_g'.$grade->grade.'_subject_qr1_art'],
                'sf9_g'.$grade->grade.'_subject_qr2_art' => $validate_all_subject_art['sf9_g'.$grade->grade.'_subject_qr2_art'],
                'sf9_g'.$grade->grade.'_subject_qr3_art' => $validate_all_subject_art['sf9_g'.$grade->grade.'_subject_qr3_art'],
                'sf9_g'.$grade->grade.'_subject_qr4_art' => $validate_all_subject_art['sf9_g'.$grade->grade.'_subject_qr4_art'],

                'sf10_g'.$grade->grade.'_subject_qr1_art' => $validate_all_subject_art['sf10_g'.$grade->grade.'_subject_qr1_art'],
                'sf10_g'.$grade->grade.'_subject_qr2_art' => $validate_all_subject_art['sf10_g'.$grade->grade.'_subject_qr2_art'],
                'sf10_g'.$grade->grade.'_subject_qr3_art' => $validate_all_subject_art['sf10_g'.$grade->grade.'_subject_qr3_art'],
                'sf10_g'.$grade->grade.'_subject_qr4_art' => $validate_all_subject_art['sf10_g'.$grade->grade.'_subject_qr4_art'],
            ]);

            // All: Subject -> physical education
            $validate_all_subject_pe = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_pe' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_pe' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_pe' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_pe' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_pe' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_pe' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_pe' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_pe' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_pe' => $validate_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr1_pe'],
                'sf9_g'.$grade->grade.'_subject_qr2_pe' => $validate_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr2_pe'],
                'sf9_g'.$grade->grade.'_subject_qr3_pe' => $validate_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr3_pe'],
                'sf9_g'.$grade->grade.'_subject_qr4_pe' => $validate_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr4_pe'],

                'sf10_g'.$grade->grade.'_subject_qr1_pe' => $validate_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr1_pe'],
                'sf10_g'.$grade->grade.'_subject_qr2_pe' => $validate_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr2_pe'],
                'sf10_g'.$grade->grade.'_subject_qr3_pe' => $validate_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr3_pe'],
                'sf10_g'.$grade->grade.'_subject_qr4_pe' => $validate_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr4_pe'],
            ]);

            // All: Subject -> health
            $validate_all_subject_hp = request()->validate([
                'sf9_g'.$grade->grade.'_subject_qr1_hp' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr2_hp' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr3_hp' => 'nullable',
                'sf9_g'.$grade->grade.'_subject_qr4_hp' => 'nullable',

                'sf10_g'.$grade->grade.'_subject_qr1_hp' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr2_hp' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr3_hp' => 'nullable',
                'sf10_g'.$grade->grade.'_subject_qr4_hp' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_subject_qr1_hp' => $validate_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr1_hp'],
                'sf9_g'.$grade->grade.'_subject_qr2_hp' => $validate_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr2_hp'],
                'sf9_g'.$grade->grade.'_subject_qr3_hp' => $validate_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr3_hp'],
                'sf9_g'.$grade->grade.'_subject_qr4_hp' => $validate_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr4_hp'],

                'sf10_g'.$grade->grade.'_subject_qr1_hp' => $validate_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr1_hp'],
                'sf10_g'.$grade->grade.'_subject_qr2_hp' => $validate_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr2_hp'],
                'sf10_g'.$grade->grade.'_subject_qr3_hp' => $validate_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr3_hp'],
                'sf10_g'.$grade->grade.'_subject_qr4_hp' => $validate_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr4_hp'],
            ]);

            // All: Subject -> nihongo
            if ($student->{'ST_sf9_g'.$grade->grade.'_subject_jp'}) {
                $validate_sf9_subject_jp = request()->validate([
                    'sf9_g'.$grade->grade.'_subject_qr1_jp' => 'nullable',
                    'sf9_g'.$grade->grade.'_subject_qr2_jp' => 'nullable',
                    'sf9_g'.$grade->grade.'_subject_qr3_jp' => 'nullable',
                    'sf9_g'.$grade->grade.'_subject_qr4_jp' => 'nullable',
                ]);

                $student->update([
                    'sf9_g'.$grade->grade.'_subject_qr1_jp' => $validate_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr1_jp'],
                    'sf9_g'.$grade->grade.'_subject_qr2_jp' => $validate_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr2_jp'],
                    'sf9_g'.$grade->grade.'_subject_qr3_jp' => $validate_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr3_jp'],
                    'sf9_g'.$grade->grade.'_subject_qr4_jp' => $validate_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr4_jp'],
                ]);
            }
            if ($student->{'ST_sf10_g'.$grade->grade.'_subject_jp'}) {
                $validate_sf10_subject_jp = request()->validate([
                    'sf10_g'.$grade->grade.'_subject_qr1_jp' => 'nullable',
                    'sf10_g'.$grade->grade.'_subject_qr2_jp' => 'nullable',
                    'sf10_g'.$grade->grade.'_subject_qr3_jp' => 'nullable',
                    'sf10_g'.$grade->grade.'_subject_qr4_jp' => 'nullable',
                ]);

                $student->update([
                    'sf10_g'.$grade->grade.'_subject_qr1_jp' => $validate_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr1_jp'],
                    'sf10_g'.$grade->grade.'_subject_qr2_jp' => $validate_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr2_jp'],
                    'sf10_g'.$grade->grade.'_subject_qr3_jp' => $validate_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr3_jp'],
                    'sf10_g'.$grade->grade.'_subject_qr4_jp' => $validate_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr4_jp'],
                ]);
            }
        }

        // Touch
        $student->touch();

        // Redirect
        return redirect()->to('/students/edit/form/'.$id);
    }

    // EDIT (Lock)
    public function edit_lock_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null

        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        return view('pages.students.edit-lock')
            ->with('auth', $auth)
            ->with('student', $student)
            ->with('grades', $grades);
    }
    public function edit_lock_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null

        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        $validate = request()->validate([
            'ST_locker' => 'nullable',
        ]);

        $student->update([
            'ST_locker' => isset($validate['ST_locker']) ? 1 : 0,
        ]);

        foreach ($grades as $grade) {
            $validate = request()->validate([
                'ST_sf9_g'.$grade->grade.'_subject_jp' => 'nullable',
                'ST_sf10_g'.$grade->grade.'_subject_jp' => 'nullable',
            ]);

            $student->update([
                'ST_sf9_g'.$grade->grade.'_subject_jp' => isset($validate['ST_sf9_g'.$grade->grade.'_subject_jp']) ? 1 : 0,
                'ST_sf10_g'.$grade->grade.'_subject_jp' => isset($validate['ST_sf10_g'.$grade->grade.'_subject_jp']) ? 1 : 0,
            ]);
        }

        $student->touch();

        return redirect()->to('/students/edit/lock/'.$id);
    }

    // DELETE
    public function delete_1 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.students.delete')
            ->with('auth', $auth)
            ->with('student', $student);
    }
    public function delete_2 ($id) {
        // Restrict
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::restrict($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $auth->is_teacher ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $student->delete();

        return self::redirect();
    }

    // FUNCTION: format student (multiple)
    public function func_format_students ($students) {
        // Order
        $students = $students->orderBy('info_name_last', 'ASC')
            ->orderBy('info_name_first', 'ASC')
            ->orderBy('info_name_middle', 'ASC')
            ->orderBy('info_name_suffix', 'ASC')
            ->paginate(100);

        // Return
        return $students;
    }

    // FUNCTION: format student (signle)
    public function func_format_student ($student) {
        $grades = Grade::all();

        foreach ($grades as $grade) {
            // Section
            $section = Section::find($student->{'DB_SECTION_id_g'.$grade->grade});
            $user = null;

            if ($section != null) {
                $student->{'sf9_g'.$grade->grade.'_report_section'} = $section->section;
                $user = User::find($section->DB_USER_id);
            }
            else {
                $student->{'sf9_g'.$grade->grade.'_report_section'} = $student->{'LG_SECTION_name_g'.$grade->grade};
            }

            // Principal
            if (
                $user != null &&
                $student->{'LG_USER_name_last_g'.$grade->grade} == null &&
                $student->{'LG_USER_name_first_g'.$grade->grade} == null
            ) {
                $student->{'sf9_g'.$grade->grade.'_report_adviser'} = strtoupper($user->name_last).', '.ucfirst($user->name_first);
            }
            else if (
                $user == null &&
                $student->{'LG_USER_name_last_g'.$grade->grade} != null &&
                $student->{'LG_USER_name_first_g'.$grade->grade} != null
            ) {
                $student->{'sf9_g'.$grade->grade.'_report_adviser'} = strtoupper($student->{'LG_USER_name_last_g'.$grade->grade}).', '.ucfirst($student->{'LG_USER_name_first_g'.$grade->grade});
            }

            // Year
            $year = Year::find($student->{'DB_YEAR_id_g'.$grade->grade});

            if ($year != null) {
                $student->{'sf9_g'.$grade->grade.'_report_year'} = $year->full;

                $user = User::find($year->DB_USER_id);

                if (
                    $user != null &&
                    $year->LG_USER_name_last == null &&
                    $year->LG_USER_name_first == null
                ) {
                    $student->{'sf9_g'.$grade->grade.'_report_principal'} = strtoupper($user->name_last).', '.ucfirst($user->name_first);
                }
                else if (
                    $user == null &&
                    $year->LG_USER_name_last != null &&
                    $year->LG_USER_name_first != null
                ) {
                    $student->{'sf9_g'.$grade->grade.'_report_principal'} = strtoupper($year->LG_USER_name_last).', '.ucfirst($year->LG_USER_name_first);
                }

                $student->{'sf9_g'.$grade->grade.'_attendance_jan_t'} = $year->attendance_jan_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_feb_t'} = $year->attendance_feb_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_mar_t'} = $year->attendance_mar_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_apr_t'} = $year->attendance_apr_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_may_t'} = $year->attendance_may_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_jun_t'} = $year->attendance_jun_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_jul_t'} = $year->attendance_jul_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_aug_t'} = $year->attendance_aug_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_sep_t'} = $year->attendance_sep_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_oct_t'} = $year->attendance_oct_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_nov_t'} = $year->attendance_nov_t;
                $student->{'sf9_g'.$grade->grade.'_attendance_dec_t'} = $year->attendance_dec_t;
            }
        }

        // Return
        return $student;
    }
}