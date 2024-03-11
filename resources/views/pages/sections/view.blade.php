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

				<!-- Teacher -->
				<ul>
					<b>Teachers:</b>

					@foreach ($users_5 as $user)

						<li>
							<a href = "{{ url('/users/view', $user->id) }}">{{ $user->name_last }}, {{ $user->name_first }}</a>
						</li>

					@endforeach

				</ul>

				<!-- Grade Level Coordinator -->
				<ul>
					<b>Grade Level Coordinators:</b>

					@foreach ($users_3 as $user)

						<li>
							<a href = "{{ url('/users/view', $user->id) }}">{{ $user->name_last }}, {{ $user->name_first }}</a>
						</li>

					@endforeach

				</ul>

				<!-- Section -->
				@foreach ($sections as $section)

					<ul>
						<b>Section {{ $loop->index + 1 }} Adviser | {{ $section->section }}:</b>

						@if ($section->user_id)

							<li>
								<a href = "{{ url('/users/view', $section->user_id) }}">{{ $section->user_name_last }}, {{ $section->user_name_first }}</a>
							</li>

						@endif

					</ul>

				@endforeach

			</div>
		</div>

	</section>

@endsection