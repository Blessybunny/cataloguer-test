@extends('layouts.page')

@section('title')
Students
@endsection

@section('content')
	
	<main id = "main">
		<section id = "students" class = "container">
			<div class = "row">
				<div class = "col">
					<h5 class = "align-middle custom-header-bg">All Students</h5>
					<table class = "table">
						<tr>
							<th class = "align-middle" style = "width: 150px">LRN</th>
							<th class = "align-middle">Name</th>
							<th class = "align-middle">Grade | Section</th>
						</tr>
						@foreach ($students as $student)
							<tr>
								<td>01-0001-{{ $student->id }}</td>
								<td><span class = "uppercase">{{ $student->li_name_last }}</span>, {{ $student->li_name_first }} {{ $student->li_name_middle }}.</td>
								<td></td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</section>
	</main>

@endsection