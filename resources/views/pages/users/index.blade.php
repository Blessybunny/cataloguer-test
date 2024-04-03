@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users') }}" method = "POST">

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
					<h4 class = "text-center">User Index</h4>
				</div>
				<div class = "align-self-center col-4">

					@if ($auth->is_administrator)

						<a href = "{{ url('/users/create') }}">
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
							placeholder = "Search user"
							value = "{{ isset($terms) ? $terms : '' }}"
							style = "margin-right: 5px;"
						>
						<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
						<a href = "{{ url('/users') }}">
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

					@if (count($users) > 0)

						<table id = "index" class = "table">
							<thead>
								<tr>
									<th width = "200">Role</th>
									<th>Name</th>
									<th width = "200">Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($users as $user)

									<tr>
										<td>{{ $user->role }}</td>
										<td>{{ $user->name_last }}, {{ $user->name_first }}</td>
										<td>
											<div class = "container-fluid">
												<div class = "row">
													<div class = "col">
														<a href = "{{ url('/users/view', $user->id) }}">View</a>
													</div>
													<div class = "col">

														@if ($auth->is_administrator)

															<a href = "{{ url('/users/edit', $user->id) }}">Edit</a>

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
									{ className: "dt-head-left", targets: [ 0, 1 ] },
									{ "orderable": false, "targets": [2] },
								],
								info: false,
								paging: false,
								searching: false,
							});
						</script>

						<hr>

						{!! $users->appends(array('terms' => $terms))->links() !!}

						<p>Showing <b>{{ $users->firstItem() }}</b> to <b>{{ $users->firstItem() + $users->count() - 1 }}</b> of <b>{{ $users->total() }}</b> entries</p>

					@endif

				</div>
			</div>

		</section>

	</form>

@endsection