@extends('layouts.general.page')

@section('title')
Manager
@endsection

@section('content')

    <section id = "manager" class = "container">
        <div class = "row">
            <div class = "col-12" style = "min-height: 500px">

                <!-- Header -->
                <h1>
                    <span>{{ $student->li_name_last }},</span>
                    <span class = "capitalize">{{ $student->li_name_first }} {{ $student->li_name_middle }}.</span>
                </h1>
                <h4>01-0001-{{ $student->id }}</h4>

                <p>Select a paper to edit.</p>

                <p>TO-DO: Compute a certain grade's age based on the school year's end relative to the birthdate.</p>
                <p>TO-DO: Create a more unique id for scholastic records to not conflict between other forms/cards.</p>
                <p>TO-DO: Create a new table with corresponding school years to make a global access for no. of days.</p>
                
                <hr>

                <p>CHECKPOINT: work on prompt.</p>

                <!-- Tabs -->
                <ul class = "nav nav-fill nav-pills" role = "tablist">

                    <!-- Report cards -->
                    <li class = "nav-item dropdown" role = "presentation">
                        <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown" role = "button" aria-expanded = "false">SF9 | Report Card</a>
                        <ul class = "dropdown-menu">

                            <!-- 7 -->
                            <li>
                                <button
                                    id = "tab-report-card-7-front"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-7-front"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-7-front"
                                    aria-selected = "false">
                                    Grade 7 | Front
                                </button>
                            </li>
                            <li>
                                <button
                                    id = "tab-report-card-7-back"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-7-back"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-7-back"
                                    aria-selected = "false">
                                    Grade 7 | Back
                                </button>
                            </li>

                            <!-- 8 -->
                            <hr>
                            <li>
                                <button
                                    id = "tab-report-card-8-front"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-8-front"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-8-front"
                                    aria-selected = "false">
                                    Grade 8 | Front
                                </button>
                            </li>
                            <li>
                                <button
                                    id = "tab-report-card-8-back"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-8-back"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-8-back"
                                    aria-selected = "false">
                                    Grade 8 | Back
                                </button>
                            </li>

                            <!-- 9 -->
                            <hr>
                            <li>
                                <button
                                    id = "tab-report-card-9-front"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-9-front"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-9-front"
                                    aria-selected = "false">
                                    Grade 9 | Front
                                </button>
                            </li>
                            <li>
                                <button
                                    id = "tab-report-card-9-back"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-9-back"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-9-back"
                                    aria-selected = "false">
                                    Grade 9 | Back
                                </button>
                            </li>

                            <!-- 10 -->
                            <hr>
                            <li>
                                <button
                                    id = "tab-report-card-10-front"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-10-front"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-10-front"
                                    aria-selected = "false">
                                    Grade 10 | Front
                                </button>
                            </li>
                            <li>
                                <button
                                    id = "tab-report-card-10-back"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-report-card-10-back"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-report-card-10-back"
                                    aria-selected = "false">
                                    Grade 10 | Back
                                </button>
                            </li>

                        </ul>
                    </li>
                    
                    <!-- Permanent Form -->
                    <li class = "nav-item dropdown" role = "presentation">
                        <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown" role = "button" aria-expanded = "false">SF10 | Permanent Form</a>
                        <ul class = "dropdown-menu">
                            <li>
                                <button
                                    id = "tab-permanent-form-front"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-permanent-form-front"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-permanent-form-front"
                                    aria-selected = "false">
                                    Front
                                </button>
                            </li>
                            <li>
                                <button
                                    id = "tab-permanent-form-back"
                                    class = "dropdown-item"
                                    data-bs-toggle = "tab"
                                    data-bs-target = "#view-permanent-form-back"
                                    type = "button"
                                    role = "tab"
                                    aria-controls = "view-permanent-form-back"
                                    aria-selected = "false">
                                    Back
                                </button>
                            </li>
                        </ul>
                    </li>

                </ul>

                <!-- Content -->
                <div class = "tab-content">

                    <!-- Report card 7 -->
                    <div
                        id = "view-report-card-7-front"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-7-front">
                        @include('layouts.manager.sf9-front', ['student' => $student, 'grade' => 7])
                    </div>
                    <div
                        id = "view-report-card-7-back"
                        class = "tab-pane fade show active"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-7-back">
                        @include('layouts.manager.sf9-back', ['student' => $student, 'grade' => 7])
                    </div>

                    <!-- Report card 8 -->
                    <div
                        id = "view-report-card-8-front"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-8-front">
                        @include('layouts.manager.sf9-front', ['student' => $student, 'grade' => 8])
                    </div>
                    <div
                        id = "view-report-card-8-back"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-8-back">
                        @include('layouts.manager.sf9-back', ['student' => $student, 'grade' => 8])
                    </div>

                    <!-- Report card 9 -->
                    <div
                        id = "view-report-card-9-front"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-9-front">
                        @include('layouts.manager.sf9-front', ['student' => $student, 'grade' => 9])
                    </div>
                    <div
                        id = "view-report-card-9-back"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-9-back">
                        @include('layouts.manager.sf9-back', ['student' => $student, 'grade' => 9])
                    </div>

                    <!-- Report card 10 -->
                    <div
                        id = "view-report-card-10-front"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-10-front">
                        @include('layouts.manager.sf9-front', ['student' => $student, 'grade' => 10])
                    </div>
                    <div
                        id = "view-report-card-10-back"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-report-card-10-back">
                        @include('layouts.manager.sf9-back', ['student' => $student, 'grade' => 10])
                    </div>

                    <!-- Permanent form -->
                    <div
                        id = "view-permanent-form-front"
                        class = "tab-pane fade show active"
                        role = "tabpanel"
                        aria-labelledby = "tab-permanent-form-front">
                        @include('layouts.manager.sf10-front', ['student' => $student])
                    </div>
                    <div
                        id = "view-permanent-form-back"
                        class = "tab-pane fade"
                        role = "tabpanel"
                        aria-labelledby = "tab-permanent-form-back">
                        @include('layouts.manager.sf10-back', ['student' => $student])
                    </div>

                </div>

                <!-- Form -->
                @include('layouts.form', ['student' => $student])

            </div>
        </div>
    </section>

    <script src = "{{ asset('assets/js/manager.js') }}"></script>

@endsection