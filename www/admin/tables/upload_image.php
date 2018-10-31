<?php


if(isset($_FILES['file']['type'])){


	if ($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpg' && $_FILES['file']['size'] < 500000){


		
		if ($_FILES['file']['error'] > 0){


			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}

		else{

			$sourcePath=$_FILES['file']['tmp_name'];
			$temporary= explode(".", $_FILES['file']['name']);
			$extension = end($temporary); //getting the right extension for saving the file later

			if(isset($_POST['id']) and isset($_POST['table'])){ // the corresponding coordinates for the image
				$targetPath="../../assets/images/".htmlspecialchars($_POST['table'])."/".htmlspecialchars($_POST['id']).".".$extension;
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

			}
			else{
				echo "Erreur : champs manquants";
			}
		}
	}

	else{

	echo "Error : wrong filetype or size too big";
	}
}


?>
