@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/users') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">User Viewer</h4>
				<p class = "text-center">{{ $user->name_last }}, {{ $user->name_first }}</p>
			</div>
			<div class = "align-self-center col-4">
			</div>
		</div>

		<!-- View -->
		<div class = "row">
			<div class = "col-12">
				<hr>
			</div>
			<div class = "col-12">

				<!-- Timestamp -->
				<b>Created on: </b>{{ $user->created_at->format('l jS \\of F Y') }}
				<br>
				<b>Edited on: </b>{{ $user->updated_at->format('l jS \\of F Y') }}
				<hr>

				<!-- DepEd ID -->
				<b>DepEd ID:</b>
				{{ $user->email }}
				<br>
				<br>

				<!-- Name -->
				<b>Name:</b>
				{{ $user->name_last }}, {{ $user->name_first }}
				<br>
				<br>

				<!-- Role -->
				<b>Role:</b>
				{{ $user->role }}
				<br>

				<!-- School Year Designation -->
				<b>School Year Designation:</b>
				{{ $user->year }}
				<br>

				<!-- Subject Designations -->
				<b>Subject Designations:</b>
				<br>

				<!-- Grade Level Coordinator's Designation -->
				<b>Grade Level Coordinator's Designation:</b>
				{{ $user->grade }}
				<br>

				<!-- Adviser's Designation -->
				<b>Adviser's Designation:</b>
				{{ $user->section }}
				<br>

				<!-- Class Designations -->
				<b>Class Designations:</b>
				<ul>

					@foreach ($user->classes as $class)

						<li>Grade {{ $class->grade }} | {{ $class->section }}</li>

					@endforeach

				</ul>

			</div>
		</div>

	</section>

@endsection