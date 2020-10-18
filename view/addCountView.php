<?php
$site_title = "BdD : Souscrire";
include "view/template/nav.php";
include "view/template/header.php";
?>

<h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 35%;">Demande d'ouverture d'un compte</h4>
<div class="row">
  <div class="mb-4 mx-auto font-weight-bold text-center">
    <?php
      if(!empty($error)) {
        echo "<div class='alert alert-danger'><p>Erreur : </p><ul>$error</ul></div>";
      }
    ?>
    <form class="text-center mx-auto" method="POST" action="">
      <div class="form-group">
        <label for="countType">Type de compte :</label>
        <select class="form-control mx-auto" style="width: 11em;" id="countType" name="account_type" required>
          <option selectd value="Compte courant">Compte courant</option>
          <option value="Livret A" selected>Livret A</option>
          <option value="PEL">P.E.L.</option>
        </select>
      </div>
      <div class="form-group" style="white-space: pre-line;">
        <label for="amount">Montant* à l'ouverture :</label>
        <input style="width: 7em;" type="number" name="amount" id="amount" min="50" required pattern="[0-9]{1,9}[\.][0-9]{0, 2}">
        <span class="text-muted">* Un dépôt de 50 € est nécessaire pour l'ouverture d'un nouveau compte</span>
      </div>
      <div class="text-center">
        <button name="new_account" type="submit" class="btn btn-secondary text-white">Ouvrir</button>
        <a href="index.php" class="btn btn-secondary text-white">Retour</a>
      </div>
    </form>
  </div>
</div>

<?php include "view/template/footer.php"; ?>