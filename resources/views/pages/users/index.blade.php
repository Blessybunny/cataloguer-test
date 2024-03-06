@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users') }}" method = "POST">

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
					<h4 class = "text-center">User Index</h4>
				</div>
				<div class = "align-self-center col-4">
					<a href = "{{ url('/users/create') }}">
						<button class = "button float-right" type = "button">Add</button>
					</a>
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
							placeholder = "Search user"
							value = "{{ isset($terms) ? $terms : '' }}"
							style = "margin-right: 5px;"
						>
						<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
						<a href = "{{ url('/users') }}">
							<button class = "button-small" type = "button">Clear</button>
						</a>
					</label>

					@if (isset($isSearched))

						<br>
						<p class = "text-center">

							@if (count($results) > 0)

								Found results for <b>{{ $terms }}</b>

							@else

								No results for <b>{{ $terms }}</b>

							@endif

						</p>

						@php

							$users = $results;

						@endphp

					@endif

					<hr>
				</div>
			</div>

			<!-- Index -->
			<div class = "row">
				<div class = "col-12">
					<table class = "table">
						<tr>
							<th>Role</th>
							<th>Name</th>
							<th>Designation</th>
							<th>School Year</th>
							<th colspan = "2">Action</th>
						</tr>

						@foreach ($users as $user)

							<tr>
								<td class = "text-center" style = "width: 200px;">{{ $user->role }}</td>
								<td>{{ $user->name_last }}, {{ $user->name_first }}</td>
								<td class = "text-center" style = "width: 200px;">{{ $user->designation }}</td>

								@php

									$colspan = 2;

									if ($user->editable) {
										$colspan = 1;
									}

								@endphp

								<td class = "text-center" style = "width: 200px;"></td>
								<td class = "text-center" colspan = "{{ $colspan }}" style = "width: 100px;">
									<a href = "{{ url('/users/view', $user->id) }}">View</a>
								</td>

								@if ($user->editable) 

									<td class = "text-center" style = "width: 100px;">
										<a href = "{{ url('/users/edit', $user->id) }}">Edit</a>
									</td>

								@endif

							</tr>

						@endforeach

					</table>
				</div>
			</div>

		</section>

	</form>

@endsection