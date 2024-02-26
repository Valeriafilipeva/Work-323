let input = document.getElementById('input');
let display = document.getElementById('display');

function appendNumber(number) {
    display.textContent += number;
    input.value = display.textContent;
}

function appendOperator(operator) {
    display.textContent += operator;
    input.value = display.textContent;
}

function clearInput() {
    display.textContent = '0';
    input.value = '';
}

function calculate() {
    fetch('calculate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `expression=${input.value}`
    })
    .then(response => response.text())
    .then(data => {
        display.textContent = data;
        input.value = data;
    })
    .catch(error => console.error('Error:', error));
}
