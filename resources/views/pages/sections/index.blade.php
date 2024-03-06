@extends('layouts.general.page')

@section('title') Cataloger - Section Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/home') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">Section Index</h4>
			</div>
			<div class = "align-self-center col-4">
			</div>
		</div>

		<!-- Index -->
		<div class = "row">
			<div class = "col-12">
				<hr>
			</div>
			<div class = "col-12">
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

							@if ($deny->administrator)

								<td class = "text-center" style = "width: 100px;">
									<a href = "{{ url('/sections/edit', $grade->id) }}">Edit</a>
								</td>

							@endif

						</tr>

					@endforeach

				</table>
			</div>
		</div>

	</section>

@endsection