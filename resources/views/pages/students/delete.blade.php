@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/delete', $student->id) }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
                    <a href = "{{ url('/students/edit/info', $student->id) }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">Student Editor</h4>
					<p class = "text-center">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</p>
				</div>
				<div class = "align-self-center col-4">
				</div>
			</div>

			<!-- Danger -->
			<div class = "row">
				<div class = "col-12">
					<hr>
					<h6 class = "text-center">Danger</h6>
					<hr>
				</div>
				<div class = "col-12">
                    <p class = "text-center">
                        You are about to delete <b>{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</b>
                        <br>
                        This action cannot be reverted
                    </p>
					<input class = "button float-center" type = "submit" value = "Confirm and Delete">
				</div>
			</div>

		</section>

	</form>

@endsection