// NOTE:
// ID naming conventions are shared with the database's columns
// Code arrangement is file alphabetical arrangement

// UPDATER
const updater = {
    dat: [],
    run: function () {
        for (let i = 0, ii = this.dat.length; i < ii; i++) this.dat[i](); 
    },
    add: function (callback) {
        this.dat.push(callback);
    },
};
updater.add(() => {
    // Scholastic records
    const grades = [7, 8, 9, 10];

    for (let i = 0, ii = grades.length; i < ii; i++) {
        const keywords = [
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
    
            // ALL -> Scholastic record -> subject -> edukasyon pagpapakatao (ep)
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

            // SF9 -> observed values -> maka-diyos
            `SF9_g${grades[i]}_values_md_r1_qr1`,
            `SF9_g${grades[i]}_values_md_r1_qr2`,
            `SF9_g${grades[i]}_values_md_r1_qr3`,
            `SF9_g${grades[i]}_values_md_r1_qr4`,
            `SF9_g${grades[i]}_values_md_r2_qr1`,
            `SF9_g${grades[i]}_values_md_r2_qr2`,
            `SF9_g${grades[i]}_values_md_r2_qr3`,
            `SF9_g${grades[i]}_values_md_r2_qr4`,

            // SF9 -> observed values -> maka-tao
            `SF9_g${grades[i]}_values_mt_r1_qr1`,
            `SF9_g${grades[i]}_values_mt_r1_qr2`,
            `SF9_g${grades[i]}_values_mt_r1_qr3`,
            `SF9_g${grades[i]}_values_mt_r1_qr4`,
            `SF9_g${grades[i]}_values_mt_r2_qr1`,
            `SF9_g${grades[i]}_values_mt_r2_qr2`,
            `SF9_g${grades[i]}_values_mt_r2_qr3`,
            `SF9_g${grades[i]}_values_mt_r2_qr4`,

            // SF9 -> observed values -> maka-kalikasan
            `SF9_g${grades[i]}_values_mk_qr1`,
            `SF9_g${grades[i]}_values_mk_qr2`,
            `SF9_g${grades[i]}_values_mk_qr3`,
            `SF9_g${grades[i]}_values_mk_qr4`,

            // SF9 -> observed values -> maka-bansa
            `SF9_g${grades[i]}_values_mb_r1_qr1`,
            `SF9_g${grades[i]}_values_mb_r1_qr2`,
            `SF9_g${grades[i]}_values_mb_r1_qr3`,
            `SF9_g${grades[i]}_values_mb_r1_qr4`,
            `SF9_g${grades[i]}_values_mb_r2_qr1`,
            `SF9_g${grades[i]}_values_mb_r2_qr2`,
            `SF9_g${grades[i]}_values_mb_r2_qr3`,
            `SF9_g${grades[i]}_values_mb_r2_qr4`,
        ];
    
        for (let j = 0, jj = keywords.length; j < jj; j++) {
            const data = document.getElementsByClassName(keywords[j]);
            const value = document.getElementById(keywords[j]).value;
        
            for (let j = 0, jj = data.length; j < jj; j++) data[j].innerHTML = value;
        }
    }
});
updater.run();

/*
// BLADE: report-card-7-back.blade.php
updater.add(() => {
    // Total grades with remarks
    const keywords = [`fil`, `eng`, `mat`, `sci`, `ap`, `ep`, `tle`, `mus`, `art`, `pe`, `hp`];

    for (let i = 0, ii = keywords.length; i < ii; i++) {
        const qr1 = parseInt(document.getElementById(`ALL_g7_subject_${keywords[i]}_qr1`).dataset.value);
        const qr2 = parseInt(document.getElementById(`ALL_g7_subject_${keywords[i]}_qr2`).dataset.value);
        const qr3 = parseInt(document.getElementById(`ALL_g7_subject_${keywords[i]}_qr3`).dataset.value);
        const qr4 = parseInt(document.getElementById(`ALL_g7_subject_${keywords[i]}_qr4`).dataset.value);
        const total = (isNaN(qr1) ? 0 : qr1) + (isNaN(qr2) ? 0 : qr2) + (isNaN(qr3) ? 0 : qr3) + (isNaN(qr4) ? 0 : qr4);
        const average = Math.round(total / 4);
        
        if (1) { //qr1 > 0 && qr2 > 0 && qr3 > 0 && qr4 > 0
            document.getElementById(`ALL_g7_subject_${keywords[i]}_final_grade`).innerHTML = average;
            document.getElementById(`ALL_g7_subject_${keywords[i]}_remarks`).innerHTML = average >= 75 ? `Passed` : `Failed`;
        }
    }

    // MAPEH general total grades with remarks
    (() => {
        const mus_qr1 = parseInt(document.getElementById(`ALL_g7_subject_mus_qr1`).dataset.value);
        const mus_qr2 = parseInt(document.getElementById(`ALL_g7_subject_mus_qr2`).dataset.value);
        const mus_qr3 = parseInt(document.getElementById(`ALL_g7_subject_mus_qr3`).dataset.value);
        const mus_qr4 = parseInt(document.getElementById(`ALL_g7_subject_mus_qr4`).dataset.value);
        const mus_total = (isNaN(mus_qr1) ? 0 : mus_qr1) + (isNaN(mus_qr2) ? 0 : mus_qr2) + (isNaN(mus_qr3) ? 0 : mus_qr3) + (isNaN(mus_qr4) ? 0 : mus_qr4);
        const mus_average = Math.round(mus_total / 4);

        if (mus_qr1 > 0 && mus_qr2 > 0 && mus_qr3 > 0 && mus_qr4 > 0) {
            document.getElementById(`ALL_g7_subject_mapeh_qr1`).innerHTML = mus_average;
        }
    })();
});*/
/*
// BLADE: report-card-7-front.blade.php
updater.add(() => {
    // Total days
    const keywords = [`p`, `a`];
    
    for (let i = 0, ii = keywords.length; i < ii; i++) {
        const jan = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_jan`).dataset.value);
        const feb = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_feb`).dataset.value);
        const mar = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_mar`).dataset.value);
        const apr = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_apr`).dataset.value);
        const may = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_may`).dataset.value);
        const jun = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_jun`).dataset.value);
        const jul = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_jul`).dataset.value);
        const aug = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_aug`).dataset.value);
        const sep = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_sep`).dataset.value);
        const oct = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_oct`).dataset.value);
        const nov = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_nov`).dataset.value);
        const dec = parseInt(document.getElementById(`rc_g7_attendance_${keywords[i]}_dec`).dataset.value);
        const total = (isNaN(jan) ? 0 : jan) +
            (isNaN(feb) ? 0 : feb) +
            (isNaN(mar) ? 0 : mar) +
            (isNaN(apr) ? 0 : apr) +
            (isNaN(may) ? 0 : may) +
            (isNaN(jun) ? 0 : jun) +
            (isNaN(jul) ? 0 : jul) +
            (isNaN(aug) ? 0 : aug) +
            (isNaN(sep) ? 0 : sep) +
            (isNaN(oct) ? 0 : oct) +
            (isNaN(nov) ? 0 : nov) +
            (isNaN(dec) ? 0 : dec);
        
        document.getElementById(`rc_g7_attendance_${keywords[i]}_total`).innerHTML = total ? total : ``;
    }
});

(() => {
    // Prompt
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
})();*/

