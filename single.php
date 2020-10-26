<?php
require "model/accountManager.php";
require "model/entity/user.php";
require "model/entity/account.php";
require "model/entity/operation.php";

// Check if user id logged and redirect to login if not
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}


// Check url parameter and redirect if not present
if (empty($_GET) || !isset($_GET["id"])) {
  header("Location: index.php");
}
// If id is in url sanitize it and get the matching account with the operations
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
$accountManager = new AccountManager();
$account = $accountManager->getSingleAccount($id, $_SESSION["user"]);

// If not account matched the id or is not owned by the current user make an error message
if(!$account) {
  $error ="Nous avons rencontré un problème, aucun compte ne correspond à votre demande";
}

require "view/singleView.php";
?>