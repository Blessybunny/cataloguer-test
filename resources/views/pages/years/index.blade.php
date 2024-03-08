@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<form action = "{{ url('/years') }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
					<a href = "{{ url('/home') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">School Year Index</h4>
				</div>
				<div class = "align-self-center col-4">

					@if ($auth->is_principal)

						<a href = "{{ url('/years/create') }}">
							<button class = "button float-right" type = "button">Add</button>
						</a>

					@endif

				</div>
			</div>

			<!-- Search -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<label>
						<input
							name = "terms"
							type = "text"
							placeholder = "Search school year"
							value = "{{ isset($terms) ? $terms : '' }}"
							style = "margin-right: 5px;"
						>
						<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
						<a href = "{{ url('/years') }}">
							<button class = "button-small" type = "button">Clear</button>
						</a>
					</label>

					@if (isset($terms))

						<br>
						<p class = "text-center">Results for <b>{{ $terms }}</b></p>

					@endif

					<hr>
				</div>
			</div>

			<!-- Index -->
			<div class = "row">
				<div class = "col-12">
					<table class = "table">
						<tr>
							<th>School Year</th>
							<th>Principal</th>
							<th colspan = "2">Action</th>
						</tr>

						@foreach ($years as $year)

							<tr>
								<td class = "text-center" style = "width: 200px;">{{ $year->full }}</td>
								<td>{{ $year->principal }}</td>
								<td class = "text-center" style = "width: 100px;">
									<a href = "{{ url('/years/view', $year->id) }}">View</a>
								</td>
								<td class = "text-center" style = "width: 100px;">

									@if ($auth->is_principal)

										<a href = "{{ url('/years/edit', $year->id) }}">Edit</a>

									@endif

								</td>
							</tr>

						@endforeach

					</table>
				</div>
			</div>

		</section>

	</form>

@endsection