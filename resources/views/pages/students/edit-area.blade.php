@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/edit/area', $student->id) }}" method = "POST">

		@csrf

		<section class = "container">
			<div class = "row">

				<!-- Action -->
				<div class = "col">
					<a href = "{{ url('/students') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>

				<!-- Header -->
				<div class = "col">
					<h4 class = "text-center">Student Manager</h4>
					<p class = "text-center">Manage student info, grades, and forms</p>
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
					<p class = "text-center">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</p>
					<hr>
				</div>

			</div>

			@foreach ($grades as $grade)

				<div class = "row">

					<!-- Edit -->
					<div class = "col-3">

						<!-- School Year -->
						<b>Grade {{ $grade->grade }} School Year:</b>
						<select name = "DB_YEAR_id_g{{ $grade->grade }}">
							<option value = ""></option>

							@foreach ($years as $year)

								<option value = "{{ $year->id }}" {{ $student->{'DB_YEAR_id_g'.$grade->grade} == $year->id ? "selected" : "" }}>{{ $year->year }}-{{ $year->year + 1 }}</option>

							@endforeach

						</select>

					</div>
					<div class = "col-3">

						<!-- Section -->
						<b>Grade {{ $grade->grade }} Section | Adviser:</b>
						<select name = "DB_SECTION_id_g{{ $grade->grade }}">
							<option value = ""></option>

							@foreach ($sections as $section)

								@if ($grade->id == $section->DB_GRADE_id)

									<option value = "{{ $section->id }}" {{ $student->{'DB_SECTION_id_g'.$grade->grade} == $section->id ? "selected" : "" }}>{{ $section->section }} {{ $section->user }}</option>

								@endif

							@endforeach

						</select>

					</div>
					<div class = "col-6">

						<!-- Legacy Grade Section -->
						<b>Legacy Grade {{ $grade->grade }} Section:</b>
						<input
							name = "PRESERVE_DB_SECTION_name_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'PRESERVE_DB_SECTION_name_g'.$grade->grade} }}"
						>
						<p>This field is used if the appropriate section is NOT on the list</p>

						<!-- Legacy Adviser Last Name -->
						<b>Legacy Grade {{ $grade->grade }} Adviser Last Name:</b>
						<input
							name = "PRESERVE_DB_USER_name_last_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'PRESERVE_DB_USER_name_last_g'.$grade->grade} }}"
						>
						<p>This field is used if the appropriate adviser is NOT on the list</p>

						<!-- Legacy Adviser First Name -->
						<b>Legacy Grade {{ $grade->grade }} Adviser First Name:</b>
						<input
							name = "PRESERVE_DB_USER_name_first_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'PRESERVE_DB_USER_name_first_g'.$grade->grade} }}"
						>
						<p>This field is used if the appropriate adviser is NOT on the list</p>

					</div>

					@if ($loop->index + 1 != $loop->count)

						<hr>

					@endif

				</div>

			@endforeach

		</section>

	</form>

@endsection