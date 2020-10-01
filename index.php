<?php

// If user's not logged then go to login page
session_start();
if (!isset($_SESSION['logged'])) {
  header('Location: login.php');
};

$site_title = "Banque des Développeurs";

require "template/nav.php"; ?>
<?php include "template/header.php"; ?>
<?php require_once "data/acounts.php" ?>
<?php $acounts = get_accounts(); ?>

<h4 class="text-center mx-auto my-2 bg-warning text-dark" style="width: 38%;">Récapitulatif de vos comptes et livrets</h4>

<!-- Cards -->
<div class="row justify-content-around">

<?php
  foreach ($acounts as $key => $value) :
?>

<article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header card-title text-center"><p><?php echo $value['name'] ?></p></div>
  <div class="card-header text-center"><p>Propriétaire : <?php echo $value['owner'] ?></p></div>
  <div class="card-header text-center"><p>Numéro de compte : <?php echo $value['number'] ?></p></div>
  <div class="card-body bg-white text-center p-1">
    <p class="card-text text-dark">Dernière opération : <br> <?php echo $value['last_operation'] ?>*</p>
    <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $value['amount'] ?> €*</h5>
    <a href="single.php<?php echo "?id=$key"; ?>" class="btn btn-secondary text-white">Voir</a>
    <a href="comptes.php<?php echo "?id=$key"; ?>" class="btn btn-secondary text-white">Retrait / Dépôt</a>
    <a href="delete.php<?php echo "?id=$key"; ?>" class="btn btn-secondary text-white">Clôturer</a>
    <p class="card-text text-center text-muted">* Sous réserves de vos dernières opérations bancaires.</p>
  </div>
</article>

<?php
  endforeach;
?>

<?php
  $JS = "<script src='public/js/layer.js'></script>";
include "template/footer.php"; ?>