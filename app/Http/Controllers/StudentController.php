<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;

use Request;

class StudentController extends Controller {
    // [do-not-touch] Redirect
    // Null bubbled
    public function redirect () { return redirect()->to('/students'); }

    // [do-not-touch] 1.1 - Index (GET)
    // Null bubbled
    public function index_1 () {
        $students = Student::orderBy('info_name_last', 'ASC')
            ->orderBy('info_name_first', 'ASC')
            ->orderBy('info_name_middle', 'ASC')
            ->orderBy('info_name_suffix', 'ASC')
            ->get();

        return view('pages.students.index')->with('students', $students);
    }

    // [do-not-touch] 1.2 - Index (POST)
    // Null bubbled
    public function index_2 () {
        $terms = Request::get('terms');

        if (isset($terms)) {
            $temp_terms = explode(' ', $terms);
            $query = Student::query();

            foreach ($temp_terms as $term) {
                $query->where(function ($q) use ($term) {
                    $q->where('info_name_last', 'like', '%'.$term.'%')
                    ->orWhere('info_name_first', 'like', '%'.$term.'%')
                    ->orWhere('info_name_suffix', 'like', '%'.$term.'%')
                    ->orWhere('info_name_middle', 'like', '%'.$term.'%')
                    ->orWhere('info_lrn', 'like', '%'.$term.'%')
                    ->orWhere('info_sex', 'like', '%'.$term.'%');
                });
            }

            $results = $query->orderBy('info_name_last', 'ASC')
                ->orderBy('info_name_first', 'ASC')
                ->orderBy('info_name_middle', 'ASC')
                ->orderBy('info_name_suffix', 'ASC')
                ->get();

            $results = (count($results) > 0) ? $results : [];

            return view('pages.students.index')
                ->with('isSearched', true)
                ->with('terms', $terms)
                ->with('results', $results);
        }
        else return redirect()->to('/students');
    }

    // [do-not-touch] 2.1 - Create (GET)
    // Null bubbled
    public function create_1 () {
        return view('pages.students.create');
    }

    // [do-not-touch] 2.2 - Create (POST)
    // Null bubbled
    public function create_2 () {
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

        return redirect()->to('/students');
    }

    // [do-not-touch] 3.1 - Edit: Info (GET)
    // Null bubbled
    public function edit_info_1 ($id) {
        $student = Student::find($id);

        return view('pages.students.edit-info')->with('student', $student);
    }

    // [do-not-touch] 3.2 - Edit: Info (POST)
    // Null bubbled
    public function edit_info_2 ($id) {
        $validate = request()->validate([
            'info_name_last' => 'required',
            'info_name_first' => 'required',
            'info_name_suffix' => 'nullable',
            'info_name_middle' => 'required',
            'info_lrn' => 'required|unique:students,info_lrn,'. $id,
            'info_sex' => 'required',
            'info_birthdate' => 'required',
        ]);

        Student::find($id)->update([
            'info_name_last' => $validate['info_name_last'],
            'info_name_first' => $validate['info_name_first'],
            'info_name_suffix' => $validate['info_name_suffix'],
            'info_name_middle' => $validate['info_name_middle'],
            'info_lrn' => $validate['info_lrn'],
            'info_sex' => $validate['info_sex'],
            'info_birthdate' => $validate['info_birthdate'],
        ]);

        return redirect()->to('/students/edit/info/'.$id);
    }

    // [do-not-touch] 3.3 - Edit: Sections / School Years (GET)
    // Null bubbled
    public function edit_acad_1 ($id) {
        $grades = Grade::all();
        $sections = Section::whereNotNull('section')->get();
        $student = Student::find($id);
        $years = Year::orderBy('year', 'DESC')->get();

        foreach ($sections as $section) {
            $user = User::find($section->DB_USER_id);

            if ($user != null) {
                $section->user = '| '.strtoupper($user->name_last).', '.ucfirst($user->name_first);
            }
        }

        return view('pages.students.edit-acad')
            ->with('grades', $grades)
            ->with('sections', $sections)
            ->with('student', $student)
            ->with('years', $years);
    }

    // [do-not-touch] 3.4 - Edit: Sections / School Years (POST)
    // Null bubbled
    public function edit_acad_2 ($id) {
        $validate = request()->validate([
            'DB_SECTION_id_g7' => 'nullable',
            'DB_SECTION_id_g8' => 'nullable',
            'DB_SECTION_id_g9' => 'nullable',
            'DB_SECTION_id_g10' => 'nullable',

            'PRESERVE_DB_SECTION_name_g7' => 'nullable',
            'PRESERVE_DB_SECTION_name_g8' => 'nullable',
            'PRESERVE_DB_SECTION_name_g9' => 'nullable',
            'PRESERVE_DB_SECTION_name_g10' => 'nullable',

            'PRESERVE_DB_USER_name_last_g7' => 'nullable',
            'PRESERVE_DB_USER_name_last_g8' => 'nullable',
            'PRESERVE_DB_USER_name_last_g9' => 'nullable',
            'PRESERVE_DB_USER_name_last_g10' => 'nullable',

            'PRESERVE_DB_USER_name_first_g7' => 'nullable',
            'PRESERVE_DB_USER_name_first_g8' => 'nullable',
            'PRESERVE_DB_USER_name_first_g9' => 'nullable',
            'PRESERVE_DB_USER_name_first_g10' => 'nullable',

            'DB_YEAR_id_g7' => 'nullable',
            'DB_YEAR_id_g8' => 'nullable',
            'DB_YEAR_id_g9' => 'nullable',
            'DB_YEAR_id_g10' => 'nullable',
        ]);

        Student::find($id)->update([
            'DB_SECTION_id_g7' => $validate['DB_SECTION_id_g7'],
            'DB_SECTION_id_g8' => $validate['DB_SECTION_id_g8'],
            'DB_SECTION_id_g9' => $validate['DB_SECTION_id_g9'],
            'DB_SECTION_id_g10' => $validate['DB_SECTION_id_g10'],

            'PRESERVE_DB_SECTION_name_g7' => $validate['DB_SECTION_id_g7'] == null ? $validate['PRESERVE_DB_SECTION_name_g7'] : null,
            'PRESERVE_DB_SECTION_name_g8' => $validate['DB_SECTION_id_g8'] == null ? $validate['PRESERVE_DB_SECTION_name_g8'] : null,
            'PRESERVE_DB_SECTION_name_g9' => $validate['DB_SECTION_id_g9'] == null ? $validate['PRESERVE_DB_SECTION_name_g9'] : null,
            'PRESERVE_DB_SECTION_name_g10' => $validate['DB_SECTION_id_g10'] == null ? $validate['PRESERVE_DB_SECTION_name_g10'] : null,

            'DB_YEAR_id_g7' => $validate['DB_YEAR_id_g7'],
            'DB_YEAR_id_g8' => $validate['DB_YEAR_id_g8'],
            'DB_YEAR_id_g9' => $validate['DB_YEAR_id_g9'],
            'DB_YEAR_id_g10' => $validate['DB_YEAR_id_g10'],
        ]);

        

        /*'PRESERVE_DB_USER_name_last_g7' => $validate['DB_SECTION_id_g7'] == null ? $validate['PRESERVE_DB_USER_name_last_g7'] : null,
        //'PRESERVE_DB_USER_name_last_g8' => $validate['DB_SECTION_id_g8'] == null ? $validate['PRESERVE_DB_USER_name_last_g8'] : null,
        //'PRESERVE_DB_USER_name_last_g9' => $validate['DB_SECTION_id_g9'] == null ? $validate['PRESERVE_DB_USER_name_last_g9'] : null,
        //'PRESERVE_DB_USER_name_last_g10' => $validate['DB_SECTION_id_g10'] == null ? $validate['PRESERVE_DB_USER_name_last_g10'] : null,

        //'PRESERVE_DB_USER_name_first_g7' => $validate['DB_SECTION_id_g7'] == null ? $validate['PRESERVE_DB_USER_name_first_g7'] : null,
        //'PRESERVE_DB_USER_name_first_g8' => $validate['DB_SECTION_id_g8'] == null ? $validate['PRESERVE_DB_USER_name_first_g8'] : null,
        //'PRESERVE_DB_USER_name_first_g9' => $validate['DB_SECTION_id_g9'] == null ? $validate['PRESERVE_DB_USER_name_first_g9'] : null,
        //'PRESERVE_DB_USER_name_first_g10' => $validate['DB_SECTION_id_g10'] == null ? $validate['PRESERVE_DB_USER_name_first_g10'] : null,*/
        return redirect()->to('/students/edit/acad/'.$id);
    }

