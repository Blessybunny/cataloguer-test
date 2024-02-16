@extends('layouts.general.page')

@section('title') Cataloger - School Year Manager @endsection

@section('content')

<form action = "{{ url('/years') }}" method = "POST">

	@csrf

	<section class = "container">
		<div class = "row">

			<!-- Action -->
			<div class = "col-3">
				<a href = "{{ url('/home') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>

			<!-- Header -->
			<div class = "col-6">
				<h4 class = "text-center">School Year Manager</h4>
				<p class = "text-center">Manage school year monthly attendance counts and more</p>
			</div>

			<!-- Action -->
			<div class = "col-3">
				<a href = "{{ url('/years/create') }}">
					<button class = "button float-right" type = "button">Add</button>
				</a>
			</div>

		</div>
		<div class = "row">

			<!-- Subtitle -->
			<div class = "col-12">
				<hr>
				<h6 class = "text-center">Index</h6>
				<p class = "text-center">School Years</p>
				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Search -->
			<div class = "col">
				<label>
					<input
						name = "terms"
						type = "text"
						placeholder = "Search query"
						value = "{{ isset($terms) ? $terms : '' }}"
						style = "margin-right: 5px;"
					>
					<button class = "button-small" type = "submit" style = "margin-right: 5px;">Search</button>
					<a href = "{{ url('/years') }}">
						<button class = "button-small" type = "button">Clear</button>
					</a>
				</label>

				@if (isset($isSearched))

					@if(count($results) > 0)

						<br>
						<p class = "text-center">Found results for <b>{{ $terms }}</b></p>

					@else

						<br>
						<p class = "text-center">No results for <b>{{ $terms }}</b></p>

					@endif

					@php

						$years = $results;

					@endphp

				@endif

				<hr>
			</div>

		</div>
		<div class = "row">

			<!-- Index -->
			<div class = "col">
				<table class = "table">
					<tr>
						<th>School Year</th>
						<th>Action</th>
					</tr>

					@foreach ($years as $year)

						<tr>
							<td>{{ $year->year }}-{{ $year->year + 1 }}</td>
							<td class = "text-center">
								<a href = "{{ url('/years/edit', $year->id) }}">Edit</a>
							</td>
						</tr>

					@endforeach

				</table>
			</div>

		</div>
	</section>

</form>

@endsection