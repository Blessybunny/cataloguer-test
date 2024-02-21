@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/edit/acad', $student->id) }}" method = "POST">

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
					<p class = "text-center">{{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}</p>
					<hr>
				</div>

			</div>

			@foreach ($grades as $grade)

				<div class = "row">

					<!-- Edit -->
					<div class = "col-3">

						<!-- School Year -->
						<span class = "font-bold">Grade {{ $grade->grade }} School Year:</span>
						<select name = "DB_YEAR_id_g{{ $grade->grade }}">
							<option value = ""></option>

							@foreach ($years as $year)

								<option value = "{{ $year->id }}" {{ $student->{'DB_YEAR_id_g'.$grade->grade} == $year->id ? "selected" : "" }}>{{ $year->year }}-{{ $year->year + 1 }}</option>

							@endforeach

						</select>

					</div>
					<div class = "col-3">

						<!-- Section -->
						<span class = "font-bold">Grade {{ $grade->grade }} Section:</span>
						<select name = "DB_SECTION_id_g{{ $grade->grade }}">
							<option value = ""></option>

							@foreach ($sections as $section)

								@if ($grade->id == $section->DB_GRADE_id)

									<option value = "{{ $section->id }}" {{ $student->{'DB_SECTION_id_g'.$grade->grade} == $section->id ? "selected" : "" }}>{{ $section->section }}</option>

								@endif

							@endforeach

						</select>

					</div>
					<div class = "col-6">

						<!-- Preserved Grade Section -->
						<span class = "font-bold">Preserved Grade {{ $grade->grade }} Section:</span>
						<input
							type = "text"
							maxlength = "50"
						>
						<p>This field only applies if a section does not exist on the list</p>

						<!-- Preserved Adviser Last Name -->
						<span class = "font-bold">Preserved Grade {{ $grade->grade }} Adviser Last Name:</span>
						<input
							type = "text"
							maxlength = "50"
						>
						<p>This field only applies if an adviser does not exist</p>

						<!-- Preserved Adviser First Name -->
						<span class = "font-bold">Preserved Grade {{ $grade->grade }} Adviser First Name:</span>
						<input
							type = "text"
							maxlength = "50"
						>
						<p>This field only applies if an adviser does not exist</p>

					</div>
					<hr>

				</div>

			@endforeach

		</section>

	</form>

@endsection