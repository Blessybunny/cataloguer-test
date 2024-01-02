<div class = "col-12">
			
	<div class = "row">
		<div class = "col-2">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_name" data-label = "School: "></span>
		</div>
		<div class = "col-2">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_id" data-label = "School ID: "></span>
		</div>
		<div class = "col-2">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_district" data-label = "District: "></span>
		</div>
		<div class = "col-3">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_division" data-label = "Division: "></span>
		</div>
		<div class = "col-3">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_region" data-label = "Region: "></span>
		</div>
		<div class = "col-2">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_grade" data-label = "Classified as Grade: "></span>
		</div>
		<div class = "col-2">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_section" data-label = "Section: "></span>
		</div>
		<div class = "col-2">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_year" data-label = "School Year: "></span>
		</div>
		<div class = "col-6">
			<span data-type = "text" data-parameters = "record_g{{ $grade }}_school_teacher" data-label = "Name of Adviser / Teacher: "></span>
		</div>
	</div>

	<br>

	<table class = "table">
		<tr>
			<th class = "align-middle uppercase" colspan = "2" rowspan = "2">Learning Areas</th>
			<th class = "align-middle uppercase" colspan = "4">Quarter</th>
			<th class = "align-middle uppercase table-cell-wider" rowspan = "2">Final Rating</th>
			<th class = "align-middle uppercase table-cell-wider" rowspan = "2">Remarks</th>
		</tr>
		<tr>
			<th class = "align-middle table-cell-thin">1st</th>
			<th class = "align-middle table-cell-thin">2nd</th>
			<th class = "align-middle table-cell-thin">3rd</th>
			<th class = "align-middle table-cell-thin">4th</th>
		</tr>
		<tr>
			<td colspan = "2">Filipino {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_fil_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_fil_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_fil_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_fil_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_fil_qr1",
				"subject_g{{ $grade }}_fil_qr2",
				"subject_g{{ $grade }}_fil_qr3",
				"subject_g{{ $grade }}_fil_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_fil_qr1",
				"subject_g{{ $grade }}_fil_qr2",
				"subject_g{{ $grade }}_fil_qr3",
				"subject_g{{ $grade }}_fil_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">English {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_eng_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_eng_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_eng_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_eng_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_eng_qr1",
				"subject_g{{ $grade }}_eng_qr2",
				"subject_g{{ $grade }}_eng_qr3",
				"subject_g{{ $grade }}_eng_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_eng_qr1",
				"subject_g{{ $grade }}_eng_qr2",
				"subject_g{{ $grade }}_eng_qr3",
				"subject_g{{ $grade }}_eng_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">Mathematics {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mat_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mat_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mat_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mat_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_mat_qr1",
				"subject_g{{ $grade }}_mat_qr2",
				"subject_g{{ $grade }}_mat_qr3",
				"subject_g{{ $grade }}_mat_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_mat_qr1",
				"subject_g{{ $grade }}_mat_qr2",
				"subject_g{{ $grade }}_mat_qr3",
				"subject_g{{ $grade }}_mat_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">Science {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_sci_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_sci_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_sci_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_sci_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_sci_qr1",
				"subject_g{{ $grade }}_sci_qr2",
				"subject_g{{ $grade }}_sci_qr3",
				"subject_g{{ $grade }}_sci_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_sci_qr1",
				"subject_g{{ $grade }}_sci_qr2",
				"subject_g{{ $grade }}_sci_qr3",
				"subject_g{{ $grade }}_sci_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">Araling Panlipunan (AP) {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ap_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ap_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ap_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ap_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_ap_qr1",
				"subject_g{{ $grade }}_ap_qr2",
				"subject_g{{ $grade }}_ap_qr3",
				"subject_g{{ $grade }}_ap_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_ap_qr1",
				"subject_g{{ $grade }}_ap_qr2",
				"subject_g{{ $grade }}_ap_qr3",
				"subject_g{{ $grade }}_ap_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">Edukasyon sa Pagpapakatao (EP) {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ep_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ep_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ep_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_ep_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_ep_qr1",
				"subject_g{{ $grade }}_ep_qr2",
				"subject_g{{ $grade }}_ep_qr3",
				"subject_g{{ $grade }}_ep_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_ep_qr1",
				"subject_g{{ $grade }}_ep_qr2",
				"subject_g{{ $grade }}_ep_qr3",
				"subject_g{{ $grade }}_ep_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">Technology and Livelihood Education (TLE) {{ $grade }}</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_tle_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_tle_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_tle_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_tle_qr4"></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_tle_qr1",
				"subject_g{{ $grade }}_tle_qr2",
				"subject_g{{ $grade }}_tle_qr3",
				"subject_g{{ $grade }}_tle_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_tle_qr1",
				"subject_g{{ $grade }}_tle_qr2",
				"subject_g{{ $grade }}_tle_qr3",
				"subject_g{{ $grade }}_tle_qr4"
			]'></td>
		</tr>
		<tr>
			<td colspan = "2">MAPEH {{ $grade }}</td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_mus_qr1",
				"subject_g{{ $grade }}_art_qr1",
				"subject_g{{ $grade }}_pe_qr1",
				"subject_g{{ $grade }}_hp_qr1"
			]'></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_mus_qr2",
				"subject_g{{ $grade }}_art_qr2",
				"subject_g{{ $grade }}_pe_qr2",
				"subject_g{{ $grade }}_hp_qr2"
			]'></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_mus_qr3",
				"subject_g{{ $grade }}_art_qr3",
				"subject_g{{ $grade }}_pe_qr3",
				"subject_g{{ $grade }}_hp_qr3"
			]'></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_mus_qr4",
				"subject_g{{ $grade }}_art_qr4",
				"subject_g{{ $grade }}_pe_qr4",
				"subject_g{{ $grade }}_hp_qr4"
			]'></td>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_mus_qr1",
				"subject_g{{ $grade }}_mus_qr2",
				"subject_g{{ $grade }}_mus_qr3",
				"subject_g{{ $grade }}_mus_qr4",
				"subject_g{{ $grade }}_art_qr1",
				"subject_g{{ $grade }}_art_qr2",
				"subject_g{{ $grade }}_art_qr3",
				"subject_g{{ $grade }}_art_qr4",
				"subject_g{{ $grade }}_pe_qr1",
				"subject_g{{ $grade }}_pe_qr2",
				"subject_g{{ $grade }}_pe_qr3",
				"subject_g{{ $grade }}_pe_qr4",
				"subject_g{{ $grade }}_hp_qr1",
				"subject_g{{ $grade }}_hp_qr2",
				"subject_g{{ $grade }}_hp_qr3",
				"subject_g{{ $grade }}_hp_qr4"
			]'></td>
			<td class = "align-middle" data-type = "remarks" data-parameters = '[
				"subject_g{{ $grade }}_mus_qr1",
				"subject_g{{ $grade }}_mus_qr2",
				"subject_g{{ $grade }}_mus_qr3",
				"subject_g{{ $grade }}_mus_qr4",
				"subject_g{{ $grade }}_art_qr1",
				"subject_g{{ $grade }}_art_qr2",
				"subject_g{{ $grade }}_art_qr3",
				"subject_g{{ $grade }}_art_qr4",
				"subject_g{{ $grade }}_pe_qr1",
				"subject_g{{ $grade }}_pe_qr2",
				"subject_g{{ $grade }}_pe_qr3",
				"subject_g{{ $grade }}_pe_qr4",
				"subject_g{{ $grade }}_hp_qr1",
				"subject_g{{ $grade }}_hp_qr2",
				"subject_g{{ $grade }}_hp_qr3",
				"subject_g{{ $grade }}_hp_qr4"
			]'></td>
		</tr>
		<tr>
			<td class = "table-cell-indent" colspan = "2">Music</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mus_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mus_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mus_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_mus_qr4"></td>
			<td class = "align-middle" colspan = "2" rowspan = "4"></td>
		</tr>
		<tr>
			<td class = "table-cell-indent" colspan = "2">Arts</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_art_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_art_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_art_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_art_qr4"></td>
		</tr>
		<tr>
			<td class = "table-cell-indent" colspan = "2">Physical Education</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_pe_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_pe_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_pe_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_pe_qr4"></td>
		</tr>
		<tr>
			<td class = "table-cell-indent" colspan = "2">Health</td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_hp_qr1"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_hp_qr2"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_hp_qr3"></td>
			<td class = "align-middle" data-type = "number" data-parameters = "subject_g{{ $grade }}_hp_qr4"></td>
		</tr>
		<tr>
			<th class = "table-cell-no-border-right" colspan = "2"></th>
			<th class = "align-middle uppercase table-cell-no-border-left" colspan = "4">General Average</th>
			<td class = "align-middle" data-type = "average" data-parameters = '[
				"subject_g{{ $grade }}_fil_qr1",
				"subject_g{{ $grade }}_fil_qr2",
				"subject_g{{ $grade }}_fil_qr3",
				"subject_g{{ $grade }}_fil_qr4",

				"subject_g{{ $grade }}_eng_qr1",
				"subject_g{{ $grade }}_eng_qr2",
				"subject_g{{ $grade }}_eng_qr3",
				"subject_g{{ $grade }}_eng_qr4",

				"subject_g{{ $grade }}_mat_qr1",
				"subject_g{{ $grade }}_mat_qr2",
				"subject_g{{ $grade }}_mat_qr3",
				"subject_g{{ $grade }}_mat_qr4",

				"subject_g{{ $grade }}_sci_qr1",
				"subject_g{{ $grade }}_sci_qr2",
				"subject_g{{ $grade }}_sci_qr3",
				"subject_g{{ $grade }}_sci_qr4",

				"subject_g{{ $grade }}_ap_qr1",
				"subject_g{{ $grade }}_ap_qr2",
				"subject_g{{ $grade }}_ap_qr3",
				"subject_g{{ $grade }}_ap_qr4",

				"subject_g{{ $grade }}_ep_qr1",
				"subject_g{{ $grade }}_ep_qr2",
				"subject_g{{ $grade }}_ep_qr3",
				"subject_g{{ $grade }}_ep_qr4",

				"subject_g{{ $grade }}_tle_qr1",
				"subject_g{{ $grade }}_tle_qr2",
				"subject_g{{ $grade }}_tle_qr3",
				"subject_g{{ $grade }}_tle_qr4",

				"subject_g{{ $grade }}_mus_qr1",
				"subject_g{{ $grade }}_mus_qr2",
				"subject_g{{ $grade }}_mus_qr3",
				"subject_g{{ $grade }}_mus_qr4",

				"subject_g{{ $grade }}_art_qr1",
				"subject_g{{ $grade }}_art_qr2",
				"subject_g{{ $grade }}_art_qr3",
				"subject_g{{ $grade }}_art_qr4",

				"subject_g{{ $grade }}_pe_qr1",
				"subject_g{{ $grade }}_pe_qr2",
				"subject_g{{ $grade }}_pe_qr3",
				"subject_g{{ $grade }}_pe_qr4",

				"subject_g{{ $grade }}_hp_qr1",
				"subject_g{{ $grade }}_hp_qr2",
				"subject_g{{ $grade }}_hp_qr3",
				"subject_g{{ $grade }}_hp_qr4"
			]'></td>
			<td class = "align-middle" data-type = "grand" data-parameters = '[
				"subject_g{{ $grade }}_fil_qr1",
				"subject_g{{ $grade }}_fil_qr2",
				"subject_g{{ $grade }}_fil_qr3",
				"subject_g{{ $grade }}_fil_qr4",

				"subject_g{{ $grade }}_eng_qr1",
				"subject_g{{ $grade }}_eng_qr2",
				"subject_g{{ $grade }}_eng_qr3",
				"subject_g{{ $grade }}_eng_qr4",

				"subject_g{{ $grade }}_mat_qr1",
				"subject_g{{ $grade }}_mat_qr2",
				"subject_g{{ $grade }}_mat_qr3",
				"subject_g{{ $grade }}_mat_qr4",

				"subject_g{{ $grade }}_sci_qr1",
				"subject_g{{ $grade }}_sci_qr2",
				"subject_g{{ $grade }}_sci_qr3",
				"subject_g{{ $grade }}_sci_qr4",

				"subject_g{{ $grade }}_ap_qr1",
				"subject_g{{ $grade }}_ap_qr2",
				"subject_g{{ $grade }}_ap_qr3",
				"subject_g{{ $grade }}_ap_qr4",

				"subject_g{{ $grade }}_ep_qr1",
				"subject_g{{ $grade }}_ep_qr2",
				"subject_g{{ $grade }}_ep_qr3",
				"subject_g{{ $grade }}_ep_qr4",

				"subject_g{{ $grade }}_tle_qr1",
				"subject_g{{ $grade }}_tle_qr2",
				"subject_g{{ $grade }}_tle_qr3",
				"subject_g{{ $grade }}_tle_qr4",

				"subject_g{{ $grade }}_mus_qr1",
				"subject_g{{ $grade }}_mus_qr2",
				"subject_g{{ $grade }}_mus_qr3",
				"subject_g{{ $grade }}_mus_qr4",

				"subject_g{{ $grade }}_art_qr1",
				"subject_g{{ $grade }}_art_qr2",
				"subject_g{{ $grade }}_art_qr3",
				"subject_g{{ $grade }}_art_qr4",

				"subject_g{{ $grade }}_pe_qr1",
				"subject_g{{ $grade }}_pe_qr2",
				"subject_g{{ $grade }}_pe_qr3",
				"subject_g{{ $grade }}_pe_qr4",
				
				"subject_g{{ $grade }}_hp_qr1",
				"subject_g{{ $grade }}_hp_qr2",
				"subject_g{{ $grade }}_hp_qr3",
				"subject_g{{ $grade }}_hp_qr4"
			]'></td>
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