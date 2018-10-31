<?php 

	require('../../private/db_connection.php');
	require('login.php');

	if(login()){

		if(isset($_POST['field']) and isset($_POST['value']) and isset($_POST['id']) and isset($_POST['table'])){

			switch($_POST['table']){

				case 'education':
				case 'experiences':
				case 'skills_com':
				case 'skills_info':
				case 'skills_pro':

					switch ($_POST['field']) {

						case 'title':
						case 'subtitle':
						case 'institution':
						case 'dates':
						case 'url':
						case 'details':
						case 'description':
						case 'percentage':
							$query = "UPDATE ".$_POST['table']." SET ".$_POST['field']." = ? WHERE ID = ? AND userid = '".$_COOKIE['login']."'";
							$req=$cnx->prepare($query);
							$req->execute(array($_POST['value'],$_POST['id']));
							echo "success";
							break;
						default:
							echo "error";
					}
					break;

				case 'details':
					switch ($_POST['field']) {

						case 'name':
						case 'surname':
						case 'summary':
						case 'description':
						case 'address':
						case 'resume_link':
						case 'mail':
						case 'linkedin':
						case 'github':
						case 'twitter':
						case 'keywords':
							$query = "UPDATE ".$_POST['table']." SET ".$_POST['field']." = ? WHERE userid = '".$_COOKIE['login']."'";
							$req=$cnx->prepare($query);
							$req->execute(array($_POST['value']));
							echo "success";
							break;
						default:
							echo "error";
					}
					break;
				default:
					echo "error";
					break;
				}

		} else{
			echo "error";
		}
	}else{
		header('Location: logout.php');
	}

?>