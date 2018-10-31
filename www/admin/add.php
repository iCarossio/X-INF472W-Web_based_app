<?php 

	require('../../private/db_connection.php');
	require('login.php');

	if(login()){

		if(isset($_POST['table'])){

			switch($_POST['table']){

				case 'education':
				case 'experiences':

					if(isset($_POST['title']) and isset($_POST['subtitle']) and isset($_POST['institution']) and isset($_POST['dates']) and isset($_POST['description']) and isset($_POST['url'])){

						$query = "INSERT INTO ".$_POST['table']." VALUES ('', :title, :subtitle, :institution, :dates, :description, :url, :userid)";
						$req=$cnx->prepare($query);
						$req->execute(array(
							'title'       => $_POST['title'],
							'subtitle'    => $_POST['subtitle'],
							'institution' => $_POST['institution'],
							'dates'       => $_POST['dates'],
							'description' => $_POST['description'],
							'userid'      => $_COOKIE['login'],
							'url'         => $_POST['url']));
						echo "success";

					}else{
						echo "error";
					}
					break;

				case 'skills_com':
				case 'skills_info':

					if(isset($_POST['title']) and isset($_POST['percentage']) and isset($_POST['details'])){

						$query = "INSERT INTO ".$_POST['table']." VALUES ('', :title, :percentage, :details, :userid)";
						$req=$cnx->prepare($query);
						$req->execute(array(
							'title'       => $_POST['title'],
							'percentage'  => $_POST['percentage'],
							'userid'      => $_COOKIE['login'],
							'details'     => $_POST['details']));
						echo "success";

					}else{
						echo "error";
					}
					break;

				case 'skills_pro': // TODO

					if(isset($_POST['title'])){

						$query = "INSERT INTO ".$_POST['table']." VALUES ('', :title, :userid)";
						$req=$cnx->prepare($query);
						$req->execute(array(
							'title'       => $_POST['title'],
							'userid'      => $_COOKIE['login']));
						echo "success";

					}else{
						echo "error";
					}
					break;

				case 'details': // TODO
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