@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users/edit', $user->id) }}" method = "POST">

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
					<h4 class = "text-center">User Editor</h4>
					<p class = "text-center">{{ $user->name_last }}, {{ $user->name_first }}</p>
				</div>
				<div class = "align-self-center col-4">
					<input class = "button float-right" type = "submit" value = "Save">
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
					<span class = "font-bold">Designated Grade:</span>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ $user->DB_GRADE_id == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>
					This field is used for grade level coordinators and teachers
					<br>
					<br>

					<!-- Designated Section -->
					<span class = "font-bold">Designated Section:</span>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ $user->DB_SECTION_id == $section->id ? "selected" : "" }}>Grade {{ $section->grade }} | {{ $section->section }}</option>

						@endforeach

					</select>
					This field is used for advisers

				</div>
			</div>

			<!-- Danger -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Danger</h6>
					<hr>
				</div>
				<div class = "col-12">
					<a href = "{{ url('/users/delete', $user->id) }}">
						<button class = "button" type = "button">Delete</button>
					</a>
				</div>
			</div>

		</section>

	</form>

@endsection