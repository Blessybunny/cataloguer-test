@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('content')
	<form action = "{{ url('/students') }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
						<div class = "subtitle">Index</div>
						<hr>
					</h1>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				@if ($auth->is_administrator)
					<div class = "col-12">
						<a href = "{{ url('/students/create') }}">
							<button class = "custom-button" type = "button">Create</button>
						</a>
						<hr>
					</div>
				@endif
				<div class = "col-12">
					<label class = "custom-search">
						<input
							name = "terms"
							type = "text"
							placeholder = "Search student"
							value = "{{ isset($terms) ? $terms : '' }}"
						>
						<button type = "submit">Search</button>
						<a href = "{{ url('/students') }}">Clear</a>
					</label>
					@if ($terms)
						<br>
						<p>Results for <b>{{ $terms }}</b></p>
					@endif
					<hr>
				</div>
				@if (count($students) > 0)
					<div class = "col-12">
						<table id = "index" class = "custom-index table">
							<thead>
								<tr>
									<th width = "250">LRN</th>
									<th width = "500">Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($students as $student)
									<tr>
										<td>{{ $student->info_lrn }}</td>
										<td>{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</td>
										<td>
											<a href = "{{ url('/students/view', $student->id) }}">View</a>
											@if (
												!$student->ST_locker &&
												$auth->is_administrator
											)
												<a href = "{{ url('/students/edit/info', $student->id) }}">Edit</a>
											@endif
											@if (
												!$student->ST_locker &&
												$auth->is_administrator
											)
												<a href = "{{ url('/students/edit/area', $student->id) }}">Areas</a>
											@endif
											@if (
												!$student->ST_locker &&
												(
													$auth->is_administrator ||
													$auth->is_grade_level_coordinator ||
													$auth->is_adviser
												)
											)
												<a href = "{{ url('/students/edit/form', $student->id) }}">Forms</a>
											@endif
											@if ($auth->is_administrator)
												<a href = "{{ url('/students/edit/lock', $student->id) }}">Settings</a>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<script>
							const table = new DataTable('#index', {
								columnDefs: [
									{ "orderable": false, "targets": [2] },
								],
								info: false,
								order: [[1, 'asc']],
								paging: false,
								searching: false,
							});
						</script>
						<hr>
						{!! $students->appends(array('terms' => $terms))->links() !!}
						<p>Showing <b>{{ $students->firstItem() }}</b> to <b>{{ $students->firstItem() + $students->count() - 1 }}</b> of <b>{{ $students->total() }}</b> entries</p>
					</div>
				@endif
			</div>
		</div>
	</form>
@endsection