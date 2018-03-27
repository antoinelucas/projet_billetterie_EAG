<?php
	if(session_status() == PHP_SESSION_NONE){

		session_start();
	}
  include_once ('presentation/header.php');

	$identifiant = $nom = $prenom = $mail = $password = $password_confirm = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$identifiant = test_input($_POST['identifiant']);
		$nom = test_input($_POST["nom"]);
		$prenom = test_input($_POST['prenom']);
	  $mail = test_input($_POST["mail"]);
	  $password = test_input($_POST['password']);
	  $password_confirm = test_input($_POST['password_confirm']);
	  $vip = test_input($_POST["vip"]);
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	if(!empty($_POST)){
    $errors = array();

		if(empty($_POST['identifiant']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['identifiant'])){
			$errors['identifiant'] = "Votre pseudo n'est pas valide.";
		}else{
			$req = $bdd->prepare('SELECT IDENTIFIANT FROM USERS Where IDENTIFIANT = ?');
			$req->execute([$_POST['identifiant']]);
			$user = $req->fetch();
			if($user){
				$errors['identifiant'] = 'Cet identifiant est déjà pris.';
			}
		}

		if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])){
			$errors['nom'] = "Votre nom n'est pas valide.";
		}

		if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom'])){
			$errors['prenom'] = "Votre prenom n'est pas valide.";
		}

		if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			$errors['mail'] = "Votre mail n'est pas valide.";
		}else{
			$req = $bdd->prepare('SELECT IDENTIFIANT FROM USERS Where MAIL = ?');
			$req->execute([$_POST['mail']]);
			$user = $req->fetch();
			if($user){
				$errors['mail'] = 'Vous avez déjà un compte avec cette adresse mail.';
			}
		}

		if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
			$errors['password'] = "Vous devez rentrer un mot de passe valide.";
		}

		if(isset($_POST['vip'])){
			$_POST['vip']='1';
		}else{
			$_POST['vip']='0';
		}

		if(empty($errors)){
			$req = $bdd->prepare("INSERT INTO USERS SET IDENTIFIANT = ?, NOM = ?, PRENOM = ?, MDP = ?, MAIL = ?, PRIVILEGE = ?");
			$req->execute([$_POST['identifiant'], $_POST['nom'], $_POST['prenom'], $_POST['password'], $_POST['mail'], $_POST['vip'] ]);
			header('Location: index.php');
			exit();
		}



	}

	?>
	<div id="container-form">
		<div class="jumbotron" id="form-register-jumbotron">

	  <div class="form-register">
	    <form action="" method="POST" id="form-register">
				<h1>Inscription</h1>
				<hr>
	      <div class="form-group">
	      	<label for="">Identifiant</label>
	        <input type="text" name="identifiant" class="form-control" value="<?php $_POST['identifiant'] ?>">
	      </div>

				<div class="form-group">
	      	<label for="">Nom</label>
	        <input type="text" name="nom" class="form-control" value="<?php $_POST['nom'] ?>">
	      </div>

				<div class="form-group">
	      	<label for="">Prénom</label>
	        <input type="text" name="prenom" class="form-control" value="<?php $_POST['prenom'] ?>">
	      </div>

	      <div class="form-group">
	      	<label for="">Adresse mail</label>
	        <input type="text" name="mail" class="form-control" value="<?php $_POST['mail'] ?>">
	      </div>

	      <div class="form-group">
	      	<label for="">Mot de passe</label>
	        <input type="password" name="password" class="form-control" value="<?php $_POST['password'] ?>">
	      </div>

	      <div class="form-group">
	      	<label for="">Confirmez votre mot de passe</label>
	       	<input type="password" name="password_confirm" class="form-control" value="<?php $_POST['password_confirm'] ?>">
	      </div>

				<div class="form-check">
      		<label class="form-check-label">
          	<input class="form-check-input" name="vip" id="optionsRadios2" value="value="<?php $_POST['vip'] ?>"" type="radio">
          	Souscrire à l'abonnement VIP (Valable 1an) - 295,99€
        	</label>
      	</div>
				<hr>

	      <button type="submit" class="btn btn-primary">M'inscrire</button>

				<?php if(!empty($errors)): ?>
					<hr>
					<div id="alert-form-container">
						<div class="alert alert-danger">
							<p>Vous n'avez pas rempli le formulaire correctement</p>
							<ul>
							<?php foreach ($errors as $error): ?>
								<li><?= $error; ?></li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
	    </form>
	  </div>
	</div>
</div>


<?php include_once ('presentation/footer.php'); ?>
