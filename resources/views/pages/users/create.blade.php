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
					<b>Password (min. 10 characters):</b>
					<input
						name = "password"
						type = "password"
						pattern = ".{10,}"
						value = ""
						required
					>
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
					<hr>
				</div>
				<div class = "col-12">

					<!-- Designated Grade -->
					<b>Designated Grade:</b>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ old("DB_GRADE_id") == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>
					This field is used for grade level coordinators and teachers
					<br>
					<br>

					<!-- Designated Section -->
					<b>Designated Section:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ old("DB_SECTION_id") == $section->id ? "selected" : "" }}>Grade {{ $section->grade }} | {{ $section->section }}</option>

						@endforeach

					</select>
					This field is used for advisers

				</div>
			</div>

		</section>

	</form>

@endsection