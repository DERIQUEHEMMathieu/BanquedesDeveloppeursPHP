<?php
require "model/accountManager.php";

// Check if user id logged and redirect to login if not
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}


// Check url parameter and redirect if not present
if (empty($_GET) || !isset($_GET["id"])) {
  header("Location: index.php");
}
$accountManager = new AccountManager();
$id = $_GET["id"];
$account = $accountManager->get_single_account($id);
// If id is in url sanitize it and get the matching account with the operations
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
$operations = $accountManager->get_single_account($id);
$account = $operations[0];
// If not account matched the id or is not owned by the current user make an error message
if(!$account || ($account["user_id"] !== $_SESSION["user"]["id"])) {
  $error ="Nous avons rencontré un problème, aucun compte ne correspond à votre demande";
}


if (isset($_POST["suppressAccount"]) && !empty($_POST)){
  $accountManager = new AccountManager();
  $suppressAccount = $accountManager->suppressAccount(intval($account["id"]));
  header("Location: index.php");
  exit();
}

require "view/singleView.php";
?>