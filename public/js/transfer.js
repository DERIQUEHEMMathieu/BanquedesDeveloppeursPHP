let accountChoice = document.getElementById("debit");
let accountToCredit = document.getElementById("credit");
let amountToTransfert = document.getElementById("amount");
let validation = document.getElementById("validation");
let accountFalse = document.getElementById("wrongAccount");
let amountFalse = document.getElementById("wrongAmount");

accountToCredit.addEventListener("focusout", function() {
    let choice = this.value;
    for (let i = 0; i < this.length ; i ++) {
        if (accountChoice.value === choice) {
            this.style.borderColor = "red";
            accountFalse.innerText = "Veuillez selectionner un compte différent";
            validation.disabled=true;
        }
        else {
            this.style.borderColor = "green";
            accountFalse.innerText = "";
        }
    }
});

amountToTransfert.addEventListener("focusout", function() {
    if(this.value === "") {
        this.style.borderColor = "red";
        amountFalse.innerText = "Veuillez rentrer un montant superieur à 0€";
        validation.disabled=true;
    }
    else {
        this.style.borderColor = "green";
        amountFalse.innerText = "";
    }
})