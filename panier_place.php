<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$creation_compte =1;
	include_once ('presentation/header.php');
  ?>
  <div id=conteneur_panier class="jumbotron">
  
  <div class="confirmation_match">
  <h3>Réservation confirmée au nom de 
  
  <?php
  
  echo $_SESSION['auth']["PRENOM"];
  echo "<p> </p>";
  echo $_SESSION['auth']["NOM"];
  
  ?>  
  
  </h3>
  </br>
  </br>
  </br>
  </div>
  
  <div class="confirmation_match">
  <p>Vous avez réservé la place numéro
  <?php
  $place = $bdd->prepare('SELECT * from RESERVER WHERE IDENTIFIANT = ?') ;
  $place->execute([$_SESSION['auth']["IDENTIFIANT"]]);
  $reponse_place = $place->fetch();
  echo $reponse_place['ID_PLACE'];
    ?>
  </p>
  </br>
  </div>
  
  <div class="confirmation_match">
  <p>Pour le match En Avant Guingamp -
  <?php
  echo $_SESSION['planning'][0];
  ?>
    qui se déroulera le
    
     <?php
  //echo $_SESSION['planning'][1];
  echo date('d-m-Y', strtotime($_SESSION['planning'][1]));
  ?>
  
  à
  
   <?php
  echo $_SESSION['planning'][2];
  ?>
  
   au stade du roudourou</p>
  </br></br>
  </div>
  
  <div class="confirmation_match">
  <a class="lien_confirmation" href=""><p>Télécharger mon billet (pdf) </p></a>
  </br></br></br>
  </div>
  
  <div class="confirmation_match">
  <a class="lien_confirmation" href="index.php"><p>Retourner à l'écran d'accueil </p></a>
  </div>
  
  </div>
  
  <?php
	include_once ('presentation/footer.php');
	$creation_compte =0;
?>