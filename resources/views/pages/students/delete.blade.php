@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/delete', $student->id) }}" method = "POST">

		@csrf

		<section class = "container">
			<div class = "row">

				<!-- Action -->
				<div class = "col">
                    <a href = "{{ url('/students/edit', $student->id) }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>

				<!-- Header -->
				<div class = "col">
					<h4 class = "text-center">Student Manager</h4>
					<p class = "text-center">Manage student info, grades, and forms</p>
				</div>
				
				<!-- Action -->
				<div class = "col">
				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Danger Zone</h6>
					<p class = "text-center">Some actions become permanent</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Delete -->
				<div class = "col">
                    <p class = "text-center">
                        You are about to delete the user <b>{{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}</b>
                        <br>
                        This action cannot be reverted
                    </p>
					<input class = "button float-center" type = "submit" value = "Confirm and Delete">
				</div>

			</div>
		</section>

	</form>

@endsection