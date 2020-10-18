<?php
require "model/accountModel.php";
// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

// Get all the accounts with the last operation
$accounts = get_accounts($db, $_SESSION["user"]);

if (isset($_POST["suppressAccount"]) && !empty($_POST)){
  suppressAccount($db, intval($accountOperations[0]["id"]));
  header("Location: index.php");
  exit();
}

require "view/indexView.php";
?>