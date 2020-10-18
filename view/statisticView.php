<?php
$site_title = "BdD : Valeurs boursières";
include "view/template/nav.php";
include "view/template/header.php";
?>

<h4 class="text-center offset-sm-3 my-4 mx-auto bg-warning text-dark" style="width: 25%;">La bourse en direct</h4>

<table class="table table-striped mt-3">
  <thead class="text-dark bg-warning font-weight-bold">
    <tr>
      <th scope="col">Pays</th>
      <th scope="col">Indicateur</th>
      <th scope="col">Valeur</th>
      <th scope="col">Variation</th>
    </tr>
  </thead>
  <tbody id="statTable">
  </tbody>
</table>
<div class="text-center">
  <a href="index.php" class="btn btn-secondary text-white">Retour</a>
</div>

<?php
$script = "<script src='public/js/statistic.js'></script>";
include "view/template/footer.php";
?>