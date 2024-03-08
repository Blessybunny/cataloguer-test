<div class = "container-fluid paper">
	<div class = "row">

        <!-- Variables -->
        <script>
            datasets = [];
            daysMin = 0;
            daysMax = 31;
            gradesMin = 50;
            gradesMax = 100;
        </script>

        @php

            $max_height = 200;

        @endphp

        @if ($sf == 9)

            <!-- Header -->
            <div class = "col-12">
                <h6 class = "heading">Attendance</h6>
            </div>

            <!-- Attendance -->
            @foreach ($grades as $grade)

                <div class = "col-6">
                    <div class = "border-all-light chart">
                        <h6 class = "text-center">Grade {{ $grade->grade }}</h6>

                        <div>
                            <canvas id = "sf{{ $sf }}_g{{ $grade->grade }}_attendance" style = "max-height: {{ $max_height }}px;"></canvas>
                        </div>

                        <script>
                            datasets = [];
                        </script>

                        <script>
                            new Chart(document.getElementById('sf{{ $sf }}_g{{ $grade->grade }}_attendance'), {
                                type: 'line',
                                data: {
                                    labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Sep'],
                                    datasets: [
                                        {
                                            label: 'Present',
                                            data: [
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_oct_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_nov_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_dec_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jan_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_feb_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_mar_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_apr_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_may_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jun_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jul_p'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_sep_p'} }},
                                            ],
                                            borderWidth: 1,
                                        },
                                        {
                                            label: 'Absent',
                                            data: [
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_oct_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_nov_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_dec_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jan_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_feb_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_mar_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_apr_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_may_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jun_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jul_a'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_sep_a'} }},
                                            ],
                                            borderWidth: 1,
                                        },
                                        {
                                            label: 'Total',
                                            data: [
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_oct_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_nov_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_dec_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jan_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_feb_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_mar_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_apr_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_may_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jun_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_jul_t'} }},
                                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_attendance_sep_t'} }},
                                            ],
                                            borderWidth: 1,
                                        },
                                    ],
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        y: { max: daysMax, min: daysMin, }
                                    },
                                },
                            });
                        </script>

                        <table class = "margin-bottom-0 table">
                            <tr>
                                <th>School Year</th>
                                <th>Total Days Present</th>
                                <th>Total Days Absent</th>
                                <th>Total Days</th>
                            </tr>
                            <tr>
                                <td class = "text-center">{{ $student->{'sf'.$sf.'_g'.$grade->grade.'_report_year'} }}</td>
                                <td class = "text-center" data-property = "total" data-targets = '[
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jan_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_feb_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_mar_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_apr_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_may_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jun_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jul_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_aug_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_sep_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_oct_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_nov_p",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_dec_p"
                                ]'></td>
                                <td class = "text-center" data-property = "total" data-targets = '[
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jan_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_feb_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_mar_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_apr_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_may_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jun_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jul_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_aug_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_sep_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_oct_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_nov_a",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_dec_a"
                                ]'></td>
                                <td class = "text-center" data-property = "total" data-targets = '[
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jan_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_feb_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_mar_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_apr_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_may_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jun_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_jul_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_aug_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_sep_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_oct_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_nov_t",
                                    "sf{{ $sf }}_g{{ $grade->grade }}_attendance_dec_t"
                                ]'></td>
                            </tr>
                        </table>
                    </div>

                    @if ($loop->iteration <= $loop->count / 2)

                        <br>

                    @endif

                </div>

            @endforeach

        @endif

        <!-- Header -->
        <div class = "col-12">
            <h6 class = "heading">Subjects</h6>
        </div>

        <!-- Subject -> filipino -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Filipino</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_fil" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_fil'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_fil'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_fil'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_fil'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_fil`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_fil",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_fil",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_fil",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_fil"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_fil",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_fil",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_fil",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_fil"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> english -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">English</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_eng" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_eng'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_eng'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_eng'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_eng'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_eng`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_eng",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_eng",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_eng",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_eng"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_eng",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_eng",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_eng",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_eng"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> mathematics -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Mathematics</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_mat" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_mat'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_mat'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_mat'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_mat'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_mat`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_mat",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_mat",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_mat",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_mat"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_mat",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_mat",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_mat",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_mat"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> science -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Science</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_sci" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_sci'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_sci'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_sci'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_sci'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_sci`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_sci",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_sci",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_sci",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_sci"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_sci",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_sci",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_sci",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_sci"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> araling panlipunan (ap) -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Araling Panlipunan (AP)</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_ap" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_ap'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_ap'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_ap'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_ap'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_ap`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_ap",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_ap",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_ap",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_ap"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_ap",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_ap",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_ap",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_ap"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> edukasyon sa pagpapakatao (ep) -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Edukasyon sa Pagpapakatao (EP)</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_ep" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_ep'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_ep'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_ep'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_ep'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_ep`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_ep",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_ep",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_ep",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_ep"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_ep",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_ep",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_ep",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_ep"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> technology and livelihood education (tle) -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Technology and Livelihood Education (TLE)</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_tle" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_tle'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_tle'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_tle'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_tle'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_tle`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_tle",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_tle",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_tle",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_tle"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_tle",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_tle",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_tle",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_tle"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> music -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH: Music</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_mus" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_mus'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_mus'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_mus'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_mus'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_mus`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_mus",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_mus",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_mus",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_mus"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_mus",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_mus",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_mus",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_mus"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> arts -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH: Arts</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_art" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_art'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_art'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_art'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_art'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_art`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_art",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_art",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_art",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_art"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_art",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_art",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_art",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_art"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> physical education -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH: Physical Education</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_pe" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_pe'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_pe'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_pe'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_pe'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_pe`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_pe",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_pe",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_pe",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_pe"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_pe",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_pe",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_pe",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_pe"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> health -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH: Health</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_hp" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_hp'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_hp'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_hp'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_hp'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_hp`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_hp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_hp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_hp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_hp"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_hp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_hp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_hp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_hp"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

        <!-- Subject -> nihongo -->
        <div class = "col-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Nihongo</h6>

                <div>
                    <canvas id = "sf{{ $sf }}_subject_jp" style = "max-height: {{ $max_height }}px;"></canvas>
                </div>

                <script>
                    datasets = [];
                </script>

                @foreach ($grades as $grade)

                    <script>
                        datasets.push({
                            label: 'Grade {{ $grade->grade }}',
                            data: [
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr1_jp'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr2_jp'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr3_jp'} }},
                                {{ $student->{'sf'.$sf.'_g'.$grade->grade.'_subject_qr4_jp'} }},
                            ],
                            borderWidth: 1,
                        });
                    </script>

                @endforeach

                <script>
                    new Chart(document.getElementById(`sf{{ $sf }}_subject_jp`), {
                        type: 'line',
                        data: {
                            labels: ['Quarter 1', 'Quarter 2', 'Quarter 3', 'Quarter 4'],
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: gradesMax, min: gradesMin, }
                            },
                        },
                    });
                </script>

                <table class = "margin-bottom-0 table">
                    <tr>
                        <th style = "width: 75px;">Grade</th>
                        <th style = "width: 150px;">Final Rating</th>
                        <th>Remarks</th>
                    </tr>

                    @foreach ($grades as $grade)

                        <tr>
                            <td class = "text-center">{{ $grade->grade }}</td>
                            <td class = "text-center" data-property = "average" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_jp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_jp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_jp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_jp"
                            ]'></td>
                            <td class = "text-center" data-property = "remarks" data-targets = '[
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr1_jp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr2_jp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr3_jp",
                                "sf{{ $sf }}_g{{ $grade->grade }}_subject_qr4_jp"
                            ]'></td>
                        </tr>

                    @endforeach

                </table>
            </div>
            <br>
        </div>

	</div>
</div>