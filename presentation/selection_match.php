
<div id="wallpaper-eag-match">

<div class="bloc_selection_match">
<img src="ressources/img/breton.png">
</div>

<div class="bloc_selection_match">
<img id="fond_accueil" src="ressources/img/wallpaper-eag-match.png">
</div>

<div class="bloc_selection_match">
<img src="ressources/img/breton.png">
</div>

</div>

  <div id="conteneur">


  <div class="match">
  </br>

  <div class="match_selection">

  <div class="texte-match">
  <p>EA Guingamp </br> </p>
  </div>

  <div class="texte-match">
  <p> VS </br></p>
  </div>

  <div class="texte-match">
  <p><b>
  <?php
  $adversaire1 = $bdd->prepare('SELECT * from PLANNING WHERE ADVERSAIRE = ? ') ;
  $adversaire1->execute(["Rennes"]);
  $reponse1 = $adversaire1->fetch();
  echo $reponse1['ADVERSAIRE'];
    ?>
    </b>
    </p>
     </div>
  </br>
  <div class="texte-match">
  <img src="ressources/img/sr.png">
  </div>
  </br>
  </br>
  </br>
  <div class="texte-match">
  <p>
   <?php
   //echo $reponse1['DATE_MATCH'];
   echo date('d-m-Y', strtotime($reponse1['DATE_MATCH']));
   ?>
   </p>
   </div>

   <p>à</p>

   <p>

    <div class="texte-match">
   <?php
   echo $reponse1['HEURE_MATCH'];
   ?>
   </p>
   </div>
   <?php
   $planning=array($reponse1['ADVERSAIRE'],$reponse1['DATE_MATCH'],$reponse1['HEURE_MATCH']);
   $_SESSION['planning']=$planning;
   ?>

   <div class="texte-match">
   <a href="/selection_place.php" class="btn btn-default bouton_reserver">Réserver</a>
   </div>

   </div>
   </div>




  <div class="match">
    </br>

    <div class="match_selection">

    <div class="texte-match">
    <p>EA Guingamp </br> </p>
    </div>

    <div class="texte-match">
    <p> VS </br></p>
    </div>

    <div class="texte-match">
    <p><b>
    <?php
    $adversaire2 = $bdd->prepare('SELECT * from PLANNING WHERE ADVERSAIRE = ? ') ;
    $adversaire2->execute(["Pacé"]);
    $reponse2 = $adversaire2->fetch();
    echo $reponse2['ADVERSAIRE'];
      ?>
      </b>
      </p>
       </div>

       </br>
       </br>
       </br>

    <div class="texte-match">
    <img src="ressources/img/cop.png">
    </div>
    </br>
    </br>
    </br>
    </br>
    </br>
    <div class="texte-match">
    <p>
     <?php
     //echo $reponse2['DATE_MATCH'];
     echo date('d-m-Y', strtotime($reponse2['DATE_MATCH']));
     ?>
     </p>
     </div>

     <p>à</p>

     <p>

      <div class="texte-match">
     <?php
     echo $reponse2['HEURE_MATCH'];
     ?>
     </p>
     </div>

     <div class="texte-match">
     <a href="/selection_place.php?planning=<?php echo $reponse2['ADVERSAIRE']; ?> " class="btn btn-default bouton_reserver">Réserver</a>
     </div>

     </div>
     </div>



   <div class="match">
    </br>

    <div class="match_selection">

    <div class="texte-match">
    <p>EA Guingamp </br> </p>
    </div>

    <div class="texte-match">
    <p> VS </br></p>
    </div>

    <div class="texte-match">
    <p><b>
    <?php
    $adversaire3 = $bdd->prepare('SELECT * from PLANNING WHERE ADVERSAIRE = ? ') ;
    $adversaire3->execute(["Atlético de Madrid"]);
    $reponse3 = $adversaire3->fetch();
    echo $reponse3['ADVERSAIRE'];
      ?>
      </b>
      </p>
       </div>

    <div class="texte-match">
    <img src="ressources/img/AMadrid.png">
    </div>
    </br>
    <div class="texte-match">
    <p>
     <?php
     //echo $reponse3['DATE_MATCH'];
     echo date('d-m-Y', strtotime($reponse3['DATE_MATCH']));
     ?>
     </p>
     </div>

     <p>à</p>

     <p>

      <div class="texte-match">
     <?php
     echo $reponse3['HEURE_MATCH'];
     ?>
     </p>
     </div>

     <div class="texte-match">
     <a href="/selection_place.php?planning=<?php echo $reponse3['ADVERSAIRE']; ?> " class="btn btn-default bouton_reserver">Réserver</a>
     </div>

     </div>
     </div>



   <div class="match">
    </br>

    <div class="match_selection">

    <div class="texte-match">
    <p>EA Guingamp </br> </p>
    </div>

    <div class="texte-match">
    <p> VS </br></p>
    </div>

    <div class="texte-match">
    <p><b>
    <?php
    $adversaire4 = $bdd->prepare('SELECT * from PLANNING WHERE ADVERSAIRE = ? ') ;
    $adversaire4->execute(["Chamois Niortais"]);
    $reponse4 = $adversaire4->fetch();
    echo $reponse4['ADVERSAIRE'];
      ?>
      </b>
      </p>
       </div>

    <div class="texte-match">
    <img src="ressources/img/chamois.png">
    </div>
    </br>
    </br>
    </br>
    <div class="texte-match">
    <p>
     <?php
     //echo $reponse4['DATE_MATCH'];
     echo date('d-m-Y', strtotime($reponse4['DATE_MATCH']));
     ?>
     </p>
     </div>

     <p>à</p>

     <p>

      <div class="texte-match">
     <?php
     echo $reponse4['HEURE_MATCH'];
     ?>
     </p>
     </div>

     <div class="texte-match">
     <a class="btn btn-default bouton_reserver">M'alerter</a>
     </div>

     </div>
     </div>



   <div class="match">
    </br>

    <div class="match_selection">

    <div class="texte-match">
    <p>EA Guingamp </br> </p>
    </div>

    <div class="texte-match">
    <p> VS </br></p>
    </div>

    <div class="texte-match">
    <p><b>
    <?php
    $adversaire5 = $bdd->prepare('SELECT * from PLANNING WHERE ADVERSAIRE = ? ') ;
    $adversaire5->execute(["Marseille"]);
    $reponse5 = $adversaire5->fetch();
    echo $reponse5['ADVERSAIRE'];
      ?>
      </b>
      </p>
       </div>

    <div class="texte-match">
    <img src="ressources/img/om.png">
    </div>
    </br>
    </br>
    <div class="texte-match">
    <p>
     <?php
     //echo $reponse5['DATE_MATCH'];
     echo date('d-m-Y', strtotime($reponse5['DATE_MATCH']));
     ?>
     </p>
     </div>

     <p>à</p>

     <p>

      <div class="texte-match">
     <?php
     echo $reponse5['HEURE_MATCH'];
     ?>
     </p>
     </div>

     <div class="texte-match">
     <a class="btn btn-default bouton_reserver">
     M'alerter</a>
     </div>

     </div>
     </div>







  </div>
