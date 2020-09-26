<?php

// If user's not logged then go to login page
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

$site_title = "BdD : Suppression";

require "template/nav.php"; ?>

<?php include "template/header.php"; ?>




<?php include "template/footer.php"; ?>