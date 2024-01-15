(() => {
    // DO-NOT-TOUCH: Refresher
    const refresher = {
        all: function () {
            this.boolean();
            this.string();
            this.date();
            this.average();
            this.remarks();
            this.grand();
            this.total();
        },
        boolean: () => {
            const field = document.querySelectorAll(`[data-property = "boolean"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const target = document.getElementById(field[i].dataset.target);
                
                field[i].checked = target.checked;
                field[i].onchange = () => target.checked = field[i].checked;
            }
        },
        string: () => {
            const field = document.querySelectorAll(`[data-property = "string"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const target = document.getElementById(field[i].dataset.target);
                const value = target.value.trim();
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                
                if (label !== ``) {
                    if (value !== ``) {
                        field[i].innerHTML = `${label}: ${value}`;
                        field[i].classList.remove(`warning`);
                    }
                    else if (target.dataset.required === `true`) {
                        field[i].innerHTML = `${label}: Value required`;
                        field[i].classList.add(`warning`);
                    }
                    else field[i].innerHTML = `${label}:`;
                }
                else {
                    if (value !== ``) {
                        field[i].innerHTML = `${value}`;
                        field[i].classList.remove(`warning`);
                    }
                    else if (target.dataset.required === `true`) {
                        field[i].innerHTML = `Value required`;
                        field[i].classList.add(`warning`);
                    }
                    else field[i].innerHTML = ``;
                }
            }
        },
        date: () => {
            const field = document.querySelectorAll(`[data-property = "date"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const target = document.getElementById(field[i].dataset.target);
                const values = target.value.split(`-`);
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                
                if (values.length === 3) {
                    field[i].innerHTML = `${label}: ${values[1]}/${values[2]}/${values[0]}`;
                    field[i].classList.remove(`warning`);
                }
                else if (target.dataset.required === `true`) {
                    field[i].innerHTML = `${label}: Value required`;
                    field[i].classList.add(`warning`);
                }
                else field[i].innerHTML = `${label}:`;
            }
        },
        average: () => {
            const field = document.querySelectorAll(`[data-property = "average"]`);
        
            for (let i = 0, ii = field.length; i < ii; i++) {
                const targets = JSON.parse(field[i].dataset.targets);
                const length = targets.length;
                
                let total = 0;
        
                for (j = 0; j < length; j++) total += parseInt(document.getElementById(targets[j]).value);
        
                field[i].innerHTML = !isNaN(total) ? Math.round(total / length) : ``;
            }
        },
        remarks: () => {
            const field = document.querySelectorAll(`[data-property = "remarks"]`);
            const threshold = 75;

            for (let i = 0, ii = field.length; i < ii; i++) {
                const targets = JSON.parse(field[i].dataset.targets);
                const length = targets.length;
                
                let total = 0;

                for (j = 0; j < length; j++) total += parseInt(document.getElementById(targets[j]).value);

                field[i].innerHTML = !isNaN(total) ? (Math.round(total / length) >= threshold ? `Passed` : `Failed`) : ``;
            }
        },
        grand: () => {
            const field = document.querySelectorAll(`[data-property = "grand"]`);
            const threshold = 75;

            for (let i = 0, ii = field.length; i < ii; i++) {
                const targets = JSON.parse(field[i].dataset.targets);
                const length = targets.length;
                
                let total = 0;

                for (j = 0; j < length; j++) total += parseInt(document.getElementById(targets[j]).value);

                field[i].innerHTML = !isNaN(total) ? (Math.round(total / length) >= threshold ? `Promoted` : `Failed`) : ``;
            }
        },
        total: () => {
            const field = document.querySelectorAll(`[data-property = "total"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const targets = JSON.parse(field[i].dataset.targets);
                
                let total = 0;

                for (j = 0, jj = targets.length; j < jj; j++) total += parseInt(document.getElementById(targets[j]).value);

                field[i].innerHTML = !isNaN(total) ? total : ``;
            }
        },
    };

    // Finalized: Interactibles - variables
    const interactibles = [`string`, `date`, `toggle`];
    const formWindow = document.getElementById(`form-wrapper`);
    const formLabelA = document.getElementById(`form-label-title`);
    const formLabelB = document.getElementById(`form-label-subtitle`);
    const formClose = document.getElementById(`form-close`);

    let lastParameter = undefined;

    // Finalized: Interactibles - open
    for (let i = 0, ii = interactibles.length; i < ii; i++) {
        const interactible = document.querySelectorAll(`[data-property = "${interactibles[i]}"]`);

        for (let j = 0, jj = interactible.length; j < jj; j++) {
            interactible[j].addEventListener(`click`, function () {
                formWindow.classList.add(`display-block`);
                formWindow.classList.remove(`display-none`);

                lastParameter = document.getElementById(interactible[j].dataset.target);

                lastParameter.classList.add(`display-block`);
                lastParameter.classList.remove(`display-none`);
    
                formLabelA.innerHTML = lastParameter.dataset.labelTitle;
                formLabelB.innerHTML = lastParameter.dataset.labelSubtitle;
            });
        }
    }

    // Finalized: Interactibles - close
    formClose.addEventListener(`click`, function () {
        formWindow.classList.add(`display-none`);
        formWindow.classList.remove(`display-block`);

        lastParameter.classList.add(`display-none`);
        lastParameter.classList.remove(`display-block`);

        refresher.all();
    });

    // Finalized: Onload
    window.onload = () => refresher.all();
})();
(() => {
    // Finalized: Input bahavior - numbers
    const numbers = document.querySelectorAll(`[data-input-type = "number"]`);

    for (let i = 0, ii = numbers.length; i < ii; i++) {
        numbers[i].addEventListener(`input`, function () {
            const min = parseInt(this.dataset.inputMin);
            const max = parseInt(this.dataset.inputMax);

            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*)\./g, '$1'); // Include decimals: replace(/(\..*)\./g, '$1')
            
            if (this.value < min) this.value = min;
            if (this.value > max) this.value = max;
        });
    }

    // birthdate
    const birthdate = document.querySelectorAll(`[data-input-type = "birthdate"]`);
    
    for (let i = 0, ii = birthdate.length; i < ii; i++) {
        birthdate[i].addEventListener(`input`, function () {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*)\./g, '$1');

            if (this.value.length !== 3) {
                if (this.value.length === 2) this.value += `-`;
            }

            /*
            
            String.prototype.replaceAt = function (index, char) {
                let a = this.split("");
                a[index] = char;
                return a.join("");
            }
            let str = "Welcome W3Docs";
            str = str.replaceAt(7, "_");
            console.log(str);
            
            */
            //this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\.*)\./g, '$1');
        });
    }

    // data-input-type = "uncategorized"
    // This input type is not necessary and is FFA.
})();