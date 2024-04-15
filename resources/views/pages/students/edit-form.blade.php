@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('head')
    <link href = "{{ asset('assets/less/students.less') }}" rel = "stylesheet" type = "text/less">
@endsection
@section('content')
    <form action = "{{ url('/students/edit/form', $student->id) }}" method = "POST">
        @csrf
		<div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
						<div class = "subtitle">Editor | Forms | {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $student->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $student->updated_at->format('l jS \\of F Y') }}
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
				<div class = "col-12">
					<input class = "custom-button" type = "submit" value = "Update">
                    <button id = "highlight" class = "custom-button" type = "button" style = "margin-right: 5px;">Highlight Editable Fields</button>
				</div>
		    </div>
		</div>
        <div class = "container">
            <div class = "row">
                <div class = "col-12">
                    <br>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src = "{{ asset('assets/js/students.js') }}"></script>
@endsection