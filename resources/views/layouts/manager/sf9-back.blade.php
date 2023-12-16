<section class = "container custom-paper">
	<div class = "row">

		<!-- Grades -->
		<div class = "col-6">

			<h6 class = "align-middle custom-header">Report on Learning Progress and Achievement</h6>

			<span class = "bold uppercase debug-no-db-assoc">Name:</span>
			<br>
			<br>

			<table class = "table">
				<tr>
					<th class = "align-middle uppercase" rowspan = "2">Learning Areas</th>
					<th class = "align-middle uppercase" colspan = "4">Quarter</th>
					<th class = "align-middle sf9-width-wide uppercase" rowspan = "2">Final Rating</th>
					<th class = "align-middle sf9-width-wide uppercase" rowspan = "2">Remarks</th>
				</tr>
				<tr>
					<th class = "align-middle sf9-width-thin">1st</th>
					<th class = "align-middle sf9-width-thin">2nd</th>
					<th class = "align-middle sf9-width-thin">3rd</th>
					<th class = "align-middle sf9-width-thin">4th</th>
				</tr>
				<tr>
					<td>Filipino 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_fil_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_fil_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_fil_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_fil_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_fil_qr1",
						"subject_g{{ $grade }}_fil_qr2",
						"subject_g{{ $grade }}_fil_qr3",
						"subject_g{{ $grade }}_fil_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_fil_qr1",
						"subject_g{{ $grade }}_fil_qr2",
						"subject_g{{ $grade }}_fil_qr3",
						"subject_g{{ $grade }}_fil_qr4"
					]'></td>
				</tr>
				<tr>
					<td>English 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_eng_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_eng_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_eng_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_eng_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_eng_qr1",
						"subject_g{{ $grade }}_eng_qr2",
						"subject_g{{ $grade }}_eng_qr3",
						"subject_g{{ $grade }}_eng_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_eng_qr1",
						"subject_g{{ $grade }}_eng_qr2",
						"subject_g{{ $grade }}_eng_qr3",
						"subject_g{{ $grade }}_eng_qr4"
					]'></td>
				</tr>
				<tr>
					<td>Mathematics 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mat_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mat_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mat_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mat_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_mat_qr1",
						"subject_g{{ $grade }}_mat_qr2",
						"subject_g{{ $grade }}_mat_qr3",
						"subject_g{{ $grade }}_mat_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_mat_qr1",
						"subject_g{{ $grade }}_mat_qr2",
						"subject_g{{ $grade }}_mat_qr3",
						"subject_g{{ $grade }}_mat_qr4"
					]'></td>
				</tr>
				<tr>
					<td>Science 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_sci_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_sci_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_sci_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_sci_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_sci_qr1",
						"subject_g{{ $grade }}_sci_qr2",
						"subject_g{{ $grade }}_sci_qr3",
						"subject_g{{ $grade }}_sci_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_sci_qr1",
						"subject_g{{ $grade }}_sci_qr2",
						"subject_g{{ $grade }}_sci_qr3",
						"subject_g{{ $grade }}_sci_qr4"
					]'></td>
				</tr>
				<tr>
					<td>Araling Panlipunan (AP) 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ap_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ap_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ap_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ap_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_ap_qr1",
						"subject_g{{ $grade }}_ap_qr2",
						"subject_g{{ $grade }}_ap_qr3",
						"subject_g{{ $grade }}_ap_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_ap_qr1",
						"subject_g{{ $grade }}_ap_qr2",
						"subject_g{{ $grade }}_ap_qr3",
						"subject_g{{ $grade }}_ap_qr4"
					]'></td>
				</tr>
				<tr>
					<td>Edukasyon sa Pagpapakatao (EP) 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ep_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ep_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ep_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_ep_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_ep_qr1",
						"subject_g{{ $grade }}_ep_qr2",
						"subject_g{{ $grade }}_ep_qr3",
						"subject_g{{ $grade }}_ep_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_ep_qr1",
						"subject_g{{ $grade }}_ep_qr2",
						"subject_g{{ $grade }}_ep_qr3",
						"subject_g{{ $grade }}_ep_qr4"
					]'></td>
				</tr>
				<tr>
					<td>Technology and Livelihood Education (TLE) 7</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_tle_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_tle_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_tle_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_tle_qr4"></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_tle_qr1",
						"subject_g{{ $grade }}_tle_qr2",
						"subject_g{{ $grade }}_tle_qr3",
						"subject_g{{ $grade }}_tle_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
						"subject_g{{ $grade }}_tle_qr1",
						"subject_g{{ $grade }}_tle_qr2",
						"subject_g{{ $grade }}_tle_qr3",
						"subject_g{{ $grade }}_tle_qr4"
					]'></td>
				</tr>
				<tr>
					<td>MAPEH 7</td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_mus_qr1",
						"subject_g{{ $grade }}_art_qr1",
						"subject_g{{ $grade }}_pe_qr1",
						"subject_g{{ $grade }}_hp_qr1"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_mus_qr2",
						"subject_g{{ $grade }}_art_qr2",
						"subject_g{{ $grade }}_pe_qr2",
						"subject_g{{ $grade }}_hp_qr2"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_mus_qr3",
						"subject_g{{ $grade }}_art_qr3",
						"subject_g{{ $grade }}_pe_qr3",
						"subject_g{{ $grade }}_hp_qr3"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
						"subject_g{{ $grade }}_mus_qr4",
						"subject_g{{ $grade }}_art_qr4",
						"subject_g{{ $grade }}_pe_qr4",
						"subject_g{{ $grade }}_hp_qr4"
					]'></td>
					<td class = "align-middle debug-compute" data-type = "average" data-parameters = '[
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
					<td class = "align-middle debug-compute" data-type = "remarks" data-parameters = '[
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
					<td class = "sf9-indent-2">Music</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mus_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mus_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mus_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_mus_qr4"></td>
					<td class = "align-middle" colspan = "2" rowspan = "4"></td>
				</tr>
				<tr>
					<td class = "sf9-indent-2">Arts</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_art_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_art_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_art_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_art_qr4"></td>
				</tr>
				<tr>
					<td class = "sf9-indent-2">Physical Education</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_pe_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_pe_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_pe_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_pe_qr4"></td>
				</tr>
				<tr>
					<td class = "sf9-indent-2">Health</td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_hp_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_hp_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_hp_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-number" data-parameters = "subject_g{{ $grade }}_hp_qr4"></td>
				</tr>
			</table>

			<span class = "bold uppercase">General Average:</span>
			<br>
			<br>

			<table class = "table">
				<tr>
					<th class = "align-middle uppercase">Descriptors</th>
					<th class = "align-middle uppercase">Grading Scale</th>
					<th class = "align-middle uppercase">Remarks</th>
				</tr>
				<tr>
					<td>Outstanding</td>
					<td class = "align-middle">90-100</td>
					<td class = "align-middle">Passed</td>
				</tr>
				<tr>
					<td>Very Satisfactory</td>
					<td class = "align-middle">85-89</td>
					<td class = "align-middle">Passed</td>
				</tr>
				<tr>
					<td>Satisfactory</td>
					<td class = "align-middle">80-84</td>
					<td class = "align-middle">Passed</td>
				</tr>
				<tr>
					<td>Fairly Satisfactory</td>
					<td class = "align-middle">75-79</td>
					<td class = "align-middle">Passed</td>
				</tr>
				<tr>
					<td>Did Not Meet Expectations</td>
					<td class = "align-middle">Below 75</td>
					<td class = "align-middle">Failed</td>
				</tr>
			</table>

		</div>
		
		<!-- Observance -->
		<div class = "col-6">

			<h6 class = "align-middle custom-header">Report on Learner's Observed Values</h6>

			<br>
			<br>
			
			<table class = "table">
				<tr>
					<th class = "align-middle uppercase" rowspan = "2">Core Values</th>
					<th class = "align-middle uppercase" rowspan = "2">Behavior Statement</th>
					<th class = "align-middle uppercase" colspan = "4">Quarter</th>
				</tr>
				<tr>
					<th class = "align-middle sf9-width-thin">1st</th>
					<th class = "align-middle sf9-width-thin">2nd</th>
					<th class = "align-middle sf9-width-thin">3rd</th>
					<th class = "align-middle sf9-width-thin">4th</th>
				</tr>
				<tr>
					<td class = "align-middle left" rowspan = "2">Maka - Diyos</td>
					<td>Expresses one's spiritual beliefs while respecting the spiritual beliefs of others.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s1_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s1_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s1_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s1_qr4"></td>
				</tr>
				<tr>
					<td>Shows adherence to ethical principles by upholding truth.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s2_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s2_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s2_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_md_s2_qr4"></td>
				</tr>
				<tr>
					<td class = "align-middle left" rowspan = "2">Maka - Tao</td>
					<td>Is sensitive to individual, social and cultural differences.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s1_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s1_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s1_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s1_qr4"></td>
				</tr>
				<tr>
					<td>Demonstrates contributions toward solidarity.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s2_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s2_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s2_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mt_s2_qr4"></td>
				</tr>
				<tr>
					<td class = "align-middle left">Maka - Kalikasan</td>
					<td>Cares for the environment and utilizes resources  wisely, judiciously and economically.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mk_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mk_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mk_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mk_qr4"></td>
				</tr>
				<tr>
					<td class = "align-middle left" rowspan = "2">Maka - Bansa</td>
					<td>Demonstrates pride in being a Filipino; exercises the rights and responsibilities of a Filipino Citizen.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s1_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s1_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s1_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s1_qr4"></td>
				</tr>
				<tr>
					<td>Demonstrates appropriate behavior in carrying out activities in the school, community and country.</td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s2_qr1"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s2_qr2"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s2_qr3"></td>
					<td class = "align-middle debug-field" data-type = "interactive-text" data-parameters = "values_g{{ $grade }}_mb_s2_qr4"></td>
				</tr>
			</table>

			<table class = "table">
				<tr>
					<th class = "align-middle sf9-width-wide uppercase">Markings</th>
					<th class = "align-middle uppercase">Non-numerical Rating</th>
				</tr>
				<tr>
					<td class = "align-middle">AO</td>
					<td class = "align-middle">Always Observed</td>
				</tr>
				<tr>
					<td class = "align-middle">SO</td>
					<td class = "align-middle">Sometimes Observed</td>
				</tr>
				<tr>
					<td class = "align-middle">RO</td>
					<td class = "align-middle">Rarely Observed</td>
				</tr>
				<tr>
					<td class = "align-middle">NO</td>
					<td class = "align-middle">Not Observed</td>
				</tr>
			</table>

		</div>

	</div>
</section>