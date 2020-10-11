<?php
// If user's not logged then go to login page
session_start();
if(!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    header("Location: login.php");
}
?>