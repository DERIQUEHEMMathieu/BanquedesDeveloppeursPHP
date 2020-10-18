<?php
$site_title = "BdD : Retrait / Dépôt";
include "view/template/nav.php";
include "view/template/header.php";
?>

<div class="row">
    <div class="col-sm-12">
        <h4 class="text-center offset-sm-3 my-4 mx-auto bg-warning text-dark" style="width: 40%;">Effectuez une opération</h4>
        <form class="mb-4 offset-sm-4" style="font-weight: bolder; width: 390px;" method="POST" action="">
            <div class="form-group">
                <?php
                    if(isset($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    if(isset($success)) {
                        echo "<div class='alert alert-success'>$success</div>";
                    }
                ?>
                <label for="account_id">Sélectionnez votre compte :</label>
                <select class="form-control" style="width: 20em;" id="account_id" name="account_id" required>
                <?php foreach ($account_list as $account): ?>
                <option value='<?php echo $account['id']?>'><?php echo "Nr : " . $account["id"] . " " . $account["account_type"] . " (" . $account["amount"] . " " . "€" . ")" ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="operation">Opération souhaitée :</label>
                <select class="form-control" style="width: 8em;" id="operation" name="operation_type" required>
                <option value="crédit">Dépôt</option>
                <option value="débit">Retrait</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Montant* :</label>
                <input style="width: 6em;" type="number" step="0.01" name="amount" id="amount" min="1" required pattern="[0-9]{1,9}[\.][0-9]{0, 2}"><br>
                <span class="text-muted">* Montant minimum requis : 1 €. Montant exprimé en euros (€)</span>
                <p id="wrongAmount" class="text-muted mb-2"></p>
            </div>
            <div class="text-center">
                <button type="submit" value="operation" name="operation" id="validation" class="btn btn-secondary text-white">Exécuter</button>
                <a href="index.php" class="btn btn-secondary text-white">Retour</a>
            </div>
        </form>
    </div>
</div>

<?php
$script = "<script src='public/js/operation.js'></script>";
include "view/template/footer.php";
?>
