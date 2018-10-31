<?php


if(superLogin()){
	require('../../private/db_connection.php');

	$query = "SELECT * FROM users";
	$rep = $cnx->query($query);
	$i=0;
	while($data = $rep->fetch()){
		$i++;
		echo"

			<div class='row' id='".htmlspecialchars($data[0])."'>
				<div class='col-md-3'></div>
				<div class='col-md-3'>".htmlspecialchars($data[0])."</div>
				<div class='col-md-3'>
				<button type='submit' class='btn btn-outline-danger my-2 my-sm-0' name='supprimer' id='suppruser$i' value='Supprimer'> Supprimer</button>
				</div>
				<div class='col-md-3'></div>
			</div>


";	
	}
}

else{
	//header('Location: logout.php');
	echo "Erreur";
}

?>