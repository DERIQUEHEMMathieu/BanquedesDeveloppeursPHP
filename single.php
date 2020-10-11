<?php

$site_title = "BdD : Détails compte";
require "data/acounts.php";
include "template/nav.php";
include "template/header.php";
require "database/session_start.php";
require "database/connectdatabase.php";

$accountNumber = $_GET["id"];

// send the query to mysql
$query = $db -> query(
    "SELECT a.id, a.amount, o.id, o.operation_type, a.account_type, o.amount, o.label 
    FROM Account AS a
    LEFT JOIN Operation AS o
    ON a.id = o.account_id
    WHERE a.id = $accountNumber
");

$accountOperations = $query -> fetchAll(PDO::FETCH_ASSOC);
?>

<?php
if($accountOperations):
?>
    <h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 40%;">Détails du compte</h4>
    <div class="row justify-content-center">
        <article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 20rem;">
            <div class="card-header card-title text-center"><p><?php echo $accountOperations[0]["account_type"]?> <?php echo $_SESSION["user"]["lastname"]. " ".$_SESSION["user"]["firstname"] ?></p></div>
            <!-- <div class="card-header text-center"><p>Propriétaire : <?php echo $account["owner"]; ?></p></div> -->
            <div class="card-header text-center"><p>Numéro de compte : <?php echo $accountOperations[0]["id"]?></p></div>
            <div class="card-body bg-white text-center p-1">
            <?php
            foreach ($accountOperations as $key => $value):
            ?>
                <p class="card-text text-dark">Dernière opération : <br> <?php echo $accountOperations[$key]["label"]. " ".$accountOperations[$key]["operation_type"]. " ".$accountOperations[$key]["amount"]?>*</p>
            <?php endforeach; ?>
                <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $accountOperations[0]["amount"] ?> €*</h5>
                <a href="delete.php" class="btn btn-secondary text-white">Clôturer</a>
                <a href="comptes.php" class="btn btn-secondary text-white">Retrait / Dépôt</a>
                <a href="index.php" class="btn btn-secondary text-white">Retour</a>
                <p class="card-text text-center text-muted">* Sous réserves de vos dernières opérations bancaires.</p>
            </div>
        </article>
    </div>

<?php else: ?>
  <div class="alert alert-danger">
    <p>Nous avons rencontré un problème, aucun compte ne correspond à votre demande</p>
  </div>
<?php endif; ?>

<?php include "template/footer.php"; ?>