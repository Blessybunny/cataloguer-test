<!-- Row 1 -->
<div class = "row">
	<div class = "col-2">
		<label class = "highlight">
			<span>School:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_name"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_name'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-2">
		<label class = "highlight">
			<span>School ID:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_id"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_id'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-2">
		<label class = "highlight">
			<span>District:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_district"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_district'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-4">
		<label class = "highlight">
			<span>Division:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_division"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_division'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-2">
		<label class = "highlight">
			<span>Region:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_region"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_region'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
</div>

<!-- Row 2 -->
<div class = "row">
	<div class = "col-2">
		<label class = "highlight">
			<span>Classified as Grade:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_grade"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_grade'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-2">
		<label class = "highlight">
			<span>Section:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_section"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_section'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-2">
		<label class = "highlight">
			<span>School Year:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_year"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_year'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-4">
		<label class = "highlight">
			<span>Name of Adviser/Teacher:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_teacher"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_teacher'} }}"
				{{ $student->ST_locker ? "disabled" : "" }}
			>
		</label>
	</div>
	<div class = "col-2">
		<label>
			<span>Signature:</span>
		</label>
	</div>
</div>

<!-- Table -->
<div class = "row">
	<div class = "col">
		<table class = "table">

			<!-- Headers -->
			<tr>
				<th colspan = "2" rowspan = "2">Learning Areas</th>
				<th colspan = "4">Quarter</th>
				<th rowspan = "2" style = "min-width: 200px;">Final Rating</th>
				<th rowspan = "2" style = "min-width: 200px;">Remarks</th>
			</tr>
			<tr>
				<th style = "min-width: 50px;">1st</th>
				<th style = "min-width: 50px;">2nd</th>
				<th style = "min-width: 50px;">3rd</th>
				<th style = "min-width: 50px;">4th</th>
			</tr>

			<!-- Subject -> filipino -->
			<tr>
				<td colspan = "2">Filipino {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_fil'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_fil'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_fil'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_fil'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_fil",
					"sf10_g{{ $grade }}_subject_qr2_fil",
					"sf10_g{{ $grade }}_subject_qr3_fil",
					"sf10_g{{ $grade }}_subject_qr4_fil"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_fil",
					"sf10_g{{ $grade }}_subject_qr2_fil",
					"sf10_g{{ $grade }}_subject_qr3_fil",
					"sf10_g{{ $grade }}_subject_qr4_fil"
				]'></td>
			</tr>

			<!-- Subject -> english -->
			<tr>
				<td colspan = "2">English {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_eng'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_eng'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_eng'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_eng'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_eng",
					"sf10_g{{ $grade }}_subject_qr2_eng",
					"sf10_g{{ $grade }}_subject_qr3_eng",
					"sf10_g{{ $grade }}_subject_qr4_eng"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_eng",
					"sf10_g{{ $grade }}_subject_qr2_eng",
					"sf10_g{{ $grade }}_subject_qr3_eng",
					"sf10_g{{ $grade }}_subject_qr4_eng"
				]'></td>
			</tr>

			<!-- Subject -> mathematics -->
			<tr>
				<td colspan = "2">Mathemathics {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_mat'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_mat'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_mat'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_mat'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_mat",
					"sf10_g{{ $grade }}_subject_qr2_mat",
					"sf10_g{{ $grade }}_subject_qr3_mat",
					"sf10_g{{ $grade }}_subject_qr4_mat"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_mat",
					"sf10_g{{ $grade }}_subject_qr2_mat",
					"sf10_g{{ $grade }}_subject_qr3_mat",
					"sf10_g{{ $grade }}_subject_qr4_mat"
				]'></td>
			</tr>

			<!-- Subject -> science -->
			<tr>
				<td colspan = "2">Science {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_sci'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_sci'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_sci'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_sci'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_sci",
					"sf10_g{{ $grade }}_subject_qr2_sci",
					"sf10_g{{ $grade }}_subject_qr3_sci",
					"sf10_g{{ $grade }}_subject_qr4_sci"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_sci",
					"sf10_g{{ $grade }}_subject_qr2_sci",
					"sf10_g{{ $grade }}_subject_qr3_sci",
					"sf10_g{{ $grade }}_subject_qr4_sci"
				]'></td>
			</tr>

			<!-- Subject -> araling panlipunan (ap) -->
			<tr>
				<td colspan = "2">Araling Panlipunan (AP) {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_ap'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_ap'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_ap'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_ap'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_ap",
					"sf10_g{{ $grade }}_subject_qr2_ap",
					"sf10_g{{ $grade }}_subject_qr3_ap",
					"sf10_g{{ $grade }}_subject_qr4_ap"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_ap",
					"sf10_g{{ $grade }}_subject_qr2_ap",
					"sf10_g{{ $grade }}_subject_qr3_ap",
					"sf10_g{{ $grade }}_subject_qr4_ap"
				]'></td>
			</tr>

			<!-- Subject -> edukasyon sa pagpapakatao (ep) -->
			<tr>
				<td colspan = "2">Edukasyon sa Pagpapakatao (EP) {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_ep'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_ep'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_ep'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_ep'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_ep",
					"sf10_g{{ $grade }}_subject_qr2_ep",
					"sf10_g{{ $grade }}_subject_qr3_ep",
					"sf10_g{{ $grade }}_subject_qr4_ep"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_ep",
					"sf10_g{{ $grade }}_subject_qr2_ep",
					"sf10_g{{ $grade }}_subject_qr3_ep",
					"sf10_g{{ $grade }}_subject_qr4_ep"
				]'></td>
			</tr>

			<!-- Subject -> technology and livelihood education (tle) -->
			<tr>
				<td colspan = "2">Technology and Livelihood Education (TLE) {{ $grade }}</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_tle'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_tle'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_tle'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_tle'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_tle",
					"sf10_g{{ $grade }}_subject_qr2_tle",
					"sf10_g{{ $grade }}_subject_qr3_tle",
					"sf10_g{{ $grade }}_subject_qr4_tle"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_tle",
					"sf10_g{{ $grade }}_subject_qr2_tle",
					"sf10_g{{ $grade }}_subject_qr3_tle",
					"sf10_g{{ $grade }}_subject_qr4_tle"
				]'></td>
			</tr>

			<!-- Average -> MAPEH -->
			<tr>
				<td colspan = "2">MAPEH {{ $grade }}</td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_mus",
					"sf10_g{{ $grade }}_subject_qr1_art",
					"sf10_g{{ $grade }}_subject_qr1_pe",
					"sf10_g{{ $grade }}_subject_qr1_hp"
				]'></td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr2_mus",
					"sf10_g{{ $grade }}_subject_qr2_art",
					"sf10_g{{ $grade }}_subject_qr2_pe",
					"sf10_g{{ $grade }}_subject_qr2_hp"
				]'></td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr3_mus",
					"sf10_g{{ $grade }}_subject_qr3_art",
					"sf10_g{{ $grade }}_subject_qr3_pe",
					"sf10_g{{ $grade }}_subject_qr3_hp"
				]'></td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr4_mus",
					"sf10_g{{ $grade }}_subject_qr4_art",
					"sf10_g{{ $grade }}_subject_qr4_pe",
					"sf10_g{{ $grade }}_subject_qr4_hp"
				]'></td>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_mus",
					"sf10_g{{ $grade }}_subject_qr1_art",
					"sf10_g{{ $grade }}_subject_qr1_pe",
					"sf10_g{{ $grade }}_subject_qr1_hp",

					"sf10_g{{ $grade }}_subject_qr2_mus",
					"sf10_g{{ $grade }}_subject_qr2_art",
					"sf10_g{{ $grade }}_subject_qr2_pe",
					"sf10_g{{ $grade }}_subject_qr2_hp",

					"sf10_g{{ $grade }}_subject_qr3_mus",
					"sf10_g{{ $grade }}_subject_qr3_art",
					"sf10_g{{ $grade }}_subject_qr3_pe",
					"sf10_g{{ $grade }}_subject_qr3_hp",

					"sf10_g{{ $grade }}_subject_qr4_mus",
					"sf10_g{{ $grade }}_subject_qr4_art",
					"sf10_g{{ $grade }}_subject_qr4_pe",
					"sf10_g{{ $grade }}_subject_qr4_hp"
				]'></td>
				<td class = "text-center" data-property = "remarks" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_mus",
					"sf10_g{{ $grade }}_subject_qr1_art",
					"sf10_g{{ $grade }}_subject_qr1_pe",
					"sf10_g{{ $grade }}_subject_qr1_hp",

					"sf10_g{{ $grade }}_subject_qr2_mus",
					"sf10_g{{ $grade }}_subject_qr2_art",
					"sf10_g{{ $grade }}_subject_qr2_pe",
					"sf10_g{{ $grade }}_subject_qr2_hp",

					"sf10_g{{ $grade }}_subject_qr3_mus",
					"sf10_g{{ $grade }}_subject_qr3_art",
					"sf10_g{{ $grade }}_subject_qr3_pe",
					"sf10_g{{ $grade }}_subject_qr3_hp",

					"sf10_g{{ $grade }}_subject_qr4_mus",
					"sf10_g{{ $grade }}_subject_qr4_art",
					"sf10_g{{ $grade }}_subject_qr4_pe",
					"sf10_g{{ $grade }}_subject_qr4_hp"
				]'></td>
			</tr>

			<!-- Subject -> music -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Music</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_mus'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_mus'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_mus'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_mus'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td colspan = "2" rowspan = "4"></td>
			</tr>

			<!-- Subject -> arts -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Arts</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_art'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_art'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_art'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_art'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
			</tr>

			<!-- Subject -> physical education -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Physical Education</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_pe'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_pe'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_pe'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_pe'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
			</tr>

			<!-- Subject -> health -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Health</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_hp'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_hp'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_hp'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
				<td class = "highlight">
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_hp'} }}"
						{{ $student->ST_locker ? "disabled" : "" }}
					>
				</td>
			</tr>

			<!-- Subject -> nihongo -->

			@if ($student->{'ST_sf10_g'.$grade.'_subject_jp'})

				<tr>
					<td colspan = "2">Nihongo {{ $grade }}</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf10_g{{ $grade }}_subject_qr1_jp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_jp'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf10_g{{ $grade }}_subject_qr2_jp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_jp'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf10_g{{ $grade }}_subject_qr3_jp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_jp'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf10_g{{ $grade }}_subject_qr4_jp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_jp'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf10_g{{ $grade }}_subject_qr1_jp",
						"sf10_g{{ $grade }}_subject_qr2_jp",
						"sf10_g{{ $grade }}_subject_qr3_jp",
						"sf10_g{{ $grade }}_subject_qr4_jp"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf10_g{{ $grade }}_subject_qr1_jp",
						"sf10_g{{ $grade }}_subject_qr2_jp",
						"sf10_g{{ $grade }}_subject_qr3_jp",
						"sf10_g{{ $grade }}_subject_qr4_jp"
					]'></td>
				</tr>

			@endif

			<!-- Average -> all -->
			<tr>
				<th class = "border-right-none" colspan = "2"></th>
				<th class = "border-left-none" colspan = "4">General Average</th>
				<td class = "text-center" data-property = "average" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_fil",
					"sf10_g{{ $grade }}_subject_qr2_fil",
					"sf10_g{{ $grade }}_subject_qr3_fil",
					"sf10_g{{ $grade }}_subject_qr4_fil",

					"sf10_g{{ $grade }}_subject_qr1_eng",
					"sf10_g{{ $grade }}_subject_qr2_eng",
					"sf10_g{{ $grade }}_subject_qr3_eng",
					"sf10_g{{ $grade }}_subject_qr4_eng",

					"sf10_g{{ $grade }}_subject_qr1_mat",
					"sf10_g{{ $grade }}_subject_qr2_mat",
					"sf10_g{{ $grade }}_subject_qr3_mat",
					"sf10_g{{ $grade }}_subject_qr4_mat",

					"sf10_g{{ $grade }}_subject_qr1_sci",
					"sf10_g{{ $grade }}_subject_qr2_sci",
					"sf10_g{{ $grade }}_subject_qr3_sci",
					"sf10_g{{ $grade }}_subject_qr4_sci",

					"sf10_g{{ $grade }}_subject_qr1_ap",
					"sf10_g{{ $grade }}_subject_qr2_ap",
					"sf10_g{{ $grade }}_subject_qr3_ap",
					"sf10_g{{ $grade }}_subject_qr4_ap",

					"sf10_g{{ $grade }}_subject_qr1_ep",
					"sf10_g{{ $grade }}_subject_qr2_ep",
					"sf10_g{{ $grade }}_subject_qr3_ep",
					"sf10_g{{ $grade }}_subject_qr4_ep",

					"sf10_g{{ $grade }}_subject_qr1_tle",
					"sf10_g{{ $grade }}_subject_qr2_tle",
					"sf10_g{{ $grade }}_subject_qr3_tle",
					"sf10_g{{ $grade }}_subject_qr4_tle",

					"sf10_g{{ $grade }}_subject_qr1_mus",
					"sf10_g{{ $grade }}_subject_qr2_mus",
					"sf10_g{{ $grade }}_subject_qr3_mus",
					"sf10_g{{ $grade }}_subject_qr4_mus",

					"sf10_g{{ $grade }}_subject_qr1_art",
					"sf10_g{{ $grade }}_subject_qr2_art",
					"sf10_g{{ $grade }}_subject_qr3_art",
					"sf10_g{{ $grade }}_subject_qr4_art",

					"sf10_g{{ $grade }}_subject_qr1_pe",
					"sf10_g{{ $grade }}_subject_qr2_pe",
					"sf10_g{{ $grade }}_subject_qr3_pe",
					"sf10_g{{ $grade }}_subject_qr4_pe",

					"sf10_g{{ $grade }}_subject_qr1_hp",
					"sf10_g{{ $grade }}_subject_qr2_hp",
					"sf10_g{{ $grade }}_subject_qr3_hp",
					"sf10_g{{ $grade }}_subject_qr4_hp",

					"sf10_g{{ $grade }}_subject_qr1_jp",
					"sf10_g{{ $grade }}_subject_qr2_jp",
					"sf10_g{{ $grade }}_subject_qr3_jp",
					"sf10_g{{ $grade }}_subject_qr4_jp"
				]'></td>
				<td class = "text-center" data-property = "grand" data-targets = '[
					"sf10_g{{ $grade }}_subject_qr1_fil",
					"sf10_g{{ $grade }}_subject_qr2_fil",
					"sf10_g{{ $grade }}_subject_qr3_fil",
					"sf10_g{{ $grade }}_subject_qr4_fil",

					"sf10_g{{ $grade }}_subject_qr1_eng",
					"sf10_g{{ $grade }}_subject_qr2_eng",
					"sf10_g{{ $grade }}_subject_qr3_eng",
					"sf10_g{{ $grade }}_subject_qr4_eng",

					"sf10_g{{ $grade }}_subject_qr1_mat",
					"sf10_g{{ $grade }}_subject_qr2_mat",
					"sf10_g{{ $grade }}_subject_qr3_mat",
					"sf10_g{{ $grade }}_subject_qr4_mat",

					"sf10_g{{ $grade }}_subject_qr1_sci",
					"sf10_g{{ $grade }}_subject_qr2_sci",
					"sf10_g{{ $grade }}_subject_qr3_sci",
					"sf10_g{{ $grade }}_subject_qr4_sci",

					"sf10_g{{ $grade }}_subject_qr1_ap",
					"sf10_g{{ $grade }}_subject_qr2_ap",
					"sf10_g{{ $grade }}_subject_qr3_ap",
					"sf10_g{{ $grade }}_subject_qr4_ap",

					"sf10_g{{ $grade }}_subject_qr1_ep",
					"sf10_g{{ $grade }}_subject_qr2_ep",
					"sf10_g{{ $grade }}_subject_qr3_ep",
					"sf10_g{{ $grade }}_subject_qr4_ep",

					"sf10_g{{ $grade }}_subject_qr1_tle",
					"sf10_g{{ $grade }}_subject_qr2_tle",
					"sf10_g{{ $grade }}_subject_qr3_tle",
					"sf10_g{{ $grade }}_subject_qr4_tle",

					"sf10_g{{ $grade }}_subject_qr1_mus",
					"sf10_g{{ $grade }}_subject_qr2_mus",
					"sf10_g{{ $grade }}_subject_qr3_mus",
					"sf10_g{{ $grade }}_subject_qr4_mus",

					"sf10_g{{ $grade }}_subject_qr1_art",
					"sf10_g{{ $grade }}_subject_qr2_art",
					"sf10_g{{ $grade }}_subject_qr3_art",
					"sf10_g{{ $grade }}_subject_qr4_art",

					"sf10_g{{ $grade }}_subject_qr1_pe",
					"sf10_g{{ $grade }}_subject_qr2_pe",
					"sf10_g{{ $grade }}_subject_qr3_pe",
					"sf10_g{{ $grade }}_subject_qr4_pe",

					"sf10_g{{ $grade }}_subject_qr1_hp",
					"sf10_g{{ $grade }}_subject_qr2_hp",
					"sf10_g{{ $grade }}_subject_qr3_hp",
					"sf10_g{{ $grade }}_subject_qr4_hp",

					"sf10_g{{ $grade }}_subject_qr1_jp",
					"sf10_g{{ $grade }}_subject_qr2_jp",
					"sf10_g{{ $grade }}_subject_qr3_jp",
					"sf10_g{{ $grade }}_subject_qr4_jp"
				]'></td>
			</tr>

			<!-- Remedial -->
			<tr>
				<th style = "min-width: 339px;">Remedial Classes</td>
				<td class = "border-right-none highlight" colspan = "5">
					<label>
						<span>Conducted from (MM/DD/YYYY):&nbsp;</span>
						<input
							name = "sf10_g{{ $grade }}_record_remedial_date_start"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'sf10_g'.$grade.'_record_remedial_date_start'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</label>
				</td>
				<td class = "border-left-none highlight" colspan = "2">
					<label>
						<span>to (MM/DD/YYYY):&nbsp;</span>
						<input
							name = "sf10_g{{ $grade }}_record_remedial_date_end"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'sf10_g'.$grade.'_record_remedial_date_end'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</label>
				</td>
			</tr>
			<tr>
				<th>Learning Areas</th>
				<th>Final Rating</th>
				<th colspan = "4">Remedial Class Mark</th>
				<th>Recomputed Final</th>
				<th>Remarks</th>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td colspan = "4">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

		</table>
	</div>
</div>
