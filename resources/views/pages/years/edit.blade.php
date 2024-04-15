@extends('layouts.general.page')
@section('title') Cataloger - School Year Manager @endsection
@section('content')
	<form action = "{{ url('/years/edit', $year->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Years</div>
						<div class = "subtitle">Editor | {{ $year->full }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $year->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Updated on: </b>{{ $year->updated_at->format('l jS \\of F Y') }}
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
					<h1 class = "custom-header-sub">Optional Fields</h1>
				</div>
				<div class = "col-4">
					<b>Principal:</b>
					<select name = "DB_USER_id">
						<option value = ""></option>
						@foreach ($users as $user)
							<option value = "{{ $user->id }}" {{ $year->DB_USER_id == $user->id ? 'selected' : '' }}>{{ $user->name_last }}, {{ $user->name_first }}</option>
						@endforeach
					</select>
					<br>
					<b>Archived Principal Last Name:</b>
					<input
						name = "LG_USER_name_last"
						type = "text"
						maxlength = "50"
						value = "{{ $year->LG_USER_name_last }}"
					>
					This field is used if the appropriate principal is NOT on the list
					<br>
					<br>
					<b>Archived Principal First Name:</b>
					<input
						name = "LG_USER_name_first"
						type = "text"
						maxlength = "50"
						value = "{{ $year->LG_USER_name_first }}"
					>
					This field is used if the appropriate principal is NOT on the list
					<br>
					<br>
					<b>January Attendance Count:</b>
					<input
						name = "attendance_jan_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jan_t }}"
					>
					<br>					
					<b>February Attendance Count:</b>
					<input
						name = "attendance_feb_t"
						type = "number"
						min = "0"
						max = "29"
						value = "{{ $year->attendance_feb_t }}"
					>
					<br>
					<b>March Attendance Count:</b>
					<input
						name = "attendance_mar_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_mar_t }}"
					>
					<br>
					<b>April Attendance Count:</b>
					<input
						name = "attendance_apr_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_apr_t }}"
					>
					<br>
					<b>May Attendance Count:</b>
					<input
						name = "attendance_may_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_may_t }}"
					>
					<br>
					<b>June Attendance Count:</b>
					<input
						name = "attendance_jun_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_jun_t }}"
					>
					<br>
					<b>July Attendance Count:</b>
					<input
						name = "attendance_jul_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_jul_t }}"
					>
					<br>
					<b>August Attendance Count:</b>
					<input
						name = "attendance_aug_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_aug_t }}"
					>
					<br>
					<b>September Attendance Count:</b>
					<input
						name = "attendance_sep_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_sep_t }}"
					>
					<br>
					<b>October Attendance Count:</b>
					<input
						name = "attendance_oct_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_oct_t }}"
					>
					<br>
					<b>November Attendance Count:</b>
					<input
						name = "attendance_nov_t"
						type = "number"
						min = "0"
						max = "30"
						value = "{{ $year->attendance_nov_t }}"
					>
					<br>
					<b>December Attendance Count:</b>
					<input
						name = "attendance_dec_t"
						type = "number"
						min = "0"
						max = "31"
						value = "{{ $year->attendance_dec_t }}"
					>
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