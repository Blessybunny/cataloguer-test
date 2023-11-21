@extends('layouts.page')

@section('title')
Student Viewer
@endsection

@section('content')

    <main id = "main">
        <section id = "student-viewer" class = "container">
            <div class = "row">
                <div class = "col" style = "min-height: 300px">
                    <!-- Header -->
                    <h1>Sonic the Hedgehog</h1>
                    <h4>25-1991-06</h4>

                    <ul>
                        <li>Split permanent form into front and back pages</li>
                        <li>Study variable jumping to layouts here: https://stackoverflow.com/questions/16118104/how-do-i-pass-a-variable-to-the-layout-using-laravel-blade-templating</li>
                        <hr>
                        <li>Fix round logo dimensions to 200px x 200px</li>
                        <li>Fix irisan logo into transparent png format</li>
                        <li>Downscale dep-ed logo to 200px height</li>
                        <li>Compress all png images</li>
                    </ul>
                    <!-- Tabs -->
                    <ul class = "nav nav-fill nav-pills" role = "tablist">
                        <!-- General -->
                        <li class = "nav-item" role = "presentation">
                            <button
                                class = "nav-link active"
                                id = "tab-student-info"
                                data-bs-toggle = "tab"
                                data-bs-target = "#view-student-info"
                                type = "button"
                                role = "tab"
                                aria-controls = "view-student-info"
                                aria-selected = "true">
                                Student Information
                            </button>
                        </li>

                        <!-- Manager -->
                        <li class = "nav-item" role = "presentation">
                            <button
                                class = "nav-link"
                                id = "tab-grade-manager"
                                data-bs-toggle = "tab"
                                data-bs-target = "#view-grade-manager"
                                type = "button"
                                role = "tab"
                                aria-controls = "view-grade-manager"
                                aria-selected = "true">
                                Grade Manager
                            </button>
                        </li>

                        <!-- Report cards -->
                        <li class = "nav-item dropdown" role = "presentation">
                            <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown" role = "button" aria-expanded = "false">SF9 | Report Card</a>
                            <ul class = "dropdown-menu">
                                <!-- CLEAN: 7 -->
                                <li>
                                    <button
                                        class = "dropdown-item"
                                        id = "tab-report-card-7-front"
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
                                        class = "dropdown-item"
                                        id = "tab-report-card-7-back"
                                        data-bs-toggle = "tab"
                                        data-bs-target = "#view-report-card-7-back"
                                        type = "button"
                                        role = "tab"
                                        aria-controls = "view-report-card-7-back"
                                        aria-selected = "false">
                                        Grade 7 | Back
                                    </button>
                                </li>

                                <!-- CLEAN: 8 -->
                                <hr>
                                <li>
                                    <button
                                        class = "dropdown-item"
                                        id = "tab-report-card-8-front"
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
                                        class = "dropdown-item"
                                        id = "tab-report-card-8-back"
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
                                <li><button class = "dropdown-item" href = "#">Grade 9 | Front</button></li>
                                <li><button class = "dropdown-item" href = "#">Grade 9 | Back</button></li>

                                <!-- 10 -->
                                <hr>
                                <li><button class = "dropdown-item" href = "#">Grade 10 | Front</button></li>
                                <li><button class = "dropdown-item" href = "#">Grade 10 | Back</button></li>
                            </ul>
                        </li>

                        <!-- CLEAN: Permanent Form -->
                        <li class = "nav-item" role = "presentation">
                            <button
                                class = "nav-link"
                                id = "tab-permanent-form"
                                data-bs-toggle = "tab"
                                data-bs-target = "#view-permanent-form"
                                type = "button"
                                role = "tab"
                                aria-controls = "view-permanent-form"
                                aria-selected = "false">
                                SF10 | Permanent Form (wip)
                            </button>
                        </li>
                    </ul>

                    <!-- Content -->
                    <div class = "tab-content">
                        <!-- General - show active -->
                        <div
                            class = "tab-pane fade"
                            id = "view-student-info"
                            role = "tabpanel"
                            aria-labelledby = "tab-student-info">
                            @include('layouts.student-info')
                        </div>

                        <!-- Manager -->
                        <div
                            class = "tab-pane fade"
                            id = "view-grade-manager"
                            role = "tabpanel"
                            aria-labelledby = "tab-grade-manager">
                        </div>

                        <!-- CLEAN: Report card 7 -->
                        <div
                            class = "tab-pane fade"
                            id = "view-report-card-7-front"
                            role = "tabpanel"
                            aria-labelledby = "tab-report-card-7-front">
                            @include('layouts.report-card-7-front')
                        </div>
                        <div
                            class = "tab-pane fade show active"
                            id = "view-report-card-7-back"
                            role = "tabpanel"
                            aria-labelledby = "tab-report-card-7-back">
                            @include('layouts.report-card-7-back')
                        </div>

                        <!-- CLEAN: Report card 8 -->
                        <div
                            class = "tab-pane fade"
                            id = "view-report-card-8-front"
                            role = "tabpanel"
                            aria-labelledby = "tab-report-card-8-front">
                            @include('layouts.report-card-8-front')
                        </div>
                        <div
                            class = "tab-pane fade"
                            id = "view-report-card-8-back"
                            role = "tabpanel"
                            aria-labelledby = "tab-report-card-8-back">
                            @include('layouts.report-card-8-back')
                        </div>

                        <!-- CLEAN: Permanent Form -->
                        <div
                            class = "tab-pane fade"
                            id = "view-permanent-form"
                            role = "tabpanel"
                            aria-labelledby = "tab-permanent-form">
                            @include('layouts.permanent-form')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection