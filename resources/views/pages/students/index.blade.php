@extends('layouts.general.page')

@section('title')

Students

@endsection

@section('head')

<link href = "{{ asset('assets/less/students.less') }}" rel = "stylesheet" type = "text/less">

@endsection

@section('content')
	
<section id = "students" class = "container">
	<div class = "row">
		<div class = "col-12">

			<!-- Table -->
			<h6 class = "align-middle custom-header">Student Roster</h6>
			
			<table class = "table">
				<tr>
					<th class = "align-middle" style = "width: 150px">LRN</th>
					<th class = "align-middle">Name</th>
					<th class = "align-middle">Latest Grade &amp; Section</th>
					<th class = "align-middle">Option</th>
				</tr>
				@foreach ($students as $student)
					<tr>
						<td class = "align-middle left">{{ $student->info_lrn }}</td>
						<td class = "align-middle left">
							<span class = "uppercase">{{ $student->info_name_last }},</span>
							<span class = "capitalize">{{ $student->info_name_first }},</span>
							<span class = "capitalize">{{ $student->info_name_middle }}</span>
						</td>
						<td class = "align-middle left">
							{{
								isset($student->record_g10_school_grade) ? "Grade $student->record_g10_school_grade" : (
									isset($student->record_g9_school_grade) ? "Grade $student->record_g9_school_grade" : (
										isset($student->record_g8_school_grade) ? "Grade $student->record_g8_school_grade" : (
											isset($student->record_g7_school_grade) ? "Grade $student->record_g7_school_grade" : ""
										)
									)
								)
							}}
							{{
								isset($student->record_g10_school_section) ? $student->record_g10_school_section : (
									isset($student->record_g9_school_section) ? $student->record_g9_school_section : (
										isset($student->record_g8_school_section) ? $student->record_g8_school_section : (
											isset($student->record_g7_school_section) ? $student->record_g7_school_section : ""
										)
									)
								)
							}}
						</td>
						<td>
							<a class = "custom-btn" href = "{{ url('/students/edit', ['id' => $student->id]) }}">Modify</a>
						</td>
					</tr>
				@endforeach
			</table>
			
			<!-- Temp -->
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

		</div>
	</div>
</section>

@endsection