@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col">
				<a href = "{{ url('/users') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>

			<!-- Header -->
			<div class = "col">
				<h4 class = "text-center">User Manager</h4>
				<p class = "text-center">Manage user permission and access</p>
			</div>

			<!-- Action -->
			<div class = "col">
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col">
				<hr>
				<h6 class = "text-center">Edit</h6>
				<p class = "text-center">{{ $user->name_last }}, {{ $user->name_first }}</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- View -->
			<div class = "col">

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

			</div>

		</div>
	</section>

@endsection