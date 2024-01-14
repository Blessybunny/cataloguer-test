<section class = "container custom-paper">
	<div class = "row">
		
		<!-- Front -->
		<div class = "col-6">

			<h6 class = "align-middle custom-header">Learner's Progress Report Card (SF9)</h6>

			<div class = "row">
				<div class = "col-3 align-middle">
					<img src = "{{ asset('assets/img/deped-2.png') }}" width = 100>
				</div>
				<div class = "col-6 align-middle">
					<span>Republic of the Philippines</span>
					<span>Department of Education</span>
					<span>Cordillera Administrative Region</span>
					<span>Division of Baguio City</span>
					<h6 class = "margin-none">Irisan National High School</h6>
					<span>Purok 3, Irisan, Baguio City</span>
				</div>
				<div class = "col-3 align-middle">
					<img src = "{{ asset('assets/img/irisan.png') }}" width = 100>
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-12">
					<span class = "debug-field">Learner's Reference Number: {{ $student->info_lrn }}</span>
					<br>
					<span class = "debug-field">
						Name:
						<span class = "uppercase">{{ $student->info_name_last }},</span>
						<span class = "capitalize">{{ $student->info_name_first }}</span>
						<span class = "capitalize">{{ $student->info_name_middle }}.</span>
					</span>
				</div>
				<div class = "col-6">
					<span class = "debug-field">Age: {{ $student->{'record_g'.$grade.'_age'} }}</span>
					<br>
					<span class = "debug-field">Grade: {{ $student->{'record_g'.$grade.'_school_grade'} }}</span>
				</div>
				<div class = "col-6">
					<span class = "debug-field">Sex: {{ $student->info_sex }}</span>
					<br>
					<span class = "debug-field">Section: {{ $student->{'record_g'.$grade.'_school_section'} }}</span>
				</div>
				<div class = "col-12">
					<span class = "debug-field">School Year: {{ $student->{'record_g'.$grade.'_school_year'} }}</span>
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-12">
					<span>Dear parent:</span>
					<br>
					<span class = "align-justify paragraph-indent">This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. The school welcomes you, should you desire to know more about your child's progress.</span>
					<br>
					<br>
				</div>
				<div class = "col-6 align-middle">
					______________________________
					<br>
					OIC - Office of the Principal
				</div>
				<div class = "col-6 align-middle">
					______________________________
					<br>
					Adviser
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-12">
					<h6 class = "align-middle">Certificate Of Transfer</h6>
					<span class = "debug-none">Admitted to Grade:</span>
					<br>
					<span class = "debug-none">Eligibility for Admission to Grade:</span>
					<br>
					<span class = "debug-none">Approved:</span>
					<br>
					<br>
				</div>
				<div class = "col-6 align-middle">
					______________________________
					<br>
					OIC - Office of the Principal
				</div>
				<div class = "col-6 align-middle">
					______________________________
					<br>
					Adviser
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-12">
					<h6 class = "align-middle">Cancellation of Eligibility to Transfer</h6>
					<span class = "debug-none">Admitted:</span>
					<br>
					<span class = "debug-none">Date:</span>
					<br>
					<br>
				</div>
			</div>

		</div>
		
		<!-- Attendance -->
		<div class = "col-6">
			
			<h6 class = "align-middle custom-header">Report On Attendance</h6>

			<table class = "table">
				<tr>
					<th class = "align-middle uppercase">Month</th>
					<th class = "align-middle uppercase">No. of school days</th>
					<th class = "align-middle uppercase">No. of days present</th>
					<th class = "align-middle uppercase">No. of days absent</th>
				</tr>
				<tr>
					<td class = "align-middle">Oct</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_oct"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_oct"></td>
				</tr>
				<tr>
					<td class = "align-middle">Nov</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_nov"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_nov"></td>
				</tr>
				<tr>
					<td class = "align-middle">Dec</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_dec"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_dec"></td>
				</tr>
				<tr>
					<td class = "align-middle">Jan</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_jan"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_jan"></td>
				</tr>
				<tr>
					<td class = "align-middle">Feb</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_feb"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_feb"></td>
				</tr>
				<tr>
					<td class = "align-middle">Mar</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_mar"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_mar"></td>
				</tr>
				<tr>
					<td class = "align-middle">Apr</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_apr"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_apr"></td>
				</tr>
				<tr>
					<td class = "align-middle">May</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_may"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_may"></td>
				</tr>
				<tr>
					<td class = "align-middle">Jun</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_jun"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_jun"></td>
				</tr>
				<tr>
					<td class = "align-middle">Jul</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_jul"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_jul"></td>
				</tr>
				<tr>
					<td class = "align-middle">Aug</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_aug"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_aug"></td>
				</tr>
				<tr>
					<td class = "align-middle">Sep</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_p_sep"></td>
					<td class = "align-middle" data-type = "number" data-parameters = "attendance_g{{ $grade }}_a_sep"></td>
				</tr>
				<tr>
					<th class = "align-middle uppercase">Total</th>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-type = "total" data-parameters = '[
						"attendance_g{{ $grade }}_p_jan",
						"attendance_g{{ $grade }}_p_feb",
						"attendance_g{{ $grade }}_p_mar",
						"attendance_g{{ $grade }}_p_apr",
						"attendance_g{{ $grade }}_p_may",
						"attendance_g{{ $grade }}_p_jun",
						"attendance_g{{ $grade }}_p_jul",
						"attendance_g{{ $grade }}_p_aug",
						"attendance_g{{ $grade }}_p_sep",
						"attendance_g{{ $grade }}_p_oct",
						"attendance_g{{ $grade }}_p_nov",
						"attendance_g{{ $grade }}_p_dec"
					]'></td>
					<td class = "align-middle" data-type = "total" data-parameters = '[
						"attendance_g{{ $grade }}_a_jan",
						"attendance_g{{ $grade }}_a_feb",
						"attendance_g{{ $grade }}_a_mar",
						"attendance_g{{ $grade }}_a_apr",
						"attendance_g{{ $grade }}_a_may",
						"attendance_g{{ $grade }}_a_jun",
						"attendance_g{{ $grade }}_a_jul",
						"attendance_g{{ $grade }}_a_aug",
						"attendance_g{{ $grade }}_a_sep",
						"attendance_g{{ $grade }}_a_oct",
						"attendance_g{{ $grade }}_a_nov",
						"attendance_g{{ $grade }}_a_dec"
					]'></td>
				</tr>
			</table>

			<span class = "bold uppercase">Parent / Guardian's Signature:</span>
			<br>
			<br>
			<span class = "debug-none">1st Quarter:</span>
			<br>
			<span class = "debug-none">2nd Quarter:</span>
			<br>
			<span class = "debug-none">3rd Quarter:</span>
			<br>
			<span class = "debug-none">4th Quarter:</span>

		</div>
		
	</div>
</section>