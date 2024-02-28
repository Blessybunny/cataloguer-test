@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users/edit', $user->id) }}" method = "POST">

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
					<input class = "button float-right" type = "submit" value = "Save">
				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Edit</h6>
					<p class = "text-center">{{ strtoupper($user->name_last) }}, {{ ucfirst($user->name_first) }}</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Edit -->
				<div class = "col">

					<!-- Last Name -->
					<span class = "font-bold">Last Name:</span>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $user->name_last }}"
						required
					>
					<br>

					<!-- First Name -->
					<span class = "font-bold">First Name:</span>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $user->name_first }}"
						required
					>
					<br>

					<!-- Role -->
					<span class = "font-bold">Role:</span>
					<select name = "DB_ROLE_id" required>

						@foreach ($roles as $role)

							<option value = "{{ $role->id }}" {{ $user->DB_ROLE_id == $role->id ? "selected" : "" }}>{{ $role->role }}</option>

						@endforeach

					</select>
					<br>

					<!-- Designated Grade -->
					<span class = "font-bold">Designated Grade:</span>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ $user->DB_GRADE_id == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>
					<p>This field is used for grade level coordinators and teachers</p>

					<!-- Designated Section -->
					<span class = "font-bold">Designated Section:</span>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ $user->DB_SECTION_id == $section->id ? "selected" : "" }}>Grade {{ $section->grade }} - {{ $section->section }}</option>

						@endforeach

					</select>
					<p>This field is used for advisers</p>

				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Danger Zone</h6>
					<p class = "text-center">Some actions become permanent</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Danger -->
				<div class = "col text-center">
					<a href = "{{ url('/users/delete', $user->id) }}">
						<button class = "button" type = "button">Delete</button>
					</a>
				</div>

			</div>
		</section>

	</form>

@endsection