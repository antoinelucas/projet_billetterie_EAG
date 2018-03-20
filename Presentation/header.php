<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Billetterie_EAG">
    <meta name="author" content="Jules Hugo Antoine">
    <title>Billetterie EAG</title>
    <link href="/css/bootstrap-3.3.7-dist/css/bootstrap-theme.css" rel="stylesheet">
    <link href="style_eag.css" rel="stylesheet">
  </head>
  <nav>
    <div class="container_nav">
      <p>Bonjour
        <?php
		      include ('../donnees/bd_connexion.php');
          $req = $bdd -> query('SELECT * FROM articledonnee WHERE'"');
        ?>
      </p>
    </div>
    <div class="container_nav">
      <a class="nav-link" href="register.php">S'inscrire</a>
    </div>
    <div class="container_nav">
      <a class="nav-link" href="register.php">S'inscrire</a>
    </div>

  </nav>
