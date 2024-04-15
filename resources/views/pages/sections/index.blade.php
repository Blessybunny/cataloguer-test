@extends('layouts.general.page')
@section('title') Cataloger - Section Manager @endsection
@section('content')
	<div class = "container-fluid">
		<div class = "row">
			<div class = "col-12">
				<h1 class = "custom-header">
					<div class = "main">Sections</div>
					<div class = "subtitle">Index</div>
					<hr>
				</h1>
			</div>
		</div>
	</div>
	<div class = "container">
		<div class = "row">
			<div class = "col-12">
				<table class = "custom-index table">
					<thead>
						<tr>
							<th width = "250">Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($grades as $grade)
							<tr>
								<td>Grade {{ $grade->grade }}</td>
								<td>
									<a href = "{{ url('/sections/view', $grade->id) }}">View</a>
									@if ($auth->is_administrator)
										<a href = "{{ url('/sections/edit', $grade->id) }}">Edit</a>
									@endif
								</td>
							</tr>
						@endforeach
					<tbody>
				</table>
			</div>
		</div>
	</div>
@endsection