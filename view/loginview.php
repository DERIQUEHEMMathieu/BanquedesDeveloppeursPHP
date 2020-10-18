<?php
$site_title = "Banque des Développeurs";
include "view/template/nav.php";
include "view/template/header.php";
?>

<main class="d-flex justify-content-center form_container">
    <div class="card bg-ligh border-dark mt-4 mb-5 p-4">
        <div class="text-center mx-auto my-4 bg-warning text-dark font-weight-bold">Veuillez rentrer vos identifiants</div>
            <form action="" method="POST">
                <?php if(isset($error)){ echo "<div class='alert alert-danger'>$error</div>"; }?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><img src="public/img/user-1.png" style="width: 24px; height: 24px" alt="User's password"></img></span>
                    </div>
                <input type="email" class="form-control input_user" id="mail" name="email" placeholder="Votre email d'inscription">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><img src="public/img/padlock.png" style="width: 24px; height: 24px;" alt="password"></img></span>
                    </div>
                <input type="password" class="form-control input_pass" id="password" name="password" placeholder="Votre mot de passe">
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="connexion" value="connexion" class="btn btn-secondary text-white">Connexion</button>
                </div>
            </form>
    </div>
</main>

<?php
 include "view/template/footer.php";
?>