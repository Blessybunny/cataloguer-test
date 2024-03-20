@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/sections') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">Section Viewer</h4>
				<p class = "text-center">Grade {{ $grade->grade }}</p>
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

				<!-- Timestamp -->
				<b>Edited on: </b>{{ $grade->updated_at->format('l jS \\of F Y') }}
				<hr>

				<!-- Grade Level Coordinator -->
				<ul>
					<b>Grade Level Coordinators:</b>

					@foreach ($users as $user)

						<li>
							<a href = "{{ url('/users/view', $user->id) }}">{{ $user->name_last }}, {{ $user->name_first }}</a>
						</li>

					@endforeach

				</ul>

				<!-- Section -->
				@foreach ($sections as $section)

					<ul>
						<b>Section {{ $loop->index + 1 }}:</b>
						<li>Name: {{ $section->section }}</li>
						<li>
							Adviser:

							@if (isset($section->adviser->id))

								<a href = "{{ url('/users/view', $section->adviser->id) }}">{{ $section->adviser->name_last }}, {{ $section->adviser->name_first }}</a>

							@endif

						</li>
						<li>
							Teachers:
							<ul>

								@foreach ($section->teachers as $teacher)

									<li>
										<a href = "{{ url('/users/view', $teacher->id) }}">{{ $teacher->name_last }}, {{ $teacher->name_first }}</a>
									</li>

								@endforeach

							</ul>
						</li>
					</ul>

				@endforeach

			</div>
		</div>

	</section>

@endsection