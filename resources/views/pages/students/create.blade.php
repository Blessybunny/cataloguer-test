@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('content')
	<form action = "{{ url('/students/create') }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
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
					<b>Learner Reference Number:</b>
					<input
						name = "info_lrn"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_lrn') }}"
						required
					>
					@if($errors->has('info_lrn'))
						<b class = "error">* This LRN has already been taken.</b>
						<br>
					@endif
					<br>
					<b>Last Name:</b>
					<input
						name = "info_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_name_last') }}"
						required
					>
					<br>
					<b>First Name:</b>
					<input
						name = "info_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_name_first') }}"
						required
					>
					<br>
					<b>Middle Name:</b>
					<input
						name = "info_name_middle"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_name_middle') }}"
						required
					>
					<br>
					<b>Sex:</b>
					<select name = "info_sex" required>
						<option value = ""></option>
						<option value = "Male" {{ old('info_sex') == 'Male' ? 'selected' : '' }}>Male</option>
						<option value = "Female" {{ old('info_sex') == 'Female' ? 'selected' : '' }}>Female</option>
					</select>
					<br>
					<b>Birthdate (MM/DD/YYYY):</b>
					<input
						name = "info_birthdate"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_birthdate') }}"
						required
					>
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
					<b>Name Suffix:</b>
					<input
						name = "info_name_suffix"
						type = "text"
						maxlength = "50"
						value = "{{ old ('info_name_suffix') }}"
					>
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