    // 3.5 - Edit: Form (GET)
    public function edit_form_1 ($id) {
        $grades = Grade::all();
        $sections = new Section();
        $student = Student::find($id);
        $years = new Year();
        dd($student->PRESERVE_DB_USER_name_last_g7, $student->PRESERVE_DB_USER_name_first_g7);
        foreach ($grades as $grade) {
            $section = Section::find($student->{'DB_SECTION_id_g'.$grade->grade});

            if ($section != null) {
                $sections->{'sf9_g'.$grade->grade.'_report_section'} = $section->section;

                $user = User::where('DB_SECTION_id', $section->id)->first();

                if ($user != null) {
                    $sections->{'sf9_g'.$grade->grade.'_report_adviser'} = strtoupper($user->name_last).', '.ucfirst($user->name_first);
                }
            }
        }

        foreach ($grades as $grade) {
            $year = Year::find($student->{'DB_YEAR_id_g'.$grade->grade});

            if ($year != null) {
                $years->{'sf9_g'.$grade->grade.'_report_year'} = $year->year.'-'.$year->year + 1;

                if ($year->DB_USER_id != null) {
                    $user = User::find($year->DB_USER_id);
                    $years->{'sf9_g'.$grade->grade.'_report_principal'} = strtoupper($user->name_last).', '.ucfirst($user->name_first);
                }
                else if ($year->DB_USER_id == null && $year->PRESERVE_DB_USER_name_last != null && $year->PRESERVE_DB_USER_name_first != null) {
                    $years->{'sf9_g'.$grade->grade.'_report_principal'} = strtoupper($year->PRESERVE_DB_USER_name_last).', '.ucfirst($year->PRESERVE_DB_USER_name_first);
                }

                $years->{'sf9_g'.$grade->grade.'_attendance_jan_t'} = $year->attendance_jan_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_feb_t'} = $year->attendance_feb_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_mar_t'} = $year->attendance_mar_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_apr_t'} = $year->attendance_apr_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_may_t'} = $year->attendance_may_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_jun_t'} = $year->attendance_jun_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_jul_t'} = $year->attendance_jul_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_aug_t'} = $year->attendance_aug_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_sep_t'} = $year->attendance_sep_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_oct_t'} = $year->attendance_oct_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_nov_t'} = $year->attendance_nov_t;
                $years->{'sf9_g'.$grade->grade.'_attendance_dec_t'} = $year->attendance_dec_t;
            }
        }

        return view('pages.students.edit-form')
            ->with('grades', $grades)
            ->with('sections', $sections)
            ->with('student', $student)
            ->with('years', $years);
    }

    // [do-not-touch] 3.6 - Edit: Form (POST)
    public function edit_form_2 ($id) {
        $student = Student::find($id);

        $validate_sf9_report = request()->validate([
            'sf9_g7_report_age' => 'nullable',  
            'sf9_g7_report_transfer_input_1' => 'nullable', 
            'sf9_g7_report_transfer_input_2' => 'nullable', 
            'sf9_g7_report_transfer_input_3' => 'nullable', 
            'sf9_g7_report_transfer_input_date' => 'nullable', 

            'sf9_g8_report_age' => 'nullable', 
            'sf9_g8_report_transfer_input_1' => 'nullable', 
            'sf9_g8_report_transfer_input_2' => 'nullable', 
            'sf9_g8_report_transfer_input_3' => 'nullable', 
            'sf9_g8_report_transfer_input_date' => 'nullable', 
            
            'sf9_g9_report_age' => 'nullable', 
            'sf9_g9_report_transfer_input_1' => 'nullable', 
            'sf9_g9_report_transfer_input_2' => 'nullable', 
            'sf9_g9_report_transfer_input_3' => 'nullable', 
            'sf9_g9_report_transfer_input_date' => 'nullable', 

            'sf9_g10_report_age' => 'nullable', 
            'sf9_g10_report_transfer_input_1' => 'nullable', 
            'sf9_g10_report_transfer_input_2' => 'nullable', 
            'sf9_g10_report_transfer_input_3' => 'nullable', 
            'sf9_g10_report_transfer_input_date' => 'nullable', 
        ]);

        $student->update([
            'sf9_g7_report_age' => $validate_sf9_report['sf9_g7_report_age'],
            'sf9_g7_report_transfer_input_1' => $validate_sf9_report['sf9_g7_report_transfer_input_1'],
            'sf9_g7_report_transfer_input_2' => $validate_sf9_report['sf9_g7_report_transfer_input_2'],
            'sf9_g7_report_transfer_input_3' => $validate_sf9_report['sf9_g7_report_transfer_input_3'],
            'sf9_g7_report_transfer_input_date' => $validate_sf9_report['sf9_g7_report_transfer_input_date'],

            'sf9_g8_report_age' => $validate_sf9_report['sf9_g8_report_age'],
            'sf9_g8_report_transfer_input_1' => $validate_sf9_report['sf9_g8_report_transfer_input_1'],
            'sf9_g8_report_transfer_input_2' => $validate_sf9_report['sf9_g8_report_transfer_input_2'],
            'sf9_g8_report_transfer_input_3' => $validate_sf9_report['sf9_g8_report_transfer_input_3'],
            'sf9_g8_report_transfer_input_date' => $validate_sf9_report['sf9_g8_report_transfer_input_date'],

            'sf9_g9_report_age' => $validate_sf9_report['sf9_g9_report_age'],
            'sf9_g9_report_transfer_input_1' => $validate_sf9_report['sf9_g9_report_transfer_input_1'],
            'sf9_g9_report_transfer_input_2' => $validate_sf9_report['sf9_g9_report_transfer_input_2'],
            'sf9_g9_report_transfer_input_3' => $validate_sf9_report['sf9_g9_report_transfer_input_3'],
            'sf9_g9_report_transfer_input_date' => $validate_sf9_report['sf9_g9_report_transfer_input_date'],

            'sf9_g10_report_age' => $validate_sf9_report['sf9_g10_report_age'],
            'sf9_g10_report_transfer_input_1' => $validate_sf9_report['sf9_g10_report_transfer_input_1'],
            'sf9_g10_report_transfer_input_2' => $validate_sf9_report['sf9_g10_report_transfer_input_2'],
            'sf9_g10_report_transfer_input_3' => $validate_sf9_report['sf9_g10_report_transfer_input_3'],
            'sf9_g10_report_transfer_input_date' => $validate_sf9_report['sf9_g10_report_transfer_input_date'],
        ]);

        $validate_sf9_attendance_p = request()->validate([
            'sf9_g7_attendance_jan_p' => 'nullable',
            'sf9_g7_attendance_feb_p' => 'nullable',
            'sf9_g7_attendance_mar_p' => 'nullable',
            'sf9_g7_attendance_apr_p' => 'nullable',
            'sf9_g7_attendance_may_p' => 'nullable',
            'sf9_g7_attendance_jun_p' => 'nullable',
            'sf9_g7_attendance_jul_p' => 'nullable',
            'sf9_g7_attendance_aug_p' => 'nullable',
            'sf9_g7_attendance_sep_p' => 'nullable',
            'sf9_g7_attendance_oct_p' => 'nullable',
            'sf9_g7_attendance_nov_p' => 'nullable',
            'sf9_g7_attendance_dec_p' => 'nullable',

            'sf9_g8_attendance_jan_p' => 'nullable',
            'sf9_g8_attendance_feb_p' => 'nullable',
            'sf9_g8_attendance_mar_p' => 'nullable',
            'sf9_g8_attendance_apr_p' => 'nullable',
            'sf9_g8_attendance_may_p' => 'nullable',
            'sf9_g8_attendance_jun_p' => 'nullable',
            'sf9_g8_attendance_jul_p' => 'nullable',
            'sf9_g8_attendance_aug_p' => 'nullable',
            'sf9_g8_attendance_sep_p' => 'nullable',
            'sf9_g8_attendance_oct_p' => 'nullable',
            'sf9_g8_attendance_nov_p' => 'nullable',
            'sf9_g8_attendance_dec_p' => 'nullable',

            'sf9_g9_attendance_jan_p' => 'nullable',
            'sf9_g9_attendance_feb_p' => 'nullable',
            'sf9_g9_attendance_mar_p' => 'nullable',
            'sf9_g9_attendance_apr_p' => 'nullable',
            'sf9_g9_attendance_may_p' => 'nullable',
            'sf9_g9_attendance_jun_p' => 'nullable',
            'sf9_g9_attendance_jul_p' => 'nullable',
            'sf9_g9_attendance_aug_p' => 'nullable',
            'sf9_g9_attendance_sep_p' => 'nullable',
            'sf9_g9_attendance_oct_p' => 'nullable',
            'sf9_g9_attendance_nov_p' => 'nullable',
            'sf9_g9_attendance_dec_p' => 'nullable',

            'sf9_g10_attendance_jan_p' => 'nullable',
            'sf9_g10_attendance_feb_p' => 'nullable',
            'sf9_g10_attendance_mar_p' => 'nullable',
            'sf9_g10_attendance_apr_p' => 'nullable',
            'sf9_g10_attendance_may_p' => 'nullable',
            'sf9_g10_attendance_jun_p' => 'nullable',
            'sf9_g10_attendance_jul_p' => 'nullable',
            'sf9_g10_attendance_aug_p' => 'nullable',
            'sf9_g10_attendance_sep_p' => 'nullable',
            'sf9_g10_attendance_oct_p' => 'nullable',
            'sf9_g10_attendance_nov_p' => 'nullable',
            'sf9_g10_attendance_dec_p' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_attendance_jan_p' => $validate_sf9_attendance_p['sf9_g7_attendance_jan_p'],
            'sf9_g7_attendance_feb_p' => $validate_sf9_attendance_p['sf9_g7_attendance_feb_p'],
            'sf9_g7_attendance_mar_p' => $validate_sf9_attendance_p['sf9_g7_attendance_mar_p'],
            'sf9_g7_attendance_apr_p' => $validate_sf9_attendance_p['sf9_g7_attendance_apr_p'],
            'sf9_g7_attendance_may_p' => $validate_sf9_attendance_p['sf9_g7_attendance_may_p'],
            'sf9_g7_attendance_jun_p' => $validate_sf9_attendance_p['sf9_g7_attendance_jun_p'],
            'sf9_g7_attendance_jul_p' => $validate_sf9_attendance_p['sf9_g7_attendance_jul_p'],
            'sf9_g7_attendance_aug_p' => $validate_sf9_attendance_p['sf9_g7_attendance_aug_p'],
            'sf9_g7_attendance_sep_p' => $validate_sf9_attendance_p['sf9_g7_attendance_sep_p'],
            'sf9_g7_attendance_oct_p' => $validate_sf9_attendance_p['sf9_g7_attendance_oct_p'],
            'sf9_g7_attendance_nov_p' => $validate_sf9_attendance_p['sf9_g7_attendance_nov_p'],
            'sf9_g7_attendance_dec_p' => $validate_sf9_attendance_p['sf9_g7_attendance_dec_p'],

            'sf9_g8_attendance_jan_p' => $validate_sf9_attendance_p['sf9_g8_attendance_jan_p'],
            'sf9_g8_attendance_feb_p' => $validate_sf9_attendance_p['sf9_g8_attendance_feb_p'],
            'sf9_g8_attendance_mar_p' => $validate_sf9_attendance_p['sf9_g8_attendance_mar_p'],
            'sf9_g8_attendance_apr_p' => $validate_sf9_attendance_p['sf9_g8_attendance_apr_p'],
            'sf9_g8_attendance_may_p' => $validate_sf9_attendance_p['sf9_g8_attendance_may_p'],
            'sf9_g8_attendance_jun_p' => $validate_sf9_attendance_p['sf9_g8_attendance_jun_p'],
            'sf9_g8_attendance_jul_p' => $validate_sf9_attendance_p['sf9_g8_attendance_jul_p'],
            'sf9_g8_attendance_aug_p' => $validate_sf9_attendance_p['sf9_g8_attendance_aug_p'],
            'sf9_g8_attendance_sep_p' => $validate_sf9_attendance_p['sf9_g8_attendance_sep_p'],
            'sf9_g8_attendance_oct_p' => $validate_sf9_attendance_p['sf9_g8_attendance_oct_p'],
            'sf9_g8_attendance_nov_p' => $validate_sf9_attendance_p['sf9_g8_attendance_nov_p'],
            'sf9_g8_attendance_dec_p' => $validate_sf9_attendance_p['sf9_g8_attendance_dec_p'],

            'sf9_g9_attendance_jan_p' => $validate_sf9_attendance_p['sf9_g9_attendance_jan_p'],
            'sf9_g9_attendance_feb_p' => $validate_sf9_attendance_p['sf9_g9_attendance_feb_p'],
            'sf9_g9_attendance_mar_p' => $validate_sf9_attendance_p['sf9_g9_attendance_mar_p'],
            'sf9_g9_attendance_apr_p' => $validate_sf9_attendance_p['sf9_g9_attendance_apr_p'],
            'sf9_g9_attendance_may_p' => $validate_sf9_attendance_p['sf9_g9_attendance_may_p'],
            'sf9_g9_attendance_jun_p' => $validate_sf9_attendance_p['sf9_g9_attendance_jun_p'],
            'sf9_g9_attendance_jul_p' => $validate_sf9_attendance_p['sf9_g9_attendance_jul_p'],
            'sf9_g9_attendance_aug_p' => $validate_sf9_attendance_p['sf9_g9_attendance_aug_p'],
            'sf9_g9_attendance_sep_p' => $validate_sf9_attendance_p['sf9_g9_attendance_sep_p'],
            'sf9_g9_attendance_oct_p' => $validate_sf9_attendance_p['sf9_g9_attendance_oct_p'],
            'sf9_g9_attendance_nov_p' => $validate_sf9_attendance_p['sf9_g9_attendance_nov_p'],
            'sf9_g9_attendance_dec_p' => $validate_sf9_attendance_p['sf9_g9_attendance_dec_p'],

            'sf9_g10_attendance_jan_p' => $validate_sf9_attendance_p['sf9_g10_attendance_jan_p'],
            'sf9_g10_attendance_feb_p' => $validate_sf9_attendance_p['sf9_g10_attendance_feb_p'],
            'sf9_g10_attendance_mar_p' => $validate_sf9_attendance_p['sf9_g10_attendance_mar_p'],
            'sf9_g10_attendance_apr_p' => $validate_sf9_attendance_p['sf9_g10_attendance_apr_p'],
            'sf9_g10_attendance_may_p' => $validate_sf9_attendance_p['sf9_g10_attendance_may_p'],
            'sf9_g10_attendance_jun_p' => $validate_sf9_attendance_p['sf9_g10_attendance_jun_p'],
            'sf9_g10_attendance_jul_p' => $validate_sf9_attendance_p['sf9_g10_attendance_jul_p'],
            'sf9_g10_attendance_aug_p' => $validate_sf9_attendance_p['sf9_g10_attendance_aug_p'],
            'sf9_g10_attendance_sep_p' => $validate_sf9_attendance_p['sf9_g10_attendance_sep_p'],
            'sf9_g10_attendance_oct_p' => $validate_sf9_attendance_p['sf9_g10_attendance_oct_p'],
            'sf9_g10_attendance_nov_p' => $validate_sf9_attendance_p['sf9_g10_attendance_nov_p'],
            'sf9_g10_attendance_dec_p' => $validate_sf9_attendance_p['sf9_g10_attendance_dec_p'],
        ]);

        $validate_sf9_attendance_a = request()->validate([
            'sf9_g7_attendance_jan_a' => 'nullable',
            'sf9_g7_attendance_feb_a' => 'nullable',
            'sf9_g7_attendance_mar_a' => 'nullable',
            'sf9_g7_attendance_apr_a' => 'nullable',
            'sf9_g7_attendance_may_a' => 'nullable',
            'sf9_g7_attendance_jun_a' => 'nullable',
            'sf9_g7_attendance_jul_a' => 'nullable',
            'sf9_g7_attendance_aug_a' => 'nullable',
            'sf9_g7_attendance_sep_a' => 'nullable',
            'sf9_g7_attendance_oct_a' => 'nullable',
            'sf9_g7_attendance_nov_a' => 'nullable',
            'sf9_g7_attendance_dec_a' => 'nullable',

            'sf9_g8_attendance_jan_a' => 'nullable',
            'sf9_g8_attendance_feb_a' => 'nullable',
            'sf9_g8_attendance_mar_a' => 'nullable',
            'sf9_g8_attendance_apr_a' => 'nullable',
            'sf9_g8_attendance_may_a' => 'nullable',
            'sf9_g8_attendance_jun_a' => 'nullable',
            'sf9_g8_attendance_jul_a' => 'nullable',
            'sf9_g8_attendance_aug_a' => 'nullable',
            'sf9_g8_attendance_sep_a' => 'nullable',
            'sf9_g8_attendance_oct_a' => 'nullable',
            'sf9_g8_attendance_nov_a' => 'nullable',
            'sf9_g8_attendance_dec_a' => 'nullable',

            'sf9_g9_attendance_jan_a' => 'nullable',
            'sf9_g9_attendance_feb_a' => 'nullable',
            'sf9_g9_attendance_mar_a' => 'nullable',
            'sf9_g9_attendance_apr_a' => 'nullable',
            'sf9_g9_attendance_may_a' => 'nullable',
            'sf9_g9_attendance_jun_a' => 'nullable',
            'sf9_g9_attendance_jul_a' => 'nullable',
            'sf9_g9_attendance_aug_a' => 'nullable',
            'sf9_g9_attendance_sep_a' => 'nullable',
            'sf9_g9_attendance_oct_a' => 'nullable',
            'sf9_g9_attendance_nov_a' => 'nullable',
            'sf9_g9_attendance_dec_a' => 'nullable',

            'sf9_g10_attendance_jan_a' => 'nullable',
            'sf9_g10_attendance_feb_a' => 'nullable',
            'sf9_g10_attendance_mar_a' => 'nullable',
            'sf9_g10_attendance_apr_a' => 'nullable',
            'sf9_g10_attendance_may_a' => 'nullable',
            'sf9_g10_attendance_jun_a' => 'nullable',
            'sf9_g10_attendance_jul_a' => 'nullable',
            'sf9_g10_attendance_aug_a' => 'nullable',
            'sf9_g10_attendance_sep_a' => 'nullable',
            'sf9_g10_attendance_oct_a' => 'nullable',
            'sf9_g10_attendance_nov_a' => 'nullable',
            'sf9_g10_attendance_dec_a' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_attendance_jan_a' => $validate_sf9_attendance_a['sf9_g7_attendance_jan_a'],
            'sf9_g7_attendance_feb_a' => $validate_sf9_attendance_a['sf9_g7_attendance_feb_a'],
            'sf9_g7_attendance_mar_a' => $validate_sf9_attendance_a['sf9_g7_attendance_mar_a'],
            'sf9_g7_attendance_apr_a' => $validate_sf9_attendance_a['sf9_g7_attendance_apr_a'],
            'sf9_g7_attendance_may_a' => $validate_sf9_attendance_a['sf9_g7_attendance_may_a'],
            'sf9_g7_attendance_jun_a' => $validate_sf9_attendance_a['sf9_g7_attendance_jun_a'],
            'sf9_g7_attendance_jul_a' => $validate_sf9_attendance_a['sf9_g7_attendance_jul_a'],
            'sf9_g7_attendance_aug_a' => $validate_sf9_attendance_a['sf9_g7_attendance_aug_a'],
            'sf9_g7_attendance_sep_a' => $validate_sf9_attendance_a['sf9_g7_attendance_sep_a'],
            'sf9_g7_attendance_oct_a' => $validate_sf9_attendance_a['sf9_g7_attendance_oct_a'],
            'sf9_g7_attendance_nov_a' => $validate_sf9_attendance_a['sf9_g7_attendance_nov_a'],
            'sf9_g7_attendance_dec_a' => $validate_sf9_attendance_a['sf9_g7_attendance_dec_a'],

            'sf9_g8_attendance_jan_a' => $validate_sf9_attendance_a['sf9_g8_attendance_jan_a'],
            'sf9_g8_attendance_feb_a' => $validate_sf9_attendance_a['sf9_g8_attendance_feb_a'],
            'sf9_g8_attendance_mar_a' => $validate_sf9_attendance_a['sf9_g8_attendance_mar_a'],
            'sf9_g8_attendance_apr_a' => $validate_sf9_attendance_a['sf9_g8_attendance_apr_a'],
            'sf9_g8_attendance_may_a' => $validate_sf9_attendance_a['sf9_g8_attendance_may_a'],
            'sf9_g8_attendance_jun_a' => $validate_sf9_attendance_a['sf9_g8_attendance_jun_a'],
            'sf9_g8_attendance_jul_a' => $validate_sf9_attendance_a['sf9_g8_attendance_jul_a'],
            'sf9_g8_attendance_aug_a' => $validate_sf9_attendance_a['sf9_g8_attendance_aug_a'],
            'sf9_g8_attendance_sep_a' => $validate_sf9_attendance_a['sf9_g8_attendance_sep_a'],
            'sf9_g8_attendance_oct_a' => $validate_sf9_attendance_a['sf9_g8_attendance_oct_a'],
            'sf9_g8_attendance_nov_a' => $validate_sf9_attendance_a['sf9_g8_attendance_nov_a'],
            'sf9_g8_attendance_dec_a' => $validate_sf9_attendance_a['sf9_g8_attendance_dec_a'],

            'sf9_g9_attendance_jan_a' => $validate_sf9_attendance_a['sf9_g9_attendance_jan_a'],
            'sf9_g9_attendance_feb_a' => $validate_sf9_attendance_a['sf9_g9_attendance_feb_a'],
            'sf9_g9_attendance_mar_a' => $validate_sf9_attendance_a['sf9_g9_attendance_mar_a'],
            'sf9_g9_attendance_apr_a' => $validate_sf9_attendance_a['sf9_g9_attendance_apr_a'],
            'sf9_g9_attendance_may_a' => $validate_sf9_attendance_a['sf9_g9_attendance_may_a'],
            'sf9_g9_attendance_jun_a' => $validate_sf9_attendance_a['sf9_g9_attendance_jun_a'],
            'sf9_g9_attendance_jul_a' => $validate_sf9_attendance_a['sf9_g9_attendance_jul_a'],
            'sf9_g9_attendance_aug_a' => $validate_sf9_attendance_a['sf9_g9_attendance_aug_a'],
            'sf9_g9_attendance_sep_a' => $validate_sf9_attendance_a['sf9_g9_attendance_sep_a'],
            'sf9_g9_attendance_oct_a' => $validate_sf9_attendance_a['sf9_g9_attendance_oct_a'],
            'sf9_g9_attendance_nov_a' => $validate_sf9_attendance_a['sf9_g9_attendance_nov_a'],
            'sf9_g9_attendance_dec_a' => $validate_sf9_attendance_a['sf9_g9_attendance_dec_a'],

            'sf9_g10_attendance_jan_a' => $validate_sf9_attendance_a['sf9_g10_attendance_jan_a'],
            'sf9_g10_attendance_feb_a' => $validate_sf9_attendance_a['sf9_g10_attendance_feb_a'],
            'sf9_g10_attendance_mar_a' => $validate_sf9_attendance_a['sf9_g10_attendance_mar_a'],
            'sf9_g10_attendance_apr_a' => $validate_sf9_attendance_a['sf9_g10_attendance_apr_a'],
            'sf9_g10_attendance_may_a' => $validate_sf9_attendance_a['sf9_g10_attendance_may_a'],
            'sf9_g10_attendance_jun_a' => $validate_sf9_attendance_a['sf9_g10_attendance_jun_a'],
            'sf9_g10_attendance_jul_a' => $validate_sf9_attendance_a['sf9_g10_attendance_jul_a'],
            'sf9_g10_attendance_aug_a' => $validate_sf9_attendance_a['sf9_g10_attendance_aug_a'],
            'sf9_g10_attendance_sep_a' => $validate_sf9_attendance_a['sf9_g10_attendance_sep_a'],
            'sf9_g10_attendance_oct_a' => $validate_sf9_attendance_a['sf9_g10_attendance_oct_a'],
            'sf9_g10_attendance_nov_a' => $validate_sf9_attendance_a['sf9_g10_attendance_nov_a'],
            'sf9_g10_attendance_dec_a' => $validate_sf9_attendance_a['sf9_g10_attendance_dec_a'],
        ]);

        $validate_sf9_values_md = request()->validate([
            'sf9_g7_values_qr1_md_s1' => 'nullable',
            'sf9_g7_values_qr2_md_s1' => 'nullable',
            'sf9_g7_values_qr3_md_s1' => 'nullable',
            'sf9_g7_values_qr4_md_s1' => 'nullable',
            'sf9_g7_values_qr1_md_s2' => 'nullable',
            'sf9_g7_values_qr2_md_s2' => 'nullable',
            'sf9_g7_values_qr3_md_s2' => 'nullable',
            'sf9_g7_values_qr4_md_s2' => 'nullable',

            'sf9_g8_values_qr1_md_s1' => 'nullable',
            'sf9_g8_values_qr2_md_s1' => 'nullable',
            'sf9_g8_values_qr3_md_s1' => 'nullable',
            'sf9_g8_values_qr4_md_s1' => 'nullable',
            'sf9_g8_values_qr1_md_s2' => 'nullable',
            'sf9_g8_values_qr2_md_s2' => 'nullable',
            'sf9_g8_values_qr3_md_s2' => 'nullable',
            'sf9_g8_values_qr4_md_s2' => 'nullable',

            'sf9_g9_values_qr1_md_s1' => 'nullable',
            'sf9_g9_values_qr2_md_s1' => 'nullable',
            'sf9_g9_values_qr3_md_s1' => 'nullable',
            'sf9_g9_values_qr4_md_s1' => 'nullable',
            'sf9_g9_values_qr1_md_s2' => 'nullable',
            'sf9_g9_values_qr2_md_s2' => 'nullable',
            'sf9_g9_values_qr3_md_s2' => 'nullable',
            'sf9_g9_values_qr4_md_s2' => 'nullable',

            'sf9_g10_values_qr1_md_s1' => 'nullable',
            'sf9_g10_values_qr2_md_s1' => 'nullable',
            'sf9_g10_values_qr3_md_s1' => 'nullable',
            'sf9_g10_values_qr4_md_s1' => 'nullable',
            'sf9_g10_values_qr1_md_s2' => 'nullable',
            'sf9_g10_values_qr2_md_s2' => 'nullable',
            'sf9_g10_values_qr3_md_s2' => 'nullable',
            'sf9_g10_values_qr4_md_s2' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_values_qr1_md_s1' => $validate_sf9_values_md['sf9_g7_values_qr1_md_s1'],
            'sf9_g7_values_qr2_md_s1' => $validate_sf9_values_md['sf9_g7_values_qr2_md_s1'],
            'sf9_g7_values_qr3_md_s1' => $validate_sf9_values_md['sf9_g7_values_qr3_md_s1'],
            'sf9_g7_values_qr4_md_s1' => $validate_sf9_values_md['sf9_g7_values_qr4_md_s1'],
            'sf9_g7_values_qr1_md_s2' => $validate_sf9_values_md['sf9_g7_values_qr1_md_s2'],
            'sf9_g7_values_qr2_md_s2' => $validate_sf9_values_md['sf9_g7_values_qr2_md_s2'],
            'sf9_g7_values_qr3_md_s2' => $validate_sf9_values_md['sf9_g7_values_qr3_md_s2'],
            'sf9_g7_values_qr4_md_s2' => $validate_sf9_values_md['sf9_g7_values_qr4_md_s2'],

            'sf9_g8_values_qr1_md_s1' => $validate_sf9_values_md['sf9_g8_values_qr1_md_s1'],
            'sf9_g8_values_qr2_md_s1' => $validate_sf9_values_md['sf9_g8_values_qr2_md_s1'],
            'sf9_g8_values_qr3_md_s1' => $validate_sf9_values_md['sf9_g8_values_qr3_md_s1'],
            'sf9_g8_values_qr4_md_s1' => $validate_sf9_values_md['sf9_g8_values_qr4_md_s1'],
            'sf9_g8_values_qr1_md_s2' => $validate_sf9_values_md['sf9_g8_values_qr1_md_s2'],
            'sf9_g8_values_qr2_md_s2' => $validate_sf9_values_md['sf9_g8_values_qr2_md_s2'],
            'sf9_g8_values_qr3_md_s2' => $validate_sf9_values_md['sf9_g8_values_qr3_md_s2'],
            'sf9_g8_values_qr4_md_s2' => $validate_sf9_values_md['sf9_g8_values_qr4_md_s2'],

            'sf9_g9_values_qr1_md_s1' => $validate_sf9_values_md['sf9_g9_values_qr1_md_s1'],
            'sf9_g9_values_qr2_md_s1' => $validate_sf9_values_md['sf9_g9_values_qr2_md_s1'],
            'sf9_g9_values_qr3_md_s1' => $validate_sf9_values_md['sf9_g9_values_qr3_md_s1'],
            'sf9_g9_values_qr4_md_s1' => $validate_sf9_values_md['sf9_g9_values_qr4_md_s1'],
            'sf9_g9_values_qr1_md_s2' => $validate_sf9_values_md['sf9_g9_values_qr1_md_s2'],
            'sf9_g9_values_qr2_md_s2' => $validate_sf9_values_md['sf9_g9_values_qr2_md_s2'],
            'sf9_g9_values_qr3_md_s2' => $validate_sf9_values_md['sf9_g9_values_qr3_md_s2'],
            'sf9_g9_values_qr4_md_s2' => $validate_sf9_values_md['sf9_g9_values_qr4_md_s2'],

            'sf9_g10_values_qr1_md_s1' => $validate_sf9_values_md['sf9_g10_values_qr1_md_s1'],
            'sf9_g10_values_qr2_md_s1' => $validate_sf9_values_md['sf9_g10_values_qr2_md_s1'],
            'sf9_g10_values_qr3_md_s1' => $validate_sf9_values_md['sf9_g10_values_qr3_md_s1'],
            'sf9_g10_values_qr4_md_s1' => $validate_sf9_values_md['sf9_g10_values_qr4_md_s1'],
            'sf9_g10_values_qr1_md_s2' => $validate_sf9_values_md['sf9_g10_values_qr1_md_s2'],
            'sf9_g10_values_qr2_md_s2' => $validate_sf9_values_md['sf9_g10_values_qr2_md_s2'],
            'sf9_g10_values_qr3_md_s2' => $validate_sf9_values_md['sf9_g10_values_qr3_md_s2'],
            'sf9_g10_values_qr4_md_s2' => $validate_sf9_values_md['sf9_g10_values_qr4_md_s2'],
        ]);

        $validate_sf9_values_mt = request()->validate([
            'sf9_g7_values_qr1_mt_s1' => 'nullable',
            'sf9_g7_values_qr2_mt_s1' => 'nullable',
            'sf9_g7_values_qr3_mt_s1' => 'nullable',
            'sf9_g7_values_qr4_mt_s1' => 'nullable',
            'sf9_g7_values_qr1_mt_s2' => 'nullable',
            'sf9_g7_values_qr2_mt_s2' => 'nullable',
            'sf9_g7_values_qr3_mt_s2' => 'nullable',
            'sf9_g7_values_qr4_mt_s2' => 'nullable',

            'sf9_g8_values_qr1_mt_s1' => 'nullable',
            'sf9_g8_values_qr2_mt_s1' => 'nullable',
            'sf9_g8_values_qr3_mt_s1' => 'nullable',
            'sf9_g8_values_qr4_mt_s1' => 'nullable',
            'sf9_g8_values_qr1_mt_s2' => 'nullable',
            'sf9_g8_values_qr2_mt_s2' => 'nullable',
            'sf9_g8_values_qr3_mt_s2' => 'nullable',
            'sf9_g8_values_qr4_mt_s2' => 'nullable',

            'sf9_g9_values_qr1_mt_s1' => 'nullable',
            'sf9_g9_values_qr2_mt_s1' => 'nullable',
            'sf9_g9_values_qr3_mt_s1' => 'nullable',
            'sf9_g9_values_qr4_mt_s1' => 'nullable',
            'sf9_g9_values_qr1_mt_s2' => 'nullable',
            'sf9_g9_values_qr2_mt_s2' => 'nullable',
            'sf9_g9_values_qr3_mt_s2' => 'nullable',
            'sf9_g9_values_qr4_mt_s2' => 'nullable',

            'sf9_g10_values_qr1_mt_s1' => 'nullable',
            'sf9_g10_values_qr2_mt_s1' => 'nullable',
            'sf9_g10_values_qr3_mt_s1' => 'nullable',
            'sf9_g10_values_qr4_mt_s1' => 'nullable',
            'sf9_g10_values_qr1_mt_s2' => 'nullable',
            'sf9_g10_values_qr2_mt_s2' => 'nullable',
            'sf9_g10_values_qr3_mt_s2' => 'nullable',
            'sf9_g10_values_qr4_mt_s2' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_values_qr1_mt_s1' => $validate_sf9_values_mt['sf9_g7_values_qr1_mt_s1'],
            'sf9_g7_values_qr2_mt_s1' => $validate_sf9_values_mt['sf9_g7_values_qr2_mt_s1'],
            'sf9_g7_values_qr3_mt_s1' => $validate_sf9_values_mt['sf9_g7_values_qr3_mt_s1'],
            'sf9_g7_values_qr4_mt_s1' => $validate_sf9_values_mt['sf9_g7_values_qr4_mt_s1'],
            'sf9_g7_values_qr1_mt_s2' => $validate_sf9_values_mt['sf9_g7_values_qr1_mt_s2'],
            'sf9_g7_values_qr2_mt_s2' => $validate_sf9_values_mt['sf9_g7_values_qr2_mt_s2'],
            'sf9_g7_values_qr3_mt_s2' => $validate_sf9_values_mt['sf9_g7_values_qr3_mt_s2'],
            'sf9_g7_values_qr4_mt_s2' => $validate_sf9_values_mt['sf9_g7_values_qr4_mt_s2'],

            'sf9_g8_values_qr1_mt_s1' => $validate_sf9_values_mt['sf9_g8_values_qr1_mt_s1'],
            'sf9_g8_values_qr2_mt_s1' => $validate_sf9_values_mt['sf9_g8_values_qr2_mt_s1'],
            'sf9_g8_values_qr3_mt_s1' => $validate_sf9_values_mt['sf9_g8_values_qr3_mt_s1'],
            'sf9_g8_values_qr4_mt_s1' => $validate_sf9_values_mt['sf9_g8_values_qr4_mt_s1'],
            'sf9_g8_values_qr1_mt_s2' => $validate_sf9_values_mt['sf9_g8_values_qr1_mt_s2'],
            'sf9_g8_values_qr2_mt_s2' => $validate_sf9_values_mt['sf9_g8_values_qr2_mt_s2'],
            'sf9_g8_values_qr3_mt_s2' => $validate_sf9_values_mt['sf9_g8_values_qr3_mt_s2'],
            'sf9_g8_values_qr4_mt_s2' => $validate_sf9_values_mt['sf9_g8_values_qr4_mt_s2'],

            'sf9_g9_values_qr1_mt_s1' => $validate_sf9_values_mt['sf9_g9_values_qr1_mt_s1'],
            'sf9_g9_values_qr2_mt_s1' => $validate_sf9_values_mt['sf9_g9_values_qr2_mt_s1'],
            'sf9_g9_values_qr3_mt_s1' => $validate_sf9_values_mt['sf9_g9_values_qr3_mt_s1'],
            'sf9_g9_values_qr4_mt_s1' => $validate_sf9_values_mt['sf9_g9_values_qr4_mt_s1'],
            'sf9_g9_values_qr1_mt_s2' => $validate_sf9_values_mt['sf9_g9_values_qr1_mt_s2'],
            'sf9_g9_values_qr2_mt_s2' => $validate_sf9_values_mt['sf9_g9_values_qr2_mt_s2'],
            'sf9_g9_values_qr3_mt_s2' => $validate_sf9_values_mt['sf9_g9_values_qr3_mt_s2'],
            'sf9_g9_values_qr4_mt_s2' => $validate_sf9_values_mt['sf9_g9_values_qr4_mt_s2'],

            'sf9_g10_values_qr1_mt_s1' => $validate_sf9_values_mt['sf9_g10_values_qr1_mt_s1'],
            'sf9_g10_values_qr2_mt_s1' => $validate_sf9_values_mt['sf9_g10_values_qr2_mt_s1'],
            'sf9_g10_values_qr3_mt_s1' => $validate_sf9_values_mt['sf9_g10_values_qr3_mt_s1'],
            'sf9_g10_values_qr4_mt_s1' => $validate_sf9_values_mt['sf9_g10_values_qr4_mt_s1'],
            'sf9_g10_values_qr1_mt_s2' => $validate_sf9_values_mt['sf9_g10_values_qr1_mt_s2'],
            'sf9_g10_values_qr2_mt_s2' => $validate_sf9_values_mt['sf9_g10_values_qr2_mt_s2'],
            'sf9_g10_values_qr3_mt_s2' => $validate_sf9_values_mt['sf9_g10_values_qr3_mt_s2'],
            'sf9_g10_values_qr4_mt_s2' => $validate_sf9_values_mt['sf9_g10_values_qr4_mt_s2'],
        ]);

        $validate_sf9_values_mk = request()->validate([
            'sf9_g7_values_qr1_mk' => 'nullable',
            'sf9_g7_values_qr2_mk' => 'nullable',
            'sf9_g7_values_qr3_mk' => 'nullable',
            'sf9_g7_values_qr4_mk' => 'nullable',

            'sf9_g8_values_qr1_mk' => 'nullable',
            'sf9_g8_values_qr2_mk' => 'nullable',
            'sf9_g8_values_qr3_mk' => 'nullable',
            'sf9_g8_values_qr4_mk' => 'nullable',

            'sf9_g9_values_qr1_mk' => 'nullable',
            'sf9_g9_values_qr2_mk' => 'nullable',
            'sf9_g9_values_qr3_mk' => 'nullable',
            'sf9_g9_values_qr4_mk' => 'nullable',

            'sf9_g10_values_qr1_mk' => 'nullable',
            'sf9_g10_values_qr2_mk' => 'nullable',
            'sf9_g10_values_qr3_mk' => 'nullable',
            'sf9_g10_values_qr4_mk' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_values_qr1_mk' => $validate_sf9_values_mk['sf9_g7_values_qr1_mk'],
            'sf9_g7_values_qr2_mk' => $validate_sf9_values_mk['sf9_g7_values_qr2_mk'],
            'sf9_g7_values_qr3_mk' => $validate_sf9_values_mk['sf9_g7_values_qr3_mk'],
            'sf9_g7_values_qr4_mk' => $validate_sf9_values_mk['sf9_g7_values_qr4_mk'],

            'sf9_g8_values_qr1_mk' => $validate_sf9_values_mk['sf9_g8_values_qr1_mk'],
            'sf9_g8_values_qr2_mk' => $validate_sf9_values_mk['sf9_g8_values_qr2_mk'],
            'sf9_g8_values_qr3_mk' => $validate_sf9_values_mk['sf9_g8_values_qr3_mk'],
            'sf9_g8_values_qr4_mk' => $validate_sf9_values_mk['sf9_g8_values_qr4_mk'],

            'sf9_g9_values_qr1_mk' => $validate_sf9_values_mk['sf9_g9_values_qr1_mk'],
            'sf9_g9_values_qr2_mk' => $validate_sf9_values_mk['sf9_g9_values_qr2_mk'],
            'sf9_g9_values_qr3_mk' => $validate_sf9_values_mk['sf9_g9_values_qr3_mk'],
            'sf9_g9_values_qr4_mk' => $validate_sf9_values_mk['sf9_g9_values_qr4_mk'],

            'sf9_g10_values_qr1_mk' => $validate_sf9_values_mk['sf9_g10_values_qr1_mk'],
            'sf9_g10_values_qr2_mk' => $validate_sf9_values_mk['sf9_g10_values_qr2_mk'],
            'sf9_g10_values_qr3_mk' => $validate_sf9_values_mk['sf9_g10_values_qr3_mk'],
            'sf9_g10_values_qr4_mk' => $validate_sf9_values_mk['sf9_g10_values_qr4_mk'],
        ]);

        $validate_sf9_values_mb = request()->validate([
            'sf9_g7_values_qr1_mb_s1' => 'nullable',
            'sf9_g7_values_qr2_mb_s1' => 'nullable',
            'sf9_g7_values_qr3_mb_s1' => 'nullable',
            'sf9_g7_values_qr4_mb_s1' => 'nullable',
            'sf9_g7_values_qr1_mb_s2' => 'nullable',
            'sf9_g7_values_qr2_mb_s2' => 'nullable',
            'sf9_g7_values_qr3_mb_s2' => 'nullable',
            'sf9_g7_values_qr4_mb_s2' => 'nullable',

            'sf9_g8_values_qr1_mb_s1' => 'nullable',
            'sf9_g8_values_qr2_mb_s1' => 'nullable',
            'sf9_g8_values_qr3_mb_s1' => 'nullable',
            'sf9_g8_values_qr4_mb_s1' => 'nullable',
            'sf9_g8_values_qr1_mb_s2' => 'nullable',
            'sf9_g8_values_qr2_mb_s2' => 'nullable',
            'sf9_g8_values_qr3_mb_s2' => 'nullable',
            'sf9_g8_values_qr4_mb_s2' => 'nullable',

            'sf9_g9_values_qr1_mb_s1' => 'nullable',
            'sf9_g9_values_qr2_mb_s1' => 'nullable',
            'sf9_g9_values_qr3_mb_s1' => 'nullable',
            'sf9_g9_values_qr4_mb_s1' => 'nullable',
            'sf9_g9_values_qr1_mb_s2' => 'nullable',
            'sf9_g9_values_qr2_mb_s2' => 'nullable',
            'sf9_g9_values_qr3_mb_s2' => 'nullable',
            'sf9_g9_values_qr4_mb_s2' => 'nullable',

            'sf9_g10_values_qr1_mb_s1' => 'nullable',
            'sf9_g10_values_qr2_mb_s1' => 'nullable',
            'sf9_g10_values_qr3_mb_s1' => 'nullable',
            'sf9_g10_values_qr4_mb_s1' => 'nullable',
            'sf9_g10_values_qr1_mb_s2' => 'nullable',
            'sf9_g10_values_qr2_mb_s2' => 'nullable',
            'sf9_g10_values_qr3_mb_s2' => 'nullable',
            'sf9_g10_values_qr4_mb_s2' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_values_qr1_mb_s1' => $validate_sf9_values_mb['sf9_g7_values_qr1_mb_s1'],
            'sf9_g7_values_qr2_mb_s1' => $validate_sf9_values_mb['sf9_g7_values_qr2_mb_s1'],
            'sf9_g7_values_qr3_mb_s1' => $validate_sf9_values_mb['sf9_g7_values_qr3_mb_s1'],
            'sf9_g7_values_qr4_mb_s1' => $validate_sf9_values_mb['sf9_g7_values_qr4_mb_s1'],
            'sf9_g7_values_qr1_mb_s2' => $validate_sf9_values_mb['sf9_g7_values_qr1_mb_s2'],
            'sf9_g7_values_qr2_mb_s2' => $validate_sf9_values_mb['sf9_g7_values_qr2_mb_s2'],
            'sf9_g7_values_qr3_mb_s2' => $validate_sf9_values_mb['sf9_g7_values_qr3_mb_s2'],
            'sf9_g7_values_qr4_mb_s2' => $validate_sf9_values_mb['sf9_g7_values_qr4_mb_s2'],

            'sf9_g8_values_qr1_mb_s1' => $validate_sf9_values_mb['sf9_g8_values_qr1_mb_s1'],
            'sf9_g8_values_qr2_mb_s1' => $validate_sf9_values_mb['sf9_g8_values_qr2_mb_s1'],
            'sf9_g8_values_qr3_mb_s1' => $validate_sf9_values_mb['sf9_g8_values_qr3_mb_s1'],
            'sf9_g8_values_qr4_mb_s1' => $validate_sf9_values_mb['sf9_g8_values_qr4_mb_s1'],
            'sf9_g8_values_qr1_mb_s2' => $validate_sf9_values_mb['sf9_g8_values_qr1_mb_s2'],
            'sf9_g8_values_qr2_mb_s2' => $validate_sf9_values_mb['sf9_g8_values_qr2_mb_s2'],
            'sf9_g8_values_qr3_mb_s2' => $validate_sf9_values_mb['sf9_g8_values_qr3_mb_s2'],
            'sf9_g8_values_qr4_mb_s2' => $validate_sf9_values_mb['sf9_g8_values_qr4_mb_s2'],

            'sf9_g9_values_qr1_mb_s1' => $validate_sf9_values_mb['sf9_g9_values_qr1_mb_s1'],
            'sf9_g9_values_qr2_mb_s1' => $validate_sf9_values_mb['sf9_g9_values_qr2_mb_s1'],
            'sf9_g9_values_qr3_mb_s1' => $validate_sf9_values_mb['sf9_g9_values_qr3_mb_s1'],
            'sf9_g9_values_qr4_mb_s1' => $validate_sf9_values_mb['sf9_g9_values_qr4_mb_s1'],
            'sf9_g9_values_qr1_mb_s2' => $validate_sf9_values_mb['sf9_g9_values_qr1_mb_s2'],
            'sf9_g9_values_qr2_mb_s2' => $validate_sf9_values_mb['sf9_g9_values_qr2_mb_s2'],
            'sf9_g9_values_qr3_mb_s2' => $validate_sf9_values_mb['sf9_g9_values_qr3_mb_s2'],
            'sf9_g9_values_qr4_mb_s2' => $validate_sf9_values_mb['sf9_g9_values_qr4_mb_s2'],

            'sf9_g10_values_qr1_mb_s1' => $validate_sf9_values_mb['sf9_g10_values_qr1_mb_s1'],
            'sf9_g10_values_qr2_mb_s1' => $validate_sf9_values_mb['sf9_g10_values_qr2_mb_s1'],
            'sf9_g10_values_qr3_mb_s1' => $validate_sf9_values_mb['sf9_g10_values_qr3_mb_s1'],
            'sf9_g10_values_qr4_mb_s1' => $validate_sf9_values_mb['sf9_g10_values_qr4_mb_s1'],
            'sf9_g10_values_qr1_mb_s2' => $validate_sf9_values_mb['sf9_g10_values_qr1_mb_s2'],
            'sf9_g10_values_qr2_mb_s2' => $validate_sf9_values_mb['sf9_g10_values_qr2_mb_s2'],
            'sf9_g10_values_qr3_mb_s2' => $validate_sf9_values_mb['sf9_g10_values_qr3_mb_s2'],
            'sf9_g10_values_qr4_mb_s2' => $validate_sf9_values_mb['sf9_g10_values_qr4_mb_s2'],
        ]);

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

        // SF10: Scholastic record
        $validate_sf10_record = request()->validate([
            'sf10_g7_record_school_name' => 'nullable',
            'sf10_g7_record_school_id' => 'nullable',
            'sf10_g7_record_school_district' => 'nullable',
            'sf10_g7_record_school_division' => 'nullable',
            'sf10_g7_record_school_region' => 'nullable',
            'sf10_g7_record_school_grade' => 'nullable',
            'sf10_g7_record_school_section' => 'nullable',
            'sf10_g7_record_school_year' => 'nullable',
            'sf10_g7_record_school_teacher' => 'nullable',
            'sf10_g7_record_remedial_date_start' => 'nullable',
            'sf10_g7_record_remedial_date_end' => 'nullable',

            'sf10_g8_record_school_name' => 'nullable',
            'sf10_g8_record_school_id' => 'nullable',
            'sf10_g8_record_school_district' => 'nullable',
            'sf10_g8_record_school_division' => 'nullable',
            'sf10_g8_record_school_region' => 'nullable',
            'sf10_g8_record_school_grade' => 'nullable',
            'sf10_g8_record_school_section' => 'nullable',
            'sf10_g8_record_school_year' => 'nullable',
            'sf10_g8_record_school_teacher' => 'nullable',
            'sf10_g8_record_remedial_date_start' => 'nullable',
            'sf10_g8_record_remedial_date_end' => 'nullable',

            'sf10_g9_record_school_name' => 'nullable',
            'sf10_g9_record_school_id' => 'nullable',
            'sf10_g9_record_school_district' => 'nullable',
            'sf10_g9_record_school_division' => 'nullable',
            'sf10_g9_record_school_region' => 'nullable',
            'sf10_g9_record_school_grade' => 'nullable',
            'sf10_g9_record_school_section' => 'nullable',
            'sf10_g9_record_school_year' => 'nullable',
            'sf10_g9_record_school_teacher' => 'nullable',
            'sf10_g9_record_remedial_date_start' => 'nullable',
            'sf10_g9_record_remedial_date_end' => 'nullable',

            'sf10_g10_record_school_name' => 'nullable',
            'sf10_g10_record_school_id' => 'nullable',
            'sf10_g10_record_school_district' => 'nullable',
            'sf10_g10_record_school_division' => 'nullable',
            'sf10_g10_record_school_region' => 'nullable',
            'sf10_g10_record_school_grade' => 'nullable',
            'sf10_g10_record_school_section' => 'nullable',
            'sf10_g10_record_school_year' => 'nullable',
            'sf10_g10_record_school_teacher' => 'nullable',
            'sf10_g10_record_remedial_date_start' => 'nullable',
            'sf10_g10_record_remedial_date_end' => 'nullable',
        ]);

        $student->update([
            'sf10_g7_record_school_name' => $validate_sf10_record['sf10_g7_record_school_name'],
            'sf10_g7_record_school_id' => $validate_sf10_record['sf10_g7_record_school_id'],
            'sf10_g7_record_school_district' => $validate_sf10_record['sf10_g7_record_school_district'],
            'sf10_g7_record_school_division' => $validate_sf10_record['sf10_g7_record_school_division'],
            'sf10_g7_record_school_region' => $validate_sf10_record['sf10_g7_record_school_region'],
            'sf10_g7_record_school_grade' => $validate_sf10_record['sf10_g7_record_school_grade'],
            'sf10_g7_record_school_section' => $validate_sf10_record['sf10_g7_record_school_section'],
            'sf10_g7_record_school_year' => $validate_sf10_record['sf10_g7_record_school_year'],
            'sf10_g7_record_school_teacher' => $validate_sf10_record['sf10_g7_record_school_teacher'],
            'sf10_g7_record_remedial_date_start' => $validate_sf10_record['sf10_g7_record_remedial_date_start'],
            'sf10_g7_record_remedial_date_end' => $validate_sf10_record['sf10_g7_record_remedial_date_end'],

            'sf10_g8_record_school_name' => $validate_sf10_record['sf10_g8_record_school_name'],
            'sf10_g8_record_school_id' => $validate_sf10_record['sf10_g8_record_school_id'],
            'sf10_g8_record_school_district' => $validate_sf10_record['sf10_g8_record_school_district'],
            'sf10_g8_record_school_division' => $validate_sf10_record['sf10_g8_record_school_division'],
            'sf10_g8_record_school_region' => $validate_sf10_record['sf10_g8_record_school_region'],
            'sf10_g8_record_school_grade' => $validate_sf10_record['sf10_g8_record_school_grade'],
            'sf10_g8_record_school_section' => $validate_sf10_record['sf10_g8_record_school_section'],
            'sf10_g8_record_school_year' => $validate_sf10_record['sf10_g8_record_school_year'],
            'sf10_g8_record_school_teacher' => $validate_sf10_record['sf10_g8_record_school_teacher'],
            'sf10_g8_record_remedial_date_start' => $validate_sf10_record['sf10_g8_record_remedial_date_start'],
            'sf10_g8_record_remedial_date_end' => $validate_sf10_record['sf10_g8_record_remedial_date_end'],

            'sf10_g9_record_school_name' => $validate_sf10_record['sf10_g9_record_school_name'],
            'sf10_g9_record_school_id' => $validate_sf10_record['sf10_g9_record_school_id'],
            'sf10_g9_record_school_district' => $validate_sf10_record['sf10_g9_record_school_district'],
            'sf10_g9_record_school_division' => $validate_sf10_record['sf10_g9_record_school_division'],
            'sf10_g9_record_school_region' => $validate_sf10_record['sf10_g9_record_school_region'],
            'sf10_g9_record_school_grade' => $validate_sf10_record['sf10_g9_record_school_grade'],
            'sf10_g9_record_school_section' => $validate_sf10_record['sf10_g9_record_school_section'],
            'sf10_g9_record_school_year' => $validate_sf10_record['sf10_g9_record_school_year'],
            'sf10_g9_record_school_teacher' => $validate_sf10_record['sf10_g9_record_school_teacher'],
            'sf10_g9_record_remedial_date_start' => $validate_sf10_record['sf10_g9_record_remedial_date_start'],
            'sf10_g9_record_remedial_date_end' => $validate_sf10_record['sf10_g9_record_remedial_date_end'],

            'sf10_g10_record_school_name' => $validate_sf10_record['sf10_g10_record_school_name'],
            'sf10_g10_record_school_id' => $validate_sf10_record['sf10_g10_record_school_id'],
            'sf10_g10_record_school_district' => $validate_sf10_record['sf10_g10_record_school_district'],
            'sf10_g10_record_school_division' => $validate_sf10_record['sf10_g10_record_school_division'],
            'sf10_g10_record_school_region' => $validate_sf10_record['sf10_g10_record_school_region'],
            'sf10_g10_record_school_grade' => $validate_sf10_record['sf10_g10_record_school_grade'],
            'sf10_g10_record_school_section' => $validate_sf10_record['sf10_g10_record_school_section'],
            'sf10_g10_record_school_year' => $validate_sf10_record['sf10_g10_record_school_year'],
            'sf10_g10_record_school_teacher' => $validate_sf10_record['sf10_g10_record_school_teacher'],
            'sf10_g10_record_remedial_date_start' => $validate_sf10_record['sf10_g10_record_remedial_date_start'],
            'sf10_g10_record_remedial_date_end' => $validate_sf10_record['sf10_g10_record_remedial_date_end'],
        ]);

        // All: Subject -> filipino
        $validate_all_subject_fil = request()->validate([
            'sf9_g7_subject_qr1_fil' => 'nullable',
            'sf9_g7_subject_qr2_fil' => 'nullable',
            'sf9_g7_subject_qr3_fil' => 'nullable',
            'sf9_g7_subject_qr4_fil' => 'nullable',

            'sf9_g8_subject_qr1_fil' => 'nullable',
            'sf9_g8_subject_qr2_fil' => 'nullable',
            'sf9_g8_subject_qr3_fil' => 'nullable',
            'sf9_g8_subject_qr4_fil' => 'nullable',

            'sf9_g9_subject_qr1_fil' => 'nullable',
            'sf9_g9_subject_qr2_fil' => 'nullable',
            'sf9_g9_subject_qr3_fil' => 'nullable',
            'sf9_g9_subject_qr4_fil' => 'nullable',

            'sf9_g10_subject_qr1_fil' => 'nullable',
            'sf9_g10_subject_qr2_fil' => 'nullable',
            'sf9_g10_subject_qr3_fil' => 'nullable',
            'sf9_g10_subject_qr4_fil' => 'nullable',

            'sf10_g7_subject_qr1_fil' => 'nullable',
            'sf10_g7_subject_qr2_fil' => 'nullable',
            'sf10_g7_subject_qr3_fil' => 'nullable',
            'sf10_g7_subject_qr4_fil' => 'nullable',
            //'sf10_g7_subject_rem_fil' => 'nullable',

            'sf10_g8_subject_qr1_fil' => 'nullable',
            'sf10_g8_subject_qr2_fil' => 'nullable',
            'sf10_g8_subject_qr3_fil' => 'nullable',
            'sf10_g8_subject_qr4_fil' => 'nullable',
            //'sf10_g8_subject_rem_fil' => 'nullable',

            'sf10_g9_subject_qr1_fil' => 'nullable',
            'sf10_g9_subject_qr2_fil' => 'nullable',
            'sf10_g9_subject_qr3_fil' => 'nullable',
            'sf10_g9_subject_qr4_fil' => 'nullable',
            //'sf10_g9_subject_rem_fil' => 'nullable',

            'sf10_g10_subject_qr1_fil' => 'nullable',
            'sf10_g10_subject_qr2_fil' => 'nullable',
            'sf10_g10_subject_qr3_fil' => 'nullable',
            'sf10_g10_subject_qr4_fil' => 'nullable',
            //'sf10_g10_subject_rem_fil' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_fil' => $validate_all_subject_fil['sf9_g7_subject_qr1_fil'],
            'sf9_g7_subject_qr2_fil' => $validate_all_subject_fil['sf9_g7_subject_qr2_fil'],
            'sf9_g7_subject_qr3_fil' => $validate_all_subject_fil['sf9_g7_subject_qr3_fil'],
            'sf9_g7_subject_qr4_fil' => $validate_all_subject_fil['sf9_g7_subject_qr4_fil'],

            'sf9_g8_subject_qr1_fil' => $validate_all_subject_fil['sf9_g8_subject_qr1_fil'],
            'sf9_g8_subject_qr2_fil' => $validate_all_subject_fil['sf9_g8_subject_qr2_fil'],
            'sf9_g8_subject_qr3_fil' => $validate_all_subject_fil['sf9_g8_subject_qr3_fil'],
            'sf9_g8_subject_qr4_fil' => $validate_all_subject_fil['sf9_g8_subject_qr4_fil'],

            'sf9_g9_subject_qr1_fil' => $validate_all_subject_fil['sf9_g9_subject_qr1_fil'],
            'sf9_g9_subject_qr2_fil' => $validate_all_subject_fil['sf9_g9_subject_qr2_fil'],
            'sf9_g9_subject_qr3_fil' => $validate_all_subject_fil['sf9_g9_subject_qr3_fil'],
            'sf9_g9_subject_qr4_fil' => $validate_all_subject_fil['sf9_g9_subject_qr4_fil'],

            'sf9_g10_subject_qr1_fil' => $validate_all_subject_fil['sf9_g10_subject_qr1_fil'],
            'sf9_g10_subject_qr2_fil' => $validate_all_subject_fil['sf9_g10_subject_qr2_fil'],
            'sf9_g10_subject_qr3_fil' => $validate_all_subject_fil['sf9_g10_subject_qr3_fil'],
            'sf9_g10_subject_qr4_fil' => $validate_all_subject_fil['sf9_g10_subject_qr4_fil'],

            'sf10_g7_subject_qr1_fil' => $validate_all_subject_fil['sf10_g7_subject_qr1_fil'],
            'sf10_g7_subject_qr2_fil' => $validate_all_subject_fil['sf10_g7_subject_qr2_fil'],
            'sf10_g7_subject_qr3_fil' => $validate_all_subject_fil['sf10_g7_subject_qr3_fil'],
            'sf10_g7_subject_qr4_fil' => $validate_all_subject_fil['sf10_g7_subject_qr4_fil'],
            //'sf10_g7_subject_rem_fil' => $validate_all_subject_fil['sf10_g7_subject_rem_fil'],

            'sf10_g8_subject_qr1_fil' => $validate_all_subject_fil['sf10_g8_subject_qr1_fil'],
            'sf10_g8_subject_qr2_fil' => $validate_all_subject_fil['sf10_g8_subject_qr2_fil'],
            'sf10_g8_subject_qr3_fil' => $validate_all_subject_fil['sf10_g8_subject_qr3_fil'],
            'sf10_g8_subject_qr4_fil' => $validate_all_subject_fil['sf10_g8_subject_qr4_fil'],
            //'sf10_g8_subject_rem_fil' => $validate_all_subject_fil['sf10_g8_subject_rem_fil'],

            'sf10_g9_subject_qr1_fil' => $validate_all_subject_fil['sf10_g9_subject_qr1_fil'],
            'sf10_g9_subject_qr2_fil' => $validate_all_subject_fil['sf10_g9_subject_qr2_fil'],
            'sf10_g9_subject_qr3_fil' => $validate_all_subject_fil['sf10_g9_subject_qr3_fil'],
            'sf10_g9_subject_qr4_fil' => $validate_all_subject_fil['sf10_g9_subject_qr4_fil'],
            //'sf10_g9_subject_rem_fil' => $validate_all_subject_fil['sf10_g9_subject_rem_fil'],

            'sf10_g10_subject_qr1_fil' => $validate_all_subject_fil['sf10_g10_subject_qr1_fil'],
            'sf10_g10_subject_qr2_fil' => $validate_all_subject_fil['sf10_g10_subject_qr2_fil'],
            'sf10_g10_subject_qr3_fil' => $validate_all_subject_fil['sf10_g10_subject_qr3_fil'],
            'sf10_g10_subject_qr4_fil' => $validate_all_subject_fil['sf10_g10_subject_qr4_fil'],
            //'sf10_g10_subject_rem_fil' => $validate_all_subject_fil['sf10_g10_subject_rem_fil'],
        ]);

        // All: Subject -> english
        $validate_all_subject_eng = request()->validate([
            'sf9_g7_subject_qr1_eng' => 'nullable',
            'sf9_g7_subject_qr2_eng' => 'nullable',
            'sf9_g7_subject_qr3_eng' => 'nullable',
            'sf9_g7_subject_qr4_eng' => 'nullable',

            'sf9_g8_subject_qr1_eng' => 'nullable',
            'sf9_g8_subject_qr2_eng' => 'nullable',
            'sf9_g8_subject_qr3_eng' => 'nullable',
            'sf9_g8_subject_qr4_eng' => 'nullable',

            'sf9_g9_subject_qr1_eng' => 'nullable',
            'sf9_g9_subject_qr2_eng' => 'nullable',
            'sf9_g9_subject_qr3_eng' => 'nullable',
            'sf9_g9_subject_qr4_eng' => 'nullable',

            'sf9_g10_subject_qr1_eng' => 'nullable',
            'sf9_g10_subject_qr2_eng' => 'nullable',
            'sf9_g10_subject_qr3_eng' => 'nullable',
            'sf9_g10_subject_qr4_eng' => 'nullable',

            'sf10_g7_subject_qr1_eng' => 'nullable',
            'sf10_g7_subject_qr2_eng' => 'nullable',
            'sf10_g7_subject_qr3_eng' => 'nullable',
            'sf10_g7_subject_qr4_eng' => 'nullable',
            //'sf10_g7_subject_rem_eng' => 'nullable',

            'sf10_g8_subject_qr1_eng' => 'nullable',
            'sf10_g8_subject_qr2_eng' => 'nullable',
            'sf10_g8_subject_qr3_eng' => 'nullable',
            'sf10_g8_subject_qr4_eng' => 'nullable',
            //'sf10_g8_subject_rem_eng' => 'nullable',

            'sf10_g9_subject_qr1_eng' => 'nullable',
            'sf10_g9_subject_qr2_eng' => 'nullable',
            'sf10_g9_subject_qr3_eng' => 'nullable',
            'sf10_g9_subject_qr4_eng' => 'nullable',
            //'sf10_g9_subject_rem_eng' => 'nullable',

            'sf10_g10_subject_qr1_eng' => 'nullable',
            'sf10_g10_subject_qr2_eng' => 'nullable',
            'sf10_g10_subject_qr3_eng' => 'nullable',
            'sf10_g10_subject_qr4_eng' => 'nullable',
            //'sf10_g10_subject_rem_eng' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_eng' => $validate_all_subject_eng['sf9_g7_subject_qr1_eng'],
            'sf9_g7_subject_qr2_eng' => $validate_all_subject_eng['sf9_g7_subject_qr2_eng'],
            'sf9_g7_subject_qr3_eng' => $validate_all_subject_eng['sf9_g7_subject_qr3_eng'],
            'sf9_g7_subject_qr4_eng' => $validate_all_subject_eng['sf9_g7_subject_qr4_eng'],

            'sf9_g8_subject_qr1_eng' => $validate_all_subject_eng['sf9_g8_subject_qr1_eng'],
            'sf9_g8_subject_qr2_eng' => $validate_all_subject_eng['sf9_g8_subject_qr2_eng'],
            'sf9_g8_subject_qr3_eng' => $validate_all_subject_eng['sf9_g8_subject_qr3_eng'],
            'sf9_g8_subject_qr4_eng' => $validate_all_subject_eng['sf9_g8_subject_qr4_eng'],

            'sf9_g9_subject_qr1_eng' => $validate_all_subject_eng['sf9_g9_subject_qr1_eng'],
            'sf9_g9_subject_qr2_eng' => $validate_all_subject_eng['sf9_g9_subject_qr2_eng'],
            'sf9_g9_subject_qr3_eng' => $validate_all_subject_eng['sf9_g9_subject_qr3_eng'],
            'sf9_g9_subject_qr4_eng' => $validate_all_subject_eng['sf9_g9_subject_qr4_eng'],

            'sf9_g10_subject_qr1_eng' => $validate_all_subject_eng['sf9_g10_subject_qr1_eng'],
            'sf9_g10_subject_qr2_eng' => $validate_all_subject_eng['sf9_g10_subject_qr2_eng'],
            'sf9_g10_subject_qr3_eng' => $validate_all_subject_eng['sf9_g10_subject_qr3_eng'],
            'sf9_g10_subject_qr4_eng' => $validate_all_subject_eng['sf9_g10_subject_qr4_eng'],

            'sf10_g7_subject_qr1_eng' => $validate_all_subject_eng['sf10_g7_subject_qr1_eng'],
            'sf10_g7_subject_qr2_eng' => $validate_all_subject_eng['sf10_g7_subject_qr2_eng'],
            'sf10_g7_subject_qr3_eng' => $validate_all_subject_eng['sf10_g7_subject_qr3_eng'],
            'sf10_g7_subject_qr4_eng' => $validate_all_subject_eng['sf10_g7_subject_qr4_eng'],
            //'sf10_g7_subject_rem_eng' => $validate_all_subject_eng['sf10_g7_subject_rem_eng'],

            'sf10_g8_subject_qr1_eng' => $validate_all_subject_eng['sf10_g8_subject_qr1_eng'],
            'sf10_g8_subject_qr2_eng' => $validate_all_subject_eng['sf10_g8_subject_qr2_eng'],
            'sf10_g8_subject_qr3_eng' => $validate_all_subject_eng['sf10_g8_subject_qr3_eng'],
            'sf10_g8_subject_qr4_eng' => $validate_all_subject_eng['sf10_g8_subject_qr4_eng'],
            //'sf10_g8_subject_rem_eng' => $validate_all_subject_eng['sf10_g8_subject_rem_eng'],

            'sf10_g9_subject_qr1_eng' => $validate_all_subject_eng['sf10_g9_subject_qr1_eng'],
            'sf10_g9_subject_qr2_eng' => $validate_all_subject_eng['sf10_g9_subject_qr2_eng'],
            'sf10_g9_subject_qr3_eng' => $validate_all_subject_eng['sf10_g9_subject_qr3_eng'],
            'sf10_g9_subject_qr4_eng' => $validate_all_subject_eng['sf10_g9_subject_qr4_eng'],
            //'sf10_g9_subject_rem_eng' => $validate_all_subject_eng['sf10_g9_subject_rem_eng'],

            'sf10_g10_subject_qr1_eng' => $validate_all_subject_eng['sf10_g10_subject_qr1_eng'],
            'sf10_g10_subject_qr2_eng' => $validate_all_subject_eng['sf10_g10_subject_qr2_eng'],
            'sf10_g10_subject_qr3_eng' => $validate_all_subject_eng['sf10_g10_subject_qr3_eng'],
            'sf10_g10_subject_qr4_eng' => $validate_all_subject_eng['sf10_g10_subject_qr4_eng'],
            //'sf10_g10_subject_rem_eng' => $validate_all_subject_eng['sf10_g10_subject_rem_eng'],
        ]);

        // All: Subject -> mathematics
        $validate_all_subject_mat = request()->validate([
            'sf9_g7_subject_qr1_mat' => 'nullable',
            'sf9_g7_subject_qr2_mat' => 'nullable',
            'sf9_g7_subject_qr3_mat' => 'nullable',
            'sf9_g7_subject_qr4_mat' => 'nullable',

            'sf9_g8_subject_qr1_mat' => 'nullable',
            'sf9_g8_subject_qr2_mat' => 'nullable',
            'sf9_g8_subject_qr3_mat' => 'nullable',
            'sf9_g8_subject_qr4_mat' => 'nullable',

            'sf9_g9_subject_qr1_mat' => 'nullable',
            'sf9_g9_subject_qr2_mat' => 'nullable',
            'sf9_g9_subject_qr3_mat' => 'nullable',
            'sf9_g9_subject_qr4_mat' => 'nullable',

            'sf9_g10_subject_qr1_mat' => 'nullable',
            'sf9_g10_subject_qr2_mat' => 'nullable',
            'sf9_g10_subject_qr3_mat' => 'nullable',
            'sf9_g10_subject_qr4_mat' => 'nullable',

            'sf10_g7_subject_qr1_mat' => 'nullable',
            'sf10_g7_subject_qr2_mat' => 'nullable',
            'sf10_g7_subject_qr3_mat' => 'nullable',
            'sf10_g7_subject_qr4_mat' => 'nullable',
            //'sf10_g7_subject_rem_mat' => 'nullable',

            'sf10_g8_subject_qr1_mat' => 'nullable',
            'sf10_g8_subject_qr2_mat' => 'nullable',
            'sf10_g8_subject_qr3_mat' => 'nullable',
            'sf10_g8_subject_qr4_mat' => 'nullable',
            //'sf10_g8_subject_rem_mat' => 'nullable',

            'sf10_g9_subject_qr1_mat' => 'nullable',
            'sf10_g9_subject_qr2_mat' => 'nullable',
            'sf10_g9_subject_qr3_mat' => 'nullable',
            'sf10_g9_subject_qr4_mat' => 'nullable',
            //'sf10_g9_subject_rem_mat' => 'nullable',

            'sf10_g10_subject_qr1_mat' => 'nullable',
            'sf10_g10_subject_qr2_mat' => 'nullable',
            'sf10_g10_subject_qr3_mat' => 'nullable',
            'sf10_g10_subject_qr4_mat' => 'nullable',
            //'sf10_g10_subject_rem_mat' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_mat' => $validate_all_subject_mat['sf9_g7_subject_qr1_mat'],
            'sf9_g7_subject_qr2_mat' => $validate_all_subject_mat['sf9_g7_subject_qr2_mat'],
            'sf9_g7_subject_qr3_mat' => $validate_all_subject_mat['sf9_g7_subject_qr3_mat'],
            'sf9_g7_subject_qr4_mat' => $validate_all_subject_mat['sf9_g7_subject_qr4_mat'],

            'sf9_g8_subject_qr1_mat' => $validate_all_subject_mat['sf9_g8_subject_qr1_mat'],
            'sf9_g8_subject_qr2_mat' => $validate_all_subject_mat['sf9_g8_subject_qr2_mat'],
            'sf9_g8_subject_qr3_mat' => $validate_all_subject_mat['sf9_g8_subject_qr3_mat'],
            'sf9_g8_subject_qr4_mat' => $validate_all_subject_mat['sf9_g8_subject_qr4_mat'],

            'sf9_g9_subject_qr1_mat' => $validate_all_subject_mat['sf9_g9_subject_qr1_mat'],
            'sf9_g9_subject_qr2_mat' => $validate_all_subject_mat['sf9_g9_subject_qr2_mat'],
            'sf9_g9_subject_qr3_mat' => $validate_all_subject_mat['sf9_g9_subject_qr3_mat'],
            'sf9_g9_subject_qr4_mat' => $validate_all_subject_mat['sf9_g9_subject_qr4_mat'],

            'sf9_g10_subject_qr1_mat' => $validate_all_subject_mat['sf9_g10_subject_qr1_mat'],
            'sf9_g10_subject_qr2_mat' => $validate_all_subject_mat['sf9_g10_subject_qr2_mat'],
            'sf9_g10_subject_qr3_mat' => $validate_all_subject_mat['sf9_g10_subject_qr3_mat'],
            'sf9_g10_subject_qr4_mat' => $validate_all_subject_mat['sf9_g10_subject_qr4_mat'],

            'sf10_g7_subject_qr1_mat' => $validate_all_subject_mat['sf10_g7_subject_qr1_mat'],
            'sf10_g7_subject_qr2_mat' => $validate_all_subject_mat['sf10_g7_subject_qr2_mat'],
            'sf10_g7_subject_qr3_mat' => $validate_all_subject_mat['sf10_g7_subject_qr3_mat'],
            'sf10_g7_subject_qr4_mat' => $validate_all_subject_mat['sf10_g7_subject_qr4_mat'],
            //'sf10_g7_subject_rem_mat' => $validate_all_subject_mat['sf10_g7_subject_rem_mat'],

            'sf10_g8_subject_qr1_mat' => $validate_all_subject_mat['sf10_g8_subject_qr1_mat'],
            'sf10_g8_subject_qr2_mat' => $validate_all_subject_mat['sf10_g8_subject_qr2_mat'],
            'sf10_g8_subject_qr3_mat' => $validate_all_subject_mat['sf10_g8_subject_qr3_mat'],
            'sf10_g8_subject_qr4_mat' => $validate_all_subject_mat['sf10_g8_subject_qr4_mat'],
            //'sf10_g8_subject_rem_mat' => $validate_all_subject_mat['sf10_g8_subject_rem_mat'],

            'sf10_g9_subject_qr1_mat' => $validate_all_subject_mat['sf10_g9_subject_qr1_mat'],
            'sf10_g9_subject_qr2_mat' => $validate_all_subject_mat['sf10_g9_subject_qr2_mat'],
            'sf10_g9_subject_qr3_mat' => $validate_all_subject_mat['sf10_g9_subject_qr3_mat'],
            'sf10_g9_subject_qr4_mat' => $validate_all_subject_mat['sf10_g9_subject_qr4_mat'],
            //'sf10_g9_subject_rem_mat' => $validate_all_subject_mat['sf10_g9_subject_rem_mat'],

            'sf10_g10_subject_qr1_mat' => $validate_all_subject_mat['sf10_g10_subject_qr1_mat'],
            'sf10_g10_subject_qr2_mat' => $validate_all_subject_mat['sf10_g10_subject_qr2_mat'],
            'sf10_g10_subject_qr3_mat' => $validate_all_subject_mat['sf10_g10_subject_qr3_mat'],
            'sf10_g10_subject_qr4_mat' => $validate_all_subject_mat['sf10_g10_subject_qr4_mat'],
            //'sf10_g10_subject_rem_mat' => $validate_all_subject_mat['sf10_g10_subject_rem_mat'],
        ]);

        // All: Subject -> science
        $validate_all_subject_sci = request()->validate([
            'sf9_g7_subject_qr1_sci' => 'nullable',
            'sf9_g7_subject_qr2_sci' => 'nullable',
            'sf9_g7_subject_qr3_sci' => 'nullable',
            'sf9_g7_subject_qr4_sci' => 'nullable',

            'sf9_g8_subject_qr1_sci' => 'nullable',
            'sf9_g8_subject_qr2_sci' => 'nullable',
            'sf9_g8_subject_qr3_sci' => 'nullable',
            'sf9_g8_subject_qr4_sci' => 'nullable',

            'sf9_g9_subject_qr1_sci' => 'nullable',
            'sf9_g9_subject_qr2_sci' => 'nullable',
            'sf9_g9_subject_qr3_sci' => 'nullable',
            'sf9_g9_subject_qr4_sci' => 'nullable',

            'sf9_g10_subject_qr1_sci' => 'nullable',
            'sf9_g10_subject_qr2_sci' => 'nullable',
            'sf9_g10_subject_qr3_sci' => 'nullable',
            'sf9_g10_subject_qr4_sci' => 'nullable',

            'sf10_g7_subject_qr1_sci' => 'nullable',
            'sf10_g7_subject_qr2_sci' => 'nullable',
            'sf10_g7_subject_qr3_sci' => 'nullable',
            'sf10_g7_subject_qr4_sci' => 'nullable',
            //'sf10_g7_subject_rem_sci' => 'nullable',

            'sf10_g8_subject_qr1_sci' => 'nullable',
            'sf10_g8_subject_qr2_sci' => 'nullable',
            'sf10_g8_subject_qr3_sci' => 'nullable',
            'sf10_g8_subject_qr4_sci' => 'nullable',
            //'sf10_g8_subject_rem_sci' => 'nullable',

            'sf10_g9_subject_qr1_sci' => 'nullable',
            'sf10_g9_subject_qr2_sci' => 'nullable',
            'sf10_g9_subject_qr3_sci' => 'nullable',
            'sf10_g9_subject_qr4_sci' => 'nullable',
            //'sf10_g9_subject_rem_sci' => 'nullable',

            'sf10_g10_subject_qr1_sci' => 'nullable',
            'sf10_g10_subject_qr2_sci' => 'nullable',
            'sf10_g10_subject_qr3_sci' => 'nullable',
            'sf10_g10_subject_qr4_sci' => 'nullable',
            //'sf10_g10_subject_rem_sci' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_sci' => $validate_all_subject_sci['sf9_g7_subject_qr1_sci'],
            'sf9_g7_subject_qr2_sci' => $validate_all_subject_sci['sf9_g7_subject_qr2_sci'],
            'sf9_g7_subject_qr3_sci' => $validate_all_subject_sci['sf9_g7_subject_qr3_sci'],
            'sf9_g7_subject_qr4_sci' => $validate_all_subject_sci['sf9_g7_subject_qr4_sci'],

            'sf9_g8_subject_qr1_sci' => $validate_all_subject_sci['sf9_g8_subject_qr1_sci'],
            'sf9_g8_subject_qr2_sci' => $validate_all_subject_sci['sf9_g8_subject_qr2_sci'],
            'sf9_g8_subject_qr3_sci' => $validate_all_subject_sci['sf9_g8_subject_qr3_sci'],
            'sf9_g8_subject_qr4_sci' => $validate_all_subject_sci['sf9_g8_subject_qr4_sci'],

            'sf9_g9_subject_qr1_sci' => $validate_all_subject_sci['sf9_g9_subject_qr1_sci'],
            'sf9_g9_subject_qr2_sci' => $validate_all_subject_sci['sf9_g9_subject_qr2_sci'],
            'sf9_g9_subject_qr3_sci' => $validate_all_subject_sci['sf9_g9_subject_qr3_sci'],
            'sf9_g9_subject_qr4_sci' => $validate_all_subject_sci['sf9_g9_subject_qr4_sci'],

            'sf9_g10_subject_qr1_sci' => $validate_all_subject_sci['sf9_g10_subject_qr1_sci'],
            'sf9_g10_subject_qr2_sci' => $validate_all_subject_sci['sf9_g10_subject_qr2_sci'],
            'sf9_g10_subject_qr3_sci' => $validate_all_subject_sci['sf9_g10_subject_qr3_sci'],
            'sf9_g10_subject_qr4_sci' => $validate_all_subject_sci['sf9_g10_subject_qr4_sci'],

            'sf10_g7_subject_qr1_sci' => $validate_all_subject_sci['sf10_g7_subject_qr1_sci'],
            'sf10_g7_subject_qr2_sci' => $validate_all_subject_sci['sf10_g7_subject_qr2_sci'],
            'sf10_g7_subject_qr3_sci' => $validate_all_subject_sci['sf10_g7_subject_qr3_sci'],
            'sf10_g7_subject_qr4_sci' => $validate_all_subject_sci['sf10_g7_subject_qr4_sci'],
            //'sf10_g7_subject_rem_sci' => $validate_all_subject_sci['sf10_g7_subject_rem_sci'],

            'sf10_g8_subject_qr1_sci' => $validate_all_subject_sci['sf10_g8_subject_qr1_sci'],
            'sf10_g8_subject_qr2_sci' => $validate_all_subject_sci['sf10_g8_subject_qr2_sci'],
            'sf10_g8_subject_qr3_sci' => $validate_all_subject_sci['sf10_g8_subject_qr3_sci'],
            'sf10_g8_subject_qr4_sci' => $validate_all_subject_sci['sf10_g8_subject_qr4_sci'],
            //'sf10_g8_subject_rem_sci' => $validate_all_subject_sci['sf10_g8_subject_rem_sci'],

            'sf10_g9_subject_qr1_sci' => $validate_all_subject_sci['sf10_g9_subject_qr1_sci'],
            'sf10_g9_subject_qr2_sci' => $validate_all_subject_sci['sf10_g9_subject_qr2_sci'],
            'sf10_g9_subject_qr3_sci' => $validate_all_subject_sci['sf10_g9_subject_qr3_sci'],
            'sf10_g9_subject_qr4_sci' => $validate_all_subject_sci['sf10_g9_subject_qr4_sci'],
            //'sf10_g9_subject_rem_sci' => $validate_all_subject_sci['sf10_g9_subject_rem_sci'],

            'sf10_g10_subject_qr1_sci' => $validate_all_subject_sci['sf10_g10_subject_qr1_sci'],
            'sf10_g10_subject_qr2_sci' => $validate_all_subject_sci['sf10_g10_subject_qr2_sci'],
            'sf10_g10_subject_qr3_sci' => $validate_all_subject_sci['sf10_g10_subject_qr3_sci'],
            'sf10_g10_subject_qr4_sci' => $validate_all_subject_sci['sf10_g10_subject_qr4_sci'],
            //'sf10_g10_subject_rem_sci' => $validate_all_subject_sci['sf10_g10_subject_rem_sci'],
        ]);

        // All: Subject -> araling panlipunan (ap)
        $validate_all_subject_ap = request()->validate([
            'sf9_g7_subject_qr1_ap' => 'nullable',
            'sf9_g7_subject_qr2_ap' => 'nullable',
            'sf9_g7_subject_qr3_ap' => 'nullable',
            'sf9_g7_subject_qr4_ap' => 'nullable',

            'sf9_g8_subject_qr1_ap' => 'nullable',
            'sf9_g8_subject_qr2_ap' => 'nullable',
            'sf9_g8_subject_qr3_ap' => 'nullable',
            'sf9_g8_subject_qr4_ap' => 'nullable',

            'sf9_g9_subject_qr1_ap' => 'nullable',
            'sf9_g9_subject_qr2_ap' => 'nullable',
            'sf9_g9_subject_qr3_ap' => 'nullable',
            'sf9_g9_subject_qr4_ap' => 'nullable',

            'sf9_g10_subject_qr1_ap' => 'nullable',
            'sf9_g10_subject_qr2_ap' => 'nullable',
            'sf9_g10_subject_qr3_ap' => 'nullable',
            'sf9_g10_subject_qr4_ap' => 'nullable',

            'sf10_g7_subject_qr1_ap' => 'nullable',
            'sf10_g7_subject_qr2_ap' => 'nullable',
            'sf10_g7_subject_qr3_ap' => 'nullable',
            'sf10_g7_subject_qr4_ap' => 'nullable',
            //'sf10_g7_subject_rem_ap' => 'nullable',

            'sf10_g8_subject_qr1_ap' => 'nullable',
            'sf10_g8_subject_qr2_ap' => 'nullable',
            'sf10_g8_subject_qr3_ap' => 'nullable',
            'sf10_g8_subject_qr4_ap' => 'nullable',
            //'sf10_g8_subject_rem_ap' => 'nullable',

            'sf10_g9_subject_qr1_ap' => 'nullable',
            'sf10_g9_subject_qr2_ap' => 'nullable',
            'sf10_g9_subject_qr3_ap' => 'nullable',
            'sf10_g9_subject_qr4_ap' => 'nullable',
            //'sf10_g9_subject_rem_ap' => 'nullable',

            'sf10_g10_subject_qr1_ap' => 'nullable',
            'sf10_g10_subject_qr2_ap' => 'nullable',
            'sf10_g10_subject_qr3_ap' => 'nullable',
            'sf10_g10_subject_qr4_ap' => 'nullable',
            //'sf10_g10_subject_rem_ap' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_ap' => $validate_all_subject_ap['sf9_g7_subject_qr1_ap'],
            'sf9_g7_subject_qr2_ap' => $validate_all_subject_ap['sf9_g7_subject_qr2_ap'],
            'sf9_g7_subject_qr3_ap' => $validate_all_subject_ap['sf9_g7_subject_qr3_ap'],
            'sf9_g7_subject_qr4_ap' => $validate_all_subject_ap['sf9_g7_subject_qr4_ap'],

            'sf9_g8_subject_qr1_ap' => $validate_all_subject_ap['sf9_g8_subject_qr1_ap'],
            'sf9_g8_subject_qr2_ap' => $validate_all_subject_ap['sf9_g8_subject_qr2_ap'],
            'sf9_g8_subject_qr3_ap' => $validate_all_subject_ap['sf9_g8_subject_qr3_ap'],
            'sf9_g8_subject_qr4_ap' => $validate_all_subject_ap['sf9_g8_subject_qr4_ap'],

            'sf9_g9_subject_qr1_ap' => $validate_all_subject_ap['sf9_g9_subject_qr1_ap'],
            'sf9_g9_subject_qr2_ap' => $validate_all_subject_ap['sf9_g9_subject_qr2_ap'],
            'sf9_g9_subject_qr3_ap' => $validate_all_subject_ap['sf9_g9_subject_qr3_ap'],
            'sf9_g9_subject_qr4_ap' => $validate_all_subject_ap['sf9_g9_subject_qr4_ap'],

            'sf9_g10_subject_qr1_ap' => $validate_all_subject_ap['sf9_g10_subject_qr1_ap'],
            'sf9_g10_subject_qr2_ap' => $validate_all_subject_ap['sf9_g10_subject_qr2_ap'],
            'sf9_g10_subject_qr3_ap' => $validate_all_subject_ap['sf9_g10_subject_qr3_ap'],
            'sf9_g10_subject_qr4_ap' => $validate_all_subject_ap['sf9_g10_subject_qr4_ap'],

            'sf10_g7_subject_qr1_ap' => $validate_all_subject_ap['sf10_g7_subject_qr1_ap'],
            'sf10_g7_subject_qr2_ap' => $validate_all_subject_ap['sf10_g7_subject_qr2_ap'],
            'sf10_g7_subject_qr3_ap' => $validate_all_subject_ap['sf10_g7_subject_qr3_ap'],
            'sf10_g7_subject_qr4_ap' => $validate_all_subject_ap['sf10_g7_subject_qr4_ap'],
            //'sf10_g7_subject_rem_ap' => $validate_all_subject_ap['sf10_g7_subject_rem_ap'],

            'sf10_g8_subject_qr1_ap' => $validate_all_subject_ap['sf10_g8_subject_qr1_ap'],
            'sf10_g8_subject_qr2_ap' => $validate_all_subject_ap['sf10_g8_subject_qr2_ap'],
            'sf10_g8_subject_qr3_ap' => $validate_all_subject_ap['sf10_g8_subject_qr3_ap'],
            'sf10_g8_subject_qr4_ap' => $validate_all_subject_ap['sf10_g8_subject_qr4_ap'],
            //'sf10_g8_subject_rem_ap' => $validate_all_subject_ap['sf10_g8_subject_rem_ap'],

            'sf10_g9_subject_qr1_ap' => $validate_all_subject_ap['sf10_g9_subject_qr1_ap'],
            'sf10_g9_subject_qr2_ap' => $validate_all_subject_ap['sf10_g9_subject_qr2_ap'],
            'sf10_g9_subject_qr3_ap' => $validate_all_subject_ap['sf10_g9_subject_qr3_ap'],
            'sf10_g9_subject_qr4_ap' => $validate_all_subject_ap['sf10_g9_subject_qr4_ap'],
            //'sf10_g9_subject_rem_ap' => $validate_all_subject_ap['sf10_g9_subject_rem_ap'],

            'sf10_g10_subject_qr1_ap' => $validate_all_subject_ap['sf10_g10_subject_qr1_ap'],
            'sf10_g10_subject_qr2_ap' => $validate_all_subject_ap['sf10_g10_subject_qr2_ap'],
            'sf10_g10_subject_qr3_ap' => $validate_all_subject_ap['sf10_g10_subject_qr3_ap'],
            'sf10_g10_subject_qr4_ap' => $validate_all_subject_ap['sf10_g10_subject_qr4_ap'],
            //'sf10_g10_subject_rem_ap' => $validate_all_subject_ap['sf10_g10_subject_rem_ap'],
        ]);

        // All: Subject -> edukasyon sa pagpapakatao (ep)
        $validate_all_subject_ep = request()->validate([
            'sf9_g7_subject_qr1_ep' => 'nullable',
            'sf9_g7_subject_qr2_ep' => 'nullable',
            'sf9_g7_subject_qr3_ep' => 'nullable',
            'sf9_g7_subject_qr4_ep' => 'nullable',

            'sf9_g8_subject_qr1_ep' => 'nullable',
            'sf9_g8_subject_qr2_ep' => 'nullable',
            'sf9_g8_subject_qr3_ep' => 'nullable',
            'sf9_g8_subject_qr4_ep' => 'nullable',

            'sf9_g9_subject_qr1_ep' => 'nullable',
            'sf9_g9_subject_qr2_ep' => 'nullable',
            'sf9_g9_subject_qr3_ep' => 'nullable',
            'sf9_g9_subject_qr4_ep' => 'nullable',

            'sf9_g10_subject_qr1_ep' => 'nullable',
            'sf9_g10_subject_qr2_ep' => 'nullable',
            'sf9_g10_subject_qr3_ep' => 'nullable',
            'sf9_g10_subject_qr4_ep' => 'nullable',

            'sf10_g7_subject_qr1_ep' => 'nullable',
            'sf10_g7_subject_qr2_ep' => 'nullable',
            'sf10_g7_subject_qr3_ep' => 'nullable',
            'sf10_g7_subject_qr4_ep' => 'nullable',
            //'sf10_g7_subject_rem_ep' => 'nullable',

            'sf10_g8_subject_qr1_ep' => 'nullable',
            'sf10_g8_subject_qr2_ep' => 'nullable',
            'sf10_g8_subject_qr3_ep' => 'nullable',
            'sf10_g8_subject_qr4_ep' => 'nullable',
            //'sf10_g8_subject_rem_ep' => 'nullable',

            'sf10_g9_subject_qr1_ep' => 'nullable',
            'sf10_g9_subject_qr2_ep' => 'nullable',
            'sf10_g9_subject_qr3_ep' => 'nullable',
            'sf10_g9_subject_qr4_ep' => 'nullable',
            //'sf10_g9_subject_rem_ep' => 'nullable',

            'sf10_g10_subject_qr1_ep' => 'nullable',
            'sf10_g10_subject_qr2_ep' => 'nullable',
            'sf10_g10_subject_qr3_ep' => 'nullable',
            'sf10_g10_subject_qr4_ep' => 'nullable',
            //'sf10_g10_subject_rem_ep' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_ep' => $validate_all_subject_ep['sf9_g7_subject_qr1_ep'],
            'sf9_g7_subject_qr2_ep' => $validate_all_subject_ep['sf9_g7_subject_qr2_ep'],
            'sf9_g7_subject_qr3_ep' => $validate_all_subject_ep['sf9_g7_subject_qr3_ep'],
            'sf9_g7_subject_qr4_ep' => $validate_all_subject_ep['sf9_g7_subject_qr4_ep'],

            'sf9_g8_subject_qr1_ep' => $validate_all_subject_ep['sf9_g8_subject_qr1_ep'],
            'sf9_g8_subject_qr2_ep' => $validate_all_subject_ep['sf9_g8_subject_qr2_ep'],
            'sf9_g8_subject_qr3_ep' => $validate_all_subject_ep['sf9_g8_subject_qr3_ep'],
            'sf9_g8_subject_qr4_ep' => $validate_all_subject_ep['sf9_g8_subject_qr4_ep'],

            'sf9_g9_subject_qr1_ep' => $validate_all_subject_ep['sf9_g9_subject_qr1_ep'],
            'sf9_g9_subject_qr2_ep' => $validate_all_subject_ep['sf9_g9_subject_qr2_ep'],
            'sf9_g9_subject_qr3_ep' => $validate_all_subject_ep['sf9_g9_subject_qr3_ep'],
            'sf9_g9_subject_qr4_ep' => $validate_all_subject_ep['sf9_g9_subject_qr4_ep'],

            'sf9_g10_subject_qr1_ep' => $validate_all_subject_ep['sf9_g10_subject_qr1_ep'],
            'sf9_g10_subject_qr2_ep' => $validate_all_subject_ep['sf9_g10_subject_qr2_ep'],
            'sf9_g10_subject_qr3_ep' => $validate_all_subject_ep['sf9_g10_subject_qr3_ep'],
            'sf9_g10_subject_qr4_ep' => $validate_all_subject_ep['sf9_g10_subject_qr4_ep'],

            'sf10_g7_subject_qr1_ep' => $validate_all_subject_ep['sf10_g7_subject_qr1_ep'],
            'sf10_g7_subject_qr2_ep' => $validate_all_subject_ep['sf10_g7_subject_qr2_ep'],
            'sf10_g7_subject_qr3_ep' => $validate_all_subject_ep['sf10_g7_subject_qr3_ep'],
            'sf10_g7_subject_qr4_ep' => $validate_all_subject_ep['sf10_g7_subject_qr4_ep'],
            //'sf10_g7_subject_rem_ep' => $validate_all_subject_ep['sf10_g7_subject_rem_ep'],

            'sf10_g8_subject_qr1_ep' => $validate_all_subject_ep['sf10_g8_subject_qr1_ep'],
            'sf10_g8_subject_qr2_ep' => $validate_all_subject_ep['sf10_g8_subject_qr2_ep'],
            'sf10_g8_subject_qr3_ep' => $validate_all_subject_ep['sf10_g8_subject_qr3_ep'],
            'sf10_g8_subject_qr4_ep' => $validate_all_subject_ep['sf10_g8_subject_qr4_ep'],
            //'sf10_g8_subject_rem_ep' => $validate_all_subject_ep['sf10_g8_subject_rem_ep'],

            'sf10_g9_subject_qr1_ep' => $validate_all_subject_ep['sf10_g9_subject_qr1_ep'],
            'sf10_g9_subject_qr2_ep' => $validate_all_subject_ep['sf10_g9_subject_qr2_ep'],
            'sf10_g9_subject_qr3_ep' => $validate_all_subject_ep['sf10_g9_subject_qr3_ep'],
            'sf10_g9_subject_qr4_ep' => $validate_all_subject_ep['sf10_g9_subject_qr4_ep'],
            //'sf10_g9_subject_rem_ep' => $validate_all_subject_ep['sf10_g9_subject_rem_ep'],

            'sf10_g10_subject_qr1_ep' => $validate_all_subject_ep['sf10_g10_subject_qr1_ep'],
            'sf10_g10_subject_qr2_ep' => $validate_all_subject_ep['sf10_g10_subject_qr2_ep'],
            'sf10_g10_subject_qr3_ep' => $validate_all_subject_ep['sf10_g10_subject_qr3_ep'],
            'sf10_g10_subject_qr4_ep' => $validate_all_subject_ep['sf10_g10_subject_qr4_ep'],
            //'sf10_g10_subject_rem_ep' => $validate_all_subject_ep['sf10_g10_subject_rem_ep'],
        ]);

        // All: Subject -> technology and livelihood education (tle)
        $validate_all_subject_tle = request()->validate([
            'sf9_g7_subject_qr1_tle' => 'nullable',
            'sf9_g7_subject_qr2_tle' => 'nullable',
            'sf9_g7_subject_qr3_tle' => 'nullable',
            'sf9_g7_subject_qr4_tle' => 'nullable',

            'sf9_g8_subject_qr1_tle' => 'nullable',
            'sf9_g8_subject_qr2_tle' => 'nullable',
            'sf9_g8_subject_qr3_tle' => 'nullable',
            'sf9_g8_subject_qr4_tle' => 'nullable',

            'sf9_g9_subject_qr1_tle' => 'nullable',
            'sf9_g9_subject_qr2_tle' => 'nullable',
            'sf9_g9_subject_qr3_tle' => 'nullable',
            'sf9_g9_subject_qr4_tle' => 'nullable',

            'sf9_g10_subject_qr1_tle' => 'nullable',
            'sf9_g10_subject_qr2_tle' => 'nullable',
            'sf9_g10_subject_qr3_tle' => 'nullable',
            'sf9_g10_subject_qr4_tle' => 'nullable',

            'sf10_g7_subject_qr1_tle' => 'nullable',
            'sf10_g7_subject_qr2_tle' => 'nullable',
            'sf10_g7_subject_qr3_tle' => 'nullable',
            'sf10_g7_subject_qr4_tle' => 'nullable',
            //'sf10_g7_subject_rem_tle' => 'nullable',

            'sf10_g8_subject_qr1_tle' => 'nullable',
            'sf10_g8_subject_qr2_tle' => 'nullable',
            'sf10_g8_subject_qr3_tle' => 'nullable',
            'sf10_g8_subject_qr4_tle' => 'nullable',
            //'sf10_g8_subject_rem_tle' => 'nullable',

            'sf10_g9_subject_qr1_tle' => 'nullable',
            'sf10_g9_subject_qr2_tle' => 'nullable',
            'sf10_g9_subject_qr3_tle' => 'nullable',
            'sf10_g9_subject_qr4_tle' => 'nullable',
            //'sf10_g9_subject_rem_tle' => 'nullable',

            'sf10_g10_subject_qr1_tle' => 'nullable',
            'sf10_g10_subject_qr2_tle' => 'nullable',
            'sf10_g10_subject_qr3_tle' => 'nullable',
            'sf10_g10_subject_qr4_tle' => 'nullable',
            //'sf10_g10_subject_rem_tle' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_tle' => $validate_all_subject_tle['sf9_g7_subject_qr1_tle'],
            'sf9_g7_subject_qr2_tle' => $validate_all_subject_tle['sf9_g7_subject_qr2_tle'],
            'sf9_g7_subject_qr3_tle' => $validate_all_subject_tle['sf9_g7_subject_qr3_tle'],
            'sf9_g7_subject_qr4_tle' => $validate_all_subject_tle['sf9_g7_subject_qr4_tle'],

            'sf9_g8_subject_qr1_tle' => $validate_all_subject_tle['sf9_g8_subject_qr1_tle'],
            'sf9_g8_subject_qr2_tle' => $validate_all_subject_tle['sf9_g8_subject_qr2_tle'],
            'sf9_g8_subject_qr3_tle' => $validate_all_subject_tle['sf9_g8_subject_qr3_tle'],
            'sf9_g8_subject_qr4_tle' => $validate_all_subject_tle['sf9_g8_subject_qr4_tle'],

            'sf9_g9_subject_qr1_tle' => $validate_all_subject_tle['sf9_g9_subject_qr1_tle'],
            'sf9_g9_subject_qr2_tle' => $validate_all_subject_tle['sf9_g9_subject_qr2_tle'],
            'sf9_g9_subject_qr3_tle' => $validate_all_subject_tle['sf9_g9_subject_qr3_tle'],
            'sf9_g9_subject_qr4_tle' => $validate_all_subject_tle['sf9_g9_subject_qr4_tle'],

            'sf9_g10_subject_qr1_tle' => $validate_all_subject_tle['sf9_g10_subject_qr1_tle'],
            'sf9_g10_subject_qr2_tle' => $validate_all_subject_tle['sf9_g10_subject_qr2_tle'],
            'sf9_g10_subject_qr3_tle' => $validate_all_subject_tle['sf9_g10_subject_qr3_tle'],
            'sf9_g10_subject_qr4_tle' => $validate_all_subject_tle['sf9_g10_subject_qr4_tle'],

            'sf10_g7_subject_qr1_tle' => $validate_all_subject_tle['sf10_g7_subject_qr1_tle'],
            'sf10_g7_subject_qr2_tle' => $validate_all_subject_tle['sf10_g7_subject_qr2_tle'],
            'sf10_g7_subject_qr3_tle' => $validate_all_subject_tle['sf10_g7_subject_qr3_tle'],
            'sf10_g7_subject_qr4_tle' => $validate_all_subject_tle['sf10_g7_subject_qr4_tle'],
            //'sf10_g7_subject_rem_tle' => $validate_all_subject_tle['sf10_g7_subject_rem_tle'],

            'sf10_g8_subject_qr1_tle' => $validate_all_subject_tle['sf10_g8_subject_qr1_tle'],
            'sf10_g8_subject_qr2_tle' => $validate_all_subject_tle['sf10_g8_subject_qr2_tle'],
            'sf10_g8_subject_qr3_tle' => $validate_all_subject_tle['sf10_g8_subject_qr3_tle'],
            'sf10_g8_subject_qr4_tle' => $validate_all_subject_tle['sf10_g8_subject_qr4_tle'],
            //'sf10_g8_subject_rem_tle' => $validate_all_subject_tle['sf10_g8_subject_rem_tle'],

            'sf10_g9_subject_qr1_tle' => $validate_all_subject_tle['sf10_g9_subject_qr1_tle'],
            'sf10_g9_subject_qr2_tle' => $validate_all_subject_tle['sf10_g9_subject_qr2_tle'],
            'sf10_g9_subject_qr3_tle' => $validate_all_subject_tle['sf10_g9_subject_qr3_tle'],
            'sf10_g9_subject_qr4_tle' => $validate_all_subject_tle['sf10_g9_subject_qr4_tle'],
            //'sf10_g9_subject_rem_tle' => $validate_all_subject_tle['sf10_g9_subject_rem_tle'],

            'sf10_g10_subject_qr1_tle' => $validate_all_subject_tle['sf10_g10_subject_qr1_tle'],
            'sf10_g10_subject_qr2_tle' => $validate_all_subject_tle['sf10_g10_subject_qr2_tle'],
            'sf10_g10_subject_qr3_tle' => $validate_all_subject_tle['sf10_g10_subject_qr3_tle'],
            'sf10_g10_subject_qr4_tle' => $validate_all_subject_tle['sf10_g10_subject_qr4_tle'],
            //'sf10_g10_subject_rem_tle' => $validate_all_subject_tle['sf10_g10_subject_rem_tle'],
        ]);

        // All: Subject -> music
        $validate_all_subject_mus = request()->validate([
            'sf9_g7_subject_qr1_mus' => 'nullable',
            'sf9_g7_subject_qr2_mus' => 'nullable',
            'sf9_g7_subject_qr3_mus' => 'nullable',
            'sf9_g7_subject_qr4_mus' => 'nullable',

            'sf9_g8_subject_qr1_mus' => 'nullable',
            'sf9_g8_subject_qr2_mus' => 'nullable',
            'sf9_g8_subject_qr3_mus' => 'nullable',
            'sf9_g8_subject_qr4_mus' => 'nullable',

            'sf9_g9_subject_qr1_mus' => 'nullable',
            'sf9_g9_subject_qr2_mus' => 'nullable',
            'sf9_g9_subject_qr3_mus' => 'nullable',
            'sf9_g9_subject_qr4_mus' => 'nullable',

            'sf9_g10_subject_qr1_mus' => 'nullable',
            'sf9_g10_subject_qr2_mus' => 'nullable',
            'sf9_g10_subject_qr3_mus' => 'nullable',
            'sf9_g10_subject_qr4_mus' => 'nullable',

            'sf10_g7_subject_qr1_mus' => 'nullable',
            'sf10_g7_subject_qr2_mus' => 'nullable',
            'sf10_g7_subject_qr3_mus' => 'nullable',
            'sf10_g7_subject_qr4_mus' => 'nullable',
            //'sf10_g7_subject_rem_mus' => 'nullable',

            'sf10_g8_subject_qr1_mus' => 'nullable',
            'sf10_g8_subject_qr2_mus' => 'nullable',
            'sf10_g8_subject_qr3_mus' => 'nullable',
            'sf10_g8_subject_qr4_mus' => 'nullable',
            //'sf10_g8_subject_rem_mus' => 'nullable',

            'sf10_g9_subject_qr1_mus' => 'nullable',
            'sf10_g9_subject_qr2_mus' => 'nullable',
            'sf10_g9_subject_qr3_mus' => 'nullable',
            'sf10_g9_subject_qr4_mus' => 'nullable',
            //'sf10_g9_subject_rem_mus' => 'nullable',

            'sf10_g10_subject_qr1_mus' => 'nullable',
            'sf10_g10_subject_qr2_mus' => 'nullable',
            'sf10_g10_subject_qr3_mus' => 'nullable',
            'sf10_g10_subject_qr4_mus' => 'nullable',
            //'sf10_g10_subject_rem_mus' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_mus' => $validate_all_subject_mus['sf9_g7_subject_qr1_mus'],
            'sf9_g7_subject_qr2_mus' => $validate_all_subject_mus['sf9_g7_subject_qr2_mus'],
            'sf9_g7_subject_qr3_mus' => $validate_all_subject_mus['sf9_g7_subject_qr3_mus'],
            'sf9_g7_subject_qr4_mus' => $validate_all_subject_mus['sf9_g7_subject_qr4_mus'],

            'sf9_g8_subject_qr1_mus' => $validate_all_subject_mus['sf9_g8_subject_qr1_mus'],
            'sf9_g8_subject_qr2_mus' => $validate_all_subject_mus['sf9_g8_subject_qr2_mus'],
            'sf9_g8_subject_qr3_mus' => $validate_all_subject_mus['sf9_g8_subject_qr3_mus'],
            'sf9_g8_subject_qr4_mus' => $validate_all_subject_mus['sf9_g8_subject_qr4_mus'],

            'sf9_g9_subject_qr1_mus' => $validate_all_subject_mus['sf9_g9_subject_qr1_mus'],
            'sf9_g9_subject_qr2_mus' => $validate_all_subject_mus['sf9_g9_subject_qr2_mus'],
            'sf9_g9_subject_qr3_mus' => $validate_all_subject_mus['sf9_g9_subject_qr3_mus'],
            'sf9_g9_subject_qr4_mus' => $validate_all_subject_mus['sf9_g9_subject_qr4_mus'],

            'sf9_g10_subject_qr1_mus' => $validate_all_subject_mus['sf9_g10_subject_qr1_mus'],
            'sf9_g10_subject_qr2_mus' => $validate_all_subject_mus['sf9_g10_subject_qr2_mus'],
            'sf9_g10_subject_qr3_mus' => $validate_all_subject_mus['sf9_g10_subject_qr3_mus'],
            'sf9_g10_subject_qr4_mus' => $validate_all_subject_mus['sf9_g10_subject_qr4_mus'],

            'sf10_g7_subject_qr1_mus' => $validate_all_subject_mus['sf10_g7_subject_qr1_mus'],
            'sf10_g7_subject_qr2_mus' => $validate_all_subject_mus['sf10_g7_subject_qr2_mus'],
            'sf10_g7_subject_qr3_mus' => $validate_all_subject_mus['sf10_g7_subject_qr3_mus'],
            'sf10_g7_subject_qr4_mus' => $validate_all_subject_mus['sf10_g7_subject_qr4_mus'],
            //'sf10_g7_subject_rem_mus' => $validate_all_subject_mus['sf10_g7_subject_rem_mus'],

            'sf10_g8_subject_qr1_mus' => $validate_all_subject_mus['sf10_g8_subject_qr1_mus'],
            'sf10_g8_subject_qr2_mus' => $validate_all_subject_mus['sf10_g8_subject_qr2_mus'],
            'sf10_g8_subject_qr3_mus' => $validate_all_subject_mus['sf10_g8_subject_qr3_mus'],
            'sf10_g8_subject_qr4_mus' => $validate_all_subject_mus['sf10_g8_subject_qr4_mus'],
            //'sf10_g8_subject_rem_mus' => $validate_all_subject_mus['sf10_g8_subject_rem_mus'],

            'sf10_g9_subject_qr1_mus' => $validate_all_subject_mus['sf10_g9_subject_qr1_mus'],
            'sf10_g9_subject_qr2_mus' => $validate_all_subject_mus['sf10_g9_subject_qr2_mus'],
            'sf10_g9_subject_qr3_mus' => $validate_all_subject_mus['sf10_g9_subject_qr3_mus'],
            'sf10_g9_subject_qr4_mus' => $validate_all_subject_mus['sf10_g9_subject_qr4_mus'],
            //'sf10_g9_subject_rem_mus' => $validate_all_subject_mus['sf10_g9_subject_rem_mus'],

            'sf10_g10_subject_qr1_mus' => $validate_all_subject_mus['sf10_g10_subject_qr1_mus'],
            'sf10_g10_subject_qr2_mus' => $validate_all_subject_mus['sf10_g10_subject_qr2_mus'],
            'sf10_g10_subject_qr3_mus' => $validate_all_subject_mus['sf10_g10_subject_qr3_mus'],
            'sf10_g10_subject_qr4_mus' => $validate_all_subject_mus['sf10_g10_subject_qr4_mus'],
            //'sf10_g10_subject_rem_mus' => $validate_all_subject_mus['sf10_g10_subject_rem_mus'],
        ]);

        // All: Subject -> arts
        $validate_all_subject_art = request()->validate([
            'sf9_g7_subject_qr1_art' => 'nullable',
            'sf9_g7_subject_qr2_art' => 'nullable',
            'sf9_g7_subject_qr3_art' => 'nullable',
            'sf9_g7_subject_qr4_art' => 'nullable',

            'sf9_g8_subject_qr1_art' => 'nullable',
            'sf9_g8_subject_qr2_art' => 'nullable',
            'sf9_g8_subject_qr3_art' => 'nullable',
            'sf9_g8_subject_qr4_art' => 'nullable',

            'sf9_g9_subject_qr1_art' => 'nullable',
            'sf9_g9_subject_qr2_art' => 'nullable',
            'sf9_g9_subject_qr3_art' => 'nullable',
            'sf9_g9_subject_qr4_art' => 'nullable',

            'sf9_g10_subject_qr1_art' => 'nullable',
            'sf9_g10_subject_qr2_art' => 'nullable',
            'sf9_g10_subject_qr3_art' => 'nullable',
            'sf9_g10_subject_qr4_art' => 'nullable',

            'sf10_g7_subject_qr1_art' => 'nullable',
            'sf10_g7_subject_qr2_art' => 'nullable',
            'sf10_g7_subject_qr3_art' => 'nullable',
            'sf10_g7_subject_qr4_art' => 'nullable',
            //'sf10_g7_subject_rem_art' => 'nullable',

            'sf10_g8_subject_qr1_art' => 'nullable',
            'sf10_g8_subject_qr2_art' => 'nullable',
            'sf10_g8_subject_qr3_art' => 'nullable',
            'sf10_g8_subject_qr4_art' => 'nullable',
            //'sf10_g8_subject_rem_art' => 'nullable',

            'sf10_g9_subject_qr1_art' => 'nullable',
            'sf10_g9_subject_qr2_art' => 'nullable',
            'sf10_g9_subject_qr3_art' => 'nullable',
            'sf10_g9_subject_qr4_art' => 'nullable',
            //'sf10_g9_subject_rem_art' => 'nullable',

            'sf10_g10_subject_qr1_art' => 'nullable',
            'sf10_g10_subject_qr2_art' => 'nullable',
            'sf10_g10_subject_qr3_art' => 'nullable',
            'sf10_g10_subject_qr4_art' => 'nullable',
            //'sf10_g10_subject_rem_art' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_art' => $validate_all_subject_art['sf9_g7_subject_qr1_art'],
            'sf9_g7_subject_qr2_art' => $validate_all_subject_art['sf9_g7_subject_qr2_art'],
            'sf9_g7_subject_qr3_art' => $validate_all_subject_art['sf9_g7_subject_qr3_art'],
            'sf9_g7_subject_qr4_art' => $validate_all_subject_art['sf9_g7_subject_qr4_art'],

            'sf9_g8_subject_qr1_art' => $validate_all_subject_art['sf9_g8_subject_qr1_art'],
            'sf9_g8_subject_qr2_art' => $validate_all_subject_art['sf9_g8_subject_qr2_art'],
            'sf9_g8_subject_qr3_art' => $validate_all_subject_art['sf9_g8_subject_qr3_art'],
            'sf9_g8_subject_qr4_art' => $validate_all_subject_art['sf9_g8_subject_qr4_art'],

            'sf9_g9_subject_qr1_art' => $validate_all_subject_art['sf9_g9_subject_qr1_art'],
            'sf9_g9_subject_qr2_art' => $validate_all_subject_art['sf9_g9_subject_qr2_art'],
            'sf9_g9_subject_qr3_art' => $validate_all_subject_art['sf9_g9_subject_qr3_art'],
            'sf9_g9_subject_qr4_art' => $validate_all_subject_art['sf9_g9_subject_qr4_art'],

            'sf9_g10_subject_qr1_art' => $validate_all_subject_art['sf9_g10_subject_qr1_art'],
            'sf9_g10_subject_qr2_art' => $validate_all_subject_art['sf9_g10_subject_qr2_art'],
            'sf9_g10_subject_qr3_art' => $validate_all_subject_art['sf9_g10_subject_qr3_art'],
            'sf9_g10_subject_qr4_art' => $validate_all_subject_art['sf9_g10_subject_qr4_art'],

            'sf10_g7_subject_qr1_art' => $validate_all_subject_art['sf10_g7_subject_qr1_art'],
            'sf10_g7_subject_qr2_art' => $validate_all_subject_art['sf10_g7_subject_qr2_art'],
            'sf10_g7_subject_qr3_art' => $validate_all_subject_art['sf10_g7_subject_qr3_art'],
            'sf10_g7_subject_qr4_art' => $validate_all_subject_art['sf10_g7_subject_qr4_art'],
            //'sf10_g7_subject_rem_art' => $validate_all_subject_art['sf10_g7_subject_rem_art'],

            'sf10_g8_subject_qr1_art' => $validate_all_subject_art['sf10_g8_subject_qr1_art'],
            'sf10_g8_subject_qr2_art' => $validate_all_subject_art['sf10_g8_subject_qr2_art'],
            'sf10_g8_subject_qr3_art' => $validate_all_subject_art['sf10_g8_subject_qr3_art'],
            'sf10_g8_subject_qr4_art' => $validate_all_subject_art['sf10_g8_subject_qr4_art'],
            //'sf10_g8_subject_rem_art' => $validate_all_subject_art['sf10_g8_subject_rem_art'],

            'sf10_g9_subject_qr1_art' => $validate_all_subject_art['sf10_g9_subject_qr1_art'],
            'sf10_g9_subject_qr2_art' => $validate_all_subject_art['sf10_g9_subject_qr2_art'],
            'sf10_g9_subject_qr3_art' => $validate_all_subject_art['sf10_g9_subject_qr3_art'],
            'sf10_g9_subject_qr4_art' => $validate_all_subject_art['sf10_g9_subject_qr4_art'],
            //'sf10_g9_subject_rem_art' => $validate_all_subject_art['sf10_g9_subject_rem_art'],

            'sf10_g10_subject_qr1_art' => $validate_all_subject_art['sf10_g10_subject_qr1_art'],
            'sf10_g10_subject_qr2_art' => $validate_all_subject_art['sf10_g10_subject_qr2_art'],
            'sf10_g10_subject_qr3_art' => $validate_all_subject_art['sf10_g10_subject_qr3_art'],
            'sf10_g10_subject_qr4_art' => $validate_all_subject_art['sf10_g10_subject_qr4_art'],
            //'sf10_g10_subject_rem_art' => $validate_all_subject_art['sf10_g10_subject_rem_art'],
        ]);

        // All: Subject -> physical education
        $validate_all_subject_pe = request()->validate([
            'sf9_g7_subject_qr1_pe' => 'nullable',
            'sf9_g7_subject_qr2_pe' => 'nullable',
            'sf9_g7_subject_qr3_pe' => 'nullable',
            'sf9_g7_subject_qr4_pe' => 'nullable',

            'sf9_g8_subject_qr1_pe' => 'nullable',
            'sf9_g8_subject_qr2_pe' => 'nullable',
            'sf9_g8_subject_qr3_pe' => 'nullable',
            'sf9_g8_subject_qr4_pe' => 'nullable',

            'sf9_g9_subject_qr1_pe' => 'nullable',
            'sf9_g9_subject_qr2_pe' => 'nullable',
            'sf9_g9_subject_qr3_pe' => 'nullable',
            'sf9_g9_subject_qr4_pe' => 'nullable',

            'sf9_g10_subject_qr1_pe' => 'nullable',
            'sf9_g10_subject_qr2_pe' => 'nullable',
            'sf9_g10_subject_qr3_pe' => 'nullable',
            'sf9_g10_subject_qr4_pe' => 'nullable',

            'sf10_g7_subject_qr1_pe' => 'nullable',
            'sf10_g7_subject_qr2_pe' => 'nullable',
            'sf10_g7_subject_qr3_pe' => 'nullable',
            'sf10_g7_subject_qr4_pe' => 'nullable',
            //'sf10_g7_subject_rem_pe' => 'nullable',

            'sf10_g8_subject_qr1_pe' => 'nullable',
            'sf10_g8_subject_qr2_pe' => 'nullable',
            'sf10_g8_subject_qr3_pe' => 'nullable',
            'sf10_g8_subject_qr4_pe' => 'nullable',
            //'sf10_g8_subject_rem_pe' => 'nullable',

            'sf10_g9_subject_qr1_pe' => 'nullable',
            'sf10_g9_subject_qr2_pe' => 'nullable',
            'sf10_g9_subject_qr3_pe' => 'nullable',
            'sf10_g9_subject_qr4_pe' => 'nullable',
            //'sf10_g9_subject_rem_pe' => 'nullable',

            'sf10_g10_subject_qr1_pe' => 'nullable',
            'sf10_g10_subject_qr2_pe' => 'nullable',
            'sf10_g10_subject_qr3_pe' => 'nullable',
            'sf10_g10_subject_qr4_pe' => 'nullable',
            //'sf10_g10_subject_rem_pe' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_pe' => $validate_all_subject_pe['sf9_g7_subject_qr1_pe'],
            'sf9_g7_subject_qr2_pe' => $validate_all_subject_pe['sf9_g7_subject_qr2_pe'],
            'sf9_g7_subject_qr3_pe' => $validate_all_subject_pe['sf9_g7_subject_qr3_pe'],
            'sf9_g7_subject_qr4_pe' => $validate_all_subject_pe['sf9_g7_subject_qr4_pe'],

            'sf9_g8_subject_qr1_pe' => $validate_all_subject_pe['sf9_g8_subject_qr1_pe'],
            'sf9_g8_subject_qr2_pe' => $validate_all_subject_pe['sf9_g8_subject_qr2_pe'],
            'sf9_g8_subject_qr3_pe' => $validate_all_subject_pe['sf9_g8_subject_qr3_pe'],
            'sf9_g8_subject_qr4_pe' => $validate_all_subject_pe['sf9_g8_subject_qr4_pe'],

            'sf9_g9_subject_qr1_pe' => $validate_all_subject_pe['sf9_g9_subject_qr1_pe'],
            'sf9_g9_subject_qr2_pe' => $validate_all_subject_pe['sf9_g9_subject_qr2_pe'],
            'sf9_g9_subject_qr3_pe' => $validate_all_subject_pe['sf9_g9_subject_qr3_pe'],
            'sf9_g9_subject_qr4_pe' => $validate_all_subject_pe['sf9_g9_subject_qr4_pe'],

            'sf9_g10_subject_qr1_pe' => $validate_all_subject_pe['sf9_g10_subject_qr1_pe'],
            'sf9_g10_subject_qr2_pe' => $validate_all_subject_pe['sf9_g10_subject_qr2_pe'],
            'sf9_g10_subject_qr3_pe' => $validate_all_subject_pe['sf9_g10_subject_qr3_pe'],
            'sf9_g10_subject_qr4_pe' => $validate_all_subject_pe['sf9_g10_subject_qr4_pe'],

            'sf10_g7_subject_qr1_pe' => $validate_all_subject_pe['sf10_g7_subject_qr1_pe'],
            'sf10_g7_subject_qr2_pe' => $validate_all_subject_pe['sf10_g7_subject_qr2_pe'],
            'sf10_g7_subject_qr3_pe' => $validate_all_subject_pe['sf10_g7_subject_qr3_pe'],
            'sf10_g7_subject_qr4_pe' => $validate_all_subject_pe['sf10_g7_subject_qr4_pe'],
            //'sf10_g7_subject_rem_pe' => $validate_all_subject_pe['sf10_g7_subject_rem_pe'],

            'sf10_g8_subject_qr1_pe' => $validate_all_subject_pe['sf10_g8_subject_qr1_pe'],
            'sf10_g8_subject_qr2_pe' => $validate_all_subject_pe['sf10_g8_subject_qr2_pe'],
            'sf10_g8_subject_qr3_pe' => $validate_all_subject_pe['sf10_g8_subject_qr3_pe'],
            'sf10_g8_subject_qr4_pe' => $validate_all_subject_pe['sf10_g8_subject_qr4_pe'],
            //'sf10_g8_subject_rem_pe' => $validate_all_subject_pe['sf10_g8_subject_rem_pe'],

            'sf10_g9_subject_qr1_pe' => $validate_all_subject_pe['sf10_g9_subject_qr1_pe'],
            'sf10_g9_subject_qr2_pe' => $validate_all_subject_pe['sf10_g9_subject_qr2_pe'],
            'sf10_g9_subject_qr3_pe' => $validate_all_subject_pe['sf10_g9_subject_qr3_pe'],
            'sf10_g9_subject_qr4_pe' => $validate_all_subject_pe['sf10_g9_subject_qr4_pe'],
            //'sf10_g9_subject_rem_pe' => $validate_all_subject_pe['sf10_g9_subject_rem_pe'],

            'sf10_g10_subject_qr1_pe' => $validate_all_subject_pe['sf10_g10_subject_qr1_pe'],
            'sf10_g10_subject_qr2_pe' => $validate_all_subject_pe['sf10_g10_subject_qr2_pe'],
            'sf10_g10_subject_qr3_pe' => $validate_all_subject_pe['sf10_g10_subject_qr3_pe'],
            'sf10_g10_subject_qr4_pe' => $validate_all_subject_pe['sf10_g10_subject_qr4_pe'],
            //'sf10_g10_subject_rem_pe' => $validate_all_subject_pe['sf10_g10_subject_rem_pe'],
        ]);

        // All: Subject -> health
        $validate_all_subject_hp = request()->validate([
            'sf9_g7_subject_qr1_hp' => 'nullable',
            'sf9_g7_subject_qr2_hp' => 'nullable',
            'sf9_g7_subject_qr3_hp' => 'nullable',
            'sf9_g7_subject_qr4_hp' => 'nullable',

            'sf9_g8_subject_qr1_hp' => 'nullable',
            'sf9_g8_subject_qr2_hp' => 'nullable',
            'sf9_g8_subject_qr3_hp' => 'nullable',
            'sf9_g8_subject_qr4_hp' => 'nullable',

            'sf9_g9_subject_qr1_hp' => 'nullable',
            'sf9_g9_subject_qr2_hp' => 'nullable',
            'sf9_g9_subject_qr3_hp' => 'nullable',
            'sf9_g9_subject_qr4_hp' => 'nullable',

            'sf9_g10_subject_qr1_hp' => 'nullable',
            'sf9_g10_subject_qr2_hp' => 'nullable',
            'sf9_g10_subject_qr3_hp' => 'nullable',
            'sf9_g10_subject_qr4_hp' => 'nullable',

            'sf10_g7_subject_qr1_hp' => 'nullable',
            'sf10_g7_subject_qr2_hp' => 'nullable',
            'sf10_g7_subject_qr3_hp' => 'nullable',
            'sf10_g7_subject_qr4_hp' => 'nullable',
            //'sf10_g7_subject_rem_hp' => 'nullable',

            'sf10_g8_subject_qr1_hp' => 'nullable',
            'sf10_g8_subject_qr2_hp' => 'nullable',
            'sf10_g8_subject_qr3_hp' => 'nullable',
            'sf10_g8_subject_qr4_hp' => 'nullable',
            //'sf10_g8_subject_rem_hp' => 'nullable',

            'sf10_g9_subject_qr1_hp' => 'nullable',
            'sf10_g9_subject_qr2_hp' => 'nullable',
            'sf10_g9_subject_qr3_hp' => 'nullable',
            'sf10_g9_subject_qr4_hp' => 'nullable',
            //'sf10_g9_subject_rem_hp' => 'nullable',

            'sf10_g10_subject_qr1_hp' => 'nullable',
            'sf10_g10_subject_qr2_hp' => 'nullable',
            'sf10_g10_subject_qr3_hp' => 'nullable',
            'sf10_g10_subject_qr4_hp' => 'nullable',
            //'sf10_g10_subject_rem_hp' => 'nullable',
        ]);

        $student->update([
            'sf9_g7_subject_qr1_hp' => $validate_all_subject_hp['sf9_g7_subject_qr1_hp'],
            'sf9_g7_subject_qr2_hp' => $validate_all_subject_hp['sf9_g7_subject_qr2_hp'],
            'sf9_g7_subject_qr3_hp' => $validate_all_subject_hp['sf9_g7_subject_qr3_hp'],
            'sf9_g7_subject_qr4_hp' => $validate_all_subject_hp['sf9_g7_subject_qr4_hp'],

            'sf9_g8_subject_qr1_hp' => $validate_all_subject_hp['sf9_g8_subject_qr1_hp'],
            'sf9_g8_subject_qr2_hp' => $validate_all_subject_hp['sf9_g8_subject_qr2_hp'],
            'sf9_g8_subject_qr3_hp' => $validate_all_subject_hp['sf9_g8_subject_qr3_hp'],
            'sf9_g8_subject_qr4_hp' => $validate_all_subject_hp['sf9_g8_subject_qr4_hp'],

            'sf9_g9_subject_qr1_hp' => $validate_all_subject_hp['sf9_g9_subject_qr1_hp'],
            'sf9_g9_subject_qr2_hp' => $validate_all_subject_hp['sf9_g9_subject_qr2_hp'],
            'sf9_g9_subject_qr3_hp' => $validate_all_subject_hp['sf9_g9_subject_qr3_hp'],
            'sf9_g9_subject_qr4_hp' => $validate_all_subject_hp['sf9_g9_subject_qr4_hp'],

            'sf9_g10_subject_qr1_hp' => $validate_all_subject_hp['sf9_g10_subject_qr1_hp'],
            'sf9_g10_subject_qr2_hp' => $validate_all_subject_hp['sf9_g10_subject_qr2_hp'],
            'sf9_g10_subject_qr3_hp' => $validate_all_subject_hp['sf9_g10_subject_qr3_hp'],
            'sf9_g10_subject_qr4_hp' => $validate_all_subject_hp['sf9_g10_subject_qr4_hp'],

            'sf10_g7_subject_qr1_hp' => $validate_all_subject_hp['sf10_g7_subject_qr1_hp'],
            'sf10_g7_subject_qr2_hp' => $validate_all_subject_hp['sf10_g7_subject_qr2_hp'],
            'sf10_g7_subject_qr3_hp' => $validate_all_subject_hp['sf10_g7_subject_qr3_hp'],
            'sf10_g7_subject_qr4_hp' => $validate_all_subject_hp['sf10_g7_subject_qr4_hp'],
            //'sf10_g7_subject_rem_hp' => $validate_all_subject_hp['sf10_g7_subject_rem_hp'],

            'sf10_g8_subject_qr1_hp' => $validate_all_subject_hp['sf10_g8_subject_qr1_hp'],
            'sf10_g8_subject_qr2_hp' => $validate_all_subject_hp['sf10_g8_subject_qr2_hp'],
            'sf10_g8_subject_qr3_hp' => $validate_all_subject_hp['sf10_g8_subject_qr3_hp'],
            'sf10_g8_subject_qr4_hp' => $validate_all_subject_hp['sf10_g8_subject_qr4_hp'],
            //'sf10_g8_subject_rem_hp' => $validate_all_subject_hp['sf10_g8_subject_rem_hp'],

            'sf10_g9_subject_qr1_hp' => $validate_all_subject_hp['sf10_g9_subject_qr1_hp'],
            'sf10_g9_subject_qr2_hp' => $validate_all_subject_hp['sf10_g9_subject_qr2_hp'],
            'sf10_g9_subject_qr3_hp' => $validate_all_subject_hp['sf10_g9_subject_qr3_hp'],
            'sf10_g9_subject_qr4_hp' => $validate_all_subject_hp['sf10_g9_subject_qr4_hp'],
            //'sf10_g9_subject_rem_hp' => $validate_all_subject_hp['sf10_g9_subject_rem_hp'],

            'sf10_g10_subject_qr1_hp' => $validate_all_subject_hp['sf10_g10_subject_qr1_hp'],
            'sf10_g10_subject_qr2_hp' => $validate_all_subject_hp['sf10_g10_subject_qr2_hp'],
            'sf10_g10_subject_qr3_hp' => $validate_all_subject_hp['sf10_g10_subject_qr3_hp'],
            'sf10_g10_subject_qr4_hp' => $validate_all_subject_hp['sf10_g10_subject_qr4_hp'],
            //'sf10_g10_subject_rem_hp' => $validate_all_subject_hp['sf10_g10_subject_rem_hp'],
        ]);

        // Redirect
        return redirect()->to('/students/edit/form/'.$id);
    }

    // [Clean] Delete (GET)
    public function delete_1 ($id) {
        $student = Student::find($id);

        return view('pages.students.delete')->with('student', $student);
    }

    // [Clean] Delete (POST)
    public function delete_2 ($id) {
        Student::find($id)->delete();

        return redirect()->to('/students');
    }
}