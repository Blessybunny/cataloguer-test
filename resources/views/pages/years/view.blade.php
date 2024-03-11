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
			</div>
			<div class = "col-12">

				<!-- Principal -->
				<b>Principal:</b>

				@if ($year->user_id)

					<a href = "{{ url('/users/view', $year->user_id) }}">{{ $year->user_name_last }}, {{ $year->user_name_first }}</a>

				@else

					{{ $year->user_legacy }}

				@endif

				<br>
				<br>

				<!-- January -->
				<b>January Attendance Count:</b>
				{{ $year->attendance_jan_t }}
				<br>

				<!-- February -->
				<b>February Attendance Count:</b>
				{{ $year->attendance_feb_t }}
				<br>

				<!-- March -->
				<b>March Attendance Count:</b>
				{{ $year->attendance_mar_t }}
				<br>

				<!-- April -->
				<b>April Attendance Count:</b>
				{{ $year->attendance_apr_t }}
				<br>

				<!-- May -->
				<b>May Attendance Count:</b>
				{{ $year->attendance_may_t }}
				<br>

				<!-- June -->
				<b>June Attendance Count:</b>
				{{ $year->attendance_jun_t }}
				<br>

				<!-- July -->
				<b>July Attendance Count:</b>
				{{ $year->attendance_jul_t }}
				<br>

				<!-- August -->
				<b>August Attendance Count:</b>
				{{ $year->attendance_aug_t }}
				<br>

				<!-- September -->
				<b>September Attendance Count:</b>
				{{ $year->attendance_sep_t }}
				<br>

				<!-- October -->
				<b>October Attendance Count:</b>
				{{ $year->attendance_oct_t }}
				<br>

				<!-- November -->
				<b>November Attendance Count:</b>
				{{ $year->attendance_nov_t }}
				<br>

				<!-- December -->
				<b>December Attendance Count:</b>
				{{ $year->attendance_dec_t }}

			</div>
		</div>

	</section>

@endsection