<div class = "container-fluid paper">
	<div class = "row">
		<div class = "col-6">
			<h6 class = "heading">Report on Learning Progress and Achievement</h6>
			<span class = "font-bold text-uppercase">Name: {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</span>
			<table class = "table">
				<tr>
					<th rowspan = "2">Learning Areas</th>
					<th colspan = "4">Quarter</th>
					<th rowspan = "2">Final Rating</th>
					<th rowspan = "2">Remarks</th>
				</tr>
				<tr>
					<th class = "table-cell-thin">1st</th>
					<th class = "table-cell-thin">2nd</th>
					<th class = "table-cell-thin">3rd</th>
					<th class = "table-cell-thin">4th</th>
				</tr>
				<tr>
					<td>Filipino {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_fil ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_fil"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_fil'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_fil ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_fil ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_fil"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_fil'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_fil ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_fil ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_fil"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_fil'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_fil ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_fil ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_fil"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_fil'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_fil ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_fil",
						"sf9_g{{ $grade->grade }}_subject_qr2_fil",
						"sf9_g{{ $grade->grade }}_subject_qr3_fil",
						"sf9_g{{ $grade->grade }}_subject_qr4_fil"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_fil",
						"sf9_g{{ $grade->grade }}_subject_qr2_fil",
						"sf9_g{{ $grade->grade }}_subject_qr3_fil",
						"sf9_g{{ $grade->grade }}_subject_qr4_fil"
					]'></td>
				</tr>
				<tr>
					<td>English {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_eng ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_eng"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_eng'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_eng ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_eng ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_eng"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_eng'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_eng ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_eng ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_eng"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_eng'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_eng ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_eng ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_eng"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_eng'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_eng ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_eng",
						"sf9_g{{ $grade->grade }}_subject_qr2_eng",
						"sf9_g{{ $grade->grade }}_subject_qr3_eng",
						"sf9_g{{ $grade->grade }}_subject_qr4_eng"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_eng",
						"sf9_g{{ $grade->grade }}_subject_qr2_eng",
						"sf9_g{{ $grade->grade }}_subject_qr3_eng",
						"sf9_g{{ $grade->grade }}_subject_qr4_eng"
					]'></td>
				</tr>
				<tr>
					<td>Mathemathics {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mat ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_mat"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_mat'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mat ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mat ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_mat"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_mat'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mat ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mat ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_mat"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_mat'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mat ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mat ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_mat"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_mat'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mat ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_mat",
						"sf9_g{{ $grade->grade }}_subject_qr2_mat",
						"sf9_g{{ $grade->grade }}_subject_qr3_mat",
						"sf9_g{{ $grade->grade }}_subject_qr4_mat"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_mat",
						"sf9_g{{ $grade->grade }}_subject_qr2_mat",
						"sf9_g{{ $grade->grade }}_subject_qr3_mat",
						"sf9_g{{ $grade->grade }}_subject_qr4_mat"
					]'></td>
				</tr>
				<tr>
					<td>Science {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_sci ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_sci"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_sci'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_sci ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_sci ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_sci"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_sci'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_sci ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_sci ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_sci"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_sci'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_sci ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_sci ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_sci"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_sci'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_sci ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_sci",
						"sf9_g{{ $grade->grade }}_subject_qr2_sci",
						"sf9_g{{ $grade->grade }}_subject_qr3_sci",
						"sf9_g{{ $grade->grade }}_subject_qr4_sci"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_sci",
						"sf9_g{{ $grade->grade }}_subject_qr2_sci",
						"sf9_g{{ $grade->grade }}_subject_qr3_sci",
						"sf9_g{{ $grade->grade }}_subject_qr4_sci"
					]'></td>
				</tr>
				<tr>
					<td>Araling Panlipunan (AP) {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ap ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_ap"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_ap'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ap ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ap ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_ap"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_ap'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ap ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ap ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_ap"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_ap'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ap ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ap ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_ap"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_ap'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ap ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_ap",
						"sf9_g{{ $grade->grade }}_subject_qr2_ap",
						"sf9_g{{ $grade->grade }}_subject_qr3_ap",
						"sf9_g{{ $grade->grade }}_subject_qr4_ap"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_ap",
						"sf9_g{{ $grade->grade }}_subject_qr2_ap",
						"sf9_g{{ $grade->grade }}_subject_qr3_ap",
						"sf9_g{{ $grade->grade }}_subject_qr4_ap"
					]'></td>
				</tr>
				<tr>
					<td>Edukasyon sa Pagpapakatao (EP) {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ep ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_ep"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_ep'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ep ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ep ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_ep"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_ep'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ep ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ep ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_ep"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_ep'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ep ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_ep ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_ep"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_ep'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_ep ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_ep",
						"sf9_g{{ $grade->grade }}_subject_qr2_ep",
						"sf9_g{{ $grade->grade }}_subject_qr3_ep",
						"sf9_g{{ $grade->grade }}_subject_qr4_ep"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_ep",
						"sf9_g{{ $grade->grade }}_subject_qr2_ep",
						"sf9_g{{ $grade->grade }}_subject_qr3_ep",
						"sf9_g{{ $grade->grade }}_subject_qr4_ep"
					]'></td>
				</tr>
				<tr>
					<td>Technology and Livelihood Education (TLE) {{ $grade->grade }}</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_tle ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_tle"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_tle'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_tle ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_tle ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_tle"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_tle'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_tle ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_tle ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_tle"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_tle'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_tle ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_tle ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_tle"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_tle'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_tle ? 'disabled' : '' }}
						>
					</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_tle",
						"sf9_g{{ $grade->grade }}_subject_qr2_tle",
						"sf9_g{{ $grade->grade }}_subject_qr3_tle",
						"sf9_g{{ $grade->grade }}_subject_qr4_tle"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_tle",
						"sf9_g{{ $grade->grade }}_subject_qr2_tle",
						"sf9_g{{ $grade->grade }}_subject_qr3_tle",
						"sf9_g{{ $grade->grade }}_subject_qr4_tle"
					]'></td>
				</tr>
				<tr>
					<td>MAPEH {{ $grade->grade }}</td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_mus",
						"sf9_g{{ $grade->grade }}_subject_qr1_art",
						"sf9_g{{ $grade->grade }}_subject_qr1_pe",
						"sf9_g{{ $grade->grade }}_subject_qr1_hp"
					]'></td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr2_mus",
						"sf9_g{{ $grade->grade }}_subject_qr2_art",
						"sf9_g{{ $grade->grade }}_subject_qr2_pe",
						"sf9_g{{ $grade->grade }}_subject_qr2_hp"
					]'></td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr3_mus",
						"sf9_g{{ $grade->grade }}_subject_qr3_art",
						"sf9_g{{ $grade->grade }}_subject_qr3_pe",
						"sf9_g{{ $grade->grade }}_subject_qr3_hp"
					]'></td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr4_mus",
						"sf9_g{{ $grade->grade }}_subject_qr4_art",
						"sf9_g{{ $grade->grade }}_subject_qr4_pe",
						"sf9_g{{ $grade->grade }}_subject_qr4_hp"
					]'></td>
					<td class = "text-center" data-property = "average" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_mus",
						"sf9_g{{ $grade->grade }}_subject_qr1_art",
						"sf9_g{{ $grade->grade }}_subject_qr1_pe",
						"sf9_g{{ $grade->grade }}_subject_qr1_hp",
						"sf9_g{{ $grade->grade }}_subject_qr2_mus",
						"sf9_g{{ $grade->grade }}_subject_qr2_art",
						"sf9_g{{ $grade->grade }}_subject_qr2_pe",
						"sf9_g{{ $grade->grade }}_subject_qr2_hp",
						"sf9_g{{ $grade->grade }}_subject_qr3_mus",
						"sf9_g{{ $grade->grade }}_subject_qr3_art",
						"sf9_g{{ $grade->grade }}_subject_qr3_pe",
						"sf9_g{{ $grade->grade }}_subject_qr3_hp",
						"sf9_g{{ $grade->grade }}_subject_qr4_mus",
						"sf9_g{{ $grade->grade }}_subject_qr4_art",
						"sf9_g{{ $grade->grade }}_subject_qr4_pe",
						"sf9_g{{ $grade->grade }}_subject_qr4_hp"
					]'></td>
					<td class = "text-center" data-property = "remarks" data-targets = '[
						"sf9_g{{ $grade->grade }}_subject_qr1_mus",
						"sf9_g{{ $grade->grade }}_subject_qr1_art",
						"sf9_g{{ $grade->grade }}_subject_qr1_pe",
						"sf9_g{{ $grade->grade }}_subject_qr1_hp",
						"sf9_g{{ $grade->grade }}_subject_qr2_mus",
						"sf9_g{{ $grade->grade }}_subject_qr2_art",
						"sf9_g{{ $grade->grade }}_subject_qr2_pe",
						"sf9_g{{ $grade->grade }}_subject_qr2_hp",
						"sf9_g{{ $grade->grade }}_subject_qr3_mus",
						"sf9_g{{ $grade->grade }}_subject_qr3_art",
						"sf9_g{{ $grade->grade }}_subject_qr3_pe",
						"sf9_g{{ $grade->grade }}_subject_qr3_hp",
						"sf9_g{{ $grade->grade }}_subject_qr4_mus",
						"sf9_g{{ $grade->grade }}_subject_qr4_art",
						"sf9_g{{ $grade->grade }}_subject_qr4_pe",
						"sf9_g{{ $grade->grade }}_subject_qr4_hp"
					]'></td>
				</tr>
				<tr>
					<td style = "text-indent: 15px;">Music</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_mus"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_mus'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_mus"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_mus'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_mus"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_mus'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_mus"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_mus'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td colspan = "2" rowspan = "4"></td>
				</tr>
				<tr>
					<td style = "text-indent: 15px;">Arts</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_art"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_art'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_art"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_art'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_art"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_art'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_art"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_art'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
				</tr>
				<tr>
					<td style = "text-indent: 15px;">Physical Education</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_pe"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_pe'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_pe"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_pe'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_pe"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_pe'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_pe"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_pe'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
				</tr>
				<tr>
					<td style = "text-indent: 15px;">Health</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr1_hp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_hp'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr2_hp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_hp'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr3_hp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_hp'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
					<td class = "{{ $student->ST_locker || !$auth->ST_subject_mapeh ? '' : 'highlight' }}">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_subject_qr4_hp"
							type = "number"
							min = "0"
							max = "100"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_hp'} }}"
							{{ $student->ST_locker || !$auth->ST_subject_mapeh ? 'disabled' : '' }}
						>
					</td>
				</tr>
				@if ($student->{'ST_sf9_g'.$grade->grade.'_subject_jp'})
					<tr>
						<td>Nihongo {{ $grade->grade }}</td>
						<td class = "{{ $student->ST_locker || !$auth->ST_subject_jp ? '' : 'highlight' }}">
							<input
								class = "text-center"
								name = "sf9_g{{ $grade->grade }}_subject_qr1_jp"
								type = "number"
								min = "0"
								max = "100"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr1_jp'} }}"
								{{ $student->ST_locker || !$auth->ST_subject_jp ? 'disabled' : '' }}
							>
						</td>
						<td class = "{{ $student->ST_locker || !$auth->ST_subject_jp ? '' : 'highlight' }}">
							<input
								class = "text-center"
								name = "sf9_g{{ $grade->grade }}_subject_qr2_jp"
								type = "number"
								min = "0"
								max = "100"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr2_jp'} }}"
								{{ $student->ST_locker || !$auth->ST_subject_jp ? 'disabled' : '' }}
							>
						</td>
						<td class = "{{ $student->ST_locker || !$auth->ST_subject_jp ? '' : 'highlight' }}">
							<input
								class = "text-center"
								name = "sf9_g{{ $grade->grade }}_subject_qr3_jp"
								type = "number"
								min = "0"
								max = "100"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr3_jp'} }}"
								{{ $student->ST_locker || !$auth->ST_subject_jp ? 'disabled' : '' }}
							>
						</td>
						<td class = "{{ $student->ST_locker || !$auth->ST_subject_jp ? '' : 'highlight' }}">
							<input
								class = "text-center"
								name = "sf9_g{{ $grade->grade }}_subject_qr4_jp"
								type = "number"
								min = "0"
								max = "100"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_subject_qr4_jp'} }}"
								{{ $student->ST_locker || !$auth->ST_subject_jp ? 'disabled' : '' }}
							>
						</td>
						<td class = "text-center" data-property = "average" data-targets = '[
							"sf9_g{{ $grade->grade }}_subject_qr1_jp",
							"sf9_g{{ $grade->grade }}_subject_qr2_jp",
							"sf9_g{{ $grade->grade }}_subject_qr3_jp",
							"sf9_g{{ $grade->grade }}_subject_qr4_jp"
						]'></td>
						<td class = "text-center" data-property = "remarks" data-targets = '[
							"sf9_g{{ $grade->grade }}_subject_qr1_jp",
							"sf9_g{{ $grade->grade }}_subject_qr2_jp",
							"sf9_g{{ $grade->grade }}_subject_qr3_jp",
							"sf9_g{{ $grade->grade }}_subject_qr4_jp"
						]'></td>
					</tr>
				@endif
			</table>
			<div class = "display-flex font-bold text-uppercase">
				<div>General Average:&nbsp;</div>
				<div data-property = "average" data-targets = '[
					"sf9_g{{ $grade->grade }}_subject_qr1_fil",
					"sf9_g{{ $grade->grade }}_subject_qr2_fil",
					"sf9_g{{ $grade->grade }}_subject_qr3_fil",
					"sf9_g{{ $grade->grade }}_subject_qr4_fil",
					"sf9_g{{ $grade->grade }}_subject_qr1_eng",
					"sf9_g{{ $grade->grade }}_subject_qr2_eng",
					"sf9_g{{ $grade->grade }}_subject_qr3_eng",
					"sf9_g{{ $grade->grade }}_subject_qr4_eng",
					"sf9_g{{ $grade->grade }}_subject_qr1_mat",
					"sf9_g{{ $grade->grade }}_subject_qr2_mat",
					"sf9_g{{ $grade->grade }}_subject_qr3_mat",
					"sf9_g{{ $grade->grade }}_subject_qr4_mat",
					"sf9_g{{ $grade->grade }}_subject_qr1_sci",
					"sf9_g{{ $grade->grade }}_subject_qr2_sci",
					"sf9_g{{ $grade->grade }}_subject_qr3_sci",
					"sf9_g{{ $grade->grade }}_subject_qr4_sci",
					"sf9_g{{ $grade->grade }}_subject_qr1_ap",
					"sf9_g{{ $grade->grade }}_subject_qr2_ap",
					"sf9_g{{ $grade->grade }}_subject_qr3_ap",
					"sf9_g{{ $grade->grade }}_subject_qr4_ap",
					"sf9_g{{ $grade->grade }}_subject_qr1_ep",
					"sf9_g{{ $grade->grade }}_subject_qr2_ep",
					"sf9_g{{ $grade->grade }}_subject_qr3_ep",
					"sf9_g{{ $grade->grade }}_subject_qr4_ep",
					"sf9_g{{ $grade->grade }}_subject_qr1_tle",
					"sf9_g{{ $grade->grade }}_subject_qr2_tle",
					"sf9_g{{ $grade->grade }}_subject_qr3_tle",
					"sf9_g{{ $grade->grade }}_subject_qr4_tle",
					"sf9_g{{ $grade->grade }}_subject_qr1_mus",
					"sf9_g{{ $grade->grade }}_subject_qr2_mus",
					"sf9_g{{ $grade->grade }}_subject_qr3_mus",
					"sf9_g{{ $grade->grade }}_subject_qr4_mus",
					"sf9_g{{ $grade->grade }}_subject_qr1_art",
					"sf9_g{{ $grade->grade }}_subject_qr2_art",
					"sf9_g{{ $grade->grade }}_subject_qr3_art",
					"sf9_g{{ $grade->grade }}_subject_qr4_art",
					"sf9_g{{ $grade->grade }}_subject_qr1_pe",
					"sf9_g{{ $grade->grade }}_subject_qr2_pe",
					"sf9_g{{ $grade->grade }}_subject_qr3_pe",
					"sf9_g{{ $grade->grade }}_subject_qr4_pe",
					"sf9_g{{ $grade->grade }}_subject_qr1_hp",
					"sf9_g{{ $grade->grade }}_subject_qr2_hp",
					"sf9_g{{ $grade->grade }}_subject_qr3_hp",
					"sf9_g{{ $grade->grade }}_subject_qr4_hp",
					"sf9_g{{ $grade->grade }}_subject_qr1_jp",
					"sf9_g{{ $grade->grade }}_subject_qr2_jp",
					"sf9_g{{ $grade->grade }}_subject_qr3_jp",
					"sf9_g{{ $grade->grade }}_subject_qr4_jp"
				]'></div>
			</div>
			<table class = "table">
				<tr>
					<th>Descriptors</th>
					<th>Grading Scale</th>
					<th>Remarks</th>
				</tr>
				<tr>
					<td>Outstanding</td>
					<td class = "text-center">90-100</td>
					<td class = "text-center">Passed</td>
				</tr>
				<tr>
					<td>Very Satisfactory</td>
					<td class = "text-center">85-89</td>
					<td class = "text-center">Passed</td>
				</tr>
				<tr>
					<td>Satisfactory</td>
					<td class = "text-center">80-84</td>
					<td class = "text-center">Passed</td>
				</tr>
				<tr>
					<td>Fairly Satisfactory</td>
					<td class = "text-center">75-79</td>
					<td class = "text-center">Passed</td>
				</tr>
				<tr>
					<td>Did Not Meet Expectations</td>
					<td class = "text-center">Below 75</td>
					<td class = "text-center">Failed</td>
				</tr>
			</table>
		</div>
		<div class = "col-6">
			<h6 class = "heading">Report on Learner's Observed Values</h6>
			<br>
			<table class = "table">
				<tr>
					<th rowspan = "2">Core Values</th>
					<th rowspan = "2">Behavior Statement</th>
					<th colspan = "4">Quarter</th>
				</tr>
				<tr>
					<th class = "table-cell-thin">1st</th>
					<th class = "table-cell-thin">2nd</th>
					<th class = "table-cell-thin">3rd</th>
					<th class = "table-cell-thin">4th</th>
				</tr>
				<tr>
					<td rowspan = "2">Maka - Diyos</td>
					<td>Expresses one's spiritual beliefs while respecting the spiritual beliefs of others.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_md_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_values_qr2_md_s1"
							{{ $student->ST_locker ? 'disabled' : '' }}
						>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_md_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_md_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Shows adherence to ethical principles by upholding truth.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_md_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_md_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr2_md_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_md_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_md_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_md_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_md_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_md_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td rowspan = "2">Maka - Tao</td>
					<td>Is sensitive to individual, social and cultural differences.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_mt_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr2_mt_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_mt_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_mt_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Demonstrates contributions toward solidarity.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_mt_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mt_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr2_mt_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mt_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_mt_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mt_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_mt_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mt_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Maka - Kalikasan</td>
					<td>Cares for the environment and utilizes resources  wisely, judiciously and economically.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_mk" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mk'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mk'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mk'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mk'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mk'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr2_mk" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mk'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mk'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mk'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mk'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mk'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_mk" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mk'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mk'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mk'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mk'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mk'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_mk" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mk'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mk'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mk'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mk'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mk'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td rowspan = "2">Maka - Bansa</td>
					<td>Demonstrates pride in being a Filipino; exercises the rights and responsibilities of a Filipino Citizen.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_mb_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr2_mb_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_mb_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_mb_s1" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s1'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s1'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s1'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s1'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s1'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Demonstrates appropriate behavior in carrying out activities in the school, community and country.</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr1_mb_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr1_mb_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr2_mb_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr2_mb_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr3_mb_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr3_mb_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
					<td class = "highlight">
						<select class = "text-center" name = "sf9_g{{ $grade->grade }}_values_qr4_mb_s2" {{ $student->ST_locker ? 'disabled' : '' }}>
							<option value = "" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s2'} == '' ? 'selected' : '' }}></option>
							<option value = "AO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s2'} == 'AO' ? 'selected' : '' }}>AO</option>
							<option value = "SO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s2'} == 'SO' ? 'selected' : '' }}>SO</option>
							<option value = "RO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s2'} == 'RO' ? 'selected' : '' }}>RO</option>
							<option value = "NO" {{ $student->{'sf9_g'.$grade->grade.'_values_qr4_mb_s2'} == 'NO' ? 'selected' : '' }}>NO</option>
						</select>
					</td>
				</tr>
			</table>
			<table class = "table">
				<tr>
					<th>Markings</th>
					<th>Non-numerical Rating</th>
				</tr>
				<tr>
					<td class = "text-center">AO</td>
					<td class = "text-center">Always Observed</td>
				</tr>
				<tr>
					<td class = "text-center">SO</td>
					<td class = "text-center">Sometimes Observed</td>
				</tr>
				<tr>
					<td class = "text-center">RO</td>
					<td class = "text-center">Rarely Observed</td>
				</tr>
				<tr>
					<td class = "text-center">NO</td>
					<td class = "text-center">Not Observed</td>
				</tr>
			</table>
		</div>
	</div>
</div>