<?php
require "model/accountManager.php";
require "model/entity/user.php";
require "model/entity/account.php";

session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

if(isset($_POST["new_account"])) {
  try {
    $account = new Account($_POST);
    $account->setUser($_SESSION["user"]);
  } catch (\Exception $e) {
    // Will store the different error messages
    $error = $e->getMessage();
  }
  // If no error has been found
  if(empty($error)) {
    // Add the account in DB
    $accountManager = new AccountManager();
    $result = $accountManager->newAccount($account);
    // If insert is a success redirect on home page
    if($result) {
      header("Location: index.php");
      exit();
    }
    $error = "Une erreur est survenue, votre compte n'a pas été enregistré";
  }
}

require "view/addCountView.php";
?>
