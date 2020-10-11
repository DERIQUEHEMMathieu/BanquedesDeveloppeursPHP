<?php

$site_title = "BdD : Souscrire";
require "template/nav.php";
include "template/header.php";
require "database/session_start.php";
require "database/connectdatabase.php";
?>

<?php
$infos = ["accountName","amount"];

foreach($infos as $key => $value) :
  $$value="Nous connaissons un problème : absence de données.";
  if(isset($_POST[$value]) && !empty($_POST[$value])){
    $$value=htmlspecialchars($_POST[$value]);
}

endforeach;
?>

<h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 35%;">Demande d'ouverture d'un compte</h4>
<div class="row">
  <div class="mb-4 mx-auto font-weight-bold text-center">
    <form class="" method="POST" action="" id="souscrire" name="soucrire">
      <div class="form-group">
        <p class="mt-3 text-center">Titulaire : <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></p>
      </div>
      <div class="form-group">
        <label for="countType">Sélectionnez un type de compte</label>
        <select class="form-control mx-auto" style="width: 200px;" id="accountType" name="accountName">
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
  <?php endif; ?>
</div>

<?php
$user_id = $_SESSION["user"]["id"];
$queryAccountType = $db ->query(
  "SELECT account_type
  FROM Account
  WHERE user_id = $user_id
  "
);
$accountsOwned = $queryAccountType -> fetchAll(PDO::FETCH_ASSOC);

  if(isset($_POST)&& !empty($_POST)){
    if (intval($_POST["amount"])<50){
      ?>
      <p class="btn-danger col-3 text-center"> <?php  echo "montant minimum 50 euros"; ?></p>
     <?php
    }

    else {
      ?>
    <div class="row">
      <div class="mb-4 mx-auto font-weight-bold text-center">
        <article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 22rem;">
          <div class="card-header card-title text-center"><p><?php echo $accountName?></p></div>
          <div class="card-header text-center"><p>Propriétaire : <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></p></div>
          <div class="card-header text-center"><p>Numéro de compte : 0<?php echo $account_number; ?> fr 45</p></div>
          <div class="card-body bg-white text-center p-1">
            <!-- <p class="card-text text-dark">Dernière opération : <br> Dépôt de <?php echo $account["amount"] ?> €</p> -->
            <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $amount ?> €</h5>
            <a href="delete.php" class="btn btn-secondary text-white">Clôturer</a>
            <a href="comptes.php" class="btn btn-secondary text-white">Retrait / Dépôt</a>
            <a href="index.php" class="btn btn-secondary text-white">Retour</a>
          </div>
        </article>
        <p class="btn-success text-center"> <?php  echo "Votre compte est créé"; ?></p>
      </div>
    </div>
  <?php
    $query = $db ->prepare(
      "INSERT INTO Account(amount, opening_date, account_type, user_id)
      VALUES (:amount,  NOW(), :account_type,:id)"
    );

    $result = $query->execute([
      "amount" => $_POST["amount"],
      "account_type" => $_POST["accountName"],
      "id" => $_SESSION["user"]["id"]
    ]);
  }
}
?>

<?php include "template/footer.php"; ?>