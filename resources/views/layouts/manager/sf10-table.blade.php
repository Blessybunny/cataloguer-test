<div class = "row">
	<div class = "col-2">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_name" data-label = "School"></span>
	</div>
	<div class = "col-2">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_id" data-label = "School ID"></span>
	</div>
	<div class = "col-2">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_district" data-label = "District"></span>
	</div>
	<div class = "col-3">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_division" data-label = "Division"></span>
	</div>
	<div class = "col-3">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_region" data-label = "Region"></span>
	</div>
	<div class = "col-2">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_grade" data-label = "Classified as Grade"></span>
	</div>
	<div class = "col-2">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_section" data-label = "Section"></span>
	</div>
	<div class = "col-2">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_year" data-label = "School Year"></span>
	</div>
	<div class = "col-6">
		<span data-property = "string" data-target = "record_g{{ $grade }}_school_teacher" data-label = "Name of Adviser / Teacher"></span>
	</div>
</div>

<table class = "table">
	<tr>
		<th class = "align-middle" colspan = "2" rowspan = "2">Learning Areas</th>
		<th class = "align-middle" colspan = "4">Quarter</th>
		<th class = "align-middle table-cell-wider" rowspan = "2">Final Rating</th>
		<th class = "align-middle table-cell-wider" rowspan = "2">Remarks</th>
	</tr>
	<tr>
		<th class = "align-middle table-cell-thin">1st</th>
		<th class = "align-middle table-cell-thin">2nd</th>
		<th class = "align-middle table-cell-thin">3rd</th>
		<th class = "align-middle table-cell-thin">4th</th>
	</tr>
	<tr>
		<td colspan = "2">Filipino {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_fil_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_fil_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_fil_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_fil_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_fil_qr1",
			"subject_g{{ $grade }}_fil_qr2",
			"subject_g{{ $grade }}_fil_qr3",
			"subject_g{{ $grade }}_fil_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_fil_qr1",
			"subject_g{{ $grade }}_fil_qr2",
			"subject_g{{ $grade }}_fil_qr3",
			"subject_g{{ $grade }}_fil_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">English {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_eng_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_eng_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_eng_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_eng_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_eng_qr1",
			"subject_g{{ $grade }}_eng_qr2",
			"subject_g{{ $grade }}_eng_qr3",
			"subject_g{{ $grade }}_eng_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_eng_qr1",
			"subject_g{{ $grade }}_eng_qr2",
			"subject_g{{ $grade }}_eng_qr3",
			"subject_g{{ $grade }}_eng_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">Mathematics {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mat_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mat_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mat_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mat_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_mat_qr1",
			"subject_g{{ $grade }}_mat_qr2",
			"subject_g{{ $grade }}_mat_qr3",
			"subject_g{{ $grade }}_mat_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_mat_qr1",
			"subject_g{{ $grade }}_mat_qr2",
			"subject_g{{ $grade }}_mat_qr3",
			"subject_g{{ $grade }}_mat_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">Science {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_sci_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_sci_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_sci_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_sci_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_sci_qr1",
			"subject_g{{ $grade }}_sci_qr2",
			"subject_g{{ $grade }}_sci_qr3",
			"subject_g{{ $grade }}_sci_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_sci_qr1",
			"subject_g{{ $grade }}_sci_qr2",
			"subject_g{{ $grade }}_sci_qr3",
			"subject_g{{ $grade }}_sci_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">Araling Panlipunan (AP) {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ap_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ap_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ap_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ap_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_ap_qr1",
			"subject_g{{ $grade }}_ap_qr2",
			"subject_g{{ $grade }}_ap_qr3",
			"subject_g{{ $grade }}_ap_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_ap_qr1",
			"subject_g{{ $grade }}_ap_qr2",
			"subject_g{{ $grade }}_ap_qr3",
			"subject_g{{ $grade }}_ap_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">Edukasyon sa Pagpapakatao (EP) {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ep_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ep_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ep_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_ep_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_ep_qr1",
			"subject_g{{ $grade }}_ep_qr2",
			"subject_g{{ $grade }}_ep_qr3",
			"subject_g{{ $grade }}_ep_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_ep_qr1",
			"subject_g{{ $grade }}_ep_qr2",
			"subject_g{{ $grade }}_ep_qr3",
			"subject_g{{ $grade }}_ep_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">Technology and Livelihood Education (TLE) {{ $grade }}</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_tle_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_tle_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_tle_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_tle_qr4"></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_tle_qr1",
			"subject_g{{ $grade }}_tle_qr2",
			"subject_g{{ $grade }}_tle_qr3",
			"subject_g{{ $grade }}_tle_qr4"
		]'></td>
		<td class = "align-middle" data-property = "remarks" data-targets = '[
			"subject_g{{ $grade }}_tle_qr1",
			"subject_g{{ $grade }}_tle_qr2",
			"subject_g{{ $grade }}_tle_qr3",
			"subject_g{{ $grade }}_tle_qr4"
		]'></td>
	</tr>
	<tr>
		<td colspan = "2">MAPEH {{ $grade }}</td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_mus_qr1",
			"subject_g{{ $grade }}_art_qr1",
			"subject_g{{ $grade }}_pe_qr1",
			"subject_g{{ $grade }}_hp_qr1"
		]'></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_mus_qr2",
			"subject_g{{ $grade }}_art_qr2",
			"subject_g{{ $grade }}_pe_qr2",
			"subject_g{{ $grade }}_hp_qr2"
		]'></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_mus_qr3",
			"subject_g{{ $grade }}_art_qr3",
			"subject_g{{ $grade }}_pe_qr3",
			"subject_g{{ $grade }}_hp_qr3"
		]'></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
			"subject_g{{ $grade }}_mus_qr4",
			"subject_g{{ $grade }}_art_qr4",
			"subject_g{{ $grade }}_pe_qr4",
			"subject_g{{ $grade }}_hp_qr4"
		]'></td>
		<td class = "align-middle" data-property = "average" data-targets = '[
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
		<td class = "align-middle" data-property = "remarks" data-targets = '[
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
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mus_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mus_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mus_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_mus_qr4"></td>
		<td class = "align-middle" colspan = "2" rowspan = "4"></td>
	</tr>
	<tr>
		<td class = "table-cell-indent" colspan = "2">Arts</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_art_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_art_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_art_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_art_qr4"></td>
	</tr>
	<tr>
		<td class = "table-cell-indent" colspan = "2">Physical Education</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_pe_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_pe_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_pe_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_pe_qr4"></td>
	</tr>
	<tr>
		<td class = "table-cell-indent" colspan = "2">Health</td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_hp_qr1"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_hp_qr2"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_hp_qr3"></td>
		<td class = "align-middle" data-property = "string" data-target = "subject_g{{ $grade }}_hp_qr4"></td>
	</tr>
	<tr>
		<th class = "border-right-none" colspan = "2"></th>
		<th class = "align-middle border-left-none" colspan = "4">General Average</th>
		<td class = "align-middle" data-property = "average" data-targets = '[
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
		<td class = "align-middle" data-property = "grand" data-targets = '[
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
		<th class = "align-middle">Remedial Classes</td>
		<td class = "align-middle" colspan = "7">
			<div class = "display-flex">
				<span class = "width-100" data-property = "date" data-target = "record_g{{ $grade }}_remedial_date_start" data-label = "Conducted from (MM/DD/YYYY)"></span>
				<span class = "width-100" data-property = "date" data-target = "record_g{{ $grade }}_remedial_date_end" data-label = "To (MM/DD/YYYY)"></span>
			</div>
		</td>
	</tr>
	<tr>
		<th class = "align-middle">Learning Areas</th>
		<th class = "align-middle">Final Rating</th>
		<th class = "align-middle" colspan = "4">Remedial Class Mark</th>
		<th class = "align-middle">Recomputed Final</th>
		<th class = "align-middle">Remarks</th>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan = "4">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>