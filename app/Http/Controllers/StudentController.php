<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Role;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Year;

use Request;

class StudentController extends Controller {
    /**
     * GUARD
     * Accessible by all
     */
    public function guard ($auth) {
        if ($auth != null) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * REDIRECT
     */
    public function redirect () { return redirect()->to('/students'); }

    /**
     * INDEX
     */
    public function index () {
        // Guard
        $auth = (new Controller)->auth();

        if (self::guard($auth)) {
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

        $students = self::Format_Students($auth, $students);

        return view('pages.students.index')
            ->with('auth', $auth)
            ->with('terms', $terms)
            ->with('students', $students);
    }

    /**
     * CREATE
     */
    public function create_1 () {
        // Guard
        $auth = (new Controller)->auth();

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser
        ) {
            return (new Controller)->home();
        }

        // Proceed
        return view('pages.students.create')
            ->with('auth', $auth);
    }
    public function create_2 () {
        // Guard
        $auth = (new Controller)->auth();

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'info_name_last' => 'required',
            'info_name_first' => 'required',
            'info_name_suffix' => 'nullable',
            'info_name_middle' => 'required',
            'info_lrn' => 'required|unique:students,info_lrn',
            'info_sex' => 'required',
            'info_birthdate' => 'required',
        ]);

        $student = Student::create([
            'info_name_last' => $validated['info_name_last'],
            'info_name_first' => $validated['info_name_first'],
            'info_name_middle' => $validated['info_name_middle'],
            'info_name_suffix' => $validated['info_name_suffix'],
            'info_lrn' => $validated['info_lrn'],
            'info_sex' => $validated['info_sex'],
            'info_birthdate' => $validated['info_birthdate'],
        ]);

