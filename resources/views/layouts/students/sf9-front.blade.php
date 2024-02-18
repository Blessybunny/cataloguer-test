<div class = "container paper">
	<div class = "row">

		<!-- User Data -->

		@php

			$user_full = "Temp";

		@endphp

		@foreach ($users as $user)

			@foreach ($years as $year)

				@if ($year->DB_USER_id != null)

					@if ($user->id == $year->DB_USER_id)

						@php

							$user_full = strtoupper($user->name_last).', '.ucfirst($user->name_first);

						@endphp

					@endif

				@else

					@php

						$user_full = " FIX THIS ";

					@endphp

				@endif

			@endforeach

		@endforeach

		<!-- Year Data -->

		@php

			$year_full = null;
			$year_attendance_jan_t = null;
			$year_attendance_feb_t = null;
			$year_attendance_mar_t = null;
			$year_attendance_apr_t = null;
			$year_attendance_may_t = null;
			$year_attendance_jun_t = null;
			$year_attendance_jul_t = null;
			$year_attendance_aug_t = null;
			$year_attendance_sep_t = null;
			$year_attendance_oct_t = null;
			$year_attendance_nov_t = null;
			$year_attendance_dec_t = null;

		@endphp

		@foreach ($years as $year)

			@if ($year->id == $student->{'DB_YEAR_ID_g'.$grade})

				@php

					$year_full = $year->year.'-'.$year->year + 1;
					$year_attendance_jan_t = $year->attendance_jan_t;
					$year_attendance_feb_t = $year->attendance_feb_t;
					$year_attendance_mar_t = $year->attendance_mar_t;
					$year_attendance_apr_t = $year->attendance_apr_t;
					$year_attendance_may_t = $year->attendance_may_t;
					$year_attendance_jun_t = $year->attendance_jun_t;
					$year_attendance_jul_t = $year->attendance_jul_t;
					$year_attendance_aug_t = $year->attendance_aug_t;
					$year_attendance_sep_t = $year->attendance_sep_t;
					$year_attendance_oct_t = $year->attendance_oct_t;
					$year_attendance_nov_t = $year->attendance_nov_t;
					$year_attendance_dec_t = $year->attendance_dec_t;

				@endphp

				@break

			@endif

		@endforeach

		<!-- Left -->
		<div class = "col-6">
			<div class = "container-fluid">

				<!-- Header -->
				<div class = "row">
					<div class = "col">
						<h6 class = "heading">Learner's Progress Report Card (SF9)</h6>
					</div>
				</div>
				<div class = "row">
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
				</div>
				<br>
				
				<!-- Info -->
				<div class = "row">
					<div class = "col">
						<span>Leaner Reference Number: {{ $student->info_lrn }}</span>
						<span>Name: {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</span>
					</div>
				</div>
				<div class = "row">
					<div class = "col">
						<label>
							<span>Age:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade }}_report_age"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade.'_report_age'} }}"
							>
						</label>
						<span>Grade: {{ $grade }}</span>
					</div>
					<div class = "col">
						<span>Sex: {{ $student->info_sex }}</span>
						<span>Section:</span>
					</div>
				</div>
				<div class = "row">
					<div class = "col">
						<span>School Year: {{ $year_full }}</span>
					</div>
				</div>
				<br>

				<!-- Letter -->
				<div class = "row">
					<div class = "col">
						<span>Dear parent:</span>
						<span style = "text-indent: 60px;">This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. The school welcomes you, should you desire to know more about your child's progress.</span>
					</div>
				</div>
				<br>

				<div class = "row">
					<div class = "col">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">{{ $user_full }}</span>
							<span>OIC - Office of the Principal</span>
						</div>
					</div>
					<div class = "col">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">&nbsp;</span>
							<span>Adviser</span>
						</div>
					</div>
				</div>
				<br>

				<!-- Transfer -->
				<div class = "row">
					<div class = "col">
						<h6>Certificate Of Transfer</h6>
						<label>
							<span>Admitted to:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade }}_report_transfer_input_1"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade.'_report_transfer_input_1'} }}"
							>
						</label>
						<label>
							<span>Approved:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade }}_report_transfer_input_2"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade.'_report_transfer_input_2'} }}"
							>
						</label>
					</div>
				</div>
				<br>

				<div class = "row">
					<div class = "col">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">{{ $user_full }}</span>
							<span>OIC - Office of the Principal</span>
						</div>
					</div>
					<div class = "col">
						<div class = "text-center">
							<span class = "border-bottom-dark float-center" style = "width: 200px;">&nbsp;</span>
							<span>Adviser</span>
						</div>
					</div>
				</div>
				<br>

				<div class = "row">
					<div class = "col">
						<h6>Cancellation of Eligibility to Transfer</h6>
						<label>
							<span>Admitted to:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade }}_report_transfer_input_3"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade.'_report_transfer_input_3'} }}"
							>
						</label>
						<label>
							<span>Date:&nbsp;</span>
							<input
								name = "sf9_g{{ $grade }}_report_transfer_input_date"
								type = "text"
								maxlength = "50"
								value = "{{ $student->{'sf9_g'.$grade.'_report_transfer_input_date'} }}"
							>
						</label>
					</div>
				</div>
				<br>

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
					<td class = "text-center">
						{{ $year_attendance_oct_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_oct_t"
							value = "{{ $year_attendance_oct_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_oct_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_oct_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_oct_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_oct_a'} }}"
						>
					</td>
				</tr>

				<!-- November -->
				<tr>
					<td class = "text-center">Nov</td>
					<td class = "text-center">
						{{ $year_attendance_nov_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_nov_t"
							value = "{{ $year_attendance_nov_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_nov_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_nov_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_nov_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_nov_a'} }}"
						>
					</td>
				</tr>

				<!-- December -->
				<tr>
					<td class = "text-center">Dec</td>
					<td class = "text-center">
						{{ $year_attendance_dec_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_dec_t"
							value = "{{ $year_attendance_dec_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_dec_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_dec_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_dec_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_dec_a'} }}"
						>
					</td>
				</tr>

				<!-- January -->
				<tr>
					<td class = "text-center">Jan</td>
					<td class = "text-center">
						{{ $year_attendance_jan_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_jan_t"
							value = "{{ $year_attendance_jan_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_jan_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_jan_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_jan_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_jan_a'} }}"
						>
					</td>
				</tr>

				<!-- February -->
				<tr>
					<td class = "text-center">Feb</td>
					<td class = "text-center">
						{{ $year_attendance_feb_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_feb_t"
							value = "{{ $year_attendance_feb_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_feb_p"
							type = "number"
							min = "0"
							max = "28"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_feb_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_feb_a"
							type = "number"
							min = "0"
							max = "28"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_feb_a'} }}"
						>
					</td>
				</tr>

				<!-- March -->
				<tr>
					<td class = "text-center">Mar</td>
					<td class = "text-center">
						{{ $year_attendance_mar_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_mar_t"
							value = "{{ $year_attendance_mar_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_mar_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_mar_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_mar_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_mar_a'} }}"
						>
					</td>
				</tr>

				<!-- April -->
				<tr>
					<td class = "text-center">Apr</td>
					<td class = "text-center">
						{{ $year_attendance_apr_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_apr_t"
							value = "{{ $year_attendance_apr_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_apr_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_apr_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_apr_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_apr_a'} }}"
						>
					</td>
				</tr>

				<!-- May -->
				<tr>
					<td class = "text-center">May</td>
					<td class = "text-center">
						{{ $year_attendance_may_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_may_t"
							value = "{{ $year_attendance_may_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_may_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_may_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_may_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_may_a'} }}"
						>
					</td>
				</tr>

				<!-- June -->
				<tr>
					<td class = "text-center">Jun</td>
					<td class = "text-center">
						{{ $year_attendance_jun_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_jun_t"
							value = "{{ $year_attendance_jun_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_jun_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_jun_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_jun_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_jun_a'} }}"
						>
					</td>
				</tr>

				<!-- July -->
				<tr>
					<td class = "text-center">Jul</td>
					<td class = "text-center">
						{{ $year_attendance_jul_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_jul_t"
							value = "{{ $year_attendance_jul_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_jul_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_jul_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_jul_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_jul_a'} }}"
						>
					</td>
				</tr>

				<!-- August -->
				<tr>
					<td class = "text-center">Aug</td>
					<td class = "text-center">
						{{ $year_attendance_aug_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_aug_t"
							value = "{{ $year_attendance_aug_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_aug_p"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_aug_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_aug_a"
							type = "number"
							min = "0"
							max = "31"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_aug_a'} }}"
						>
					</td>
				</tr>

				<!-- September -->
				<tr>
					<td class = "text-center">Sep</td>
					<td class = "text-center">
						{{ $year_attendance_sep_t }}
						<input
							class = "display-none"
							name = "sf9_g{{ $grade }}_attendance_sep_t"
							value = "{{ $year_attendance_sep_t }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_sep_p"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_sep_p'} }}"
						>
					</td>
					<td>
						<input
							class = "text-center"
							name = "sf9_g{{ $grade }}_attendance_sep_a"
							type = "number"
							min = "0"
							max = "30"
							value = "{{ $student->{'sf9_g'.$grade.'_attendance_sep_a'} }}"
						>
					</td>
				</tr>

				<!-- Total -->
				<tr>
					<th class = "text-center">Total</th>
					<td class = "text-center" data-property = "total" data-targets = '[
						"sf9_g{{ $grade }}_attendance_jan_t",
						"sf9_g{{ $grade }}_attendance_feb_t",
						"sf9_g{{ $grade }}_attendance_mar_t",
						"sf9_g{{ $grade }}_attendance_apr_t",
						"sf9_g{{ $grade }}_attendance_may_t",
						"sf9_g{{ $grade }}_attendance_jun_t",
						"sf9_g{{ $grade }}_attendance_jul_t",
						"sf9_g{{ $grade }}_attendance_aug_t",
						"sf9_g{{ $grade }}_attendance_sep_t",
						"sf9_g{{ $grade }}_attendance_oct_t",
						"sf9_g{{ $grade }}_attendance_nov_t",
						"sf9_g{{ $grade }}_attendance_dec_t"
					]'></td>
					<td class = "text-center" data-property = "total" data-targets = '[
						"sf9_g{{ $grade }}_attendance_jan_p",
						"sf9_g{{ $grade }}_attendance_feb_p",
						"sf9_g{{ $grade }}_attendance_mar_p",
						"sf9_g{{ $grade }}_attendance_apr_p",
						"sf9_g{{ $grade }}_attendance_may_p",
						"sf9_g{{ $grade }}_attendance_jun_p",
						"sf9_g{{ $grade }}_attendance_jul_p",
						"sf9_g{{ $grade }}_attendance_aug_p",
						"sf9_g{{ $grade }}_attendance_sep_p",
						"sf9_g{{ $grade }}_attendance_oct_p",
						"sf9_g{{ $grade }}_attendance_nov_p",
						"sf9_g{{ $grade }}_attendance_dec_p"
					]'></td>
					<td class = "text-center" data-property = "total" data-targets = '[
						"sf9_g{{ $grade }}_attendance_jan_a",
						"sf9_g{{ $grade }}_attendance_feb_a",
						"sf9_g{{ $grade }}_attendance_mar_a",
						"sf9_g{{ $grade }}_attendance_apr_a",
						"sf9_g{{ $grade }}_attendance_may_a",
						"sf9_g{{ $grade }}_attendance_jun_a",
						"sf9_g{{ $grade }}_attendance_jul_a",
						"sf9_g{{ $grade }}_attendance_aug_a",
						"sf9_g{{ $grade }}_attendance_sep_a",
						"sf9_g{{ $grade }}_attendance_oct_a",
						"sf9_g{{ $grade }}_attendance_nov_a",
						"sf9_g{{ $grade }}_attendance_dec_a"
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