// NOTE:
// ID naming conventions are shared with the database's columns

// MANAGER
(() => {
    // REFRESHER
    const refresh = () => {
        // Variables
        const grades = [7, 8, 9, 10];
        const months = [`jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`];
        const subjects = [`fil`, `eng`, `mat`, `sci`, `ap`, `ep`, `tle`, `mus`, `art`, `pe`, `hp`];
        const mapeh = [`mus`, `art`, `pe`, `hp`];
        const quarters = [1, 2, 3, 4];
        const threshold = 75;

        // Database
        for (let i = 0, ii = grades.length; i < ii; i++) {
            const database = [
                // ALL -> Scholastic record -> subject -> filipino
                `ALL_g${grades[i]}_subject_fil_qr1`,
                `ALL_g${grades[i]}_subject_fil_qr2`,
                `ALL_g${grades[i]}_subject_fil_qr3`,
                `ALL_g${grades[i]}_subject_fil_qr4`,
        
                // ALL -> Scholastic record -> subject -> english
                `ALL_g${grades[i]}_subject_eng_qr1`,
                `ALL_g${grades[i]}_subject_eng_qr2`,
                `ALL_g${grades[i]}_subject_eng_qr3`,
                `ALL_g${grades[i]}_subject_eng_qr4`,
        
                // ALL -> Scholastic record -> subject -> mathematics
                `ALL_g${grades[i]}_subject_mat_qr1`,
                `ALL_g${grades[i]}_subject_mat_qr2`,
                `ALL_g${grades[i]}_subject_mat_qr3`,
                `ALL_g${grades[i]}_subject_mat_qr4`,
        
                // ALL -> Scholastic record -> subject -> science
                `ALL_g${grades[i]}_subject_sci_qr1`,
                `ALL_g${grades[i]}_subject_sci_qr2`,
                `ALL_g${grades[i]}_subject_sci_qr3`,
                `ALL_g${grades[i]}_subject_sci_qr4`,
        
                // ALL -> Scholastic record -> subject -> araling panlipunan (ap)
                `ALL_g${grades[i]}_subject_ap_qr1`,
                `ALL_g${grades[i]}_subject_ap_qr2`,
                `ALL_g${grades[i]}_subject_ap_qr3`,
                `ALL_g${grades[i]}_subject_ap_qr4`,
        
                // ALL -> Scholastic record -> subject -> edukasyon sa pagpapakatao (ep)
                `ALL_g${grades[i]}_subject_ep_qr1`,
                `ALL_g${grades[i]}_subject_ep_qr2`,
                `ALL_g${grades[i]}_subject_ep_qr3`,
                `ALL_g${grades[i]}_subject_ep_qr4`,
        
                // ALL -> Scholastic record -> subject -> technology and livelihood education (tle)
                `ALL_g${grades[i]}_subject_tle_qr1`,
                `ALL_g${grades[i]}_subject_tle_qr2`,
                `ALL_g${grades[i]}_subject_tle_qr3`,
                `ALL_g${grades[i]}_subject_tle_qr4`,
        
                // ALL -> Scholastic record -> subject -> music
                `ALL_g${grades[i]}_subject_mus_qr1`,
                `ALL_g${grades[i]}_subject_mus_qr2`,
                `ALL_g${grades[i]}_subject_mus_qr3`,
                `ALL_g${grades[i]}_subject_mus_qr4`,
        
                // ALL -> Scholastic record -> subject -> arts
                `ALL_g${grades[i]}_subject_art_qr1`,
                `ALL_g${grades[i]}_subject_art_qr2`,
                `ALL_g${grades[i]}_subject_art_qr3`,
                `ALL_g${grades[i]}_subject_art_qr4`,
        
                // ALL -> Scholastic record -> subject -> physical education
                `ALL_g${grades[i]}_subject_pe_qr1`,
                `ALL_g${grades[i]}_subject_pe_qr2`,
                `ALL_g${grades[i]}_subject_pe_qr3`,
                `ALL_g${grades[i]}_subject_pe_qr4`,
        
                // ALL -> Scholastic record -> subject -> health -->
                `ALL_g${grades[i]}_subject_hp_qr1`,
                `ALL_g${grades[i]}_subject_hp_qr2`,
                `ALL_g${grades[i]}_subject_hp_qr3`,
                `ALL_g${grades[i]}_subject_hp_qr4`,
        
                // SF9 -> attendance -> days present
                `SF9_g${grades[i]}_attendance_p_jan`,
                `SF9_g${grades[i]}_attendance_p_feb`,
                `SF9_g${grades[i]}_attendance_p_mar`,
                `SF9_g${grades[i]}_attendance_p_apr`,
                `SF9_g${grades[i]}_attendance_p_may`,
                `SF9_g${grades[i]}_attendance_p_jun`,
                `SF9_g${grades[i]}_attendance_p_jul`,
                `SF9_g${grades[i]}_attendance_p_aug`,
                `SF9_g${grades[i]}_attendance_p_sep`,
                `SF9_g${grades[i]}_attendance_p_oct`,
                `SF9_g${grades[i]}_attendance_p_nov`,
                `SF9_g${grades[i]}_attendance_p_dec`,
        
                // SF9 -> attendance -> days absent
                `SF9_g${grades[i]}_attendance_a_jan`,
                `SF9_g${grades[i]}_attendance_a_feb`,
                `SF9_g${grades[i]}_attendance_a_mar`,
                `SF9_g${grades[i]}_attendance_a_apr`,
                `SF9_g${grades[i]}_attendance_a_may`,
                `SF9_g${grades[i]}_attendance_a_jun`,
                `SF9_g${grades[i]}_attendance_a_jul`,
                `SF9_g${grades[i]}_attendance_a_aug`,
                `SF9_g${grades[i]}_attendance_a_sep`,
                `SF9_g${grades[i]}_attendance_a_oct`,
                `SF9_g${grades[i]}_attendance_a_nov`,
                `SF9_g${grades[i]}_attendance_a_dec`,
        
                // SF9 -> observed values -> maka - diyos
                `SF9_g${grades[i]}_values_md_r1_qr1`,
                `SF9_g${grades[i]}_values_md_r1_qr2`,
                `SF9_g${grades[i]}_values_md_r1_qr3`,
                `SF9_g${grades[i]}_values_md_r1_qr4`,
                `SF9_g${grades[i]}_values_md_r2_qr1`,
                `SF9_g${grades[i]}_values_md_r2_qr2`,
                `SF9_g${grades[i]}_values_md_r2_qr3`,
                `SF9_g${grades[i]}_values_md_r2_qr4`,
        
                // SF9 -> observed values -> maka - tao
                `SF9_g${grades[i]}_values_mt_r1_qr1`,
                `SF9_g${grades[i]}_values_mt_r1_qr2`,
                `SF9_g${grades[i]}_values_mt_r1_qr3`,
                `SF9_g${grades[i]}_values_mt_r1_qr4`,
                `SF9_g${grades[i]}_values_mt_r2_qr1`,
                `SF9_g${grades[i]}_values_mt_r2_qr2`,
                `SF9_g${grades[i]}_values_mt_r2_qr3`,
                `SF9_g${grades[i]}_values_mt_r2_qr4`,
        
                // SF9 -> observed values -> maka - kalikasan
                `SF9_g${grades[i]}_values_mk_qr1`,
                `SF9_g${grades[i]}_values_mk_qr2`,
                `SF9_g${grades[i]}_values_mk_qr3`,
                `SF9_g${grades[i]}_values_mk_qr4`,
        
                // SF9 -> observed values -> maka - bansa
                `SF9_g${grades[i]}_values_mb_r1_qr1`,
                `SF9_g${grades[i]}_values_mb_r1_qr2`,
                `SF9_g${grades[i]}_values_mb_r1_qr3`,
                `SF9_g${grades[i]}_values_mb_r1_qr4`,
                `SF9_g${grades[i]}_values_mb_r2_qr1`,
                `SF9_g${grades[i]}_values_mb_r2_qr2`,
                `SF9_g${grades[i]}_values_mb_r2_qr3`,
                `SF9_g${grades[i]}_values_mb_r2_qr4`,
            ];

            for (let j = 0, jj = database.length; j < jj; j++) {
                const input = document.getElementsByClassName(database[j]);
                const value = document.getElementById(database[j]).value;
            
                for (let k = 0, kk = input.length; k < kk; k++) input[k].innerHTML = value;
            }
        }

        // Rating: Grades
        for (let i = 0, ii = grades.length; i < ii; i++) {
            for (let j = 0, jj = subjects.length; j < jj; j++) {
                const average = document.getElementsByClassName(`ALL_g${grades[i]}_subject_${subjects[j]}_average`);
                const remarks = document.getElementsByClassName(`ALL_g${grades[i]}_subject_${subjects[j]}_remarks`);

                let total = 0;
                let remark = ``;

                for (let k = 0, kk = quarters.length; k < kk; k++) total += parseInt(document.getElementById(`ALL_g${grades[i]}_subject_${subjects[j]}_qr${quarters[k]}`).value);
                
                if (!isNaN(total) && total > 0) {
                    total = Math.round(total / quarters.length);
                    remark = total >= threshold ? `Passed` : `Failed`;
                    
                    for (let k = 0, kk = average.length; k < kk; k++) average[k].innerHTML = total;
                    for (let k = 0, kk = remarks.length; k < kk; k++) remarks[k].innerHTML = remark;
                }
            }
        }

        // Rating: MAPEH
        for (let i = 0, ii = grades.length; i < ii; i++) {
            const average = document.getElementsByClassName(`ALL_g${grades[i]}_subject_mapeh_average`);
            const remarks = document.getElementsByClassName(`ALL_g${grades[i]}_subject_mapeh_remarks`);

            let totalAll = 0;
            let remarkAll = ``;
            
            for (let j = 0, jj = quarters.length; j < jj; j++) {
                const quarterAverage = document.getElementsByClassName(`ALL_g${grades[i]}_subject_mapeh_qr${quarters[j]}_average`);

                let totalQuarter = 0;

                for (let k = 0, kk = mapeh.length; k < kk; k++) totalQuarter += parseInt(document.getElementById(`ALL_g${grades[i]}_subject_${mapeh[k]}_qr${quarters[j]}`).value);
                
                if (!isNaN(totalQuarter) && totalQuarter > 0) {
                    totalQuarter = Math.round(totalQuarter / quarters.length);
                    totalAll += totalQuarter;
                    
                    for (let k = 0, kk = quarterAverage.length; k < kk; k++) quarterAverage[k].innerHTML = totalQuarter;
                }
            }

            if (!isNaN(totalAll) && totalAll > 0) {
                totalAll = Math.round(totalAll / quarters.length);
                remarkAll = totalAll >= threshold ? `Passed` : `Failed`;

                for (let j = 0, jj = average.length; j < jj; j++) average[j].innerHTML = totalAll;
                for (let j = 0, jj = remarks.length; j < jj; j++) remarks[j].innerHTML = remarkAll;
            }
        }

        // Rating: Final Rating
        for (let i = 0, ii = grades.length; i < ii; i++) {
            const average = document.getElementsByClassName(`ALL_g${grades[i]}_subject_all_average`);
            const remarks = document.getElementsByClassName(`ALL_g${grades[i]}_subject_all_remarks`);

            let total = 0;
            let remark = ``;

            for (let j = 0, jj = subjects.length; j < jj; j++) {
                total += parseInt(document.getElementsByClassName(`ALL_g${grades[i]}_subject_${subjects[j]}_average`)[0].innerHTML);
            }

            total += parseInt(document.getElementsByClassName(`ALL_g${grades[i]}_subject_mapeh_average`)[0].innerHTML);

            if (!isNaN(total) && total > 0) {
                total = Math.round(total / (subjects.length + 1));
                remark = total >= threshold ? `Passed` : `Failed`;

                for (let j = 0, jj = average.length; j < jj; j++) average[j].innerHTML = total;
                for (let j = 0, jj = remarks.length; j < jj; j++) remarks[j].innerHTML = remark;
            }
        }

        // Attendance
        for (let i = 0, ii = grades.length; i < ii; i++) {
            const present = document.getElementsByClassName(`SF9_g${grades[i]}_attendance_p_total`);
            const absent = document.getElementsByClassName(`SF9_g${grades[i]}_attendance_a_total`);

            let totalPresent = 0;
            let totalAbsent = 0;

            for (let j = 0, jj = months.length; j < jj; j++) {
                totalPresent += parseInt(document.getElementById(`SF9_g${grades[i]}_attendance_p_${months[j]}`).value);
                totalAbsent += parseInt(document.getElementById(`SF9_g${grades[i]}_attendance_a_${months[j]}`).value);
            }
            
            if (!isNaN(totalPresent) && totalPresent > 0 && !isNaN(totalAbsent) && totalAbsent > 0) {
                for (j = 0, jj = present.length; j < jj; j++) present[j].innerHTML = totalPresent;
                for (j = 0, jj = absent.length; j < jj; j++) absent[j].innerHTML = totalAbsent;
            }
        }
    };

    window.onload = () => refresh();

    // PROMPT
    const prompt = document.getElementById(`prompt`);
    
    // Temporary close toggle
    prompt.addEventListener(`click`, () => {
        prompt.classList.add(`hidden`);
        prompt.classList.remove(`close`);
    });

    // Variables
    const tables = document.getElementsByClassName(`prompt-toggle`);

    for (let i = 0, ii = tables.length; i < ii; i++) {
        tables[i].addEventListener(`click`, function () {
            // Toggle
            prompt.classList.add(`visible`);
            prompt.classList.remove(`hidden`);
        });
    }
})();

