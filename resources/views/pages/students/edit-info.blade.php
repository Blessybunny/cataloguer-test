@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/edit/info', $student->id) }}" method = "POST">

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

			<!-- Required -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Required</h6>
					<hr>
				</div>
				<div class = "col-12">

					<!-- Learner Reference Number -->
					<b>Learner Reference Number:</b>
					<input
						name = "info_lrn"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_lrn }}"
						required
					>

					@if($errors->has('info_lrn'))

						<b class = "error">* The LRN has already been taken.</b>
						<br>

					@endif

					<br>

					<!-- Last Name -->
					<b>Last Name:</b>
					<input
						name = "info_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_last }}"
						required
					>
					<br>

					<!-- First Name -->
					<b>First Name:</b>
					<input
						name = "info_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_first }}"
						required
					>
					<br>

					<!-- Middle Name -->
					<b>Middle Name:</b>
					<input
						name = "info_name_middle"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_middle }}"
						required
					>
					<br>

					<!-- Sex -->
					<b>Sex:</b>
					<select name = "info_sex" required>
						<option value = "Male" {{ $student->info_sex == "Male" ? "selected" : "" }}>Male</option>
						<option value = "Female" {{ $student->info_sex == "Female" ? "selected" : "" }}>Female</option>
					</select>
					<br>

					<!-- Birthdate -->
					<b>Birthdate (MM/DD/YYYY):</b>
					<input
						name = "info_birthdate"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_birthdate }}"
						required
					>

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

					<!-- Name Suffix -->
					<b>Name Suffix:</b>
					<input
						name = "info_name_suffix"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_suffix }}"
					>

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
					<a href = "{{ url('/students/delete', $student->id) }}">
						<button class = "button" type = "button">Delete</button>
					</a>
				</div>
			</div>

		</section>

	</form>

@endsection