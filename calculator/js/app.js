const inputField = document.getElementById("inputField");
let selectedOperator = '';

function setOperator(operator) {
    if (selectedOperator !== '' && inputField.value.endsWith(selectedOperator)) {
        inputField.value = inputField.value.slice(0, -selectedOperator.length);
    }
    selectedOperator = operator;
    inputField.value += selectedOperator;
}

function appendToCalc(val) {
    inputField.value += val;
}

function clearInput() {
    inputField.value = "";
}

function calculate() {
    fetch('index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `problem=${encodeURIComponent(inputField.value)}`,
    })
        .then(response => response.json())
        .then(data => {
            inputField.value = data;
        })
        .catch(error => {
            inputField.value = error;
        })
}