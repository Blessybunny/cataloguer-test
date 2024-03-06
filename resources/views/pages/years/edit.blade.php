@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<form action = "{{ url('/years/edit', $year->id) }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
					<a href = "{{ url('/years') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">School Year Editor</h4>
					<p class = "text-center">{{ $year->full }}</p>
				</div>
				<div class = "align-self-center col-4">
					<input class = "button float-right" type = "submit" value = "Save">
				</div>
			</div>

			<!-- Content -->
			<div class = "row">
				<div class = "col-12">
					<hr>
				</div>
				<div class = "col-6">

					<!-- Principal -->
					<b>Principal:</b>
					<select name = "DB_USER_id">
						<option value = ""></option>

						@foreach ($users as $user)

							<option value = "{{ $user->id }}" {{ $year->DB_USER_id == $user->id ? "selected" : "" }}>{{ $user->name_last }}, {{ $user->name_first }}</option>

						@endforeach

					</select>
					<br>

					<!-- Legacy Principal Last Name -->
					<b>Legacy Principal Last Name:</b>
					<input
						name = "LG_USER_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $year->LG_USER_name_last }}"
					>
					This field is used if the appropriate principal is NOT on the list
					<br>
					<br>

					<!-- Legacy Principal First Name -->
					<b>Legacy Principal First Name:</b>
					<input
						name = "LG_USER_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $year->LG_USER_name_first }}"
					>
					This field is used if the appropriate principal is NOT on the list
					<br>
					<br>

				</div>
				<div class = "col-6">

					<!-- January -->
					<b>January Attendance Count:</b>
					<input
						name = "attendance_jan_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jan_t }}"
					>
					<br>

					<!-- February -->					
					<b>February Attendance Count:</b>
					<input
						name = "attendance_feb_t"
						type = "number"
						min = "0"
						max = "29"
						value = "{{ $year->attendance_feb_t }}"
					>
					<br>

					<!-- March -->
					<b>March Attendance Count:</b>
					<input
						name = "attendance_mar_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_mar_t }}"
					>
					<br>

					<!-- April -->
					<b>April Attendance Count:</b>
					<input
						name = "attendance_apr_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_apr_t }}"
					>
					<br>

					<!-- May -->
					<b>May Attendance Count:</b>
					<input
						name = "attendance_may_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_may_t }}"
					>
					<br>

					<!-- June -->
					<b>June Attendance Count:</b>
					<input
						name = "attendance_jun_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_jun_t }}"
					>
					<br>

					<!-- July -->
					<b>July Attendance Count:</b>
					<input
						name = "attendance_jul_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jul_t }}"
					>
					<br>

					<!-- August -->
					<b>August Attendance Count:</b>
					<input
						name = "attendance_aug_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_aug_t }}"
					>
					<br>

					<!-- September -->
					<b>September Attendance Count:</b>
					<input
						name = "attendance_sep_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_sep_t }}"
					>
					<br>

					<!-- October -->
					<b>October Attendance Count:</b>
					<input
						name = "attendance_oct_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_oct_t }}"
					>
					<br>

					<!-- November -->
					<b>November Attendance Count:</b>
					<input
						name = "attendance_nov_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_nov_t }}"
					>
					<br>

					<!-- December -->
					<b>December Attendance Count:</b>
					<input
						name = "attendance_dec_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_dec_t }}"
					>

				</div>
			</div>

		</section>

	</form>

@endsection