        return self::redirect();
    }

    /**
     * VIEW
     */
    public function view ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $student == null
        ) {
            return (new Controller)->home();
        }

        // Permission
        $student = self::Format_Student($auth, $student);

        if ($student->is_inaccessible) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = self::Format_Grades($auth, $student, Grade::query());

        $student->ST_locker = true;

        return view('pages.students.view')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('student', $student);
    }

    /**
     * EDIT (Info)
     */
    public function edit_info_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
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
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $validated = request()->validate([
            'info_name_last' => 'required',
            'info_name_first' => 'required',
            'info_name_suffix' => 'nullable',
            'info_name_middle' => 'required',
            'info_lrn' => 'required|unique:students,info_lrn,'.$id,
            'info_sex' => 'required',
            'info_birthdate' => 'required',
        ]);

        $student->update([
            'info_name_last' => $validated['info_name_last'],
            'info_name_first' => $validated['info_name_first'],
            'info_name_suffix' => $validated['info_name_suffix'],
            'info_name_middle' => $validated['info_name_middle'],
            'info_lrn' => $validated['info_lrn'],
            'info_sex' => $validated['info_sex'],
            'info_birthdate' => $validated['info_birthdate'],
        ]);

        $student->touch();

        return redirect()->to('/students/edit/info/'.$id);
    }

    /**
     * EDIT (Area)
     */
    public function edit_area_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
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
        /// Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        foreach ($grades as $grade) {
            $validated = request()->validate([
                'DB_SECTION_id_g'.$grade->grade => 'nullable',
                'DB_YEAR_id_g'.$grade->grade => 'nullable',
                'LG_SECTION_name_g'.$grade->grade => 'nullable',
                'LG_USER_name_last_g'.$grade->grade => 'nullable',
                'LG_USER_name_first_g'.$grade->grade => 'nullable',
            ]);

            $student->update([
                'DB_SECTION_id_g'.$grade->grade => $validated['DB_SECTION_id_g'.$grade->grade],
                'DB_YEAR_id_g'.$grade->grade => $validated['DB_YEAR_id_g'.$grade->grade],
                'LG_SECTION_name_g'.$grade->grade => $validated['DB_SECTION_id_g'.$grade->grade] == null ? $validated['LG_SECTION_name_g'.$grade->grade] : null,
            ]);

            $section = Section::find($student->{'DB_SECTION_id_g'.$grade->grade});
            $user = null;

            if ($section != null) {
                $user = User::find($section->DB_USER_id);
            }

            $student->update([
                'LG_USER_name_last_g'.$grade->grade => $user == null ? $validated['LG_USER_name_last_g'.$grade->grade] : null,
                'LG_USER_name_first_g'.$grade->grade => $user == null ? $validated['LG_USER_name_first_g'.$grade->grade] : null,
            ]);

            $student->touch();
        }

        return redirect()->to('/students/edit/area/'.$id);
    }

    /**
     * EDIT (Form)
     */
    public function edit_form_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Permission
        $student = self::Format_Student($auth, $student);

        if ($student->is_inaccessible) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = self::Format_Grades($auth, $student, Grade::query());

        return view('pages.students.edit-form')
            ->with('auth', $auth)
            ->with('grades', $grades)
            ->with('student', $student);
    }
    public function edit_form_2 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = self::Format_Grades($auth, $student, Grade::query());

        // SF10: Enrollment
        $validated_sf10_enrollment = request()->validate([
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
            'sf10_enrollment_elementary_boolean' => isset($validated_sf10_enrollment['sf10_enrollment_elementary_boolean']) ? 1 : 0,
            'sf10_enrollment_elementary_average' => $validated_sf10_enrollment['sf10_enrollment_elementary_average'],
            'sf10_enrollment_elementary_citation' => $validated_sf10_enrollment['sf10_enrollment_elementary_citation'],
            'sf10_enrollment_elementary_name' => $validated_sf10_enrollment['sf10_enrollment_elementary_name'],
            'sf10_enrollment_elementary_id' => $validated_sf10_enrollment['sf10_enrollment_elementary_id'],
            'sf10_enrollment_elementary_address' => $validated_sf10_enrollment['sf10_enrollment_elementary_address'],

            'sf10_enrollment_other_pept_boolean' => isset($validated_sf10_enrollment['sf10_enrollment_other_pept_boolean']) ? 1 : 0,
            'sf10_enrollment_other_pept_rating' => $validated_sf10_enrollment['sf10_enrollment_other_pept_rating'],
            'sf10_enrollment_other_alsae_boolean' => isset($validated_sf10_enrollment['sf10_enrollment_other_alsae_boolean']) ? 1 : 0,
            'sf10_enrollment_other_alsae_rating' => $validated_sf10_enrollment['sf10_enrollment_other_alsae_rating'],
            'sf10_enrollment_other_specify_boolean' => isset($validated_sf10_enrollment['sf10_enrollment_other_specify_boolean']) ? 1 : 0,
            'sf10_enrollment_other_specify_rating' => $validated_sf10_enrollment['sf10_enrollment_other_specify_rating'],
            'sf10_enrollment_other_date' => $validated_sf10_enrollment['sf10_enrollment_other_date'],
            'sf10_enrollment_other_location' => $validated_sf10_enrollment['sf10_enrollment_other_location'],
        ]);

        // SF10: Certification
        $validated_sf10_certification = request()->validate([
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
            'sf10_certification_back_grade' => $validated_sf10_certification['sf10_certification_back_grade'],
            'sf10_certification_back_school_name' => $validated_sf10_certification['sf10_certification_back_school_name'],
            'sf10_certification_back_school_id' => $validated_sf10_certification['sf10_certification_back_school_id'],
            'sf10_certification_back_school_year' => $validated_sf10_certification['sf10_certification_back_school_year'],
            'sf10_certification_back_date' => $validated_sf10_certification['sf10_certification_back_date'],
            'sf10_certification_back_principal' => $validated_sf10_certification['sf10_certification_back_principal'],

            'sf10_certification_front_grade' => $validated_sf10_certification['sf10_certification_front_grade'],
            'sf10_certification_front_school_name' => $validated_sf10_certification['sf10_certification_front_school_name'],
            'sf10_certification_front_school_id' => $validated_sf10_certification['sf10_certification_front_school_id'],
            'sf10_certification_front_school_year' => $validated_sf10_certification['sf10_certification_front_school_year'],
            'sf10_certification_front_date' => $validated_sf10_certification['sf10_certification_front_date'],
            'sf10_certification_front_principal' => $validated_sf10_certification['sf10_certification_front_principal'],
        ]);

        // Various
        foreach ($grades as $grade) {
            // SF9: Report
            $validated_sf9_report = request()->validate([
                'sf9_g'.$grade->grade.'_report_age' => 'nullable',  
                'sf9_g'.$grade->grade.'_report_transfer_input_1' => 'nullable', 
                'sf9_g'.$grade->grade.'_report_transfer_input_2' => 'nullable', 
                'sf9_g'.$grade->grade.'_report_transfer_input_3' => 'nullable', 
                'sf9_g'.$grade->grade.'_report_transfer_input_date' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_report_age' => $validated_sf9_report['sf9_g'.$grade->grade.'_report_age'],
                'sf9_g'.$grade->grade.'_report_transfer_input_1' => $validated_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_1'],
                'sf9_g'.$grade->grade.'_report_transfer_input_2' => $validated_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_2'],
                'sf9_g'.$grade->grade.'_report_transfer_input_3' => $validated_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_3'],
                'sf9_g'.$grade->grade.'_report_transfer_input_date' => $validated_sf9_report['sf9_g'.$grade->grade.'_report_transfer_input_date'],
            ]);

            // SF9: Attendance -> present
            $validated_sf9_attendance_p = request()->validate([
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
                'sf9_g'.$grade->grade.'_attendance_jan_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_jan_p'],
                'sf9_g'.$grade->grade.'_attendance_feb_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_feb_p'],
                'sf9_g'.$grade->grade.'_attendance_mar_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_mar_p'],
                'sf9_g'.$grade->grade.'_attendance_apr_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_apr_p'],
                'sf9_g'.$grade->grade.'_attendance_may_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_may_p'],
                'sf9_g'.$grade->grade.'_attendance_jun_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_jun_p'],
                'sf9_g'.$grade->grade.'_attendance_jul_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_jul_p'],
                'sf9_g'.$grade->grade.'_attendance_aug_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_aug_p'],
                'sf9_g'.$grade->grade.'_attendance_sep_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_sep_p'],
                'sf9_g'.$grade->grade.'_attendance_oct_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_oct_p'],
                'sf9_g'.$grade->grade.'_attendance_nov_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_nov_p'],
                'sf9_g'.$grade->grade.'_attendance_dec_p' => $validated_sf9_attendance_p['sf9_g'.$grade->grade.'_attendance_dec_p'],
            ]);

            // SF9: Attendance -> absent
            $validated_sf9_attendance_a = request()->validate([
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
                'sf9_g'.$grade->grade.'_attendance_jan_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_jan_a'],
                'sf9_g'.$grade->grade.'_attendance_feb_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_feb_a'],
                'sf9_g'.$grade->grade.'_attendance_mar_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_mar_a'],
                'sf9_g'.$grade->grade.'_attendance_apr_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_apr_a'],
                'sf9_g'.$grade->grade.'_attendance_may_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_may_a'],
                'sf9_g'.$grade->grade.'_attendance_jun_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_jun_a'],
                'sf9_g'.$grade->grade.'_attendance_jul_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_jul_a'],
                'sf9_g'.$grade->grade.'_attendance_aug_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_aug_a'],
                'sf9_g'.$grade->grade.'_attendance_sep_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_sep_a'],
                'sf9_g'.$grade->grade.'_attendance_oct_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_oct_a'],
                'sf9_g'.$grade->grade.'_attendance_nov_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_nov_a'],
                'sf9_g'.$grade->grade.'_attendance_dec_a' => $validated_sf9_attendance_a['sf9_g'.$grade->grade.'_attendance_dec_a'],
            ]);

            // SF9: Values -> maka - diyos
            $validated_sf9_values_md = request()->validate([
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
                'sf9_g'.$grade->grade.'_values_qr1_md_s1' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr1_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr2_md_s1' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr2_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr3_md_s1' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr3_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr4_md_s1' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr4_md_s1'],
                'sf9_g'.$grade->grade.'_values_qr1_md_s2' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr1_md_s2'],
                'sf9_g'.$grade->grade.'_values_qr2_md_s2' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr2_md_s2'],
                'sf9_g'.$grade->grade.'_values_qr3_md_s2' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr3_md_s2'],
                'sf9_g'.$grade->grade.'_values_qr4_md_s2' => $validated_sf9_values_md['sf9_g'.$grade->grade.'_values_qr4_md_s2'],
            ]);

            // SF9: Values -> maka - tao
            $validated_sf9_values_mt = request()->validate([
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
                'sf9_g'.$grade->grade.'_values_qr1_mt_s1' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr1_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr2_mt_s1' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr2_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr3_mt_s1' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr3_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr4_mt_s1' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr4_mt_s1'],
                'sf9_g'.$grade->grade.'_values_qr1_mt_s2' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr1_mt_s2'],
                'sf9_g'.$grade->grade.'_values_qr2_mt_s2' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr2_mt_s2'],
                'sf9_g'.$grade->grade.'_values_qr3_mt_s2' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr3_mt_s2'],
                'sf9_g'.$grade->grade.'_values_qr4_mt_s2' => $validated_sf9_values_mt['sf9_g'.$grade->grade.'_values_qr4_mt_s2'],
            ]);

            // SF9: Values -> maka - kalikasan
            $validated_sf9_values_mk = request()->validate([
                'sf9_g'.$grade->grade.'_values_qr1_mk' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr2_mk' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr3_mk' => 'nullable',
                'sf9_g'.$grade->grade.'_values_qr4_mk' => 'nullable',
            ]);

            $student->update([
                'sf9_g'.$grade->grade.'_values_qr1_mk' => $validated_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr1_mk'],
                'sf9_g'.$grade->grade.'_values_qr2_mk' => $validated_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr2_mk'],
                'sf9_g'.$grade->grade.'_values_qr3_mk' => $validated_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr3_mk'],
                'sf9_g'.$grade->grade.'_values_qr4_mk' => $validated_sf9_values_mk['sf9_g'.$grade->grade.'_values_qr4_mk'],
            ]);

            // SF9: Values -> maka - bansa
            $validated_sf9_values_mb = request()->validate([
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
                'sf9_g'.$grade->grade.'_values_qr1_mb_s1' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr1_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr2_mb_s1' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr2_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr3_mb_s1' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr3_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr4_mb_s1' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr4_mb_s1'],
                'sf9_g'.$grade->grade.'_values_qr1_mb_s2' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr1_mb_s2'],
                'sf9_g'.$grade->grade.'_values_qr2_mb_s2' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr2_mb_s2'],
                'sf9_g'.$grade->grade.'_values_qr3_mb_s2' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr3_mb_s2'],
                'sf9_g'.$grade->grade.'_values_qr4_mb_s2' => $validated_sf9_values_mb['sf9_g'.$grade->grade.'_values_qr4_mb_s2'],
            ]);

            // SF10: Scholastic record
            $validated_sf10_record = request()->validate([
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
                'sf10_g'.$grade->grade.'_record_school_name' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_name'],
                'sf10_g'.$grade->grade.'_record_school_id' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_id'],
                'sf10_g'.$grade->grade.'_record_school_district' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_district'],
                'sf10_g'.$grade->grade.'_record_school_division' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_division'],
                'sf10_g'.$grade->grade.'_record_school_region' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_region'],
                'sf10_g'.$grade->grade.'_record_school_grade' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_grade'],
                'sf10_g'.$grade->grade.'_record_school_section' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_section'],
                'sf10_g'.$grade->grade.'_record_school_year' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_year'],
                'sf10_g'.$grade->grade.'_record_school_teacher' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_school_teacher'],
                'sf10_g'.$grade->grade.'_record_remedial_date_start' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_remedial_date_start'],
                'sf10_g'.$grade->grade.'_record_remedial_date_end' => $validated_sf10_record['sf10_g'.$grade->grade.'_record_remedial_date_end'],
            ]);

            // All: Subject -> filipino
            $validated_all_subject_fil = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_fil' => $validated_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr1_fil'],
                'sf9_g'.$grade->grade.'_subject_qr2_fil' => $validated_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr2_fil'],
                'sf9_g'.$grade->grade.'_subject_qr3_fil' => $validated_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr3_fil'],
                'sf9_g'.$grade->grade.'_subject_qr4_fil' => $validated_all_subject_fil['sf9_g'.$grade->grade.'_subject_qr4_fil'],

                'sf10_g'.$grade->grade.'_subject_qr1_fil' => $validated_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr1_fil'],
                'sf10_g'.$grade->grade.'_subject_qr2_fil' => $validated_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr2_fil'],
                'sf10_g'.$grade->grade.'_subject_qr3_fil' => $validated_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr3_fil'],
                'sf10_g'.$grade->grade.'_subject_qr4_fil' => $validated_all_subject_fil['sf10_g'.$grade->grade.'_subject_qr4_fil'],
            ]);

            // All: Subject -> english
            $validated_all_subject_eng = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_eng' => $validated_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr1_eng'],
                'sf9_g'.$grade->grade.'_subject_qr2_eng' => $validated_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr2_eng'],
                'sf9_g'.$grade->grade.'_subject_qr3_eng' => $validated_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr3_eng'],
                'sf9_g'.$grade->grade.'_subject_qr4_eng' => $validated_all_subject_eng['sf9_g'.$grade->grade.'_subject_qr4_eng'],

                'sf10_g'.$grade->grade.'_subject_qr1_eng' => $validated_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr1_eng'],
                'sf10_g'.$grade->grade.'_subject_qr2_eng' => $validated_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr2_eng'],
                'sf10_g'.$grade->grade.'_subject_qr3_eng' => $validated_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr3_eng'],
                'sf10_g'.$grade->grade.'_subject_qr4_eng' => $validated_all_subject_eng['sf10_g'.$grade->grade.'_subject_qr4_eng'],
            ]);

            // All: Subject -> mathematics
            $validated_all_subject_mat = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_mat' => $validated_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr1_mat'],
                'sf9_g'.$grade->grade.'_subject_qr2_mat' => $validated_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr2_mat'],
                'sf9_g'.$grade->grade.'_subject_qr3_mat' => $validated_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr3_mat'],
                'sf9_g'.$grade->grade.'_subject_qr4_mat' => $validated_all_subject_mat['sf9_g'.$grade->grade.'_subject_qr4_mat'],

                'sf10_g'.$grade->grade.'_subject_qr1_mat' => $validated_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr1_mat'],
                'sf10_g'.$grade->grade.'_subject_qr2_mat' => $validated_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr2_mat'],
                'sf10_g'.$grade->grade.'_subject_qr3_mat' => $validated_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr3_mat'],
                'sf10_g'.$grade->grade.'_subject_qr4_mat' => $validated_all_subject_mat['sf10_g'.$grade->grade.'_subject_qr4_mat'],
            ]);

            // All: Subject -> science
            $validated_all_subject_sci = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_sci' => $validated_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr1_sci'],
                'sf9_g'.$grade->grade.'_subject_qr2_sci' => $validated_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr2_sci'],
                'sf9_g'.$grade->grade.'_subject_qr3_sci' => $validated_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr3_sci'],
                'sf9_g'.$grade->grade.'_subject_qr4_sci' => $validated_all_subject_sci['sf9_g'.$grade->grade.'_subject_qr4_sci'],

                'sf10_g'.$grade->grade.'_subject_qr1_sci' => $validated_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr1_sci'],
                'sf10_g'.$grade->grade.'_subject_qr2_sci' => $validated_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr2_sci'],
                'sf10_g'.$grade->grade.'_subject_qr3_sci' => $validated_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr3_sci'],
                'sf10_g'.$grade->grade.'_subject_qr4_sci' => $validated_all_subject_sci['sf10_g'.$grade->grade.'_subject_qr4_sci'],
            ]);

            // All: Subject -> araling panlipunan (ap)
            $validated_all_subject_ap = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_ap' => $validated_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr1_ap'],
                'sf9_g'.$grade->grade.'_subject_qr2_ap' => $validated_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr2_ap'],
                'sf9_g'.$grade->grade.'_subject_qr3_ap' => $validated_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr3_ap'],
                'sf9_g'.$grade->grade.'_subject_qr4_ap' => $validated_all_subject_ap['sf9_g'.$grade->grade.'_subject_qr4_ap'],

                'sf10_g'.$grade->grade.'_subject_qr1_ap' => $validated_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr1_ap'],
                'sf10_g'.$grade->grade.'_subject_qr2_ap' => $validated_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr2_ap'],
                'sf10_g'.$grade->grade.'_subject_qr3_ap' => $validated_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr3_ap'],
                'sf10_g'.$grade->grade.'_subject_qr4_ap' => $validated_all_subject_ap['sf10_g'.$grade->grade.'_subject_qr4_ap'],
            ]);

            // All: Subject -> edukasyon sa pagpapakatao (ep)
            $validated_all_subject_ep = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_ep' => $validated_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr1_ep'],
                'sf9_g'.$grade->grade.'_subject_qr2_ep' => $validated_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr2_ep'],
                'sf9_g'.$grade->grade.'_subject_qr3_ep' => $validated_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr3_ep'],
                'sf9_g'.$grade->grade.'_subject_qr4_ep' => $validated_all_subject_ep['sf9_g'.$grade->grade.'_subject_qr4_ep'],

                'sf10_g'.$grade->grade.'_subject_qr1_ep' => $validated_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr1_ep'],
                'sf10_g'.$grade->grade.'_subject_qr2_ep' => $validated_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr2_ep'],
                'sf10_g'.$grade->grade.'_subject_qr3_ep' => $validated_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr3_ep'],
                'sf10_g'.$grade->grade.'_subject_qr4_ep' => $validated_all_subject_ep['sf10_g'.$grade->grade.'_subject_qr4_ep'],
            ]);

            // All: Subject -> technology and livelihood education (tle)
            $validated_all_subject_tle = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_tle' => $validated_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr1_tle'],
                'sf9_g'.$grade->grade.'_subject_qr2_tle' => $validated_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr2_tle'],
                'sf9_g'.$grade->grade.'_subject_qr3_tle' => $validated_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr3_tle'],
                'sf9_g'.$grade->grade.'_subject_qr4_tle' => $validated_all_subject_tle['sf9_g'.$grade->grade.'_subject_qr4_tle'],

                'sf10_g'.$grade->grade.'_subject_qr1_tle' => $validated_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr1_tle'],
                'sf10_g'.$grade->grade.'_subject_qr2_tle' => $validated_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr2_tle'],
                'sf10_g'.$grade->grade.'_subject_qr3_tle' => $validated_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr3_tle'],
                'sf10_g'.$grade->grade.'_subject_qr4_tle' => $validated_all_subject_tle['sf10_g'.$grade->grade.'_subject_qr4_tle'],
            ]);

            // All: Subject -> music
            $validated_all_subject_mus = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_mus' => $validated_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr1_mus'],
                'sf9_g'.$grade->grade.'_subject_qr2_mus' => $validated_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr2_mus'],
                'sf9_g'.$grade->grade.'_subject_qr3_mus' => $validated_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr3_mus'],
                'sf9_g'.$grade->grade.'_subject_qr4_mus' => $validated_all_subject_mus['sf9_g'.$grade->grade.'_subject_qr4_mus'],

                'sf10_g'.$grade->grade.'_subject_qr1_mus' => $validated_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr1_mus'],
                'sf10_g'.$grade->grade.'_subject_qr2_mus' => $validated_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr2_mus'],
                'sf10_g'.$grade->grade.'_subject_qr3_mus' => $validated_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr3_mus'],
                'sf10_g'.$grade->grade.'_subject_qr4_mus' => $validated_all_subject_mus['sf10_g'.$grade->grade.'_subject_qr4_mus'],
            ]);

            // All: Subject -> arts
            $validated_all_subject_art = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_art' => $validated_all_subject_art['sf9_g'.$grade->grade.'_subject_qr1_art'],
                'sf9_g'.$grade->grade.'_subject_qr2_art' => $validated_all_subject_art['sf9_g'.$grade->grade.'_subject_qr2_art'],
                'sf9_g'.$grade->grade.'_subject_qr3_art' => $validated_all_subject_art['sf9_g'.$grade->grade.'_subject_qr3_art'],
                'sf9_g'.$grade->grade.'_subject_qr4_art' => $validated_all_subject_art['sf9_g'.$grade->grade.'_subject_qr4_art'],

                'sf10_g'.$grade->grade.'_subject_qr1_art' => $validated_all_subject_art['sf10_g'.$grade->grade.'_subject_qr1_art'],
                'sf10_g'.$grade->grade.'_subject_qr2_art' => $validated_all_subject_art['sf10_g'.$grade->grade.'_subject_qr2_art'],
                'sf10_g'.$grade->grade.'_subject_qr3_art' => $validated_all_subject_art['sf10_g'.$grade->grade.'_subject_qr3_art'],
                'sf10_g'.$grade->grade.'_subject_qr4_art' => $validated_all_subject_art['sf10_g'.$grade->grade.'_subject_qr4_art'],
            ]);

            // All: Subject -> physical education
            $validated_all_subject_pe = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_pe' => $validated_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr1_pe'],
                'sf9_g'.$grade->grade.'_subject_qr2_pe' => $validated_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr2_pe'],
                'sf9_g'.$grade->grade.'_subject_qr3_pe' => $validated_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr3_pe'],
                'sf9_g'.$grade->grade.'_subject_qr4_pe' => $validated_all_subject_pe['sf9_g'.$grade->grade.'_subject_qr4_pe'],

                'sf10_g'.$grade->grade.'_subject_qr1_pe' => $validated_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr1_pe'],
                'sf10_g'.$grade->grade.'_subject_qr2_pe' => $validated_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr2_pe'],
                'sf10_g'.$grade->grade.'_subject_qr3_pe' => $validated_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr3_pe'],
                'sf10_g'.$grade->grade.'_subject_qr4_pe' => $validated_all_subject_pe['sf10_g'.$grade->grade.'_subject_qr4_pe'],
            ]);

            // All: Subject -> health
            $validated_all_subject_hp = request()->validate([
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
                'sf9_g'.$grade->grade.'_subject_qr1_hp' => $validated_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr1_hp'],
                'sf9_g'.$grade->grade.'_subject_qr2_hp' => $validated_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr2_hp'],
                'sf9_g'.$grade->grade.'_subject_qr3_hp' => $validated_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr3_hp'],
                'sf9_g'.$grade->grade.'_subject_qr4_hp' => $validated_all_subject_hp['sf9_g'.$grade->grade.'_subject_qr4_hp'],

                'sf10_g'.$grade->grade.'_subject_qr1_hp' => $validated_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr1_hp'],
                'sf10_g'.$grade->grade.'_subject_qr2_hp' => $validated_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr2_hp'],
                'sf10_g'.$grade->grade.'_subject_qr3_hp' => $validated_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr3_hp'],
                'sf10_g'.$grade->grade.'_subject_qr4_hp' => $validated_all_subject_hp['sf10_g'.$grade->grade.'_subject_qr4_hp'],
            ]);

            // All: Subject -> nihongo
            if ($student->{'ST_sf9_g'.$grade->grade.'_subject_jp'}) {
                $validated_sf9_subject_jp = request()->validate([
                    'sf9_g'.$grade->grade.'_subject_qr1_jp' => 'nullable',
                    'sf9_g'.$grade->grade.'_subject_qr2_jp' => 'nullable',
                    'sf9_g'.$grade->grade.'_subject_qr3_jp' => 'nullable',
                    'sf9_g'.$grade->grade.'_subject_qr4_jp' => 'nullable',
                ]);

                $student->update([
                    'sf9_g'.$grade->grade.'_subject_qr1_jp' => $validated_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr1_jp'],
                    'sf9_g'.$grade->grade.'_subject_qr2_jp' => $validated_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr2_jp'],
                    'sf9_g'.$grade->grade.'_subject_qr3_jp' => $validated_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr3_jp'],
                    'sf9_g'.$grade->grade.'_subject_qr4_jp' => $validated_sf9_subject_jp['sf9_g'.$grade->grade.'_subject_qr4_jp'],
                ]);
            }
            if ($student->{'ST_sf10_g'.$grade->grade.'_subject_jp'}) {
                $validated_sf10_subject_jp = request()->validate([
                    'sf10_g'.$grade->grade.'_subject_qr1_jp' => 'nullable',
                    'sf10_g'.$grade->grade.'_subject_qr2_jp' => 'nullable',
                    'sf10_g'.$grade->grade.'_subject_qr3_jp' => 'nullable',
                    'sf10_g'.$grade->grade.'_subject_qr4_jp' => 'nullable',
                ]);

                $student->update([
                    'sf10_g'.$grade->grade.'_subject_qr1_jp' => $validated_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr1_jp'],
                    'sf10_g'.$grade->grade.'_subject_qr2_jp' => $validated_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr2_jp'],
                    'sf10_g'.$grade->grade.'_subject_qr3_jp' => $validated_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr3_jp'],
                    'sf10_g'.$grade->grade.'_subject_qr4_jp' => $validated_sf10_subject_jp['sf10_g'.$grade->grade.'_subject_qr4_jp'],
                ]);
            }
        }

        // Touch
        $student->touch();

        // Redirect
        return redirect()->to('/students/edit/form/'.$id);
    }

    /**
     * EDIT (Lock)
     */
    public function edit_lock_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
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
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $student == null

        ) {
            return (new Controller)->home();
        }

        // Proceed
        $grades = Grade::all();

        $validated = request()->validate([
            'ST_locker' => 'nullable',
        ]);

        $student->update([
            'ST_locker' => isset($validated['ST_locker']) ? 1 : 0,
        ]);

        foreach ($grades as $grade) {
            $validated = request()->validate([
                'ST_sf9_g'.$grade->grade.'_subject_jp' => 'nullable',
                'ST_sf10_g'.$grade->grade.'_subject_jp' => 'nullable',
            ]);

            $student->update([
                'ST_sf9_g'.$grade->grade.'_subject_jp' => isset($validated['ST_sf9_g'.$grade->grade.'_subject_jp']) ? 1 : 0,
                'ST_sf10_g'.$grade->grade.'_subject_jp' => isset($validated['ST_sf10_g'.$grade->grade.'_subject_jp']) ? 1 : 0,
            ]);
        }

        $student->touch();

        return redirect()->to('/students/edit/lock/'.$id);
    }

    /**
     * DELETE
     */
    public function delete_1 ($id) {
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
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
        // Guard
        $auth = (new Controller)->auth();
        $student = Student::find($id);

        if (
            self::guard($auth) ||
            $auth->is_principal ||
            $auth->is_grade_level_coordinator ||
            $auth->is_adviser ||
            $student == null ||
            $student->ST_locker
        ) {
            return (new Controller)->home();
        }

        // Proceed
        $student->delete();

        return self::redirect();
    }

    // ----------------------------------------------------------------------------------------------------

    /**
     * FUNCTION: format grades (many)
     */
    public function Format_Grades ($auth, $student, $grades) {
        // Grades
        if (
            $auth->is_principal ||
            $auth->is_administrator
        ) {
            $grades = $grades->get();
        }
        if ($auth->is_grade_level_coordinator) {
            $grades = Grade::where('id', $auth->DB_GRADE_id)->get();
        }
        if ($auth->is_adviser) {
            $section = null;

            if (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g7)->exists()) {
                $section = Section::find($student->DB_SECTION_id_g7);
            }
            if (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g8)->exists()) {
                $section = Section::find($student->DB_SECTION_id_g8);
            }
            if (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g9)->exists()) {
                $section = Section::find($student->DB_SECTION_id_g9);
            }
            if (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g10)->exists()) {
                $section = Section::find($student->DB_SECTION_id_g10);
            }

            if ($section != null) {
                $grades = Grade::where('id', $section->DB_GRADE_id)->get();
            }
        }

        // Return
        return $grades;
    }

    /**
     * FUNCTION: format year (one)
     */
    public function Format_Student ($auth, $student) {
        // Format
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

            // Adviser
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

        // Permission
        $student->is_inaccessible = true;

        if (
            $auth->is_principal ||
            $auth->is_administrator
        ) {
            $student->is_inaccessible = false;
        }
        if ($auth->is_grade_level_coordinator) {
            $grade = Grade::find($auth->DB_GRADE_id);

            if ($grade != null) {
                if ($auth->DB_YEAR_id != null) {
                    if ($student->{'DB_YEAR_id_g'.$grade->grade} == $auth->DB_YEAR_id) {
                        $student->is_inaccessible = false;
                    }
                }
            }
        }
        if ($auth->is_adviser) {
            if (
                (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g7)->exists() && $student->DB_YEAR_id_g7 == $auth->DB_YEAR_id) ||
                (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g8)->exists() && $student->DB_YEAR_id_g8 == $auth->DB_YEAR_id) ||
                (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g9)->exists() && $student->DB_YEAR_id_g9 == $auth->DB_YEAR_id) ||
                (Teacher::where('DB_SECTION_id', $student->DB_SECTION_id_g10)->exists() && $student->DB_YEAR_id_g10 == $auth->DB_YEAR_id)
            ) {
                $student->is_inaccessible = false;
            }
        }

        // Return
        return $student;
    }

    /**
     * FUNCTION: format year (many)
     */
    public function Format_Students ($auth, $students) {
        // Order
        $students = $students
            ->orderBy('info_name_last', 'ASC')
            ->orderBy('info_name_first', 'ASC')
            ->orderBy('info_name_middle', 'ASC')
            ->orderBy('info_name_suffix', 'ASC');
        
        // Grade Level Coordinator
        if ($auth->is_grade_level_coordinator) {
            $grade = Grade::find($auth->DB_GRADE_id);

            // Grab something if both the designated school year and grade level are defined
            if ($auth->DB_YEAR_id != null && $grade != null) {
                $students = $students
                    ->whereNotNull('DB_SECTION_id_g'.$grade->grade)
                    ->whereNotNull('DB_YEAR_id_g'.$grade->grade)
                    ->where('DB_YEAR_id_g'.$grade->grade, $auth->DB_YEAR_id);
            }
            else {
                $students = $students->where('id', -1);
            }
        }

        // Adviser
        if ($auth->is_adviser) {
            $classes = Teacher::where('DB_USER_id', $auth->id)->pluck('DB_SECTION_id')->toArray();

            // Grab something if both the designated school year and classes are defined
            if ($auth->DB_YEAR_id != null && count($classes) > 0) {
                $students = $students
                    ->where(function ($query) use ($auth, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g7')
                            ->whereNotNull('DB_YEAR_id_g7')
                            ->whereIn('DB_SECTION_id_g7', $classes)
                            ->where('DB_YEAR_id_g7', $auth->DB_YEAR_id);
                    })
                    ->orWhere(function($query) use ($auth, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g8')
                            ->whereNotNull('DB_YEAR_id_g8')
                            ->whereIn('DB_SECTION_id_g8', $classes)
                            ->where('DB_YEAR_id_g8', $auth->DB_YEAR_id);
                    })
                    ->orWhere(function($query) use ($auth, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g9')
                            ->whereNotNull('DB_YEAR_id_g9')
                            ->whereIn('DB_SECTION_id_g9', $classes)
                            ->where('DB_YEAR_id_g9', $auth->DB_YEAR_id);
                    })
                    ->orWhere(function($query) use ($auth, $classes) {
                        $query->whereNotNull('DB_SECTION_id_g10')
                            ->whereNotNull('DB_YEAR_id_g10')
                            ->whereIn('DB_SECTION_id_g10', $classes)
                            ->where('DB_YEAR_id_g10', $auth->DB_YEAR_id);
                    });
            }
            else {
                $students = $students->where('id', -1);
            }
        }

        // Paginate
        $students = $students->paginate(100);

        // Format
        foreach ($students as $student) {
            $student = self::Format_Student($auth, $student);
        }

        // Return
        return $students;
    }
}