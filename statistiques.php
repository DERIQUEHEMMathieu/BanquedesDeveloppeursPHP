<?php

$site_title = "BdD : Statistiques";
require "template/nav.php";
include "template/headerStatistiques.php"; 
require "database/session_start.php";
?>

<table class="table">
    <thead class="text-dark bg-warning font-weight-bold">
        <th> Pays</th>
        <th> Indice Boursier</th>
        <th> Valeur</th>
        <th> Indexation</th>
    </thead>
    <tbody id="valuesList">
    </table>
    <input type="button" value="Afficher les valeurs boursières" class="btn btn-secondary text-white" onclick="createArray()"></input>

<?php
    $JS = "<script src='public/js/statistiques.js'></script>";
include "template/footer.php"; ?>