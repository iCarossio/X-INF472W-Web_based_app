<?php

$table_name="skills_pro";
echo "<h1>Professional Skills</h1>";

if(login()){

	$ask = $cnx->query("SELECT * FROM ".$table_name." WHERE userid='".$_COOKIE['login']."'");

	while($rep = $ask->fetch()){
		echo "
		<br/>
		<div class='card' id='card".$rep['id']."'>
			<div class='card-body'>

				<div class='row'>
					<div class='col-md-1'></div>
					<div class='col-md-10' id=".$rep['id'].">

						<h5 class='card-title'>Titre : </h5>
						<textarea rows = '1' cols = '50' class='form-control mr-sm-2'  name='title'>".strip_tags($rep['title'])."</textarea><br>

					</div>
					<div class='col-md-1'></div>
				</div>
			</div>

			<div class='card-footer'>
				<div class='row'>
					<div class='col-md-10'></div>
					<div class='col-md-2'>
				    	<button id='delete".$rep['id']."' name='".$table_name."' class='btn btn-outline-danger my-2 my-sm-0' > Supprimer </button>
				    </div>
			    </div>
			</div>
		</div>
		<br/><br/>
		";
	}

	echo "<button id='update' name='".$table_name."' class='btn btn-outline-success my-2 my-sm-0'>Mettre à jour </button> <br/>";

	//formulaire pour ajouter une entrée
	echo "
		<div class='container'>
		<br/>
		<h4>Nouvelle entrée</h4>
		<br/>
		<div class='col-md-12' id='-1'>

				<h5 class='card-title'>Titre : </h5>
				<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='title'></textarea><br>

				<button class='btn btn-outline-success my-2 my-sm-0' id='add' name='".$table_name."'> Ajouter</button>

		</div>
		<br/><br/>

		</div>
		";

}else{
	header("Location: ../logout.php");
}