@extends('layouts.page')

@section('title')
Student Viewer
@endsection

@section('content')

    <section id = "student-viewer" class = "container">
        <!-- General -->
<h1>Sonic the Hedgehog</h1>
<h4>25-1991-06</h4>

        <div class = "row">
            <!-- Tabs -->
            <ul class = "nav nav-fill nav-pills" role = "tablist">
                <li class = "nav-item" role = "presentation">
                    <button class = "nav-link active" id = "student-info-tab" data-bs-toggle = "tab" data-bs-target = "#student-info" type = "button" role = "tab" aria-controls = "student-info" aria-selected = "true">Student Information</button>
                </li>
                <li class = "nav-item" role = "presentation">
                    <button class = "nav-link" id = "grade-manager-tab" data-bs-toggle = "tab" data-bs-target = "#grade-manager-view" type = "button" role = "tab" aria-controls = "grade-manager" aria-selected = "true">Grade Manager</button>
                </li>
                <li class = "nav-item" role = "presentation">
                    <button class = "nav-link" id = "permanent-form-tab" data-bs-toggle = "tab" data-bs-target = "#permanent-form-view" type = "button" role = "tab" aria-controls = "permanent-form" aria-selected = "false">Permanent Form</button>
                </li>
                <li class = "nav-item" role = "presentation">
                    <button class = "nav-link" id = "grade-card-tab" data-bs-toggle = "tab" data-bs-target = "#grade-card-view" type = "button" role = "tab" aria-controls = "grade-card" aria-selected = "false">Grade Card</button>
                </li>
            </ul>

            <!-- Content -->
            <div class = "tab-content">
                <div class = "tab-pane fade show active" id = "student-info" role = "tabpanel" aria-labelledby = "student-info-tab">@include('layouts.student-info')</div>
                <div class = "tab-pane fade" id = "grade-manager-view" role = "tabpanel" aria-labelledby = "grade-manager-tab">ABC</div>
                <div class = "tab-pane fade" id = "permanent-form-view" role = "tabpanel" aria-labelledby = "permanent-form-tab">@include('layouts.permanent-form')</div>
                <div class = "tab-pane fade" id = "grade-card-view" role = "tabpanel" aria-labelledby = "grade-card-tab">@include('layouts.grade-card')</div>
            </div>
        </div>
    </section>

@endsection