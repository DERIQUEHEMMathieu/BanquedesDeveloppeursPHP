let amount = document.getElementById("amount");
let validation = document.getElementById("validation");
let amountFalse = document.getElementById("wrongAmount");

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