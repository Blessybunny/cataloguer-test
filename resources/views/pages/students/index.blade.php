@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students') }}" method = "POST">

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
					<h4 class = "text-center">Student Index</h4>
				</div>
				<div class = "align-self-center col-4">

					@if ($auth->is_administrator)

						<a href = "{{ url('/students/create') }}">
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
							placeholder = "Search student"
							value = "{{ isset($terms) ? $terms : '' }}"
							style = "margin-right: 5px;"
						>
						<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
						<a href = "{{ url('/students') }}">
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
							<th>LRN</th>
							<th>Name</th>
							<th colspan = "5">Action</th>
						</tr>

						@foreach ($students as $student)

							<tr>
								<td class = "text-center" style = "width: 200px;">{{ $student->info_lrn }}</td>
								<td>{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</td>
								<td class = "text-center" style = "width: 100px;">
									<a href = "{{ url('/students/view', $student->id) }}">View</a>
								</td>
								<td class = "text-center" style = "width: 100px;">

									@if (
										!$student->ST_locker &&
										$auth->is_administrator
									)

										<a href = "{{ url('/students/edit/info', $student->id) }}">Edit Info</a>

									@endif

								</td>
								<td class = "text-center" style = "width: 100px;">

									@if (
										!$student->ST_locker &&
										$auth->is_administrator
									)

										<a href = "{{ url('/students/edit/area', $student->id) }}">Edit Areas</a>

									@endif

								</td>
								<td class = "text-center" style = "width: 100px;">

									@if (
										!$student->ST_locker &&
										$auth->is_administrator ||
										$auth->is_grade_level_coordinator ||
										$auth->is_adviser
									)

										<a href = "{{ url('/students/edit/form', $student->id) }}">Edit Forms</a>

									@endif

								</td>
								<td class = "text-center" style = "width: 100px;">

									@if ($auth->is_administrator)

										<a href = "{{ url('/students/edit/lock', $student->id) }}">Settings</a>
										
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