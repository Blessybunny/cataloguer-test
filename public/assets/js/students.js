// SF9-10 behavior
(() => {
    const average = () => {
        const field = document.querySelectorAll(`[data-property = "average"]`);
    
        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;
            
            let total = 0;
            
            for (j = 0; j < length; j++) total += parseInt(document.getElementsByName(targets[j])[0].value);
    
            field[i].innerHTML = !isNaN(total) ? Math.round(total / length) : ``;
        }
    };
    const remarks = () => {
        const field = document.querySelectorAll(`[data-property = "remarks"]`);
        const threshold = 75;

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;
            
            let total = 0;

            for (j = 0; j < length; j++) total += parseInt(document.getElementsByName(targets[j])[0].value);

            field[i].innerHTML = !isNaN(total) ? (Math.round(total / length) >= threshold ? `Passed` : `Failed`) : ``;
        }
    };
    const grand = () => {
        const field = document.querySelectorAll(`[data-property = "grand"]`);
        const threshold = 75;

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            const length = targets.length;
            
            let total = 0;

            for (j = 0; j < length; j++) total += parseInt(document.getElementsByName(targets[j])[0].value);

            field[i].innerHTML = !isNaN(total) ? (Math.round(total / length) >= threshold ? `Promoted` : `Failed`) : ``;
        }
    };
    const total = () => {
        const field = document.querySelectorAll(`[data-property = "total"]`);

        for (let i = 0, ii = field.length; i < ii; i++) {
            const targets = JSON.parse(field[i].dataset.targets);
            
            let total = 0;

            for (j = 0, jj = targets.length; j < jj; j++) total += parseInt(document.getElementsByName(targets[j])[0].value);

            field[i].innerHTML = !isNaN(total) ? total : ``;
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
        numbers[i].addEventListener('focusout', function () {
            setTimeout(() => {
                average();
                remarks();
                grand();
                total();
            }, buffer);
        });
    }

})();