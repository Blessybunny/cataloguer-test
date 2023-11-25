<section class = "container custom-paper">
	<div class = "row">

		<!-- Header -->
		<div class = "col-12">

			<div class = "row">
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-2.png') }}" height = 100>
				</div>
				<div class = "col-8 align-middle">
					<span>Republic of the Philippines</span>
					<br>
					<span>Department of Education</span>
					<br>
					<h6 class = "permanent-form-no-margin">Learner Permanent Record for Junior High School (SF10-JHS)</h6>
					<span>(Formerly Form 137)</span>
				</div>
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-1.png') }}" height = 100 style = "float: right">
				</div>
			</div>

			<br>

		</div>

		<!-- Learner's information -->
		<div class = "col-12">

			<h6 class = "align-middle custom-header">Learner's Information</h6>

			<div class = "row">
				<div class = "col-4">
					<span>LAST NAME:</span>
					<br>
					<span>Leaner Reference Number (LRN):</span>
				</div>
				<div class = "col-4">
					<span>FIRST NAME:</span>
					<br>
					<span>Birthdate (mm/dd/yyyy):</span>
				</div>
				<div class = "col-4">
					<span>MIDDLE NAME:</span>
					<br>
					<span>Sex</span>
				</div>
			</div>
			
			<br>

		</div>

		<!-- Eligibility for JHS enrollment -->
		<div class = "col-12">

			<h6 class = "align-middle custom-header">Eligibility for JHS Enrollment</h6>

			<div class = "row">
				<div class = "col-4">
					<label>
						<input type = "checkbox">
						<span>Elementary School Completer</span>
					</label>
				</div>
				<div class = "col-8">
					<span>General Average:</span>
					<br>
					<span>Citation (if any):</span>
					<br>
					<span>Name of Elementary School:</span>
					<br>
					<span>School ID:</span>
					<br>
					<span>Address of School:</span>
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-4">
					<label>
						<input type = "checkbox">
						<span>PEPT Passer | Rating:</span>
					</label>
					<br>
					<label>
						<input type = "checkbox">
						<span>ALS A & E Passer | Rating:</span>
					</label>
					<br>
					<label>
						<input type = "checkbox">
						<span>Others (please specify):</span>
					</label>
				</div>
				<div class = "col-8">
					<span>Date of Examination / Assessment (mm/dd/yyy):</span>
					<br>
					<span>Name and Address of Testing Center:</span>
				</div>
			</div>

			<br>

		</div>

		<!-- Scholastic record -->
		<div class = "col-12">
			
			<h6 class = "align-middle custom-header">Scholastic Record</h6>

		</div>

		<!-- Grade 7 -->
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
					<th class = "align-middle permanent-form-width-wide uppercase" rowspan = "2">Final Rating</th>
					<th class = "align-middle permanent-form-width-wide uppercase" rowspan = "2">Remarks</th>
				</tr>
				<tr>
					<th class = "align-middle permanent-form-width-thin">1st</th>
					<th class = "align-middle permanent-form-width-thin">2nd</th>
					<th class = "align-middle permanent-form-width-thin">3rd</th>
					<th class = "align-middle permanent-form-width-thin">4th</th>
				</tr>
				<tr>
					<td colspan = "2">Filipino 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_fil_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_fil_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_fil_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_fil_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">English 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_eng_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_eng_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_eng_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_eng_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">Mathematics 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mat_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mat_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mat_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mat_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">Science 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_sci_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_sci_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_sci_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_sci_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">Araling Panlipunan (AP) 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ap_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ap_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ap_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ap_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">Edukasyon sa Pagpapakatao (EP) 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ep_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ep_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ep_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_ep_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">Technology and Livelihood Education (TLE) 7</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_tle_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_tle_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_tle_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_tle_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td colspan = "2">MAPEH 7</td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Music</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mus_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mus_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mus_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_mus_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Arts</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_art_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_art_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_art_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_art_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Physical Education</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_pe_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_pe_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_pe_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_pe_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Health</td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_hp_qr1"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_hp_qr2"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_hp_qr3"></td>
					<td class = "align-middle debug-has-db-assoc prompt-toggle ALL_g7_subject_hp_qr4"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
				</tr>
				<tr>
					<th class = "permanent-form-custom-border-1" colspan = "2"></th>
					<th class = "align-middle permanent-form-custom-border-2 uppercase" colspan = "4">General Average</th>
					<td class = "align-middle debug-no-db-assoc"></td>
					<td class = "align-middle debug-no-db-assoc"></td>
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
		
		<!-- Grade 8 -->
		<div class = "col-12">
			
			<div class = "row">
				<div class = "col-2">
					<span>School:</span>
				</div>
				<div class = "col-2">
					<span>School ID:</span>
				</div>
				<div class = "col-2">
					<span>District:</span>
				</div>
				<div class = "col-3">
					<span>Division:</span>
				</div>
				<div class = "col-3">
					<span>Region:</span>
				</div>
				<div class = "col-2">
					<span>Classified as Grade:</span>
				</div>
				<div class = "col-2">
					<span>Section:</span>
				</div>
				<div class = "col-2">
					<span>School Year:</span>
				</div>
				<div class = "col-6">
					<span>Name of Adviser / Teacher:</span>
				</div>
			</div>

			<br>

			<table class = "table">
				<tr>
					<th class = "align-middle uppercase" colspan = "2" rowspan = "2">Learning Areas</th>
					<th class = "align-middle uppercase" colspan = "4">Quarter</th>
					<th class = "align-middle permanent-form-width-wide uppercase" rowspan = "2">Final Rating</th>
					<th class = "align-middle permanent-form-width-wide uppercase" rowspan = "2">Remarks</th>
				</tr>
				<tr>
					<th class = "align-middle permanent-form-width-thin">1st</th>
					<th class = "align-middle permanent-form-width-thin">2nd</th>
					<th class = "align-middle permanent-form-width-thin">3rd</th>
					<th class = "align-middle permanent-form-width-thin">4th</th>
				</tr>
				<tr>
					<td colspan = "2">Filipino 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">English 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Mathematics 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Science 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Araling Panlipunan (AP) 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Edukasyon sa Pagpapakatao (EP) 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Technology and Livelihood Education (TLE) 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">MAPEH 8</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Music</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Arts</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Physical Education</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "permanent-form-indent" colspan = "2">Health</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<th class = "permanent-form-custom-border-1" colspan = "2"></th>
					<th class = "align-middle permanent-form-custom-border-2 uppercase" colspan = "4">General Average</th>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th class = "align-middle uppercase">Remedial Classes</td>
					<td class = "align-middle" colspan = "7">Conducted from (mm/dd/yyyy) __/__/____ to (mm/dd/yyyy) __/__/____</td>
				</tr>
				<tr>
					<th class = "bold align-middle uppercase">Learning Areas</th>
					<th class = "bold align-middle uppercase">Final Rating</th>
					<th class = "bold align-middle uppercase" colspan = "4">Remedial Class Mark</th>
					<th class = "bold align-middle uppercase">Recomputed Final</th>
					<th class = "bold align-middle uppercase">Remarks</th>
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

		<!-- Certification -->
		<div class = "col-12">
			
				<h6 class = "align-middle custom-header">Certification</h6>

				<div class = "align-middle">
					<span>I CERTIFY that this is a true record of</span>
					<span>____________________</span>
					<span>with LRN</span>
					<span>____________________</span>
					<span>and that he / she is eligible for admission to Grade</span>
					<span>__________</span>
					<span>.</span>
					<br>
					<span>Name of School:</span>
					<span>________________________________________</span>
					<span>School ID:</span>
					<span>________________________________________</span>
					<span>Last School Year Attended:</span>
					<span>________________________________________</span>
					<br>
					<br>
				</div>

				<div class = "align-middle row">
					<div class = "col">
						<span>____________________</span>
						<br>
						<span>Date</span>
					</div>
					<div class = "col">
						<span>________________________________________________________________________________</span>
						<br>
						<span>Name of Principal / School Head over Printed Name</span>
					</div>
					<div class = "col">
						<span>________________________________________</span>
						<br>
						<span>Affix School Seal here</span>
					</div>
				</div>
				
		</div>

	</div>
</section>