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
					<span class = "font-bold">DepEd ID:</span>
					<input
						name = "email"
						type = "text"
						maxlength = "50"
						value = "{{ old('email') }}"
						required
					>

					@if($errors->has('email'))

						<span class = "error">* This DepEd ID has already been taken</span>

					@endif

					<br>

					<!-- Password -->
					<span class = "font-bold">Password (min. 10 characters):</span>
					<input
						name = "password"
						type = "password"
						pattern = ".{10,}"
						value = ""
						required
					>
					<br>

					<!-- Last Name -->
					<span class = "font-bold">Last Name:</span>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_last') }}"
						required
					>
					<br>

					<!-- First Name -->
					<span class = "font-bold">First Name:</span>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_first') }}"
						required
					>
					<br>

					<!-- Role -->
					<span class = "font-bold">Role:</span>
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

					<!-- Advisory Grade -->
					<span class = "font-bold">Advisory Grade:</span>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ old("DB_GRADE_id") == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>
					<p>This setting only applies to grade level coordinators</p>

					<!-- Advisory Section -->
					<span class = "font-bold">Advisory Section:</span>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ old("DB_SECTION_id") == $section->id ? "selected" : "" }}>Grade {{ $section->grade }} - {{ $section->section }}</option>

						@endforeach

					</select>
					<p>This setting only applies to advisers and teachers</p>

				</div>

			</div>
		</section>

	</form>

@endsection