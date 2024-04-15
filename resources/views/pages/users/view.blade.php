@extends('layouts.general.page')
@section('title') Cataloger - User Manager @endsection
@section('content')
	<div class = "container-fluid">
		<div class = "row">
			<div class = "col-12">
				<h1 class = "custom-header">
					<div class = "main">Users</div>
					<div class = "subtitle">Viewer | {{ $user->name_last }}, {{ $user->name_first }}</div>
					<hr>
				</h1>
				<b>Created on: </b>{{ $user->created_at->format('l jS \\of F Y') }}
				<br>
				<b>Edited on: </b>{{ $user->updated_at->format('l jS \\of F Y') }}
				<hr>
			</div>
		</div>
	</div>
	<div class = "container">
		<div class = "row">
			<div class = "col-4">
				<table class = "table">
					<tr>
						<th colspan = "2">General Information</th>
					</tr>
					<tr>
						<td width = "100">DepEd ID</td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td width = "100">Name</td>
						<td>{{ $user->name_last }}, {{ $user->name_first }}</td>
					</tr>
					<tr>
						<td width = "100">Role</td>
						<td>{{ $user->role }}</td>
					</tr>
				</table>
				<table class = "table">
					<tr>
						<th colspan = "2">Designations</th>
					</tr>
					<tr>
						<td width = "150">School Year</td>
						<td>{{ $user->year }}</td>
					</tr>
					<tr>
						<td width = "150">Grade Level</td>
						<td>{{ $user->grade }}</td>
					</tr>
					<tr>
						<td width = "150">Section</td>
						<td>{{ $user->section }}</td>
					</tr>
					<tr>
						<td width = "150">Classes</td>
						<td>
							@foreach ($user->classes as $class)
								Grade {{ $class->grade }} | {{ $class->section }}
								<br>
							@endforeach
						</td>
					</tr>
					<tr>
						<td width = "150">Subjects</td>
						<td>
							@if ($user->ST_subject_fil)
								Filipino
								<br>
							@endif
							@if ($user->ST_subject_eng)
								English
								<br>
							@endif
							@if ($user->ST_subject_mat)
								Mathematics
								<br>
							@endif
							@if ($user->ST_subject_sci)
								Science
								<br>
							@endif
							@if ($user->ST_subject_ap)
								Araling Panlipunan (AP)
								<br>
							@endif
							@if ($user->ST_subject_ep)
								Edukasyon sa Pagpapakatao (EP)
								<br>
							@endif
							@if ($user->ST_subject_tle)
								Technology and Livelihood Education (TLE)
								<br>
							@endif
							@if ($user->ST_subject_mapeh)
								MAPEH
								<br>
							@endif
							@if ($user->ST_subject_jp)
								Nihongo
								<br>
							@endif
						</td>
					</tr>
				</table>
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
							{ className: "dt-head-left", targets: [ 1 ] },
							{ className: "dt-body-left", targets: [ 1 ] },
						],
						info: false,
						paging: false,
						searching: false,
					});
				</script>
			</div>
		</div>
	</div>
@endsection