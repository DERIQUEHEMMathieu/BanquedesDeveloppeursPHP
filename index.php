<?php

$site_title = "Banque des Développeurs";
require "template/nav.php";
include "template/header.php";
require_once "data/acounts.php";
require "database/session_start.php";
?>

<?php

try{
  $db = new PDO('mysql:host=localhost;dbname=banque_php', 'BanquePHP', 'banque76');

} catch (PDOException $e){
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

$userID= intval($_SESSION['user']["id"]);

$query = $db -> query(
  "SELECT *
  FROM User AS u
  INNER JOIN Account AS a
  ON u.id = a.user_id
  WHERE u.id = $userID
  "
);

$accounts = $query -> fetchAll(PDO::FETCH_ASSOC);?>

<h4 class="text-center mx-auto my-2 bg-warning text-dark" style="width: 38%;">Récapitulatif de vos comptes et livrets</h4>

<div class="row justify-content-around">

<?php
foreach ($accounts as $key => $value):
?>

<!-- Cards -->
<article class="card text-dark bg-warning font-weight-bold my-4 px-0 col-4" style="max-width: 18rem;">
  <div class="card-header card-title text-center"><p><?php echo  $value["account_type"]?></p></div>
  <div class="card-header text-center"><p>Propriétaire : <?php echo $value["lastname"] . " " . $value["firstname"]?></p></div>
  <div class="card-header text-center"><p>Numéro de compte : <?php echo $value["id"]?></p></div>
  <div class="card-body bg-white text-center p-1">
    <!-- <p class="card-text text-dark">Dernière opération : <br> <?php echo $value['last_operation'] ?>*</p> -->
    <h5 class="card-title text-danger font-weight-bold">Solde : <?php echo $value["amount"] ?> €*</h5>
    <a href="single.php<?php echo "?id=" . $value['id']; ?>" class="btn btn-secondary text-white">Voir</a>
    <a href="comptes.php<?php echo "?id=$key"; ?>" class="btn btn-secondary text-white">Retrait / Dépôt</a>
    <a href="delete.php<?php echo "?id=$key"; ?>" class="btn btn-secondary text-white">Clôturer</a>
    <p class="card-text text-center text-muted">* Sous réserves de vos dernières opérations bancaires.</p>
  </div>
</article>

<?php
  endforeach;
?>

</div>

<?php
  $JS = "<script src='public/js/layer.js'></script>";
include "template/footer.php";
?>