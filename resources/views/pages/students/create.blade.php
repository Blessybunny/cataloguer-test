@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

<form action = "{{ url('/students/create') }}" method = "POST">

    @csrf

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col">
				<a href = "{{ url('/students') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>

			<!-- Header -->
            <div class = "col">
                <h4 class = "text-center">Student Manager</h4>
                <p class = "text-center">Manage student info, grades, and forms</p>
            </div>
			
			<!-- Action -->
            <div class = "col">
				<input class = "button float-right" type = "submit" value = "Add">
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">Required</h6>
				<p class = "text-center">Please fill in the fields below</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Required -->
			<div class = "col">

				<!-- Learner Reference Number -->
				<label>
					<span style = "min-width: 250px;">Learner Reference Number:</span>
					<input
						name = "info_lrn"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_lrn') }}"
						required
					>
				</label>

				@if($errors->has('info_lrn'))

					<span class = "error" style = "margin-left: 250px;">* This LRN has already been taken.</span>

				@endif

				<br>

				<!-- Last Name -->
				<label>
					<span style = "min-width: 250px;">Last Name:</span>
					<input
						name = "info_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_name_last') }}"
						required
					>
				</label>
				<br>

				<!-- First Name -->
				<label>
					<span style = "min-width: 250px;">First Name:</span>
					<input
						name = "info_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_name_first') }}"
						required
					>
				</label>
				<br>

				<!-- Middle Name -->
				<label>
					<span style = "min-width: 250px;">Middle Name:</span>
					<input
						name = "info_name_middle"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_name_middle') }}"
						required
					>
				</label>
				<br>

				<!-- Birthdate -->
				<label>
					<span style = "min-width: 250px;">Birthdate (MM/DD/YYYY):</span>
					<input
						name = "info_birthdate"
						type = "text"
						maxlength = "50"
						value = "{{ old('info_birthdate') }}"
						required
					>
				</label>
				<br>

				<!-- Sex -->
				<label>
					<span style = "min-width: 250px;">Sex:</span>
					<select name = "info_sex" required>
						<option value = ""></option>
						<option value = "Male" {{ old("info_sex") == "Male" ? "selected" : "" }}>Male</option>
						<option value = "Female" {{ old("info_sex") == "Female" ? "selected" : "" }}>Female</option>
					</select>
				</label>

			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">Optional</h6>
				<p class = "text-center">The fields below can be edited and changed later.</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Optional -->
			<div class = "col">

				<!-- Name Suffix -->
				<label>
					<span style = "min-width: 250px;">Name Suffix:</span>
					<input
						name = "info_name_suffix"
						type = "text"
						maxlength = "50"
						value = "{{ old ('info_name_suffix') }}"
					>
				</label>

			</div>

		</div>
	</section>

</form>

@endsection