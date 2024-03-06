@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<form action = "{{ url('/years/create') }}" method = "POST">

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
					<h4 class = "text-center">School Year Creator</h4>
				</div>
				<div class = "align-self-center col-4">
					<input class = "button float-right" type = "submit" value = "Add">
				</div>
			</div>

			<!-- Required -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Required</h6>
					<hr>
				</div>
				<div class = "col-12">

					<!-- Starting year -->
					<b id = "year-label"></b>
					<input
						id = "year-input"
						name = "year"
						type = "number"
						min = "1900"
						max = ""
						value = "{{ old('year') }}"
						required
					>
					<script>
						const yearLabel = document.getElementById('year-label');
						const yearInput = document.getElementById('year-input');

						yearInput.max = new Date().getFullYear();
						yearLabel.innerHTML = `Starting Year (1900-${yearInput.max}):`;
					</script>

					@if($errors->has('year'))

						<b class = "error">* This school year has already been made</b>

					@endif

				</div>
			</div>

			<!-- Optional -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Optional</h6>
					<hr>
				</div>
				<div class = "col-6">

					<!-- Principal -->
					<b>Principal:</b>
					<select name = "DB_USER_id">
						<option value = ""></option>

						@foreach ($users as $user)

							<option value = "{{ $user->id }}">{{ $user->name_last }}, {{ $user->name_first }}</option>

						@endforeach

					</select>
					<br>

					<!-- Legacy Principal Last Name -->
					<b>Legacy Principal Last Name:</b>
					<input
						name = "LG_USER_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('LG_USER_name_last') }}"
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
						value = "{{ old('LG_USER_name_first') }}"
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
						value = "{{ old('attendance_jan_t') }}"
					>
					<br>

					<!-- February -->
					<b>February Attendance Count:</b>
					<input
						name = "attendance_feb_t"
						type = "number"
						min = "0"
						max = "29"
						value = "{{ old('attendance_feb_t') }}"
					>
					<br>

					<!-- March -->
					<b>March Attendance Count:</b>
					<input
						name = "attendance_mar_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_mar_t') }}"
					>
					<br>

					<!-- April -->
					<b>April Attendance Count:</b>
					<input
						name = "attendance_apr_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_apr_t') }}"
					>
					<br>

					<!-- May -->
					<b>May Attendance Count:</b>
					<input
						name = "attendance_may_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_may_t') }}"
					>
					<br>

					<!-- June -->
					<b>June Attendance Count:</b>
					<input
						name = "attendance_jun_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_jun_t') }}"
					>
					<br>

					<!-- July -->
					<b>July Attendance Count:</b>
					<input
						name = "attendance_jul_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_jul_t') }}"
					>
					<br>

					<!-- August -->
					<b>August Attendance Count:</b>
					<input
						name = "attendance_aug_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_aug_t') }}"
					>
					<br>

					<!-- September -->
					<b>September Attendance Count:</b>
					<input
						name = "attendance_sep_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_sep_t') }}"
					>
					<br>

					<!-- October -->
					<b>October Attendance Count:</b>
					<input
						name = "attendance_oct_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_oct_t') }}"
					>
					<br>

					<!-- November -->
					<b>November Attendance Count:</b>
					<input
						name = "attendance_nov_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_nov_t') }}"
					>
					<br>

					<!-- December -->
					<b>December Attendance Count:</b>
					<input
						name = "attendance_dec_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_dec_t') }}"
					>

				</div>
			</div>

		</section>

	</form>

@endsection