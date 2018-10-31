<?php

if(login()){

	$query="SELECT * FROM details WHERE userid = '".htmlspecialchars($_COOKIE['login'])."'";

	$answer=$cnx->query($query);
	$data = $answer->fetch();

	echo"
		<br/>
		<div class='card' id='card1'>
			<div class='card-body'>

				<div class='row'>

					<div class='col-md-1'></div>
					<div class='col-md-10' id='1'>

						<h5 class='card-title'>Votre photo de profil : </h5>
						<div class='row'>
							<div class='col-md-3'>
				            	<div class='timeline-logo' id='logo1'> 
				            		<img src='../../assets/images/profile/".$_COOKIE['login'].".png' onerror='this.src=\"img/profile.png\"' alt='profile1'>
				            	</div>
				            </div>
				            <div class='cold-md-9'>
								<form id='uploadfile1'  method='post' enctype='multipart/form-data'> 
									<input type='file' name ='file'>
									<input type = 'hidden' name = 'type' value='image_profile'>
									<input type='submit' value='Charger' class='upload'>
								</form>
							</div>
						</div>
						<br/>

						<h5 class='card-title'>Votre CV (PDF)</h5>
						<div class='row'>
							<div class='col-md-3'>
				            	<div id='cv".$data['id']."'> 
				            		<a href='../../assets/resumes/".$_COOKIE['login'].".pdf' target='blank'>Download your CV</a>
				            	</div>
				            </div>
				            <div class='cold-md-9'>
								<form id = 'uploadfile2' method='post' enctype='multipart/form-data'> 
									<input type='file' name ='file'>
									<input type='hidden' name ='type' value='resume'>
									<input type='submit' value='Charger' class='upload'>
								</form>
							</div>
						</div>
						<br/>

						<h5 class='card-title'>Prénom</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='name'>".htmlspecialchars($data['name'])."</textarea><br>

						<h5 class='card-title'>Nom de Famille</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='surname'>".htmlspecialchars($data['surname'])."</textarea><br>

						<h5 class='card-title'>Sous-titre</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='summary'>".htmlspecialchars($data['summary'])."</textarea><br>

						<h5 class='card-title'>Court texte introductif</h5>
						<textarea rows='10' cols = '50' class='form-control mr-sm-2' name='description'>".htmlspecialchars($data['description'])."</textarea><br>

						<h5 class='card-title'>Adresse postale</h5>
						<textarea rows='5' cols = '50' class='form-control mr-sm-2' name='address'>".htmlspecialchars($data['address'])."</textarea><br>

						<h5 class='card-title'>Adresse mail</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='mail'>".htmlspecialchars($data['mail'])."</textarea><br>

						<h5 class='card-title'>Lien vers LinkedIn</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='linkedin'>".htmlspecialchars($data['linkedin'])."</textarea><br>

						<h5 class='card-title'>Lien vers GitHub</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='github'>".htmlspecialchars($data['github'])."</textarea><br>

						<h5 class='card-title'>Lien vers Twitter</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='twitter'>".htmlspecialchars($data['twitter'])."</textarea><br>

						<h5 class='card-title'>Mots-clés</h5>
						<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='keywords'>".htmlspecialchars($data['keywords'])."</textarea><br>

					</div>

					<div class='col-md-1'></div>
				</div>
			</div>
		</div>
		<br/><br/>
	";

	echo "<button id='update' name='details' class='btn btn-outline-success my-2 my-sm-0'>Mettre à jour </button> <br/>";

}else{
	header('Location: ../logout.php');
}

?>