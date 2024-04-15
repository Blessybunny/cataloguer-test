@extends('layouts.general.page')
@section('title') Cataloger - Section Manager @endsection
@section('content')
	<div class = "container-fluid">
		<div class = "row">
			<div class = "col-12">
				<h1 class = "custom-header">
					<div class = "main">Sections</div>
					<div class = "subtitle">Viewer | Grade {{ $grade->grade }}</div>
					<hr>
				</h1>
				<b>Updated on: </b>{{ $grade->updated_at->format('l jS \\of F Y') }}
				<hr>
			</div>
		</div>
	</div>
	<div class = "container">
		<div class = "row">
			<div class = "col-4">
				<table class = "table">
					<tr>
						<th>Grade Level Coordinators</th>
					</tr>
					<tr>
						<td>
							@foreach ($users as $user)
								<a href = "{{ url('/users/view', $user->id) }}">{{ $user->name_last }}, {{ $user->name_first }}</a>
								<br>
							@endforeach
							@if (count($users) == 0)
								&nbsp;
							@endif
						</td>
					</tr>
				</table>
				@foreach ($sections as $section)
					<table class = "table">
						<tr>
							<th colspan = "2">Section {{ $loop->iteration }}</th>
						</tr>
						<tr>
							<td width = "100">Name</td>
							<td>{{ $section->section }}</td>
						</tr>
						<tr>
							<td width = "100">Adviser</td>
							<td>
								@if (isset($section->adviser->id))
									<a href = "{{ url('/users/view', $section->adviser->id) }}">{{ $section->adviser->name_last }}, {{ $section->adviser->name_first }}</a>
								@endif
							</td>
						</tr>
						<tr>
							<td width = "100">Teachers</td>
							<td>
								@foreach ($section->teachers as $teacher)
									<a href = "{{ url('/users/view', $teacher->id) }}">{{ $teacher->name_last }}, {{ $teacher->name_first }}</a>
									<br>
								@endforeach
							</td>
						</tr>
					</table>
				@endforeach
			</div>
		</div>
	</div>
@endsection