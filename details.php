<?php

$site_title = "BdD : Détails compte";
require "data/acounts.php";
include "template/nav.php";
include "template/header.php";
require "database/session_start.php";
?>

<?php
if(!empty($_GET)):
  $compte = htmlspecialchars($_GET["id"]);
  $account = get_accounts()[$compte];
  if ($account):
?>
    <h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 40%;">Détails du compte</h4>
    <div class="row justify-content-center">
        <article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 20rem;">
            <div class="card-header card-title text-center"><p><?php echo $account["name"]; ?></p></div>
            <div class="card-header text-center"><p>Propriétaire : <?php echo $account["owner"]; ?></p></div>
            <div class="card-header text-center"><p>Numéro de compte : <?php echo $account["number"]; ?></p></div>
            <div class="card-body bg-white text-center p-1">
                <p class="card-text text-dark">Dernière opération : <br> <?php echo $account["last_operation"] ?>*</p>
                <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $account["amount"] ?> €*</h5>
                <a href="delete.php" class="btn btn-secondary text-white">Clôturer</a>
                <a href="comptes.php" class="btn btn-secondary text-white">Retrait / Dépôt</a>
                <a href="index.php" class="btn btn-secondary text-white">Retour</a>
                <p class="card-text text-center text-muted">* Sous réserves de vos dernières opérations bancaires.</p>
            </div>
        </article>
    </div>
<?php endif; ?>

<?php else: ?>
  <div class="alert alert-danger">
    <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
  </div>
<?php endif; ?>

<?php include "template/footer.php"; ?>