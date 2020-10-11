<?php
$site_title = "Banque des Développeurs";
require "template/nav.php";
include "template/header.php";
?>

<?php
// If a login form is submitted
if(!empty($_POST) && isset($_POST["login"])) {
    // Connect to database
    try {
        $db = new PDO('mysql:host=localhost;dbname=banque_php', 'BanquePHP', 'banque76');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

$query = $db->prepare(
"SELECT * FROM User
WHERE email = :email"
);
$query->execute([
    "email" => $_POST["email"]
]);
$user = $query->fetch(PDO::FETCH_ASSOC);

// If a user has been found
if ($user) {
    // If password match
    if(password_verify($_POST["password"], $user["password"])) {
        session_start();
        $_SESSION["user"] = $user;
    }
    header("Location: index.php");
}}
?>

<main class="d-flex justify-content-center form_container">
  <div class="card bg-ligh border-dark mt-4 mb-5 p-4">
    <div class="text-center mx-auto my-4 bg-warning text-dark">Veuillez rentrer vos identifiants</div>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <span class="input-group-text"><img src="public/img/user-1.png" style="width: 24px; height: 24px" alt="User's password"></img></span>
          </div>
          <input type="email" name="email" class="form-control input_user" placeholder="Email">
        </div>
        <div class="input-group mb-2">
          <div class="input-group-append">
            <span class="input-group-text"><img src="public/img/padlock.png" style="width: 24px; height: 24px;" alt="password"></img></span>
          </div>
          <input type="password" name="password" class="form-control input_pass" value="" placeholder="Mot de passe">
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
          <input type="submit" value="Connexion" name="login" class="btn btn-secondary text-white">
        </div>
      </form>
    </div>
  </main>
<!-- end main -->

<?php include "template/footer.php"; ?>
