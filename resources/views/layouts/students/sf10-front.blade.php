<div class = "container-fluid paper">
	<div class = "row">
		<div class = "col-12">
			<span>SF10-JHS</span>
		</div>
		<div class = "col-2">
			<img src = "{{ asset('assets/img/deped-2.png') }}" height = "75" draggable = "false">
		</div>
		<div class = "col-8">
			<span class = "text-center">Republic of the Philippines</span>
			<span class = "text-center">Department of Education</span>
			<h6>Learner Permanent Record for Junior High School (SF10-JHS)</h6>
			<span class = "text-center">(Formerly Form 137)</span>
		</div>
		<div class = "col-2">
			<img class = "float-right" src = "{{ asset('assets/img/deped-1.png') }}" height = "75" draggable = "false">
		</div>
	</div>
	<div class = "row">
		<div class = "col-12">
			<h6 class = "heading">Learner's Information</h6>
		</div>
		<div class = "col-3">
			<label>
				<span>LAST NAME:&nbsp;</span>
				<span>{{ $student->info_name_last }}</span>
			</label>
		</div>
		<div class = "col-3">
			<label>
				<span>FIRST NAME:&nbsp;</span>
				<span>{{ $student->info_name_first }}</span>
			</label>
		</div>
		<div class = "col-3">
			<label>
				<span>EXTN. (Jr, I, II):&nbsp;</span>
				<span>{{ $student->info_name_suffix }}</span>
			</label>
		</div>
		<div class = "col-3">
			<label>
				<span>MIDDLE NAME:&nbsp;</span>
				<span>{{ $student->info_name_middle }}</span>
			</label>
		</div>
		<div class = "col-6">
			<label>
				<span>Leaner Reference Number (LRN):&nbsp;</span>
				<span>{{ $student->info_lrn }}</span>
			</label>
		</div>
		<div class = "col-3">
			<label>
				<span>Birthdate (MM/DD/YYYY):&nbsp;</span>
				<span>{{ $student->info_birthdate }}</span>
			</label>
		</div>
		<div class = "col-3">
			<label>
				<span>Sex:&nbsp;</span>
				<span>{{ $student->info_sex }}</span>
			</label>
		</div>
	</div>
	<div class = "row">
		<div class = "col-12">
			<h6 class = "heading">Eligibility for JHS Enrollment</h6>
		</div>
	</div>
	<div class = "border-all-light border-space container-fluid">
		<div class = "row">
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<input
						name = "sf10_enrollment_elementary_boolean"
						type = "checkbox"
						{{  $student->sf10_enrollment_elementary_boolean ? 'checked' : '' }}
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
					<span>Elementary School Completer</span>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>General Average:&nbsp;</span>
					<input
						name = "sf10_enrollment_elementary_average"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_elementary_average }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>Citation (If Any):&nbsp;</span>
					<input
						name = "sf10_enrollment_elementary_citation"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_elementary_citation }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>Name of Elementary School:&nbsp;</span>
					<input
						name = "sf10_enrollment_elementary_name"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_elementary_name }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>School ID:&nbsp;</span>
					<input
						name = "sf10_enrollment_elementary_id"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_elementary_id }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>Address of School:&nbsp;</span>
					<input
						name = "sf10_enrollment_elementary_address"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_elementary_address }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "col-12">
			<span class = "break"></span>
			<span>Other Credential Presented</span>
			<span class = "break"></span>
		</div>
	</div>
	<div class = "border-all-light border-space container-fluid">
		<div class = "row">
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<input
						name = "sf10_enrollment_other_pept_boolean"
						type = "checkbox"
						{{  $student->sf10_enrollment_other_pept_boolean ? 'checked' : '' }}
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
					<span>PEPT Passer | Rating:&nbsp;</span>
					<input
						name = "sf10_enrollment_other_pept_rating"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_other_pept_rating }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<input
						name = "sf10_enrollment_other_alsae_boolean"
						type = "checkbox"
						{{  $student->sf10_enrollment_other_alsae_boolean ? 'checked' : '' }}
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
					<span>ALS A&E Passer | Rating:&nbsp;</span>
					<input
						name = "sf10_enrollment_other_alsae_rating"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_other_alsae_rating }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-4">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<input
						name = "sf10_enrollment_other_specify_boolean"
						type = "checkbox"
						{{  $student->sf10_enrollment_other_specify_boolean ? 'checked' : '' }}
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
					<span>Others | Please specify:&nbsp;</span>
					<input
						name = "sf10_enrollment_other_specify_rating"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_other_specify_rating }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-6">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>Date of Examination/Assessment (MM/DD/YYYY):&nbsp;</span>
					<input
						name = "sf10_enrollment_other_date"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_other_date }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
			<div class = "col-6">
				<label class = "{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? '' : 'highlight' }}">
					<span>Name and Address of Testing Center:&nbsp;</span>
					<input
						name = "sf10_enrollment_other_location"
						type = "text"
						maxlength = "50"
						value = "{{ $student->sf10_enrollment_other_location }}"
						{{ $student->ST_locker || !$auth->ST_subject_sf10_acads ? 'disabled' : '' }}
					>
				</label>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "col-12">
			<h6 class = "heading">Scholastic Record</h6>
		</div>
	</div>
	@include('layouts.students.sf10-scholastic-record', ['grade' => 7])
	@include('layouts.students.sf10-scholastic-record', ['grade' => 8])
	@include('layouts.students.sf10-certification', ['side' => 'front'])
</div>