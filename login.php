<?php
session_start(); // https://www.c2script.com/scripts/formulaire-de-connexion-en-php-s3.html

// Avoid XSS input from user
if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
};

if(isset($_POST['pwd']) && !empty($_POST['pwd'])) {
    $pwd = htmlspecialchars($_POST['pwd']);
};

// Verify user Id and Password, then set logged=TRUE
if (isset($id) && isset($pwd)) {
    if ($id=='Mathieu' && $pwd=='Mathieu'){
        $_SESSION['logged'] = true;
        header('Location: index.php');
    }
};

// User's not logged so display login page
$site_title = "BdD : Connexion";
include "template/nav.php";
include "template/header.php";
?>

<main class="d-flex justify-content-center form_container">
  <div class="card bg-ligh border-dark mt-4 mb-5 p-4">
    <div class="text-center mx-auto my-4 bg-warning text-dark">Veuillez rentrer vos identifiants</div>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><img src="public/img/user-1.png" style="width: 24px; height: 24px" alt="User's password"></img></span>
          </div>
          <input type="text" name="id" class="form-control input_user" placeholder="Identifiant">
        </div>
        <div class="input-group mb-2">
          <div class="input-group-append">
            <span class="input-group-text"><img src="public/img/padlock.png" style="width: 24px; height: 24px;" alt="password"></img></span>
          </div>
          <input type="password" name="pwd" class="form-control input_pass" value="" placeholder="Mot de passe">
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
          <input type="submit" value="Connexion" class="btn btn-secondary text-white">
        </div>
      </form>
    </div>
  </main>
<!-- end main -->


  <?php include "template/footer.php"; ?>
