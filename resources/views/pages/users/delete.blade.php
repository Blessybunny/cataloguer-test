@extends('layouts.general.page')
@section('title') Cataloger - User Manager @endsection
@section('content')
	<form action = "{{ url('/users/delete', $user->id) }}" method = "POST">
		@csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Users</div>
						<div class = "subtitle">Deleter | {{ $user->name_last }}, {{ $user->name_first }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $user->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $user->updated_at->format('l jS \\of F Y') }}
					<hr>
				</div>
			</div>
		</div>
		<div class = "container">
			<div class = "row">
				<div class = "col-4">
                    All fields associated with this user will have some of their values archived.
                    <br>
                    <br>
                    You are about to delete <b>{{ $user->name_last }}, {{ $user->name_first }}.</b>
                    <br>
                    This action cannot be reverted.
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
					<input class = "custom-button" type = "submit" value = "Confirm and Delete">
				</div>
			</div>
		</div>
	</form>
@endsection