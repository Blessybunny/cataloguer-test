@extends('layouts.page')

@section('title')
Subjects
@endsection

@section('content')
	
<main id = "main">
    <section id = "students" class = "container">
		<div class = "row">
			<div class = "col">
				<h2>Lastname, First Name I.</h2>
				<h5>01-0001-001</h5>
				<h6>Grade X | Section X</h6>
				<hr>
				<a href = "{{ url('/semestral-grades') }}"><button class = "btn-custom">Edit Semestral Grades</button></a>
				<a href = "{{ url('/grade-card') }}"><button class = "btn-custom">View Grade Card</button></a>
				<a href = "{{ url('/permanent-form') }}"><button class = "btn-custom">View Permanent Form</button></a>
				<hr>
			</div>
		</div>
		<div class = "row">
			<div class = "col">
				<h2>Lastname, First Name I.</h2>
				<h5>01-0001-001</h5>
				<h6>Grade X | Section X</h6>
				<hr>
				<a href = "{{ url('/semestral-grades') }}"><button class = "btn-custom">Edit Semestral Grades</button></a>
				<a href = "{{ url('/grade-card') }}"><button class = "btn-custom">View Grade Card</button></a>
				<a href = "{{ url('/permanent-form') }}"><button class = "btn-custom">View Permanent Form</button></a>
				<hr>
			</div>
		</div>
    </section>
</main>

@endsection