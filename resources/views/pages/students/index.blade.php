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

					@if ($terms)

						<br>
						<p class = "text-center">Results for <b>{{ $terms }}</b></p>

					@endif

					<hr>
				</div>
			</div>

			<!-- Index -->
			<div class = "row">
				<div class = "col-12">

					@if (count($students) > 0)

						<table id = "index" class = "table">
							<thead>
								<tr>
									<th width = "200">LRN</th>
									<th width = "600">Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($students as $student)

									<tr>
										<td>{{ $student->info_lrn }}</td>
										<td>{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</td>
										<td>
											<div class = "container-fluid">
												<div class = "row">
													<div class = "col">
														<a href = "{{ url('/students/view', $student->id) }}">View</a>
													</div>
													<div class = "col">

														@if (
															!$student->ST_locker &&
															$auth->is_administrator
														)

															<a href = "{{ url('/students/edit/info', $student->id) }}">Edit</a>

														@endif

													</div>
													<div class = "col">

														@if (
															!$student->ST_locker &&
															$auth->is_administrator
														)

															<a href = "{{ url('/students/edit/area', $student->id) }}">Areas</a>

														@endif

													</div>
													<div class = "col">

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

													</div>
													<div class = "col">

														@if ($auth->is_administrator)

														<a href = "{{ url('/students/edit/lock', $student->id) }}">Settings</a>

														@endif

													</div>
												</div>
											</div>
										</td>
									</tr>

								@endforeach

							</tbody>
						</table>

						<script>
							const table = new DataTable('#index', {
								columnDefs: [
									{ className: "dt-head-left", targets: [ 0, 1, 2 ] },
									{ "orderable": false, "targets": [2] },
								],
								info: false,
								paging: false,
								searching: false,
							});
						</script>

						<hr>

						{!! $students->appends(array("terms" => $terms))->links() !!}

						<p>Showing <b>{{ $students->firstItem() }}</b> to <b>{{ $students->firstItem() + $students->count() - 1 }}</b> of <b>{{ $students->total() }}</b> entries</p>

					@endif

				</div>
			</div>

		</section>

	</form>

@endsection