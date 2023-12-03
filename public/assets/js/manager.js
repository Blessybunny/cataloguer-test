// NOTE:
// ID naming conventions are shared with the database's columns

// MANAGER
(() => {
    // COMPLETE: VARIABLES
    const mapeh = [`mus`, `art`, `pe`, `hp`];
    const grand = [`fil`, `eng`, `mat`, `sci`, `ap`, `ep`, `tle`, `mapeh`];
    const months = [`jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dec`];
    const grades = [7, 8, 9, 10];
    const quarters = [1, 2, 3, 4];
    const subjects = [`fil`, `eng`, `mat`, `sci`, `ap`, `ep`, `tle`, `mus`, `art`, `pe`, `hp`];
    const threshold = 75;

    // COMPLETE: REFRESHER
    const refresh = {
        all: function () {
            this.subjects();
            this.attendances();
            this.values();
        },
        subjects: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                const fields = [
                    // COMPLETE: 03 | ALL -> scholastic record -> subject -> filipino
                    `ALL_g${grades[i]}_subject_fil_qr1`,
                    `ALL_g${grades[i]}_subject_fil_qr2`,
                    `ALL_g${grades[i]}_subject_fil_qr3`,
                    `ALL_g${grades[i]}_subject_fil_qr4`,
            
                    // COMPLETE: 04 | ALL -> scholastic record -> subject -> english
                    `ALL_g${grades[i]}_subject_eng_qr1`,
                    `ALL_g${grades[i]}_subject_eng_qr2`,
                    `ALL_g${grades[i]}_subject_eng_qr3`,
                    `ALL_g${grades[i]}_subject_eng_qr4`,
            
                    // COMPLETE: 05 | ALL -> scholastic record -> subject -> mathematics
                    `ALL_g${grades[i]}_subject_mat_qr1`,
                    `ALL_g${grades[i]}_subject_mat_qr2`,
                    `ALL_g${grades[i]}_subject_mat_qr3`,
                    `ALL_g${grades[i]}_subject_mat_qr4`,
            
                    // COMPLETE: 06 | ALL -> scholastic record -> subject -> science
                    `ALL_g${grades[i]}_subject_sci_qr1`,
                    `ALL_g${grades[i]}_subject_sci_qr2`,
                    `ALL_g${grades[i]}_subject_sci_qr3`,
                    `ALL_g${grades[i]}_subject_sci_qr4`,
            
                    // COMPLETE: 07 | ALL -> scholastic record -> subject -> araling panlipunan (ap) -->
                    `ALL_g${grades[i]}_subject_ap_qr1`,
                    `ALL_g${grades[i]}_subject_ap_qr2`,
                    `ALL_g${grades[i]}_subject_ap_qr3`,
                    `ALL_g${grades[i]}_subject_ap_qr4`,
            
                    // COMPLETE: 08 | ALL -> scholastic record -> subject -> edukasyon sa pagpapakatao (ep)
                    `ALL_g${grades[i]}_subject_ep_qr1`,
                    `ALL_g${grades[i]}_subject_ep_qr2`,
                    `ALL_g${grades[i]}_subject_ep_qr3`,
                    `ALL_g${grades[i]}_subject_ep_qr4`,
            
                    // COMPLETE: 09 | ALL -> scholastic record -> subject -> technology and livelihood education (tle)
                    `ALL_g${grades[i]}_subject_tle_qr1`,
                    `ALL_g${grades[i]}_subject_tle_qr2`,
                    `ALL_g${grades[i]}_subject_tle_qr3`,
                    `ALL_g${grades[i]}_subject_tle_qr4`,
            
                    // COMPLETE: 11 | ALL -> scholastic record -> subject -> arts
                    `ALL_g${grades[i]}_subject_mus_qr1`,
                    `ALL_g${grades[i]}_subject_mus_qr2`,
                    `ALL_g${grades[i]}_subject_mus_qr3`,
                    `ALL_g${grades[i]}_subject_mus_qr4`,
            
                    // COMPLETE: 12 | ALL -> scholastic record -> subject -> physical education
                    `ALL_g${grades[i]}_subject_art_qr1`,
                    `ALL_g${grades[i]}_subject_art_qr2`,
                    `ALL_g${grades[i]}_subject_art_qr3`,
                    `ALL_g${grades[i]}_subject_art_qr4`,
            
                    // COMPLETE: 13 | ALL -> scholastic record -> subject -> health
                    `ALL_g${grades[i]}_subject_pe_qr1`,
                    `ALL_g${grades[i]}_subject_pe_qr2`,
                    `ALL_g${grades[i]}_subject_pe_qr3`,
                    `ALL_g${grades[i]}_subject_pe_qr4`,
            
                    // COMPLETE: 14 | SF9 -> attendance -> days present
                    `ALL_g${grades[i]}_subject_hp_qr1`,
                    `ALL_g${grades[i]}_subject_hp_qr2`,
                    `ALL_g${grades[i]}_subject_hp_qr3`,
                    `ALL_g${grades[i]}_subject_hp_qr4`,
                ];
                
                for (let j = 0, jj = fields.length; j < jj; j++) {
                    const input = document.querySelectorAll(`[data-field = "${fields[j]}"]`);
                    const value = document.getElementById(fields[j]).value;
                    
                    for (let k = 0, kk = input.length; k < kk; k++) input[k].innerHTML = value;
                }
            }
        },
        attendances: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                const fields = [
                    // COMPLETE: 15 | SF9 -> attendance -> days absent
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
            
                    // COMPLETE: 16 | SF9 -> observed values -> maka - diyos
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
                ];
                
                for (let j = 0, jj = fields.length; j < jj; j++) {
                    const input = document.querySelectorAll(`[data-field = "${fields[j]}"]`);
                    const value = document.getElementById(fields[j]).value;
                    
                    for (let k = 0, kk = input.length; k < kk; k++) input[k].innerHTML = value;
                }
            }
        },
        values: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                const fields = [
                    // COMPLETE: 16 | SF9 -> observed values -> maka - diyos
                    `SF9_g${grades[i]}_values_md_s1_qr1`,
                    `SF9_g${grades[i]}_values_md_s1_qr2`,
                    `SF9_g${grades[i]}_values_md_s1_qr3`,
                    `SF9_g${grades[i]}_values_md_s1_qr4`,
                    `SF9_g${grades[i]}_values_md_s2_qr1`,
                    `SF9_g${grades[i]}_values_md_s2_qr2`,
                    `SF9_g${grades[i]}_values_md_s2_qr3`,
                    `SF9_g${grades[i]}_values_md_s2_qr4`,
            
                    // COMPLETE: 17 | SF9 -> observed values -> maka - tao
                    `SF9_g${grades[i]}_values_mt_s1_qr1`,
                    `SF9_g${grades[i]}_values_mt_s1_qr2`,
                    `SF9_g${grades[i]}_values_mt_s1_qr3`,
                    `SF9_g${grades[i]}_values_mt_s1_qr4`,
                    `SF9_g${grades[i]}_values_mt_s2_qr1`,
                    `SF9_g${grades[i]}_values_mt_s2_qr2`,
                    `SF9_g${grades[i]}_values_mt_s2_qr3`,
                    `SF9_g${grades[i]}_values_mt_s2_qr4`,
            
                    // COMPLETE: 18 | SF9 -> observed values -> maka - kalikasan
                    `SF9_g${grades[i]}_values_mk_qr1`,
                    `SF9_g${grades[i]}_values_mk_qr2`,
                    `SF9_g${grades[i]}_values_mk_qr3`,
                    `SF9_g${grades[i]}_values_mk_qr4`,
            
                    // COMPLETE: 19 | SF9 -> observed values -> maka - bansa
                    `SF9_g${grades[i]}_values_mb_s1_qr1`,
                    `SF9_g${grades[i]}_values_mb_s1_qr2`,
                    `SF9_g${grades[i]}_values_mb_s1_qr3`,
                    `SF9_g${grades[i]}_values_mb_s1_qr4`,
                    `SF9_g${grades[i]}_values_mb_s2_qr1`,
                    `SF9_g${grades[i]}_values_mb_s2_qr2`,
                    `SF9_g${grades[i]}_values_mb_s2_qr3`,
                    `SF9_g${grades[i]}_values_mb_s2_qr4`,
                ];
                
                for (let j = 0, jj = fields.length; j < jj; j++) {
                    const input = document.querySelectorAll(`[data-field = "${fields[j]}"]`);
                    const value = document.getElementById(fields[j]).value;
                    
                    for (let k = 0, kk = input.length; k < kk; k++) input[k].innerHTML = value;
                }
            }
        },
    };

    // COMPLETE: COMPUTER
    const compute = {
        all: function () {
            this.subjects();
            this.mapeh();
            this.grand();
            this.attendances();
        },
        subjects: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                for (let j = 0, jj = subjects.length; j < jj; j++) {
                    const averages = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_${subjects[j]}_average"]`);
                    const remarks = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_${subjects[j]}_remarks"]`);
    
                    let average = 0;
                    let remark = ``;

                    for (let k = 0, kk = averages.length; k < kk; k++) averages[k].innerHTML = ``;
                    for (let k = 0, kk = remarks.length; k < kk; k++) remarks[k].innerHTML = ``;

                    for (let k = 0, kk = quarters.length; k < kk; k++) average += parseInt(document.getElementById(`ALL_g${grades[i]}_subject_${subjects[j]}_qr${quarters[k]}`).value);
                    
                    if (!isNaN(average)) {
                        average = Math.round(average / quarters.length);
                        remark = average >= threshold ? `Passed` : `Failed`;
                        
                        for (let k = 0, kk = averages.length; k < kk; k++) averages[k].innerHTML = average;
                        for (let k = 0, kk = remarks.length; k < kk; k++) remarks[k].innerHTML = remark;
                    }
                }
            }
        },
        mapeh: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                const averagesAll = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_mapeh_average"]`);
                const remarksAll = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_mapeh_remarks"]`);

                let averageAll = 0;
                let remarkAll = ``;
                let hasIsNaN = false;

                for (let j = 0, jj = averagesAll.length; j < jj; j++) averagesAll[j].innerHTML = ``;
                for (let j = 0, jj = remarksAll.length; j < jj; j++) remarksAll[j].innerHTML = ``;

                for (let j = 0, jj = quarters.length; j < jj; j++) {
                    const averages = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_mapeh_qr${quarters[j]}_average"]`);

                    let average = 0;
                    
                    for (let k = 0, kk = averages.length; k < kk; k++) averages[k].innerHTML = ``;

                    for (let k = 0, kk = mapeh.length; k < kk; k++) {
                        const value = parseInt(document.getElementById(`ALL_g${grades[i]}_subject_${mapeh[k]}_qr${quarters[j]}`).value);

                        if (!isNaN(value)) average += value;
                        else hasIsNaN = true;
                    }
                    
                    if (!hasIsNaN && !isNaN(average)) {
                        average = Math.round(average / mapeh.length);
                        averageAll += average;

                        for (let k = 0, kk = averages.length; k < kk; k++) averages[k].innerHTML = average;
                    }
                }

                if (!hasIsNaN) {
                    averageAll = Math.round(averageAll / quarters.length);
                    remarkAll = averageAll >= threshold ? `Passed` : `Failed`;

                    for (let j = 0, jj = averagesAll.length; j < jj; j++) averagesAll[j].innerHTML = averageAll;
                    for (let j = 0, jj = remarksAll.length; j < jj; j++) remarksAll[j].innerHTML = remarkAll;
                }
            }
        },
        grand: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                const averages = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_all_average"]`);
                const remarks = document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_all_remarks"]`);

                let average = 0;
                let remark = ``;
                let hasIsNaN = false;

                for (let j = 0, jj = averages.length; j < jj; j++) averages[j].innerHTML = ``;
                for (let j = 0, jj = remarks.length; j < jj; j++) remarks[j].innerHTML = ``;

                for (let j = 0, jj = grand.length; j < jj; j++) {
                    const value = parseInt(document.querySelectorAll(`[data-compute = "ALL_g${grades[i]}_subject_${grand[j]}_average"]`)[0].innerHTML);

                    if (!isNaN(value)) average += value;
                    else hasIsNaN = true;
                }
                
                if (!hasIsNaN) {
                    average = Math.round(average / grand.length);
                    remark = average >= threshold ? `Promoted` : `Failed`;
                    
                    for (let j = 0, jj = averages.length; j < jj; j++) averages[j].innerHTML = average;
                    for (let j = 0, jj = remarks.length; j < jj; j++) remarks[j].innerHTML = remark;
                }
            }
        },
        attendances: () => {
            for (let i = 0, ii = grades.length; i < ii; i++) {
                const presents = document.querySelectorAll(`[data-compute = "SF9_g${grades[i]}_attendance_p_total`);
                const absents = document.querySelectorAll(`[data-compute = "SF9_g${grades[i]}_attendance_a_total`);
    
                let totalPresent = 0;
                let totalAbsent = 0;
                let hasIsNaNPresent = false;
                let hasIsNaNAbsent = false;

                for (j = 0, jj = presents.length; j < jj; j++) presents[j].innerHTML = ``;
                for (j = 0, jj = absents.length; j < jj; j++) absents[j].innerHTML = ``;
    
                for (let j = 0, jj = months.length; j < jj; j++) {
                    const value = parseInt(document.getElementById(`SF9_g${grades[i]}_attendance_p_${months[j]}`).value);
                    
                    if (!isNaN(value)) totalPresent += value;
                    else hasIsNaNPresent = true;
                }
                for (let j = 0, jj = months.length; j < jj; j++) {
                    const value = parseInt(document.getElementById(`SF9_g${grades[i]}_attendance_a_${months[j]}`).value);

                    if (!isNaN(value)) totalAbsent += value;
                    else hasIsNaNAbsent = true;
                }

                if (!hasIsNaNPresent) for (j = 0, jj = presents.length; j < jj; j++) presents[j].innerHTML = totalPresent;
                if (!hasIsNaNAbsent) for (j = 0, jj = absents.length; j < jj; j++) absents[j].innerHTML = totalAbsent;
            }
        },
    };

    // COMPLETE: ONLOAD
    window.onload = () => {
        refresh.all();
        compute.all();
    };

    // FORM
    (() => {
        // Variables
        const form = document.getElementById(`form-wrapper`);
        const editables = document.querySelectorAll(`[data-interactive = "true"]`);

        let lastOpenedEditable = undefined;

        // Close
        document.getElementById(`form-close`).addEventListener(`click`, function () {
            form.classList.add(`hidden`);
            form.classList.remove(`visible`);
    
            refresh.all();
            compute.all();

            lastOpenedEditable.classList.add(`hidden`);
            lastOpenedEditable.classList.remove(`visible`);
        });

        // Open
        for (let i = 0, ii = editables.length; i < ii; i++) {
            editables[i].addEventListener(`click`, function () {
                form.classList.add(`visible`);
                form.classList.remove(`hidden`);

                lastOpenedEditable = document.getElementById(editables[i].dataset.field);

                lastOpenedEditable.classList.add(`visible`);
                lastOpenedEditable.classList.remove(`hidden`);
    
                document.getElementById(`form-label-a`).innerHTML = lastOpenedEditable.dataset.labelA;
                document.getElementById(`form-label-b`).innerHTML = lastOpenedEditable.dataset.labelB;
            });
        }

        // Input: Number
        const numbers = document.querySelectorAll(`[data-input-type = "number"]`);

        for (let i = 0, ii = numbers.length; i < ii; i++) {
            numbers[i].addEventListener(`input`, function () {
                const min = parseInt(this.dataset.inputMin);
                const max = parseInt(this.dataset.inputMax);

                this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
                
                if (this.value < min) this.value = min;
                if (this.value > max) this.value = max;
            });
        }
    })();
})();

