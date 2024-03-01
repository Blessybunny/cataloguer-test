@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col">
				<a href = "{{ url('/years') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>

			<!-- Header -->
			<div class = "col">
				<h4 class = "text-center">School Year Manager</h4>
				<p class = "text-center">Manage school year monthly attendance counts and more</p>
			</div>

			<!-- Action -->
			<div class = "col">
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">View</h6>
				<p class = "text-center">{{ $year->full }}</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- View -->
			<div class = "col">

				<!-- Principal -->
				<b>Principal:</b>
				{{ $year->principal }}
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