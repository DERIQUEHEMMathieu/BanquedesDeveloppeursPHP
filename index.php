<?php
require "model/accountManager.php";

// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

 $accountManager = new AccountManager();

 $accounts = $accountManager->get_accounts($_SESSION["user"]);

require "view/indexView.php";
?>


