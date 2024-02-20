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
							<th style = "width: 150px;">DepEd ID</th>
							<th>Name</th>
							<th style = "width: 150px;">Role</th>
							<th style = "width: 300px;">Advisory</th>
							<th style = "width: 150px;">Action</th>
						</tr>

						@foreach ($users as $user)

							<tr>
								<td class = "text-center">{{ $user->email }}</td>
								<td>{{ strtoupper($user->name_last) }}, {{ ucfirst($user->name_first) }}</td>
								<td class = "text-center">{{ $user->role }}</td>
								<td class = "text-center">{{ $user->advisory }}</td>
								<td class = "text-center"><a href = "{{ url('/users/edit', $user->id) }}">Edit</a></td>
							</tr>

						@endforeach

					</table>
				</div>

			</div>
		</section>

	</form>

@endsection