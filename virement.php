<?php

$site_title = "BdD : Virement";
require "template/nav.php";
include "template/header.php";
require "database/session_start.php";
?>

<div class="row">
    <div class="col-sm-10">
    <h4 class="text-center offset-sm-4 my-4 bg-warning text-dark" style="width: 50%">Effectuez un virement entre vos comptes</h4>
    <form class="mb-4 offset-sm-4" style="font-weight: bolder; width: 450px;">
        <div class="form-group">
            <label for="bankAccountType">Choix du compte depuis lequel le virement sera effectif :</label>
            <select class="form-control" id="accountDebit" required>
                <option value="compteCourant">Compte Courant</option>
                <option value="livretA">Livret A</option>
                <option value="PEL">P.E.L.</option>
                <option value="livretDeveloppementDurable">Livret Développement Durable</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amountTransfert">Montant à transferer :</label>
            <input type="float" class="form-control" id="amountTransfert" placeholder="Mininum requis : 1€" required pattern="[0-9]{1,9}[\.][0-9]{0, 2}" min="1">
            <p id="wrongAmount" class="text-muted"></p>
        </div>
        <div class="form-group">
            <label for="bankAccountType">Choix du compte vers lequel le virement sera effectif :</label>
            <select class="form-control" id="accountCredit">
            <option value="compteCourant">Compte Courant</option>
            <option value="livretA">Livret A</option>
            <option value="PEL">P.E.L.</option>
            <option value="livretDeveloppementDurable">Livret Développement Durable</option>
            </select>
            <p id="wrongAccount" class="text-muted"></p>
        </div>
        <input id="validation" type="submit" value="Valider le virement" class="btn btn-secondary text-white">
    </form>
    </div>
</div>

<?php
    $JS = "<script src='public/js/virement.js'></script>";
include "template/footer.php"; ?>