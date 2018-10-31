<?php
	
if(login()){
	
	$ask = $cnx->query("SELECT * FROM ".$table_name." WHERE userid='".$_COOKIE['login']."'ORDER BY dates DESC");
	while($rep = $ask->fetch()){
		echo "
			<br/>
			<div class='card' id='card".$rep['id']."'>
				<div class='card-body'>

					<div class='row'>
						<div class='col-md-1'></div>
						<div class='col-md-10' id=".$rep['id'].">

							<h5 class='card-title'>Logo : </h5>
							<div class='row'>
								<div class='col-md-3'>
					            	<div class='timeline-logo' id='logo".$rep['id']."'>
					            		<img src='../../assets/images/".$table_name."/".$_COOKIE['login']."_".$rep['id'].".png' onerror='this.src=\"img/institution.png\"' alt=image".$rep['id'].">
					            	</div>
					            </div>
						        <div class='cold-md-9'>
									<form id='uploadfile".$rep['id']."'  method='post' enctype='multipart/form-data'> 
										<input type='file' name ='file'>
										<input type='hidden' name ='id' value='".$rep['id']."'>
										<input type = 'hidden' name = 'table' value='".$table_name."'>
										<input type = 'hidden' name = 'type' value='image_resume'>
										<input type='submit' value='Charger' class='upload'>
									</form>
								</div>
							</div>
							<br/>

							<h5 class='card-title'>Institution : </h5>
							<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='institution'>".strip_tags($rep['institution'])."</textarea><br>

							<h5 class='card-title'>Dates : </h5>
							<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='dates'>".strip_tags($rep['dates'])."</textarea><br>

							<h5 class='card-title'>Titre : </h5>
							<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='title'>".strip_tags($rep['title'])."</textarea><br>

							<h5 class='card-title'>Sous-Titre : </h5>
							<textarea rows = '1' cols = '50'  class='form-control mr-sm-2' name='subtitle' >".strip_tags($rep['subtitle'])."</textarea><br>

							<h5 class='card-title'>URL : </h5>
							<textarea rows = '2' cols = '100' class='form-control mr-sm-2' name='url'>".strip_tags($rep['url'])."</textarea><br>

							<h5 class='card-title'>Description : </h5>
							<textarea  rows='10' cols ='150' class='form-control mr-sm-2' name='description'>".strip_tags($rep['description'])."</textarea>

						</div>
						<div class='col-md-2'></div>
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

	echo "
		<div class='container'>
		<br/>
		<h4>Nouvelle entrée</h4>
		<br/>
		<div class='col-md-12' id='-1'>

			<h5 class='card-title'>Titre : </h5>
			<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='title'></textarea><br>

			<h5 class='card-title'>Sous-Titre : </h5>
			<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='subtitle'></textarea><br>

			<h5>Institution : </h5>
			<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='institution'></textarea><br>

			<h5 class='card-title'>Dates : </h5>
			<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='dates'></textarea><br>

			<h5 class='card-title'>URL : </h5>
			<textarea rows = '2' cols = '100' class='form-control mr-sm-2' name='url'></textarea><br>

			<h5 class='card-title'>Description : </h5>
			<textarea  rows='10' cols ='150' class='form-control mr-sm-2' name='description'></textarea><br>

			<button class='btn btn-outline-success my-2 my-sm-0' id='add' name='".$table_name."'> Ajouter</button>

		</div>
		<br/><br/>

		</div>
		";
}else{
	header("Location: ../logout.php");
}