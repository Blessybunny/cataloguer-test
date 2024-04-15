@extends('layouts.general.page')
@section('title') Cataloger - User Manager @endsection
@section('content')
	<form action = "{{ url('/users/edit', $user->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Users</div>
						<div class = "subtitle">Editor | {{ $user->name_last }}, {{ $user->name_first }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $user->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $user->updated_at->format('l jS \\of F Y') }}
					<hr>
					@if (session()->get('created'))
						<b class = "custom-success">Successfully created!</b>
						<hr>
					@endif
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
					<h1 class = "custom-header-sub">Required Fields</h1>
				</div>
				<div class = "col-4">
					<b>Last Name:</b>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $user->name_last }}"
						required
					>
					<br>
					<b>First Name:</b>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $user->name_first }}"
						required
					>
					<br>
					<b>Role:</b>
					<select name = "DB_ROLE_id" required>
						@foreach ($roles as $role)
							<option value = "{{ $role->id }}" {{ $user->DB_ROLE_id == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
						@endforeach
					</select>
					Note: changes to this field for advisers will have their names archived on all students associated with the user
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h1 class = "custom-header-sub">Optional Fields</h1>
				</div>
				<div class = "col-4">
					<b>School Year Designation:</b>
					<select name = "DB_YEAR_id">
						<option value = ""></option>
						@foreach ($years as $year)
							<option value = "{{ $year->id }}" {{ $user->DB_YEAR_id == $year->id ? 'selected' : '' }}>{{ $year->full }}</option>
						@endforeach
					</select>
					<br>
					<b>Subject Designations:</b>
					<div class = "border-all-light" style = "padding: 15px;">
						<label class = "highlight">
							<input
								name = "ST_subject_fil"
								type = "checkbox"
								{{  $user->ST_subject_fil ? 'checked' : '' }}
							>
							<span>Filipino</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_eng"
								type = "checkbox"
								{{  $user->ST_subject_eng ? 'checked' : '' }}
							>
							<span>English</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_mat"
								type = "checkbox"
								{{  $user->ST_subject_mat ? 'checked' : '' }}
							>
							<span>Mathematics</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_sci"
								type = "checkbox"
								{{  $user->ST_subject_sci ? 'checked' : '' }}
							>
							<span>Science</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_ap"
								type = "checkbox"
								{{  $user->ST_subject_ap ? 'checked' : '' }}
							>
							<span>Araling Panlipunan (AP)</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_ep"
								type = "checkbox"
								{{  $user->ST_subject_ep ? 'checked' : '' }}
							>
							<span>Edukasyon sa Pagpapakatao (EP)</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_tle"
								type = "checkbox"
								{{  $user->ST_subject_tle ? 'checked' : '' }}
							>
							<span>Technology and Livelihood Education (TLE)</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_mapeh"
								type = "checkbox"
								{{  $user->ST_subject_mapeh ? 'checked' : '' }}
							>
							<span>MAPEH</span>
						</label>
						<hr>
						<label class = "highlight">
							<input
								name = "ST_subject_jp"
								type = "checkbox"
								{{  $user->ST_subject_jp ? 'checked' : '' }}
							>
							<span>Nihongo</span>
						</label>
					</div>
					<br>
					<b>Miscellaneous:</b>
					<div class = "border-all-light" style = "padding: 15px;">
						<label class = "highlight">
							<input
								name = "ST_subject_sf10_acads"
								type = "checkbox"
								{{  $user->ST_subject_sf10_acads ? 'checked' : '' }}
							>
							<span>
								Allow editing on SF10 academic fields
								<br>
								(enrollment, certification)
							</span>
						</label>
						<hr>
						<label class = "highlight">
							<input
								name = "ST_subject_sf10_grade"
								type = "checkbox"
								{{  $user->ST_subject_sf10_grade ? 'checked' : '' }}
							>
							<span>
								Allow editing on SF10 grading fields
								<br>
								(scholastic records)
							</span>
						</label>
					</div>
				</div>
				<div class = "col-4">
					<b>Grade Level Coordinator's Designation:</b>
					<select name = "DB_GRADE_id">
						<option value = ""></option>
						@foreach ($grades as $grade)
							<option value = "{{ $grade->id }}" {{ $user->DB_GRADE_id == $grade->id ? 'selected' : '' }}>Grade {{ $grade->grade }}</option>
						@endforeach
					</select>
				</div>
				<div class = "col-4">
					<b>Adviser's Designation:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>
						@foreach ($sections as $section)
							@if ($section->DB_USER_id == null || $section->DB_USER_id == $user->id)
								<option value = "{{ $section->id }}" {{ $user->id == $section->DB_USER_id ? 'selected' : '' }}>Grade {{ $section->grade }} | {{ $section->section }}</option>
							@endif
						@endforeach
					</select>
					Note: changes to this field for advisers will have their names archived on all students associated with the user
					<br>
					<br>
					<b>Class Designations:</b>
					<div class = "border-all-light" style = "padding: 15px;">
						@foreach ($sections as $section)
							<label>
								<input
									name = "DB_SECTION_MULTI_id[]"
									type = "checkbox"
									value = "{{ $section->id }}"
									{{  $section->is_classed ? 'checked' : '' }}
								>
								Grade {{ $section->grade }} | {{ $section->section }}
							</label>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
					<input class = "custom-button" type = "submit" value = "Update">
					<a href = "{{ url('/users/password', $user->id) }}" class = "custom-button">Change Password</a>
					@if ($user->is_deletable)
						<a href = "{{ url('/users/delete', $user->id) }}" class = "custom-button">Delete</a>
					@endif
				</div>
			</div>
		</div>
	</form>
@endsection