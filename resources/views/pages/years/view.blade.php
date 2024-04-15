@extends('layouts.general.page')
@section('title') Cataloger - School Year Manager @endsection
@section('content')
	<div class = "container-fluid">
		<div class = "row">
			<div class = "col-12">
				<h1 class = "custom-header">
					<div class = "main">Years</div>
					<div class = "subtitle">Viewer | {{ $year->full }}</div>
					<hr>
				</h1>
				<b>Created on: </b>{{ $year->created_at->format('l jS \\of F Y') }}
				<br>
				<b>Updated on: </b>{{ $year->updated_at->format('l jS \\of F Y') }}
				<hr>
			</div>
		</div>
	</div>
	<div class = "container">
		<div class = "row">
			<div class = "col-4">
				<table class = "table">
					<tr>
						<th>Principal</th>
					</tr>
					<tr>
						<td>
							@if ($year->user_id)
								<a href = "{{ url('/users/view', $year->user_id) }}">{{ $year->user_name_last }}, {{ $year->user_name_first }}</a>
							@elseif ($year->user_archived)
								{{ $year->user_name_last }}, {{ $year->user_name_first }} (Archived)
							@else
								&nbsp;
							@endif
						</td>
					</tr>
				</table>
				<table class = "table">
					<tr>
						<th colspan = "2">Enrollee Count</th>
					</tr>
					<tr>
						<td width = "100">Grade 7</td>
						<td>{{ $year->enrollee_count_g7 ? $year->enrollee_count_g7 : '' }}</td>
					</tr>
						<td width = "100">Grade 8</td>
						<td>{{ $year->enrollee_count_g8 ? $year->enrollee_count_g8 : '' }}</td>
					</tr>
						<td width = "100">Grade 9</td>
						<td>{{ $year->enrollee_count_g9 ? $year->enrollee_count_g9 : '' }}</td>
					</tr>
						<td width = "100">Grade 10</td>
						<td>{{ $year->enrollee_count_g10 ? $year->enrollee_count_g10 : '' }}</td>
					</tr>
				</table>
				<table class = "table">
					<tr>
						<th colspan = "2">Enrollee Count (Unassigned)</th>
					</tr>
					<tr>
						<td width = "100">Grade 7</td>
						<td>{{ $year->un_enrollee_count_g7 ? $year->un_enrollee_count_g7 : '' }}</td>
					</tr>
						<td width = "100">Grade 8</td>
						<td>{{ $year->un_enrollee_count_g8 ? $year->un_enrollee_count_g8 : '' }}</td>
					</tr>
						<td width = "100">Grade 9</td>
						<td>{{ $year->un_enrollee_count_g9 ? $year->un_enrollee_count_g9 : '' }}</td>
					</tr>
						<td width = "100">Grade 10</td>
						<td>{{ $year->un_enrollee_count_g10 ? $year->un_enrollee_count_g10 : '' }}</td>
					</tr>
				</table>
				<table class = "table">
					<tr>
						<th colspan = "2">Enrollee Count (Archived)</th>
					</tr>
					<tr>
						<td width = "100">Grade 7</td>
						<td>{{ $year->lg_enrollee_count_g7 ? $year->lg_enrollee_count_g7 : '' }}</td>
					</tr>
						<td width = "100">Grade 8</td>
						<td>{{ $year->lg_enrollee_count_g8 ? $year->lg_enrollee_count_g8 : '' }}</td>
					</tr>
						<td width = "100">Grade 9</td>
						<td>{{ $year->lg_enrollee_count_g9 ? $year->lg_enrollee_count_g9 : '' }}</td>
					</tr>
						<td width = "100">Grade 10</td>
						<td>{{ $year->lg_enrollee_count_g10 ? $year->lg_enrollee_count_g10 : '' }}</td>
					</tr>
				</table>
				<table class = "table">
					<tr>
						<th colspan = "2">Attandance Count</th>
					</tr>
					<tr>
						<td width = "150">January</td>
						<td>{{ $year->attendance_jan_t ? $year->attendance_jan_t : '' }}</td>
					</tr>
						<td width = "150">February</td>
						<td>{{ $year->attendance_feb_t ? $year->attendance_feb_t : '' }}</td>
					</tr>
						<td width = "150">March</td>
						<td>{{ $year->attendance_mar_t ? $year->attendance_mar_t : '' }}</td>
					</tr>
						<td width = "150">April</td>
						<td>{{ $year->attendance_apr_t ? $year->attendance_apr_t : '' }}</td>
					</tr>
						<td width = "150">May</td>
						<td>{{ $year->attendance_may_t ? $year->attendance_may_t : '' }}</td>
					</tr>
						<td width = "150">June</td>
						<td>{{ $year->attendance_jun_t ? $year->attendance_jun_t : '' }}</td>
					</tr>
						<td width = "150">July</td>
						<td>{{ $year->attendance_jul_t ? $year->attendance_jul_t : '' }}</td>
					</tr>
						<td width = "150">August</td>
						<td>{{ $year->attendance_aug_t ? $year->attendance_aug_t : '' }}</td>
					</tr>
						<td width = "150">September</td>
						<td>{{ $year->attendance_sep_t ? $year->attendance_sep_t : '' }}</td>
					</tr>
						<td width = "150">October</td>
						<td>{{ $year->attendance_oct_t ? $year->attendance_oct_t : '' }}</td>
					</tr>
						<td width = "150">November</td>
						<td>{{ $year->attendance_nov_t ? $year->attendance_nov_t : '' }}</td>
					</tr>
						<td width = "150">December</td>
						<td>{{ $year->attendance_dec_t ? $year->attendance_dec_t : '' }}</td>
					</tr>
				</table>
			</div>
			<div class = "col-8">
				<table id = "index" class = "table">
					<thead>
						<tr>
							<th class = "text-left">Enrollee Name</th>
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
									@if (isset($student->user) && !$student->is_archived)
										<a href = "{{ url('/users/view', $student->user->id) }}">{{ $student->user->name_last }}, {{ $student->user->name_first }}</a>
									@elseif (isset($student->user) && $student->is_archived)
										@if ($student->user->name_last && $student->user->name_first)
											{{ $student->user->name_last }}, {{ $student->user->name_first }} (Archived)
										@endif
									@endif
								</td>
								<td class = "align-top">
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_fil'} < 75 ? 'Filipino '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_fil'} < 75 ? 'Filipino '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_fil'} < 75 ? 'Filipino '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_fil'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_fil'} < 75 ? 'Filipino '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_eng'} < 75 ? 'English '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_eng'} < 75 ? 'English '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_eng'} < 75 ? 'English '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_eng'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_eng'} < 75 ? 'English '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_mat'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_mat'} < 75 ? 'Mathemathics '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_sci'} < 75 ? 'Science '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_sci'} < 75 ? 'Science '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_sci'} < 75 ? 'Science '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_sci'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_sci'} < 75 ? 'Science '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_ap'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_ap'} < 75 ? 'Araling Panlipunan (AP) '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_ep'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_ep'} < 75 ? 'Edukasyon sa Pagpapakatao (EP) '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_tle'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_tle'} < 75 ? 'Technology and Livelihood Education (TLE) '.$student->grade.' (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_mus'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_mus'} < 75 ? 'MAPEH '.$student->grade.': Music (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_art'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_art'} < 75 ? 'MAPEH '.$student->grade.': Arts (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_pe'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_pe'} < 75 ? 'MAPEH '.$student->grade.': Physical Education (Q4)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr1_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr1_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q1)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr2_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr2_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q2)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr3_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr3_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q3)<br>' : '' !!}
									{!! $student->{'sf9_g'.$student->grade.'_subject_qr4_hp'} != null && $student->{'sf9_g'.$student->grade.'_subject_qr4_hp'} < 75 ? 'MAPEH '.$student->grade.': Health (Q4)<br>' : '' !!}
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
	</div>
@endsection