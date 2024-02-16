@extends('layouts.general.page')

@section('title') Cataloger - Section Manager @endsection

@section('content')

<form action = "{{ url('/sections/edit', $grades->grade) }}" method = "POST">

    @csrf

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col">
				<a href = "{{ url('/sections') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>

			<!-- Header -->
			<div class = "col">
				<h4 class = "text-center">Section Manager</h4>
				<p class = "text-center">Manage section names for each grade level</p>
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
				<p class = "text-center">Grade {{ $grades->grade }}</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Edit -->
			<div class = "col">
				@php

					$index = 0;

				@endphp

				@foreach ($sections as $section)

					@php

						$index++;

					@endphp

					<label>
						<span style = "min-width: 100px;">Section {{ $index }}:</span>
						<input
							name = "g{{ $grades->grade }}_s{{$index}}"
							type = "text"
							maxlength = "50"
							value = "{{ $section->section }}"
						>
					</label>

					@if ($index != 10)

						<br>

					@endif

				@endforeach
			</div>

		</div>
	</section>

</form>

@endsection