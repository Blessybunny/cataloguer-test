// Input behavior - form submit
(() => {
    const forms = document.getElementsByTagName(`form`);

    for (let i = 0, ii = forms.length; i < ii; i++) {
        forms[i].onkeypress = function (key) {
            if (key.keyCode == 13) key.preventDefault();
        }
    }
})();

// Input behavior - form confirmation
(() => {
    const submits = document.querySelectorAll(`input[type=submit]`);

    for (let i = 0, ii = submits.length; i < ii; i++) {
        submits[i].onclick = () => confirm(`Are you sure you want to proceed?`);
    }
})();

// Input bahavior - numbers
(() => {
    const numbers = document.querySelectorAll(`input[type = "number"]`);

    for (let i = 0, ii = numbers.length; i < ii; i++) {
        // For some reason, event listeners work when "on-" doesn't
        numbers[i].addEventListener(`focusout`, function () {
            const min = parseInt(this.min);
            const max = parseInt(this.max);

            if (this.value < min) this.value = min;
            if (this.value > max) this.value = max;
        }, true);

        // For some reason, event listeners don't work when "on-" does
        numbers[i].onkeydown = function (event) {
            return event.keyCode !== 69;
        };
    }
})();