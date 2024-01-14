(() => {
    // Finalized: Refresher
    const refresher = {
        all: function () {
            this.boolean();

            this.text();
            this.date();
            this.number();
            this.total();
            this.average();
            this.remarks();
            this.grand();
        },

        // DO-NOT-TOUCH
        boolean: () => {
            const field = document.querySelectorAll(`[data-type = "boolean"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                const target = document.getElementById(field[i].dataset.target);
                
                field[i].checked = target.checked;
                field[i].onchange = () => target.checked = field[i].checked;
            }
        },




        text: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "text"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value white-space clean-up
                const parameter = document.getElementById(field[i].dataset.parameters);

                parameter.value = parameter.value.trim();

                const value = parameter.value;

                // Print with placeholder
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;

                if (value !== ``) {
                    field[i].innerHTML = `${label}: ${value}`;
                    field[i].classList.remove(`warning`);
                }
                else if (parameter.dataset.required === `true`) {
                    field[i].innerHTML = `${label}: Value required`;
                    field[i].classList.add(`warning`);
                }
                else {
                    field[i].innerHTML = `${label}:`;
                    field[i].classList.remove(`warning`);
                }
                
            }
        },
        date: () => {
            const field = document.querySelectorAll(`[data-type = "date"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value format split
                const parameter = document.getElementById(field[i].dataset.parameters);

                const value = parameter.value.split(`-`);

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                
                if (value.length === 3) {
                    field[i].innerHTML = `${label}: ${value[1]}/${value[2]}/${value[0]}`;
                    field[i].classList.remove(`warning`);
                }
                else if (parameter.dataset.required === `true`) {
                    field[i].innerHTML = `${label}: Value required`;
                    field[i].classList.add(`warning`);
                }
                else {
                    field[i].innerHTML = `${label}:`;
                }
            }
        },
        number: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "number"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value
                const value = parseInt(document.getElementById(field[i].dataset.parameters).value);

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                const placeholder = field[i].dataset.placeholder !== undefined ? field[i].dataset.placeholder : ``;

                field[i].innerHTML = `${label}${!isNaN(value) ? value : placeholder}`;
            }
        },
        total: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "total"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                const placeholder = field[i].dataset.placeholder !== undefined ? field[i].dataset.placeholder : ``;
                
                field[i].innerHTML = `${label}${!isNaN(total) ? total : placeholder}`;
            }
        },
        average: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "average"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                const placeholder = field[i].dataset.placeholder !== undefined ? field[i].dataset.placeholder : ``;

                field[i].innerHTML = `${label}${!isNaN(total) ? Math.round(total / parameters.length) : placeholder}`;
            }
        },
        remarks: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "remarks"]`);
            const threshold = 75;

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                const placeholder = field[i].dataset.placeholder !== undefined ? field[i].dataset.placeholder : ``;

                field[i].innerHTML = `${label}${!isNaN(total) ? (Math.round(total / parameters.length) >= threshold ? `Passed` : `Failed`) : placeholder}`;
            }
        },
        grand: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "grand"]`);
            const threshold = 75;

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value
                const parameters = JSON.parse(field[i].dataset.parameters);
                
                let total = 0;

                for (j = 0, jj = parameters.length; j < jj; j++) {
                    total += parseInt(document.getElementById(parameters[j]).value);
                }

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                const placeholder = field[i].dataset.placeholder !== undefined ? field[i].dataset.placeholder : ``;

                field[i].innerHTML = `${label}${!isNaN(total) ? (Math.round(total / parameters.length) >= threshold ? `Promoted` : `Failed`) : placeholder}`;
            }
        },
    };

    // Finalized: Interactibles - variables
    const interactibles = [`text`, `date`, `number`, `toggle`];
    const formWindow = document.getElementById(`form-wrapper`);
    const formLabelA = document.getElementById(`form-label-title`);
    const formLabelB = document.getElementById(`form-label-subtitle`);
    const formClose = document.getElementById(`form-close`);

    let lastParameter = undefined;

    // Finalized: Interactibles - open
    for (let i = 0, ii = interactibles.length; i < ii; i++) {
        const interactible = document.querySelectorAll(`[data-type = "${interactibles[i]}"]`);

        for (let j = 0, jj = interactible.length; j < jj; j++) {
            interactible[j].addEventListener(`click`, function () {
                formWindow.classList.add(`visible`);
                formWindow.classList.remove(`hidden`);

                lastParameter = document.getElementById(interactible[j].dataset.parameters);

                lastParameter.classList.add(`visible`);
                lastParameter.classList.remove(`hidden`);
    
                formLabelA.innerHTML = lastParameter.dataset.labelTitle;
                formLabelB.innerHTML = lastParameter.dataset.labelSubtitle;
            });
        }
    }

    // Finalized: Interactibles - close
    formClose.addEventListener(`click`, function () {
        formWindow.classList.add(`hidden`);
        formWindow.classList.remove(`visible`);

        lastParameter.classList.add(`hidden`);
        lastParameter.classList.remove(`visible`);

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