@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users') }}" method = "POST">

		@csrf

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
					<h4 class = "text-center">User Manager</h4>
					<p class = "text-center">Manage user permission and access</p>
				</div>

				<!-- Action -->
				<div class = "col">
					<a href = "{{ url('/users/create') }}">
						<button class = "button float-right" type = "button">Add</button>
					</a>
				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Index</h6>
					<p class = "text-center">Users</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Search -->
				<div class = "col">
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

							@if(count($results) > 0)

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
			<div class = "row">

				<!-- Index -->
				<div class = "col">
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
								<td class = "text-center" style = "width: 200px;"></td>
								<td class = "text-center" style = "width: 100px;">
									<a href = "{{ url('/users/view', $user->id) }}">View</a>
								</td>
								<td class = "text-center" style = "width: 100px;">
									<a href = "{{ url('/users/edit', $user->id) }}">Edit</a>
								</td>
							</tr>

						@endforeach

					</table>
				</div>

			</div>
		</section>

	</form>

@endsection