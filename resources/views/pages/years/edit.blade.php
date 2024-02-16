@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

<form action = "{{ url('/years/edit', $year->id) }}" method = "POST">

    @csrf

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
				<p class = "text-center">Manage school years and monthly total attendance counts</p>
			</div>
			
			<!-- Action -->
			<div class = "col">
				<input class = "button float-right" type = "submit" value = "Save">
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">Edit</h6>
				<p class = "text-center">{{ $year->year }}-{{ $year->year + 1 }}</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Edit -->
			<div class = "col">

				<!-- January -->
				<label>
					<span style = "min-width: 250px;">January Attendance Count:</span>
					<input
						name = "attendance_jan_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jan_t }}"
					>
				</label>
				<br>

				<!-- February -->
				<label>
					<span style = "min-width: 250px;">February Attendance Count:</span>
					<input
						name = "attendance_feb_t"
						type = "number"
						min = "0"
						max = "28"
						value = "{{ $year->attendance_feb_t }}"
					>
				</label>
				<br>

				<!-- March -->
				<label>
					<span style = "min-width: 250px;">March Attendance Count:</span>
					<input
						name = "attendance_mar_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_mar_t }}"
					>
				</label>
				<br>

				<!-- April -->
				<label>
					<span style = "min-width: 250px;">April Attendance Count:</span>
					<input
						name = "attendance_apr_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_apr_t }}"
					>
				</label>
				<br>

				<!-- May -->
				<label>
					<span style = "min-width: 250px;">May Attendance Count:</span>
					<input
						name = "attendance_may_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_may_t }}"
					>
				</label>
				<br>

				<!-- June -->
				<label>
					<span style = "min-width: 250px;">June Attendance Count:</span>
					<input
						name = "attendance_jun_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_jun_t }}"
					>
				</label>
				<br>

				<!-- July -->
				<label>
					<span style = "min-width: 250px;">July Attendance Count:</span>
					<input
						name = "attendance_jul_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jul_t }}"
					>
				</label>
				<br>

				<!-- August -->
				<label>
					<span style = "min-width: 250px;">August Attendance Count:</span>
					<input
						name = "attendance_aug_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_aug_t }}"
					>
				</label>
				<br>

				<!-- September -->
				<label>
					<span style = "min-width: 250px;">September Attendance Count:</span>
					<input
						name = "attendance_sep_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_sep_t }}"
					>
				</label>
				<br>

				<!-- October -->
				<label>
					<span style = "min-width: 250px;">October Attendance Count:</span>
					<input
						name = "attendance_oct_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_oct_t }}"
					>
				</label>
				<br>

				<!-- November -->
				<label>
					<span style = "min-width: 250px;">November Attendance Count:</span>
					<input
						name = "attendance_nov_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_nov_t }}"
					>
				</label>
				<br>

				<!-- December -->
				<label>
					<span style = "min-width: 250px;">December Attendance Count:</span>
					<input
						name = "attendance_dec_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_dec_t }}"
					>
				</label>

			</div>

		</div>
	</section>

</form>

@endsection