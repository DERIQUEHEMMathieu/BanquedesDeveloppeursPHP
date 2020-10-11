<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="La Banque des Développeurs pour vour servir et conserver vos devices en lieu sûr">
    <meta name="keywords" content="Banque, Développeurs, conserver, devices, sûr">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="public/img/logoBanque.png">
    <link rel="shortcut icon" href="public/img/logoBanque.ico" type="image/x-icon">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="public/css/main.css">

    <title><?php echo $site_title; ?></title>
  </head>
  <body>
  <!-- Nav -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse font-weight-bold" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="operations" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Opérations
          </a>
          <div class="dropdown-menu" aria-labelledby="operations">
            <a class="dropdown-item" href="souscrire.php">Souscrire</a>
            <a class="dropdown-item" href="comptes.php">Retrait / Dépôt</a>
            <a class="dropdown-item" href="virement.php">Virement</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="statistiques.php">Statistiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="articles.php">Articles</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="database/deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End of Nav -->

  <!-- Header -->
  <header>