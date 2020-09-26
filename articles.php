<?php

// If user's not logged then go to login page
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

$site_title = "BdD : Articles";

require "template/nav.php"; ?>

<?php include "template/header.php"; ?>

<div class="row mx-2 my-4 text-center">
    <div class="card col-md mb-3 mx-3">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text"></p>
        </div>
    </div>
    <div class="card col-md mb-3 mx-3">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text"></p>
        </div>
    </div>
    <div class="card col-md mb-3 mx-3">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text"></p>
        </div>
    </div>
    <div class="card col-md mb-3 mx-3">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text"></p>
        </div>
    </div>
    <div class="card col-md mb-3 mx-3">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text"></p>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>

<!-- Optional JavaScript -->
<script src="public/js/articles.js"></script>