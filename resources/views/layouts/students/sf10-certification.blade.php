<div class = "border-all-light border-space container-fluid">
    <div class = "row">

        <!-- Header -->
        <div class = "col-12">
            <span class = "break"></span>
            <h6>Certification</h6>
            <span class = "break"></span>
        </div>

        <!-- Paragraph -->
        <div class = "col-12">

            <!-- Name, Learner Reference Number, Grade -->
            <span class = "text-center">
                I CERTIFY that this is a true record of
                <input
                    class = "border-bottom-dark display-inline text-center"
                    type = "text"
                    value = "{{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}"
                    style = "width: 200px;"
                    disabled
                >
                with LRN
                <input
                    class = "border-bottom-dark display-inline text-center"
                    type = "text"
                    value = "{{ $student->info_lrn }}"
                    style = "width: 150px;"
                    disabled
                >
                and that he/she is eligible for admission to Grade
                <input
                    class = "border-bottom-dark display-inline {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }} text-center"
                    name = "sf10_certification_{{ $side }}_grade"
                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'sf10_certification_'.$side.'_grade'} }}"
                    style = "width: 50px;"
                    {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
                >
            </span>

            <!-- School Name, School ID, School Year -->
            <span class = "text-center">
                Name of School:
                <input
                    class = "border-bottom-dark display-inline {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }} text-center"
                    name = "sf10_certification_{{ $side }}_school_name"
                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'sf10_certification_'.$side.'_school_name'} }}"
                    style = "width: 300px;"
                    {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
                >
                School ID:
                <input
                    class = "border-bottom-dark display-inline {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }} text-center"
                    name = "sf10_certification_{{ $side }}_school_id"
                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'sf10_certification_'.$side.'_school_id'} }}"
                    style = "width: 200px;"
                    {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
                >
                Last School Year Attended:
                <input
                    class = "border-bottom-dark display-inline {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }} text-center"
                    name = "sf10_certification_{{ $side }}_school_year"
                    type = "text"
                    maxlength = "50"
                    value = "{{ $student->{'sf10_certification_'.$side.'_school_year'} }}"
                    style = "width: 135px;"
                    {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
                >
            </span>

        </div>
        <div class = "col-12">
            <span class = "break"></span>
        </div>

        <!-- Year -->
        <div class = "col-3">
            <input
                class = "border-bottom-dark float-center {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }} text-center"
                name = "sf10_certification_{{ $side }}_date"
                type = "text"
                maxlength = "50"
                value = "{{ $student->{'sf10_certification_'.$side.'_date'} }}"
                style = "width: 200px;"
                {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
            >
            <span class = "text-center">Date</span>
        </div>

        <!-- Principal -->
        <div class = "col-6">
            <input
                class = "border-bottom-dark float-center {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }} text-center"
                name = "sf10_certification_{{ $side }}_principal"
                type = "text"
                maxlength = "50"
                value = "{{ $student->{'sf10_certification_'.$side.'_principal'} }}"
                style = "width: 400px;"
                {{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
            >
            <span class = "text-center">Name of Principal/School Head over Printed Name</span>
        </div>

        <!-- Signature -->
        <div class = "col-3">
            <input
                class = "border-bottom-dark float-center"
                type = "text"
                style = "width: 200px;"
                disabled
            >
            <span class = "text-center">(Affix School Seal here)</span>
        </div>
        <div class = "col-12">
            <span class = "break"></span>
        </div>

    </div>
</div>