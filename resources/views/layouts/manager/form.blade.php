<form action = "{{ url('/manager/save', ['id' => $student->id]) }}" method = "POST">
    
    @include('layouts.general.errors')
    @csrf

    <div id = "form-wrapper" class = "hidden">

        <!-- Header -->
        <div id = "form-close">X</div>
        <h5 id = "form-label-title" class = "align-middle">Label A</h5>
        <h6 id = "form-label-subtitle" class = "align-middle">Label B</h6>
        <hr>

        <!-- Save -->
        <input
            id = "form-submit"
            class = "hidden"
            type = "submit"
            value = "Save Changes"
            data-label-title = "Confirm"
            data-label-subtitle = "Save all changes?"
        >
        
        <!-- DO-NOT-TOUCH: Info -->
        <div>
            <input
                name = "info_name_last"
                id = "info_name_last"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->info_name_last }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Last Name"

                data-required = "true"
                required
            >
            <input
                name = "info_name_first"
                id = "info_name_first"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->info_name_first }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "First Name"

                data-required = "true"
                required
            >
            <input
                name = "info_name_middle"
                id = "info_name_middle"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->info_name_middle }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Middle Name"

                data-required = "true"
                required
            >
            <input
                name = "info_lrn"
                id = "info_lrn"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->info_lrn }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Learner Reference Number"
                
                data-required = "true"
                required
            >
            <select
                name = "info_sex"
                id = "info_sex"
                class = "hidden"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Sex"
            >
                <option value = "Male" {{ $student->info_sex === "Male" ? "selected" : "" }}>Male</option>
                <option value = "Female" {{ $student->info_sex === "Female" ? "selected" : "" }}>Female</option>
            </select>
            <input
                name = "info_birthdate"
                id = "info_birthdate"
                class = "hidden"

                type = "date"
                value = "{{ $student->info_birthdate }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Birthdate"

                data-required = "true"
                required
            >
        </div>

        <!-- DO-NOT-TOUCH: Enrollment -->
        <div>
            <input
                name = "enrollment_elementary_boolean"
                id = "enrollment_elementary_boolean"
                class = "hidden"

                type = "checkbox"
                {{  $student->enrollment_elementary_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_elementary_average"
                id = "enrollment_elementary_average"
                class = "hidden"

                type = "number"
                min = "0"
                max = "100"
                value = "{{ $student->enrollment_elementary_average }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "General Average"
            >
            <input
                name = "enrollment_elementary_citation"
                id = "enrollment_elementary_citation"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->enrollment_elementary_citation }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Citation"
            >
            <input
                name = "enrollment_elementary_name"
                id = "enrollment_elementary_name"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->enrollment_elementary_name }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Name Of Elementary School"
            >
            <input
                name = "enrollment_elementary_id"
                id = "enrollment_elementary_id"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->enrollment_elementary_id }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "School ID"
            >
            <input
                name = "enrollment_elementary_address"
                id = "enrollment_elementary_address"
                class = "hidden"
                
                type = "text"
                maxlength = "100"
                value = "{{ $student->enrollment_elementary_address }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Address Of School"
            >
            <input
                name = "enrollment_other_pept_boolean"
                id = "enrollment_other_pept_boolean"
                class = "hidden"

                type = "checkbox"
                {{  $student->enrollment_other_pept_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_other_pept_rating"
                id = "enrollment_other_pept_rating"
                class = "hidden"

                type = "number"
                min = "0"
                max = "100"
                value = "{{ $student->enrollment_other_pept_rating }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "PEPT Rating"
            >
            <input
                name = "enrollment_other_alsae_boolean"
                id = "enrollment_other_alsae_boolean"
                class = "hidden"

                type = "checkbox"
                {{  $student->enrollment_other_alsae_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_other_alsae_rating"
                id = "enrollment_other_alsae_rating"
                class = "hidden"

                type = "number"
                min = "0"
                max = "100"
                value = "{{ $student->enrollment_other_alsae_rating }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "ALS A&E Rating"
            >
            <input
                name = "enrollment_other_specify_boolean"
                id = "enrollment_other_specify_boolean"
                class = "hidden"

                type = "checkbox"
                {{  $student->enrollment_other_specify_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_other_specify_label"
                id = "enrollment_other_specify_label"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->enrollment_other_specify_label }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Specific Passer And Rating"
            >
            <input
                name = "enrollment_other_date"
                id = "enrollment_other_date"
                class = "hidden"

                type = "date"
                value = "{{ $student->enrollment_other_date }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Date Of Examination / Assessment"
            >
            <input
                name = "enrollment_other_location"
                id = "enrollment_other_location"
                class = "hidden"

                type = "text"
                maxlength = "100"
                value = "{{ $student->enrollment_other_location }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Name And Address Of Testing Center"
            >
        </div>

        @for ($grade = 7; $grade <= 10; $grade++)
            <!-- DO-NOT-TOUCH: Record -->
            <div>
                <input
                    name = "record_g{{ $grade }}_school_name"
                    id = "record_g{{ $grade }}_school_name"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_name'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "School"
                >
                <input
                    name = "record_g{{ $grade }}_school_id"
                    id = "record_g{{ $grade }}_school_id"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_id'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "School ID"
                >
                <input
                    name = "record_g{{ $grade }}_school_district"
                    id = "record_g{{ $grade }}_school_district"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_district'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "District"
                >
                <input
                    name = "record_g{{ $grade }}_school_division"
                    id = "record_g{{ $grade }}_school_division"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_division'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Division"
                >
                <input
                    name = "record_g{{ $grade }}_school_region"
                    id = "record_g{{ $grade }}_school_region"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_region'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Region"
                >
                <input
                    name = "record_g{{ $grade }}_school_grade"
                    id = "record_g{{ $grade }}_school_grade"
                    class = "hidden"
                    
                    type = "number"
                    min = "7"
                    max = "10"
                    value = "{{ $student->{'record_g'.$grade.'_school_grade'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Classified As Grade"
                >
                <input
                    name = "record_g{{ $grade }}_school_section"
                    id = "record_g{{ $grade }}_school_section"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_section'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Section"
                >
                <input
                    name = "record_g{{ $grade }}_school_year"
                    id = "record_g{{ $grade }}_school_year"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_year'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "School Year"
                >
                <input
                    name = "record_g{{ $grade }}_school_teacher"
                    id = "record_g{{ $grade }}_school_teacher"
                    class = "hidden"

                    type = "text"
                    maxlength = "100"
                    value = "{{ $student->{'record_g'.$grade.'_school_teacher'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Name Of Adviser / Teacher"
                >
                <input
                    name = "record_g{{ $grade }}_remedial_date_start"
                    id = "record_g{{ $grade }}_remedial_date_start"
                    class = "hidden"

                    type = "date"
                    value = "{{ $student->{'record_g'.$grade.'_remedial_date_start'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Remedial Start Date"
                >
                <input
                    name = "record_g{{ $grade }}_remedial_date_end"
                    id = "record_g{{ $grade }}_remedial_date_end"
                    class = "hidden"

                    type = "date"
                    value = "{{ $student->{'record_g'.$grade.'_remedial_date_end'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Remedial End Date"
                >
            </div>

            <!-- DO-NOT-TOUCH: Report -->
            <div>
                <input
                    name = "report_g{{ $grade }}_age"
                    id = "report_g{{ $grade }}_age"
                    class = "hidden"

                    type = "number"
                    min = "0"
                    max = "1000"
                    value = "{{ $student->{'report_g'.$grade.'_age'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "Age"
                >
            </div>

            <!-- Finalized: Subject -> filipino -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_fil_qr1"
                    id = "subject_g{{ $grade }}_fil_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_qr2"
                    id = "subject_g{{ $grade }}_fil_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_qr3"
                    id = "subject_g{{ $grade }}_fil_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_qr4"
                    id = "subject_g{{ $grade }}_fil_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_rem"
                    id = "subject_g{{ $grade }}_fil_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> english -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_eng_qr1"
                    id = "subject_g{{ $grade }}_eng_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_qr2"
                    id = "subject_g{{ $grade }}_eng_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_qr3"
                    id = "subject_g{{ $grade }}_eng_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_qr4"
                    id = "subject_g{{ $grade }}_eng_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_rem"
                    id = "subject_g{{ $grade }}_eng_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Finalized: Subject -> mathematics -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_mat_qr1"
                    id = "subject_g{{ $grade }}_mat_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_qr2"
                    id = "subject_g{{ $grade }}_mat_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_qr3"
                    id = "subject_g{{ $grade }}_mat_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_qr4"
                    id = "subject_g{{ $grade }}_mat_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_rem"
                    id = "subject_g{{ $grade }}_mat_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Finalized: Subject -> science -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_sci_qr1"
                    id = "subject_g{{ $grade }}_sci_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_qr2"
                    id = "subject_g{{ $grade }}_sci_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_qr3"
                    id = "subject_g{{ $grade }}_sci_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_qr4"
                    id = "subject_g{{ $grade }}_sci_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_rem"
                    id = "subject_g{{ $grade }}_sci_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> araling panlipunan (ap) -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_ap_qr1"
                    id = "subject_g{{ $grade }}_ap_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_qr2"
                    id = "subject_g{{ $grade }}_ap_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_qr3"
                    id = "subject_g{{ $grade }}_ap_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_qr4"
                    id = "subject_g{{ $grade }}_ap_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_rem"
                    id = "subject_g{{ $grade }}_ap_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> edukasyon sa pagpapakatao (ep) -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_ep_qr1"
                    id = "subject_g{{ $grade }}_ep_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_qr2"
                    id = "subject_g{{ $grade }}_ep_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_qr3"
                    id = "subject_g{{ $grade }}_ep_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_qr4"
                    id = "subject_g{{ $grade }}_ep_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_rem"
                    id = "subject_g{{ $grade }}_ep_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> technology and livelihood education (tle) -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_tle_qr1"
                    id = "subject_g{{ $grade }}_tle_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_qr2" 
                    id = "subject_g{{ $grade }}_tle_qr2" 
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_qr3"
                    id = "subject_g{{ $grade }}_tle_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_qr4"
                    id = "subject_g{{ $grade }}_tle_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_rem"
                    id = "subject_g{{ $grade }}_tle_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> music -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_mus_qr1"
                    id = "subject_g{{ $grade }}_mus_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_qr2"
                    id = "subject_g{{ $grade }}_mus_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_qr3"
                    id = "subject_g{{ $grade }}_mus_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_qr4"
                    id = "subject_g{{ $grade }}_mus_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_rem"
                    id = "subject_g{{ $grade }}_mus_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> arts -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_art_qr1"
                    id = "subject_g{{ $grade }}_art_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_qr2"
                    id = "subject_g{{ $grade }}_art_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_qr3"
                    id = "subject_g{{ $grade }}_art_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_qr4"
                    id = "subject_g{{ $grade }}_art_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_rem"
                    id = "subject_g{{ $grade }}_art_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_art_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> physical education -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_pe_qr1"
                    id = "subject_g{{ $grade }}_pe_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_qr2"
                    id = "subject_g{{ $grade }}_pe_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_qr3"
                    id = "subject_g{{ $grade }}_pe_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_qr4"
                    id = "subject_g{{ $grade }}_pe_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_rem"
                    id = "subject_g{{ $grade }}_pe_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Finalized: Subject -> health -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_hp_qr1"
                    id = "subject_g{{ $grade }}_hp_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_qr2"
                    id = "subject_g{{ $grade }}_hp_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_qr3"
                    id = "subject_g{{ $grade }}_hp_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_qr4"
                    id = "subject_g{{ $grade }}_hp_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_rem"
                    id = "subject_g{{ $grade }}_hp_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Attendance -> present -->
            <div>
                <input
                    name = "attendance_g{{ $grade }}_p_jan"
                    id = "attendance_g{{ $grade }}_p_jan"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_jan'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "January"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_feb"
                    id = "attendance_g{{ $grade }}_p_feb"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_feb'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "28"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "February"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_mar"
                    id = "attendance_g{{ $grade }}_p_mar"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_mar'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "March"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_apr"
                    id = "attendance_g{{ $grade }}_p_apr"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_apr'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "April"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_may"
                    id = "attendance_g{{ $grade }}_p_may"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_may'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "May"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_jun"
                    id = "attendance_g{{ $grade }}_p_jun"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_jun'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "June"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_jul"
                    id = "attendance_g{{ $grade }}_p_jul"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_jul'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "July"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_aug"
                    id = "attendance_g{{ $grade }}_p_aug"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_aug'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "August"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_sep"
                    id = "attendance_g{{ $grade }}_p_sep"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_sep'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "September"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_oct"
                    id = "attendance_g{{ $grade }}_p_oct"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_oct'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "October"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_nov"
                    id = "attendance_g{{ $grade }}_p_nov"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_nov'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "November"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_dec"
                    id = "attendance_g{{ $grade }}_p_dec"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_dec'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "December"
                >
            </div>
            
            <!-- Attendance -> absent -->
            <div>
                <input
                    name = "attendance_g{{ $grade }}_a_jan"
                    id = "attendance_g{{ $grade }}_a_jan"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_jan'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "January"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_feb"
                    id = "attendance_g{{ $grade }}_a_feb"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_feb'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "28"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "February"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_mar"
                    id = "attendance_g{{ $grade }}_a_mar"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_mar'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "March"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_apr"
                    id = "attendance_g{{ $grade }}_a_apr"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_apr'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "April"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_may"
                    id = "attendance_g{{ $grade }}_a_may"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_may'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "May"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_jun"
                    id = "attendance_g{{ $grade }}_a_jun"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_jun'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "June"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_jul"
                    id = "attendance_g{{ $grade }}_a_jul"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_jul'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "July"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_aug"
                    id = "attendance_g{{ $grade }}_a_aug"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_aug'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "August"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_sep"
                    id = "attendance_g{{ $grade }}_a_sep"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_sep'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "September"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_oct"
                    id = "attendance_g{{ $grade }}_a_oct"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_oct'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "October"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_nov"
                    id = "attendance_g{{ $grade }}_a_nov"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_nov'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "November"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_dec"
                    id = "attendance_g{{ $grade }}_a_dec"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_dec'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "December"
                >
            </div>
            
            <!-- RECHECK HAS EXTRA SPACES             Values -> maka - diyos -->
            <div>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr1"
                    id = "values_g{{ $grade }}_md_s1_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr2"
                    id = "values_g{{ $grade }}_md_s1_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr3"
                    id = "values_g{{ $grade }}_md_s1_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr4"
                    id = "values_g{{ $grade }}_md_s1_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr1"
                    id = "values_g{{ $grade }}_md_s2_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr2"
                    id = "values_g{{ $grade }}_md_s2_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr3"
                    id = "values_g{{ $grade }}_md_s2_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr4"
                    id = "values_g{{ $grade }}_md_s2_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_md_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_md_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_md_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_md_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_md_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Values -> maka - tao -->
            <div>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr1"
                    id = "values_g{{ $grade }}_mt_s1_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr2"
                    id = "values_g{{ $grade }}_mt_s1_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr3"
                    id = "values_g{{ $grade }}_mt_s1_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr4"
                    id = "values_g{{ $grade }}_mt_s1_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr1"
                    id = "values_g{{ $grade }}_mt_s2_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr2"
                    id = "values_g{{ $grade }}_mt_s2_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr3"
                    id = "values_g{{ $grade }}_mt_s2_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr4"
                    id = "values_g{{ $grade }}_mt_s2_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mt_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mt_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mt_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mt_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mt_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Values -> maka - kalikasan -->
            <div>
                <select
                    name = "values_g{{ $grade }}_mk_qr1"
                    id = "values_g{{ $grade }}_mk_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mk_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mk_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mk_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mk_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mk_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mk_qr2"
                    id = "values_g{{ $grade }}_mk_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mk_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mk_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mk_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mk_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mk_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mk_qr3"
                    id = "values_g{{ $grade }}_mk_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mk_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mk_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mk_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mk_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mk_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mk_qr4"
                    id = "values_g{{ $grade }}_mk_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mk_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mk_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mk_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mk_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mk_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Values -> maka - bansa -->
            <div>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr1"
                    id = "values_g{{ $grade }}_mb_s1_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr2"
                    id = "values_g{{ $grade }}_mb_s1_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr3"
                    id = "values_g{{ $grade }}_mb_s1_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr4"
                    id = "values_g{{ $grade }}_mb_s1_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr1"
                    id = "values_g{{ $grade }}_mb_s2_qr1"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr2"
                    id = "values_g{{ $grade }}_mb_s2_qr2"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr3"
                    id = "values_g{{ $grade }}_mb_s2_qr3"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr4"
                    id = "values_g{{ $grade }}_mb_s2_qr4"
                    class = "hidden"
                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$grade.'_mb_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$grade.'_mb_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$grade.'_mb_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$grade.'_mb_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$grade.'_mb_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
        @endfor
        
    </div>
</form>