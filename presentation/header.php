<!DOCTYPE html>
<html lang="fr">

  <head id="page-top">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Billetterie_EAG">
    <meta name="author" content="Jules Hugo Antoine">
    <title>Billetterie EAG</title>
    <link href="/css/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style_eag.css" rel="stylesheet">
  </head>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#page-top"><img class="img-fluid" src="ressources/img/logo-eag.jpg" alt="En avant de Guingamp"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse"  id="navbar_display">
    <div class="navbar-nav" id="navbar_display2">

      <?php if (isset($_SESSION['auth'])): ?>

      <div  class="nav-item" class="element-nav">
        <a class="nav-link" href="./index_compte.php">Mon compte</a>
      </div>
      <div   class="nav-item" class="element-nav">
        <a class="nav-link" href="presentation/logout.php">Se déconnecter</a>
      </div>

      <?php else: ?>

      <form id="navbar_display_form" action="" method="POST">
        <div class="element-nav">
          <input class="navbar_style_input" type="text" name="IDENTIFIANT" >
        </div>
        <div class="element-nav">
          <input class="navbar_style_input" type="password" name="MDP">
        </div>
        <div class="element-nav">
          <input id="navbar_style_input_submit" class="nav-link" value="Se connecter" type="submit"></input>
        </div>
        <div class="nav-item">
          <a class="nav-link" href="./register.php">Créer mon compte</a>
        </div>
      </form>

      <?php endif; ?>

    </div>
  </div>
</nav>


<?php
include_once ('donnees/bd_connexion.php');

if(!empty($_POST) && !empty($_POST['IDENTIFIANT']) && !empty($_POST['MDP'])){
  echo $_POST['IDENTIFIANT']." et le mot de passe".$_POST['MDP'];
  id_user == $_POST['IDENTIFIANT'];
	$reponse = $bdd->prepare('SELECT * FROM USERS WHERE (IDENTIFIANT = id_user OR email = id_user)');
	$reponse->execute();
	$user = $reponse->fetch();

	if($_POST['password'] == $user[MDP]){
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


        <!--<?php/*
		      include_once ('donnees/bd_connexion.php');
          echo "tes83\n";
          $reponse = $bdd -> query('SELECT NOM from USERS ');

          while ($donnees = $reponse->fetch())
          {
            echo "<h1>bonjour</h1>";
            echo $donnees['NOM'];
          }*/
        ?>-->
