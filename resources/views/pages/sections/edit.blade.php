@extends('layouts.general.page')
@section('title') Cataloger - Section Manager @endsection
@section('content')
	<form action = "{{ url('/sections/edit', $grade->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Sections</div>
						<div class = "subtitle">Editor | Grade {{ $grade->grade }}</div>
						<hr>
					</h1>
					<b>Updated on: </b>{{ $grade->updated_at->format('l jS \\of F Y') }}
					<hr>
					@if (session()->get('updated'))
						<b class = "custom-success">Successfully updated!</b>
						<hr>
					@endif
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header-sub">Optional Fields</h1>
				</div>
				<div class = "col-4">
					@foreach ($sections as $section)
						<b>Section {{ $loop->index + 1 }}:</b>
						<input
							name = "section_{{ $section->DB_GRADE_id }}_{{ $section->id }}"
							type = "text"
							maxlength = "50"
							value = "{{ $section->section }}"
						>
						Note: changes to this field will have its old value archived on all students associated with the section
						<br>
						@if ($loop->index + 1 != $loop->count)
							<br>
						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
					<input class = "custom-button" type = "submit" value = "Update">
				</div>
			</div>
		</div>
	</form>
@endsection