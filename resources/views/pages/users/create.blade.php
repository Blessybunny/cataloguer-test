@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

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
				<label>
					<span style = "min-width: 150px;">DepEd ID:</span>
					<input
						name = "email"
						type = "text"
						maxlength = "50"
						value = "{{ old('email') }}"
						required
					>
				</label>

				@if($errors->has('email'))

					<span class = "error" style = "margin-left: 150px;">* This DepEd ID has already been taken</span>

				@endif

				<br>

				<!-- Password -->
				<label>
					<span style = "min-width: 150px;">Password:</span>
					<input
						name = "password"
						type = "password"
						pattern = ".{10,}"
						value = ""
						required
					>
				</label>
				<span style = "margin-left: 150px;">Minimum: 10 characters</span>
				<br>
				<br>

				<!-- Last Name -->
				<label>
					<span style = "min-width: 150px;">Last Name:</span>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_last') }}"
						required
					>
				</label>
				<br>

				<!-- First Name -->
				<label>
					<span style = "min-width: 150px;">First Name:</span>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_first') }}"
						required
					>
				</label>
				<br>

				<!-- Role -->
				<label>
					<span style = "min-width: 150px;">Role:</span>
					<select name = "db_role_id" required>
						<option value = ""></option>

						@foreach ($roles as $role)

							<option value = "{{ $role->id }}" {{ old('db_role_id') == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>

						@endforeach

					</select>
				</label>

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
				<label>
					<span style = "min-width: 150px;">Advisory Grade:</span>
					<select name = "db_grade_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ old("db_grade_id") == $grade->id ? "selected" : "" }}>{{ $grade->grade }}</option>

						@endforeach

					</select>
				</label>
				<span style = "margin-left: 150px;">Note: this setting only applies to grade level coordinators</span>
				<br>
				<br>

				<!-- Advisory Section -->
				<label>
					<span style = "min-width: 150px;">Advisory Section:</span>
					<select name = "db_section_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							@if ($section->section != null)

								@foreach ($grades as $grade)

									@if ($grade->id == $section->db_grade_id)

										<option value = "{{ $section->id }}" {{ old("db_section_id") == $section->id ? "selected" : "" }}>Grade {{ $grade->grade }} - {{ $section->section }}</option>

										@break

									@endif

								@endforeach

							@endif

						@endforeach

					</select>
				</label>
				<span style = "margin-left: 150px;">Note: this setting only applies to advisers and teachers</span>

			</div>

		</div>
	</section>

</form>

@endsection