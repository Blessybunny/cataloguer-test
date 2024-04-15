@extends('layouts.general.page')
@section('title') Cataloger - User Manager @endsection
@section('content')
	<form action = "{{ url('/users/create') }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Users</div>
						<div class = "subtitle">Creator</div>
						<hr>
					</h1>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header-sub">Required Fields</h1>
				</div>
				<div class = "col-4">
					<b>DepEd ID:</b>
					<input
						name = "email"
						type = "text"
						maxlength = "50"
						value = "{{ old('email') }}"
						required
					>
					@if($errors->has('email'))
						<b class = "error">* This DepEd ID has already been taken</b>
						<br>
					@endif
					<br>
					<b>Password (min. 6 characters):</b>
					<input
						name = "password"
						type = "password"
						value = ""
						required
					>
					<br>
					<b>Confirm Password:</b>
					<input
						name = "password_confirmation"
						type = "password"
						value = ""
						required
					>
					@if($errors->has('password'))
						<b class = "error">* This password is too short or mismatched</b>
						<br>
					@endif
					<br>
					<b>Last Name:</b>
					<input
						name = "name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_last') }}"
						required
					>
					<br>
					<b>First Name:</b>
					<input
						name = "name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('name_first') }}"
						required
					>
					<br>
					<b>Role:</b>
					<select name = "DB_ROLE_id" required>
						<option value = ""></option>
						@foreach ($roles as $role)
							<option value = "{{ $role->id }}" {{ old('DB_ROLE_id') == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h1 class = "custom-header-sub">Optional Fields</h1>
					<p>These apply to grade level coordinators and advisers</p>
				</div>
				<div class = "col-4">
					<b>School Year Designation:</b>
					<select name = "DB_YEAR_id">
						<option value = ""></option>
						@foreach ($years as $year)
							<option value = "{{ $year->id }}" {{ old('DB_YEAR_id') == $year->id ? 'selected' : '' }}>{{ $year->full }}</option>
						@endforeach
					</select>
					<br>
					<b>Subject Designations:</b>
					<div class = "border-all-light" style = "padding: 15px;">
						<label class = "highlight">
							<input
								name = "ST_subject_fil"
								type = "checkbox"
								{{ old('ST_subject_fil') ? 'checked' : '' }}
							>
							<span>Filipino</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_eng"
								type = "checkbox"
								{{ old('ST_subject_eng') ? 'checked' : '' }}
							>
							<span>English</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_mat"
								type = "checkbox"
								{{ old('ST_subject_mat') ? 'checked' : '' }}
							>
							<span>Mathematics</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_sci"
								type = "checkbox"
								{{ old('ST_subject_sci') ? 'checked' : '' }}
							>
							<span>Science</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_ap"
								type = "checkbox"
								{{ old('ST_subject_ap') ? 'checked' : '' }}
							>
							<span>Araling Panlipunan (AP)</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_ep"
								type = "checkbox"
								{{ old('ST_subject_ep') ? 'checked' : '' }}
							>
							<span>Edukasyon sa Pagpapakatao (EP)</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_tle"
								type = "checkbox"
								{{ old('ST_subject_tle') ? 'checked' : '' }}
							>
							<span>Technology and Livelihood Education (TLE)</span>
						</label>
						<label class = "highlight">
							<input
								name = "ST_subject_mapeh"
								type = "checkbox"
								{{ old('ST_subject_mapeh') ? 'checked' : '' }}
							>
							<span>MAPEH</span>
						</label>
						<hr>
						<label class = "highlight">
							<input
								name = "ST_subject_jp"
								type = "checkbox"
								{{ old('ST_subject_jp') ? 'checked' : '' }}
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
								{{ old('ST_subject_sf10_acads') ? 'checked' : '' }}
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
								{{ old('ST_subject_sf10_grade') ? 'checked' : '' }}
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
							<option value = "{{ $grade->id }}" {{ old('DB_GRADE_id') == $grade->id ? 'selected' : '' }}>Grade {{ $grade->grade }}</option>
						@endforeach
					</select>
				</div>
				<div class = "col-4">
					<b>Adviser's Designation:</b>
					<select name = "DB_SECTION_id">
						<option value = ""></option>
						@foreach ($sections as $section)
							<option value = "{{ $section->id }}" {{ old('DB_SECTION_id') == $section->id ? 'selected' : '' }}>Grade {{ $section->grade }} | {{ $section->section }}</option>
						@endforeach
					</select>
					<br>
					<b>Class Designations:</b>
					<div class = "border-all-light" style = "padding: 15px;">
						@foreach ($sections as $section)
							<label>
								<input
									name = "DB_SECTION_MULTI_id[]"
									type = "checkbox"
									value = "{{ $section->id }}"
									{{ is_array(old('DB_SECTION_MULTI_id')) && in_array($section->id, old('DB_SECTION_MULTI_id')) ? 'checked' : '' }}
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
					<input class = "custom-button" type = "submit" value = "Create">
				</div>
			</div>
		</div>
	</form>
@endsection