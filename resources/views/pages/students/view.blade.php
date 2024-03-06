@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/students') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">Student Viewer</h4>
				<p class = "text-center">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</p>
			</div>
			<div class = "align-self-center col-4">
			</div>
		</div>

		<!-- View -->
		<div class = "row">
			<div class = "col-12">
				<hr>
			</div>
			<div class = "col-12">

				<!-- Learner Reference Number -->
				<b>Learner Reference Number:</b>
				{{ $student->info_lrn }}
				<br>
				<br>

				<!-- Name -->
				<b>Name:</b>
				{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}
				<br>
				<br>

				<!-- Sex -->
				<b>Sex:</b>
				{{ $student->info_sex }}
				<br>

				<!-- Birthdate -->
				<b>Birthdate:</b>
				{{ $student->info_birthdate }}

			</div>
		</div>

	</section>

@endsection