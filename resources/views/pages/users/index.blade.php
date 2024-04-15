@extends('layouts.general.page')
@section('title') Cataloger - User Manager @endsection
@section('content')
	<form action = "{{ url('/users') }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Users</div>
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
						<a href = "{{ url('/users/create') }}">
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
							placeholder = "Search user"
							value = "{{ isset($terms) ? $terms : '' }}"
						>
						<button type = "submit">Search</button>
						<a href = "{{ url('/users') }}">Clear</a>
					</label>
					@if ($terms)
						<br>
						<p>Results for <b>{{ $terms }}</b></p>
					@endif
					<hr>
				</div>
				@if (count($users) > 0)
					<div class = "col-12">
						<table id = "index" class = "custom-index table">
							<thead>
								<tr>
									<th width = "250">Role</th>
									<th width = "500">Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $user->role }}</td>
										<td>{{ $user->name_last }}, {{ $user->name_first }}</td>
										<td>
											<a href = "{{ url('/users/view', $user->id) }}">View</a>
											@if ($auth->is_administrator)
												<a href = "{{ url('/users/edit', $user->id) }}">Edit</a>
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
						{!! $users->appends(array('terms' => $terms))->links() !!}
						<p>Showing <b>{{ $users->firstItem() }}</b> to <b>{{ $users->firstItem() + $users->count() - 1 }}</b> of <b>{{ $users->total() }}</b> entries</p>
					</div>
				@endif
			</div>
		</div>
	</form>
@endsection