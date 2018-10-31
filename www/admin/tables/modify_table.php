<?php

	$req = $cnx->query("SELECT table_name, table_type FROM existing_tables");
	while($data = $req->fetch()){
		echo '<h2>'.$data['table_name'].'</h2>';
		$ask = $cnx->query('SELECT * FROM '.$data['table_name']);
			
			switch($data['table_type']){
				case 'experience':
					while($rep = $ask->fetch()){
						echo "
							<br/>
							<form method='post' action='update_table.php'> 

								<input type='hidden' name='table_name' value=".strip_tags($data['table_name']).">
								<input type='hidden' name='table_type' value=".strip_tags($data['table_type']).">
								<input type = 'hidden' name = 'id' value=".strip_tags($rep['id']).">


								<label for='title'>Titre : </label><br/>
								<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='title'>".strip_tags($rep['title'])."</textarea><br>
								<label for='title'>Sous-Titre : </label><br/>
								<textarea rows = '1' cols = '50'  class='form-control mr-sm-2' name='subtitle' >".strip_tags($rep['subtitle'])."</textarea><br>
								<label for='title'>Institution : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='institution'>".strip_tags($rep['institution'])."</textarea><br>
								<label for='title'>Dates : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='dates'>".strip_tags($rep['dates'])."</textarea><br>
								<label for='title'>URL : </label><br/>
								<textarea rows = '2' cols = '100' class='form-control mr-sm-2' name='url'>".strip_tags($rep['url'])."</textarea><br>
								<label for='title'>Description : </label><br/>
								<textarea  rows='10' cols ='150' class='form-control mr-sm-2' name='description'>".strip_tags($rep['description'])."</textarea><br>

								<input type='submit' class='btn btn-outline-success my-2 my-sm-0' name ='modify' value='Modifier'>
								<input type='submit' class='btn btn-outline-success my-2 my-sm-0' name ='delete' value='Supprimer'>


							</form>
							<br/><br/>
							";//modifie une ligne de la table donnée, et appelle update_table qui gère le SQL et redirige sur la page admin
					}
					echo "
						<h4>Nouvelle ligne</h4>
						<br/>
						<form method='post' action='update_table.php'> 
							<input type='hidden' name='table_name' value=".strip_tags($data['table_name']).">
							<input type='hidden' name='table_type' value=".strip_tags($data['table_type']).">


							<label for='title'>Titre : </label><br/>
							<textarea rows='1' cols = '50' class='form-control mr-sm-2' name='title'></textarea><br>
	 						<label for='title'>Sous-Titre : </label><br/>
							<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='subtitle'></textarea><br>
							<label for='title'>Institution : </label><br/>
							<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='institution'></textarea><br>
							<label for='title'>Dates : </label><br/>
							<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='dates'></textarea><br>
							<label for='title'>URL : </label><br/>
							<textarea rows = '2' cols = '100' class='form-control mr-sm-2' name='url'></textarea><br>
							<label for='title'>Description : </label><br/>
							<textarea  rows='10' cols ='150' class='form-control mr-sm-2' name='description'></textarea><br>

							<input type='submit' class='btn btn-outline-success my-2 my-sm-0' name = 'add' value='Ajouter'>


						</form>
						<br/><br/>
							";
					break;

				case 'skills':
					while($rep = $ask->fetch()){
					echo "
							<br/>
							<form method='post' action='update_table.php'> 

								<input type='hidden' name='table_name' value=".strip_tags($data['table_name']).">
								<input type='hidden' name='table_type' value=".strip_tags($data['table_type']).">
								<input type = 'hidden' name = 'id' value=".strip_tags($rep['id']).">


								<label for='title'>Titre : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2'  name='title'>".strip_tags($rep['title'])."</textarea><br>
								<label for='title'>Niveau (sur 100) : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='percentage' >".strip_tags($rep['percentage'])."</textarea><br>
								<label for='title'>Contenu : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='details'>".strip_tags($rep['details'])."</textarea><br>

								<input type='submit' class='btn btn-outline-success my-2 my-sm-0' name='modify' value='Modifier'>
								<input type='submit' class='btn btn-outline-success my-2 my-sm-0' name='delete' value='Supprimer'>


							</form>
							<br/><br/>
							";//modifie une ligne de la table donnée, et appelle update_table qui gère le SQL et redirige sur la page admin
					}
					//formulaire pour ajouter une table
					echo "	<h4>Nouvelle ligne</h4>
							<br/>
							<form method='post' action='update_table.php'> 

								<input type='hidden' name='table_name' value=".strip_tags($data['table_name']).">
								<input type='hidden' name='table_type' value=".strip_tags($data['table_type']).">


								<label for='title'>Titre : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='title'></textarea><br>
								<label for='title'>Niveau (sur 100) : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='percentage' ></textarea><br>
								<label for='title'>Contenu : </label><br/>
								<textarea rows = '1' cols = '50' class='form-control mr-sm-2' name='details'></textarea><br>

								<input type='submit' class='btn btn-outline-success my-2 my-sm-0' name='add' value='Ajouter'>


							</form>
							<br/><br/>
							";
					break;

				case 'portfolio':
					while($rep = $ask->fetch()){}
					// show all items
					break;

				default:
					echo "type de table non reconnu";
					break;

			}
		}
	


?>