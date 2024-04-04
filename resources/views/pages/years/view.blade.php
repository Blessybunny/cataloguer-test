@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/years') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">School Year Viewer</h4>
				<p class = "text-center">{{ $year->full }}</p>
			</div>
			<div class = "align-self-center col-4">
			</div>
		</div>

		<!-- View -->
		<div class = "row">
			<div class = "col-12">
				<hr>
				<b>Created on: </b>{{ $year->created_at->format('l jS \\of F Y') }}
				<br>
				<b>Edited on: </b>{{ $year->updated_at->format('l jS \\of F Y') }}
				<hr>
			</div>
			<div class = "col-4">
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
			</div>
			<div class = "col-4">
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
						<th class = "text-left" colspan = "2">Enrollee Count (Legacy)</th>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Grade 7</td>
						<td class = "align-top">

							@if ($year->lg_enrollee_count_g7 != null)

								{{  $year->lg_enrollee_count_g7 }}

							@else

								&nbsp;

							@endif

						</td>
					</tr>
						<td class = "align-top" width = "100">Grade 8</td>
						<td class = "align-top">

							@if ($year->lg_enrollee_count_g8 != null)

								{{  $year->lg_enrollee_count_g8 }}

							@else

								&nbsp;

							@endif

						</td>
					</tr>
						<td class = "align-top" width = "100">Grade 9</td>
						<td class = "align-top">

							@if ($year->lg_enrollee_count_g9 != null)

								{{  $year->lg_enrollee_count_g9 }}

							@else

								&nbsp;

							@endif

						</td>
					</tr>
						<td class = "align-top" width = "100">Grade 10</td>
						<td class = "align-top">

							@if ($year->lg_enrollee_count_g10 != null)

								{{  $year->lg_enrollee_count_g10 }}

							@else

								&nbsp;

							@endif

						</td>
					</tr>
				</table>
			</div>
			<div class = "col-4">
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
		</div>

	</section>

@endsection