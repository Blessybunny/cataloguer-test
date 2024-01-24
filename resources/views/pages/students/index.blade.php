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
			<br>
			<h4 class = "align-middle">Student Roster</h4>
			<br>
			
			<table class = "table">
				<tr>
					<th class = "align-middle" style = "width: 150px">LRN</th>
					<th class = "align-middle">Name</th>
					<th class = "align-middle" style = "width: 200px">Latest Grade &amp; Section</th>
					<th class = "align-middle">Option</th>
				</tr>
				@foreach ($students as $student)
					<tr>
						<td class = "align-middle text-left">{{ $student->info_lrn }}</td>
						<td class = "align-middle text-left">
							<span class = "text-uppercase">{{ $student->info_name_last }},</span>
							<span class = "text-capitalize">{{ $student->info_name_first }}</span>
							<span class = "text-capitalize">{{ $student->info_name_middle }}</span>
							<span class = "text-capitalize">{{ $student->info_name_suffix }}</span>
						</td>
						<td class = "align-middle">
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

		</div>
	</div>
</section>

@endsection