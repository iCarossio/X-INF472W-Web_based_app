<?php


require('login.php');
if(isset($_FILES['file']['type'])){


	if ($_FILES['file']['size'] < 5000000){


		
		if ($_FILES['file']['error'] > 0){


			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}

		else{

			$sourcePath=$_FILES['file']['tmp_name'];
			$temporary= explode(".", $_FILES['file']['name']);
			$extension = end($temporary); //getting the right extension for saving the file later
			
			if(login()){//check que la variable cookie n'a pa été modifiée depuis la connexion (évite les failles XSS)
					if(isset($_POST['type'])){

						switch($_POST['type']){

							case 'image_resume': //upload des images dans les tables 'experiences' et 'education'
								if(($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpg' || $_FILES['file']['type'] == 'image/jpeg') && isset($_POST['id']) && isset($_POST['table'])){ // the corresponding coordinates for the image
									
									$targetPath="../assets/images/".htmlspecialchars($_POST['table'])."/".htmlspecialchars($_COOKIE['login'])."_".htmlspecialchars($_POST['id']).".png";

									move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
									echo "success";

									}
								else{
									echo "Erreur : champs manquants ou mauvais type d'image";
								}

								break;

							case 'image_profile': //upload de la photo du profil, dans details.php

								if($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpg' || $_FILES['file']['type'] == 'image/jpeg'){ // check the type of file
									
									$targetPath="../assets/images/profile/".htmlspecialchars($_COOKIE['login']).".png";

									move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
									echo "success";

									}
								else{
									echo "Erreur : champs manquants ou mauvais type d'image";
								}
								
								break;

							case 'resume': //upload du cv, dans details.php
								if($extension == 'pdf' ){ // check the type of file
									
									$targetPath="../assets/resumes/".htmlspecialchars($_COOKIE['login']).".".$extension;

									move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
									echo "success";

									}
								else{
									echo "Erreur : champs manquants ou mauvais type de fichier";
								}
								
								break;


					}
				}


			}else{
				header('Location: logout.php');
			}
		}
	}

	else{

	echo "Erreur : fichier trop grand ou mauvais type de fichier";
	}
}


?>
