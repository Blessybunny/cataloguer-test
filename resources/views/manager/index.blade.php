@extends('layouts.general.page')

@section('title')
Students
@endsection

@section('content')
	
	<main id = "main">
		<section id = "students" class = "container">
			<div class = "row">
				<div class = "col-12">

					<!-- Table -->
					<h6 class = "align-middle custom-header">Student Roster</h6>
					
					<table class = "table">
						<tr>
							<th class = "align-middle" style = "width: 150px">LRN</th>
							<th class = "align-middle">Name</th>
							<th class = "align-middle">Current Grade &amp; Section</th>
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
									Grade
									{{
										isset($student->record_g10_school_grade) ? $student->record_g10_school_grade : (
											isset($student->record_g9_school_grade) ? $student->record_g9_school_grade : (
												isset($student->record_g8_school_grade) ? $student->record_g8_school_grade : (
													isset($student->record_g7_school_grade) ? $student->record_g7_school_grade : "No Grade"
												)
											)
										)
									}}
									{{
										isset($student->record_g10_school_grade) ? $student->record_g10_school_grade : (
											isset($student->record_g9_school_grade) ? $student->record_g9_school_grade : (
												isset($student->record_g8_school_grade) ? $student->record_g8_school_grade : (
													isset($student->record_g7_school_grade) ? $student->record_g7_school_grade : "No Grade"
												)
											)
										)
									}}
								</td>
								<td>
									<a class = "custom-btn" href = "{{ url('/manager/edit', ['id' => $student->id]) }}">Modify</a>
								</td>
							</tr>
						@endforeach
					</table>
					{{
										$student->record_g10_school_grade !== "" ? $student->record_g10_school_grade :
										(
											$student->record_g9_school_grade !== "" ? $student->record_g9_school_grade :
											(
												$student->record_g8_school_grade !== "" ? $student->record_g8_school_grade :
												(
													$student->record_g7_school_grade !== "" ? $student->record_g7_school_grade : "No Grade"
												)
											)
										)
									}}
					<hr>
					<ul>
						To-do:
						<hr>
						<li>CHECKPOINT: work on making everything editable.</li>
						<li>Create a new database category named "report" that contains the miscellaneous variables from sf9 front and back.</li>
						<li>Create an options row that toggles a highlight to make editable fields visibly easier</li>
						<li>Add general info for each student below their name headers, including the date created and last updated (restore the timestamps).</li>
						<li>Change observed values comparatives to isset().</li>
						<hr>
						<li>Turn required fields into red text if empty.</li>
					</ul>
					<ul>
						Status:
						<hr>
						<li>Edit: Complete</li>
						<li>SF9 Back: Complete</li>
					</ul>

				</div>
			</div>
		</section>
	</main>

@endsection