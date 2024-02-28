@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students') }}" method = "POST">

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
					<h4 class = "text-center">Student Manager</h4>
					<p class = "text-center">Manage student info, grades, and forms</p>
				</div>

				<!-- Action -->
				<div class = "col">
					<a href = "{{ url('/students/create') }}">
						<button class = "button float-right" type = "button">Add</button>
					</a>
				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Index</h6>
					<p class = "text-center">Students</p>
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
							placeholder = "Search student"
							value = "{{ isset($terms) ? $terms : '' }}"
							style = "margin-right: 5px;"
						>
						<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
						<a href = "{{ url('/students') }}">
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

							$students = $results;

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
							<th style = "width: 150px;">LRN</th>
							<th>Name</th>
							<th colspan = "5">Actions</th>
						</tr>

						@foreach ($students as $student)

							<tr>
								<td class = "text-center">{{ $student->info_lrn }}</td>
								<td>{{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}</td>
								<td class = "text-center" style = "width: 150px;">
									<a href = "{{ url('/students/edit/info', $student->id) }}">Edit Info</a>
								</td>
								<td class = "text-center" style = "width: 150px;">
									<a href = "{{ url('/students/edit/acad', $student->id) }}">Edit S.Y. / Sections</a>
								</td>
								<td class = "text-center" style = "width: 150px;">
									<a href = "{{ url('/students/edit/form', $student->id) }}">Edit Forms</a>
								</td>
								<td class = "text-center" style = "width: 150px;">
									<a href = "#">View Report</a>
								</td>
								<td class = "text-center" style = "width: 150px;">
									<a href = "#">Settings (insert nihonggo/lockers)</a>
								</td>
							</tr>

						@endforeach

					</table>
				</div>

			</div>
		</section>

	</form>

@endsection