<?php
$site_title = "Banque des Développeurs";
include "view/template/nav.php";
include "view/template/header.php";
?>

<h4 class="text-center mx-auto my-2 bg-warning text-dark" style="width: 38%;">Récapitulatif de vos comptes et livrets</h4>

<div class="row justify-content-around">

  <?php foreach ($accounts as $account): ?>

  <article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 18rem;">
    <div class="card-header card-title text-center"><p><?php echo $account->getAccount_type();?></p></div>
    <div class="card-header text-center"><p>Propriétaire : <?php echo $_SESSION["user"]->getFirstname() . " " . $_SESSION["user"]->getLastname();?></p></div>
    <div class="card-header text-center"><p>Numéro de compte : <?php echo $account->getId();?></p></div>
    <div class="card-body bg-white text-center p-1">
      <p class="card-text text-dark">Dernière opération* : <br> <?php
              if(!empty($account->getLast_operation())) {
                echo $account->getLast_operation()->getLabel() . "<br>" . $account->getLast_operation()->getOperation_amount() . " le " . $account->getLast_operation()->getRegistered();
              }
      ?>
      </p>
      <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $account->getAmount();?> €*</h5>
      <a href="single.php?id=<?php echo $account->getId();?>" class="btn btn-secondary text-white">Voir</a>
      <a href="operation.php?id=<?php echo $account->getId();?>" class="btn btn-secondary text-white">Retrait / Dépôt</a>
      <p class="card-text text-center text-muted">* Sous réserves de vos dernières opérations bancaires.</p>
    </div>
  </article>

<?php endforeach; ?>

</div>

<?php
 $script = "<script src='public/js/layer.js'></script>";
 include "view/template/footer.php";
?>