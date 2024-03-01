@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users/create') }}" method = "POST">

		@csrf

		<section class = "container">
			<div class = "row">

				<!-- Action -->
				<div class = "col">
					<a href = "{{ url('/users') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>

				<!-- Header -->
				<div class = "col">
					<h4 class = "text-center">User Manager</h4>
					<p class = "text-center">Manage user permission and access</p>
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
				<div class = "col">

					<!-- Designated Grade -->
					<b>Designated Grade:</b>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ old("DB_GRADE_id") == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>
					<p>This field is used for grade level coordinators and teachers</p>

					<!-- Designated Section -->
					<b>Designated Section:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ old("DB_SECTION_id") == $section->id ? "selected" : "" }}>Grade {{ $section->grade }} | {{ $section->section }}</option>

						@endforeach

					</select>
					<p>This field is used for advisers</p>

				</div>

			</div>
		</section>

	</form>

@endsection