// SF9-10 behavior
(() => {
    const average = () => {
        const field = document.querySelectorAll(`[data-property = "average"]`);

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;

            let total = 0;
            let skip = 0;

            for (let j = 0; j < length; j++) {
                const target = document.getElementsByName(targets[j])[0];

                if (target !== undefined) total += parseInt(target.value);
                else skip++;
            }

            field[i].innerHTML = !isNaN(total) && skip === 0 ? Math.round(total / (length - skip)) : `&nbsp;`;
        }
    };
    const remarks = () => {
        const field = document.querySelectorAll(`[data-property = "remarks"]`);
        const threshold = 75;

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;

            let total = 0;
            let skip = 0;

            for (let j = 0; j < length; j++) {
                const target = document.getElementsByName(targets[j])[0];

                if (target !== undefined) total += parseInt(target.value);
                else skip++;
            }

            field[i].innerHTML = !isNaN(total) && skip === 0 ? (Math.round(total / (length - skip)) >= threshold ? `Passed` : `Failed`) : `&nbsp;`;
        }
    };
    const grand = () => {
        const field = document.querySelectorAll(`[data-property = "grand"]`);
        const threshold = 75;

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;

            let total = 0;
            let skip = 0;

            for (let j = 0; j < length; j++) {
                const target = document.getElementsByName(targets[j])[0];

                if (target !== undefined) total += parseInt(target.value);
                else skip++;
            }

            field[i].innerHTML = !isNaN(total) && skip === 0 ? (Math.round(total / length) >= threshold ? `Promoted` : `Failed`) : `&nbsp;`;
        }
    };
    const total = () => {
        const field = document.querySelectorAll(`[data-property = "total"]`);

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;

            let total = 0;

            for (let j = 0; j < length; j++) {
                const target = document.getElementsByName(targets[j])[0];

                if (target !== undefined) total += parseInt(target.value);
            }

            field[i].innerHTML = !isNaN(total) ? total : `&nbsp;`;
        }
    };

    window.onload = () => {
        average();
        remarks();
        grand();
        total();
    };

    const numbers = document.querySelectorAll(`input[type = "number"]`);
    const buffer = 250;

    for (let i = 0,  ii = numbers.length; i < ii; i++) {
        numbers[i].addEventListener(`focusout`, function () {
            setTimeout(() => {
                average();
                remarks();
                grand();
                total();
            }, buffer);
        });
    }
})();
(() => {
    const highlight = document.getElementById(`highlight`);

    if (highlight !== null) {
        const highlights = document.getElementsByClassName(`highlight`);

        let toggle = false;

        highlight.onclick = () => {
            let color = toggle ? `transparent` : `rgba(100, 250, 100, 0.25)`;

            for (let i = 0, ii = highlights.length; i < ii; i++) {
                highlights[i].style.backgroundColor = color;
            }

            toggle = !toggle;
        };
    }
})();