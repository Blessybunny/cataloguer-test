@extends('layouts.page')

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
							<th class = "align-middle">Grade</th>
							<th class = "align-middle">Section</th>
							<td></td>
						</tr>
						@foreach ($students as $student)
							<tr>
								<td>01-0001-{{ $student->id }}</td>
								<td>
									<span class = "uppercase">{{ $student->li_name_last }},</span>
									{{ $student->li_name_first }} {{ $student->li_name_middle }}.
								</td>
								<td></td>
								<td></td>
								<td>
									<a class = "custom-btn" href = "{{ url('/students/manager', ['id' => $student->id]) }}">Modify</a>
								</td>
							</tr>
						@endforeach
					</table>

				</div>
			</div>
		</section>
	</main>

@endsection