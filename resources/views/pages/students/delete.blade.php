@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('content')
	<form action = "{{ url('/students/delete', $student->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
						<div class = "subtitle">Deleter | Information | {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $student->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $student->updated_at->format('l jS \\of F Y') }}
					<hr>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
                    You are about to delete <b>{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</b>
                    <br>
                    <br>
                    This action cannot be reverted
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
                    <a href = "{{ url('/students/edit/info', $student->id) }}">
						<button class = "custom-button" type = "button">Back</button>
					</a>
					<input class = "custom-button" type = "submit" value = "Confirm and Delete">
				</div>
			</div>
		</div>
	</form>
@endsection