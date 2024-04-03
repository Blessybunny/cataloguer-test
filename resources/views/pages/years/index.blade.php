@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

	<form action = "{{ url('/years') }}" method = "POST">

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
					<h4 class = "text-center">School Year Index</h4>
				</div>
				<div class = "align-self-center col-4">

					@if ($auth->is_administrator)

						<a href = "{{ url('/years/create') }}">
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
							placeholder = "Search school year"
							value = "{{ isset($terms) ? $terms : '' }}"
							style = "margin-right: 5px;"
						>
						<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
						<a href = "{{ url('/years') }}">
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

					@if (count($years) > 0)

						<table id = "index" class = "table">
							<thead>
								<tr>
									<th width = "200">School Year</th>
									<th></th>
									<th width = "200">Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($years as $year)

									<tr>
										<td class = "text-center">{{ $year->full }}</td>
										<td></td>
										<td>
											<div class = "container-fluid">
												<div class = "row">
													<div class = "col">
														<a href = "{{ url('/years/view', $year->id) }}">View</a>
													</div>
													<div class = "col">

														@if ($auth->is_administrator)

															<a href = "{{ url('/years/edit', $year->id) }}">Edit</a>

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
									{ "orderable": false, "targets": [1, 2] },
								],
								info: false,
								paging: false,
								searching: false,
							});
						</script>

						<hr>

						{!! $years->appends(array('terms' => $terms))->links() !!}

						<p>Showing <b>{{ $years->firstItem() }}</b> to <b>{{ $years->firstItem() + $years->count() - 1 }}</b> of <b>{{ $years->total() }}</b> entries</p>

					@endif

				</div>
			</div>

		</section>

	</form>

@endsection