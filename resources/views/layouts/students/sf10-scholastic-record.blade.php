<!-- Row 1 -->
<div class = "row">
	<div class = "col-2">
		<label>
			<span>School:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_name"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_name'} }}"
			>
		</label>
	</div>
	<div class = "col-2">
		<label>
			<span>School ID:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_id"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_id'} }}"
			>
		</label>
	</div>
	<div class = "col-2">
		<label>
			<span>District:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_district"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_district'} }}"
			>
		</label>
	</div>
	<div class = "col-4">
		<label>
			<span>Division:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_division"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_division'} }}"
			>
		</label>
	</div>
	<div class = "col-2">
		<label>
			<span>Region:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_region"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_region'} }}"
			>
		</label>
	</div>
</div>

<!-- Row 2 -->
<div class = "row">
	<div class = "col-2">
		<label>
			<span>Classified as Grade:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_grade"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_grade'} }}"
			>
		</label>
	</div>
	<div class = "col-2">
		<label>
			<span>Section:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_section"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_section'} }}"
			>
		</label>
	</div>
	<div class = "col-2">
		<label>
			<span>School Year:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_year"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_year'} }}"
			>
		</label>
	</div>
	<div class = "col-4">
		<label>
			<span>Name of Adviser/Teacher:&nbsp;</span>
			<input
				name = "sf10_g{{ $grade }}_record_school_teacher"
				type = "text"
				maxlength = "50"
				value = "{{ $student->{'sf10_g'.$grade.'_record_school_teacher'} }}"
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
				<th rowspan = "2" style = "width: 200px;">Final Rating</th>
				<th rowspan = "2" style = "width: 200px;">Remarks</th>
			</tr>
			<tr>
				<th style = "width: 50px;">1st</th>
				<th style = "width: 50px;">2nd</th>
				<th style = "width: 50px;">3rd</th>
				<th style = "width: 50px;">4th</th>
			</tr>

			<!-- Subject -> filipino -->
			<tr>
				<td colspan = "2">Filipino {{ $grade }}</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_fil'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_fil'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_fil'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_fil"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_fil'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_eng'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_eng'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_eng'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_eng"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_eng'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_mat'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_mat'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_mat'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_mat"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_mat'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_sci'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_sci'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_sci'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_sci"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_sci'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_ap'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_ap'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_ap'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_ap"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_ap'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_ep'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_ep'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_ep'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_ep"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_ep'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_tle'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_tle'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_tle'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_tle"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_tle'} }}"
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
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_mus'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_mus'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_mus'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_mus"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_mus'} }}"
					>
				</td>
				<td colspan = "2" rowspan = "4"></td>
			</tr>

			<!-- Subject -> arts -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Arts</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_art'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_art'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_art'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_art"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_art'} }}"
					>
				</td>
			</tr>

			<!-- Subject -> physical education -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Physical Education</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_pe'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_pe'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_pe'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_pe"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_pe'} }}"
					>
				</td>
			</tr>

			<!-- Subject -> health -->
			<tr>
				<td colspan = "2" style = "text-indent: 15px;">Health</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr1_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr1_hp'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr2_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr2_hp'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr3_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr3_hp'} }}"
					>
				</td>
				<td>
					<input
						class = "text-center"
						name = "sf10_g{{ $grade }}_subject_qr4_hp"
						type = "number"
						min = "0"
						max = "100"
						value = "{{ $student->{'sf10_g'.$grade.'_subject_qr4_hp'} }}"
					>
				</td>
			</tr>

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
					"sf10_g{{ $grade }}_subject_qr4_hp"
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
					"sf10_g{{ $grade }}_subject_qr4_hp"
				]'></td>
			</tr>

			<!-- Remedial -->
			<tr>
				<th style = "width: 339px;">Remedial Classes</td>
				<td class = "border-right-none" colspan = "5">
					<label>
						<span>Conducted from (MM/DD/YYYY):&nbsp;</span>
						<input
							name = "sf10_g{{ $grade }}_record_remedial_date_start"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'sf10_g'.$grade.'_record_remedial_date_start'} }}"
						>
					</label>
				</td>
				<td class = "border-left-none" colspan = "2">
					<label>
						<span>to (MM/DD/YYYY):&nbsp;</span>
						<input
							name = "sf10_g{{ $grade }}_record_remedial_date_end"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'sf10_g'.$grade.'_record_remedial_date_end'} }}"
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
