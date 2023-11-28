<!-- Form wrapper -->
<form>

    <!-- Prompt -->
    <div id = "prompt" class = "hidden">

        <h5>Prompt Window</h5>

        @for ($i = 7; $i <= 10; $i++)

            <!-- ALL -> Scholastic record -> subject -> filipino -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_fil_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Filipino {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_fil_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Filipino {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_fil_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Filipino {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_fil_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Filipino {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> english -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_eng_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: English {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_eng_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: English {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_eng_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: English {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_eng_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: English {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> mathematics -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_mat_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Mathematics {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_mat_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Mathematics {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_mat_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Mathematics {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_mat_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Mathematics {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> science -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_sci_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Science {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_sci_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Science {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_sci_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Science {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_sci_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Science {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> araling panlipunan (ap) -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_ap_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Araling Panlipunan (AP) {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_ap_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Araling Panlipunan (AP) {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_ap_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Araling Panlipunan (AP) {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_ap_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Araling Panlipunan (AP) {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> edukasyon sa pagpapakatao (ep) -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_ep_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_ep_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_ep_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_ep_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Edukasyon sa Pagpapakatao (EP) {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> technology and livelihood education (tle) -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_tle_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_tle_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_tle_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_tle_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: Technology and Livelihood Education (TLE) {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> music -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_mus_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Music {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_mus_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Music {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_mus_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Music {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_mus_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Music {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> arts -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_art_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Arts {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_art_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Arts {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_art_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Arts {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_art_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Arts {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> physical education -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_pe_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Physical Education {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_pe_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Physical Education {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_pe_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Physical Education {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_pe_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Physical Education {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- ALL -> Scholastic record -> subject -> health -->
            <div>
                <input
                    id = "ALL_g{{ $i }}_subject_hp_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Health {{ $i }}" data-label-2 = "1st Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_hp_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Health {{ $i }}" data-label-2 = "2nd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_hp_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Health {{ $i }}" data-label-2 = "3rd Quarter Rating"
                >
                <input
                    id = "ALL_g{{ $i }}_subject_hp_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Learning Area: MAPEH - Health {{ $i }}" data-label-2 = "4th Quarter Rating"
                >
            </div>

            <!-- SF9 -> attendance -> days present -->
            <div>
                <input
                    id = "SF9_g{{ $i }}_attendance_p_jan" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_jan'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "January"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_feb" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_feb'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "February"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_mar" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_mar'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "March"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_apr" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_apr'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "April"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_may" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_may'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "May"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_jun" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_jun'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "June"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_jul" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_jul'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "July"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_aug" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_aug'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "August"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_sep" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_sep'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "September"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_oct" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_oct'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "October"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_nov" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_nov'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "November"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_p_dec" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_dec'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Present" data-label-2 = "December"
                >
            </div>

            <!-- SF9 -> attendance -> days absent -->
            <div>
                <input
                    id = "SF9_g{{ $i }}_attendance_a_jan" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_jan'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "January"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_feb" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_feb'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "February"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_mar" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_mar'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "March"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_apr" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_apr'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "April"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_may" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_may'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "May"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_jun" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_jun'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "June"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_jul" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_jul'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "July"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_aug" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_aug'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "August"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_sep" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_sep'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "September"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_oct" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_oct'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "October"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_nov" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_nov'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "November"
                >
                <input
                    id = "SF9_g{{ $i }}_attendance_a_dec" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_dec'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Attendance: No. of Days Absent" data-label-2 = "December"
                >
            </div>

            <!-- SF9 -> observed values -> maka - diyos -->
            <div>
                <input
                    id = "SF9_g{{ $i }}_values_md_r1_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 1 | 1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r1_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r1_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r1_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 1 | 4th Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r2_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 2 | 1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r2_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r2_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_md_r2_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Diyos" data-label-2 = "Behavior Statement 2 | 4th Quarter Marking"
                >
            </div>

            <!-- SF9 -> observed values -> maka - tao -->
            <div>
                <input
                    id = "SF9_g{{ $i }}_values_mt_r1_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 1 | 1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r1_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r1_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r1_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 1 | 4th Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r2_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 2 | 1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r2_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r2_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mt_r2_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Tao" data-label-2 = "Behavior Statement 2 | 4th Quarter Marking"
                >
            </div>

            <!-- SF9 -> observed values -> maka - kalikasan -->
            <div>
                <input
                    id = "SF9_g{{ $i }}_values_mk_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Kalikasan" data-label-2 = "1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mk_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Kalikasan" data-label-2 = "2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mk_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Kalikasan" data-label-2 = "3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mk_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Kalikasan" data-label-2 = "4th Quarter Marking"
                >
            </div>

            <!-- SF9 -> observed values -> maka - bansa -->
            <div>
                <input
                    id = "SF9_g{{ $i }}_values_mb_r1_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 1 | 1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r1_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 1 | 2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r1_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 1 | 3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r1_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 1 | 4th Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r2_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr1'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 2 | 1st Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r2_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr2'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 2 | 2nd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r2_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr3'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 2 | 3rd Quarter Marking"
                >
                <input
                    id = "SF9_g{{ $i }}_values_mb_r2_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr4'} }}"
                    data-label-grade = "Grade {{ $i }}" data-label-1 = "Core Value: Maka - Bansa" data-label-2 = "Behavior Statement 2 | 4th Quarter Marking"
                >
            </div>

        @endfor

    </div>

</form>