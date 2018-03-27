
<div id="wallpaper-eag-match">

<div class="bloc_selection_match">
<img src="ressources/img/breton.png">
</div>

<div class="bloc_selection_match">
<img src="ressources/img/wallpaper-eag-match.png">
</div>

<div class="bloc_selection_match">
<img src="ressources/img/breton.png">
</div>

</div>

  <div id="conteneur">
  
  
  <div class="match">
  </br>
  
  <div id="rennes_match">
  
  <div class="texte-rennes">
  <p>EA Guingamp </br> </p>
  </div>
  
  <div class="texte-rennes">
  <p> VS </br></p>
  </div>
  
  <div class="texte-rennes">
  <p>
  <?php
  $adversaire1 = $bdd->prepare('SELECT * from PLANNING WHERE ADVERSAIRE = ? ') ;
  $adversaire1->execute(["Rennes"]);
  $reponse1 = $adversaire1->fetch();
  echo $reponse1['ADVERSAIRE'];
    ?>
    </p>
     </div>
  
  <div class="texte-rennes">
  <img src="ressources/img/sr.png">
  </div>
  
  </br>
  <div class="texte-rennes">
  <p> 
   <?php
   echo $reponse1['DATE_MATCH'];
   ?>
   </p>
   </div>
   
   <p>à</p>
   
   <p>
   
    <div class="texte-rennes">
   <?php
   echo $reponse1['HEURE_MATCH'];
   ?>
   </p>
   </div>
   
   <div class="texte-rennes">
   <a class="btn btn-default bouton_reserver">Réserver</a>
   </div>
   
   </div>
   </div>
   
   
   
   
  <div class="match">
  </br>
  <img src="ressources/img/cop.png">
   </div>
   
   <div class="match">
  </br>
  <img src="ressources/img/AMadrid.png">
   </div>
   
   <div class="match">
  </br>
  <img src="ressources/img/chamois.png">
   </div>
   
   <div class="match">
  </br>
  <img src="ressources/img/om.png">
   </div>
   
   
   
   
   
   
   
  </div>
