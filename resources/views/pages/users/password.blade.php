@extends('layouts.general.page')

@section('title') Cataloger - User Manager @endsection

@section('content')

	<form action = "{{ url('/users/password', $user->id) }}" method = "POST">

		@csrf

		<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-4">
                    <a href = "{{ url('/users/edit', $user->id) }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>
				<div class = "align-self-center col-4">
					<h4 class = "text-center">User Editor</h4>
					<p class = "text-center">{{ $user->name_last }}, {{ $user->name_first }}</p>
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
                        You are about to change the password for <b>{{ $user->name_last }}, {{ $user->name_first }}</b>
                        <br>
                        This action cannot be reverted
                    </p>

					<b>New Password (min. 6 characters):</b>
					<input
						name = "password"
						type = "password"
						value = ""
						required
					>
					<br>

					<b>Confirm Password:</b>
					<input
						name = "password_confirmation"
						type = "password"
						value = ""
						required
					>

					@if($errors->has('password'))

						<b class = "error">* This password is too short or mismatched</b>
						<br>

					@endif

					<br>

					<input class = "button float-center" type = "submit" value = "Confirm and Change Password">
				</div>
			</div>

		</section>

	</form>

@endsection