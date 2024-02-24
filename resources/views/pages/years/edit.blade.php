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
					<p class = "text-center">Manage school year monthly attendance counts and more</p>
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
				<div class = "col-6">

					<!-- Principal -->
					<span class = "font-bold">Principal:</span>
					<select name = "DB_USER_id">
						<option value = ""></option>

						@foreach ($users as $user)

							<option value = "{{ $user->id }}" {{ $year->DB_USER_id == $user->id ? "selected" : "" }}>{{ strtoupper($user->name_last) }}, {{ ucfirst($user->name_first) }}</option>

						@endforeach

					</select>
					<br>

					<!-- January -->
					<span class = "font-bold">January Attendance Count:</span>
					<input
						name = "attendance_jan_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jan_t }}"
					>
					<br>

					<!-- February -->					
					<span class = "font-bold">February Attendance Count:</span>
					<input
						name = "attendance_feb_t"
						type = "number"
						min = "0"
						max = "28"
						value = "{{ $year->attendance_feb_t }}"
					>
					<br>

					<!-- March -->
					<span class = "font-bold">March Attendance Count:</span>
					<input
						name = "attendance_mar_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_mar_t }}"
					>
					<br>

					<!-- April -->
					<span class = "font-bold">April Attendance Count:</span>
					<input
						name = "attendance_apr_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_apr_t }}"
					>
					<br>

					<!-- May -->
					<span class = "font-bold">May Attendance Count:</span>
					<input
						name = "attendance_may_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_may_t }}"
					>
					<br>

					<!-- June -->
					<span class = "font-bold">June Attendance Count:</span>
					<input
						name = "attendance_jun_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_jun_t }}"
					>
					<br>

					<!-- July -->
					<span class = "font-bold">July Attendance Count:</span>
					<input
						name = "attendance_jul_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jul_t }}"
					>
					<br>

					<!-- August -->
					<span class = "font-bold">August Attendance Count:</span>
					<input
						name = "attendance_aug_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_aug_t }}"
					>
					<br>

					<!-- September -->
					<span class = "font-bold">September Attendance Count:</span>
					<input
						name = "attendance_sep_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_sep_t }}"
					>
					<br>

					<!-- October -->
					<span class = "font-bold">October Attendance Count:</span>
					<input
						name = "attendance_oct_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_oct_t }}"
					>
					<br>

					<!-- November -->
					<span class = "font-bold">November Attendance Count:</span>
					<input
						name = "attendance_nov_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_nov_t }}"
					>
					<br>

					<!-- December -->
					<span class = "font-bold">December Attendance Count:</span>
					<input
						name = "attendance_dec_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_dec_t }}"
					>

				</div>
				<div class = "col-6">

					<!-- Legacy Principal Last Name -->
					<span class = "font-bold">Legacy Principal Last Name:</span>
					<input
						name = "PRESERVE_DB_USER_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $year->PRESERVE_DB_USER_name_last }}"
					>
					<p>This field is only for use if the appropriate principal is NOT on the list</p>

					<!-- Legacy Principal First Name -->
					<span class = "font-bold">Legacy Principal First Name:</span>
					<input
						name = "PRESERVE_DB_USER_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $year->PRESERVE_DB_USER_name_first }}"
					>
					<p>This field is only for use if the appropriate principal is NOT on the list</p>

				</div>

			</div>
		</section>

	</form>

@endsection