(() => {
    // Finalized: Refresher
    const refresher = {
        all: function () {
            this.text();
            this.number();
            this.total();
            this.average();
            this.remarks();
            this.grand();
        },
        text: () => {
            // Fields
            const field = document.querySelectorAll(`[data-type = "text"]`);

            for (let i = 0, ii = field.length; i < ii; i++) {
                // Value white-space clean-up
                const parameter = document.getElementById(field[i].dataset.parameters);

                parameter.value = parameter.value.trim();

                const value = parameter.value;

                // Print
                const label = field[i].dataset.label !== undefined ? field[i].dataset.label : ``;
                const placeholder = field[i].dataset.placeholder !== undefined ? field[i].dataset.placeholder : ``;

                field[i].innerHTML = `${label}${value !== `` ? value : placeholder}`;
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
    const interactibles = [`text`, `number`, `toggle`];
    const formWindow = document.getElementById(`form-wrapper`);
    const formLabelA = document.getElementById(`form-label-a`);
    const formLabelB = document.getElementById(`form-label-b`);
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
    
                formLabelA.innerHTML = lastParameter.dataset.labelA;
                formLabelB.innerHTML = lastParameter.dataset.labelB;
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
})();