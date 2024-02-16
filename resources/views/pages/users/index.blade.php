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
						placeholder = "Search query"
						value = "{{ isset($terms) ? $terms : '' }}"
						style = "margin-right: 5px;"
					>
					<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
					<a href = "{{ url('/users') }}">
						<button class = "button-small" type = "button">Clear</button>
					</a>
				</label>

				@if (isset($isSearched))

					@if(count($results) > 0)

						<br>
						<p class = "text-center">Found results for <b>{{ $terms }}</b></p>

					@else

						<br>
						<p class = "text-center">No results for <b>{{ $terms }}</b></p>

					@endif

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
						<th>DepEd ID</th>
						<th>Name</th>
						<th>Role</th>
						<th>Advisory Grade / Section</th>
						<th>Action</th>
					</tr>

					@foreach ($users as $user)

						@foreach ($roles as $role)

							@if ($role->id == $user->db_role_id)

								<tr>
									<td>{{ $user->email }}</td>
									<td>
										<span class = "text-uppercase">{{ $user->name_last }},</span>
										<span class = "text-capitalize">{{ $user->name_first }}</span>
										<span class = "text-capitalize">{{ $user->name_middle }}</span>
										<span class = "text-capitalize">{{ $user->name_suffix }}</span>
									</td>
									<td class = "text-center">{{ $role->role }}</td>
									<td class = "text-center">

										<!-- Role IDs (see seeders) -->

										@if ($user->db_role_id == "1")

											N/A

										@endif

										@if ($user->db_role_id == "2")

											N/A

										@endif

										@if ($user->db_role_id == "3")

											@foreach ($grades as $grade)

												@if ($user->db_grade_id == $grade->id)

													Grade {{ $grade->grade }}

													@break

												@endif

											@endforeach

										@endif

										@if ($user->db_role_id == "4" || $user->db_role_id == "5")

											@foreach ($sections as $section)

													@if ($section->id == $user->db_section_id)

															@foreach ($grades as $grade)

																@if ($grade->id == $section->db_grade_id)

																	Grade {{ $grade->grade }} / {{ $section->section }}

																	@break

																@endif

															@endforeach

													@endif

											@endforeach

										@endif

									</td>
									<td class = "text-center">
										<a href = "{{ url('/users/edit', $user->id) }}">Edit</a>
									</td>
								</tr>

								@break

							@endif

						@endforeach

					@endforeach

				</table>
			</div>

		</div>
	</section>

</form>

@endsection