@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('head')

    <link href = "{{ asset('assets/less/students.less') }}" rel = "stylesheet" type = "text/less">
	<script src = "{{ asset('assets/js/chart.min.js') }}"></script>

@endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/students') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">Student Viewer</h4>
				<p class = "text-center">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</p>
			</div>
			<div class = "align-self-center col-4">
				<button class = "button float-right" type = "button" onclick = "window.print(); window.close();">Print</button>
			</div>
		</div>

		<!-- View -->
		<div class = "row">
			<div class = "col-12">
				<hr>
			</div>
			<div class = "col-12">

				<!-- Timestamp -->
				<b>Created on: </b>{{ $student->created_at->format('l jS \\of F Y') }}
				<br>
				<b>Edited on: </b>{{ $student->updated_at->format('l jS \\of F Y') }}
				<hr>

				<!-- Pills -->
				<div class = "container-pill">
					<ul class = "nav nav-fill nav-pills">
						<li class = "dropdown nav-item">
							<a class = "dropdown-toggle nav-link" data-bs-toggle = "dropdown">SF9 | Report Card</a>
							<ul class = "dropdown-menu">

								@foreach ($grades as $grade)

									<li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-{{ $grade->grade }}-front">Grade {{ $grade->grade }} | Front</li>
									<li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-{{ $grade->grade }}-back">Grade {{ $grade->grade }} | Back</li>

								@endforeach

							</ul>
						</li>
						<li class = "dropdown nav-item">
							<a class = "dropdown-toggle nav-link" data-bs-toggle = "dropdown">SF10 | Permanent Form</a>
							<ul class = "dropdown-menu">
								<li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf10-front">Front</li>
								<li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf10-back">Back</li>
							</ul>
						</li>
						<li class = "nav-item">
							<a class = "nav-link" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-stats">SF9 | Status Report</a>
						</li>
						<li class = "nav-item">
							<a class = "nav-link" data-bs-toggle = "tab" data-bs-target = "#tab-sf10-stats">SF10 | Status Report</a>
						</li>
					</ul>
					<div class = "tab-content" style = "min-height: 720px">

						@foreach ($grades as $grade)

							@php

								$debug = $grade->grade == '' ? 'active show' : '';

							@endphp

							<div id = "tab-sf9-{{ $grade->grade }}-front" class = "fade tab-pane">@include('layouts.students.sf9-front', ['student' => $student, 'grade' => $grade])</div>
							<div id = "tab-sf9-{{ $grade->grade }}-back" class = "fade tab-pane">@include('layouts.students.sf9-back', ['student' => $student, 'grade' => $grade])</div>

						@endforeach

						<div id = "tab-sf10-front" class = "fade tab-pane">@include('layouts.students.sf10-front', ['student' => $student])</div>
						<div id = "tab-sf10-back" class = "fade tab-pane">@include('layouts.students.sf10-back', ['student' => $student])</div>

						<div id = "tab-sf9-stats" class = "fade tab-pane">@include('layouts.students.stats', ['student' => $student, 'sf' => 9])</div>
						<div id = "tab-sf10-stats" class = "fade tab-pane">@include('layouts.students.stats', ['student' => $student, 'sf' => 10])</div>

					</div>
				</div>

			</div>
		</div>

	</section>

    <script src = "{{ asset('assets/js/students.js') }}"></script>

@endsection