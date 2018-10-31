<?php

// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);
// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);
// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', 1);

include('../../private/db_connection.php'); // À faire + récupérer la variable $cnx;

require('login.php'); //fonction qui gère le login


include('header.php'); // Modifier la bare des menus en fonction de si la personne est connectée ou 

?>

<div class="jumbotron">
  <div class="container">
    <h1>Interface d'administration</h1>
    <!--<p>Bienvenue</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
  </div>
</div>

<div class ="container">
    <div class="row">
        <div class="col-md-12" id="main">

            <?php

            
            if(login()){
                if (isset($_GET['page'])) {
                switch ($_GET['page']){
                    case 'experiences': include('tables/experiences.php'); break;
                    case 'education': include('tables/education.php'); break;
                    case 'skills_com': include('tables/skills_com.php'); break;
                    case 'skills_info': include('tables/skills_info.php'); break;
                    case 'skills_pro': include('tables/skills_pro.php'); break;
                    case 'details' : include('tables/details.php'); break;
                    default: echo "Sorry, but the page you were trying to view does not exist.";
                }
                } else{
                    $name = "";
                    if (isset($_COOKIE['login'])){
                        $name = htmlspecialchars($_COOKIE['login']);
                    }
                    if (isset($_POST['login'])){
                        $name = htmlspecialchars($_POST['login']);
                    }
                    echo "Bievenue sur votre interface d'administration ".$name;
                } 
            }

            else if(superLogin()){
                include('tables/admin.php');
            }

            else {
                include('register.php');
            }

            ?>

        </div>
    </div>


<?php
include('footer.php');
?>