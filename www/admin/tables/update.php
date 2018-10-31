<?php 

	include('../../../private/db_connection.php');
	include('../login.php');

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
							$query = "UPDATE ".$_POST['table']." SET ".$_POST['field']." = ? WHERE ID = ?";
							$req=$cnx->prepare($query);
							$req->execute(array($_POST['value'],$_POST['id']));
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
		echo "error";
	}

?>