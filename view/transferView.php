<?php
$site_title = "BdD : Virement";
include "view/template/nav.php";
include "view/template/header.php";
?>

<div class="row">
  <div class="col-sm-12">
    <h4 class="text-center offset-sm-4 my-4 mx-auto bg-warning text-dark" style="width: 30%">Effectuez un virement</h4>
    <form class="mb-4 offset-sm-5" style="font-weight: bolder; width: 480px;" method="POST" action="">
      <div class="form-group">
        <label for="debit">Compte à débiter :</label>
        <select class="form-control" style="width: 12em;" id="debit" name="debit" required>
          <option value="courant">Compte courant</option>
          <option value="livreta">Livret A</option>
          <option value="pel">P.E.L.</option>
        </select>
      </div>
      <div class="form-group">
        <label for="credit">Compte à créditer :</label>
        <select class="form-control" style="width: 12em;" id="credit" name="credit">
          <option value="courant">Compte courant</option>
          <option value="livreta">Livret A</option>
          <option value="pel">P.E.L.</option>
        </select>
        <p id="wrongAccount" class="text-dark bg-danger"></p>
      </div>
      <div class="form-group">
        <label for="amount">Montant* :</label>
        <input type="number" style="width: 7em;" name="amount" id="amount" min="1" required pattern="[0-9]{1,9}[\.][0-9]{0, 2}"><br>
        <span class="text-muted">* Montant minimum requis : 1 €. Montant exprimé en euros (€)</span>
        <p id="wrongAmount" class="text-dark bg-danger"></p>
      </div>
        <button type="submit" id="validation" class="btn btn-secondary text-white">Exécuter</button>
        <a href="index.php" class="btn btn-secondary text-white">Retour</a>
    </form>
  </div>
</div>

<?php
$script = "<script src='public/js/transfer.js'></script>";
include "view/template/footer.php"; ?>