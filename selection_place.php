<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	include_once ('presentation/header.php');
	$date_du_match = $_SESSION['planning'][1];

	function in_array_r($needle, $haystack, $strict = false) {
  	foreach ($haystack as $item) {
    	if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
      	return true;
      }
    }
    return false;
	}





	$reponse = $bdd->prepare('SELECT NUMERO_PLACE FROM PLACES WHERE STATUT =0');
	$reponse->execute();
	$fetch_places_tribune0 = $reponse->fetchAll();
	$taille_fetch_places_tribune0 = count($fetch_places_tribune0);




	$reponse = $bdd->prepare('SELECT count(NUMERO_PLACE) FROM PLACES WHERE NUMERO_PLACE NOT IN(SELECT ID_PLACE FROM RESERVER WHERE DATE_MATCH = ?)');
	$reponse->execute([$date_du_match]);
	$fetch_nb_places_dispo = $reponse->fetch();
	/*$fetch_nb_places_dispo = $reponse->fetchAll();
	var_dump($fetch);*/
	$nb_places_dispo = $fetch_nb_places_dispo[0];
	$taille_fetch_nb_places_dispo = count($fetch_nb_places_dispo);

	/*for($a=0; $a< $taille_fetch_nb_places_dispo; $a++){
		echo $fetch_nb_places_dispo[$a];
	}
*/


	$reponse = $bdd->prepare('SELECT NUMERO_PLACE FROM PLACES WHERE NUMERO_PLACE NOT IN(SELECT ID_PLACE FROM RESERVER WHERE DATE_MATCH = ?)');
	$reponse->execute([$date_du_match]);
	$fetch_places_dispo = $reponse->fetchAll();
	/*$nb_places =$fetch_nb_places[0][0];*/
	/*var_dump($fetch_nb_places);*/
	$taille_fetch_places_dispo = count($fetch_places_dispo);


	$reponse = $bdd->prepare('SELECT NUMERO_PLACE FROM PLACES WHERE NUMERO_PLACE IN(SELECT ID_PLACE FROM RESERVER WHERE DATE_MATCH = ?)');
	$reponse->execute([$date_du_match]);
	$fetch_places_prises = $reponse->fetchAll();
	/*$nb_places =$fetch_nb_places[0][0];*/
	/*var_dump($fetch_places_prises);*/
	/*echo $fetch_places_prises[0][0];
	echo $fetch_places_prises[1][0];
	echo $fetch_places_prises[2][0];*/
	$taille_fetch_places_prises = count($fetch_places_prises);


  ?>
  <div id="selection_place-container">
    <div class="jumbotron" id="selection_place-jumbotron">
      <h1 id="titre-place">Réserver votre place pour le match contre <?php echo $_SESSION['planning'][0]; ?></h1>
      <div id="container-display-place">
        <form id="selection_place-form">
          <div class="form-group">
            <label for="select-tribune">Sélection de la tribune</label>
            <select class="form-control" id="select-tribune">
              <option disabled>Latérale Ouest (A-B-C-D-E-F) (Complet)</option>
              <option disabled>Latérale Est (U-T-S-R-Q) (Complet)</option>
              <option disabled>Club Loges (G1-G2-G3-G4-03-02-01) (Complet)</option>
              <option selected>Honneur (XA-WB-XC-XD) (<?php echo $nb_places_dispo;?> places restantes)</option>
              <option disabled>Présidentielle Ouest (H-I) (Complet)</option>
              <option disabled>Présidentielle Est (M-N) (Complet)</option>
              <option disabled>Club Armor Prestige (J-L) (Complet)</option>
            </select>
          </div>
					<br/>
					<div id="siege_select_container">
							<?php
								 for ($i = 0; $i < $taille_fetch_places_tribune0; $i++){ ?>
									 <div id="siege_select">
										 <?php
								 	if(!in_array_r($fetch_places_tribune0[$i][0], $fetch_places_prises)):?>
												<img class="img-fluid" src="ressources/img/siege_eag-rouge.png" alt="Siège_eag_rouge">
												<p id="numero_place">
													<?php echo $fetch_places_tribune0[$i][0]; ?>
												</p>
						<?php else:?>
									<img class="img-fluid" src="ressources/img/siege_eag-gris.png" alt="Siège_eag_gris">
									<p id="numero_place">
									<?php echo $fetch_places_tribune0[$i][0]; ?>
									</p>
						<?php endif; ?>
						</div>
						<?php
						}
						?>
					</div>
					<br/>
          <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
      <div id="selection_place-image">
        <img class="img-fluid" src="ressources/img/stade.gif" alt="En avant de Guingamp">
      </div>
    </div>
  </div>
</div>

<?php
	include_once ('presentation/footer.php');
	$creation_compte =0;
?>
