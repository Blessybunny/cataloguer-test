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
					<b>Last Name:</b>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $user->name_last }}"
						required
					>
					<br>

					<!-- First Name -->
					<b>First Name:</b>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $user->name_first }}"
						required
					>
					<br>

					<!-- Role -->
					<b>Role:</b>
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
					<p class = "text-center">These apply to grade level coordinators and advisers</p>
					<hr>
				</div>
				<div class = "col-4">

					<!-- School Year Designation -->
					<b>School Year Designation:</b>
					<select name = "DB_YEAR_id">
						<option value = ""></option>

						@foreach ($years as $year)

							<option value = "{{ $year->id }}" {{ $user->DB_YEAR_id == $year->id ? "selected" : "" }}>{{ $year->full }}</option>

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

							<option value = "{{ $grade->id }}" {{ $user->DB_GRADE_id == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>

				</div>
				<div class = "col-4">

					<!-- Adviser's Designation -->
					<b>Adviser's Designation:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							@if ($section->DB_USER_id == null || $section->DB_USER_id == $user->id)

								<option value = "{{ $section->id }}" {{ $user->id == $section->DB_USER_id ? "selected" : "" }}>Grade {{ $section->grade }} | {{ $section->section }}</option>

							@endif

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
									{{  $section->is_classed == true ? "checked" : "" }}
								>
								Grade {{ $section->grade }} | {{ $section->section }}
							</label>

						@endforeach

					</div>

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
					<a href = "{{ url('/users/password', $user->id) }}">
						<button class = "button" type = "button">Change Password</button>
					</a>

					@if ($user->is_deletable)

						<a href = "{{ url('/users/delete', $user->id) }}">
							<button class = "button" type = "button">Delete</button>
						</a>

					@endif

				</div>
			</div>

		</section>

	</form>

@endsection