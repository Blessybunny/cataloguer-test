@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col">
				<a href = "{{ url('/years') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>

			<!-- Header -->
			<div class = "col">
				<h4 class = "text-center">User Manager</h4>
				<p class = "text-center">Manage user permission and access</p>
			</div>

			<!-- Action -->
			<div class = "col">
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">Edit</h6>
				<p class = "text-center">{{ strtoupper($user->name_last) }}, {{ ucfirst($user->name_first) }}</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- View -->
			<div class = "col">

				<!-- Principal -->
				<label>
					<span class = "font-bold">Principal:&nbsp;</span>
					<span>{{ $year->principal }}</span>
				</label>
				<br>

				<!-- January -->
				<label>
					<span class = "font-bold">January Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_jan_t }}</span>
				</label>

				<!-- February -->
				<label>	
					<span class = "font-bold">February Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_feb_t }}</span>
				</label>

				<!-- March -->
				<label>	
					<span class = "font-bold">March Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_mar_t }}</span>
				</label>

				<!-- April -->
				<label>	
					<span class = "font-bold">April Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_apr_t }}</span>
				</label>

				<!-- May -->
				<label>	
					<span class = "font-bold">May Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_may_t }}</span>
				</label>

				<!-- June -->
				<label>	
					<span class = "font-bold">June Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_jun_t }}</span>
				</label>

				<!-- July -->
				<label>	
					<span class = "font-bold">July Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_jul_t }}</span>
				</label>

				<!-- August -->
				<label>	
					<span class = "font-bold">August Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_aug_t }}</span>
				</label>

				<!-- September -->
				<label>	
					<span class = "font-bold">September Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_sep_t }}</span>
				</label>

				<!-- October -->
				<label>	
					<span class = "font-bold">October Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_oct_t }}</span>
				</label>

				<!-- November -->
				<label>	
					<span class = "font-bold">November Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_nov_t }}</span>
				</label>

				<!-- December -->
				<label>	
					<span class = "font-bold">December Attendance Count:&nbsp;</span>
					<span>{{ $year->attendance_dec_t }}</span>
				</label>

			</div>

		</div>
	</section>

@endsection