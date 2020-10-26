<?php
require "model/accountManager.php";
require "model/entity/user.php";
require "model/entity/account.php";
require "model/entity/operation.php";

// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

$accountManager = new AccountManager();
$accounts = $accountManager->getAccounts($_SESSION["user"]);

require "view/indexView.php";
?>


