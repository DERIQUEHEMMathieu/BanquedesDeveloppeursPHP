<?php
require "model/accountModel.php";
require "model/operationModel.php";

// Check if user is logged
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}

if(!empty($_POST) && isset($_POST["operation"])) {
  // Check for empty values (array filter removes empty values from array)
  $empty_values = array_filter($_POST);
  // If some values are empty
  if(count($empty_values) !== count($_POST)) {
    $error = "Tous les champs doivent être remplis";
  }
  else {
    // Try to find the account selected in the form
    $account = get_only_account($db, $_POST["account_id"], $_SESSION["user"]);
    // If an account has been found
    if($account) {
      // Update the amount of the account according to the type of operation
      if($_POST["operation_type"] === "débit") {
        $account["amount"] = floatval($account["amount"]) - floatval($_POST["amount"]);
        $_POST["amount"] = "-" . $_POST["amount"];
      }
      else {
        $account["amount"] = floatval($account["amount"]) + floatval($_POST["amount"]);
      }
      // Register the operation in DB
      $new_op = new_operation($db, $_POST);
      // If the operation has successfully been registered
      if($new_op) {
        // Update the amount of the account in DB
        $result = update_account_amount($db, $account);
        // If the update is a success make a message diplayed in view
        if($result) {
          $success = "Votre opération a bien été enregistrée";
        }
      }
    }
  }
}

// Get all the accounts for one user
$account_list = get_account_list($db, $_SESSION["user"]);

require "view/operationView.php";
?>