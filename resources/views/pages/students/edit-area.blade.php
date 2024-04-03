@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/edit/area', $student->id) }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
					<a href = "{{ url('/students') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">Student Editor</h4>
					<p class = "text-center">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</p>
				</div>
				<div class = "align-self-center col-4">
					<input class = "button float-right" type = "submit" value = "Save">
				</div>
			</div>

			<!-- Content -->
			<div class = "row">
				<div class = "col-12">
					<hr>
				</div>

				@foreach ($grades as $grade)

					<div class = "col-6">

						<!-- Section -->
						<b>Grade {{ $grade->grade }} Section | Adviser:</b>
						<select name = "DB_SECTION_id_g{{ $grade->grade }}">
							<option value = ""></option>

							@foreach ($sections as $section)

								@if ($grade->id == $section->DB_GRADE_id)

									<option value = "{{ $section->id }}" {{ $student->{'DB_SECTION_id_g'.$grade->grade} == $section->id ? 'selected' : '' }}>{{ $section->section }} {{ $section->user }}</option>

								@endif

							@endforeach

						</select>
						<br>

						<!-- Legacy Grade Section -->
						<b>Legacy Grade {{ $grade->grade }} Section:</b>
						<input
							name = "LG_SECTION_name_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'LG_SECTION_name_g'.$grade->grade} }}"
						>
						This field is used if the appropriate section is NOT on the list
						<br>
						<br>

						<!-- Legacy Adviser Last Name -->
						<b>Legacy Grade {{ $grade->grade }} Adviser Last Name:</b>
						<input
							name = "LG_USER_name_last_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'LG_USER_name_last_g'.$grade->grade} }}"
						>
						This field is used if the appropriate adviser is NOT on the list
						<br>
						<br>

						<!-- Legacy Adviser First Name -->
						<b>Legacy Grade {{ $grade->grade }} Adviser First Name:</b>
						<input
							name = "LG_USER_name_first_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'LG_USER_name_first_g'.$grade->grade} }}"
						>
						This field is used if the appropriate adviser is NOT on the list
						<br>
						<br>

					</div>
					<div class = "col-6">

						<!-- School Year -->
						<b>Grade {{ $grade->grade }} School Year:</b>
						<select name = "DB_YEAR_id_g{{ $grade->grade }}">
							<option value = ""></option>

							@foreach ($years as $year)

								<option value = "{{ $year->id }}" {{ $student->{'DB_YEAR_id_g'.$grade->grade} == $year->id ? 'selected' : '' }}>{{ $year->year }}-{{ $year->year + 1 }}</option>

							@endforeach

						</select>

					</div>

				@endforeach

			</div>

		</section>

	</form>

@endsection