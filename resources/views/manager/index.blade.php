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
							<th class = "align-middle" style = "width: 150px">ID (not lrn)</th>
							<th class = "align-middle">Name</th>
							<th class = "align-middle">Grade</th>
							<th class = "align-middle">Section</th>
							<td></td>
						</tr>
						@foreach ($students as $student)
							<tr>
								<td>{{ $student->id }}</td>
								<td>
									<span class = "uppercase">{{ $student->ALL_li_name_last }},</span>
									{{ $student->ALL_li_name_first }} {{ $student->ALL_li_name_middle }}.
								</td>
								<td></td>
								<td></td>
								<td>
									<a class = "custom-btn" href = "{{ url('/manager/edit', ['id' => $student->id]) }}">Modify</a>
								</td>
							</tr>
						@endforeach
					</table>

					<ul>
						To-do:
						<hr>
						<li>CHECKPOINT: work on making everything editable.</li>
						<li>Create a new database category named "report" that contains the miscellaneous variables from sf9 front and back.</li>
						<li>Relocate records -> age into NEW report -> age.</li>
						<hr>
						<li>ALL: Middle initials must be complete, and spliced on single letter printing.</li>
					</ul>

				</div>
			</div>
		</section>
	</main>

@endsection