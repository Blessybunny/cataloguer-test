@extends('layouts.general.page')

@section('title') Cataloger - Section Manager @endsection

@section('content')

	<form action = "{{ url('/sections/edit', $grade->id) }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
					<a href = "{{ url('/sections') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">Section Editor</h4>
					<p class = "text-center">Grade {{ $grade->grade }}</p>
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
				<div class = "col-12">

					@foreach ($sections as $section)

						<b>Section {{ $loop->index + 1 }} Name:</b>
						<input
							name = "section_{{ $section->DB_GRADE_id }}_{{ $section->id }}"
							type = "text"
							maxlength = "50"
							value = "{{ $section->section }}"
						>

						@if ($loop->index + 1 != $loop->count)

							<br>

						@endif

					@endforeach

				</div>
			</div>

		</section>

	</form>

@endsection