// NOTE:
// ID naming conventions are shared with the database's columns

// MANAGER
(() => {
    // COMPLETE: VARIABLES
    const grand = [`fil`, `eng`, `mat`, `sci`, `ap`, `ep`, `tle`, `mapeh`];
    const grades = [7, 8, 9, 10];
    const threshold = 75;

    // Refresher
    const refresher = {
        all: function () {
            this.interactiveText();
            this.interactiveNumber();
            this.total();
            this.average();
            this.remarks();
        },
        interactiveText: () => {
            const field = document.querySelectorAll(`[data-type = "interactive-text"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                field[i].innerHTML = document.getElementById(field[i].dataset.parameters).value;
            }
        },
        interactiveNumber: () => {
            const field = document.querySelectorAll(`[data-type = "interactive-number"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const value = parseInt(document.getElementById(field[i].dataset.parameters).value);

                field[i].innerHTML = !isNaN(value) ? value : ``;
            }
        },
        total: () => {
            const field = document.querySelectorAll(`[data-type = "total"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                field[i].innerHTML = !isNaN(total) ? total : ``;
            }
        },
        average: () => {
            const field = document.querySelectorAll(`[data-type = "average"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                field[i].innerHTML = !isNaN(total) ? Math.round(total / parameters.length) : ``;
            }
        },
        remarks: () => {
            const field = document.querySelectorAll(`[data-type = "remarks"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                field[i].innerHTML = !isNaN(total) ? (Math.round(total / parameters.length) >= threshold ? `Passed` : `Failed`) : ``;
            }
        },
    };

    // OLD
    const compute = {
        
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
    };

    // COMPLETE: ONLOAD
    window.onload = () => {
        refresher.all();
    };

    // FORM
    (() => {
        // Variables
        const form = document.getElementById(`form-wrapper`);
        const interactive_1 = document.querySelectorAll(`[data-type = "interactive-text"]`);
        const interactive_2 = document.querySelectorAll(`[data-type = "interactive-number"]`);
        const interactive_3 = document.querySelectorAll(`[data-type = "toggle"]`);

        let lastOpenedEditable = undefined;

        // Close
        document.getElementById(`form-close`).addEventListener(`click`, function () {
            form.classList.add(`hidden`);
            form.classList.remove(`visible`);
    
            refresher.all();

            lastOpenedEditable.classList.add(`hidden`);
            lastOpenedEditable.classList.remove(`visible`);
        });

        // Open
        for (let i = 0, ii = interactive_1.length; i < ii; i++) {
            interactive_1[i].addEventListener(`click`, function () {
                form.classList.add(`visible`);
                form.classList.remove(`hidden`);

                lastOpenedEditable = document.getElementById(interactive_1[i].dataset.parameters);

                lastOpenedEditable.classList.add(`visible`);
                lastOpenedEditable.classList.remove(`hidden`);
    
                document.getElementById(`form-label-a`).innerHTML = lastOpenedEditable.dataset.labelA;
                document.getElementById(`form-label-b`).innerHTML = lastOpenedEditable.dataset.labelB;
            });
        }
        for (let i = 0, ii = interactive_2.length; i < ii; i++) {
            interactive_2[i].addEventListener(`click`, function () {
                form.classList.add(`visible`);
                form.classList.remove(`hidden`);

                lastOpenedEditable = document.getElementById(interactive_2[i].dataset.parameters);

                lastOpenedEditable.classList.add(`visible`);
                lastOpenedEditable.classList.remove(`hidden`);
    
                document.getElementById(`form-label-a`).innerHTML = lastOpenedEditable.dataset.labelA;
                document.getElementById(`form-label-b`).innerHTML = lastOpenedEditable.dataset.labelB;
            });
        }
        for (let i = 0, ii = interactive_3.length; i < ii; i++) {
            interactive_3[i].addEventListener(`click`, function () {
                form.classList.add(`visible`);
                form.classList.remove(`hidden`);

                lastOpenedEditable = document.getElementById(interactive_3[i].dataset.parameters);

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

