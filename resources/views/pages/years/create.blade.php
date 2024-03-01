@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<form action = "{{ url('/years/create') }}" method = "POST">

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
					<input class = "button float-right" type = "submit" value = "Add">
				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Required</h6>
					<p class = "text-center">Please fill in the fields below</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Required -->
				<div class = "col">

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
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Optional</h6>
					<p class = "text-center">The fields below can be edited and changed later</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Optional -->
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
						max = "28"
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
				<div class = "col-6">

					<!-- Legacy Principal Last Name -->
					<b>Legacy Principal Last Name:</b>
					<input
						name = "PRESERVE_DB_USER_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('PRESERVE_DB_USER_name_last') }}"
					>
					<p>This field is used if the appropriate principal is NOT on the list</p>

					<!-- Legacy Principal First Name -->
					<b>Legacy Principal First Name:</b>
					<input
						name = "PRESERVE_DB_USER_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('PRESERVE_DB_USER_name_first') }}"
					>
					<p>This field is used if the appropriate principal is NOT on the list</p>

				</div>

			</div>
		</section>

	</form>

@endsection