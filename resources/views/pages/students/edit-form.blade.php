@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('head')

    <link href = "{{ asset('assets/less/students.less') }}" rel = "stylesheet" type = "text/less">

@endsection

@section('content')

    <form action = "{{ url('/students/edit/form', $student->id) }}" method = "POST">

        @csrf

        <section class = "container">
            <div class = "row">

                <!-- Action -->
                <div class = "col">
                    <a href = "{{ url('/students') }}">
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
                    <input class = "button float-right" type = "submit" value = "Save">
                    <button class = "button float-right" type = "button" onclick = "window.print(); window.close();" style = "margin-right: 5px;">Print</button>
                </div>

            </div>
            <div class = "row">

                <!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Edit</h6>
					<p class = "text-center">{{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}</p>
					<hr>
				</div>

            </div>
            <div class = "row">

                <!-- Edit -->
                <div class = "col">
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

                                <div id = "tab-sf9-{{ $grade->grade }}-front" class = "{{ $debug }} fade tab-pane">@include('layouts.students.sf9-front', ['student' => $student, 'grade' => $grade])</div>
                                <div id = "tab-sf9-{{ $grade->grade }}-back" class = "fade tab-pane">@include('layouts.students.sf9-back', ['student' => $student, 'grade' => $grade])</div>

                            @endforeach

                            <div id = "tab-sf10-front" class = "fade tab-pane">@include('layouts.students.sf10-front', ['student' => $student])</div>
                            <div id = "tab-sf10-back" class = "fade tab-pane">@include('layouts.students.sf10-back', ['student' => $student])</div>

                        </div>
                    </div>
                </div>
            
            </div>
        </section>

    </form>

    <script src = "{{ asset('assets/js/students.js') }}"></script>

@endsection