<?php

// If user's not logged then go to login page
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

$site_title = "BdD : Souscrire";

require "template/nav.php"; ?>

<?php include "template/header.php"; ?>

<h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 35%;">Demande d'ouverture d'un compte</h4>
<div class="row">
  <div class="mb-4 mx-auto font-weight-bold text-center">
    <form class="" method="post" action="">
      <div class="form-group">
        <label for="countType">Sélectionnez le titulaire du compte</label>
        <select class="form-control mx-auto" style="width: 230px;" name="identity" id="user_identity">
          <option selected value="Mr Deriquehem Mathieu">Mr Deriquehem Mathieu</option>
        </select>
      </div>
      <div class="form-group">
        <label for="countType">Sélectionnez un type de compte</label>
        <select class="form-control mx-auto" style="width: 200px;" id="countType" name="name">
          <option selected value="Compte courant">Compte courant</option>
          <option value="livret A">Livret A</option>
          <option value="PEL">PEL</option>
        </select>
      </div>
      <div class="form-group" style="white-space: pre-line;">
        <label for="amount">Indiquez un montant à déposer sur le compte*</label>
        <input style="width: 100px;" type="float" name="amount" id="amount" min="50" value="50">
        <span class="text-muted">* Un dépôt de 50 € est nécessaire pour l'ouverture d'un nouveau compte</span>
      </div>
      <div class="text-center">
        <button name="new_account" type="submit" class="btn btn-secondary text-white">Lancez la création</button>
      </div>
    </form>
  </div>

  <?php
  $account_number = rand(132520020,132520099);
  ?>

    <?php
    if(isset($_POST["new_account"])):
      $account = array_map("htmlspecialchars", $_POST); // array_map : Applique une fonction sur les éléments d'un tableau
      // You can use array_map() to run that method on each entry ($variableName = array_map("htmlspecialchars", $myArray);)
    ?>

    <div class="mb-4 font-weight-bold text-center">
      <article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 22rem;">
        <div class="card-header card-title text-center"><p><?php echo $account["name"]; ?></p></div>
        <div class="card-header text-center"><p>Propriétaire : <?php echo $account["identity"]; ?></p></div>
        <div class="card-header text-center"><p>Numéro de compte : 0<?php echo $account_number; ?> fr 45</p></div>
        <div class="card-body bg-white text-center p-1">
          <p class="card-text text-dark">Dernière opération : <br> Dépôt de <?php echo $account["amount"] ?> €</p>
          <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $account["amount"] ?> €</h5>
          <a href="delete.php" class="btn btn-secondary text-white">Clôturer</a>
          <a href="comptes.php" class="btn btn-secondary text-white">Retrait / Dépôt</a>
          <a href="index.php" class="btn btn-secondary text-white">Retour</a>
        </div>
      </article>
    </div>

  <?php endif; ?>
</div>

<?php include "template/footer.php"; ?>

