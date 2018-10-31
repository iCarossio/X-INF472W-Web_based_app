<?php


require('../../private/db_connection.php');
if(isset($_POST['name'])){

	$name = htmlspecialchars($_POST['name']);
	unlink('../assets/resumes/'.$name.'.pdf');//supression du cv
	unlink('../assets/images/profile/'.$name.'.png'); // suppression de la photo de profil

	$req = $cnx->prepare('SELECT id FROM experiences WHERE userid = :login'); //suppression des images de experiences
	$req->execute(array( 'login' => $name));

	while($data = $req->fetch()){
		unlink('../assets/images/experiences/'.$name.'_'.$data[0].'.png');
	}

	$req = $cnx->prepare('SELECT id FROM education WHERE userid = :login'); //suppression des images de education
	$req->execute(array( 'login' => $name));

	while($data = $req->fetch()){
		unlink('../assets/images/education/'.$name.'_'.$data[0].'.png');
	}

	$req = $cnx->prepare('DELETE FROM users WHERE login = :login'); // enfin, on supprime l'user de la base
	$req->execute(array('login' => $_POST['name']));


	echo "success";
}

else{
	echo "failure";
}


?>