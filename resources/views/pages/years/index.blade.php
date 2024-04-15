@extends('layouts.general.page')
@section('title') Cataloger - School Year Manager @endsection
@section('content')
	<form action = "{{ url('/years') }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Years</div>
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
						<a href = "{{ url('/years/create') }}">
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
							placeholder = "Search year"
							value = "{{ isset($terms) ? $terms : '' }}"
						>
						<button type = "submit">Search</button>
						<a href = "{{ url('/years') }}">Clear</a>
					</label>
					@if ($terms)
						<br>
						<p>Results for <b>{{ $terms }}</b></p>
					@endif
					<hr>
				</div>
				@if (count($years) > 0)
					<div class = "col-12">
						<table id = "index" class = "custom-index table">
							<thead>
								<tr>
									<th width = "250">Year</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($years as $year)
									<tr>
										<td>{{ $year->full }}</td>
										<td>
											<a href = "{{ url('/years/view', $year->id) }}">View</a>
											@if ($auth->is_administrator)
												<a href = "{{ url('/years/edit', $year->id) }}">Edit</a>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<script>
							const table = new DataTable('#index', {
								columnDefs: [
									{ className: "dt-head-left", targets: [0, 1] },
									{ "orderable": false, "targets": [1] },
								],
								info: false,
								order: [[0, 'desc']],
								paging: false,
								searching: false,
							});
						</script>
						<hr>
						{!! $years->appends(array('terms' => $terms))->links() !!}
						<p>Showing <b>{{ $years->firstItem() }}</b> to <b>{{ $years->firstItem() + $years->count() - 1 }}</b> of <b>{{ $years->total() }}</b> entries</p>
					</div>
				@endif
			</div>
		</div>
	</form>
@endsection