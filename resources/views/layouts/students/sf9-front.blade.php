<div class = "container-fluid paper">
	<div class = "row">

		<!-- Left -->
		<div class = "col-6">
			<div class = "container-fluid">
				<div class = "row">

					<!-- Header -->
					<div class = "col-12">
						<h6 class = "heading">Learner's Progress Report Card (SF9)</h6>
					</div>
					<div class = "col-3">
						<img src = "{{ asset('assets/img/deped-2.png') }}" height = 100>
					</div>
					<div class = "col-6">
						<span class = "text-center">Republic of the Philippines</span>
						<span class = "text-center">Department of Education</span>
						<span class = "text-center">Cordillera Administrative Region</span>
						<span class = "text-center">Division of Baguio City</span>
						<h6>Irisan National High School</h6>
						<span class = "text-center">Purok 3, Irisan, Baguio City</span>
					</div>
					<div class = "col-3">
						<img class = "float-right"  src = "{{ asset('assets/img/irisan.png') }}" height = 100>
					</div>
					<br>

					<!-- Learning Reference Number -->
					<div class = "col-12">
						<span>Leaner Reference Number: {{ $student->info_lrn }}</span>
					</div>

					<!-- Name -->
					<div class = "col-12">
						<span>Name: {{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}</span>
					</div>

					<!-- Age -->
					<div class = "col-6">
						<label class = "highlight">
							<span>Age:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade->grade }}_report_age"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_report_age'} }}"
								{{ $student->ST_locker ? "disabled" : "" }}
							>
						</label>
					</div>

					<!-- Sex -->
					<div class = "col-6">
						<span>Sex: {{ $student->info_sex }}</span>
					</div>

					<!-- Grade -->
					<div class = "col-6">
						<span>Grade: {{ $grade->grade }}</span>
					</div>

					<!-- Section -->
					<div class = "col-6">
						<span>Section: {{ $student->{'sf9_g'.$grade->grade.'_report_section'} }}</span>
					</div>

					<!-- School Year -->
					<div class = "col-12">
						<span>School Year: {{ $student->{'sf9_g'.$grade->grade.'_report_year'} }}</span>
					</div>

					<!-- Letter -->
					<div class = "col-12">
						<br>
						<span>Dear parent:</span>
						<span style = "text-indent: 60px;">This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. The school welcomes you, should you desire to know more about your child's progress.</span>
						<br>
					</div>

					<!-- Letter Signatures -->
					<div class = "col-6">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">&nbsp;{{ $student->{'sf9_g'.$grade->grade.'_report_principal'} }}&nbsp;</span>
							<span>OIC - Office of the Principal</span>
						</div>
					</div>
					<div class = "col-6">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">&nbsp;{{ $student->{'sf9_g'.$grade->grade.'_report_adviser'} }}&nbsp;</span>
							<span>Adviser</span>
						</div>
					</div>

					<!-- Transfer -->
					<div class = "col-12">
						<br>
						<h6>Certificate Of Transfer</h6>
						<label class = "highlight">
							<span>Admitted to:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade->grade }}_report_transfer_input_1"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_report_transfer_input_1'} }}"
								{{ $student->ST_locker ? "disabled" : "" }}
							>
						</label>
						<label class = "highlight">
							<span>Approved:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade->grade }}_report_transfer_input_2"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_report_transfer_input_2'} }}"
								{{ $student->ST_locker ? "disabled" : "" }}
							>
						</label>
						<br>
					</div>

					<!-- Transfer Signatures -->
					<div class = "col-6">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">&nbsp;{{ $student->{'sf9_g'.$grade->grade.'_report_principal'} }}&nbsp;</span>
							<span>OIC - Office of the Principal</span>
						</div>
					</div>
					<div class = "col-6">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">&nbsp;{{ $student->{'sf9_g'.$grade->grade.'_report_adviser'} }}&nbsp;</span>
							<span>Adviser</span>
						</div>
					</div>

					<!-- Transfer Cancel -->
					<div class = "col-12">
						<br>
						<h6>Cancellation of Eligibility to Transfer</h6>
						<label class = "highlight">
							<span>Admitted to:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade->grade }}_report_transfer_input_3"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_report_transfer_input_3'} }}"
								{{ $student->ST_locker ? "disabled" : "" }}
							>
						</label>
						<label class = "highlight">
							<span>Date:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade->grade }}_report_transfer_input_date"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade->grade.'_report_transfer_input_date'} }}"
								{{ $student->ST_locker ? "disabled" : "" }}
							>
						</label>
						<br>
					</div>

				</div>
			</div>
		</div>

		<!-- Right -->
		<div class = "col-6">

			<!-- Header -->
			<h6 class = "heading">Report On Attendance</h6>

			<!-- Table -->
			<table class = "table">

				<!-- Headers -->
				<tr>
					<th>Month</th>
					<th>No. of school days</th>
					<th>No. of days present</th>
					<th>No. of days absent</th>
				</tr>

				<!-- October -->
				<tr>
					<td class = "text-center">Oct</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_oct_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_oct_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_oct_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_oct_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_oct_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_oct_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- November -->
				<tr>
					<td class = "text-center">Nov</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_nov_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_nov_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_nov_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_nov_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_nov_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_nov_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- December -->
				<tr>
					<td class = "text-center">Dec</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_dec_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_dec_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_dec_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_dec_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_dec_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_dec_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- January -->
				<tr>
					<td class = "text-center">Jan</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jan_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jan_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jan_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jan_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jan_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jan_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- February -->
				<tr>
					<td class = "text-center">Feb</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_feb_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_feb_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_feb_p"
							type = "number"
							min = "0"
							max = "29"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_feb_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_feb_a"
							type = "number"
							min = "0"
							max = "29"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_feb_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- March -->
				<tr>
					<td class = "text-center">Mar</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_mar_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_mar_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_mar_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_mar_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_mar_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_mar_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- April -->
				<tr>
					<td class = "text-center">Apr</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_apr_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_apr_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_apr_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_apr_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_apr_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_apr_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- May -->
				<tr>
					<td class = "text-center">May</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_may_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_may_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_may_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_may_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_may_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_may_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- June -->
				<tr>
					<td class = "text-center">Jun</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jun_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jun_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jun_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jun_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jun_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jun_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- July -->
				<tr>
					<td class = "text-center">Jul</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jul_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jul_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jul_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jul_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_jul_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_jul_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- August -->
				<tr>
					<td class = "text-center">Aug</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_aug_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_aug_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_aug_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_aug_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_aug_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_aug_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- September -->
				<tr>
					<td class = "text-center">Sep</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_sep_t"
							type = "text"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_sep_t'} }}"
							disabled
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_sep_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_sep_p'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
					<td class = "highlight">
						<input
							class = "text-center"
							name = "sf9_g{{ $grade->grade }}_attendance_sep_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade->grade.'_attendance_sep_a'} }}"
							{{ $student->ST_locker ? "disabled" : "" }}
						>
					</td>
				</tr>

				<!-- Total -->
				<tr>
					<th class = "text-center">Total</th>
					<td class = "text-center" data-property = "total" data-targets = '[
						"sf9_g{{ $grade->grade }}_attendance_jan_t",
						"sf9_g{{ $grade->grade }}_attendance_feb_t",
						"sf9_g{{ $grade->grade }}_attendance_mar_t",
						"sf9_g{{ $grade->grade }}_attendance_apr_t",
						"sf9_g{{ $grade->grade }}_attendance_may_t",
						"sf9_g{{ $grade->grade }}_attendance_jun_t",
						"sf9_g{{ $grade->grade }}_attendance_jul_t",
						"sf9_g{{ $grade->grade }}_attendance_aug_t",
						"sf9_g{{ $grade->grade }}_attendance_sep_t",
						"sf9_g{{ $grade->grade }}_attendance_oct_t",
						"sf9_g{{ $grade->grade }}_attendance_nov_t",
						"sf9_g{{ $grade->grade }}_attendance_dec_t"
					]'></td>
					<td class = "text-center" data-property = "total" data-targets = '[
						"sf9_g{{ $grade->grade }}_attendance_jan_p",
						"sf9_g{{ $grade->grade }}_attendance_feb_p",
						"sf9_g{{ $grade->grade }}_attendance_mar_p",
						"sf9_g{{ $grade->grade }}_attendance_apr_p",
						"sf9_g{{ $grade->grade }}_attendance_may_p",
						"sf9_g{{ $grade->grade }}_attendance_jun_p",
						"sf9_g{{ $grade->grade }}_attendance_jul_p",
						"sf9_g{{ $grade->grade }}_attendance_aug_p",
						"sf9_g{{ $grade->grade }}_attendance_sep_p",
						"sf9_g{{ $grade->grade }}_attendance_oct_p",
						"sf9_g{{ $grade->grade }}_attendance_nov_p",
						"sf9_g{{ $grade->grade }}_attendance_dec_p"
					]'></td>
					<td class = "text-center" data-property = "total" data-targets = '[
						"sf9_g{{ $grade->grade }}_attendance_jan_a",
						"sf9_g{{ $grade->grade }}_attendance_feb_a",
						"sf9_g{{ $grade->grade }}_attendance_mar_a",
						"sf9_g{{ $grade->grade }}_attendance_apr_a",
						"sf9_g{{ $grade->grade }}_attendance_may_a",
						"sf9_g{{ $grade->grade }}_attendance_jun_a",
						"sf9_g{{ $grade->grade }}_attendance_jul_a",
						"sf9_g{{ $grade->grade }}_attendance_aug_a",
						"sf9_g{{ $grade->grade }}_attendance_sep_a",
						"sf9_g{{ $grade->grade }}_attendance_oct_a",
						"sf9_g{{ $grade->grade }}_attendance_nov_a",
						"sf9_g{{ $grade->grade }}_attendance_dec_a"
					]'></td>
				</tr>

			</table>

			<!-- Signatures -->
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
</div>