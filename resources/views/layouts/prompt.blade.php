<!-- Form wrapper -->
<form>

    <!-- Prompt -->
    <div id = "prompt" class = "hidden">

        <h5>Prompt Window</h5>

        @for ($i = 7; $i <= 10; $i++)

            <!-- ALL -> Scholastic record -> subject -> filipino -->
            <input id = "ALL_g{{ $i }}_subject_fil_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_fil_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_fil_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_fil_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_fil_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> english -->
            <input id = "ALL_g{{ $i }}_subject_eng_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_eng_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_eng_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_eng_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_eng_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> mathematics -->
            <input id = "ALL_g{{ $i }}_subject_mat_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_mat_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_mat_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_mat_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mat_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> science -->
            <input id = "ALL_g{{ $i }}_subject_sci_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_sci_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_sci_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_sci_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_sci_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> araling panlipunan (ap) -->
            <input id = "ALL_g{{ $i }}_subject_ap_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_ap_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_ap_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_ap_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ap_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> edukasyon pagpapakatao (ep) -->
            <input id = "ALL_g{{ $i }}_subject_ep_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_ep_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_ep_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_ep_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_ep_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> technology and livelihood education (tle) -->
            <input id = "ALL_g{{ $i }}_subject_tle_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_tle_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_tle_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_tle_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_tle_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> music -->
            <input id = "ALL_g{{ $i }}_subject_mus_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_mus_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_mus_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_mus_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_mus_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> arts -->
            <input id = "ALL_g{{ $i }}_subject_art_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_art_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_art_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_art_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_art_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> physical education -->
            <input id = "ALL_g{{ $i }}_subject_pe_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_pe_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_pe_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_pe_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_pe_qr4'} }}">

            <!-- ALL -> Scholastic record -> subject -> health -->
            <input id = "ALL_g{{ $i }}_subject_hp_qr1" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr1'} }}">
            <input id = "ALL_g{{ $i }}_subject_hp_qr2" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr2'} }}">
            <input id = "ALL_g{{ $i }}_subject_hp_qr3" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr3'} }}">
            <input id = "ALL_g{{ $i }}_subject_hp_qr4" class = "hidden" type = "text" value = "{{ $student->{'ALL_g'.$i.'_subject_hp_qr4'} }}">

            <!-- SF9 -> attendance -> days present -->
            <input id = "SF9_g{{ $i }}_attendance_p_jan" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_jan'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_feb" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_feb'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_mar" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_mar'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_apr" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_apr'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_may" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_may'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_jun" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_jun'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_jul" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_jul'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_aug" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_aug'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_sep" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_sep'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_oct" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_oct'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_nov" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_nov'} }}">
            <input id = "SF9_g{{ $i }}_attendance_p_dec" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_p_dec'} }}">

            <!-- SF9 -> attendance -> days absent -->
            <input id = "SF9_g{{ $i }}_attendance_a_jan" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_jan'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_feb" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_feb'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_mar" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_mar'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_apr" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_apr'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_may" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_may'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_jun" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_jun'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_jul" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_jul'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_aug" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_aug'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_sep" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_sep'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_oct" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_oct'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_nov" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_nov'} }}">
            <input id = "SF9_g{{ $i }}_attendance_a_dec" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_attendance_a_dec'} }}">

            <!-- SF9 -> observed values -> maka-diyos -->
            <input id = "SF9_g{{ $i }}_values_md_r1_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r1_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r1_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r1_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r1_qr4'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r2_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r2_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r2_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_md_r2_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_md_r2_qr4'} }}">

            <!-- SF9 -> observed values -> maka-tao -->
            <input id = "SF9_g{{ $i }}_values_mt_r1_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r1_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r1_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r1_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r1_qr4'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r2_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r2_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r2_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_mt_r2_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mt_r2_qr4'} }}">

            <!-- SF9 -> observed values -> maka-kalikasan -->
            <input id = "SF9_g{{ $i }}_values_mk_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_mk_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_mk_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_mk_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mk_qr4'} }}">

            <!-- SF9 -> observed values -> maka-bansa -->
            <input id = "SF9_g{{ $i }}_values_mb_r1_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r1_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r1_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r1_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r1_qr4'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r2_qr1" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr1'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r2_qr2" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr2'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r2_qr3" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr3'} }}">
            <input id = "SF9_g{{ $i }}_values_mb_r2_qr4" class = "hidden" type = "text" value = "{{ $student->{'SF9_g'.$i.'_values_mb_r2_qr4'} }}">

        @endfor

    </div>

</form>