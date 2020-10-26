<?php
require "model/userManager.php";
require "model/entity/user.php";

// If the connexion form has been submited
if(!empty($_POST) && isset($_POST["connexion"])) {
  // Check for empty values (array filter removes empty values from array)
  $empty_values = array_filter($_POST);
  // If some values are empty
  if(count($empty_values) !== count($_POST)) {
    $error = "Vous devez remplir tous les champs pour vous connecter";
  }
  // Otherwise we try the connexion process
  else {
    try {
      $logUser = new User($_POST);
      // Search for a user according to the given email
      $userManager = new UserManager();
      $user = $userManager->getUserByMail($logUser);
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
    // If a user has been found
    if($user) {
      // Check the password and if it is correct log the user and go to home page
      if(password_verify($logUser->getPassword(), $user->getPassword())) {
        session_start();
        $_SESSION["user"] = $user;
        header("Location: index.php");
        exit();
      }
    }
    // If one of the inputs does not match make an error message
    $error = "Identifiants incorrects";
  }
}

require "view/loginView.php";
?>