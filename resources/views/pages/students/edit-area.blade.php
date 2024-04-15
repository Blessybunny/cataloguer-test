@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('content')
	<form action = "{{ url('/students/edit/area', $student->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
						<div class = "subtitle">Editor | Areas | {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $student->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $student->updated_at->format('l jS \\of F Y') }}
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
			</div>
			@foreach ($grades as $grade)
				<div class = "row">
					<div class = "col-4">
						<b>Grade {{ $grade->grade }} Section | Adviser:</b>
						<select name = "DB_SECTION_id_g{{ $grade->grade }}">
							<option value = ""></option>
							@foreach ($sections as $section)
								@if ($grade->id == $section->DB_GRADE_id)
									<option value = "{{ $section->id }}" {{ $student->{'DB_SECTION_id_g'.$grade->grade} == $section->id ? 'selected' : '' }}>{{ $section->section }} {{ $section->user }}</option>
								@endif
							@endforeach
						</select>
						<br>
						<b>Archived Grade {{ $grade->grade }} Section:</b>
						<input
							name = "LG_SECTION_name_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'LG_SECTION_name_g'.$grade->grade} }}"
						>
						This field is used if the appropriate section is NOT on the list
						<br>
						<br>
						<b>Archived Grade {{ $grade->grade }} Adviser Last Name:</b>
						<input
							name = "LG_USER_name_last_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'LG_USER_name_last_g'.$grade->grade} }}"
						>
						This field is used if the appropriate adviser is NOT on the list
						<br>
						<br>
						<b>Archived Grade {{ $grade->grade }} Adviser First Name:</b>
						<input
							name = "LG_USER_name_first_g{{ $grade->grade }}"
							type = "text"
							maxlength = "50"
							value = "{{ $student->{'LG_USER_name_first_g'.$grade->grade} }}"
						>
						This field is used if the appropriate adviser is NOT on the list
						@if ($loop->iteration != $loop->count)
							<br>
							<br>
						@endif
					</div>
					<div class = "col-4">
						<b>Grade {{ $grade->grade }} School Year:</b>
						<select name = "DB_YEAR_id_g{{ $grade->grade }}">
							<option value = ""></option>
							@foreach ($years as $year)
								<option value = "{{ $year->id }}" {{ $student->{'DB_YEAR_id_g'.$grade->grade} == $year->id ? 'selected' : '' }}>{{ $year->year }}-{{ $year->year + 1 }}</option>
							@endforeach
						</select>
					</div>
				</div>
			@endforeach
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