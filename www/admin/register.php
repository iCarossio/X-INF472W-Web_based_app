<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['newLogin']) && !empty($_POST['newLogin'])) 
		&& (isset($_POST['newPassword']) && !empty($_POST['newPassword']))
		&& (isset($_POST['mail']) && !empty($_POST['mail']))
		&& (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
		// on teste les deux mots de passe
		if ($_POST['newPassword'] != $_POST['pass_confirm']) {
			$erreur = 'Les 2 mots de passe sont différents.';
		}
		else {

			// on recherche si ce login est déjà utilisé par un autre membre
			$query = "SELECT COUNT(*) FROM users WHERE login=?";
			$req=$cnx->prepare($query);
			$req->execute(array($_POST['newLogin']));
			$data = $req->fetch();

			if ($data[0] == 0) {
				$query = "INSERT INTO users VALUES (:login, :mdp)"; //création du nouvel utilisateur
				$req=$cnx->prepare($query);
				$req->execute(array(
					'login'       => $_POST['newLogin'],
					'mdp'         => sha1($_POST['newPassword'].$salt)));
				
				$query = "INSERT INTO details VALUES ('', '', '', '', '', '' , :mail, '',  '', '' , '' ,:userid)"; //création de la ligne détails qui va avec l'utilisateur
				$req=$cnx->prepare($query);
				$req->execute(array(
					'userid'       => $_POST['newLogin'],
					'mail'        => $_POST['mail']));

				setcookie('login',$_POST['newLogin'], time() + 3600*2, "/"); //création des cookies pour que la connexion se fasse bien
				setcookie('password',sha1($_POST['newPassword'].$salt), time() + 3600*2, "/");




				header('Location: index.php?page=details');// redirection vers la page détails pour remplir els informations complémentaires
				
				$erreur = 'Inscription réussie, vous pouvez vous connecter.';
				exit();
			}
			else {
				$erreur = 'Un membre possède déjà ce login.';
			}
		}
	}
	else {
		$erreur = 'Au moins un des champs est vide.';
	}
}
?>

<div class="row">

	<div class="col-md-3"></div>

	<form action="index.php" class="col-md-6" method="POST">
	  <h3>Inscription</h3>
	  <?php
if (isset($erreur)) echo '<br /> ',$erreur,'<br/>';
?>
	  <div class="form-group">
	    <label for="newLogin">Username</label>
	    <input type="text" class="form-control" id="newLogin" name="newLogin" placeholder="Enter your username" value="<?php if (isset($_POST['newLogin'])) echo htmlentities(trim($_POST['newLogin'])); ?>" required>
	  </div>
	  <div class="form-group">
	    <label for="mail">Email address</label>
	    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if (isset($_POST['mail'])) echo htmlentities(trim($_POST['mail'])); ?>" required>
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="newPassword">Password</label>
	    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password"  required>
	  </div>
	  <div class="form-group">
	    <label for="pass_confirm">Confirm your password</label>
	    <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" placeholder="Password"  required>
	  </div>
	  <button type="submit" class="btn btn-primary" name="inscription" value="Inscription"><i class="fa fa-paper-plane"></i>Submit</button>
	</form>

	<div class=col-md-3></div>
</div>

<br/><br/><br/>
