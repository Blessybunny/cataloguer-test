@extends('layouts.general.page')

@section('title')

Students

@endsection

@section('head')

<script src = "{{ asset('assets/js/chart.min.js') }}"></script>
<link href = "{{ asset('assets/less/students.less') }}" rel = "stylesheet" type = "text/less">

@endsection

@section('content')

<section class = "container">
    <div class = "row">

        <!-- Header -->
        <div class = "col-12">

            <br>
            <h6>{{ $student->info_lrn }}</h6>
            <h4>
                <span>{{ $student->info_name_last }},</span>
                <span>{{ $student->info_name_first }}</span>
                <span>{{ $student->info_name_middle }}</span>
                <span>{{ $student->info_name_suffix }}</span>
            </h4>
            <br>

        </div>

        <!-- Content -->
        <div id = "tabs" class = "col-12" style = "min-height: 720px">

            <ul class = "nav nav-fill nav-pills">
                <li class = "nav-item dropdown">
                    <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown">SF9 | Report Card</a>
                    <ul class = "dropdown-menu">
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-7-front">Grade 7 | Front</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-7-back">Grade 7 | Back</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-8-front">Grade 8 | Front</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-8-back">Grade 8 | Back</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-9-front">Grade 9 | Front</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-9-back">Grade 9 | Back</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-10-front">Grade 10 | Front</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf9-10-back">Grade 10 | Back</li>
                    </ul>
                </li>
                <li class = "nav-item dropdown">
                    <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown">SF10 | Permanent Form</a>
                    <ul class = "dropdown-menu">
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf10-front">Front</li>
                        <li class = "dropdown-item" data-bs-toggle = "tab" data-bs-target = "#tab-sf10-back">Back</li>
                    </ul>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" data-bs-toggle = "tab" data-bs-target = "#tab-stats">Statistics</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" data-property = "save" data-target = "form-submit">Save</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" onclick = "window.print(); window.close();">Print</a>
                </li>
            </ul>

            <div id = "print" class = "tab-content">
                <div id = "tab-sf9-7-front" class = "tab-pane fade">@include('layouts.students.sf9-front', ['student' => $student, 'grade' => 7])</div>
                <div id = "tab-sf9-7-back" class = "tab-pane fade">@include('layouts.students.sf9-back', ['student' => $student, 'grade' => 7])</div>
                <div id = "tab-sf9-8-front" class = "tab-pane fade">@include('layouts.students.sf9-front', ['student' => $student, 'grade' => 8])</div>
                <div id = "tab-sf9-8-back" class = "tab-pane fade">@include('layouts.students.sf9-back', ['student' => $student, 'grade' => 8])</div>
                <div id = "tab-sf9-9-front" class = "tab-pane fade">@include('layouts.students.sf9-front', ['student' => $student, 'grade' => 9])</div>
                <div id = "tab-sf9-9-back" class = "tab-pane fade">@include('layouts.students.sf9-back', ['student' => $student, 'grade' => 9])</div>
                <div id = "tab-sf9-10-front" class = "tab-pane fade">@include('layouts.students.sf9-front', ['student' => $student, 'grade' => 10])</div>
                <div id = "tab-sf9-10-back" class = "tab-pane fade">@include('layouts.students.sf9-back', ['student' => $student, 'grade' => 10])</div>
                <div id = "tab-sf10-front" class = "tab-pane fade">@include('layouts.students.sf10-front', ['student' => $student])</div>
                <div id = "tab-sf10-back" class = "tab-pane fade">@include('layouts.students.sf10-back', ['student' => $student])</div>
                <div id = "tab-sf10-back" class = "tab-pane fade">@include('layouts.students.sf10-back', ['student' => $student])</div>
                <div id = "tab-stats" class = "tab-pane fade show active">@include('layouts.students.stats', ['student' => $student])</div>
            </div>

            @include('layouts.students.form', ['student' => $student])

        </div>
        
    </div>
</section>

<script src = "{{ asset('assets/js/students.js') }}"></script>

@endsection