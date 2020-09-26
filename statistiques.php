<?php

// If user's not logged then go to login page
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

$site_title = "BdD : Statistiques";

require "template/nav.php"; ?>

<?php include "template/headerStatistiques.php"; ?>

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

<?php include "template/footer.php"; ?>

<!-- Optional JavaScript -->
<script src="public/js/statistiques.js"></script>