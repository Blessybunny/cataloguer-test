@extends('layouts.general.page')

@section('title') Cataloger - Section Manager @endsection

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
				<b>Edited on: </b>{{ $grade->updated_at->format('l jS \\of F Y') }}
				<hr>
			</div>
			<div class = "col-4">
				<table class = "table">
					<tr>
						<th class = "text-left">Grade Level Coordinators</th>
					</tr>
					<tr>
						<td>

							@foreach ($users as $user)

							<a href = "{{ url('/users/view', $user->id) }}">{{ $user->name_last }}, {{ $user->name_first }}</a>
							<br>

							@endforeach

							@if (count($users) == 0)

							&nbsp;

							@endif

						</td>
					</tr>
				</table>
			</div>
			<div class = "col-4">
			</div>
			<div class = "col-4">
			</div>

			@foreach ($sections as $section)

				<div class = "col-4">
					<table class = "table">
						<tr>
							<th class = "text-left" colspan = "2">Section {{ $loop->iteration }} | {{ $section->section }}</th>
						</tr>
						<tr>
							<td class = "align-top" width = "100">Adviser</td>
							<td>

								@if (isset($section->adviser->id))

								<a href = "{{ url('/users/view', $section->adviser->id) }}">{{ $section->adviser->name_last }}, {{ $section->adviser->name_first }}</a>

								@else

								&nbsp;

								@endif

							</td>
						</tr>
						<tr>
							<td class = "align-top" width = "100">Teachers</td>
							<td>

								@foreach ($section->teachers as $teacher)

								<a href = "{{ url('/users/view', $teacher->id) }}">{{ $teacher->name_last }}, {{ $teacher->name_first }}</a>
								<br>

								@endforeach

								@if (count($section->teachers) == 0)

								&nbsp;

								@endif

							</td>
						</tr>
					</table>
				</div>

			@endforeach

			</div>
		</div>

	</section>

@endsection