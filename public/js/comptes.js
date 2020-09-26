let amount = document.getElementById("amount");
let validation = document.getElementById("validation");
let amountFalse = document.getElementById("wrongAmount");
let amountOut = document.getElementById("amountOut");
let validationTwo = document.getElementById("validationTwo");
let amountOutFalse = document.getElementById("wrongAmountOut");

amount.addEventListener("focusout", function() {
    if(this.value === "") {
        this.style.borderColor = "red";
        amountFalse.innerText = "Veuillez rentrer un montant supérieur à 0€";
        validation.disabled=true;
    }
    else {
        this.style.borderColor = "green";
        amountFalse.innerText = "";
    }
})

amountOut.addEventListener("focusout", function() {
    if(this.value === "") {
        this.style.borderColor = "red";
        amountOutFalse.innerText = "Veuillez rentrer un montant supérieur à 0€";
        validationTwo.disabled=true;
    }
    else {
        this.style.borderColor = "green";
        amountOutFalse.innerText = "";
    }
})