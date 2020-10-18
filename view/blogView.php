<?php
$site_title = "BdD : Articles";
include "view/template/nav.php";
include "view/template/header.php";
?>

<h4 class="text-center mx-auto my-4 bg-warning text-dark" style="width: 35%;">Quoi de nouveau dans le monde bancaire ?</h4>
<div class="row mx-2 my-4 text-center" id="articleContainer"></div>
<div class="text-center"><a href="index.php" class="btn btn-secondary text-white">Retour</a></div>

<?php
$script = "<script src='public/js/blog.js'></script>";
include "view/template/footer.php";
?>