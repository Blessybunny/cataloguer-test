@extends('layouts.general.page')

@section('title') Cataloger - Home @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-12">
				<h4 class = "text-center">Home</h4>
			</div>
			<div class = "align-self-center col-12">
				<hr>
			</div>
		</div>

		<!-- Actions -->
		<div class = "row">

			@if (
				$auth->is_principal ||
				$auth->is_administrator
			)

				<div class = "col-3">
					<a href = "{{ url('/sections') }}" class = "card h-100">
						<div class = "card-body">
							<h6 class = "card-title text-center">Section Manager</h6>
							<p class = "card-subtitle text-center">Manage section names for each grade level</p>
						</div>
					</a>
				</div>

			@endif

			<div class = "col-3">
				<a href = "{{ url('/students') }}" class = "card h-100">
					<div class = "card-body">
						<h6 class = "card-title text-center">Student Manager</h6>
						<p class = "card-subtitle text-center">Manage student info, grades, and forms</p>
					</div>
				</a>
			</div>

			@if (
				$auth->is_principal ||
				$auth->is_administrator
			)

				<div class = "col-3">
					<a href = "{{ url('/users') }}" class = "card h-100">
						<div class = "card-body">
							<h6 class = "card-title text-center">User Manager</h6>
							<p class = "card-subtitle text-center">Manage user permission and access</p>
						</div>
					</a>
				</div>

			@endif

			@if (
				$auth->is_principal ||
				$auth->is_administrator
			)

				<div class = "col-3">
					<a href = "{{ url('/years') }}" class = "card h-100">
						<div class = "card-body">
							<h6 class = "card-title text-center">School Year Manager</h6>
							<p class = "card-subtitle text-center">Manage school year monthly attendance counts and more</p>
						</div>
					</a>
				</div>

			@endif

		</div>

		<!-- Details -->
		@if (
			$auth->is_principal ||
			$auth->is_administrator
		)

			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Latest School Year Details</h6>
					<p class = "text-center">{{ $year->full }}</p>
					<hr>
				</div>
				<div class = "col-3">
					<table class = "table">
						<tr>
							<th class = "text-left">Principal</th>
						</tr>
						<tr>
							<td>

								@if ($year->user_id)

									<a href = "{{ url('/users/view', $year->user_id) }}">{{ $year->user_name_last }}, {{ $year->user_name_first }}</a>

								@elseif ($year->user_legacy)

									{{ $year->user_name_last }}, {{ $year->user_name_first }} (Legacy)

								@else

									&nbsp;

								@endif

							</td>
						</tr>
					</table>
					<table class = "table">
						<tr>
							<th class = "text-left" colspan = "2">Enrollee Count</th>
						</tr>
						<tr>
							<td class = "align-top" width = "100">Grade 7</td>
							<td class = "align-top">

								@if ($year->enrollee_count_g7 != null)

									{{  $year->enrollee_count_g7 }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "100">Grade 8</td>
							<td class = "align-top">

								@if ($year->enrollee_count_g8 != null)

									{{  $year->enrollee_count_g8 }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "100">Grade 9</td>
							<td class = "align-top">

								@if ($year->enrollee_count_g9 != null)

									{{  $year->enrollee_count_g9 }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "100">Grade 10</td>
							<td class = "align-top">

								@if ($year->enrollee_count_g10 != null)

									{{  $year->enrollee_count_g10 }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
					</table>
					<table class = "table">
						<tr>
							<th class = "text-left" colspan = "2">Attandance Count</th>
						</tr>
						<tr>
							<td class = "align-top" width = "150">January</td>
							<td class = "align-top">

								@if ($year->attendance_jan_t != null)

									{{  $year->attendance_jan_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">February</td>
							<td class = "align-top">

								@if ($year->attendance_feb_t != null)

									{{  $year->attendance_feb_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">March</td>
							<td class = "align-top">

								@if ($year->attendance_mar_t != null)

									{{  $year->attendance_mar_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">April</td>
							<td class = "align-top">

								@if ($year->attendance_apr_t != null)

									{{  $year->attendance_apr_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">May</td>
							<td class = "align-top">

								@if ($year->attendance_may_t != null)

									{{  $year->attendance_may_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">June</td>
							<td class = "align-top">

								@if ($year->attendance_jun_t != null)

									{{  $year->attendance_jun_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">July</td>
							<td class = "align-top">

								@if ($year->attendance_jul_t != null)

									{{  $year->attendance_jul_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">August</td>
							<td class = "align-top">

								@if ($year->attendance_aug_t != null)

									{{  $year->attendance_aug_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">September</td>
							<td class = "align-top">

								@if ($year->attendance_sep_t != null)

									{{  $year->attendance_sep_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">October</td>
							<td class = "align-top">

								@if ($year->attendance_oct_t != null)

									{{  $year->attendance_oct_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">November</td>
							<td class = "align-top">

								@if ($year->attendance_nov_t != null)

									{{  $year->attendance_nov_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
							<td class = "align-top" width = "150">December</td>
							<td class = "align-top">

								@if ($year->attendance_dec_t != null)

									{{  $year->attendance_dec_t }}

								@else

									&nbsp;

								@endif

							</td>
						</tr>
					</table>
				</div>
				<div class = "col-9">
					<table id = "index" class = "table">
						<thead>
							<tr>
								<th class = "text-left"> Student Name</th>
								<th class = "text-left">Grade</th>
								<th class = "text-left">Section</th>
								<th class = "text-left">Adviser</th>
								<th class = "text-left">SF9 | Conflicted Subjects</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($students as $student)

								<tr>
									<td class = "align-top">
										<a href = "{{ url('/students/view', $student->id) }}">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</a>
									</td>
									<td class = "align-top">{{ $student->grade }}</td>
									<td class = "align-top">{{ $student->section }}</td>
									<td class = "align-top">

										@if (isset($student->user))

											{{ $student->user->name_last }}, {{ $student->user->name_first }}

										@endif

									</td>
									<td class = "align-top">

										<!-- Subject -> filipino -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_fil'} < 75 ? 'Filipino '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_fil'} < 75 ? 'Filipino '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_fil'} < 75 ? 'Filipino '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_fil'} < 75 ? 'Filipino '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> english -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_eng'} < 75 ? 'English '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_eng'} < 75 ? 'English '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_eng'} < 75 ? 'English '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_eng'} < 75 ? 'English '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> mathematics -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> science -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_sci'} < 75 ? 'Science '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_sci'} < 75 ? 'Science '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_sci'} < 75 ? 'Science '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_sci'} < 75 ? 'Science '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> araling panlipunan (ap) -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> edukasyon sa pagpapakatao (ep) -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> technology and livelihood education (tle) -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q4)<br>' : '' !!}

										<!-- Subject -> music -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q4)<br>' : '' !!}

										<!-- Subject -> arts -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q4)<br>' : '' !!}

										<!-- Subject -> physical education -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q4)<br>' : '' !!}

										<!-- Subject -> health -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q4)<br>' : '' !!}

										<!-- Subject -> nihongo -->
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_jp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_jp'} < 75 ? 'Nihongo '.$student->grade.' (Q1)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_jp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_jp'} < 75 ? 'Nihongo '.$student->grade.' (Q2)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_jp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_jp'} < 75 ? 'Nihongo '.$student->grade.' (Q3)<br>' : '' !!}
										{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_jp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_jp'} < 75 ? 'Nihongo '.$student->grade.' (Q4)<br>' : '' !!}

									</td>
								</tr>

							@endforeach

						</tbody>
					</table>

					<script>
						const table = new DataTable('#index', {
							columnDefs: [
								{ className: "dt-body-left", targets: [ 1 ] },
							],
							info: false,
							paging: false,
							searching: false,
						});
					</script>
				</div>
			</div>

		@endif

	</section>

@endsection