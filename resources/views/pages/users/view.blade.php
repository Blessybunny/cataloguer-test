@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/users') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">User Viewer</h4>
				<p class = "text-center">{{ $user->name_last }}, {{ $user->name_first }}</p>
			</div>
			<div class = "align-self-center col-4">
			</div>
			<div class = "col-12">
				<hr>
				<b>Created on: </b>{{ $user->created_at->format('l jS \\of F Y') }}
				<br>
				<b>Edited on: </b>{{ $user->updated_at->format('l jS \\of F Y') }}
				<hr>
			</div>
		</div>

		<!-- View -->
		<div class = "row">
			<div class = "col-4">
				<table class = "table">
					<tr>
						<th class = "text-left" colspan = "2">General Information</th>
					</tr>
					<tr>
						<td class = "align-top" width = "100">DepEd ID</td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Name</td>
						<td>{{ $user->name_last }}, {{ $user->name_first }}</td>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Role</td>
						<td>{{ $user->role }}</td>
					</tr>
				</table>
			</div>
			<div class = "col-4">
				<table class = "table">
					<tr>
						<th class = "text-left" colspan = "2">Designations</th>
					</tr>
					<tr>
						<td class = "align-top" width = "100">School Year</td>
						<td>{{ $user->year }}</td>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Grade Level</td>
						<td>{{ $user->grade }}</td>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Section</td>
						<td>{{ $user->section }}</td>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Classes</td>
						<td>

							@foreach ($user->classes as $class)

							Grade {{ $class->grade }} | {{ $class->section }}
							<br>

							@endforeach

						</td>
					</tr>
					<tr>
						<td class = "align-top" width = "100">Subjects</td>
						<td>

							@if ($user->ST_subject_fil || $auth->is_administrator)

								Filipino
								<br>

							@endif

							@if ($user->ST_subject_eng || $auth->is_administrator)

								English
								<br>

							@endif

							@if ($user->ST_subject_mat || $auth->is_administrator)

								Mathematics
								<br>

							@endif

							@if ($user->ST_subject_sci || $auth->is_administrator)

								Science
								<br>

							@endif

							@if ($user->ST_subject_ap || $auth->is_administrator)

								Araling Panlipunan (AP)
								<br>

							@endif

							@if ($user->ST_subject_ep || $auth->is_administrator)

								Edukasyon sa Pagpapakatao (EP)
								<br>

							@endif

							@if ($user->ST_subject_tle)

								Technology and Livelihood Education (TLE)
								<br>

							@endif

							@if ($user->ST_subject_mapeh || $auth->is_administrator)

								MAPEH
								<br>

							@endif

							@if ($user->ST_subject_jp || $auth->is_administrator)

								Nihongo
								<br>

							@endif

						</td>
					</tr>
				</table>
			</div>
			<div class = "col-4">
				<table id = "index" class = "table">
					<thead>
						<tr>
							<th>Class Student Name</th>
							<th>Grade</th>
							<th>Section</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($students as $student)

							<tr>
								<td>
									<a href = "{{ url('/students/view', $student->id) }}">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</a>
								</td>
								<td>{{ $student->grade }}</td>
								<td>{{ $student->section }}</td>
							</tr>

						@endforeach

					</tbody>
				</table>

				<script>
					const table = new DataTable('#index', {
						columnDefs: [
							{ className: "dt-body-left", targets: [ 1 ] },
						],
						info: false,
						paging: false,
						searching: false,
					});
				</script>
			</div>
		</div>

	</section>

@endsection