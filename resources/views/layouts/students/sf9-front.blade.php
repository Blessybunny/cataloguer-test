<section class = "container paper">
	<div class = "row">
		
		<!-- Front -->
		<div class = "col-6">

			<h6 class = "align-middle heading-1">Learner's Progress Report Card (SF9)</h6>

			<div class = "row">
				<div class = "col-3 align-middle">
					<img src = "{{ asset('assets/img/deped-2.png') }}" height = 100>
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
					<img src = "{{ asset('assets/img/irisan.png') }}" height = 100>
				</div>
			</div>

			<br>

			<div class = "row">
				<div class = "col-12">
					<span data-property = "string" data-target = "info_lrn" data-label = "Leaner Reference Number"></span>
					<div class = "display-flex">
						Name:&nbsp;
						<span class = "text-uppercase" data-property = "string" data-target = "info_name_last"></span>,&nbsp;
						<span data-property = "string" data-target = "info_name_first"></span>&nbsp;
						<span data-property = "string" data-target = "info_name_middle"></span>&nbsp;
						<span data-property = "string" data-target = "info_name_suffix"></span>&nbsp;
					</div>
				</div>
				<div class = "col-6">
					<span data-property = "string" data-target = "report_g{{ $grade }}_age" data-label = "Age"></span>
					<span>Grade: {{ $grade }}</span>
				</div>
				<div class = "col-6">
					<span data-property = "string" data-target = "info_sex" data-label = "Sex"></span>
					<span data-property = "string" data-target = "record_g{{ $grade }}_school_section" data-label = "Section"></span>
				</div>
				<div class = "col-12">
					<span data-property = "string" data-target = "record_g{{ $grade }}_school_year" data-label = "School Year"></span>
				</div>
			</div>

			<br>

			<div class = "row">
				<div class = "col-12">
					<span>Dear parent:</span>
					<span class = "align-justify paragraph-indent">This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. The school welcomes you, should you desire to know more about your child's progress.</span>
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

			<br>

			<div class = "row">
				<div class = "col-12">
					<h6 class = "align-middle">Certificate Of Transfer</h6>
					<span>Admitted to:</span>
					<span>Eligibility for Admission to:</span>
					<span>Approved:</span>
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

			<br>

			<div class = "row">
				<div class = "col-12">
					<h6 class = "align-middle">Cancellation of Eligibility to Transfer</h6>
					<span>Admitted to:</span>
					<span>Date:</span>
					<br>
				</div>
			</div>

		</div>
		
		<!-- Attendance -->
		<div class = "col-6">
			
			<h6 class = "align-middle heading-1">Report On Attendance</h6>

			<table class = "table">
				<tr>
					<th class = "align-middle">Month</th>
					<th class = "align-middle">No. of school days</th>
					<th class = "align-middle">No. of days present</th>
					<th class = "align-middle">No. of days absent</th>
				</tr>
				<tr>
					<td class = "align-middle">Oct</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_oct"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_oct"></td>
				</tr>
				<tr>
					<td class = "align-middle">Nov</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_nov"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_nov"></td>
				</tr>
				<tr>
					<td class = "align-middle">Dec</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_dec"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_dec"></td>
				</tr>
				<tr>
					<td class = "align-middle">Jan</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_jan"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_jan"></td>
				</tr>
				<tr>
					<td class = "align-middle">Feb</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_feb"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_feb"></td>
				</tr>
				<tr>
					<td class = "align-middle">Mar</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_mar"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_mar"></td>
				</tr>
				<tr>
					<td class = "align-middle">Apr</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_apr"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_apr"></td>
				</tr>
				<tr>
					<td class = "align-middle">May</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_may"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_may"></td>
				</tr>
				<tr>
					<td class = "align-middle">Jun</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_jun"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_jun"></td>
				</tr>
				<tr>
					<td class = "align-middle">Jul</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_jul"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_jul"></td>
				</tr>
				<tr>
					<td class = "align-middle">Aug</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_aug"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_aug"></td>
				</tr>
				<tr>
					<td class = "align-middle">Sep</td>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_p_sep"></td>
					<td class = "align-middle" data-property = "string" data-target = "attendance_g{{ $grade }}_a_sep"></td>
				</tr>
				<tr>
					<th class = "align-middle">Total</th>
					<td class = "align-middle"></td>
					<td class = "align-middle" data-property = "total" data-targets = '[
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
					<td class = "align-middle" data-property = "total" data-targets = '[
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

			<span class = "font-bold text-uppercase">Parent / Guardian's Signature:</span>
			<br>
			<span>1st Quarter:</span>
			<br>
			<span>2nd Quarter:</span>
			<br>
			<span>3rd Quarter:</span>
			<br>
			<span>4th Quarter:</span>

		</div>
		
	</div>
</section>