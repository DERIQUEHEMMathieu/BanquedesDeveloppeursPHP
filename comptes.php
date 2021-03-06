<?php
$site_title = "BdD : Retrait / Dépôt";
require "template/nav.php";
include "template/header.php";
require "database/session_start.php";
require "database/connectdatabase.php";
?>

<div class="row">
    <div class="col-sm-10">
        <h4 class="text-center offset-sm-3 my-4 bg-warning text-dark" style="width: 60%;">Effectuez un dépôt ou un retrait sur vos comptes</h4>
        <form class="mb-4 offset-sm-4" style="font-weight: bolder; width: 390px;" action="" method="POST" id="">
        <div class="form-group">
            <label for="baseAmount">Dépôt :</label>
            <input type="float" class="form-control mb-2" id="amount" placeholder="Minimum : 1€" min="1" required pattern="[0-9]{1,9}[\.][0-9]{0, 2}">
            <p id="wrongAmount" class="text-muted mb-2"></p>
            <label for="bankAccountType">Choix du compte vers lequel le dépôt sera effectif :</label>
            <select class="form-control" id="accountIn" required >
                <option value="compteCourant">Compte Courant</option>
                <option value="livretA">Livret A</option>
                <option value="PEL">P.E.L.</option>
                <option value="livretDeveloppementDurable">Livret Développement Durable</option>
            </select>
        </div>
        <input type="submit" value="Valider" id="validation" class="btn btn-secondary text-white mb-4">
        <div class="form-group">
            <label for="baseAmount">Retrait :</label>
            <input type="float" class="form-control mb-2" id="amountOut" placeholder="Minimum : 1€" min="1" required pattern="[0-9]{1,9}[\.][0-9]{0, 2}">
            <p id="wrongAmountOut" class="text-muted mb-2"></p>
            <label for="bankAccountType">Choix du compte depuis lequel le retrait sera effectif :</label>
            <select class="form-control" id="accountOut" required >
                <option value="compteCourant">Compte Courant</option>
                <option value="livretA">Livret A</option>
                <option value="PEL">P.E.L.</option>
                <option value="livretDeveloppementDurable">Livret Développement Durable</option>
            </select>
        </div>
        <input type="submit" value="Valider" id="validationTwo" class="btn btn-secondary text-white">
        </form>
    </div>
</div>

<?php
    $JS = "<script src='public/js/comptes.js'></script>";
include "template/footer.php"; ?>