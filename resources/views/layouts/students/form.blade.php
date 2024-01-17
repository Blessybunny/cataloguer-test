<form action = "{{ url('/students/save', ['id' => $student->id]) }}" method = "POST">
    
    @include('layouts.general.errors')
    @csrf

    <div id = "form-wrapper" class = "display-none">

        <!-- Header -->
        <div id = "form-close">X</div>
        <h5 id = "form-label-title" class = "align-middle">Label A</h5>
        <h6 id = "form-label-subtitle" class = "align-middle">Label B</h6>
        <hr>

        <!-- Save -->
        <input
            id = "form-submit"
            class = "display-none"
            type = "submit"
            value = "Save Changes"
            data-label-title = "Confirm"
            data-label-subtitle = "Save all changes?"
        >
        
        <!-- Fixed-pass-1: [01 - ALL] Info -->
        <div>
            <input
                name = "info_name_last"
                id = "info_name_last"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->info_name_last }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Last Name"

                data-required = "true"
                required
            >
            <input
                name = "info_name_first"
                id = "info_name_first"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->info_name_first }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "First Name"

                data-required = "true"
                required
            >
            <input
                name = "info_name_suffix"
                id = "info_name_suffix"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->info_name_suffix }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Suffix"
            >
            <input
                name = "info_name_middle"
                id = "info_name_middle"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->info_name_middle }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Middle Name"

                data-required = "true"
                required
            >
            <input
                name = "info_lrn"
                id = "info_lrn"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->info_lrn }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Learner Reference Number"
                
                data-required = "true"
                required
            >
            <select
                name = "info_sex"
                id = "info_sex"
                class = "display-none"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Sex"
            >
                <option value = "Male" {{ $student->info_sex === "Male" ? "selected" : "" }}>Male</option>
                <option value = "Female" {{ $student->info_sex === "Female" ? "selected" : "" }}>Female</option>
            </select>
            <input
                name = "info_birthdate"
                id = "info_birthdate"
                class = "display-none"

                type = "date"
                value = "{{ $student->info_birthdate }}"

                data-label-title = "Learner's Information"
                data-label-subtitle = "Birthdate"

                data-required = "true"
                required
            >
        </div>

        <!-- Fixed-pass-1: [09 - SF10] Enrollment -->
        <div>
            <input
                name = "enrollment_elementary_boolean"
                id = "enrollment_elementary_boolean"
                class = "display-none"

                type = "checkbox"
                {{  $student->enrollment_elementary_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_elementary_average"
                id = "enrollment_elementary_average"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_elementary_average }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "General Average"
            >
            <input
                name = "enrollment_elementary_citation"
                id = "enrollment_elementary_citation"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_elementary_citation }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Citation"
            >
            <input
                name = "enrollment_elementary_name"
                id = "enrollment_elementary_name"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_elementary_name }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Name Of Elementary School"
            >
            <input
                name = "enrollment_elementary_id"
                id = "enrollment_elementary_id"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_elementary_id }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "School ID"
            >
            <input
                name = "enrollment_elementary_address"
                id = "enrollment_elementary_address"
                class = "display-none"
                
                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_elementary_address }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Address Of School"
            >
            <input
                name = "enrollment_other_pept_boolean"
                id = "enrollment_other_pept_boolean"
                class = "display-none"

                type = "checkbox"
                {{  $student->enrollment_other_pept_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_other_pept_rating"
                id = "enrollment_other_pept_rating"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_other_pept_rating }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "PEPT Rating"
            >
            <input
                name = "enrollment_other_alsae_boolean"
                id = "enrollment_other_alsae_boolean"
                class = "display-none"

                type = "checkbox"
                {{  $student->enrollment_other_alsae_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_other_alsae_rating"
                id = "enrollment_other_alsae_rating"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_other_alsae_rating }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "ALS A&E Rating"
            >
            <input
                name = "enrollment_other_specify_boolean"
                id = "enrollment_other_specify_boolean"
                class = "display-none"

                type = "checkbox"
                {{  $student->enrollment_other_specify_boolean === 1 ? "checked" : "" }}
            >
            <input
                name = "enrollment_other_specify_rating"
                id = "enrollment_other_specify_rating"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_other_specify_rating }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Specific Passer And Rating"
            >
            <input
                name = "enrollment_other_date"
                id = "enrollment_other_date"
                class = "display-none"

                type = "date"
                value = "{{ $student->enrollment_other_date }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Date Of Examination / Assessment"
            >
            <input
                name = "enrollment_other_location"
                id = "enrollment_other_location"
                class = "display-none"

                type = "text"
                maxlength = "50"
                value = "{{ $student->enrollment_other_location }}"

                data-label-title = "Eligibility For JHS Enrollment"
                data-label-subtitle = "Name And Address Of Testing Center"
            >
        </div>

        @for ($grade = 7; $grade <= 10; $grade++)
            <!-- Fixed-pass-1: [02 - SF9] Report -->
            <div>
                <input
                    name = "report_g{{ $grade }}_age"
                    id = "report_g{{ $grade }}_age"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_age'} }}"

                    data-label-title = "Learner's Information"
                    data-label-subtitle = "Age"
                >
                <input
                    name = "report_g{{ $grade }}_section"
                    id = "report_g{{ $grade }}_section"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_section'} }}"

                    data-label-title = "Learner's Information"
                    data-label-subtitle = "Section"
                >
                <input
                    name = "report_g{{ $grade }}_year"
                    id = "report_g{{ $grade }}_year"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_year'} }}"

                    data-label-title = "Learner's Information"
                    data-label-subtitle = "School Year"
                >
                <input
                    name = "report_g{{ $grade }}_principal"
                    id = "report_g{{ $grade }}_principal"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_principal'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "OIC - Office Of The Principal"
                >
                <input
                    name = "report_g{{ $grade }}_adviser"
                    id = "report_g{{ $grade }}_adviser"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_adviser'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "Adviser"
                >
                <input
                    name = "report_g{{ $grade }}_transfer_input_1"
                    id = "report_g{{ $grade }}_transfer_input_1"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_transfer_input_1'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "Certificate Of Transfer - Admitted To"
                >
                <input
                    name = "report_g{{ $grade }}_transfer_input_2"
                    id = "report_g{{ $grade }}_transfer_input_2"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_transfer_input_2'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "Certificate Of Transfer - Eligibility For Admission To"
                >
                <input
                    name = "report_g{{ $grade }}_transfer_input_3"
                    id = "report_g{{ $grade }}_transfer_input_3"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'report_g'.$grade.'_transfer_input_3'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "Cancellation Of Eligibility To Transfer - Admitted To"
                >
                <input
                    name = "report_g{{ $grade }}_transfer_input_date"
                    id = "report_g{{ $grade }}_transfer_input_date"
                    class = "display-none"

                    type = "date"
                    value = "{{ $student->{'report_g'.$grade.'_transfer_input_date'} }}"

                    data-label-title = "Report Card"
                    data-label-subtitle = "Cancellation Of Eligibility To Transfer - Date"
                >
            </div>

            <!-- Fixed-pass-1: [03 - SF9] Attendance -> present -->
            <div>
                <input
                    name = "attendance_g{{ $grade }}_p_jan"
                    id = "attendance_g{{ $grade }}_p_jan"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_jan'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "January"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_feb"
                    id = "attendance_g{{ $grade }}_p_feb"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "28"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_feb'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "February"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_mar"
                    id = "attendance_g{{ $grade }}_p_mar"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_mar'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "March"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_apr"
                    id = "attendance_g{{ $grade }}_p_apr"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_apr'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "April"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_may"
                    id = "attendance_g{{ $grade }}_p_may"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_may'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "May"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_jun"
                    id = "attendance_g{{ $grade }}_p_jun"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_jun'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "June"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_jul"
                    id = "attendance_g{{ $grade }}_p_jul"
                    class = "display-none"
                    
                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_jul'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "July"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_aug"
                    id = "attendance_g{{ $grade }}_p_aug"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_aug'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "August"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_sep"
                    id = "attendance_g{{ $grade }}_p_sep"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_sep'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "September"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_oct"
                    id = "attendance_g{{ $grade }}_p_oct"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_oct'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "October"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_nov"
                    id = "attendance_g{{ $grade }}_p_nov"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_nov'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "November"
                >
                <input
                    name = "attendance_g{{ $grade }}_p_dec"
                    id = "attendance_g{{ $grade }}_p_dec"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_p_dec'} }}"

                    data-label-title = "Attendance: No. of Days Present"
                    data-label-subtitle = "December"
                >
            </div>
            
            <!-- Fixed-pass-1: [04 - SF9] Attendance -> absent -->
            <div>
                <input
                    name = "attendance_g{{ $grade }}_a_jan"
                    id = "attendance_g{{ $grade }}_a_jan"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_jan'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "January"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_feb"
                    id = "attendance_g{{ $grade }}_a_feb"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "28"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_feb'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "February"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_mar"
                    id = "attendance_g{{ $grade }}_a_mar"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_mar'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "March"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_apr"
                    id = "attendance_g{{ $grade }}_a_apr"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_apr'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "April"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_may"
                    id = "attendance_g{{ $grade }}_a_may"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_may'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "May"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_jun"
                    id = "attendance_g{{ $grade }}_a_jun"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_jun'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "June"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_jul"
                    id = "attendance_g{{ $grade }}_a_jul"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_jul'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "July"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_aug"
                    id = "attendance_g{{ $grade }}_a_aug"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_aug'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "August"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_sep"
                    id = "attendance_g{{ $grade }}_a_sep"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_sep'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "September"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_oct"
                    id = "attendance_g{{ $grade }}_a_oct"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_oct'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "October"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_nov"
                    id = "attendance_g{{ $grade }}_a_nov"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "30"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_nov'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "November"
                >
                <input
                    name = "attendance_g{{ $grade }}_a_dec"
                    id = "attendance_g{{ $grade }}_a_dec"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "31"
                    value = "{{ $student->{'attendance_g'.$grade.'_a_dec'} }}"

                    data-label-title = "Attendance: No. of Days Absent"
                    data-label-subtitle = "December"
                >
            </div>

            <!-- Fixed-pass-1: [05 - SF9] Values -> maka - diyos -->
            <div>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr1"
                    id = "values_g{{ $grade }}_md_s1_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr2"
                    id = "values_g{{ $grade }}_md_s1_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr3"
                    id = "values_g{{ $grade }}_md_s1_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s1_qr4"
                    id = "values_g{{ $grade }}_md_s1_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr1"
                    id = "values_g{{ $grade }}_md_s2_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr2"
                    id = "values_g{{ $grade }}_md_s2_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr3"
                    id = "values_g{{ $grade }}_md_s2_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_md_s2_qr4"
                    id = "values_g{{ $grade }}_md_s2_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Diyos"
                    data-label-subtitle = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_md_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_md_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_md_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_md_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_md_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>

            <!-- Fixed-pass-1: [06 - SF9] Values -> maka - tao -->
            <div>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr1"
                    id = "values_g{{ $grade }}_mt_s1_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr2"
                    id = "values_g{{ $grade }}_mt_s1_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr3"
                    id = "values_g{{ $grade }}_mt_s1_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s1_qr4"
                    id = "values_g{{ $grade }}_mt_s1_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr1"
                    id = "values_g{{ $grade }}_mt_s2_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr2"
                    id = "values_g{{ $grade }}_mt_s2_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr3"
                    id = "values_g{{ $grade }}_mt_s2_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mt_s2_qr4"
                    id = "values_g{{ $grade }}_mt_s2_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Tao"
                    data-label-subtitle = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mt_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mt_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mt_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mt_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mt_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Fixed-pass-1: [07 - SF9] Values -> maka - kalikasan -->
            <div>
                <select
                    name = "values_g{{ $grade }}_mk_qr1"
                    id = "values_g{{ $grade }}_mk_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mk_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mk_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mk_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mk_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mk_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mk_qr2"
                    id = "values_g{{ $grade }}_mk_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mk_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mk_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mk_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mk_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mk_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mk_qr3"
                    id = "values_g{{ $grade }}_mk_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mk_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mk_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mk_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mk_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mk_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mk_qr4"
                    id = "values_g{{ $grade }}_mk_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Kalikasan"
                    data-label-subtitle = "4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mk_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mk_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mk_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mk_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mk_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Fixed-pass-1: [08 - SF9] Values -> maka - bansa -->
            <div>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr1"
                    id = "values_g{{ $grade }}_mb_s1_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr2"
                    id = "values_g{{ $grade }}_mb_s1_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr3"
                    id = "values_g{{ $grade }}_mb_s1_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s1_qr4"
                    id = "values_g{{ $grade }}_mb_s1_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr1"
                    id = "values_g{{ $grade }}_mb_s2_qr1"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr2"
                    id = "values_g{{ $grade }}_mb_s2_qr2"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr3"
                    id = "values_g{{ $grade }}_mb_s2_qr3"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $grade }}_mb_s2_qr4"
                    id = "values_g{{ $grade }}_mb_s2_qr4"
                    class = "display-none"

                    data-label-title = "Core Value: Maka - Bansa"
                    data-label-subtitle = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{ $student->{'values_g'.$grade.'_mb_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{ $student->{'values_g'.$grade.'_mb_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{ $student->{'values_g'.$grade.'_mb_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{ $student->{'values_g'.$grade.'_mb_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{ $student->{'values_g'.$grade.'_mb_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>

            <!-- Fixed-pass-1: [09 - SF10] Record -->
            <div>
                <input
                    name = "record_g{{ $grade }}_school_name"
                    id = "record_g{{ $grade }}_school_name"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_name'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "School"
                >
                <input
                    name = "record_g{{ $grade }}_school_id"
                    id = "record_g{{ $grade }}_school_id"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_id'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "School ID"
                >
                <input
                    name = "record_g{{ $grade }}_school_district"
                    id = "record_g{{ $grade }}_school_district"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_district'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "District"
                >
                <input
                    name = "record_g{{ $grade }}_school_division"
                    id = "record_g{{ $grade }}_school_division"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_division'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Division"
                >
                <input
                    name = "record_g{{ $grade }}_school_region"
                    id = "record_g{{ $grade }}_school_region"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_region'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Region"
                >
                <input
                    name = "record_g{{ $grade }}_school_grade"
                    id = "record_g{{ $grade }}_school_grade"
                    class = "display-none"
                    
                    type = "number"
                    min = "7"
                    max = "12"
                    value = "{{ $student->{'record_g'.$grade.'_school_grade'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Classified As Grade"
                >
                <input
                    name = "record_g{{ $grade }}_school_section"
                    id = "record_g{{ $grade }}_school_section"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_section'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Section"
                >
                <input
                    name = "record_g{{ $grade }}_school_year"
                    id = "record_g{{ $grade }}_school_year"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_year'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "School Year"
                >
                <input
                    name = "record_g{{ $grade }}_school_teacher"
                    id = "record_g{{ $grade }}_school_teacher"
                    class = "display-none"

                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'record_g'.$grade.'_school_teacher'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Name Of Adviser / Teacher"
                >
                <input
                    name = "record_g{{ $grade }}_remedial_date_start"
                    id = "record_g{{ $grade }}_remedial_date_start"
                    class = "display-none"

                    type = "date"
                    value = "{{ $student->{'record_g'.$grade.'_remedial_date_start'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Remedial Start Date"
                >
                <input
                    name = "record_g{{ $grade }}_remedial_date_end"
                    id = "record_g{{ $grade }}_remedial_date_end"
                    class = "display-none"

                    type = "date"
                    value = "{{ $student->{'record_g'.$grade.'_remedial_date_end'} }}"

                    data-label-title = "Scholastic Record"
                    data-label-subtitle = "Remedial End Date"
                >
            </div>

            <!-- Fixed-pass-1: [11 - ALL] Subject -> filipino -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_fil_qr1"
                    id = "subject_g{{ $grade }}_fil_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr1'} }}"
                    
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_qr2"
                    id = "subject_g{{ $grade }}_fil_qr2"
                    class = "display-none"
                    
                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr2'} }}"
                    
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_qr3"
                    id = "subject_g{{ $grade }}_fil_qr3"
                    class = "display-none"
                    
                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr3'} }}"
                    
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_qr4"
                    id = "subject_g{{ $grade }}_fil_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_qr4'} }}"
                    
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_fil_rem"
                    id = "subject_g{{ $grade }}_fil_rem"
                    class = "display-none"
                    
                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_fil_rem'} }}"
                    
                    data-label-title = "Learning Area: Filipino {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Fixed-pass-1: [12 - ALL] Subject -> english -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_eng_qr1"
                    id = "subject_g{{ $grade }}_eng_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr1'} }}"
                    
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_qr2"
                    id = "subject_g{{ $grade }}_eng_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr2'} }}"
                    
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_qr3"
                    id = "subject_g{{ $grade }}_eng_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr3'} }}"
                    
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_qr4"
                    id = "subject_g{{ $grade }}_eng_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_qr4'} }}"
                    
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_eng_rem"
                    id = "subject_g{{ $grade }}_eng_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_eng_rem'} }}"
                    
                    data-label-title = "Learning Area: English {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Fixed-pass-1: [13 - ALL] Subject -> mathematics -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_mat_qr1"
                    id = "subject_g{{ $grade }}_mat_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr1'} }}"
                    
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_qr2"
                    id = "subject_g{{ $grade }}_mat_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr2'} }}"
                    
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_qr3"
                    id = "subject_g{{ $grade }}_mat_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr3'} }}"
                    
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_qr4"
                    id = "subject_g{{ $grade }}_mat_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_qr4'} }}"
                    
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mat_rem"
                    id = "subject_g{{ $grade }}_mat_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mat_rem'} }}"
                    
                    data-label-title = "Learning Area: Mathematics {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Fixed-pass-1: [14 - ALL] Subject -> science -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_sci_qr1"
                    id = "subject_g{{ $grade }}_sci_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr1'} }}"
                    
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_qr2"
                    id = "subject_g{{ $grade }}_sci_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr2'} }}"
                    
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_qr3"
                    id = "subject_g{{ $grade }}_sci_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr3'} }}"
                    
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_qr4"
                    id = "subject_g{{ $grade }}_sci_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_qr4'} }}"
                    
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_sci_rem"
                    id = "subject_g{{ $grade }}_sci_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_sci_rem'} }}"
                    
                    data-label-title = "Learning Area: Science {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Fixed-pass-1: [15 - ALL] Subject -> araling panlipunan (ap) -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_ap_qr1"
                    id = "subject_g{{ $grade }}_ap_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr1'} }}"
                    
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_qr2"
                    id = "subject_g{{ $grade }}_ap_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr2'} }}"
                    
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_qr3"
                    id = "subject_g{{ $grade }}_ap_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr3'} }}"
                    
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_qr4"
                    id = "subject_g{{ $grade }}_ap_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_qr4'} }}"
                    
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ap_rem"
                    id = "subject_g{{ $grade }}_ap_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ap_rem'} }}"
                    
                    data-label-title = "Learning Area: Araling Panlipunan (AP) {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Fixed-pass-1: [16 - ALL] Subject -> edukasyon sa pagpapakatao (ep) -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_ep_qr1"
                    id = "subject_g{{ $grade }}_ep_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr1'} }}"
                    
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_qr2"
                    id = "subject_g{{ $grade }}_ep_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr2'} }}"
                    
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_qr3"
                    id = "subject_g{{ $grade }}_ep_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr3'} }}"
                    
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_qr4"
                    id = "subject_g{{ $grade }}_ep_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_qr4'} }}"
                    
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_ep_rem"
                    id = "subject_g{{ $grade }}_ep_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_ep_rem'} }}"
                    
                    data-label-title = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Fixed-pass-1: [17 - ALL] Subject -> technology and livelihood education (tle) -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_tle_qr1"
                    id = "subject_g{{ $grade }}_tle_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr1'} }}"
                    
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_qr2" 
                    id = "subject_g{{ $grade }}_tle_qr2" 
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr2'} }}"
                    
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_qr3"
                    id = "subject_g{{ $grade }}_tle_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr3'} }}"
                    
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_qr4"
                    id = "subject_g{{ $grade }}_tle_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_qr4'} }}"
                    
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_tle_rem"
                    id = "subject_g{{ $grade }}_tle_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_tle_rem'} }}"
                    
                    data-label-title = "Learning Area: Technology and Livelihood Education (TLE) {{ $grade }}"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Fixed-pass-1: [18 - ALL] Subject -> music -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_mus_qr1"
                    id = "subject_g{{ $grade }}_mus_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr1'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_qr2"
                    id = "subject_g{{ $grade }}_mus_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr2'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_qr3"
                    id = "subject_g{{ $grade }}_mus_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr3'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_qr4"
                    id = "subject_g{{ $grade }}_mus_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_qr4'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_mus_rem"
                    id = "subject_g{{ $grade }}_mus_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_mus_rem'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Music"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
            
            <!-- Fixed-pass-1: [19 - ALL] Subject -> arts -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_art_qr1"
                    id = "subject_g{{ $grade }}_art_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr1'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_qr2"
                    id = "subject_g{{ $grade }}_art_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr2'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_qr3"
                    id = "subject_g{{ $grade }}_art_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr3'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_qr4"
                    id = "subject_g{{ $grade }}_art_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_art_qr4'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_art_rem"
                    id = "subject_g{{ $grade }}_art_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_art_rem'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Arts"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Fixed-pass-1: [20 - ALL] Subject -> physical education -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_pe_qr1"
                    id = "subject_g{{ $grade }}_pe_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr1'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_qr2"
                    id = "subject_g{{ $grade }}_pe_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr2'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_qr3"
                    id = "subject_g{{ $grade }}_pe_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr3'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_qr4"
                    id = "subject_g{{ $grade }}_pe_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_qr4'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_pe_rem"
                    id = "subject_g{{ $grade }}_pe_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_pe_rem'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Physical Education"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>

            <!-- Fixed-pass-1: [21 - ALL] Subject -> health -->
            <div>
                <input
                    name = "subject_g{{ $grade }}_hp_qr1"
                    id = "subject_g{{ $grade }}_hp_qr1"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr1'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_qr2"
                    id = "subject_g{{ $grade }}_hp_qr2"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr2'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_qr3"
                    id = "subject_g{{ $grade }}_hp_qr3"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr3'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_qr4"
                    id = "subject_g{{ $grade }}_hp_qr4"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_qr4'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $grade }}_hp_rem"
                    id = "subject_g{{ $grade }}_hp_rem"
                    class = "display-none"

                    type = "number"
                    min = "0"
                    max = "100"
                    value = "{{ $student->{'subject_g'.$grade.'_hp_rem'} }}"
                    
                    data-label-title = "Learning Area: MAPEH {{ $grade }} - Health"
                    data-label-subtitle = "Remedial Class Mark"
                >
            </div>
        @endfor
        
    </div>
</form>