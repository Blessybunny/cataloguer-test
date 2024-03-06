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

				<!-- Designation -->
				<b>Designation:</b>
				{{ $user->designation }}
				<br>

				<!-- School Year -->
				<b>School Year:</b>

			</div>
		</div>

	</section>

@endsection