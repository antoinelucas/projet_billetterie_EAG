<!DOCTYPE html>
<html lang="fr">

  <head id="page-top">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Billetterie_EAG">
    <meta name="author" content="Jules Hugo Antoine">
    <title>Billetterie EAG</title>
    <link href="/css/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="/css/selection_match.css" rel="stylesheet">
    <link href="/css/style_eag.css" rel="stylesheet">
    <link href="/css/page_compte.css" rel="stylesheet">
     <link href="/css/panier_match.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="ressources/img/triskelfavi.png" />
  </head>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php"><img class="img-fluid" src="ressources/img/logo-eag.jpg" alt="En avant de Guingamp"></a>
  <h1 id="titre-nav">Billetterie de l'EAG</h1>
  <div class="collapse navbar-collapse"  id="navbar_display">
    <div class="navbar-nav" id="navbar_display2">

      <?php if(!isset($creation_compte)){$creation_compte=0;}
      if (isset($_SESSION['auth'])): ?>

      <div  class="nav-item" class="element-nav">
        <a class="nav-link" href="./index_compte.php">Mon compte</a>
      </div>
      <div   class="nav-item" class="element-nav">
        <a class="nav-link" href="presentation/logout.php">Se déconnecter</a>
      </div>

      <?php elseif ($creation_compte ==1): ?>

      <?php else: ?>

      <form id="navbar_display_form" action="" method="POST">
        <div class="element-nav">
          <input class="navbar_style_input" type="text" name="identifiant" placeholder="Identifiant" >
        </div>
        <div class="element-nav">
          <input class="navbar_style_input" type="password" name="mdp" placeholder="Mot de passe">
        </div>
        <div class="element-nav">
          <input id="navbar_style_input_submit" class="nav-link" value="Se connecter" type="submit">
        </div>
        <div class="nav-item">
          <a class="nav-link" href="register.php">Créer mon compte</a>
        </div>
      </form>

      <?php endif; ?>

    </div>
  </div>
</nav>
<body>

<?php
$creation_compte =0;
include_once ('donnees/bd_connexion.php');

if(!empty($_POST) && !empty($_POST['identifiant']) && !empty($_POST['mdp'])){

	$reponse = $bdd->prepare('SELECT * FROM USERS WHERE (IDENTIFIANT = :identifiant OR MAIL = :identifiant)');
	$reponse->execute([':identifiant' => $_POST['identifiant']]);
	$user = $reponse->fetch();

	if($_POST['mdp'] == $user['MDP']){
		if(session_status() == PHP_SESSION_NONE){
		    session_start();
	  }

    $_SESSION['auth'] = $user;

	  header('Location: index.php');
	  exit();

	}else{
		?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Identifiant ou mot de passe incorrecte</strong>
    </div>
	<?php
	}
}
?>
