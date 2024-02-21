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
					<span class = "font-bold" id = "year-label"></span>
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

						<span class = "error">* This school year has already been made</span>

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
					<span class = "font-bold">Principal:</span>
					<select name = "DB_USER_id">
						<option value = ""></option>

						@foreach ($users as $user)

							<option value = "{{ $user->id }}">{{ strtoupper($user->name_last) }}, {{ ucfirst($user->name_first) }}</option>

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
						value = "{{ old('attendance_jan_t') }}"
					>
					<br>

					<!-- February -->
					<span class = "font-bold">February Attendance Count:</span>
					<input
						name = "attendance_feb_t"
						type = "number"
						min = "0"
						max = "28"
						value = "{{ old('attendance_feb_t') }}"
					>
					<br>

					<!-- March -->
					<span class = "font-bold">March Attendance Count:</span>
					<input
						name = "attendance_mar_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_mar_t') }}"
					>
					<br>

					<!-- April -->
					<span class = "font-bold">April Attendance Count:</span>
					<input
						name = "attendance_apr_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_apr_t') }}"
					>
					<br>

					<!-- May -->
					<span class = "font-bold">May Attendance Count:</span>
					<input
						name = "attendance_may_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_may_t') }}"
					>
					<br>

					<!-- June -->
					<span class = "font-bold">June Attendance Count:</span>
					<input
						name = "attendance_jun_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_jun_t') }}"
					>
					<br>

					<!-- July -->
					<span class = "font-bold">July Attendance Count:</span>
					<input
						name = "attendance_jul_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_jul_t') }}"
					>
					<br>

					<!-- August -->
					<span class = "font-bold">August Attendance Count:</span>
					<input
						name = "attendance_aug_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_aug_t') }}"
					>
					<br>

					<!-- September -->
					<span class = "font-bold">September Attendance Count:</span>
					<input
						name = "attendance_sep_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_sep_t') }}"
					>
					<br>

					<!-- October -->
					<span class = "font-bold">October Attendance Count:</span>
					<input
						name = "attendance_oct_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_oct_t') }}"
					>
					<br>

					<!-- November -->
					<span class = "font-bold">November Attendance Count:</span>
					<input
						name = "attendance_nov_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ old('attendance_nov_t') }}"
					>
					<br>

					<!-- December -->
					<span class = "font-bold">December Attendance Count:</span>
					<input
						name = "attendance_dec_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ old('attendance_dec_t') }}"
					>

				</div>
				<div class = "col-6">

					<!-- Preserved Principal Last Name -->
					<span class = "font-bold">Preserved Principal Last Name:</span>
					<input
						name = "PRESERVE_DB_USER_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('PRESERVE_DB_USER_name_last') }}"
					>
					<p>This field only applies if a principal does not exist on the list</p>

					<!-- Preserved Principal First Name -->
					<span class = "font-bold">Preserved Principal First Name:</span>
					<input
						name = "PRESERVE_DB_USER_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('PRESERVE_DB_USER_name_first') }}"
					>
					<p>This field only applies if a principal does not exist on the list</p>

				</div>

			</div>
		</section>

	</form>

@endsection