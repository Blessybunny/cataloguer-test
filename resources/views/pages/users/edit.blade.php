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
					<p class = "text-center">These apply to grade level coordinators, advisers, and teachers</p>
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

					<!-- Grade Level Coordinator's Designation -->
					<b>Grade Level Coordinator's Designation:</b>
					<select name = "DB_GRADE_id">
						<option value = ""></option>

						@foreach ($grades as $grade)

							<option value = "{{ $grade->id }}" {{ $user->DB_GRADE_id == $grade->id ? "selected" : "" }}>Grade {{ $grade->grade }}</option>

						@endforeach

					</select>
					<br>

					<!-- Adviser's Designation -->
					<b>Adviser's Designation:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>

						@foreach ($sections as $section)

							<option value = "{{ $section->id }}" {{ $user->id == $section->DB_USER_id ? "selected" : "" }}>Grade {{ $section->grade }} | {{ $section->section }}</option>

						@endforeach

					</select>

				</div>
				<div class = "col-8">

					<!-- Teacher's Designations -->
					<b>Teacher's Designations:</b>
					<div class = "border-all-light container-fluid" style = "padding: 15px;">
						<div class = "row">
							<div class = "col">

								@foreach ($sections_teacher_g7 as $section)

									<label>
										<input
											name = "DB_SECTION_MULTI_id[]"
											type = "checkbox"
											value = "{{ $section->id }}"
											{{  $section->is_existing == true ? "checked" : "" }}
										>
										Grade {{ $section->grade }} | {{ $section->section }}
									</label>

								@endforeach

							</div>
							<div class = "col">

								@foreach ($sections_teacher_g8 as $section)

									<label>
										<input
											name = "DB_SECTION_MULTI_id[]"
											type = "checkbox"
											value = "{{ $section->id }}"
											{{  $section->is_existing == true ? "checked" : "" }}
										>
										Grade {{ $section->grade }} | {{ $section->section }}
									</label>

								@endforeach

							</div>
							<div class = "col">

								@foreach ($sections_teacher_g9 as $section)

									<label>
										<input
											name = "DB_SECTION_MULTI_id[]"
											type = "checkbox"
											value = "{{ $section->id }}"
											{{  $section->is_existing == true ? "checked" : "" }}
										>
										Grade {{ $section->grade }} | {{ $section->section }}
									</label>

								@endforeach

							</div>
							<div class = "col">

								@foreach ($sections_teacher_g10 as $section)

									<label>
										<input
											name = "DB_SECTION_MULTI_id[]"
											type = "checkbox"
											value = "{{ $section->id }}"
											{{  $section->is_existing == true ? "checked" : "" }}
										>
										Grade {{ $section->grade }} | {{ $section->section }}
									</label>

								@endforeach

							</div>
						</div>
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

					@if ($user->is_one_day_old)

						<a href = "{{ url('/users/delete', $user->id) }}">
							<button class = "button" type = "button">Delete</button>
						</a>

					@endif

				</div>
			</div>

		</section>

	</form>

@endsection