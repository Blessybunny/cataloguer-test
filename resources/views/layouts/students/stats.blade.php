<section class = "container">
	<div class = "row">

        <!-- Header -->
        <div class = "col-12">
            <h4 class = "margin-0 text-center">Attendances</h4>
            <span class = "text-center">(Form changes must be saved to update statistics)</span>
            <br>
        </div>
        
        <!-- [03 - SF9] Attendance -> present -->
        <div class = "col-lg-12">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Presence</h6>
                <div>
                    <canvas id = "chart-attendance-p" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-attendance-p'), {
                        type: 'line',
                        data: {
                            labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Sep'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'attendance_g7_p_oct'} }},
                                    {{ $student->{'attendance_g7_p_nov'} }},
                                    {{ $student->{'attendance_g7_p_dec'} }},
                                    {{ $student->{'attendance_g7_p_jan'} }},
                                    {{ $student->{'attendance_g7_p_feb'} }},
                                    {{ $student->{'attendance_g7_p_mar'} }},
                                    {{ $student->{'attendance_g7_p_apr'} }},
                                    {{ $student->{'attendance_g7_p_may'} }},
                                    {{ $student->{'attendance_g7_p_jun'} }},
                                    {{ $student->{'attendance_g7_p_jul'} }},
                                    {{ $student->{'attendance_g7_p_aug'} }},
                                    {{ $student->{'attendance_g7_p_sep'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'attendance_g8_p_oct'} }},
                                    {{ $student->{'attendance_g8_p_nov'} }},
                                    {{ $student->{'attendance_g8_p_dec'} }},
                                    {{ $student->{'attendance_g8_p_jan'} }},
                                    {{ $student->{'attendance_g8_p_feb'} }},
                                    {{ $student->{'attendance_g8_p_mar'} }},
                                    {{ $student->{'attendance_g8_p_apr'} }},
                                    {{ $student->{'attendance_g8_p_may'} }},
                                    {{ $student->{'attendance_g8_p_jun'} }},
                                    {{ $student->{'attendance_g8_p_jul'} }},
                                    {{ $student->{'attendance_g8_p_aug'} }},
                                    {{ $student->{'attendance_g8_p_sep'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'attendance_g9_p_oct'} }},
                                    {{ $student->{'attendance_g9_p_nov'} }},
                                    {{ $student->{'attendance_g9_p_dec'} }},
                                    {{ $student->{'attendance_g9_p_jan'} }},
                                    {{ $student->{'attendance_g9_p_feb'} }},
                                    {{ $student->{'attendance_g9_p_mar'} }},
                                    {{ $student->{'attendance_g9_p_apr'} }},
                                    {{ $student->{'attendance_g9_p_may'} }},
                                    {{ $student->{'attendance_g9_p_jun'} }},
                                    {{ $student->{'attendance_g9_p_jul'} }},
                                    {{ $student->{'attendance_g9_p_aug'} }},
                                    {{ $student->{'attendance_g9_p_sep'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'attendance_g10_p_oct'} }},
                                    {{ $student->{'attendance_g10_p_nov'} }},
                                    {{ $student->{'attendance_g10_p_dec'} }},
                                    {{ $student->{'attendance_g10_p_jan'} }},
                                    {{ $student->{'attendance_g10_p_feb'} }},
                                    {{ $student->{'attendance_g10_p_mar'} }},
                                    {{ $student->{'attendance_g10_p_apr'} }},
                                    {{ $student->{'attendance_g10_p_may'} }},
                                    {{ $student->{'attendance_g10_p_jun'} }},
                                    {{ $student->{'attendance_g10_p_jul'} }},
                                    {{ $student->{'attendance_g10_p_aug'} }},
                                    {{ $student->{'attendance_g10_p_sep'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { max: 31, min: 0, }
                            },
                        },
                    });
                </script>
            </div>
        </div>
        
        <!-- [04 - SF9] Attendance -> absent -->
        <div class = "col-lg-12">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Absence</h6>
                <div>
                    <canvas id = "chart-attendance-a" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-attendance-a'), {
                        type: 'line',
                        data: {
                            labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Sep'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'attendance_g7_a_oct'} }},
                                    {{ $student->{'attendance_g7_a_nov'} }},
                                    {{ $student->{'attendance_g7_a_dec'} }},
                                    {{ $student->{'attendance_g7_a_jan'} }},
                                    {{ $student->{'attendance_g7_a_feb'} }},
                                    {{ $student->{'attendance_g7_a_mar'} }},
                                    {{ $student->{'attendance_g7_a_apr'} }},
                                    {{ $student->{'attendance_g7_a_may'} }},
                                    {{ $student->{'attendance_g7_a_jun'} }},
                                    {{ $student->{'attendance_g7_a_jul'} }},
                                    {{ $student->{'attendance_g7_a_aug'} }},
                                    {{ $student->{'attendance_g7_a_sep'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'attendance_g8_a_oct'} }},
                                    {{ $student->{'attendance_g8_a_nov'} }},
                                    {{ $student->{'attendance_g8_a_dec'} }},
                                    {{ $student->{'attendance_g8_a_jan'} }},
                                    {{ $student->{'attendance_g8_a_feb'} }},
                                    {{ $student->{'attendance_g8_a_mar'} }},
                                    {{ $student->{'attendance_g8_a_apr'} }},
                                    {{ $student->{'attendance_g8_a_may'} }},
                                    {{ $student->{'attendance_g8_a_jun'} }},
                                    {{ $student->{'attendance_g8_a_jul'} }},
                                    {{ $student->{'attendance_g8_a_aug'} }},
                                    {{ $student->{'attendance_g8_a_sep'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'attendance_g9_a_oct'} }},
                                    {{ $student->{'attendance_g9_a_nov'} }},
                                    {{ $student->{'attendance_g9_a_dec'} }},
                                    {{ $student->{'attendance_g9_a_jan'} }},
                                    {{ $student->{'attendance_g9_a_feb'} }},
                                    {{ $student->{'attendance_g9_a_mar'} }},
                                    {{ $student->{'attendance_g9_a_apr'} }},
                                    {{ $student->{'attendance_g9_a_may'} }},
                                    {{ $student->{'attendance_g9_a_jun'} }},
                                    {{ $student->{'attendance_g9_a_jul'} }},
                                    {{ $student->{'attendance_g9_a_aug'} }},
                                    {{ $student->{'attendance_g9_a_sep'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'attendance_g10_a_oct'} }},
                                    {{ $student->{'attendance_g10_a_nov'} }},
                                    {{ $student->{'attendance_g10_a_dec'} }},
                                    {{ $student->{'attendance_g10_a_jan'} }},
                                    {{ $student->{'attendance_g10_a_feb'} }},
                                    {{ $student->{'attendance_g10_a_mar'} }},
                                    {{ $student->{'attendance_g10_a_apr'} }},
                                    {{ $student->{'attendance_g10_a_may'} }},
                                    {{ $student->{'attendance_g10_a_jun'} }},
                                    {{ $student->{'attendance_g10_a_jul'} }},
                                    {{ $student->{'attendance_g10_a_aug'} }},
                                    {{ $student->{'attendance_g10_a_sep'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { max: 31, min: 0, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- Header -->
        <div class = "col-12">
            <br>
            <h4 class = "margin-0 text-center">Learning Areas</h4>
            <span class = "text-center">(Form changes must be saved to update statistics)</span>
            <br>
        </div>

        <!-- [11 - ALL] Subject -> filipino -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Filipino</h6>
                <div>
                    <canvas id = "chart-subject-fil" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-fil'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_fil_qr1'} }},
                                    {{ $student->{'subject_g7_fil_qr2'} }},
                                    {{ $student->{'subject_g7_fil_qr3'} }},
                                    {{ $student->{'subject_g7_fil_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_fil_qr1'} }},
                                    {{ $student->{'subject_g8_fil_qr2'} }},
                                    {{ $student->{'subject_g8_fil_qr3'} }},
                                    {{ $student->{'subject_g8_fil_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_fil_qr1'} }},
                                    {{ $student->{'subject_g9_fil_qr2'} }},
                                    {{ $student->{'subject_g9_fil_qr3'} }},
                                    {{ $student->{'subject_g9_fil_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_fil_qr1'} }},
                                    {{ $student->{'subject_g10_fil_qr2'} }},
                                    {{ $student->{'subject_g10_fil_qr3'} }},
                                    {{ $student->{'subject_g10_fil_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [12 - ALL] Subject -> english -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">English</h6>
                <div>
                    <canvas id = "chart-subject-eng" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-eng'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_eng_qr1'} }},
                                    {{ $student->{'subject_g7_eng_qr2'} }},
                                    {{ $student->{'subject_g7_eng_qr3'} }},
                                    {{ $student->{'subject_g7_eng_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_eng_qr1'} }},
                                    {{ $student->{'subject_g8_eng_qr2'} }},
                                    {{ $student->{'subject_g8_eng_qr3'} }},
                                    {{ $student->{'subject_g8_eng_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_eng_qr1'} }},
                                    {{ $student->{'subject_g9_eng_qr2'} }},
                                    {{ $student->{'subject_g9_eng_qr3'} }},
                                    {{ $student->{'subject_g9_eng_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_eng_qr1'} }},
                                    {{ $student->{'subject_g10_eng_qr2'} }},
                                    {{ $student->{'subject_g10_eng_qr3'} }},
                                    {{ $student->{'subject_g10_eng_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [13 - ALL] Subject -> mathematics -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Mathematics</h6>
                <div>
                    <canvas id = "chart-subject-mat" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-mat'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_mat_qr1'} }},
                                    {{ $student->{'subject_g7_mat_qr2'} }},
                                    {{ $student->{'subject_g7_mat_qr3'} }},
                                    {{ $student->{'subject_g7_mat_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_mat_qr1'} }},
                                    {{ $student->{'subject_g8_mat_qr2'} }},
                                    {{ $student->{'subject_g8_mat_qr3'} }},
                                    {{ $student->{'subject_g8_mat_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_mat_qr1'} }},
                                    {{ $student->{'subject_g9_mat_qr2'} }},
                                    {{ $student->{'subject_g9_mat_qr3'} }},
                                    {{ $student->{'subject_g9_mat_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_mat_qr1'} }},
                                    {{ $student->{'subject_g10_mat_qr2'} }},
                                    {{ $student->{'subject_g10_mat_qr3'} }},
                                    {{ $student->{'subject_g10_mat_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [14 - ALL] Subject -> science -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Science</h6>
                <div>
                    <canvas id = "chart-subject-sci" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-sci'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_sci_qr1'} }},
                                    {{ $student->{'subject_g7_sci_qr2'} }},
                                    {{ $student->{'subject_g7_sci_qr3'} }},
                                    {{ $student->{'subject_g7_sci_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_sci_qr1'} }},
                                    {{ $student->{'subject_g8_sci_qr2'} }},
                                    {{ $student->{'subject_g8_sci_qr3'} }},
                                    {{ $student->{'subject_g8_sci_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_sci_qr1'} }},
                                    {{ $student->{'subject_g9_sci_qr2'} }},
                                    {{ $student->{'subject_g9_sci_qr3'} }},
                                    {{ $student->{'subject_g9_sci_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_sci_qr1'} }},
                                    {{ $student->{'subject_g10_sci_qr2'} }},
                                    {{ $student->{'subject_g10_sci_qr3'} }},
                                    {{ $student->{'subject_g10_sci_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [15 - ALL] Subject -> araling panlipunan (ap) -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Araling Panlipunan (AP)</h6>
                <div>
                    <canvas id = "chart-subject-ap" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-ap'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_ap_qr1'} }},
                                    {{ $student->{'subject_g7_ap_qr2'} }},
                                    {{ $student->{'subject_g7_ap_qr3'} }},
                                    {{ $student->{'subject_g7_ap_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_ap_qr1'} }},
                                    {{ $student->{'subject_g8_ap_qr2'} }},
                                    {{ $student->{'subject_g8_ap_qr3'} }},
                                    {{ $student->{'subject_g8_ap_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_ap_qr1'} }},
                                    {{ $student->{'subject_g9_ap_qr2'} }},
                                    {{ $student->{'subject_g9_ap_qr3'} }},
                                    {{ $student->{'subject_g9_ap_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_ap_qr1'} }},
                                    {{ $student->{'subject_g10_ap_qr2'} }},
                                    {{ $student->{'subject_g10_ap_qr3'} }},
                                    {{ $student->{'subject_g10_ap_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [16 - ALL] Subject -> edukasyon sa pagpapakatao (ep) -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Edukasyon sa Pagpapakatao (EP)</h6>
                <div>
                    <canvas id = "chart-subject-ep" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-ep'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_ep_qr1'} }},
                                    {{ $student->{'subject_g7_ep_qr2'} }},
                                    {{ $student->{'subject_g7_ep_qr3'} }},
                                    {{ $student->{'subject_g7_ep_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_ep_qr1'} }},
                                    {{ $student->{'subject_g8_ep_qr2'} }},
                                    {{ $student->{'subject_g8_ep_qr3'} }},
                                    {{ $student->{'subject_g8_ep_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_ep_qr1'} }},
                                    {{ $student->{'subject_g9_ep_qr2'} }},
                                    {{ $student->{'subject_g9_ep_qr3'} }},
                                    {{ $student->{'subject_g9_ep_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_ep_qr1'} }},
                                    {{ $student->{'subject_g10_ep_qr2'} }},
                                    {{ $student->{'subject_g10_ep_qr3'} }},
                                    {{ $student->{'subject_g10_ep_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [17 - ALL] Subject -> technology and livelihood education (tle) -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">Technology and Livelihood Education (TLE)</h6>
                <div>
                    <canvas id = "chart-subject-tle" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-tle'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_tle_qr1'} }},
                                    {{ $student->{'subject_g7_tle_qr2'} }},
                                    {{ $student->{'subject_g7_tle_qr3'} }},
                                    {{ $student->{'subject_g7_tle_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_tle_qr1'} }},
                                    {{ $student->{'subject_g8_tle_qr2'} }},
                                    {{ $student->{'subject_g8_tle_qr3'} }},
                                    {{ $student->{'subject_g8_tle_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_tle_qr1'} }},
                                    {{ $student->{'subject_g9_tle_qr2'} }},
                                    {{ $student->{'subject_g9_tle_qr3'} }},
                                    {{ $student->{'subject_g9_tle_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_tle_qr1'} }},
                                    {{ $student->{'subject_g10_tle_qr2'} }},
                                    {{ $student->{'subject_g10_tle_qr3'} }},
                                    {{ $student->{'subject_g10_tle_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [18 - ALL] Subject -> music -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH | Music</h6>
                <div>
                    <canvas id = "chart-subject-mus" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-mus'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_mus_qr1'} }},
                                    {{ $student->{'subject_g7_mus_qr2'} }},
                                    {{ $student->{'subject_g7_mus_qr3'} }},
                                    {{ $student->{'subject_g7_mus_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_mus_qr1'} }},
                                    {{ $student->{'subject_g8_mus_qr2'} }},
                                    {{ $student->{'subject_g8_mus_qr3'} }},
                                    {{ $student->{'subject_g8_mus_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_mus_qr1'} }},
                                    {{ $student->{'subject_g9_mus_qr2'} }},
                                    {{ $student->{'subject_g9_mus_qr3'} }},
                                    {{ $student->{'subject_g9_mus_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_mus_qr1'} }},
                                    {{ $student->{'subject_g10_mus_qr2'} }},
                                    {{ $student->{'subject_g10_mus_qr3'} }},
                                    {{ $student->{'subject_g10_mus_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [19 - ALL] Subject -> arts -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH | Arts</h6>
                <div>
                    <canvas id = "chart-subject-art" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-art'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_art_qr1'} }},
                                    {{ $student->{'subject_g7_art_qr2'} }},
                                    {{ $student->{'subject_g7_art_qr3'} }},
                                    {{ $student->{'subject_g7_art_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_art_qr1'} }},
                                    {{ $student->{'subject_g8_art_qr2'} }},
                                    {{ $student->{'subject_g8_art_qr3'} }},
                                    {{ $student->{'subject_g8_art_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_art_qr1'} }},
                                    {{ $student->{'subject_g9_art_qr2'} }},
                                    {{ $student->{'subject_g9_art_qr3'} }},
                                    {{ $student->{'subject_g9_art_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_art_qr1'} }},
                                    {{ $student->{'subject_g10_art_qr2'} }},
                                    {{ $student->{'subject_g10_art_qr3'} }},
                                    {{ $student->{'subject_g10_art_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [20 - ALL] Subject -> physical education -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH | Physical Education</h6>
                <div>
                    <canvas id = "chart-subject-pe" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-pe'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_pe_qr1'} }},
                                    {{ $student->{'subject_g7_pe_qr2'} }},
                                    {{ $student->{'subject_g7_pe_qr3'} }},
                                    {{ $student->{'subject_g7_pe_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_pe_qr1'} }},
                                    {{ $student->{'subject_g8_pe_qr2'} }},
                                    {{ $student->{'subject_g8_pe_qr3'} }},
                                    {{ $student->{'subject_g8_pe_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_pe_qr1'} }},
                                    {{ $student->{'subject_g9_pe_qr2'} }},
                                    {{ $student->{'subject_g9_pe_qr3'} }},
                                    {{ $student->{'subject_g9_pe_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_pe_qr1'} }},
                                    {{ $student->{'subject_g10_pe_qr2'} }},
                                    {{ $student->{'subject_g10_pe_qr3'} }},
                                    {{ $student->{'subject_g10_pe_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

        <!-- [20 - ALL] Subject -> health -->
        <div class = "col-lg-6">
            <div class = "border-all-light chart">
                <h6 class = "text-center">MAPEH | Health</h6>
                <div>
                    <canvas id = "chart-subject-hp" style = "height: 200px;"></canvas>
                </div>
                <script>
                    new Chart(document.getElementById('chart-subject-hp'), {
                        type: 'line',
                        data: {
                            labels: ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'],
                            datasets: [{
                                label: 'Grade 7',
                                data: [
                                    {{ $student->{'subject_g7_hp_qr1'} }},
                                    {{ $student->{'subject_g7_hp_qr2'} }},
                                    {{ $student->{'subject_g7_hp_qr3'} }},
                                    {{ $student->{'subject_g7_hp_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 8',
                                data: [
                                    {{ $student->{'subject_g8_hp_qr1'} }},
                                    {{ $student->{'subject_g8_hp_qr2'} }},
                                    {{ $student->{'subject_g8_hp_qr3'} }},
                                    {{ $student->{'subject_g8_hp_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 9',
                                data: [
                                    {{ $student->{'subject_g9_hp_qr1'} }},
                                    {{ $student->{'subject_g9_hp_qr2'} }},
                                    {{ $student->{'subject_g9_hp_qr3'} }},
                                    {{ $student->{'subject_g9_hp_qr4'} }},
                                ],
                                borderWidth: 1,
                            }, {
                                label: 'Grade 10',
                                data: [
                                    {{ $student->{'subject_g10_hp_qr1'} }},
                                    {{ $student->{'subject_g10_hp_qr2'} }},
                                    {{ $student->{'subject_g10_hp_qr3'} }},
                                    {{ $student->{'subject_g10_hp_qr4'} }},
                                ],
                                borderWidth: 1,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: { min: 50, }
                            },
                        },
                    });
                </script>
            </div>
        </div>

	</div>
</section>