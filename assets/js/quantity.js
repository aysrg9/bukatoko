const myInput = document.getElementById("quantity");

function stepper(btn) {
    let id = btn.getAttribute("id");
    let min = myInput.getAttribute("min");
    let max = myInput.getAttribute("max");
    let step = myInput.getAttribute("step");
    let val = myInput.getAttribute("value");
    let calcStep = (id == "increment") ? (step * 1) : (step * -1);
    let newValue = parseInt(val) + calcStep;

    if (newValue >= min && newValue <= max) {
        myInput.setAttribute("value", newValue);
    }
}

const myInputMobile = document.getElementById("quantitymobile");

function steppermobile(btn) {
    let id = btn.getAttribute("id");
    let min = myInputMobile.getAttribute("min");
    let max = myInputMobile.getAttribute("max");
    let step = myInputMobile.getAttribute("step");
    let val = myInputMobile.getAttribute("value");
    let calcStep = (id == "incrementmobile") ? (step * 1) : (step * -1);
    let newValue = parseInt(val) + calcStep;

    if (newValue >= min && newValue <= max) {
        myInputMobile.setAttribute("value", newValue);
    }
}