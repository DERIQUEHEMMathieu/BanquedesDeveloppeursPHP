<?php
$site_title = "BdD : Détails compte";
include "view/template/nav.php";
include "view/template/header.php";

// if no error deteted
if(!isset($error)):
?>
    <h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 40%;">Détails du compte</h4>
    <div class="row mt-5">
      <div class="col-12 col-md-6 col-lg-4">
        <article class="card">
          <div class="card-header text-dark bg-warning">
            <h5 class="card-title font-weight-bold"><?php echo $account->getAccount_type();?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Numéro de compte : <?php echo $account->getId();?></h6>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush border-bottom mb-2 font-weight-bold">
              <li class="list-group-item">Propriétaire : <?php echo $_SESSION["user"]->getFirstname() . " " . $_SESSION["user"]->getLastname();?></li>
              <li class="list-group-item">Solde : <?php echo $account->getAmount() . " " . "€";?></li>
              <li class="list-group-item">Date d'ouverture : <?php echo $account->getOpening_date();?></li>
            </ul>
            <a href="operation.php?id=<?php echo $account['id']; ?>" class="btn btn-secondary text-white">Dépôt / Retrait</a>
            <a href="index.php" class="btn btn-secondary text-white">Retour</a>
          </div>
          <form class="m-0 p-0" method="POST" id="suppressAccount" action="single.php">
            <input type="hidden" name="suppressAccount" value="">
            <button type="submit" class="col-12 btn btn-danger btn-lg p-1 m-0 text-center" name="suppressAccount">Supprimer le compte</button>
          </form>
        </article>
      </div>
      <div class="col-12 col-md-6 col-lg-8">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Label</th>
              <th scope="col">Date</th>
              <th scope="col">Type</th>
              <th scope="col">Montant</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($account->getOperations() as $operation) : ?>
              <tr>
                <th><?php echo $operation->getId(); ?></th>
                <td><?php echo $operation->getLabel(); ?></td>
                <td><?php echo $operation->getRegistered(); ?></td>
                <td><?php echo $operation->getOperation_type(); ?></td>
                <td><?php echo $operation->getOperation_amount(); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
<?php else: ?>
  <div class="alert alert-danger">
    <p><?php echo $error ?></p>
  </div>
<?php endif; ?>

<?php include "view/template/footer.php"; ?>
