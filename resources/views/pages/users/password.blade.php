@extends('layouts.general.page')
@section('title') Cataloger - User Manager @endsection
@section('content')
	<form action = "{{ url('/users/password', $user->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Users</div>
						<div class = "subtitle">Editor | {{ $user->name_last }}, {{ $user->name_first }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $user->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $user->updated_at->format('l jS \\of F Y') }}
					<hr>
					@if (session()->get('updated'))
						<b class = "custom-success">Successfully updated!</b>
						<hr>
					@endif
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-4">
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
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-12">
					<hr>
                    <a href = "{{ url('/users/edit', $user->id) }}">
						<button class = "custom-button" type = "button">Back</button>
					</a>
					<input class = "custom-button" type = "submit" value = "Confirm and Change Password">
				</div>
			</div>
		</div>
	</form>
@endsection