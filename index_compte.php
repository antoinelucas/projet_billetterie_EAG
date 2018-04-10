<?php
if(session_status() == PHP_SESSION_NONE){

	session_start();
}
include_once ('presentation/header.php');
include_once ('traitement/fonction.php');


if(!empty($_POST)){
	$errors = array();

	if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])){
		$errors['nom'] = "Votre nom n'est pas valide.";
		$nom1=0;
	}
	else {
		$nom1=1;
	}

	if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom'])){
		$errors['prenom'] = "Votre prenom n'est pas valide.";
		$prenom1=0;
	}
	else{ $prenom1=1;}

	if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
		$errors['mail'] = "Votre mail n'est pas valide.";
		$mail1=0;
	}
	else { $mail1=1;}

	if(empty($_POST['password']) || $_POST['password'] != $_SESSION['auth']['MDP']){
		$errors['password'] = "Vous n'avez pas rentré votre bon mot de passe.";
		$mdp1=0;
	}
	else{$mdp1=1;}

	if(empty($_POST['nouveau_password']) && empty($_POST['password_confirm'])) {
		$newmdp1 = 0;
	}

	else if($_POST['nouveau_password'] != $_POST['password_confirm'] && (!empty($_POST['nouveau_password']) || !empty($_POST['password_confirm']))) {
		$errors['password'] = "Vous avez fait une erreur dans la confirmation du mot de passe";
		$newmdp1=1;
	}
	else if($_POST['nouveau_password'] == $_POST['password_confirm']){$newmdp1=2;}

	if(isset($_POST['vip'])){
		$_POST['vip']='1';
	}else{
		$_POST['vip']='0';
	}

	if ($nom1==1 && $prenom1==1 && $mail1==1 && $mdp1==1 && $newmdp1==0) {
		$stmt = $bdd->prepare("UPDATE  USERS
			SET nom = :nom, prenom = :prenom, mail = :mail, privilege = :vip
			WHERE identifiant= :identifiant;");

			$stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
			$stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
			$stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
			$stmt->bindValue(':vip', $_POST['vip'], PDO::PARAM_BOOL);
			$stmt->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);
			$stmt->execute();
			header('Location: presentation/logout.php');
		}

		else if ($nom1==1 && $prenom1==1 && $mail1==1 && $mdp1==1 && $newmdp1==2) {
			$stmt = $bdd->prepare("UPDATE  USERS
				SET nom = :nom, prenom = :prenom, mail = :mail, mdp  =:mdp, privilege = :vip
				WHERE identifiant= :identifiant;");

				$stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
				$stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
				$stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
				$stmt->bindValue(':mdp', $_POST['nouveau_password'], PDO::PARAM_STR);
				$stmt->bindValue(':vip', $_POST['vip'], PDO::PARAM_BOOL);
				$stmt->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);
				$stmt->execute();
				header('Location: presentation/logout.php');
			}

		}?>

		<div id="general-content">
			<div class="jumbotron" id="general-content-jumbotron">

				<div class="form-register">
					<form action="" method="POST" id="change-values">
						<h1>Mon compte - Modifier mes informations</h1>
						<hr>
						<div class="form-group">
							<label for="">Identifiant</label> <?php echo $_SESSION['auth']['IDENTIFIANT']?>
							<input type="text" name="identifiant" class="form-control" value="<?php echo $_SESSION['auth']['IDENTIFIANT']?>">
						</div>

						<div class="form-group">
							<label for="">Votre nom est :
							</label>
							<input type="text" name="nom" class="form-control" value="<?php echo $_SESSION["auth"]["NOM"] ?>">
						</div>

						<div class="form-group">
							<label for="">Votre prénom est :
								<input type="text" name="prenom" class="form-control" value="<?php echo $_SESSION["auth"]["PRENOM"] ?>">
							</div>

							<div class="form-group">
								<label for="">Votre adresse mail est :
									<input type="text" name="mail" class="form-control" value="<?php echo $_SESSION["auth"]["MAIL"] ?>">
								</div>

								<div class="form-group">
									<label for="">Mot de passe actuel</label>
									<input type="password" name="password" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Nouveau mot de passe (laisser un blanc si vous ne voulez pas le modifier)</label>
									<input type="password" name="nouveau_password" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Confirmer le nouveau mot de passe</label>
									<input type="password" name="password_confirm" class="form-control">
								</div>

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" name="vip" id="optionsRadios2" type="checkbox"
										<?php if($_SESSION['auth']['PRIVILEGE']==1) echo "checked"; ?>>
										Souscrire à l'abonnement VIP (Valable 1an) - <b>295,99€</b>
									</label>
								</div>
								<hr>

								<button type="submit" class="btn btn-primary">Changer mes informations</button>
								<hr>

								<input type="submit" name="btn" value="submit" autofocus  onclick="return true;"/>
							<?php	if(isset($_POST['btn']) && $_POST['btn']=='submit'){
								$req = $bdd->prepare('DELETE FROM USERS Where IDENTIFIANT = ?');
								$req->execute([$_SESSION['auth']['IDENTIFIANT']]);
									header('Location: presentation/logout.php');
							      } ?>

									<?php if(!empty($errors)): ?>
										<hr>
										<div id="alert-values-wrong">
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
					<?php
					include_once ('presentation/footer.php'); ?>
