@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('content')
	<form action = "{{ url('/students/edit/info', $student->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
						<div class = "subtitle">Editor | Information | {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $student->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $student->updated_at->format('l jS \\of F Y') }}
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
					<b>Learner Reference Number:</b>
					<input
						name = "info_lrn"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_lrn }}"
						required
					>
					@if($errors->has('info_lrn'))
						<b class = "error">* The LRN has already been taken.</b>
						<br>
					@endif
					<br>
					<b>Last Name:</b>
					<input
						name = "info_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_last }}"
						required
					>
					<br>
					<b>First Name:</b>
					<input
						name = "info_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_first }}"
						required
					>
					<br>
					<b>Middle Name:</b>
					<input
						name = "info_name_middle"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_name_middle }}"
						required
					>
					<br>
					<b>Sex:</b>
					<select name = "info_sex" required>
						<option value = "Male" {{ $student->info_sex == 'Male' ? 'selected' : '' }}>Male</option>
						<option value = "Female" {{ $student->info_sex == 'Female' ? 'selected' : '' }}>Female</option>
					</select>
					<br>
					<b>Birthdate (MM/DD/YYYY):</b>
					<input
						name = "info_birthdate"
						type = "text"
						maxlength = "50"
						value = "{{ $student->info_birthdate }}"
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
						value = "{{ $student->info_name_suffix }}"
					>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
					<input class = "custom-button" type = "submit" value = "Update">
					<a href = "{{ url('/students/delete', $student->id) }}">
						<button class = "custom-button" type = "button">Delete</button>
					</a>
				</div>
			</div>
		</div>
	</form>
@endsection