<?php
$site_title = "Banque des Développeurs";
include "view/template/nav.php";
include "view/template/header.php";
?>

<h4 class="text-center mx-auto my-2 bg-warning text-dark" style="width: 38%;">Récapitulatif de vos comptes et livrets</h4>

<div class="row justify-content-around">

  <?php foreach ($accounts as $account): ?>

  <!-- <div class="col-12 col-md-6 col-lg-4 my-2"> -->
    <article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 18rem;">
      <div class="card-header card-title text-center"><p><?php echo $account["account_type"]; ?></p></div>
      <div class="card-header text-center"><p>Propriétaire : <?php echo $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"]; ?></p></div>
      <div class="card-header text-center"><p>Numéro de compte : <?php echo $account["id"]; ?></p></div>
      <div class="card-body bg-white text-center p-1">
        <p class="card-text text-dark">Dernière opération* : <br> <?php echo $account["label"] . "<br>" . $account["operation_amount"] . "<br>" . $account["registered"]; ?></p>
        <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $account["amount"]; ?> €*</h5>
        <a href="single.php?id=<?php echo $account['id']; ?>" class="btn btn-secondary text-white">Voir</a>
        <a href="operation.php?id=<?php echo $account['id']; ?>" class="btn btn-secondary text-white">Retrait / Dépôt</a>
        <form class="m-0 p-0" method="post" id="suppressAccount" name="suppAccount">
          <button type="submit" class="col-12 btn btn-danger btn-lg p-1 m-0 text-center" name="suppressAccount">Supprimer le compte</button>
        </form>
        <p class="card-text text-center text-muted">* Sous réserves de vos dernières opérations bancaires.</p>
      </div>
    </article>
  <!-- </div> -->
<?php endforeach; ?>

</div>

<?php
 $script = "<script src='public/js/layer.js'></script>";
 include "view/template/footer.php";
?>