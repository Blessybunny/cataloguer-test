@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users/create') }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
					<a href = "{{ url('/users') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">User Creator</h4>
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

					<!-- DepEd ID -->
					<b>DepEd ID:</b>
					<input
						name = "email"
						type = "text"
						maxlength = "50"
						value = "{{ old('email') }}"
						required
					>

					@if($errors->has('email'))

						<b class = "error">* This DepEd ID has already been taken</b>
						<br>

					@endif

					<br>

					<!-- Password -->
					<b>Password (min. 6 characters):</b>
					<input
						name = "password"
						type = "password"
						value = ""
						required
					>
					<br>

					<!-- Confirm Password -->
					<b>Confirm Password:</b>
					<input
						name = "password_confirmation"
						type = "password"
						value = ""
						required
					>

					@if($errors->has('password'))

						<b class = "error">* This password is too short or mismatched</b>
						<br>

					@endif

					<br>

					<!-- Last Name -->
					<b>Last Name:</b>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_last') }}"
						required
					>
					<br>

					<!-- First Name -->
					<b>First Name:</b>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_first') }}"
						required
					>
					<br>

					<!-- Role -->
					<b>Role:</b>
					<select name = "DB_ROLE_id" required>
						<option value = ""></option>

						@foreach ($roles as $role)

							<option value = "{{ $role->id }}" {{ old('DB_ROLE_id') == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>

						@endforeach

					</select>

				</div>
			</div>

			<!-- Optional -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Optional</h6>
					<p class = "text-center">These apply to grade level coordinators and advisers</p>
					<hr>
				</div>
				<div class = "col-4">

					<!-- School Year Designation -->
					<b>School Year Designation:</b>
					<select name = "DB_YEAR_id">
						<option value = ""></option>

						@foreach ($years as $year)

							<option value = "{{ $year->id }}" {{ old("DB_YEAR_id") == $year->id ? "selected" : "" }}>{{ $year->full }}</option>

						@endforeach

					</select>
					<br>

					<!-- Subject Designation -->
					<b>Subject Designations:</b>

				</div>
				<div class = "col-4">

					<!-- Grade Level Coordinator's Designation -->
					<b>Grade Level Coordinator's Designation:</b>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ old("DB_GRADE_id") == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>

				</div>
				<div class = "col-4">

					<!-- Adviser's Designation -->
					<b>Adviser's Designation:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ old("DB_SECTION_id") == $section->id ? "selected" : "" }}>Grade {{ $section->grade }} | {{ $section->section }}</option>

						@endforeach

					</select>
					<br>

					<!-- Class Designations -->
					<b>Class Designations:</b>
					<div class = "border-all-light" style = "padding: 15px;">

						@foreach ($sections as $section)

							<label>
								<input
									name = "DB_SECTION_MULTI_id[]"
									type = "checkbox"
									value = "{{ $section->id }}"
									{{ is_array(old('DB_SECTION_MULTI_id')) && in_array($section->id, old('DB_SECTION_MULTI_id')) ? 'checked' : '' }}
								>
								Grade {{ $section->grade }} | {{ $section->section }}
							</label>

						@endforeach

					</div>

				</div>
			</div>

		</section>

	</form>

@endsection