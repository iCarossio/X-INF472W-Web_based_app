<?php 



	function superLogin(){ // authentification du superutilisateur olivier // lapin
		$salt = "jadoeaiedhajeidaheu!aedayYRb";
		if (isset($_COOKIE['login']) and isset($_COOKIE['password'])){
			if ($_COOKIE['login']=='olivier' and $_COOKIE['password']==sha1('lapin'.$salt)){
				return true;
			}
			else{
				return false; 
			}
		}

		elseif (isset($_POST['login']) and isset($_POST['password'])){
			if ($_POST['login']=='olivier' and $_POST['password']=='lapin'){
				setcookie('login',$_POST['login'], time() + 3600*2, "/");
				setcookie('password',sha1('lapin'.$salt), time() + 3600*2, "/");
				return true;
			}
			else{
				return false; 
			}
		}

		else{
			return false;
		}
	}


	function login(){ //fonction de login, vérifie si l'utilisateur a les bons ids, en cookies e=ou en entrée du form, renvoie true ou false en fonction
		require('../../private/db_connection.php'); // utile pour récupérer $cnx et $salt

		if(isset($_COOKIE['login']) and isset($_COOKIE['password'])){ // si l'utilisateur était déjà connecté, vérifier les cookies
			$query = "SELECT mdp FROM users WHERE login=?";
			$req=$cnx->prepare($query);
			$req->execute(array($_COOKIE['login']));
			$data = $req->fetch();
			if($data[0] == $_COOKIE['password']){
				return true;
			}else{
				return false;
			}
		}
		elseif (isset($_POST['login']) and isset($_POST['password'])){ // sinon on l'authentifie et on crée le cookie
			$query = "SELECT mdp FROM users WHERE login=?";
			$req=$cnx->prepare($query);
			$req->execute(array($_POST['login']));
			$data = $req->fetch();

			if ($data[0] == sha1($_POST['password'].$salt)) {
				setcookie('login',$_POST['login'], time() + 3600*2, "/");
				setcookie('password',sha1($_POST['password'].$salt), time() + 3600*2, "/");
				return true;
			}
			else{
				return false;
			}
		}

		return false;	
	}




?>