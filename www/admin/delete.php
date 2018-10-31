<?php 

	require('../../private/db_connection.php');
	require('login.php');

	if(login()){

		if(isset($_POST['id']) and isset($_POST['table'])){

			switch($_POST['table']){

				case 'education':
				case 'experiences':
				case 'skills_com':
				case 'skills_info':
				case 'skills_pro':
					$query = "DELETE FROM ".$_POST['table']." WHERE ID = ?";
					$req=$cnx->prepare($query);
					$req->execute(array($_POST['id']));
					echo "success";
					break;
				default:
					echo "error";
					break;
				}

		} else{
			echo "error";
		}
	}else{
		header("Location: logout.php");
	}

?>