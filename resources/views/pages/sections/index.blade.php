@extends('layouts.general.page')

@section('title') Cataloger - Section Manager @endsection

@section('content')

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col">
				<a href = "{{ url('/home') }}">
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
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">Index</h6>
				<p class = "text-center">Sections</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Index -->
			<div class = "col">
				<table class = "table">
					<tr>
						<th>Level</th>
						<th></th>
						<th colspan = "2">Action</th>
					</tr>

					@foreach ($grades as $grade)

						<tr>
							<td class = "text-center" style = "width: 200px;">Grade {{ $grade->grade }}</td>
							<td></td>
							<td class = "text-center" style = "width: 100px;">
								<a href = "{{ url('/sections/view', $grade->id) }}">View</a>
							</td>
							<td class = "text-center" style = "width: 100px;">
								<a href = "{{ url('/sections/edit', $grade->id) }}">Edit</a>
							</td>
						</tr>

					@endforeach

				</table>
			</div>

		</div>
	</section>

@endsection