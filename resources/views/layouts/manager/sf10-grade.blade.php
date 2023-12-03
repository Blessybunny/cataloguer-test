<div class = "col-12">
			
	<div class = "row">
		<div class = "col-2">
			<span class = "debug-no-db-assoc">School:</span>
		</div>
		<div class = "col-2">
			<span class = "debug-no-db-assoc">School ID:</span>
		</div>
		<div class = "col-2">
			<span class = "debug-no-db-assoc">District:</span>
		</div>
		<div class = "col-3">
			<span class = "debug-no-db-assoc">Division:</span>
		</div>
		<div class = "col-3">
			<span class = "debug-no-db-assoc">Region:</span>
		</div>
		<div class = "col-2">
			<span class = "debug-no-db-assoc">Classified as Grade:</span>
		</div>
		<div class = "col-2">
			<span class = "debug-no-db-assoc">Section:</span>
		</div>
		<div class = "col-2">
			<span class = "debug-no-db-assoc">School Year:</span>
		</div>
		<div class = "col-6">
			<span class = "debug-no-db-assoc">Name of Adviser / Teacher:</span>
		</div>
	</div>

	<br>

	<table class = "table">
		<tr>
			<th class = "align-middle uppercase" colspan = "2" rowspan = "2">Learning Areas</th>
			<th class = "align-middle uppercase" colspan = "4">Quarter</th>
			<th class = "align-middle sf10-width-wide uppercase" rowspan = "2">Final Rating</th>
			<th class = "align-middle sf10-width-wide uppercase" rowspan = "2">Remarks</th>
		</tr>
		<tr>
			<th class = "align-middle sf10-width-thin">1st</th>
			<th class = "align-middle sf10-width-thin">2nd</th>
			<th class = "align-middle sf10-width-thin">3rd</th>
			<th class = "align-middle sf10-width-thin">4th</th>
		</tr>
		<tr>
			<td colspan = "2">Filipino {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_fil_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_fil_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_fil_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_fil_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_fil_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_fil_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">English {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_eng_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_eng_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_eng_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_eng_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_eng_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_eng_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">Mathematics {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mat_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mat_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mat_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mat_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mat_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mat_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">Science {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_sci_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_sci_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_sci_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_sci_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_sci_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_sci_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">Araling Panlipunan (AP) {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ap_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ap_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ap_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ap_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_ap_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_ap_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">Edukasyon sa Pagpapakatao (EP) {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ep_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ep_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ep_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_ep_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_ep_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_ep_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">Technology and Livelihood Education (TLE) {{ $grade }}</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_tle_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_tle_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_tle_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_tle_qr4"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_tle_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_tle_remarks"></td>
		</tr>
		<tr>
			<td colspan = "2">MAPEH {{ $grade }}</td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mapeh_qr1_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mapeh_qr2_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mapeh_qr3_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mapeh_qr4_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mapeh_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mapeh_remarks"></td>
		</tr>
		<tr>
			<td class = "sf10-indent" colspan = "2">Music</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mus_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mus_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mus_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_mus_qr4"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mus_average"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_mus_remarks"></td>
		</tr>
		<tr>
			<td class = "sf10-indent" colspan = "2">Arts</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_art_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_art_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_art_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_art_qr4"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_art_average"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_art_remarks"></td>
		</tr>
		<tr>
			<td class = "sf10-indent" colspan = "2">Physical Education</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_pe_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_pe_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_pe_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_pe_qr4"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_pe_average"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_pe_remarks"></td>
		</tr>
		<tr>
			<td class = "sf10-indent" colspan = "2">Health</td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_hp_qr1"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_hp_qr2"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_hp_qr3"></td>
			<td class = "align-middle debug-field" data-interactive = "true" data-field = "ALL_g{{ $grade }}_subject_hp_qr4"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_hp_average"></td>
			<td class = "align-middle all-custom-border debug-compute" data-compute = "ALL_g{{ $grade }}_subject_hp_remarks"></td>
		</tr>
		<tr>
			<th class = "sf10-custom-border-1" colspan = "2"></th>
			<th class = "align-middle sf10-custom-border-2 uppercase" colspan = "4">General Average</th>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_all_average"></td>
			<td class = "align-middle debug-compute" data-compute = "ALL_g{{ $grade }}_subject_all_remarks"></td>
		</tr>
		<tr>
			<th class = "align-middle uppercase">Remedial Classes</td>
			<td class = "align-middle debug-no-db-assoc" colspan = "7">Conducted from (mm/dd/yyyy) __/__/____ to (mm/dd/yyyy) __/__/____</td>
		</tr>
		<tr>
			<th class = "bold align-middle uppercase">Learning Areas</th>
			<th class = "bold align-middle uppercase">Final Rating</th>
			<th class = "bold align-middle uppercase" colspan = "4">Remedial Class Mark</th>
			<th class = "bold align-middle uppercase">Recomputed Final</th>
			<th class = "bold align-middle uppercase">Remarks</th>
		</tr>
		<tr>
			<td class ="debug-no-db-assoc">&nbsp;</td>
			<td class ="debug-no-db-assoc">&nbsp;</td>
			<td colspan = "4" class ="debug-no-db-assoc">&nbsp;</td>
			<td class ="debug-no-db-assoc">&nbsp;</td>
			<td class ="debug-no-db-assoc">&nbsp;</td>
		</tr>
	</table>
		
</div>