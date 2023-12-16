<form action = "{{ url('/manager/save', ['id' => $student->id]) }}" method = "POST">
    
    @include('layouts.general.errors')
    @csrf

    <div id = "form-wrapper" class = "hidden">

        <!-- Header -->
        <div id = "form-close">X</div>
        <h5 id = "form-label-a" class = "align-middle">Label A</h5>
        <h6 id = "form-label-b" class = "align-middle">Label B</h6>
        <hr>

        <!-- Save -->
        <input
            id = "form-submit"
            class = "hidden"
            type = "submit"
            value = "Save Changes"
            data-label-a = "Confirm"
            data-label-b = "Save all changes?"
        >
        
        <!-- Info -->
        <div>
            <input
                name = "info_lrn"
                id = "info_lrn"
                class = "hidden"
                value = "{{ $student->info_lrn }}"
            >
            <input
                name = "info_name_last"
                id = "info_name_last"
                class = "hidden"
                value = "{{ $student->info_name_last }}"
            >
            <input
                name = "info_name_first"
                id = "info_name_first"
                class = "hidden"
                value = "{{ $student->info_name_first }}"
            >
            <input
                name = "info_name_middle"
                id = "info_name_middle"
                class = "hidden"
                value = "{{ $student->info_name_middle }}"
            >
            <input
                name = "info_sex"
                id = "info_sex"
                class = "hidden"
                value = "{{ $student->info_sex }}"
            >
            <input
                name = "info_birthdate_year"
                id = "info_birthdate_year"
                class = "hidden"
                value = "{{ $student->info_birthdate_year }}"
            >
            <input
                name = "info_birthdate_month"
                id = "info_birthdate_month"
                class = "hidden"
                value = "{{ $student->info_birthdate_month }}"
            >
            <input
                name = "info_birthdate_day"
                id = "info_birthdate_day"
                class = "hidden"
                value = "{{ $student->info_birthdate_day }}"
            >
        </div>

        <!-- Enrolment -->
        <div>
            <input
                name = "enrolment_elementary_boolean"
                id = "enrolment_elementary_boolean"
                class = "hidden"
                value = "{{ $student->enrolment_elementary_boolean }}"
            >
            <input
                name = "enrolment_elementary_average"
                id = "enrolment_elementary_average"
                class = "hidden"
                value = "{{ $student->enrolment_elementary_average }}"
            >
            <input
                name = "enrolment_elementary_citation"
                id = "enrolment_elementary_citation"
                class = "hidden"
                value = "{{ $student->enrolment_elementary_citation }}"
            >
            <input
                name = "enrolment_elementary_name"
                id = "enrolment_elementary_name"
                class = "hidden"
                value = "{{ $student->enrolment_elementary_name }}"
            >
            <input
                name = "enrolment_elementary_id"
                id = "enrolment_elementary_id"
                class = "hidden"
                value = "{{ $student->enrolment_elementary_id }}"
            >
            <input
                name = "enrolment_elementary_address"
                id = "enrolment_elementary_address"
                class = "hidden"
                value = "{{ $student->enrolment_elementary_address }}"
            >
            <input
                name = "enrolment_other_pept_boolean"
                id = "enrolment_other_pept_boolean"
                class = "hidden"
                value = "{{ $student->enrolment_other_pept_boolean }}"
            >
            <input
                name = "enrolment_other_pept_rating"
                id = "enrolment_other_pept_rating"
                class = "hidden"
                value = "{{ $student->enrolment_other_pept_rating }}"
            >
            <input
                name = "enrolment_other_alsae_boolean"
                id = "enrolment_other_alsae_boolean"
                class = "hidden"
                value = "{{ $student->enrolment_other_alsae_boolean }}"
            >
            <input
                name = "enrolment_other_alsae_rating"
                id = "enrolment_other_alsae_rating"
                class = "hidden"
                value = "{{ $student->enrolment_other_alsae_rating }}"
            >
            <input
                name = "enrolment_other_specify_boolean"
                id = "enrolment_other_specify_boolean"
                class = "hidden"
                value = "{{ $student->enrolment_other_specify_boolean }}"
            >
            <input
                name = "enrolment_other_specify_rating"
                id = "enrolment_other_specify_rating"
                class = "hidden"
                value = "{{ $student->enrolment_other_specify_rating }}"
            >
            <input
                name = "enrolment_other_specify_label"
                id = "enrolment_other_specify_label"
                class = "hidden"
                value = "{{ $student->enrolment_other_specify_label }}"
            >
            <input
                name = "enrolment_other_date"
                id = "enrolment_other_date"
                class = "hidden"
                value = "{{ $student->enrolment_other_date }}"
            >
            <input
                name = "enrolment_other_location"
                id = "enrolment_other_location"
                class = "hidden"
                value = "{{ $student->enrolment_other_location }}"
            >
        </div>

        @for ($i = 7; $i <= 10; $i++)
            <!-- Record -->
            <div>
                <input
                    name = "record_g{{ $i }}_age"
                    id = "record_g{{ $i }}_age"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_age'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_grade"
                    id = "record_g{{ $i }}_school_grade"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_grade'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_name"
                    id = "record_g{{ $i }}_school_name"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_name'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_id"
                    id = "record_g{{ $i }}_school_id"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_id'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_section"
                    id = "record_g{{ $i }}_school_section"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_section'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_year"
                    id = "record_g{{ $i }}_school_year"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_year'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_district"
                    id = "record_g{{ $i }}_school_district"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_district'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_division"
                    id = "record_g{{ $i }}_school_division"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_division'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_region"
                    id = "record_g{{ $i }}_school_region"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_region'} }}"
                >
                <input
                    name = "record_g{{ $i }}_school_teacher"
                    id = "record_g{{ $i }}_school_teacher"
                    class = "hidden"
                    value = "{{ $student->{'record_g'.$i.'_school_teacher'} }}"
                >
            </div>
            
            <!-- Subject -> filipino -->
            <div>
                <input
                    name = "subject_g{{ $i }}_fil_qr1"
                    id = "subject_g{{ $i }}_fil_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_fil_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Filipino {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_fil_qr2"
                    id = "subject_g{{ $i }}_fil_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_fil_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Filipino {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_fil_qr3"
                    id = "subject_g{{ $i }}_fil_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_fil_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Filipino {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_fil_qr4"
                    id = "subject_g{{ $i }}_fil_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_fil_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Filipino {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_fil_rem"
                    id = "subject_g{{ $i }}_fil_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_fil_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Filipino {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> english -->
            <div>
                <input
                    name = "subject_g{{ $i }}_eng_qr1"
                    id = "subject_g{{ $i }}_eng_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_eng_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: English {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_eng_qr2"
                    id = "subject_g{{ $i }}_eng_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_eng_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: English {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_eng_qr3"
                    id = "subject_g{{ $i }}_eng_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_eng_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: English {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_eng_qr4"
                    id = "subject_g{{ $i }}_eng_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_eng_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: English {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_eng_rem"
                    id = "subject_g{{ $i }}_eng_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_eng_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: English {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>

            <!-- Subject -> mathematics -->
            <div>
                <input
                    name = "subject_g{{ $i }}_mat_qr1"
                    id = "subject_g{{ $i }}_mat_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mat_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Mathematics {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mat_qr2"
                    id = "subject_g{{ $i }}_mat_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mat_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Mathematics {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mat_qr3"
                    id = "subject_g{{ $i }}_mat_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mat_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Mathematics {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mat_qr4"
                    id = "subject_g{{ $i }}_mat_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mat_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Mathematics {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mat_rem"
                    id = "subject_g{{ $i }}_mat_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mat_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Mathematics {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>

            <!-- Subject -> science -->
            <div>
                <input
                    name = "subject_g{{ $i }}_sci_qr1"
                    id = "subject_g{{ $i }}_sci_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_sci_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Science {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_sci_qr2"
                    id = "subject_g{{ $i }}_sci_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_sci_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Science {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_sci_qr3"
                    id = "subject_g{{ $i }}_sci_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_sci_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Science {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_sci_qr4"
                    id = "subject_g{{ $i }}_sci_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_sci_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Science {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_sci_rem"
                    id = "subject_g{{ $i }}_sci_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_sci_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Science {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> araling panlipunan (ap) -->
            <div>
                <input
                    name = "subject_g{{ $i }}_ap_qr1"
                    id = "subject_g{{ $i }}_ap_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ap_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Araling Panlipunan (AP) {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ap_qr2"
                    id = "subject_g{{ $i }}_ap_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ap_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Araling Panlipunan (AP) {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ap_qr3"
                    id = "subject_g{{ $i }}_ap_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ap_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Araling Panlipunan (AP) {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ap_qr4"
                    id = "subject_g{{ $i }}_ap_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ap_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Araling Panlipunan (AP) {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ap_rem"
                    id = "subject_g{{ $i }}_ap_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ap_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Araling Panlipunan (AP) {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> edukasyon sa pagpapakatao (ep) -->
            <div>
                <input
                    name = "subject_g{{ $i }}_ep_qr1"
                    id = "subject_g{{ $i }}_ep_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ep_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ep_qr2"
                    id = "subject_g{{ $i }}_ep_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ep_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ep_qr3"
                    id = "subject_g{{ $i }}_ep_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ep_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ep_qr4"
                    id = "subject_g{{ $i }}_ep_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ep_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_ep_rem"
                    id = "subject_g{{ $i }}_ep_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_ep_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> technology and livelihood education (tle) -->
            <div>
                <input
                    name = "subject_g{{ $i }}_tle_qr1"
                    id = "subject_g{{ $i }}_tle_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_tle_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_tle_qr2" 
                    id = "subject_g{{ $i }}_tle_qr2" 
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_tle_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_tle_qr3"
                    id = "subject_g{{ $i }}_tle_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_tle_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_tle_qr4"
                    id = "subject_g{{ $i }}_tle_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_tle_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_tle_rem"
                    id = "subject_g{{ $i }}_tle_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_tle_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> music -->
            <div>
                <input
                    name = "subject_g{{ $i }}_mus_qr1"
                    id = "subject_g{{ $i }}_mus_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mus_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Music"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mus_qr2"
                    id = "subject_g{{ $i }}_mus_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mus_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Music"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mus_qr3"
                    id = "subject_g{{ $i }}_mus_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mus_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Music"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mus_qr4"
                    id = "subject_g{{ $i }}_mus_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mus_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Music"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_mus_rem"
                    id = "subject_g{{ $i }}_mus_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_mus_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Music"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> arts -->
            <div>
                <input
                    name = "subject_g{{ $i }}_art_qr1"
                    id = "subject_g{{ $i }}_art_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_art_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Arts"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_art_qr2"
                    id = "subject_g{{ $i }}_art_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_art_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Arts"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_art_qr3"
                    id = "subject_g{{ $i }}_art_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_art_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Arts"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_art_qr4"
                    id = "subject_g{{ $i }}_art_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_art_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Arts"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_art_rem"
                    id = "subject_g{{ $i }}_art_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_art_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Arts"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> physical education -->
            <div>
                <input
                    name = "subject_g{{ $i }}_pe_qr1"
                    id = "subject_g{{ $i }}_pe_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_pe_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Physical Education"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_pe_qr2"
                    id = "subject_g{{ $i }}_pe_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_pe_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Physical Education"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_pe_qr3"
                    id = "subject_g{{ $i }}_pe_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_pe_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Physical Education"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_pe_qr4"
                    id = "subject_g{{ $i }}_pe_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_pe_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Physical Education"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_pe_rem"
                    id = "subject_g{{ $i }}_pe_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_pe_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Physical Education"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Subject -> health -->
            <div>
                <input
                    name = "subject_g{{ $i }}_hp_qr1"
                    id = "subject_g{{ $i }}_hp_qr1"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_hp_qr1'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Health"
                    data-label-b = "1st Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_hp_qr2"
                    id = "subject_g{{ $i }}_hp_qr2"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_hp_qr2'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Health"
                    data-label-b = "2nd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_hp_qr3"
                    id = "subject_g{{ $i }}_hp_qr3"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_hp_qr3'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Health"
                    data-label-b = "3rd Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_hp_qr4"
                    id = "subject_g{{ $i }}_hp_qr4"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_hp_qr4'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Health"
                    data-label-b = "4th Quarter Rating"
                >
                <input
                    name = "subject_g{{ $i }}_hp_rem"
                    id = "subject_g{{ $i }}_hp_rem"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'subject_g'.$i.'_hp_rem'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "100"
                    data-label-a = "Learning Area: MAPEH {{ $i }} - Health"
                    data-label-b = "Remedial Class Mark"
                >
            </div>
            
            <!-- Attendance -> present -->
            <div>
                <input
                    name = "attendance_g{{ $i }}_p_jan"
                    id = "attendance_g{{ $i }}_p_jan"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_jan'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "January"
                >
                <input
                    name = "attendance_g{{ $i }}_p_feb"
                    id = "attendance_g{{ $i }}_p_feb"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_feb'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "28"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "February"
                >
                <input
                    name = "attendance_g{{ $i }}_p_mar"
                    id = "attendance_g{{ $i }}_p_mar"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_mar'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "March"
                >
                <input
                    name = "attendance_g{{ $i }}_p_apr"
                    id = "attendance_g{{ $i }}_p_apr"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_apr'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "April"
                >
                <input
                    name = "attendance_g{{ $i }}_p_may"
                    id = "attendance_g{{ $i }}_p_may"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_may'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "May"
                >
                <input
                    name = "attendance_g{{ $i }}_p_jun"
                    id = "attendance_g{{ $i }}_p_jun"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_jun'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "June"
                >
                <input
                    name = "attendance_g{{ $i }}_p_jul"
                    id = "attendance_g{{ $i }}_p_jul"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_jul'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "July"
                >
                <input
                    name = "attendance_g{{ $i }}_p_aug"
                    id = "attendance_g{{ $i }}_p_aug"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_aug'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "August"
                >
                <input
                    name = "attendance_g{{ $i }}_p_sep"
                    id = "attendance_g{{ $i }}_p_sep"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_sep'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "September"
                >
                <input
                    name = "attendance_g{{ $i }}_p_oct"
                    id = "attendance_g{{ $i }}_p_oct"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_oct'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "October"
                >
                <input
                    name = "attendance_g{{ $i }}_p_nov"
                    id = "attendance_g{{ $i }}_p_nov"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_nov'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "November"
                >
                <input
                    name = "attendance_g{{ $i }}_p_dec"
                    id = "attendance_g{{ $i }}_p_dec"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_p_dec'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Present"
                    data-label-b = "December"
                >
            </div>
            
            <!-- Attendance -> absent -->
            <div>
                <input
                    name = "attendance_g{{ $i }}_a_jan"
                    id = "attendance_g{{ $i }}_a_jan"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_jan'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "January"
                >
                <input
                    name = "attendance_g{{ $i }}_a_feb"
                    id = "attendance_g{{ $i }}_a_feb"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_feb'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "28"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "February"
                >
                <input
                    name = "attendance_g{{ $i }}_a_mar"
                    id = "attendance_g{{ $i }}_a_mar"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_mar'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "March"
                >
                <input
                    name = "attendance_g{{ $i }}_a_apr"
                    id = "attendance_g{{ $i }}_a_apr"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_apr'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "April"
                >
                <input
                    name = "attendance_g{{ $i }}_a_may"
                    id = "attendance_g{{ $i }}_a_may"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_may'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "May"
                >
                <input
                    name = "attendance_g{{ $i }}_a_jun"
                    id = "attendance_g{{ $i }}_a_jun"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_jun'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "June"
                >
                <input
                    name = "attendance_g{{ $i }}_a_jul"
                    id = "attendance_g{{ $i }}_a_jul"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_jul'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "July"
                >
                <input
                    name = "attendance_g{{ $i }}_a_aug"
                    id = "attendance_g{{ $i }}_a_aug"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_aug'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "August"
                >
                <input
                    name = "attendance_g{{ $i }}_a_sep"
                    id = "attendance_g{{ $i }}_a_sep"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_sep'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "September"
                >
                <input
                    name = "attendance_g{{ $i }}_a_oct"
                    id = "attendance_g{{ $i }}_a_oct"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_oct'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "October"
                >
                <input
                    name = "attendance_g{{ $i }}_a_nov"
                    id = "attendance_g{{ $i }}_a_nov"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_nov'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "30"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "November"
                >
                <input
                    name = "attendance_g{{ $i }}_a_dec"
                    id = "attendance_g{{ $i }}_a_dec"
                    class = "hidden"
                    type = "text"
                    value = "{{ $student->{'attendance_g'.$i.'_a_dec'} }}"
                    data-input-type = "number"
                    data-input-min = "0"
                    data-input-max = "31"
                    data-label-a = "Attendance: No. of Days Absent"
                    data-label-b = "December"
                >
            </div>
            
            <!-- Values -> maka - diyos -->
            <div>
                <select
                    name = "values_g{{ $i }}_md_s1_qr1"
                    id = "values_g{{ $i }}_md_s1_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s1_qr2"
                    id = "values_g{{ $i }}_md_s1_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s1_qr3"
                    id = "values_g{{ $i }}_md_s1_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s1_qr4"
                    id = "values_g{{ $i }}_md_s1_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s2_qr1"
                    id = "values_g{{ $i }}_md_s2_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s2_qr2"
                    id = "values_g{{ $i }}_md_s2_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s2_qr3"
                    id = "values_g{{ $i }}_md_s2_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_md_s2_qr4"
                    id = "values_g{{ $i }}_md_s2_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Diyos"
                    data-label-b = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_md_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_md_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_md_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_md_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_md_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Values -> maka - tao -->
            <div>
                <select
                    name = "values_g{{ $i }}_mt_s1_qr1"
                    id = "values_g{{ $i }}_mt_s1_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s1_qr2"
                    id = "values_g{{ $i }}_mt_s1_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s1_qr3"
                    id = "values_g{{ $i }}_mt_s1_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s1_qr4"
                    id = "values_g{{ $i }}_mt_s1_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s2_qr1"
                    id = "values_g{{ $i }}_mt_s2_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s2_qr2"
                    id = "values_g{{ $i }}_mt_s2_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s2_qr3"
                    id = "values_g{{ $i }}_mt_s2_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mt_s2_qr4"
                    id = "values_g{{ $i }}_mt_s2_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Tao"
                    data-label-b = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mt_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mt_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mt_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mt_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mt_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Values -> maka - kalikasan -->
            <div>
                <select
                    name = "values_g{{ $i }}_mk_qr1"
                    id = "values_g{{ $i }}_mk_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Kalikasan"
                    data-label-b = "1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mk_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mk_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mk_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mk_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mk_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mk_qr2"
                    id = "values_g{{ $i }}_mk_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Kalikasan"
                    data-label-b = "2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mk_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mk_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mk_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mk_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mk_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mk_qr3"
                    id = "values_g{{ $i }}_mk_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Kalikasan"
                    data-label-b = "3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mk_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mk_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mk_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mk_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mk_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mk_qr4"
                    id = "values_g{{ $i }}_mk_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Kalikasan"
                    data-label-b = "4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mk_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mk_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mk_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mk_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mk_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
            
            <!-- Values -> maka - bansa -->
            <div>
                <select
                    name = "values_g{{ $i }}_mb_s1_qr1"
                    id = "values_g{{ $i }}_mb_s1_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 1 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s1_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s1_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s1_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s1_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s1_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s1_qr2"
                    id = "values_g{{ $i }}_mb_s1_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s1_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s1_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s1_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s1_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s1_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s1_qr3"
                    id = "values_g{{ $i }}_mb_s1_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s1_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s1_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s1_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s1_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s1_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s1_qr4"
                    id = "values_g{{ $i }}_mb_s1_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 1 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s1_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s1_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s1_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s1_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s1_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s2_qr1"
                    id = "values_g{{ $i }}_mb_s2_qr1"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 2 | 1st Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s2_qr1'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s2_qr1'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s2_qr1'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s2_qr1'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s2_qr1'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s2_qr2"
                    id = "values_g{{ $i }}_mb_s2_qr2"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s2_qr2'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s2_qr2'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s2_qr2'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s2_qr2'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s2_qr2'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s2_qr3"
                    id = "values_g{{ $i }}_mb_s2_qr3"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s2_qr3'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s2_qr3'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s2_qr3'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s2_qr3'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s2_qr3'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
                <select
                    name = "values_g{{ $i }}_mb_s2_qr4"
                    id = "values_g{{ $i }}_mb_s2_qr4"
                    class = "hidden"
                    data-label-a = "Core Value: Maka - Bansa"
                    data-label-b = "Behavior Statement 2 | 4th Quarter Marking"
                >
                    <option value = "" {{  $student->{'values_g'.$i.'_mb_s2_qr4'} === "" ? "selected" : "" }}></option>
                    <option value = "AO" {{  $student->{'values_g'.$i.'_mb_s2_qr4'} === "AO" ? "selected" : "" }}>Always Observed</option>
                    <option value = "SO" {{  $student->{'values_g'.$i.'_mb_s2_qr4'} === "SO" ? "selected" : "" }}>Sometimes Observed</option>
                    <option value = "RO" {{  $student->{'values_g'.$i.'_mb_s2_qr4'} === "RO" ? "selected" : "" }}>Rarely Observed</option>
                    <option value = "NO" {{  $student->{'values_g'.$i.'_mb_s2_qr4'} === "NO" ? "selected" : "" }}>Not Observed</option>
                </select>
            </div>
        @endfor
        
    </div>
</form>